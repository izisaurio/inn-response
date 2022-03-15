<?php

require '../vendor/autoload.php';

use Inn\Response\Image;

$response = new Image('images/image.png', 'image/png');

$response->send();