<?php

namespace ZLabs\Components\Feedback\Fields\Types;

use ZLabs\Components\Feedback\Fields\Checkbox;
use ZLabs\Components\Feedback\Fields\Password;
use ZLabs\Components\Feedback\Fields\TextField;
use ZLabs\Components\Feedback\Fields\TextAreaField;
use ZLabs\Components\Feedback\Fields\Select;
use ZLabs\Components\Feedback\Fields\Toggle;
use ZLabs\Components\Feedback\Fields\Radio;
use ZLabs\Components\Feedback\Fields\Date;
use ZLabs\FeedbackForm\Field\Types\DefaultTypes;
use ZLabs\FeedbackForm\Field\Types\TypesInterface;
use ZLabs\FeedbackForm\Field;

class CustomTypes extends DefaultTypes implements TypesInterface
{
    protected $arTypes = [
        Checkbox::class => 'Чекбокс',
        Toggle::class => 'Переключатель',
        Select::class => 'Выпадающий список',
        Radio::class => 'Поле выбора вариантов',
        Date::class => 'Поле даты с маской',
        Password::class => 'Поле для пароля',
        TextField::class => 'Текстовое поле',
        TextAreaField::class => 'Поле ввода сообщения',
        Field\FileField::class => 'Файл',
        Field\HiddenField::class => 'Скрытое поле',
    ];
}
