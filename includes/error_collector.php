<?php

class phpbb_error_collector
{
	var $errors;

	function phpbb_error_collector()
	{
		$this->errors = array();
	}

	function install()
	{
		set_error_handler(array(&$this, 'error_handler'));
	}

	function uninstall()
	{
		restore_error_handler();
	}

	function error_handler($errno, $msg_text, $errfile, $errline)
	{
		$this->errors[] = array($errno, $msg_text, $errfile, $errline);
	}

	function format_errors()
	{
		$text = '';
		foreach ($this->errors as $error)
		{
			if (!empty($text))
			{
				$text .= "<br />\n";
			}
			list($errno, $msg_text, $errfile, $errline) = $error;
			$text .= "Errno $errno: $msg_text";
			if (defined('DEBUG'))
			{
				$text .= " at $errfile line $errline";
			}
		}
		return $text;
	}
}
