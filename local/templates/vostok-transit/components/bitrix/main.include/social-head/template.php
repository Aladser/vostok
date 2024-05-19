<?php

use ZLabs\Helpers\SocialChecker;

defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

$this->setFrameMode(true);

if ($APPLICATION->GetShowIncludeAreas()) :
    echo '<div class="system-info"><div class="container">';
    ?>
    <h2>Внешние скрипты (head)</h2>
    <p>Здесь можно разместить код внешних сервисов. Например яндекс метрику</p>
    <p>Этот код подключится в секции head</p>
    <p>Этот код не подключится, если авторизован под администратором и на локальных копиях сайта</p>
<?php endif;

if ($arResult["FILE"] <> '' && (new SocialChecker())->check()) {
    $this->SetViewTarget('social-head');
    include($arResult["FILE"]);
    $this->EndViewTarget();
}

if ($APPLICATION->GetShowIncludeAreas()) {
    echo '</div></div>';
}
