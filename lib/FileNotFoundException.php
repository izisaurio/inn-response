<?php

namespace Inn\Response;

use \Exception;

/**
 * File to be sent not found
 *
 * @author	izisaurio
 * @version	1
 */
class FileNotFoundException extends Exception
{
	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	string	$path	File trying to send
	 */
	public function __construct($path)
	{
		parent::__construct("File not found ({$path})");
	}
}