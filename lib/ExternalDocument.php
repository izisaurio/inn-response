<?php

namespace Inn\Response;

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
     * @param   string  $filename       Filename
     * @param	string	$disposition	Content disposition
     */
    public function __construct($path, $mime, $filename, $disposition = 'inline')
    {
        $headers = get_headers($path, 1);
		if (!$headers || strpos($headers[0], '200') === false) {
            throw new FileNotFoundException($path);
        }
        
        //Get filesize from headers
        $contentLength = $headers['Content-Length'];
        $filesize = is_array($contentLength) ? end($contentLength) : $contentLength;

        $this->path = $path;
        $this->mime = $mime;
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
