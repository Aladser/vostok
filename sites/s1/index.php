<?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

/** @var CMain $APPLICATION */

$APPLICATION->SetTitle("Группа компаний Восток Транзит");
$APPLICATION->SetPageProperty("main_class", 'index');
$APPLICATION->SetPageProperty("not_show_h1", 'Y');
$APPLICATION->SetPageProperty("not_show_container", 'Y');
$APPLICATION->SetPageProperty("not_show_nav_chain_custom", 'Y');
$APPLICATION->SetPageProperty("not_show_text_formatting", 'Y');
?><?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"main-menu",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"COMPONENT_TEMPLATE" => "main-menu",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N"
	)
);?><br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>