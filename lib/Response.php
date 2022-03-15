<?php

namespace Inn\Response;

/**
 * Responses base class
 *
 * @author	izisaurio
 * @version	1
 */
class Response
{
	/**
	 * Response code
	 *
	 * @access	protected
	 * @var		int
	 */
	protected $code = 200;

	/**
	 * Response protocol
	 *
	 * @access	protected
	 * @var		int
	 */
	protected $protocol = 'HTTP/1.1';

	/**
	 * Response messages
	 *
	 * @access	protected
	 * @var		array
	 */
	protected $messages = [
		100 => 'Continue',
		101 => 'Switching Protocols',
		102 => 'Processing',
		103 => 'Early Hints',
		200 => 'OK',
		201 => 'Created',
		202 => 'Accepted',
		203 => 'Non-Authoritative Information',
		204 => 'No Content',
		205 => 'Reset Content',
		206 => 'Partial Content',
		207 => 'Multi-Status',
		208 => 'Already Reported',
		226 => 'IM Used',
		300 => 'Multiple Choices',
		301 => 'Moved Permanently',
		302 => 'Found',
		303 => 'See Other',
		304 => 'Not Modified',
		305 => 'Use Proxy',
		307 => 'Temporary Redirect',
		308 => 'Permanent Redirect',
		400 => 'Bad Request',
		401 => 'Unauthorized',
		402 => 'Payment Required',
		403 => 'Forbidden',
		404 => 'Not Found',
		405 => 'Method Not Allowed',
		406 => 'Not Acceptable',
		407 => 'Proxy Authentication Required',
		408 => 'Request Timeout',
		409 => 'Conflict',
		410 => 'Gone',
		411 => 'Length Required',
		412 => 'Precondition Failed',
		413 => 'Payload Too Large',
		414 => 'URI Too Long',
		415 => 'Unsupported Media Type',
		416 => 'Range Not Satisfiable',
		417 => 'Expectation Failed',
		418 => 'I\'m a teapot',
		421 => 'Misdirected Request',
		422 => 'Unprocessable Entity',
		423 => 'Locked',
		424 => 'Failed Dependency',
		425 => 'Too Early',
		426 => 'Upgrade Required',
		428 => 'Precondition Required',
		429 => 'Too Many Requests',
		431 => 'Request Header Fields Too Large',
		451 => 'Unavailable For Legal Reasons',
		500 => 'Internal Server Error',
		501 => 'Not Implemented',
		502 => 'Bad Gateway',
		503 => 'Service Unavailable',
		504 => 'Gateway Timeout',
		505 => 'HTTP Version Not Supported',
		506 => 'Variant Also Negotiates',
		507 => 'Insufficient Storage',
		508 => 'Loop Detected',
		510 => 'Not Extended',
		511 => 'Network Authentication Required',
	];

	/**
	 * Set response code
	 *
	 * @access	public
	 * @param	int		$code	Response code
	 * @return	Response
	 */
	public function setCode($code)
	{
		$this->code = $code;
		return $this;
	}

	/**
	 * Set response protocol
	 *
	 * @access	public
	 * @param	string	$protocol	Response protocol
	 * @return	Response
	 */
	public function setProtocol($protocol)
	{
		$this->protocol = $protocol;
		return $this;
	}

	/**
	 * Adds a header to response
	 *
	 * @access	public
	 * @param	string	$type		Header type
	 * @param	string	$value		Header value
	 * @param	array	$params		header additional params
	 * @return	Response
	 */
	public function addHeader($type, $value, array $params = [])
	{
		if (empty($params)) {
			header("{$type}:{$value}");
			return $this;
		}
		$query = urldecode(http_build_query($params, '', ';'));
		header("{$type}:{$value}; $query");
		return $this;
	}
}
