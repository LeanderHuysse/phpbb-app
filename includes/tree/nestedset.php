<?php
/**
*
* @package Tree - Nested Set
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

abstract class phpbb_tree_nestedset implements phpbb_tree_interface
{
	/** @var phpbb_db_driver */
	protected $db;

	/** @var phpbb_lock_db */
	protected $lock;

	/** @var string */
	protected $table_name;

	/**
	* Prefix for the language keys returned by exceptions
	* @var string
	*/
	protected $message_prefix = '';

	/**
	* Column names in the table
	* @var string
	*/
	protected $column_item_id = 'item_id';
	protected $column_left_id = 'left_id';
	protected $column_right_id = 'right_id';
	protected $column_parent_id = 'parent_id';
	protected $column_item_parents = 'item_parents';

	/**
	* Additional SQL restrictions
	* Allows to have multiple nested sets in one table
	* @var string
	*/
	protected $sql_where = '';

	/**
	* List of item properties to be cached in $item_parents
	* @var array
	*/
	protected $item_basic_data = array('*');

	/**
	* Returns additional sql where restrictions
	*
	* @param string		$operator		SQL operator that needs to be prepended to sql_where,
	*									if it is not empty.
	* @param string		$column_prefix	Prefix that needs to be prepended to column names
	* @return bool True if the item was deleted
	*/
	public function get_sql_where($operator = 'AND', $column_prefix = '')
	{
		return (!$this->sql_where) ? '' : $operator . ' ' . sprintf($this->sql_where, $column_prefix);
	}

	/**
	* @inheritdoc
	*/
	public function insert(array $additional_data)
	{
		$item_data = $this->reset_nestedset_values($additional_data);

		$sql = 'INSERT INTO ' . $this->table_name . ' ' . $this->db->sql_build_array('INSERT', $item_data);
		$this->db->sql_query($sql);

		$item_data[$this->column_item_id] = (int) $this->db->sql_nextid();

		return array_merge($item_data, $this->add($item_data));
	}

	/**
	* Add an existing item at the end of the tree
	*
	* @param array	$item	The item to be added
	* @return bool True if the item was added
	*/
	protected function add(array $item)
	{
		$sql = 'SELECT MAX(' . $this->column_right_id . ') AS ' . $this->column_right_id . '
			FROM ' . $this->table_name . '
			' . $this->get_sql_where('WHERE');
		$result = $this->db->sql_query($sql);
		$current_max_right_id = (int) $this->db->sql_fetchfield($this->column_right_id);
		$this->db->sql_freeresult($result);

		$update_item_data = array(
			$this->column_parent_id		=> 0,
			$this->column_left_id		=> $current_max_right_id + 1,
			$this->column_right_id		=> $current_max_right_id + 2,
			$this->column_item_parents	=> '',
		);

		$sql = 'UPDATE ' . $this->table_name . '
			SET ' . $this->db->sql_build_array('UPDATE', $update_item_data) . '
			WHERE ' . $this->column_item_id . ' = ' . (int) $item[$this->column_item_id];
		$this->db->sql_query($sql);

		return $update_item_data;
	}

	/**
	* Remove an item from the tree WITHOUT removing the items from the table
	*
	* Also removes all subitems from the tree
	*
	* @param int	$item_id	The item to be deleted
	* @return array		Item ids that have been removed
	*/
	protected function remove($item_id)
	{
		$items = $this->get_children_branch_data($item_id);
		$item_ids = array_keys($items);

		$this->remove_subset($item_ids, $items[$item_id]);

		return $item_ids;
	}

	/**
	* @inheritdoc
	*/
	public function delete($item_id)
	{
		$removed_items = $this->remove($item_id);

		$sql = 'DELETE FROM ' . $this->table_name . '
			WHERE ' . $this->db->sql_in_set($this->column_item_id, $removed_items) . '
			' . $this->get_sql_where('AND');
		$this->db->sql_query($sql);

		return $removed_items;
	}

	/**
	* @inheritdoc
	*/
	public function move($item_id, $delta)
	{
		if ($delta == 0)
		{
			return false;
		}

		if (!$this->lock->acquire())
		{
			throw new RuntimeException($this->message_prefix . 'LOCK_FAILED_ACQUIRE');
		}

		$action = ($delta > 0) ? 'move_up' : 'move_down';
		$delta = abs($delta);

		// Keep $this->get_sql_where() here, to ensure we are in the right tree.
		$sql = 'SELECT *
			FROM ' . $this->table_name . '
			WHERE ' . $this->column_item_id . ' = ' . (int) $item_id . '
				' . $this->get_sql_where();
		$result = $this->db->sql_query_limit($sql, $delta);
		$item = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		if (!$item)
		{
			$this->lock->release();
			throw new OutOfBoundsException($this->message_prefix . 'INVALID_ITEM');
		}

		/**
		* Fetch all the siblings between the item's current spot
		* and where we want to move it to. If there are less than $delta
		* siblings between the current spot and the target then the
		* item will move as far as possible
		*/
		$sql = "SELECT {$this->column_item_id}, {$this->column_parent_id}, {$this->column_left_id}, {$this->column_right_id}, {$this->column_item_parents}
			FROM " . $this->table_name . '
			WHERE ' . $this->column_parent_id . ' = ' . (int) $item[$this->column_parent_id] . '
				' . $this->get_sql_where() . '
				AND ';

		if ($action == 'move_up')
		{
			$sql .= $this->column_right_id . ' < ' . (int) $item[$this->column_right_id] . ' ORDER BY ' . $this->column_right_id . ' DESC';
		}
		else
		{
			$sql .= $this->column_left_id . ' > ' . (int) $item[$this->column_left_id] . ' ORDER BY ' . $this->column_left_id . ' ASC';
		}

		$result = $this->db->sql_query_limit($sql, $delta);

		$target = false;
		while ($row = $this->db->sql_fetchrow($result))
		{
			$target = $row;
		}
		$this->db->sql_freeresult($result);

		if (!$target)
		{
			$this->lock->release();
			// The item is already on top or bottom
			return false;
		}

		/**
		* $left_id and $right_id define the scope of the items that are affected by the move.
		* $diff_up and $diff_down are the values to substract or add to each item's left_id
		* and right_id in order to move them up or down.
		* $move_up_left and $move_up_right define the scope of the items that are moving
		* up. Other items in the scope of ($left_id, $right_id) are considered to move down.
		*/
		if ($action == 'move_up')
		{
			$left_id = (int) $target[$this->column_left_id];
			$right_id = (int) $item[$this->column_right_id];

			$diff_up = (int) $item[$this->column_left_id] - (int) $target[$this->column_left_id];
			$diff_down = (int) $item[$this->column_right_id] + 1 - (int) $item[$this->column_left_id];

			$move_up_left = (int) $item[$this->column_left_id];
			$move_up_right = (int) $item[$this->column_right_id];
		}
		else
		{
			$left_id = (int) $item[$this->column_left_id];
			$right_id = (int) $target[$this->column_right_id];

			$diff_up = (int) $item[$this->column_right_id] + 1 - (int) $item[$this->column_left_id];
			$diff_down = (int) $target[$this->column_right_id] - (int) $item[$this->column_right_id];

			$move_up_left = (int) $item[$this->column_right_id] + 1;
			$move_up_right = (int) $target[$this->column_right_id];
		}

		// Now do the dirty job
		$sql = 'UPDATE ' . $this->table_name . '
			SET ' . $this->column_left_id . ' = ' . $this->column_left_id . ' + CASE
				WHEN ' . $this->column_left_id . " BETWEEN {$move_up_left} AND {$move_up_right} THEN -{$diff_up}
				ELSE {$diff_down}
			END,
			" . $this->column_right_id . ' = ' . $this->column_right_id . ' + CASE
				WHEN ' . $this->column_right_id . " BETWEEN {$move_up_left} AND {$move_up_right} THEN -{$diff_up}
				ELSE {$diff_down}
			END,
			" . $this->column_item_parents . " = ''
			WHERE
				" . $this->column_left_id . " BETWEEN {$left_id} AND {$right_id}
				AND " . $this->column_right_id . " BETWEEN {$left_id} AND {$right_id}
				" . $this->get_sql_where();
		$this->db->sql_query($sql);

		$this->lock->release();

		return true;
	}

	/**
	* @inheritdoc
	*/
	public function move_down($item_id)
	{
		return $this->move($item_id, -1);
	}

	/**
	* @inheritdoc
	*/
	public function move_up($item_id)
	{
		return $this->move($item_id, 1);
	}

	/**
	* @inheritdoc
	*/
	public function move_children($current_parent_id, $new_parent_id)
	{
		$current_parent_id = (int) $current_parent_id;
		$new_parent_id = (int) $new_parent_id;

		if ($current_parent_id == $new_parent_id)
		{
			return false;
		}

		if (!$current_parent_id)
		{
			throw new OutOfBoundsException($this->message_prefix . 'INVALID_ITEM');
		}

		if (!$this->lock->acquire())
		{
			throw new RuntimeException($this->message_prefix . 'LOCK_FAILED_ACQUIRE');
		}

		$item_data = $this->get_children_branch_data($current_parent_id);
		if (!isset($item_data[$current_parent_id]))
		{
			$this->lock->release();
			throw new OutOfBoundsException($this->message_prefix . 'INVALID_ITEM');
		}

		$current_parent = $item_data[$current_parent_id];
		unset($item_data[$current_parent_id]);
		$move_items = array_keys($item_data);

		if (($current_parent[$this->column_right_id] - $current_parent[$this->column_left_id]) <= 1)
		{
			$this->lock->release();
			return false;
		}

		if (in_array($new_parent_id, $move_items))
		{
			$this->lock->release();
			throw new OutOfBoundsException($this->message_prefix . 'INVALID_PARENT');
		}

		$diff = sizeof($move_items) * 2;
		$sql_exclude_moved_items = $this->db->sql_in_set($this->column_item_id, $move_items, true);

		$this->db->sql_transaction('begin');

		$this->remove_subset($move_items, $current_parent, false, true);

		if ($new_parent_id)
		{
			// Retrieve new-parent again, it may have been changed...
			$sql = 'SELECT *
				FROM ' . $this->table_name . '
				WHERE ' . $this->column_item_id . ' = ' . $new_parent_id;
			$result = $this->db->sql_query($sql);
			$new_parent = $this->db->sql_fetchrow($result);
			$this->db->sql_freeresult($result);

			if (!$new_parent)
			{
				$this->db->sql_transaction('rollback');
				$this->lock->release();
				throw new OutOfBoundsException($this->message_prefix . 'INVALID_PARENT');
			}

			$new_right_id = $this->prepare_adding_subset($move_items, $new_parent, true);

			if ($new_right_id > $current_parent[$this->column_right_id])
			{
				$diff = ' + ' . ($new_right_id - $current_parent[$this->column_right_id]);
			}
			else
			{
				$diff = ' - ' . abs($new_right_id - $current_parent[$this->column_right_id]);
			}
		}
		else
		{
			$sql = 'SELECT MAX(' . $this->column_right_id . ') AS ' . $this->column_right_id . '
				FROM ' . $this->table_name . '
				WHERE ' . $sql_exclude_moved_items . '
					' . $this->get_sql_where('AND');
			$result = $this->db->sql_query($sql);
			$row = $this->db->sql_fetchrow($result);
			$this->db->sql_freeresult($result);

			$diff = ' + ' . ($row[$this->column_right_id] - $current_parent[$this->column_left_id]);
		}

		$sql = 'UPDATE ' . $this->table_name . '
			SET ' . $this->column_left_id . ' = ' . $this->column_left_id . $diff . ',
				' . $this->column_right_id . ' = ' . $this->column_right_id . $diff . ',
				' . $this->column_parent_id . ' = ' . $this->db->sql_case($this->column_parent_id . ' = ' . $current_parent_id, $new_parent_id, $this->column_parent_id) . ',
				' . $this->column_item_parents . " = ''
			WHERE " . $this->db->sql_in_set($this->column_item_id, $move_items) . '
				' . $this->get_sql_where('AND');
		$this->db->sql_query($sql);

		$this->db->sql_transaction('commit');
		$this->lock->release();

		return true;
	}

	/**
	* @inheritdoc
	*/
	public function change_parent($item_id, $new_parent_id)
	{
		$item_id = (int) $item_id;
		$new_parent_id = (int) $new_parent_id;

		if ($item_id == $new_parent_id)
		{
			return false;
		}

		if (!$item_id)
		{
			throw new OutOfBoundsException($this->message_prefix . 'INVALID_ITEM');
		}

		if (!$this->lock->acquire())
		{
			throw new RuntimeException($this->message_prefix . 'LOCK_FAILED_ACQUIRE');
		}

		$item_data = $this->get_children_branch_data($item_id);
		if (!isset($item_data[$item_id]))
		{
			$this->lock->release();
			throw new OutOfBoundsException($this->message_prefix . 'INVALID_ITEM');
		}

		$item = $item_data[$item_id];
		$move_items = array_keys($item_data);

		if (in_array($new_parent_id, $move_items))
		{
			$this->lock->release();
			throw new OutOfBoundsException($this->message_prefix . 'INVALID_PARENT');
		}

		$diff = sizeof($move_items) * 2;
		$sql_exclude_moved_items = $this->db->sql_in_set($this->column_item_id, $move_items, true);

		$this->db->sql_transaction('begin');

		$this->remove_subset($move_items, $item, false, true);

		if ($new_parent_id)
		{
			// Retrieve new-parent again, it may have been changed...
			$sql = 'SELECT *
				FROM ' . $this->table_name . '
				WHERE ' . $this->column_item_id . ' = ' . $new_parent_id;
			$result = $this->db->sql_query($sql);
			$new_parent = $this->db->sql_fetchrow($result);
			$this->db->sql_freeresult($result);

			if (!$new_parent)
			{
				$this->db->sql_transaction('rollback');
				$this->lock->release();
				throw new OutOfBoundsException($this->message_prefix . 'INVALID_PARENT');
			}

			$new_right_id = $this->prepare_adding_subset($move_items, $new_parent, true);

			if ($new_right_id > (int) $item[$this->column_right_id])
			{
				$diff = ' + ' . ($new_right_id - (int) $item[$this->column_right_id] - 1);
			}
			else
			{
				$diff = ' - ' . abs($new_right_id - (int) $item[$this->column_right_id] - 1);
			}
		}
		else
		{
			$sql = 'SELECT MAX(' . $this->column_right_id . ') AS ' . $this->column_right_id . '
				FROM ' . $this->table_name . '
				WHERE ' . $sql_exclude_moved_items . '
					' . $this->get_sql_where('AND');
			$result = $this->db->sql_query($sql);
			$row = $this->db->sql_fetchrow($result);
			$this->db->sql_freeresult($result);

			$diff = ' + ' . ($row[$this->column_right_id] - (int) $item[$this->column_left_id] + 1);
		}

		$sql = 'UPDATE ' . $this->table_name . '
			SET ' . $this->column_left_id . ' = ' . $this->column_left_id . $diff . ',
				' . $this->column_right_id . ' = ' . $this->column_right_id . $diff . ',
				' . $this->column_parent_id . ' = ' . $this->db->sql_case($this->column_item_id . ' = ' . $item_id, $new_parent_id, $this->column_parent_id) . ',
				' . $this->column_item_parents . " = ''
			WHERE " . $this->db->sql_in_set($this->column_item_id, $move_items) . '
				' . $this->get_sql_where('AND');
		$this->db->sql_query($sql);

		$this->db->sql_transaction('commit');
		$this->lock->release();

		return true;
	}

	/**
	* @inheritdoc
	*/
	public function get_full_branch_data($item_id, $order_desc = true, $include_item = true)
	{
		$condition = 'i2.' . $this->column_left_id . ' BETWEEN i1.' . $this->column_left_id . ' AND i1.' . $this->column_right_id . '
			OR i1.' . $this->column_left_id . ' BETWEEN i2.' . $this->column_left_id . ' AND i2.' . $this->column_right_id;

		return $this->get_branch_data($item_id, $condition, $order_desc, $include_item);
	}

	/**
	* @inheritdoc
	*/
	public function get_parent_branch_data($item_id, $order_desc = true, $include_item = true)
	{
		$condition = 'i1.' . $this->column_left_id . ' BETWEEN i2.' . $this->column_left_id . ' AND i2.' . $this->column_right_id . '';

		return $this->get_branch_data($item_id, $condition, $order_desc, $include_item);
	}

	/**
	* @inheritdoc
	*/
	public function get_children_branch_data($item_id, $order_desc = true, $include_item = true)
	{
		$condition = 'i2.' . $this->column_left_id . ' BETWEEN i1.' . $this->column_left_id . ' AND i1.' . $this->column_right_id . '';

		return $this->get_branch_data($item_id, $condition, $order_desc, $include_item);
	}

	/**
	* Get children and parent branch of the item
	*
	* @param int		$item_id		The item id to get the parents/children from
	* @param string		$condition		Query string restricting the item list
	* @param bool		$order_desc		Order the items descending (most outer parent first)
	* @param bool		$include_item	Should the item (matching the given item id) be included in the list aswell
	* @return array			Array of items (containing all columns from the item table)
	*							ID => Item data
	*/
	protected function get_branch_data($item_id, $condition, $order_desc = true, $include_item = true)
	{
		$rows = array();

		$sql = 'SELECT i2.*
			FROM ' . $this->table_name . ' i1
			LEFT JOIN ' . $this->table_name . " i2
				ON (($condition) " . $this->get_sql_where('AND', 'i2.') . ')
			WHERE i1.' . $this->column_item_id . ' = ' . (int) $item_id . '
				' . $this->get_sql_where('AND', 'i1.') . '
			ORDER BY i2.' . $this->column_left_id . ' ' . ($order_desc ? 'ASC' : 'DESC');
		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
			if (!$include_item && $item_id == $row[$this->column_item_id])
			{
				continue;
			}

			$rows[(int) $row[$this->column_item_id]] = $row;
		}
		$this->db->sql_freeresult($result);

		return $rows;
	}

	/**
	* Get base information of parent items
	*
	* Data is cached in the item_parents column in the item table
	*
	* @inheritdoc
	*/
	public function get_parent_data(array $item)
	{
		$parents = array();
		if ((int) $item[$this->column_parent_id])
		{
			if (!$item[$this->column_item_parents])
			{
				$sql = 'SELECT ' . implode(', ', $this->item_basic_data) . '
					FROM ' . $this->table_name . '
					WHERE ' . $this->column_left_id . ' < ' . (int) $item[$this->column_left_id] . '
						AND ' . $this->column_right_id . ' > ' . (int) $item[$this->column_right_id] . '
						' . $this->get_sql_where('AND') . '
					ORDER BY ' . $this->column_left_id . ' ASC';
				$result = $this->db->sql_query($sql);

				while ($row = $this->db->sql_fetchrow($result))
				{
					$parents[$row[$this->column_item_id]] = $row;
				}
				$this->db->sql_freeresult($result);

				$item_parents = serialize($parents);

				$sql = 'UPDATE ' . $this->table_name . '
					SET ' . $this->column_item_parents . " = '" . $this->db->sql_escape($item_parents) . "'
					WHERE " . $this->column_parent_id . ' = ' . (int) $item[$this->column_parent_id];
				$this->db->sql_query($sql);
			}
			else
			{
				$parents = unserialize($item[$this->column_item_parents]);
			}
		}

		return $parents;
	}

	/**
	* Remove a subset from the nested set
	*
	* @param array	$subset_items		Subset of items to remove
	* @param array	$bounding_item		Item containing the right bound of the subset
	* @param bool	$set_subset_zero	Should the parent, left and right id of the items be set to 0, or kept unchanged?
	*									In case of removing an item from the tree, we should the values to 0
	*									In case of moving an item, we shouldkeep the original values, in order to allow "+ diff" later
	* @param bool	$table_already_locked	Is the table already locked, or should we acquire a new lock?
	* @return	null
	*/
	protected function remove_subset(array $subset_items, array $bounding_item, $set_subset_zero = true, $table_already_locked = false)
	{
		if (!$table_already_locked && !$this->lock->acquire())
		{
			throw new RuntimeException($this->message_prefix . 'LOCK_FAILED_ACQUIRE');
		}

		$diff = sizeof($subset_items) * 2;
		$sql_subset_items = $this->db->sql_in_set($this->column_item_id, $subset_items);
		$sql_not_subset_items = $this->db->sql_in_set($this->column_item_id, $subset_items, true);

		$sql_is_parent = $this->column_left_id . ' <= ' . (int) $bounding_item[$this->column_right_id] . '
			AND ' . $this->column_right_id . ' >= ' . (int) $bounding_item[$this->column_right_id];

		$sql_is_right = $this->column_left_id . ' > ' . (int) $bounding_item[$this->column_right_id];

		$set_left_id = $this->db->sql_case($sql_is_right, $this->column_left_id . ' - ' . $diff, $this->column_left_id);
		$set_right_id = $this->db->sql_case($sql_is_parent . ' OR ' . $sql_is_right, $this->column_right_id . ' - ' . $diff, $this->column_right_id);

		if ($set_subset_zero)
		{
			$set_left_id = $this->db->sql_case($sql_subset_items, 0, $set_left_id);
			$set_right_id = $this->db->sql_case($sql_subset_items, 0, $set_right_id);
		}

		$sql = 'UPDATE ' . $this->table_name . '
			SET ' . $this->column_left_id . ' = ' . $set_left_id . ',
				' . $this->column_right_id . ' = ' . $set_right_id . ',
				' . (($set_subset_zero) ? $this->column_parent_id . ' = ' . $this->db->sql_case($sql_subset_items, 0, $this->column_parent_id) . ',' : '') . '
				' . $this->column_item_parents . " = ''
			" . ((!$set_subset_zero) ? ' WHERE ' . $sql_not_subset_items . ' ' . $this->get_sql_where('AND') : $this->get_sql_where('WHERE'));
		$this->db->sql_query($sql);

		if (!$table_already_locked)
		{
			$this->lock->release();
		}
	}

	/**
	* Add a subset to the nested set
	*
	* @param array	$subset_items		Subset of items to add
	* @param array	$new_parent	Item containing the right bound of the new parent
	* @return	int		New right id of the parent item
	*/
	protected function prepare_adding_subset(array $subset_items, array $new_parent)
	{
		$diff = sizeof($subset_items) * 2;
		$sql_not_subset_items = $this->db->sql_in_set($this->column_item_id, $subset_items, true);

		$set_left_id = $this->db->sql_case($this->column_left_id . ' > ' . (int) $new_parent[$this->column_right_id], $this->column_left_id . ' + ' . $diff, $this->column_left_id);
		$set_right_id = $this->db->sql_case($this->column_right_id . ' >= ' . (int) $new_parent[$this->column_right_id], $this->column_right_id . ' + ' . $diff, $this->column_right_id);

		$sql = 'UPDATE ' . $this->table_name . '
			SET ' . $this->column_left_id . ' = ' . $set_left_id . ',
				' . $this->column_right_id . ' = ' . $set_right_id . ',
				' . $this->column_item_parents . " = ''
			WHERE " . $sql_not_subset_items . '
				' . $this->get_sql_where('AND');
		$this->db->sql_query($sql);

		return $new_parent[$this->column_right_id] + $diff;
	}

	/**
	* Resets values required for the nested set system
	*
	* @param array	$item		Original item data
	* @return	array		Original item data + nested set defaults
	*/
	protected function reset_nestedset_values(array $item)
	{
		$item_data = array_merge($item, array(
			$this->column_parent_id		=> 0,
			$this->column_left_id		=> 0,
			$this->column_right_id		=> 0,
			$this->column_item_parents	=> '',
		));

		unset($item_data[$this->column_item_id]);

		return $item_data;
	}

	/**
	* Regenerate left/right ids from parent/child relationship
	*
	* This method regenerates the left/right ids for the tree based on
	* the parent/child relations. This function executes three queries per
	* item, so it should only be called, when the set has one of the following
	* problems:
	*	- The set has a duplicated value inside the left/right id chain
	*	- The set has a missing value inside the left/right id chain
	*	- The set has items that do not have a left/right is set
	*
	* When regenerating the items, the items are sorted by parent id and their
	* current left id, so the current child/parent relationships are kept
	* and running the function on a working set will not change any orders.
	*
	* @param int	$new_id		First left_id to be used (should start with 1)
	* @param int	$parent_id	parent_id of the current set (default = 0)
	* @param bool	$reset_ids	Should we reset all left_id/right_id on the first call?
	* @return	int		$new_id		The next left_id/right_id that should be used
	*/
	public function regenerate_left_right_ids($new_id, $parent_id = 0, $reset_ids = false)
	{
		if ($reset_ids)
		{
			if (!$this->lock->acquire())
			{
				throw new RuntimeException($this->message_prefix . 'LOCK_FAILED_ACQUIRE');
			}
			$this->db->sql_transaction('begin');

			$sql = 'UPDATE ' . $this->table_name . '
				SET ' . $this->db->sql_build_array('UPDATE', array(
					$this->column_left_id		=> 0,
					$this->column_right_id		=> 0,
					$this->column_item_parents	=> '',
				)) . '
				' . $this->get_sql_where('WHERE');
			$this->db->sql_query($sql);
		}

		$sql = 'SELECT *
			FROM ' . $this->table_name . '
			WHERE ' . $this->column_parent_id . ' = ' . (int) $parent_id . '
				' . $this->get_sql_where('AND') . '
			ORDER BY ' . $this->column_left_id . ', ' . $this->column_item_id . ' ASC';
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			// First we update the left_id for this module
			if ($row[$this->column_left_id] != $new_id)
			{
				$sql = 'UPDATE ' . $this->table_name . '
					SET ' . $this->db->sql_build_array('UPDATE', array(
						$this->column_left_id		=> $new_id,
						$this->column_item_parents	=> '',
					)) . '
					WHERE ' . $this->column_item_id . ' = ' . (int) $row[$this->column_item_id];
				$this->db->sql_query($sql);
			}
			$new_id++;

			// Then we go through any children and update their left/right id's
			$new_id = $this->regenerate_left_right_ids($new_id, $row[$this->column_item_id]);

			// Then we come back and update the right_id for this module
			if ($row[$this->column_right_id] != $new_id)
			{
				$sql = 'UPDATE ' . $this->table_name . '
					SET ' . $this->db->sql_build_array('UPDATE', array($this->column_right_id => $new_id)) . '
					WHERE ' . $this->column_item_id . ' = ' . (int) $row[$this->column_item_id];
				$this->db->sql_query($sql);
			}
			$new_id++;
		}
		$this->db->sql_freeresult($result);


		if ($reset_ids)
		{
			$this->db->sql_transaction('commit');
			$this->lock->release();
		}

		return $new_id;
	}
}
