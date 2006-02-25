<?php
/** 
*
* @package mcp
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
include($phpbb_root_path . 'common.'.$phpEx);
include($phpbb_root_path . 'includes/functions_admin.'.$phpEx);
require($phpbb_root_path . 'includes/functions_module.'.$phpEx);

/**
*/

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('mcp');

$module = new p_master();

// Basic parameter data
$id = request_var('i', '');

if (isset($_REQUEST['mode']) && is_array($_REQUEST['mode']))
{
	list($mode, ) = each(request_var('mode', array('')));
}
else
{
	$mode = request_var('mode', '');
}

// Only Moderators can go beyond this point
if (!$user->data['is_registered'])
{
	if ($user->data['is_bot'])
	{
		redirect("index.$phpEx$SID");
	}

	login_box('', $user->lang['LOGIN_EXPLAIN_MCP']);
}

$quickmod = (isset($_REQUEST['quickmod'])) ? true : false;
$action = request_var('action', '');
$action_ary = request_var('action', array('' => 0));

if (sizeof($action_ary))
{
	list($action, ) = each($action_ary);
}
unset($action_ary);

if ($mode == 'topic_logs')
{
	$id = 'logs';
	$quickmod = false;
}

$post_id = request_var('p', 0);
$topic_id = request_var('t', 0);
$forum_id = request_var('f', 0);
$user_id = request_var('u', 0);
$username = request_var('username', '');

if ($post_id)
{
	// We determine the topic and forum id here, to make sure the moderator really has moderative rights on this post
	$sql = 'SELECT topic_id, forum_id
		FROM ' . POSTS_TABLE . "
		WHERE post_id = $post_id";
	$result = $db->sql_query($sql);
	$row = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);

	$topic_id = (int) $row['topic_id'];
	$forum_id = (int) $row['forum_id'];
}

if ($topic_id && !$forum_id)
{
	$sql = 'SELECT forum_id
		FROM ' . TOPICS_TABLE . "
		WHERE topic_id = $topic_id";
	$result = $db->sql_query($sql);
	$row = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);

	$forum_id = (int) $row['forum_id'];
}

// If the user doesn't have any moderator powers (globally or locally) he can't access the mcp
if (!$forum_id && !$auth->acl_get('m_') && !$auth->acl_getf_global('m_'))
{
	trigger_error('MODULE_NOT_EXIST');
}

if ($forum_id)
{
	$module->acl_forup_id = $forum_id;
}

// Instantiate module system and generate list of available modules
$module->list_modules('mcp');

if ($quickmod)
{
	$mode = 'quickmod';

	switch ($action)
	{
		case 'lock':
		case 'unlock':
		case 'lock_post':
		case 'unlock_post':
		case 'make_sticky':
		case 'make_announce':
		case 'make_global':
		case 'make_normal':
		case 'fork':
		case 'move':
		case 'delete_post':
		case 'delete_topic':
			$module->load('mcp', 'main', 'quickmod');
		exit;

		case 'topic_logs':
			$module->set_active('logs', 'topic_logs');
		break;

		default:
			trigger_error("$action not allowed as quickmod");
	}
}
else
{
	// Select the active module
	$module->set_active($id, $mode);
}

// Hide some of the options if we don't have the relevant information to use them
if (!$post_id)
{
	$module->set_display('main', 'post_details', false);
	$module->set_display('warn', 'warn_post', false);
}

if (!$topic_id)
{
	$module->set_display('main', 'topic_view', false);
	$module->set_display('logs', 'topic_logs', false);
}

if (!$topic_id && !$post_id)
{
	$module->set_display('queue', 'approve_details', false);
}

if (!$forum_id)
{
	$module->set_display('main', 'forum_view', false);
	$module->set_display('logs', 'forum_logs', false);
}

if (!$user_id && $username == '')
{
	$module->set_display('notes', 'user_notes', false);
	$module->set_display('warn', 'warn_user', false);
}

// Load and execute the relevant module
$module->load_active();

// Assign data to the template engine for the list of modules
$module->assign_tpl_vars("mcp.$phpEx$SID");

// Generate the page
page_header($user->lang['MCP_MAIN']);

$template->set_filenames(array(
	'body' => $module->get_tpl_name())
);

page_footer();

/**
* Functions used to generate additional URL paramters
*/
function _module_main_forum_view_url()
{
	return extra_url();
}

function _module_main_topic_view_url()
{
	return extra_url();
}

function _module_main_post_details_url()
{
	return extra_url();
}

function _module_logs_forum_logs_url()
{
	return extra_url();
}

function _module_logs_topic_logs_url()
{
	return extra_url();
}

function extra_url()
{
	global $forum_id, $topic_id, $post_id;
	$url_extra = '';
	$url_extra .= ($forum_id) ? "&amp;f=$forum_id" : '';
	$url_extra .= ($topic_id) ? "&amp;t=$topic_id" : '';
	$url_extra .= ($post_id) ? "&amp;p=$post_id" : '';
	return $url_extra;
}

/**
* Get simple topic data
*/
function get_topic_data($topic_ids, $acl_list = false)
{
	global $auth, $db;
	$rowset = array();

	if (implode(', ', $topic_ids) == '')
	{
		return array();
	}

	$sql = 'SELECT f.*, t.*
		FROM ' . TOPICS_TABLE . ' t
			LEFT JOIN ' . FORUMS_TABLE . ' f ON t.forum_id = f.forum_id
		WHERE t.topic_id IN (' . implode(', ', $topic_ids) . ')';
	$result = $db->sql_query($sql);

	while ($row = $db->sql_fetchrow($result))
	{
		if ($acl_list && !$auth->acl_get($acl_list, $row['forum_id']))
		{
			continue;
		}

		$rowset[$row['topic_id']] = $row;
	}

	return $rowset;
}

/**
* Get simple post data
*/
function get_post_data($post_ids, $acl_list = false)
{
	global $db, $auth;
	$rowset = array();

	$sql = 'SELECT p.*, u.*, t.*, f.*
		FROM (' . POSTS_TABLE . ' p, ' . USERS_TABLE . ' u, ' . TOPICS_TABLE . ' t)
			LEFT JOIN ' . FORUMS_TABLE . ' f ON (f.forum_id = p.forum_id)
		WHERE p.post_id IN (' . implode(', ', $post_ids) . ')
			AND u.user_id = p.poster_id
			AND t.topic_id = p.topic_id';
	$result = $db->sql_query($sql);

	while ($row = $db->sql_fetchrow($result))
	{
		if ($acl_list && !$auth->acl_get($acl_list, $row['forum_id']))
		{
			continue;
		}

		if (!$row['post_approved'] && !$auth->acl_get('m_approve', $row['forum_id']))
		{
			// Moderators without the permission to approve post should at least not see them. ;)
			continue;
		}

		$rowset[$row['post_id']] = $row;
	}

	return $rowset;
}

/**
* Get simple forum data
*/
function get_forum_data($forum_id, $acl_list = 'f_list')
{
	global $auth, $db;
	$rowset = array();

	$sql = 'SELECT *
		FROM ' . FORUMS_TABLE . '
		WHERE forum_id ' . ((is_array($forum_id)) ? 'IN (' . implode(', ', $forum_id) . ')' : "= $forum_id");
	$result = $db->sql_query($sql);

	while ($row = $db->sql_fetchrow($result))
	{
		if ($acl_list && !$auth->acl_get($acl_list, $row['forum_id']))
		{
			continue;
		}
		if ($auth->acl_get('m_approve', $row['forum_id']))
		{
			$row['forum_topics'] = $row['forum_topics_real'];
		}

		$rowset[$row['forum_id']] = $row;
	}

	return $rowset;
}

/**
* sorting in mcp
*/
function mcp_sorting($mode, &$sort_days, &$sort_key, &$sort_dir, &$sort_by_sql, &$sort_order_sql, &$total, $forum_id = 0, $topic_id = 0, $where_sql = 'WHERE')
{
	global $db, $user, $auth, $template;

	$sort_days = request_var('sort_days', 0);
	$min_time = ($sort_days) ? time() - ($sort_days * 86400) : 0;

	switch ($mode)
	{
		case 'viewforum':
			$type = 'topics';
			$default_key = 't';
			$default_dir = 'd';
			$sql = 'SELECT COUNT(topic_id) AS total
				FROM ' . TOPICS_TABLE . "
				$where_sql forum_id = $forum_id
					AND topic_type NOT IN (" . POST_ANNOUNCE . ', ' . POST_GLOBAL . ")
					AND topic_last_post_time >= $min_time";

			if (!$auth->acl_get('m_approve', $forum_id))
			{
				$sql .= 'AND topic_approved = 1';
			}
			break;

		case 'viewtopic':
			$type = 'posts';
			$default_key = 't';
			$default_dir = 'a';
			$sql = 'SELECT COUNT(post_id) AS total
				FROM ' . POSTS_TABLE . "
				$where_sql topic_id = $topic_id
					AND post_time >= $min_time";
			if (!$auth->acl_get('m_approve', $forum_id))
			{
				$sql .= 'AND post_approved = 1';
			}
			break;

		case 'unapproved_posts':
			$type = 'posts';
			$default_key = 't';
			$default_dir = 'd';
			$sql = 'SELECT COUNT(post_id) AS total
				FROM ' . POSTS_TABLE . "
				$where_sql forum_id IN (" . (($forum_id) ? $forum_id : implode(', ', get_forum_list('m_approve'))) . ')
					AND post_approved = 0
					AND post_time >= ' . $min_time;
			break;

		case 'unapproved_topics':
			$type = 'topics';
			$default_key = 't';
			$default_dir = 'd';
			$sql = 'SELECT COUNT(topic_id) AS total
				FROM ' . TOPICS_TABLE . "
				$where_sql forum_id IN (" . (($forum_id) ? $forum_id : implode(', ', get_forum_list('m_approve'))) . ')
					AND topic_approved = 0
					AND topic_time >= ' . $min_time;
			break;

		case 'reports':
			$type = 'reports';
			$default_key = 'p';
			$default_dir = 'd';
			$limit_time_sql = ($min_time) ? "AND r.report_time >= $min_time" : '';

			if ($topic_id)
			{
				$where_sql .= ' p.topic_id = ' . $topic_id;
			}
			else if ($forum_id)
			{
				$where_sql .= ' p.forum_id = ' . $forum_id;
			}
			else
			{
				$where_sql .= ' p.forum_id IN (' . implode(', ', get_forum_list('m_')) . ')';
			}
			$sql = 'SELECT COUNT(r.report_id) AS total
				FROM ' . REPORTS_TABLE . ' r, ' . POSTS_TABLE . " p
				$where_sql
					AND p.post_id = r.post_id
					$limit_time_sql";
			break;

		case 'viewlogs':
			$type = 'logs';
			$default_key = 't';
			$default_dir = 'd';
			$sql = 'SELECT COUNT(log_id) AS total
				FROM ' . LOG_TABLE . "
				$where_sql forum_id IN (" . (($forum_id) ? $forum_id : implode(', ', get_forum_list('m_'))) . ')
					AND log_time >= ' . $min_time . '
					AND log_type = ' . LOG_MOD;
			break;
	}

	$sort_key = request_var('sk', $default_key);
	$sort_dir = request_var('sd', $default_dir);
	$sort_dir_text = array('a' => $user->lang['ASCENDING'], 'd' => $user->lang['DESCENDING']);

	switch ($type)
	{
		case 'topics':
			$limit_days = array(0 => $user->lang['ALL_TOPICS'], 1 => $user->lang['1_DAY'], 7 => $user->lang['7_DAYS'], 14 => $user->lang['2_WEEKS'], 30 => $user->lang['1_MONTH'], 90 => $user->lang['3_MONTHS'], 180 => $user->lang['6_MONTHS'], 364 => $user->lang['1_YEAR']);
			$sort_by_text = array('a' => $user->lang['AUTHOR'], 't' => $user->lang['POST_TIME'], 'tt' => $user->lang['TOPIC_TIME'], 'r' => $user->lang['REPLIES'], 's' => $user->lang['SUBJECT'], 'v' => $user->lang['VIEWS']);

			$sort_by_sql = array('a' => 't.topic_first_poster_name', 't' => 't.topic_last_post_time', 'tt' => 't.topic_time', 'r' => (($auth->acl_get('m_approve', $forum_id)) ? 't.topic_replies_real' : 't.topic_replies'), 's' => 't.topic_title', 'v' => 't.topic_views');
			$limit_time_sql = ($min_time) ? "AND t.topic_last_post_time >= $min_time" : '';
			break;

		case 'posts':
			$limit_days = array(0 => $user->lang['ALL_POSTS'], 1 => $user->lang['1_DAY'], 7 => $user->lang['7_DAYS'], 14 => $user->lang['2_WEEKS'], 30 => $user->lang['1_MONTH'], 90 => $user->lang['3_MONTHS'], 180 => $user->lang['6_MONTHS'], 364 => $user->lang['1_YEAR']);
			$sort_by_text = array('a' => $user->lang['AUTHOR'], 't' => $user->lang['POST_TIME'], 's' => $user->lang['SUBJECT']);
			$sort_by_sql = array('a' => 'u.username', 't' => 'p.post_id', 's' => 'p.post_subject');
			$limit_time_sql = ($min_time) ? "AND p.post_time >= $min_time" : '';
			break;

		case 'reports':
			$limit_days = array(0 => $user->lang['ALL_REPORTS'], 1 => $user->lang['1_DAY'], 7 => $user->lang['7_DAYS'], 14 => $user->lang['2_WEEKS'], 30 => $user->lang['1_MONTH'], 90 => $user->lang['3_MONTHS'], 180 => $user->lang['6_MONTHS'], 364 => $user->lang['1_YEAR']);
			$sort_by_text = array('p' => $user->lang['REPORT_PRIORITY'], 'r' => $user->lang['REPORTER'], 't' => $user->lang['REPORT_TIME']);
			$sort_by_sql = array('p' => 'rr.reason_priority', 'r' => 'u.username', 't' => 'r.report_time');
			break;

		case 'logs':
			$limit_days = array(0 => $user->lang['ALL_ENTRIES'], 1 => $user->lang['1_DAY'], 7 => $user->lang['7_DAYS'], 14 => $user->lang['2_WEEKS'], 30 => $user->lang['1_MONTH'], 90 => $user->lang['3_MONTHS'], 180 => $user->lang['6_MONTHS'], 364 => $user->lang['1_YEAR']);
			$sort_by_text = array('u' => $user->lang['SORT_USERNAME'], 't' => $user->lang['SORT_DATE'], 'i' => $user->lang['SORT_IP'], 'o' => $user->lang['SORT_ACTION']);

			$sort_by_sql = array('u' => 'l.user_id', 't' => 'l.log_time', 'i' => 'l.log_ip', 'o' => 'l.log_operation');
			$limit_time_sql = ($min_time) ? "AND l.log_time >= $min_time" : '';
			break;
	}

	$sort_order_sql = $sort_by_sql[$sort_key] . ' ' . (($sort_dir == 'd') ? 'DESC' : 'ASC');

	$s_limit_days = $s_sort_key = $s_sort_dir = $sort_url = '';
	gen_sort_selects($limit_days, $sort_by_text, $sort_days, $sort_key, $sort_dir, $s_limit_days, $s_sort_key, $s_sort_dir, $sort_url);

	$template->assign_vars(array(
		'S_SELECT_SORT_DIR'	=>	$s_sort_dir,
		'S_SELECT_SORT_KEY' =>	$s_sort_key,
		'S_SELECT_SORT_DAYS'=>	$s_limit_days)
	);

	if (($sort_days && $mode != 'viewlogs') || $mode == 'reports' || $where_sql != 'WHERE')
	{
		$result = $db->sql_query($sql);
		$total = ($row = $db->sql_fetchrow($result)) ? $row['total'] : 0;
	}
	else
	{
		$total = -1;
	}
}

/**
* Validate ids
*/
function check_ids(&$ids, $table, $sql_id, $acl_list = false)
{
	global $db, $auth;

	if (!is_array($ids) || !$ids)
	{
		return 0;
	}

	// a small logical error, since global announcement are assigned to forum_id == 0
	// If the first topic id is a global announcement, we can force the forum. Though only global announcements can be
	// tricked... i really do not know how to prevent this atm.

	// With those two queries we make sure all ids are within one forum...
	$sql = "SELECT forum_id FROM $table
		WHERE $sql_id = {$ids[0]}";
	$result = $db->sql_query($sql);
	$forum_id = (int) $db->sql_fetchfield('forum_id', 0, $result);
	$db->sql_freeresult($result);

	if (!$forum_id)
	{
		// Global Announcement?
		$forum_id = request_var('f', 0);
	}

	if ($forum_id === 0)
	{
		// Determine first forum the user is able to read - for global announcements
		$forum_ary = array_unique(array_keys($auth->acl_getf('!f_read', true)));

		$sql = 'SELECT forum_id 
			FROM ' . FORUMS_TABLE . '
			WHERE forum_type = ' . FORUM_POST;
		if (sizeof($forum_ary))
		{
			$sql .= ' AND forum_id NOT IN ( ' . implode(', ', $forum_ary) . ')';
		}

		$result = $db->sql_query_limit($sql, 1);
		$forum_id = (int) $db->sql_fetchfield('forum_id', 0, $result);
		$db->sql_freeresult($result);
	}

	if ($acl_list && !$auth->acl_get($acl_list, $forum_id))
	{
		trigger_error('NOT_AUTHORIZED');
	}

	if (!$forum_id)
	{
		trigger_error('Missing forum_id, has to be in url if global announcement...');
	}

	$sql = "SELECT $sql_id FROM $table
		WHERE $sql_id IN (" . implode(', ', $ids) . ")
			AND (forum_id = $forum_id OR forum_id = 0)";
	$result = $db->sql_query($sql);

	$ids = array();
	while ($row = $db->sql_fetchrow($result))
	{
		$ids[] = $row[$sql_id];
	}
	$db->sql_freeresult($result);

	return $forum_id;
}

?>