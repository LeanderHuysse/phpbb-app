<?php
/***************************************************************************
 *                               acm_db.php
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

class acm
{
	var $is_modified = FALSE;
	var $vars = '';

	function load($var_names = '')
	{
		global $db;
		$this->vars = array();

		$sql = 'SELECT var_name, var_ts, var_data
			FROM ' . CACHE_TABLE;
		
		if (!empty($var_names))
		{
			$sql .= " WHERE var_name IN ('" . implode("', '", $var_names) . "')";
		}

		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$this->vars[$row['var_name']] = array(
				'data'	=>	unserialize($row['var_data']),
				'ts'		=>	intval($row['var_ts'])
			);
		}
	}

	function unload()
	{
		$this->save();
		unset($this->vars);
	}

	function save() 
	{
		if (!$this->is_modified)
		{
			return;
		}

		global $db;

		$delete = $insert = array();
		foreach ($this->vars as $var_name => $var_ary)
		{
			if (!empty($var_ary['is_modified']))
			{
				if (!empty($var_ary['delete']))
				{
					$delete[] = $var_name;
				}
				else
				{
					$delete[] = $var_name;
					$insert[] = "'$var_name', " . time() . ", '" . $db->sql_escape(serialize($var_ary['data'])) . "'";
				}

				$db->sql_query($sql);
			}
		}

		if (count($delete))
		{
			$sql = 'DELETE FROM ' . CACHE_TABLE . "
				WHERE var_name IN ('" . implode("', '", $delete) . "')";
			$db->sql_query($sql);
		}
		if (count($insert))
		{
			switch (SQL_LAYER)
			{
				case 'mysql':
					$sql = 'INSERT INTO ' . CACHE_TABLE . ' (var_name, var_ts, var_data)
						VALUES (' . implode('), (', $insert) . ')';
					$db->sql_query($sql);
				break;
			
				default:
					foreach ($insert as $values)
					{
						$sql = 'INSERT INTO ' . CACHE_TABLE . " (var_name, var_ts, var_data)
							VALUES ($values)";
						$db->sql_query($sql);
					}
			}
		}

		$this->is_modified = FALSE;
	}

	function tidy($max_age = 0)
	{
		global $db;

		$sql = 'DELETE FROM ' . CACHE_TABLE . '
			WHERE var_ts < ' . (time() - $max_age);
		$db->sql_query($sql);
	}

	function get($var_name, $max_age = 0)
	{
		return ($this->exists($var_name, $max_age)) ? $this->vars[$var_name]['data'] : NULL;
	}

	function put($var_name, $var_data)
	{
		$this->vars[$var_name] = array(
			'data'			=>	$var_data,
			'ts'				=>	time(),
			'is_modified'	=>	TRUE
		);

		$this->is_modified = TRUE;
	}

	function destroy($var_name, $void = NULL)
	{
		if (isset($this->vars[$var_name]))
		{
			$this->is_modified = TRUE;

			$this->vars[$var_name] = array(
				'is_modified'	=>	TRUE,
				'delete'			=>	TRUE
			);
		}
	}

	function exists($var_name, $max_age = 0)
	{
		if (!is_array($this->vars))
		{
			$this->load();
		}

		if ($max_age > 0 && isset($this->vars[$var_name]))
		{
			if ($this->vars[$var_name]['ts'] + $max_age < time())
			{
				$this->destroy($var_name);
				return FALSE;
			}
		}

		return isset($this->vars[$var_name]);
	}
}
?>