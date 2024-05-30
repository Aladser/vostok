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

<? if($arResult["ITEMS"]):?>

<div class="index-blog">
    <div class="index-blog-container container">
        <div class="index-blog-header">
                <div class="index-blog-header__title">
                    Журнал
                </div>
                <a href="#" class="index-blog-header__link"><span class="mobile-show tablet-hide">Все новости</span><span class="mobile-hide tablet-show">Смотреть все новости</span></a>
        </div>
        <div class="index-blog-tabs swiper swiper-initialized swiper-horizontal swiper-free-mode swiper-backface-hidden">
            <div class="index-blog-tabs-wrapper swiper-wrapper">
                    <a href="#" class="index-blog-tab swiper-slide swiper-slide-active" style="margin-right: 11px;">
                        Статьи
                    </a>
                    <a href="#" class="index-blog-tab swiper-slide swiper-slide-next" style="margin-right: 11px;">
                        Новости
                    </a>
                    <a href="#" class="index-blog-tab swiper-slide" style="margin-right: 11px;">
                        Обзоры
                    </a>
                    <a href="#" class="index-blog-tab swiper-slide" style="margin-right: 11px;">
                        Рынок
                    </a>
            </div>
        </div>
        <div class="index-blog-list">
			<!-- большие карточки -->
			<? for($i=0; $i<2; $i++): ?>
				<div class="index-blog-card" id="bx000<?=$i+1?>">
					<div class="index-blog-card-img">
						<img src="<?=$arResult["ITEMS"][$i]["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arResult["ITEMS"][$i]['NAME']?>" width="558" height="398" class="index-blog-card__image" loading="lazy">
					</div>
					<div class="index-blog-card-aside">
						<div class="index-blog-card__date"><?=$arResult["ITEMS"][$i]["PROPERTIES"]['DATE']['VALUE']?></div>
						<div class="index-blog-card__sections">| Новости</div>
					</div>
					<div class="index-blog-card__title"><?=$arResult["ITEMS"][$i]['NAME']?></div>
					<div class="index-blog-card__subtitle"><?=$arResult["ITEMS"][$i]["PREVIEW_TEXT"]?></div>
					<a href="#" class="link-as-card"></a>
					<div class="index-blog-card-button"><a href="#" class="index-blog-card__link">Подробнее</a></div>
				</div>
			<? endfor ?>
			<!-- малые карточки -->
			<? for($i=2; $i<5; $i++): ?>
				<div class="index-blog-card" id="bx000<?=$i+1?>">
					<div class="index-blog-card-img">
						<img src="<?=$arResult["ITEMS"][$i]["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arResult["ITEMS"][$i]['NAME']?>" alt="<?=$arResult["ITEMS"][$i]['NAME']?>" width="558" height="398" class="index-blog-card__image" loading="lazy">
					</div>
					<div class="index-blog-card-aside">
						<div class="index-blog-card__date"><?=$arResult["ITEMS"][$i]["PROPERTIES"]['DATE']['VALUE']?></div>
						<div class="index-blog-card__sections">| Новости</div>
					</div>
					<div class="index-blog-card__title"><?=$arResult["ITEMS"][$i]['NAME']?></div>
					<div class="index-blog-card__subtitle"><?=$arResult["ITEMS"][$i]["PREVIEW_TEXT"]?></div>
					<a href="#" class="link-as-card"></a>
				</div>
			<? endfor ?>
    </div>
</div>

<?endif?>