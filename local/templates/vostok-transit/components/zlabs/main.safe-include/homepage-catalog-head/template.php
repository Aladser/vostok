<?


if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<div class="index-catalog__head">
    <? if ($arResult['context']['title']) : ?>
        <div class="index-catalog__title"><?= $arResult['context']['title'] ?></div>
    <? endif; ?>
    <? if ($arResult['context']['link']) : ?>
        <a href="<?= $arResult['context']['link'] ?>" class="index-catalog__link">
            <span class="tablet-hide">Полный каталог</span>
            <span class="mobile-hide tablet-show">Смотреть полный каталог</span>
        </a>
    <? endif; ?>
</div>