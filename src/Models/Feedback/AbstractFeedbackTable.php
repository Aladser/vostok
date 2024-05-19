<?php


namespace ZLabs\Models\Feedback;

use CIBlockElement;
use Bitrix\Iblock\IblockTable;


class AbstractFeedbackTable
{
    public const CODE = '';

    public static function iblockId(): int
    {
        if (static::CODE) {
            return IblockTable::query()
                ->addSelect('ID')
                ->where('CODE', static::CODE)
                ->setCacheTtl(3600000)
                ->fetchObject()
                ->getId();
        }

        return 0;
    }

    public static function add($data)
    {
        if (static::checkData($data)) {
            $el = new CIBlockElement;

            $el->Add($data);
        }
    }

    public static function checkData($data): bool
    {
        return !empty($data['PROPERTY_VALUES']);
    }
}