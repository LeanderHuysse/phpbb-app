<?php
/***************************************************************************
 *                           message_parser.php
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

/*
	TODO list:
	- fix [flash], add width/height parameters?
	- check that PHP syntax highlightning works well
	- add other languages?
	- add validation regexp to [email], [flash]
	- need size limit checks on img/flash tags ... probably warrants some discussion)
*/

// case-insensitive strpos() - needed for some functions
if (!function_exists('stripos'))
{
	function stripos($haystack, $needle)
	{
		if (preg_match('#' . preg_quote($needle, '#') . '#i', $haystack, $m))
		{
			return strpos($haystack, $m[0]);
		}

		return FALSE;
	}
}

// Main message parser for posting, pm, etc. takes raw message
// and parses it for attachments, html, bbcode and smilies
class parse_message
{
	var $message_mode = 0; // MSG_POST/MSG_PM
	var $message = '';
	var $warn_msg = array();

	var $bbcodes = array();
	var $bbcode_uid = '';
	var $bbcode_bitfield = 0;

	var $attachment_data = array();
	var $filename_data = array();

	function parse_message($message_type)
	{
		$this->message_mode = $message_type;
		$this->bbcode_uid = substr(md5(time()), 0, BBCODE_UID_LEN);
	}
	
	function parse($html, $bbcode, $url, $smilies, $bbcode_img = TRUE, $bbcode_flash = TRUE)
	{
		global $config, $db, $user;

		// Do some general 'cleanup' first before processing message,
		// e.g. remove excessive newlines(?), smilies(?)
		// Transform \r\n and \r into \n
		$match = array('#\r\n?#', '#sid=[a-z0-9]*?&?#', "#([\n][\s]+){3,}#");
		$replace = array("\n", '', "\n\n");

		$this->message = trim(preg_replace($match, $replace, $this->message));

		// Message length check
		if (!strlen($this->message) || (intval($config['max_post_chars']) && strlen($this->message) > intval($config['max_post_chars'])))
		{
			$this->warn_msg[] = (!strlen($this->message)) ? $user->lang['TOO_FEW_CHARS'] : $user->lang['TOO_MANY_CHARS'];
		}

		// Smiley check
		if (intval($config['max_post_smilies']) && $smilies)
		{
			// NOTE: couldn't we move this to emoticons()? they both use the same rowset
			$sql = "SELECT code	
				FROM " . SMILIES_TABLE;
			$result = $db->sql_query($sql);

			$match = 0;
			while ($row = $db->sql_fetchrow($result))
			{
				if (preg_match_all('#('. preg_quote($row['code'], '#') . ')#', $this->message, $matches))
				{
					$match++;
				}

				if ($match > intval($config['max_post_smilies']))
				{
					$this->warn_msg[] = $user->lang['TOO_MANY_SMILIES'];
					break;
				}
			}
			$db->sql_freeresult($result);
			unset($matches);
		}

		if ($this->warn_msg)
		{
			return implode('<br />', $this->warn_msg);
		}

		$this->html($html);
		if ($bbcode)
		{
			$this->bbcode_init();
			if (!$bbcode_img)
			{
				$this->bbcodes['img']['disabled'] = TRUE;
			}
			if (!$bbcode_flash)
			{
				$this->bbcodes['flash']['disabled'] = TRUE;
			}
			$this->bbcode();
		}
		$this->emoticons($smilies);
		$this->magic_url($url);

		return implode('<br />', $this->warn_msg);
	}

	function html($html)
	{
		global $config;

		$this->message = str_replace(array('<', '>'), array('&lt;', '&gt;'), $this->message);

		if ($html)
		{
			// If $html is true then "allowed_tags" are converted back from entity
			// form, others remain
			$allowed_tags = split(',', $config['allow_html_tags']);

			if (sizeof($allowed_tags))
			{
				$this->message = preg_replace('#&lt;(\/?)(' . str_replace('*', '.*?', implode('|', $allowed_tags)) . ')&gt;#is', '<\1\2>', $this->message);
			}
		}
	}

	function bbcode()
	{
		if (!$this->bbcodes)
		{
			$this->bbcode_init();
		}

		global $user;
		$this->bbcode_bitfield = 0;

		$size = strlen($this->message);
		foreach ($this->bbcodes as $bbcode_name => $bbcode_data)
		{
			if (!empty($bbcode_data['disabled']))
			{
				foreach ($bbcode_data['regexp'] as $regexp => $replacement)
				{
					if (preg_match($regexp, $this->message))
					{
						$this->warn_msg[] = $user->lang['UNAUTHORISED_BBCODE'] . '[' . $bbcode_name . ']';
						continue;
					}
				}
			}
			else
			{
				foreach ($bbcode_data['regexp'] as $regexp => $replacement)
				{
					$this->message = preg_replace($regexp, $replacement, $this->message);
				}
			}

			// Since we add bbcode_uid to all tags, the message length will increase whenever a tag is found
			$new_size = strlen($this->message);
			if ($size != $new_size)
			{
				$this->bbcode_bitfield |= (1 << $bbcode_data['bbcode_id']);
				$size = $new_size;
			}
		}
	}

	function bbcode_init()
	{
		static $rowset;

		// This array holds all bbcode data. BBCodes will be processed in this order, so it is important to
		// keep [code] in first position and [quote] in second position.
		$this->bbcodes = array(
			'code'	=>	array('bbcode_id' => 8, 'regexp' => array('#\[code(?:=([a-z]+))?\](.+\[/code\])#ise' => "\$this->bbcode_code('\\1', '\\2')")),
			'quote'	=>	array('bbcode_id' => 0, 'regexp' => array('#\[quote(?:="(.*?)")?\](.+)\[/quote\]#ise' => "\$this->bbcode_quote('\\0')")),
			'b'		=>	array('bbcode_id' => 1, 'regexp' => array('#\[b\](.*?)\[/b\]#is' => '[b:' . $this->bbcode_uid . ']\1[/b:' . $this->bbcode_uid . ']')),
			'i'		=>	array('bbcode_id' => 2, 'regexp' => array('#\[i\](.*?)\[/i\]#is' => '[i:' . $this->bbcode_uid . ']\1[/i:' . $this->bbcode_uid . ']')),
			'url'	=>	array('bbcode_id' => 3, 'regexp' => array('#\[url=?(.*?)?\](.*?)\[/url\]#ise' => "\$this->validate_url('\\1', '\\2')")),
			'img'	=>	array('bbcode_id' => 4, 'regexp' => array('#\[img\](https?://)([a-z0-9\-\.,\?!%\*_:;~\\&$@/=\+]+)\[/img\]#i' => '[img:' . $this->bbcode_uid . ']\1\2[/img:' . $this->bbcode_uid . ']')),
			'size'	=>	array('bbcode_id' => 5, 'regexp' => array('#\[size=([\-\+]?[1-2]?[0-9])\](.*?)\[/size\]#is' => '[size=\1:' . $this->bbcode_uid . ']\2[/size:' . $this->bbcode_uid . ']')),
			'color'	=>	array('bbcode_id' => 6, 'regexp' => array('!\[color=(#[0-9A-F]{6}|[a-z\-]+)\](.*?)\[/color\]!is' => '[color=\1:' . $this->bbcode_uid . ']\2[/color:' . $this->bbcode_uid . ']')),
			'u'		=>	array('bbcode_id' => 7, 'regexp' => array('#\[u\](.*?)\[/u\]#is' => '[u:' . $this->bbcode_uid . ']\1[/u:' . $this->bbcode_uid . ']')),
			'list'	=>	array('bbcode_id' => 9, 'regexp' => array('#\[list(=[a-z|0-9|(?:disc|circle|square))]+)?\].*\[/list\]#ise' => "\$this->bbcode_list('\\0')")),
			'email'	=>	array('bbcode_id' => 10, 'regexp' => array('#\[email=?(.*?)?\](.*?)\[/email\]#ise' => "\$this->validate_email('\\1', '\\2')")),
			'flash'	=>	array('bbcode_id' => 11, 'regexp' => array('#\[flash=([0-9]+),([0-9]+)\](.*?)\[/flash\]#i' => '[flash=\1,\2:' . $this->bbcode_uid . ']\3[/flash:' . $this->bbcode_uid . ']'))
		);

/**************
		if (!isset($rowset))
		{
			global $db;
			$rowset = array();

			$result = $db->sql_query('SELECT * FROM ' . BBCODES_TABLE);
			while ($row = $db->sql_fetchrow($result))
			{
				$rowset[] = $row;
			}
		}
		foreach ($rowset as $row)
		{
			$this->bbcodes[$row['bbcode_name']] = array(
				'bbcode_id'	=>	$row['bbcode_id'],
				'regexp'	=>	array($row['first_pass_regexp'] => str_replace('$uid', $this->bbcode_uid, $row['first_pass_replacement']))
			);
		}
**************/
	}

	// Expects the argument to start right after the opening [code] tag and to end with [/code]
	function bbcode_code($stx, $in)
	{
		// if I remember correctly, preg_replace() will slash passed vars
		$in = str_replace("\r\n", "\n", stripslashes($in));
		$out = '';

		do
		{
			$pos = stripos($in, '[/code]') + 7;
			$code = substr($in, 0, $pos);
			$in = substr($in, $pos);

			// $code contains everything that was between code tags (including the ending tag) but we're trying to grab as much extra text as possible, as long as it does not contain open [code] tags
			while ($in)
			{
				$pos = stripos($in, '[/code]') + 7;
				$buffer = substr($in, 0, $pos);

				if (preg_match('#\[code(?:=([a-z]+))?\]#i', $buffer))
				{
					break;
				}
				else
				{
					$in = substr($in, $pos);
					$code .= $buffer;
				}
			}

			$code = substr($code, 0, -7);
			$code = preg_replace('#^[\r\n]*(.*?)[\n\r\s\t]*$#s', '\1', $code);

			switch (strtolower($stx))
			{
				case 'php':
					$remove_tags = FALSE;
					$str_from = array('&lt;', '&gt;');
					$str_to = array('<', '>');

					$code = str_replace($str_from, $str_to, $code);
					if (!preg_match('/\<\?.*?\?\>/is', $code))
					{
						$remove_tags = TRUE;
						$code = "<?php $code ?>";
					}

					$conf = array('highlight.bg', 'highlight.comment', 'highlight.default', 'highlight.html', 'highlight.keyword', 'highlight.string');
					foreach ($conf as $ini_var)
					{
						ini_set($ini_var, str_replace('highlight.', 'syntax', $ini_var));
					}

					ob_start();
					highlight_string($code);
					$code = ob_get_contents();
					ob_end_clean();

					$str_from = array('<font color="syntax', '</font>', '<code>', '</code>','[', ']', '.');
					$str_to = array('<span class="syntax', '</span>', '', '', '&#91;', '&#93;', '&#46;');

					if ($remove_tags)
					{
						$str_from[] = '<span class="syntaxdefault">&lt;?php&nbsp;</span>';
						$str_to[] = '';
						$str_from[] = '<span class="syntaxdefault">&lt;?php&nbsp;';
						$str_to[] = '<span class="syntaxdefault">';
						$str_from[] = '<span class="syntaxdefault">?&gt;</span>';
						$str_to[] = '';
					}

					$code = str_replace($str_from, $str_to, $code);
					$code = preg_replace('#^(<span class="[a-z_]+">)\n?(.*?)\n?(</span>)$#is', '\1\2\3', $code);

					$out .= "[code=$stx:" . $this->bbcode_uid . ']' . $code . '[/code:' . $this->bbcode_uid . ']';
				break;

				default:
					$str_from = array('<', '>', '[', ']', '.');
					$str_to = array('&lt;', '&gt;', '&#91;', '&#93;', '&#46;');

					$out .= '[code:' . $this->bbcode_uid . ']' . trim(str_replace($str_from, $str_to, $code)) . '[/code:' . $this->bbcode_uid . ']';
			}

			if (preg_match('#(.*?)\[code(?:=[a-z]+)?\](.+)#is', $in, $m))
			{
				$out .= $m[1];
				$in = $m[2];
			}
		}
		while ($in);

		return $out;
	}

	// Expects the argument to start with a tag
	function bbcode_list($in)
	{
		// $tok holds characters to stop at. Since the string starts with a '[' we'll get everything up to the first ']' which should be the opening [list] tag
		$tok = ']';
		$out = '[';

		$in = substr(stripslashes($in), 1);
		$list_end_tags = $item_end_tags = array();

		do
		{
			$pos = strlen($in);
			for ($i = 0; $i < strlen($tok); ++$i)
			{
				$tmp_pos = strpos($in, $tok{$i});
				if ($tmp_pos !== FALSE && $tmp_pos < $pos)
				{
					$pos = $tmp_pos;
				}
			}

			$buffer = substr($in, 0, $pos);
			$tok = $in{$pos};
			$in = substr($in, $pos + 1);

			if ($tok == ']')
			{
				// if $tok is ']' the buffer holds a tag

				if ($buffer == '/list' && count($list_end_tags))
				{
					// valid [/list] tag
					if (count($item_end_tags))
					{
						// current li tag has not been closed
						$out = preg_replace('/(\n)?\[$/', '[', $out) . array_pop($item_end_tags) . '][';
					}

					$out .= array_pop($list_end_tags) . ']';
					$tok = '[';
				}
				elseif (preg_match('#list(=?(?:[0-9]|[a-z]|))#i', $buffer, $m))
				{
					// sub-list, add a closing tag
					if (!$m[1] || preg_match('/^(disc|square|circle)$/i', $m[1]))
					{
						array_push($list_end_tags, '/list:u:' . $this->bbcode_uid);
					}
					else
					{
						array_push($list_end_tags, '/list:o:' . $this->bbcode_uid);
					}
					$out .= $buffer . ':' . $this->bbcode_uid . ']';
					$tok = '[';
				}
				else
				{
					if ($buffer == '*' && count($list_end_tags))
					{
						// the buffer holds a bullet tag and we have a [list] tag open
						if (count($item_end_tags) >= count($list_end_tags))
						{
							// current li tag has not been closed
							if (preg_match('/\n\[$/', $out, $m))
							{
								$out = preg_replace('/\n\[$/', '[', $out);
								$buffer = array_pop($item_end_tags) . "]\n[*:" . $this->bbcode_uid;
							}
							else
							{
								$buffer = array_pop($item_end_tags) . '][*:' . $this->bbcode_uid;
							}
						}
						else
						{
							$buffer = '*:' . $this->bbcode_uid;
						}

						$item_end_tags[] = '/*:m:' . $this->bbcode_uid;
					}
					elseif ($buffer == '/*')
					{
						array_pop($item_end_tags);
						$buffer = '/*:' . $this->bbcode_uid;
					}

					$out .= $buffer . $tok;
					$tok = '[]';
				}
			}
			else
			{
				// Not within a tag, just add buffer to the return string

				$out .= $buffer . $tok;
				$tok = ($tok == '[') ? ']' : '[]';
			}
		}
		while ($in);

		// do we have some tags open? close them now
		if (count($item_end_tags))
		{
			$out .= '[' . implode('][', $item_end_tags) . ']';
		}
		if (count($list_end_tags))
		{
			$out .= '[' . implode('][', $list_end_tags) . ']';
		}

		return $out;
	}

	// Expects the argument to start with a tag
	function bbcode_quote($in)
	{
		global $config, $user;

		$tok = ']';
		$out = '[';

		$in = substr(stripslashes($in), 1);
		$close_tags = $error_ary = array();
		$buffer = '';

		do
		{
			$pos = strlen($in);
			for ($i = 0; $i < strlen($tok); ++$i)
			{
				$tmp_pos = strpos($in, $tok{$i});
				if ($tmp_pos !== FALSE && $tmp_pos < $pos)
				{
					$pos = $tmp_pos;
				}
			}

			$buffer .= substr($in, 0, $pos);
			$tok = $in{$pos};
			$in = substr($in, $pos + 1);

			if ($tok == ']')
			{
				if ($buffer == '/quote' && count($close_tags))
				{
					// we have found a closing tag

					$out .= array_pop($close_tags) . ']';
					$tok = '[';
					$buffer = '';
				}
				elseif (preg_match('#^quote(?:="(.*?)")?$#is', $buffer, $m))
				{
					// the buffer holds a valid opening tag
					if ($config['max_quote_depth'] && count($close_tags) >= $config['max_quote_depth'])
					{
						// there are too many nested quotes
						$error_ary['quote_depth'] = $user->lang['QUOTE_DEPTH_EXCEEDED'];

						$out .= $buffer . $tok;
						$tok = '[]';
						$buffer = '';

						continue;
					}

					array_push($close_tags, '/quote:' . $this->bbcode_uid);

					if (!empty($m[1]))
					{
						$username = preg_replace('#\[(?!b|i|u|color|url|email|/b|/i|/u|/color|/url|/email)#iU', '&#91;\1', $m[1]);
						$end_tags = array();
						$error = FALSE;

						preg_match_all('#\[((?:/)?(?:[a-z]+))#i', $username, $tags);
						foreach ($tags[1] as $tag)
						{
							if ($tag{0} != '/')
							{
								$end_tags[] = '/' . $tag;
							}
							else
							{
								$end_tag = array_pop($end_tags);
								if ($end_tag != $tag)
								{
									$error = TRUE;
								}
								else
								{
									$error = FALSE;
								}
							}
						}
						if ($error)
						{
							$username = str_replace('[', '&#91;', str_replace(']', '&#93;', $m[1]));
						}

						$out .= 'quote="' . $username . '":' . $this->bbcode_uid . ']';
					}
					else
					{
						$out .= 'quote:' . $this->bbcode_uid . ']';
					}

					$tok = '[';
					$buffer = '';
				}
				elseif (preg_match('#^quote="(.*?)#is', $buffer, $m))
				{
					// the buffer holds an invalid opening tag
					$buffer .= ']';
				}
				else
				{
					$out .= $buffer . $tok;
					$tok = '[]';
					$buffer = '';
				}
			}
			else
			{
				$out .= $buffer . $tok;
				$tok = ($tok == '[') ? ']' : '[]';
				$buffer = '';
			}
		}
		while ($in);

		if (count($close_tags))
		{
			$out .= '[' . implode('][', $close_tags) . ']';
		}

		foreach ($error_ary as $error_msg)
		{
			$this->warn_msg[] = $error_msg;
		}

		return $out;
	}

	function validate_email($var1, $var2)
	{
		$var1 = stripslashes($var1);
		$var2 = stripslashes($var2);

		$retval = '[email' . $var1 . ':' . $this->bbcode_uid . ']' . $var2 . '[/email:' . $this->bbcode_uid . ']';
		return $retval;
	}

	function validate_url($var1, $var2)
	{
		$url = (!empty($var1)) ? stripslashes($var1) : stripslashes($var2);

		// Put validation regexps here
		$valid = FALSE;
		if (preg_match('#^http(s?)://#i', $url))
		{
			$valid = TRUE;
		}
		if ($valid)
		{
			return (empty($url)) ? '[url:' . $this->bbcode_uid . ']' . $url . '[/url:' . $this->bbcode_uid . ']' : "[url=$url:" . $this->bbcode_uid . ']' . stripslashes($var2) . '[/url:' . $this->bbcode_uid . ']';
		}
		return '[url' . ((!empty($var1)) ? '=' . stripslashes($var1) : '') . ']' . stripslashes($var2) . '[/url]';
	}

	// Replace magic urls of form http://xxx.xxx., www.xxx. and xxx@xxx.xxx.
	// Cuts down displayed size of link if over 50 chars, turns absolute links
	// into relative versions when the server/script path matches the link
	function magic_url($url)
	{
		global $config;

		if ($url)
		{
			$server_protocol = ( $config['cookie_secure'] ) ? 'https://' : 'http://';
			$server_port = ( $config['server_port'] <> 80 ) ? ':' . trim($config['server_port']) . '/' : '/';

			$match = array();
			$replace = array();

			// relative urls for this board
			$match[] = '#(^|[\n ])' . $server_protocol . trim($config['server_name']) . $server_port . preg_replace('/^\/?(.*?)(\/)?$/', '\1', trim($config['script_path'])) . '/([^ \t\n\r <"\']+)#i';
			$replace[] = '<!-- l --><a href="\1" target="_blank">\1</a><!-- l -->';

			// matches a xxxx://aaaaa.bbb.cccc. ...
			$match[] = '#(^|[\n ])([\w]+?://.*?[^ \t\n\r<"]*)#ie';
			$replace[] = "'\\1<!-- m --><a href=\"\\2\" target=\"_blank\">' . ((strlen('\\2') > 55) ? substr('\\2', 0, 39) . ' ... ' . substr('\\2', -10) : '\\2') . '</a><!-- m -->'";

			// matches a "www.xxxx.yyyy[/zzzz]" kinda lazy URL thing
			$match[] = '#(^|[\n ])(www\.[\w\-]+\.[\w\-.\~]+(?:/[^ \t\n\r<"]*)?)#ie';
			$replace[] = "'\\1<!-- w --><a href=\"http://\\2\" target=\"_blank\">' . ((strlen('\\2') > 55) ? substr(str_replace(' ', '%20', '\\2'), 0, 39) . ' ... ' . substr('\\2', -10) : '\\2') . '</a><!-- w -->'";

			// matches an email@domain type address at the start of a line, or after a space.
			$match[] = '#(^|[\n ])([a-z0-9&\-_.]+?@[\w\-]+\.([\w\-\.]+\.)?[\w]+)#ie';
			$replace[] = "'\\1<!-- e --><a href=\"mailto:\\2\">' . ((strlen('\\2') > 55) ? substr('\\2', 0, 39) . ' ... ' . substr('\\2', -10) : '\\2') . '</a><!-- e -->'";

			$this->message = preg_replace($match, $replace, $this->message);
		}
	}

	function emoticons($smile)
	{
		global $db, $user, $phpbb_root_path;

		$sql = "SELECT * 
			FROM " . SMILIES_TABLE;
		$result = $db->sql_query($sql);

		if ($row = $db->sql_fetchrow($result))
		{
			$match = $replace = array();
			do
			{
				$match[] = "#(?<=.\W|\W.|^\W)" . preg_quote($row['code'], '#') . "(?=.\W|\W.|\W$)#";
				$replace[] = '<!-- s' . $row['code'] . ' --><img src="{SMILE_PATH}/' . $phpbb_root_path . $row['smile_url'] . '" border="0" alt="' . $row['emoticon'] . '" title="' . $row['emoticon'] . '" /><!-- s' . $row['code'] . ' -->';
			}
			while ($row = $db->sql_fetchrow($result));

			$this->message = preg_replace($match, $replace, ' ' . $this->message . ' ');
		}
		$db->sql_freeresult($result);
	}

	function parse_attachments($mode, $post_id, $submit, $preview, $refresh)
	{
		global $config, $_FILE, $_POST, $auth, $user;

		$error = array();

		$num_attachments = count($this->attachment_data);
		$this->filename_data['filecomment'] = (isset($_POST['filecomment'])) ? trim(strip_tags($_POST['filecomment'])) : '';
		$this->filename_data['filename'] = ($_FILES['fileupload']['name'] != 'none') ? trim($_FILES['fileupload']['name']) : '';
		
		$add_file		= (isset($_POST['add_file'])) ? TRUE : FALSE;
		$delete_file	= (isset($_POST['delete_file'])) ? TRUE : FALSE;
		$edit_comment	= (isset($_POST['edit_comment'])) ? TRUE : FALSE;

		if ($submit && ($mode == 'post' || $mode == 'reply' || $mode == 'edit') && $this->filename_data['filename'] != '')
		{
			if ($num_attachments < $config['max_attachments'] || $auth->acl_gets('m_', 'a_'))
			{
				$filedata = upload_attachment($this->filename_data['filename']);
				
				$error = $filedata['error'];

				if ($filedata['post_attach'] && !count($error))
				{
					$new_entry = array(
						'physical_filename'	=> $filedata['destination_filename'],
						'comment'			=> $this->filename_data['filecomment'],
						'real_filename'		=> $filedata['filename'],
						'extension'			=> $filedata['extension'],
						'mimetype'			=> $filedata['mimetype'],
						'filesize'			=> $filedata['filesize'],
						'filetime'			=> $filedata['filetime'],
						'attach_id'			=> '-1',
						'thumbnail'			=> $filedata['thumbnail']
					);

					$this->attachment_data = array_merge(array(0 => $new_entry), $this->attachment_data);
					$this->filename_data['filecomment'] = '';

					// This Variable is set to FALSE here, because Attachments are entered into the
					// Database in two modes, one if the id_list is -1 and the second one if post_attach is true
					// Since post_attach is automatically switched to true if an Attachment got added to the filesystem,
					// but we are assigning an id of -1 here, we have to reset the post_attach variable to FALSE.
					//
					// This is very relevant, because it could happen that the post got not submitted, but we do not
					// know this circumstance here. We could be at the posting page or we could be redirected to the entered
					// post. :)
					$filedata['post_attach'] = FALSE;
				}
			}
			else
			{
				$error[] = sprintf($user->lang['TOO_MANY_ATTACHMENTS'], $config['max_attachments']);
			}
		}

		if ($preview || $refresh || count($error))
		{
			// Perform actions on temporary attachments
			if ($delete_file)
			{
				foreach ($_POST['delete_file'] as $index => $value)
				{
					// delete selected attachment
					if ($this->attachment_data[$index]['attach_id'] == '-1')
					{
						phpbb_unlink($this->attachment_data[$index]['physical_filename'], 'file', $config['use_ftp_upload']);

						if ($this->attachment_data[$index]['thumbnail'] == 1)
						{
							phpbb_unlink('t_' . $this->attachment_data[$index]['physical_filename'], 'thumbnail', $config['use_ftp_upload']);
						}
					}
					else
					{
						delete_attachment($post_id, intval($this->attachment_data[$index]['attach_id']));
					}
					unset($this->attachment_data[$index]);
				}
				
				// a quick way to reindex the array. :)
				$this->attachment_data = array_merge($this->attachment_data);
			}
			else if ($edit_comment || $add_file || $preview)
			{
				if ($edit_comment)
				{
					$actual_comment_list = (isset($_POST['comment_list'])) ? $_POST['comment_list'] : '';

					foreach ($actual_comment_list as $index => $entry)
					{
						$this->attachment_data[$index]['comment'] = $entry;
					}
				}
				
				if (($add_file || $preview) && $this->filename_data['filename'] != '')
				{
					if ($num_attachments < $config['max_attachments'] || $auth->acl_gets('m_', 'a_'))
					{
						$filedata = upload_attachment($this->filename_data['filename']);
				
						$error = array_merge($error, $filedata['error']);

						if (!count($error))
						{
							$new_entry = array(
								'physical_filename'	=> $filedata['destination_filename'],
								'comment'			=> $this->filename_data['filecomment'],
								'real_filename'		=> $filedata['filename'],
								'extension'			=> $filedata['extension'],
								'mimetype'			=> $filedata['mimetype'],
								'filesize'			=> $filedata['filesize'],
								'filetime'			=> $filedata['filetime'],
								'attach_id'			=> '-1',
								'thumbnail'			=> $filedata['thumbnail']
							);

							$this->attachment_data = array_merge(array(0 => $new_entry), $this->attachment_data);
							$this->filename_data['filecomment'] = '';
						}
					}
					else
					{
						$error[] = sprintf($user->lang['TOO_MANY_ATTACHMENTS'], $config['max_attachments']);
					}
				}
			}
		}

		foreach ($error as $error_msg)
		{
			$this->warn_msg[] = $error_msg;
		}
	}

	// Parse Poll
	function parse_poll(&$poll, $poll_data)
	{
		global $auth, $forum_id, $user, $config;

		// Process poll options
		if (!empty($poll_data['poll_option_text']) && 
			(($auth->acl_get('f_poll', $forum_id) && !$poll_data['poll_last_vote']) || 
			$auth->acl_get('m_edit', $forum_id)))
		{
			if (($result = $this->parse($poll_data['poll_option_text'], $poll_data['enable_html'], $poll_data['enable_bbcode'], $poll_data['bbcode_uid'], $poll_data['enable_urls'], $poll_data['enable_smilies'], false)) != '')
			{
				$this->warn_msg[] = $result;
			}

			$poll['poll_options'] = explode("\n", trim($poll_data['poll_option_text']));
			$poll['poll_options_size'] = sizeof($poll['poll_options']);
			
			if (sizeof($poll['poll_options']) == 1)
			{
				$this->warn_msg[] = $user->lang['TOO_FEW_POLL_OPTIONS'];
			}
			elseif (sizeof($poll['poll_options']) > intval($config['max_poll_options']))
			{
				$this->warn_msg[] = $user->lang['TOO_MANY_POLL_OPTIONS'];
			}
			elseif (sizeof($poll['poll_options']) < $poll['poll_options_size'])
			{
				$this->warn_msg[] = $user->lang['NO_DELETE_POLL_OPTIONS'];
			}
			elseif ($poll_data['poll_max_options'] > sizeof($poll['poll_options']))
			{
				$this->warn_msg[] = $user->lang['TOO_MANY_USER_OPTIONS'];
			}

			$poll['poll_title'] = (!empty($poll_data['poll_title'])) ? trim(htmlspecialchars(strip_tags($poll_data['poll_title']))) : '';
			$poll['poll_length'] = (!empty($poll_data['poll_length'])) ? intval($poll_data['poll_length']) : 0;

			if (empty($poll['poll_title']) && $poll['poll_options_size'])
			{
				$this->warn_msg[] = $user->lang['NO_POLL_TITLE'];
			}
		}

		$poll['poll_start'] = $poll_data['poll_start'];
		$poll['poll_max_options'] = ($poll_data['poll_max_options'] < 1) ? 1 : (($poll_data['poll_max_options'] > $config['max_poll_options']) ? $config['max_poll_options'] : $poll_data['poll_max_options']);
	}
}

// Parses a given message and updates/maintains the fulltext tables
class fulltext_search
{
	function split_words(&$text)
	{
		global $user, $config;

		static $drop_char_match, $drop_char_replace, $stopwords, $synonyms;

		// Is the fulltext indexer disabled? If yes then we need not 
		// carry on ... it's okay ... I know when I'm not wanted boo hoo
		if (empty($config['load_search_upd']))
		{
			return;
		}

		if (empty($drop_char_match))
		{
			$drop_char_match =   array('^', '$', '&', '(', ')', '<', '>', '`', '\'', '"', '|', ',', '@', '_', '?', '%', '-', '~', '+', '.', '[', ']', '{', '}', ':', '\\', '/', '=', '#', '\'', ';', '!', '*');
			$drop_char_replace = array(' ', ' ', ' ', ' ', ' ', ' ', ' ', '',  '',   ' ', ' ', ' ', ' ', '',  ' ', ' ', '',  ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '' ,  ' ', ' ', ' ', ' ',  ' ', ' ', ' ');
			$stopwords = @file($user->lang_path . '/search_stopwords.txt');
			$synonyms = @file($user->lang_path . '/search_synonyms.txt');
		}

		$match = array();
		// New lines, carriage returns
		$match[] = "#[\n\r]+#";
		// NCRs like &nbsp; etc.
		$match[] = '#&[\#a-z0-9]+?;#i';
		// URL's
		$match[] = '#\b[\w]+:\/\/[a-z0-9\.\-]+(\/[a-z0-9\?\.%_\-\+=&\/]+)?#';
		// BBcode
		$match[] = '#\[img:[a-z0-9]{10,}\].*?\[\/img:[a-z0-9]{10,}\]#';
		$match[] = '#\[\/?url(=.*?)?\]#';
		$match[] = '#\[\/?[a-z\*=\+\-]+(\:?[0-9a-z]+)?:[a-z0-9]{10,}(\:[a-z0-9]+)?=?.*?\]#';
		// Sequences < min_search_chars & < max_search_chars
		$match[] = '#\b([a-z0-9]{1,' . $config['min_search_chars'] . '}|[a-z0-9]{' . $config['max_search_chars'] . ',})\b#is';

		$text = preg_replace($match, ' ', ' ' . strtolower($text) . ' ');

		// Filter out non-alphabetical chars
		$text = str_replace($drop_char_match, $drop_char_replace, $text);

		if (!empty($stopwords_list))
		{
			$text = str_replace($stopwords, '', $text);
		}

		if (!empty($synonyms))
		{
			for ($j = 0; $j < count($synonyms); $j++)
			{
				list($replace_synonym, $match_synonym) = split(' ', trim(strtolower($synonyms[$j])));
				if ( $mode == 'post' || ( $match_synonym != 'not' && $match_synonym != 'and' && $match_synonym != 'or' ) )
				{
					$text =  preg_replace('#\b' . trim($match_synonym) . '\b#', ' ' . trim($replace_synonym) . ' ', $text);
				}
			}
		}

		preg_match_all('#\b([\w]+)\b#', $text, $split_entries);

		return array_unique($split_entries[1]);
	}

	function add(&$mode, &$post_id, &$message, &$subject)
	{
		global $config, $db;

		// Is the fulltext indexer disabled? If yes then we need not 
		// carry on ... it's okay ... I know when I'm not wanted boo hoo
		if (empty($config['load_search_upd']))
		{
			return;
		}

//		$mtime = explode(' ', microtime());
//		$starttime = $mtime[1] + $mtime[0];

		// Split old and new post/subject to obtain array of 'words'
		$split_text = $this->split_words($message);
		$split_title = ($subject) ? $this->split_words($subject) : array();

		$words = array();
		if ($mode == 'edit')
		{
			$sql = 'SELECT w.word_id, w.word_text, m.title_match
				FROM ' . SEARCH_WORD_TABLE . ' w, ' . SEARCH_MATCH_TABLE . " m
				WHERE m.post_id = $post_id 
					AND w.word_id = m.word_id";
			$result = $db->sql_query($sql);

			$cur_words = array();
			while ($row = $db->sql_fetchrow($result))
			{
				$which = ($row['title_match']) ? 'title' : 'post';
				$cur_words[$which][$row['word_text']] = $row['word_id'];
			}
			$db->sql_freeresult($result);

			$words['add']['post'] = array_diff($split_text, array_keys($cur_words['post']));
			$words['add']['title'] = array_diff($split_title, array_keys($cur_words['title']));
			$words['del']['post'] = array_diff(array_keys($cur_words['post']), $split_text);
			$words['del']['title'] = array_diff(array_keys($cur_words['title']), $split_title);
		}
		else
		{
			$words['add']['post'] = $split_text;
			$words['add']['title'] = $split_title;
			$words['del']['post'] = array();
			$words['del']['title'] = array();
		}
		unset($split_text);
		unset($split_title);

		// Get unique words from the above arrays
		$unique_add_words = array_unique(array_merge($words['add']['post'], $words['add']['title']));

		// We now have unique arrays of all words to be added and removed and
		// individual arrays of added and removed words for text and title. What
		// we need to do now is add the new words (if they don't already exist)
		// and then add (or remove) matches between the words and this post
		if (sizeof($unique_add_words))
		{
			$sql = 'SELECT word_id, word_text
				FROM ' . SEARCH_WORD_TABLE . '
				WHERE word_text IN (' . implode(', ', preg_replace('#^(.*)$#', '\'\1\'', $unique_add_words)) . ")";
			$result = $db->sql_query($sql);

			$word_ids = array();
			while ($row = $db->sql_fetchrow($result))
			{
				$word_ids[$row['word_text']] = $row['word_id'];
			}
			$db->sql_freeresult($result);

			$new_words = array_diff($unique_add_words, array_keys($word_ids));
			unset($unique_add_words);

			if (sizeof($new_words))
			{
				switch (SQL_LAYER)
				{
					case 'mysql':
					case 'mysql4':
						$sql = 'INSERT INTO ' . SEARCH_WORD_TABLE . ' (word_text)
							VALUES ' . implode(', ', preg_replace('#^(.*)$#', '(\'\1\')',  $new_words));
						$db->sql_query($sql);
						break;

					case 'mssql':
					case 'sqlite':
						$sql = 'INSERT INTO ' . SEARCH_WORD_TABLE . ' (word_text) ' . implode(' UNION ALL ', preg_replace('#^(.*)$#', "SELECT '\\1'",  $new_words));
						$db->sql_query($sql);
						break;

					default:
						foreach ($new_words as $word)
						{
							$sql = 'INSERT INTO ' . SEARCH_WORD_TABLE . " (word_text)
								VALUES ('$word')";
							$db->sql_query($sql);
						}
						break;
				}
			}
			unset($new_words);
		}

		foreach ($words['del'] as $word_in => $word_ary)
		{
			$title_match = ($word_in == 'title') ? 1 : 0;

			if (sizeof($word_ary))
			{
				$sql_in = array();
				foreach ($word_ary as $word)
				{
					$sql_in[] = $cur_words[$word_in][$word];
				}

				$sql = 'DELETE FROM ' . SEARCH_MATCH_TABLE . ' 
					WHERE word_id IN (' . implode(', ', $sql_in) . ') 
						AND post_id = ' . intval($post_id) . " 
						AND title_match = $title_match";
				$db->sql_query($sql);
				unset($sql_in);
			}
		}

		foreach ($words['add'] as $word_in => $word_ary)
		{
			$title_match = ($word_in == 'title') ? 1 : 0;

			if (sizeof($word_ary))
			{
				$sql = 'INSERT INTO ' . SEARCH_MATCH_TABLE . " (post_id, word_id, title_match) 
					SELECT $post_id, word_id, $title_match 
					FROM " . SEARCH_WORD_TABLE . ' 
					WHERE word_text IN (' . implode(', ', preg_replace('#^(.*)$#', '\'\1\'', $word_ary)) . ')';
				$db->sql_query($sql);
			}
		}

		unset($words);

//		$mtime = explode(' ', microtime());
//		echo "Search parser time taken >> " . ($mtime[1] + $mtime[0] - $starttime);

		// Run the cleanup infrequently, once per session cleanup
		if ($config['search_last_gc'] < time() - $config['search_gc'])
		{
//			$this->search_tidy();
		}
	}

	// Tidy up indexes, tag 'common words', remove
	// words no longer referenced in the match table, etc.
	function search_tidy()
	{
		global $db, $config;

		// Is the fulltext indexer disabled? If yes then we need not 
		// carry on ... it's okay ... I know when I'm not wanted boo hoo
		if (empty($config['load_search_upd']))
		{
			return;
		}

		// Remove common (> 60% of posts ) words
		$sql = "SELECT SUM(forum_posts) AS total_posts 
			FROM " . FORUMS_TABLE;
		$result = $db->sql_query($sql);

		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		if ($row['total_posts'] >= 100)
		{
			$sql = 'SELECT word_id
				FROM ' . SEARCH_MATCH_TABLE . '
				GROUP BY word_id
				HAVING COUNT(word_id) > ' . floor($row['total_posts'] * 0.6);
			$result = $db->sql_query($sql);

			if ($row = $db->sql_fetchrow($result))
			{
				$sql_in = array();
				do
				{
					$sql_in[] = $row['word_id'];
				}
				while ($row = $db->sql_fetchrow($result));

				$sql_in = implode(', ', $sql_in);

				$sql = 'UPDATE ' . SEARCH_WORD_TABLE . "
					SET word_common = 1
					WHERE word_id IN ($sql_in)";
				$db->sql_query($sql);

				$sql = 'DELETE FROM ' . SEARCH_MATCH_TABLE . "
					WHERE word_id IN ($sql_in)";
				$db->sql_query($sql);
				unset($sql_in);
			}
			$db->sql_freeresult($result);
		}

		// Remove words with no matches ... this is a potentially nasty query
		$sql = 'SELECT w.word_id
			FROM ( ' . SEARCH_WORD_TABLE . ' w
			LEFT JOIN ' . SEARCH_MATCH_TABLE . ' m ON w.word_id = m.word_id
				AND m.word_id IS NULL
			GROUP BY m.word_id';
		$result = $db->sql_query($sql);

		if ($row = $db->sql_fetchrow($result))
		{
			$sql_in = array();
			do
			{
				$sql_in[] = $row['word_id'];
			}
			while ($row = $db->sql_fetchrow($result));

			$sql = 'DELETE FROM ' . SEARCH_WORD_TABLE . '
				WHERE word_id IN (' . implode(', ', $sql_in) . ')';
			$db->sql_query($sql);
			unset($sql_in);
		}
		$db->sql_freeresult($result);
	}
}

?>