<?php

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/local/assets/mustache/')
]);

return [
    'ajax_component_id' => 'ask-form',
    'action' => '',
    'title' => 'Остались вопросы?',
    'sub_title' => 'Оставьте ваши контактные данные и мы свяжемся с вами в ближайшее время',
    'submit_text' => 'Отправить заявку',
    'html_fields' => [
        [
            'html' => $mustache->render('form__control_type_text', [
                'placeholder' => 'Как в вам обращаться?',
                'label' => 'Имя',
                'code' => 'name',
                'required' => true,
                'requiredCssClass' => 'form__control_required',
                'additionalCssClass' => 'form__control_valid-name',
                'inputmode' => 'text',
                'showErrorMessage' => false,
            ])
        ],
        [
            'html' => $mustache->render('form__control_type_text', [
                'placeholder' => 'Телефон',
                'label' => 'Телефон',
                'code' => 'phone',
                'required' => true,
                'requiredCssClass' => 'form__control_required',
                'additionalCssClass' => 'form__control_valid-tel',
                'maskCssClass' => 'form__control_tel',
                'inputmode' => 'tel',
                'showErrorMessage' => false,
            ])
        ],
        [
            'html' => $mustache->render('form__control_type_textarea', [
                'placeholder' => 'Задайте интересующий вас вопрос и мы с удовольствием вам ответим',
                'label' => 'Комментарий',
                'code' => 'message',
                'required' => false,
                'showErrorMessage' => false,
            ])
        ],
    ],
    'user_consent' => 'Нажимая кнопку «Отправить» Вы соглашаетесь с условиями <a href="/privacy-policy/" rel="nofollow" target="_blank">обработки персональных данных</a>'
];
