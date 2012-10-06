<?php
/**
*
* @package phpbb
* @copyright (c) 2012 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* phpbb_visibility
* Handle fetching and setting the visibility for topics and posts
* @package phpbb
*/
class phpbb_content_visibility
{
	/**
	* Create topic/post visibility SQL for a given forum ID
	*
	* Note: Read permissions are not checked.
	*
	* @param $mode			string	Either "topic" or "post"
	* @param $forum_id		int		The forum id is used for permission checks
	* @param $table_alias	string	Table alias to prefix in SQL queries
	* @return string	The appropriate combination SQL logic for topic/post_visibility
	*/
	static public function get_visibility_sql($mode, $forum_id, $table_alias = '')
	{
		global $auth;

		if ($auth->acl_get('m_approve', $forum_id))
		{
			return '1 = 1';
		}

		return $table_alias . $mode . '_visibility = ' . ITEM_APPROVED;
	}

	/**
	* Create topic/post visibility SQL for a set of forums
	*
	* Note: Read permissions are not checked. Forums without read permissions
	*		should not be in $forum_ids
	*
	* @param $mode			string	Either "topic" or "post"
	* @param $forum_ids		array	Array of forum ids which the posts/topics are limited to
	* @param $table_alias	string	Table alias to prefix in SQL queries
	* @return string	The appropriate combination SQL logic for topic/post_visibility
	*/
	static public function get_forums_visibility_sql($mode, $forum_ids = array(), $table_alias = '')
	{
		global $auth, $db;

		$where_sql = '(';

		$approve_forums = array_intersect($forum_ids, array_keys($auth->acl_getf('m_approve', true)));

		if (sizeof($approve_forums))
		{
			// Remove moderator forums from the rest
			$forum_ids = array_diff($forum_ids, $approve_forums);

			if (!sizeof($forum_ids))
			{
				// The user can see all posts/topics in all specified forums
				return $db->sql_in_set($table_alias . 'forum_id', $approve_forums);
			}
			else
			{
				// Moderator can view all posts/topics in some forums
				$where_sql .= $db->sql_in_set($table_alias . 'forum_id', $approve_forums) . ' OR ';
			}
		}
		else
		{
			// The user is just a normal user
			return "$table_alias{$mode}_visibility = " . ITEM_APPROVED . '
				AND ' . $db->sql_in_set($table_alias . 'forum_id', $forum_ids, false, true);
		}

		$where_sql .= "($table_alias{$mode}_visibility = " . ITEM_APPROVED . '
			AND ' . $db->sql_in_set($table_alias . 'forum_id', $forum_ids) . '))';

		return $where_sql;
	}

	/**
	* Create topic/post visibility SQL for all forums on the board
	*
	* Note: Read permissions are not checked. Forums without read permissions
	*		should be in $exclude_forum_ids
	*
	* @param $mode				string	Either "topic" or "post"
	* @param $exclude_forum_ids	array	Array of forum ids which are excluded
	* @param $table_alias		string	Table alias to prefix in SQL queries
	* @return string	The appropriate combination SQL logic for topic/post_visibility
	*/
	static public function get_global_visibility_sql($mode, $exclude_forum_ids = array(), $table_alias = '')
	{
		global $auth, $db;

		$where_sqls = array();

		$approve_forums = array_diff(array_keys($auth->acl_getf('m_approve', true)), $exclude_forum_ids);

		if (sizeof($exclude_forum_ids))
		{
			$where_sqls[] = '(' . $db->sql_in_set($table_alias . 'forum_id', $exclude_forum_ids, true) . "
				AND $table_alias{$mode}_visibility = " . ITEM_APPROVED . ')';
		}
		else
		{
			$where_sqls[] = "$table_alias{$mode}_visibility = " . ITEM_APPROVED;
		}

		if (sizeof($approve_forums))
		{
			$where_sqls[] = $db->sql_in_set($table_alias . 'forum_id', $approve_forums);
			return '(' . implode(' OR ', $where_sqls) . ')';
		}

		// There is only one element, so we just return that one
		return $where_sqls[0];
	}

	/**
	* Set topic visibility
	*
	* Allows approving (which is akin to undeleting/restore) or soft deleting an entire topic.
	* Calls set_post_visibility as needed.
	*
	* Note: By default, when a soft deleted topic is restored. Only posts that
	*		were approved at the time of soft deleting, are being restored.
	*		Same applies to soft deleting. Only approved posts will be marked
	*		as soft deleted.
	*		If you want to update all posts, use the force option.
	*
	* @param $visibility	int		Element of {ITEM_APPROVED, ITEM_DELETED}
	* @param $topic_id		mixed	Topic ID to act on
	* @param $forum_id		int		Forum where $topic_id is found
	* @param $user_id		int		User performing the action
	* @param $time			int		Timestamp when the action is performed
	* @param $reason		string	Reason why the visibilty was changed.
	* @param $force_update_all	bool	Force to update all posts within the topic
	* @return void
	*/
	static public function set_topic_visibility($visibility, $topic_id, $forum_id, $user_id, $time, $reason, $force_update_all = false)
	{
		global $db;

		if (!in_array($visibility, array(ITEM_APPROVED, ITEM_DELETED)))
		{
			return;
		}

		if (!$force_update_all)
		{
			$sql = 'SELECT topic_visibility, topic_delete_time
				FROM ' . TOPICS_TABLE . '
				WHERE topic_id = ' . (int) $topic_id;
			$result = $db->sql_query($sql);
			$original_topic_data = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			if (!$original_topic_data)
			{
				// The topic does not exist...
				return;
			}
		}

		// Note, we do not set a reason for the posts, just for the topic
		$data = array(
			'topic_visibility'		=> (int) $visibility,
			'topic_delete_user'		=> (int) $user_id,
			'topic_delete_time'		=> ((int) $time) ?: time(),
			'topic_delete_reason'	=> truncate_string($reason, 255, 255, false),
		);

		$sql = 'UPDATE ' . TOPICS_TABLE . '
			SET ' . $db->sql_build_array('UPDATE', $data) . '
			WHERE topic_id = ' . (int) $topic_id;
		$db->sql_query($sql);

		if (!$force_update_all && $original_topic_data['topic_delete_time'] && $original_topic_data['topic_visibility'] == ITEM_DELETED && $visibility == ITEM_APPROVED)
		{
			// If we're restoring a topic we only restore posts, that were soft deleted through the topic soft deletion.
			self::set_post_visibility($visibility, false, $topic_id, $forum_id, $user_id, $time, '', true, true, $original_topic_data['topic_visibility'], $original_topic_data['topic_delete_time']);
		}
		else if (!$force_update_all && $original_topic_data['topic_visibility'] == ITEM_APPROVED && $visibility == ITEM_DELETED)
		{
			// If we're soft deleting a topic we only approved posts are soft deleted.
			self::set_post_visibility($visibility, false, $topic_id, $forum_id, $user_id, $time, '', true, true, $original_topic_data['topic_visibility']);
		}
		else
		{
			self::set_post_visibility($visibility, false, $topic_id, $forum_id, $user_id, $time, '', true, true);
		}
	}

	/**
	* Change visibility status of one post or a hole topic
	*
	* @param $visibility	int		Element of {ITEM_APPROVED, ITEM_DELETED}
	* @param $post_id		mixed	Post ID to act on, if it is empty,
	*								all posts of topic_id will be modified
	* @param $topic_id		int		Topic where $post_id is found
	* @param $forum_id		int		Forum where $topic_id is found
	* @param $user_id		int		User performing the action
	* @param $time			int		Timestamp when the action is performed
	* @param $reason		string	Reason why the visibilty was changed.
	* @param $is_starter	bool	Is this the first post of the topic changed?
	* @param $is_latest		bool	Is this the last post of the topic changed?
	* @param $limit_visibility	mixed	Limit updating per topic_id to a certain visibility
	* @param $limit_delete_time	mixed	Limit updating per topic_id to a certain deletion time
	* @return void
	*/
	static public function set_post_visibility($visibility, $post_id, $topic_id, $forum_id, $user_id, $time, $reason, $is_starter, $is_latest, $limit_visibility = false, $limit_delete_time = false)
	{
		global $db;

		if (!in_array($visibility, array(ITEM_APPROVED, ITEM_DELETED)))
		{
			return;
		}

		if ($post_id)
		{
			$where_sql = 'post_id = ' . (int) $post_id;
		}
		else if ($topic_id)
		{
			$where_sql = 'topic_id = ' . (int) $topic_id;

			// Limit the posts to a certain visibility and deletion time
			// This allows us to only restore posts, that were approved
			// when the topic got soft deleted. So previous soft deleted
			// and unapproved posts are still soft deleted/unapproved
			if ($limit_visibility !== false)
			{
				$where_sql .= ' AND post_visibility = ' . (int) $limit_visibility;
			}
			if ($limit_delete_time !== false)
			{
				$where_sql .= ' AND post_delete_time = ' . (int) $limit_delete_time;
			}
		}
		else
		{
			return;
		}

		$data = array(
			'post_visibility'		=> (int) $visibility,
			'post_delete_user'		=> (int) $user_id,
			'post_delete_time'		=> ((int) $time) ?: time(),
			'post_delete_reason'	=> truncate_string($reason, 255, 255, false),
		);

		$sql = 'UPDATE ' . POSTS_TABLE . '
			SET ' . $db->sql_build_array('UPDATE', $data) . '
			WHERE ' . $where_sql;
		$db->sql_query($sql);

		// Sync the first/last topic information if needed
		if (!$is_starter && $is_latest)
		{
			// update_post_information can only update the last post info ...
			if ($topic_id)
			{
				update_post_information('topic', $topic_id, false);
			}
			if ($forum_id)
			{
				update_post_information('forum', $forum_id, false);
			}
		}
		else if ($is_starter && $topic_id)
		{
			// ... so we need to use sync, if the first post is changed.
			// The forum is resynced recursive by sync() itself.
			sync('topic', 'topic_id', $topic_id, true);
		}
	}

	/**
	* Can the current logged-in user soft-delete posts?
	*
	* @param $forum_id		int		Forum ID whose permissions to check
	* @param $poster_id		int		Poster ID of the post in question
	* @param $post_locked	bool	Is the post locked?
	* @return bool
	*/
	static function can_soft_delete($forum_id, $poster_id, $post_locked)
	{
		global $auth, $user;

		if ($auth->acl_get('m_softdelete', $forum_id))
		{
			return true;
		}
		else if ($auth->acl_get('f_softdelete', $forum_id) && $poster_id == $user->data['user_id'] && !$post_locked)
		{
			return true;
		}

		return false;
	}

	/**
	* Do the required math to hide a complete topic (going from approved to deleted)
	* @param $topic_id - int - the topic to act on
	* @param $forum_id - int - the forum where the topic resides
	* @param $topic_row - array - data about the topic, may be empty at call time
	* @param $sql_data - array - populated with the SQL changes, may be empty at call time
	* @return void
	*/
	static public function hide_topic($topic_id, $forum_id, &$topic_row, &$sql_data)
	{
		global $db;

		// Do we need to grab some topic informations?
		if (!sizeof($topic_row))
		{
			$sql = 'SELECT topic_type, topic_replies, topic_replies_real, topic_visibility
				FROM ' . TOPICS_TABLE . '
				WHERE topic_id = ' . $topic_id;
			$result = $db->sql_query($sql);
			$topic_row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
		}

		// If this is an edited topic or the first post the topic gets completely disapproved later on...
		$sql_data[FORUMS_TABLE] = 'forum_topics = forum_topics - 1';
		$sql_data[FORUMS_TABLE] .= ', forum_posts = forum_posts - ' . ($topic_row['topic_replies'] + 1);

		set_config_count('num_topics', -1, true);
		set_config_count('num_posts', ($topic_row['topic_replies'] + 1) * (-1), true);

		// Only decrement this post, since this is the one non-approved now
		//
		/**
		* @todo: this is wrong, it should rely on post_postcount
		*		 also a user might have more than one post in the topic
		*
		if ($auth->acl_get('f_postcount', $forum_id))
		{
			$sql_data[USERS_TABLE] = 'user_posts = user_posts - 1';
		}
		*/
	}

	/**
	* Remove post from topic and forum statistics
	*
	* @param $forum_id		int		Forum where the topic is found
	* @param $data			array	Contains information from the topics table about given topic
	* @param $sql_data		array	Populated with the SQL changes, may be empty at call time
	* @return void
	*/
	static public function remove_post_from_postcount($forum_id, $data, &$sql_data)
	{
		$sql_data[TOPICS_TABLE] = ($sql_data[TOPICS_TABLE]) ? $sql_data[TOPICS_TABLE] . ', ' : '') . 'topic_replies = topic_replies - 1';

		$sql_data[FORUMS_TABLE] = ($sql_data[FORUMS_TABLE]) ? $sql_data[FORUMS_TABLE] . ', ' : '') . 'forum_posts = forum_posts - 1';

		if ($data['post_postcount'])
		{
			$sql_data[USERS_TABLE] = ($sql_data[USERS_TABLE]) ? $sql_data[USERS_TABLE] . ', ' : '') . 'user_posts = user_posts - 1';
		}

		set_config_count('num_posts', -1, true);
	}

	/**
	* One function to rule them all ... and unhide posts and topics.  This could
	* reasonably be broken up, I straight copied this code from the mcp_queue.php
	* file here for global access.
	* @param $mode - string - member of the set {'approve', 'restore'}
	* @param $post_info - array - Contains info from post U topics table about
	* 	the posts/topics in question
	* @param $post_id_list - array of ints - the set of posts being worked on
	*/
	static public function unhide_posts_topics($mode, $post_info, $post_id_list)
	{
		global $db, $config;

		// If Topic -> total_topics = total_topics+1, total_posts = total_posts+1, forum_topics = forum_topics+1, forum_posts = forum_posts+1
		// If Post -> total_posts = total_posts+1, forum_posts = forum_posts+1, topic_replies = topic_replies+1

		$total_topics = $total_posts = 0;
		$topic_approve_sql = $post_approve_sql = $topic_id_list = $forum_id_list = $approve_log = array();
		$user_posts_sql = $post_approved_list = array();

		foreach ($post_info as $post_id => $post_data)
		{
			if ($post_data['post_visibility'] == ITEM_APPROVED)
			{
				$post_approved_list[] = $post_id;
				continue;
			}

			$topic_id_list[$post_data['topic_id']] = 1;

			if ($post_data['forum_id'])
			{
				$forum_id_list[$post_data['forum_id']] = 1;
			}

			// User post update (we do not care about topic or post, since user posts are strictly connected to posts)
			// But we care about forums where post counts get not increased. ;)
			if ($post_data['post_postcount'])
			{
				$user_posts_sql[$post_data['poster_id']] = (empty($user_posts_sql[$post_data['poster_id']])) ? 1 : $user_posts_sql[$post_data['poster_id']] + 1;
			}

			// Topic or Post. ;)
			if ($post_data['topic_first_post_id'] == $post_id)
			{
				if ($post_data['forum_id'])
				{
					$total_topics++;
				}
				$topic_approve_sql[] = $post_data['topic_id'];

				$approve_log[] = array(
					'type'			=> 'topic',
					'post_subject'	=> $post_data['post_subject'],
					'forum_id'		=> $post_data['forum_id'],
					'topic_id'		=> $post_data['topic_id'],
				);
			}
			else
			{
				$approve_log[] = array(
					'type'			=> 'post',
					'post_subject'	=> $post_data['post_subject'],
					'forum_id'		=> $post_data['forum_id'],
					'topic_id'		=> $post_data['topic_id'],
				);
			}

			if ($post_data['forum_id'])
			{
				$total_posts++;

				// Increment by topic_replies if we approve a topic...
				// This works because we do not adjust the topic_replies when re-approving a topic after an edit.
				if ($post_data['topic_first_post_id'] == $post_id && $post_data['topic_replies'])
				{
					$total_posts += $post_data['topic_replies'];
				}
			}

			$post_approve_sql[] = $post_id;
		}

		$post_id_list = array_values(array_diff($post_id_list, $post_approved_list));
		for ($i = 0, $size = sizeof($post_approved_list); $i < $size; $i++)
		{
			unset($post_info[$post_approved_list[$i]]);
		}

		if (sizeof($topic_approve_sql))
		{
			$sql = 'UPDATE ' . TOPICS_TABLE . '
				SET topic_visibility = ' . ITEM_APPROVED . '
				WHERE ' . $db->sql_in_set('topic_id', $topic_approve_sql);
			$db->sql_query($sql);
		}

		if (sizeof($post_approve_sql))
		{
			$sql = 'UPDATE ' . POSTS_TABLE . '
				SET post_visibility = ' . ITEM_APPROVED . '
				WHERE ' . $db->sql_in_set('post_id', $post_approve_sql);
			$db->sql_query($sql);
		}

		unset($topic_approve_sql, $post_approve_sql);

		foreach ($approve_log as $log_data)
		{
			add_log('mod', $log_data['forum_id'], $log_data['topic_id'], ($log_data['type'] == 'topic') ? 'LOG_TOPIC_' . strtoupper($mode) . 'D' : 'LOG_POST_' . strtoupper($mode) . 'D', $log_data['post_subject']);
		}

		if (sizeof($user_posts_sql))
		{
			// Try to minimize the query count by merging users with the same post count additions
			$user_posts_update = array();

			foreach ($user_posts_sql as $user_id => $user_posts)
			{
				$user_posts_update[$user_posts][] = $user_id;
			}

			foreach ($user_posts_update as $user_posts => $user_id_ary)
			{
				$sql = 'UPDATE ' . USERS_TABLE . '
					SET user_posts = user_posts + ' . $user_posts . '
					WHERE ' . $db->sql_in_set('user_id', $user_id_ary);
				$db->sql_query($sql);
			}
		}

		if ($total_topics)
		{
			set_config_count('num_topics', $total_topics, true);
		}

		if ($total_posts)
		{
			set_config_count('num_posts', $total_posts, true);
		}

		if (!function_exists('sync'))
		{
			global $phpbb_root_path, $phpEx;
			include ($phpbb_root_path . 'includes/functions_admin.'.$phpEx);
		}

		sync('topic', 'topic_id', array_keys($topic_id_list), true);
		sync('forum', 'forum_id', array_keys($forum_id_list), true, true);
		unset($topic_id_list, $forum_id_list);

		if ($total_topics)
		{
			//@todo: plurals!
			$success_msg = ($total_topics == 1) ? 'TOPIC_APPROVED_SUCCESS' : 'TOPICS_APPROVED_SUCCESS';
		}
		else
		{
			$success_msg = (sizeof($post_id_list) + sizeof($post_approved_list) == 1) ? 'POST_APPROVED_SUCCESS' : 'POSTS_APPROVED_SUCCESS';
		}

		return $success_msg;
	}
}
