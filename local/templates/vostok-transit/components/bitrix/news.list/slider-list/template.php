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
?>

<div class="index-top">
    <button class="index-top-slider-arrow index-top-slider-arrow_prev" type="button">
      <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M.75 12.343L6.158 7 .75 1.645 2.415 0 9.5 7l-7.085 7L.75 12.343z" fill="#282D3C"></path>
      </svg>
    </button>
    <div class="index-top-slider swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
      	<div class="swiper-wrapper index-top-slider__wrapper" style="transition-duration: 700ms; transform: translate3d(-2312px, 0px, 0px);">
			<? $img_folder_path = '/local/assets/images/temp/index/top/'; ?>
	  		<? for($i=0; $i<count($arResult["ITEMS"]); $i++): ?>
				<? 
					$mobile_photo_car = $img_folder_path.$arResult["ITEMS"][$i]['PROPERTIES']['MOBILE_PHOTO']['VALUE'];
					$tablet_photo_car = $img_folder_path.$arResult["ITEMS"][$i]['PROPERTIES']['TABLET_PHOTO']['VALUE'];
					$photo_car = $img_folder_path.$arResult["ITEMS"][$i]['PROPERTIES']['PHOTO']['VALUE'];
				?>

				<? if( ($i+1)%2 !== 0 && ($i+3)%3!=0 ): ?>
					<div class="index-top-slide swiper-slide swiper-slide-next" style="width: 1140px; margin-right: 16px;" data-swiper-slide-index="1">
				<? elseif( ($i+1)%2 == 0):?>
					<div class="index-top-slide swiper-slide swiper-slide-prev" data-swiper-slide-index="2" style="width: 1140px; margin-right: 16px;">
				<? else: ?>
					<div class="index-top-slide swiper-slide swiper-slide-active" style="width: 1140px; margin-right: 16px;" data-swiper-slide-index="0">
				<? endif ?>

						<picture class="index-top-slide__img">
							<source media="(max-width: 767px)" srcset="<?=$mobile_photo_car?>, <?=$mobile_photo_car?> 2x">
							<source media="(max-width: 1279px)" srcset="<?=$tablet_photo_car?>, <?=$tablet_photo_car?> 2x">
							<source srcset="<?=$photo_car?>, <?=$photo_car?> 2x">
							<img src="<?=$photo_car?>" alt="Подбор и доставка автомобилей из Азии под ключ" width="1140" height="470" loading="lazy">
						</picture>
						<div class="index-top-slide__content">
							<div class="index-top-slide__title"><?=$arResult["ITEMS"][$i]['NAME']?></div>
							<div class="index-top-slide__subtitle"><?=$arResult["ITEMS"][$i]['PREVIEW_TEXT']?></div>
						</div>
						<a href="" class="link-as-card"></a>

					</div>
			<? endfor ?>
		</div>
    </div>
    <button class="index-top-slider-arrow index-top-slider-arrow_next" type="button">
      <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M.75 12.343L6.158 7 .75 1.645 2.415 0 9.5 7l-7.085 7L.75 12.343z" fill="#282D3C"></path>
      </svg>
    </button>
    <div class="index-top-slider-pagination slider-dots swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="slider-dot slider-dot_active"></span><span class="slider-dot"></span><span class="slider-dot"></span></div>
  </div>