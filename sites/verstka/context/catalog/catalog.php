<?

$pager = include $_SERVER['DOCUMENT_ROOT'] . '/context/pager-vue.php';

return json_encode([
    'pager' => $pager
]);
