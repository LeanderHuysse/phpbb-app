<?php
/***************************************************************************
 *                                index.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id$
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);

$viewcat = (!empty($HTTP_GET_VARS['c'])) ? intval($HTTP_GET_VARS['c']) : -1;
$forum_id = (!empty($HTTP_GET_VARS['f'])) ? intval($HTTP_GET_VARS['f']) : 0;

if (isset($HTTP_GET_VARS['mark']) || isset($HTTP_POST_VARS['mark']))
{
	$mark_read = (isset($HTTP_POST_VARS['mark'])) ? $HTTP_POST_VARS['mark'] : $HTTP_GET_VARS['mark'];
}
else
{
	$mark_read = '';
}

//
// Start session management
//
$userdata = $session->start();
$acl = new acl($userdata);
//
// End session management
//

//
// Configure style, language, etc.
//
$session->configure($userdata);

//
// Handle marking posts
//
if ($mark_read == 'forums')
{
	if ($userdata['user_id'])
	{
		setcookie($board_config['cookie_name'] . '_f_all', time(), 0, $board_config['cookie_path'], $board_config['cookie_domain'], $board_config['cookie_secure']);
	}

	$template->assign_vars(array(
		'META' => '<meta http-equiv="refresh" content="3;url='  . "index.$phpEx$SID" . '">')
	);

	$message = $lang['Forums_marked_read'] . '<br /><br />' . sprintf($lang['Click_return_index'], '<a href="' . "index.$phpEx$SID" . '">', '</a> ');
	message_die(MESSAGE, $message);
}
//
// End handle marking posts
//

$mark_topics = (isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t'])) ? unserialize(stripslashes($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t'])) : array();
$mark_forums = (isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f'])) ? unserialize(stripslashes($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f'])) : array();

//
// Set some stats, get posts count from forums data if we... hum... retrieve all forums data
//
$total_posts = 0;
$total_users = $board_config['num_users'];
$newest_user = $board_config['newest_username'];
$newest_uid = $board_config['newest_user_id'];

if ($total_users == 0)
{
	$l_total_user_s = $lang['Registered_users_zero_total'];
}
else if ($total_users == 1)
{
	$l_total_user_s = $lang['Registered_user_total'];
}
else
{
	$l_total_user_s = $lang['Registered_users_total'];
}

$forum_moderators = array();
get_moderators($forum_moderators);

$branch_root_id = 0;
$forum_rows = $subforums = array();

$result = $db->sql_query('SELECT * FROM ' . FORUMS_TABLE . ' ORDER BY left_id');
while ($row = $db->sql_fetchrow($result))
{
	if ($row['parent_id'] == 0)
	{
		$forum_rows[] = $row;

		if ($row['forum_status'] == ITEM_CATEGORY)
		{
			$branch_root_id = $row['forum_id'];
		}
		else
		{
			$branch_root_id = 0;
		}
	}
	elseif ($row['parent_id'] == $branch_root_id)
	{
		$forum_rows[] = $row;
		$forum_root_id = $row['forum_id'];
	}
	elseif ($row['display_on_index'] && $row['forum_status'] != ITEM_CATEGORY)
	{
		if ($acl->get_acl($row['forum_id'], 'forum', 'list'))
		{
			$subforums[$forum_root_id][] = $row;
		}
	}
}

function format_subforums_list($subforums)
{
	if (empty($subforums))
	{
		return '';
	}

	global $phpEx, $SID;
	foreach ($subforums as $row)
	{
		$alist[$row['forum_id']] = $row['forum_name'];
	}
	asort($alist);

	$links = array();
	foreach ($alist as $forum_id => $forum_name)
	{
		$links[] = '<a href="viewforum.' . $phpEx . $SID . '&f=' . $forum_id . '">' . htmlspecialchars($forum_name) . '</a>';
	}

	return implode(', ', $links);
}

foreach ($forum_rows as $row)
{
	extract($row);
	if ($parent_id == 0)
	{
		if ($forum_status == ITEM_CATEGORY)
		{
			$branch_root_id = $forum_id;
			$stored_cat = $row;
			continue;
		}
		else
		{
			$branch_root_id = 0;
			unset($stored_cat);
		}
	}
	elseif (!empty($stored_cat))
	{
		$template->assign_block_vars('forumrow', array(
			'S_IS_CAT'	=>	TRUE,
			'CAT_ID'	=>	$stored_cat['forum_id'],
			'CAT_NAME'	=>	$stored_cat['forum_name'],
			'U_VIEWCAT'	=>	'index.' . $phpEx . $SID . '&amp;c=' . $stored_cat['forum_id']
		));
		unset($stored_cat);
	}
	
	if ($acl->get_acl($forum_id, 'forum', 'list'))
	{
		if ($forum_status == ITEM_LOCKED)
		{
			$folder_image = $theme['forum_locked'];
			$folder_alt = $lang['Forum_locked'];
		}
		else
		{
			$unread_topics = false;
			if ($userdata['user_id'] && $forum_last_post_time > $userdata['user_lastvisit'])
			{
				$unread_topics = true;
				if (isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f_all']))
				{
					if ($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f_all'] > $forum_last_post_time)
					{
						$unread_topics = false;
					}
				}

				if (isset($mark_topics[$forum_id]) || isset($mark_forums[$forum_id]))
				{
					if ($mark_forums[$forum_id] > $userdata['user_lastvisit'] || !max($mark_topics[$forum_id]))
					{
						$unread_topics = false;
					}
				}
			}

			$folder_image = ($unread_topics) ? $theme['forum_new'] : $theme['forum'];
			$folder_alt = ($unread_topics) ? $lang['New_posts'] : $lang['No_new_posts'];
		}

		if ($forum_last_post_id)
		{
			$last_post = create_date($board_config['default_dateformat'], $forum_last_post_time, $board_config['board_timezone']) . '<br />';

			$last_post .= ($user_id == ANONYMOUS) ? (($forum_last_poster_name != '') ? $forum_last_poster_name . ' ' : $lang['Guest'] . ' ') : '<a href="profile.' . $phpEx . $SID . '&amp;mode=viewprofile&amp;u='  . $user_id . '">' . $username . '</a> ';

			$last_post .= '<a href="viewtopic.' . $phpEx . '$SID&amp;f=' . $forum_id . '&amp;p=' . $forum_last_post_id . '#' . $forum_last_post_id . '">' . create_img($theme['goto_post_latest'], $lang['View_latest_post']) . '</a>';
		}
		else
		{
			$last_post = $lang['No_Posts'];
		}

		if (!empty($forum_moderators[$forum_id]))
		{
			$l_moderators = (count($forum_moderators[$forum_id]) == 1) ? $lang['Moderator'] . ':' : $lang['Moderators'] . ':' ;
			$moderator_list = implode(', ', $forum_moderators[$forum_id]);
		}
		else
		{
			$l_moderators = '&nbsp;';
			$moderator_list = '&nbsp;';
		}

		if (isset($subforums[$forum_id]))
		{
			$subforums_list = format_subforums_list($subforums[$forum_id]);
			$l_subforums = '<br />' . (count($subforums[$forum_id]) == 1) ? $lang['Subforum'] : $lang['Subforums'];
		}
		else
		{
			$subforums_list = '';
			$l_subforums = '';
		}

		$template->assign_block_vars('forumrow', array(
			'S_IS_ROOTFORUM'	=>	TRUE,

			'FORUM_FOLDER_IMG'	=>	create_img($folder_image, $folder_alt),
			'FORUM_NAME'		=>	$forum_name,
			'FORUM_DESC'		=>	$forum_desc,

			'POSTS'				=>	$forum_posts,
			'TOPICS'			=>	$forum_topics,
			'LAST_POST'			=>	$last_post,
			'MODERATORS'		=>	$moderator_list,
			'SUBFORUMS'			=>	$subforums_list,

			'FORUM_IMG'			=>	$forum_image,

			'L_SUBFORUM'		=>	$l_subforums,
			'L_MODERATOR'		=>	$l_moderators,
			'L_FORUM_FOLDER_ALT' =>	$folder_alt,

			'U_VIEWFORUM'		=>	'viewforum.' . $phpEx . $SID . '&amp;f=' . $forum_id
		));
	}
}

if ($total_posts == 0)
{
	$l_total_post_s = $lang['Posted_articles_zero_total'];
}
else if ($total_posts == 1)
{
	$l_total_post_s = $lang['Posted_article_total'];
}
else
{
	$l_total_post_s = $lang['Posted_articles_total'];
}

$template->assign_vars(array(
	'TOTAL_POSTS' => sprintf($l_total_post_s, $total_posts),
	'TOTAL_USERS' => sprintf($l_total_user_s, $total_users),
	'NEWEST_USER' => sprintf($lang['Newest_user'], '<a href="profile.' . $phpEx . $SID . '&amp;mode=viewprofile&amp;u=' . $newest_uid . '">', $newest_user, '</a>'),

	'FORUM_IMG' => create_img($theme['forum'], $lang['No_new_posts']),
	'FORUM_NEW_IMG' => create_img($theme['forum_new'], $lang['New_posts']),
	'FORUM_LOCKED_IMG' => create_img($theme['forum_locked'], $lang['No_new_posts_locked']),

	'L_FORUM' => $lang['Forum'],
	'L_TOPICS' => $lang['Topics'],
	'L_REPLIES' => $lang['Replies'],
	'L_VIEWS' => $lang['Views'],
	'L_POSTS' => $lang['Posts'],
	'L_LASTPOST' => $lang['Last_Post'],
	'L_NO_NEW_POSTS' => $lang['No_new_posts'],
	'L_NEW_POSTS' => $lang['New_posts'],
	'L_NO_NEW_POSTS_LOCKED' => $lang['No_new_posts_locked'],
	'L_NEW_POSTS_LOCKED' => $lang['New_posts_locked'],
	'L_ONLINE_EXPLAIN' => $lang['Online_explain'],

	'L_VIEW_MODERATORS' => $lang['View_moderators'],
	'L_FORUM_LOCKED' => $lang['Forum_is_locked'],
	'L_MARK_FORUMS_READ' => $lang['Mark_all_forums'],
	'L_LEGEND' => $lang['Legend'],
	'L_NO_FORUMS' => $lang['No_forums'],

	'U_MARK_READ' => "index.$phpEx$SID&amp;mark=forums")
);

//
// Start output of page
//
$page_title = $lang['Index'];
include($phpbb_root_path . 'includes/page_header.'.$phpEx);

$template->set_filenames(array(
	'body' => 'index_body.html'
));

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>