<?

/** @global CMain $APPLICATION */

$APPLICATION->IncludeComponent(
    "bitrix:menu",
    "sidebar-menu",
    array(
        "ALLOW_MULTI_SELECT" => "N",
        "DELAY" => "N",
        "MAX_LEVEL" => "2",
        "CHILD_MENU_TYPE" => "left",
        "MENU_CACHE_GET_VARS" => array(),
        "MENU_CACHE_TIME" => "3600000",
        "MENU_CACHE_TYPE" => "A",
        "MENU_CACHE_USE_GROUPS" => "N",
        "ROOT_MENU_TYPE" => 'side',
        "USE_EXT" => "Y",
        "COMPONENT_TEMPLATE" => "sidebar-menu",
    ),
    false
);