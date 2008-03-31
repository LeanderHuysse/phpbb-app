<?php
/**
*
* @package install
* @version $Id$
* @copyright (c) 2006 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

$updates_to_version = '3.1.0';

// Return if we "just include it" to find out for which version the database update is responsuble for
if (defined('IN_PHPBB') && defined('IN_INSTALL'))
{
	return;
}

/**
*/
define('IN_PHPBB', true);
define('IN_INSTALL', true);

$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

// Report all errors, except notices
//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);

@set_time_limit(0);

// Include essential scripts
include($phpbb_root_path . 'config.' . $phpEx);

if (!isset($dbms))
{
	die("Please read: <a href='../docs/INSTALL.html'>INSTALL.html</a> before attempting to update.");
}

// Load Extensions
if (!empty($load_extensions))
{
	$load_extensions = explode(',', $load_extensions);

	foreach ($load_extensions as $extension)
	{
		@dl(trim($extension));
	}
}

// Include files
require($phpbb_root_path . 'includes/acm/acm_' . $acm_type . '.' . $phpEx);
require($phpbb_root_path . 'includes/cache.' . $phpEx);
require($phpbb_root_path . 'includes/template.' . $phpEx);
require($phpbb_root_path . 'includes/session.' . $phpEx);
require($phpbb_root_path . 'includes/auth.' . $phpEx);

require($phpbb_root_path . 'includes/functions.' . $phpEx);

if (file_exists($phpbb_root_path . 'includes/functions_content.' . $phpEx))
{
	require($phpbb_root_path . 'includes/functions_content.' . $phpEx);
}

require($phpbb_root_path . 'includes/functions_admin.' . $phpEx);
require($phpbb_root_path . 'includes/constants.' . $phpEx);
require($phpbb_root_path . 'includes/db/' . $dbms . '.' . $phpEx);
require($phpbb_root_path . 'includes/utf/utf_tools.' . $phpEx);

// If we are on PHP >= 6.0.0 we do not need some code
if (version_compare(PHP_VERSION, '6.0.0-dev', '>='))
{
	/**
	* @ignore
	*/
	define('STRIP', false);
}
else
{
	set_magic_quotes_runtime(0);
	define('STRIP', (get_magic_quotes_gpc()) ? true : false);
}

$user = new user();
$cache = new acm();
$db = new $sql_db();

// Add own hook handler, if present. :o
if (file_exists($phpbb_root_path . 'includes/hooks/index.' . $phpEx))
{
	require($phpbb_root_path . 'includes/hooks/index.' . $phpEx);
	$phpbb_hook = new phpbb_hook(array('exit_handler', 'phpbb_user_session_handler', 'append_sid', array('template', 'display')));

	foreach (cache::obtain_hooks() as $hook)
	{
		@include($phpbb_root_path . 'includes/hooks/' . $hook . '.' . $phpEx);
	}
}
else
{
	$phpbb_hook = false;
}

// Connect to DB
$db->sql_connect($dbhost, $dbuser, $dbpasswd, $dbname, $dbport, false, false);

// We do not need this any longer, unset for safety purposes
unset($dbpasswd);

$user->ip = (!empty($_SERVER['REMOTE_ADDR'])) ? htmlspecialchars($_SERVER['REMOTE_ADDR']) : '';

$sql = "SELECT config_value
	FROM " . CONFIG_TABLE . "
	WHERE config_name = 'default_lang'";
$result = $db->sql_query($sql);
$row = $db->sql_fetchrow($result);
$db->sql_freeresult($result);

$language = basename(request_var('language', ''));

if (!$language)
{
	$language = $row['config_value'];
}

if (!file_exists($phpbb_root_path . 'language/' . $language))
{
	die('No language found!');
}

// And finally, load the relevant language files
include($phpbb_root_path . 'language/' . $language . '/common.' . $phpEx);
include($phpbb_root_path . 'language/' . $language . '/acp/common.' . $phpEx);
include($phpbb_root_path . 'language/' . $language . '/install.' . $phpEx);

// Set PHP error handler to ours
//set_error_handler('msg_handler');

// Define some variables for the database update
$inline_update = (request_var('type', 0)) ? true : false;

// Database column types mapping
$dbms_type_map = array(
	'mysql'		=> array(
		'INT:'		=> 'int(%d)',
		'BINT'		=> 'bigint(20)',
		'UINT'		=> 'mediumint(8) UNSIGNED',
		'UINT:'		=> 'int(%d) UNSIGNED',
		'TINT:'		=> 'tinyint(%d)',
		'USINT'		=> 'smallint(4) UNSIGNED',
		'BOOL'		=> 'tinyint(1) UNSIGNED',
		'VCHAR'		=> 'varchar(255)',
		'VCHAR:'	=> 'varchar(%d)',
		'CHAR:'		=> 'char(%d)',
		'XSTEXT'	=> 'text',
		'XSTEXT_UNI'=> 'varchar(100)',
		'STEXT'		=> 'text',
		'STEXT_UNI'	=> 'varchar(255)',
		'TEXT'		=> 'text',
		'TEXT_UNI'	=> 'text',
		'MTEXT'		=> 'mediumtext',
		'MTEXT_UNI'	=> 'mediumtext',
		'TIMESTAMP'	=> 'int(11) UNSIGNED',
		'DECIMAL'	=> 'decimal(5,2)',
		'VCHAR_UNI'	=> 'varchar(255)',
		'VCHAR_UNI:'=> 'varchar(%d)',
		'VCHAR_CI'	=> 'varchar(255)',
		'VARBINARY'	=> 'varbinary(255)',
	),

	'firebird'	=> array(
		'INT:'		=> 'INTEGER',
		'BINT'		=> 'DOUBLE PRECISION',
		'UINT'		=> 'INTEGER',
		'UINT:'		=> 'INTEGER',
		'TINT:'		=> 'INTEGER',
		'USINT'		=> 'INTEGER',
		'BOOL'		=> 'INTEGER',
		'VCHAR'		=> 'VARCHAR(255) CHARACTER SET NONE',
		'VCHAR:'	=> 'VARCHAR(%d) CHARACTER SET NONE',
		'CHAR:'		=> 'CHAR(%d) CHARACTER SET NONE',
		'XSTEXT'	=> 'BLOB SUB_TYPE TEXT CHARACTER SET NONE',
		'STEXT'		=> 'BLOB SUB_TYPE TEXT CHARACTER SET NONE',
		'TEXT'		=> 'BLOB SUB_TYPE TEXT CHARACTER SET NONE',
		'MTEXT'		=> 'BLOB SUB_TYPE TEXT CHARACTER SET NONE',
		'XSTEXT_UNI'=> 'VARCHAR(100) CHARACTER SET UTF8',
		'STEXT_UNI'	=> 'VARCHAR(255) CHARACTER SET UTF8',
		'TEXT_UNI'	=> 'BLOB SUB_TYPE TEXT CHARACTER SET UTF8',
		'MTEXT_UNI'	=> 'BLOB SUB_TYPE TEXT CHARACTER SET UTF8',
		'TIMESTAMP'	=> 'INTEGER',
		'DECIMAL'	=> 'DOUBLE PRECISION',
		'VCHAR_UNI'	=> 'VARCHAR(255) CHARACTER SET UTF8',
		'VCHAR_UNI:'=> 'VARCHAR(%d) CHARACTER SET UTF8',
		'VCHAR_CI'	=> 'VARCHAR(255) CHARACTER SET UTF8',
		'VARBINARY'	=> 'CHAR(255) CHARACTER SET NONE',
	),

	'mssql'		=> array(
		'INT:'		=> '[int]',
		'BINT'		=> '[float]',
		'UINT'		=> '[int]',
		'UINT:'		=> '[int]',
		'TINT:'		=> '[int]',
		'USINT'		=> '[int]',
		'BOOL'		=> '[int]',
		'VCHAR'		=> '[varchar] (255)',
		'VCHAR:'	=> '[varchar] (%d)',
		'CHAR:'		=> '[char] (%d)',
		'XSTEXT'	=> '[varchar] (1000)',
		'STEXT'		=> '[varchar] (3000)',
		'TEXT'		=> '[varchar] (8000)',
		'MTEXT'		=> '[text]',
		'XSTEXT_UNI'=> '[varchar] (100)',
		'STEXT_UNI'	=> '[varchar] (255)',
		'TEXT_UNI'	=> '[varchar] (4000)',
		'MTEXT_UNI'	=> '[text]',
		'TIMESTAMP'	=> '[int]',
		'DECIMAL'	=> '[float]',
		'VCHAR_UNI'	=> '[varchar] (255)',
		'VCHAR_UNI:'=> '[varchar] (%d)',
		'VCHAR_CI'	=> '[varchar] (255)',
		'VARBINARY'	=> '[varchar] (255)',
	),

	'oracle'	=> array(
		'INT:'		=> 'number(%d)',
		'BINT'		=> 'number(20)',
		'UINT'		=> 'number(8)',
		'UINT:'		=> 'number(%d)',
		'TINT:'		=> 'number(%d)',
		'USINT'		=> 'number(4)',
		'BOOL'		=> 'number(1)',
		'VCHAR'		=> 'varchar2(255 char)',
		'VCHAR:'	=> 'varchar2(%d char)',
		'CHAR:'		=> 'char(%d char)',
		'XSTEXT'	=> 'varchar2(1000 char)',
		'STEXT'		=> 'varchar2(3000 char)',
		'TEXT'		=> 'clob',
		'MTEXT'		=> 'clob',
		'XSTEXT_UNI'=> 'varchar2(100 char)',
		'STEXT_UNI'	=> 'varchar2(255 char)',
		'TEXT_UNI'	=> 'clob',
		'MTEXT_UNI'	=> 'clob',
		'TIMESTAMP'	=> 'number(11)',
		'DECIMAL'	=> 'number(5, 2)',
		'DECIMAL:'	=> 'number(%d, 2)',
		'PDECIMAL'	=> 'number(6, 3)',
		'PDECIMAL:'	=> 'number(%d, 3)',
		'VCHAR_UNI'	=> 'varchar2(255 char)',
		'VCHAR_UNI:'=> 'varchar2(%d char)',
		'VCHAR_CI'	=> 'varchar2(255 char)',
		'VARBINARY'	=> 'raw(255)',
	),

	'db2'		=> array(
		'INT:'		=> 'integer',
		'BINT'		=> 'float',
		'UINT'		=> 'integer',
		'UINT:'		=> 'integer',
		'TINT:'		=> 'smallint',
		'USINT'		=> 'smallint',
		'BOOL'		=> 'smallint',
		'VCHAR'		=> 'varchar(255)',
		'VCHAR:'	=> 'varchar(%d)',
		'CHAR:'		=> 'char(%d)',
		'XSTEXT'	=> 'clob(65K)',
		'STEXT'		=> 'varchar(3000)',
		'TEXT'		=> 'clob(65K)',
		'MTEXT'		=> 'clob(16M)',
		'XSTEXT_UNI'=> 'varchar(100)',
		'STEXT_UNI'	=> 'varchar(255)',
		'TEXT_UNI'	=> 'clob(65K)',
		'MTEXT_UNI'	=> 'clob(16M)',
		'TIMESTAMP'	=> 'integer',
		'DECIMAL'	=> 'float',
		'VCHAR_UNI'	=> 'varchar(255)',
		'VCHAR_UNI:'=> 'varchar(%d)',
		'VCHAR_CI'	=> 'varchar(255)',
		'VARBINARY'	=> 'varchar(255)',
	),

	'sqlite'	=> array(
		'INT:'		=> 'int(%d)',
		'BINT'		=> 'bigint(20)',
		'UINT'		=> 'INTEGER UNSIGNED', //'mediumint(8) UNSIGNED',
		'UINT:'		=> 'INTEGER UNSIGNED', // 'int(%d) UNSIGNED',
		'TINT:'		=> 'tinyint(%d)',
		'USINT'		=> 'INTEGER UNSIGNED', //'mediumint(4) UNSIGNED',
		'BOOL'		=> 'INTEGER UNSIGNED', //'tinyint(1) UNSIGNED',
		'VCHAR'		=> 'varchar(255)',
		'VCHAR:'	=> 'varchar(%d)',
		'CHAR:'		=> 'char(%d)',
		'XSTEXT'	=> 'text(65535)',
		'STEXT'		=> 'text(65535)',
		'TEXT'		=> 'text(65535)',
		'MTEXT'		=> 'mediumtext(16777215)',
		'XSTEXT_UNI'=> 'text(65535)',
		'STEXT_UNI'	=> 'text(65535)',
		'TEXT_UNI'	=> 'text(65535)',
		'MTEXT_UNI'	=> 'mediumtext(16777215)',
		'TIMESTAMP'	=> 'INTEGER UNSIGNED', //'int(11) UNSIGNED',
		'DECIMAL'	=> 'decimal(5,2)',
		'VCHAR_UNI'	=> 'varchar(255)',
		'VCHAR_UNI:'=> 'varchar(%d)',
		'VCHAR_CI'	=> 'varchar(255)',
		'VARBINARY'	=> 'blob',
	),

	'postgres'	=> array(
		'INT:'		=> 'INT4',
		'BINT'		=> 'INT8',
		'UINT'		=> 'INT4', // unsigned
		'UINT:'		=> 'INT4', // unsigned
		'USINT'		=> 'INT2', // unsigned
		'BOOL'		=> 'boolean', // unsigned
		'TINT:'		=> 'INT2',
		'VCHAR'		=> 'varchar(255)',
		'VCHAR:'	=> 'varchar(%d)',
		'CHAR:'		=> 'char(%d)',
		'XSTEXT'	=> 'varchar(1000)',
		'STEXT'		=> 'varchar(3000)',
		'TEXT'		=> 'varchar(8000)',
		'MTEXT'		=> 'TEXT',
		'XSTEXT_UNI'=> 'varchar(100)',
		'STEXT_UNI'	=> 'varchar(255)',
		'TEXT_UNI'	=> 'varchar(4000)',
		'MTEXT_UNI'	=> 'TEXT',
		'TIMESTAMP'	=> 'INT4', // unsigned
		'DECIMAL'	=> 'decimal(5,2)',
		'VCHAR_UNI'	=> 'varchar(255)',
		'VCHAR_UNI:'=> 'varchar(%d)',
		'VCHAR_CI'	=> 'varchar(255)',
		'VARBINARY'	=> 'bytea',
	),
);

// A list of types being unsigned for better reference in some db's
$unsigned_types = array('UINT', 'UINT:', 'USINT', 'BOOL', 'TIMESTAMP');

// Only an example, but also commented out
$database_update_info = array(
);

// Determine mapping database type
$map_dbms = $db->dbms_type;

$error_ary = array();
$errored = false;

header('Content-type: text/html; charset=UTF-8');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo $lang['DIRECTION']; ?>" lang="<?php echo $lang['USER_LANG']; ?>" xml:lang="<?php echo $lang['USER_LANG']; ?>">
<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="content-language" content="<?php echo $lang['USER_LANG']; ?>" />
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="imagetoolbar" content="no" />

<title><?php echo $lang['UPDATING_TO_LATEST_STABLE']; ?></title>

<link href="../adm/style/admin.css" rel="stylesheet" type="text/css" media="screen" />

</head>

<body>
<div id="wrap">
	<div id="page-header">&nbsp;</div>

	<div id="page-body">
		<div id="acp">
		<div class="panel">
			<span class="corners-top"><span></span></span>
				<div id="content">
					<div id="main">

	<h1><?php echo $lang['UPDATING_TO_LATEST_STABLE']; ?></h1>

	<br />

	<p><?php echo $lang['DATABASE_TYPE']; ?> :: <strong><?php echo $db->sql_layer; ?></strong><br />
<?php

// To let set_config() calls succeed, we need to make the config array available globally
$config = array();
$sql = 'SELECT *
	FROM ' . CONFIG_TABLE;
$result = $db->sql_query($sql);

while ($row = $db->sql_fetchrow($result))
{
	$config[$row['config_name']] = $row['config_value'];
}
$db->sql_freeresult($result);

echo $lang['PREVIOUS_VERSION'] . ' :: <strong>' . $config['version'] . '</strong><br />';
echo $lang['UPDATED_VERSION'] . ' :: <strong>' . $updates_to_version . '</strong></p>';

$current_version = str_replace('rc', 'RC', strtolower($config['version']));
$latest_version = str_replace('rc', 'RC', strtolower($updates_to_version));
$orig_version = $config['version'];

// If the latest version and the current version are 'unequal', we will update the version_update_from, else we do not update anything.
if ($inline_update)
{
	if ($current_version !== $latest_version)
	{
		set_config('version_update_from', $orig_version);
	}
}
else
{
	// If not called from the update script, we will actually remove the traces
	$db->sql_query('DELETE FROM ' . CONFIG_TABLE . " WHERE config_name = 'version_update_from'");
}

// Checks/Operations that have to be completed prior to starting the update itself
$exit = false;

if ($exit)
{
?>

					</div>
				</div>
			<span class="corners-bottom"><span></span></span>
		</div>
		</div>
	</div>

	<div id="page-footer">
		Powered by <a href="http://www.phpbb.com/">phpBB</a> &copy; 2000, 2002, 2005, 2007 phpBB Group
	</div>
</div>

</body>
</html>

<?php
	if (function_exists('exit_handler'))
	{
		exit_handler();
	}
}

// Schema updates
?>
	<br /><br />

	<h1><?php echo $lang['UPDATE_DATABASE_SCHEMA']; ?></h1>

	<br />
	<p><?php echo $lang['PROGRESS']; ?> :: <strong>

<?php

flush();

// We go through the schema changes from the lowest to the highest version
// We try to also include versions 'in-between'...
$no_updates = true;
$versions = array_keys($database_update_info);
for ($i = 0; $i < sizeof($versions); $i++)
{
	$version = $versions[$i];
	$schema_changes = $database_update_info[$version];

	$next_version = (isset($versions[$i + 1])) ? $versions[$i + 1] : $updates_to_version;

	if (!sizeof($schema_changes))
	{
		continue;
	}

	// If the installed version to be updated to is < than the current version, and if the current version is >= as the version to be updated to next, we will skip the process
	if (version_compare($version, $current_version, '<') && version_compare($current_version, $next_version, '>='))
	{
		continue;
	}

	$no_updates = false;

	// Change columns?
	if (!empty($schema_changes['change_columns']))
	{
		foreach ($schema_changes['change_columns'] as $table => $columns)
		{
			foreach ($columns as $column_name => $column_data)
			{
				sql_column_change($map_dbms, $table, $column_name, $column_data);
			}
		}
	}

	// Add columns?
	if (!empty($schema_changes['add_columns']))
	{
		foreach ($schema_changes['add_columns'] as $table => $columns)
		{
			foreach ($columns as $column_name => $column_data)
			{
				// Only add the column if it does not exist yet
				if (!column_exists($map_dbms, $table, $column_name))
				{
					sql_column_add($map_dbms, $table, $column_name, $column_data);
				}
			}
		}
	}

	// Remove keys?
	if (!empty($schema_changes['drop_keys']))
	{
		foreach ($schema_changes['drop_keys'] as $table => $indexes)
		{
			foreach ($indexes as $index_name)
			{
				sql_index_drop($map_dbms, $index_name, $table);
			}
		}
	}

	// Drop columns?
	if (!empty($schema_changes['drop_columns']))
	{
		foreach ($schema_changes['drop_columns'] as $table => $columns)
		{
			foreach ($columns as $column)
			{
				sql_column_remove($map_dbms, $table, $column);
			}
		}
	}

	// Add primary keys?
	if (!empty($schema_changes['add_primary_keys']))
	{
		foreach ($schema_changes['add_primary_keys'] as $table => $columns)
		{
			sql_create_primary_key($map_dbms, $table, $columns);
		}
	}

	// Add unqiue indexes?
	if (!empty($schema_changes['add_unique_index']))
	{
		foreach ($schema_changes['add_unique_index'] as $table => $index_array)
		{
			foreach ($index_array as $index_name => $column)
			{
				sql_create_unique_index($map_dbms, $index_name, $table, $column);
			}
		}
	}

	// Add indexes?
	if (!empty($schema_changes['add_index']))
	{
		foreach ($schema_changes['add_index'] as $table => $index_array)
		{
			foreach ($index_array as $index_name => $column)
			{
				sql_create_index($map_dbms, $index_name, $table, $column);
			}
		}
	}
}

_write_result($no_updates, $errored, $error_ary);

// Data updates
$error_ary = array();
$errored = $no_updates = false;

?>

<br /><br />
<h1><?php echo $lang['UPDATING_DATA']; ?></h1>
<br />
<p><?php echo $lang['PROGRESS']; ?> :: <strong>

<?php

flush();

$no_updates = true;

$versions = array(
	'3.0.RC2', '3.0.RC3', '3.0.RC4', '3.0.RC5', '3.0.0'
);

// some code magic
for ($i = 0; $i < sizeof($versions); $i++)
{
	$version = $versions[$i];
	$next_version = (isset($versions[$i + 1])) ? $versions[$i + 1] : $updates_to_version;

	// If the installed version to be updated to is < than the current version, and if the current version is >= as the version to be updated to next, we will skip the process
	if (version_compare($version, $current_version, '<') && version_compare($current_version, $next_version, '>='))
	{
		continue;
	}

	$no_updates = false;
	change_database_data($version);
}

_write_result($no_updates, $errored, $error_ary);

$error_ary = array();
$errored = $no_updates = false;

?>

<br /><br />
<h1><?php echo $lang['UPDATE_VERSION_OPTIMIZE']; ?></h1>
<br />
<p><?php echo $lang['PROGRESS']; ?> :: <strong>

<?php

flush();

// update the version
$sql = "UPDATE " . CONFIG_TABLE . "
	SET config_value = '$updates_to_version'
	WHERE config_name = 'version'";
_sql($sql, $errored, $error_ary);

// Reset permissions
$sql = 'UPDATE ' . USERS_TABLE . "
	SET user_permissions = '',
		user_perm_from = 0";
_sql($sql, $errored, $error_ary);

/* Optimize/vacuum analyze the tables where appropriate
// this should be done for each version in future along with
// the version number update
switch ($db->dbms_type)
{
	case 'mysql':
		$sql = 'OPTIMIZE TABLE ' . $table_prefix . 'auth_access, ' . $table_prefix . 'banlist, ' . $table_prefix . 'categories, ' . $table_prefix . 'config, ' . $table_prefix . 'disallow, ' . $table_prefix . 'forum_prune, ' . $table_prefix . 'forums, ' . $table_prefix . 'groups, ' . $table_prefix . 'posts, ' . $table_prefix . 'posts_text, ' . $table_prefix . 'privmsgs, ' . $table_prefix . 'privmsgs_text, ' . $table_prefix . 'ranks, ' . $table_prefix . 'search_results, ' . $table_prefix . 'search_wordlist, ' . $table_prefix . 'search_wordmatch, ' . $table_prefix . 'sessions_keys' . $table_prefix . 'smilies, ' . $table_prefix . 'themes, ' . $table_prefix . 'themes_name, ' . $table_prefix . 'topics, ' . $table_prefix . 'topics_watch, ' . $table_prefix . 'user_group, ' . $table_prefix . 'users, ' . $table_prefix . 'vote_desc, ' . $table_prefix . 'vote_results, ' . $table_prefix . 'vote_voters, ' . $table_prefix . 'words';
		_sql($sql, $errored, $error_ary);
	break;

	case 'postgresql':
		_sql("VACUUM ANALYZE", $errored, $error_ary);
	break;
}
*/

_write_result($no_updates, $errored, $error_ary);

?>

<br />
<h1><?php echo $lang['UPDATE_COMPLETED']; ?></h1>

<br />

<?php

if (!$inline_update)
{
	// Purge the cache...
	$cache->purge();
?>

	<p style="color:red"><?php echo $lang['UPDATE_FILES_NOTICE']; ?></p>

	<p><?php echo $lang['COMPLETE_LOGIN_TO_BOARD']; ?></p>

<?php
}
else
{
?>

	<p><?php echo ((isset($lang['INLINE_UPDATE_SUCCESSFUL'])) ? $lang['INLINE_UPDATE_SUCCESSFUL'] : 'The database update was successful. Now you need to continue the update process.'); ?></p>

	<p><a href="<?php echo append_sid("{$phpbb_root_path}install/index.{$phpEx}", "mode=update&amp;sub=file_check&amp;lang=$language"); ?>" class="button1"><?php echo (isset($lang['CONTINUE_UPDATE_NOW'])) ? $lang['CONTINUE_UPDATE_NOW'] : 'Continue the update process now'; ?></a></p>

<?php
}

// Add database update to log
add_log('admin', 'LOG_UPDATE_DATABASE', $orig_version, $updates_to_version);

// Now we purge the session table as well as all cache files
$cache->purge();

?>

					</div>
				</div>
			<span class="corners-bottom"><span></span></span>
		</div>
		</div>
	</div>
	
	<div id="page-footer">
		Powered by phpBB &copy; 2000, 2002, 2005, 2007 <a href="http://www.phpbb.com/">phpBB Group</a>
	</div>
</div>

</body>
</html>

<?php

garbage_collection();

if (function_exists('exit_handler'))
{
	exit_handler();
}

/**
* Function where all data changes are executed
*/
function change_database_data($version)
{
	global $db, $map_dbms, $errored, $error_ary, $config, $phpbb_root_path;

	switch ($version)
	{
		case '3.0.RC2':

			$smileys = array();

			$sql = 'SELECT smiley_id, code
				FROM ' . SMILIES_TABLE;
			$result = $db->sql_query($sql);

			while ($row = $db->sql_fetchrow($result))
			{
				$smileys[$row['smiley_id']] = $row['code'];
			}
			$db->sql_freeresult($result);
	
			foreach ($smileys as $id => $code)
			{
				// 2.0 only entitized lt and gt; We need to do something about double quotes.
				if (strchr($code, '"') === false)
				{
					continue;
				}

				$new_code = str_replace('&amp;', '&', $code);
				$new_code = str_replace('&lt;', '<', $new_code);
				$new_code = str_replace('&gt;', '>', $new_code);
				$new_code = utf8_htmlspecialchars($new_code);

				$sql = 'UPDATE ' . SMILIES_TABLE . '
					SET code = \'' . $db->sql_escape($new_code) . '\'
					WHERE smiley_id = ' . (int) $id;
				$db->sql_query($sql);
			}

			$index_list = sql_list_index($map_dbms, ACL_ROLES_DATA_TABLE);

			if (in_array('ath_opt_id', $index_list))
			{
				sql_index_drop($map_dbms, 'ath_opt_id', ACL_ROLES_DATA_TABLE);
				sql_create_index($map_dbms, 'ath_op_id', ACL_ROLES_DATA_TABLE, array('auth_option_id'));
			}

		break;

		case '3.0.RC3':

			if ($map_dbms === 'postgres')
			{
				$sql = "SELECT SETVAL('" . FORUMS_TABLE . "_seq',(select case when max(forum_id)>0 then max(forum_id)+1 else 1 end from " . FORUMS_TABLE . '));';
				_sql($sql, $errored, $error_ary);
			}

			// we check for:
			// ath_opt_id
			// ath_op_id
			// ACL_ROLES_DATA_TABLE_ath_opt_id
			// we want ACL_ROLES_DATA_TABLE_ath_op_id

			$table_index_fix = array(
				ACL_ROLES_DATA_TABLE => array(
					'ath_opt_id'							=> 'ath_op_id',
					'ath_op_id'								=> 'ath_op_id',
					ACL_ROLES_DATA_TABLE . '_ath_opt_id'	=> 'ath_op_id'
				),
				STYLES_IMAGESET_DATA_TABLE => array(
					'i_id'									=> 'i_d',
					'i_d'									=> 'i_d',
					STYLES_IMAGESET_DATA_TABLE . '_i_id'	=> 'i_d'
				)
			);

			// we need to create some indicies...
			$needed_creation = array();

			foreach ($table_index_fix as $table_name => $index_info)
			{
				$index_list = sql_list_fake($map_dbms, $table_name);
				foreach ($index_info as $bad_index => $good_index)
				{
					if (in_array($bad_index, $index_list))
					{
						// mysql is actually OK, it won't get a hand in this crud
						switch ($map_dbms)
						{
							// last version, mssql had issues with index removal
							case 'mssql':
								$sql = 'DROP INDEX ' . $table_name . '.' . $bad_index;
								_sql($sql, $errored, $error_ary);
							break;

							// last version, firebird, oracle, postgresql and sqlite all got bad index names
							// we got kinda lucky, tho: they all support the same syntax
							case 'firebird':
							case 'oracle':
							case 'postgres':
							case 'sqlite':
								$sql = 'DROP INDEX ' . $bad_index;
								_sql($sql, $errored, $error_ary);
							break;
						}

						// If the good index already exist we do not need to create it again...
						if (($map_dbms == 'mysql_40' || $map_dbms == 'mysql_41') && $bad_index == $good_index)
						{
						}
						else
						{
							$needed_creation[$table_name][$good_index] = 1;
						}
					}
				}
			}

			$new_index_defs = array('ath_op_id' => array('auth_option_id'), 'i_d' => array('imageset_id'));

			foreach ($needed_creation as $bad_table => $index_repair_list)
			{
				foreach ($index_repair_list as $new_index => $garbage)
				{
					sql_create_index($map_dbms, $new_index, $bad_table, $new_index_defs[$new_index]);
				}
			}

			// Make sure empty smiley codes do not exist
			$sql = 'DELETE FROM ' . SMILIES_TABLE . "
				WHERE code = ''";
			_sql($sql, $errored, $error_ary);

			set_config('allow_birthdays', '1');
			set_config('cron_lock', '0', true);

		break;

		case '3.0.RC4':

			$update_auto_increment = array(
				STYLES_TABLE				=> 'style_id',
				STYLES_TEMPLATE_TABLE		=> 'template_id',
				STYLES_THEME_TABLE			=> 'theme_id',
				STYLES_IMAGESET_TABLE		=> 'imageset_id'
			);

			$sql = 'SELECT *
				FROM ' . STYLES_TABLE . '
				WHERE style_id = 0';
			$result = _sql($sql, $errored, $error_ary);
			$bad_style_row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			if ($bad_style_row)
			{
				$sql = 'SELECT MAX(style_id) as max_id
					FROM ' . STYLES_TABLE;
				$result = _sql($sql, $errored, $error_ary);
				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				$proper_id = $row['max_id'] + 1;

				_sql('UPDATE ' . STYLES_TABLE . " SET style_id = $proper_id WHERE style_id = 0", $errored, $error_ary);
				_sql('UPDATE ' . FORUMS_TABLE . " SET forum_style = $proper_id WHERE forum_style = 0", $errored, $error_ary);
				_sql('UPDATE ' . USERS_TABLE . " SET user_style = $proper_id WHERE user_style = 0", $errored, $error_ary);

				$sql = 'SELECT config_value
					FROM ' . CONFIG_TABLE . "
					WHERE config_name = 'default_style'";
				$result = _sql($sql, $errored, $error_ary);
				$style_config = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				if ($style_config['config_value'] === '0')
				{
					set_config('default_style', (string) $proper_id);
				}
			}

			$sql = 'SELECT *
				FROM ' . STYLES_TEMPLATE_TABLE . '
				WHERE template_id = 0';
			$result = _sql($sql, $errored, $error_ary);
			$bad_style_row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			if ($bad_style_row)
			{
				$sql = 'SELECT MAX(template_id) as max_id
					FROM ' . STYLES_TEMPLATE_TABLE;
				$result = _sql($sql, $errored, $error_ary);
				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				$proper_id = $row['max_id'] + 1;

				_sql('UPDATE ' . STYLES_TABLE . " SET template_id = $proper_id WHERE template_id = 0", $errored, $error_ary);
			}

			$sql = 'SELECT *
				FROM ' . STYLES_THEME_TABLE . '
				WHERE theme_id = 0';
			$result = _sql($sql, $errored, $error_ary);
			$bad_style_row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			if ($bad_style_row)
			{
				$sql = 'SELECT MAX(theme_id) as max_id
					FROM ' . STYLES_THEME_TABLE;
				$result = _sql($sql, $errored, $error_ary);
				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				$proper_id = $row['max_id'] + 1;

				_sql('UPDATE ' . STYLES_TABLE . " SET theme_id = $proper_id WHERE theme_id = 0", $errored, $error_ary);
			}

			$sql = 'SELECT *
				FROM ' . STYLES_IMAGESET_TABLE . '
				WHERE imageset_id = 0';
			$result = _sql($sql, $errored, $error_ary);
			$bad_style_row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			if ($bad_style_row)
			{
				$sql = 'SELECT MAX(imageset_id) as max_id
					FROM ' . STYLES_IMAGESET_TABLE;
				$result = _sql($sql, $errored, $error_ary);
				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				$proper_id = $row['max_id'] + 1;

				_sql('UPDATE ' . STYLES_TABLE . " SET imageset_id = $proper_id WHERE imageset_id = 0", $errored, $error_ary);
				_sql('UPDATE ' . STYLES_IMAGESET_DATA_TABLE . " SET imageset_id = $proper_id WHERE imageset_id = 0", $errored, $error_ary);
			}

			if ($map_dbms == 'mysql_40' || $map_dbms == 'mysql_41')
			{
				foreach ($update_auto_increment as $auto_table_name => $auto_column_name)
				{
					$sql = "SELECT MAX({$auto_column_name}) as max_id
						FROM {$auto_table_name}";
					$result = _sql($sql, $errored, $error_ary);
					$row = $db->sql_fetchrow($result);
					$db->sql_freeresult($result);

					$max_id = ((int) $row['max_id']) + 1;
					_sql("ALTER TABLE {$auto_table_name} AUTO_INCREMENT = {$max_id}", $errored, $error_ary);
				}
			}
			else if ($map_dbms == 'postgres')
			{
				foreach ($update_auto_increment as $auto_table_name => $auto_column_name)
				{
					$sql = "SELECT SETVAL('" . $auto_table_name . "_seq',(select case when max({$auto_column_name})>0 then max({$auto_column_name})+1 else 1 end from " . $auto_table_name . '));';
					_sql($sql, $errored, $error_ary);
				}

				$sql = 'DROP SEQUENCE ' . STYLES_TEMPLATE_DATA_TABLE . '_seq';
				_sql($sql, $errored, $error_ary);
			}
			else if ($map_dbms == 'firebird')
			{
				$sql = 'DROP TRIGGER t_' . STYLES_TEMPLATE_DATA_TABLE;
				_sql($sql, $errored, $error_ary);

				$sql = 'DROP GENERATOR ' . STYLES_TEMPLATE_DATA_TABLE . '_gen';
				_sql($sql, $errored, $error_ary);
			}
			else if ($map_dbms == 'oracle')
			{
				$sql = 'DROP TRIGGER t_' . STYLES_TEMPLATE_DATA_TABLE;
				_sql($sql, $errored, $error_ary);

				$sql = 'DROP SEQUENCE ' . STYLES_TEMPLATE_DATA_TABLE . '_seq';
				_sql($sql, $errored, $error_ary);
			}
			else if ($map_dbms == 'mssql')
			{
				// we use transactions because we need to have a working DB at the end of all of this
				$db->sql_transaction('begin');

				$sql = 'SELECT *
					FROM ' . STYLES_TEMPLATE_DATA_TABLE;
				$result = _sql($sql, $errored, $error_ary);
				$old_style_rows = array();
				while ($row = $db->sql_fetchrow($result))
				{
					$old_style_rows[] = $row;
				}
				$db->sql_freeresult($result);

				// death to the table, it is evil!
				$sql = 'DROP TABLE ' . STYLES_TEMPLATE_DATA_TABLE;
				_sql($sql, $errored, $error_ary);

				// the table of awesomeness, praise be to it (or something)
				$sql = 'CREATE TABLE [' . STYLES_TEMPLATE_DATA_TABLE . "] (
					[template_id] [int] DEFAULT (0) NOT NULL ,
					[template_filename] [varchar] (100) DEFAULT ('') NOT NULL ,
					[template_included] [varchar] (8000) DEFAULT ('') NOT NULL ,
					[template_mtime] [int] DEFAULT (0) NOT NULL ,
					[template_data] [text] DEFAULT ('') NOT NULL
				) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]";
				_sql($sql, $errored, $error_ary);

				// index? index
				$sql = 'CREATE  INDEX [tid] ON [' . STYLES_TEMPLATE_DATA_TABLE . ']([template_id]) ON [PRIMARY]';
				_sql($sql, $errored, $error_ary);

				// yet another index
				$sql = 'CREATE  INDEX [tfn] ON [' . STYLES_TEMPLATE_DATA_TABLE . ']([template_filename]) ON [PRIMARY]';
				_sql($sql, $errored, $error_ary);

				foreach ($old_style_rows as $return_row)
				{
					_sql('INSERT INTO ' . STYLES_TEMPLATE_DATA_TABLE . ' ' . $db->sql_build_array('INSERT', $return_row), $errored, $error_ary);
				}

				$db->sql_transaction('commit');
			}

			// Setting this here again because new installations may not have it...
			set_config('cron_lock', '0', true);
			set_config('ldap_port', '');
			set_config('ldap_user_filter', '');

		break;

		case '3.0.RC5':

			// In case the user is having the bot mediapartner google "as is", adjust it.
			$sql = 'UPDATE ' . BOTS_TABLE . "
				SET bot_agent = '" . $db->sql_escape('Mediapartners-Google') . "'
				WHERE bot_agent = '" . $db->sql_escape('Mediapartners-Google/') . "'";
			_sql($sql, $errored, $error_ary);

			set_config('form_token_lifetime', '7200');
			set_config('form_token_mintime', '0');
			set_config('min_time_reg', '5');
			set_config('min_time_terms', '2');
			set_config('form_token_sid_guests', '1');

			$db->sql_transaction('begin');

			$sql = 'SELECT forum_id, forum_password
					FROM ' . FORUMS_TABLE;
			$result = _sql($sql, $errored, $error_ary);
			
			while ($row = $db->sql_fetchrow($result))
			{
				if (!empty($row['forum_password']))
				{
					_sql('UPDATE ' . FORUMS_TABLE . " SET forum_password = '" . md5($row['forum_password']) . "' WHERE forum_id = {$row['forum_id']}", $errored, $error_ary);
				}
			}
			$db->sql_freeresult($result);
			
			$db->sql_transaction('commit');

		break;

		case '3.0.0':

			$sql = 'UPDATE ' . TOPICS_TABLE . "
				SET topic_last_view_time = topic_last_post_time
				WHERE topic_last_view_time = 0";
			_sql($sql, $errored, $error_ary);
	
			// Update smiley sizes
			$smileys = array('icon_e_surprised.gif', 'icon_eek.gif', 'icon_cool.gif', 'icon_lol.gif', 'icon_mad.gif', 'icon_razz.gif', 'icon_redface.gif', 'icon_cry.gif', 'icon_evil.gif', 'icon_twisted.gif', 'icon_rolleyes.gif', 'icon_exclaim.gif', 'icon_question.gif', 'icon_idea.gif', 'icon_arrow.gif', 'icon_neutral.gif', 'icon_mrgreen.gif', 'icon_e_ugeek.gif');

			foreach ($smileys as $smiley)
			{
				if (file_exists($phpbb_root_path . 'images/smilies/' . $smiley))
				{
					list($width, $height) = getimagesize($phpbb_root_path . 'images/smilies/' . $smiley);
			
					$sql = 'UPDATE ' . SMILIES_TABLE . '
						SET smiley_width = ' . $width . ', smiley_height = ' . $height . "
						WHERE smiley_url = '" . $db->sql_escape($smiley) . "'";
			
					_sql($sql, $errored, $error_ary);
				}
			}
	
			// TODO: remove all form token min times

		break;
	}
}

/**
* Function for triggering an sql statement
*/
function _sql($sql, &$errored, &$error_ary, $echo_dot = true)
{
	global $db;

	if (defined('DEBUG_EXTRA'))
	{
		echo "<br />\n{$sql}\n<br />";
	}

	$db->sql_return_on_error(true);

	$result = $db->sql_query($sql);
	if ($db->sql_error_triggered)
	{
		$errored = true;
		$error_ary['sql'][] = $db->sql_error_sql;
		$error_ary['error_code'][] = $db->_sql_error();
	}

	$db->sql_return_on_error(false);

	if ($echo_dot)
	{
		echo ". \n";
		flush();
	}

	return $result;
}

function _write_result($no_updates, $errored, $error_ary)
{
	global $lang;

	if ($no_updates)
	{
		echo ' ' . $lang['NO_UPDATES_REQUIRED'] . '</strong></p>';
	}
	else
	{
		echo ' <span class="success">' . $lang['DONE'] . '</span></strong><br />' . $lang['RESULT'] . ' :: ';

		if ($errored)
		{
			echo ' <strong>' . $lang['SOME_QUERIES_FAILED'] . '</strong> <ul>';

			for ($i = 0; $i < sizeof($error_ary['sql']); $i++)
			{
				echo '<li>' . $lang['ERROR'] . ' :: <strong>' . htmlspecialchars($error_ary['error_code'][$i]['message']) . '</strong><br />';
				echo $lang['SQL'] . ' :: <strong>' . htmlspecialchars($error_ary['sql'][$i]) . '</strong><br /><br /></li>';
			}

			echo '</ul> <br /><br />' . $lang['SQL_FAILURE_EXPLAIN'] . '</p>';
		}
		else
		{
			echo '<strong>' . $lang['NO_ERRORS'] . '</strong></p>';
		}
	}
}

/**
* Check if a specified column exist
*/
function column_exists($dbms, $table, $column_name)
{
	global $db;

	switch ($dbms)
	{
		case 'mysql':
			$sql = "SHOW COLUMNS
				FROM $table";
			$result = $db->sql_query($sql);
			while ($row = $db->sql_fetchrow($result))
			{
				// lower case just in case
				if (strtolower($row['Field']) == $column_name)
				{
					$db->sql_freeresult($result);
					return true;
				}
			}
			$db->sql_freeresult($result);
			return false;
		break;

		// PostgreSQL has a way of doing this in a much simpler way but would
		// not allow us to support all versions of PostgreSQL
		case 'postgres':
			$sql = "SELECT a.attname
				FROM pg_class c, pg_attribute a
				WHERE c.relname = '{$table}'
					AND a.attnum > 0
					AND a.attrelid = c.oid";
			$result = $db->sql_query($sql);
			while ($row = $db->sql_fetchrow($result))
			{
				// lower case just in case
				if (strtolower($row['attname']) == $column_name)
				{
					$db->sql_freeresult($result);
					return true;
				}
			}
			$db->sql_freeresult($result);
			return false;
		break;

		// same deal with PostgreSQL, we must perform more complex operations than
		// we technically could
		case 'mssql':
			$sql = "SELECT c.name
				FROM syscolumns c
				LEFT JOIN sysobjects o ON c.id = o.id
				WHERE o.name = '{$table}'";
			$result = $db->sql_query($sql);
			while ($row = $db->sql_fetchrow($result))
			{
				// lower case just in case
				if (strtolower($row['name']) == $column_name)
				{
					$db->sql_freeresult($result);
					return true;
				}
			}
			$db->sql_freeresult($result);
			return false;
		break;

		case 'oracle':
			$sql = "SELECT column_name
				FROM user_tab_columns
				WHERE table_name = '{$table}'";
			$result = $db->sql_query($sql);
			while ($row = $db->sql_fetchrow($result))
			{
				// lower case just in case
				if (strtolower($row['column_name']) == $column_name)
				{
					$db->sql_freeresult($result);
					return true;
				}
			}
			$db->sql_freeresult($result);
			return false;
		break;

		case 'firebird':
			$sql = "SELECT RDB\$FIELD_NAME as FNAME
				FROM RDB\$RELATION_FIELDS
				WHERE RDB\$RELATION_NAME = '{$table}'";
			$result = $db->sql_query($sql);
			while ($row = $db->sql_fetchrow($result))
			{
				// lower case just in case
				if (strtolower($row['fname']) == $column_name)
				{
					$db->sql_freeresult($result);
					return true;
				}
			}
			$db->sql_freeresult($result);
			return false;
		break;

		// ugh, SQLite
		case 'sqlite':
			$sql = "SELECT sql
				FROM sqlite_master
				WHERE type = 'table'
					AND name = '{$table}'";
			$result = $db->sql_query($sql);

			if (!$result)
			{
				return false;
			}

			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			preg_match('#\((.*)\)#s', $row['sql'], $matches);

			$cols = trim($matches[1]);
			$col_array = preg_split('/,(?![\s\w]+\))/m', $cols);

			foreach ($col_array as $declaration)
			{
				$entities = preg_split('#\s+#', trim($declaration));
				if ($entities[0] == 'PRIMARY')
				{
					continue;
				}

				if (strtolower($entities[0]) == $column_name)
				{
					return true;
				}
			}
			return false;
		break;
	}
}

/**
* Function to prepare some column information for better usage
*/
function prepare_column_data($dbms, $column_data, $table_name, $column_name)
{
	global $dbms_type_map, $unsigned_types;

	// Get type
	if (strpos($column_data[0], ':') !== false)
	{
		list($orig_column_type, $column_length) = explode(':', $column_data[0]);

		if (!is_array($dbms_type_map[$dbms][$orig_column_type . ':']))
		{
			$column_type = sprintf($dbms_type_map[$dbms][$orig_column_type . ':'], $column_length);
		}
		else
		{
			if (isset($dbms_type_map[$dbms][$orig_column_type . ':']['rule']))
			{
				switch ($dbms_type_map[$dbms][$orig_column_type . ':']['rule'][0])
				{
					case 'div':
						$column_length /= $dbms_type_map[$dbms][$orig_column_type . ':']['rule'][1];
						$column_length = ceil($column_length);
						$column_type = sprintf($dbms_type_map[$dbms][$orig_column_type . ':'][0], $column_length);
					break;
				}
			}

			if (isset($dbms_type_map[$dbms][$orig_column_type . ':']['limit']))
			{
				switch ($dbms_type_map[$dbms][$orig_column_type . ':']['limit'][0])
				{
					case 'mult':
						$column_length *= $dbms_type_map[$dbms][$orig_column_type . ':']['limit'][1];
						if ($column_length > $dbms_type_map[$dbms][$orig_column_type . ':']['limit'][2])
						{
							$column_type = $dbms_type_map[$dbms][$orig_column_type . ':']['limit'][3];
						}
						else
						{
							$column_type = sprintf($dbms_type_map[$dbms][$orig_column_type . ':'][0], $column_length);
						}
					break;
				}
			}
		}
		$orig_column_type .= ':';
	}
	else
	{
		$orig_column_type = $column_data[0];
		$column_type = $dbms_type_map[$dbms][$column_data[0]];
	}

	// Adjust default value if db-dependant specified
	if (is_array($column_data[1]))
	{
		$column_data[1] = (isset($column_data[1][$dbms])) ? $column_data[1][$dbms] : $column_data[1]['default'];
	}

	$sql = '';
	$return_array = array();

	switch ($dbms)
	{
		case 'firebird':
			$sql .= " {$column_type} ";

			if (!is_null($column_data[1]))
			{
				$sql .= 'DEFAULT ' . ((is_numeric($column_data[1])) ? $column_data[1] : "'{$column_data[1]}'") . ' ';
			}

			$sql .= 'NOT NULL';

			// This is a UNICODE column and thus should be given it's fair share
			if (preg_match('/^X?STEXT_UNI|VCHAR_(CI|UNI:?)/', $column_data[0]))
			{
				$sql .= ' COLLATE UNICODE';
			}

		break;

		case 'mssql':
			$sql .= " {$column_type} ";
			$sql_default = " {$column_type} ";

			// For adding columns we need the default definition
			if (!is_null($column_data[1]))
			{
				// For hexadecimal values do not use single quotes
				if (strpos($column_data[1], '0x') === 0)
				{
					$sql_default .= 'DEFAULT (' . $column_data[1] . ') ';
				}
				else
				{
					$sql_default .= 'DEFAULT (' . ((is_numeric($column_data[1])) ? $column_data[1] : "'{$column_data[1]}'") . ') ';
				}
			}

			$sql .= 'NOT NULL';
			$sql_default .= 'NOT NULL';

			$return_array['column_type_sql_default'] = $sql_default;
		break;

		case 'mysql':
			$sql .= " {$column_type} ";

			// For hexadecimal values do not use single quotes
			if (!is_null($column_data[1]) && substr($column_type, -4) !== 'text' && substr($column_type, -4) !== 'blob')
			{
				$sql .= (strpos($column_data[1], '0x') === 0) ? "DEFAULT {$column_data[1]} " : "DEFAULT '{$column_data[1]}' ";
			}
			$sql .= 'NOT NULL';

			if (isset($column_data[2]))
			{
				if ($column_data[2] == 'auto_increment')
				{
					$sql .= ' auto_increment';
				}
				else if ($column_data[2] == 'true_sort')
				{
					$sql .= ' COLLATE utf8_unicode_ci';
				}
			}

		break;

		case 'oracle':
			$sql .= " {$column_type} ";
			$sql .= (!is_null($column_data[1])) ? "DEFAULT '{$column_data[1]}' " : '';

			// In Oracle empty strings ('') are treated as NULL.
			// Therefore in oracle we allow NULL's for all DEFAULT '' entries
			// Oracle does not like setting NOT NULL on a column that is already NOT NULL (this happens only on number fields)
			if (preg_match('/number/i', $column_type))
			{
				$sql .= ($column_data[1] === '') ? '' : 'NOT NULL';
			}
		break;

		case 'postgres':
			$return_array['column_type'] = $column_type;

			$sql .= " {$column_type} ";

			if (isset($column_data[2]) && $column_data[2] == 'auto_increment')
			{
				$default_val = "nextval('{$table_name}_seq')";
			}
			else if (!is_null($column_data[1]))
			{
				$default_val = "'" . $column_data[1] . "'";
				$return_array['null'] = 'NOT NULL';
				$sql .= 'NOT NULL ';
			}

			$return_array['default'] = $default_val;

			$sql .= "DEFAULT {$default_val}";

			// Unsigned? Then add a CHECK contraint
			if (in_array($orig_column_type, $unsigned_types))
			{
				$return_array['constraint'] = "CHECK ({$column_name} >= 0)";
				$sql .= " CHECK ({$column_name} >= 0)";
			}
		break;

		case 'sqlite':
			if (isset($column_data[2]) && $column_data[2] == 'auto_increment')
			{
				$sql .= ' INTEGER PRIMARY KEY';
			}
			else
			{
				$sql .= ' ' . $column_type;
			}

			$sql .= ' NOT NULL ';
			$sql .= (!is_null($column_data[1])) ? "DEFAULT '{$column_data[1]}'" : '';
		break;
	}

	$return_array['column_type_sql'] = $sql;

	return $return_array;
}

/**
* Add new column
*/
function sql_column_add($dbms, $table_name, $column_name, $column_data)
{
	global $errored, $error_ary;

	$column_data = prepare_column_data($dbms, $column_data, $table_name, $column_name);

	switch ($dbms)
	{
		case 'firebird':
			$sql = 'ALTER TABLE "' . $table_name . '" ADD "' . $column_name . '" ' . $column_data['column_type_sql'];
			_sql($sql, $errored, $error_ary);
		break;

		case 'mssql':
			$sql = 'ALTER TABLE [' . $table_name . '] ADD [' . $column_name . '] ' . $column_data['column_type_sql_default'];
			_sql($sql, $errored, $error_ary);
		break;

		case 'mysql':
			$sql = 'ALTER TABLE `' . $table_name . '` ADD COLUMN `' . $column_name . '` ' . $column_data['column_type_sql'];
			_sql($sql, $errored, $error_ary);
		break;

		case 'oracle':
			$sql = 'ALTER TABLE ' . $table_name . ' ADD ' . $column_name . ' ' . $column_data['column_type_sql'];
			_sql($sql, $errored, $error_ary);
		break;

		case 'postgres':
			$sql = 'ALTER TABLE ' . $table_name . ' ADD COLUMN "' . $column_name . '" ' . $column_data['column_type_sql'];
			_sql($sql, $errored, $error_ary);
		break;

		case 'sqlite':
			if (version_compare(sqlite_libversion(), '3.0') == -1)
			{
				global $db;
				$sql = "SELECT sql
					FROM sqlite_master
					WHERE type = 'table'
						AND name = '{$table_name}'
					ORDER BY type DESC, name;";
				$result = $db->sql_query($sql);

				if (!$result)
				{
					break;
				}

				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				$db->sql_transaction('begin');

				// Create a backup table and populate it, destroy the existing one
				$db->sql_query(preg_replace('#CREATE\s+TABLE\s+"?' . $table_name . '"?#i', 'CREATE TEMPORARY TABLE ' . $table_name . '_temp', $row['sql']));
				$db->sql_query('INSERT INTO ' . $table_name . '_temp SELECT * FROM ' . $table_name);
				$db->sql_query('DROP TABLE ' . $table_name);

				preg_match('#\((.*)\)#s', $row['sql'], $matches);

				$new_table_cols = trim($matches[1]);
				$old_table_cols = preg_split('/,(?![\s\w]+\))/m', $new_table_cols);
				$column_list = array();

				foreach ($old_table_cols as $declaration)
				{
					$entities = preg_split('#\s+#', trim($declaration));
					if ($entities[0] == 'PRIMARY')
					{
						continue;
					}
					$column_list[] = $entities[0];
				}

				$columns = implode(',', $column_list);

				$new_table_cols = $column_name . ' ' . $column_data['column_type_sql'] . ',' . $new_table_cols;

				// create a new table and fill it up. destroy the temp one
				$db->sql_query('CREATE TABLE ' . $table_name . ' (' . $new_table_cols . ');');
				$db->sql_query('INSERT INTO ' . $table_name . ' (' . $columns . ') SELECT ' . $columns . ' FROM ' . $table_name . '_temp;');
				$db->sql_query('DROP TABLE ' . $table_name . '_temp');

				$db->sql_transaction('commit');
			}
			else
			{
				$sql = 'ALTER TABLE ' . $table_name . ' ADD ' . $column_name . ' [' . $column_data['column_type_sql'] . ']';
				_sql($sql, $errored, $error_ary);
			}
		break;
	}
}

/**
* Drop column
*/
function sql_column_remove($dbms, $table_name, $column_name)
{
	global $errored, $error_ary;

	switch ($dbms)
	{
		case 'firebird':
			$sql = 'ALTER TABLE "' . $table_name . '" DROP "' . $column_name . '"';
			_sql($sql, $errored, $error_ary);
		break;

		case 'mssql':
			$sql = 'ALTER TABLE [' . $table_name . '] DROP COLUMN [' . $column_name . ']';
			_sql($sql, $errored, $error_ary);
		break;

		case 'mysql':
			$sql = 'ALTER TABLE `' . $table_name . '` DROP COLUMN `' . $column_name . '`';
			_sql($sql, $errored, $error_ary);
		break;

		case 'oracle':
			$sql = 'ALTER TABLE ' . $table_name . ' DROP ' . $column_name;
			_sql($sql, $errored, $error_ary);
		break;

		case 'postgres':
			$sql = 'ALTER TABLE ' . $table_name . ' DROP COLUMN "' . $column_name . '"';
			_sql($sql, $errored, $error_ary);
		break;

		case 'sqlite':
			if (version_compare(sqlite_libversion(), '3.0') == -1)
			{
				global $db;
				$sql = "SELECT sql
					FROM sqlite_master
					WHERE type = 'table'
						AND name = '{$table_name}'
					ORDER BY type DESC, name;";
				$result = $db->sql_query($sql);

				if (!$result)
				{
					break;
				}

				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				$db->sql_transaction('begin');

				// Create a backup table and populate it, destroy the existing one
				$db->sql_query(preg_replace('#CREATE\s+TABLE\s+"?' . $table_name . '"?#i', 'CREATE TEMPORARY TABLE ' . $table_name . '_temp', $row['sql']));
				$db->sql_query('INSERT INTO ' . $table_name . '_temp SELECT * FROM ' . $table_name);
				$db->sql_query('DROP TABLE ' . $table_name);

				preg_match('#\((.*)\)#s', $row['sql'], $matches);

				$new_table_cols = trim($matches[1]);
				$old_table_cols = preg_split('/,(?![\s\w]+\))/m', $new_table_cols);
				$column_list = array();

				foreach ($old_table_cols as $declaration)
				{
					$entities = preg_split('#\s+#', trim($declaration));
					if ($entities[0] == 'PRIMARY' || $entities[0] === $column_name)
					{
						continue;
					}
					$column_list[] = $entities[0];
				}

				$columns = implode(',', $column_list);

				$new_table_cols = $new_table_cols = preg_replace('/' . $column_name . '[^,]+(?:,|$)/m', '', $new_table_cols);

				// create a new table and fill it up. destroy the temp one
				$db->sql_query('CREATE TABLE ' . $table_name . ' (' . $new_table_cols . ');');
				$db->sql_query('INSERT INTO ' . $table_name . ' (' . $columns . ') SELECT ' . $columns . ' FROM ' . $table_name . '_temp;');
				$db->sql_query('DROP TABLE ' . $table_name . '_temp');

				$db->sql_transaction('commit');
			}
			else
			{
				$sql = 'ALTER TABLE ' . $table_name . ' DROP COLUMN ' . $column_name;
				_sql($sql, $errored, $error_ary);
			}
		break;
	}
}

function sql_index_drop($dbms, $index_name, $table_name)
{
	global $dbms_type_map, $db;
	global $errored, $error_ary;

	switch ($dbms)
	{
		case 'mssql':
			$sql = 'DROP INDEX ' . $table_name . '.' . $index_name;
			_sql($sql, $errored, $error_ary);
		break;

		case 'mysql':
			$sql = 'DROP INDEX ' . $index_name . ' ON ' . $table_name;
			_sql($sql, $errored, $error_ary);
		break;

		case 'firebird':
		case 'oracle':
		case 'postgres':
		case 'sqlite':
			$sql = 'DROP INDEX ' . $table_name . '_' . $index_name;
			_sql($sql, $errored, $error_ary);
		break;
	}
}

function sql_create_primary_key($dbms, $table_name, $column)
{
	global $dbms_type_map, $db;
	global $errored, $error_ary;

	switch ($dbms)
	{
		case 'firebird':
		case 'postgres':
			$sql = 'ALTER TABLE ' . $table_name . ' ADD PRIMARY KEY (' . implode(', ', $column) . ')';
			_sql($sql, $errored, $error_ary);
		break;

		case 'mssql':
			$sql = "ALTER TABLE [{$table_name}] WITH NOCHECK ADD ";
			$sql .= "CONSTRAINT [PK_{$table_name}] PRIMARY KEY  CLUSTERED (";
			$sql .= '[' . implode("],\n\t\t[", $column) . ']';
			$sql .= ') ON [PRIMARY]';
			_sql($sql, $errored, $error_ary);
		break;

		case 'mysql':
			$sql = 'ALTER TABLE ' . $table_name . ' ADD PRIMARY KEY (' . implode(', ', $column) . ')';
			_sql($sql, $errored, $error_ary);
		break;

		case 'oracle':
			$sql = 'ALTER TABLE ' . $table_name . 'add CONSTRAINT pk_' . $table_name . ' PRIMARY KEY (' . implode(', ', $column) . ')';
			_sql($sql, $errored, $error_ary);
		break;

		case 'sqlite':
			$sql = "SELECT sql
				FROM sqlite_master
				WHERE type = 'table'
					AND name = '{$table_name}'
				ORDER BY type DESC, name;";
			$result = _sql($sql, $errored, $error_ary);

			if (!$result)
			{
				break;
			}

			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			$db->sql_transaction('begin');

			// Create a backup table and populate it, destroy the existing one
			$db->sql_query(preg_replace('#CREATE\s+TABLE\s+"?' . $table_name . '"?#i', 'CREATE TEMPORARY TABLE ' . $table_name . '_temp', $row['sql']));
			$db->sql_query('INSERT INTO ' . $table_name . '_temp SELECT * FROM ' . $table_name);
			$db->sql_query('DROP TABLE ' . $table_name);

			preg_match('#\((.*)\)#s', $row['sql'], $matches);

			$new_table_cols = trim($matches[1]);
			$old_table_cols = preg_split('/,(?![\s\w]+\))/m', $new_table_cols);
			$column_list = array();

			foreach ($old_table_cols as $declaration)
			{
				$entities = preg_split('#\s+#', trim($declaration));
				if ($entities[0] == 'PRIMARY')
				{
					continue;
				}
				$column_list[] = $entities[0];
			}

			$columns = implode(',', $column_list);

			// create a new table and fill it up. destroy the temp one
			$db->sql_query('CREATE TABLE ' . $table_name . ' (' . $new_table_cols . ', PRIMARY KEY (' . implode(', ', $column) . '));');
			$db->sql_query('INSERT INTO ' . $table_name . ' (' . $columns . ') SELECT ' . $columns . ' FROM ' . $table_name . '_temp;');
			$db->sql_query('DROP TABLE ' . $table_name . '_temp');

			$db->sql_transaction('commit');
		break;
	}
}

function sql_create_unique_index($dbms, $index_name, $table_name, $column)
{
	global $dbms_type_map, $db;
	global $errored, $error_ary;

	switch ($dbms)
	{
		case 'firebird':
		case 'postgres':
		case 'oracle':
		case 'sqlite':
			$sql = 'CREATE UNIQUE INDEX ' . $table_name . '_' . $index_name . ' ON ' . $table_name . '(' . implode(', ', $column) . ')';
			_sql($sql, $errored, $error_ary);
		break;

		case 'mysql':
			$sql = 'CREATE UNIQUE INDEX ' . $index_name . ' ON ' . $table_name . '(' . implode(', ', $column) . ')';
			_sql($sql, $errored, $error_ary);
		break;

		case 'mssql':
			$sql = 'CREATE UNIQUE INDEX ' . $index_name . ' ON ' . $table_name . '(' . implode(', ', $column) . ') ON [PRIMARY]';
			_sql($sql, $errored, $error_ary);
		break;
	}
}

function sql_create_index($dbms, $index_name, $table_name, $column)
{
	global $dbms_type_map, $db;
	global $errored, $error_ary;

	switch ($dbms)
	{
		case 'firebird':
		case 'postgres':
		case 'oracle':
		case 'sqlite':
			$sql = 'CREATE INDEX ' . $table_name . '_' . $index_name . ' ON ' . $table_name . '(' . implode(', ', $column) . ')';
			_sql($sql, $errored, $error_ary);
		break;

		case 'mysql':
			$sql = 'CREATE INDEX ' . $index_name . ' ON ' . $table_name . '(' . implode(', ', $column) . ')';
			_sql($sql, $errored, $error_ary);
		break;

		case 'mssql':
			$sql = 'CREATE INDEX ' . $index_name . ' ON ' . $table_name . '(' . implode(', ', $column) . ') ON [PRIMARY]';
			_sql($sql, $errored, $error_ary);
		break;
	}
}

// List all of the indices that belong to a table,
// does not count:
// * UNIQUE indices
// * PRIMARY keys
function sql_list_index($dbms, $table_name)
{
	global $dbms_type_map, $db;
	global $errored, $error_ary;

	$index_array = array();

	if ($dbms == 'mssql')
	{
		$sql = "EXEC sp_statistics '$table_name'";
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			if ($row['TYPE'] == 3)
			{
				$index_array[] = $row['INDEX_NAME'];
			}
		}
		$db->sql_freeresult($result);
	}
	else
	{
		switch ($dbms)
		{
			case 'firebird':
				$sql = "SELECT LOWER(RDB\$INDEX_NAME) as index_name
					FROM RDB\$INDICES
					WHERE RDB\$RELATION_NAME = " . strtoupper($table_name) . "
						AND RDB\$UNIQUE_FLAG IS NULL
						AND RDB\$FOREIGN_KEY IS NULL";
				$col = 'index_name';
			break;

			case 'postgres':
				$sql = "SELECT ic.relname as index_name
					FROM pg_class bc, pg_class ic, pg_index i
					WHERE (bc.oid = i.indrelid)
						AND (ic.oid = i.indexrelid)
						AND (bc.relname = '" . $table_name . "')
						AND (i.indisunique != 't')
						AND (i.indisprimary != 't')";
				$col = 'index_name';
			break;

			case 'mysql':
				$sql = 'SHOW KEYS
					FROM ' . $table_name;
				$col = 'Key_name';
			break;

			case 'oracle':
				$sql = "SELECT index_name
					FROM user_indexes
					WHERE table_name = '" . $table_name . "'
						AND generated = 'N'";
			break;

			case 'sqlite':
				$sql = "PRAGMA index_info('" . $table_name . "');";
				$col = 'name';
			break;
		}

		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			if ($dbms == 'mysql' && !$row['Non_unique'])
			{
				continue;
			}

			switch ($dbms)
			{
				case 'firebird':
				case 'oracle':
				case 'postgres':
				case 'sqlite':
					$row[$col] = substr($row[$col], strlen($table_name) + 1);
				break;
			}

			$index_array[] = $row[$col];
		}
		$db->sql_freeresult($result);
	}

	return array_map('strtolower', $index_array);
}

// This is totally fake, never use it
// it exists only to mend bad update functions introduced
// * UNIQUE indices
// * PRIMARY keys
function sql_list_fake($dbms, $table_name)
{
	global $dbms_type_map, $db;
	global $errored, $error_ary;

	$index_array = array();

	if ($dbms == 'mssql')
	{
		$sql = "EXEC sp_statistics '$table_name'";
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			if ($row['TYPE'] == 3)
			{
				$index_array[] = $row['INDEX_NAME'];
			}
		}
		$db->sql_freeresult($result);
	}
	else
	{
		switch ($dbms)
		{
			case 'firebird':
				$sql = "SELECT LOWER(RDB\$INDEX_NAME) as index_name
					FROM RDB\$INDICES
					WHERE RDB\$RELATION_NAME = " . strtoupper($table_name) . "
						AND RDB\$UNIQUE_FLAG IS NULL
						AND RDB\$FOREIGN_KEY IS NULL";
				$col = 'index_name';
			break;

			case 'postgres':
				$sql = "SELECT ic.relname as index_name
					FROM pg_class bc, pg_class ic, pg_index i
					WHERE (bc.oid = i.indrelid)
						AND (ic.oid = i.indexrelid)
						AND (bc.relname = '" . $table_name . "')
						AND (i.indisunique != 't')
						AND (i.indisprimary != 't')";
				$col = 'index_name';
			break;

			case 'mysql':
				$sql = 'SHOW KEYS
					FROM ' . $table_name;
				$col = 'Key_name';
			break;

			case 'oracle':
				$sql = "SELECT index_name
					FROM user_indexes
					WHERE table_name = '" . $table_name . "'
						AND generated = 'N'";
			break;

			case 'sqlite':
				$sql = "PRAGMA index_info('" . $table_name . "');";
				$col = 'name';
			break;
		}

		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			if ($dbms == 'mysql' && !$row['Non_unique'])
			{
				continue;
			}

			$index_array[] = $row[$col];
		}
		$db->sql_freeresult($result);
	}

	return array_map('strtolower', $index_array);
}

/**
* Change column type (not name!)
*/
function sql_column_change($dbms, $table_name, $column_name, $column_data)
{
	global $dbms_type_map, $db;
	global $errored, $error_ary;

	$column_data = prepare_column_data($dbms, $column_data, $table_name, $column_name);

	switch ($dbms)
	{
		case 'firebird':
			// Change type...
			$sql = 'ALTER TABLE "' . $table_name . '" ALTER COLUMN "' . $column_name . '" TYPE ' . ' ' . $column_data['column_type_sql'];
			_sql($sql, $errored, $error_ary);
		break;

		case 'mssql':
			$sql = 'ALTER TABLE [' . $table_name . '] ALTER COLUMN [' . $column_name . '] ' . $column_data['column_type_sql'];
			_sql($sql, $errored, $error_ary);
		break;

		case 'mysql':
			$sql = 'ALTER TABLE `' . $table_name . '` CHANGE `' . $column_name . '` `' . $column_name . '` ' . $column_data['column_type_sql'];
			_sql($sql, $errored, $error_ary);
		break;

		case 'oracle':
			$sql = 'ALTER TABLE ' . $table_name . ' MODIFY ' . $column_name . ' ' . $column_data['column_type_sql'];
			_sql($sql, $errored, $error_ary);
		break;

		case 'postgres':
			$sql = 'ALTER TABLE ' . $table_name . ' ';

			$sql_array = array();
			$sql_array[] = 'ALTER COLUMN ' . $column_name . ' TYPE ' . $column_data['column_type'];

			if (isset($column_data['null']))
			{
				if ($column_data['null'] == 'NOT NULL')
				{
					$sql_array[] = 'ALTER COLUMN ' . $column_name . ' SET NOT NULL';
				}
				else if ($column_data['null'] == 'NULL')
				{
					$sql_array[] = 'ALTER COLUMN ' . $column_name . ' DROP NOT NULL';
				}
			}

			if (isset($column_data['default']))
			{
				$sql_array[] = 'ALTER COLUMN ' . $column_name . ' SET DEFAULT ' . $column_data['default'];
			}

			// we don't want to double up on constraints if we change different number data types
			if (isset($column_data['constraint']))
			{
				$constraint_sql = "SELECT consrc as constraint_data
							FROM pg_constraint, pg_class bc
							WHERE conrelid = bc.oid
								AND bc.relname = '{$table_name}'
								AND NOT EXISTS (
									SELECT *
										FROM pg_constraint as c, pg_inherits as i
										WHERE i.inhrelid = pg_constraint.conrelid
											AND c.conname = pg_constraint.conname
											AND c.consrc = pg_constraint.consrc
											AND c.conrelid = i.inhparent
								)";

				$constraint_exists = false;

				$result = $db->sql_query($constraint_sql);
				while ($row = $db->sql_fetchrow($result))
				{
					if (trim($row['constraint_data']) == trim($column_data['constraint']))
					{
						$constraint_exists = true;
						break;
					}
				}
				$db->sql_freeresult($result);

				if (!$constraint_exists)
				{
					$sql_array[] = 'ADD ' . $column_data['constraint'];
				}
			}

			$sql .= implode(', ', $sql_array);

			_sql($sql, $errored, $error_ary);
		break;

		case 'sqlite':

			$sql = "SELECT sql
				FROM sqlite_master
				WHERE type = 'table'
					AND name = '{$table_name}'
				ORDER BY type DESC, name;";
			$result = _sql($sql, $errored, $error_ary);

			if (!$result)
			{
				break;
			}

			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			$db->sql_transaction('begin');

			// Create a temp table and populate it, destroy the existing one
			$db->sql_query(preg_replace('#CREATE\s+TABLE\s+"?' . $table_name . '"?#i', 'CREATE TEMPORARY TABLE ' . $table_name . '_temp', $row['sql']));
			$db->sql_query('INSERT INTO ' . $table_name . '_temp SELECT * FROM ' . $table_name);
			$db->sql_query('DROP TABLE ' . $table_name);

			preg_match('#\((.*)\)#s', $row['sql'], $matches);

			$new_table_cols = trim($matches[1]);
			$old_table_cols = preg_split('/,(?![\s\w]+\))/m', $new_table_cols);
			$column_list = array();

			foreach ($old_table_cols as $key => $declaration)
			{
				$entities = preg_split('#\s+#', trim($declaration));
				$column_list[] = $entities[0];
				if ($entities[0] == $column_name)
				{
					$old_table_cols[$key] = $column_name . ' ' . $column_data['column_type_sql'];
				}
			}

			$columns = implode(',', $column_list);

			// create a new table and fill it up. destroy the temp one
			$db->sql_query('CREATE TABLE ' . $table_name . ' (' . implode(',', $old_table_cols) . ');');
			$db->sql_query('INSERT INTO ' . $table_name . ' (' . $columns . ') SELECT ' . $columns . ' FROM ' . $table_name . '_temp;');
			$db->sql_query('DROP TABLE ' . $table_name . '_temp');

			$db->sql_transaction('commit');

		break;
	}
}

?>