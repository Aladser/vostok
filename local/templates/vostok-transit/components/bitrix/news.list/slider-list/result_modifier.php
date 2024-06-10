<?
$img_folder_path = '/local/assets/images/temp/index/top/';
for($i=0; $i<count($arResult["ITEMS"]); $i++) {
    // Фото
    $arResult["ITEMS"][$i]['PHOTO'] = $img_folder_path.$arResult["ITEMS"][$i]['PROPERTIES']['PHOTO']['VALUE'];
    $arResult["ITEMS"][$i]['TABLET_PHOTO'] = $img_folder_path.$arResult["ITEMS"][$i]['PROPERTIES']['TABLET_PHOTO']['VALUE'];
    $arResult["ITEMS"][$i]['MOBILE_PHOTO'] = $img_folder_path.$arResult["ITEMS"][$i]['PROPERTIES']['MOBILE_PHOTO']['VALUE'];
    unset($arResult["ITEMS"][$i]['DISPLAY_PROPERTIES']);
    unset($arResult["ITEMS"][$i]['PROPERTIES']);
}