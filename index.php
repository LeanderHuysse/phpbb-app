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

$phpbb_root_path = "./";
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_INDEX, $board_config['session_length']);
init_userprefs($userdata);
//
// End session management
//

$viewcat = (!empty($HTTP_GET_VARS[POST_CAT_URL])) ? $HTTP_GET_VARS[POST_CAT_URL] : -1;

if( isset($HTTP_GET_VARS['mark']) || isset($HTTP_POST_VARS['mark']) )
{
	$mark_read = ( isset($HTTP_POST_VARS['mark']) ) ? $HTTP_POST_VARS['mark'] : $HTTP_GET_VARS['mark'];
}
else
{
	$mark_read = "";
}

//
// Handle marking posts
//
if( $mark_read == "forums" )
{
	if( $userdata['session_logged_in'] )
	{
		$sql = "SELECT MAX(post_time) AS last_post 
			FROM " . POSTS_TABLE;
		if(!$result = $db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, "Could not query new topic information", "", __LINE__, __FILE__, $sql);
		}

		if( $forum_count = $db->sql_numrows($result) )
		{
			$mark_read_list = $db->sql_fetchrow($result);

			$last_post_time = $mark_read_list['last_post'];

			if( $last_post_time > $userdata['user_lastvisit'] ) 
			{
				setcookie($board_config['cookie_name'] . "_f_all", time(), 0, $board_config['cookie_path'], $board_config['cookie_domain'], $board_config['cookie_secure']);
			}
		}
	}

	$template->assign_vars(array(
		"META" => '<meta http-equiv="refresh" content="3;url='  .append_sid("index.$phpEx") . '">')
	);

	$message = $lang['Forums_marked_read'] . "<br /><br />" . sprintf($lang['Click_return_index'], "<a href=\"" . append_sid("index.$phpEx") . "\">", "</a> ");

	message_die(GENERAL_MESSAGE, $message);

}
//
// End handle marking posts
//


$tracking_topics = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_t"]) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_t"]) : "";
$tracking_forums = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_f"]) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_f"]) : "";


//
// If you don't use these stats on your index
// you may want to consider removing them since
// it will reduce the number of queries speeding
// up page generation a little
//
$total_posts = get_db_stat('postcount');
$total_users = get_db_stat('usercount');
$newest_userdata = get_db_stat('newestuser');
$newest_user = $newest_userdata['username'];
$newest_uid = $newest_userdata['user_id'];

if( $total_posts == 0 )
{
	$l_total_post_s = $lang['Posted_articles_zero_total'];
}
else if( $total_posts == 1 )
{
	$l_total_post_s = $lang['Posted_article_total'];
}
else
{
	$l_total_post_s = $lang['Posted_articles_total'];
}

if( $total_users == 0 )
{
	$l_total_user_s = $lang['Registered_users_zero_total'];
}
else if( $total_users == 1 )
{
	$l_total_user_s = $lang['Registered_user_total'];
}
else
{
	$l_total_user_s = $lang['Registered_users_total'];
}


//
// Start page proper
//
$sql = "SELECT c.cat_id, c.cat_title, c.cat_order
	FROM " . CATEGORIES_TABLE . " c, " . FORUMS_TABLE . " f
	WHERE f.cat_id = c.cat_id
	GROUP BY c.cat_id, c.cat_title, c.cat_order
	ORDER BY c.cat_order";
if(!$q_categories = $db->sql_query($sql))
{
	message_die(GENERAL_ERROR, "Could not query categories list", "", __LINE__, __FILE__, $sql);
}

if($total_categories = $db->sql_numrows($q_categories))
{
	$category_rows = $db->sql_fetchrowset($q_categories);

	$limit_forums = "";

	//
	// Define appropriate SQL
	//
	switch(SQL_LAYER)
	{
		case 'postgresql':
			$limit_forums = ($viewcat != -1) ? "AND f.cat_id = $viewcat " : "";

			$sql = "SELECT f.*, p.post_time, p.post_username, u.username, u.user_id 
				FROM " . FORUMS_TABLE . " f, " . POSTS_TABLE . " p, " . USERS_TABLE . " u
				WHERE p.post_id = f.forum_last_post_id 
					AND u.user_id = p.poster_id  
					$limit_forums
					UNION (
						SELECT f.*, NULL, NULL, NULL, NULL
						FROM " . FORUMS_TABLE . " f
						WHERE NOT EXISTS (
							SELECT p.post_time
							FROM " . POSTS_TABLE . " p
							WHERE p.post_id = f.forum_last_post_id  
						)
						$limit_forums
					)
					ORDER BY cat_id, forum_order";
			break;

		case 'oracle':
			$limit_forums = ($viewcat != -1) ? "AND f.cat_id = $viewcat " : "";

			$sql = "SELECT f.*, p.post_time, p.post_username, u.username, u.user_id 
				FROM " . FORUMS_TABLE . " f, " . POSTS_TABLE . " p, " . USERS_TABLE . " u
				WHERE p.post_id = f.forum_last_post_id(+)
					AND u.user_id = p.poster_id(+)
					$limit_forums
				ORDER BY f.cat_id, f.forum_order";
			break;

		default:
			$limit_forums = ($viewcat != -1) ? "WHERE f.cat_id = $viewcat " : "";

			$sql = "SELECT f.*, p.post_time, p.post_username, u.username, u.user_id
				FROM (( " . FORUMS_TABLE . " f
				LEFT JOIN " . POSTS_TABLE . " p ON p.post_id = f.forum_last_post_id )
				LEFT JOIN " . USERS_TABLE . " u ON u.user_id = p.poster_id )
				$limit_forums
				ORDER BY f.cat_id, f.forum_order";
			break;
	}

	if(!$q_forums = $db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, "Could not query forums information", "", __LINE__, __FILE__, $sql);
	}
	if( !$total_forums = $db->sql_numrows($q_forums) )
	{
		message_die(GENERAL_MESSAGE, $lang['No_forums']);
	}
	$forum_rows = $db->sql_fetchrowset($q_forums);

	if( $userdata['session_logged_in'] )
	{
		$sql = "SELECT f.forum_id, t.topic_id, p.post_time
			FROM " . FORUMS_TABLE . " f, " . TOPICS_TABLE . " t, " . POSTS_TABLE . " p
			WHERE t.forum_id = f.forum_id
				AND p.post_id = t.topic_last_post_id
				AND p.post_time > " . $userdata['user_lastvisit'] . " 
				AND t.topic_moved_id = 0";
		if(!$new_topic_ids = $db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, "Could not query new topic information", "", __LINE__, __FILE__, $sql);
		}

		while( $topic_data = $db->sql_fetchrow($new_topic_ids) )
		{
			$new_topic_data[$topic_data['forum_id']][$topic_data['topic_id']] = $topic_data['post_time'];
		}
	}

	//
	// Obtain list of moderators of each forum
	//
	$sql = "SELECT aa.forum_id, g.group_name, g.group_id, g.group_single_user, u.user_id, u.username
		FROM " . AUTH_ACCESS_TABLE . " aa, " . USER_GROUP_TABLE . " ug, " . GROUPS_TABLE . " g, " . USERS_TABLE . " u
		WHERE aa.auth_mod = " . TRUE . "
			AND ug.group_id = aa.group_id 
			AND g.group_id = aa.group_id 
			AND u.user_id = ug.user_id 
		ORDER BY aa.forum_id, g.group_id, u.user_id";
	if(!$q_forum_mods = $db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, "Could not query forum moderator information", "", __LINE__, __FILE__, $sql);
	}
	$forum_mods_list = $db->sql_fetchrowset($q_forum_mods);

	for($i = 0; $i < count($forum_mods_list); $i++)
	{
		if($forum_mods_list[$i]['group_single_user'] || !$forum_mods_list[$i]['group_id'])
		{
			$forum_mods_single_user[$forum_mods_list[$i]['forum_id']][] = 1;

			$forum_mods_name[$forum_mods_list[$i]['forum_id']][] = $forum_mods_list[$i]['username'];
			$forum_mods_id[$forum_mods_list[$i]['forum_id']][] = $forum_mods_list[$i]['user_id'];
		}
		else
		{
			$forum_mods_single_user[$forum_mods_list[$i]['forum_id']][] = 0;

			$forum_mods_name[$forum_mods_list[$i]['forum_id']][] = $forum_mods_list[$i]['group_name'];
			$forum_mods_id[$forum_mods_list[$i]['forum_id']][] = $forum_mods_list[$i]['group_id'];
		}
	}

	//
	// Find which forums are visible for this user
	//
	$is_auth_ary = array();
	$is_auth_ary = auth(AUTH_VIEW, AUTH_LIST_ALL, $userdata, $forum_rows);

	$template->set_filenames(array(
		"body" => "index_body.tpl")
	);

	$template->assign_vars(array(
		"TOTAL_POSTS" => sprintf($l_total_post_s, $total_posts),
		"TOTAL_USERS" => sprintf($l_total_user_s, $total_users),
		"NEWEST_USER" => sprintf($lang['Newest_user'], "<a href=\"" . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$newest_uid") . "\">", $newest_user, "</a>"), 

		"FORUM_IMG" => $images['forum'],
		"FORUM_NEW_IMG" => $images['forum_new'],
		"FORUM_LOCKED_IMG" => $images['forum_locked'],

		"L_MODERATOR" => $lang['Moderators'], 
		"L_FORUM_LOCKED" => $lang['Forum_is_locked'],
		"L_MARK_FORUMS_READ" => $lang['Mark_all_forums'], 

		"U_MARK_READ" => append_sid("index.$phpEx?mark=forums"))
	);

	//
	// Okay, let's build the index
	//
	$gen_cat = array();

	for($i = 0; $i < $total_categories; $i++)
	{
		$cat_id = $category_rows[$i]['cat_id'];

		$count = 0;

		for($j = 0; $j < $total_forums; $j++)
		{
			$forum_id = $forum_rows[$j]['forum_id'];

			if( $is_auth_ary[$forum_id]['auth_view'] && ( ( $forum_rows[$j]['cat_id'] == $cat_id && $viewcat == -1 ) || $cat_id == $viewcat) )
			{
				if(!$gen_cat[$cat_id])
				{
					$template->assign_block_vars("catrow", array(
						"CAT_ID" => $cat_id,
						"CAT_DESC" => $category_rows[$i]['cat_title'],
						"U_VIEWCAT" => append_sid("index.$phpEx?" . POST_CAT_URL . "=$cat_id"))
					);
					$gen_cat[$cat_id] = 1;
				}

				if($forum_rows[$j]['forum_status'] == FORUM_LOCKED)
				{
					$folder_image = "<img src=\"" . $images['forum_locked'] . "\" alt=\"" . $lang['Forum_locked'] . "\" />";
				}
				else
				{
					$unread_topics = false;
					if( $userdata['session_logged_in'] )
					{
						if( count($new_topic_data[$forum_id]) )
						{
							$forum_last_post_time = 0;

							while( list($check_topic_id, $check_post_time) = @each($new_topic_data[$forum_id]) )
							{
								if( empty($tracking_topics['' . $check_topic_id . '']) )
								{
									$unread_topics = true;
									$forum_last_post_time = max($check_post_time, $forum_last_post_time);

								}
								else
								{
									if( $tracking_topics['' . $check_topic_id . ''] < $check_post_time )
									{
										$unread_topics = true;
										$forum_last_post_time = max($check_post_time, $forum_last_post_time);
									}
								}
							}

							if( !empty($tracking_forums['' . $forum_id . '']) )
							{
								if( $tracking_forums['' . $forum_id . ''] > $forum_last_post_time )
								{
									$unread_topics = false;
								}
							}

							if( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_f_all"]) )
							{
								if( $HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_f_all"] > $forum_last_post_time )
								{
									$unread_topics = false;
								}
							}

						}
					}

					$folder_image = ( $unread_topics ) ? "<img src=\"" . $images['forum_new'] . "\" alt=\"" . $lang['New_posts'] . "\" title=\"" . $lang['New_posts'] . "\" />" : "<img src=\"" . $images['forum'] . "\" alt=\"" . $lang['No_new_posts'] . "\" title=\"" . $lang['No_new_posts'] . "\" />";
				}

				$posts = $forum_rows[$j]['forum_posts'];
				$topics = $forum_rows[$j]['forum_topics'];

				if( $forum_rows[$j]['username'] != "" && $forum_rows[$j]['post_time'] > 0 )
				{
					$last_post_time = create_date($board_config['default_dateformat'], $forum_rows[$j]['post_time'], $board_config['board_timezone']);

					$last_post = $last_post_time . "<br />";

					$last_post .= ( $forum_rows[$j]['user_id'] == ANONYMOUS ) ? ( ($forum_rows[$j]['post_username'] != "" ) ? $forum_rows[$j]['post_username'] . " " : $lang['Guest'] . " " ) : "<a href=\"" . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "="  . $forum_rows[$j]['user_id']) . "\">" . $forum_rows[$j]['username'] . "</a> ";
					
					$last_post .= "<a href=\"" . append_sid("viewtopic.$phpEx?"  . POST_POST_URL . "=" . $forum_rows[$j]['forum_last_post_id']) . "#" . $forum_rows[$j]['forum_last_post_id'] . "\"><img src=\"" . $images['icon_latest_reply'] . "\" border=\"0\" alt=\"" . $lang['View_latest_post'] . "\" title=\"" . $lang['View_latest_post'] . "\" /></a>";
				}
				else
				{
					$last_post = $lang['No_Posts'];
				}

				$mod_count = 0;
				$moderators_links = "";
				for($mods = 0; $mods < count($forum_mods_name[$forum_id]); $mods++)
				{
					if( !strstr($moderators_links, $forum_mods_name[$forum_id][$mods]) )
					{
						if($mods > 0)
						{
							$moderators_links .= ", ";
						}

						if( $forum_mods_single_user[$forum_id][$mods])
						{
							$moderators_links .= "<a href=\"" . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $forum_mods_id[$forum_id][$mods]) . "\">" . $forum_mods_name[$forum_id][$mods] . "</a>";
						}
						else
						{
							$moderators_links .= "<a href=\"" . append_sid("groupcp.$phpEx?" . POST_GROUPS_URL . "=" . $forum_mods_id[$forum_id][$mods]) . "\">" . $forum_mods_name[$forum_id][$mods] . "</a>";
						}

						$mod_count++;
					}
				}

				if( $moderators_links == "" )
				{
					$moderators_links = "&nbsp;";
				}

				if( $mods > 0 )
				{
					$l_moderators = ( $mods == 1 ) ? $lang['Moderator'] : $lang['Moderators'];
				}
				else
				{
					$l_moderators = "&nbsp;";
				}

				$row_color = ( !($count % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
				$row_class = ( !($count % 2) ) ? $theme['td_class1'] : $theme['td_class2'];

				$template->assign_block_vars("catrow.forumrow",	array(
					"ROW_COLOR" => "#" . $row_color,
					"ROW_CLASS" => $row_class,
					"FOLDER" => $folder_image,
					"FORUM_NAME" => $forum_rows[$j]['forum_name'],
					"FORUM_DESC" => $forum_rows[$j]['forum_desc'],
					"POSTS" => $forum_rows[$j]['forum_posts'],
					"TOPICS" => $forum_rows[$j]['forum_topics'],
					"LAST_POST" => $last_post,
					"MODERATORS" => $moderators_links,

					"L_MODERATOR" => $l_moderators, 

					"U_VIEWFORUM" => append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id"))
				);

				$count++;
			}
			else if($viewcat != -1)
			{
				if(!$gen_cat[$cat_id])
				{
					$template->assign_block_vars("catrow", array(
						"CAT_ID" => $cat_id,
						"CAT_DESC" => $category_rows[$i]['cat_title'],
						"U_VIEWCAT" => append_sid("index.$phpEx?" . POST_CAT_URL . "=$cat_id"))
					);
					$gen_cat[$cat_id] = 1;
				}
			}
		}
	} // for ... categories

}// if ... total_categories
else
{
	message_die(GENERAL_MESSAGE, $lang['No_forums']);
}

//
// Output page header and open the index body template
// we do this here because of the mark topics read cookie
// code
//
$page_title = $lang['Index'];
include($phpbb_root_path . 'includes/page_header.'.$phpEx);

//
// Generate the page
//
$template->pparse("body");

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>