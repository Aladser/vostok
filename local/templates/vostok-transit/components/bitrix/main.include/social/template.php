<?php

use ZLabs\Helpers\SocialChecker;

defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

$this->setFrameMode(true);

if ($APPLICATION->GetShowIncludeAreas()) :
    echo '<div class="system-info"><div class="container">';
    ?>
    <h2>Внешние скрипты</h2>
    <p>Здесь можно разместить код внешних сервисов. Например яндекс метрику</p>
    <p>Этот код не подключится, если авторизован под администратором и на локальных копиях сайта</p>
<?php endif;

if ($arResult["FILE"] <> '' && (new SocialChecker())->check()) {
    include($arResult["FILE"]);
}

if ($APPLICATION->GetShowIncludeAreas()) {
    echo '</div></div>';
}
