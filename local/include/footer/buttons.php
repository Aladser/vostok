<?php

global $APPLICATION;

$APPLICATION->IncludeComponent(
    "zlabs:main.safe-include",
    "footer-buttons",
    array(
        "TITLE" => "Есть вопросы или предложения?",
        'BUTTON1_HREF' => "#write-form",
        'BUTTON1_TEXT' => "Напишите нам",
        'BUTTON2_HREF' => "#callback-form",
        'BUTTON2_TEXT' => "Заказать звонок",
        "COMPONENT_TEMPLATE" => "footer-buttons"
    ),
    false
);