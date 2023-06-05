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
        'pageTitle' => 'Новости',
        'pageName' => 'Новости',
        'headerTitle' => 'Новости',
        'content' => '
        
     <h6 class="mt-5">В Душанбе водителям начали выдавать госномера с новой серией 10 вместо 01
     <a href="https://asiaplustj.info/ru/news/tajikistan/society/20230117/v-dushanbe-voditelyam-nachali-vidavat-gosnomera-s-novoi-seriei-10-vmesto-01" class="link-blue text-decoration-none">Подробнее</a>
          </h6>
          <hr>
    </div>
    <div class="col-12">
      <h6>«Караболо», аэропорт, «Садбарг»: Где в Душанбе незаконно берут деньги за парковку?
     <a href="https://asiaplustj.info/ru/news/tajikistan/society/20220610/karabolo-aeroport-sadbarg-gde-v-dushanbe-nezakonno-berut-dengi-za-parkovku" class="link-blue text-decoration-none">Подробнее</a>
        </h6>
          <hr>
    </div>
    
        
        ',
        
    ],
    'en' => [
        'pageTitle' => 'News',
        'pageName' => 'News',
        'headerTitle' => 'News',
        'content' => '
        
        <h6 class="mt-5">In Dushanbe, drivers have started receiving vehicle registration plates with a new series 10 instead of 01.
     <a href="https://asiaplustj.info/ru/news/tajikistan/society/20230117/v-dushanbe-voditelyam-nachali-vidavat-gosnomera-s-novoi-seriei-10-vmesto-01" class="link-blue text-decoration-none">More detailed</a>
          </h6>
          <hr>
    </div>
    <div class="col-12">
      <h6>"Karabolo", airport, "Sadbarg": Where in Dushanbe illegally take money for parking?
     <a href="https://asiaplustj.info/ru/news/tajikistan/society/20220610/karabolo-aeroport-sadbarg-gde-v-dushanbe-nezakonno-berut-dengi-za-parkovku" class="link-blue text-decoration-none">More detailed</a>
        </h6>
          <hr>
    </div>
        
        ',
        
    ],
    'tj' => [
        'pageTitle' => 'Ахбор',
        'pageName' => 'Ахбор',
        'headerTitle' => 'Ахбор',
        'content' => '
        
        <h6 class="mt-5">Дар Душанбе, аз 01 сиёҳи нави 10-ро, рақами давлатии роҳгузоронро ба водитоҳо дода кардаанд.
     <a href="https://asiaplustj.info/ru/news/tajikistan/society/20230117/v-dushanbe-voditelyam-nachali-vidavat-gosnomera-s-novoi-seriei-10-vmesto-01" class="link-blue text-decoration-none">Муфассалтар</a>
          </h6>
          <hr>
    </div>
    <div class="col-12">
      <h6>«Караболо», аэропорт, «Садбарг»: Дар Душанбе куҷо дарозии паркинги муқаррар набудани пул гуногун истеъмол мекунанд?
     <a href="https://asiaplustj.info/ru/news/tajikistan/society/20220610/karabolo-aeroport-sadbarg-gde-v-dushanbe-nezakonno-berut-dengi-za-parkovku" class="link-blue text-decoration-none">Муфассалтар</a>
        </h6>
          <hr>
    </div>
        
        ',
        
    ],
];

// Получение текста на выбранном языке
$pageTitle = $text[$currentLang]['pageTitle'];
$pageName = $text[$currentLang]['pageName'];
$headerTitle = $text[$currentLang]['headerTitle'];
$content = $text[$currentLang]['content'];
?>

<?php require 'template/header.php'; ?>

<?php require 'template/main.php'; ?>
<html lang="<?php echo $currentLang; ?>">
<div class="container my-5">
  <div class="row">
    <div class="col">
      <div class="col-12">
                  <h2 class="mb-4"><?php echo $headerTitle; ?></h2>
      <?php echo $content; ?>
    </div>
  </div>
</div>


<?php require'template/footer.php' ?>
    <!--координаты для Parking-->
    <script src="customer/js/parking.js"></script>
    
</body>
</html>
