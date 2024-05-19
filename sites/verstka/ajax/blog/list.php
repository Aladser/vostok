<?php

error_reporting(E_ERROR | E_PARSE);

require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

use ZLabs\Frontend\MustacheSingleton;


$mustache = MustacheSingleton::getInstance();
$context = include $_SERVER['DOCUMENT_ROOT'] . '/context/index/blog/index-blog-next.php';

header('content-type: text/html; charset=UTF-8');

echo $mustache->render('index-blog-card', $context);