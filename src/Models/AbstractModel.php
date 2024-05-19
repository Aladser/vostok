<?php


namespace ZLabs\Models;


class AbstractModel
{
    const CODE = "";

    public static function iblockId(): int
    {
        if (static::CODE)
            return \Bitrix\Iblock\IblockTable::query()
                ->addSelect('ID')
                ->where('CODE', static::CODE)
                ->setCacheTtl(3600000)
                ->fetchObject()
                ->getId();

        return 0;
    }

    public static function getEntity()
    {
        return \Bitrix\Iblock\Iblock::wakeUp(static::iblockId())->getEntityDataClass();
    }

    public static function query() {
        return static::getEntity()::query();
    }

    public static function buildFileSrc($subdir, $fileName): string
    {
        return '/upload/' . $subdir . '/' . $fileName;
    }
}