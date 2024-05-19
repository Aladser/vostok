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

<h1 style="text-align:center;">
    Контент
</h1>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>