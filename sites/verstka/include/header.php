<?php

use ZLabs\Asset\AsyncJs;
use ZLabs\Asset\DeferredJs;
use ZLabs\Asset\DeferredStyles;
use ZLabs\Asset\InlineJs;
use ZLabs\Asset\InlineStyles;
use ZLabs\EnvSingleton;
use ZLabs\Frontend\MustacheSingleton;

/** @var array $pageConfig */
/** @var MustacheSingleton $mustache */

require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/local/assets/mustache/')
]);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    <title><?= $pageConfig['title'] ?></title>
    <?php
    // Если фронтенд собран, покажем стили и скрипты "инлайново"
    if (EnvSingleton::getInstance()->isFrontendMode()) {
        echo (new InlineStyles($pageConfig['inlineCss']))->render();
        echo (new InlineJs($pageConfig['inlineJs']))->render();
    }
    ?>
</head>
<body class="page<?= $pageConfig['pageClass'] ? ' ' . $pageConfig['pageClass'] : '' ?>">
<div class="fixed-panel">
</div>
<div class="page-inner">
    <header class="header">
        <div class="header-top">
            <div class="header__container container">
                <?= $mustache->render('header-logo', [ 'isMainPage' => $pageConfig['isMainPage'] ]); ?>
                <?= $mustache->render('header-location', include $_SERVER['DOCUMENT_ROOT'] . '/context/header/location.php'); ?>
                <?= $mustache->render('header-contacts', include $_SERVER['DOCUMENT_ROOT'] . '/context/header/contacts.php'); ?>
                <?= $mustache->render('header-currency', include $_SERVER['DOCUMENT_ROOT'] . '/context/header/currency.php'); ?>
                <?= $mustache->render('header-menu-toggle'); ?>
                <?= $mustache->render('mobile-menu', include $_SERVER['DOCUMENT_ROOT'] . '/context/header/mobile-menu.php') ?>
            </div>
        </div>
        <div class="header-nav">
            <div class="header__container container">
                <a href="#" class="header-button button button_filled_blue" data-fancybox>Консультация</a>
                <?= $mustache->render('header-menu', include $_SERVER['DOCUMENT_ROOT'] . '/context/header/menu.php'); ?>
                <?= $mustache->render('header-person', include $_SERVER['DOCUMENT_ROOT'] . '/context/header/person.php'); ?>
            </div>
        </div>
    </header>