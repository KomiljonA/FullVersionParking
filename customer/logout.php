<?php
session_start();

// Удаление токена из сеансовой переменной
unset($_SESSION['token']);

// Перенаправление на страницу входа (например, login.php)
header('Location: ../index.php');
exit;
?>