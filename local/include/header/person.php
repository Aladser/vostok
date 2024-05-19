<?php

use ZLabs\BxMustache\Link;
use ZLabs\Frontend\MustacheSingleton;

global $USER;

$mustache = MustacheSingleton::getInstance();

$link = new Link();

if ($USER->IsAdmin()) {
    $link->href = '/personal/';
    $link->text = 'Личный кабинет';
} else {
    $link->href = '/personal/';
    $link->text = 'Личный кабинет';
}

echo $mustache->render('header-person', $link);