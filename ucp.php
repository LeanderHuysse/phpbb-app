<?php
/** 
*
* @package ucp
* @version $Id$
* @copyright (c) 2005 phpBB Group 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
require($phpbb_root_path . 'common.'.$phpEx);
require($phpbb_root_path . 'includes/functions_user.'.$phpEx);
require($phpbb_root_path . 'includes/functions_module.'.$phpEx);

// Basic parameter data
$id 	= request_var('i', '');
$mode	= request_var('mode', '');

if ($mode == 'login' || $mode == 'logout')
{
	define('IN_LOGIN', true);
}

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('ucp');

$module = new p_master();

// Basic "global" modes
switch ($mode)
{
	case 'activate':
		$module->load('ucp', 'activate');
		$module->display($user->lang['UCP_ACTIVATE']);

		redirect("index.$phpEx$SID");
	break;

	case 'resend_act':
		$module->load('ucp', 'resend');
		$module->display($user->lang['UCP_RESEND']);
	break;

	case 'sendpassword':
		$module->load('ucp', 'remind');
		$module->display($user->lang['UCP_REMIND']);
	break;

	case 'register':
		if ($user->data['is_registered'] || isset($_REQUEST['not_agreed']))
		{
			redirect("index.$phpEx$SID");
		}

		$module->load('ucp', 'register');
		$module->display($user->lang['REGISTER']);
	break;

	case 'confirm':
		$module->load('ucp', 'confirm');
		exit;
	break;

	case 'login':
		if ($user->data['is_registered'])
		{
			redirect("index.$phpEx$SID");
		}

		login_box("index.$phpEx");
	break;

	case 'logout':
		if ($user->data['user_id'] != ANONYMOUS)
		{
			$user->session_kill();
			$user->session_begin();
		}

		meta_refresh(3, "index.$phpEx$SID");

		$message = $user->lang['LOGOUT_REDIRECT'] . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . "{$phpbb_root_path}index.$phpEx$SID" . '">', '</a> ');
		trigger_error($message);
	break;

	case 'terms':
	case 'privacy':

		$message = ($mode == 'terms') ? 'TERMS_OF_USE_CONTENT' : 'PRIVACY_POLICY';
		$title = ($mode == 'terms') ? 'TERMS_USE' : 'PRIVACY';

		if (empty($user->lang[$message]))
		{
			if ($user->data['is_registered'])
			{
				redirect("index.$phpEx$SID");
			}
	
			login_box();
		}

		$template->set_filenames(array(
			'body'		=> 'ucp_agreement.html')
		);

		page_header($user->lang[$title]);

		$template->assign_vars(array(
			'S_AGREEMENT'			=> true,
			'AGREEMENT_TITLE'		=> $user->lang[$title],
			'AGREEMENT_TEXT'		=> sprintf($user->lang[$message], $config['sitename'], generate_board_url()),
			'U_BACK'				=> "{$phpbb_root_path}ucp.$phpEx$SID&amp;mode=login",
			'L_BACK'				=> $user->lang['BACK_TO_LOGIN'])
		);
		
		page_footer();

	break;

	case 'delete_cookies':
		
		// Delete Cookies with dynamic names (do NOT delete poll cookies)
		if (confirm_box(true))
		{
			$set_time = time() - 31536000;
			foreach ($_COOKIE as $cookie_name => $cookie_data)
			{
				$cookie_name = str_replace($config['cookie_name'] . '_', '', $cookie_name);
				if (strpos($cookie_name, '_poll') === false)
				{
					$user->set_cookie($cookie_name, '', $set_time);
				}
			}
			$user->set_cookie('track', '', $set_time);
			$user->set_cookie('u', '', $set_time);
			$user->set_cookie('k', '', $set_time);
			$user->set_cookie('sid', '', $set_time);

			// We destroy the session here, the user will be logged out nevertheless
			$user->session_kill();
			$user->session_begin();

			meta_refresh(3, "{$phpbb_root_path}index.$phpEx$SID");

			$message = $user->lang['COOKIES_DELETED'] . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], "<a href=\"{$phpbb_root_path}index.$phpEx$SID\">", '</a>');
			trigger_error($message);
		}
		else
		{
			confirm_box(false, 'DELETE_COOKIES', '');
		}
		
		redirect("index.$phpEx$SID");

	break;

	case 'switch_perm':

		$user_id = request_var('u', 0);

		$sql = 'SELECT *
			FROM ' . USERS_TABLE . '
			WHERE user_id = ' . (int) $user_id;
		$result = $db->sql_query($sql);
		$user_row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		if (!$auth->acl_get('a_switchperm') || !$user_row || $user_id == $user->data['user_id'])
		{
			redirect("index.$phpEx$SID");
		}

		include($phpbb_root_path . 'includes/acp/auth.' . $phpEx);

		$auth_admin = new auth_admin();
		if (!$auth_admin->ghost_permissions($user_id, $user->data['user_id']))
		{
			redirect("index.$phpEx$SID");
		}

		$sql = 'SELECT username
			FROM ' . USERS_TABLE . '
			WHERE user_id = ' . $user_id;
		$result = $db->sql_query($sql);
		$username = $db->sql_fetchfield('username');
		$db->sql_freeresult($result);

		add_log('admin', 'LOG_ACL_TRANSFER_PERMISSIONS', $username);

		$message = sprintf($user->lang['PERMISSIONS_TRANSFERED'], $user_row['username']) . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], "<a href=\"{$phpbb_root_path}index.$phpEx$SID\">", '</a>');
		trigger_error($message);

	break;

	case 'restore_perm':

		if (!$user->data['user_perm_from'] || !$auth->acl_get('a_switchperm'))
		{
			redirect("index.$phpEx$SID");
		}

		$auth->acl_cache($user->data);

		$sql = 'UPDATE ' . USERS_TABLE . "
			SET user_perm_from = 0
			WHERE user_id = " . $user->data['user_id'];
		$db->sql_query($sql);

		$sql = 'SELECT username
			FROM ' . USERS_TABLE . '
			WHERE user_id = ' . $user->data['user_perm_from'];
		$result = $db->sql_query($sql);
		$username = $db->sql_fetchfield('username');
		$db->sql_freeresult($result);

		add_log('admin', 'LOG_ACL_RESTORE_PERMISSIONS', $username);

		$message = $user->lang['PERMISSIONS_RESTORED'] . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], "<a href=\"{$phpbb_root_path}index.$phpEx$SID\">", '</a>');
		trigger_error($message);

	break;
}

// Only registered users can go beyond this point
if (!$user->data['is_registered'])
{
	if ($user->data['is_bot'])
	{
		redirect("index.$phpEx$SID");
	}

	login_box('', $user->lang['LOGIN_EXPLAIN_UCP']);
}


// Output listing of friends online
$update_time = $config['load_online_time'] * 60;

$sql = 'SELECT DISTINCT u.user_id, u.username, u.user_allow_viewonline, MAX(s.session_time) as online_time, MIN(s.session_viewonline) AS viewonline
	FROM (' . USERS_TABLE . ' u, ' . ZEBRA_TABLE . ' z)
	LEFT JOIN ' . SESSIONS_TABLE . ' s ON (s.session_user_id = z.zebra_id)
	WHERE z.user_id = ' . $user->data['user_id'] . '
		AND z.friend = 1
		AND u.user_id = z.zebra_id
	GROUP BY z.zebra_id, u.user_id, u.username, u.user_allow_viewonline';
$result = $db->sql_query($sql);

while ($row = $db->sql_fetchrow($result))
{
	$which = (time() - $update_time < $row['online_time'] && $row['viewonline'] && $row['user_allow_viewonline']) ? 'online' : 'offline';

	$template->assign_block_vars("friends_{$which}", array(
		'U_PROFILE'	=> "{$phpbb_root_path}memberlist.$phpEx$SID&amp;mode=viewprofile&amp;u=" . $row['user_id'],

		'USER_ID'	=> $row['user_id'],
		'USERNAME'	=> $row['username'])
	);
}
$db->sql_freeresult($result);

// Output PM_TO box if message composing
if ($mode == 'compose' && request_var('action', '') != 'edit')
{
	if ($config['allow_mass_pm'])
	{
		$sql = 'SELECT group_id, group_name, group_type
			FROM ' . GROUPS_TABLE . '
			WHERE group_type NOT IN (' . GROUP_HIDDEN . ', ' . GROUP_CLOSED . ')
				AND group_receive_pm = 1
			ORDER BY group_type DESC';
		$result = $db->sql_query($sql);

		$group_options = '';
		while ($row = $db->sql_fetchrow($result))
		{
			$group_options .= '<option' . (($row['group_type'] == GROUP_SPECIAL) ? ' class="blue"' : '') . ' value="' . $row['group_id'] . '">' . (($row['group_type'] == GROUP_SPECIAL) ? $user->lang['G_' . $row['group_name']] : $row['group_name']) . '</option>';
		}
		$db->sql_freeresult($result);
	}

	$template->assign_vars(array(
		'S_SHOW_PM_BOX'		=> true,
		'S_ALLOW_MASS_PM'	=> ($config['allow_mass_pm']),
		'S_GROUP_OPTIONS'	=> ($config['allow_mass_pm']) ? $group_options : '',
		'U_SEARCH_USER'		=> "{$phpbb_root_path}memberlist.$phpEx$SID&amp;mode=searchuser&amp;form=post&amp;field=username_list")
	);
}

// Instantiate module system and generate list of available modules
$module->list_modules('ucp');

// Select the active module
$module->set_active($id, $mode);

// Load and execute the relevant module
$module->load_active();

// Assign data to the template engine for the list of modules
$module->assign_tpl_vars("ucp.$phpEx$SID");

// Generate the page
page_header($user->lang['UCP_MAIN']);

$template->set_filenames(array(
	'body' => $module->get_tpl_name())
);

page_footer();


/**
* Function for assigning a template var if the zebra module got included
*/
function _module_zebra($mode, &$module_row)
{
	global $template;

	$template->assign_var('S_ZEBRA_ENABLED', true);
}

?>