<?php
/***************************************************************************
 *                                install.php
 *                            -------------------
 *   begin                : Tuesday, Sept 11, 2001
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

// Error reporting level and runtime escaping
//error_reporting  (E_ERROR | E_WARNING | E_PARSE);
set_magic_quotes_runtime(0);


// Include essential scripts
$phpbb_root_path = './../';
require($phpbb_root_path . 'extension.inc');
require($phpbb_root_path . 'includes/functions.'.$phpEx);
include($phpbb_root_path . 'includes/session.'.$phpEx);
include($phpbb_root_path . 'includes/acm/acm_file.'.$phpEx);
include($phpbb_root_path . 'includes/functions_admin.'.$phpEx);


// Slash data if necessary
if (!get_magic_quotes_gpc())
{
	$_GET = slash_input_data($_GET);
	$_POST = slash_input_data($_POST);
	$_COOKIE = slash_input_data($_POST);
}


// Instantiate classes for future use
$user = new user();
$auth = new auth();
$cache = new acm();


// Try opening config file
if (@file_exists($phpbb_root_path . 'config.'.$phpEx))
{
	include($phpbb_root_path . 'config.'.$phpEx);

	if (defined('PHPBB_INSTALLED'))
	{
//		redirect("../index.$phpEx");
	}
}


// Obtain various vars
$stage = (isset($_POST['stage'])) ? intval($_POST['stage']) : 0;

// These are all strings so we'll just traverse an array
$var_ary = array('language', 'dbms', 'dbhost', 'dbport', 'dbuser', 'dbpasswd', 'dbname', 'table_prefix', 'admin_name', 'admin_pass1', 'admin_pass2', 'board_email1', 'board_email2', 'server_name', 'server_port', 'script_path', 'ftp_path', 'ftp_user', 'ftp_pass');

foreach ($var_ary as $var)
{
	$$var = (isset($_POST[$var])) ? htmlspecialchars($_POST[$var]) : false;
}


// Set some vars
define('ANONYMOUS', 1);

$error = array();

// Other PHP modules we may find useful
//$php_dlls_other	= array('zlib', 'mbstring', 'ftp');
$php_dlls_other	= array('zlib', 'ftp');

// Supported DB layers including relevant details
$available_dbms = array(
	'firebird'	=> array(
		'LABEL'			=> 'FireBird',
		'SCHEMA'		=> 'firebird',
		'MODULE'		=> 'interbase', 
		'DELIM'			=> ';',
		'DELIM_BASIC'	=> ';',
		'COMMENTS'		=> 'remove_remarks'
	),
	'mysql'		=> array(
		'LABEL'			=> 'MySQL 3.x',
		'SCHEMA'		=> 'mysql',
		'MODULE'		=> 'mysql', 
		'DELIM'			=> ';',
		'DELIM_BASIC'	=> ';',
		'COMMENTS'		=> 'remove_remarks'
	),
	'mysql4'	=> array(
		'LABEL'			=> 'MySQL 4.x',
		'SCHEMA'		=> 'mysql',
		'MODULE'		=> 'mysql', 
		'DELIM'			=> ';',
		'DELIM_BASIC'	=> ';',
		'COMMENTS'		=> 'remove_remarks'
	),
	'mssql'		=> array(
		'LABEL'			=> 'MS SQL Server 7/2000',
		'SCHEMA'		=> 'mssql',
		'MODULE'		=> 'mssql', 
		'DELIM'			=> 'GO',
		'DELIM_BASIC'	=> ';',
		'COMMENTS'		=> 'remove_comments'
	),
	'msaccess' => array(
		'LABEL'			=> 'MS Access [ ODBC ]',
		'SCHEMA'		=> '',
		'MODULE'		=> 'odbc', 
		'DELIM'			=> '',
		'DELIM_BASIC'	=> ';',
		'COMMENTS'		=> ''
	),
	'mssql-odbc'=>	array(
		'LABEL'			=> 'MS SQL Server [ ODBC ]',
		'SCHEMA'		=> 'mssql',
		'MODULE'		=> 'odbc', 
		'DELIM'			=> 'GO',
		'DELIM_BASIC'	=> ';',
		'COMMENTS'		=> 'remove_comments'
	),
	'oracle'	=>	array(
		'LABEL'			=> 'Oracle',
		'SCHEMA'		=> 'oracle',
		'MODULE'		=> 'oracle', 
		'DELIM'			=> '',
		'DELIM_BASIC'	=> ';',
		'COMMENTS'		=> 'remove_comments'
	),
	'postgres' => array(
		'LABEL'			=> 'PostgreSQL 7.x',
		'SCHEMA'		=> 'postgres',
		'MODULE'		=> 'pgsql', 
		'DELIM'			=> ';',
		'DELIM_BASIC'	=> ';',
		'COMMENTS'		=> 'remove_comments'
	),
);

$suffix = ((defined('PHP_OS')) && (preg_match('#win#i', PHP_OS))) ? 'dll' : 'so';


//
// Variables defined ... start program proper
//


// Try and load an appropriate language if required
if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) && !$language)
{
	$accept_lang_ary = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
	foreach ($accept_lang_ary as $accept_lang)
	{
		// Set correct format ... guess full xx_YY form
		$accept_lang = substr($accept_lang, 0, 2) . '_' . strtoupper(substr($accept_lang, 3, 2));
		if (file_exists($phpbb_root_path . 'language/' . $accept_lang))
		{
			$language = $accept_lang;
			break;
		}
		else
		{
			// No match on xx_YY so try xx
			$accept_lang = substr($accept_lang, 0, 2);
			if (file_exists($phpbb_root_path . 'language/' . $accept_lang))
			{
				$language = $accept_lang;
				break;
			}
		}
	}

	// No appropriate language found ... so let's use the first one in the language
	// dir, this may or may not be English
	if (!$language)
	{
		$dir = @opendir($phpbb_root_path . 'language');
		while ($file = readdir($dir))
		{
			$path = $phpbb_root_path . 'language/' . $file;

			if (!is_file($path) && !is_link($path) && file_exists($path . '/iso.txt'))
			{
				$language = $file;
				break;
			}
		}
	}
}

include($phpbb_root_path . 'language/' . $language . '/lang_main.'.$phpEx);
include($phpbb_root_path . 'language/' . $language . '/lang_admin.'.$phpEx);


// Here we do a number of tests and where appropriate reset the installation level
// depending on the outcome of those tests. It's perhaps a little clunky but
// it means we have a fairly clear and logical path through the installation and
// this source ... well, till I go and fill it with fudge ... damn, dribbled
// on my keyboard
if (isset($_POST['retest']))
{
	$stage = 0;
}
else if (isset($_POST['testdb']))
{
	$stage = 1;
}
else if (isset($_POST['install']))
{
	// Check for missing data
	$var_ary = array(
		'admin'		=> array('admin_name', 'admin_pass1', 'admin_pass2', 'board_email1', 'board_email2'),
		'server'	=> array('server_name', 'server_port', 'script_path')
	);

	foreach ($var_ary as $var_type => $var_block)
	{
		foreach ($var_block as $var)
		{
			if (!$$var)
			{
				$error[$var_type][] = 'You must fill out all fields in this block';
				break;
			}
		}
	}

	// Check the entered email address and password
	if ($admin_pass1 != $admin_pass2 && $admin_pass1 != '')
	{
		$error['admin'][] = $lang['INSTALL_PASSWORD_MISMATCH'];
	}

	if ($board_email1 != $board_email2 && $board_email1 != '')
	{
		$error['admin'][] = $lang['INSTALL_EMAIL_MISMATCH'];
	}

	// Test the database connectivity
	if (!@extension_loaded($available_dbms[$dbms]['MODULE']))
	{
		if (!can_load_dll($available_dbms[$dbms]['MODULE']))
		{
			$error['db'][] = 'Cannot load the PHP module for the selected database type';
		}
	}

	// Include the DB layer
	include($phpbb_root_path . 'includes/db/' . $dbms . '.' . $phpEx);

	// Instantiate it and set return on error true
	$db = new sql_db();
	$db->sql_return_on_error(true);

	// Try and connect ...
	if (is_array($db->sql_connect($dbhost, $dbuser, $dbpasswd, $dbname, $dbport, false)))
	{
		$db_error = $db->sql_error();
		$error['db'][] = 'Could not connect to the database, error message returned:' . '<br />' . (($db_error['message']) ? $db_error['message'] : 'No error message given');
	}

	// No errors so lets do the twist
	if (sizeof($error))
	{
		$stage = 1;
	}
}
else if (isset($_POST['dldone']))
{
	// A minor fudge ... we're basically trying to see if the user uploaded
	// their downloaded config file ... it's not worth IMO trying to
	// open it and compare all the data. If a user wants to screw up this
	// simple task ... well ... uhm
	if (filesize($phpbb_root_path . 'config.'.$phpEx) < 10)
	{
		$stage = 3;
	}
}


// Zero stage of installation
//
// Here we basically imform the user of any potential issues such as no database
// support, missing directories, etc. We also give some insight into "missing"
// modules which we'd quite like installed (but which are not essential)
if ($stage == 0)
{
	// Test for DB modules
	$dlls_db = array();
	$passed['db'] = false;
	foreach ($available_dbms as $db_name => $db_ary)
	{
		$dll = $db_ary['MODULE'];

		if (!extension_loaded($dll))
		{
			if (!can_load_dll($dll))
			{
				$dlls_db[$db_name] = '<span style="color:red">' . $lang['UNAVAILABLE'] . '</span>';
				continue;
			}
		}
		$dlls_db[$db_name] = '<span style="color:green">' . $lang['AVAILABLE'] . '</span>';
		$passed['db'] = true;
	}

	// Test for other modules
	$dlls_other = array();
	foreach ($php_dlls_other as $dll)
	{
		if (!extension_loaded($dll))
		{
			if (!can_load_dll($dll))
			{
				$dlls_other[$dll] = '<span style="color:red">' . 'Unavailable' . '</span>';
				continue;
			}
		}
		$dlls_other[$dll] = '<span style="color:green">' . 'Available' . '</span>';
	}

	inst_page_header();

?>

<p><?php echo $lang['INSTALL_ADVICE_EXPLAIN']; ?></p>

<h1><?php echo $lang['PHP_AND_APPS']; ?></h1>

<h2><?php echo $lang['INSTALL_REQUIRED']; ?></h2>

<p><?php echo $lang['INSTALL_REQUIRED_PHP']; ?></p>

<table cellspacing="1" cellpadding="4" border="0"> 
	<tr>
		<td>&bull;&nbsp;<b><?php echo $lang['PHP_VERSION_REQD']; ?>: </b></td>
		<td><?php

	$php_version = phpversion();

	if (version_compare($php_version, '4.1.0') < 0)
	{
		$passed['db'] = false;
		echo '<span style="color:red">' . $lang['NO'] . '</span>';
	}
	else
	{
		// We also give feedback on whether we're running in safe mode
		echo '<span style="color:green">' . $lang['YES'];
		if (@ini_get('safe_mode') || strtolower(@ini_get('safe_mode')) == 'on')
		{
			echo ', ' . $lang['PHP_SAFE_MODE'];
		}
		echo '</span>';
	}

?></td>
	</tr>
	<tr>
		<td rowspan="<?php echo sizeof($dlls_db); ?>" valign="top">&bull;&nbsp;<b><?php echo $lang['PHP_REQD_DB']; ?>: </b></td>
<?php

	$i = 0;
	foreach ($dlls_db as $dll => $available)
	{
		echo ($i++ > 0) ? '<tr>' : '';

?>
		<td><?php echo $lang['DLL_' . strtoupper($dll)]; ?> </td>
		<td><?php echo $available; ?></td>
	</tr>
<?php

	}

?>
</table>

<h2><?php echo $lang['INSTALL_OPTIONAL']; ?></h2>

<p><?php echo $lang['INSTALL_OPTIONAL_PHP']; ?></p>

<table cellspacing="1" cellpadding="4" border="0"> 
	<tr>
<?php

	// Optional modules which may be useful to us
	foreach ($dlls_other as $dll => $yesno)
	{

?>
	<tr>
		<td>&bull;&nbsp;<b><?php echo $lang['DLL_' . strtoupper($dll)]; ?>: </b></td>
		<td><?php echo $yesno; ?></td>
	</tr>
<?php

	}

	$exe = ((defined('PHP_OS')) && (preg_match('#win#i', PHP_OS))) ? '.exe' : '';

	// Imagemagick are you there? Give me a sign or a path ...
	$imagemagick = '';
	if (empty($_ENV['MAGICK_HOME']))
	{
		$locations = array('C:/WINDOWS/', 'C:/WINNT/', 'C:/WINDOWS/SYSTEM/', 'C:/WINNT/SYSTEM/', 'C:/WINDOWS/SYSTEM32/', 'C:/WINNT/SYSTEM32/', '/usr/bin/', '/usr/sbin/', '/usr/local/bin/', '/usr/local/sbin/', '/opt/', '/usr/imagemagick/', '/usr/bin/imagemagick/');

		foreach ($locations as $location)
		{
			if (file_exists($location . 'mogrify' . $exe) && is_executable($location . 'mogrify' . $exe))
			{
				$imagemagick = str_replace('\\', '/', $location);
				continue;
			}
		}
	}
	else
	{
		$imagemagick = str_replace('\\', '/', $_ENV['MAGICK_HOME']);
	}

?>
	<tr>
		<td>&bull;&nbsp;<b><?php echo $lang['APP_MAGICK']; ?>: </b></td>
		<td><?php echo ($imagemagick) ? '<span style="color:green">' . $lang['AVAILABLE'] . ', ' . $imagemagick . '</span>' : '<span style="color:blue">' . $lang['NO_LOCATION'] . '</span>'; ?></td>
	</tr>
</table>

<h1 align="center" <?php echo ($passed['db']) ? 'style="color:green">' . $lang['TESTS_PASSED'] : 'style="color:red">' . $lang['TESTS_FAILED']; ?></h2>

<hr />

<h1>Directory and file setup</h2>

<h2>Required</h2>

<p>In order to function correctly phpBB needs to be able to access or write to certain files or directories. If you see "Does not exist" you need to create the relevant file or directory. If you see "Not writeable" you need to change the permissions on the file or directory to allow phpBB to write to it.</p>

<table cellspacing="1" cellpadding="4" border="0"> 
<?php

	$directories = array('cache/', 'cache/templates/', 'cache/themes/', 'cache/tmp/');

	umask(0);

	$passed['files'] = true;
	foreach ($directories as $dir)
	{
		$write = $exists = true;
		if (file_exists($phpbb_root_path . $dir))
		{
			if (!is_writeable($phpbb_root_path . $dir))
			{
				$write = (@chmod($phpbb_root_path . $dir, 0777)) ? true : false;
			}
		}
		else
		{
			$write = $exists = (@mkdir($phpbb_root_path . $dir, 0777)) ? true : false;
		}

		$passed['files'] = ($exists && $write && $passed['files']) ? true : false;

		$exists = ($exists) ? '<span style="color:green">Exists</span>' : '<span style="color:red">Does not exist</span>';
		$write = ($write) ? ', <span style="color:green">Writeable</span>' : (($exists) ? ', <span style="color:red">Not writeable</span>' : '');

?>
	<tr>
		<td>&bull;&nbsp;<b><?php echo $dir; ?></b></td>
		<td><?php echo $exists . $write; ?></td>
	</tr>
<?php

	}

?>
</table>

<h2>Optional</h2>

<p>These files, directories or permissions are optional. The installation routines will attempt to use various techniques to complete if they do not exist or cannot be written to. However, the presence of these files, directories or permissions will speed installation.</p>

<table cellspacing="1" cellpadding="4" border="0"> 
<?php

	// config.php ... let's just warn the user it's not writeable
	$dir = 'config.'.$phpEx;
	$write = $exists = true;
	if (file_exists($phpbb_root_path . $dir))
	{
		if (!is_writeable($phpbb_root_path . $dir))
		{
			$write = false;
		}
	}
	else
	{
		$write = $exists = false;
	}

	$exists = ($exists) ? '<span style="color:green">Exists</span>' : '<span style="color:red">Does not exist</span>';
	$write = ($write) ? ', <span style="color:green">Writeable</span>' : (($exists) ? ', <span style="color:red">Not writeable</span>' : '');

?>
	<tr>
		<td>&bull;&nbsp;<b><?php echo $dir; ?></b></td>
		<td><?php echo $exists . $write; ?></td>
	</tr>
</table>

<h1 align="center" <?php echo ($passed['files']) ? 'style="color:green">Tests passed' : 'style="color:red">Tests failed'; ?></h2>

<hr />

<h1>Next stage</h1>

<?php

	$next_text = ($passed['db'] && $passed['files']) ? 'All the basic tests have been passed and you may proceed to the next stage of installation. If you have changed any permissions, modules, etc. and wish to re-test you can do so if you wish.' : 'Some tests failed and you should correct these problems before proceeding to the next stage. Failure to do so may result in an incomplete installation.';

?>

<p><?php echo $next_text; ?></p>

<table class="bg" width="80%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<td class="cat" colspan="2" align="center"><input type="hidden" name="stage" value="1" /><input class="liteoption" name="retest" type="submit" value="Test Again" /><?php 
	
	if ($passed['db'] && $passed['files'])
	{

?>&nbsp;&nbsp; <input class="mainoption" name="submit" type="submit" value="Next Stage" /><?php
	
	}
	
?></td>
	</tr>
</table></form>

<div class="copyright" align="center">Powered by phpBB <?php echo $config['version']; ?> &copy; 2003 <a href="http://www.phpbb.com/" target="_phpbb" class="copyright">phpBB Group</a></div>

<br clear="all" />

</body>
</html>
<?php

	exit;

}


// Second stage installation
//
// The basic tests have been passed so now we will proceed with asking
// the user for detailed information on their database, server, etc.
if ($stage == 1)
{
	// If the user has decided to test the connection to their database
	// then give it a go
	if (isset($_POST['testdb']))
	{
		// Let's try and load the required module if need be
		if (!@extension_loaded($available_dbms[$dbms]['MODULE']))
		{
			if (!can_load_dll($available_dbms[$dbms]['MODULE']))
			{
				$error['db'][] = 'Cannot load the PHP module for the selected database type';
			}
		}

		// Include the DB layer
		include_once($phpbb_root_path . 'includes/db/' . $dbms . '.' . $phpEx);

		// Instantiate it and set return on error true
		$db = new sql_db();
		$db->sql_return_on_error(true);

		// Try and connect ...
		if (is_array($db->sql_connect($dbhost, $dbuser, $dbpasswd, $dbname, $dbport, false)))
		{
			$db_error = $db->sql_error();
			$error['db'][] = 'Could not connect to the database, error message returned:' . '<br />' . (($db_error['message']) ? $db_error['message'] : 'No error message given');
		}

		if (!sizeof($error['db']))
		{
			$error['db'][] = 'CONNECTION SUCCESSFULL';
		}
	}


	$available_dbms_temp = array();
	foreach ($available_dbms as $type => $dbms_ary)
	{
		if (!extension_loaded($dbms_ary['MODULE']))
		{
			if (!can_load_dll($dbms_ary['MODULE']))
			{
				continue;
			}
		}

		$available_dbms_temp[$type] = $dbms_ary;
	}

	$available_dbms = &$available_dbms_temp;

	// Here we guess at some server information, however we only
	// do this if no "errors" exist ... if they do then the user
	// has relady set the info and we can bypass it
	if (!sizeof($error))
	{
		if (!empty($_SERVER['SERVER_NAME']) || !empty($_ENV['SERVER_NAME']))
		{
			$server_name = (!empty($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : $_ENV['SERVER_NAME'];
		}
		else if (!empty($_SERVER['HTTP_HOST']) || !empty($_ENV['HTTP_HOST']))
		{
			$server_name = (!empty($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : $_ENV['HTTP_HOST'];
		}
		else
		{
			$server_name = '';
		}

		if (!empty($_SERVER['SERVER_PORT']) || !empty($_ENV['SERVER_PORT']))
		{
			$server_port = (!empty($_SERVER['SERVER_PORT'])) ? $_SERVER['SERVER_PORT'] : $_ENV['SERVER_PORT'];
		}
		else
		{
			$server_port = '80';
		}

		$script_path = preg_replace('#install\/install\.' . $phpEx . '#i', '', $_SERVER['PHP_SELF']);
	}

	// Generate list of available DB's
	$dbms_options = '';
	foreach($available_dbms as $dbms_name => $details)
	{
		$selected = ($dbms_name == $dbms) ? ' selected="selected"' : '';
		$dbms_options .= '<option value="' . $dbms_name . '"' . $selected .'>' . $details['LABEL'] . '</option>';
	}

	$s_hidden_fields = '<input type="hidden" name="stage" value="2" />';

	inst_page_header();

?>
<table class="bg" width="80%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<th colspan="2"><?php echo $lang['ADMIN_CONFIG']; ?></th>
	</tr>
<?php

	if (sizeof($error['admin']))
	{
?>
	<tr>
		<td class="row3" colspan="2" align="center"><span class="gen" style="color:red"><?php echo implode('<br />', $error['admin']); ?></span></td>
	</tr>
<?php

	}
?>
	<tr>
		<td class="row1" width="50%" width="50%"><span class="gen"><?php echo $lang['DEFAULT_LANG']; ?>: </span></td>
		<td class="row2"><select name="lang"><?php echo inst_language_select($language); ?></select></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><span class="gen"><?php echo $lang['ADMIN_USERNAME']; ?>: </span></td>
		<td class="row2"><input class="post" type="text" name="admin_name" value="<?php echo ($admin_name != '') ? $admin_name : ''; ?>" /></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><span class="gen"><?php echo $lang['ADMIN_EMAIL']; ?>: </span></td>
		<td class="row2"><input class="post" type="text" name="board_email1" value="<?php echo ($board_email1 != '') ? $board_email1 : ''; ?>" /></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><span class="gen"><?php echo $lang['ADMIN_EMAIL_CONFIRM']; ?>: </span></td>
		<td class="row2"><input class="post" type="text" name="board_email2" value="<?php echo ($board_email2 != '') ? $board_email2 : ''; ?>" /></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><span class="gen"><?php echo $lang['ADMIN_PASSWORD']; ?>: </span></td>
		<td class="row2"><input class="post" type="password" name="admin_pass1" value="<?php echo ($admin_pass1 != '') ? $admin_pass1 : ''; ?>" /></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><span class="gen"><?php echo $lang['ADMIN_PASSWORD_CONFIRM']; ?>: </span></td>
		<td class="row2"><input class="post" type="password" name="admin_pass2" value="<?php echo ($admin_pass2 != '') ? $admin_pass2 : ''; ?>" /></td>
	</tr>
	<tr>
		<td class="cat" colspan="2">&nbsp;</td>
	</tr>
</table>

<br clear="all" />

<table class="bg" width="80%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<th colspan="2"><?php echo $lang['DB_CONFIG']; ?></th>
	</tr>
<?php

	if (sizeof($error['db']))
	{
?>
	<tr>
		<td class="row3" colspan="2" align="center"><span class="gen" style="color:red"><?php echo implode('<br />', $error['db']); ?></span></td>
	</tr>
<?php

	}
?>
	<tr>
		<td class="row1" width="50%"><b><?php echo $lang['DBMS']; ?>: </b></td>
		<td class="row2"><select name="dbms" onchange="if (document.install_form.upgrade.options[upgrade.selectedIndex].value == 1) { document.install_form.dbms.selectedIndex=0}"><?php echo $dbms_options; ?></select></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><b><?php echo $lang['DB_HOST']; ?>: </b><br /><span class="gensmall"><?php echo $lang['DB_HOST_EXPLAIN']; ?></span></td>
		<td class="row2"><input class="post" type="text" name="dbhost" value="<?php echo ($dbhost != '') ? $dbhost : ''; ?>" /></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><b><?php echo 'Database Server Port' . $lang['DB_PORT']; ?>: </b><br /><span class="gensmall">Leave this blank unless you know the server operates on a non-standard port.</span></td>
		<td class="row2"><input class="post" type="text" name="dbport" value="<?php echo ($dbport != '') ? $dbport : ''; ?>" /></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><b><?php echo $lang['DB_NAME']; ?>: </b></td>
		<td class="row2"><input class="post" type="text" name="dbname" value="<?php echo ($dbname != '') ? $dbname : ''; ?>" /></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><b><?php echo $lang['DB_USERNAME']; ?>: </b></td>
		<td class="row2"><input class="post" type="text" name="dbuser" value="<?php echo ($dbuser != '') ? $dbuser : ''; ?>" /></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><b><?php echo $lang['DB_PASSWORD']; ?>: </b></td>
		<td class="row2"><input class="post" type="password" name="dbpasswd" value="<?php echo ($dbpasswd != '') ? $dbpasswd : ''; ?>" /></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><b><?php echo $lang['TABLE_PREFIX']; ?>: </b></td>
		<td class="row2"><input class="post" type="text" name="table_prefix" value="<?php echo (!empty($table_prefix)) ? $table_prefix : 'phpbb_'; ?>" /></td>
	</tr>
	<tr>
		<td class="cat" colspan="2" align="center"><input class="liteoption" type="submit" name="testdb" value="Test Connection" /></td>
	</tr>
</table>

<br clear="all" />

<table class="bg" width="80%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<th colspan="2">Server Configuration<?php echo $lang['SERVER_CONFIG']; ?></th>
	</tr>
<?php

	if (sizeof($error['server']))
	{
?>
	<tr>
		<td class="row3" colspan="2" align="center"><span class="gen" style="color:red"><?php echo implode('<br />', $error['server']); ?></span></td>
	</tr>
<?php

	}
?>
	<tr>
		<td class="row1" width="50%"><span class="gen"><?php echo $lang['SERVER_NAME']; ?>: </span></td>
		<td class="row2"><input class="post" type="text" name="server_name" value="<?php echo $server_name; ?>" /></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><span class="gen"><?php echo $lang['SERVER_PORT']; ?>: </span></td>
		<td class="row2"><input class="post" type="text" name="server_port" value="<?php echo $server_port; ?>" /></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><span class="gen"><?php echo $lang['SCRIPT_PATH']; ?>: </span></td>
		<td class="row2"><input class="post" type="text" name="script_path" value="<?php echo $script_path; ?>" /></td>
	</tr>
	<tr>
		<td class="cat" colspan="2" align="center"><?php echo $s_hidden_fields; ?><input class="mainoption" name="install" type="submit" value="Start Install" /></td>
	</tr>
</table></form>
<?php

	inst_page_footer();
	exit;
}





// Here we attempt to write out the config file. If we cannot write it directly
// we'll offer the user various options
if ($stage == 2)
{
	// Here we are checking to see one final time which modules
	// we need to load and whether we can load them. This includes
	// modules in addition to that required by the DB layer
	$load_extensions = array();
	$check_exts = array_merge($available_dbms[$dbms]['MODULE'], $php_dlls_other);

	foreach ($check_exts as $dll)
	{
		if (!extension_loaded($dll))
		{
			if (!can_load_dll($dll))
			{
				continue;
			}
			$load_extensions[] = "$dll.$suffix";
		}
	}

	$load_extensions = implode(',', $load_extensions);

	// Define the contents of config.php
	$config_data = "<?php\n";
	$config_data .= "// phpBB 2.x auto-generated config file\n// Do not change anything in this file!\n";
	$config_data .= "\$dbms = '$dbms';\n";
	$config_data .= "\$dbhost = '$dbhost';\n";
	$config_data .= "\$dbport = '$dbport';\n";
	$config_data .= "\$dbname = '$dbname';\n";
	$config_data .= "\$dbuser = '$dbuser';\n";
	$config_data .= "\$dbpasswd = '$dbpasswd';\n\n";
	$config_data .= "\$table_prefix = '$table_prefix';\n";
	$config_data .= "\$acm_type = 'file';\n";
	$config_data .= "\$load_extensions = '$load_extensions';\n\n";
	$config_data .= "define('PHPBB_INSTALLED', true);\n";
	$config_data .= "define('DEBUG', true);\n"; // Comment out when final
	$config_data .= '?' . '>'; // Done this to prevent highlighting editors getting confused!

	// Attempt to write out the config directly ...
	if (filesize($phpbb_root_path . 'config.' . $phpEx) == 0 && is_writeable($phpbb_root_path . 'config.' . $phpEx))
	{
		// Lets jump to the DB setup stage ... if nothing goes wrong below
		$stage = 3;

		if (!($fp = @fopen($phpbb_root_path . 'config.'.$phpEx, 'w')))
		{
			// Something went wrong ... so let's try another method
			$stage = 2;
		}

		if (!(@fwrite($fp, $config_data)))
		{
			// Something went wrong ... so let's try another method
			$stage = 2;
		}

		@fclose($fp);
	}

	// We couldn't write it directly so we'll give the user three alternatives
	if ($stage == 2)
	{
		$ignore_ftp = false;

		// User is trying to upload via FTP ... so let's process it
		if (isset($_POST['sendftp']))
		{
			if (($conn_id = @ftp_connect('localhost')))
			{
				if (@ftp_login($conn_id, $ftp_user, $ftp_pass))
				{
					// Write out a temp file ... if safe mode is on we'll write it to our
					// local cache/tmp directory
					$tmp_path = (!@ini_get('safe_mode')) ? false : $phpbb_root_path . 'cache/tmp';
					$filename = tempnam($tmp_path, uniqid(rand()) . 'cfg');

					$fp = @fopen($filename, 'w');
					@fwrite($fp, $config_data);
					@fclose($fp);

					if (@ftp_chdir($conn_id, $ftp_dir))
					{
						// So far, so good so now we'll try and upload the file. If it
						// works we'll jump to stage 3, else we'll fall back again
						if (@ftp_put($conn_id, 'config.' . $phpEx, $filename, FTP_ASCII))
						{
							$stage = 3;
						}
						else
						{
							// Since we couldn't put the file something is fundamentally wrong, e.g.
							// the file is owned by a different user, etc. We'll give up trying
							// FTP at this point
							$ignore_ftp = true;
						}
					}
					else
					{
						$error['ftp'][] = 'Could not change to the given directory, please check the path.';
					}

					// Remove the temporary file now
					@unlink($filename);
				}
				else
				{
					$error['ftp'][] = 'Could not login to ftp server, check your username and password';
				}
				@ftp_quit($conn_id);
			}
		}
		else if (isset($_POST['dlftp']))
		{
			// The user requested a download, so send the relevant headers
			// and dump out the data
			header("Content-Type: text/x-delimtext; name=\"config.$phpEx\"");
			header("Content-disposition: attachment; filename=config.$phpEx");
			echo $config_data;
			exit;
		}

		// Here we give the users up to three options to complete the setup
		// of config.php, FTP, download and a retry and direct writing
		if ($stage == 2)
		{
			inst_page_header($instruction_text, "install.$phpEx");

?>

<p>Unfortunately phpBB could not write the configuration information directly to your config.php. This may be because the file does not exist or is not writeable. A number of options will be listed below enabling you to complete installation of config.php.</p>

<?php

			$s_hidden_fields = '<input type="hidden" name="stage" value="2" />';
			$s_hidden_fields .= '<input type="hidden" name="dbms" value="' . $dbms . '" />';
			$s_hidden_fields .= '<input type="hidden" name="table_prefix" value="' . $table_prefix . '" />';
			$s_hidden_fields .= '<input type="hidden" name="dbhost" value="' . $dbhost . '" />';
			$s_hidden_fields .= '<input type="hidden" name="dbport" value="' . $dbport . '" />';
			$s_hidden_fields .= '<input type="hidden" name="dbname" value="' . $dbname . '" />';
			$s_hidden_fields .= '<input type="hidden" name="dbuser" value="' . $dbuser . '" />';
			$s_hidden_fields .= '<input type="hidden" name="dbpasswd" value="' . $dbpasswd . '" />';
			$s_hidden_fields .= '<input type="hidden" name="admin_name" value="' . $admin_name . '" />';
			$s_hidden_fields .= '<input type="hidden" name="admin_pass1" value="' . $admin_pass1 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="admin_pass2" value="' . $admin_pass2 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="server_port" value="' . $server_port . '" />';
			$s_hidden_fields .= '<input type="hidden" name="server_name" value="' . $server_name . '" />';
			$s_hidden_fields .= '<input type="hidden" name="script_path" value="' . $script_path . '" />';
			$s_hidden_fields .= '<input type="hidden" name="board_email1" value="' . $board_email1 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="board_email2" value="' . $board_email2 . '" />';
			$s_hidden_fields .= '<input type="hidden" name="language" value="' . $language . '" />';

			// Can we ftp? If we can then let's offer that option on top of download
			// We first see if the relevant extension is loaded and then whether a server is 
			// listening on the ftp port
			if (extension_loaded('ftp') && ($fsock = @fsockopen('localhost', 21, $errno, $errstr, 1)) && !$ignore_ftp)
			{
				@fclose($fsock);

?>

<h1>Transfer config.php by FTP</h1>

<p>phpBB has detected the presence of the ftp module on this server. You may attempt to install your config.php via this if you wish. You will need to supply the information listed below. Remember your username and password are those to your server! (ask your hosting provider for details if you are unsure what these are)</p>

<table class="bg" width="80%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<th colspan="2">&nbsp;</th>
	</tr>
<?php

				if (sizeof($error['ftp']))
				{

?>
	<tr>
		<td class="row3" colspan="2" align="center"><span class="gen" style="color:red"><?php echo implode('<br />', $error['ftp']); ?></span></td>
	</tr>
<?php

				}

?>
	<tr>
		<td class="row1" width="50%"><b><?php echo $lang['FTP_PATH']; ?>: </b><br /><span class="gensmall">This is the path from your root directory to that of phpBB2, e.g. htdocs/phpBB2/</span></td>
		<td class="row2"><input class="post" type="text" name="ftp_dir" size="40" maxlength="255" value="<?php echo $ftp_dir; ?>" /></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><b><?php echo $lang['FTP_USERNAME']; ?>: </b></td>
		<td class="row2"><input class="post" type="text" name="ftp_user" size="40" maxlength="255" value="<?php echo $ftp_user; ?>" ></td>
	</tr>
	<tr>
		<td class="row1" width="50%"><b><?php echo $lang['FTP_PASSWORD']; ?>: </b></td>
		<td class="row2"><input class="post" type="password" name="ftp_pass" size="40" maxlength="255" value="<?php echo $ftp_pass; ?>" ></td>
	</tr>
	<tr>
		<td class="cat" colspan="2" align="center"><input class="mainoption" name="sendftp" type="submit" value="Upload" /></td>
	</tr>
</table>

<br />

<?php

			}

?>

<h1>Download config.php</h1>

<p>You may download the complete config.php to your own PC. You will then need to upload the file manually, replacing any existing config.php in your phpBB 2.2 root directory. Please remember to upload the file in ASCII format (see your FTP application documentation if you are unsure how to achieve this). When you have uploaded the config.php please click "Done" to move to the next stage.</p>

<table class="bg" width="80%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<td class="cat" align="center"><input class="mainoption" name="dlftp" type="submit" value="Download" /> &nbsp;&nbsp; <input class="mainoption" name="dldone" type="submit" value="Done" /></td>
	</tr>
</table>

<br />

<h1>Retry automatic writing of config.php</h1>

<p>If you wish you can change the permissions on config.php to allow phpBB to write to it. Should you wish to do that you can click Retry below to try again. Remember to return the permissions on config.php after phpBB2 has finished installation.</p>

<table class="bg" width="80%" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
		<td class="cat" align="center"><input class="mainoption" name="retry" type="submit" value="Retry" /></td>
	</tr>
</table>

<?php echo $s_hidden_fields; ?></form>

<?php

			inst_page_footer();
			exit;

		}
	}
}


// Everything should now be in place so we'll go ahead with the actual
// setup of the database. Hopefully nothing will go wrong from this
// point on ... it really shouldn""""""ttttttt
if ($stage == 3)
{
	// If we get here and the extension isn't loaded we know that we
	// can go ahead and load it without fear of failure ... probably 
	if (!extension_loaded($available_dbms[$dbms]['MODULE']))
	{
		@dl($available_dbms[$dbms]['MODULE'] . ".$prefix");
	}

	// Load the appropriate database class if not already loaded
	include_once($phpbb_root_path . 'includes/db/' . $dbms . '.' . $phpEx);

	// Instantiate the database
	$db = new sql_db();
	$db->sql_connect($dbhost, $dbuser, $dbpasswd, $dbname, $dbport, false);

	// Load the appropriate schema and basic data
	$dbms_schema = 'schemas/' . $available_dbms[$dbms]['SCHEMA'] . '_schema.sql';
	$dbms_basic = 'schemas/' . $available_dbms[$dbms]['SCHEMA'] . '_basic.sql';

	// How should we treat this schema?
	$remove_remarks = $available_dbms[$dbms]['COMMENTS'];;
	$delimiter = $available_dbms[$dbms]['DELIM'];
	$delimiter_basic = $available_dbms[$dbms]['DELIM_BASIC'];

	// We ship the Access schema complete, we don't need to create tables nor
	// populate it (at this time ... this may change). So we skip this section
	if ($dbms != 'msaccess')
	{
		// NOTE: trigger_error does not work here.
		$db->return_on_error = true;

		$ignore_tables = array();
		// Ok we have the db info go ahead and read in the relevant schema
		// and work on building the table.. probably ought to provide some
		// kind of feedback to the user as we are working here in order
		// to let them know we are actually doing something.
		$sql_query = @fread(@fopen($dbms_schema, 'r'), @filesize($dbms_schema));
		$sql_query = preg_replace('#phpbb_#is', $table_prefix, $sql_query);

		$sql_query = $remove_remarks($sql_query);
		$sql_query = split_sql_file($sql_query, $delimiter);
		$sql_count = count($sql_query);

		foreach ($sql_query as $sql)
		{
			$sql = trim($sql);
			if (!$db->sql_query($sql))
			{
				// TODO
				//
				// This is a fudgy way of dealing with attempts at installing to a DB
				// which already contains the relevant tables. Next thing to do is 
				// to quit back to stage 1 and inform the user that this table extension
				// is already in use
				$ignore_tables[] = preg_replace('#^CREATE TABLE ([a-z_]+?) .*$#is', '\1', $sql);
				$error = $db->sql_error();
				die($error['message']);
			}
		}

		$ignore_tables = str_replace('\\|', '|', preg_quote(implode('|', $ignore_tables), '#'));

		// Ok tables have been built, let's fill in the basic information
		$sql_query = @fread(@fopen($dbms_basic, 'r'), @filesize($dbms_basic));
		$sql_query = preg_replace('#phpbb_#', $table_prefix, $sql_query);

		$sql_query = $remove_remarks($sql_query);
		$sql_query = split_sql_file($sql_query, $delimiter_basic);
		$sql_count = count($sql_query);

		foreach ($sql_query as $sql)
		{
			$sql = trim(str_replace('|', ';', $sql));
			if ($ignore_tables != '' && preg_match('#' . $ignore_tables . '#i', $sql))
			{
				continue;
			}

			if (!$db->sql_query($sql))
			{
				$error = $db->sql_error();
				die($error['message']);
			}
		}
	}

	$current_time = time();

	// Set default config and post data, this applies to all DB's including
	// MS Access
	$sql_ary = array(
		'INSERT INTO ' . $table_prefix . "config (config_name, config_value)
			VALUES ('board_startdate', $current_time)",

		'INSERT INTO ' . $table_prefix . "config (config_name, config_value)
			VALUES ('default_lang', '" . $db->sql_escape($language) . "')",

		'UPDATE ' . $table_prefix . "config
			SET config_value = '" . $db->sql_escape($server_name) . "'
			WHERE config_name = 'server_name'",

		'UPDATE ' . $table_prefix . "config
			SET config_value = '" . $db->sql_escape($server_port) . "'
			WHERE config_name = 'server_port'",

		'UPDATE ' . $table_prefix . "config
			SET config_value = '" . $db->sql_escape($script_path) . "'
			WHERE config_name = 'script_path'",

		'UPDATE ' . $table_prefix . "config
			SET config_value = '" . $db->sql_escape($board_email) . "'
			WHERE config_name = 'board_email'",

		'UPDATE ' . $table_prefix . "config
			SET config_value = '" . $db->sql_escape($server_name) . "'
			WHERE config_name = 'cookie_domain'",

		'UPDATE ' . $table_prefix . "config
			SET config_value = '" . $db->sql_escape($admin_name) . "'
			WHERE config_name = 'newest_username'",

		'UPDATE ' . $table_prefix . "users
			SET username = '" . $db->sql_escape($admin_name) . "', user_password='" . $db->sql_escape(md5($admin_pass1)) . "', user_lang = '" . $db->sql_escape($language) . "', user_email='" . $db->sql_escape($board_email) . "'
			WHERE username = 'Admin'",

		'UPDATE ' . $table_prefix . "moderator_cache
			SET username = '" . $db->sql_escape($admin_name) . "'
			WHERE username = 'Admin'",

		'UPDATE ' . $table_prefix . "forums
			SET forum_last_poster_name = '" . $db->sql_escape($admin_name) . "'
			WHERE forum_last_poster_name = 'Admin'",

		'UPDATE ' . $table_prefix . "topics
			SET topic_first_poster_name = '" . $db->sql_escape($admin_name) . "', topic_last_poster_name = '" . $db->sql_escape($admin_name) . "'
			WHERE topic_first_poster_name = 'Admin'
				OR topic_last_poster_name = 'Admin'",

		'UPDATE ' . $table_prefix . "users
			SET user_regdate = $current_time", 

		'UPDATE ' . $table_prefix . "posts
			SET post_time = $current_time", 

		'UPDATE ' . $table_prefix . "topics
			SET topic_time = $current_time, topic_last_post_time = $current_time", 

		'UPDATE ' . $table_prefix . "forums
			SET forum_last_post_time = $current_time", 

	);

	foreach ($sql_ary as $sql)
	{
		$sql = trim(str_replace('|', ';', $sql));
		if ($ignore_tables != '' && preg_match('#' . $ignore_tables . '#i', $sql))
		{
			continue;
		}

		if (!$db->sql_query($sql))
		{
			$error = $db->sql_error();
			die($error['message']);
		}
	}

	$stage = 4;
}

// Install completed ... log the user in ... we're done
if ($stage == 4)
{
	// Load the basic configuration data
	define('SESSIONS_TABLE', $table_prefix . 'sessions');
	define('USERS_TABLE', $table_prefix . 'users');

	$sql = "SELECT *
		FROM {$table_prefix}config";
	$result = $db->sql_query($sql);

	$config = array();
	while ($row = $db->sql_fetchrow($result))
	{
		$config[$row['config_name']] = $row['config_value'];
	}
	$db->sql_freeresult($result);

	$user->start();
	$auth->login($admin_name, $admin_pass1);

	inst_page_header();

?>

<h1 align="center">Congratulations</h1>

<p>You have now successfully installed phpBB 2.2. Clicking the button below will take you to your Administration Control Panel (ACP). Take some time to examine the options available to you. Remember that help is available online via the Userguide and the phpBB support forums, see the <a href="../docs/README.html" target="_blank">README</a> for further information.</p>

<a href="<?php echo "../adm/index.$phpEx$SID"; ?>"><h2 align="center">Login</h2></a>

<?php

	inst_page_footer();
	exit;

}



// addslashes to vars if magic_quotes_gpc is off this is a security precaution
// to prevent someone trying to break out of a SQL statement.
function slash_input_data(&$data)
{
	if (is_array($data))
	{
		foreach ($data as $k => $v)
		{
			$data[$k] = (is_array($v)) ? slash_input_data($v) : addslashes($v);
		}
	}
	return $data;
}

// Output page -> header
function inst_page_header()
{
	global $phpEx, $lang;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<link rel="stylesheet" href="../adm/subSilver.css" type="text/css">
<style type="text/css">
<!--
th		{ background-image: url('../adm/images/cellpic3.gif') }
td.cat	{ background-image: url('../adm/images/cellpic1.gif') }
//-->
</style>
<title><?php echo $lang['WELCOME_INSTALL']; ?></title>
</head>
<body>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td><img src="../adm/images/header_left.jpg" width="200" height="60" alt="phpBB Logo" title="phpBB Logo" border="0"/></td>
		<td width="100%" background="../adm/images/header_bg.jpg" height="60" align="right" nowrap="nowrap"><span class="maintitle"><?php echo $lang['WELCOME_INSTALL']; ?></span> &nbsp; &nbsp; &nbsp;</td>
	</tr>
</table>

<table width="85%" cellspacing="0" cellpadding="0" border="0" align="center">
	<tr>
		<td><br clear="all" />

<form action="<?php echo "install.$phpEx"; ?>" name="installation" method="post">

<?php

}

// Output page -> footer
function inst_page_footer()
{
	global $lang;

?>

<div class="copyright" align="center">Powered by phpBB <?php echo $config['version']; ?> &copy; 2003 <a href="http://www.phpbb.com/" target="_phpbb" class="copyright">phpBB Group</a></div>

<br clear="all" />

</body>
</html>
<?php

}



function inst_language_select($default = '')
{
	global $phpbb_root_path, $phpEx;

	$dir = @opendir($phpbb_root_path . 'language');
	$user = array();

	while ($file = readdir($dir))
	{
		$path = $phpbb_root_path . 'language/' . $file;

		if (is_file($path) || is_link($path) || $file == '.' || $file == '..')
		{
			continue;
		}

		if (file_exists($path . '/iso.txt'))
		{
			list($displayname) = @file($path . '/iso.txt');
			$lang[$displayname] = $file;
		}
	}
	@closedir($dir);

	@asort($lang);
	@reset($lang);

	foreach ($lang as $displayname => $filename)
	{
		$selected = (strtolower($default) == strtolower($filename)) ? ' selected="selected"' : '';
		$user_select .= '<option value="' . $filename . '"' . $selected . '>' . ucwords($displayname) . '</option>';
	}

	return $user_select;
}

function can_load_dll($dll)
{
	global $suffix;

	return ((@ini_get('enable_dl') || strtolower(@ini_get('enable_dl')) == 'on') && (!@ini_get('safe_mode') || strtolower(@ini_get('safe_mode')) == 'off') && @dl($dll . ".$suffix")) ? true : false;
}

?>