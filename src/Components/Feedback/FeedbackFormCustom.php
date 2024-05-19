<?php


namespace ZLabs\Components\Feedback;


use Bitrix\Main\Loader;
use Bitrix\Main\UserConsent\Consent;
use CIBlock;
use ZLabs\Components\Feedback\Fields\Types\CustomTypes;
use ZLabs\FeedbackForm\Components\BaseForm;
use ZLabs\FeedbackForm\Field\FieldAbstract;
use ZLabs\Main\Models\Agreement\Agreement;

/**
 * @global CMain $APPLICATION
 */


if (!Loader::includeModule('iblock')) {
    return false;
}

if (!Loader::includeModule('zlabs.feedbackform')) {
    return false;
}

class FeedbackFormCustom extends BaseForm
{
    public function onPrepareComponentParams($arParams)
    {
        $arParams['USE_AJAX'] = 'Y';
        $arParams['AJAX_TYPE'] = 'JSON';
        $arParams['AJAX_COMPONENT_ID'] = $arParams['id'] ?: $this->randString();

        // исправление совместимости с php 8.1
        $arParams['goals'] = $arParams['goals'] ? array_diff($arParams['goals'], ['']) : [];
        $arParams['ga_goals'] = $arParams['ga_goals'] ? array_diff($arParams['ga_goals'], ['']) : [];
        $arParams['email_to'] = $arParams['email_to'] ? array_diff($arParams['email_to'], ['']) : [];
        $arParams['event_message_id'] = $arParams['event_message_id'] ? array_diff($arParams['event_message_id'], ['']) : [];

        return parent::onPrepareComponentParams($arParams);
    }

    protected function executeProlog()
    {
        $this->fieldTypes = new CustomTypes();
    }

    protected function obtainForm()
    {
        parent::obtainForm();
        $this->prepareUserConsent();
    }

    protected function prepareUserConsent()
    {
        if ($this->arParams['USER_CONSENT'] && $this->arParams['USER_CONSENT_ID']) {
            $this->arResult['user_consent'] = Agreement::query()
                ->filter(['ID' => $this->arParams['USER_CONSENT_ID']])
                ->cache(600000)
                ->select(['LABEL_TEXT', 'ID'])
                ->first()['LABEL_TEXT'];
        }
    }

    protected function submitAction()
    {
        if ($this->needSaveUserConsent()) {
            $this->saveUserConsent();
        }

        if (isset($this->arParams['save_to_iblock']) && $this->arParams['save_to_iblock'] === 'Y' && !empty($this->arParams['ib_model'])) {
            $this->saveToIblock();
        }

        parent::submitAction();
    }

    protected function needSaveUserConsent(): bool
    {
        return $this->arParams['USER_CONSENT'] && $this->arParams['USER_CONSENT_ID'];
    }

    protected function saveUserConsent()
    {
        Consent::addByContext($this->arParams['USER_CONSENT_ID']);
    }

    protected function saveToIblock() {
        $iblockID = $this->arParams['ib_model']::iblockId();
        $title = 'Заявка от ';

        if ($_REQUEST['NAME']) {
            $title .= $_REQUEST['NAME'] . ' от ';
        }

        $title .= date('d.m.Y');

        $this->arParams['ib_model']::add([
            'ACTIVE' => 'Y',
            'NAME' =>  $title,
            "IBLOCK_ID" => $iblockID,
            "PROPERTY_VALUES"=> $this->getProps($iblockID),
        ]);
    }

    protected function getProps($iblockId): array
    {
        $ret = [];
        $res = CIBlock::GetProperties($iblockId, array(), array());
        while ($resArr = $res->Fetch()) {
            $value = $this->request->get(strtoupper($resArr['CODE']));

            if (is_string($value)) {
                $value = trim($value);
            }

            if (is_array($value)) {
                $value = implode(', ', $value);
            }

            if (!$value && !empty($_FILES)) {
                $value = $_FILES[strtoupper($resArr['CODE'])];

                // проверка размер загружаемого файла меньше 10Мб
                if ($value['size'] > 1048576) {
                    $value = null;
                }
            }

            if ($value) $ret[$resArr['ID']] = $value;
        }

        return $ret;
    }

    protected function obtainFields()
    {
        if ($this->arParams['num_fields'] > 0) {
            for ($i = 0; $i < $this->arParams['num_fields']; $i++) {
                $field = FieldAbstract::getInstance($i, $this->arParams, $this->fieldTypes);
                $field->showErrorMessage = isset($this->arParams['show_error_messages']) && $this->arParams['show_error_messages'] === 'Y';
                $this->arResult['fields'][] = $field;
            }

            return true;
        }

        // бесполезное исключение, которое ломает страницу, нужно внести в модуль
        //throw new \Exception('Не создано ни одного поля');//todo: норм исключение
    }
}