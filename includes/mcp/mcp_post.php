<?php
// -------------------------------------------------------------
//
// $Id$
//
// FILENAME  : mcp_post.php
// STARTED   : Thu Jul 08, 2004
// COPYRIGHT : � 2004 phpBB Group
// WWW       : http://www.phpbb.com/
// LICENCE   : GPL vs2.0 [ see /docs/COPYING ] 
// 
// -------------------------------------------------------------

//
// TODO:
//	- change poster
//	- delete post
//

function mcp_post_details($id, $mode, $action, $url)
{
	global $SID, $phpEx, $phpbb_root_path, $config;
	global $template, $db, $user, $auth;

	$user->add_lang('posting');

	$post_id = request_var('p', 0);
	$start	= request_var('start', 0);

	// Get post data
	$post_info = get_post_data(array($post_id));

	if (!sizeof($post_info))
	{
		trigger_error($user->lang['POST_NOT_EXIST']);
	}

	$post_info = $post_info[$post_id];

	switch ($action)
	{
		case 'chgposter_search':
		
			$username = request_var('username', '');

			if ($username)
			{
				$users_ary = array();

				if (strpos($username, '*') === false)
				{
					$username = "*$username*";
				}
				$username = str_replace('*', '%', str_replace('%', '\%', $username));

				$sql = 'SELECT user_id, username
					FROM ' . USERS_TABLE . "
					WHERE username LIKE '" . $db->sql_escape($username) . "'
						AND user_type NOT IN (" . USER_INACTIVE . ', ' . USER_IGNORE . ')
						AND user_id <> ' . $post_info['user_id'];
				$result = $db->sql_query($sql);

				while ($row = $db->sql_fetchrow($result))
				{
					$users_ary[strtolower($row['username'])] = $row;
				}

				$user_select = '';
				ksort($users_ary);
				foreach ($users_ary as $row)
				{
					$user_select .= '<option value="' . $row['user_id'] . '">' . $row['username'] . "</option>\n";
				}
			}

			if (!$user_select)
			{
				$template->assign_var('MESSAGE', $user->lang['NO_MATCHES_FOUND']);
			}

			$template->assign_vars(array(
				'S_USER_SELECT'		=>	$user_select,
				'SEARCH_USERNAME'	=>	request_var('username', ''))
			);
			break;

		default:
	}

	// Set some vars
	$users_ary = array();
	$poster = ($post_info['user_colour']) ? '<span style="color:#' . $post_info['user_colour'] . '">' . $post_info['username'] . '</span>' : $post_info['username'];

	// Process message, leave it uncensored
	$message = $post_info['post_text'];
	if ($post_info['bbcode_bitfield'])
	{
		include_once($phpbb_root_path . 'includes/bbcode.'.$phpEx);
		$bbcode = new bbcode($post_info['bbcode_bitfield']);
		$bbcode->bbcode_second_pass($message, $post_info['bbcode_uid'], $post_info['bbcode_bitfield']);
	}
	$message = smilie_text($message);

	$template->assign_vars(array(
		'S_MCP_ACTION'			=> "$url&amp;i=main&amp;quickmod=1",
		'S_CHGPOSTER_ACTION'	=> "$url&amp;i=$id&amp;mode=post_details",
		'S_APPROVE_ACTION'		=> "{$phpbb_root_path}mcp.$phpEx$SID&amp;i=queue&amp;mode=approve&amp;quickmod=1&amp;p=$post_id",

		'S_CAN_VIEWIP'			=> $auth->acl_get('m_ip', $post_info['forum_id']),
		'S_CAN_CHGPOSTER'		=> $auth->acl_get('m_', $post_info['forum_id']),
		'S_CAN_LOCK_POST'		=> $auth->acl_get('m_lock', $post_info['forum_id']),
		'S_CAN_DELETE_POST'		=> $auth->acl_get('m_delete', $post_info['forum_id']),

		'S_POST_REPORTED'		=> $post_info['post_reported'],
		'S_POST_UNAPPROVED'		=> !$post_info['post_approved'],
		'S_POST_LOCKED'			=> $post_info['post_edit_locked'],
//		'S_USER_NOTES'			=> ($post_info['user_notes']) ? true : false,
		'S_USER_WARNINGS'		=> ($post_info['user_warnings']) ? true : false,

		'U_VIEW_PROFILE'		=> "memberlist.$phpEx$SID&amp;mode=viewprofile&amp;u=" . $post_info['user_id'],
		'U_MCP_USERNOTES'		=> "mcp.$phpEx$SID&amp;i=notes&amp;mode=user_notes&amp;u=" . $post_info['user_id'],
		'U_MCP_WARNINGS'		=> "mcp.$phpEx$SID&amp;i=warnings&amp;mode=view_user&amp;u=" . $post_info['user_id'],

		'RETURN_TOPIC'			=> sprintf($user->lang['RETURN_TOPIC'], "<a href=\"viewtopic.$phpEx$SID&amp;p=$post_id#$post_id\">", '</a>'),
		'RETURN_FORUM'			=> sprintf($user->lang['RETURN_FORUM'], "<a href=\"viewforum.$phpEx$SID&amp;f={$post_info['forum_id']}&amp;start={$start}\">", '</a>'),
		'REPORTED_IMG'			=> $user->img('icon_reported', $user->lang['POST_REPORTED']),
		'UNAPPROVED_IMG'		=> $user->img('icon_unapproved', $user->lang['POST_UNAPPROVED']),

		'POSTER_NAME'			=> $poster,
		'POST_PREVIEW'			=> $message,
		'POST_SUBJECT'			=> $post_info['post_subject'],
		'POST_DATE'				=> $user->format_date($post_info['post_time']),
		'POST_IP'				=> $post_info['poster_ip'],
		'POST_IPADDR'			=> @gethostbyaddr($post_info['poster_ip']))
	);

	// Get IP
	if ($auth->acl_get('m_ip', $post_info['forum_id']))
	{
		$rdns_ip_num = request_var('rdns', '');

		if ($rdns_ip_num != 'all')
		{
			$template->assign_vars(array(
				'U_LOOKUP_ALL'	=> "$url&amp;i=main&amp;mode=post_details&amp;rdns=all")
			);
		}

		// Get other users who've posted under this IP
		$sql = 'SELECT u.user_id, u.username, COUNT(*) as postings
			FROM ' . USERS_TABLE . ' u, ' . POSTS_TABLE . " p
			WHERE p.poster_id = u.user_id
				AND p.poster_ip = '{$post_info['poster_ip']}'
				AND p.poster_id <> {$post_info['user_id']}
			GROUP BY u.user_id
			ORDER BY postings DESC";
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			// Fill the user select list with users who have posted
			// under this IP
			if ($row['user_id'] != $post_info['poster_id'])
			{
				$users_ary[strtolower($row['username'])] = $row;
			}

			$template->assign_block_vars('userrow', array(
				'USERNAME'		=> ($row['user_id'] == ANONYMOUS) ? $user->lang['GUEST'] : $row['username'],
				'NUM_POSTS'		=> $row['postings'],	
				'L_POST_S'		=> ($row['postings'] == 1) ? $user->lang['POST'] : $user->lang['POSTS'],

				'U_PROFILE'		=> ($row['user_id'] == ANONYMOUS) ? '' : "memberlist.$phpEx$SID&amp;mode=viewprofile&amp;u=" . $row['user_id'],
				'U_SEARCHPOSTS' => "search.$phpEx$SID&amp;search_author=" . urlencode($row['username']) . "&amp;showresults=topics")
			);
		}
		$db->sql_freeresult($result);

		// Get other IP's this user has posted under
		$sql = 'SELECT poster_ip, COUNT(*) AS postings
			FROM ' . POSTS_TABLE . '
			WHERE poster_id = ' . $post_info['poster_id'] . '
			GROUP BY poster_ip
			ORDER BY postings DESC';
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$hostname = (($rdns_ip_num == $row['poster_ip'] || $rdns_ip_num == 'all') && $row['poster_ip']) ? @gethostbyaddr($row['poster_ip']) : '';

			$template->assign_block_vars('iprow', array(
				'IP'			=> $row['poster_ip'],
				'HOSTNAME'		=> $hostname,
				'NUM_POSTS'		=> $row['postings'],	
				'L_POST_S'		=> ($row['postings'] == 1) ? $user->lang['POST'] : $user->lang['POSTS'],

				'U_LOOKUP_IP'	=> ($rdns_ip_num == $row['poster_ip'] || $rdns_ip_num == 'all') ? '' : "$url&amp;i=$id&amp;mode=post_details&amp;rdns={$row['poster_ip']}#ip",
				'U_WHOIS'		=> "mcp.$phpEx$SID&amp;i=$id&amp;mode=whois&amp;ip={$row['poster_ip']}")
			);
		}
		$db->sql_freeresult($result);

		// If we were not searching for a specific username fill
		// the user_select box with users who have posted under
		// the same IP
		if ($action != 'chgposter_search')
		{
			$user_select = '';
			ksort($users_ary);
			foreach ($users_ary as $row)
			{
				$user_select .= '<option value="' . $row['user_id'] . '">' . $row['username'] . "</option>\n";
			}
			$template->assign_var('S_USER_SELECT', $user_select);
		}
	}

}