<?php

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/local/assets/mustache/')
]);

return [
    'ajax_component_id' => 'order-form',
    'action' => '',
    'title' => 'Отправить заявку',
    'sub_title' => 'Оставьте контактные данные, <br class="tablet-hide">мы с Вами свяжемся!',
    'submit_text' => 'Отправить заявку',
    'html_fields' => [
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
            'html' => $mustache->render('form__control_type_text', [
                'placeholder' => 'Имя',
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
            'html' => $mustache->render('form__control_type_textarea', [
                'placeholder' => 'Здесь Вы можете оставить вопрос по выбранному автомобилю',
                'label' => 'Комментарий к заявке',
                'code' => 'message',
                'required' => false,
                'showErrorMessage' => false,
            ])
        ],
        [
            'html' => $mustache->render('form__control_type_hidden', [
                'label' => 'Авто',
                'value' => '',
                'code' => 'product'
            ])
        ],
    ],
    'user_consent' => 'Нажимая кнопку «Отправить» Вы соглашаетесь с условиями <a href="/privacy-policy/" rel="nofollow" target="_blank">обработки персональных данных</a>'
];
