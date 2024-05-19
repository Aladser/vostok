<?

/** @global CMain $APPLICATION */

$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "seo-text",
    array(
        "AREA_FILE_RECURSIVE" => "Y",
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "",
        "EDIT_TEMPLATE" => "",
        "COMPONENT_TEMPLATE" => "seo-text",
        "PATH" => "/local/included_areas/catalog-detail/seo-text.php"
    ),
    false
);