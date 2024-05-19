<?php


namespace ZLabs\Models\Currencies;


use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\FloatField;
use Bitrix\Main\ORM\Fields\DatetimeField;

class CurrenciesTable extends DataManager
{
    public static function getTableName(): string
    {
        return 'z_currencies';
    }

    public static function getMap(): array
    {
        return [
            (new IntegerField('ID'))
                ->configurePrimary()
                ->configureAutocomplete(),
            (new FloatField('UF_CNY')),
            (new FloatField('UF_USD')),
            (new DatetimeField('UF_DATE')),
        ];
    }

    public static function getLastCurrenciesInfo(): array
    {
        $data = $GLOBALS['LAST_CURRENCIES_INFO'];

        if (!$data) {
            $data =  self::query()
                ->setOrder(['UF_DATE' => 'DESC'])
                ->setSelect(['UF_CNY', 'UF_USD', 'UF_DATE'])
                ->setLimit(1)
                ->fetch();

            if (!is_array($data)) {
                $data = [];
            }
        }

        return $data;
    }

    public static function saveCurrenciesInfo($data)
    {
        if ($data['CNY'] && $data['USD']) {
            self::add([
                "fields" =>
                    [
                        'UF_CNY' => $data['CNY'],
                        'UF_USD' => $data['USD'],
                        'UF_DATE' => new \Bitrix\Main\Type\DateTime(),
                    ]
            ]);
        }
    }
}