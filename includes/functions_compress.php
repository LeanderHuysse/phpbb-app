<?php
/** 
*
* @package phpBB3
* @version $Id$ 
* @copyright (c) 2005 phpBB Group 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package phpBB3
* Class for handling archives (compression/decompression)
*/
class compress 
{
	var $fp = 0;

	function add_file($src, $src_rm_prefix = '', $src_add_prefix = '', $skip_files = '')
	{
		global $phpbb_root_path;

		$skip_files = explode(',', $skip_files);

		// Remove rm prefix from src path
		$src_path = ($src_rm_prefix) ? preg_replace('#^(' . preg_quote($src_rm_prefix) . ')#', '', $src) : $src;
		// Add src prefix
		$src_path = ($src_add_prefix) ? ($src_add_prefix . ((substr($src_add_prefix, -1) != '/') ? '/' : '') . $src_path) : $src_path;
		// Remove initial "/" if present
		$src_path = (substr($src_path, 0, 1) == '/') ? substr($src_path, 1) : $src_path;

		if (is_file($phpbb_root_path . $src))
		{
			if (!($fp = @fopen("$phpbb_root_path$src", 'rb')))
			{
				return false;
			}

			$data = fread($fp, filesize("$phpbb_root_path$src"));
			fclose($fp);

			$this->data($src_path, $data, false, stat("$phpbb_root_path$src"));
		}
		else if (is_dir($phpbb_root_path . $src))
		{
			// Clean up path, add closing / if not present
			$src_path = ($src_path && substr($src_path, -1) != '/') ? $src_path . '/' : $src_path;

			$filelist = array();
			$filelist = filelist("$phpbb_root_path$src", '', '*');
			krsort($filelist);

			if ($src_path)
			{
				$this->data($src_path, '', true, stat("$phpbb_root_path$src_path"));
			}

			foreach ($filelist as $path => $file_ary)
			{
				if ($path)
				{
					// Same as for src_path
					$path = (substr($path, 0, 1) == '/') ? substr($path, 1) : $path;
					$path = ($path && substr($path, -1) != '/') ? $path . '/' : $path;

					$this->data("$src_path$path", '', true, stat("$phpbb_root_path$src_path$path"));
				}

				foreach ($file_ary as $file)
				{
					if (in_array($path . $file, $skip_files))
					{
						continue;
					}

					$this->data("$src_path$path$file", implode('', file("$phpbb_root_path$src_path$path$file")), false, stat("$phpbb_root_path$src_path$path$file"));
				}
			}

		}
		return true;
	}

	function add_custom_file($src, $filename)
	{
		$this->data($filename, implode('', file($src)), false, stat($src));
		return true;
	}
	
	function add_data($src, $name)
	{
		$stat[2] = 436; //384
		$stat[4] = $stat[5] = 0;
		$stat[7] = strlen($src);
		$stat[9] = time();
		$this->data($name, $src, false, $stat);
		return true;
	}

	function methods()
	{
		$methods = array('tar');
		$available_methods = array('tar.gz' => 'zlib', 'tar.bz2' => 'bz2', 'zip' => 'zlib');

		foreach ($available_methods as $type => $module)
		{
			if (!@extension_loaded($module))
			{
				continue;
			}
			$methods[] = $type;
		}

		return $methods;
	}
}

/**
* @package phpBB3
*
* Zip creation class from phpMyAdmin 2.3.0 � Tobias Ratschiller, Olivier M�ller, Lo�c Chapeaux, 
* Marc Delisle, http://www.phpmyadmin.net/
*
* Zip extraction function by Alexandre Tedeschi, alexandrebr at gmail dot com
*
* Modified extensively by psoTFX and DavidMJ, � phpBB Group, 2003
*
* Based on work by Eric Mueller and Denis125
* Official ZIP file format: http://www.pkware.com/appnote.txt
*/
class compress_zip extends compress
{
	var $datasec = array();
	var $ctrl_dir = array();
	var $eof_cdh = "\x50\x4b\x05\x06\x00\x00\x00\x00";

	var $old_offset = 0;
	var $datasec_len = 0;

	function compress_zip($mode, $file)
	{
		return $this->fp = @fopen($file, $mode . 'b');
	}

	function unix_to_dos_time($time)
	{
		$timearray = (!$time) ? getdate() : getdate($time);

		if ($timearray['year'] < 1980)
		{
			$timearray['year'] = 1980;
			$timearray['mon'] = $timearray['mday'] = 1;
			$timearray['hours'] = $timearray['minutes'] = $timearray['seconds'] = 0;
		}

		return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) | ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
	}

	function extract($dst)
	{		
		// Loop the file, looking for files and folders
		$dd_try = false;
		fseek($this->fp, 0);

		while (true)
		{
			// Check if the signature is valid...
			$signature = fread($this->fp, 4);
			if (feof($this->fp))
			{
				break;
			}

			switch ($signature)
			{
				// 'Local File Header'
				case "\x50\x4b\x03\x04":
					// Get information about the zipped file but skip all the junk we don't need
					fread($this->fp, 4);
					$file['c_method']	= unpack("v", fread($this->fp, 2)); // compression method
					fread($this->fp, 8);
					$file['c_size']		= unpack("V", fread($this->fp, 4)); // compressed size
					$file['uc_size']	= unpack("V", fread($this->fp, 4)); // uncompressed size
					$file_name_length	= unpack("v", fread($this->fp, 2)); // filename length
					$extra_field_length	= unpack("v", fread($this->fp, 2)); // extra field length
					$file_name			= fread($this->fp, $file_name_length[1]); // filename
					fread($this->fp, $extra_field_length[1]);
					$file['offset']		= ftell($this->fp);

					// Bypass the whole compressed contents, and look for the next file
					fseek($this->fp, $file['c_size'][1], SEEK_CUR);

					// Mount file table
					$seek_ary[$file_name] = array(
						'c_method'	=> $file['c_method'][1],
						'c_size'	=> $file['c_size'][1],
						'uc_size'	=> $file['uc_size'][1],
						'offset'	=> $file['offset']
					);
				break;

				case "\x50\x4b\x01\x02":
					fread($this->fp, 24);
					fread($this->fp, 12 + current(unpack("v", fread($this->fp, 2))) + current(unpack("v", fread($this->fp, 2))) + current(unpack("v", fread($this->fp, 2))));
				break;
				
				// We safely end the loop as we are totally finished with looking for files and folders
				case "\x50\x4b\x05\x06":
				break 2;
				
				// Look for the next signature...
				case 'PK00':
				continue 2;
				
				// We have encountered a header that is weird. Lets look for better data...
				default:
					if (!$dd_try)
					{
						// Unexpected header. Trying to detect wrong placed 'Data Descriptor';
						$dd_try = true;
						fseek($this->fp, 8, SEEK_CUR); // Jump over 'crc-32'(4) 'compressed-size'(4), 'uncompressed-size'(4)
						continue 2;
					}
					trigger_error("Unexpected header, ending loop");
					break 2;
			}
			$dd_try = false;
		}
		
		if (sizeof($seek_ary))
		{
			foreach ($seek_ary as $filename => $trash)
			{
				$dirname = dirname($filename);
				
				if (!is_dir("$dst$dirname"))
				{
					$str = '';
					$folders = explode('/', $dirname);

					// Create and folders and subfolders if they do not exist
					foreach ($folders as $folder)
					{
						$str = (!empty($str)) ? $str . '/' . $folder : $folder;
					
						if(!is_dir("$dst$str"))
						{
							if (!@mkdir("$dst$str", 0777))
							{
								trigger_error("Could not create directory $dir");
							}
							@chmod("$dir", 0777);
						}
					}
				}

				if (substr($filename, -1, 1) == '/')
				{
					continue;
				}

				$target_filename = "$dst$filename";
				$fdetails = &$seek_ary[$filename];

				if (!$fdetails['uc_size'])
				{
					$fp = fopen($target_filename, "w");
					fwrite($fp, '');
					fclose($fp);
				}
				
				fseek($this->fp, $fdetails['offset']);
				$mode = $fdetails['c_method'];
				$content = fread($this->fp, $fdetails['c_size']);

				switch ($mode)
				{
					case 0:
						// Not compressed
						$fp = fopen($target_filename, "w");
						fwrite($fp, $content);
						fclose($fp);
					break;
				
					case 8:
						// Deflate
						$fp = fopen($target_filename, "w");
						fwrite($fp, gzinflate($content, $fdetails['uc_size']));
						fclose($fp);
					break;
				}
			}
		}
	}

	function close()
	{
		// Write out central file directory and footer ... if it exists
		if (sizeof($this->ctrl_dir))
		{
			fwrite($this->fp, $this->file());
		}
		fclose($this->fp);
	}

	// Create the structures ... note we assume version made by is MSDOS
	function data($name, $data, $is_dir = false, $stat)
	{
		$name = str_replace('\\', '/', $name);

		$dtime = dechex($this->unix_to_dos_time($stat[9]));
		$hexdtime = '\x' . $dtime[6] . $dtime[7] . '\x' . $dtime[4] . $dtime[5] . '\x' . $dtime[2] . $dtime[3] . '\x' . $dtime[0] . $dtime[1];
		eval('$hexdtime = "' . $hexdtime . '";');

		if ($is_dir)
		{
			$unc_len = $c_len = $crc = 0;
			$zdata = '';
		}
		else
		{
			$unc_len = strlen($data);
			$crc = crc32($data);
			$zdata = gzcompress($data);
			$zdata = substr(substr($zdata, 0, strlen($zdata) - 4), 2); // fix crc bug
			$c_len = strlen($zdata);

			// Did we compress? No, then use data as is
			if ($c_len >= $unc_len)
			{
				$zdata = $data;
				$c_len = $unc_len;
			}
		}
		unset($data);

		// If we didn't compress set method to store, else deflate
		$c_method = ($c_len == $unc_len) ? "\x00\x00" : "\x08\x00";

		// Are we a file or a directory? Set archive for file
		$attrib = ($is_dir) ? 16 : 32;
		$var_ext = ($is_dir) ? "\x0a" : "\x14";

		// File Record Header
		$fr = "\x50\x4b\x03\x04";		// Local file header 4bytes
		$fr .= "$var_ext\x00";			// ver needed to extract 2bytes
		$fr .= "\x00\x00";				// gen purpose bit flag 2bytes
		$fr .= $c_method;				// compression method 2bytes
		$fr .= $hexdtime;				// last mod time and date 2+2bytes
		$fr .= pack('V', $crc);			// crc32 4bytes
		$fr .= pack('V', $c_len);		// compressed filesize 4bytes
		$fr .= pack('V', $unc_len);		// uncompressed filesize 4bytes
		$fr .= pack('v', strlen($name));// length of filename 2bytes

		$fr .= pack('v', 0);			// extra field length 2bytes
		$fr .= $name;
		$fr .= $zdata;
		unset($zdata);

		$this->datasec_len += strlen($fr);

		// Add data to file ... by writing data out incrementally we save some memory
		fwrite($this->fp, $fr);
		unset($fr);

		// Central Directory Header
		$cdrec = "\x50\x4b\x01\x02";		// header 4bytes
		$cdrec .= "\x00\x00";               // version made by
		$cdrec .= "$var_ext\x00";           // version needed to extract
		$cdrec .= "\x00\x00";               // gen purpose bit flag
		$cdrec .= $c_method;				// compression method
		$cdrec .= $hexdtime;                // last mod time & date
		$cdrec .= pack('V', $crc);          // crc32
		$cdrec .= pack('V', $c_len);        // compressed filesize
		$cdrec .= pack('V', $unc_len);      // uncompressed filesize
		$cdrec .= pack('v', strlen($name)); // length of filename
		$cdrec .= pack('v', 0);             // extra field length
		$cdrec .= pack('v', 0);             // file comment length
		$cdrec .= pack('v', 0);             // disk number start
		$cdrec .= pack('v', 0);             // internal file attributes
		$cdrec .= pack('V', $attrib);		// external file attributes
		$cdrec .= pack('V', $this->old_offset); // relative offset of local header
		$cdrec .= $name;

		// Save to central directory
		$this->ctrl_dir[] = $cdrec;

		$this->old_offset = $this->datasec_len;
	}

	function file()
	{
		$ctrldir = implode('', $this->ctrl_dir);

		return $ctrldir . $this->eof_cdh .
			pack('v', sizeof($this->ctrl_dir)) .	// total # of entries "on this disk"
			pack('v', sizeof($this->ctrl_dir)) .	// total # of entries overall
			pack('V', strlen($ctrldir)) .			// size of central dir
			pack('V', $this->datasec_len) .			// offset to start of central dir
			"\x00\x00";								// .zip file comment length
	}

	function download($filename)
	{
		global $phpbb_root_path;

		$mimetype = 'application/zip';

		header('Pragma: no-cache');
		header("Content-Type: $mimetype; name=\"$filename.zip\"");
		header("Content-disposition: attachment; filename=$filename.zip");

		$fp = fopen("{$phpbb_root_path}store/$filename.zip", 'rb');
		while ($buffer = fread($fp, 1024))
		{
			echo $buffer;
		}
		fclose($fp);
	}
}

/**
* @package phpBB3
*
* Tar/tar.gz compression routine
* Header/checksum creation derived from tarfile.pl, � Tom Horsley, 1994
*/
class compress_tar extends compress 
{
	var $isgz = false;
	var $isbz = false;
	var $filename = '';
	var $mode = '';
	var $type = '';

	function compress_tar($mode, $file, $type = '')
	{
		$type = (!$type) ? $file : $type;
		$this->isgz = (strpos($type, '.tar.gz') !== false || strpos($type, '.tgz') !== false) ? true : false;
		$this->isbz = (strpos($type, '.tar.bz2') !== false) ? true : false;

		$this->mode = &$mode;
		$this->file = &$file;
		$this->type = &$type;
		$this->open();
	}

	function extract($dst)
	{
		$fzread = ($this->isbz && function_exists('bzread')) ? 'bzread' : (($this->isgz && extension_loaded('zlib')) ? 'gzread' : 'fread');

		// Run through the file and grab directory entries
		while ($buffer = $fzread($this->fp, 512))
		{
			$tmp = unpack("A6magic", substr($buffer, 257, 6));

			if (trim($tmp['magic']) == 'ustar')
			{
				$tmp = unpack("A100name", $buffer);
				$filename = trim($tmp['name']);

				$tmp = unpack("Atype", substr($buffer, 156, 1));
				$filetype = (int) trim($tmp['type']);

				if ($filetype == 5)
				{
					$mkdir_ary[] = "$dst$filename";
				}
				else if (dirname($filename) != '.')
				{
					$mkdir_alt_ary[] = $dst . dirname($filename);
				}
			}
		}

		$mkdir_alt_ary = array_unique($mkdir_alt_ary);

		// Create the directory structure
		if (sizeof($mkdir_ary) || sizeof($mkdir_alt_ary))
		{
			if (!sizeof($mkdir_ary) && sizeof($mkdir_alt_ary))
			{
				$mkdir_ary = $mkdir_alt_ary;
				unset($mkdir_alt_ary);
			}

			sort($mkdir_ary);
			foreach ($mkdir_ary as $dir)
			{
				$folders = explode('/', $dir);
				foreach ($folders as $folder)
				{
					$str = (!empty($str)) ? $str . '/' . $folder : $folder;
					if(!is_dir($str))
					{
						if (!@mkdir($str, 0777))
						{
							trigger_error("Could not create directory $folder");
						}
						@chmod("$str", 0777);
					}
				}
				unset($str);
			}
		}

		// If this is a .bz2 we need to close and re-open the file in order
		// to reset the file pointer since we cannot apparently rewind it
		if ($this->isbz)
		{
			$this->close();
			$this->open();
		}
		else
		{
			fseek($this->fp, 0);
		}

		// Write out the files
		$size = 0;
		while ($buffer = $fzread($this->fp, 512))
		{
			$tmp = unpack("A6magic", substr($buffer, 257, 6));

			if (trim($tmp['magic']) == 'ustar')
			{
				$tmp = unpack("A100name", $buffer);
				$filename = trim($tmp['name']);

				$tmp = unpack("Atype", substr($buffer, 156, 1));
				$filetype = (int) trim($tmp['type']);

				$tmp = unpack("A12size", substr($buffer, 124, 12));
				$filesize = octdec((int) trim($tmp['size']));

				if ($filesize != 0 && ($filetype == 0 || $filetype == "\0"))
				{
					if (!($fp = fopen("$dst$filename", 'wb')))
					{
						trigger_error("Couldn't create file $filename");
					}
					@chmod("$dst$filename", 0777);

					$size = 0;
					continue;
				}
			}

			$size += 512;
			$length = ($size > $filesize) ? 512 - ($size - $filesize) : 512;

			$tmp = unpack("a512data", $buffer);

			fwrite($fp, (string) $tmp['data'], $length);
			unset($buffer);
		}
	}

	function close()
	{
		$fzwrite = ($this->isbz && function_exists('bzwrite')) ? 'bzwrite' : (($this->isgz && extension_loaded('zlib')) ? 'gzwrite' : 'fwrite');
		$fzclose = ($this->isbz && function_exists('bzclose')) ? 'bzclose' : (($this->isgz && extension_loaded('zlib')) ? 'gzclose' : 'fclose');
		if ($this->wrote) $fzwrite($this->fp, pack("a1024", ""));
		$fzclose($this->fp);
	}

	function data($name, $data, $is_dir = false, $stat)
	{
		$this->wrote = true;
		$fzwrite = 	($this->isbz && function_exists('bzwrite')) ? 'bzwrite' : (($this->isgz && extension_loaded('zlib')) ? 'gzwrite' : 'fwrite');

		$typeflag = ($is_dir) ? '5' : '';

		// This is the header data, it contains all the info we know about the file or folder that we are about to archive
		$header = '';
		$header .= pack("a100", $name);
		$header .= pack("a8", sprintf("%07o", $stat[2]));
		$header .= pack("a8", sprintf("%07o", $stat[4]));
		$header .= pack("a8", sprintf("%07o", $stat[5]));
		$header .= pack("a12", sprintf("%011o", $stat[7]));
		$header .= pack("a12", sprintf("%011o", $stat[9]));
		$header .= pack("a8", '        ');
		$header .= pack("a1", $typeflag);
		$header .= pack("a100", '');
		$header .= pack("a6", 'ustar');
		$header .= pack("a2", '00');
		$header .= pack("a32", 'Unknown');
		$header .= pack("a32", 'Unknown');
		$header .= pack("a8", '');
		$header .= pack("a8", '');
		$header .= pack("a155", '');
		$header .= pack("a12", '');

		// Checksum
		$checksum = 0;
		for ($i = 0; $i < 512; $i++)
		{
			$b = unpack("c1char", substr($header, $i, 1));
			$checksum += $b['char'];
		}
		$header = substr_replace($header, pack("a8", sprintf("%07o", $checksum)), 148, 8);

		$fzwrite($this->fp, $header);

		if ($stat[7] !== 0 && !$is_dir)
		{
			$fzwrite($this->fp, $data);
			unset($data);
			if ($stat[7] % 512 > 0)
			{
				$fzwrite($this->fp, str_repeat("\0", 512 - $stat[7] % 512));
			}
		}
	}

	function open()
	{
		$fzopen = ($this->isbz && function_exists('bzopen')) ? 'bzopen' : (($this->isgz && extension_loaded('zlib')) ? 'gzopen' : 'fopen');
		$this->fp = @$fzopen($this->file, $this->mode . 'b' . (($fzopen == 'gzopen') ? '9' : ''));

		if (!$this->fp)
		{
			trigger_error('Unable to open file ' . $this->file . ' [' . $fzopen . ' - ' . $this->mode . 'b]');
		}
	}

	function download($filename)
	{
		global $phpbb_root_path;

		switch ($this->type)
		{
			case 'tar':
				$mimetype = 'application/x-tar';
			break;

			case 'tar.gz':
				$mimetype = 'application/x-gzip';
			break;

			case 'tar.bz2':
				$mimetype = 'application/x-bzip2';
			break;

			default:
				$mimetype = 'application/octet-stream';
			break;
		}

		header('Pragma: no-cache');
		header("Content-Type: $mimetype; name=\"$filename.$this->type\"");
		header("Content-disposition: attachment; filename=$filename.$this->type");

		$fp = fopen("{$phpbb_root_path}store/$filename.$this->type", 'rb');
		while ($buffer = fread($fp, 1024))
		{
			echo $buffer;
		}
		fclose($fp);
	}
}

?>