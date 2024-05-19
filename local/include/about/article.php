<?

/** @global CMain $APPLICATION */

$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "article",
    array(
        "AREA_FILE_RECURSIVE" => "Y",
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "",
        "EDIT_TEMPLATE" => "",
        "COMPONENT_TEMPLATE" => "article",
        "PATH" => "/local/included_areas/about/article.php"
    ),
    false
);