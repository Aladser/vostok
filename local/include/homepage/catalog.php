<?
/** @global CMain $APPLICATION */

use ZLabs\RestartBuffer;

$APPLICATION->IncludeComponent(
    "zlabs:main.safe-include",
    "homepage-catalog-head",
    array(
        "TITLE" => "Каталог автомобилей",
        'LINK' => "/catalog-auto/",
        "COMPONENT_TEMPLATE" => "homepage-catalog-head"
    ),
    false
);

if (RestartBuffer::isAjax() && $_REQUEST['compId'] === 'homepage-catalog') {
    RestartBuffer::restartBufferIsAjax();
}

$APPLICATION->IncludeComponent("bitrix:news.list", "homepage-catalog", array(
    "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
    "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
    "AJAX_MODE" => "N",    // Включить режим AJAX
    "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
    "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
    "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
    "CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
    "CACHE_GROUPS" => "N",    // Учитывать права доступа
    "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
    "CACHE_TYPE" => "A",    // Тип кеширования
    "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
    "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
    "DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
    "DISPLAY_DATE" => "N",
    "DISPLAY_NAME" => "N",
    "DISPLAY_PICTURE" => "N",
    "DISPLAY_PREVIEW_TEXT" => "N",
    "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
    "FIELD_CODE" => array(    // Поля
        0 => "DETAIL_PICTURE",
        1 => "",
    ),
    "FILTER_NAME" => "",    // Фильтр
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
    "IBLOCK_ID" => "1",    // Код информационного блока
    "IBLOCK_TYPE" => "catalog_auto",    // Тип информационного блока (используется только для проверки)
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
    "INCLUDE_SUBSECTIONS" => "N",    // Показывать элементы подразделов раздела
    "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
    "NEWS_COUNT" => "24",    // Количество новостей на странице
    "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
    "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",    // Время кеширования страниц для обратной навигации
    "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
    "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
    "PAGER_TEMPLATE" => "infinite",    // Шаблон постраничной навигации
    "PAGER_TITLE" => "Новости",    // Название категорий
    "PARENT_SECTION" => "",    // ID раздела
    "PARENT_SECTION_CODE" => "",    // Код раздела
    "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
    "PROPERTY_CODE" => array(    // Свойства
        0 => "YEAR",
        1 => "TYPE_CAR_BODY",
        2 => "COLOR",
        3 => "MILEAGE",
        4 => "ENGINE_VOLUME",
        5 => "ENGINE_POWER",
        6 => "PRICE_CNY",
        7 => "IMAGES",
        8 => "",
        9 => "",
        10 => "",
    ),
    "SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
    "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
    "SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
    "SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
    "SET_STATUS_404" => "N",    // Устанавливать статус 404
    "SET_TITLE" => "N",    // Устанавливать заголовок страницы
    "SHOW_404" => "N",    // Показ специальной страницы
    "SORT_BY1" => "SORT",    // Поле для первой сортировки новостей
    "SORT_BY2" => "ACTIVE_FROM",    // Поле для второй сортировки новостей
    "SORT_ORDER1" => "ASC",    // Направление для первой сортировки новостей
    "SORT_ORDER2" => "DESC",    // Направление для второй сортировки новостей
    "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа списка
    "COMPONENT_TEMPLATE" => "footer-contacts",
    "NOTICE" => "Стоимость автомобиля может отличаться от указанной из-за ввиду колебания курса валют. Для расчета точной стоимости свяжитесь с нами.",
    "IS_AJAX" => RestartBuffer::isAjax(),
),
    false
);

if (RestartBuffer::isAjax() && $_REQUEST['compId'] === 'homepage-catalog') {
    die();
}