<?php

use Bitrix\Main\Loader;

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php');

    Loader::includeModule('iblock');

    ZLabs\App::init();
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/config/events.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/config/events.php');
}
