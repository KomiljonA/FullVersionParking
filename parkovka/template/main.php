<?php
// Определение текущего языка (предположим, что это хранится в переменной $currentLang)
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
        'telTitle' => 'Контактный Центр',
        'profileTitle' => 'Личный кабинет',            
    ],
    'en' => [
       'telTitle' => 'Contact Center',
        'profileTitle' => 'Personal account',        
    ],
    'tj' => [
        'telTitle' => 'Маркази тамос',
        'profileTitle' => 'Кабинети шахсӣ',        
    ],
];

// Получение текста на выбранном языке
$telTitle = $text[$currentLang]['telTitle'];
$profileTitle = $text[$currentLang]['profileTitle'];
?>

<html lang="<?php echo $currentLang; ?>">
<div id="main">
    <div class="logo">
        <?php echo $pageName; ?>
    </div>
    <div class="my-kontact">
        <a href="tel:+1234567890" class="cl-hd text-decoration-none text-dark">
            +992 (901) 00-00-11<br>
            <?php echo $telTitle; ?>
        </a>
    </div>
    <div class="my-lang">
        <?php if ($currentLang === 'ru'): ?>
            <a href="?lang=en" <?php if ($currentLang === 'en') echo 'class="active"'; ?>>EN</a>
            <a href="?lang=tj" <?php if ($currentLang === 'tj') echo 'class="active"'; ?>>TJ</a>
        <?php elseif ($currentLang === 'en'): ?>
            <a href="?lang=ru" <?php if ($currentLang === 'ru') echo 'class="active"'; ?>>RU</a>
            <a href="?lang=tj" <?php if ($currentLang === 'tj') echo 'class="active"'; ?>>TJ</a>
        <?php elseif ($currentLang === 'tj'): ?>
            <a href="?lang=ru" <?php if ($currentLang === 'ru') echo 'class="active"'; ?>>RU</a>
            <a href="?lang=en" <?php if ($currentLang === 'en') echo 'class="active"'; ?>>EN</a>
        <?php endif; ?>
    </div>
    <div class="my-account">
        <a class="text-decoration-none <?php if (basename($_SERVER['PHP_SELF']) == 'login.php') echo 'active-nav log-in'; ?>" href="login.php"><?php echo $profileTitle; ?></a>
    </div>
</div>
