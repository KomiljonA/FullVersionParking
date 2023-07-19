<?php
require_once __DIR__ . '/../vendor/autoload.php';
use \Firebase\JWT\JWT;

$key = 'iG5$1kf#9JKlp@H';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение токена из формы
    $token = $_POST['token'];

    try {
        // Расшифровка токена
        $decodedToken = JWT::decode($token, $key, array('HS256'));

        // Отправка POST-запроса на API для подтверждения кода
        $apiUrl = 'https://api.parking.dc.tj/api/v1/verifyCode';
        $postData = ['telephone' => $decodedToken->telephone, 'code' => $_POST['code']];

        // Используйте ваш выбранный HTTP-клиент для выполнения POST-запроса
        // и передачи данных на указанный API
        // Пример с использованием cURL:
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        $response = curl_exec($ch);
        curl_close($ch);

        // Обработка ответа от API при необходимости

        // Перенаправление на страницу аккаунта
        header("Location: account.php");
        exit();
    } catch (Exception $e) {
        // Обработка ошибок при отправке запроса на API или расшифровке токена
        echo 'Error: ' . $e->getMessage();
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Подтверждение</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width">
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <!--Иконка лого-->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" />
    <!-- Подключение Bootstrap CSS -->
    <link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <img src="images/logo.png" class="logo" alt="Logo">
            <div class="card-body" id="codeForm">
                <form method="POST" action="">
                    <div>
                        <h1>Подтверждение</h1>
                        <span>Введите код, отправленный на ваш номер телефона</span>
                    </div>
                    <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="codeInput" name="code" placeholder="Код подтверждения" required>
                    </div>
                    <button id="verifyCodeButton" class="btn btn-primary" type="submit">Подтвердить код</button>
                </form>
            </div>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <object type="image/svg+xml" data="images/bac.svg" class="bac" alt="Background"></object>
                    <h3 class="index ttt">Легкий поиск парковок и зарядных станций</h3>
                    <p class="index fff">Найдите парковку и зарядную станцию. Вы можете сразу заплатить за парковочное время. Также можно оплатить штрафы.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Получаем кнопку "Войти"
            var verifyButton = document.getElementById("verifyButton");

            // Обработчик события клика на кнопке "Войти"
            verifyButton.addEventListener("click", function(event) {
                event.preventDefault(); // Отменяем отправку формы
                var smsCodeForm = document.getElementById("smsCodeForm");
                var codeInput = document.getElementById("codeInput");

                // Валидируйте SMS-код, если это необходимо

                smsCodeForm.submit(); // Отправляем форму на страницу "account.php"
            });
        });

        document.getElementById("codeInput").addEventListener("input", function(e) {
            var inputValue = e.target.value;
            e.target.value = inputValue.replace(/\D/g, ''); // Удалить все нецифровые символы
        });
    </script>

</body>
</html>
