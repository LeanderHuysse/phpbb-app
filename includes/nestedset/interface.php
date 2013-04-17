<?php
/**
*
* @package Nested Set
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

interface phpbb_nestedset_interface
{
	/**
	* Insert an item into the nested set (also insert the rows into the table)
	*
	* @param array	$item	The item to be added
	* @return array Array with item data as set in the database
	*/
	public function insert(array $additional_data);

	/**
	* Add an item at the end of the nested set
	*
	* @param array	$item	The item to be added
	* @return bool True if the item was added
	*/
	public function add(array $item);

	/**
	* Remove an item from the nested set
	*
	* Also removes all subitems from the nested set
	*
	* @param array	$item	The item to be removed
	* @return array		Items that have been removed
	*/
	public function remove(array $item);

	/**
	* Delete an item from the nested set (also deletes the rows form the table)
	*
	* Also deletes all subitems from the nested set
	*
	* @param array	$item	The item to be deleted
	* @return array		Items that have been deleted
	*/
	public function delete(array $item);

	/**
	* Move an item by a given delta
	*
	* @param array	$item	The item to be moved
	* @param int	$delta	Number of steps to move this item, < 0 => down, > 0 => up
	* @return bool True if the item was moved
	*/
	public function move(array $item, $delta);

	/**
	* Move an item down by 1
	*
	* @param array	$item	The item to be moved
	* @return bool True if the item was moved
	*/
	public function move_down(array $item);

	/**
	* Move an item up by 1
	*
	* @param array	$item	The item to be moved
	* @return bool True if the item was moved
	*/
	public function move_up(array $item);

	/**
	* Moves all children of one item to another item
	*
	* @param array	$current_parent		The current parent item
	* @param array	$new_parent			The new parent item
	* @return bool True if any items where moved
	*/
	public function move_children(array $current_parent, array $new_parent);

	/**
	* Set the parent item
	*
	* @param array	$item		The item to be moved
	* @param array	$new_parent	The new parent item
	* @return bool True if the parent was set successfully
	*/
	public function set_parent(array $item, array $new_parent);

	/**
	* Get branch of the item
	*
	* This method can return all parents, children or both of the given item
	*
	* @param array	$item		The item to get the branch from
	* @param string		$type			One of all|parent|children
	* @param bool		$order_desc		Order the items descending (most outer parent first)
	* @param bool		$include_item	Should the given item be included in the list aswell
	* @return array			Array of items (containing all columns from the item table)
	*							ID => Item data
	*/
	public function get_branch_data(array $item, $type, $order_desc, $include_item);

	/**
	* Get base information of parent items
	*
	* @param array	$item		The item to get the parents from
	* @return array			Array of items (containing basic columns from the item table)
	*							ID => Item data
	*/
	public function get_parent_data(array $item);

	/**
	* Recalculate Nested Sets
	*
	* @param int	$new_id		First left_id to be used (should start with 1)
	* @param int	$parent_id	parent_id of the current set (default = 0)
	* @param bool	$reset_ids	Should we reset all left_id/right_id on the first call?
	* @return	int		$new_id		The next left_id/right_id that should be used
	*/
	public function recalculate_nested_set($new_id, $parent_id = 0, $reset_ids = false);
}
