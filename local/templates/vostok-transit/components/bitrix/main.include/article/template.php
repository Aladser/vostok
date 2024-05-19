<?php


defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

/** @var array $arResult */

$this->setFrameMode(true);

if ($arResult["FILE"] <> ''):?>
    <div class="article">
        <? include($arResult["FILE"]); ?>
    </div>
<? endif; ?>
