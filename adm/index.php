<?php
// -------------------------------------------------------------
//
// $Id$
//
// FILENAME  : adm/index.php
// STARTED   : Sat Feb 13, 2001
// COPYRIGHT : � 2003 phpBB Group
// WWW       : http://www.phpbb.com/
// LICENCE   : GPL vs2.0 [ see /docs/COPYING ] 
// 
// -------------------------------------------------------------

define('IN_PHPBB', 1);
// Include files
$phpbb_root_path = './../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
require('pagestart.' . $phpEx);

// Do we have any admin permissions at all?
if (!$auth->acl_get('a_'))
{
	trigger_error($user->lang['NO_ADMIN']);
}

// Define some vars
$pane = request_var('pane', '');

// Generate relevant output
if ($pane == 'top')
{
	adm_page_header('', '', false);

?>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td><a href="<?php echo "{$phpbb_root_path}index.$phpEx$SID"; ?>" target="_top"><img src="images/header_left.jpg" width="200" height="60" alt="phpBB Logo" title="phpBB Logo" border="0"/></a></td>
		<td width="100%" background="images/header_bg.jpg" height="60" align="right" nowrap="nowrap"><span class="maintitle"><?php echo $user->lang['ADMIN_TITLE']; ?></span> &nbsp; &nbsp; &nbsp;</td>
	</tr>
</table>

<?php

	adm_page_footer(false);

}
else if ($pane == 'left')
{
	// Cheat and use the meta tag to change some stylesheet info
	adm_page_header('', '<style type="text/css">body {background-color: #98AAB1}</style>', false);

	// Grab module information using Bart's "neat-o-module" system (tm)
	$dir = @opendir('.');

	$setmodules = 1;
	while ($file = readdir($dir))
	{
		if (preg_match('#^admin_(.*?)\.' . $phpEx . '$#', $file))
		{
			include($file);
		}
	}
	@closedir($dir);

	unset($setmodules);

?>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td width="100%"><table width="100%" cellpadding="4" cellspacing="1" border="0">
			<tr>
				<th class="menu" height="25">&#0187; <?php echo $user->lang['RETURN_TO']; ?></th>
			</tr>
			<tr>
				<td class="row1"><a class="genmed" href="<?php echo "index.$phpEx$SID"; ?>&amp;pane=right" target="main"><?php echo $user->lang['ADMIN_INDEX']; ?></a></td>
			</tr>
			<tr>
				<td class="row2"><a class="genmed" href="<?php echo "../index.$phpEx$SID"; ?>" target="_top"><?php echo $user->lang['FORUM_INDEX']; ?></a></td>
			</tr>
<?php

	if (is_array($module))
	{
		@ksort($module);
		foreach ($module as $cat => $action_ary)
		{
			$cat = (!empty($user->lang[$cat . '_CAT'])) ? $user->lang[$cat . '_CAT'] : preg_replace('#_#', ' ', $cat);

?>
			<tr>
				<th class="menu" height="25">&#0187; <?php echo $cat; ?></th>
			</tr>
<?php

			@ksort($action_ary);

			$row_class = '';
			foreach ($action_ary as $action => $file)
			{
				if (!empty($file))
				{
					$action = (!empty($user->lang[$action])) ? $user->lang[$action] : preg_replace('#_#', ' ', $action);

					$row_class = ($row_class == 'row1') ? 'row2' : 'row1';
?>
			<tr>
				<td class="<?php echo $row_class; ?>"><a class="genmed" href="<?php echo $file; ?>" target="main"><?php echo $action; ?></a></td>
			</tr>
<?php

				}
			}
		}
	}

?>
		</table></td>
	</tr>
</table>
</body>
</html>
<?php

	// Output footer but don't include copyright info
	adm_page_footer(false);

}
elseif ($pane == 'right')
{
	$action = request_var('action', '');
	$mark	= (isset($_REQUEST['mark'])) ? implode(', ', request_var('mark', 0)) : '';

	if ($mark)
	{
		switch ($action)
		{
			case 'activate':
			case 'delete':
				if (!$auth->acl_get('a_user'))
				{
					trigger_error($user->lang['NO_ADMIN']);
				}

				$sql = ($action == 'activate') ? 'UPDATE ' . USERS_TABLE . ' SET user_type = ' . USER_NORMAL . " WHERE user_id IN ($mark)" : 'DELETE FROM ' . USERS_TABLE . " WHERE user_id IN ($mark)";
				$db->sql_query($sql);

				if (!$delete)
				{
					set_config('num_users', $config['num_users'] + $db->affected_rows(), true);
				}

				$log_action = ($activate) ? 'log_index_activate' : 'log_index_delete';
				add_log('admin', $log_action, $db->affected_rows());
				break;

			case 'remind':
				if (!$auth->acl_get('a_user'))
				{
					trigger_error($user->lang['NO_ADMIN']);
				}

				if (empty($config['email_enable']))
				{
					trigger_error($user->lang['EMAIL_DISABLED']);
				}

				$sql = 'SELECT user_id, username, user_email, user_lang, user_jabber, user_notify_method, user_regdate, user_actkey 
					FROM ' . USERS_TABLE . " 
					WHERE user_id IN ($mark)";
				$result = $db->sql_query($sql);

				if ($row = $db->sql_fetchrow($result))
				{
					// Send the messages
					include_once($phpbb_root_path . 'includes/functions_messenger.'.$phpEx);

					$messenger = new messenger();

					$board_url = generate_board_url() . "/ucp.$phpEx?mode=activate";
					$sig = str_replace('<br />', "\n", "-- \n" . $config['board_email_sig']);

					$usernames = array();
					do
					{
						$messenger->template('user_remind_inactive', $row['user_lang']);

						$messenger->replyto($config['board_email']);
						$messenger->to($row['user_email'], $row['username']);
						$messenger->im($row['user_jabber'], $row['username']);

						$messenger->assign_vars(array(
							'EMAIL_SIG'		=> $sig,
							'USERNAME'		=> $row['username'],
							'SITENAME'		=> $config['sitename'],
							'REGISTER_DATE'	=> $user->format_date($row['user_regdate']), 
							
							'U_ACTIVATE'	=> "$board_url&mode=activate&u=" . $row['user_id'] . '&k=' . $row['user_actkey'])
						);

						$messenger->send($row['user_notify_type']);

						$usernames[] = $row['username'];
					}
					while ($row = $db->sql_fetchrow($result));

					$messenger->queue->save();
					unset($email_list);

					add_log('admin', 'LOG_INDEX_REMIND', implode(', ', $usernames));
					unset($usernames);
				}
				$db->sql_freeresult($result);
				break;
		}
	}

	switch ($action)
	{
		case 'online':
			if (!$auth->acl_get('a_defaults'))
			{
				trigger_error($user->lang['NO_ADMIN']);
			}

			set_config('record_online_users', 1, true);
			set_config('record_online_date', time(), true);
			add_log('admin', 'LOG_RESET_ONLINE');
			break;

		case 'stats':
			if (!$auth->acl_get('a_defaults'))
			{
				trigger_error($user->lang['NO_ADMIN']);
			}

			$sql = 'SELECT COUNT(post_id) AS stat 
				FROM ' . POSTS_TABLE . '
				WHERE post_approved = 1';
			$result = $db->sql_query($sql);

			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			set_config('num_posts', (int) $row['stat'], true);

			$sql = 'SELECT COUNT(topic_id) AS stat
				FROM ' . TOPICS_TABLE . '
				WHERE topic_approved = 1';
			$result = $db->sql_query($sql);

			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			set_config('num_topics', (int) $row['stat'], true);

			$sql = 'SELECT COUNT(user_id) AS stat
				FROM ' . USERS_TABLE . '
				WHERE user_type IN (' . USER_NORMAL . ',' . USER_FOUNDER . ')';
			$result = $db->sql_query($sql);

			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			set_config('num_users', (int) $row['stat'], true);

			$sql = 'SELECT COUNT(attach_id) as stat
				FROM ' . ATTACHMENTS_TABLE;
			$result = $db->sql_query($sql);

			set_config('num_files', (int) $db->sql_fetchfield('stat', 0, $result), true);
			$db->sql_freeresult($result);

			$sql = 'SELECT SUM(filesize) as stat
				FROM ' . ATTACHMENTS_TABLE;
			$result = $db->sql_query($sql);

			set_config('upload_dir_size', (int) $db->sql_fetchfield('stat', 0, $result), true);
			$db->sql_freeresult($result);

			add_log('admin', 'LOG_RESYNC_STATS');
			break;

		case 'date':
			if (!$auth->acl_get('a_defaults'))
			{
				trigger_error($user->lang['NO_ADMIN']);
			}

			set_config('board_startdate', time() - 1, true);
			add_log('admin', 'LOG_RESET_DATE');
			break;
	}

	// Get forum statistics
	$total_posts = $config['num_posts'];
	$total_topics = $config['num_topics'];
	$total_users = $config['num_users'];
	$total_files = $config['num_files'];

	$start_date = $user->format_date($config['board_startdate']);

	$boarddays = (time() - $config['board_startdate']) / 86400;

	$posts_per_day = sprintf('%.2f', $total_posts / $boarddays);
	$topics_per_day = sprintf('%.2f', $total_topics / $boarddays);
	$users_per_day = sprintf('%.2f', $total_users / $boarddays);
	$files_per_day = sprintf('%.2f', $total_files / $boarddays);

	$upload_dir_size = ($config['upload_dir_size'] >= 1048576) ? sprintf('%.2f ' . $user->lang['MB'], ($config['upload_dir_size'] / 1048576)) : (($config['upload_dir_size'] >= 1024) ? sprintf('%.2f ' . $user->lang['KB'], ($config['upload_dir_size'] / 1024)) : sprintf('%.2f ' . $user->lang['BYTES'], $config['upload_dir_size']));

	$avatar_dir_size = 0;

	if ($avatar_dir = @opendir($phpbb_root_path . $config['avatar_path']))
	{
		while ($file = readdir($avatar_dir))
		{
			if ($file{0} != '.')
			{
				$avatar_dir_size += filesize($phpbb_root_path . $config['avatar_path'] . '/' . $file);
			}
		}
		@closedir($avatar_dir);

		// This bit of code translates the avatar directory size into human readable format
		// Borrowed the code from the PHP.net annoted manual, origanally written by:
		// Jesse (jesse@jess.on.ca)
		$avatar_dir_size = ($avatar_dir_size >= 1048576) ? sprintf('%.2f ' . $user->lang['MB'], ($avatar_dir_size / 1048576)) : (($avatar_dir_size >= 1024) ? sprintf('%.2f ' . $user->lang['KB'], ($avatar_dir_size / 1024)) : sprintf('%.2f ' . $user->lang['BYTES'], $avatar_dir_size));
	}
	else
	{
		// Couldn't open Avatar dir.
		$avatar_dir_size = $user->lang['NOT_AVAILABLE'];
	}

	if ($posts_per_day > $total_posts)
	{
		$posts_per_day = $total_posts;
	}

	if ($topics_per_day > $total_topics)
	{
		$topics_per_day = $total_topics;
	}

	if ($users_per_day > $total_users)
	{
		$users_per_day = $total_users;
	}

	if ($files_per_day > $total_files)
	{
		$files_per_day = $total_files;
	}

	// DB size ... MySQL only
	// This code is heavily influenced by a similar routine
	// in phpMyAdmin 2.2.0
	if (preg_match('#^mysql#', SQL_LAYER))
	{
		$result = $db->sql_query('SELECT VERSION() AS mysql_version');

		if ($row = $db->sql_fetchrow($result))
		{
			$version = $row['mysql_version'];

			if (preg_match('#^(3\.23|4\.)#', $version))
			{
				$db_name = (preg_match('#^(3\.23\.[6-9])|(3\.23\.[1-9][1-9])|(4\.)#', $version)) ? "`$dbname`" : $dbname;

				$sql = "SHOW TABLE STATUS
					FROM " . $db_name;
				$result = $db->sql_query($sql);

				$dbsize = 0;
				while ($row = $db->sql_fetchrow($result))
				{
					if ($row['Type'] != 'MRG_MyISAM')
					{
						if ($table_prefix != '')
						{
							if (strstr($row['Name'], $table_prefix))
							{
								$dbsize += $row['Data_length'] + $row['Index_length'];
							}
						}
						else
						{
							$dbsize += $row['Data_length'] + $row['Index_length'];
						}
					}
				}
			}
			else
			{
				$dbsize = $user->lang['NOT_AVAILABLE'];
			}
		}
		else
		{
			$dbsize = $user->lang['NOT_AVAILABLE'];
		}
	}
	else if (preg_match('#^mssql#', SQL_LAYER))
	{
		$sql = 'SELECT ((SUM(size) * 8.0) * 1024.0) as dbsize
			FROM sysfiles';
		$result = $db->sql_query($sql);

		$dbsize = ($row = $db->sql_fetchrow($result)) ? intval($row['dbsize']) : $user->lang['NOT_AVAILABLE'];
	}
	else
	{
		$dbsize = $user->lang['NOT_AVAILABLE'];
	}

	if (is_int($dbsize))
	{
		$dbsize = ($dbsize >= 1048576) ? sprintf('%.2f ' . $user->lang['MB'], ($dbsize / 1048576)) : (($dbsize >= 1024) ? sprintf('%.2f ' . $user->lang['KB'], ($dbsize / 1024)) : sprintf('%.2f ' . $user->lang['BYTES'], $dbsize));
	}

	adm_page_header($user->lang['ADMIN_INDEX']);

?>

<script language="Javascript" type="text/javascript">
<!--
	function marklist(status)
	{
		for (i = 0; i < document.inactive.length; i++)
		{
			document.inactive.elements[i].checked = status;
		}
	}
//-->
</script>

<h1><?php echo $user->lang['WELCOME_PHPBB']; ?></h1>

<p><?php echo $user->lang['ADMIN_INTRO']; ?></p>

<h1><?php echo $user->lang['FORUM_STATS']; ?></h1>

<form name="statistics" method="post" action="index.<?php echo $phpEx . $SID; ?>&amp;pane=right"><table class="bg" width="100%" cellpadding="4" cellspacing="1" border="0">
	<tr>
		<th width="25%" nowrap="nowrap" height="25"><?php echo $user->lang['STATISTIC']; ?></th>
		<th width="25%"><?php echo $user->lang['VALUE']; ?></th>
		<th width="25%" nowrap="nowrap"><?php echo $user->lang['STATISTIC']; ?></th>
		<th width="25%"><?php echo $user->lang['VALUE']; ?></th>
	</tr>
	<tr>
		<td class="row1" nowrap="nowrap"><?php echo $user->lang['NUMBER_POSTS']; ?>:</td>
		<td class="row2"><b><?php echo $total_posts; ?></b></td>
		<td class="row1" nowrap="nowrap"><?php echo $user->lang['POSTS_PER_DAY']; ?>:</td>
		<td class="row2"><b><?php echo $posts_per_day; ?></b></td>
	</tr>
	<tr>
		<td class="row1" nowrap="nowrap"><?php echo $user->lang['NUMBER_TOPICS']; ?>:</td>
		<td class="row2"><b><?php echo $total_topics; ?></b></td>
		<td class="row1" nowrap="nowrap"><?php echo $user->lang['TOPICS_PER_DAY']; ?>:</td>
		<td class="row2"><b><?php echo $topics_per_day; ?></b></td>
	</tr>
	<tr>
		<td class="row1" nowrap="nowrap"><?php echo $user->lang['NUMBER_USERS']; ?>:</td>
		<td class="row2"><b><?php echo $total_users; ?></b></td>
		<td class="row1" nowrap="nowrap"><?php echo $user->lang['USERS_PER_DAY']; ?>:</td>
		<td class="row2"><b><?php echo $users_per_day; ?></b></td>
	</tr>
	<tr>
		<td class="row1" nowrap="nowrap"><?php echo $user->lang['NUMBER_FILES']; ?>:</td>
		<td class="row2"><b><?php echo $total_files; ?></b></td>
		<td class="row1" nowrap="nowrap"><?php echo $user->lang['FILES_PER_DAY']; ?>:</td>
		<td class="row2"><b><?php echo $files_per_day; ?></b></td>
	</tr>
	<tr>
		<td class="row1" nowrap="nowrap"><?php echo $user->lang['BOARD_STARTED']; ?>:</td>
		<td class="row2"><b><?php echo $start_date; ?></b></td>
		<td class="row1" nowrap="nowrap"><?php echo $user->lang['AVATAR_DIR_SIZE']; ?>:</td>
		<td class="row2"><b><?php echo $avatar_dir_size; ?></b></td>
	</tr>
	<tr>
		<td class="row1" nowrap="nowrap"><?php echo $user->lang['DATABASE_SIZE']; ?>:</td>
		<td class="row2"><b><?php echo $dbsize; ?></b></td>
		<td class="row1" nowrap="nowrap"><?php echo $user->lang['UPLOAD_DIR_SIZE']; ?>:</td>
		<td class="row2"><b><?php echo $upload_dir_size; ?></b></td>
	</tr>
	<tr>
		<td class="row1" nowrap="nowrap"><?php echo $user->lang['GZIP_COMPRESSION']; ?>:</td>
		<td class="row2"><b><?php echo ($config['gzip_compress']) ? $user->lang['ON'] : $user->lang['OFF']; ?></b></td>
		<td class="row1" nowrap="nowrap">&nbsp;</td>
		<td class="row2">&nbsp;</td>
	</tr>
	<tr>
		<td class="cat" colspan="4" align="right"><select name="action"><option value="online"><?php echo $user->lang['RESET_ONLINE']; ?></option><option value="date"><?php echo $user->lang['RESET_DATE']; ?></option><option value="stats"><?php echo $user->lang['RESYNC_STATS']; ?></option></select> <input class="btnlite" type="submit" name="submit" value="<?php echo $user->lang['SUBMIT']; ?>" />&nbsp;</td>
	</tr>
</table></form>

<h1><?php echo $user->lang['ADMIN_LOG']; ?></h1>

<p><?php echo $user->lang['ADMIN_LOG_INDEX_EXPLAIN']; ?></p>

<table class="bg" width="100%" cellpadding="4" cellspacing="1" border="0">
	<tr>
		<th width="15%" height="25" nowrap="nowrap"><?php echo $user->lang['USERNAME']; ?></th>
		<th width="15%"><?php echo $user->lang['IP']; ?></th>
		<th width="20%"><?php echo $user->lang['TIME']; ?></th>
		<th width="45%" nowrap="nowrap"><?php echo $user->lang['ACTION']; ?></th>
	</tr>
<?php

	view_log('admin', $log_data, $log_count, 5);

	$row_class = 'row2';
	for($i = 0; $i < sizeof($log_data); $i++)
	{
		$row_class = ($row_class == 'row1') ? 'row2' : 'row1';

?>
	<tr>
		<td class="<?php echo $row_class; ?>"><?php echo $log_data[$i]['username']; ?></td>
		<td class="<?php echo $row_class; ?>" align="center"><?php echo $log_data[$i]['ip']; ?></td>
		<td class="<?php echo $row_class; ?>" align="center"><?php echo $user->format_date($log_data[$i]['time']); ?></td>
		<td class="<?php echo $row_class; ?>"><?php echo $log_data[$i]['action']; ?></td>
	</tr>
<?php

	}

	if ($auth->acl_get('a_user'))
	{

?>
</table>

<h1><?php echo $user->lang['INACTIVE_USERS']; ?></h1>

<p><?php echo $user->lang['INACTIVE_USERS_EXPLAIN']; ?></p>

<form method="post" name="inactive" action="<?php echo "index.$phpEx$SID&amp;pane=right"; ?>"><table class="bg" width="100%" cellpadding="4" cellspacing="1" border="0">
	<tr>
		<th width="45%" height="25" nowrap="nowrap"><?php echo $user->lang['USERNAME']; ?></th>
		<th width="45%"><?php echo $user->lang['JOINED']; ?></th>
		<th width="5%" nowrap="nowrap"><?php echo $user->lang['MARK']; ?></th>
	</tr>
<?php

		$sql = 'SELECT user_id, username, user_regdate
			FROM ' . USERS_TABLE . ' 
			WHERE user_type = ' . USER_INACTIVE . ' 
			ORDER BY user_regdate ASC';
		$result = $db->sql_query($sql);

		if ($row = $db->sql_fetchrow($result))
		{
			do
			{
				$row_class = ($row_class == 'row1') ? 'row2' : 'row1';

?>
	<tr>
		<td class="<?php echo $row_class; ?>"><a href="<?php echo "admin_users.$phpEx$SID&amp;u=" . $row['user_id']; ?>"><?php echo $row['username']; ?></a></td>
		<td class="<?php echo $row_class; ?>"><?php echo $user->format_date($row['user_regdate']); ?></td>
		<td class="<?php echo $row_class; ?>">&nbsp;<input type="checkbox" name="mark[]" value="<?php echo $row['user_id']; ?>" />&nbsp;</td>
	</tr>
<?php

			}
			while ($row = $db->sql_fetchrow($result));

?>
	<tr>
		<td class="cat" colspan="3" height="28" align="right"><select name="action"><option value="activate"><?php echo $user->lang['ACTIVATE']; ?></option><?php 
			
			if (!empty($config['email_enable']))
			{

?><option value="remind"><?php echo $user->lang['REMIND']; ?></option><?php

			}

?><option value="delete"><?php echo $user->lang['DELETE']; ?></option> <input class="btnlite" type="submit" name="submit" value="<?php echo $user->lang['SUBMIT']; ?>" />&nbsp;</td>
	</tr>
<?php

		}
		else
		{

?>
	<tr>
		<td class="row1" colspan="3" align="center"><?php echo $user->lang['NO_INACTIVE_USERS']; ?></td>
	</tr>
<?php

		}

?>
</table>

<table width="100%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<td align="right" valign="top" nowrap="nowrap"><b><span class="gensmall"><a href="javascript:marklist(true);" class="gensmall"><?php echo $user->lang['MARK_ALL']; ?></a> :: <a href="javascript:marklist(false);" class="gensmall"><?php echo $user->lang['UNMARK_ALL']; ?></a></span></b></td>
	</tr>
</table></form>

<?php

	}

	adm_page_footer();

}
else
{
	//
	// Output the frameset ...
	//
	header("Expires: " . gmdate("D, d M Y H:i:s", time()) . " GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Content-type: text/html; charset=" . $user->lang['ENCODING']);

	$adm_url = "index.$phpEx$SID&amp;pane=right";

	/*
	// Allows non-admin pages to link to admin pages
	// eg: http://forums.foo.com/adm/index.php?sid=&mod=admin_forums&f=1
	if (!empty($_GET['mod']) && preg_match('/admin_([a-z]+)/', $_GET['mod'], $m))
	{
		if (file_exists($phpbb_root_path . 'adm/admin_' . $m[1] . '.' . $phpEx))
		{
			$adm_url = 'admin_' . $m[1] . '.' . $phpEx . $SID;
			$adm_url .= (!empty($_GET['mode'])) ? '&amp;mode=' . htmlspecialchars($_GET['mode']) : '';
			$adm_url .= (!empty($_GET['f'])) ? '&amp;f=' . intval($_GET['f']) : '';
			$adm_url .= (!empty($_GET['u'])) ? '&amp;u=' . intval($_GET['u']) : '';
			$adm_url .= (!empty($_GET['g'])) ? '&amp;g=' . intval($_GET['g']) : '';
		}
	}
	*/
?>
<html>
<head>
<title><?php echo $user->lang['ADMIN_TITLE']; ?></title>
</head>

<frameset rows="60, *" border="0" framespacing="0" frameborder="NO">
	<frame src="<?php echo "index.$phpEx$SID&amp;pane=top"; ?>" name="title" noresize marginwidth="0" marginheight="0" scrolling="NO">
	<frameset cols="155,*" rows="*" border="2" framespacing="0" frameborder="yes">
		<frame src="<?php echo "index.$phpEx$SID&amp;pane=left"; ?>" name="nav" marginwidth="3" marginheight="3" scrolling="yes">
		<frame src="<?php echo $adm_url ?>" name="main" marginwidth="0" marginheight="0" scrolling="auto">
	</frameset>
</frameset>

<noframes>
	<body bgcolor="white" text="#000000">
		<p><?php echo $user->lang['NO_FRAMES']; ?></p>
	</body>
</noframes>
</html>
<?php

	exit;
}

?>