<?php

namespace Inn\Response;

/**
 * Sends a csv response
 *
 * @author	izisuario
 * @version	1
 */
class Csv extends Response
{
	/**
	 * Csv array
	 *
	 * @access	private
	 * @var		array
	 */
	private $csv;

    /**
     * Csv formatting options
     * 
     * @access protected
     * @var array
     */
    protected $options = [
        'separator' => ',',
        'enclosure' => '"',
        'escape' => '\\',
        'eol' => "\n"
    ];

	/**
	 * Constructor
	 *
	 * Sets the csv array
	 *
	 * @access	public
	 * @param	array	$csv		Csv array
	 * @param	string	$filename	Filename
	 * @param	string	$charset	Charset
	 */
	public function __construct(array $csv, $filename = 'file.csv', $charset = 'utf-8')
	{
		$this->csv = $csv;
		$this->addHeader('Content-Type', 'text/csv', ['charset' => $charset]);
        $this->addHeader('Content-Disposition', 'attachment', ['filename' => $filename]);
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
		$output = fopen('php://output', 'w');
		foreach ($this->csv as $row) {
			fputcsv(
                $output,
                $row,
                $this->options['separator'],
                $this->options['enclosure'],
                $this->options['escape'],
                $this->options['eol']
            );
		}
		fclose($output);
		exit();
	}
}
