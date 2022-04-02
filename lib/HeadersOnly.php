<?php

namespace Inn\Response;

/**
 * Sends a headers only response
 *
 * @author	izisuario
 * @version	1
 */
class HeadersOnly extends Response
{
	/**
	 * Send response and terminate script
	 *
	 * @access	public
	 */
	public function send()
	{
		$message = $this->messages[$this->code];
		header("{$this->protocol} {$this->code} {$message}");
		exit();
	}
}
