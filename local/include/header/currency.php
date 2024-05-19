<?php

global $APPLICATION;

$APPLICATION->IncludeComponent(
    "zlabs:main.currencies",
    "header",
    array(
        "COMPONENT_TEMPLATE" => "footer-buttons"
    ),
    false
);