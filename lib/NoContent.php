<?php

namespace Inn\Response;

/**
 * Sends a response with no content and code 204
 *
 * @author	izisuario
 * @version	1
 */
class NoContent extends Response
{
    /**
     * Response code
     *
     * @access	protected
     * @var		int
     */
    protected $code = 204;

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
