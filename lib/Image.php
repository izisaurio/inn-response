<?php

namespace Inn\Response;

/**
 * Sends a json response
 *
 * @author	izisuario
 * @version	1
 */
class Image extends Response
{
	/**
	 * File path
	 *
	 * @access	private
	 * @var		string
	 */
	private $path;

	/**
	 * Image mime type
	 *
	 * @access	public
	 * @var		string
	 */
	public $mime;

	/**
	 * Constructor
	 *
	 * Sets image path
	 *
	 * @access	public
	 * @param	string	$path	Image path
	 * @param	string	$mime	Mime path
	 */
	public function __construct($path, $mime)
	{
		$this->path = $path;
		$this->mime = $mime;
		$this->addHeader('Content-Type', $this->mime)->addHeader(
			'Content-Length',
			filesize($this->path)
		);
	}

	/**
	 * Send response and terminate script
	 *
	 * @access	public
	 */
	public function send()
	{
		$message = $this->messages[$this->code];
		header("{$this->protocol} {$this->code} {$message}");
		readfile($this->path);
		exit();
	}
}
