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
        'pageTitle' => 'Вопрос - ответ',
        'pageName' => 'Вопрос - ответ',
        'headerTitle' => 'Часто задаваемые вопросы',
        'content' => '
                
        <div class="accordion accordion-flush" id="accordionFlushExample">
          
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                1. Вопрос: Почему парковка вдруг стала платной?
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body"><strong>Ответ:</strong> Черезмерный рост уровня автомобилизации населения, когда на 1 тысячу жителей приходится порядка 300-400 автомобилей, в любом городе мира приводит к отказу от бесплатного использования общественного пространства для парковки личных автомобилей. США к этому пришли почти век назад, в 1930-е, европейские страны – в 1960-е. И накопленный за эти годы опыт иностранных коллег наглядно демонстрирует, что платные парковки являются эффективным инструментом управления спросом на такой дефицитный ресурс, как парковочные места в центре города.<br>
                <br>
                Центральная историческая часть Душанбе характеризуется высокой концентрацией объектов притяжения: мест приложения труда, учебных заведений, досугово-развлекательных центров и культурных достопримечательностей, что обуславливает сверхнормативные транспортные потоки и острый дефицит парковочных мест.<br>
                <br>
                Неконтролируемая парковка не только сокращает дорожное пространство, но и приводит к заторам на дорогах, ограничивает передвижение пешеходов на тротуарах, уменьшает эффективность выделенных полос движения городского пассажирского транспорта.<br>
                <br>
                Соответственно, введение платы за парковку в центре Душанбе является ограничительной мерой, направленной на увеличение пропускной способности улично-дорожной сети, создание предпочтительных условий для совершения поездок на общественном транспорте, снижение количества нарушений правил дорожного движения.<br>
                <br>
                </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                2. Вопрос: Кто получает прибыль от платных парковок?
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body"><strong>Ответ:</strong> Денежные средства, вносимые гражданами в качестве оплаты за парковки, поступают в Управление Федерального казначейства по Душанбе и в соответствии с Бюджетным Кодексом РТ в полном объеме перечисляются в бюджет Душанбе.</div>
            </div>
          </div>
        </div>
        
        ',
        
    ],
    'en' => [
        'pageTitle' => 'Question and answer',
        'pageName' => 'Question',
        'headerTitle' => 'Frequently Asked Questions',
        'content' => '
        
        <div class="accordion accordion-flush" id="accordionFlushExample">
  
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        1. Question: Why did parking suddenly become paid?
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body"><strong>Answer:</strong> The excessive growth in the number of cars per thousand people, with around 300-400 cars per thousand residents, in any city in the world, leads to the abandonment of free use of public space for parking personal vehicles. The United States reached this conclusion almost a century ago, in the 1930s, while European countries did so in the 1960s. The accumulated experience of foreign colleagues over these years clearly demonstrates that paid parking is an effective tool for managing the demand for such a scarce resource as parking spaces in the city center.<br>
        <br>
        The central historical part of Dushanbe is characterized by a high concentration of attractions: workplaces, educational institutions, recreational centers, and cultural landmarks, which results in above-normal traffic flows and a severe shortage of parking spaces.<br>
        <br>
        Uncontrolled parking not only reduces road space but also leads to traffic congestion, restricts pedestrian movement on sidewalks, and reduces the efficiency of dedicated lanes for urban public transportation.<br>
        <br>
        Therefore, the introduction of parking fees in central Dushanbe is a restrictive measure aimed at increasing the capacity of the road network, creating favorable conditions for using public transport, and reducing the number of traffic violations.<br>
        <br>
        </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        2. Question: Who profits from paid parking?
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"><strong>Answer:</strong> The funds paid by citizens as parking fees are transferred to the Treasury Management of Dushanbe and, in accordance with the Budget Code of the Republic of Tajikistan, are fully transferred to the budget of Dushanbe.</div>
    </div>
  </div>
</div>

        
        
        ',
        
    ],
    'tj' => [
        'pageTitle' => 'Савол-ҷавоб',
        'pageName' => 'Савол-ҷавоб',
        'headerTitle' => 'Саволҳои зуд-зуд додашаванда',
        'content' => '
        
        <div class="accordion accordion-flush" id="accordionFlushExample">
  
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        1. Савол: Чом паркдохтан бо зид шудааст?
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body"><strong>Ҷавоб:</strong> Рӯи иловаи шумораи автомобилҳо дар наҳияи ҳар як ҳазор нафар, ки 300-400 автомобил ба як ҳазор нафари жонишин монанд, дар ҳар шаҳри ҷаҳон ба гиримашудани истифодаи бепули фазои ҷомеагарӣ барои паркдохти автомобили худе пайгирӣ истифода мешавад. Амрико ба ин муҳим чароғҳо дар солҳои 1930-ум, ки деворҳои европоҳо дар солҳои 1960-ум ба ин кам мерасанд. Ва тамоми дастҳоя намуди хароботи худро дар ин солҳо намоён намоён бо замини бештар ҳажми мустақимии худ мебинанд, ки паркдохои пули ҷомеагарӣ якасоси мудириати талабро барои рӯҳбастагии ресурси ходимони дар гузори ҳамон шаҳр мебошанд.<br>
        <br>
        Бӯстони марказии таърихии Душанбе бо ҳисоби санҷиши бисёр азобҷузкунии обҷектҳои мӯвофиқи гурӯҳ: мақомоти корӣ, муассасаҳои таълимӣ, марказҳои тафриќӣ ва манъеъи ҳунармандонии фарҳангии, ки сабаби ёфтани трафикҳои хурди ва камбуди паркдохои ҷоиӣ аст.<br>
        <br>
        Паркдохии бепешахтаро не танҳо фазояи роҳо, балки сабаби ҷамбандии дар кӯраки, ҷобирҳои роҳро мекунад, эффективияти полосаҳои рафтории транспорти шаҳрии мусофирро кам карда мешавад.<br>
        <br>
        Барои ин сабаб, пардохти пули ҷомеагарӣ дар маркази Душанбе интисоби муҳдудшавии парвозии шабакаи роҳузаминии кӯчаҳо, тароҷҷуҳ вақте барои сафар кардани бо транспорти ҷумҳурии омумӣ, кам кардани миқдори гуноҳҳои қоидаҳои роҳгоҳии дороҳои роҳи ҷорӣ мебошад.<br>
        <br>
        </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        2. Савол: Кӣ ҷойи омодати паркдохои пули меёбанд?
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"><strong>Ҷавоб:</strong> Пули, ки шахрвандон барои паркдохӣ пул медиҳанд, ба Мудириати Таминоти Давлатии Душанбе ворид мешавад ва дар мувофиқии Низомнамои Бюджетии ҶТ, дар ҳама ҳаракат ба бюджети Душанбе кулон муносиб мешаванд.</div>
    </div>
  </div>
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
