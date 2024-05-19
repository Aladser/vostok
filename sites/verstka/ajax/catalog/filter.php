<?php
error_reporting(E_ERROR | E_PARSE);
require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

$context = include $_SERVER['DOCUMENT_ROOT'] . '/context/catalog/filter.php';
$controls = collect($context['controls']);

// Простая логика для того, чтобы изменения из фильтра отображались на тестовом сайте
$paramsKeys = collect(array_keys($_REQUEST));

$controls = $controls->map(function ($control) use ($paramsKeys) {
    if ($control['type'] === 'range') {
        if ($paramsKeys->contains($control['values'][0]['name'])) {
            $control['isChanged'] = true;
            $control['values'][0]['value'] = +$_REQUEST[$control['values'][0]['name']];
        }
        if ($paramsKeys->contains($control['values'][1]['name'])) {
            $control['isChanged'] = true;
            $control['values'][1]['value'] = +$_REQUEST[$control['values'][1]['name']];
        }
    }

    if ($control['type'] === 'checkboxList') {
        foreach ($control['values'] as $key => $value) {
            if ((bool)$paramsKeys->contains($control['values'][$key]['name'])) {
                $control['values'][$key]['checked'] = true;
                $control['isChanged'] = true;
            }
        }
    }

    if ($control['type'] === 'checkbox' && (bool)$paramsKeys->contains($control['name'])) {
        $control['checked'] = true;
        $control['isChanged'] = true;
    }

    return $control;
});

// структура изменена (добавлено свойство context и уровень вложенности) в соответствие с Битрикс

echo json_encode([
    'context' => [
        'controls' => $controls,
    ],
]);
