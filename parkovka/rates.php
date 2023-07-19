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
        'pageTitle' => 'Тарифы и способы оплаты',
        'pageName' => 'Тарифы',
        'headerTitle' => 'Тарифы',
        'content' => '
        
        <p class="">Плата за пользование зоной платной парковки Душанбе взимается ежедневно с 08:00 до 20:00, включая выходные и праздничные дни.</p>
                <strong>Стоимость:</strong>

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Категория транспортного средства</th>
            <th>Цена, (сом./час)</th>
            <th>Месячное разрешение (сом.)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>категории А и М</td>
            <td>3</td>
            <td>700</td>
          </tr>
          <tr>
            <td>категория В</td>
            <td>3</td>
            <td>700</td>
          </tr>
          <tr>
            <td>категория С и D</td>
            <td>6</td>
            <td>1400</td>
          </tr>
        </tbody>
      </table>

      
      ',
        
    ],
    'en' => [
        'pageTitle' => 'Rates',
        'pageName' => 'Rates',
        'headerTitle' => 'Rates',
        'content' => '
        
        <p class="">The fee for using the paid parking zone in Dushanbe is charged daily from 08:00 to 20:00, including weekends and public holidays.</p>
<strong>Cost:</strong>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Vehicle Category</th>
      <th>Price, (TJS/hour)</th>
      <th>Monthly Permit (TJS)</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Category A and M</td>
      <td>3</td>
      <td>700</td>
    </tr>
    <tr>
      <td>Category B</td>
      <td>3</td>
      <td>700</td>
    </tr>
    <tr>
      <td>Category C and D</td>
      <td>6</td>
      <td>1400</td>
    </tr>
  </tbody>
</table>
        
        
        ',
        
    ],
    'tj' => [
        'pageTitle' => 'Тарифҳо',
        'pageName' => 'Тарифҳо',
        'headerTitle' => 'Тарифҳо',
        'content' => '
        
        <p class="">Мукурати корбарии минтақаи парковкуҳои пулӣ Душанбе рӯзана аз 08:00 то 20:00, аз ҷума то шанбе ва рӯзҳои таваллудӣ ва ҷашнӣ андоза мегирад.</p>
<strong>Нарх:</strong>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Категорияи транспортӣ</th>
      <th>Нарх, (сом./соат)</th>
      <th>Иҷозати моҳӣ (сом.)</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Категорияи А ва М</td>
      <td>3</td>
      <td>700</td>
    </tr>
    <tr>
      <td>Категорияи Б</td>
      <td>3</td>
      <td>700</td>
    </tr>
    <tr>
      <td>Категорияи С ва D</td>
      <td>6</td>
      <td>1400</td>
    </tr>
  </tbody>
</table>
        
        
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
