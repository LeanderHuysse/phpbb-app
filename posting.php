<?php
/***************************************************************************
 *                                posting.php
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

// TODO for 2.2:
// 
// * deletion of posts/polls
// * topic review additions, quoting, etc.?
// * post preview (poll preview too?)
// * check for reply since started posting upon submission?
// * hidden form element containing sid to prevent remote posting - Edwin van Vliet
// * attachments -> Acyd Burns Mod functionality
// * bbcode parsing -> see functions_posting.php
// * lock topic option within posting
// * multichoice polls
// * permission defined ability for user to add poll options
// * Spellcheck? aspell? or some such?

define('IN_PHPBB', true);
if (count($_POST))
{
	define('NEED_SID', true);
}

$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include($phpbb_root_path . 'includes/functions_posting.'.$phpEx);

// Start session management
$user->start();
$user->setup();
$auth->acl($user->data);
// End session management

// Grab only parameters needed here
$mode = (!empty($_REQUEST['mode'])) ? strval($_REQUEST['mode']) : '';
$post_id = (!empty($_REQUEST['p'])) ? intval($_REQUEST['p']) : false;
$topic_id = (!empty($_REQUEST['t'])) ? intval($_REQUEST['t']) : false;
$forum_id = (!empty($_REQUEST['f'])) ? intval($_REQUEST['f']) : false;

// Was cancel pressed? If so then redirect to the appropriate page
if (!empty($_REQUEST['cancel']))
{
	$redirect = (intval($post_id)) ? "viewtopic.$phpEx$SID&p=" . intval($post_id) . "#" . intval($post_id) : ((intval($topic_id)) ? "viewtopic.$phpEx$SID&t=" . intval($topic_id) : ((intval($forum_id)) ? "viewforum.$phpEx$SID&f=" . intval($forum_id) : "index.$phpEx$SID"));
	redirect($redirect);
}

// ---------
// POST INFO

// What is all this following SQL for? Well, we need to know
// some basic information in all cases before we do anything.
switch ($mode)
{
	case 'post':
		if (empty($forum_id))
		{
			trigger_error($user->lang['No_forum_id']);
		}

		$sql = 'SELECT forum_id, forum_name, forum_parents, forum_status, forum_postable, enable_icons, enable_post_count, enable_moderate 
			FROM ' . FORUMS_TABLE . '
			WHERE forum_id = ' . $forum_id;
		break;

	case 'reply':
		if (empty($topic_id))
		{
			trigger_error($user->lang['No_topic_id']);
		}

		$sql = 'SELECT t.*, f.forum_name, f.forum_parents, f.forum_status, f.forum_postable, f.enable_icons, f.enable_post_count, f.enable_moderate 
			FROM ' . TOPICS_TABLE . ' t, ' . FORUMS_TABLE . ' f
			WHERE t.topic_id = ' . $topic_id . '
				AND f.forum_id = t.forum_id';
		break;

	case 'quote':
	case 'edit':
	case 'delete':
		if (empty($post_id))
		{
			trigger_error($user->lang['No_post_id']);
		}

		$sql = 'SELECT t.*, p.*, pt.*, f.forum_name, f.forum_parents, f.forum_status, f.forum_postable, f.enable_icons, f.enable_post_count, f.enable_moderate 
			FROM ' . POSTS_TABLE . ' p, ' . POSTS_TEXT_TABLE . ' pt, ' . TOPICS_TABLE . ' t, ' . FORUMS_TABLE . ' f
			WHERE p.post_id = ' . $post_id . '
				AND t.topic_id = p.topic_id
				AND pt.post_id = p.post_id
				AND f.forum_id = t.forum_id';
		break;

	case 'topicreview':
		if (!isset($topic_id))
		{
			trigger_error($user->lang['Topic_not_exist']);
		}

		topic_review($topic_id, false);
		break;

	case 'smilies':
		generate_smilies('window');
		break;

	default:
		trigger_error($user->lang['No_valid_mode']);
}

if ($sql != '')
{
	$result = $db->sql_query($sql);

	// This will overwrite parameter passed id's
	extract($db->sql_fetchrow($result));
	$db->sql_freeresult($result);
}

// Notify user checkbox
if ($mode != 'post' && $user->data['user_id'] != ANONYMOUS)
{
	$sql = "SELECT topic_id
		FROM " . TOPICS_WATCH_TABLE . "
		WHERE topic_id = " . intval($topic_id) . "
			AND user_id = " . $user->data['user_id'];
	$result = $db->sql_query($sql);

	$notify_set = ($db->sql_fetchrow($result)) ? true : false;
	$db->sql_freeresult($result);
}

if ($mode == 'edit' && !empty($poll_start))
{
	$sql = "SELECT *
		FROM phpbb_poll_results
		WHERE topic_id = " . intval($topic_id);
	$result = $db->sql_query($sql);

	$poll_options = array();
	while ($row = $db->sql_fetchrow($result))
	{
		$poll_options[] = $row['poll_option_text'];
	}
	$db->sql_freeresult($result);
}

// POST INFO
// ---------


// -----------------
// PERMISSION CHECKS

if (!$auth->acl_gets('f_' . $mode, 'm_', 'a_', intval($forum_id)) && !empty($forum_postable))
{
	trigger_error($user->lang['User_cannot_' . $mode]);
}

// Forum/Topic locked?
if ((intval($forum_status) == ITEM_LOCKED || intval($topic_status) == ITEM_LOCKED) && !$auth->acl_gets('m_edit', 'a_', intval($forum_id)))
{
	$message = (intval($forum_status) == ITEM_LOCKED) ? 'Forum_locked' : 'Topic_locked';
	trigger_error($user->lang[$message]);
}

// Can we edit this post?
if (($mode == 'edit' || $mode == 'delete') && !empty($config['edit_time']) && $post_time < time() - intval($config['edit_time']) && !$auth->acl_gets('m_edit', 'a_', intval($forum_id)))
{
	trigger_error($user->lang['Cannot_edit_time']);
}

// PERMISSION CHECKS
// -----------------


// --------------
// PROCESS SUBMIT

if (isset($_REQUEST['post']))
{
	// If replying/quoting and last post id has changed
	// give user option of continuing submit or return to post
	if (($mode == 'reply' || $mode == 'quote') && intval($topic_last_post_id) != intval($topic_cur_post_id))
	{

	}

	$err_msg = '';
	$current_time = time();
	$parse_msg = new parse_message();
	$search = new fulltext_search();

	// Grab relevant submitted data
	$message	= (!empty($_REQUEST['message'])) ? $_REQUEST['message'] : '';
	$subject	= (!empty($_REQUEST['subject'])) ? $_REQUEST['subject'] : '';
	$username	= (!empty($_REQUEST['username'])) ? $_REQUEST['username'] : '';
	$topic_type	= (!empty($_REQUEST['topic_type'])) ? intval($_REQUEST['topic_type']) : '';
	$icon_id	= (!empty($_REQUEST['icon'])) ? intval($_REQUEST['icon']) : 1;

	$enable_html 	= (!intval($config['allow_html'])) ? 0 : ((!empty($_REQUEST['disable_html'])) ? 0 : 1);
	$enable_bbcode 	= (!intval($config['allow_bbcode'])) ? 0 : ((!empty($_REQUEST['disable_bbcode'])) ? 0 : 1);
	$enable_smilies = (!intval($config['allow_smilies'])) ? 0 : ((!empty($_REQUEST['disable_smilies'])) ? 0 : 1);
	$enable_urls 	= (!empty($_REQUEST['disable_magic_url'])) ? 0 : 1;
	$enable_sig 	= (empty($_REQUEST['attach_sig'])) ? 1 : 0;

	$poll_subject		= (!empty($_REQUEST['poll_subject'])) ? $_REQUEST['poll_subject'] : '';
	$poll_length		= (!empty($_REQUEST['poll_length'])) ? $_REQUEST['poll_length'] : '';
	$poll_option_text	= (!empty($_REQUEST['poll_option_text'])) ? $_REQUEST['poll_option_text'] : '';

	// Grab md5 'checksum' of new message
	$message_md5 = md5($message);

	// Check checksum ... don't re-parse message if the same
	if ($mode != 'edit' || $message_md5 != $post_checksum)
	{
		// Parse message
		$bbcode_uid = (!empty($bbcode_uid)) ? $bbcode_uid : '';

		if(($result = $parse_msg->parse($message, $enable_html, $enable_bbcode, $bbcode_uid, $enable_urls, $enable_smilies)) != '')
		{
			$err_msg .= ((!empty($err_msg)) ? '<br />' : '') . $result;
		}
	}

	if ($mode != 'edit')
	{
		// Flood check
		$where_sql = ($user->data['user_id'] == ANONYMOUS) ? "poster_ip = '$user->ip'" : 'poster_id = ' . $user->data['user_id'];
		$sql = "SELECT MAX(post_time) AS last_post_time
			FROM " . POSTS_TABLE . "
			WHERE $where_sql";
		$result = $db->sql_query($sql);

		if ($row = $db->sql_fetchrow($result))
		{
			if (intval($row['last_post_time']) && ($current_time - intval($row['last_post_time'])) < intval($config['flood_interval']) && !$auth->acl_gets('f_ignoreflood', 'm_', 'a_', intval($forum_id)))
			{
				$err_msg .= ((!empty($err_msg)) ? '<br />' : '') . $user->lang['FLOOD_ERROR'];
			}
		}
	}

	// Validate username
	if (($username != '' && $user->data['user_id'] == ANONYMOUS) || ($mode == 'edit' && $post_username != ''))
	{
		$username = strip_tags(htmlspecialchars($username));
		if (($result = validate_username($username)) != false)
		{
			$err_msg .= ((!empty($err_msg)) ? '<br />' : '') . $result;
		}

	}

	// Parse subject
	if (($subject = trim(htmlspecialchars(strip_tags($subject)))) == '' && ($mode == 'post' || ($mode == 'edit' && $topic_first_post_id == $post_id)))
	{
		$err_msg .= ((!empty($err_msg)) ? '<br />' : '') . $user->lang['Empty_subject'];
	}

	// Process poll options
	if (!empty($poll_option_text) && (($auth->acl_get('f_poll', intval($forum_id)) && empty($poll_last_vote)) || $auth->acl_gets('m_edit', 'a_', intval($forum_id))))
	{
		$poll_options = explode("\n", $poll_option_text);
		unset($poll_option_text);
		$poll_options_size = sizeof($poll_options);

		$result = $parse_msg->parse($poll_options, $enable_html, $enable_bbcode, $bbcode_uid, $enable_urls, $enable_smilies);

		if (sizeof($poll_options) == 1)
		{
			$err_msg .= ((!empty($err_msg)) ? '<br />' : '') . $user->lang['Too_few_poll_options'];
		}
		else if (sizeof($poll_options) > intval($config['max_poll_options']))
		{
			$err_msg .= ((!empty($err_msg)) ? '<br />' : '') . $user->lang['Too_many_poll_options'];
		}
		else if (sizeof($poll_options) < $poll_options_size)
		{
			$err_msg .= ((!empty($err_msg)) ? '<br />' : '') . $user->lang['No_delete_poll_options'];
		}

		$poll_subject = (!empty($poll_subject)) ? trim(htmlspecialchars(strip_tags($poll_subject))) : '';
		$poll_length = (!empty($poll_length)) ? intval($poll_length) : 0;
	}

	// Check topic type
	if ($topic_type != POST_NORMAL)
	{
		$auth_option = '';
		switch ($topic_type)
		{
			case POST_NEWS;
				$auth_option = 'news';
				break;
			case POST_ANNOUNCE;
				$auth_option = 'announce';
				break;
			case POST_STICKY;
				$auth_option = 'sticky';
				break;
		}

		if (!$auth->acl_gets('f_' . $auth_option, 'm_', 'a_', intval($forum_id)))
		{
			$err_msg .= ((!empty($err_msg)) ? '<br />' : '') . $user->lang['Cannot_post_' . $auth_option];
		}
	}

	// Store message, sync counters
	if ($err_msg == '')
	{
		$db->sql_transaction();

		// topic info
		if ($mode == 'post' || ($mode == 'edit' && $topic_first_post_id == $post_id))
		{
			$topic_sql = array(
				'forum_id' 		=> intval($forum_id),
				'topic_title' 	=> $db->sql_escape(htmlspecialchars($subject)),
				'topic_poster' 	=> intval($user->data['user_id']),
				'topic_time' 	=> $current_time,
				'topic_type' 	=> (!empty($enable_icons)) ? intval($topic_type) : 0,
				'icon_id'	=> $icon_id,
				'topic_approved'=> (!empty($enable_moderate) && !$auth->acl_gets('f_ignorequeue', 'm_', 'a_', intval($forum_id))) ? 0 : 1,
			);
			if (!empty($poll_options))
			{
				$topic_sql = array_merge($topic_sql, array(
					'poll_title' => $db->sql_escape($poll_title),
					'poll_start' => (!empty($poll_start)) ? $poll_start : $current_time,
					'poll_length' => $poll_length * 3600
				));
			}
			$sql = ($mode == 'post') ? 'INSERT INTO ' . TOPICS_TABLE . ' ' . $db->sql_build_array('INSERT', $topic_sql): 'UPDATE ' . TOPICS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $topic_sql) . ' WHERE topic_id = ' . intval($topic_id);
			$db->sql_query($sql);

			$topic_id = ($mode == 'post') ? $db->sql_nextid() : $topic_id;
		}

		// post
		$post_sql = array(
			'topic_id' 			=> intval($topic_id),
			'forum_id' 			=> intval($forum_id),
			'poster_id' 		=> ($mode == 'edit') ? intval($poster_id) : intval($user->data['user_id']),
			'post_username'		=> ($username != '') ? $db->sql_escape($username) : '', 
			'icon_id'			=> $icon_id, 
			'poster_ip' 		=> $user->ip,
			'post_time' 		=> $current_time,
			'post_approved' 	=> (!empty($enable_moderate) && !$auth->acl_gets('f_ignorequeue', 'm_', 'a_', intval($forum_id))) ? 0 : 1,
			'post_edit_time' 	=> ($mode == 'edit' && $poster_id == $user->data['user_id']) ? $current_time : 0,
			'enable_sig' 		=> $enable_html,
			'enable_bbcode' 	=> $enable_bbcode,
			'enable_html' 		=> $enable_html,
			'enable_smilies' 	=> $enable_smilies,
			'enable_magic_url' 	=> $enable_urls,
		);
		$sql = ($mode == 'edit' && $poster_id == $user->data['user_id']) ? 'UPDATE ' . POSTS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $post_sql) . ' , post_edit_count = post_edit_count + 1 WHERE post_id = ' . intval($post_id) : 'INSERT INTO ' . POSTS_TABLE . ' ' . $db->sql_build_array('INSERT', $post_sql);
		$db->sql_query($sql);

		$post_id = ($mode == 'edit') ? $post_id : $db->sql_nextid();

		// post_text ... may merge into posts table
		$post_text_sql = array(
			'post_subject'	=> $db->sql_escape(htmlspecialchars($subject)),
			'bbcode_uid'	=> $bbcode_uid,
			'post_id' 		=> intval($post_id),
		);
		if ($mode != 'edit' || $message_md5 != $post_checksum)
		{
			$post_text_sql = array_merge($post_text_sql, array(
				'post_checksum' => $message_md5,
				'post_text' 	=> $db->sql_escape($message),
			));
		}
		$sql = ($mode == 'edit') ? 'UPDATE ' . POSTS_TEXT_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $post_text_sql) . ' WHERE post_id = ' . intval($post_id) : 'INSERT INTO ' . POSTS_TEXT_TABLE . ' ' . $db->sql_build_array('INSERT', $post_text_sql);
		$db->sql_query($sql);

		// poll options
		if (!empty($poll_options))
		{
			$cur_poll_options = array();
			if (!empty($poll_start) && $mode == 'edit')
			{
				$sql = "SELECT * FROM " . POLL_OPTIONS_TABLE . " 
					WHERE topic_id = $topic_id
					ORDER BY poll_option_id";
				$result = $db->sql_query($sql);

				while ($cur_poll_options[] = $db->sql_fetchrow($result));
				$db->sql_freeresult($result);
			}

			for ($i = 0; $i < sizeof($poll_options); $i++)
			{
				if (trim($poll_options[$i]) != '')
				{
					if (empty($cur_poll_options[$i]))
					{
						$sql = "INSERT INTO " . POLL_OPTIONS_TABLE . "  (topic_id, poll_option_text)
							VALUES (" . intval($topic_id) . ", '" . $db->sql_escape($poll_options[$i]) . "')";
						$db->sql_query($sql);
					}
					else if ($poll_options[$i] != $cur_poll_options[$i])
					{
						$sql = "UPDATE " . POLL_OPTIONS_TABLE . " 
							SET poll_option_text = '" . $db->sql_escape($poll_options[$i]) . "'
							WHERE poll_option_id = " . $cur_poll_options[$i]['poll_option_id'];
						$db->sql_query($sql);
					}
				}
			}
		}

		// Fulltext parse
		if ($mode != 'edit' || $message_md5 != $post_checksum)
		{
			$result = $search->add($mode, $post_id, $message, $subject);
		}

		// Sync forums, topics and users ...
		if ($mode != 'edit')
		{
			// Update forums: last post info, topics, posts ... we need to update
			// each parent too ...
			$forum_ids = intval($forum_id);
			if (!empty($forum_parents))
			{
				$forum_parents = unserialize($forum_parents);
				foreach ($forum_parents as $parent_forum_id => $parent_name)
				{
					$forum_ids .= ', ' . $parent_forum_id;
				}
			}
			$forum_topics_sql = ($mode == 'post') ? ', forum_topics = forum_topics + 1' : '';
			$forum_sql = array(
				'forum_last_post_id' 	=> intval($post_id),
				'forum_last_post_time' 	=> $current_time,
				'forum_last_poster_id' 	=> intval($user->data['user_id']),
				'forum_last_poster_name'=> ($user->data['user_id'] == ANONYMOUS) ? $db->sql_escape($username) : $user->data['username'],
			);
			$sql = 'UPDATE ' . FORUMS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $forum_sql) . ', forum_posts = forum_posts + 1' . $forum_topics_sql . ' WHERE forum_id IN (' . $forum_ids . ')';
			$db->sql_query($sql);

			// Update topic: first/last post info, replies
			$topic_sql = array(
				'topic_last_post_id' 	=> intval($post_id),
				'topic_last_post_time' 	=> $current_time,
				'topic_last_poster_id' 	=> intval($user->data['user_id']),
				'topic_last_poster_name'=> ($username != '') ? $username : '',
			);
			if ($mode == 'post')
			{
				$topic_sql = array_merge($topic_sql, array(
					'topic_first_post_id' 		=> intval($post_id),
					'topic_time' 				=> $current_time,
					'topic_poster' 				=> intval($user->data['user_id']),
					'topic_first_poster_name' 	=> ($username != '') ? $username : '',
				));
			}
			$topic_replies_sql = ($mode == 'reply') ? ', topic_replies = topic_replies + 1' : '';
			$sql = 'UPDATE ' . TOPICS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $topic_sql) . $topic_replies_sql . ' WHERE topic_id = ' . intval($topic_id);
			$db->sql_query($sql);

			// Update user post count ... if appropriate
			if (!empty($enable_post_count) && $user->data['user_id'] != ANONYMOUS)
			{
				$sql = 'UPDATE ' . USERS_TABLE . '
					SET user_posts = user_posts + 1
					WHERE user_id = ' . $user->data['user_id'];
				$db->sql_query($sql);
			}

			// post counts for index, etc.
			if ($mode == 'post')
			{
				set_config('num_topics', $config['num_topics'] + 1, TRUE);
			}

			set_config('num_posts', $config['num_posts'] + 1, TRUE);
		}

		// Topic notification
		if (!empty($notify) && ($mode == 'post' || empty($notify_set)))
		{
			$sql = "INSERT INTO " . TOPICS_WATCH_TABLE . " (user_id, topic_id)
				VALUES (" . $user->data['user_id'] . ", $topic_id)";
			$db->sql_query($sql);
		}
		else if (empty($notify) && !empty($notify_set))
		{
			$sql = "DELETE FROM " . TOPICS_WATCH_TABLE . "
				WHERE user_id = " . $user->data['user_id'] . "
					AND topic_id = $topic_id";
			$db->sql_query($sql);
		}

		// Mark this topic as read and posted to.
		$mark_mode = ($mode == 'reply' || $mode == 'newtopic') ? 'post' : 'topic';
		markread($mark_mode, $forum_id, $topic_id, $post_id);

		$db->sql_transaction('commit');

		$template->assign_vars(array(
			'META' => '<meta http-equiv="refresh" content="5; url=' . "viewtopic.$phpEx$SID&amp;f=$forum_id&amp;p=$post_id#$post_id" . '">')
		);

		$message = (!empty($enable_moderate)) ? 'POST_STORED_MOD' : 'POST_STORED';
		$message = $user->lang[$message] . '<br /><br />' . sprintf($user->lang['Click_view_message'], '<a href="viewtopic.' . $phpEx . $SID .'&p=' . $post_id . '#' . $post_id . '">', '</a>') . '<br /><br />' . sprintf($user->lang['Click_return_forum'], '<a href="viewforum.' . $phpEx . $SID .'&p=' . intval($forum_id) . '">', '</a>');
		trigger_error($message);
	} // Store message, sync counters

	// Houston, we have an error ...
	$post_text		= &stripslashes($message);
	$post_subject 	= $topic_title = &stripslashes($subject);

	$template->assign_vars(array(
		'ERROR_MESSAGE' => $err_msg)
	);

} // isset($post)

// PROCESS SUBMIT
// --------------


// -----------
// DECODE TEXT

$server_protocol = ($config['cookie_secure']) ? 'https://' : 'http://';
$server_port = ($config['server_port'] <> 80) ? ':' . trim($config['server_port']) . '/' : '/';

$match = array(
	'#<!\-\- b \-\-><b>(.*?)</b><!\-\- b \-\->#s',
	'#<!\-\- u \-\-><u>(.*?)</u><!\-\- u \-\->#s',
	'#<!\-\- e \-\-><a href="mailto:(.*?)">.*?</a><!\-\- e \-\->#',
	'#<!\-\- m \-\-><a href="(.*?)" target="_blank">.*?</a><!\-\- m \-\->#',
	'#<!\-\- w \-\-><a href="http:\/\/(.*?)" target="_blank">.*?</a><!\-\- w \-\->#',
	'#<!\-\- l \-\-><a href="(.*?)" target="_blank">.*?</a><!\-\- l \-\->#',
	'#<!\-\- s(.*?) \-\-><img src="\{SMILE_PATH\}\/.*? \/><!\-\- s\1 \-\->#',
);

$replace = array(
	'[b]\1[/b]',
	'[u]\1[/u]',
	'\1',
	'\1',
	'\1',
	$server_protocol . trim($config['server_name']) . $server_port . preg_replace('/^\/?(.*?)(\/)?$/', '\1', trim($config['script_path'])) . '/\1',
	'\1',
);

$post_text = preg_replace($match, $replace, $post_text);
$poll_options = preg_replace($match, $replace, $poll_options);

// DECODE TEXT
// -------------------


// -----------------------------
// MAIN POSTING PAGE BEGINS HERE

// Forum moderators?
get_moderators($moderators, intval($forum_id));

// Generate smilies and topic icon listings
generate_smilies('inline');

// Topic icons
$s_topic_icons = false;
if (!empty($enable_icons))
{
	// Grab icons
	$icons = array();
	obtain_icons($icons);

	if (sizeof($icons))
	{
		$s_topic_icons = true;

		foreach ($icons as $id => $data)
		{
			if ($data['display'])
			{
				$template->assign_block_vars('topic_icon', array(
					'ICON_ID'		=> $id,
					'ICON_IMG'		=> $config['icons_path'] . '/' . $data['img'],
					'ICON_WIDTH'	=> $data['width'],
					'ICON_HEIGHT' 	=> $data['height'],

					'S_ICON_CHECKED' => ($id == $icon_id && $mode != 'reply') ? ' checked="checked"' : '')
				);
			}
		}
	}
}

// Topic type selection ... only for first post in topic?
$topic_type_toggle = '';
if ($mode == 'post' || $mode == 'edit')
{
	if ($auth->acl_gets('f_sticky', 'm_', 'a_', intval($forum_id)))
	{
		$topic_type_toggle .= '<input type="radio" name="topic_type" value="' . POST_STICKY . '"';
		if (intval($topic_type) == POST_STICKY)
		{
			$topic_type_toggle .= ' checked="checked"';
		}
		$topic_type_toggle .= ' /> ' . $user->lang['POST_STICKY'] . '&nbsp;&nbsp;';
	}

	if ($auth->acl_gets('f_announce', 'm_', 'a_', intval($forum_id)))
	{
		$topic_type_toggle .= '<input type="radio" name="topic_type" value="' . POST_ANNOUNCE . '"';
		if (intval($topic_type) == POST_ANNOUNCE)
		{
			$topic_type_toggle .= ' checked="checked"';
		}
		$topic_type_toggle .= ' /> ' . $user->lang['POST_ANNOUNCEMENT'] . '&nbsp;&nbsp;';
	}

	if ($topic_type_toggle != '')
	{
		$topic_type_toggle = $user->lang['POST_TOPIC_AS'] . ': <input type="radio" name="topic_type" value="' . POST_NORMAL .'"' . ((intval($topic_type) == POST_NORMAL) ? ' checked="checked"' : '') . ' /> ' . $user->lang['POST_NORMAL'] . '&nbsp;&nbsp;' . $topic_type_toggle;
	}
}

// HTML, BBCode, Smilies, Images and Flash status
$html_status = ($config['allow_html'] && $auth->acl_get('f_html', $forum_id)) ? true : false;
$bbcode_status = ($config['allow_bbcode'] && $auth->acl_get('f_bbcode', $forum_id)) ? true : false;
$smilies_status = ($config['allow_smilies'] && $auth->acl_get('f_smilies', $forum_id)) ? true : false;
$img_status = ($config['allow_img'] && $auth->acl_get('f_img', $forum_id)) ? true : false;
$flash_status = ($config['allow_flash'] && $auth->acl_get('f_flash', $forum_id)) ? true : false;

$html_checked = (isset($enable_html)) ? !$enable_html : (($config['allow_html']) ? !$user->data['user_allowhtml'] : 1);
$bbcode_checked = (isset($enable_bbcode)) ? !$enable_bbcode : (($config['allow_bbcode']) ? !$user->data['user_allowbbcode'] : 1);
$smilies_checked = (isset($enable_smilies)) ? !$enable_smilies : (($config['allow_smilies']) ? !$user->data['user_allowsmile'] : 1);
$urls_checked = (isset($enable_urls)) ? !$enable_urls : 0;
$sig_checked = (isset($attach_sig)) ? $attach_sig : (($config['allow_sigs']) ? $user->data['user_atachsig'] : 0);
$notify_checked = (isset($notify_set)) ? $notify_set : (($user->data['user_id'] != ANONYMOUS) ? $user->data['user_notify'] : 0);

// Page title & action URL, include session_id for security purpose
$s_action = "posting.$phpEx?sid=" . $user->session_id . "&amp;mode=$mode&amp;f=" . intval($forum_id);
switch ($mode)
{
	case 'post':
		$page_title = $user->lang['POST_TOPIC'];
		break;

	case 'reply':
		$page_title = $user->lang['POST_REPLY'];
		$s_action .= '&amp;t=' . intval($topic_id);
		break;

	case 'edit':
		$page_title = $user->lang['EDIT_POST'];
		$s_action .= '&amp;p=' . intval($post_id);
		break;
}



// Nav links for forum ... same as viewforum, viewtopic ... should merge ...
$forum_parents = unserialize($forum_parents);

foreach ($forum_parents as $parent_forum_id => $parent_name)
{
	$template->assign_block_vars('navlinks', array(
		'FORUM_NAME'	=>	$parent_name,
		'U_VIEW_FORUM'	=>	'viewforum.' . $phpEx . $SID . '&amp;f=' . $parent_forum_id)
	);
}
$template->assign_block_vars('navlinks', array(
	'FORUM_NAME'	=>	$forum_name,
	'U_VIEW_FORUM'	=>	'viewforum.' . $phpEx . $SID . '&amp;f=' . $forum_id)
);



// Start assigning vars for main posting page ...
$template->assign_vars(array(
	'FORUM_NAME' 		=> $forum_name,
	'FORUM_DESC'		=> !empty($forum_desc) ? strip_tags($forum_desc) : '',
	'TOPIC_TITLE' 		=> ($mode != 'post') ? $topic_title : '',
	'USERNAME' 			=> $post_username,
	'SUBJECT' 			=> (!empty($topic_title)) ? $topic_title : $post_subject,
	'MESSAGE' 			=> trim($post_text),
	'HTML_STATUS' 		=> ($html_status) ? $user->lang['HTML_is_ON'] : $user->lang['HTML_is_OFF'],
	'BBCODE_STATUS' 	=> ($bbcode_status) ? sprintf($user->lang['BBCode_is_ON'], '<a href="' . "faq.$phpEx$SID&amp;mode=bbcode" . '" target="_phpbbcode">', '</a>') : sprintf($user->lang['BBCode_is_OFF'], '<a href="' . "faq.$phpEx$SID&amp;mode=bbcode" . '" target="_phpbbcode">', '</a>'),
	'SMILIES_STATUS' 	=> ($smilies_status) ? $user->lang['Smilies_are_ON'] : $user->lang['Smilies_are_OFF'],
	'IMG_STATUS' 		=> ($img_status) ? $user->lang['Images_are_ON'] : $user->lang['Images_are_OFF'],
	'FLASH_STATUS' 		=> ($flash_status) ? $user->lang['Flash_is_ON'] : $user->lang['Flash_is_OFF'],
	'MODERATORS' 		=> (sizeof($moderators)) ? implode(', ', $moderators[$forum_id]) : $user->lang['NONE'],

	'L_POST_A' 				=> $page_title,
	'L_SUBJECT' 			=> $user->lang['Subject'],
	'L_MESSAGE_BODY_EXPLAIN'=> (intval($config['max_post_chars'])) ? sprintf($user->lang['MESSAGE_BODY_EXPLAIN'], intval($config['max_post_chars'])) : '',
	'L_ICON'				=> ($mode == 'reply' || $mode == 'quote') ? $user->lang['POST_ICON'] : $user->lang['TOPIC_ICON'], 

	'U_VIEW_FORUM' 		=> "viewforum.$phpEx$SID&amp;f=" . intval($forum_id),
	'U_VIEWTOPIC' 		=> ($mode != 'post') ? "viewtopic.$phpEx$SID&amp;t=" . intval($topic_id) : '',
	'U_REVIEW_TOPIC' 	=> ($mode != 'post') ? "posting.$phpEx$SID&amp;mode=topicreview&amp;t=" . intval($topic_id) : '',
	'U_VIEW_MODERATORS' => 'memberslist.' . $phpEx . $SID . '&amp;mode=moderators&amp;f=' . intval($forum_id),

	'S_SHOW_TOPIC_ICONS' 	=> $s_topic_icons,
	'S_HTML_CHECKED' 		=> ($html_checked) ? 'checked="checked"' : '',
	'S_BBCODE_CHECKED' 		=> ($bbcode_checked) ? 'checked="checked"' : '',
	'S_SMILIES_CHECKED' 	=> ($smilies_checked) ? 'checked="checked"' : '',
	'S_MAGIC_URL_CHECKED' 	=> ($urls_checked) ? 'checked="checked"' : '',
	'S_SIGNATURE_CHECKED' 	=> ($sig_checked) ? 'checked="checked"' : '',
	'S_NOTIFY_CHECKED' 		=> ($notify_checked) ? 'checked="checked"' : '',
	'S_DISPLAY_USERNAME' 	=> ($user->data['user_id'] == ANONYMOUS || ($mode == 'edit' && $post_username)) ? true : false,

	'S_SAVE_ALLOWED' 	=> ($auth->acl_gets('f_save', 'm_', 'a_', $forum_id)) ? true : false,
	'S_HTML_ALLOWED' 	=> $html_status,
	'S_BBCODE_ALLOWED' 	=> $bbcode_status,
	'S_SMILIES_ALLOWED' => $smilies_status,
	'S_SIG_ALLOWED' 	=> ($auth->acl_gets('f_sigs', 'm_', 'a_', $forum_id)) ? true : false,
	'S_NOTIFY_ALLOWED' 	=> ($user->data['user_id'] != ANONYMOUS) ? true : false,
	'S_DELETE_ALLOWED' 	=> ($mode == 'edit' && (($post_id == $topic_last_post_id && $poster_id == $user->data['user_id'] && $auth->acl_get('f_delete', intval($forum_id))) || $auth->acl_gets('m_delete', 'a_', intval($forum_id)))) ? true : false,
	'S_TYPE_TOGGLE' 	=> $topic_type_toggle,

	'S_DISPLAY_REVIEW'	=> ($mode == 'reply' || $mode == 'quote') ? true : false,
	'S_TOPIC_ID' 		=> intval($topic_id),
	'S_POST_ACTION' 	=> $s_action,
	'S_HIDDEN_FIELDS'	=> ($mode == 'reply' || $mode == 'quote') ? '<input type="hidden" name="topic_cur_post_id" value="' . $topic_last_post_id . '" />' : '')
);

// Poll entry
if ((($mode == 'post' || ($mode == 'edit' && intval($post_id) == intval($topic_first_post_id) && empty($poll_last_vote))) && $auth->acl_get('f_poll', intval($forum_id))) || $auth->acl_gets('m_edit', 'a_', $forum_id))
{
	$template->assign_vars(array(
		'S_SHOW_POLL_BOX' 	=> true,
		'S_POLL_DELETE' 	=> ($mode == 'edit' && !empty($poll_options) && ((empty($poll_last_vote) && $poster_id == $user->data['user_id'] && $auth->acl_get('f_delete', intval($forum_id))) || $auth->acl_gets('m_delete', 'a_', intval($forum_id)))) ? true : false,

		'L_POLL_OPTIONS_EXPLAIN'=> sprintf($user->lang['POLL_OPTIONS_EXPLAIN'], $config['max_poll_options']),

		'POLL_TITLE' 	=> $poll_title,
		'POLL_OPTIONS'	=> (!empty($poll_options)) ? implode("\n", $poll_options) : '',
		'POLL_LENGTH' 	=> $poll_length)
	);
}

// Attachment entry
if ($auth->acl_gets('f_attach', 'm_edit', 'a_', $forum_id))
{
	$template->assign_vars(array(
		'S_SHOW_ATTACH_BOX' 		=> true,)
	);
}

// Output page ...
include($phpbb_root_path . 'includes/page_header.'.$phpEx);

$template->set_filenames(array(
	'body' => 'posting_body.html')
);
make_jumpbox('viewforum.'.$phpEx);

// Topic review
if ($mode == 'reply' || $mode == 'quote')
{
	topic_review(intval($topic_id), true);
}

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

// ---------
// FUNCTIONS
function topic_review($topic_id, $is_inline_review = false)
{
	global $SID, $db, $config, $template, $user, $auth;
	global $orig_word, $replacement_word;
	global $phpEx, $phpbb_root_path, $starttime;

	// Define censored word matches
	if (empty($orig_word) && empty($replacement_word))
	{
		$orig_word = $replacement_word = array();
		obtain_word_list($orig_word, $replacement_word);
	}

	if (!$is_inline_review)
	{
		// Get topic info ...
		$sql = "SELECT t.topic_title, f.forum_id
			FROM " . TOPICS_TABLE . " t, " . FORUMS_TABLE . " f
			WHERE t.topic_id = $topic_id
				AND f.forum_id = t.forum_id";
		$result = $db->sql_query($sql);

		if (!($row = $db->sql_fetchrow($result)))
		{
			trigger_error($user->lang['Topic_post_not_exist']);
		}

		$forum_id = intval($row['forum_id']);
		$topic_title = $row['topic_title'];

		if (!$auth->acl_gets('f_read', 'm_', 'a_', $forum_id))
		{
			trigger_error($user->lang['Sorry_auth_read']);
		}

		if (count($orig_word))
		{
			$topic_title = preg_replace($orig_word, $replacement_word, $topic_title);
		}
	}
	else
	{
		$template->assign_vars(array(
			'S_DISPLAY_INLINE'	=> true)
		);
	}

	// Go ahead and pull all data for this topic
	$sql = "SELECT u.username, u.user_id, p.*,  pt.post_text, pt.post_subject, pt.bbcode_uid
		FROM " . POSTS_TABLE . " p, " . USERS_TABLE . " u, " . POSTS_TEXT_TABLE . " pt
		WHERE p.topic_id = $topic_id
			AND p.poster_id = u.user_id
			AND p.post_id = pt.post_id
		ORDER BY p.post_time DESC
		LIMIT " . $config['posts_per_page'];
	$result = $db->sql_query($sql);

	// Okay, let's do the loop, yeah come on baby let's do the loop
	// and it goes like this ...
	if ($row = $db->sql_fetchrow($result))
	{
		$i = 0;
		do
		{
			$poster_id = $row['user_id'];
			$poster = $row['username'];

			// Handle anon users posting with usernames
			if($poster_id == ANONYMOUS && $row['post_username'] != '')
			{
				$poster = $row['post_username'];
				$poster_rank = $user->lang['Guest'];
			}

			$post_subject = ($row['post_subject'] != '') ? $row['post_subject'] : '';

			$message = $row['post_text'];

			if ($row['enable_smilies'])
			{
				$message = str_replace('<img src="{SMILE_PATH}', '<img src="' . $config['smilies_path'], $message);
			}

			if (count($orig_word))
			{
				$post_subject = preg_replace($orig_word, $replacement_word, $post_subject);
				$message = preg_replace($orig_word, $replacement_word, $message);
			}

			$template->assign_block_vars('postrow', array(
				'MINI_POST_IMG' 	=> $user->img('goto_post', $user->lang['Post']),
				'POSTER_NAME' 		=> $poster,
				'POST_DATE' 		=> $user->format_date($row['post_time']),
				'POST_SUBJECT' 		=> $post_subject,
				'MESSAGE' 			=> nl2br($message),

				'S_ROW_COUNT'	=> $i++)
			);
		}
		while ($row = $db->sql_fetchrow($result));
	}
	else
	{
		trigger_error($user->lang['Topic_post_not_exist']);
	}
	$db->sql_freeresult($result);

	$template->assign_vars(array(
		'L_MESSAGE' 	=> $user->lang['Message'],
		'L_POSTED' 		=> $user->lang['Posted'],
		'L_POST_SUBJECT'=> $user->lang['Post_subject'],
		'L_TOPIC_REVIEW'=> $user->lang['Topic_review'])
	);

	if (!$is_inline_review)
	{
		$page_title = $user->lang['Topic_review'] . ' - ' . $topic_title;
		include($phpbb_root_path . 'includes/page_header.'.$phpEx);

		$template->set_filenames(array(
			'body' => 'posting_topic_review.html')
		);

		include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
	}
}

?>