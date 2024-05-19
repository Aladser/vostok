<?php


namespace ZLabs\Components\Feedback\Fields;


use ZLabs\Components\Feedback\Fields\Traits\LabelTrait;
use ZLabs\FeedbackForm\Components\Parameters\ComponentParametersInterface;
use ZLabs\FeedbackForm\Field\Helpers\ParamKeyHelper;
use ZLabs\FeedbackForm\Field\Types\TypesInterface;

class TextField extends \ZLabs\FeedbackForm\Field\TextField
{
    const TEXT_FIELD_MASK = [
        'simple' => 'Обычное',
        'phone' => 'Телефонный номер',
        'email' => 'Электронный адрес',
        'phone_or_email' => 'Телефон или электронная почта',
        'ru' => 'Только русские буквы',
    ];

    use LabelTrait;

    public function __construct(int $i, array $arParams, TypesInterface $types = null)
    {
        parent::__construct($i, $arParams, $types);

        $this->label = $this->getParam('label');

        switch ($this->mask) {
            case 'phone':
                $this->typeInput = 'text';
                $this->inputmode = 'tel';
                break;
            case 'email':
                $this->typeInput = 'text';
                $this->inputmode = 'email';
                break;
        }
    }

    public function generateComponentParameters(ComponentParametersInterface $componentParameters)
    {
        parent::generateComponentParameters($componentParameters);

        $componentParameters->addParameter(
            ParamKeyHelper::getParamKey($this->index, 'label'),
            $this->generateLabelParam()
        );
    }
}