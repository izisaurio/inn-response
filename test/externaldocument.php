<?php

require '../vendor/autoload.php';

use Inn\Response\ExternalDocument;

$response = new ExternalDocument('external_mp3_url_here.mp3', 'audio/mpeg', 'audio.mp3');

$response->send();