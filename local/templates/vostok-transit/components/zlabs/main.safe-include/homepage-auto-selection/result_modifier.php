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
    'items' => collect(),
];
$context = [
    'title' => $arParams['~TITLE'],
    'subtitle' => $arParams['~SUBTITLE'],
];

if ($arParams['BUTTON_HREF']) {
    $context['button'] = new Link();

    $context['button']->href = $arParams['BUTTON_HREF'];
    $context['button']->text = $arParams['~BUTTON_TEXT'];
}

$arResult['context']['items']->push($context);