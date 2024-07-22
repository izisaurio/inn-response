<?php

require '../vendor/autoload.php';

use Inn\Response\Document;

$response = new Document('documents/izisaurio.pdf', 'application/pdf', 'izisaurio.pdf');

$response->send();