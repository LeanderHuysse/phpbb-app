<?php
/***************************************************************************
 *                            usercp_register.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id$
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
	exit;
}

// ---------------------------------------
// Load agreement template since user has not yet
// agreed to registration conditions/coppa
//
function show_coppa()
{
	global $template, $lang, $phpbb_root_path, $phpEx;

	$template->set_filenames(array(
		'body' => 'agreement.html')
	);

	$template->assign_vars(array(
		'REGISTRATION' => $user->lang['Registration'],
		'AGREEMENT' => $user->lang['Reg_agreement'],
		"AGREE_OVER_13" => $user->lang['Agree_over_13'],
		"AGREE_UNDER_13" => $user->lang['Agree_under_13'],
		'DO_NOT_AGREE' => $user->lang['Agree_not'],

		"U_AGREE_OVER13" => "profile.$phpEx$SID&amp;mode=register&amp;agreed=true",
		"U_AGREE_UNDER13" => "profile.$phpEx$SID&amp;mode=register&amp;agreed=true&amp;coppa=true")
	);
}

function update_user($mode)
{

}
//
// ---------------------------------------

$error = FALSE;
$page_title = ( $mode == 'editprofile' ) ? $user->lang['Edit_profile'] : $user->lang['Register'];

if ( $mode == 'register' && !isset($HTTP_POST_VARS['agreed']) && !isset($HTTP_GET_VARS['agreed']) )
{
	include($phpbb_root_path . 'includes/page_header.'.$phpEx);

	show_coppa();

	include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
}

$coppa = ( empty($HTTP_POST_VARS['coppa']) && empty($HTTP_GET_VARS['coppa']) ) ? 0 : TRUE;

//
// Check and initialize some variables if needed
//
if (
	isset($HTTP_POST_VARS['submit']) ||
	isset($HTTP_POST_VARS['avatargallery']) ||
	isset($HTTP_POST_VARS['submitavatar']) ||
	isset($HTTP_POST_VARS['cancelavatar']) ||
	$mode == 'register' )
{
	include($phpbb_root_path . 'includes/functions_validate.'.$phpEx);
	include($phpbb_root_path . 'includes/bbcode.'.$phpEx);
	include($phpbb_root_path . 'includes/functions_posting.'.$phpEx);

	if ( $mode == 'editprofile' )
	{
		$user_id = intval($HTTP_POST_VARS['user_id']);
		$current_email = trim(strip_tags(htmlspecialchars($HTTP_POST_VARS['current_email'])));
	}

	$strip_var_list = array('username' => 'username', 'email' => 'email', 'icq' => 'icq', 'aim' => 'aim', 'msn' => 'msn', 'yim' => 'yim', 'website' => 'website', 'location' => 'location', 'occupation' => 'occupation', 'interests' => 'interests');

	while( list($var, $param) = @each($strip_var_list) )
	{
		if ( !empty($HTTP_POST_VARS[$param]) )
		{
			$$var = trim(strip_tags($HTTP_POST_VARS[$param]));
		}
	}

	$trim_var_list = array('password_current' => 'cur_password', 'password' => 'new_password', 'password_confirm' => 'password_confirm', 'signature' => 'signature');

	while( list($var, $param) = @each($trim_var_list) )
	{
		if ( !empty($HTTP_POST_VARS[$param]) )
		{
			$$var = trim($HTTP_POST_VARS[$param]);
		}
	}

	$username = str_replace('&nbsp;', '', $username);
	$email = htmlspecialchars($email);
	$signature = str_replace('<br />', "\n", $signature);

	// Run some validation on the optional fields. These are pass-by-ref, so they'll be changed to
	// empty strings if they fail.
	validate_optional_fields($icq, $aim, $msn, $yim, $website, $location, $occupation, $interests, $signature);

	$viewemail = ( isset($HTTP_POST_VARS['viewemail']) ) ? ( ($HTTP_POST_VARS['viewemail']) ? TRUE : 0 ) : 0;
	$allowviewonline = ( isset($HTTP_POST_VARS['hideonline']) ) ? ( ($HTTP_POST_VARS['hideonline']) ? 0 : TRUE ) : TRUE;
	$notifyreply = ( isset($HTTP_POST_VARS['notifyreply']) ) ? ( ($HTTP_POST_VARS['notifyreply']) ? TRUE : 0 ) : 0;
	$notifypm = ( isset($HTTP_POST_VARS['notifypm']) ) ? ( ($HTTP_POST_VARS['notifypm']) ? TRUE : 0 ) : TRUE;
	$popuppm = ( isset($HTTP_POST_VARS['popup_pm']) ) ? ( ($HTTP_POST_VARS['popup_pm']) ? TRUE : 0 ) : TRUE;

	if ( $mode == 'register' )
	{
		$attachsig = ( isset($HTTP_POST_VARS['attachsig']) ) ? ( ($HTTP_POST_VARS['attachsig']) ? TRUE : 0 ) : $board_config['allow_sig'];

		$allowhtml = ( isset($HTTP_POST_VARS['allowhtml']) ) ? ( ($HTTP_POST_VARS['allowhtml']) ? TRUE : 0 ) : $board_config['allow_html'];
		$allowbbcode = ( isset($HTTP_POST_VARS['allowbbcode']) ) ? ( ($HTTP_POST_VARS['allowbbcode']) ? TRUE : 0 ) : $board_config['allow_bbcode'];
		$allowsmilies = ( isset($HTTP_POST_VARS['allowsmilies']) ) ? ( ($HTTP_POST_VARS['allowsmilies']) ? TRUE : 0 ) : $board_config['allow_smilies'];
	}
	else
	{
		$attachsig = ( isset($HTTP_POST_VARS['attachsig']) ) ? ( ($HTTP_POST_VARS['attachsig']) ? TRUE : 0 ) : 0;

		$allowhtml = ( isset($HTTP_POST_VARS['allowhtml']) ) ? ( ($HTTP_POST_VARS['allowhtml']) ? TRUE : 0 ) : $userdata['user_allowhtml'];
		$allowbbcode = ( isset($HTTP_POST_VARS['allowbbcode']) ) ? ( ($HTTP_POST_VARS['allowbbcode']) ? TRUE : 0 ) : $userdata['user_allowbbcode'];
		$allowsmilies = ( isset($HTTP_POST_VARS['allowsmilies']) ) ? ( ($HTTP_POST_VARS['allowsmilies']) ? TRUE : 0 ) : $userdata['user_allowsmiles'];
	}

	$user_style = ( isset($HTTP_POST_VARS['style']) ) ? intval($HTTP_POST_VARS['style']) : $board_config['default_style'];

	if ( !empty($HTTP_POST_VARS['language']) )
	{
		if ( preg_match('/^[a-z_]+$/i', $HTTP_POST_VARS['language']) )
		{
			$user_lang = $HTTP_POST_VARS['language'];
		}
		else
		{
			$error = true;
			$error_msg = $user->lang['Fields_empty'];
		}
	}
	else
	{
		$user_lang = $board_config['default_lang'];
	}

	$user_timezone = ( isset($HTTP_POST_VARS['timezone']) ) ? doubleval($HTTP_POST_VARS['timezone']) : $board_config['board_timezone'];
	$user_dateformat = ( !empty($HTTP_POST_VARS['dateformat']) ) ? trim($HTTP_POST_VARS['dateformat']) : $board_config['default_dateformat'];

	$user_avatar_local = ( isset($HTTP_POST_VARS['avatarselect']) && !empty($HTTP_POST_VARS['submitavatar']) && $board_config['allow_avatar_local'] ) ? $HTTP_POST_VARS['avatarselect'] : ( ( isset($HTTP_POST_VARS['avatarlocal'])  ) ? $HTTP_POST_VARS['avatarlocal'] : '' );

	$user_avatar_remoteurl = ( !empty($HTTP_POST_VARS['avatarremoteurl']) ) ? trim($HTTP_POST_VARS['avatarremoteurl']) : '';
	$user_avatar_upload = ( !empty($HTTP_POST_VARS['avatarurl']) ) ? trim($HTTP_POST_VARS['avatarurl']) : ( ( $HTTP_POST_FILES['avatar']['tmp_name'] != "none") ? $HTTP_POST_FILES['avatar']['tmp_name'] : '' );
	$user_avatar_name = ( !empty($HTTP_POST_FILES['avatar']['name']) ) ? $HTTP_POST_FILES['avatar']['name'] : '';
	$user_avatar_size = ( !empty($HTTP_POST_FILES['avatar']['size']) ) ? $HTTP_POST_FILES['avatar']['size'] : 0;
	$user_avatar_filetype = ( !empty($HTTP_POST_FILES['avatar']['type']) ) ? $HTTP_POST_FILES['avatar']['type'] : '';

	$user_avatar = ( empty($user_avatar_loc) && $mode == 'editprofile' ) ? $userdata['user_avatar'] : '';
	$user_avatar_type = ( empty($user_avatar_loc) && $mode == 'editprofile' ) ? $userdata['user_avatar_type'] : '';

	if ( isset($HTTP_POST_VARS['avatargallery']) || isset($HTTP_POST_VARS['submitavatar']) || isset($HTTP_POST_VARS['cancelavatar']) )
	{
		$username = stripslashes($username);
		$email = stripslashes($email);
		$password = '';
		$password_confirm = '';

		$icq = stripslashes($icq);
		$aim = stripslashes($aim);
		$msn = stripslashes($msn);
		$yim = stripslashes($yim);

		$website = stripslashes($website);
		$location = stripslashes($location);
		$occupation = stripslashes($occupation);
		$interests = stripslashes($interests);
		$signature = stripslashes($signature);

		$user_lang = stripslashes($user_lang);
		$user_dateformat = stripslashes($user_dateformat);

		if ( !isset($HTTP_POST_VARS['cancelavatar']))
		{
			$user_avatar = $user_avatar_local;
			$user_avatar_type = USER_AVATAR_GALLERY;
		}
	}
}

//
// Did the user submit? In this case build a query to update the users profile in the DB
//
if ( isset($HTTP_POST_VARS['submit']) )
{
	include($phpbb_root_path . 'includes/usercp_avatar.'.$phpEx);

	$passwd_sql = '';
	if ( $mode == 'editprofile' )
	{
		if ( $user_id != $userdata['user_id'] )
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $user->lang['Wrong_Profile'];
		}
	}
	else if ( $mode == 'register' )
	{
		if ( empty($username) || empty($password) || empty($password_confirm) || empty($email) )
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $user->lang['Fields_empty'];
		}

	}

	$passwd_sql = '';
	if ( !empty($password) && !empty($password_confirm) )
	{
		if ( $password != $password_confirm )
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $user->lang['Password_mismatch'];
		}
		else if ( strlen($password) > 32 )
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $user->lang['Password_long'];
		}
		else
		{
			if ( $mode == 'editprofile' )
			{
				$sql = "SELECT user_password
					FROM " . USERS_TABLE . "
					WHERE user_id = $user_id";
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, 'Could not obtain user_password information', '', __LINE__, __FILE__, $sql);
				}

				$row = $db->sql_fetchrow($result);

				if ( $row['user_password'] != md5($password_current) )
				{
					$error = TRUE;
					$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $user->lang['Current_password_mismatch'];
				}
			}

			if ( !$error )
			{
				$password = md5($password);
				$passwd_sql = "user_password = '$password', ";
			}
		}
	}
	else if ( ( empty($password) && !empty($password_confirm) ) || ( !empty($password) && empty($password_confirm) ) )
	{
		$error = TRUE;
		$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $user->lang['Password_mismatch'];
	}
	else
	{
		$password = $userdata['user_password'];
	}

	//
	// Do a ban check on this email address
	//
	if ( $email != $userdata['user_email'] || $mode == 'register' )
	{
		$result = validate_email($email);
		if ( $result['error'] )
		{
			$email = $userdata['user_email'];

			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $result['error_msg'];
		}

		if ( $mode == 'editprofile' )
		{
			$sql = "SELECT user_password
				FROM " . USERS_TABLE . "
				WHERE user_id = $user_id";
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not obtain user_password information', '', __LINE__, __FILE__, $sql);
			}

			$row = $db->sql_fetchrow($result);

			if ( $row['user_password'] != md5($password_current) )
			{
				$email = $userdata['user_email'];

				$error = TRUE;
				$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $user->lang['Current_password_mismatch'];
			}
		}
	}

	$username_sql = '';
	if ( $board_config['allow_namechange'] || $mode == 'register' )
	{
		if ( empty($username) )
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $user->lang['Username_disallowed'];
		}
		else if ( $username != $userdata['username'] || $mode == 'register' )
		{
			$result = validate_username($username);
			if ( $result['error'] )
			{
				$error = TRUE;
				$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $result['error_msg'];
			}
			else
			{
				$username_sql = "username = '" . str_replace("\'", "''", $username) . "', ";
			}
		}
	}

	if ( $signature != '' )
	{
		if ( strlen($signature) > $board_config['max_sig_chars'] )
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $user->lang['Signature_too_long'];
		}

		if ( $signature_bbcode_uid == '' )
		{
			$signature_bbcode_uid = ( $allowbbcode ) ? make_bbcode_uid() : '';
		}
		$signature = prepare_message($signature, $allowhtml, $allowbbcode, $allowsmilies, $signature_bbcode_uid);
	}

	if ( isset($HTTP_POST_VARS['avatardel']) && $mode == 'editprofile' )
	{
		$avatar_sql = user_avatar_delete($userdata['avatar_type'], $userdata['avatar_file']);
	}
	else if ( ( !empty($user_avatar_upload) || !empty($user_avatar_name) ) && $board_config['allow_avatar_upload'] )
	{
		if ( !empty($user_avatar_upload) )
		{
			$avatar_mode = ( !empty($user_avatar_name) ) ? 'local' : 'remote';
			$avatar_sql = user_avatar_upload($mode, $avatar_mode, $userdata['user_avatar'], $userdata['user_avatar_type'], $error, $error_msg, $user_avatar_upload, $user_avatar_name, $user_avatar_size, $user_avatar_filetype);
		}
		else if ( !empty($user_avatar_name) )
		{
			$l_avatar_size = sprintf($user->lang['Avatar_filesize'], round($board_config['avatar_filesize'] / 1024));

			$error = true;
			$error_msg .= ( ( !empty($error_msg) ) ? '<br />' : '' ) . $l_avatar_size;
		}
	}
	else if ( $user_avatar_remoteurl != '' && $board_config['allow_avatar_remote'] )
	{
		$avatar_sql = user_avatar_url($mode, $error, $error_msg, $user_avatar_remoteurl);
	}
	else if ( $user_avatar_local != '' && $board_config['allow_avatar_local'] )
	{
		$avatar_sql = user_avatar_gallery($mode, $error, $error_msg, $user_avatar_local);
	}
	else
	{
		$avatar_sql = array('data' => '', 'type' => USER_AVATAR_NONE);
	}

	if ( !$error )
	{
		if ( ( ( $mode == 'editprofile' && $userdata['user_level'] != ADMIN && $email != $current_email ) || ( $mode == 'register' || $coppa ) ) && ( $board_config['require_activation'] == USER_ACTIVATION_SELF || $board_config['require_activation'] == USER_ACTIVATION_ADMIN ) )
		{
			$user_actkey = gen_rand_string(true);
			$key_len = 54 - (strlen($server_url));
			$key_len = ( $key_len > 6 ) ? $key_len : 6;

			$user_actkey = substr($user_actkey, 0, $key_len);
			$user_active = 0;

			if ( $userdata['user_id'] != ANONYMOUS )
			{
				session_end($userdata['session_id'], $userdata['user_id']);
			}
		}
		else
		{
			$user_active = 1;
			$user_actkey = '';
		}

		$sql_ary = array(
			'username' => $username,
			'user_regdate' => time(),
			'user_password' => $password,
			'user_email' => $email,
			'user_icq' => $icq,
			'user_aim' => $aim,
			'user_yim' => $yim,
			'user_msnm' => $msn,
			'user_website' => $website,
			'user_occ' => $occupation,
			'user_from' => $location,
			'user_interests' => $interests,
			'user_sig' => $signature,
			'user_sig_bbcode_uid' => $signature_bbcode_uid,
			'user_viewemail' => $viewemail,
			'user_attachsig' => $attachsig,
			'user_allowsmile' => $allowsmilies,
			'user_allowhtml' => $allowhtml,
			'user_allowbbcode' => $allowbbcode,
			'user_allow_viewonline' => $allowviewonline,
			'user_notify' => $notifyreply,
			'user_notify_pm' => $notifypm,
			'user_popup_pm' => $popuppm,
			'user_avatar' => $avatar_sql['data'],
			'user_avatar_type' => $avatar_sql['type'],
			'user_timezone' => (float) $user_timezone,
			'user_dateformat' => $user_dateformat,
			'user_lang' => $user_lang,
			'user_style' => $user_style,
			'user_level' => 0,
			'user_allow_pm' => 1,
			'user_active' => $user_active,
			'user_actkey' => $user_actkey
		);

		if ( $mode == 'editprofile' )
		{
			if ( !($result = $db->sql_query_array('UPDATE ' . USERS_TABLE . ' SET WHERE user_id = ' . $user_id, &$sql_ary, BEGIN_TRANSACTION)) )
			{
				message_die(GENERAL_ERROR, 'Could not update users table', '', __LINE__, __FILE__, $sql);
			}

			if ( !$user_active )
			{
				//
				// The users account has been deactivated, send them an email with a new activation key
				//
				include($phpbb_root_path . 'includes/emailer.'.$phpEx);
				$emailer = new emailer($board_config['smtp_delivery']);

				$email_headers = "From: " . $board_config['board_email'] . "\r\nReturn-Path: " . $board_config['board_email'] . "\r\n";

				$emailer->use_template('user_activate', stripslashes($user_lang));
				$emailer->email_address($email);
				$emailer->set_subject();//$user->lang['Reactivate']
				$emailer->extra_headers($email_headers);

				$emailer->assign_vars(array(
					'SITENAME' => $board_config['sitename'],
					'USERNAME' => $username,
					'EMAIL_SIG' => str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']),

					'U_ACTIVATE' => $server_url . '?mode=activate&act_key=' . $user_actkey)
				);
				$emailer->send();
				$emailer->reset();

				$message = $user->lang['Profile_updated_inactive'] . '<br /><br />' . sprintf($user->lang['Click_return_index'],  '<a href="' . "index.$phpEx$SID" . '">', '</a>');
			}
			else
			{
				$message = $user->lang['Profile_updated'] . '<br /><br />' . sprintf($user->lang['Click_return_index'],  '<a href="' . "index.$phpEx$SID" . '">', '</a>');
			}

			$template->assign_vars(array(
				"META" => '<meta http-equiv="refresh" content="5;url=' . "index.$phpEx$SID" . '">')
			);

			message_die(GENERAL_MESSAGE, $message);
		}
		else
		{
			if ( !($result = $db->sql_query_array('INSERT INTO ' . USERS_TABLE, &$sql_ary, BEGIN_TRANSACTION)) )
			{
				message_die(GENERAL_ERROR, 'Could not insert data into users table', '', __LINE__, __FILE__, $sql);
			}

			$user_id = $db->sql_nextid();

			$sql = "INSERT INTO " . GROUPS_TABLE . " (group_name, group_description, group_single_user, group_moderator)
				VALUES ('', 'Personal User', 1, 0)";
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not insert data into groups table', '', __LINE__, __FILE__, $sql);
			}

			$group_id = $db->sql_nextid();

			$sql = "INSERT INTO " . USER_GROUP_TABLE . " (user_id, group_id, user_pending)
				VALUES ($user_id, $group_id, 0)";
			if( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not insert data into user_group table', '', __LINE__, __FILE__, $sql);
			}

			$user_update_id = "UPDATE " . CONFIG_TABLE . "
				SET config_value = $user_id
				WHERE config_name = 'newest_user_id'";
			$user_update_name = "UPDATE " . CONFIG_TABLE . "
				SET config_value = '$username'
				WHERE config_name = 'newest_username'";
			$user_update_count = "UPDATE " . CONFIG_TABLE . "
				SET config_value = " . ($board_config['num_users'] + 1) . "
				WHERE config_name = 'num_users'";
			if( !$db->sql_query($user_update_id) ||
				!$db->sql_query($user_update_name) ||
				!$db->sql_query($user_update_count, END_TRANSACTION) )
			{
				message_die(GENERAL_ERROR, 'Could not update user count information!', '', __LINE__, __FILE__);
			}

			if ( $coppa )
			{
				$message = $user->lang['COPPA'];
				$email_template = 'coppa_welcome_inactive';
			}
			else if ( $board_config['require_activation'] == USER_ACTIVATION_SELF )
			{
				$message = $user->lang['Account_inactive'];
				$email_template = 'user_welcome_inactive';
			}
			else if ( $board_config['require_activation'] == USER_ACTIVATION_ADMIN )
			{
				$message = $user->lang['Account_inactive_admin'];
				$email_template = 'admin_welcome_inactive';
			}
			else
			{
				$message = $user->lang['Account_added'];
				$email_template = 'user_welcome';
			}

			include($phpbb_root_path . 'includes/emailer.'.$phpEx);
			$emailer = new emailer($board_config['smtp_delivery']);

			$email_headers = "From: " . $board_config['board_email'] . "\nReturn-Path: " . $board_config['board_email'] . "\r\n";

			$emailer->use_template($email_template, stripslashes($user_lang));
			$emailer->email_address($email);
			$emailer->set_subject();//sprintf($user->lang['Welcome_subject'], $board_config['sitename'])
			$emailer->extra_headers($email_headers);

			if( $coppa )
			{
				$emailer->assign_vars(array(
					'SITENAME' => $board_config['sitename'],
					'WELCOME_MSG' => sprintf($user->lang['Welcome_subject'], $board_config['sitename']),
					'USERNAME' => $username,
					'PASSWORD' => $password_confirm,
					'EMAIL_SIG' => str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']),

					'U_ACTIVATE' => $server_url . '?mode=activate&act_key=' . $user_actkey,

					'FAX_INFO' => $board_config['coppa_fax'],
					'MAIL_INFO' => $board_config['coppa_mail'],
					'EMAIL_ADDRESS' => $email,
					'ICQ' => $icq,
					'AIM' => $aim,
					'YIM' => $yim,
					'MSN' => $msn,
					'WEB_SITE' => $website,
					'FROM' => $location,
					'OCC' => $occupation,
					'INTERESTS' => $interests,
					'SITENAME' => $board_config['sitename']));
			}
			else
			{
				$emailer->assign_vars(array(
					'SITENAME' => $board_config['sitename'],
					'WELCOME_MSG' => sprintf($user->lang['Welcome_subject'], $board_config['sitename']),
					'USERNAME' => $username,
					'PASSWORD' => $password_confirm,
					'EMAIL_SIG' => str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']),

					'U_ACTIVATE' => $server_url . '?mode=activate&act_key=' . $user_actkey)
				);
			}

			$emailer->send();
			$emailer->reset();

			if ( $board_config['require_activation'] == USER_ACTIVATION_ADMIN )
			{
				$emailer->use_template("admin_activate", stripslashes($user_lang));
				$emailer->email_address($board_config['board_email']);
				$emailer->set_subject(); //$user->lang['New_account_subject']
				$emailer->extra_headers($email_headers);

				$emailer->assign_vars(array(
					'USERNAME' => $username,
					'EMAIL_SIG' => str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']),

					'U_ACTIVATE' => $server_url . '?mode=activate&act_key=' . $user_actkey)
				);
				$emailer->send();
				$emailer->reset();
			}

			$message = $message . '<br /><br />' . sprintf($user->lang['Click_return_index'],  '<a href="' . "index.$phpEx$SID" . '">', '</a>');

			message_die(GENERAL_MESSAGE, $message);
		} // if mode == register
	}
} // End of submit


if ( $error )
{
	//
	// If an error occured we need to stripslashes on returned data
	//
	$username = stripslashes($username);
	$email = stripslashes($email);
	$password = '';
	$password_confirm = '';

	$icq = stripslashes($icq);
	$aim = htmlspecialchars(str_replace('+', ' ', stripslashes($aim)));
	$msn = htmlspecialchars(stripslashes($msn));
	$yim = htmlspecialchars(stripslashes($yim));

	$website = htmlspecialchars(stripslashes($website));
	$location = htmlspecialchars(stripslashes($location));
	$occupation = htmlspecialchars(stripslashes($occupation));
	$interests = htmlspecialchars(stripslashes($interests));
	$signature = stripslashes($signature);

	$user_lang = stripslashes($user_lang);
	$user_dateformat = stripslashes($user_dateformat);

}
else if ( $mode == 'editprofile' && !isset($HTTP_POST_VARS['avatargallery']) && !isset($HTTP_POST_VARS['submitavatar']) && !isset($HTTP_POST_VARS['cancelavatar']) )
{
	$user_id = $userdata['user_id'];
	$username = htmlspecialchars($userdata['username']);
	$email = $userdata['user_email'];
	$password = '';
	$password_confirm = '';

	$icq = $userdata['user_icq'];
	$aim = htmlspecialchars(str_replace('+', ' ', $userdata['user_aim']));
	$msn = htmlspecialchars($userdata['user_msnm']);
	$yim = htmlspecialchars($userdata['user_yim']);

	$website = htmlspecialchars($userdata['user_website']);
	$location = htmlspecialchars($userdata['user_from']);
	$occupation = htmlspecialchars($userdata['user_occ']);
	$interests = htmlspecialchars($userdata['user_interests']);
	$signature_bbcode_uid = $userdata['user_sig_bbcode_uid'];
	$signature = ( $signature_bbcode_uid != '' ) ? preg_replace("/\:(([a-z0-9]:)?)$signature_bbcode_uid/si", '', $userdata['user_sig']) : $userdata['user_sig'];

	$viewemail = $userdata['user_viewemail'];
	$notifypm = $userdata['user_notify_pm'];
	$popuppm = $userdata['user_popup_pm'];
	$notifyreply = $userdata['user_notify'];
	$attachsig = $userdata['user_attachsig'];
	$allowhtml = $userdata['user_allowhtml'];
	$allowbbcode = $userdata['user_allowbbcode'];
	$allowsmilies = $userdata['user_allowsmile'];
	$allowviewonline = $userdata['user_allow_viewonline'];

	$user_avatar = ( $userdata['user_allowavatar'] ) ? $userdata['user_avatar'] : '';
	$user_avatar_type = ( $userdata['user_allowavatar'] ) ? $userdata['user_avatar_type'] : USER_AVATAR_NONE;

	$user_style = $userdata['user_style'];
	$user_lang = $userdata['user_lang'];
	$user_timezone = $userdata['user_timezone'];
	$user_dateformat = $userdata['user_dateformat'];
}

//
// Default pages
//
include($phpbb_root_path . 'includes/page_header.'.$phpEx);

make_jumpbox('viewforum.'.$phpEx);

if ( $mode == 'editprofile' )
{
	if ( $user_id != $userdata['user_id'] )
	{
		$error = TRUE;
		$error_msg = $user->lang['Wrong_Profile'];
	}
}

if( isset($HTTP_POST_VARS['avatargallery']) && !$error )
{
	include($phpbb_root_path . 'includes/usercp_avatar.'.$phpEx);

	$avatar_category = ( !empty($HTTP_POST_VARS['avatarcategory']) ) ? $HTTP_POST_VARS['avatarcategory'] : '';

	$template->set_filenames(array(
		'body' => 'profile_avatar_gallery.html')
	);

	$allowviewonline = !$allowviewonline;

	display_avatar_gallery($mode, $avatar_category, $user_id, $email, $current_email, $coppa, $username, $email, $icq, $aim, $msn, $yim, $website, $location, $occupation, $interests, $signature, $viewemail, $notifypm, $popuppm, $notifyreply, $attachsig, $allowhtml, $allowbbcode, $allowsmilies, $allowviewonline, $user_style, $user_lang, $user_timezone, $user_dateformat);
}
else
{
	if ( !isset($coppa) )
	{
		$coppa = FALSE;
	}

	if ( !isset($user_template) )
	{
		$selected_template = $board_config['system_template'];
	}

	$signature = preg_replace('/\:[0-9a-z\:]*?\]/si', ']', $signature);

	$avatar_img = '';
	if ( $user_avatar_type )
	{
		switch( $user_avatar_type )
		{
			case USER_AVATAR_UPLOAD:
				$avatar_img = ( $board_config['allow_avatar_upload'] ) ? '<img src="' . $board_config['avatar_path'] . '/' . $user_avatar . '" alt="" />' : '';
				break;
			case USER_AVATAR_REMOTE:
				$avatar_img = ( $board_config['allow_avatar_remote'] ) ? '<img src="' . $user_avatar . '" alt="" />' : '';
				break;
			case USER_AVATAR_GALLERY:
				$avatar_img = ( $board_config['allow_avatar_local'] ) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $user_avatar . '" alt="" />' : '';
				break;
		}
	}

	$s_hidden_fields = '<input type="hidden" name="mode" value="' . $mode . '" /><input type="hidden" name="agreed" value="true" /><input type="hidden" name="coppa" value="' . $coppa . '" />';
	if( $mode == 'editprofile' )
	{
		$s_hidden_fields .= '<input type="hidden" name="user_id" value="' . $userdata['user_id'] . '" />';
		//
		// Send the users current email address. If they change it, and account activation is turned on
		// the user account will be disabled and the user will have to reactivate their account.
		//
		$s_hidden_fields .= '<input type="hidden" name="current_email" value="' . $userdata['user_email'] . '" />';
	}

	if ( !empty($user_avatar_local) )
	{
		$s_hidden_fields .= '<input type="hidden" name="avatarlocal" value="' . $user_avatar_local . '" />';
	}

	$html_status =  ( $userdata['user_allowhtml'] && $board_config['allow_html'] ) ? $user->lang['HTML_is_ON'] : $user->lang['HTML_is_OFF'];
	$bbcode_status = ( $userdata['user_allowbbcode'] && $board_config['allow_bbcode']  ) ? $user->lang['BBCode_is_ON'] : $user->lang['BBCode_is_OFF'];
	$smilies_status = ( $userdata['user_allowsmile'] && $board_config['allow_smilies']  ) ? $user->lang['Smilies_are_ON'] : $user->lang['Smilies_are_OFF'];

	if ( $error )
	{
		$template->set_filenames(array(
			'reg_header' => 'error_body.html')
		);
		$template->assign_vars(array(
			'ERROR_MESSAGE' => $error_msg)
		);
		$template->assign_var_from_handle('ERROR_BOX', 'reg_header');
	}

	$template->set_filenames(array(
		'body' => 'profile_add_body.html')
	);

	//
	// Let's do an overall check for settings/versions which would prevent
	// us from doing file uploads....
	//
	$form_enctype = ( @ini_get('file_uploads') == '0' || strtolower(@ini_get('file_uploads') == 'off') || phpversion() == '4.0.4pl1' || !$board_config['allow_avatar_upload'] || ( phpversion() < '4.0.3' && @ini_get('open_basedir') != '' ) ) ? '' : 'enctype="multipart/form-data"';

	$template->assign_vars(array(
		'USERNAME' => $username,
		'EMAIL' => $email,
		'YIM' => $yim,
		'ICQ' => $icq,
		'MSN' => $msn,
		'AIM' => $aim,
		'OCCUPATION' => $occupation,
		'INTERESTS' => $interests,
		'LOCATION' => $location,
		'WEBSITE' => $website,
		'SIGNATURE' => str_replace('<br />', "\n", $signature),
		'VIEW_EMAIL_YES' => ( $viewemail ) ? 'checked="checked"' : '',
		'VIEW_EMAIL_NO' => ( !$viewemail ) ? 'checked="checked"' : '',
		'HIDE_USER_YES' => ( !$allowviewonline ) ? 'checked="checked"' : '',
		'HIDE_USER_NO' => ( $allowviewonline ) ? 'checked="checked"' : '',
		'NOTIFY_PM_YES' => ( $notifypm ) ? 'checked="checked"' : '',
		'NOTIFY_PM_NO' => ( !$notifypm ) ? 'checked="checked"' : '',
		'POPUP_PM_YES' => ( $popuppm ) ? 'checked="checked"' : '',
		'POPUP_PM_NO' => ( !$popuppm ) ? 'checked="checked"' : '',
		'ALWAYS_ADD_SIGNATURE_YES' => ( $attachsig ) ? 'checked="checked"' : '',
		'ALWAYS_ADD_SIGNATURE_NO' => ( !$attachsig ) ? 'checked="checked"' : '',
		'NOTIFY_REPLY_YES' => ( $notifyreply ) ? 'checked="checked"' : '',
		'NOTIFY_REPLY_NO' => ( !$notifyreply ) ? 'checked="checked"' : '',
		'ALWAYS_ALLOW_BBCODE_YES' => ( $allowbbcode ) ? 'checked="checked"' : '',
		'ALWAYS_ALLOW_BBCODE_NO' => ( !$allowbbcode ) ? 'checked="checked"' : '',
		'ALWAYS_ALLOW_HTML_YES' => ( $allowhtml ) ? 'checked="checked"' : '',
		'ALWAYS_ALLOW_HTML_NO' => ( !$allowhtml ) ? 'checked="checked"' : '',
		'ALWAYS_ALLOW_SMILIES_YES' => ( $allowsmilies ) ? 'checked="checked"' : '',
		'ALWAYS_ALLOW_SMILIES_NO' => ( !$allowsmilies ) ? 'checked="checked"' : '',
		'ALLOW_AVATAR' => $board_config['allow_avatar_upload'],
		'AVATAR' => $avatar_img,
		'AVATAR_SIZE' => $board_config['avatar_filesize'],
		'LANGUAGE_SELECT' => language_select($user_lang, 'language'),
		'STYLE_SELECT' => style_select($user_style, 'style'),
		'TIMEZONE_SELECT' => tz_select($user_timezone, 'timezone'),
		'DATE_FORMAT' => $user_dateformat,
		'HTML_STATUS' => $html_status,
		'BBCODE_STATUS' => sprintf($bbcode_status, '<a href="' . "faq.$phpEx$SID&amp;mode=bbcode" . '" target="_phpbbcode">', '</a>'),
		'SMILIES_STATUS' => $smilies_status,

		'L_CURRENT_PASSWORD' => $user->lang['Current_password'],
		'L_NEW_PASSWORD' => ( $mode == 'register' ) ? $user->lang['Password'] : $user->lang['New_password'],
		'L_CONFIRM_PASSWORD' => $user->lang['Confirm_password'],
		'L_CONFIRM_PASSWORD_EXPLAIN' => ( $mode == 'editprofile' ) ? $user->lang['Confirm_password_explain'] : '',
		'L_PASSWORD_IF_CHANGED' => ( $mode == 'editprofile' ) ? $user->lang['password_if_changed'] : '',
		'L_PASSWORD_CONFIRM_IF_CHANGED' => ( $mode == 'editprofile' ) ? $user->lang['password_confirm_if_changed'] : '',
		'L_SUBMIT' => $user->lang['Submit'],
		'L_RESET' => $user->lang['Reset'],
		'L_ICQ_NUMBER' => $user->lang['ICQ'],
		'L_MESSENGER' => $user->lang['MSNM'],
		'L_YAHOO' => $user->lang['YIM'],
		'L_WEBSITE' => $user->lang['Website'],
		'L_AIM' => $user->lang['AIM'],
		'L_LOCATION' => $user->lang['Location'],
		'L_OCCUPATION' => $user->lang['Occupation'],
		'L_BOARD_LANGUAGE' => $user->lang['Board_lang'],
		'L_BOARD_STYLE' => $user->lang['Board_style'],
		'L_TIMEZONE' => $user->lang['Timezone'],
		'L_DATE_FORMAT' => $user->lang['Date_format'],
		'L_DATE_FORMAT_EXPLAIN' => $user->lang['Date_format_explain'],
		'L_YES' => $user->lang['Yes'],
		'L_NO' => $user->lang['No'],
		'L_INTERESTS' => $user->lang['Interests'],
		'L_ALWAYS_ALLOW_SMILIES' => $user->lang['Always_smile'],
		'L_ALWAYS_ALLOW_BBCODE' => $user->lang['Always_bbcode'],
		'L_ALWAYS_ALLOW_HTML' => $user->lang['Always_html'],
		'L_HIDE_USER' => $user->lang['Hide_user'],
		'L_ALWAYS_ADD_SIGNATURE' => $user->lang['Always_add_sig'],

		'L_AVATAR_PANEL' => $user->lang['Avatar_panel'],
		'L_AVATAR_EXPLAIN' => sprintf($user->lang['Avatar_explain'], $board_config['avatar_max_width'], $board_config['avatar_max_height'], (round($board_config['avatar_filesize'] / 1024))),
		'L_UPLOAD_AVATAR_FILE' => $user->lang['Upload_Avatar_file'],
		'L_UPLOAD_AVATAR_URL' => $user->lang['Upload_Avatar_URL'],
		'L_UPLOAD_AVATAR_URL_EXPLAIN' => $user->lang['Upload_Avatar_URL_explain'],
		'L_AVATAR_GALLERY' => $user->lang['Select_from_gallery'],
		'L_SHOW_GALLERY' => $user->lang['View_avatar_gallery'],
		'L_LINK_REMOTE_AVATAR' => $user->lang['Link_remote_Avatar'],
		'L_LINK_REMOTE_AVATAR_EXPLAIN' => $user->lang['Link_remote_Avatar_explain'],
		'L_DELETE_AVATAR' => $user->lang['Delete_Image'],
		'L_CURRENT_IMAGE' => $user->lang['Current_Image'],

		'L_SIGNATURE' => $user->lang['Signature'],
		'L_SIGNATURE_EXPLAIN' => sprintf($user->lang['Signature_explain'], $board_config['max_sig_chars']),
		'L_NOTIFY_ON_REPLY' => $user->lang['Always_notify'],
		'L_NOTIFY_ON_REPLY_EXPLAIN' => $user->lang['Always_notify_explain'],
		'L_NOTIFY_ON_PRIVMSG' => $user->lang['Notify_on_privmsg'],
		'L_POPUP_ON_PRIVMSG' => $user->lang['Popup_on_privmsg'],
		'L_POPUP_ON_PRIVMSG_EXPLAIN' => $user->lang['Popup_on_privmsg_explain'],
		'L_PREFERENCES' => $user->lang['Preferences'],
		'L_PUBLIC_VIEW_EMAIL' => $user->lang['Public_view_email'],
		'L_ITEMS_REQUIRED' => $user->lang['Items_required'],
		'L_REGISTRATION_INFO' => $user->lang['Registration_info'],
		'L_PROFILE_INFO' => $user->lang['Profile_info'],
		'L_PROFILE_INFO_NOTICE' => $user->lang['Profile_info_warn'],
		'L_EMAIL_ADDRESS' => $user->lang['Email_address'],

		'S_PROFILE_EDIT' => ( $mode == 'editprofile' ) ? true : false,
		'S_DISPLAY_AVATAR_BLOCK' => ( $userdata['user_allowavatar'] && ( $board_config['allow_avatar_upload'] || $board_config['allow_avatar_local'] || $board_config['allow_avatar_remote'] ) ) ? true : false,
		'S_DISPLAY_AVATAR_UPLOAD' => ( $board_config['allow_avatar_upload'] && file_exists('./' . $board_config['avatar_path']) && $form_enctype != '' ) ? true : false,
		'S_DISPLAY_AVATAR_URL' =>  ( $board_config['allow_avatar_upload'] && file_exists('./' . $board_config['avatar_path']) ) ? true : false,
		'S_DISPLAY_AVATAR_REMOTE' => ( $board_config['allow_avatar_remote'] ) ? true : false,
		'S_DISPLAY_AVATAR_GALLERY' => ( $board_config['allow_avatar_local'] && file_exists('./' . $board_config['avatar_gallery_path']) ) ? true : false,
		'S_HIDDEN_FIELDS' => $s_hidden_fields,
		'S_FORM_ENCTYPE' => $form_enctype,
		'S_PROFILE_ACTION' => "profile.$phpEx$SID")
	);

	//
	// This is another cheat using the block_var capability
	// of the templates to 'fake' an IF...ELSE...ENDIF solution
	// it works well :)
	//
}

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>