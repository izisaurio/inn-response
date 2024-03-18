<?php

require '../vendor/autoload.php';

use Inn\Response\Json;

$response = new Json(['name' => 'izisaurio', 'email' => 'izi.isaac@gmail.com']);

//$response->send();

$numeric = new Json(['name' => 'izisaurio', 'id' => '0001']);

//$numeric->setNumberStringAsNumber(true)->send();


$encoded = new Json(['name' => 'izisaurio', 'id' => '0001']);

$encoded->setNumberStringAsNumber(false)->send();