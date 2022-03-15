<?php

namespace Inn\Response;

/**
 * Sends a redirect
 *
 * @author	izisuario
 * @version	1
 */
class Redirect extends Response
{
	/**
	 * Redirection url
	 *
	 * @access	private
	 * @var		array
	 */
	private $url;

	/**
	 * Constructor
	 *
	 * Sets the url
	 *
	 * @access	public
	 * @param	string	$url	Redirection url
	 */
	public function __construct($url)
	{
		$this->url = $url;
	}

	/**
	 * Send response and terminate script
	 *
	 * @access	public
	 */
	public function send()
	{
		header("Location: {$this->url}", true, 302);
		exit();
	}
}
