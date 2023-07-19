<?php
session_start();
require_once '../vendor/autoload.php';

use Firebase\JWT\JWT;

$secretKey = '7316472QW1';

if (!isset($_SESSION['token'])) {
    // Если токен отсутствует, перенаправляем на login.php
    header('Location: login.php');
    exit;
}

// Получение токена из сеансовой переменной
$token = $_SESSION['token'];

try {
    // Декодирование токена
    $decodedToken = JWT::decode($token, $secretKey, array('HS256'));

    // Извлечение данных из токена
    $telephone = $decodedToken->telephone;
    $name = $decodedToken->name;
    $surname = $decodedToken->surname;


} catch (Exception $e) {
    // Обработка ошибки декодирования токена
    echo 'Error decoding token: ' . $e->getMessage();
}
// Здесь вы можете выполнять дополнительные действия, такие как установка сессии, сохранение информации о пользователе в файле или отправка пользователю дополнительной информации
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
        'pageblock1' => 'Мой профиль',
        'pageblock2' => 'Автомобили',
        'pageblock3' => 'Мои карты',
        'pageblock4' => 'Льготы/Абонименты',
        'pageblock5' => 'Народный Инспектор',
        'pagebl5info' => 'Инспектор фотографирует транспортное средство которое нарушило ПДД',
        'headerTitle' => 'Аккаунт',
        'headerTitle2' => 'Ожидание',
        'headerTitle3' => 'Штрафы',
        'headerTitle4' => 'История',
        'Buttel' => 'Связаться с поддержкой',
        'Butexit' => 'Выйти',
        'Pravila' => 'Правила использования сервисом',
        'ButAdd' => 'Добавить',
        'ButPay' => 'Оплатить абонимент',
        'ButIns' => 'Войти как инспектор',
        'AddCarNum1' => 'Введите машину',
        'AddCarNum2' => 'Номер машины:',
        'AddCarNum3' => 'Серия техпаспорта:',
        'AddCarNum4' => 'Завершить',

    ],
    'en' => [
        'pageblock1' => 'My Profile',
        'pageblock2' => 'Cars',
        'pageblock3' => 'My Cards',
        'pageblock4' => 'Benefits/Season tickets',
        'pageblock5' => 'People Inspector',
        'pagebl5info' => 'The inspector photographs the vehicle that violated traffic regulations',
        'headerTitle' => 'Account',
        'headerTitle2' => 'Expectation',
        'headerTitle3' => 'Penalties',
        'headerTitle4' => 'History',
        'Buttel' => 'Contact Support',
        'Butexit' => 'Exit',
        'Pravila' => 'Terms of use of the service',
        'ButAdd' => 'Add',
        'ButPay' => 'Pay for a subscription',
        'ButIns' => 'Log in as an Inspector',
        'AddCarNum1' => 'Enter the machine',
        'AddCarNum2' => 'Car number:',
        'AddCarNum3' => 'Technical passport series:',
        'AddCarNum4' => 'Complete',
        
    ],
    'tj' => [
        'pageblock1' => 'Профили ман',
        'pageblock2' => 'Мошинҳо',
        'pageblock3' => 'Кортҳои ман',
        'pageblock4' => 'Имтиезҳо/Абонементҳо',
        'pageblock5' => 'Инспектори Халқӣ',
        'pagebl5info' => 'Инспектор воситаи нақлиетро аксбардорӣ мекунад ки ПДД ро вайрон кардааст',
        'headerTitle' => 'Ҳисоб',
        'headerTitle2' => 'Интизорӣ',
        'headerTitle3' => 'Ҷаримаҳо',
        'headerTitle4' => 'Таърих',
        'Buttel' => 'Бо дастгирӣ тамос гиред',
        'Butexit' => 'Баромадан',
        'Pravila' => 'Қоидаҳои истифодаи хидмат',
        'ButAdd' => 'Илова кунед',
        'ButPay' => 'Пардохти абонемент',
        'ButIns' => 'Ҳамчун нозир ворид шавед',
        'AddCarNum1' => 'Мошинро ворид кунед',
        'AddCarNum2' => 'Рақами мошин:',
        'AddCarNum3' => 'Силсилаи шиносномаҳои техникӣ:',
        'AddCarNum4' => 'Анҷом додан',
        
    ],
];



// Получение текста на выбранном языке
$pageblock1 = $text[$currentLang]['pageblock1'];
$pageblock2 = $text[$currentLang]['pageblock2'];
$pageblock3 = $text[$currentLang]['pageblock3'];
$pageblock4 = $text[$currentLang]['pageblock4'];
$pageblock5 = $text[$currentLang]['pageblock5'];
$pagebl5info = $text[$currentLang]['pagebl5info'];
$headerTitle = $text[$currentLang]['headerTitle'];
$headerTitle2 = $text[$currentLang]['headerTitle2'];
$headerTitle3 = $text[$currentLang]['headerTitle3'];
$headerTitle4 = $text[$currentLang]['headerTitle4'];
$Buttel = $text[$currentLang]['Buttel'];
$Butexit = $text[$currentLang]['Butexit'];
$Pravila = $text[$currentLang]['Pravila'];
$ButAdd = $text[$currentLang]['ButAdd'];
$ButPay = $text[$currentLang]['ButPay'];
$ButIns = $text[$currentLang]['ButIns'];
$AddCarNum1 = $text[$currentLang]['AddCarNum1'];
$AddCarNum2 = $text[$currentLang]['AddCarNum2'];
$AddCarNum3 = $text[$currentLang]['AddCarNum3'];
$AddCarNum4 = $text[$currentLang]['AddCarNum4'];
?>


<?php
$pageTitle = "Профиль";
require 'template/header.php';
?>
<body style="background: #E5E5E5;">
    <?php 
    $pageName = "Аккаунт";
    require 'template/main.php';
    ?>  
         <div id="col-ss">
                <div class="col-sr">
                  <ul id="paginated-list" data-current-page="1" aria-live="polite" class="paginat">
                    <li class="header_item" data-tab="tab-1">
                        <a href="#" class="aas">
                            <div class="namedd">
                                <h6 class="title1"><?php echo $headerTitle; ?></h6>
                            </div>
                        </a>
                    </li>
                    <li class="header_item" data-tab="tab-2">
                        <a href="#" class="aas">
                            <div class="namedd">
                                <h6 class="title1"><?php echo $headerTitle2; ?></h6>
                            </div>
                        </a>
                    </li>
                    <li class="header_item" data-tab="tab-3">
                        <a href="#" class="aas">
                            <div class="namedd">
                                <h6 class="title1"><?php echo $headerTitle3; ?></h6>
                            </div>
                        </a>
                    </li>
                    <li class="header_item" data-tab="tab-4">
                        <a href="#" class="aas">
                            <div class="namedd">
                                <h6 class="title1"><?php echo $headerTitle4; ?></h6>
                            </div>
                        </a>
                    </li>
                  </ul>
                </div>    
            </div>
                <!--Пагинация-->
             <div class="pagescontrol">

                <!--Страница Профиль-->
                <div class="main_content hidden" id="tab-1">
                    <div class="cl-os">
                       <div class="sat-1 cl-sat">
                            <p class="prof"><?php echo $pageblock1; ?></p>
                            <div class="fio"><?php echo $surname . ' ' . $name; ?><br>
                            <tet>+<?php echo $telephone; ?></tet></div>
                            <button class="call" onclick="if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) { window.location.href='tel:3366'; } else { alert('Вы можете связаться с поддержкой по номеру: 3366'); }"><?php echo $Buttel; ?></button><!--Если это телефон, он перенаправляет на звонок, если нет, то получаем уведомление по какому номеру можно связаться с нами-->
                            <form action="logout.php" method="post">
                              <button type="submit" class="logout"><?php echo $Butexit; ?></button>
                            </form>
                            <a href="#" class="politic"><?php echo $Pravila; ?></a>
                        </div>
                        
                        <!-- Автомобили -->
                        <div class="sat-1">
                            <p class="prof"><?php echo $pageblock2; ?></p>
                            <!-- Блок для вывода машин -->
                            <div id="car-list"> 
                              
                            </div>
                            <!-- Добавление машина и запрос на api -->
                            <button id="add-car-btn" class="add-btn"><?php echo $ButAdd; ?></button>
                            <div id="add-car-modal" class="modal">
                              <div class="modal-content">
                                <span class="close">&times;</span>
                                  <form id="car-form">
                                    <label class="cl-lb"><?php echo $AddCarNum1; ?></label><br>
                                    <label for="photo">
                                        <img src="images/add.svg" alt="Add Photo">
                                    </label>
                                    <input type="file" id="photo" accept="image/*"  style="display: none;">
                                    <br>
                                    <label class="ca-nm" for="number"><?php echo $AddCarNum2; ?></label><br>
                                    <input class="inp-num" type="text" placeholder="0000XX00" id="car-number" pattern="[0-9]{3,4}[A-Z]{2}[0-9]{2}" >
                                    <br>
                                    <label class="ca-nm" for="passport"><?php echo $AddCarNum3; ?></label><br>
                                    <input type="text" placeholder="0000*" id="passport" required>
                                    <br>
                                    <button class="en-bn" type="submit"><?php echo $AddCarNum4; ?></button>
                                  </form>
                              </div>
                            </div>
                        </div>
                      
                        <div class="sat-1">
                            <p class="prof"><?php echo $pageblock3; ?></p>
                        </div>
                        <div class="sat-1">
                            <p class="prof"><?php echo $pageblock4; ?></p>
                            <div class="aboniment">
                                <div class="lg">
                                    
                                    <!-- Прелоудер -->
                                    <div id="loading-spinner4"></div>
                                    <div class="cl-lg" id="my-cl-lg"></div>
                                </div>
                                <div>
                                    <button class="btn btn-primary inspector" onclick="window.location.href='aboniment.php'"><?php echo $ButPay; ?></button>
                                </div>
                                <!-- <div>
                                    <button class="btn btn-secondary" onclick="window.location.href='page2.html'">Оплатить льготное разрешение</button>
                                </div> -->
                            </div>
                        </div>
                        <div class="sat-1">
                            <p class="prof">
                            <?php echo $pageblock5; ?>
                                <button class="btn btn-outline-secondary-white" 
                                    type="button" 
                                    id="tooltipButton" 
                                    data-bs-toggle="tooltip" 
                                    data-bs-placement="top" 
                                    title="<?php echo $pagebl5info; ?>" 
                                    style="padding-left: 10px;padding-top: 0; color: #718096;">
                                    <i class="bi bi-info-circle">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>
                                    </i>
                                </button>
                                <button type="button" class="btn btn-primary inspector" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <?php echo $ButIns; ?>
                                </button>
                            </p>
                        </div>

                            <!-- Модальное окно -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Инструкция</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <p>Добро пожаловать в роль народного инспектора!</p>
        <p>Ниже приведены инструкции, которые вы должны принять, чтобы продолжить:</p>
        <ol>
          <li>Вы обязуетесь выполнять свои обязанности народного инспектора в соответствии с законодательством и этическими стандартами.</li>
          <li>Вы соглашаетесь использовать предоставленные вам ресурсы и инструменты исключительно в рамках выполнения ваших обязанностей.</li>
          <li>Вы подтверждаете, что несете ответственность за любые действия или результаты, связанные с вашей ролью народного инспектора.</li>
          <li>Вы соглашаетесь с обработкой ваших персональных данных в соответствии с действующими законами о защите данных.</li>
        </ol>
        <p>Пожалуйста, внимательно прочитайте инструкцию и только после этого заполните форму ниже.</p>
        
        <form>
  <div class="mb-3">
    <label for="inputName" class="form-label">Имя</label>
    <input type="text" class="form-control" id="inputName" name="name" required>
  </div>
  <div class="mb-3">
    <label for="inputLastName" class="form-label">Фамилия</label>
    <input type="text" class="form-control" id="inputLastName" name="lastName" required>
  </div>
  <div class="mb-3">
    <label for="inputPatronymic" class="form-label">Отчество</label>
    <input type="text" class="form-control" id="inputPatronymic" name="patronymic" required>
  </div>
  <div class="mb-3">
    <label for="inputBirthYear" class="form-label">Год рождения</label>
    <input type="text" class="form-control" id="inputBirthYear" name="birthYear" required>
  </div>
  <div class="mb-3">
    <label for="inputPassportFront" class="form-label">Фотография передней части паспорта</label>
    <input type="file" class="form-control" id="inputPassportFront" name="passportFront" accept="image/*" required>
  </div>
  <div class="mb-3">
    <label for="inputPassportBack" class="form-label">Фотография задней части паспорта</label>
    <input type="file" class="form-control" id="inputPassportBack" name="passportBack" accept="image/*" required>
  </div>
  <div class="mb-3">
    <label for="inputPassportNumber" class="form-label">Номер паспорта</label>
    <input type="text" class="form-control" id="inputPassportNumber" name="passportNumber" required>
  </div>
  <div class="mb-3">
    <label for="inputPassportIssueDate" class="form-label">Дата выдачи паспорта</label>
    <input type="text" class="form-control" id="inputPassportIssueDate" name="passportIssueDate" required>
  </div>
  <div class="mb-3">
    <label for="inputPhoneNumber" class="form-label">Номер телефона</label>
    <input type="tel" class="form-control" id="inputPhoneNumber" name="phoneNumber" required>
  </div>
  <div class="mb-3">
    <label for="inputPassword" class="form-label">Пароль</label>
    <input type="password" class="form-control" id="inputPassword" name="password" required>
  </div>
  <div class="mb-3">
    <label for="inputConfirmPassword" class="form-label">Подтвердите пароль</label>
    <input type="password" class="form-control" id="inputConfirmPassword" name="confirmPassword" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="agreeCheckbox" name="agreeCheckbox" required>
    <label class="form-check-label" for="agreeCheckbox">Я согласен с обработкой моих персональных данных</label>
  </div>
</form>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary">Отправить запрос</button>
      </div>
    </div>
  </div>
</div>




                    </div>
                </div>
                <!--Страница Ожидание-->
                    <div class="main_content hidden" id="tab-2">
                        <!-- Прелоудер -->
                        <div id="loading-spinner"></div>
                        <div class="cl-os" id="my-cl-os3"></div>
                    </div>

                    <!--Страница Штрафы-->
                    <div class="main_content hidden" id="tab-3">
                        <!-- Прелоудер -->
                        <div id="loading-spinner2"></div>
                        <div class="cl-os" id="my-cl-os2"></div>
                    </div>

                    <!--Страница История-->
                    <div class="main_content hidden" id="tab-4">
                        <!-- Прелоудер -->
                        <div id="loading-spinner3"></div>
                        <div class="cl-os" id="my-cl-os"></div>
                    </div>
                <!--Страницы закончили-->
            </div>      
    <!--Добавляем Footer-->
    <?php require 'template/footer.php'?>
    <script>
        const tooltipTrigger = document.getElementById('tooltipButton');
        const tooltip = new bootstrap.Tooltip(tooltipTrigger);

        tooltipTrigger.addEventListener('click', () => {
            // Код, который нужно выполнить при клике на иконку
        });
	</script>
</body>
</html>
