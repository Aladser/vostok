<?php

use ZLabs\Frontend\MustacheSingleton;

$mustache = MustacheSingleton::getInstance();

echo $mustache->render('header-location', include $_SERVER['DOCUMENT_ROOT'] . '/../verstka/context/header/location.php');