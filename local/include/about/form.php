<?

/** @global CMain $APPLICATION */

$APPLICATION->IncludeComponent(
	"zlabs:feedbackform.form", 
	"ask-form", 
	array(
		"COMPONENT_TEMPLATE" => "ask-form",
		"id" => "ask-form",
		"title" => "Остались вопросы?",
		"sub_title" => "Оставьте ваши контактные данные и мы свяжемся с вами в ближайшее время",
		"submit_text" => "Отправить заявку",
		"footnote_text" => "",
		"num_fields" => "3",
		"show_error_messages" => "N",
		"event_message_id" => array(
			0 => "12",
		),
		"name" => "Форма \"Консультации по вопросам\" на странице О компании",
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
		"field_0_placeholder" => "Как в вам обращаться?",
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
		"field_2_type" => "ZLabs\\Components\\Feedback\\Fields\\TextAreaField",
		"field_2_title" => "Комментарий",
		"field_2_code" => "MESSAGE",
		"field_2_required" => "N",
		"field_2_placeholder" => "Задайте интересующий вас вопрос и мы с удовольствием вам ответим",
		"field_2_note" => "",
		"field_2_label" => "Комментарий",
		"save_to_iblock" => "Y",
		"ib_model" => ZLabs\Models\Feedback\AboutConsul::class
	),
	false
);