<?

include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");
define('NOT_SHOW_SIDEBAR', 'Y');

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

/** @var CMain $APPLICATION */

$APPLICATION->SetTitle("Страница не найдена");
$APPLICATION->SetPageProperty("main_class", 'error');
$APPLICATION->SetPageProperty("not_show_h1", 'Y');
$APPLICATION->SetPageProperty("not_show_text_formatting", 'Y');

$APPLICATION->AddChainItem("Страница не найдена");

ZLabs\App::inlineCss([
    'bundle-common',
    'bundle-feedback-form',
    'bundle-error',
]);
ZLabs\App::deferredJs([
    'bundle-common',
    'bundle-error',
    'bundle-feedback-form',
]);
?>

    <div class="error-block">
        <div class="error-img-block">
            <picture class="error__img">
                <source media="(max-width: 767px)" srcset="/local/assets/images/error/auto-mobile.png">
                <source srcset="/local/assets/images/error/auto-desktop.png">
                <img src="/local/assets/images/error/auto-desktop.png"
                     width="692"
                     height="144"
                     alt="Страница не найдена">
            </picture>
        </div>
        <div class="error-text-block">
            <h1 class="error__head">К сожалению, мы не смогли найти то, что вы искали.</h1>
            <div class="error__text">
                Возможно, вы попали на эту страницу по ошибке, либо она была перемещена или удалена.
                <a href="/" class="error__link">Вернуться на главную</a>
            </div>
            <div class="error-link-block">
            </div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>