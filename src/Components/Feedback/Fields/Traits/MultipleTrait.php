<?php


namespace ZLabs\Components\Feedback\Fields\Traits;

use ZLabs\FeedbackForm\Field\Helpers\ParamKeyHelper;

trait MultipleTrait
{
    protected $index;
    protected $arParams;

    public $multiple;

    public function multiple()
    {
        return $this->multiple;
    }

    protected function generateMultipleParam()
    {
        $arParam = [
            'PARENT' => ParamKeyHelper::getGroupKey($this->index),
            'NAME' => 'Множественный выбор',
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'N'
        ];

        return $arParam;
    }
}