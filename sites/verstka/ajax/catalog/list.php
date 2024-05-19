<?php

error_reporting(E_ERROR | E_PARSE);

require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

use ZLabs\Frontend\MustacheSingleton;

$mustache = MustacheSingleton::getInstance();
$context = include $_SERVER['DOCUMENT_ROOT'] . '/context/index/products.php';

$context['hide'] = true;

header('content-type: text/html; charset=UTF-8');

echo $mustache->render('products-card', $context);
