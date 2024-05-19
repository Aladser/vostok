<?php

/** @global CMain $APPLICATION */

$APPLICATION->IncludeComponent(
    "zlabs:feedbackform.form",
    "modal-form",
    array(
        "COMPONENT_TEMPLATE" => "modal-form",
        "id" => "auto-selection",
        "title" => "Заявка на подбор авто",
        "sub_title" => "",
        "submit_text" => "Отправить",
        "footnote_text" => "",
        "num_fields" => "4",
        "show_error_messages" => "N",
        "event_message_id" => array(
            0 => "12",
        ),
        "name" => "Форма \"Заявка на подбор авто\"",
        "email_to" => array(
            0 => "east.transit@yandex.ru",
            1 => "",
        ),
        "goals" => array(
        ),
        "ga_goals" => array(
        ),
        "success_message_title" => "Заявка отправлена",
        "success_message" => "В ближайшее время наши специалисты свяжутся с вами.",
        "USER_CONSENT" => "Y",
        "USER_CONSENT_ID" => "1",
        "USER_CONSENT_IS_CHECKED" => "N",
        "USER_CONSENT_IS_LOADED" => "N",

        "field_0_type" => "ZLabs\\Components\\Feedback\\Fields\\TextField",
        "field_0_title" => "Имя",
        "field_0_code" => "NAME",
        "field_0_required" => "Y",
        "field_0_placeholder" => "",
        "field_0_note" => "",
        "field_0_mask" => "simple",
        "field_0_label" => "Имя",

        "field_1_type" => "ZLabs\\Components\\Feedback\\Fields\\TextField",
        "field_1_title" => "Телефон",
        "field_1_code" => "PHONE",
        "field_1_required" => "Y",
        "field_1_placeholder" => "+7 (___) ___-__-__",
        "field_1_note" => "",
        "field_1_mask" => "phone",
        "field_1_label" => "Номер телефона",

        "field_2_type" => "ZLabs\\Components\\Feedback\\Fields\\TextField",
        "field_2_title" => "Город",
        "field_2_code" => "CITY",
        "field_2_required" => "Y",
        "field_2_placeholder" => "",
        "field_2_note" => "",
        "field_2_mask" => "simple",
        "field_2_label" => "Город",

        "field_3_type" => "ZLabs\\Components\\Feedback\\Fields\\TextAreaField",
        "field_3_title" => "Сообщение",
        "field_3_code" => "MESSAGE",
        "field_3_required" => "Y",
        "field_3_placeholder" => "Марка авто, год, бюджет и другие подробности",
        "field_3_note" => "",
        "field_3_label" => "Сообщение",
        "save_to_iblock" => "Y",
        "ib_model" => ZLabs\Models\Feedback\AutoSelectionForm::class,
    ),
    false
);