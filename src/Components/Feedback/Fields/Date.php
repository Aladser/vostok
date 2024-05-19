<?php

namespace ZLabs\Components\Feedback\Fields;

use ZLabs\FeedbackForm\Field\TextField;

class Date extends TextField
{
    const TEXT_FIELD_MASK = [
        'date' => 'Дата'
    ];

    public function maskCssClass()
    {
        switch ($this->mask) {
            case 'date':
                return ' feedback-form__control_valid_date';
                break;
        }

        return '';
    }

    public function getTypeAsString()
    {
        return 'date';
    }
}
