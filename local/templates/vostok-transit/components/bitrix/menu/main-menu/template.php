<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!-- CUSTOM header-menu -->
<div class="header-menu"><ul class="header-menu-list">

<? $previousLevel = 0; ?>
<?foreach($arResult as $arItem):?>
	<!-- закрытие тегов вложенного меню -->
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>
		<!-- элементы верхнего меню c вложенным меню -->
		<li class="header-menu-item header-menu-item_parent">
			<a href="<?=$arItem["LINK"]?>" class="header-menu-item__link<?if ($arItem["SELECTED"]):?> root-item-selected<?else:?> root-item<?endif?>">
				<span class="header-menu-item__text"><?=$arItem["TEXT"]?> </span> 	
			</a>
			<svg class="header-menu-item__arrow" width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.866 7.5a1 1 0 0 1-1.732 0L.67 1.5A1 1 0 0 1 1.536 0h6.928a1 1 0 0 1 .866 1.5l-3.464 6z" fill="#2C3346"></path></svg>                   
			<ul class="header-submenu">

	<?else:?>
		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<!-- элементы верхнего меню без вложенного меню -->
			<li class="header-menu-item">
				<a href="<?=$arItem["LINK"]?>" class="header-menu-item__link"> 
					<span class="header-menu-item__text"> <?=$arItem["TEXT"]?> </span>
				</a>
			</li>
		<?else:?>
			<!-- элементы вложенного меню -->
			<li class="header-submenu-item<?if ($arItem["SELECTED"]):?> item-selected<?endif?>">
				<a href="<?=$arItem["LINK"]?>" class="header-submenu-item__link"> <?=$arItem["TEXT"]?> </a>
			</li>
		<?endif?>
	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul></div>
<!-- /CUSTOM header-menu -->

<div class="menu-clear-left"></div>	
