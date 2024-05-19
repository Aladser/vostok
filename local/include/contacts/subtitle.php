<?php

/** @global CMain $APPLICATION */

$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    array(
        "AREA_FILE_RECURSIVE" => "Y",
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "",
        "EDIT_TEMPLATE" => "",
        "COMPONENT_TEMPLATE" => "",
        "PATH" => "/local/included_areas/contacts/subtitle.php"
    ),
    false
);