<?php
$sSectionName = "Главная";
$arDirProperties = array(
    'inlineCss' => \implode(';', [
        '/local/assets/local/bundle-common/bundle-common.css',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.css',
        '/local/assets/local/bundle-static/bundle-static.css',
    ]),
    'deferredJs' => \implode(';', [
        '/local/assets/local/bundle-common/bundle-common.js',
        '/local/assets/local/bundle-static/bundle-static.js',
        '/local/assets/local/bundle-feedback-form/bundle-feedback-form.js',
    ]),
);
