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
        'pageTitle' => 'Правила и штрафы',
        'pageName' => 'Правила и штрафы',
        'headerTitle' => 'Правила использования платной парковки',
        'content' => '
        
        <p>Оплата парковки должна быть произведена <strong>в течение 15 минут</strong> после размещения автомобиля на парковочном месте.</p>
        <p>Покинуть парковочное место необходимо не позднее, чем <strong>через 10 минут</strong> по истечении оплаченного времени.</p>
        <p>Штраф за нарушение правил пользования платной парковкой составляет <strong> 60 сомон.</strong></p>
        <p>Владелец транспортного средства может быть оштрафован за:</p>
        <ul>
          <li>неоплату парковки;</li>
          <li>оплату в меньшем размере;</li>
          <li>превышение оплаченного времени более, чем на 10 минут;</li>
          <li>внесение платы позднее, чем через 60 дней после размещения транспортного средства на парковочном месте;</li>
          <li>оплату парковочной сессии с временным разрывом;</li>
          <li>оплату некорректной зоны платной парковки.</li>
        </ul>
        <p>Штраф направляется владельцу транспортного средства по почте.</p>
        <h4 class="mt-4">Общие положения:</h4>
        <ul>
            <li>Платные парковки в Душанбе предоставляются для удобства водителей и регулирования дорожного движения.</li>
            <li>Пользователи парковок обязаны соблюдать нижеследующие правила и условия использования платных парковок.</li>
        </ul>

        <h4 class="mt-4">Размещение транспортных средств:</h4>
        <ul>
            <li>Автотранспортные средства должны быть размещены на парковке в соответствии с требованиями дорожных знаков и горизонтальных линий разметки.</li>
            <li>Запрещается создавать препятствия для других участников дорожного движения при въезде и выезде с парковки.</li>
        </ul>

        <h4 class="mt-4">Обязанности организатора платной парковки:</h4>
        <ul>
            <li>Организатор платной парковки обязан предоставлять услуги согласно установленным правилам.</li>
            <li>На территории парковки должны быть установлены дорожные информационные знаки и линии разметки.</li>
            <li>Парковочное оборудование должно быть в исправном состоянии.</li>
            <li>Парковка должна быть оснащена осветительным оборудованием.</li>
            <li>Организатор парковки должен своевременно уведомлять пользователей о проведении ремонтных работ и других мероприятий.</li>
        </ul>

        <h4 class="mt-4">Обязанности пользователей платной парковки:</h4>
        <ul>
            <li>Пользователи парковки должны строго соблюдать правила и условия использования парковки.</li>
            <li>При оплате услуги пользователь должен покинуть парковку в течение указанного времени или продлить срок парковки путем доплаты.</li>
            <li>Запрещается нецелевое использование парковочных мест и создание препятствий для других пользователей.</li>
            <li>Нельзя размещать транспортные средства на местах, предназначенных для определенных категорий транспорта, если это запрещено соответствующими знаками и разметкой.</li>
        </ul>

        <h4 class="mt-4">Тарифы и оплата:</h4>
        <ul>
            <li>График работы парковки и тарифы утверждаются организатором парковки с согласованием уполномоченного государственного органа.</li>
            <li>Оплата за парковку производится с помощью пластиковых карт, паркоматов, мобильных приложений или наличными.</li>
            <li>Документом, подтверждающим оплату парковки, является полученное текстовое сообщение (смс) с указанием даты и времени размещения транспортного средства на парковке.</li>
        </ul>

        <h4 class="mt-4">Штрафы и ответственность:</h4>
        <ul>
            <li>За несоблюдение правил и условий использования платной парковки предусмотрены штрафы в соответствии с действующим законодательством Республики Таджикистан.</li>
            <li>В случае неоплаты парковки второй и последующие разы, инспектор парковки имеет право заблокировать колеса транспортного средства до полной оплаты задолженности.</li>
        </ul>
        
        ',
        
    ],
    'en' => [
        'pageTitle' => 'Rules and penalties',
        'pageName' => 'Rules',
        'headerTitle' => 'Rules and penalties',
        'content' => '
        
        <p>Parking payment must be made <strong>within 15 minutes</strong> after parking the vehicle.</p>
<p>Leaving the parking space is required no later than <strong>10 minutes</strong> after the expiration of the paid time.</p>
<p>The penalty for violating the rules of paid parking is <strong>60 somoni.</strong></p>
<p>The owner of the vehicle may be fined for:</p>
<ul>
  <li>Non-payment of parking fee;</li>
  <li>Underpayment of the fee;</li>
  <li>Exceeding the paid time by more than 10 minutes;</li>
  <li>Late payment, more than 60 days after parking the vehicle;</li>
  <li>Paying for parking with a temporal break;</li>
  <li>Payment for the wrong zone of paid parking.</li>
</ul>
<p>The penalty is sent to the vehicle owner by mail.</p>
<h4 class="mt-4">General provisions:</h4>
<ul>
    <li>Paid parking in Dushanbe is provided for the convenience of drivers and to regulate traffic.</li>
    <li>Parking users must comply with the conditions and terms of using paid parking.</li>
</ul>
<h4 class="mt-4">Vehicle entry requirements:</h4>
<ul>
    <li>Vehicles entering paid parking must comply with road signs and markings on the parking area.</li>
    <li>Parking equipment must be in working condition.</li>
    <li>Parking should be equipped with a parking ticket machine.</li>
    <li>Parking organizations should not use parking spaces for other purposes, such as repairs or other activities.</li>
</ul>
<h4 class="mt-4">User obligations for paid parking:</h4>
<ul>
    <li>Parking users must comply with the conditions and terms of using paid parking.</li>
    <li>When using the service, the user must purchase parking for a specified period or extend the parking time with an additional fee.</li>
    <li>Unauthorized use of illegal parking areas and other restrictions is prohibited.</li>
    <li>In restricted parking categories, motor vehicles may not enter if not authorized by the regulations.</li>
</ul>
<h4 class="mt-4">Tariffs and payment:</h4>
<ul>
    <li>The parking schedule and tariffs are determined by the responsible parking authority and approved by the relevant authorities.</li>
    <li>Parking payment can be made using plastic cards, parking meters, mobile or cash applications.</li>
    <li>A receipt confirming the parking payment is sent through an SMS with the day and time of the vehicle`s entry into the parking area.</li>
</ul>
<h4 class="mt-4">Penalties and responsibilities:</h4>
<ul>
    <li>Compliance with the rules and conditions of using paid parking is required in accordance with the applicable laws of the Republic of Tajikistan.</li>
    <li>In case of parking violation, the parking inspector, as the legal representative of the parking, has the right to take necessary measures, including towing the vehicle away from the parking space, if the violation persists after multiple warnings.</li>
</ul>
        
        
        ',
        
    ],
    'tj' => [
        'pageTitle' => 'Қоидаҳо ва ҷаримаҳо',
        'pageName' => 'Қоидаҳо',
        'headerTitle' => 'Қоидаҳо ва ҷаримаҳо',
        'content' => '
        
        <p>Пулдошт кардани парковка бояд баъд аз гузошти машина дар  <strong>15 дақиқаи</strong> аввал иҷро гардад шавад.</p>
<p>Майдони парковка бояд не позда аз <strong>10 дақиқа</strong> пас аз анҷоми вақт покида шавад.</p>
<p>Қазои санадар барои сатрсарии наздики парковка <strong>60 сомон</strong> аст.</p>
<p>Молки машинаро метавонанд қазои қилоб барои зергузориҳои зерин карда шаванд:</p>
<ul>
  <li>Пулдошт кардани парковка;</li>
  <li>Пулдошт кардани дар камтарин ҳаҷми;</li>
  <li>Фавқулодда пулдошт кардани вақти пулдошт на заид аз 10 дақиқа;</li>
  <li>Пулдошт кардани баъдтар аз 60 рӯз пас аз ғузошти машинабарои парковка;</li>
  <li>Пулдошт кардани сессияи парковка бо ҷоявузандӣ;</li>
  <li>Пулдошт кардани зонаи нодурусти парковкаи пулдошт.</li>
</ul>
<p>Қазои барои молки машина бо почта меравад.</p>
<h4 class="mt-4">Маёрҳои умумӣ:</h4>
<ul>
    <li>Парковкадорӣ пулдошти дохилкунандаҳо ва ҷои мавҷудияти парковкадории пулдоштро бояд иҷро намояд.</li>
    <li>Истифодабарандагони парковкадор бояд шароит ва шартҳои истифодаи парковкаи пулдоштро баробарӣ намояд.</li>
</ul>
<h4 class="mt-4">Даромадкунии машин:</h4>
<ul>
    <li>Машинҳои роҳҳои парковкаи пулдошт бояд бо мувофиқи мовриҳои роҳи ва линияҳои метки замини парковкаи пулдошт фаромӯш карда шаванд.</li>
    <li>Ташкилоти манъаи қазои парковкаи пулдошт бояд хизматҳоро барои пардохти муайянҳо иҷро кунад.</li>
    <li>Дар майдони парковка линияҳои метки ва знакҳои роҳрошани бояд мавҷуд бошанд.</li>
    <li>Асбобҳои парковка бояд дар ҳолати фаъол бошанд.</li>
    <li>Парковка бояд бо асбоби ошиқа таҳия карда шавад.</li>
    <li>Ташкилоти парковка бояд истиқоматонро барои амалотҳои таъмирӣ ва иҷрои суроғаҳои дигар дар хона намояд.</li>
</ul>
<h4 class="mt-4">Истиқоматони корбарони парковкаи пулдошт:</h4>
<ul>
    <li>Истифодабарандагони парковка бояд бо табъиш ва шартҳои истифодаи парковкаи пулдошт баробарӣ намояд.</li>
    <li>Дар пулдошт кардани хидмати, истифодабаранда бояд парковкаро дар давраи муайянкарда шуда ба пайдоиш мегирад ё муддати парковкаро бо доплатои иловагӣ зид кунад.</li>
    <li>Эълонкунии майдони парковкаи нодуруст ва содиркунандаи манъаҳои дигари барои истифодабарони дигар манъаҳо манъ аст.</li>
    <li>Дар майдонҳои, барои сахти категорияҳои маҳдуди парковкаи транспортӣ, бояд автотранспортро нақъ намояд, агар ин бо қайди мувофиқ набуд.</li>
</ul>
<h4 class="mt-4">Тарифҳо ва пулдошти:</h4>
<ul>
    <li>Графики кори парковка ва тарифҳо тавассути ташкилоти парковка бо мувофиқи масъул органи ҳокиматии дохилӣ тасдиқ карда мешаванд.</li>
    <li>Пулдошти парковка бо картона пластикӣ, автоматҳои парковка, барномаҳои мобилӣ ё нақдӣ амалӣ мешавад.</li>
    <li>Санади, ки пулдошти парковкаро тасдиқ мекунад, хабари матнӣ (СМС) бо нишондиҳии рӯз ва вақти гузошти транспортро дар парковка ҳасил карда мешавад.</li>
</ul>
<h4 class="mt-4">Қазоҳо ва масъулият:</h4>
<ul>
    <li>Барои нехӯрдем меомедани шартҳо ва шароити истифодаи парковкаи пулдошт, қазоҳои мувофиқи қонуни ҷорӣи Ҷумҳурии Тоҷикистон муносиб аст.</li>
    <li>Дар ҳолати пулдошти парковка ба довом ва ҳамрақамин маротибаҳо, инспектори парковка дар ҳақиқати ҳуқуқи хомакунандаи парковка, хатарашондиҳои машинаро то пулдошти дахилӣ камелан пас аз пулдошти борҷини наздики кам карда шавад.</li>
</ul>
        
        
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
