<?php
/***************************************************************************
 *                             admin_groups.php
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

if (!empty($setmodules) )
{
	if (!$auth->acl_get('a_group') )
	{
		return;
	}

	$module['GROUP']['MANAGE'] = basename(__FILE__) . "$SID&amp;mode=manage";
	$module['GROUP']['PREFERENCES'] = basename(__FILE__) . "$SID&amp;mode=prefs";

	return;
}

define('IN_PHPBB', 1);
// Include files
$phpbb_root_path = '../';
require($phpbb_root_path . 'extension.inc');
require('pagestart.' . $phpEx);

// Do we have general permissions?
if (!$auth->acl_get('a_group') )
{
	trigger_error($user->lang['NO_ADMIN']);
}

// Check and set some common vars
$mode = (isset($_REQUEST['mode'])) ? $_REQUEST['mode'] : '';
if (isset($_POST['addgroup']))
{
	$action = 'addgroup';
}
else if (isset($_POST['delete']))
{
	$action = 'delete';
}
else if (isset($_POST['add']))
{
	$action = 'add';
}
else
{
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
}
$group_id = (isset($_REQUEST['g'])) ? intval($_REQUEST['g']) : '';

$start = (isset($_GET['start']) && $mode == 'member') ? intval($_GET['start']) : 0;
$start_mod = (isset($_GET['start']) && $mode == 'mod') ? intval($_GET['start']) : 0;
$start_pend = (isset($_GET['start']) && $mode == 'pend') ? intval($_GET['start']) : 0;


// Grab basic data for group, if group_id is set since it's used
// in several places below
if (!empty($group_id))
{
	$sql = "SELECT * 
		FROM " . GROUPS_TABLE . " 
		WHERE group_id = $group_id";
	$result = $db->sql_query($sql);

	if (!extract($db->sql_fetchrow($result)))
	{
		trigger_error($user->lang['NO_GROUP']);
	}
	$db->sql_freeresult($result);
}

// Page header
adm_page_header($user->lang['MANAGE']);

// Which page?
switch ($action)
{
	case 'edit':
	case 'addgroup':

		$error = '';

		// Did we submit?
		if (isset($_POST['submit']) || isset($_POST['submitprefs']))
		{
			if (isset($_POST['submit']))
			{
				if ($group_type != GROUP_SPECIAL)
				{
					$group_name = (!empty($_POST['group_name'])) ? htmlspecialchars($_POST['group_name']) : '';
					$group_type = (!empty($_POST['group_type'])) ? intval($_POST['group_type']) : '';
				}
				$group_description = (!empty($_POST['group_description'])) ? htmlspecialchars($_POST['group_description']) : '';
				$group_colour = (!empty($_POST['group_colour'])) ? htmlspecialchars($_POST['group_colour']) : '';
				$group_rank = (isset($_POST['group_rank'])) ? intval($_POST['group_rank']) : '';
				$group_avatar = (!empty($_POST['group_avatar'])) ? htmlspecialchars($_POST['group_avatar']) : '';

				// Check data
				if ($group_name == '' || strlen($group_name) > 40)
				{
					$error .= (($error != '') ? '<br />' : '') . (($group_name == '') ? $user->lang['GROUP_ERR_USERNAME'] : $user->lang['GROUP_ERR_USER_LONG']);
				}
				if (strlen($group_description) > 255)
				{
					$error .= (($error != '') ? '<br />' : '') . $user->lang['GROUP_ERR_DESC_LONG'];
				}
				if ($group_type < GROUP_OPEN || $group_type > GROUP_FREE)
				{
					$error .= (($error != '') ? '<br />' : '') . $user->lang['GROUP_ERR_TYPE'];
				}
			}
			else
			{
				$user_lang = (!empty($_POST['user_lang'])) ? htmlspecialchars($_POST['user_lang']) : '';
				$user_tz = (isset($_POST['user_tz'])) ? doubleval($_POST['user_tz']) : '';
				$user_dst = (isset($_POST['user_dst'])) ? intval($_POST['user_dst']) : '';
			}

			// Update DB
			if (!$error)
			{
				// Update group preferences
				$sql = "UPDATE " . GROUPS_TABLE . " 
					SET group_name = '$group_name', group_description = '$group_description', group_type = $group_type, group_rank = $group_rank, group_colour = '$group_colour' 
					WHERE group_id = $group_id";
				$db->sql_query($sql);

				$user_sql = '';
				$user_sql .= (isset($_POST['submit'])) ? ((($user_sql != '') ? ', ' : '') . "user_colour = '$group_colour'") : '';
				$user_sql .= (isset($_POST['submit']) && $group_rank != -1) ? ((($user_sql != '') ? ', ' : '') . "user_rank = $group_rank") : '';
				$user_sql .= (isset($_POST['submitprefs']) && $user_lang != -1) ? ((($user_sql != '') ? ', ' : '') . "user_lang = '$user_lang'") : '';
				$user_sql .= (isset($_POST['submitprefs']) && $user_tz != -14) ? ((($user_sql != '') ? ', ' : '') . "user_timezone = $user_tz") : '';
				$user_sql .= (isset($_POST['submitprefs']) && $user_dst != -1) ? ((($user_sql != '') ? ', ' : '') . "user_dst = $user_dst") : '';

				// Update group members preferences
				switch (SQL_LAYER)
				{
					case 'mysql':
					case 'mysql4':
						// batchwise? 500 at a time or so maybe? try to reduce memory useage
						$more = true;
						$start = 0;
						do
						{
							$sql = 'SELECT user_id
								FROM ' . USER_GROUP_TABLE . " 
								WHERE group_id = $group_id 
								LIMIT $start, 500";
							$result = $db->sql_query($sql);

							if ($row = $db->sql_fetchrow($result))
							{
								$user_count = 0;
								$user_id_sql = '';
								do
								{
									$user_id_sql .= (($user_id_sql != '') ? ', ' : '') . $row['user_id'];
									$user_count++;
								}
								while ($row = $db->sql_fetchrow($result));

								$sql = 'UPDATE ' . USERS_TABLE . " 
									SET $user_sql 
									WHERE user_id IN ($user_id_sql)";
								$db->sql_query($sql);

								if ($user_count == 500)
								{
									$start += 500;
								}
								else
								{
									$more = false;
								}
							}
							else
							{
								$more = false;
							}
							$db->sql_freeresult($result);
							unset($user_id_sql);
						}
						while ($more);

						break;

					default:
						$sql ='"UPDATE ' . USERS_TABLE . " 
							SET $user_sql 
							WHERE user_id IN (
								SELECT user_id
									FROM " . USER_GROUP_TABLE . " 
									WHERE group_id = $group_id)";
						$db->sql_query($sql);
				}

				trigger_error($user->lang['GROUP_UPDATED']);
			}
		}

?>

<h1><?php echo $user->lang['MANAGE'] . ' : <i>' . $group_name . '</i>'; ?></h1>

<p><?php echo $user->lang['GROUP_EDIT_EXPLAIN']; ?></p>

<?php 

		$sql = 'SELECT * 
			FROM ' . RANKS_TABLE . '
			WHERE rank_special = 1
			ORDER BY rank_title';
		$result = $db->sql_query($sql);

		$rank_options = '<option value="-1"' . ((empty($group_rank)) ? 'selected="selected" ' : '') . '>' . $user->lang['USER_DEFAULT'] . '</option>';
		if ($row = $db->sql_fetchrow($result))
		{
			do
			{
				$selected = (!empty($group_rank) && $row['rank_id'] == $group_rank) ? ' selected="selected"' : '';
				$rank_options .= '<option value="' . $row['rank_id'] . '"' . $selected . '>' . $row['rank_title'] . '</option>';
			}
			while ($row = $db->sql_fetchrow($result));
		}
		$db->sql_freeresult($result);

		$type_open = ($group_type == GROUP_OPEN) ? ' checked="checked"' : '';
		$type_closed = ($group_type == GROUP_CLOSED) ? ' checked="checked"' : '';
		$type_hidden = ($group_type == GROUP_HIDDEN) ? ' checked="checked"' : '';
		$type_free = ($group_type == GROUP_FREE) ? ' checked="checked"' : '';

?>

<script language="javascript" type="text/javascript">
<!--

function swatch()
{
	window.open('./swatch.php?form=settings&amp;name=group_colour', '_swatch', 'HEIGHT=115,resizable=yes,scrollbars=no,WIDTH=636');
	return false;
}

//-->
</script>

<form name="settings" method="post" action="admin_groups.<?php echo "$phpEx$SID&amp;action=$action&amp;g=$group_id"; ?>"><table class="bg" width="90%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<th colspan="2"><?php echo $user->lang['GROUP_DETAILS']; ?></th>
	</tr>
<?php

		if ($error != '')
		{

?>
	<tr>
		<td class="row1" colspan="2" align="center"><span style="color:red"><?php echo $error; ?></span></td>
	</tr>
<?php

		}

?>
	<tr>
		<td class="row2"><b><?php echo $user->lang['GROUP_NAME']; ?>:</b></td>
		<td class="row1"><?php 
	
		if ($group_type != GROUP_SPECIAL)
		{
		
?><input class="post" type="text" name="group_name" value="<?php echo (!empty($group_name)) ? $group_name : ''; ?>" size="40" maxlength="40" /><?php
	
		}
		else
		{
		
?><b><?php echo (!empty($user->lang['G_' . $group_name])) ? $user->lang['G_' . $group_name] : $group_name; ?></b><?php
	
		}
	
?></td>
	</tr>
	<tr>
		<td class="row2"><b><?php echo $user->lang['GROUP_DESC']; ?>:</b></td>
		<td class="row1"><input class="post" type="text" name="group_description" value="<?php echo (!empty($group_description)) ? $group_description : ''; ?>" size="40" maxlength="255" /></td>
	</tr>
<?php

		if ($group_type != GROUP_SPECIAL)
		{

?>
	<tr>
		<td class="row2"><b><?php echo $user->lang['GROUP_TYPE']; ?>:</b><br /><span class="gensmall"><?php echo $user->lang['GROUP_TYPE_EXPLAIN']; ?></span></td>
		<td class="row1" nowrap="nowrap"><input type="radio" name="group_type" value="<?php echo GROUP_FREE . '"' . $type_free; ?> /> <?php echo $user->lang['GROUP_OPEN']; ?> &nbsp; <input type="radio" name="group_type" value="<?php echo GROUP_OPEN . '"' . $type_open; ?> /> <?php echo $user->lang['GROUP_REQUEST']; ?> &nbsp; <input type="radio" name="group_type" value="<?php echo GROUP_CLOSED . '"' . $type_closed; ?> /> <?php echo $user->lang['GROUP_CLOSED']; ?> &nbsp; <input type="radio" name="group_type" value="<?php echo GROUP_HIDDEN . '"' . $type_hidden; ?> /> <?php echo $user->lang['GROUP_HIDDEN']; ?></td>
	</tr>
<?php

		}

?>
	<tr>
		<th colspan="2"><?php echo $user->lang['GROUP_SETTINGS_SAVE']; ?></th>
	</tr>
	<tr>
		<td class="row2"><b><?php echo $user->lang['GROUP_COLOR']; ?>:</b><br /><span class="gensmall"><?php echo sprintf($user->lang['GROUP_COLOR_EXPLAIN'], '<a href="swatch.html" onclick="swatch();return false" target="_swatch">', '</a>'); ?></span></td>
		<td class="row1" nowrap="nowrap"><input class="post" type="text" name="group_colour" value="<?php echo (!empty($group_colour)) ? $group_colour : ''; ?>" size="6" maxlength="6" /></td>
	</tr>
	<tr>
		<td class="row2"><b><?php echo $user->lang['GROUP_RANK']; ?>:</b></td>
		<td class="row1"><select name="group_rank"><?php echo $rank_options; ?></select></td>
	</tr>
	<!-- tr>
		<td class="row2"><b><?php echo $user->lang['GROUP_AVATAR']; ?>:</b><br /><span class="gensmall"><?php echo $user->lang['GROUP_AVATAR_EXPLAIN']; ?></span></td>
		<td class="row1">&nbsp;</td>
	</tr -->
	<tr>
		<td class="cat" colspan="2" align="center"><input class="btnmain" type="submit" name="submit" value="<?php echo $user->lang['SUBMIT']; ?>" /> &nbsp; <input class="btnlite" type="reset" value="<?php echo $user->lang['RESET']; ?>" /></td>
	</tr>
</table></form>
<?php

	case 'delete':

		break;

	case 'add':

		// TODO : 
		// Need to add users to user_group table when adding as moderator (if applicable)

		if (empty($_POST['usernames']))
		{
			trigger_error($user->lang['NO_USERS']);
		}
		$users = explode("\n", $_POST['usernames']);

		$table_sql = ($mode == 'mod' ) ? GROUPS_MODERATOR_TABLE : USER_GROUP_TABLE;

		// Grab the user ids
		$sql = "SELECT user_id 
			FROM " . USERS_TABLE . " 
			WHERE username IN (" . implode(', ', preg_replace('#^[\s]*?(.*?)[\s]*?$#', "'\\1'", $users)) . ")";
		$result = $db->sql_query($sql);

		if (!($row = $db->sql_fetchrow($result)))
		{
			trigger_error($user->lang['NO_USERS']);
		}

		$user_id_ary = array();
		do
		{
			$user_id_ary[] = $row['user_id'];
		}
		while ($row = $db->sql_fetchrow($result));
		$db->sql_freeresult($result);

		// Remove users who are already members of this group
		$sql = "SELECT user_id 
			FROM $table_sql 
			WHERE user_id IN (" . implode(', ', $user_id_ary) . ") 
				AND group_id = $group_id";
		$result = $db->sql_query($sql);

		if ($row = $db->sql_fetchrow($result))
		{
			$old_user_id_ary = array();
			do
			{
				$old_user_id_ary[] = $row['user_id'];
			}
			while ($row = $db->sql_fetchrow($result));

			$user_id_ary = array_diff($user_id_ary, $old_user_id_ary);
		}
		$db->sql_freeresult($result);

		if (!sizeof($user_id_ary))
		{
			trigger_error($user->lang['GROUP_ERR_USERS_EXIST']);
		}

		// Insert the new users 
		switch (SQL_LAYER)
		{
			case 'mysql':
			case 'mysql4':
				$sql = "INSERT INTO $table_sql (user_id, group_id)
					VALUES " . implode(', ', preg_replace('#^([0-9]+)$#', "(\\1, $group_id)",  $user_id_ary));
				$db->sql_query($sql);
				break;

			case 'mssql':
			case 'sqlite':
				$sql = "INSERT INTO $table_sql (user_id, group_id) " . implode(' UNION ALL ', preg_replace('#^([0-9]+)$#', "(\\1, $group_id)",  $user_id_ary));
				$db->sql_query($sql);
				break;

			default:
				foreach ($user_id_ary as $user_id)
				{
					$sql = "INSERT INTO $table_sql (user_id, group_id)
						VALUES ($user_id, $group_id)";
					$db->sql_query($sql);
				}
				break;
		}

		// Update user settings (color, rank) if applicable
		if (!empty($_POST['settings']))
		{
			$sql = "UPDATE " . USERS_TABLE ." 
				SET user_colour = '$group_colour', user_rank = " . intval($group_rank) . "  
				WHERE user_id IN (" . implode(', ', $user_id_ary) . ")";
			$db->sql_query($sql);
		}

//		add_log();

		$message = ($mode == 'mod') ? 'GROUP_MODS_ADDED' : 'GROUP_USERS_ADDED';
		trigger_error($user->lang[$message]);

		break;

	case 'delete':

		// TODO:
		// Need to offer ability to demote moderators or remove from group

		break;

	case 'approve':

		break;

	case 'list':

		$sql = 'SELECT * 
			FROM ' . GROUPS_TABLE . " 
			WHERE group_id = $group_id";
		$result = $db->sql_query($sql);

		if (!extract($db->sql_fetchrow($result)))
		{
			trigger_error($user->lang['NO_GROUP']);
		}
		$db->sql_freeresult($result);

?>

<h1><?php echo $user->lang['GROUP_MEMBERS']; ?></h1>

<p><?php echo $user->lang['GROUP_MEMBERS_EXPLAIN']; ?></p>

<?php

		// Store the id's of moderators so we can skip them for the
		// group member listing
		$group_mod_ary = array();
		if ($group_type != GROUP_SPECIAL)
		{

?>
<h1><?php echo $user->lang['GROUP_MODS']; ?></h1>

<p><?php echo $user->lang['GROUP_MODS_EXPLAIN']; ?></p>

<form name="mod" method="post" action="admin_groups.<?php echo "$phpEx$SID&amp;g=$group_id"; ?>"><table class="bg" width="95%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<th><?php echo $user->lang['USERNAME']; ?></th>
		<th><?php echo $user->lang['JOINED']; ?></th>
		<th><?php echo $user->lang['POSTS']; ?></th>
		<th width="2%"><?php echo $user->lang['MARK']; ?></th>
	</tr>
<?php

			// Group moderators
			$sql = 'SELECT COUNT(user_id) AS total_members 
				FROM ' . GROUPS_MODERATOR_TABLE . " 
				WHERE group_id = $group_id";
			$result = $db->sql_query($sql);

			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			$total_moderators = $row['total_members'];

			$sql = 'SELECT u.user_id, u.username, u.user_regdate, u.user_posts 
				FROM ' . USERS_TABLE . ' u, ' . GROUPS_MODERATOR_TABLE . " gm 
				WHERE gm.group_id = $group_id 
					AND u.user_id = gm.user_id 
				ORDER BY u.username 
				LIMIT $start_mod, " . $config['topics_per_page'];
			$result = $db->sql_query($sql);

			$db->sql_freeresult($result);

			if ($row = $db->sql_fetchrow($result) )
			{
				do
				{
					$row_class = ($row_class == 'row1') ? 'row2' : 'row1';

					$group_mod_ary[] = $row['user_id'];

?>
	<tr>
		<td class="<?php echo $row_class; ?>"><a href="../ucp.<?php echo "$phpEx$SID&amp;mode=viewprofile&amp;u=" . $row['user_id']; ?>" target="_profile"><?php echo $row['username']; ?></a></td>
		<td class="<?php echo $row_class; ?>" align="center"><?php echo $user->format_date($row['user_regdate'], $user->lang['DATE_FORMAT']); ?></td>
		<td class="<?php echo $row_class; ?>" align="center"><?php echo $row['user_posts']; ?></td>
		<td class="<?php echo $row_class; ?>" align="center"><input type="checkbox" name="mark[<?php echo $row['user_id']; ?>]" /></td>
	</tr>
<?php	

				}
				while ($row = $db->sql_fetchrow($result) );

			}
			else
			{

?>
	<tr>
		<td class="row1" colspan="4" align="center"><?php echo $user->lang['GROUPS_NO_MODS']; ?></td>
	</tr>
<?php

			}

?>
	<tr>
		<td class="cat" colspan="4" align="right"><input type="hidden" name="mode" value="mod" /><input class="btnlite" type="submit" name="delete" value="<?php echo $user->lang['DELETE_MARKED']; ?>" /> </td>
	</tr>
</table>

<table width="95%" cellspacing="1" cellpadding="1" border="0" align="center">
	<tr>
		<td valign="top"><?php echo on_page($total_moderators, $config['topics_per_page'], $start_mod); ?></td>
		<td align="right"><b><span class="gensmall"><a href="javascript:marklist('mod', true);" class="gensmall"><?php echo $user->lang['MARK_ALL']; ?></a> :: <a href="javascript:marklist('mod', false);" class="gensmall"><?php echo $user->lang['UNMARK_ALL']; ?></a></span></b>&nbsp;<br /><span class="nav"><?php echo generate_pagination("admin_groups.$phpEx$SID&amp;action=list&amp;mode=mod&amp;g=$group_id", $total_members, $config['topics_per_page'], $start); ?></span></td>
	</tr>
</table>

<br clear="all" />

<table class="bg" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<th><?php echo $user->lang['ADD_USERS']; ?></th>
	</tr>
	<tr>
		<td class="row1" align="center"><textarea name="usernames" cols="40" rows="5"></textarea></td>
	</tr>
	<tr>
		<td class="cat" align="center"><input class="btnmain" type="submit" name="add" value="<?php echo $user->lang['SUBMIT']; ?>" /> &nbsp; <input class="btnlite" type="submit" value="<?php echo $user->lang['FIND_USERNAME']; ?>" onclick="window.open('<?php echo "../memberlist.$phpEx$SID"; ?>&amp;mode=searchuser&amp;form=mod&amp;field=usernames', '_phpbbsearch', 'HEIGHT=500,resizable=yes,scrollbars=yes,WIDTH=740');return false;" /></td>
	</tr>
</table></form>
<?php

		}

		// Existing members
		$sql = 'SELECT COUNT(ug.user_id) AS total_members 
			FROM ' . USER_GROUP_TABLE . " ug  
			WHERE ug.group_id = $group_id";
		$result = $db->sql_query($sql);

		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
		$total_members = $row['total_members'] - $total_moderators;

		$sql = 'SELECT u.user_id, u.username, u.user_regdate, u.user_posts, ug.user_pending 
			FROM ' . USERS_TABLE . ' u, ' . USER_GROUP_TABLE . " ug 
			WHERE ug.group_id = $group_id 
				AND u.user_id = ug.user_id 
				$skip_user_sql
			ORDER BY ug.user_pending DESC, u.username 
			LIMIT $start, " . $config['topics_per_page'];
		$result = $db->sql_query($sql);

		if ($row = $db->sql_fetchrow($result) )
		{
			$pending = $row['user_pending'];

			// TODO
			$user->lang['DATE_FORMAT'] = 'd M Y';

?>
<h1><?php echo $user->lang['GROUP_LIST']; ?></h1>

<p><?php echo $user->lang['GROUP_LIST_EXPLAIN']; ?></p>

<form name="list" method="post" action="<?php echo "admin_groups.$phpEx$SID&amp;mode=$mode&amp;action=$action&amp;g=$group_id"; ?>"><table class="bg" width="95%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<th><?php echo $user->lang['USERNAME']; ?></th>
		<th><?php echo $user->lang['JOINED']; ?></th>
		<th><?php echo $user->lang['POSTS']; ?></th>
		<th width="2%"><?php echo $user->lang['MARK']; ?></th>
	</tr>
<?php

			if ($pending)
			{

?>
	<tr>
		<td class="row3" colspan="4"><b>Pending Members</b></td>
	</tr>
<?php

			}

			do
			{
				if ($row['user_pending'] != $pending)
				{
					$pending = $row['user_pending'];
?>
	<tr>
		<td class="cat" colspan="4" align="right"><input class="btnlite" type="submit" name="approve" value="Approve Marked" /></td>
	</tr>
	<tr>
		<td class="row3" colspan="4"><b>Approved Members</b></td>
	</tr>
<?php
				}
				$row_class = ($row_class == 'row1') ? 'row2' : 'row1';

?>
	<tr>
		<td class="<?php echo $row_class; ?>"><a href="../ucp.<?php echo "$phpEx$SID&amp;mode=viewprofile&amp;u=" . $row['user_id']; ?>" target="_profile"><?php echo $row['username']; ?></a></td>
		<td class="<?php echo $row_class; ?>" align="center"><?php echo $user->format_date($row['user_regdate'], $user->lang['DATE_FORMAT']); ?></td>
		<td class="<?php echo $row_class; ?>" align="center"><?php echo $row['user_posts']; ?></td>
		<td class="<?php echo $row_class; ?>" align="center"><input type="checkbox" name="mark[<?php echo $row['user_id']; ?>]" /></td>
	</tr>
<?php

			}
			while ($row = $db->sql_fetchrow($result));

?>
	<tr>
		<td class="cat" colspan="4" align="right"><input type="hidden" name="mode" value="members" /><input class="btnlite" type="submit" name="delete" value="<?php echo $user->lang['DELETE_MARKED']; ?>" /> </td>
	</tr>
</table>

<table width="95%" cellspacing="1" cellpadding="1" border="0" align="center">
	<tr>
		<td valign="top"><?php echo on_page($total_members, $config['topics_per_page'], $start); ?></td>
		<td align="right"><b><span class="gensmall"><a href="javascript:marklist('list', true);" class="gensmall"><?php echo $user->lang['MARK_ALL']; ?></a> :: <a href="javascript:marklist('list', false);" class="gensmall"><?php echo $user->lang['UNMARK_ALL']; ?></a></span></b>&nbsp;<br /><span class="nav"><?php echo generate_pagination("admin_groups.$phpEx$SID&amp;action=list&amp;mode=member&amp;g=$group_id", $total_members, $config['topics_per_page'], $start); ?></span></td>
	</tr>
</table>

<br clear="all" />

<table class="bg" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<th><?php echo $user->lang['ADD_USERS']; ?></th>
	</tr>
	<tr>
		<td class="row1" align="center"><?php echo $user->lang['USER_GETS_GROUP_SET']; ?> <input type="radio" name="settings" value="1"  checked="checked" /> <?php echo $user->lang['YES']; ?> &nbsp; <input type="radio" name="settings" value="0" /> <?php echo $user->lang['NO']; ?></td>
	</tr>
	<tr>
		<td class="row1" align="center"><textarea name="usernames" cols="40" rows="5"></textarea></td>
	</tr>
	<tr>
		<td class="cat" align="center"><input class="btnmain" type="submit" name="add" value="<?php echo $user->lang['SUBMIT']; ?>" /> &nbsp; <input class="btnlite" type="submit" value="<?php echo $user->lang['FIND_USERNAME']; ?>" onclick="window.open('<?php echo "../memberlist.$phpEx$SID"; ?>&amp;mode=searchuser&amp;form=mod&amp;field=usernames', '_phpbbsearch', 'HEIGHT=500,resizable=yes,scrollbars=yes,WIDTH=740');return false;" /></td>
	</tr>
</table></form>

<?php

		}
		$db->sql_freeresult($result);

		break;










	default:

		switch ($mode)
		{
			case 'prefs':

?>
<h1><?php echo $user->lang['GROUP_SETTINGS']; ?></h1>

<p><?php echo $user->lang['GROUP_SETTINGS_EXPLAIN']; ?></p>

<form method="post" action="admin_groups.<?php echo "$phpEx$SID&amp;action=edit&amp;g=$group_id"; ?>"><table class="bg" width="90%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<th colspan="2"><?php echo $user->lang['GROUP_SETTINGS']; ?></th>
	</tr>
	<tr>
		<td class="row2"><?php echo $user->lang['GROUP_LANG']; ?>:</td>
		<td class="row1"><select name="user_lang"><?php echo '<option value="-1" selected="selected">' . $user->lang['USER_DEFAULT'] . '</option>' . language_select(); ?></select></td>
	</tr>
	<tr>
		<td class="row2"><?php echo $user->lang['GROUP_TIMEZONE']; ?>:</td>
		<td class="row1"><select name="user_tz"><?php echo '<option value="-14" selected="selected">' . $user->lang['USER_DEFAULT'] . '</option>' . tz_select(); ?></select></td>
	</tr>
	<tr>
		<td class="row2"><?php echo $user->lang['GROUP_DST']; ?>:</td>
		<td class="row1" nowrap="nowrap"><input type="radio" name="user_dst" value="0" /> <?php echo $user->lang['DISABLED']; ?> &nbsp; <input type="radio" name="user_dst" value="1" /> <?php echo $user->lang['ENABLED']; ?> &nbsp; <input type="radio" name="user_dst" value="-1" checked="checked" /> <?php echo $user->lang['USER_DEFAULT']; ?></td>
	</tr>
	<tr>
		<td class="cat" colspan="2" align="center"><input class="btnmain" type="submit" name="submitprefs" value="<?php echo $user->lang['SUBMIT']; ?>" /> &nbsp; <input class="btnlite" type="reset" value="<?php echo $user->lang['RESET']; ?>" /></td>
	</tr>
</table></form>

<?php

				break;

			default:
				// Default mangement page

?>

<h1><?php echo $user->lang['MANAGE']; ?></h1>

<p><?php echo $user->lang['GROUP_MANAGE_EXPLAIN']; ?></p>

<h1><?php echo $user->lang['USER_DEF_GROUPS']; ?></h1>

<p><?php echo $user->lang['USER_DEF_GROUPS_EXPLAIN']; ?></p>

<form method="post" action="admin_groups.<?php echo "$phpEx$SID"; ?>"><table class="bg" width="80%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<th width="95%"><?php echo $user->lang['MANAGE']; ?></th>
		<th colspan="2"><?php echo $user->lang['ACTION']; ?></th>
	</tr>
<?php

		$sql = 'SELECT group_id, group_name, group_type 
			FROM ' . GROUPS_TABLE . '
			ORDER BY group_type ASC, group_name';
		$result = $db->sql_query($sql);

		$special_toggle = false;
		while ($row = $db->sql_fetchrow($result) )
		{
			$row_class = ($row_class != 'row1') ? 'row1' : 'row2';

			if ($row['group_type'] == GROUP_SPECIAL && !$special_toggle)
			{
				$special_toggle = true;

?>
	<tr>
		<td class="cat" colspan="3" align="right">Create new group: <input class="post" type="text" name="group_name" maxlength="30" /> <input class="btnmain" type="submit" name="add" value="<?php echo $user->lang['SUBMIT']; ?>" /></td>
	</tr>
</table>

<h1><?php echo $user->lang['SPECIAL_GROUPS']; ?></h1>

<p><?php echo $user->lang['SPECIAL_GROUPS_EXPLAIN']; ?></p>

<table class="bg" width="80%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<th width="95%"><?php echo $user->lang['MANAGE']; ?></th>
		<th><?php echo $user->lang['ACTION']; ?></th>
	</tr>
<?php

			}

			$group_id = $row['group_id'];
			$group_name = (!empty($user->lang['G_' . $row['group_name']]))? $user->lang['G_' . $row['group_name']] : $row['group_name'];

?>
	<tr>
		<td class="<?php echo $row_class; ?>"><a href="admin_groups.<?php echo "$phpEx$SID&amp;action=list&amp;g=$group_id"; ?>"><?php echo $group_name;?></a></td>
		<td class="<?php echo $row_class; ?>" align="center" nowrap="nowrap">&nbsp;<a href="admin_groups.<?php echo "$phpEx$SID&amp;action=edit&amp;g=$group_id"; ?>"><?php echo $user->lang['EDIT']; ?></a>&nbsp;</td>
<?php 

			if (!$special_toggle)
			{

?>
		<td class="<?php echo $row_class; ?>" align="center" nowrap="nowrap">&nbsp;<a href="admin_groups.<?php echo "$phpEx$SID&amp;action=delete&amp;g=$group_id"; ?>"><?php echo $user->lang['DELETE']; ?></a>&nbsp;</td>
<?php
			
			}
			
?>
	</tr>
<?php

			if (is_array($pending[$group_id]) )
			{
				foreach ($pending[$group_id] as $pending_ary )
				{
					$row_class = ($row_class != 'row1') ? 'row1' : 'row2';

?>
	<tr>
		<td class="<?php echo $row_class; ?>"><?php echo $pending_ary['username'];?></td>
		<td class="<?php echo $row_class; ?>" align="center"><input class="btnlite" type="submit" name="approve[<?php echo $pending_ary['user_id']; ?>]" value="<?php echo $user->lang['Approve_selected'];?>" /> &nbsp; <input class="btnlite" type="submit" name="decline[<?php echo $pending_ary['user_id']; ?>]" value="<?php echo $user->lang['Deny_selected'];?>" /></td>
	</tr>
<?php

				}
			}
		}
		$db->sql_freeresult($result);

?>
	<tr>
		<td class="cat" colspan="2">&nbsp;</td>
	</tr>
</table></form>

<?php

		}
		break;

}

?>

<script language="Javascript" type="text/javascript">
<!--
function marklist(match, status)
{
	len = eval('document.' + match + '.length');
	for (i = 0; i < len; i++)
	{
		eval('document.' + match + '.elements[i].checked = ' + status);
	}
}
//-->
</script>

<?php

adm_page_footer();

?>