<?php

namespace ZLabs\Main;

use ZLabs\Models\Currencies\CurrenciesTable;

class CurrenciesComponent extends \CBitrixComponent
{
    public function executeComponent()
    {
        $this->obtainData();

        $this->includeComponentTemplate();
    }

    protected function obtainData() {
        $data = CurrenciesTable::getLastCurrenciesInfo();

        $this->arResult['CURRENCIES'] = [
            'CNY' => $data['UF_CNY'],
            'USD' => $data['UF_USD'],
            'DATE' => $data['UF_DATE'],
        ];
    }
}
