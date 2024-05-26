<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use ZLabs\DeferredFunctions;
use Bitrix\Main\Context;
use Bitrix\Main\Page\Asset;
use ZLabs\Frontend\MustacheSingleton;

/** @var MustacheSingleton $mustache */
/** @global CMain $APPLICATION */

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
// Напишите нам и Заказать звонок
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

echo '</body></html>';