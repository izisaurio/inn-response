<?php

require '../vendor/autoload.php';

use Inn\Response\HeadersOnly;

$response = new HeadersOnly();
$response->addHeader('Access-Control-Allow-Origin', '*');
$response->send();
