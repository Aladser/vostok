<?php


namespace ZLabs\Components\Feedback\Fields;


use ZLabs\Components\Feedback\Fields\Traits\LabelTrait;
use ZLabs\FeedbackForm\Components\Parameters\ComponentParametersInterface;
use ZLabs\FeedbackForm\Field\Helpers\ParamKeyHelper;
use ZLabs\FeedbackForm\Field\Types\TypesInterface;

class TextAreaField extends \ZLabs\FeedbackForm\Field\TextAreaField
{
    use LabelTrait;

    public function __construct(int $i, array $arParams, TypesInterface $types = null)
    {
        parent::__construct($i, $arParams, $types);

        $this->label = $this->getParam('label');
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