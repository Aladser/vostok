<?php

use ZLabs\FeedbackForm\ConfigSingleton;

defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

$this->setFrameMode(true);

if ($APPLICATION->GetShowIncludeAreas()) :
    echo '<div class="system-info"><div class="container">';
    ?>
    <h1>Формы обратной связи</h1>
    <p>Ниже можно настроить формы обратной связи.</p>
    <p>Чтобы открыть <b>модальную форму</b>, необходимо разместить в ссылке, открывающую форму соответствующй id и
        добавить css класс <b>"feedback-form-link"</b></p>
    <p>Отложенные формы (как правило не модальные) размещаются на странице с помощью
        <b>$APPLICATION->ShowViewContent()</b></p>
    <h2>Глобальные формы (доступны на всех страницах)</h2>
    <?php
endif;

if ($arResult["FILE"] <> '') {
    include($arResult["FILE"]);
}

if ($APPLICATION->GetShowIncludeAreas()) {
    echo '</div></div>';
}
