<?php
/**
 *
 * This file is part of the phpBB Forum Software package.
 *
 * @copyright (c) phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * For full copyright and license information, please see
 * the docs/CREDITS.txt file.
 *
 */

namespace phpbb\install;

/**
 * Interface for installer tasks
 */
interface task_interface
{
	/**
	 * Checks if the task is essential to install phpBB or it can be skipped
	 *
	 * Note: Please note that all the non-essential modules have to implement check_requirements()
	 * method.
	 *
	 * @return	bool	true if the task is essential, false otherwise
	 */
	public function is_essential();

	/**
	 * Checks requirements for the tasks
	 *
	 * Note: Only need to be implemented for non-essential tasks, as essential tasks
	 * requirements should be checked in the requirements install module.
	 *
	 * @return bool	true if the task's requirements are met
	 */
	public function check_requirements();

	/**
	 * Executes the task
	 *
	 * @return null
	 */
	public function run();
}
