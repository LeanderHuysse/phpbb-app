<?php
/**
*
* @package VC
* @version $Id$
* @copyright (c) 2006 2008 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
* Placeholder for autoload
*/
if (!class_exists('captcha_abstract'))
{
	include_once($phpbb_root_path . 'includes/captcha/plugins/captcha_abstract.' . $phpEx);
}

class phpbb_captcha_gd_wave extends phpbb_default_captcha
{

	function phpbb_captcha_gd_wave()
	{
		global $phpbb_root_path, $phpEx;
		if (!class_exists('captcha'))
		{
			include_once($phpbb_root_path . 'includes/captcha/captcha_gd_wave.' . $phpEx);
		}
	}

	function get_instance()
	{
		return new phpbb_captcha_gd_wave();
	}

	function is_available()
	{
		return (@extension_loaded('gd') || can_load_dll('gd'));
	}

	function get_name()
	{
		return 'CAPTCHA_GD_WAVE';
	}

	function get_class_name()
	{
		return 'phpbb_captcha_gd_wave';
	}

	function acp_page($id, &$module)
	{
		global $config, $db, $template, $user;
		
		trigger_error($user->lang['CAPTCHA_NO_OPTIONS'] . adm_back_link($module->u_action));
	}
}

?>