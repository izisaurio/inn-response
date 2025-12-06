<?php

require '../vendor/autoload.php';

use Inn\Response\ExternalImage;

$place = 'place_id'; // Place your Google Place ID here
$key = 'key'; // Place your Google Maps API key here
$path = "https://places.googleapis.com/v1/{$place}/media?maxWidthPx=800&key={$key}";

$response = new ExternalImage($path, 'image/jpeg');

$response->send();