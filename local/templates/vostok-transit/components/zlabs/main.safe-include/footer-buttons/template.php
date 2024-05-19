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
<? if ($arResult['context']['title']) : ?>
    <div class="footer-buttons__title"><?= $arResult['context']['title'] ?></div>
<? endif; ?>
<div class="footer-buttons__list">
    <? if ($arResult['context']['button1']) : ?>
        <a href="<?=$arResult['context']['button1']->href?>" class="footer-button button button_linear modal-form-link" data-fancybox><?=$arResult['context']['button1']->text?></a>
    <? endif; ?>
    <? if ($arResult['context']['button2']) : ?>
        <a href="<?=$arResult['context']['button2']->href?>" class="footer-button button button_linear modal-form-link" data-fancybox><?=$arResult['context']['button2']->text?></a>
    <? endif; ?>
</div>
