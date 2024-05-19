<?

/** @global CMain $APPLICATION */

global $ElementID;

if ($ElementID) {
    $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "catalog-detail-delivery-and-payment",
        array(
            "AREA_FILE_RECURSIVE" => "Y",
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "",
            "EDIT_TEMPLATE" => "",
            "COMPONENT_TEMPLATE" => "catalog-detail-delivery-and-payment",
            "PATH" => "/local/included_areas/catalog-detail/delivery-and-payment.php"
        ),
        false
    );
}