<?php


namespace ZLabs\Components\Feedback\Fields\Traits;

use ZLabs\FeedbackForm\Field\Helpers\ParamKeyHelper;

trait DefaultValueTrait
{
    protected $index;
    protected $arParams;

    public $defaultValue;

    public function defaultValue()
    {
        return $this->defaultValue;
    }

    protected function generateDefaultValueParam()
    {
        $arParam = [
            'PARENT' => ParamKeyHelper::getGroupKey($this->index),
            'NAME' => 'Значение по умолчанию',
            'TYPE' => 'STRING'
        ];

        return $arParam;
    }
}