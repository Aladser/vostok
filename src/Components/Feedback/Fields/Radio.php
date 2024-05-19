<?php

namespace ZLabs\Components\Feedback\Fields;

use ZLabs\Components\Feedback\Fields\Traits\LabelTrait;
use ZLabs\Components\Feedback\Fields\Traits\DefaultValueTrait;
use ZLabs\Components\Feedback\Fields\Traits\MultipleTrait;
use ZLabs\FeedbackForm\Components\Parameters\ComponentParametersInterface;
use ZLabs\FeedbackForm\Field\FieldAbstract;
use ZLabs\FeedbackForm\Field\Helpers\ParamKeyHelper;
use ZLabs\FeedbackForm\Field\Traits\Note;
use ZLabs\FeedbackForm\Field\Types\TypesInterface;
use ZLabs\FeedbackForm\Field\Traits\PossibleValues;


class Radio extends FieldAbstract
{
    use PossibleValues, LabelTrait, DefaultValueTrait, MultipleTrait, Note;

    public function __construct(int $i, array $arParams, TypesInterface $types = null)
    {
        parent::__construct($i, $arParams, $types);

        $multiple = $this->getParam('multiple');

        $this->note = $this->getParam('note');
        $this->multiple = $multiple ? $multiple === 'Y' : false;
        $this->defaultValue = $this->getParam('default_value');
        $this->label = $this->getParam('label');
        // possibleValues в конце
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
            ParamKeyHelper::getParamKey($this->index, 'multiple'),
            $this->generateMultipleParam()
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
            $code = $this->multiple ? $this->getParam('code') . '[]' : $this->getParam('code');

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
                        'checked' => $this->defaultValue === $arValue,
                    ];
                });
        }

        return $values;
    }

    public function getTypeAsString()
    {
        return $this->multiple() ? 'checkbox-list' : 'radio';
    }

    public function singleValue()
    {
        return $this->possibleValues->count() === 1;
    }
}
