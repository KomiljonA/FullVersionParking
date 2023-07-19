<?php
require_once '../vendor/autoload.php';

use Firebase\JWT\JWT;

$secretKey = '7316472QW1';

// Получение данных из POST-запроса
$telephone = $_POST['telephone'];
$name = $_POST['name'];
$surname = $_POST['surname'];

// Создание пустого массива для хранения данных в токене
$payload = array();

// Добавление данных в токен
$payload['telephone'] = $telephone;
$payload['name'] = $name;
$payload['surname'] = $surname;

// Генерация токена
$token = JWT::encode($payload, $secretKey);

// Сохранение токена в сеансовой переменной
session_start();
$_SESSION['token'] = $token;

// Отправка ответа об успешном создании и сохранении токена
echo 'Token created and saved';
?>