<?php

global $APPLICATION;

$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    array(
        "AREA_FILE_RECURSIVE" => "Y",
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "",
        "EDIT_TEMPLATE" => "standard.php",
        "COMPONENT_TEMPLATE" => "global",
        "PATH" => "/local/included_areas/footer/copyright.php"
    ),
    false
);