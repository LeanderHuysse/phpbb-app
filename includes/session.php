<?php
/** 
*
* @package phpBB3
* @version $Id$ 
* @copyright (c) 2005 phpBB Group 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package phpBB3
* Session class
*/
class session
{
	var $session_id = '';
	var $cookie_data = array();
	var $browser = '';
	var $ip = '';
	var $page = '';
	var $current_page_filename = '';
	var $load;
	var $time_now = 0;

	/**
	* Start session management
	*
	* This is where all session activity begins. We gather various pieces of
	* information from the client and server. We test to see if a session already
	* exists. If it does, fine and dandy. If it doesn't we'll go on to create a 
	* new one ... pretty logical heh? We also examine the system load (if we're
	* running on a system which makes such information readily available) and
	* halt if it's above an admin definable limit.
	*
	* @todo Introduce further user types, bot, guest
	* @todo Change user_type (as above) to a bitfield? user_type & USER_FOUNDER for example
	*/
	function session_begin()
	{
		global $phpEx, $SID, $db, $config;

		$this->time_now = time();
		
		$this->browser = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
		$this->page = (!empty($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] . ((isset($_POST['f'])) ? 'f=' . intval($_POST['f']) : '') : '';
		$sid = substr($this->page, strpos($this->page, 'sid='), 36);
		$this->page = str_replace(array('/' . $config['script_path'] . '/', (strlen($sid) == 36 && strpos($sid, '&') === false) ? $sid : 'sid='), '', $this->page);

		$this->cookie_data = array();
		if (isset($_COOKIE[$config['cookie_name'] . '_sid']) || isset($_COOKIE[$config['cookie_name'] . '_u']))
		{
			// Switch to request_var ... can this cause issues, can a _GET/_POST param
			// be used to poison this? Not sure that it makes any difference in terms of
			// the end result, be it a cookie or param.
			$this->cookie_data['u'] = request_var($config['cookie_name'] . '_u', 0);
			$this->cookie_data['k'] = request_var($config['cookie_name'] . '_k', '');
			$this->session_id 		= request_var($config['cookie_name'] . '_sid', '');
			
			$SID = (defined('NEED_SID')) ? '?sid=' . $this->session_id : '?sid=';
		}
		else
		{
			$this->session_id = request_var('sid', '');
			$SID = '?sid=' . $this->session_id;
		}
		
		// Why no forwarded_for et al? Well, too easily spoofed. With the results of my recent requests
		// it's pretty clear that in the majority of cases you'll at least be left with a proxy/cache ip.
		$this->ip = (!empty($_SERVER['REMOTE_ADDR'])) ? htmlspecialchars($_SERVER['REMOTE_ADDR']) : '';
		
		// Load limit check (if applicable)
		if (@file_exists('/proc/loadavg'))
		{
			if ($load = @file('/proc/loadavg'))
			{
				list($this->load) = explode(' ', $load[0]);

				if ($config['limit_load'] && $this->load > doubleval($config['limit_load']))
				{
					trigger_error('BOARD_UNAVAILABLE');
				}
			}
		}
		
		// Is session_id is set or session_id is set and matches the url param if required
		if (!empty($this->session_id) && (!defined('NEED_SID') || (isset($_GET['sid']) && $this->session_id === $_GET['sid'])))
		{
			$sql = 'SELECT u.*, s.*
				FROM ' . SESSIONS_TABLE . ' s, ' . USERS_TABLE . " u
				WHERE s.session_id = '" . $db->sql_escape($this->session_id) . "'
					AND u.user_id = s.session_user_id";
			$result = $db->sql_query($sql);

			$this->data = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			// Did the session exist in the DB?
			if (isset($this->data['user_id']))
			{
				// Validate IP length according to admin ... enforces an IP
				// check on bots if admin requires this
//				$quadcheck = ($config['ip_check_bot'] && $this->data['user_type'] & USER_BOT) ? 4 : $config['ip_check'];
				
				$s_ip = implode('.', array_slice(explode('.', $this->data['session_ip']), 0, $config['ip_check']));
				$u_ip = implode('.', array_slice(explode('.', $this->ip), 0, $config['ip_check']));

				$s_browser = ($config['browser_check']) ? substr($this->data['session_browser'], 0, 149) : '';
				$u_browser = ($config['browser_check']) ? substr($this->browser, 0, 149) : '';

				if ($u_ip == $s_ip && $s_browser == $u_browser)
				{
					// Only update session DB a minute or so after last update or if page changes
					if ($this->time_now - $this->data['session_time'] > 60 || $this->data['session_page'] != $this->page)
					{
						$sql = 'UPDATE ' . SESSIONS_TABLE . "
							SET session_time = $this->time_now, session_page = '" . $db->sql_escape($this->page) . "'
							WHERE session_id = '" . $db->sql_escape($this->session_id) . "'";
						$db->sql_query($sql);
					}
					
					// Ultimately to be removed
					$this->data['is_registered'] = ($this->data['user_id'] != ANONYMOUS && ($this->data['user_type'] == USER_NORMAL || $this->data['user_type'] == USER_FOUNDER)) ? true : false;
					$this->data['is_bot'] = (!$this->data['is_registered'] && $this->data['user_id'] != ANONYMOUS) ? true : false;
					
					return true;
				}
			}
		}

		// If we reach here then no (valid) session exists. So we'll create a new one
		return $this->session_create();
	}
	
	/**
	* Create a new session
	*
	* If upon trying to start a session we discover there is nothing existing we
	* jump here. Additionally this method is called directly during login to regenerate
	* the session for the specific user. In this method we carry out a number of tasks;
	* garbage collection, (search)bot checking, banned user comparison. Basically
	* though this method will result in a new session for a specific user.
	*/
	function session_create($user_id = false, $set_admin = false, $persist_login = false, $viewonline = true)
	{
		global $SID, $db, $config, $cache;

		$this->data = array();
		
		// Garbage collection ... remove old sessions updating user information
		// if necessary. It means (potentially) 11 queries but only infrequently
		if ($this->time_now > $config['session_last_gc'] + $config['session_gc'])
		{
			$this->session_gc();
		}
		
		// Do we allow autologin on this board? No? Then override anything
		// that may be requested here
		if (!$config['allow_autologin'])
		{
			$this->cookie_data['k'] = $persist_login = false;
		}

		/**
		* Here we do a bot check, oh er saucy! No, not that kind of bot
		* check. We loop through the list of bots defined by the admin and
		* see if we have any useragent and/or IP matches. If we do, this is a
		* bot, act accordingly
		*/		
		$bot = false;
		$active_bots = array();
		$cache->obtain_bots($active_bots);

		foreach ($active_bots as $row)
		{
			if ($row['bot_agent'] && strpos(strtolower($this->browser), strtolower($row['bot_agent'])) !== false)
			{
				$bot = $row['user_id'];
			}
			
			if ($row['bot_ip'] && (!$row['bot_agent'] || !$bot))
			{
				foreach (explode(',', $row['bot_ip']) as $bot_ip)
				{
					if (strpos($this->ip, $bot_ip) === 0)
					{
						$bot = (int) $row['user_id'];
						break;
					}
				}
			}

			if ($bot)
			{
				break;
			}
		}
		
		// If we're presented with an autologin key we'll join against it.
		// Else if we've been passed a user_id we'll grab data based on that
		if (isset($this->cookie_data['k']) && $this->cookie_data['k'] && $this->cookie_data['u'])
		{
			$sql = 'SELECT u.* 
				FROM ' . USERS_TABLE . ' u, ' . SESSIONS_KEYS_TABLE . ' k
				WHERE u.user_id = ' . (int) $this->cookie_data['u'] . '
					AND u.user_type <> ' . USER_INACTIVE . "
					AND k.user_id = u.user_id
					AND k.key_id = '" . $db->sql_escape(md5($this->cookie_data['k'])) . "'";
			$result = $db->sql_query($sql);

			$this->data = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
		}
		else if ($user_id !== false)
		{
			$this->cookie_data['k'] = '';
			$this->cookie_data['u'] = $user_id;

			$sql = 'SELECT *
				FROM ' . USERS_TABLE . '
				WHERE user_id = ' . (int) $this->cookie_data['u'] . '
					AND user_type <> ' . USER_INACTIVE;
			$result = $db->sql_query($sql);

			$this->data = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
		}
/*		echo "<br />$sql";
		echo "<br />$user_id :: " . sizeof($this->data) . " :: " . (int) is_array($this->data) . " :: " . $db->sql_numrows();
		print_r($this->cookie_data);
		print_r($this->data);*/
		
		// If no data was returned one or more of the following occured:
		// Key didn't match one in the DB
		// User does not exist
		// User is inactive
		// User is bot
		if (!sizeof($this->data) || !is_array($this->data))
		{
			$this->cookie_data['k'] = '';
			$this->cookie_data['u'] = ($bot) ? $bot : ANONYMOUS;

			$sql = 'SELECT *
				FROM ' . USERS_TABLE . '
				WHERE user_id = ' . (int) $this->cookie_data['u'];
			$result = $db->sql_query($sql);

			$this->data = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
		}

/*		echo "<br />$sql";
		echo "<br />$user_id :: " . sizeof($this->data) . " :: " . (int) is_array($this->data) . " :: " . $db->sql_numrows();
		print_r($this->cookie_data);
		print_r($this->data);*/
		
		if ($this->data['user_id'] != ANONYMOUS)
		{
			$sql = 'SELECT session_time, session_id
				FROM ' . SESSIONS_TABLE . '
				WHERE session_user_id = ' . (int) $this->data['user_id'] . '
				ORDER BY session_time DESC';
			$result = $db->sql_query_limit($sql, 1);

			if ($sdata = $db->sql_fetchrow($result))
			{
				$this->data = array_merge($sdata, $this->data);
				unset($sdata);
				$this->session_id = $this->data['session_id'];
			}
			$db->sql_freeresult($result);

			$this->data['session_last_visit'] = (isset($this->data['session_time']) && $this->data['session_time']) ? $this->data['session_time'] : (($this->data['user_lastvisit']) ? $this->data['user_lastvisit'] : time());
		}
		else
		{
			$this->data['session_last_visit'] = time();
		}

		// At this stage we should have a filled data array, defined cookie u and k data.
		// data array should contain recent session info if we're a real user and a recent
		// session exists in which case session_id will also be set

		// Is user banned? Are they excluded? Won't return on ban, exists within method
		// @todo Change to !$this->data['user_type'] & USER_FOUNDER && !$this->data['user_type'] & USER_BOT in time
		if ($this->data['user_type'] != USER_FOUNDER)
		{
			$this->check_ban();
		}
		
		//
		// Do away with ultimately?
		$this->data['is_registered'] = (!$bot && $this->data['user_id'] != ANONYMOUS) ? true : false;
		$this->data['is_bot'] = ($bot) ? true : false;
		//
		//
		
		// Create or update the session
		$sql_ary = array(
			'session_user_id'		=> (int) $this->data['user_id'],
			'session_start'			=> (int) $this->time_now,
			'session_last_visit'	=> (int) $this->data['session_last_visit'],
			'session_time'			=> (int) $this->time_now,
			'session_browser'		=> (string) $this->browser,
			'session_page'			=> (string) $this->page,
			'session_ip'			=> (string) $this->ip,
			'session_admin'			=> ($set_admin) ? 1 : 0,
			'session_viewonline'	=> ($viewonline) ? 1 : 0,
		);

		$db->sql_return_on_error(true);

		$sql = 'UPDATE ' . SESSIONS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_ary) . "
			WHERE session_id = '" . $db->sql_escape($this->session_id) . "'";

		if (!$this->session_id || !$db->sql_query($sql) || !$db->sql_affectedrows())
		{
			// Limit new sessions in 1 minute period (if required)
			if ((!isset($this->data['session_time']) || !$this->data['session_time']) && $config['active_sessions'])
			{
				$sql = 'SELECT COUNT(*) AS sessions
					FROM ' . SESSIONS_TABLE . '
					WHERE session_time >= ' . ($this->time_now - 60);
				$result = $db->sql_query($sql);
	
				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);
	
				if ((int) $row['sessions'] > (int) $config['active_sessions'])
				{
					trigger_error('BOARD_UNAVAILABLE');
				}
			}
			
			$this->session_id = $this->data['session_id'] = md5(unique_id());

			$sql_ary['session_id'] = (string) $this->session_id;

			$db->sql_query('INSERT INTO ' . SESSIONS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary));
		}
		$db->sql_return_on_error(false);

		// Regenerate autologin/persistent login key
		// @todo Change this ... check for "... && user_type & USER_NORMAL" ?
		if (($this->cookie_data['k'] || $persist_login) && $this->data['user_id'] != ANONYMOUS)
		{
			$this->set_login_key();
		}
		
		$SID = '?sid=';
		if (!$bot)
		{
			$cookie_expire = $this->time_now + (($config['max_autologin_time']) ? 86400 * (int) $config['max_autologin_time'] : 31536000);
			
			$this->set_cookie('u', $this->cookie_data['u'], $cookie_expire);
			$this->set_cookie('k', $this->cookie_data['k'], $cookie_expire);
			$this->set_cookie('sid', $this->session_id, $cookie_expire);

			$SID = '?sid=' . $this->session_id;

			if ($this->data['user_id'] != ANONYMOUS)
			{
//				global $evt;
//				$evt->trigger(EVT_NEW_SESSION, $this->data);
			}
			unset($cookie_expire);
		}
		
		return true;
	}
	
	/**
	* Kills a session
	*
	* This method does what it says on the tin. It will delete a pre-existing session.
	* It resets cookie information (destroying any autologin key within that cookie data)
	* and update the users information from the relevant session data. It will then
	* grab guest user information.
	*/
	function session_kill()
	{
		global $SID, $db, $config;

		$sql = 'DELETE FROM ' . SESSIONS_TABLE . "
			WHERE session_id = '" . $db->sql_escape($this->session_id) . "'
				AND session_user_id = " . (int) $this->data['user_id'];
		$db->sql_query($sql);

		if ($this->data['user_id'] != ANONYMOUS)
		{
			// Delete existing session, update last visit info first!
			$sql = 'UPDATE ' . USERS_TABLE . '
				SET user_lastvisit = ' . (int) $this->data['session_time'] . '
				WHERE user_id = ' . (int) $this->data['user_id'];
			$db->sql_query($sql);

			if ($this->cookie_data['k'])
			{
				$sql = 'DELETE FROM ' . SESSIONS_KEYS_TABLE . '
					WHERE user_id = ' . (int) $this->data['user_id'] . "
						AND key_id = '" . $db->sql_escape(md5($this->cookie_data['k'])) . "'";
				$db->sql_query($sql);
			}
			
			// Reset the data array
			$this->data = array();			
			
			$sql = 'SELECT *
				FROM ' . USERS_TABLE . '
				WHERE user_id = ' . ANONYMOUS;
			$result = $db->sql_query($sql);
		
			$this->data = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			
		}
		
		$cookie_expire = $this->time_now - 31536000;
		$this->set_cookie('u', '', $cookie_expire);
		$this->set_cookie('k', '', $cookie_expire);
		$this->set_cookie('sid', '', $cookie_expire);
		unset($cookie_expire);
		
		$SID = '?sid=';
		$this->session_id = '';

		// Trigger EVENT_END_SESSION

		return true;
	}

	/**
	* Session garbage collection
	*
	* This looks a lot more complex than it really is. Effectively we are
	* deleting any sessions older than an admin definable limit. Due to the
	* way in which we maintain session data we have to ensure we update user
	* data before those sessions are destroyed. In addition this method
	* removes autologin key information that is older than an admin defined
	* limit.
	*
	* @todo add to cron
	*/
	function session_gc()
	{
		global $db, $config;

		if (!$this->time_now)
		{
			$this->time_now = time();
		}
		
		switch (SQL_LAYER)
		{
			case 'mysql4':
			case 'mysqli':
				// Firstly, delete guest sessions
				$sql = 'DELETE FROM ' . SESSIONS_TABLE . '
					WHERE session_user_id = ' . ANONYMOUS . '
						AND session_time < ' . (int) ($this->time_now - $config['session_length']);
				$db->sql_query($sql);

				// Keep only the most recent session for each user
				// Note: if the user is currently browsing the board, his
				// last_visit field won't be updated, which I believe should be
				// the normal behavior anyway
				$db->sql_return_on_error(true);

				$sql = 'DELETE FROM ' . SESSIONS_TABLE . '
					USING ' . SESSIONS_TABLE . ' s1, ' . SESSIONS_TABLE . ' s2
					WHERE s1.session_user_id = s2.session_user_id
						AND s1.session_time < s2.session_time';
				$db->sql_query($sql);

				$db->sql_return_on_error(false);

				// Update last visit time
				$sql = 'UPDATE ' . USERS_TABLE. ' u, ' . SESSIONS_TABLE . ' s
					SET u.user_lastvisit = s.session_time, u.user_lastpage = s.session_page
					WHERE s.session_time < ' . (int) ($this->time_now - $config['session_length']) . '
						AND u.user_id = s.session_user_id';
				$db->sql_query($sql);

				// Delete everything else now
				$sql = 'DELETE FROM ' . SESSIONS_TABLE . '
					WHERE session_time < ' . (int) ($this->time_now - $config['session_length']);
				$db->sql_query($sql);

				set_config('session_last_gc', $this->time_now);
				break;

			default:

				// Get expired sessions, only most recent for each user
				$sql = 'SELECT session_user_id, session_page, MAX(session_time) AS recent_time
					FROM ' . SESSIONS_TABLE . '
					WHERE session_time < ' . ($this->time_now - $config['session_length']) . '
					GROUP BY session_user_id, session_page';
				$result = $db->sql_query_limit($sql, 5);

				$del_user_id = '';
				$del_sessions = 0;
				if ($row = $db->sql_fetchrow($result))
				{
					do
					{
						if ($row['session_user_id'] != ANONYMOUS)
						{
							$sql = 'UPDATE ' . USERS_TABLE . '
								SET user_lastvisit = ' . $row['recent_time'] . ", user_lastpage = '" . $db->sql_escape($row['session_page']) . "'
								WHERE user_id = " . $row['session_user_id'];
							$db->sql_query($sql);
						}

						$del_user_id .= (($del_user_id != '') ? ', ' : '') . (int) $row['session_user_id'];
						$del_sessions++;
					}
					while ($row = $db->sql_fetchrow($result));
				}

				if ($del_user_id)
				{
					// Delete expired sessions
					$sql = 'DELETE FROM ' . SESSIONS_TABLE . "
						WHERE session_user_id IN ($del_user_id)
							AND session_time < " . ($this->time_now - $config['session_length']);
					$db->sql_query($sql);
				}

				if ($del_sessions < 5)
				{
					// Less than 5 sessions, update gc timer ... else we want gc
					// called again to delete other sessions
					set_config('session_last_gc', $this->time_now);
				}
				break;
		}

		if ($config['max_autologin_time'])
		{
			$sql = 'DELETE FROM ' . SESSIONS_KEYS_TABLE . '
				WHERE last_login < ' . (time() - (86400 * (int) $config['max_autologin_time']));
			$db->sql_query($sql);
		}

		return;
	}

	/**
	* Sets a cookie
	*
	* Sets a cookie of the given name with the specified data for the given length of time.
	*/
	function set_cookie($name, $cookiedata, $cookietime)
	{
		global $config;

		if ($config['cookie_domain'] == 'localhost' || $config['cookie_domain'] == '127.0.0.1')
		{
			setcookie($config['cookie_name'] . '_' . $name, $cookiedata, $cookietime, $config['cookie_path']);
		}
		else
		{
			setcookie($config['cookie_name'] . '_' . $name, $cookiedata, $cookietime, $config['cookie_path'], $config['cookie_domain'], $config['cookie_secure']);
		}
	}

	/**
	* Check for banned user
	*
	* Checks whether the supplied user is banned by id, ip or email. If no parameters
	* are passed to the method pre-existing session data is used. This routine does 
	* not return on finding a banned user, it outputs a relevant message and stops 
	* execution.
	*/
	function check_ban($user_id = false, $user_ip = false, $user_email = false)
	{
		global $config, $db;
		
		$user_id = ($user_id === false) ? $this->data['user_id'] : $user_id;
		$user_ip = ($user_ip === false) ? $this->ip : $user_ip;
		$user_email = ($user_email === false) ? $this->data['user_email'] : $user_email;
		
		$banned = false;

		$sql = 'SELECT ban_ip, ban_userid, ban_email, ban_exclude, ban_give_reason, ban_end
			FROM ' . BANLIST_TABLE . '
			WHERE ban_end >= ' . time() . '
				OR ban_end = 0';
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			if ((!empty($row['ban_userid']) && intval($row['ban_userid']) == $user_id) ||
				(!empty($row['ban_ip']) && preg_match('#^' . str_replace('*', '.*?', $row['ban_ip']) . '$#i', $user_ip)) ||
				(!empty($row['ban_email']) && preg_match('#^' . str_replace('*', '.*?', $row['ban_email']) . '$#i', $user_email)))
			{
				if (!empty($row['ban_exclude']))
				{
					$banned = false;
					break;
				}
				else
				{
					$banned = true;
					$ban_row = $row;
					// Don't break. Check if there is an exclude rule for this user
				}
			}
		}
		$db->sql_freeresult($result);

		if ($banned)
		{
			// Initiate environment ... since it won't be set at this stage
			$this->setup();

			// Logout the user, banned users are unable to use the normal 'logout' link
			if ($this->data['user_id'] != ANONYMOUS)
			{
				$this->session_kill();
			}
			// Determine which message to output
			$till_date = ($ban_row['ban_end']) ? $this->format_date($ban_row['ban_end']) : '';
			$message = ($ban_row['ban_end']) ? 'BOARD_BAN_TIME' : 'BOARD_BAN_PERM';

			$message = sprintf($this->lang[$message], $till_date, '<a href="mailto:' . $config['board_contact'] . '">', '</a>');
			$message .= ($ban_row['ban_give_reason']) ? '<br /><br />' . sprintf($this->lang['BOARD_BAN_REASON'], $ban_row['ban_give_reason']) : '';
			trigger_error($message);
		}
		
		return false;
	}
	
	/**
	* Set/Update a persistent login key
	*
	* This method creates or updates a persistent session key. When a user makes
	* use of persistent (formerly auto-) logins a key is generated and stored in the
	* DB. When they revisit with the same key it's automatically updated in both the
	* DB and cookie. Multiple keys may exist for each user representing different
	* browsers or locations. As with _any_ non-secure-socket no passphrase login this
	* remains vulnerable to exploit. However, by rotating the keys and seperating them
	* from the password hash it's more secure than 2.0.x. Don't be surprised to see
	* this backported!
	*/
	function set_login_key($user_id = false, $key = false, $user_ip = false)
	{
		global $config, $db;
		
		$user_id = ($user_id === false) ? $this->data['user_id'] : $user_id;
		$user_ip = ($user_ip === false) ? $this->ip : $user_ip;
		$key = ($key === false) ? (($this->cookie_data['k']) ? $this->cookie_data['k'] : false) : $key;
		
		$key_id = unique_id(hexdec(substr($this->session_id, 0, 8)));
		
		$sql_ary = array(
			'key_id'		=> (string) md5($key_id),
			'last_ip'		=> (string) $this->ip,
			'last_login'	=> (int) time()
		);

		if (!$key)
		{
			$sql_ary += array(
				'user_id'	=> (int) $user_id
			);
		}
		
		$sql = ($key) ? 'UPDATE ' . SESSIONS_KEYS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_ary) . ' WHERE user_id = ' . (int) $user_id . ' AND key_id = "' . $db->sql_escape(md5($key)) . '"' : 'INSERT INTO ' . SESSIONS_KEYS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
		$db->sql_query($sql);
		
		$this->cookie_data['k'] = $key_id;
		unset($sql_ary, $key_id);
		
		return false;
	}
}


/**
* @package phpBB3
* Base user class
*
* This is the overarching class which contains (through session extend)
* all methods utilised for user functionality during a session.
*/
class user extends session
{
	var $lang = array();
	var $help = array();
	var $theme = array();
	var $date_format;
	var $timezone;
	var $dst;

	var $lang_name;
	var $lang_path;
	var $img_lang;

	var $keyoptions = array('viewimg' => 0, 'viewflash' => 1, 'viewsmilies' => 2, 'viewsigs' => 3, 'viewavatars' => 4, 'viewcensors' => 5, 'attachsig' => 6, 'html' => 7, 'bbcode' => 8, 'smilies' => 9, 'popuppm' => 10, 'report_pm_notify' => 11);
	var $keyvalues = array();

	function setup($lang_set = false, $style = false)
	{
		global $db, $template, $config, $auth, $phpEx, $phpbb_root_path, $cache;

		if ($this->data['user_id'] != ANONYMOUS)
		{
			$this->lang_name = (file_exists($phpbb_root_path . 'language/' . $this->data['user_lang'] . "/common.$phpEx")) ? $this->data['user_lang'] : $config['default_lang'];
			$this->lang_path = $phpbb_root_path . 'language/' . $this->lang_name . '/';

			$this->date_format = $this->data['user_dateformat'];
			$this->timezone = $this->data['user_timezone'] * 3600;
			$this->dst = $this->data['user_dst'] * 3600;
		}
		else
		{
			$this->lang_name = $config['default_lang'];
			$this->lang_path = $phpbb_root_path . 'language/' . $this->lang_name . '/';
			$this->date_format = $config['default_dateformat'];
			$this->timezone = $config['board_timezone'] * 3600;
			$this->dst = $config['board_dst'] * 3600;

			if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
			{
				$accept_lang_ary = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
				foreach ($accept_lang_ary as $accept_lang)
				{
					// Set correct format ... guess full xx_YY form
					$accept_lang = substr($accept_lang, 0, 2) . '_' . strtoupper(substr($accept_lang, 3, 2));
					if (file_exists($phpbb_root_path . 'language/' . $accept_lang . "/common.$phpEx"))
					{
						$this->lang_name = $config['default_lang'] = $accept_lang;
						$this->lang_path = $phpbb_root_path . 'language/' . $accept_lang . '/';
						break;
					}
					else
					{
						// No match on xx_YY so try xx
						$accept_lang = substr($accept_lang, 0, 2);
						if (file_exists($phpbb_root_path . 'language/' . $accept_lang . "/common.$phpEx"))
						{
							$this->lang_name = $config['default_lang'] = $accept_lang;
							$this->lang_path = $phpbb_root_path . 'language/' . $accept_lang . '/';
							break;
						}
					}
				}
			}
		}

		// We include common language file here to not load it every time a custom language file is included
		$lang = &$this->lang;
		if ((@include $this->lang_path . "common.$phpEx") === false)
		{
			die("Language file " . $this->lang_path . "common.$phpEx" . " couldn't be opened.");
		}


		$this->add_lang($lang_set);
		unset($lang_set);

		if (!empty($_GET['style']) && $auth->acl_get('a_styles'))
		{
			global $SID;

			$style = request_var('style', 0);
			$SID .= '&amp;style=' . $style;
		}
		else
		{
			// Set up style
			$style = ($style) ? $style : ((!$config['override_user_style'] && $this->data['user_id'] != ANONYMOUS) ? $this->data['user_style'] : $config['default_style']);
		}

		$sql = 'SELECT s.style_id, t.*, c.*, i.*
			FROM ' . STYLES_TABLE . ' s, ' . STYLES_TPL_TABLE . ' t, ' . STYLES_CSS_TABLE . ' c, ' . STYLES_IMAGE_TABLE . " i
			WHERE s.style_id = $style
				AND t.template_id = s.template_id
				AND c.theme_id = s.theme_id
				AND i.imageset_id = s.imageset_id";
		$result = $db->sql_query($sql, 3600);
		$this->theme = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		if (!$this->theme)
		{
			trigger_error('Could not get style data', E_USER_ERROR);
		}

		// Now parse the cfg file and cache it
		$parsed_items = $cache->obtain_cfg_items($this->theme);
		
		// We are only interested in the theme configuration for now
		$parsed_items = $parsed_items['theme'];

		$check_for = array(
			'parse_css_file'	=> (int) 0,
			'pagination_sep'	=> (string) ', '
		);

		foreach ($check_for as $key => $default_value)
		{
			$this->theme[$key] = (isset($parsed_items[$key])) ? $parsed_items[$key] : $default_value;
			settype($this->theme[$key], gettype($default_value));

			if (is_string($default_value))
			{
				$this->theme[$key] = htmlspecialchars($this->theme[$key]);
			}
		}

		if (!$this->theme['theme_storedb'] && $this->theme['parse_css_file'])
		{
			$this->theme['theme_storedb'] = 1;

			$sql_ary = array(
				'theme_data'	=> implode('', file("{$phpbb_root_path}styles/" . $this->theme['theme_path'] . '/theme/stylesheet.css')),
				'theme_mtime'	=> time(),
				'theme_storedb'	=> 1
			);

			$db->sql_query('UPDATE ' . STYLES_CSS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_ary) . '
				WHERE theme_id = ' . $this->theme['theme_id']);

			unset($sql_ary);
		}

		$template->set_template();

		$this->img_lang = (file_exists($phpbb_root_path . 'styles/' . $this->theme['imageset_path'] . '/imageset/' . $this->lang_name)) ? $this->lang_name : $config['default_lang'];

		// Is board disabled and user not an admin or moderator?
		// TODO
		// New ACL enabling board access while offline?
		if ($config['board_disable'] && !defined('IN_LOGIN') && !$auth->acl_gets('a_', 'm_'))
		{
			$message = (!empty($config['board_disable_msg'])) ? $config['board_disable_msg'] : 'BOARD_DISABLE';
			trigger_error($message);
		}

		// Does the user need to change their password? If so, redirect to the
		// ucp profile reg_details page ... of course do not redirect if we're
		// already in the ucp
		if (!defined('IN_ADMIN') && $config['chg_passforce'] && $this->data['user_passchg'] < time() - ($config['chg_passforce'] * 86400))
		{
			global $SID;

			if (strpos($this->page, 'mode=reg_details') !== false && strpos($this->page, "ucp.$phpEx") !== false)
			{
				redirect("ucp.$phpEx$SID&i=profile&mode=reg_details");
			}
		}

		return;
	}

	// Add Language Items - use_db and use_help are assigned where needed (only use them to force inclusion)
	//
	// $lang_set = array('posting', 'help' => 'faq');
	// $lang_set = array('posting', 'viewtopic', 'help' => array('bbcode', 'faq'))
	// $lang_set = array(array('posting', 'viewtopic'), 'help' => array('bbcode', 'faq'))
	// $lang_set = 'posting'
	// $lang_set = array('help' => 'faq', 'db' => array('help:faq', 'posting'))
	function add_lang($lang_set, $use_db = false, $use_help = false)
	{
		global $phpEx;

		if (is_array($lang_set))
		{
			foreach ($lang_set as $key => $lang_file)
			{
				// Please do not delete this line.
				// We have to force the type here, else [array] language inclusion will not work
				$key = (string) $key;

				if ($key == 'db')
				{
					$this->add_lang($lang_file, true, $use_help);
				}
				else if ($key == 'help')
				{
					$this->add_lang($lang_file, $use_db, true);
				}
				else if (!is_array($lang_file))
				{
					$this->set_lang($this->lang, $this->help, $lang_file, $use_db, $use_help);
				}
				else
				{
					$this->add_lang($lang_file, $use_db, $use_help);
				}
			}
			unset($lang_set);
		}
		else if ($lang_set)
		{
			$this->set_lang($this->lang, $this->help, $lang_set, $use_db, $use_help);
		}
	}

	function set_lang(&$lang, &$help, $lang_file, $use_db = false, $use_help = false)
	{
		global $phpEx;

		// $lang == $this->lang
		// $help == $this->help
		// - add appropiate variables here, name them as they are used within the language file...
		if (!$use_db)
		{
			if ((include($this->lang_path . (($use_help) ? 'help_' : '') . "$lang_file.$phpEx")) === false)
			{
				trigger_error("Language file {$this->lang_path}" . (($use_help) ? 'help_' : '') . "$lang_file.$phpEx couldn't be opened.");
			}
		}
		else if ($use_db)
		{
			// Get Database Language Strings
			// Put them into $lang if nothing is prefixed, put them into $help if help: is prefixed
			// For example: help:faq, posting
		}
	}

	function format_date($gmepoch, $format = false, $forcedate = false)
	{
		static $lang_dates, $midnight;

		if (empty($lang_dates))
		{
			foreach ($this->lang['datetime'] as $match => $replace)
			{
				$lang_dates[$match] = $replace;
			}
		}

		$format = (!$format) ? $this->date_format : $format;

		if (!$midnight)
		{
			list($d, $m, $y) = explode(' ', gmdate('j n Y', time() + $this->timezone + $this->dst));
			$midnight = gmmktime(0, 0, 0, $m, $d, $y) - $this->timezone - $this->dst;
		}

		if (strpos($format, '|') === false || (!($gmepoch > $midnight && !$forcedate) && !($gmepoch > $midnight - 86400 && !$forcedate)))
		{
			return strtr(@gmdate(str_replace('|', '', $format), $gmepoch + $this->timezone + $this->dst), $lang_dates);
		}

		if ($gmepoch > $midnight && !$forcedate)
		{
			$format = substr($format, 0, strpos($format, '|')) . '||' . substr(strrchr($format, '|'), 1);
			return str_replace('||', $this->lang['datetime']['TODAY'], strtr(@gmdate($format, $gmepoch + $this->timezone + $this->dst), $lang_dates));
		}
		else if ($gmepoch > $midnight - 86400 && !$forcedate)
		{
			$format = substr($format, 0, strpos($format, '|')) . '||' . substr(strrchr($format, '|'), 1);
			return str_replace('||', $this->lang['datetime']['YESTERDAY'], strtr(@gmdate($format, $gmepoch + $this->timezone + $this->dst), $lang_dates));
		}
	}

	function get_iso_lang_id()
	{
		global $config, $db;

		if (isset($this->lang_id))
		{
			return $this->lang_id;
		}

		if (!$this->lang_name)
		{
			$this->lang_name = $config['default_lang'];
		}

		$sql = 'SELECT lang_id
			FROM ' . LANG_TABLE . "
			WHERE lang_iso = '{$this->lang_name}'";
		$result = $db->sql_query($sql);

		return (int) $db->sql_fetchfield('lang_id', 0, $result);
	}

	// Get profile fields for user
	function get_profile_fields($user_id)
	{
		global $db;

		if (isset($this->profile_fields))
		{
			return;
		}

		$sql = 'SELECT * FROM ' . PROFILE_DATA_TABLE . "
			WHERE user_id = $user_id";
		$result = $db->sql_query_limit($sql, 1);

		$this->profile_fields = (!($row = $db->sql_fetchrow($result))) ? array() : $row;
		$db->sql_freeresult($result);
	}

	function img($img, $alt = '', $width = false, $suffix = '', $type = 'full_tag')
	{
		static $imgs;
		global $phpbb_root_path;

		if (empty($imgs[$img . $suffix]) || $width !== false)
		{
			if (!isset($this->theme[$img]) || !$this->theme[$img])
			{
				// Do not fill the image to let designers decide what to do if the image is empty
				$imgs[$img . $suffix] = '';
				return $imgs[$img . $suffix];
			}

			if ($width === false)
			{
				list($imgsrc, $height, $width) = explode('*', $this->theme[$img]);
			}
			else
			{
				list($imgsrc, $height) = explode('*', $this->theme[$img]);
			}

			if ($suffix !== '')
			{
				$imgsrc = str_replace('{SUFFIX}', $suffix, $imgsrc);
			}

			$imgs[$img . $suffix]['src'] = $phpbb_root_path . 'styles/' . $this->theme['imageset_path'] . '/imageset/' . str_replace('{LANG}', $this->img_lang, $imgsrc);
			$imgs[$img . $suffix]['width'] = $width;
			$imgs[$img . $suffix]['height'] = $height;
		}

		$alt = (!empty($this->lang[$alt])) ? $this->lang[$alt] : $alt;
		
		switch ($type)
		{
			case 'src':
				return $imgs[$img . $suffix]['src'];
				break;
			
			case 'width':
				return $imgs[$img . $suffix]['width'];
				break;

			case 'height':
				return $imgs[$img . $suffix]['height'];
				break;

			default:
				return '<img src="' . $imgs[$img . $suffix]['src'] . '"' . (($imgs[$img . $suffix]['width']) ? ' width="' . $imgs[$img . $suffix]['width'] . '"' : '') . (($imgs[$img . $suffix]['height']) ? ' height="' . $imgs[$img . $suffix]['height'] . '"' : '') . ' alt="' . $alt . '" title="' . $alt . '" />';
				break;
		}
	}

	// Start code for checking/setting option bit field for user table
	function optionget($key, $data = false)
	{
		if (!isset($this->keyvalues[$key]))
		{
			$var = ($data) ? $data : $this->data['user_options'];
			$this->keyvalues[$key] = ($var & 1 << $this->keyoptions[$key]) ? true : false;
		}
		return $this->keyvalues[$key];
	}

	function optionset($key, $value, $data = false)
	{
		$var = ($data) ? $data : $this->data['user_options'];

		if ($value && !($var & 1 << $this->keyoptions[$key]))
		{
			$var += 1 << $this->keyoptions[$key];
		}
		else if (!$value && ($var & 1 << $this->keyoptions[$key]))
		{
			$var -= 1 << $this->keyoptions[$key];
		}
		else
		{
			return ($data) ? $var : false;
		}

		if (!$data)
		{
			$this->data['user_options'] = $var;
			return true;
		}
		else
		{
			return $var;
		}
	}
}

?>