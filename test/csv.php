<?php

require '../vendor/autoload.php';

use Inn\Response\Csv;

$response = new Csv([
    ['ID', 'Name', 'Email'],
    ['0001', 'izisaurio', 'izi.isaac@gmail.com'],
    ['0002', 'John Doe', 'john@doe.com']
]);

$response->send();