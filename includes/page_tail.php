<?php
/***************************************************************************
 *                              page_tail.php
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

//
// Load/parse the footer template we need based on pagetype.
//
switch($pagetype)
{
	case 'index':
		$template->pparse("footer");
		break;

	case 'viewforum':
		$template->pparse("footer");
		break;

	case 'viewtopic':
		$template->pparse("footer");
		break;

	case 'viewonline':
		$template->pparse("footer");
		break;

}

//
// Show the overall footer.
//
if($userdata['session_logged_in'])
{
	$admin_link = "<a href=\"admin/index.php\">Administration Panel</a>";
}
$current_time = time();
$template->assign_vars(array("PHPBB_VERSION" => "2.0-alpha",
									  "CURRENT_TIME" => create_date($date_format, $current_time, $sys_timezone),
									  "ADMIN_LINK" => $admin_link));

$template->pparse("overall_footer");

//
// Close our DB connection.
//
$db->sql_close();


//
// Output page creation time
//
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$endtime = $mtime;
$totaltime = ($endtime - $starttime);

printf("<center><font size=-2>phpBB Created this page in %f seconds.</font></center>", $totaltime);

exit;

?>
