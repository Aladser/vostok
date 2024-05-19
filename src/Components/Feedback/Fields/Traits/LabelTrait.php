<?php


namespace ZLabs\Components\Feedback\Fields\Traits;

use ZLabs\FeedbackForm\Field\Helpers\ParamKeyHelper;

trait LabelTrait
{
    protected $index;
    protected $arParams;

    public $label;

    public function label()
    {
        return $this->label;
    }

    protected function generateLabelParam()
    {
        $arParam = [
            'PARENT' => ParamKeyHelper::getGroupKey($this->index),
            'NAME' => 'Заголовок поля',
            'TYPE' => 'STRING'
        ];

        return $arParam;
    }
}