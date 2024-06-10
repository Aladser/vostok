<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<?if($arResult["ITEMS"]):?>

<div class="index-faq-list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="index-faq-item" id="01">
		<div class="index-faq-item-top">
			<button class="index-faq-item__title" type="button"><?=$arItem['NAME']?></button>
			<div class="index-faq-item__icon">
				<svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="9" y="0.570312" width="2" height="21.4286" fill="#BE1E2D"></rect>
					<rect x="20" y="10.2129" width="2.14286" height="20" transform="rotate(90 20 10.2129)" fill="#BE1E2D"></rect>
				</svg>
			</div>
		</div>
		<div class="index-faq-item-hidden" style="display: none;">
			<div class="index-faq-item__text"><?=$arItem['PROPERTIES']['ANSWER']['VALUE']['TEXT']?></div>
		</div>
	</div>
<?endforeach;?>
</div>

<?endif?>