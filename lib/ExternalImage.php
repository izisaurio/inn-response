<?php

namespace Inn\Response;

/**
 * Sends an image response from a path
 *
 * @author	izisuario
 * @version	1
 */
class ExternalImage extends Response
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
     * Image Content
     * 
     * @access  private
     * @var     string
     */
    private $imgData;

    /**
     * Constructor
     *
     * Sets image path
     *
     * @access	public
     * @param	string	$path		Image path
     * @param	string	$mime		Mime path
     * @param   array   $options    Context options
     */
    public function __construct($path, $mime, array $options = [])
    {
        $this->path = $path;
        $this->mime = $mime;
        if (empty($options)) {
            $options = [
                'http' => [
                    'follow_location' => 1
                ]
            ];
        }
        $context = stream_context_create($options);
        $this->imgData = file_get_contents($this->path, false, $context);
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
        echo $this->imgData;
        exit();
    }
}
