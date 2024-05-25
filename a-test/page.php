<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?

use ZLabs\DeferredFunctions;
use ZLabs\Helpers\BxFrontendChecker;
use ZLabs\Frontend\MustacheSingleton;
use Bitrix\Main\Context;
use Bitrix\Main\Page\Asset;

/** @var MustacheSingleton $mustache */
/** @global CMain $APPLICATION */

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



<?php
    if (ZLabs\RestartBuffer::IsAjax()) {
        return;
    }

    $needCanonical = $APPLICATION->GetDirProperty("need_canonical");
    $server = Context::getCurrent()->getServer();
    $asset = Asset::getInstance();

    echo '</main>';

    if ($APPLICATION->GetPageProperty('hide_footer') !== 'Y') {
        ZLabs\App::Include('footer/template');
    }

    // page-inner
    echo '</div>';

    $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "global",
        array(
            "AREA_FILE_RECURSIVE" => "Y",
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "",
            "EDIT_TEMPLATE" => "standard.php",
            "COMPONENT_TEMPLATE" => "global",
            "PATH" => "/local/included_areas/global/global_forms.php"
        ),
        false
    );
    $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        array(
            "AREA_FILE_RECURSIVE" => "Y",
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "",
            "EDIT_TEMPLATE" => "standard.php",
            "COMPONENT_TEMPLATE" => "global",
            "PATH" => "/local/included_areas/global/feedback-form-success.php"
        ),
        false
    );


    DeferredFunctions\Asset\DeferredStyles::show();
    DeferredFunctions\Asset\DeferredJs::show();
    DeferredFunctions\Asset\AsyncJs::show();

    $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "social-head",
        array(
            "AREA_FILE_RECURSIVE" => "Y",
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "form_for_sect",
            "EDIT_TEMPLATE" => "standard.php",
            "COMPONENT_TEMPLATE" => "social-head",
            "PATH" => "/local/included_areas/socials/social-head.php"
        ),
        false
    );
    $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "social",
        array(
            "AREA_FILE_RECURSIVE" => "Y",
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "form_for_sect",
            "EDIT_TEMPLATE" => "standard.php",
            "COMPONENT_TEMPLATE" => "social",
            "PATH" => "/local/included_areas/socials/social.php"
        ),
        false
    );
?>
</body>
</html>