<?php
/***************************************************************************
 *                                search.php
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
include($phpbb_root_path . 'includes/bbcode.'.$phpEx);
include($phpbb_root_path . 'includes/search.'.$phpEx);

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_SEARCH, $board_config['session_length']);
init_userprefs($userdata);
//
// End session management
//

//
// Define initial vars
//
if( isset($HTTP_POST_VARS['mode']) || isset($HTTP_GET_VARS['mode']) )
{
	$mode = ( isset($HTTP_POST_VARS['mode']) ) ? $HTTP_POST_VARS['mode'] : $HTTP_GET_VARS['mode'];
}
else
{
	$mode = "";
}

if( isset($HTTP_POST_VARS['search_keywords']) || isset($HTTP_GET_VARS['search_keywords']) )
{
	$query_keywords = ( isset($HTTP_POST_VARS['search_keywords']) ) ? $HTTP_POST_VARS['search_keywords'] : $HTTP_GET_VARS['search_keywords'];
}
else
{
	$query_keywords = "";
}

if( isset($HTTP_POST_VARS['search_author']) || isset($HTTP_GET_VARS['search_author']))
{
	$query_author = ( isset($HTTP_POST_VARS['search_author']) ) ? $HTTP_POST_VARS['search_author'] : $HTTP_GET_VARS['search_author'];
}
else
{
	$query_author = "";
}

$search_id = ( isset($HTTP_GET_VARS['search_id']) ) ? $HTTP_GET_VARS['search_id'] : "";

$show_results = ( isset($HTTP_POST_VARS['showresults']) ) ? $HTTP_POST_VARS['showresults'] : "posts";

if( isset($HTTP_POST_VARS['addterms']) )
{
	$search_all_terms = ( $HTTP_POST_VARS['addterms'] == "all" ) ? 1 : 0;
}
else
{
	$search_all_terms = 0;
}

if( isset($HTTP_POST_VARS['searchfields']) )
{
	$search_msg_title = ( $HTTP_POST_VARS['searchfields'] == "all" ) ? 1 : 0;
}
else
{
	$search_msg_title = 0;
}

$return_chars = ( isset($HTTP_POST_VARS['charsreqd']) ) ? intval($HTTP_POST_VARS['charsreqd']) : 200;

$search_cat = ( isset($HTTP_POST_VARS['searchcat']) ) ? intval($HTTP_POST_VARS['searchcat']) : -1;
$search_forum = ( isset($HTTP_POST_VARS['searchforum']) ) ? intval($HTTP_POST_VARS['searchforum']) : -1;

$sortby = ( isset($HTTP_POST_VARS['sortby']) ) ? intval($HTTP_POST_VARS['sortby']) : 0;

if( isset($HTTP_POST_VARS['sortdir']) )
{
	$sortby_dir = ( $HTTP_POST_VARS['sortdir'] == "DESC" ) ? "DESC" : "ASC";
}
else
{
	$sortby_dir =  "DESC";
}

if(!empty($HTTP_POST_VARS['resultdays']) )
{
	$search_time = time() - ( intval($HTTP_POST_VARS['resultdays']) * 86400 );
}
else
{
	$search_time = 0;
}

$start = ( isset($HTTP_GET_VARS['start']) ) ? intval($HTTP_GET_VARS['start']) : 0;

//
// Define some globally used data
//
$sortby_types = array($lang['Sort_Time'], $lang['Sort_Post_Subject'], $lang['Sort_Topic_Title'], $lang['Sort_Author'], $lang['Sort_Forum']);
$sortby_sql = array("p.post_time", "pt.post_subject", "t.topic_title", "u.username", "f.forum_id");

//
// Begin core code
//
if( $mode == "searchuser" )
{
	//
	// This handles the simple windowed user search
	// functions called from various other scripts. If a 
	// script allows an 'inline' user search then this is
	// handled by the script itself, this is only for the
	// windowed version
	//
	if( isset($HTTP_POST_VARS['search']) )
	{
		username_search($HTTP_POST_VARS['search_author'], false);
	}
	else
	{
		username_search("", false);
	}

	exit;
}
else if( $query_keywords != "" || $query_author != "" || $search_id )
{
	//
	// Cycle through options ...
	//
	if( $search_id == "newposts" || $search_id == "egosearch" || ( $query_author != "" && $query_keywords == "" )  )
	{
		if( $search_id == "newposts" )
		{
			if( $userdata['session_logged_in'] )
			{
				$sql = "SELECT post_id 
					FROM " . POSTS_TABLE . " 
					WHERE post_time >= " . $userdata['user_lastvisit'];
			}
			else
			{
				message_die(GENERAL_MESSAGE, $lang['No_search_match']);
			}

			$show_results = "topics";
			$sortby = 0;
			$sortby_dir = "DESC";
		}
		else if( $search_id == "egosearch" )
		{
			$sql = "SELECT post_id 
				FROM " . POSTS_TABLE . " 
				WHERE poster_id = " . $userdata['user_id'];

			$show_results = "topics";
			$sortby = 0;
			$sortby_dir = "DESC";
		}
		else
		{
			$query_author = str_replace("*", "%", trim($query_author));
			
			$sql = "SELECT user_id
				FROM " . USERS_TABLE . "
				WHERE username LIKE '" . str_replace("\'", "''", $query_author) . "'";
			$result = $db->sql_query($sql);
			if( !$result )
			{
				message_die(GENERAL_ERROR, "Couldn't obtain list of matching users (searching for: $query_author)", "", __LINE__, __FILE__, $sql);
			}
			if( $db->sql_numrows($result) == 0 )
			{
				message_die(GENERAL_MESSAGE, $lang['No_search_match']);
			}
			
			while( $row = $db->sql_fetchrow($result) )
			{
				if( $matching_userids != "" )
				{
					$matching_userids .= ", ";
				}
				$matching_userids .= $row['user_id'];
			}	

			$sql = "SELECT post_id 
				FROM " . POSTS_TABLE . " 
				WHERE poster_id IN ($matching_userids)";
		}

		$result = $db->sql_query($sql); 
		if( !$result )
		{
			message_die(GENERAL_ERROR, "Couldn't obtain matched posts list", "", __LINE__, __FILE__, $sql);
		}

		$search_ids = array();
		while( $row = $db->sql_fetchrow($result) )
		{
			$search_ids[] = $row['post_id'];
		}

		$db->sql_freeresult($result);

		$total_match_count = count($search_ids);

	}
	else if( $query_keywords != "" )
	{

		$synonym_array = @file($phpbb_root_path . "language/lang_" . $board_config['default_lang'] . "/search_synonyms.txt"); 
	
		$split_search = array();
		$cleaned_search = clean_words("search", stripslashes($query_keywords), $synonym_array);
		$split_search = split_words($cleaned_search, "search");

		$search_msg_only = ( !$search_msg_title ) ? "AND m.title_match = 0" : "";

		$word_count = 0;
		$current_match_type = "and";

		$word_match = array();
		$result_list = array();

		for($i = 0; $i < count($split_search); $i++)
		{
			if( $split_search[$i] == "and" )
			{
				$current_match_type = "and";
			}
			else if( $split_search[$i] == "or" )
			{
				$current_match_type = "or";
			}
			else if( $split_search[$i] == "not" )
			{
				$current_match_type = "not";
			}
			else
			{
				if( !empty($search_all_terms) )
				{
					$current_match_type = "and";
				}

				$match_word = str_replace("*", "%", $split_search[$i]);

				$sql = "SELECT m.post_id 
					FROM " . SEARCH_WORD_TABLE . " w, " . SEARCH_MATCH_TABLE . " m 
					WHERE w.word_text LIKE '$match_word' 
						AND m.word_id = w.word_id 
						AND w.word_common <> 1 
						$search_msg_only";
				$result = $db->sql_query($sql); 
				if( !$result )
				{
					message_die(GENERAL_ERROR, "Couldn't obtain matched posts list", "", __LINE__, __FILE__, $sql);
				}

				$row = array();
				while( $temp_row = $db->sql_fetchrow($result) )
				{
					$row['' . $temp_row['post_id'] . ''] = 1;

					if( !$word_count )
					{
						$result_list['' . $temp_row['post_id'] . ''] = 1;
					}
					else if( $current_match_type == "or" )
					{
						$result_list['' . $temp_row['post_id'] . ''] = 1;
					}
					else if( $current_match_type == "not" )
					{
						$result_list['' . $temp_row['post_id'] . ''] = 0;
					}
				}

				if( $current_match_type == "and" && $word_count )
				{
					@reset($result_list);

					while( list($post_id, $match_count) = each($result_list) )
					{
						if( !$row['' . $post_id . ''] )
						{
							$result_list['' . $post_id . ''] = 0;
						}
					}
				}

				$word_count++;

				$db->sql_freeresult($result);

			}
		}

		@reset($result_list);

		$search_ids = array();
		while( list($post_id, $matches) = each($result_list) )
		{
			if( $matches )
			{
				$search_ids[] = $post_id;
			}
		}	
		
		unset($result_list);
		$total_match_count = count($search_ids);
	}

	//
	// If user is logged in then we'll check to see which (if any) private
	// forums they are allowed to view and include them in the search.
	//
	// If not logged in we explicitly prevent searching of private forums
	//
	$auth_sql = "";
	if( $search_forum != -1 )
	{
		$is_auth = auth(AUTH_READ, $search_forum, $userdata);

		if( !$is_auth['auth_read'] )
		{
			message_die(GENERAL_MESSAGE, $lang['No_searchable_forums']);
		}

		$auth_sql = "f.forum_id = $search_forum";
	}
	else
	{
		$is_auth_ary = auth(AUTH_READ, AUTH_LIST_ALL, $userdata); 

		if( $search_cat != -1 )
		{
			$auth_sql = "f.cat_id = $search_cat";
		}

		$ignore_forum_sql = "";
		while( list($key, $value) = each($is_auth_ary) )
		{
			if( !$value['auth_read'] )
			{
				if( $ignore_forum_sql != "" )
				{
					$ignore_forum_sql .= ", ";
				}
				$ignore_forum_sql .= $key;
			}
		}

		if( $ignore_forum_sql != "" )
		{
			$auth_sql .= ( $auth_sql != "" ) ? " AND f.forum_id NOT IN ($ignore_forum_sql) " : "f.forum_id NOT IN ($ignore_forum_sql) ";
		}
	}

	//
	// Author name search 
	//
	if( $query_author != "" )
	{
		$query_author = str_replace("*", "%", trim(str_replace("\'", "''", $query_author)));
	}

	if( $total_match_count )
	{
		if( $show_results == "topics" )
		{
			$where_sql = "";

			if( $search_time )
			{
				$where_sql .= ( $query_author == "" && $auth_sql == ""  ) ? " AND post_time >= $search_time " : " AND p.post_time >= $search_time ";
			}

			if( $query_author == "" && $auth_sql == "" )
			{
				$sql = "SELECT topic_id 
					FROM " . POSTS_TABLE . "
					WHERE post_id IN (" . implode(", ", $search_ids) . ") 
						$where_sql 
					GROUP BY topic_id";
			}
			else
			{
				$from_sql = POSTS_TABLE . " p"; 

				if( $query_author != "" )
				{
					$from_sql .= ", " . USERS_TABLE . " u";
					$where_sql .= " AND u.user_id = p.poster_id AND u.username LIKE '$query_author' ";
				}

				if( $auth_sql != "" )
				{
					$from_sql .= ", " . FORUMS_TABLE . " f";
					$where_sql .= " AND f.forum_id = p.forum_id AND $auth_sql";
				}

				$sql = "SELECT p.topic_id 
					FROM $from_sql 
					WHERE p.post_id IN (" . implode(", ", $search_ids) . ") 
						$where_sql 
					GROUP BY p.topic_id";
			}

			$result = $db->sql_query($sql); 
			if( !$result )
			{
				message_die(GENERAL_ERROR, "Couldn't obtain topic ids", "", __LINE__, __FILE__, $sql);
			}

			$search_ids = array();
			while( $row = $db->sql_fetchrow($result) )
			{
				$search_ids[] = $row['topic_id'];
			}

			$db->sql_freeresult($result);

			$total_match_count = count($search_ids);
	
		}
		else if( $query_author != "" || $search_time || $auth_sql != "" )
		{
			$where_sql = ( $query_author == "" && $auth_sql == "" ) ? "post_id IN (" . implode(", ", $search_ids) . ")" : "p.post_id IN (" . implode(", ", $search_ids) . ")";
			$from_sql = (  $query_author == "" && $auth_sql == "" ) ? POSTS_TABLE : POSTS_TABLE . " p";

			if( $search_time )
			{
				$where_sql .= ( $query_author == "" && $auth_sql == "" ) ? " AND post_time >= $search_time " : " AND p.post_time >= $search_time";
			}

			if( $auth_sql != "" )
			{
				$from_sql .= ", " . FORUMS_TABLE . " f";
				$where_sql .= " AND f.forum_id = p.forum_id AND $auth_sql";
			}

			if( $query_author != "" )
			{
				$from_sql .= ", " . USERS_TABLE . " u";
				$where_sql .= " AND u.user_id = p.poster_id AND u.username LIKE '$query_author'";
			}

			$sql = "SELECT p.post_id 
				FROM $from_sql 
				WHERE $where_sql";
			$result = $db->sql_query($sql); 
			if( !$result )
			{
				message_die(GENERAL_ERROR, "Couldn't obtain post ids", "", __LINE__, __FILE__, $sql);
			}

			$search_ids = array();
			while( $row = $db->sql_fetchrow($result) )
			{
				$search_ids[] = $row['post_id'];
			}

			$db->sql_freeresult($result);

			$total_match_count = count($search_ids);
		}
	}
	else if( $search_id == "unanswered" )
	{

		$sql = "SELECT topic_id 
			FROM " . TOPICS_TABLE . "  
			WHERE topic_replies = 0 
				AND topic_moved_id = 0";
		$result = $db->sql_query($sql); 
		if( !$result )
		{
			message_die(GENERAL_ERROR, "Couldn't obtain post ids", "", __LINE__, __FILE__, $sql);
		}

		$search_ids = array();
		while( $row = $db->sql_fetchrow($result) )
		{
			$search_ids[] = $row['topic_id'];
		}

		$db->sql_freeresult($result);

		$total_match_count = count($search_ids);

		//
		// Basic requirements
		//
		$show_results = "topics";
		$sortby = 0;
		$sortby_dir = "DESC";
	}

	//
	// Finish building query (for all combinations)
	// and run it ...
	//
	if( $total_match_count )
	{
		//
		// Clean up search results table
		//
		$sql = "SELECT session_id 
			FROM " . SESSIONS_TABLE;
		if( $result = $db->sql_query($sql) )
		{
			$delete_search_ids = array();
			while( $row = $db->sql_fetchrow($result) )
			{
				$delete_search_ids[] = "'" . $row['session_id'] . "'";
			}

			if( count($delete_search_ids) )
			{
				$sql = "DELETE FROM " . SEARCH_TABLE . " 
					WHERE session_id NOT IN (" . implode(", ", $delete_search_ids) . ")";
				if( !$result = $db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, "Couldn't delete old search id sessions", "", __LINE__, __FILE__, $sql);
				}
			}
		}

		//
		// Store new result data
		//
		if( $total_match_count )
		{
			$search_results = implode(", ", $search_ids);
			$per_page = ( $show_results == "posts" ) ? $board_config['posts_per_page'] : $board_config['topics_per_page'];

			//
			// Combine both results and search data (apart from original query)
			// so we can serialize it and place it in the DB
			//
			$store_search_data = array();
			$store_search_data['results'] = $search_results;
			$store_search_data['match_count'] = $total_match_count;

			$store_search_data['word_array'] = $split_search;

			$store_search_data['sort_by'] = $sortby;
			$store_search_data['sortby_dir'] = $sortby_dir;
			$store_search_data['show_results'] = $show_results;
			$store_search_data['return_chars'] = $return_chars;

			$result_array = serialize($store_search_data);
			unset($store_search_data);

			mt_srand ((double) microtime() * 1000000);
			$search_id = mt_rand();

			$sql = "UPDATE " . SEARCH_TABLE . " 
				SET search_id = $search_id, search_array = '$result_array'
				WHERE session_id = '" . $userdata['session_id'] . "'";
			$result = $db->sql_query($sql);
			if( !$result || !$db->sql_affectedrows() )
			{
				$sql = "INSERT INTO " . SEARCH_TABLE . " (search_id, session_id, search_array) 
					VALUES($search_id, '" . $userdata['session_id'] . "', '" . str_replace("\'", "''", $result_array) . "')";
				if( !$result = $db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, "Couldn't insert search results", "", __LINE__, __FILE__, $sql);
				}
			}
		}
		else
		{
			message_die(GENERAL_MESSAGE, $lang['No_search_match']);
		}
	}
	else if( isset($HTTP_GET_VARS['search_id']) ) 
	{
		$search_id = intval($HTTP_GET_VARS['search_id']);

		$sql = "SELECT search_array 
			FROM " . SEARCH_TABLE . " 
			WHERE search_id = $search_id  
				AND session_id = '". $userdata['session_id'] . "'";
		if( !$result = $db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, "Couldn't obtain search results", "", __LINE__, __FILE__, $sql);
		}

		if( $row = $db->sql_fetchrow($result) )
		{
			$search_data = unserialize($row['search_array']);
			unset($row);

			$search_results = $search_data['results'];
			$total_match_count = $search_data['match_count'];

			$split_search = $search_data['word_array'];

			$sortby = $search_data['sort_by'];
			$sortby_dir = $search_data['sortby_dir'];
			$show_results = $search_data['show_results'];
			$return_chars = $search_data['return_chars'];

		}
		else
		{
			header("Location: " . append_sid("search.$phpEx", true));
		}
	}
	else
	{
		message_die(GENERAL_MESSAGE, $lang['No_search_match']);
	}

	if( $search_results != "" )
	{
		if( $show_results == "posts" )
		{
			$sql = "SELECT pt.post_text, pt.bbcode_uid, pt.post_subject, p.*, f.forum_id, f.forum_name, t.*, u.username, u.user_id, u.user_sig, u.user_sig_bbcode_uid  
				FROM " . FORUMS_TABLE . " f, " . TOPICS_TABLE . " t, " . USERS_TABLE . " u, " . POSTS_TABLE . " p, " . POSTS_TEXT_TABLE . " pt 
				WHERE p.post_id IN ($search_results)
					AND pt.post_id = p.post_id
					AND f.forum_id = p.forum_id
					AND p.topic_id = t.topic_id
					AND p.poster_id = u.user_id";
		}
		else
		{
			$sql = "SELECT t.*, f.forum_id, f.forum_name, u.username, u.user_id, u2.username as user2, u2.user_id as id2, p.post_time, p.post_username 
				FROM " . TOPICS_TABLE . " t, " . FORUMS_TABLE . " f, " . USERS_TABLE . " u, " . USERS_TABLE . " u2, " . POSTS_TABLE . " p 
				WHERE t.topic_id IN ($search_results) 
					AND f.forum_id = t.forum_id 
					AND u.user_id = t.topic_poster 
					AND p.post_id = t.topic_last_post_id 
					AND p.poster_id = u2.user_id";
		}
		
		$per_page = ( $show_results == "posts" ) ? $board_config['posts_per_page'] : $board_config['topics_per_page'];

		$sql .= " ORDER BY " . $sortby_sql[$sortby] . " $sortby_dir LIMIT $start, " . $per_page;

		if( !$result = $db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, "Couldn't obtain search results", "", __LINE__, __FILE__, $sql);
		}

		$searchset = array();
		while( $row = $db->sql_fetchrow($result) )
		{
			$searchset[] = $row;
		}
		
		$db->sql_freeresult($result);		
		
		//
		// Define censored word matches
		//
		$orig_word = array();
		$replacement_word = array();
		obtain_word_list($orig_word, $replacement_word);

		//
		// Output header
		//
		$page_title = $lang['Search'];
		include($phpbb_root_path . 'includes/page_header.'.$phpEx);	

		if( $show_results == "posts" )
		{
			$template->set_filenames(array(
				"body" => "search_results_posts.tpl",
				"jumpbox" => "jumpbox.tpl")
			);
		}
		else
		{
			$template->set_filenames(array(
				"body" => "search_results_topics.tpl",
				"jumpbox" => "jumpbox.tpl")
			);
		}

		$jumpbox = make_jumpbox();
		$template->assign_vars(array(
			"L_GO" => $lang['Go'],
			"L_JUMP_TO" => $lang['Jump_to'],
			"L_SELECT_FORUM" => $lang['Select_forum'],

			"S_JUMPBOX_LIST" => $jumpbox,
			"S_JUMPBOX_ACTION" => append_sid("viewforum.$phpEx"))
		);
		$template->assign_var_from_handle("JUMPBOX", "jumpbox");

		$l_search_matches = ( $total_match_count == 1 ) ? sprintf($lang['Found_search_match'], $total_match_count) : sprintf($lang['Found_search_matches'], $total_match_count);

		$template->assign_vars(array(
			"L_SEARCH_MATCHES" => $l_search_matches, 
			"L_TOPIC" => $lang['Topic'])
		);

		$highlight_active = "";
		$search_string = array();
		$replace_string = array();
		for($j = 0; $j < count($split_search); $j++ )
		{
			$split_word = $split_search[$j];

			if( $split_word != "and" && $split_word != "or" && $split_word != "not" )
			{
				$highlight_active .= " " . $split_word;

				$search_string[] = "#\b(" . str_replace("\*", ".*?", phpbb_preg_quote($split_word, "#")) . ")(?!.*?<\/a>)(?!.*?\[/url\])(?!.*?<\/span>)\b#i";
				$replace_string[] = '<span style="color:#' . $theme['fontcolor3'] . '"><b>\\1</b></span>';

				for ($k = 0; $k < count($synonym_array); $k++)
				{ 
					list($replace_synonym, $match_synonym) = split(" ", trim(strtolower($synonym_array[$k]))); 

					if( $replace_synonym == $split_word )
					{
						$search_string[] = "#\b(" . str_replace("\*", ".*?", phpbb_preg_quote($replace_synonym, "#")) . ")(?!.*?<\/a>)(?!.*?\[/url\])(?!.*?<\/span>)\b#i";
						$replace_string[] = '<span style="color:#' . $theme['fontcolor3'] . '"><b>\\1</b></span>';

						$highlight_active .= " " . $match_synonym;
					}
				} 
			}
		}

		$highlight_active = urlencode(trim($highlight_active));

		$tracking_topics = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_t"]) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_t"]) : array();
		$tracking_forums = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_f"]) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_f"]) : array();

		for($i = 0; $i < count($searchset); $i++)
		{
			$forum_url = append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=" . $searchset[$i]['forum_id']);
			$topic_url = append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=" . $searchset[$i]['topic_id'] . "&amp;highlight=$highlight_active");
			$post_url = append_sid("viewtopic.$phpEx?" . POST_POST_URL . "=" . $searchset[$i]['post_id'] . "&amp;highlight=$highlight_active#" . $searchset[$i]['post_id']);

			$post_date = create_date($board_config['default_dateformat'], $searchset[$i]['post_time'], $board_config['board_timezone']);

			$message = $searchset[$i]['post_text'];
			$topic_title = $searchset[$i]['topic_title'];

			$forum_id = $searchset[$i]['forum_id'];
			$topic_id = $searchset[$i]['topic_id'];

			if( $show_results == "posts" )
			{
				if( isset($return_chars) )
				{
					$bbcode_uid = $searchset[$i]['bbcode_uid'];

					//
					// If the board has HTML off but the post has HTML
					// on then we process it, else leave it alone
					//
					if( $return_chars != -1 )
					{
						$message = (strlen($message) > $return_chars) ? substr($message, 0, $return_chars) . " ..." : $message;
						$message = strip_tags($message);
						$message = preg_replace("/\[.*?:$bbcode_uid:?.*?\]/si", "", $message);

						if( count($search_string) )
						{
							$message = preg_replace($search_string, $replace_string, $message);
						}
						
						$message = preg_replace("/\[url\]|\[\/url\]/si", "", $message);

					}
					else
					{
						if( !$board_config['allow_html'] )
						{
							if( $postrow[$i]['enable_html'] )
							{
								$message = preg_replace("#(<)([\/]?.*?)(>)#is", "&lt;\\2&gt;", $message);
							}
						}

						if( $bbcode_uid != "" )
						{
							$message = ( $board_config['allow_bbcode'] ) ? bbencode_second_pass($message, $bbcode_uid) : preg_replace("/\:[0-9a-z\:]+\]/si", "]", $message);
						}

						$message = make_clickable($message);

						if( count($search_string) )
						{
							$message = preg_replace($search_string, $replace_string, $message);
						}

					}

					if( count($orig_word) )
					{
						$topic_title = preg_replace($orig_word, $replacement_word, $topic_title);
						$post_subject = ( $searchset[$i]['post_subject'] != "" ) ? preg_replace($orig_word, $replacement_word, $searchset[$i]['post_subject']) : $topic_title;

						$message = preg_replace($orig_word, $replacement_word, $message);
					}
					else
					{
						$post_subject = ( $searchset[$i]['post_subject'] != "" ) ? $searchset[$i]['post_subject'] : $topic_title;
					}

					if($board_config['allow_smilies'] && $searchset[$i]['enable_smilies'])
					{
						$message = smilies_pass($message);
					}

					$message = str_replace("\n", "<br />", $message);

				}

				$poster = ( $searchset[$i]['user_id'] != ANONYMOUS ) ? "<a href=\"" . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $searchset[$i]['user_id']) . "\">" : "";
				$poster .= ( $searchset[$i]['user_id'] != ANONYMOUS ) ? $searchset[$i]['username'] : ( ( $searchset[$i]['post_username'] != "" ) ? $searchset[$i]['post_username'] : $lang['Guest'] );
				$poster .= ( $searchset[$i]['user_id'] != ANONYMOUS ) ? "</a>" : "";

				if( $userdata['session_logged_in'] && $searchset[$i]['post_time'] > $userdata['user_lastvisit'] )
				{
					if( !empty($tracking_topics['' . $topic_id . '']) && !empty($tracking_forums['' . $forum_id . '']) )
					{
						$topic_last_read = ( $tracking_topics['' . $topic_id . ''] > $tracking_forums['' . $forum_id . ''] ) ? $tracking_topics['' . $topic_id . ''] : $tracking_forums['' . $forum_id . ''];
					}
					else if( !empty($tracking_topics['' . $topic_id . '']) || !empty($tracking_forums['' . $forum_id . '']) )
					{
						$topic_last_read = ( !empty($tracking_topics['' . $topic_id . '']) ) ? $tracking_topics['' . $topic_id . ''] : $tracking_forums['' . $forum_id . ''];
					}

					if( $searchset[$i]['post_time'] > $topic_last_read )
					{
						$mini_post_img = '<img src="' . $images['icon_minipost_new'] . '" alt="' . $lang['New_post'] . '" title="' . $lang['New_post'] . '" border="0" />';
					}
					else
					{
						$mini_post_img = '<img src="' . $images['icon_minipost'] . '" alt="' . $lang['Post'] . '" title="' . $lang['Post'] . '" border="0" />';
					}
				}
				else
				{
					$mini_post_img = '<img src="' . $images['icon_minipost'] . '" alt="' . $lang['Post'] . '" title="' . $lang['Post'] . '" border="0" />';
				}

				$template->assign_block_vars("searchresults", array( 
					"TOPIC_TITLE" => $topic_title,
					"FORUM_NAME" => $searchset[$i]['forum_name'],
					"POST_SUBJECT" => $post_subject,
					"POST_DATE" => $post_date,
					"POSTER_NAME" => $poster,
					"TOPIC_REPLIES" => $searchset[$i]['topic_replies'],
					"TOPIC_VIEWS" => $searchset[$i]['topic_views'],
					"MESSAGE" => $message,

					"MINI_POST_IMG" => $mini_post_img, 

					"U_POST" => $post_url,
					"U_TOPIC" => $topic_url,
					"U_FORUM" => $forum_url)
				);
			}
			else
			{
				$message = "";

				if( count($orig_word) )
				{
					$topic_title = preg_replace($orig_word, $replacement_word, $searchset[$i]['topic_title']);
				}

				$topic_type = $searchset[$i]['topic_type'];

				if($topic_type == POST_ANNOUNCE)
				{
					$topic_type = $lang['Topic_Announcement'] . " ";
				}
				else if($topic_type == POST_STICKY)
				{
					$topic_type = $lang['Topic_Sticky'] . " ";
				}
				else
				{
					$topic_type = "";
				}

				if( $searchset[$i]['topic_vote'] )
				{
					$topic_type .= $lang['Topic_Poll'] . " ";
				}

				$views = $searchset[$i]['topic_views'];
				$replies = $searchset[$i]['topic_replies'];

				if( $replies > $board_config['topics_per_page'] )
				{
					$goto_page = "[ <img src=\"" . $images['icon_gotopost'] . "\" alt=\"" . $lang['Goto_page'] . "\" />" . $lang['Goto_page'] . ": ";

					$times = 1;
					for($j = 0; $j < $replies + 1; $j += $board_config['posts_per_page'])
					{
						$base_url = append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=" . $topic_id . "&amp;start=$j&amp;highlight=$highlight_active");

						if( $times > 4 )
						{
							if( $j + $board_config['topics_per_page'] >= $replies + 1 )
							{
								$goto_page .= " ... <a href=\"$base_url\">$times</a>";
							}
						}
						else
						{
							if( $times != 1 )
							{
								$goto_page .= ", ";
							}

							$goto_page .= "<a href=\"$base_url\">$times</a>";
						}

						$times++;
					}
					$goto_page .= " ]";
				}
				else
				{
					$goto_page = "";
				}

				if( $searchset[$i]['topic_status'] == TOPIC_MOVED )
				{
					$topic_type = $lang['Topic_Moved'] . " ";
					$topic_id = $searchset[$i]['topic_moved_id'];

					$folder_image = "<img src=\"" . $images['folder'] . "\" alt=\"" . $lang['No_new_posts'] . "\" />";
					$newest_post_img = "";
				}
				else
				{
					if( $searchset[$i]['topic_status'] == TOPIC_LOCKED )
					{
						$folder = $images['folder_locked'];
						$folder_new = $images['folder_locked_new'];
					}
					else if( $searchset[$i]['topic_type'] == POST_ANNOUNCE )
					{
						$folder = $images['folder_announce'];
						$folder_new = $images['folder_announce_new'];
					}
					else if( $searchset[$i]['topic_type'] == POST_STICKY )
					{
						$folder = $images['folder_sticky'];
						$folder_new = $images['folder_sticky_new'];
					}
					else
					{
						if( $replies >= $board_config['hot_threshold'] )
						{
							$folder = $images['folder_hot'];
							$folder_new = $images['folder_hot_new'];
						}
						else
						{
							$folder = $images['folder'];
							$folder_new = $images['folder_new'];
						}
					}

					if( $userdata['session_logged_in'] )
					{
						if( $searchset[$i]['post_time'] > $userdata['user_lastvisit'] ) 
						{
							if( !empty($tracking_topics) || !empty($tracking_forums) || isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_f_all"]) )
							{

								$unread_topics = true;

								if( !empty($tracking_topics['' . $topic_id . '']) )
								{
									if( $tracking_topics['' . $topic_id . ''] > $searchset[$i]['post_time'] )
									{
										$unread_topics = false;
									}
								}

								if( !empty($tracking_forums['' . $forum_id . '']) )
								{
									if( $tracking_forums['' . $forum_id . ''] > $searchset[$i]['post_time'] )
									{
										$unread_topics = false;
									}
								}

								if( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_f_all"]) )
								{
									if( $HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_f_all"] > $searchset[$i]['post_time'] )
									{
										$unread_topics = false;
									}
								}

								if( $unread_topics )
								{
									$folder_image = "<img src=\"$folder_new\" alt=\"" . $lang['New_posts'] . "\" title=\"" . $lang['New_posts'] . "\" />";

									$newest_post_img = "<a href=\"viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=newest\"><img src=\"" . $images['icon_newest_reply'] . "\" alt=\"" . $lang['View_newest_post'] . "\" title=\"" . $lang['View_newest_post'] . "\" border=\"0\" /></a> ";
								}
								else
								{
									$folder_alt = ( $searchset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];

									$folder_image = "<img src=\"$folder\" alt=\"$folder_alt\" title=\"$folder_alt\" border=\"0\" />";
									$newest_post_img = "";
								}

							}
							else if( $searchset[$i]['post_time'] > $userdata['user_lastvisit'] ) 
							{
								$folder_image = "<img src=\"$folder_new\" alt=\"" . $lang['New_posts'] . "\" title=\"" . $lang['New_posts'] . "\" />";

								$newest_post_img = "<a href=\"viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=newest\"><img src=\"" . $images['icon_newest_reply'] . "\" alt=\"" . $lang['View_newest_post'] . "\" title=\"" . $lang['View_newest_post'] . "\" border=\"0\" /></a> ";
							}
							else 
							{
								$folder_alt = ( $searchset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];
								$folder_image = "<img src=\"$folder\" alt=\"$folder_alt\" title=\"$folder_alt\" border=\"0\" />";
								$newest_post_img = "";
							}
						}
						else
						{
							$folder_alt = ( $searchset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];
							$folder_image = "<img src=\"$folder\" alt=\"$folder_alt\" title=\"$folder_alt\" border=\"0\" />";
							$newest_post_img = "";
						}
					}
					else
					{
						$folder_alt = ( $searchset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];
						$folder_image = "<img src=\"$folder\" alt=\"$folder_alt\" title=\"$folder_alt\" border=\"0\" />";
						$newest_post_img = "";
					}
				}

				$topic_poster = ( $searchset[$i]['user_id'] != ANONYMOUS ) ? "<a href=\"" . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $searchset[$i]['user_id']) . "\">" : "";
				$topic_poster .= ( $searchset[$i]['user_id'] != ANONYMOUS ) ? $searchset[$i]['username'] : ( ( $searchset[$i]['post_username'] != "" ) ? $searchset[$i]['post_username'] : $lang['Guest'] );
				$topic_poster .= ( $searchset[$i]['user_id'] != ANONYMOUS ) ? "</a>" : "";

				$last_post_time = create_date($board_config['default_dateformat'], $searchset[$i]['post_time'], $board_config['board_timezone']);

				$last_post_user = ( $searchset[$i]['id2'] == ANONYMOUS && $searchset[$i]['post_username'] != '' ) ? $searchset[$i]['post_username'] : $searchset[$i]['user2'];

				$last_post = $last_post_time . "<br />";
				$last_post .= ( $searchset[$i]['id2'] == ANONYMOUS ) ? ( ($searchset[$i]['post_username'] != "" ) ? $searchset[$i]['post_username'] . " " : $lang['Guest'] . " " ) : "<a href=\"" . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "="  . $searchset[$i]['id2']) . "\">" . $searchset[$i]['user2'] . "</a> ";
				$last_post .= "<a href=\"" . append_sid("viewtopic.$phpEx?"  . POST_POST_URL . "=" . $searchset[$i]['topic_last_post_id']) . "#" . $searchset[$i]['topic_last_post_id'] . "\"><img src=\"" . $images['icon_latest_reply'] . "\" alt=\"" . $lang['View_latest_post'] . "\" title=\"" . $lang['View_latest_post'] . "\" border=\"0\" /></a>";

				$template->assign_block_vars("searchresults", array( 
					"FORUM_NAME" => $searchset[$i]['forum_name'],
					"FORUM_ID" => $forum_id,
					"TOPIC_ID" => $topic_id,
					"FOLDER" => $folder_image,
					"NEWEST_POST_IMG" => $newest_post_img, 
					"TOPIC_POSTER" => $topic_poster,
					"GOTO_PAGE" => $goto_page,
					"REPLIES" => $replies,
					"TOPIC_TITLE" => $topic_title,
					"TOPIC_TYPE" => $topic_type,
					"VIEWS" => $views,
					"LAST_POST" => $last_post,

					"U_VIEW_FORUM" => $forum_url, 
					"U_VIEW_TOPIC" => $topic_url,
					"U_TOPIC_POSTER_PROFILE" => append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $searchset[$i]['user_id']))
				);
			}
		}

		$base_url = "search.$phpEx?search_id=$search_id";

		$template->assign_vars(array(
			"PAGINATION" => generate_pagination($base_url, $total_match_count, $per_page, $start),
			"PAGE_NUMBER" => sprintf($lang['Page_of'], ( floor( $start / $per_page ) + 1 ), ceil( $total_match_count / $per_page )), 

			"L_GOTO_PAGE" => $lang['Goto_page'])
		);

		$template->pparse("body");

		include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
	}
}

//
// Search forum
//
$sql = "SELECT c.cat_title, c.cat_id, f.forum_name, f.forum_id  
	FROM " . CATEGORIES_TABLE . " c, " . FORUMS_TABLE . " f
	WHERE f.cat_id = c.cat_id 
	ORDER BY c.cat_id, f.forum_order";
$result = $db->sql_query($sql);
if( !$result )
{
	message_die(GENERAL_ERROR, "Couldn't obtain forum_name/forum_id", "", __LINE__, __FILE__, $sql);
}

$is_auth_ary = auth(AUTH_READ, AUTH_LIST_ALL, $userdata);

$s_forums = "";
while( $row = $db->sql_fetchrow($result) )
{
	if( $is_auth_ary[$row['forum_id']]['auth_read'] )
	{
		$s_forums .= "<option value=\"" . $row['forum_id'] . "\">" . $row['forum_name'] . "</option>";
		if( empty($list_cat[$row['cat_id']]) )
		{
			$list_cat[$row['cat_id']] = $row['cat_title'];
		}
	}
}

if( $s_forums != "" )
{
	$s_forums = "<option value=\"-1\">" . $lang['All_available'] . "</option>" . $s_forums;

	//
	// Category to search
	//
	$s_categories = "<option value=\"-1\">" . $lang['All_available'] . "</option>";
	while( list($cat_id, $cat_title) = @each($list_cat))
	{
		$s_categories .= "<option value=\"$cat_id\">$cat_title</option>";
	}
}
else
{
	message_die(GENERAL_MESSAGE, $lang['No_searchable_forums']);
}

//
// Number of chars returned
//
$s_characters = "<option value=\"-1\">" . $lang['All_available'] . "</option>";
$s_characters .= "<option value=\"0\">0</option>";
$s_characters .= "<option value=\"25\">25</option>";
$s_characters .= "<option value=\"50\">50</option>";

for($i = 100; $i < 1100 ; $i += 100)
{
	$selected = ( $i == 200 ) ? "selected=\"selected\"" : "";
	$s_characters .= "<option value=\"$i\"$selected>$i</option>";
}

//
// Sorting
//
$s_sortby = "";
for($i = 0; $i < count($sortby_types); $i++)
{
	$s_sortby .= "<option value=\"$i\">" . $sortby_types[$i] . "</option>";
}

//
// Search time
//
$previous_days = array(0, 1, 7, 14, 30, 90, 180, 364);
$previous_days_text = array($lang['All_Posts'], $lang['1_Day'], $lang['7_Days'], $lang['2_Weeks'], $lang['1_Month'], $lang['3_Months'], $lang['6_Months'], $lang['1_Year']);

$s_time = "";
for($i = 0; $i < count($previous_days); $i++)
{
	$selected = ( $topic_days == $previous_days[$i] ) ? " selected=\"selected\"" : "";
	$s_time .= "<option value=\"" . $previous_days[$i] . "\"$selected>" . $previous_days_text[$i] . "</option>";
}

//
// Output the basic page
//
$page_title = $lang['Search'];
include($phpbb_root_path . 'includes/page_header.'.$phpEx);

$template->set_filenames(array(
	"body" => "search_body.tpl",
	"jumpbox" => "jumpbox.tpl")
);

$jumpbox = make_jumpbox();
$template->assign_vars(array(
	"L_GO" => $lang['Go'],
	"L_JUMP_TO" => $lang['Jump_to'],
	"L_SELECT_FORUM" => $lang['Select_forum'],

	"S_JUMPBOX_LIST" => $jumpbox,
	"S_JUMPBOX_ACTION" => append_sid("viewforum.$phpEx"))
);
$template->assign_var_from_handle("JUMPBOX", "jumpbox");

$template->assign_vars(array(
	"L_SEARCH_QUERY" => $lang['Search_query'], 
	"L_SEARCH_OPTIONS" => $lang['Search_options'], 
	"L_SEARCH_KEYWORDS" => $lang['Search_keywords'], 
	"L_SEARCH_KEYWORDS_EXPLAIN" => $lang['Search_keywords_explain'], 
	"L_SEARCH_AUTHOR" => $lang['Search_author'],
	"L_SEARCH_AUTHOR_EXPLAIN" => $lang['Search_author_explain'], 
	"L_SEARCH_ANY_TERMS" => $lang['Search_for_any'],
	"L_SEARCH_ALL_TERMS" => $lang['Search_for_all'], 
	"L_SEARCH_MESSAGE_ONLY" => $lang['Search_msg_only'], 
	"L_SEARCH_MESSAGE_TITLE" => $lang['Search_title_msg'], 
	"L_CATEGORY" => $lang['Category'], 
	"L_RETURN_FIRST" => $lang['Return_first'],
	"L_CHARACTERS" => $lang['characters_posts'], 
	"L_SORT_BY" => $lang['Sort_by'],
	"L_SORT_ASCENDING" => $lang['Sort_Ascending'],
	"L_SORT_DESCENDING" => $lang['Sort_Descending'],
	"L_SEARCH_PREVIOUS" => $lang['Search_previous'], 
	"L_DISPLAY_RESULTS" => $lang['Display_results'], 

	"S_SEARCH_ACTION" => append_sid("search.$phpEx?mode=results"),
	"S_CHARACTER_OPTIONS" => $s_characters,
	"S_FORUM_OPTIONS" => $s_forums, 
	"S_CATEGORY_OPTIONS" => $s_categories, 
	"S_TIME_OPTIONS" => $s_time, 
	"S_SORT_OPTIONS" => $s_sortby,
	"S_HIDDEN_FIELDS" => $s_hidden_fields)
);

$template->pparse("body");

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>
