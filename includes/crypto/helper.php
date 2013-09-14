<?php
/**
*
* @package phpBB3
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

/**
* @package crypto
*/
class phpbb_crypto_helper
{
	/**
	* @var phpbb_crypto_manager
	*/
	protected $manager;

	/**
	* @var phpbb_container
	*/
	protected $container;

	/**
	* Construct a phpbb_crypto_helper object
	*
	* @param phpbb_crypto_manager $manager Crypto manager object
	* @param phpbb_container $container phpBB container object
	*/
	public function __construct($manager, $container)
	{
		$this->manager = $manager;
		$this->container = $container;
	}

	/**
	* Get hash settings from combined hash
	*
	* @param string $hash Password hash of combined hash
	*
	* @return array An array containing the hash settings for the hash
	*		types in successive order as described by the comined
	*		password hash
	*/
	protected function get_combined_hash_settings($hash)
	{
		preg_match('#^\$([a-zA-Z0-9\\\]*?)\$#', $hash, $match);
		$hash_settings = substr($hash, strpos($hash, $match[1]) + strlen($match[1]) + 1);
		foreach ($match as $cur_type)
		{
			$dollar_position = strpos($hash_settings, '$');
			$output[] = substr($hash_settings, 0, ($dollar_position != false) ? $dollar_position : strlen($hash_settings));
			$hash_settings = substr($hash_settings, $dollar_position + 1);
		}

		return $output;
	}

	/**
	* Check combined password hash against the supplied password
	*
	* @param string $password Password entered by user
	* @param array $stored_hash_type An array containing the hash types
	*				as described by stored password hash
	* @param string $hash Stored password hash
	*
	* @return bool True if password is correct, false if not
	*/
	public function check_combined_hash($password, $stored_hash_type, $hash)
	{
		$cur_hash = '';
		$i = 0;
		$data = array(
			'prefix' => '$',
			'settings' => '$',
		);
		$hash_settings = $this->get_combined_hash_settings($hash);
		foreach ($stored_hash_type as $key => $hash_type)
		{
			$rebuilt_hash = $this->rebuild_hash($hash_type->get_prefix(), $hash_settings[$i]);
			$this->combine_hash_output($data, 'prefix', $key);
			$this->combine_hash_output($data, 'settings', $hash_settings[$i]);
			$cur_hash = $hash_type->hash($password, $rebuilt_hash);
			$password = str_replace($rebuilt_hash, '', $cur_hash);
			$i++;
		}
		return ($hash === $this->combine_hash_output($data, 'hash', $password));
	}

	/**
	* Combine hash prefixes, settings, and actual hash
	*
	* @param array $data Array containing the keys 'prefix' and 'settings'.
	*			It will hold the prefixes and settings
	* @param string $type Data type of the supplied value
	* @param string $value Value that should be put into the data array
	*
	* @return string|none Return complete combined hash if type is neither
	*			'prefix' nor 'settings', nothing if it is
	*/
	protected function combine_hash_output(&$data, $type, $value)
	{
		if ($type == 'prefix')
		{
			$data[$type] .= ($data[$type] !== '$') ? '\\' : '';
			$data[$type] .= $value;
		}
		elseif ($type == 'settings')
		{
			$data[$type] .= ($data[$type] !== '$') ? '$' : '';
			$data[$type] .= $value;
		}
		else
		{
			// Return full hash
			return $data['prefix'] . $data['settings'] . '$' . $value;
		}
	}

	/**
	* Rebuild hash for hashing functions
	*
	* @param string $prefix Hash prefix
	* @param string $settings Hash settings
	*
	* @return string Rebuilt hash for hashing functions
	*/
	protected function rebuild_hash($prefix, $settings)
	{
		$rebuilt_hash = $prefix;
		if (strpos($settings, '\\') !== false)
		{
			$settings = str_replace('\\', '$', $settings);
		}
		$rebuilt_hash .= $settings;
		return $rebuilt_hash;
	}
}
