<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?

use ZLabs\DeferredFunctions;
use ZLabs\Helpers\BxFrontendChecker;
use ZLabs\Frontend\MustacheSingleton;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$mustache = MustacheSingleton::getInstance();
$isMainPage = CSite::InDir('/index.php');
$isSearchPage = CSite::InDir('/index.php');

global $USER, $APPLICATION;

?>
<!DOCTYPE html>
<html lang="<?= ZLabs\App::$context->getLanguage(); ?>">
<head>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><? $APPLICATION->ShowTitle() ?></title>
    <?php
    echo DeferredFunctions\Asset\InlineStyles::show();
    echo DeferredFunctions\Asset\InlineJs::show();

    ZLabs\App::Include('header/favicon');

    $APPLICATION->ShowMeta('robots', false);
    $APPLICATION->ShowMeta('keywords', false);
    $APPLICATION->ShowMeta('description', false);
    $APPLICATION->ShowLink('canonical', null);
    ?>

    <link rel="preload" href="/local/assets/local/fonts/RobotoFlex.ttf" as="font" type="font/ttf" crossorigin>

    <? if ((new BxFrontendChecker())->needAddFrontend()) {
        ZLabs\App::CMain()->ShowHeadStrings();
        ZLabs\App::CMain()->ShowHeadScripts();
        ZLabs\App::CMain()->SetPageProperty('needBxStyles', 'Y');
    } ?>

    <? DeferredFunctions\PreloadImage::show(); ?>
    <? ZLabs\App::CMain()->ShowViewContent('social-head'); ?>
    <style>
      .page #bx-panel {
        position: relative !important;
        width: 100% !important;
        top: 0;
      }
    </style>
</head>
<body class="page">
<div class="fixed-panel">
    <? ZLabs\App::CMain()->ShowPanel(); ?>
</div>
<div class="page-inner">
    <? ZLabs\App::Include('header/template'); ?>
    <main class="main<? DeferredFunctions\MainClass::show() ?>">
        <?
        DeferredFunctions\ShowNavChain::show();
        DeferredFunctions\InnerTitle::show();
        DeferredFunctions\ShowContainer::showHead();
        DeferredFunctions\ShowTextFormatting::showHead();
        ?>

