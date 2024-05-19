<?php

namespace ZLabs\Components\Feedback\Fields;

use ZLabs\Components\Feedback\Fields\Traits\CheckedTrait;
use ZLabs\Components\Feedback\Fields\Traits\LabelTrait;
use ZLabs\FeedbackForm\Components\Parameters\ComponentParametersInterface;
use ZLabs\FeedbackForm\Field\FieldAbstract;
use ZLabs\FeedbackForm\Field\Helpers\ParamKeyHelper;
use ZLabs\FeedbackForm\Field\Traits\Note;
use ZLabs\FeedbackForm\Field\Types\TypesInterface;


class Checkbox extends FieldAbstract
{
    use LabelTrait, Note, CheckedTrait;

    public $note;

    public function __construct(int $i, array $arParams, TypesInterface $types = null)
    {
        parent::__construct($i, $arParams, $types);

        $this->checked = $this->getParam('checked');
        $this->label = $this->getParam('label');
        $this->note = $this->getParam('note');
    }

    public function generateComponentParameters(ComponentParametersInterface $componentParameters)
    {
        parent::generateComponentParameters($componentParameters);

        $componentParameters->addParameter(
            ParamKeyHelper::getParamKey($this->index, 'label'),
            $this->generateLabelParam()
        );

        $componentParameters->addParameter(
            ParamKeyHelper::getParamKey($this->index, 'checked'),
            $this->generateCheckedParam()
        );

        $componentParameters->addParameter(
            ParamKeyHelper::getParamKey($this->index, 'note'),
            $this->generateNoteParam()
        );
    }

    public function getTypeAsString()
    {
        return 'checkbox';
    }
}
