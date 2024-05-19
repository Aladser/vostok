<?php

use ZLabs\BxMustache\Link;


if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arResult
 * @var array $arParams
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$arResult['context'] = [
    'title' => $arParams['~TITLE'],
];

if ($arParams['BUTTON1_HREF']) {
    $arResult['context']['button1'] = new Link();

    $arResult['context']['button1']->href = $arParams['BUTTON1_HREF'];
    $arResult['context']['button1']->text = $arParams['BUTTON1_TEXT'];
}

if ($arParams['BUTTON2_HREF']) {
    $arResult['context']['button2'] = new Link();

    $arResult['context']['button2']->href = $arParams['BUTTON2_HREF'];
    $arResult['context']['button2']->text = $arParams['BUTTON2_TEXT'];
}