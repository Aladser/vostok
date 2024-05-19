<?php


namespace ZLabs\Components;


use Illuminate\Support\Collection;
use ZLabs\BxMustache\AdaptiveImage;

/** @description Трейт для получения свойств из элемента news.list */

trait BasePropertyTrait
{

    protected function getPropertyName($code): string
    {
        return !empty($this->arBxItem['PROPERTIES'][$code]) ? $this->arBxItem['PROPERTIES'][$code]['NAME'] : "";
    }

    protected function getPropertyStringValue($code): string
    {
        return !empty($this->arBxItem['PROPERTIES'][$code]['VALUE']) ? $this->arBxItem['PROPERTIES'][$code]['VALUE'] : "";
    }

    protected function getPropertyMultipleStringValuesWithDescription($code): Collection
    {
        $values = new Collection();

        if (!empty($this->arBxItem['PROPERTIES'][$code]['VALUE'])) {
            $values = collect($this->arBxItem['PROPERTIES'][$code]['VALUE']);
            $descriptions = $this->arBxItem['PROPERTIES'][$code]['DESCRIPTION'];

            $values = $values->map(function ($string, $index) use ($descriptions) {
                return [
                    'value' => $string,
                    'description' => $descriptions[$index],
                ];
            });
        }

        return $values;
    }

    protected function getPropertyTextValue($code): string
    {
        return !empty($this->arBxItem['PROPERTIES'][$code]['VALUE']) ? $this->arBxItem['PROPERTIES'][$code]['~VALUE']['TEXT'] : "";
    }

    protected function getPropertyMultipleTextValue($code): Collection
    {
        return !empty($this->arBxItem['PROPERTIES'][$code]['VALUE']) ?
            collect($this->arBxItem['PROPERTIES'][$code]['~VALUE'])->map(function ($arItem) {
                return $arItem['~TEXT'];
            }) :
            new Collection();
    }

    protected function getPropertyBoolValue($code, $checkValue = 'Y'): bool
    {
        return !empty($this->arBxItem['PROPERTIES'][$code]['VALUE']) && $this->arBxItem['PROPERTIES'][$code]['VALUE_XML_ID'] === $checkValue;
    }

    protected function getPropertyListValue($code): string
    {
        return !empty($this->arBxItem['PROPERTIES'][$code]['VALUE']) ? $this->arBxItem['PROPERTIES'][$code]['VALUE'] : '';
    }

    protected function getPropertyListValueXMLID($code): string
    {
        return !empty($this->arBxItem['PROPERTIES'][$code]['VALUE']) ? $this->arBxItem['PROPERTIES'][$code]['VALUE_XML_ID'] : '';
    }

    protected function getPropertyFileValue($code): array
    {
        return !empty($this->arBxItem['DISPLAY_PROPERTIES'][$code]['VALUE']) ? $this->arBxItem['DISPLAY_PROPERTIES'][$code]['FILE_VALUE'] : [];
    }

    protected function getPropertyMultipleValues($code): array
    {
        return !empty($this->arBxItem['PROPERTIES'][$code]['VALUE']) ? $this->arBxItem['PROPERTIES'][$code]['VALUE'] : [];
    }

    protected function getPropertyMultipleFileValue($code): Collection
    {
        $images = new Collection();

        if (!empty($this->arBxItem['DISPLAY_PROPERTIES'][$code]['VALUE'])) {
            if (count($this->arBxItem['DISPLAY_PROPERTIES'][$code]['VALUE']) === 1) {
                $images = collect([
                    $this->arBxItem['DISPLAY_PROPERTIES'][$code]['FILE_VALUE']
                ]);
            } else {
                $images = collect($this->arBxItem['DISPLAY_PROPERTIES'][$code]['FILE_VALUE']);
            }
        }

        return $images;
    }
}