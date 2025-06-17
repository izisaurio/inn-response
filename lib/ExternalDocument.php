<?php

namespace Inn\Response;

use LiteRequest\Request;

/**
 * Sends a external document response
 *
 * @author	izisuario
 * @version	1
 */
class ExternalDocument extends Response
{
    /**
     * File path
     *
     * @access	private
     * @var		string
     */
    private $path;

    /**
     * Data to be echoed
     * 
     * @access  private
     * @var     string
     */
    private $data;

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
     * Sets document path, mime type and filename but checks the file exists from external source
     *
     * @access	public
     * @param	string	$path		    Document path
     * @param	string	$mime		    Mime path
     */
    public function __construct($path, $mime)
    {
        $this->path = $path;
        $this->mime = $mime;
        $this->addHeader('Content-Type', $this->mime);
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
        $request = Request::get($this->path, [
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_RETURNTRANSFER => false,
        ]);
        $request->headerfunction(function ($ch, $header) {
            if (
                stripos($header, "Content-Type") !== false ||
                stripos($header, "Content-Length") !== false ||
                stripos($header, "Accept-Ranges") !== false
            ) {
                header($header, false);
            }
            return strlen($header);
        });
        $request->writefunction(function ($ch, $data) {
            echo $data;
            return strlen($data);
        });
        $request->execRaw();
        exit();
    }
}
