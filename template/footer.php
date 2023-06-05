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
        'indexTitle' => 'Parking',
        'powerTitle' => 'Power',        
        'aboutTitle' => 'О проекте',        
        'newTitle' => 'Новости',        
        'ratesTitle' => 'Тарифы',        
        'rulesTitle' => 'Правила и штрафы',        
        'questionTitle' => 'Вопрос - ответ',        
    ],
    'en' => [
       'indexTitle' => 'Parking',
        'powerTitle' => 'Power',        
        'aboutTitle' => 'About us',        
        'newTitle' => 'News',        
        'ratesTitle' => 'Rates',        
        'rulesTitle' => 'Rules and penalties',        
        'questionTitle' => 'Question and answer',  
    ],
    'tj' => [
        'indexTitle' => 'Parking',
        'powerTitle' => 'Power',        
        'aboutTitle' => 'Дар барои мо',        
        'newTitle' => 'Ахбор',        
        'ratesTitle' => 'Тарифҳо',        
        'rulesTitle' => 'Қоидаҳо ва ҷаримаҳо',        
        'questionTitle' => 'Савол - чавоб',   
    ],
];

// Получение текста на выбранном языке
$indexTitle = $text[$currentLang]['indexTitle'];
$powerTitle = $text[$currentLang]['powerTitle'];
$aboutTitle = $text[$currentLang]['aboutTitle'];
$newTitle = $text[$currentLang]['newTitle'];
$ratesTitle = $text[$currentLang]['ratesTitle'];
$rulesTitle = $text[$currentLang]['rulesTitle'];
$questionTitle = $text[$currentLang]['questionTitle'];
?>

<html lang="<?php echo $currentLang; ?>">
<div id="footer" class="fixed-bottom">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <button class="cl-but navbar-toggler mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Переключатель навигации">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="justify-content: center;">
        <ul class="navbar-nav align-items-center" style="border-radius: 12px; color: white; padding: 5px 16px; background: #0a66e6; box-shadow: 0px 4px 12px rgb(0 0 0 / 12%);">
          <li class="nav-item">
            <a <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active-nav"'; ?> href="index.php"><?php echo $indexTitle; ?></a>
          </li>
          <li class="nav-item">
            <a <?php if (basename($_SERVER['PHP_SELF']) == 'power.php') echo 'class="active-nav"'; ?> href="power.php"><?php echo $powerTitle; ?></a>
          </li>
          <li class="nav-item">
            <a <?php if (basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active-nav"'; ?> href="about.php"><?php echo $aboutTitle; ?></a>
          </li>
          <li class="nav-item">
            <a <?php if (basename($_SERVER['PHP_SELF']) == 'new.php') echo 'class="active-nav"'; ?> href="new.php"><?php echo $newTitle; ?></a>
          </li>
          <li class="nav-item">
            <a <?php if (basename($_SERVER['PHP_SELF']) == 'rates.php') echo 'class="active-nav"'; ?> href="rates.php"><?php echo $ratesTitle; ?></a>
          </li>
          <li class="nav-item">
            <a <?php if (basename($_SERVER['PHP_SELF']) == 'rules-and-penalties.php') echo 'class="active-nav"'; ?> href="rules-and-penalties.php"><?php echo $rulesTitle; ?></a>
          </li>
          <li class="nav-item">
            <a <?php if (basename($_SERVER['PHP_SELF']) == 'question-and-answer.php') echo 'class="active-nav"'; ?> href="question-and-answer.php"><?php echo $questionTitle; ?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

    <!--Плагины для карты-->
    <script src="customer/map-set/leaflet.js"></script>
    <script src="customer/map-set/leaflet-src.esm.js"></script>
    <script src="customer/map-set/leaflet-src.esm.js.map"></script>
    <script src="customer/map-set/leaflet-src.js"></script>
    <script src="customer/map-set/leaflet-src.js.map"></script>
    <script src="customer/map-set/leaflet.js.map"></script>
    <script src="customer/map-set/"></script>
    <!--Плагин Jquery-->
    <script src='customer/js/jquery.js'></script>
    <!--Скрипты-->
    <script src="customer/js/script.js"></script>
    <!--Локальный API<= json-->
    <script src="customer/json/ia-parkings.json"></script>
    <!--Бутсрап 5-->
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <script>
        /*Закрытие меню при клике из вне*/
        $(document).click(function(event) {
          var clickover = $(event.target);
          var _opened = $(".navbar-collapse").hasClass("show");
          if (_opened === true && !clickover.hasClass("navbar-toggler")) {
            $(".navbar-toggler").click();
          }
        });

    </script>


