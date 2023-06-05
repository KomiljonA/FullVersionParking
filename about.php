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
        'pageTitle' => 'О проекте',
        'pageName' => 'О проекте',
        'headerTitle' => 'О проекте',
        'content' => '
        
        <p>В рамках инициативы по снижению автомобильного трафика в центре Душанбе была введена система платной парковки. Этот проект направлен на решение проблемы "хаотичного" паркования и повышение комфорта передвижения для автомобилей, общественного транспорта и пешеходов в Центральном районе города.</p>
        <p>Основные цели проекта включают:</p>
          <ul>
            <li>Улучшение оборачиваемости парковочных мест;</li>
            <li>Сокращение потока личного автотранспорта в центре города;</li>
            <li>Стимулирование использования общественного транспорта для поездок в центр;</li>
            <li>Повышение скорости движения в центре города.</li>
            <li>Сокращение нарушений правил парковки;</li>
            <li>Создание комфортной среды для автомобилистов и пешеходов.</li>
          </ul>
          
            <p>Пользование платными парковками в Душанбе не является услугой. При внесении платы за парковку предоставляется право размещения транспортного средства на улично-дорожной сети. Пользование платной парковкой является бесплатным для всех категорий граждан ежедневно с 22:00 до 07:59 местного времени.</p>
            <ul>
                 <li><strong>Первые 10 минут </strong>размещения транспортного средства на парковочном месте является бесплатным.</li>
                 <li><strong>В течение 10 минут </strong> по истечении оплаченного парковочного времени водитель транспортного средства должен покинуть парковочную зону.</li>
            </ul>
            <p><strong>Способы оплаты парковки:</strong></p>
            <ul>
                <li>банковской картой через паркомат </li>
                <li>через мобильное приложение «CityParking» </li>
                <li>в личном кабинете на сайте www.cityparking.tj </li>
                <li>через банкоматы и личный кабинет банка DC</li>
                <li>через мобильное приложение «CityParking»</li>
            </ul>
            <p><strong>Важно:</strong> Оплата наличными денежными средствами данными способами оплаты не предусмотрена.</p>
            
            <h4 class="mt-4 mb-3">Общие положения</h4>
            <p>Правила автомобильного транспорта по вопросам стоянки (далее - Правила) разработаны в соответствии с законодательством Республики Таджикистан в целях определения порядка размещения, оборудование стоянок, осуществления деятельности и организации размещения автотранспортных средств на определенной территории улично-дорожной сети, регулирование деятельности стоянок, предотвращение пробок и увеличение пропускной способности автомобильных дорог общего пользования.</p>
            
            <p><strong>Основные понятия:</strong></p>
            <ul>
                 <li>Парковочное место – отдельное место, предусмотренное на стоянке для размещения только одного автомобильного транспортного средства.</li>
                 <li>Паркомат - техническое устройство, предназначенное для оплаты услуг стоянки в наличной или безналичной форме.</li>
                 <li>Пользователь стоянки - лицо, пользующееся услугами стоянки для размещения своего автомобильного транспортного средства на платной или бесплатной основе на определенный период времени.</li>
                 <li>Парковочная карта (платежная) - пластиковая карта, хранящая информацию о произведенных платежах за пользование стоянкой и подтверждающая оплату за определенный период времени.</li>
                 <li>Инспектор стоянки - работник организатора стоянки, осуществляющий контроль за соблюдением требований Правил и Правил дорожного движения.</li>
                 <li>Блокиратор - специальное механическое устройство, блокирующее движение колеса автомобильного транспортного средства в случае неуплаты за обслуживание на платной стоянке.</li>
                 <li>Технические средства организации дорожного движения - дорожные знаки и разметка, включая стационарные передвижные паркоматы и автоматические фото-видео фиксаторы, которые являются частью стоянок.</li>
            </ul>
            <h4 class="mt-4 mb-3">Стоянки</h4>
            <p>Стоянки организуются в двух видах:</p>
            <ul>
                 <li>Закрытая стоянка - оборудованная часть автомобильных дорог и улиц, предназначенная для регулярной стоянки автомобильных транспортных средств, с въездом и выездом через шлагбаумы.</li>
                 <li>Открытая стоянка - оборудованная часть автомобильных дорог и улиц, предназначенная для регулярной стоянки автомобильных транспортных средств без использования шлагбаума.</li>    
            </ul>

            <h4 class="mt-4 mb-3">Деятельность платной стоянки</h4>
            <p>Платная стоянка организуется на выделенных и организуемых зонах с целью предоставления временного размещения автомобильных транспортных средств на определенный период времени. При организации и осуществлении деятельности стоянок должны соблюдаться требования Закона Республики Таджикистан «Об автомобильных дорогах и дорожной деятельности», Закона Республики Таджикистан «О дорожном движении» и Закона Республики Таджикистан «О защите прав потребителей».</p>
            
            <h4 class="mt-4 mb-3">Организация работы платной стоянки</h4>
            <p>Содержание, эксплуатация, техническое обслуживание, а также техническое оснащение стоянки осуществляется организатором стоянки. Пользователь стоянки имеет право на получение информации от организатора стоянки о порядке пользования стоянки, тарифов по оплате оказываемых услуг в зависимости от парковочных зон. Транспортные средства размещаются на платной парковке (парковочном месте) пользователями платных парковок (парковочных мест) самостоятельно.</p>
            
            
            
            ',
        
    ],
    'en' => [
        'pageTitle' => 'About the project',
        'pageName' => 'About',
        'headerTitle' => 'About us',
        'content' => '
        <p>As part of the initiative to reduce car traffic in the center of Dushanbe, a paid parking system was introduced. This project aims to address the issue of "chaotic" parking and improve mobility for cars, public transportation, and pedestrians in the city`s central district.</p>
        <p>The main objectives of the project include:</p>
        <ul>
          <li>Improving parking space turnover;</li>
          <li>Reducing private car traffic in the city center;</li>
          <li>Encouraging the use of public transportation for trips to the center;</li>
          <li>Increasing the speed of movement in the city center;</li>
          <li>Reducing parking violations;</li>
          <li>Creating a comfortable environment for motorists and pedestrians.</li>
        </ul>
        <p>The use of paid parking in Dushanbe is not a service. Payment for parking grants the right to place a vehicle on the road network. The use of paid parking is free for all citizens daily from 22:00 to 07:59 local time.</p>
        <ul>
          <li><strong>The first 10 minutes</strong> of parking are free.</li>
          <li><strong>Within 10 minutes</strong> after the paid parking time expires, the driver must leave the parking zone.</li>
        </ul>
        <p><strong>Parking Payment Methods:</strong></p>
        <ul>
          <li>By bank card at parking meters;</li>
          <li>Through the mobile application "CityParking";</li>
          <li>In the personal account on the website www.cityparking.tj;</li>
          <li>Through ATMs and the DC bank personal account;</li>
          <li>Through the mobile application "CityParking".</li>
        </ul>
        <p><strong>Important:</strong> Cash payment is not available through these payment methods.</p>
        <h4 class="mt-4 mb-3">GENERAL PROVISIONS</h4>
        <p>The Rules of Road Traffic regarding parking (hereinafter referred to as "the Rules") are developed in accordance with the legislation of the Republic of Tajikistan. They aim to determine the order of parking, parking equipment, the conduct of parking activities, and the organization of vehicle placement on the road network. They also regulate the operation of parking lots, prevent traffic congestion, and increase the capacity of public roads.</p>
        <p><strong>Key Definitions:</strong></p>
        <ul>
          <li>Parking space: a designated area on a parking lot intended for the placement of a single vehicle.</li>
          <li>Parking meter: a technical device designed for payment for parking services in cash or non-cash form.</li>
          <li>Parking user: an individual using parking services to place their vehicle on a paid or free basis for a certain period of time.</li>
          <li>Parking card (payment card): a plastic card storing information about payments for parking services and confirming payment for a specific period of time.</li>
          <li>Parking inspector: an employee of the parking organizer who controls compliance with the Rules and the Rules of the road.</li>
          <li>Wheel clamp: a special mechanical device that immobilizes a vehicle`s wheels in case of non-payment for services on a paid parking lot.</li>
          <li>Technical means of road traffic organization: road signs, markings, including stationary and mobile parking meters, and automatic photo-video recorders, which are part of parking lots.</li>
        </ul>
        <h4 class="mt-4 mb-3">Parking lots</h4>
        <p>Parking lots are organized in two types:</p>
        <ul>
          <li>Enclosed parking lot: a designated part of roads and streets equipped for regular parking of vehicles, with entry and exit controlled by barriers.</li>
          <li>Open parking lot: a designated part of roads and streets equipped for regular parking of vehicles without the use of barriers.</li>
        </ul>
        <h4 class="mt-4 mb-3">Paid parking activities</h4>
        <p>Paid parking is organized in designated and established zones to provide temporary vehicle placement for a specific period of time. When organizing and operating parking lots, it is necessary to comply with the legislation of the Republic of Tajikistan, including laws on roads and traffic, as well as consumer protection.</p>
        <h4 class="mt-4 mb-3">Organization of paid parking work</h4>
        <p>The parking lot organizer is responsible for the maintenance, operation, technical servicing, and equipping of the parking lot with necessary technical equipment and road traffic organization means. Parking lot users have the right to receive information from the organizer about the rules of using the parking lot and the tariffs depending on the parking zones. Vehicle placement on parking lots is the responsibility of users, who must comply with the Rules and the Rules of the road.</p>
        
        
                    ',
        
    ],
    'tj' => [
        'pageTitle' => 'Дар бораи лоиҳа',
        'pageName' => 'Дар бораи мо',
        'headerTitle' => 'Дар бораи мо',
        'content' => '
        
        <p>Ба хусусиати инициативаи кам кардани трафики автомобил дар маркази Душанбе, системаи парковкаи пуларо суруд карда шуд. Ин проект ба ангушти "бебаргашт" кардани парковка ва баландшавии ивази автомобилҳо, нусхаи муассири роҳю раванди автомобилҳо, транспорти омумӣ ва пешниҳодгарон дар маҳаллии марказӣ шаҳр мибошад.</p>

        <p>Мақсадҳои основии ин проект шунданд:</p>

        <ul>
          <li>Беҳтарин кардани ҷоҳаи парк кардани машрути;</li>
          <li>Кам кардани овози транспорти шахр дар марказ;</li>
          <li>Ташвиқ кардани истифодаи транспорти омумӣ барои сафарҳои ба марказ;</li>
          <li>Баландшавии сӯи парвоз дар маркази шаҳр.</li>
          <li>Кам кардани хатогӣ барои хоҳиши парк кардан;</li>
          <li>Эфтитоҳи муҳити рاфторӣ барои роҳнамои автомобилгарон ва пешниҳодгарон.</li>
        </ul>
        <p>Истифодаи парковҳои пул дар Душанбе хизмати намебошад. Бо додаи пула барои парк кардан, ҳуқуқи мавозеи ҷои транспортии шумо дар шабакаи роҳсетсозӣ медиҳад. Истифодаи парковҳои пул барои ҳамаи сифатҳои шахсӣ рӯзана аз соат 22:00 то соат 07:59 ба вақти маҳалӣ бепул аст.</p>

        <ul>
          <li><strong>Дар якчанд дақиқаи аввал</strong> парк кардани транспортии шумо дар ҷои парк кардани пул бепул аст.</li>
          <li><strong>Дар давраи якчанд дақиқа</strong> пас аз истеъмоли вақти парковкаи пулдошта, роҳандози транспортии шумо бояд зонаи парк карданро таркиб диҳад.</li>
        </ul>
                <p><strong>Равандҳои пардохти парковка:</strong></p>
        <ul>
            <li>Картаи бонкӣ тавассути паркомат</li>
            <li>Таҳрири мобилӣ "CityParking" тавассути барномаи мобилӣ</li>
            <li>Дар ҳисоби хусусиро дар сайти www.cityparking.tj</li>
            <li>Тавассути банкоматҳо ва ҳисоби хусусирои бонк DC</li>
            <li>Таҳрири мобилӣ "CityParking"</li>
        </ul>
        <p><strong>Муҳим:</strong> Пардохт бо нақдӣ оиди равандҳои пардохти пешниҳодашуда истифода нешавад.</p>
        <h4 class="mt-4 mb-3">Равондҳои омумӣ</h4>
        <p>Қоидаҳои роҳсозии автомобили дар бораи масъалаҳои паравонд (дароими - Қоидаҳо) бо мувофиқияти қонунҳои Ҷумҳурии Тоҷикистон таҳия карда шудаанд ва ба мақсади таъйин кардани тартиби расмӣ, иҷозатномаи парковкаҳо, иҷроият ва ташкили паравондшавӣ ва таъмин намудани автотранспортҳо дар шабакаи роҳсозӣ роҳбарӣ мешаванд. Онҳо ҳамчун дар барномаи паравондшавӣ, ба танзимоти паравондҳо, пешгирӣи туннелҳо ва баландшавии бароварии қатори кӯҳнаҳои автомобилӣ барои истифода аз ҷомеаи умумӣ ҳисобон мегирад.</p>
        <p><strong>Маълумотҳои асосӣ:</strong></p>
        <ul>
            <li>Ҷои парк кардан - ҷои отдонӣ, ки барои таҳлил таҳияшуда иҷозатномаи парк кардани танҳо як автомобили транспортии автомобилӣ ифода мекунад.</li>
            <li>Паркомат - инҷомӣ техникӣ, ки барои пардохти хизматҳои парк кардан дар формаи нақдӣ ё беҳақиқӣ муайян шудааст.</li>
            <li>Истифодабарандагии парк кардан - шахс, ки барои парк кардани автомобили транспортии худ дар асоси пулӣ ё бепулӣ дар давоми мӯҳлати муайянҳои муайянхо дар ягон мақом истифода бурда мешавад.</li>
            <li>Картаи парк кардан (пули пардохтӣ) - картаи пластикӣ, ки маълумоти дарҳои пардохтҳои парк кардан ва тасдиқи пардохтӣ барои мӯҳлати муайянҳои муайянхои парк карданро нигоҳ дошта ва пардохти онро тасдиқ менамояд.</li>
            <li>Назаранди парк кардан - коргари ташкили пардохтӣ, ки назаррасонии амалиёти ҳимояи талаботи Қоидаҳо ва Қоидаҳои роҳсозии роҳрои роҳсозӣ анҷом медиҳад.</li>
            <li>Блокиратор - қувваи техникӣ махсус, ки дар ҳолати нақди пешниҳоди хидмат дар парковкаи пули пардохтӣ роҳи тоза шавад.</li>
            <li>Воситаҳои техникӣи ташкили роҳсозии роҳи роҳсозӣ - нишонҳои роҳи ва обмаркӯрӣ, ки шумораи паркоматҳои муҳаррик ва фото-видеофиксаторҳои худкарӣ, ки ҷузъи парковкаҳо мебошанд.</li>
        </ul>
                <h4 class="mt-4 mb-3">Парковкаҳо</h4>
        <p>Парковкаҳо дар ду намуд иваз мешаванд:</p>
        <ul>
            <li>Парковкаи баста - қисми техникӣ аз автомобили роҳҳо ва кӯчаҳо, ки барои парк кардани мутадорик автомобили транспортии автомобилӣ, бо вуезд ва бароварди аз рӯи баррикадҳо иҷозат медиҳад.</li>
            <li>Парковкаи кушода - қисми техникӣ аз автомобили роҳҳо ва кӯчаҳо, ки барои парк кардани мутадорик автомобили транспортии автомобилӣ бидуни истифода аз баррикадҳои парк кардан, иҷозат медиҳад.</li>
        </ul>
        <h4 class="mt-4 mb-3">Фаҳли парковкаи пулӣ</h4>
        <p>Парковкаи пулӣ дар мақомҳои муайяншуда ва ташкил ёфта шуда бо мақсади фароҳӣ нишондида мешавад, ки барои таҳлил муайяншудаи автомобили транспортии автомобилӣ дар мӯҳлати муайянҳои муайянхои муайянхои вақти муайян баромадан ҷой мегирад. Дар ташкил ва иҷроияти парковкаҳо бояд талаботи қонунҳои Ҷумҳурии Тоҷикистон, воридотии қонунҳои дар бораи роҳҳои автомобилӣ ва роҳсозии роҳҳои роҳрои роҳсозӣ ва ҳамчун ҳуқуқҳои харидоронро ифтитоҳ кардан зарур аст.</p>
        <h4 class="mt-4 mb-3">Ташкилоти иҷрои парковкаи пулӣ</h4>
        <p>Ташкилкунандаи парковкаи пулӣ ифаота, эксплуататсия, ҳизматрасонӣи техникӣ ва таъминоти парковкаро бо таҷҳизоти техникӣ ва воситаҳои ташкили роҳсозии роҳрои роҳсозӣ анҷом медиҳад. Истифодабарандагии парк кардан дар ҳақиқат мавҷудоти маълумот аз тарафи ташкилкунанда дар бораи тартиби парк кардан ва баҳоҳо дар баробарии ноҳияҳои парк кардани мутодо бо иҷозати қисмҳои парк кардан дорад. Мақомгузории автомобили транспортии автомобилӣ дар парк карданҳо тавассути истифодабарандагон бо ифтиқори талаботи Қоидаҳо ва Қоидаҳои роҳҳои роҳсозӣ анҷом медиҳад.</p>
                    
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
