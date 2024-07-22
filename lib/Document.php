<?php

namespace Inn\Response;

/**
 * Sends a json response
 *
 * @author	izisuario
 * @version	1
 */
class Document extends Response
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
     * Sets document path, mime type and filename
     *
     * @access	public
     * @param	string	$path		    Document path
     * @param	string	$mime		    Mime path
     * @param   string  $filename       Filename
     * @param	string	$disposition	Content disposition
     * @param	string	$filesize	    Filesize if null is calculated internally
     */
    public function __construct($path, $mime, $filename, $disposition = 'inline', $filesize = null)
    {
		if (!file_exists($path)) {
			throw new FileNotFoundException($path);
		}
        $this->path = $path;
        $this->mime = $mime;
        if (!isset($filesize)) {
            $filesize = filesize($path);
        }
        $this->addHeader('Content-Type', $this->mime)
            ->addHeader('Content-Length', $filesize)
            ->addHeader('Content-Disposition', "{$disposition}; filename={$filename}");
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
