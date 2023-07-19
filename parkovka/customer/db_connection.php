<?php
// Параметры подключения к базе данных
$servername = "localhost"; // Имя сервера базы данных
$username = "root"; // Имя пользователя базы данных
$password = ""; // Пароль пользователя базы данных
$dbname = "parking"; // Имя базы данных

// Создание подключения к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Установка кодировки соединения (опционально)
$conn->set_charset("utf8");

// Возвращаем соединение для использования в других скриптах
return $conn;
?>
