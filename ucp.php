<?php 
// -------------------------------------------------------------
//
// $Id$
//
// FILENAME  : bbcode.php 
// STARTED   : Thu Nov 21, 2002
// COPYRIGHT : � 2001, 2003 phpBB Group
// WWW       : http://www.phpbb.com/
// LICENCE   : GPL vs2.0 [ see /docs/COPYING ] 
// 
// -------------------------------------------------------------

// TODO for 2.2:
//
// * Registration
//    * Link to (additional?) registration conditions
//    * Admin forced revalidation of given user/s from ACP

// * Opening tab:
//    * Last visit time
//    * Last active in
//    * Most active in
//    * New PM counter
//    * Unread PM counter
//    * Link/s to MCP if applicable?

// * Black and White lists
//    * Mark posts/PM's of buddies different colour?

// * PM system
//    * See privmsg

// * Permissions?
//    * List permissions granted to this user (in UCP and ACP UCP)

define('IN_PHPBB', true);
$phpbb_root_path = './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.'.$phpEx);
include($phpbb_root_path . '/includes/functions_user.'.$phpEx);


// ---------
// FUNCTIONS
//
class module
{
	var $id = 0;
	var $type;
	var $name;
	var $mode;

	// Private methods, should not be overwritten
	function create($module_type, $module_url, $selected_mod = false, $selected_submod = false)
	{
		global $template, $auth, $db, $user;

		$sql = 'SELECT module_id, module_title, module_filename, module_subs, module_acl
			FROM ' . MODULES_TABLE . "
			WHERE module_type = '{$module_type}'
				AND module_enabled = 1
			ORDER BY module_order ASC";
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			// Authorisation is required for the basic module
			if ($row['module_acl'])
			{
				$is_auth = FALSE;
				foreach (explode(',', $row['module_acl']) as $auth_option)
				{
					if ($auth->acl_get($auth_option))
					{
						$is_auth = TRUE;
						break;
					}
				}

				// The user is not authorised to use this module, skip it
				if (!$is_auth)
				{
					continue;
				}
			}

			$selected = ($row['module_filename'] == $selected_mod || $row['module_id'] == $selected_mod || (!$selected_mod && !$i)) ?  true : false;

			// Get the localised lang string if available, or make up our own otherwise
			$template->assign_block_vars($module_type . '_section', array(
				'L_TITLE'		=> (isset($user->lang[strtoupper($module_type) . '_' . $row['module_title']])) ? $user->lang[strtoupper($module_type) . '_' . $row['module_title']] : ucfirst(str_replace('_', ' ', strtolower($row['module_title']))),
				'S_SELECTED'	=> $selected, 
				'U_TITLE'		=> $module_url . '&amp;i=' . $row['module_id'])
			);

			if ($selected)
			{
				$module_id = $row['module_id'];
				$module_name = $row['module_filename'];

				if ($row['module_subs'])
				{
					$j = 0;
					$submodules_ary = explode("\n", $row['module_subs']);
					foreach ($submodules_ary as $submodule)
					{
						$submodule = explode(',', trim($submodule));
						$submodule_title = array_shift($submodule);

						$is_auth = true;
						foreach ($submodule as $auth_option)
						{
							if (!$auth->acl_get($auth_option))
							{
								$is_auth = false;
							}
						}

						if (!$is_auth)
						{
							continue;
						}

						$selected = ($submodule_title == $selected_submod || (!$selected_submod && !$j)) ? true : false;

						// Get the localised lang string if available, or make up our own otherwise
						$template->assign_block_vars("{$module_type}_section.{$module_type}_subsection", array(
							'L_TITLE'		=> (isset($user->lang[strtoupper($module_type) . '_' . strtoupper($submodule_title)])) ? $user->lang[strtoupper($module_type) . '_' . strtoupper($submodule_title)] : ucfirst(str_replace('_', ' ', strtolower($submodule_title))),
							'S_SELECTED'	=> $selected, 
							'U_TITLE'		=> $module_url . '&amp;i=' . $module_id . '&amp;mode=' . $submodule_title
						));

						if ($selected)
						{
							$this->mode = $submodule_title;
						}

						$j++;
					}
				}
			}

			$i++;
		}
		$db->sql_freeresult($result);

		if (!$module_id)
		{
			trigger_error('MODULE_NOT_EXIST');
		}

		$this->type = $module_type;
		$this->id = $module_id;
		$this->name = $module_name;
	}

	function load($type = false, $name = false, $mode = false, $run = true)
	{
		global $phpbb_root_path, $phpEx;

		if ($type)
		{
			$this->type = $type;
		}

		if ($name)
		{
			$this->name = $name;
		}

		if (!class_exists($this->type . '_' . $this->name))
		{
			require_once($phpbb_root_path . "includes/{$this->type}/{$this->type}_{$this->name}.$phpEx");

			if ($run)
			{
				eval("\$this->module = new {$this->type}_{$this->name}(\$this->id, \$this->mode);");
				if (method_exists($this->module, 'init'))
				{
					$this->module->init();
				}
			}
		}
	}

	// Displays the appropriate template with the given title
	function display($page_title, $tpl_name)
	{
		global $template;

		page_header($page_title);

		$template->set_filenames(array(
			'body' => $tpl_name)
		);

		page_footer();
	}


	// Public methods to be overwritten by modules
	function module()
	{
		// Module name
		// Module filename
		// Module description
		// Module version
		// Module compatibility
		return false;
	}

	function init()
	{
		return false;
	}

	function install()
	{
		return false;
	}

	function uninstall()
	{
		return false;
	}
}
//
// FUNCTIONS
// ---------


// Start session management
$user->start();
$auth->acl($user->data);
$user->setup();

$ucp = new module();

// Basic parameter data
$mode	= request_var('mode', '');
$module = request_var('i', '');

// Basic "global" modes
switch ($mode)
{
	case 'activate':
		$ucp->load('ucp', 'activate');
		$ucp->module->ucp_activate();
		redirect("index.$phpEx$SID");
		break;

	case 'sendpassword':
		$ucp->load('ucp', 'remind');
		$ucp->module->ucp_remind();
		break;

	case 'register':
		if ($user->data['user_id'] != ANONYMOUS)
		{
			redirect("index.$phpEx$SID");
		}

		$ucp->load('ucp', 'register');
		$ucp->module->ucp_register();
		break;

	case 'confirm':
		$ucp->load('ucp', 'confirm');
		$ucp->module->ucp_confirm();
		break;

	case 'login':
		if ($user->data['user_id'] != ANONYMOUS)
		{
			redirect("index.$phpEx$SID");
		}

		define('IN_LOGIN', true);
		login_box("ucp.$phpEx$SID&amp;mode=login");
		redirect("index.$phpEx$SID");
		break;

	case 'logout':
		if ($user->data['user_id'] != ANONYMOUS)
		{
			$user->destroy();
		}

		redirect("index.$phpEx$SID");
		break;
}


// Only registered users can go beyond this point
if ($user->data['user_type'] == USER_INACTIVE || $user->data['user_type'] == USER_IGNORE)
{
	redirect("index.$phpEx");
}


// Word censors $censors['match'] & $censors['replace']
$censors = array();
obtain_word_list($censors);


// Output listing of friends online
$sql = 'SELECT DISTINCT u.user_id, u.username, MAX(s.session_time) as online_time, MIN(s.session_allow_viewonline) AS viewonline 
	FROM ((' . ZEBRA_TABLE . ' z 
	LEFT JOIN ' . SESSIONS_TABLE . ' s ON s.session_user_id = z.zebra_id), ' . USERS_TABLE . ' u)
	WHERE z.user_id = ' . $user->data['user_id'] . ' 
		AND z.friend = 1 
		AND u.user_id = z.zebra_id  
	GROUP BY z.zebra_id';
$result = $db->sql_query($sql);

$update_time = $config['load_online_time'] * 60;
while ($row = $db->sql_fetchrow($result))
{
	$which = (time() - $update_time < $row['online_time']) ? 'online' : 'offline';

	$template->assign_block_vars("friends_{$which}", array(
		'U_PROFILE'	=> "memberlist.$phpEx$SID&amp;mode=viewprofile&amp;u=" . $row['user_id'],

		'USERNAME'	=> $row['username'])
	);
}
$db->sql_freeresult($result);


// Instantiate module system and generate list of available modules
$ucp->create('ucp', "ucp.$phpEx$SID", $module, $mode);

// Load and execute the relevant module
$ucp->load();

?>