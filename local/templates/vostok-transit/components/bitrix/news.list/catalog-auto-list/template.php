<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$CURRATE_RUB_TO_CNY = 12.28;
?>

<?if($arResult["ITEMS"]):?>

	<div class="products-list">
		<? foreach($arResult["ITEMS"] as $arItem): ?>
			<div class="products-card">
				<div class="products-card-image-wrap">
					<img src="<?=$arItem['DETAIL_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>" width="267" height="200" class="products-card-image" loading="lazy">
				</div>
				<div class="products-card__info">
					<a href="#" class="products-card__name"><?=$arItem['NAME']?></a>
					<div class="products-card-props">
							<div class="products-card-prop">
								<div class="products-card-prop__label">Год:</div>
								<div class="products-card-prop__value"><?=$arItem['PROPERTIES']['YEAR']['VALUE']?></div>
							</div>
							<div class="products-card-prop">
								<div class="products-card-prop__label">Пробег (км):</div>
								<div class="products-card-prop__value"><?=$arItem['PROPERTIES']['MILEAGE']['VALUE']==0 ? 'новый' : $arItem['PROPERTIES']['MILEAGE']['VALUE']?></div>
							</div>
							<div class="products-card-prop">
								<div class="products-card-prop__label">Двигатель:</div>
								<div class="products-card-prop__value"><?=$arItem['PROPERTIES']['ENGINE_VOLUME']['VALUE']/1000?> л / <?=$arItem['PROPERTIES']['ENGINE_POWER']['VALUE']?> л.с</div>
							</div>
							<div class="products-card-prop">
								<div class="products-card-prop__label">Комплектация:</div>
								<div class="products-card-prop__value"><?=$arItem['PROPERTIES']['EQUIPMENT']['VALUE']?></div>
							</div>
							<div class="products-card-prop">
								<div class="products-card-prop__label">Цвет:</div>
								<div class="products-card-prop__value"><?=$arItem['PROPERTIES']['COLOR']['VALUE']?></div>
							</div>
					</div>
					<div class="products-card__price-wrap">
						<div class="products-card-price">
							<div class="products-card-price__label">Стоимость авто</div>
								<div class="products-card-price__value products-card-price__value_main">
									<span class="products-card-price__number"><?=$arItem['PROPERTIES']['PRICE_CNY']['VALUE']?></span>
									<span class="products-card-price__currency">¥</span>
								</div>
								<div class="products-card-price__value">
									<span class="products-card-price__number"><?=$arItem['PROPERTIES']['PRICE_CNY']['VALUE']*$CURRATE_RUB_TO_CNY?></span>
									<span class="products-card-price__currency">₽</span>
								</div>
						</div>
						<div class="products-card-notice">
							<button class="products-card-notice__btn" data-src="#products-card-modal-notice" data-fancybox="" type="button"></button>
							<svg class="products-card-notice__icon" xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="none" viewBox="0 0 29 29"><g fill="#2C3346"><path d="M14.112 0C6.38 0 .09 6.29.09 14.023c0 7.732 6.29 14.022 14.022 14.022s14.023-6.29 14.023-14.022S21.845 0 14.112 0Zm0 25.495c-6.326 0-11.473-5.146-11.473-11.472C2.64 7.696 7.786 2.55 14.112 2.55c6.327 0 11.473 5.146 11.473 11.473 0 6.326-5.146 11.472-11.473 11.472Z"></path><path d="M14.112 5.949c-.937 0-1.7.763-1.7 1.7 0 .937.763 1.7 1.7 1.7.937 0 1.7-.763 1.7-1.7 0-.937-.763-1.7-1.7-1.7Zm0 5.949c-.704 0-1.274.57-1.274 1.274v7.649a1.275 1.275 0 0 0 2.55 0v-7.649c0-.704-.572-1.274-1.276-1.274Z"></path></g></svg>
							<div class="products-card-notice-tip">
								Стоимость автомобиля может отличаться от указанной из-за ввиду колебания курса валют. Для расчета точной стоимости свяжитесь с нами.
								<span class="products-card-notice-tip__arrow"></span>
							</div>
						</div>
					</div>
					<div class="products-card__buttons">
						<button class="products-card-button modal-form-link button button_filled_blue" data-src="#order-form" data-product-id="" type="button">Оставить заявку</button>
						<a href="#" class="products-card-link">Подробнее о автомобиле</a>
					</div>
				</div>
			</div>
		<? endforeach ?>
	</div>

<?endif?>