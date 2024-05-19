<?php

namespace ZLabs\Components\Feedback\Fields;

use ZLabs\Components\Feedback\Fields\Traits\DefaultValueTrait;
use ZLabs\Components\Feedback\Fields\Traits\LabelTrait;
use ZLabs\FeedbackForm\Components\Parameters\ComponentParametersInterface;
use ZLabs\FeedbackForm\Field\FieldAbstract;
use ZLabs\FeedbackForm\Field\Helpers\ParamKeyHelper;
use ZLabs\FeedbackForm\Field\Traits\Note;
use ZLabs\FeedbackForm\Field\Traits\PossibleValues;
use ZLabs\FeedbackForm\Field\Types\TypesInterface;

class Select extends FieldAbstract
{
    use PossibleValues, LabelTrait, DefaultValueTrait, Note;

    public function __construct(int $i, array $arParams, TypesInterface $types = null)
    {
        parent::__construct($i, $arParams, $types);

        $this->note = $this->getParam('note');
        $this->defaultValue = $this->getParam('default_value');
        $this->label = $this->getParam('label');
        // possibleValues после defaultValue
        $this->possibleValues = $this->generatePossibleValuesContext();
    }

    public function generateComponentParameters(ComponentParametersInterface $componentParameters)
    {
        parent::generateComponentParameters($componentParameters);

        $componentParameters->addParameter(
            ParamKeyHelper::getParamKey($this->index, 'label'),
            $this->generateLabelParam()
        );

        $componentParameters->addParameter(
            ParamKeyHelper::getParamKey($this->index, 'possible_values'),
            $this->generatePossibleValuesParam()
        );

        $componentParameters->addParameter(
            ParamKeyHelper::getParamKey($this->index, 'default_value'),
            $this->generateDefaultValueParam()
        );

        $componentParameters->addParameter(
            ParamKeyHelper::getParamKey($this->index, 'note'),
            $this->generateNoteParam()
        );
    }

    protected function generatePossibleValuesContext()
    {
        $values = collect($this->getParam('possible_values'));

        if ($values->isNotEmpty()) {
            $code = $values->count() > 1 ? $this->getParam('code') . '[]' : $this->getParam('code');

            $values = $values
                ->filter(function ($arValue) {
                    return !!$arValue;
                })
                ->map(function ($arValue, $key) use ($code) {
                    return [
                        'index' => $key,
                        'code' => $code,
                        'value' => $arValue,
                        'title' => $arValue,
                        'selected' => $this->defaultValue === $arValue,
                    ];
                });
        }

        return $values;
    }

    public function getTypeAsString()
    {
        return 'select';
    }
}
