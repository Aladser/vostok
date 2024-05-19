<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Восток Транзит: верстка</title>
</head>
<style>
  li {
    margin-bottom: 22px;
  }
</style>
<body>
<main>
    <h1>Восток Транзит</h1>
    <h2>Страницы:</h2>
    <ul>
        <li><a href="homepage.php">Главная</a></li>
        <li><a href="catalog.php">Каталог. Список авто</a></li>
        <li><a href="detail.php">Каталог. Детальная</a></li>
        <li><a href="news.php">Новости</a></li>
        <li><a href="news-detail.php">Новости. Детальная</a></li>
        <li><a href="static.php">Статическая страница</a></li>
        <li><a href="contacts.php">Контакты</a></li>
        <li><a href="error.php">Страница 404</a></li>
        <li><a href="about.php">О компании</a></li>
    </ul>
</main>
</body>
</html>