<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arResult
 * @var array $arParams
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$arResult['context'] = [
    'title' => $arParams['~TITLE'],
    'link' => $arParams['LINK'],
];
