<?php

require '../vendor/autoload.php';

use Inn\Response\Html;

$smarty = new Smarty();
$smarty->assign('name', 'izisaurio');
$html = $smarty->fetch('html.tpl');

$response = new Html($html);
$response->send();