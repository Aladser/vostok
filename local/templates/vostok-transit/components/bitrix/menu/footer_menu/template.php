<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<div class="footer-menu">
    <div class="footer-menu__container container">
        <ul class="footer-menu-list">
			<?
			foreach($arResult as $arItem):
				if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
					continue;
			?>
				<?if($arItem["SELECTED"]):?>
					<li class="footer-menu-item"><a href="<?=$arItem["LINK"]?>" class="footer-menu-item__link selected"><?=$arItem["TEXT"]?></a></li>
				<?else:?>
					<li class="footer-menu-item"><a href="<?=$arItem["LINK"]?>" class="footer-menu-item__link"> <?=$arItem["TEXT"]?> </a></li>
				<?endif?>
			<?endforeach?>
        </ul>
    </div>
</div>

<?endif?>