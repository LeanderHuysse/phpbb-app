<?php
/***************************************************************************
 *                              bbcode.php
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

class bbcode
{
	var $bbcode_uid = '';
	var $bbcode_bitfield = 0;
	var $bbcode_cache = array();

	function bbcode($bitfield = 0)
	{
		if ($bitfield)
		{
			$this->bbcode_bitfield = $bitfield;
			$this->bbcode_cache_init();
		}
	}

	function bbcode_second_pass(&$message, $bbcode_uid = '', $bbcode_bitfield = '')
	{
		if (empty($this->bbcode_cache))
		{
			$this->bbcode_cache_init();
		}

		if ($bbcode_uid)
		{
			$this->bbcode_uid = $bbcode_uid;
		}
		if ($bbcode_bitfield)
		{
			$this->bbcode_bitfield = $bbcode_bitfield;
		}

		$str = array('search' => array(), 'replace' => array());
		$preg = array('search' => array(), 'replace' => array());

		$bitlen = strlen(decbin($this->bbcode_bitfield));
		for ($bbcode_id = 0; $bbcode_id < $bitlen; ++$bbcode_id)
		{
			if ($this->bbcode_bitfield & pow(2, $bbcode_id))
			{
				foreach ($this->bbcode_cache[$bbcode_id] as $type => $array)
				{
					foreach ($array as $search => $replace)
					{
						${$type}['search'][] = str_replace('$uid', $this->bbcode_uid, $search);
						${$type}['replace'][] = $replace;

					}
				}
			}
		}


		if (count($str['search']))
		{
			$message = str_replace($str['search'], $str['replace'], $message);
		}
		if (count($preg['search']))
		{
			$message = preg_replace($preg['search'], $preg['replace'], $message);
		}

		return $message;
	}
	
	//
	// bbcode_cache_init()
	//
	// requires: $this->bbcode_bitfield
	// sets: $this->bbcode_cache with bbcode templates needed for bbcode_bitfield
	//
	function bbcode_cache_init()
	{
		$sql = '';

		$bbcode_ids = array();
		$bitlen = strlen(decbin($this->bbcode_bitfield));

		for ($bbcode_id = 0; $bbcode_id < $bitlen; ++$bbcode_id)
		{
			if (isset($this->bbcode_cache[$bbcode_id]) || !($this->bbcode_bitfield & pow(2, $bbcode_id)))
			{
				continue;
			}

			$bbcode_ids[] = $bbcode_id;

			// WARNING: hardcoded values. it assumes that bbcodes with bbcode_id > 11 are user-defined bbcodes
			// and it has to be specified which bbcodes need the template to be loaded
			if ($bbcode_id > 11)
			{
				$sql .= $bbcode_id . ',';
			}
			// WARNING: even more hardcoded stuff - define which bbcodes need template
			elseif (in_array($bbcode_id, array(0, 5, 6, 8, 9)))
			{
				$load_template = TRUE;
			}
		}
		if (!empty($load_template))
		{
			global $template, $user;

			$tpl_filename = $template->make_filename('bbcode.html');

			if (!$fp = @fopen($tpl_filename, 'rb'))
			{
				trigger_error('Could not load bbcode template');
			}
			$tpl = fread($fp, filesize($tpl_filename));
			@fclose($fp);
			
			// replace \ with \\ and then ' with \'.
			$tpl = str_replace('\\', '\\\\', $tpl);
			$tpl = str_replace("'", "\'", $tpl);
			
			// strip newlines.
			$tpl  = str_replace("\n", '', $tpl);
			
			// Turn template blocks into PHP assignment statements for the values of $bbcode_tpl..
			$tpl = preg_replace('#<!-- BEGIN (.*?) -->(.*?)<!-- END (.*?) -->#', "\n" . "\$this->bbcode_tpl['\\1'] = trim('\\2');", $tpl);
			
			$this->bbcode_tpl = array();
			eval($tpl);

			$this->bbcode_tpl['quote_open'] = str_replace('{L_QUOTE}', $user->lang['QUOTE'], $this->bbcode_tpl['quote_open']);
			$this->bbcode_tpl['quote_username_open'] = str_replace('{L_QUOTE}', $user->lang['QUOTE'], $this->bbcode_tpl['quote_username_open']);
			$this->bbcode_tpl['quote_username_open'] = str_replace('{L_WROTE}', $user->lang['WROTE'], $this->bbcode_tpl['quote_username_open']);
			$this->bbcode_tpl['quote_username_open'] = str_replace('{USERNAME}', '\\1', $this->bbcode_tpl['quote_username_open']);
			$this->bbcode_tpl['code_open'] = str_replace('{L_CODE}', $user->lang['CODE'], $this->bbcode_tpl['code_open']);
		}

		if ($sql)
		{
			global $db;
			$rowset = array();

			$sql = 'SELECT bbcode_id, second_pass_regexp, second_pass_replacement
					FROM ' . BBCODES_TABLE . '
					WHERE bbcode_id IN (' . substr($sql, 0, -1) . ')
					ORDER BY bbcode_id';

			$result = $db->sql_query($sql);
			while ($row = $db->sql_fetchrow($result))
			{
				$rowset[$row['bbcode_id']] = $row;
			}
			$db->sql_freeresult($result);
		}

		foreach ($bbcode_ids as $bbcode_id)
		{
			switch ($bbcode_id)
			{
				case 0:
					$this->bbcode_cache[$bbcode_id] = array(
						'str' => array(
							'[quote:$uid]'			=>	$this->bbcode_tpl['quote_open'],
							'[/quote:$uid]'			=>	$this->bbcode_tpl['quote_close']
						),
						'preg' => array(
							'#\[quote:$uid="(.*?)"\]#'	=>	$this->bbcode_tpl['quote_username_open']
						)
					);
				break;
				case 1:
					$this->bbcode_cache[$bbcode_id] = array(
						'str' => array(
							'[b:$uid]'				=>	'<span style="font-weight: bold">',
							'[/b:$uid]'				=>	'</span>'
						)
					);
				break;
				case 2:
					$this->bbcode_cache[$bbcode_id] = array(
						'str' => array(
							'[i:$uid]'				=>	'<span style="font-style: italic">',
							'[/i:$uid]'				=>	'</span>'
						)
					);
				break;
				case 3:
					$this->bbcode_cache[$bbcode_id] = array(
						'preg' => array(
							'#\[url:$uid\](.*?)\[/url:$uid\]#s'		=>	'<a href="\1" target="_blank">\1</a>',
							'#\[url=(.*?):$uid\](.*?)\[/url:$uid\]#s'	=>	'<a href="\1" target="_blank">\2</a>'
						)
					);
				break;
				case 4:
					$this->bbcode_cache[$bbcode_id] = array(
						'preg' => array(
							'#\[img:$uid\](.*?)\[/img:$uid\]#s'		=>	'<img src="\1" border="0" />'
						)
					);
				break;
				case 5:
					$this->bbcode_cache[$bbcode_id] = array(
						'preg' => array(
							'#\[size=(.*?):$uid\](.*?)\[/size:$uid\]#s'	=>	'<span style="font-size: \1px; line-height: normal">\2</span>'
						)
					);
				break;
				case 6:
					$this->bbcode_cache[$bbcode_id] = array(
						'preg' => array(
							'#\[color=(.*?):$uid\](.*?)\[/color:$uid\]#s'	=>	'<span style="color: \1">\2</span>'
						)
					);
				break;
				case 7:
					$this->bbcode_cache[$bbcode_id] = array(
						'str' => array(
							'[u:$uid]'				=>	'<span style="text-decoration: underline">',
							'[/u:$uid]'				=>	'</span>'
						)
					);
				break;
				case 8:
					$this->bbcode_cache[$bbcode_id] = array(
						'preg' => array(
							'#\[code(?:=([a-z]+))?:$uid\](.*?)\[/code:$uid\]#ise'		=>	"\$this->bbcode_second_pass_code('\\1', '\\2')"
						)
					);
				break;
				case 9:
					$this->bbcode_cache[$bbcode_id] = array(
						'str' => array(
							'[list:$uid]'			=>	'<ul>',
							'[/list:u:$uid]'		=>	'</ul>',
							'[/list:o:$uid]'		=>	'</ol>',
							'[*:$uid]'				=>	'<li>'
						),
						'preg' => array(
							'#\[list=(.+?):$uid\]#e'	=>	"\$this->bbcode_ordered_list('\\1')",
						)
					);
				break;
				case 10:
					$this->bbcode_cache[$bbcode_id] = array(
						'preg' => array(
							'#\[email:$uid\](.*?)\[/email:$uid\]#is'		=>	'<a href="mailto:\1">\1</a>',
							'#\[email=(.*?):$uid\](.*?)\[/email:$uid\]#is'	=>	'<a href="mailto:\1">\2</a>'
						)
					);
				break;
				case 11:
					$this->bbcode_cache[$bbcode_id] = array(
						'preg' => array(
							'#\[flash:$uid\](.*?)\[/flash:$uid\]#'	=>	'<object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" codebase="http://active.macromedia.com/flash2/cabs/swflash.cab#version=5,0,0,0"><param name="movie" value="\1"><param name="play" value="1"><param name="loop" value="1"><param name="quality" value="high"><embed src="\1" play="1" loop="1" quality="high"></embed></object>'
						)
					);
				break;
				default:
					if (isset($rowset[$bbcode_id]))
					{
						$this->bbcode_cache[$bbcode_id] = array(
							'preg' => array($rowset[$bbcode_id]['second_pass_regexp'], $rowset[$bbcode_id]['second_pass_replacement'])
						);
					}
					else
					{
						$this->bbcode_cache[$bbcode_id] = array();
					}
			}
		}
	}
	
	function bbcode_ordered_list($chr)
	{
		if (is_numeric($chr))
		{
			$start = $chr;
			$chr = '1';
		}
		elseif (strtolower($chr) == 'i')
		{
			$start = 1;
		}
		else
		{
			$start = ord(strtolower($chr)) - 96;
			$chr = 'a';
		}
		return '<ol type="' . $chr . '" start="' . $start . '">';
	}

	function bbcode_second_pass_code($type, $code)
	{
		$code = stripslashes(str_replace("\r\n", "\n", $code));

		switch ($type)
		{
			case 'php':
				$remove_tags = FALSE;
				if (!preg_match('/<\?(php)? .*? \?>/', $code))
				{
					$remove_tags = TRUE;
					$code = "<?php $code ?>";
				}

				$str_from = array('<', '>', '"', ':', '[', ']', '(', ')', '{', '}', '.', '@');
				$str_to = array('&lt;', '&gt;', '&quot;', '&#58;', '&#91;', '&#93;', '&#40;', '&#41;', '&#123;', '&#125;', '&#46;', '&#64;');

				$code = str_replace($str_to, $str_from, $code);

				ob_start();
				highlight_string($code);
				$code = ob_get_contents();
				ob_end_clean();

				if ($remove_tags)
				{
					$code = preg_replace('/(.*?)&lt;\?php&nbsp;(.*)\?&gt;(.*?)/', '\1\2\3', $code);
				}

				$code = preg_replace('!^<code>[\n\r\s\t]*<font color="#[a-z0-9]+">[\n\r\s\t]*(.*)</font>[\n\r\s\t]*</code>[\n\r\s\t]*!is', '\\1', $code);
			break;
		
			default:
				$code = str_replace("\t", '&nbsp; &nbsp;', $code);
				$code = str_replace('  ', '&nbsp; ', $code);
				$code = str_replace('  ', ' &nbsp;', $code);
		}

		$code = $this->bbcode_tpl['code_open'] . $code . $this->bbcode_tpl['code_close'];

		return $code;
	}
}
?>