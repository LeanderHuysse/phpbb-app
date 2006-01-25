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
* Permission/Auth class
*/
class auth
{
	var $acl = array();
	var $acl_options = array();

	/**
	* Init permissions
	*/
	function acl(&$userdata)
	{
		global $db, $cache;

		$this->acl = array();

		if (!($this->acl_options = $cache->get('acl_options')))
		{
			$sql = 'SELECT auth_option, is_global, is_local
				FROM ' . ACL_OPTIONS_TABLE . '
				ORDER BY auth_option_id';
			$result = $db->sql_query($sql);

			$global = $local = 0;
			while ($row = $db->sql_fetchrow($result))
			{
				if ($row['is_global'])
				{
					$this->acl_options['global'][$row['auth_option']] = $global++;
				}

				if ($row['is_local'])
				{
					$this->acl_options['local'][$row['auth_option']] = $local++;
				}
			}
			$db->sql_freeresult($result);

			$cache->put('acl_options', $this->acl_options);
			$this->acl_clear_prefetch();
			$this->acl_cache($userdata);
		}
		else if (!trim($userdata['user_permissions']))
		{
			$this->acl_cache($userdata);
		}

		$user_permissions = explode("\n", $userdata['user_permissions']);

		foreach ($user_permissions as $f => $seq)
		{
			if ($seq)
			{
				$i = 0;

				if (!isset($this->acl[$f]))
				{
					$this->acl[$f] = '';
				}

				while ($subseq = substr($seq, $i, 6))
				{
					// We put the original bitstring into the acl array
					$this->acl[$f] .= str_pad(base_convert($subseq, 36, 2), 31, 0, STR_PAD_LEFT);
					$i += 6;
				}
			}
		}

		return;
	}

	/**
	* Look up an option
	* if the option is prefixed with !, then the result becomes negated
	*/
	function acl_get($opt, $f = 0)
	{
		static $cache;

		if (!isset($cache))
		{
			$cache = array();
		}

		$negate = false;

		if (strpos($opt, '!') === 0)
		{
			$negate = true;
			$opt = substr($opt, 1);
		}

		if (!isset($cache[$f][$opt]))
		{
			// We combine the global/local option with an OR because some options are global and local.
			// If the user has the global permission the local one is true too and vice versa
			$cache[$f][$opt] = false;

			// Is this option a global permission setting?
			if (isset($this->acl_options['global'][$opt]))
			{
				if (isset($this->acl[0]))
				{
					$cache[$f][$opt] = $this->acl[0]{$this->acl_options['global'][$opt]};
				}
			}

			// Is this option a local permission setting?
			if (isset($this->acl_options['local'][$opt]))
			{
				if (isset($this->acl[$f]))
				{
					$cache[$f][$opt] |= $this->acl[$f]{$this->acl_options['local'][$opt]};
				}
			}
		}

		// Founder always has all global options set to true...
		return ($negate) ? !$cache[$f][$opt] : $cache[$f][$opt];
	}

	/**
	* Get forums with the specified permission setting
	* if the option is prefixed with !, then the result becomes nagated
	*
	* @param bool $clean set to true if only values needs to be returned which are set/unset
	*/
	function acl_getf($opt, $clean = false)
	{
		static $cache;

		$acl_f = array();

		if (!isset($cache))
		{
			$cache = array();
		}

		$negate = false;

		if (strpos($opt, '!') === 0)
		{
			$negate = true;
			$opt = substr($opt, 1);
		}

		// If we retrieve a list of forums not having permissions in, we need to get every forum_id
		if ($negate)
		{
			static $acl_forum_ids;

			if (!isset($acl_forum_ids))
			{
				global $db;

				$sql = 'SELECT forum_id 
					FROM ' . FORUMS_TABLE;
				
				if (sizeof($this->acl))
				{
					$sql .= ' WHERE forum_id NOT IN (' . implode(', ', array_keys($this->acl)) . ')';
				}
				$result = $db->sql_query($sql);

				while ($row = $db->sql_fetchrow($result))
				{
					$acl_forum_ids[] = $row['forum_id'];
				}
				$db->sql_freeresult($result);
			}
		}
		
		if (isset($this->acl_options['local'][$opt]))
		{
			foreach ($this->acl as $f => $bitstring)
			{
				// Skip global settings
				if (!$f)
				{
					continue;
				}

				$allowed = (!isset($cache[$f][$opt])) ? $this->acl_get($opt, $f) : $cache[$f][$opt];

				if (!$clean)
				{
					$acl_f[$f][$opt] = ($negate) ? !$allowed : $allowed;
				}
				else
				{
					if (($negate && !$allowed) || (!$negate && $allowed))
					{
						$acl_f[$f][$opt] = 1;
					}
				}
			}
		}

		// If we get forum_ids not having this permission, we need to fill the remaining parts
		if ($negate && sizeof($acl_forum_ids))
		{
			foreach ($acl_forum_ids as $f)
			{
				$acl_f[$f][$opt] = 1;
			}
		}

		return $acl_f;
	}

	/**
	* Get permission settings (more than one)
	*/
	function acl_gets()
	{
		$args = func_get_args();
		$f = array_pop($args);

		if (!is_numeric($f))
		{
			$args[] = $f;
			$f = 0;
		}

		// alternate syntax: acl_gets(array('m_', 'a_'), $forum_id)
		if (is_array($args[0]))
		{
			$args = $args[0];
		}

		$acl = 0;
		foreach ($args as $opt)
		{
			$acl |= $this->acl_get($opt, $f);
		}

		return $acl;
	}

	/**
	* Get permission listing based on user_id/options/forum_ids
	*/
	function acl_get_list($user_id = false, $opts = false, $forum_id = false)
	{
		$hold_ary = $this->acl_raw_data($user_id, $opts, $forum_id);

		$auth_ary = array();
		foreach ($hold_ary as $user_id => $forum_ary)
		{
			foreach ($forum_ary as $forum_id => $auth_option_ary)
			{
				foreach ($auth_option_ary as $auth_option => $auth_setting)
				{
					if ($auth_setting)
					{
						$auth_ary[$forum_id][$auth_option][] = $user_id;
					}
				}
			}
		}

		return $auth_ary;
	}

	/**
	* Cache data to user_permissions row
	*/
	function acl_cache(&$userdata)
	{
		global $db;
		
		// Empty user_permissions
		$userdata['user_permissions'] = '';
		
		$hold_ary = $this->acl_raw_data($userdata['user_id'], false, false);
		
		if (isset($hold_ary[$userdata['user_id']]))
		{
			$hold_ary = $hold_ary[$userdata['user_id']];
		}
		
		// Key 0 in $hold_ary are global options, all others are forum_ids

		// If this user is founder we're going to force fill the admin options ...
		if ($userdata['user_type'] == USER_FOUNDER)
		{
			foreach ($this->acl_options['global'] as $opt => $id)
			{
				if (strpos($opt, 'a_') === 0)
				{
					$hold_ary[0][$opt] = 1;
				}
			}
		}

		$hold_str = '';
		if (sizeof($hold_ary))
		{
			ksort($hold_ary);

			$last_f = 0;

			foreach ($hold_ary as $f => $auth_ary)
			{
				$ary_key = (!$f) ? 'global' : 'local';

				$bitstring = array();
				foreach ($this->acl_options[$ary_key] as $opt => $id)
				{
					if (isset($auth_ary[$opt]))
					{
						$bitstring[$id] = 1;

						$option_key = substr($opt, 0, strpos($opt, '_') + 1);

						// If one option is allowed, the global permission for this option has to be allowed too
						// example: if the user has the a_ permission this means he has one or more a_* permissions
						if (!isset($bitstring[$this->acl_options[$ary_key][$option_key]]) || !$bitstring[$this->acl_options[$ary_key][$option_key]])
						{
							$bitstring[$this->acl_options[$ary_key][$option_key]] = 1;
						}
					}
					else
					{
						$bitstring[$id] = 0;
					}
				}

				// Now this bitstring defines the permission setting for the current forum $f (or global setting)
				$bitstring = implode('', $bitstring);

				// The line number indicates the id, therefore we have to add empty lines for those ids not present
				$hold_str .= str_repeat("\n", $f - $last_f);
			
				// Convert bitstring for storage - we do not use binary/bytes because PHP's string functions are not fully binary safe
				for ($i = 0; $i < strlen($bitstring); $i += 31)
				{
					$hold_str .= str_pad(base_convert(str_pad(substr($bitstring, $i, 31), 31, 0, STR_PAD_RIGHT), 2, 36), 6, 0, STR_PAD_LEFT);
				}

				$last_f = $f;
			}
			unset($bitstring);

			$userdata['user_permissions'] = rtrim($hold_str);

			$sql = 'UPDATE ' . USERS_TABLE . "
				SET user_permissions = '" . $db->sql_escape($userdata['user_permissions']) . "'
				WHERE user_id = " . $userdata['user_id'];
			$db->sql_query($sql);
		}
		unset($hold_ary);

		return;
	}

	/**
	* Clear one or all users cached permission settings
	*/
	function acl_clear_prefetch($user_id = false)
	{
		global $db;

		$where_sql = ($user_id !== false) ? ' WHERE user_id ' . ((is_array($user_id)) ? ' IN (' . implode(', ', array_map('intval', $user_id)) . ')' : " = $user_id") : '';

		$sql = 'UPDATE ' . USERS_TABLE . "
			SET user_permissions = ''
			$where_sql";
		$db->sql_query($sql);

		return;
	}

	/**
	* Get raw acl data based on user/option/forum
	*/
	function acl_raw_data($user_id = false, $opts = false, $forum_id = false)
	{
		global $db;

		$sql_user = ($user_id !== false) ? ((!is_array($user_id)) ? "user_id = $user_id" : 'user_id IN (' . implode(', ', $user_id) . ')') : '';
		$sql_forum = ($forum_id !== false) ? ((!is_array($forum_id)) ? "AND a.forum_id = $forum_id" : 'AND a.forum_id IN (' . implode(', ', $forum_id) . ')') : '';

		$sql_opts = '';

		if ($opts !== false)
		{
			if (!is_array($opts))
			{
				$sql_opts = (strpos($opts, '%') !== false) ? "AND ao.auth_option LIKE '" . $db->sql_escape($opts) . "'" : "AND ao.auth_option = '" . $db->sql_escape($opts) . "'";
			}
			else
			{
				$sql_opts = 'AND ao.auth_option IN (' . implode(', ', preg_replace('#^\s*(.*)\s*$#e', "\"'\" . \$db->sql_escape('\\1') . \"'\"", $opts)) . ')';
			}
		}

		$hold_ary = array();

		// First grab user settings ... each user has only one setting for each
		// option ... so we shouldn't need any ACL_NO checks ... he says ...
		$sql = 'SELECT ao.auth_option, a.user_id, a.forum_id, a.auth_setting
			FROM ' . ACL_OPTIONS_TABLE . ' ao, ' . ACL_USERS_TABLE . ' a
			WHERE ao.auth_option_id = a.auth_option_id
				' . (($sql_user) ? 'AND a.' . $sql_user : '') . "
				$sql_forum
				$sql_opts
			ORDER BY a.forum_id, ao.auth_option";
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$hold_ary[$row['user_id']][$row['forum_id']][$row['auth_option']] = $row['auth_setting'];
		}
		$db->sql_freeresult($result);

		// Now grab group settings ... ACL_NO overrides ACL_YES so act appropriatley
		$sql = 'SELECT ug.user_id, ao.auth_option, a.forum_id, a.auth_setting
			FROM ' . USER_GROUP_TABLE . ' ug, ' . ACL_OPTIONS_TABLE . ' ao, ' . ACL_GROUPS_TABLE . ' a
			WHERE ao.auth_option_id = a.auth_option_id
				AND a.group_id = ug.group_id
				' . (($sql_user) ? 'AND ug.' . $sql_user : '') . "
				$sql_forum
				$sql_opts
			ORDER BY a.forum_id, ao.auth_option";
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			if (!isset($hold_ary[$row['user_id']][$row['forum_id']][$row['auth_option']]) || (isset($hold_ary[$row['user_id']][$row['forum_id']][$row['auth_option']]) && $hold_ary[$row['user_id']][$row['forum_id']][$row['auth_option']] != ACL_NO))
			{
				$hold_ary[$row['user_id']][$row['forum_id']][$row['auth_option']] = $row['auth_setting'];
			}
		}
		$db->sql_freeresult($result);

		return $hold_ary;
	}

	/**
	* Get raw group based permission settings
	*/
	function acl_group_raw_data($group_id = false, $opts = false, $forum_id = false)
	{
		global $db;

		$sql_group = ($group_id !== false) ? ((!is_array($group_id)) ? "group_id = $group_id" : 'group_id IN (' . implode(', ', $group_id) . ')') : '';
		$sql_forum = ($forum_id !== false) ? ((!is_array($forum_id)) ? "AND a.forum_id = $forum_id" : 'AND a.forum_id IN (' . implode(', ', $forum_id) . ')') : '';

		if ($opts !== false)
		{
			if (!is_array($opts))
			{
				$sql_opts = (strpos($opts, '%') !== false) ? "AND ao.auth_option LIKE '" . $db->sql_escape($opts) . "'" : "AND ao.auth_option = '" . $db->sql_escape($opts) . "'";
			}
			else
			{
				$sql_opts = 'AND ao.auth_option IN (' . implode(', ', preg_replace('#^\s*(.*)\s*$#e', "\"'\" . \$db->sql_escape('\\1') . \"'\"", $opts)) . ')';
			}
		}

		$hold_ary = array();

		// Grab group settings... 
		$sql = 'SELECT a.group_id, ao.auth_option, a.forum_id, a.auth_setting
			FROM ' . ACL_OPTIONS_TABLE . ' ao, ' . ACL_GROUPS_TABLE . ' a
			WHERE ao.auth_option_id = a.auth_option_id
				' . (($sql_group) ? 'AND a.' . $sql_group : '') . "
				$sql_forum
				$sql_opts
			ORDER BY a.forum_id, ao.auth_option";
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$hold_ary[$row['group_id']][$row['forum_id']][$row['auth_option']] = $row['auth_setting'];
		}
		$db->sql_freeresult($result);

		return $hold_ary;
	}

	/**
	* Authentication plug-ins is largely down to Sergey Kanareykin, our thanks to him.
	* @todo replace this with a new system
	*/
	function login($username, $password, $autologin = false, $viewonline = 1, $admin = 0)
	{
		global $config, $db, $user, $phpbb_root_path, $phpEx;

		$method = trim($config['auth_method']);

		if (file_exists($phpbb_root_path . 'includes/auth/auth_' . $method . '.' . $phpEx))
		{
			include_once($phpbb_root_path . 'includes/auth/auth_' . $method . '.' . $phpEx);

			$method = 'login_' . $method;
			if (function_exists($method))
			{
				$login = $method($username, $password);

				// If login returned anything other than an array there was an error
				if (!is_array($login))
				{
					/**
					* @todo Login Attempt++
					*/
					return $login;
				}
				
				return $user->session_create($login['user_id'], $admin, $autologin, $viewonline);
			}
		}

		trigger_error('Authentication method not found', E_USER_ERROR);
	}
}

/**
* @package phpBB3
*/
class auth_admin extends auth
{
	/**
	* Init auth settings
	*/
	function auth_admin()
	{
		global $db, $cache;

		if (($this->acl_options = $cache->get('acl_options')) === false)
		{
			$sql = 'SELECT auth_option, is_global, is_local
				FROM ' . ACL_OPTIONS_TABLE . '
				ORDER BY auth_option_id';
			$result = $db->sql_query($sql);

			$global = $local = 0;
			while ($row = $db->sql_fetchrow($result))
			{
				if ($row['is_global'])
				{
					$this->acl_options['global'][$row['auth_option']] = $global++;
				}

				if ($row['is_local'])
				{
					$this->acl_options['local'][$row['auth_option']] = $local++;
				}
			}
			$db->sql_freeresult($result);

			$cache->put('acl_options', $this->acl_options);
		}
	}
	
	/**
	* Get permission mask
	* This function only supports getting permissions of one type (for example a_)
	*
	* @param mixed $user_id user ids to search for (a user_id or a group_id has to be specified at least)
	* @param mixed $group_id group ids to search for, return group related settings (a user_id or a group_id has to be specified at least)
	* @param mixed $forum_id forum_ids to search for. Defining a forum id also means getting local settings
	* @param string $auth_option the auth_option defines the permission setting to look for (a_ for example)
	* @param local|global $scope the scope defines the permission scope. If local, a forum_id is additionally required
	* @param ACL_NO|ACL_UNSET|ACL_YES $acl_fill defines the mode those permissions not set are getting filled with
	*/
	function get_mask($user_id = false, $group_id = false, $forum_id = false, $auth_option = false, $scope = false, $acl_fill = ACL_NO)
	{
		global $db;

		$hold_ary = array();

		if ($auth_option === false || $scope === false)
		{
			return array();
		}

		if ($forum_id !== false)
		{
			$hold_ary = ($group_id !== false) ? $this->acl_group_raw_data($group_id, $auth_option . '%', $forum_id) : $this->acl_raw_data($user_id, $auth_option . '%', $forum_id);
		}
		else
		{
			$hold_ary = ($group_id !== false) ? $this->acl_group_raw_data($group_id, $auth_option . '%', ($scope == 'global') ? 0 : false) : $this->acl_raw_data($user_id, $auth_option . '%', ($scope == 'global') ? 0 : false);
		}

		// Make sure hold_ary is filled with every setting (prevents missing forums/users/groups)
		$ug_id = ($group_id !== false) ? ((!is_array($group_id)) ? array($group_id) : $group_id) : ((!is_array($user_id)) ? array($user_id) : $user_id);
		$forum_ids = ($forum_id !== false) ? ((!is_array($forum_id)) ? array($forum_id) : $forum_id) : (($scope == 'global') ? array(0) : array());

		// If forum_ids is false and the scope is local we actually want to have all forums within the array
		if ($scope == 'local' && !sizeof($forum_ids))
		{
			$sql = 'SELECT forum_id 
				FROM ' . FORUMS_TABLE;
			$result = $db->sql_query($sql, 120);

			while ($row = $db->sql_fetchrow($result))
			{
				$forum_ids[] = $row['forum_id'];
			}
			$db->sql_freeresult($result);
		}

		foreach ($ug_id as $_id)
		{
			if (!isset($hold_ary[$_id]))
			{
				$hold_ary[$_id] = array();
			}

			foreach ($forum_ids as $f_id)
			{
				if (!isset($hold_ary[$_id][$f_id]))
				{
					$hold_ary[$_id][$f_id] = array();
				}
			}
		}

		// Now, we need to fill the gaps with $acl_fill. ;)

		// Only those options we need
		$compare_options = array_diff(preg_replace('/^((?!' . $auth_option . ').+)|(' . $auth_option . ')$/', '', array_keys($this->acl_options[$scope])), array(''));

		// Now switch back to keys
		if (sizeof($compare_options))
		{
			$compare_options = array_combine($compare_options, array_fill(1, sizeof($compare_options), $acl_fill));
		}

		// Defining the user-function here to save some memory
		$return_acl_fill = create_function('$value', 'return ' . $acl_fill . ';');

		// Actually fill the gaps
		if (sizeof($hold_ary))
		{
			foreach ($hold_ary as $ug_id => $row)
			{
				foreach ($row as $id => $options)
				{
					// Not a "fine" solution, but at all it's a 1-dimensional 
					// array_diff_key function filling the resulting array values with zeros
					// The differences get merged into $hold_ary (all permissions having $acl_fill set)
					$hold_ary[$ug_id][$id] = array_merge($options, 

						array_map($return_acl_fill,
							array_flip(
								array_diff(
									array_keys($compare_options), array_keys($options)
								)
							)
						)
					);
				}
			}
		}
		else
		{
			$hold_ary[($group_id !== false) ? $group_id : $user_id][(int) $forum_id] = $compare_options;
		}

		return $hold_ary;
	}

	/**
	* NOTE: this function is not in use atm
	* Add a new option to the list ... $options is a hash of form ->
	* $options = array(
	*	'local'		=> array('option1', 'option2', ...),
	*	'global'	=> array('optionA', 'optionB', ...)
	* );
	*/
	function acl_add_option($options)
	{
		global $db, $cache;

		if (!is_array($options))
		{
			return false;
		}

		$cur_options = array();

		$sql = 'SELECT auth_option, is_global, is_local
			FROM ' . ACL_OPTIONS_TABLE . '
			ORDER BY auth_option_id';
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			if ($row['is_global'])
			{
				$cur_options['global'][] = $row['auth_option'];
			}

			if ($row['is_local'])
			{
				$cur_options['local'][] = $row['auth_option'];
			}
		}
		$db->sql_freeresult($result);

		// Here we need to insert new options ... this requires discovering whether
		// an options is global, local or both and whether we need to add an permission
		// set flag (x_)
		$new_options = array('local' => array(), 'global' => array());

		foreach ($options as $type => $option_ary)
		{
			$option_ary = array_unique($option_ary);

			foreach ($option_ary as $option_value)
			{
				if (!in_array($option_value, $cur_options[$type]))
				{
					$new_options[$type][] = $option_value;
				}

				$flag = substr($option_value, 0, strpos($option_value, '_') + 1);

				if (!in_array($flag, $cur_options[$type]) && !in_array($flag, $new_options[$type]))
				{
					$new_options[$type][] = $flag;
				}
			}
		}
		unset($options);

		$options = array();
		$options['local'] = array_diff($new_options['local'], $new_options['global']);
		$options['global'] = array_diff($new_options['global'], $new_options['local']);
		$options['local_global'] = array_intersect($new_options['local'], $new_options['global']);

		$sql_ary = array();

		foreach ($options as $type => $option_ary)
		{
			foreach ($option_ary as $option)
			{
				$sql_ary[] = array(
					'auth_option'	=> $option,
					'is_global'		=> ($type == 'global' || $type == 'local_global') ? 1 : 0,
					'is_local'		=> ($type == 'local' || $type == 'local_global') ? 1 : 0
				);
			}
		}

		if (sizeof($sql_ary))
		{
			switch (SQL_LAYER)
			{
				case 'mysql':
				case 'mysql4':
				case 'mysqli':
					$db->sql_query('INSERT INTO ' . ACL_OPTIONS_TABLE . ' ' . $db->sql_build_array('MULTI_INSERT', $sql_ary));
				break;

				default:
					foreach ($sql_ary as $ary)
					{
						$db->sql_query('INSERT INTO ' . ACL_OPTIONS_TABLE . ' ' . $db->sql_build_array('INSERT', $ary));
					}
				break;
			}
		}

		$cache->destroy('acl_options');

		return true;
	}

	/**
	* Set a user or group ACL record
	*/
	function acl_set($ug_type, &$forum_id, &$ug_id, &$auth)
	{
		global $db;

		// One or more forums
		if (!is_array($forum_id))
		{
			$forum_id = array($forum_id);
		}

		// Set any flags as required
		foreach ($auth as $auth_option => $setting)
		{
			$flag = substr($auth_option, 0, strpos($auth_option, '_') + 1);

			if (!isset($auth[$flag]) || !$auth[$flag])
			{
				$auth[$flag] = $setting;
			}
		}

		$sql = 'SELECT auth_option_id, auth_option
			FROM ' . ACL_OPTIONS_TABLE;
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$option_ids[$row['auth_option']] = $row['auth_option_id'];
		}
		$db->sql_freeresult($result);

		$sql_forum = 'AND a.forum_id IN (' . implode(', ', array_map('intval', $forum_id)) . ')';

		if ($ug_type == 'user')
		{
			$sql = 'SELECT o.auth_option_id, o.auth_option, a.forum_id, a.auth_setting 
				FROM ' . ACL_USERS_TABLE . ' a, ' . ACL_OPTIONS_TABLE . " o 
				WHERE a.auth_option_id = o.auth_option_id 
					$sql_forum 
					AND a.user_id = $ug_id";
		}
		else
		{
			$sql = 'SELECT o.auth_option_id, o.auth_option, a.forum_id, a.auth_setting 
				FROM ' . ACL_GROUPS_TABLE . ' a, ' . ACL_OPTIONS_TABLE . " o 
				WHERE a.auth_option_id = o.auth_option_id 
					$sql_forum 
					AND a.group_id = $ug_id";
		}
		$result = $db->sql_query($sql);

		$cur_auth = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$cur_auth[$row['forum_id']][$row['auth_option_id']] = $row['auth_setting'];
		}
		$db->sql_freeresult($result);

		$table = ($ug_type == 'user') ? ACL_USERS_TABLE : ACL_GROUPS_TABLE;
		$id_field  = $ug_type . '_id';

		$sql_ary = array();
		foreach ($forum_id as $forum)
		{
			foreach ($auth as $auth_option => $setting)
			{
				$auth_option_id = $option_ids[$auth_option];

				switch ($setting)
				{
					case ACL_UNSET:
						if (isset($cur_auth[$forum][$auth_option_id]))
						{
							$sql_ary['delete'][] = "DELETE FROM $table 
								WHERE forum_id = $forum
									AND auth_option_id = $auth_option_id
									AND $id_field = $ug_id";
						}
					break;

					default:
						if (!isset($cur_auth[$forum][$auth_option_id]))
						{
							$sql_ary['insert'][] = "$ug_id, $forum, $auth_option_id, $setting";
						}
						else if ($cur_auth[$forum][$auth_option_id] != $setting)
						{
							$sql_ary['update'][] = "UPDATE " . $table . " 
								SET auth_setting = $setting 
								WHERE $id_field = $ug_id 
									AND forum_id = $forum 
									AND auth_option_id = $auth_option_id";
						}
				}
			}
		}
		unset($cur_auth);

		$sql = '';
		foreach ($sql_ary as $sql_type => $sql_subary)
		{
			switch ($sql_type)
			{
				case 'insert':
					switch (SQL_LAYER)
					{
						case 'mysql':
							$sql = 'VALUES ' . implode(', ', preg_replace('#^(.*?)$#', '(\1)', $sql_subary));
						break;

						case 'mysql4':
						case 'mysqli':
						case 'mssql':
						case 'mssql_odbc':
						case 'sqlite':
							$sql = implode(' UNION ALL ', preg_replace('#^(.*?)$#', 'SELECT \1', $sql_subary));
						break;

						default:
							foreach ($sql_subary as $sql)
							{
								$sql = "INSERT INTO $table ($id_field, forum_id, auth_option_id, auth_setting) VALUES ($sql)";
								$db->sql_query($sql);
								$sql = '';
							}
					}

					if ($sql != '')
					{
						$sql = "INSERT INTO $table ($id_field, forum_id, auth_option_id, auth_setting) $sql";
						$db->sql_query($sql);
					}
				break;

				case 'update':
				case 'delete':
					foreach ($sql_subary as $sql)
					{
						$db->sql_query($sql);
					}
				break;
			}
			unset($sql_ary[$sql_type]);
		}
		unset($sql_ary);

		$this->acl_clear_prefetch();
	}

	/**
	* Remove local permission
	*/
	function acl_delete($mode, &$forum_id, &$ug_id, $auth_ids = false)
	{
		global $db;

		// One or more forums
		if (!is_array($forum_id))
		{
			$forum_id = array($forum_id);
		}

		$auth_sql = ($auth_ids) ? ' AND auth_option_id IN (' . implode(', ', array_map('intval', $auth_ids)) . ')' : '';

		$table = ($mode == 'user') ? ACL_USERS_TABLE : ACL_GROUPS_TABLE;
		$id_field  = $mode . '_id';

		foreach ($forum_id as $forum)
		{
			$sql = "DELETE FROM $table
				WHERE $id_field = $ug_id
					AND forum_id = $forum
					$auth_sql";
			$db->sql_query($sql);
		}

		$this->acl_clear_prefetch();
	}
}

?>