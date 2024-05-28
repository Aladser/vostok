<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	/** @var CMain $APPLICATION */
	$APPLICATION->SetTitle("Группа компаний Восток Транзит");
	$APPLICATION->SetPageProperty("main_class", 'index');
	$APPLICATION->SetPageProperty("not_show_h1", 'Y');
	$APPLICATION->SetPageProperty("not_show_container", 'Y');
	$APPLICATION->SetPageProperty("not_show_nav_chain_custom", 'Y');
	$APPLICATION->SetPageProperty("not_show_text_formatting", 'Y');
?>


<div class='container'>
	<?$APPLICATION->IncludeComponent("bitrix:menu", "main-menu", Array(
		"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
			"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
			"COMPONENT_TEMPLATE" => "horizontal_multilevel",
			"DELAY" => "N",	// Откладывать выполнение шаблона меню
			"MAX_LEVEL" => "2",	// Уровень вложенности меню
			"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
			"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
			"MENU_CACHE_TYPE" => "N",	// Тип кеширования
			"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
			"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
			"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		),
		false
	);?>
	<br>
</div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>