<?php

namespace Inn\Response;

/**
 * Sends a redirect
 *
 * @author	izisuario
 * @version	1
 */
class Redirect
{
	/**
	 * Redirection url
	 *
	 * @access	private
	 * @var		array
	 */
	private $url;

	/**
	 * Redirection http code
	 *
	 * @access	private
	 * @var		int
	 */
	private $code;

	/**
	 * Constructor
	 *
	 * Sets the url
	 *
	 * @access	public
	 * @param	string	$url	Redirection url
	 * @param	int		$code	Http recirection code
	 */
	public function __construct($url, $code = 302)
	{
		$this->url = $url;
		$this->code = $code;
	}

	/**
	 * Send response and terminate script
	 *
	 * @access	public
	 */
	public function send()
	{
		header("Location: {$this->url}", true, $this->code);
		exit();
	}
}
