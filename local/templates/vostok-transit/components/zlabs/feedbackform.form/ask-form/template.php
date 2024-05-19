<?php

use ZLabs\FeedbackForm\Field\FieldInterface;
use ZLabs\Frontend\MustacheSingleton;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var CMain $APPLICATION */
/** @var array $arParams */
/** @var array $arResult */

?>
<?if ($APPLICATION->GetShowIncludeAreas()) : ?>
    <div class="system-info-form">Форма "<?= $arParams['name'] ?>" (id -
        <b>#<?= $arResult['ajax_component_id'] ?></b>)
    </div>
<?php endif;
try {
    $mustache = MustacheSingleton::getInstance();

    foreach ($arResult['fields'] as $field) {
        $arResult['html_fields'][]['html'] = $mustache->render(
            'form__control_type_' . $field->getTypeAsString(),
            $field
        );
    }

    echo $mustache->render('ask-form', $arResult);
} catch (\Exception $exception) {
}
?>