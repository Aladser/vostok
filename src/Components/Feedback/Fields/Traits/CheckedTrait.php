<?php


namespace ZLabs\Components\Feedback\Fields\Traits;

use ZLabs\FeedbackForm\Field\Helpers\ParamKeyHelper;

trait CheckedTrait
{
    protected $index;
    protected $arParams;

    public $checked;

    public function checked()
    {
        return $this->checked;
    }

    protected function generateCheckedParam()
    {
        $arParam = [
            'PARENT' => ParamKeyHelper::getGroupKey($this->index),
            'NAME' => 'Галочка проставлена сразу',
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'N'
        ];

        return $arParam;
    }
}