<?php

use ZLabs\BxMustache\Link;
use Illuminate\Support\Collection;


if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arResult
 * @var array $arParams
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

if ($arResult['CURRENCIES']) {
    $arResult['context']['itemsExists'] = true;
    $arResult['context']['items'] = [];

    if ($arResult['CURRENCIES']['CNY']) {
        $arResult['context']['items']['cny'] = [
            'value' => number_format((float)$arResult['CURRENCIES']['CNY'], 2, ',', ' '),
        ];
    }

    if ($arResult['CURRENCIES']['USD']) {
        $arResult['context']['items']['usd'] = [
            'value' => number_format((float)$arResult['CURRENCIES']['USD'], 2, ',', ' '),
        ];
    }
}