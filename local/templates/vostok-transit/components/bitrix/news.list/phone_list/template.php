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

\Bitrix\Main\UI\Extension::load('ui.fonts.opensans');
$this->addExternalCss("/bitrix/css/main/bootstrap.css");
$this->addExternalCss("/bitrix/css/main/font-awesome.css");
$this->addExternalCss($this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css');

/** Основной номер */
$main_phone = '';
$main_phone_whatsapp = '';
/** Горячая линия*/
$hot_phone = '';
/** Номера для всплывающего окна */
$phone_arr = [];
foreach($arResult["ITEMS"] as $arItem) {
	if($arItem['CODE'] == 'MAIN_PHONE') {
		$main_phone = $arItem['PROPERTIES']['NUMBER']["VALUE"];
		$main_phone_whatsapp = $arItem['PROPERTIES']['WHATSAPP']["VALUE"];
	} else if($arItem['CODE'] == 'HOT_PHONE') {
		$hot_phone = $arItem['PROPERTIES']['NUMBER']["VALUE"];
		$hot_phone_appref = $arItem['PROPERTIES']['WHATSAPP']["VALUE"];
	} else {
		$phone_arr[] = [
			'NAME' => $arItem['NAME'], 
			'NUMBER' => $arItem['PROPERTIES']['NUMBER']["VALUE"],
			'WHATSAPP' => $arItem['PROPERTIES']['WHATSAPP']["VALUE"]
		];
	}
}
?>

<div class="header-contacts">
	<a class="header-phone header-phone-top" href="<?=$hot_phone_appref?>">
		<svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M16.5562 12.9062L16.1007 13.359C16.1007 13.359 15.0181 14.4355 12.0631 11.4972C9.10812 8.55901 10.1907 7.48257 10.1907 7.48257L10.4775 7.19738C11.1841 6.49484 11.2507 5.36691 10.6342 4.54348L9.37326 2.85908C8.61028 1.83992 7.13596 1.70529 6.26145 2.57483L4.69185 4.13552C4.25823 4.56668 3.96765 5.12559 4.00289 5.74561C4.09304 7.33182 4.81071 10.7447 8.81536 14.7266C13.0621 18.9492 17.0468 19.117 18.6763 18.9651C19.1917 18.9171 19.6399 18.6546 20.0011 18.2954L21.4217 16.883C22.3806 15.9295 22.1102 14.2949 20.8833 13.628L18.9728 12.5894C18.1672 12.1515 17.1858 12.2801 16.5562 12.9062Z" fill="#414759"></path>
		</svg>
		<span class="mobile-hide desktop-show"><?=$hot_phone?></span>
	</a>

    <div class="header-contacts__label">WhatsApp</div>
    <svg class="header-contacts__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.19 19.491a9.71 9.71 0 0 1-4.752-1.221L0 20l1.779-5.216A9.744 9.744 0 0 1 .381 9.745C.381 4.351 4.778 0 10.191 0 15.602 0 20 4.351 20 9.745c0 5.395-4.396 9.746-9.81 9.746zm4.93-7.455c-.05-.102-.228-.153-.457-.28-.254-.127-1.423-.713-1.652-.79-.203-.075-.38-.1-.533.128-.153.255-.61.789-.763.942-.127.152-.28.178-.508.05-.229-.127-1.017-.381-1.931-1.195-.712-.636-1.195-1.425-1.347-1.654-.153-.23-.026-.357.102-.484.101-.102.228-.28.355-.407.102-.153.153-.254.229-.407.076-.153.025-.28-.025-.407-.051-.127-.534-1.298-.737-1.781-.204-.484-.382-.407-.534-.407-.127 0-.305-.026-.457-.026-.153 0-.407.076-.636.305-.229.23-.838.815-.838 1.985 0 1.17.864 2.316.99 2.468.128.178 1.678 2.647 4.118 3.614 2.465.941 2.465.636 2.897.585.432-.051 1.423-.585 1.626-1.145.178-.56.178-1.044.102-1.094z" fill="#90C87D"></path></svg>
    <button class="header-phone-popup-button header-phone__value desktop-hide" data-src="#contacts-popup" data-fancybox="" type="button">
        <svg class="header-contacts__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.19 19.491a9.71 9.71 0 0 1-4.752-1.221L0 20l1.779-5.216A9.744 9.744 0 0 1 .381 9.745C.381 4.351 4.778 0 10.191 0 15.602 0 20 4.351 20 9.745c0 5.395-4.396 9.746-9.81 9.746zm4.93-7.455c-.05-.102-.228-.153-.457-.28-.254-.127-1.423-.713-1.652-.79-.203-.075-.38-.1-.533.128-.153.255-.61.789-.763.942-.127.152-.28.178-.508.05-.229-.127-1.017-.381-1.931-1.195-.712-.636-1.195-1.425-1.347-1.654-.153-.23-.026-.357.102-.484.101-.102.228-.28.355-.407.102-.153.153-.254.229-.407.076-.153.025-.28-.025-.407-.051-.127-.534-1.298-.737-1.781-.204-.484-.382-.407-.534-.407-.127 0-.305-.026-.457-.026-.153 0-.407.076-.636.305-.229.23-.838.815-.838 1.985 0 1.17.864 2.316.99 2.468.128.178 1.678 2.647 4.118 3.614 2.465.941 2.465.636 2.897.585.432-.051 1.423-.585 1.626-1.145.178-.56.178-1.044.102-1.094z" fill="#90C87D"></path></svg>
        <svg class="header-phone__icon" width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.866 7.5a1 1 0 0 1-1.732 0L.67 1.5A1 1 0 0 1 1.536 0h6.928a1 1 0 0 1 .866 1.5l-3.464 6z" fill="#2C3346"></path></svg>
    </button>
	
	<div class="header-phone">
		<a href="<?=$main_phone_whatsapp?>" class="header-phone__value"><?=$main_phone?></a>
		<svg class="header-phone__icon" width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.866 7.5a1 1 0 0 1-1.732 0L.67 1.5A1 1 0 0 1 1.536 0h6.928a1 1 0 0 1 .866 1.5l-3.464 6z" fill="#2C3346"></path></svg>
		<div class="contacts-popup" id="contacts-popup">
			<div class="contacts-popup-list" style="--popup-contacts-count: 5">
					<!-- основной номер -->
					<div class="contacts-popup-item">
						<div class="contacts-popup-item__label">Основной номер</div>
						<a href="<?=$main_phone_whatsapp?>" class="contacts-popup-item__phone"><?=$main_phone?></a>
						<div class="contacts-popup-item__text">Написать в <a href="<?=$main_phone_whatsapp?>">WhatsApp</a></div>
					</div>
					<!-- остальные номера -->
					<? foreach($phone_arr as $phone):?>
						<div class="contacts-popup-item">
							<div class="contacts-popup-item__label"><?=$phone['NAME']?></div>
							<a href="<?=$phone['WHATSAPP']?>" class="contacts-popup-item__phone"><?=$phone['NUMBER']?></a>
							<div class="contacts-popup-item__text">Написать в <a href="<?=$phone['WHATSAPP']?>">WhatsApp</a></div>
						</div>
					<? endforeach ?>
			</div>
			<div class="contacts-popup-button-wrap">
				<button class="contacts-popup-button button button_filled_blue" type="button" data-fancybox="" data-src="#callback-form">Заказать звонок</button>
			</div>
		</div>
	</div>
</div>

<style>
	.header-phone.header-phone-top svg {margin-right: 8px;}
	.header-phone.header-phone-top {margin-right: 25px;}
</style>