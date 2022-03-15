<?php

namespace Inn\Response;

/**
 * Sends a json response
 *
 * @author	izisuario
 * @version	1
 */
class Json extends Response
{
	/**
	 * Json
	 *
	 * @access	private
	 * @var		array
	 */
	private $json;

	/**
	 * Constructor
	 *
	 * Sets the json content
	 *
	 * @access	public
	 * @param	array	$json		Response json
	 * @param	string	$charset	Charset
	 */
	public function __construct(array $json, $charset = 'utf-8')
	{
		$this->json = $json;
		$this->addHeader('Content-Type', 'application/json', [
			'charset' => $charset,
		]);
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
		echo json_encode($this->json, JSON_NUMERIC_CHECK);
		exit();
	}
}
