<?php

namespace ZLabs\Components\Feedback\Fields;


class Password extends TextField
{
    public string $additionalCssClass = '';

    public const TEXT_FIELD_MASK = [
        'password' => 'Пароль'
    ];

    public function maskCssClass(): string
    {
        if ($this->mask === 'password') {
            return ' feedback-form__control_valid_password';
        }

        return '';
    }

    public function getTypeAsString(): string
    {
        return 'password';
    }
}
