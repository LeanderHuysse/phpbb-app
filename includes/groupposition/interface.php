<?php
/**
*
* @package phpBB3
* @copyright (c) 2012 phpBB Group
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

/**
* Interface to manage group positions in various places of phpbb
*
* The interface provides simple methods to add, delete and move a group
*
* @package phpBB3
*/
interface phpbb_groupposition_interface
{
	/**
	* Returns the value for a given group, if the group exists.
	* @param	int		$group_id	group_id of the group to be selected
	* @return	int			position of the group
	*/
	public function get_group_value($group_id);

	/**
	* Get number of groups displayed 
	*
	* @return	int		value of the last item displayed
	*/
	public function get_group_count();

	/**
	* Addes a group by group_id
	*
	* @param	int		$group_id	group_id of the group to be added
	* @return	null
	*/
	public function add_group($group_id);

	/**
	* Deletes a group by group_id
	*
	* @param	int		$group_id		group_id of the group to be deleted
	* @param	bool	$skip_group		Skip setting the value for this group, to save the query, when you need to update it anyway.
	* @return	null
	*/
	public function delete_group($group_id, $skip_group = false);

	/**
	* Moves a group up by group_id
	*
	* @param	int		$group_id	group_id of the group to be moved
	* @return	null
	*/
	public function move_up($group_id);

	/**
	* Moves a group down by group_id
	*
	* @param	int		$group_id	group_id of the group to be moved
	* @return	null
	*/
	public function move_down($group_id);

	/**
	* Moves a group up/down
	*
	* @param	int		$group_id	group_id of the group to be moved
	* @param	int		$delta		number of steps:
	*								- positive = move up
	*								- negative = move down
	* @return	null
	*/
	public function move($group_id, $delta);

	/**
	* Error
	*
	* @param	string		$message	Error message to display
	* @return	null
	*/
	public function error($message);
}
