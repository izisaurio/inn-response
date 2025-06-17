<?php

require '../vendor/autoload.php';

use Inn\Response\ExternalDocument;

$response = new ExternalDocument('https://kleepo.sfo3.digitaloceanspaces.com/clips/clip_1/clip.mp4', 'audio/mpeg', 'audio.mp3');

$response->send();