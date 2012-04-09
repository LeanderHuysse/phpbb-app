<?php
/**
*
* @package phpBB3
* @copyright (c) 2010 phpBB Group
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
* Tidy search cron task.
*
* Will only run when the currently selected search backend supports tidying.
*
* @package phpBB3
*/
class phpbb_cron_task_core_tidy_search extends phpbb_cron_task_base
{
	private $phpbb_root_path, $phpEx, $config;

	public function __construct($phpbb_root_path, $phpEx, phpbb_config $config)
	{
		$this->phpbb_root_path = $phpbb_root_path;
		$this->phpEx = $phpEx;
		$this->config = $config;
	}

	/**
	* Runs this cron task.
	*
	* @return void
	*/
	public function run()
	{
		// Select the search method
		$search_type = basename($this->config['search_type']);

		if (!class_exists($search_type))
		{
			include($this->phpbb_root_path . "includes/search/$search_type." . $this->phpEx);
		}

		// We do some additional checks in the module to ensure it can actually be utilised
		$error = false;
		$search = new $search_type($error);

		if (!$error)
		{
			$search->tidy();
		}
	}

	/**
	* Returns whether this cron task can run, given current board configuration.
	*
	* Search cron task is runnable in all normal use. It may not be
	* runnable if the search backend implementation selected in board
	* configuration does not exist.
	*
	* @return bool
	*/
	public function is_runnable()
	{
		// Select the search method
		$search_type = basename($this->config['search_type']);

		return file_exists($this->phpbb_root_path . 'includes/search/' . $search_type . '.' . $this->phpEx);
	}

	/**
	* Returns whether this cron task should run now, because enough time
	* has passed since it was last run.
	*
	* The interval between search tidying is specified in board
	* configuration.
	*
	* @return bool
	*/
	public function should_run()
	{
		return $this->config['search_last_gc'] < time() - $this->config['search_gc'];
	}
}
