<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="header-menu">
    <ul class="header-menu-list">
            <li class="header-menu-item">
                <a href="#" class="header-menu-item__link">
                    <span class="header-menu-item__text">Каталог автомобилей</span>
                </a>
            </li>
            <li class="header-menu-item header-menu-item_active">
                <a href="#" class="header-menu-item__link">
                    <span class="header-menu-item__text">Как купить</span>
                </a>
            </li>
            <li class="header-menu-item">
                <a href="#" class="header-menu-item__link">
                    <span class="header-menu-item__text">Доставка и оплата</span>
                </a>
            </li>
            <li class="header-menu-item">
                <a href="#" class="header-menu-item__link">
                    <span class="header-menu-item__text">Журнал</span>
                </a>
            </li>
            <li class="header-menu-item">
                <a href="#" class="header-menu-item__link">
                    <span class="header-menu-item__text">Контакты</span>
                </a>
            </li>
            <li class="header-menu-item header-menu-item_parent">
                <a href="#" class="header-menu-item__link">
                    <span class="header-menu-item__text">О Компании</span>
                </a>
                    <svg class="header-menu-item__arrow" width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.866 7.5a1 1 0 0 1-1.732 0L.67 1.5A1 1 0 0 1 1.536 0h6.928a1 1 0 0 1 .866 1.5l-3.464 6z" fill="#2C3346"></path></svg>
                    <ul class="header-submenu">
	                        <li class="header-submenu-item">
								<a href="#" class="header-submenu-item__link">Документы</a>
	                        </li>
	                        <li class="header-submenu-item header-submenu-item_active">
								<a href="#" class="header-submenu-item__link">Отзывы</a>
	                        </li>
	                        <li class="header-submenu-item">
								<a href="#" class="header-submenu-item__link">Вопрос-ответ</a>
	                        </li>
	                        <li class="header-submenu-item">
								<a href="#" class="header-submenu-item__link">Связаться с менеджером</a>
	                        </li>
                    </ul>
            </li>
    </ul>
</div>

<br><br>



<br><br>

<?if (!empty($arResult)):?>
<ul id="horizontal-multilevel-menu">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul>
		<?else:?>
			<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<div class="menu-clear-left"></div>
<?endif?>