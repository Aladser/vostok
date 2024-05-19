<?php


namespace ZLabs\Models\Currencies;


use Bitrix\Main\Web\HttpClient;
use Exception;
use ZLabs\Models\Currencies\Traits\LoggerTrait;
use CDataXML;

class CurrenciesUpdate
{
    use LoggerTrait;

    public function __construct()
    {
        $this->createLogger();
    }

    public function update()
    {
        try {
            $this->updateCurrencies();
        } catch (Exception $exception) {
            $this->logger->error('Ошибка синхронизации Меню', [
                'error_message' => $exception->getMessage(),
            ]);
        }
    }

    protected function updateCurrencies() {
        $this->sendRequest();
    }

    protected function sendRequest()
    {
        $httpClient = new HttpClient();

        if ($httpClient->get('https://www.cbr-xml-daily.ru/daily.xml')) {
            if ($httpClient->getStatus() === 200) {
                $objXML = new CDataXML();
                $objXML->LoadString($httpClient->getResult());
                $arData = $objXML->GetArray();

                $this->handleResult($arData);
            }
        } else {
            $this->logger->error('Ошибка запроса получения Валют от ЦБ', [
                'request_error' => $httpClient->getError(),
            ]);
        }
    }

    protected function handleResult($arData) {
        $data = [
            'CNY' => 0,
            'USD' => 0,
        ];

        foreach ($arData['ValCurs']['#']['Valute'] as $arValue)
        {
            foreach ($arValue['#'] as $sKey => $sVal)
            {
                if(SITE_CHARSET != "windows-1251")
                    $sVal[0]['#'] = iconv("windows-1251",SITE_CHARSET,$sVal[0]['#']);
                if($sKey == 'Value')
                    $sVal[0]['#'] = str_replace(',','.',$sVal[0]['#']);
                $ar[$sKey] = $sVal[0]['#'];
            }

            if ($ar['CharCode'] === 'CNY') {
                $data['CNY'] = (float)$ar['Value'];
            }

            if ($ar['CharCode'] === 'USD') {
                $data['USD'] = (float)$ar['Value'];
            }
        }

        CurrenciesTable::saveCurrenciesInfo($data);
    }
}