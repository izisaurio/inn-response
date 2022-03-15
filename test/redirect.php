<?php

require '../vendor/autoload.php';

use Inn\Response\Redirect;

$response = new redirect('https://google.com');

$response->send();