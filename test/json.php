<?php

require '../vendor/autoload.php';

use Inn\Response\Json;

$response = new Json(['name' => 'izisaurio', 'email' => 'izi.isaac@gmail.com']);

$response->send();