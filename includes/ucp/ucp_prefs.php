<?php
/** 
*
* @package ucp
* @version $Id$
* @copyright (c) 2005 phpBB Group 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package ucp
* ucp_prefs
* Changing user preferences
*/
class ucp_prefs
{
	function main($id, $mode)
	{
		global $config, $db, $user, $auth, $SID, $template, $phpbb_root_path, $phpEx;

		$submit = (isset($_POST['submit'])) ? true : false;
		$error = $data = array();
		$s_hidden_fields = '';

		switch ($mode)
		{
			case 'personal':

				if ($submit)
				{
					$var_ary = array(
						'dateformat'	=> (string) $config['default_dateformat'],
						'lang'			=> (string) $config['default_lang'],
						'tz'			=> (float) $config['board_timezone'],
						'style'			=> (int) $config['default_style'],
						'dst'			=> (bool) $config['board_dst'],
						'viewemail'		=> false,
						'massemail'		=> true,
						'hideonline'	=> false,
						'notifymethod'	=> 0,
						'notifypm'		=> true,
						'popuppm'		=> false,
						'allowpm'		=> true,
						'report_pm_notify'	=> false
					);

					foreach ($var_ary as $var => $default)
					{
						$data[$var] = request_var($var, $default);
					}

					$var_ary = array(
						'dateformat'	=> array('string', false, 3, 15),
						'lang'			=> array('match', false, '#^[a-z_]{2,}$#i'),
						'tz'			=> array('num', false, -13, 13),
					);

					$error = validate_data($data, $var_ary);
					extract($data);
					unset($data);

					if (!sizeof($error))
					{
						$user->optionset('popuppm', $popuppm);
						$user->optionset('report_pm_notify', $report_pm_notify);

						$sql_ary = array(
							'user_allow_pm'			=> $allowpm,
							'user_allow_viewemail'	=> $viewemail,
							'user_allow_massemail'	=> $massemail,
							'user_allow_viewonline'	=> ($auth->acl_get('u_hideonline')) ? !$hideonline : $user->data['user_allow_viewonline'],
							'user_notify_type'		=> $notifymethod,
							'user_notify_pm'		=> $notifypm,
							'user_options'			=> $user->data['user_options'],

							'user_dst'				=> $dst,
							'user_dateformat'		=> $dateformat,
							'user_lang'				=> $lang,
							'user_timezone'			=> $tz,
							'user_style'			=> $style,
						);

						$sql = 'UPDATE ' . USERS_TABLE . '
							SET ' . $db->sql_build_array('UPDATE', $sql_ary) . '
							WHERE user_id = ' . $user->data['user_id'];
						$db->sql_query($sql);

						meta_refresh(3, "ucp.$phpEx$SID&amp;i=$id&amp;mode=$mode");
						$message = $user->lang['PREFERENCES_UPDATED'] . '<br /><br />' . sprintf($user->lang['RETURN_UCP'], "<a href=\"ucp.$phpEx$SID&amp;i=$id&amp;mode=$mode\">", '</a>');
						trigger_error($message);
					}

					// Replace "error" strings with their real, localised form
					$error = preg_replace('#^([A-Z_]+)$#e', "(!empty(\$user->lang['\\1'])) ? \$user->lang['\\1'] : '\\1'", $error);
				}

				$viewemail = (isset($viewemail)) ? $viewemail : $user->data['user_allow_viewemail'];
				$view_email_yes = ($viewemail) ? ' checked="checked"' : '';
				$view_email_no = (!$viewemail) ? ' checked="checked"' : '';
				$massemail = (isset($massemail)) ? $massemail : $user->data['user_allow_massemail'];
				$mass_email_yes = ($massemail) ? ' checked="checked"' : '';
				$mass_email_no = (!$massemail) ? ' checked="checked"' : '';
				$allowpm = (isset($allowpm)) ? $allowpm : $user->data['user_allow_pm'];
				$allow_pm_yes = ($allowpm) ? ' checked="checked"' : '';
				$allow_pm_no = (!$allowpm) ? ' checked="checked"' : '';
				$hideonline = (isset($hideonline)) ? $hideonline : !$user->data['user_allow_viewonline'];
				$hide_online_yes = ($hideonline) ? ' checked="checked"' : '';
				$hide_online_no = (!$hideonline) ? ' checked="checked"' : '';
				$notifypm = (isset($notifypm)) ? $notifypm : $user->data['user_notify_pm'];
				$notify_pm_yes = ($notifypm) ? ' checked="checked"' : '';
				$notify_pm_no = (!$notifypm) ? ' checked="checked"' : '';
				$popuppm = (isset($popuppm)) ? $popuppm : $user->optionget('popuppm');
				$popup_pm_yes = ($popuppm) ? ' checked="checked"' : '';
				$popup_pm_no = (!$popuppm) ? ' checked="checked"' : '';
				$report_pm_notify = (isset($report_pm_notify)) ? $report_pm_notify : $user->optionget('report_pm_notify');
				$report_pm_notify_yes = ($report_pm_notify) ? ' checked="checked"' : '';
				$report_pm_notify_no = (!$report_pm_notify) ? ' checked="checked"' : '';
				$dst = (isset($dst)) ? $dst : $user->data['user_dst'];
				$dst_yes = ($dst) ? ' checked="checked"' : '';
				$dst_no = (!$dst) ? ' checked="checked"' : '';

				$notifymethod = (isset($notifymethod)) ? $notifymethod : $user->data['user_notify_type'];
				$dateformat = (isset($dateformat)) ? $dateformat : $user->data['user_dateformat'];
				$lang = (isset($lang)) ? $lang : $user->data['user_lang'];
				$style = (isset($style)) ? $style : $user->data['user_style'];
				$tz = (isset($tz)) ? $tz : $user->data['user_timezone'];

				$template->assign_vars(array(
					'ERROR'				=> (sizeof($error)) ? implode('<br />', $error) : '',

					'VIEW_EMAIL_YES'	=> $view_email_yes,
					'VIEW_EMAIL_NO'		=> $view_email_no,
					'ADMIN_EMAIL_YES'	=> $mass_email_yes,
					'ADMIN_EMAIL_NO'	=> $mass_email_no,
					'HIDE_ONLINE_YES'	=> $hide_online_yes,
					'HIDE_ONLINE_NO'	=> $hide_online_no,
					'ALLOW_PM_YES'		=> $allow_pm_yes,
					'ALLOW_PM_NO'		=> $allow_pm_no,
					'NOTIFY_PM_YES'		=> $notify_pm_yes,
					'NOTIFY_PM_NO'		=> $notify_pm_no,
					'POPUP_PM_YES'		=> $popup_pm_yes,
					'POPUP_PM_NO'		=> $popup_pm_no,
					'REPORT_PM_YES'		=> $report_pm_notify_yes,
					'REPORT_PM_NO'		=> $report_pm_notify_no,
					'DST_YES'			=> $dst_yes,
					'DST_NO'			=> $dst_no,
					'NOTIFY_EMAIL'		=> ($notifymethod == NOTIFY_EMAIL) ? 'checked="checked"' : '',
					'NOTIFY_IM'			=> ($notifymethod == NOTIFY_IM) ? 'checked="checked"' : '',
					'NOTIFY_BOTH'		=> ($notifymethod == NOTIFY_BOTH) ? 'checked="checked"' : '',

					'DATE_FORMAT'		=> $dateformat,

					'S_LANG_OPTIONS'	=> language_select($lang),
					'S_STYLE_OPTIONS'	=> style_select($style),
					'S_TZ_OPTIONS'		=> tz_select($tz),
					'S_CAN_HIDE_ONLINE'	=> true, 
					'S_SELECT_NOTIFY'	=> ($config['jab_enable'] && $user->data['user_jabber'] && @extension_loaded('xml')) ? true : false)
				);
				break;

			case 'view':

				if ($submit)
				{
					$var_ary = array(
						'topic_sk'	=> (string) 't',
						'topic_sd'	=> (string) 'd',
						'topic_st'	=> 0,

						'post_sk'	=> (string) 't',
						'post_sd'	=> (string) 'a',
						'post_st'	=> 0,

						'images'	=> true,
						'flash'		=> false,
						'smilies'	=> true,
						'sigs'		=> true,
						'avatars'	=> true,
						'wordcensor'=> false,
					);

					foreach ($var_ary as $var => $default)
					{
						$data[$var] = request_var($var, $default);
					}

					$var_ary = array(
						'topic_sk'	=> array('string', false, 1, 1),
						'topic_sd'	=> array('string', false, 1, 1),
						'post_sk'	=> array('string', false, 1, 1),
						'post_sd'	=> array('string', false, 1, 1),
					);

					$error = validate_data($data, $var_ary);
					extract($data);
					unset($data);

					if (!sizeof($error))
					{
						$user->optionset('viewimg', $images);
						$user->optionset('viewflash', $flash);
						$user->optionset('viewsmilies', $smilies);
						$user->optionset('viewsigs', $sigs);
						$user->optionset('viewavatars', $avatars);
						if ($auth->acl_get('u_chgcensors'))
						{
							$user->optionset('viewcensors', $wordcensor);
						}

						$sql_ary = array(
							'user_options'			=> $user->data['user_options'],
							'user_topic_sortby_type'=> $topic_sk,
							'user_post_sortby_type'	=> $post_sk,
							'user_topic_sortby_dir'	=> $topic_sd,
							'user_post_sortby_dir'	=> $post_sd,

							'user_topic_show_days'	=> $topic_st,
							'user_post_show_days'	=> $post_st,
						);

						$sql = 'UPDATE ' . USERS_TABLE . '
							SET ' . $db->sql_build_array('UPDATE', $sql_ary) . '
							WHERE user_id = ' . $user->data['user_id'];
						$db->sql_query($sql);

						meta_refresh(3, "ucp.$phpEx$SID&amp;i=$id&amp;mode=$mode");
						$message = $user->lang['PREFERENCES_UPDATED'] . '<br /><br />' . sprintf($user->lang['RETURN_UCP'], "<a href=\"ucp.$phpEx$SID&amp;i=$id&amp;mode=$mode\">", '</a>');
						trigger_error($message);
					}

					// Replace "error" strings with their real, localised form
					$error = preg_replace('#^([A-Z_]+)$#e', "(!empty(\$user->lang['\\1'])) ? \$user->lang['\\1'] : '\\1'", $error);
				}

				$topic_sk = (isset($topic_sk)) ? $topic_sk : ((!empty($user->data['user_tpic_sortby_type'])) ? $user->data['user_topic_sortby_type'] : 't');
				$post_sk = (isset($post_sk)) ? $post_sk : ((!empty($user->data['user_post_sortby_type'])) ? $user->data['user_post_sortby_type'] : 't');

				$topic_sd = (isset($topic_sd)) ? $topic_sd : ((!empty($user->data['user_topic_sortby_dir'])) ? $user->data['user_topic_sortby_dir'] : 'd');
				$post_sd = (isset($post_sd)) ? $post_sd : ((!empty($user->data['user_post_sortby_dir'])) ? $user->data['user_post_sortby_dir'] : 'd');
				
				$topic_st = (isset($topic_st)) ? $topic_st : ((!empty($user->data['user_topic_show_days'])) ? $user->data['user_topic_show_days'] : 0);
				$post_st = (isset($post_st)) ? $post_st : ((!empty($user->data['user_post_show_days'])) ? $user->data['user_post_show_days'] : 0);

				$sort_dir_text = array('a' => $user->lang['ASCENDING'], 'd' => $user->lang['DESCENDING']);

				// Topic ordering options
				$limit_topic_days = array(0 => $user->lang['ALL_TOPICS'], 1 => $user->lang['1_DAY'], 7 => $user->lang['7_DAYS'], 14 => $user->lang['2_WEEKS'], 30 => $user->lang['1_MONTH'], 90 => $user->lang['3_MONTHS'], 180 => $user->lang['6_MONTHS'], 364 => $user->lang['1_YEAR']);

				$sort_by_topic_text = array('a' => $user->lang['AUTHOR'], 't' => $user->lang['POST_TIME'], 'r' => $user->lang['REPLIES'], 's' => $user->lang['SUBJECT'], 'v' => $user->lang['VIEWS']);
				$sort_by_topic_sql = array('a' => 't.topic_first_poster_name', 't' => 't.topic_last_post_time', 'r' => 't.topic_replies', 's' => 't.topic_title', 'v' => 't.topic_views');

				// Post ordering options
				$limit_post_days = array(0 => $user->lang['ALL_POSTS'], 1 => $user->lang['1_DAY'], 7 => $user->lang['7_DAYS'], 14 => $user->lang['2_WEEKS'], 30 => $user->lang['1_MONTH'], 90 => $user->lang['3_MONTHS'], 180 => $user->lang['6_MONTHS'], 364 => $user->lang['1_YEAR']);

				$sort_by_post_text = array('a' => $user->lang['AUTHOR'], 't' => $user->lang['POST_TIME'], 's' => $user->lang['SUBJECT']);
				$sort_by_post_sql = array('a' => 'u.username', 't' => 'p.post_id', 's' => 'p.post_subject');

				foreach (array('topic', 'post') as $sort_option)
				{
					${'s_limit_' . $sort_option . '_days'} = '<select name="' . $sort_option . '_st">';
					foreach (${'limit_' . $sort_option . '_days'} as $day => $text)
					{
						$selected = (${$sort_option . '_st'} == $day) ? ' selected="selected"' : '';
						${'s_limit_' . $sort_option . '_days'} .= '<option value="' . $day . '"' . $selected . '>' . $text . '</option>';
					}
					${'s_limit_' . $sort_option . '_days'} .= '</select>';

					${'s_sort_' . $sort_option . '_key'} = '<select name="' . $sort_option . '_sk">';
					foreach (${'sort_by_' . $sort_option . '_text'} as $key => $text)
					{
						$selected = (${$sort_option . '_sk'} == $key) ? ' selected="selected"' : '';
						${'s_sort_' . $sort_option . '_key'} .= '<option value="' . $key . '"' . $selected . '>' . $text . '</option>';
					}
					${'s_sort_' . $sort_option . '_key'} .= '</select>';

					${'s_sort_' . $sort_option . '_dir'} = '<select name="' . $sort_option . '_sd">';
					foreach ($sort_dir_text as $key => $value)
					{
						$selected = (${$sort_option . '_sd'} == $key) ? ' selected="selected"' : '';
						${'s_sort_' . $sort_option . '_dir'} .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
					}
					${'s_sort_' . $sort_option . '_dir'} .= '</select>';
				}

				$images = (isset($images)) ? $images : $user->optionget('viewimg');
				$images_yes = ($images) ? ' checked="checked"' : '';
				$images_no = (!$images) ? ' checked="checked"' : '';
				$flash = (isset($flash)) ? $flash : $user->optionget('viewflash');
				$flash_yes = ($flash) ? ' checked="checked"' : '';
				$flash_no = (!$flash) ? ' checked="checked"' : '';
				$smilies = (isset($smilies)) ? $smilies : $user->optionget('viewsmilies');
				$smilies_yes = ($smilies) ? ' checked="checked"' : '';
				$smilies_no = (!$smilies) ? ' checked="checked"' : '';
				$sigs = (isset($sigs)) ? $sigs : $user->optionget('viewsigs');
				$sigs_yes = ($sigs) ? ' checked="checked"' : '';
				$sigs_no = (!$sigs) ? ' checked="checked"' : '';
				$avatars = (isset($avatars)) ? $avatars : $user->optionget('viewavatars');
				$avatars_yes = ($avatars) ? ' checked="checked"' : '';
				$avatars_no = (!$avatars) ? ' checked="checked"' : '';
				$wordcensor = (isset($wordcensor)) ? $wordcensor : $user->optionget('viewcensors');
				$wordcensor_yes = ($wordcensor) ? ' checked="checked"' : '';
				$wordcensor_no = (!$wordcensor) ? ' checked="checked"' : '';

				$template->assign_vars(array(
					'ERROR'				=> (sizeof($error)) ? implode('<br />', $error) : '',

					'VIEW_IMAGES_YES'		=> $images_yes,
					'VIEW_IMAGES_NO'		=> $images_no,
					'VIEW_FLASH_YES'		=> $flash_yes,
					'VIEW_FLASH_NO'			=> $flash_no,
					'VIEW_SMILIES_YES'		=> $smilies_yes,
					'VIEW_SMILIES_NO'		=> $smilies_no,
					'VIEW_SIGS_YES'			=> $sigs_yes,
					'VIEW_SIGS_NO'			=> $sigs_no,
					'VIEW_AVATARS_YES'		=> $avatars_yes,
					'VIEW_AVATARS_NO'		=> $avatars_no,
					'DISABLE_CENSORS_YES'	=> $wordcensor_yes,
					'DISABLE_CENSORS_NO'	=> $wordcensor_no,

					'S_CHANGE_CENSORS'		=> ($auth->acl_get('u_chgcensors')) ? true : false,

					'S_TOPIC_SORT_DAYS'		=> $s_limit_topic_days,
					'S_TOPIC_SORT_KEY'		=> $s_sort_topic_key,
					'S_TOPIC_SORT_DIR'		=> $s_sort_topic_dir,
					'S_POST_SORT_DAYS'		=> $s_limit_post_days,
					'S_POST_SORT_KEY'		=> $s_sort_post_key,
					'S_POST_SORT_DIR'		=> $s_sort_post_dir)
				);

				break;

			case 'post':

				if ($submit)
				{
					$var_ary = array(
						'bbcode'	=> true,
						'html'		=> false,
						'smilies'	=> true,
						'sig'		=> true,
						'notify'	=> false,
					);

					foreach ($var_ary as $var => $default)
					{
						$$var = request_var($var, $default);
					}

					$user->optionset('bbcode', $bbcode);
					$user->optionset('html', $html);
					$user->optionset('smilies', $smilies);
					$user->optionset('attachsig', $sig);

					if (!sizeof($error))
					{
						$sql_ary = array(
							'user_options'	=> $user->data['user_options'],
							'user_notify'	=> $notify,
						);

						$sql = 'UPDATE ' . USERS_TABLE . '
							SET ' . $db->sql_build_array('UPDATE', $sql_ary) . '
							WHERE user_id = ' . $user->data['user_id'];
						$db->sql_query($sql);

						meta_refresh(3, "ucp.$phpEx$SID&amp;i=$id&amp;mode=$mode");
						$message = $user->lang['PREFERENCES_UPDATED'] . '<br /><br />' . sprintf($user->lang['RETURN_UCP'], "<a href=\"ucp.$phpEx$SID&amp;i=$id&amp;mode=$mode\">", '</a>');
						trigger_error($message);
					}

					// Replace "error" strings with their real, localised form
					$error = preg_replace('#^([A-Z_]+)$#e', "(!empty(\$user->lang['\\1'])) ? \$user->lang['\\1'] : '\\1'", $error);
				}

				$bbcode = (isset($bbcode)) ? $bbcode : $user->optionget('bbcode');
				$bbcode_yes = ($bbcode) ? ' checked="checked"' : '';
				$bbcode_no = (!$bbcode) ? ' checked="checked"' : '';
				$html = (isset($html)) ? $html : $user->optionget('html');
				$html_yes = ($html) ? ' checked="checked"' : '';
				$html_no = (!$html) ? ' checked="checked"' : '';
				$smilies = (isset($smilies)) ? $smilies : $user->optionget('smilies');
				$smilies_yes = ($smilies) ? ' checked="checked"' : '';
				$smilies_no = (!$smilies) ? ' checked="checked"' : '';
				$sig = (isset($sig)) ? $sig : $user->optionget('attachsig');
				$sig_yes = ($sig) ? ' checked="checked"' : '';
				$sig_no = (!$sig) ? ' checked="checked"' : '';
				$notify = (isset($notify)) ? $notify : $user->data['user_notify'];
				$notify_yes = ($notify) ? ' checked="checked"' : '';
				$notify_no = (!$notify) ? ' checked="checked"' : '';

				$template->assign_vars(array(
					'ERROR'				=> (sizeof($error)) ? implode('<br />', $error) : '',

					'DEFAULT_BBCODE_YES'	=> $bbcode_yes,
					'DEFAULT_BBCODE_NO'		=> $bbcode_no,
					'DEFAULT_HTML_YES'		=> $html_yes,
					'DEFAULT_HTML_NO'		=> $html_no,
					'DEFAULT_SMILIES_YES'	=> $smilies_yes,
					'DEFAULT_SMILIES_NO'	=> $smilies_no,
					'DEFAULT_SIG_YES'		=> $sig_yes,
					'DEFAULT_SIG_NO'		=> $sig_no,
					'DEFAULT_NOTIFY_YES'	=> $notify_yes,
					'DEFAULT_NOTIFY_NO'		=> $notify_no,)
				);
				break;
		}

		$template->assign_vars(array(
			'L_TITLE'			=> $user->lang['UCP_PREFS_' . strtoupper($mode)],

			'S_HIDDEN_FIELDS'	=> $s_hidden_fields,
			'S_UCP_ACTION'		=> "ucp.$phpEx$SID&amp;i=$id&amp;mode=$mode")
		);

		$this->tpl_name = 'ucp_prefs_' . $mode;
	}
}

?>