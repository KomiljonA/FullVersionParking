<?php
// Определение текущего языка (предположим, что это хранится в переменной $currentLang)
session_start(); // Обязательно вызывайте session_start() на каждой странице, где вы используете сессии

if (isset($_GET['lang'])) {
    $currentLang = $_GET['lang'];
    $_SESSION['currentLang'] = $currentLang; // Сохранение выбранного языка в сессии
} elseif (isset($_SESSION['currentLang'])) {
    $currentLang = $_SESSION['currentLang'];
} else {
    $currentLang = 'ru'; // Язык по умолчанию
}

// Задание текста на разных языках
$text = [
    'ru' => [
        'pageTitle' => 'CityParking',        
        'pageName' => 'CityParking',        
    ],
    'en' => [
        'pageTitle' => 'CityParking',
        'pageName' => 'CityParking',
    ],
    'tj' => [
        'pageTitle' => 'CityParking',
        'pageName' => 'CityParking',
    ],
];

// Получение текста на выбранном языке
$pageTitle = $text[$currentLang]['pageTitle'];
$pageName = $text[$currentLang]['pageName'];
?>

<?php require 'template/header.php'; ?>
<html lang="<?php echo $currentLang; ?>">
<div id="map"></div>

<?php require 'template/main.php'; ?>

<?php require'template/footer.php' ?>
    <!--координаты для Parking-->
    <script src="customer/js/parking.js"></script>
    
</body>
</html>
