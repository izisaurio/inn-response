<?php

require '../vendor/autoload.php';

use Inn\Response\Html;

$smarty = new Smarty();
$html = $smarty->fetch('notFound.tpl');

$response = new Html($html);
$response->setCode(404)->send();