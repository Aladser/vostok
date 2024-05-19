<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arTemplateParameters = array(
    "TITLE" => array(
        "NAME" => "Заголовок",
        "TYPE" => "STRING",
        "COLS" => 20,
        "ROWS" => 3,
    ),
    "SUBTITLE" => array(
        "NAME" => "Подзаголовок",
        "TYPE" => "STRING",
        "COLS" => 20,
        "ROWS" => 3,
    ),
    "BUTTON_HREF" => array(
        "NAME" => "Ссылка",
        "TYPE" => "STRING",
    ),
    "BUTTON_TEXT" => array(
        "NAME" => "Текст ссылки",
        "TYPE" => "STRING",
        "COLS" => 20,
        "ROWS" => 5,
    ),
);
