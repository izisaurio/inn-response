<?php

namespace Inn\Response;

/**
 * Sends an html response
 *
 * @author	izisuario
 * @version	1
 */
class Html extends Response
{
	/**
	 * Html body
	 *
	 * @access	private
	 * @var		string
	 */
	private $body;

	/**
	 * Constructor
	 *
	 * Sets the html body
	 *
	 * @access	public
	 * @param	string	$body		Response body
	 * @param	string	$charset	Charset
	 */
	public function __construct($body, $charset = 'utf-8')
	{
		$this->body = $body;
		$this->addHeader('Content-Type', 'text/html', ['charset' => $charset]);
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
		echo $this->body;
		exit();
	}
}
