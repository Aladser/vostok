<?
/** @global CMain $APPLICATION */

$APPLICATION->IncludeComponent(
	"zlabs:main.safe-include", 
	"footer_social_buttons", 
	array(
		"BUTTON1_HREF" => "https://rutube.ru",
		"BUTTON1_TEXT" => "Rutube",
		"BUTTON2_HREF" => "https://www.youtube.com",
		"BUTTON2_TEXT" => "Youtube",
		"BUTTON_HREF" => "https://rutube.ru/",
		"BUTTON_TEXT" => "",
		"SUBTITLE" => "",
		"TITLE" => "Соцсети",
		"COMPONENT_TEMPLATE" => "footer_social_buttons",
		"BUTTON3_HREF" => "https://vk.com",
		"BUTTON3_TEXT" => "VK",
		"BUTTON4_HREF" => "https://web.telegram.org",
		"BUTTON4_TEXT" => "Телеграм"
	),
	false
);