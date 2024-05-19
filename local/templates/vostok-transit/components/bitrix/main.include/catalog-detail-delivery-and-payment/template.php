<?php


defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

/** @var array $arResult */

$this->setFrameMode(true);
if ($APPLICATION->GetShowIncludeAreas()) : ?>
    <div class="container system-info-form"><b>Компонент текста о доставке и оплате</b></div>
<? endif;?>
<?
if ($arResult["FILE"] <> '') {
    $this->SetViewTarget('delivery-and-payment-tab');
    echo '<button class="detail-tabs-link swiper-slide" data-tab="delivery-and-payment" type="button">Доставка и оплата</button>';
    $this->EndViewTarget();

    $this->SetViewTarget('delivery-and-payment');
    echo '<div class="detail-tabs-panel" data-tab="delivery-and-payment">';
    include($arResult["FILE"]);
    echo '</div>';
    $this->EndViewTarget();
}
