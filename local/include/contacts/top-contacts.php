<?php

global $APPLICATION;

$APPLICATION->IncludeComponent(
	"zlabs:main.safe-include", 
	"contacts-top-contacts", 
	array(
		"TEL" => "+7 924 142-24-14",
		"ADDRESS" => "",
		"EMAIL" => "east.transit@yandex.ru",
		"COMPONENT_TEMPLATE" => "contacts-top-contacts"
	),
	false
);