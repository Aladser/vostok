<?
/** Основной номер */
$arResult['MAIN_PHONE'] = '';
$arResult['MAIN_PHONE_WHATSAPP'] = '';
/** Горячая линия*/
$arResult['HOT_PHONE'];
/** Номера для всплывающего окна */
$arResult['PHONES'] = [];
foreach($arResult["ITEMS"] as $arItem) {
    if($arItem['CODE'] == 'MAIN_PHONE') {
        $arResult['MAIN_PHONE'] = $arItem['PROPERTIES']['NUMBER']["VALUE"];
        $arResult['MAIN_PHONE_WHATSAPP'] = $arItem['PROPERTIES']['WHATSAPP']["VALUE"];
    } else if($arItem['CODE'] == 'HOT_PHONE') {
        $arResult['HOT_PHONE'] = $arItem['PROPERTIES']['NUMBER']["VALUE"];
        $arResult['HOT_PHONE_APPLINK'] = $arItem['PROPERTIES']['WHATSAPP']["VALUE"];
    } else {
        $arResult['PHONES'][] = [
            'NAME' => $arItem['NAME'], 
            'NUMBER' => $arItem['PROPERTIES']['NUMBER']["VALUE"],
            'WHATSAPP' => $arItem['PROPERTIES']['WHATSAPP']["VALUE"]
        ];
    }
}
