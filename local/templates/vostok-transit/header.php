<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?

use ZLabs\DeferredFunctions;
use ZLabs\Helpers\BxFrontendChecker;
use ZLabs\Frontend\MustacheSingleton;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$mustache = MustacheSingleton::getInstance();
// проверка на нахождение в index.php
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
    <title><? $APPLICATION->ShowTitle();?></title>
    <?php
    // внутренние стили
    echo DeferredFunctions\Asset\InlineStyles::show();
    // <script data-skip-moving="true"></script>
    echo DeferredFunctions\Asset\InlineJs::show();
    // список <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/apple-touch-icon-57x57.png">
    ZLabs\App::Include('header/favicon');

    $APPLICATION->ShowMeta('robots', false);
    $APPLICATION->ShowMeta('keywords', false);
    $APPLICATION->ShowMeta('description', false);
    $APPLICATION->ShowLink('canonical', null);
    ?>

    <link rel="preload" href="/local/assets/local/fonts/RobotoFlex.ttf" as="font" type="font/ttf" crossorigin>

    <? if ((new BxFrontendChecker())->needAddFrontend()) {
      /** 
       * Отображает специальные стили, JavaScript либо произвольный html-код.
      * Метод использует технологию отложенных функций и используется в шаблоне сайта для вывода произвольного кода. Такой код задается, например, в компонентах с помощью CMain::AddHeadString().
      * ShowHeadStrings - аналог методов ShowMeta, ShowTitle, ShowCSS, только более универсальный. Нестатический метод.
      */
        ZLabs\App::CMain()->ShowHeadStrings();
        ZLabs\App::CMain()->ShowHeadScripts();
        
        ZLabs\App::CMain()->SetPageProperty('needBxStyles', 'Y');
    } ?>

    <? DeferredFunctions\PreloadImage::show(); ?>
    <?
    /**
     * Метод позволяет установить выводимый контент для функции AddViewContent. 
     * Применение этих методов позволяет, например, в шаблоне сайта вывести даты отображенных в контентой части новостей. 
     * (Для этого достаточно в цикле вывода новостей собрать даты новостей, соединить в одну строку и передать в AddViewContent). 
     * Прежде всего позволяет избежать дублирование компонент и лишних циклов. Нестатический метод.
     */
    ?>
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
  <div class="fixed-panel"><? ZLabs\App::CMain()->ShowPanel(); ?></div>

  <div class="page-inner">
      <!-- /local/include/.. -->
      <? ZLabs\App::Include('header/template'); ?>
      <main class="main<? DeferredFunctions\MainClass::show() ?>">
          <?
          DeferredFunctions\ShowNavChain::show();
          DeferredFunctions\InnerTitle::show();
          DeferredFunctions\ShowContainer::showHead();
          DeferredFunctions\ShowTextFormatting::showHead();
          ?>

