<?
/** @global CMain $APPLICATION */

$APPLICATION->IncludeComponent(
    "zlabs:main.safe-include",
    "homepage-auto-selection",
    array(
        "TITLE" => "Индивидуальный подход к каждому клиенту",
        'SUBTITLE' => "Наши специалисты могут подобрать автомобиль в любом из представленных на рынке сегментов от бюджетного автомобиля до представительского",
        'BUTTON_HREF' => "#auto-selection",
        'BUTTON_TEXT' => "Онлайн-заявка <br class=\"mobile-show tablet-hide\">на подбор авто",
        "COMPONENT_TEMPLATE" => "homepage-auto-selection"
    ),
    false
);