
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
        'btnex' => 'Назад',
        'txt1' => 'Оформление абонента',
        'txt2' => 'Номер транспортного средства',
        'txt3' => 'Введите ТС',
        'txt4' => 'Имя',
        'txt5' => 'Фамилие',
        'txt6' => 'Отчество',
        'txt7' => 'Адрес',
        'txt8' => 'Ваше адрес',
        'txt9' => 'Удостоверение личности',
        'txt10' => 'НазадСерия паспорта',
        'txt11' => 'Дата выдачи паспорта',
        'txt12' => 'Кем выдан',
        'txt13' => 'Тип абрнемента',
        'txt14' => 'Выберите тип абонемента',
        'txt15' => 'Цена',
        'txt16' => 'Продолжить',
        'txt17' => 'Введите номер ТС в формате 0000XX00',
        'txt18' => 'Абонемент на 1 год',
        'txt19' => 'Абонемент на 1 месяц',
    ],
    'en' => [
        'btnex' => 'Back',
        'txt1' => 'Registration of the subscriber',
        'txt2' => 'Vehicle number',
        'txt3' => 'Enter the vehicle',
        'txt4' => 'First Name',
        'txt5' => 'Last Name',
        'txt6' => 'Middle name',
        'txt7' => 'Address',
        'txt8' => 'Your address',
        'txt9' => 'Identification card',
        'txt10' => 'Back Passport Series',
        'txt11' => 'Date of issue of the passport',
        'txt12' => 'Issued by whom',
        'txt13' => 'Subscription type',
        'txt14' => 'Choose a subscription type',
        'txt15' => 'Price',
        'txt16' => 'Continue',
        'txt17' => 'Enter the vehicle number in the format 0000XX00',
        'txt18' => 'Subscription for 1 year',
        'txt19' => 'Subscription for 1 month',

    ],
    'tj' => [
        'btnex' => 'қафо',
        'txt1' => 'Рақами воситаи нақлиет',
        'txt2' => 'TS ворид кунед',
        'txt3' => 'Ном',
        'txt4' => 'Фамилияҳо',
        'txt5' => 'Номи падар',
        'txt6' => 'Суроға',
        'txt7' => 'Суроғаи шумо',
        'txt8' => 'Шаҳодатномаи шахсӣ',
        'txt9' => 'Бозгашт силсилаи шиноснома',
        'txt10' => 'Санаи додани шиноснома',
        'txt11' => 'Аз ҷониби кӣ дода шудааст',
        'txt12' => 'Намуди абонемент',
        'txt13' => 'Навъи узвиятро интихоб кунед',
        'txt14' => 'Нарх',
        'txt15' => 'Идома',
        'txt16' => 'Продолжить',
        'txt17' => 'Рақами TS РО ДАР формати 0000XX00 ворид кунед',
        'txt18' => 'Абонемент барои 1 сол',
        'txt19' => 'Абонемент барои 1 моҳ',
    ],
];

// Получение текста на выбранном языке
$btnex = $text[$currentLang]['btnex'];
$txt1 = $text[$currentLang]['txt1'];
$txt2 = $text[$currentLang]['txt2'];
$txt3 = $text[$currentLang]['txt3'];
$txt4 = $text[$currentLang]['txt4'];
$txt5 = $text[$currentLang]['txt5'];
$txt6 = $text[$currentLang]['txt6'];
$txt7 = $text[$currentLang]['txt7'];
$txt8 = $text[$currentLang]['txt8'];
$txt9 = $text[$currentLang]['txt9'];
$txt10 = $text[$currentLang]['txt10'];
$txt11 = $text[$currentLang]['txt11'];
$txt12 = $text[$currentLang]['txt12'];
$txt13 = $text[$currentLang]['txt13'];
$txt14 = $text[$currentLang]['txt14'];
$txt15 = $text[$currentLang]['txt15'];
$txt16 = $text[$currentLang]['txt16'];
$txt17 = $text[$currentLang]['txt17'];
$txt18 = $text[$currentLang]['txt18'];
$txt19 = $text[$currentLang]['txt19'];

?>



<?php
$pageTitle = "Профиль";
require 'template/header.php';
?>
<body style="background: #fff;">
    <?php 
    $pageName = "Аккаунт";
    require 'template/main.php';
    ?>  

            <div class="container mt-5" >
            <div class="row justify-content-center">
                <div class="col-md-8 form-lg">
                <a href="#" onclick="history.back();" class="back-button"><?php echo $btnex; ?></a>
                <h2 class="text-center mb-4"><?php echo $txt1; ?></h2>
                <form>
                    <div class="mb-3">
                    <label for="inputCarNumber" class="form-label"><?php echo $txt2; ?></label>
                    <input type="text" class="form-control" id="inputCarNumber" pattern="[0-9]{3,4}[A-Z]{2}[0-9]{2}" 
                        placeholder="<?php echo $txt3; ?>" required>
                    <div class="invalid-feedback"><?php echo $txt17; ?></div>
                    </div>
                    <div class="mb-3 row">
                    <div class="col">
                        <label for="inputFirstName" class="form-label"><?php echo $txt4; ?></label>
                        <input type="text" class="form-control" id="inputFirstName" placeholder="<?php echo $txt4; ?>" required>
                    </div>
                    <div class="col">
                        <label for="inputLastName" class="form-label"><?php echo $txt5; ?></label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="<?php echo $txt5; ?>" required>
                    </div>
                    <div class="col">
                        <label for="inputPatronymic" class="form-label"><?php echo $txt6; ?></label>
                        <input type="text" class="form-control" id="inputPatronymic" placeholder="<?php echo $txt6; ?>" required>
                    </div>
                    </div>
                    <div class="mb-3">
                    <label for="inputAddress" class="form-label"><?php echo $txt7; ?></label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="<?php echo $txt8; ?>" required>
                    </div>
                    <h3 class="mb-3"><?php echo $txt9; ?></h3>
                    <div class="mb-3 row">
                    <div class="col">
                        <label for="inputPassportSeries" class="form-label"><?php echo $txt10; ?></label>
                        <input type="text" class="form-control" id="inputPassportSeries" placeholder="<?php echo $txt10; ?>" required>
                    </div>
                    <div class="col">
                        <label for="inputPassportIssueDate" class="form-label"><?php echo $txt11; ?></label>
                        <input type="date" class="form-control" id="inputPassportIssueDate" required>
                    </div>
                    <div class="col">
                        <label for="inputPassportIssuedBy" class="form-label"><?php echo $txt12; ?></label>
                        <input type="text" class="form-control" id="inputPassportIssuedBy" placeholder="<?php echo $txt12; ?>" required>
                    </div>
                    </div>
                    <div class="mb-3 row">
                    <div class="col-md-8">
                        <label for="inputAbonementType" class="form-label"><?php echo $txt13; ?></label>
                        <select class="form-select" id="inputAbonementType" required>
                        <option selected disabled><?php echo $txt14; ?></option>
                        <option value="7000 сомони"><?php echo $txt18; ?></option>
                        <option value="1400 сомони"><?php echo $txt19; ?></option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputPrice" class="form-label"><?php echo $txt15; ?></label>
                        <input type="text" class="form-control" id="inputPrice" disabled>
                    </div>
                    </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary"><?php echo $txt16; ?></button>
                    </div>
                </form>
                </div>
            </div>
            </div>

            <script>
            const abonementTypeSelect = document.getElementById('inputAbonementType');
            const priceInput = document.getElementById('inputPrice');

            abonementTypeSelect.addEventListener('change', function() {
                const selectedOption = abonementTypeSelect.options[abonementTypeSelect.selectedIndex];
                const price = selectedOption.value;
                priceInput.value = price;
            });
            </script>



    <!--Добавляем Footer-->
    <?php require 'template/footer.php'?>
</body>
</html>
