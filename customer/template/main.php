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
        'pageName' => 'Аккаунт',
        'profileTitle' => 'Выход',            
    ],
    'en' => [
       'telTitle' => 'Contact Center',
       'pageName' => 'Account',
        'profileTitle' => 'Exit',        
    ],
    'tj' => [
        'telTitle' => 'Маркази тамос',
        'pageName' => 'Аккаунт',
        'profileTitle' => 'Баромад',        
    ],
];

// Получение текста на выбранном языке
$telTitle = $text[$currentLang]['telTitle'];
$pageName = $text[$currentLang]['pageName'];
$profileTitle = $text[$currentLang]['profileTitle'];
?>
        <html lang="<?php echo $currentLang; ?>">
        <div id="main">
            <div class="logo">
            <?php echo $pageName; ?>
            </div>
            <div class="my-kontact">
                <!--<p>
                +992 (901) 00-00-11
                <br>
                Контактный Центр
                </p>-->
                <a href="tel:+1234567890" class="cl-hd text-decoration-none text-dark">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z"/>
                </svg> +992 (901) 00-00-11<br>
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
                <a <?php if (basename($_SERVER['PHP_SELF']) == 'logout.php') echo 'class="active-nav log-in"'; ?> href="logout.php"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                      <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    <?php echo $profileTitle; ?>
                </a>
            </div>
        </div>