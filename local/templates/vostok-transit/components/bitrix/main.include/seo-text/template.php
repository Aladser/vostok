<?php


defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

/** @var array $arResult */

$this->setFrameMode(true);

if ($arResult["FILE"] <> ''):?>
    <div class="static__bottom">
        <div class="container">
            <div class="seo-text">
                <? include($arResult["FILE"]); ?>
            </div>
        </div>
    </div>
<? endif; ?>
