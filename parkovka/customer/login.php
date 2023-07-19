
<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
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
            <div class="card-body" id="phoneForm">
            <form id="loginForm" method="post">
                    <div>
                        <h1>Войти</h1>
                        <span>Парковки и зарядные станции Душанбе</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="loginInput" name="login" placeholder="Логин" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Пароль" required>
                    </div>
                    <p id="errorMessage"></p>

                    <button id="loginButton" class="btn btn-primary">Войти</button>
                    <a href="register.php" class="btn btn-secondary reg">Зарегистрироваться</a>
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
    <script src="https://cdn.jsdelivr.net/npm/jsrsasign"></script>
    <script src="js/jquery.js"></script>
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
    
    <script>
$(document).ready(function() {
    $('#loginButton').click(function(e) {
        e.preventDefault();

        var loginInput = $('#loginInput').val();
        var passwordInput = $('#passwordInput').val();

        $.ajax({
            url: 'https://api.parking.dc.tj/api/v1/authForUser',
            method: 'POST',
            cache: false,
            data: {
                login: loginInput,
                password: passwordInput
            },
            success: function(response) {
                console.log(response); // Выводим полный объект response в консоль
                if (response.success) {
                    console.log('Успешная авторизация');
                    console.log('Перенаправление на account.php');
                    window.location.href = '/account.php';
                } else {
                    console.log('Неверный логин или пароль');
                    $('#errorMessage').text('Неверный логин или пароль');
                }
            },

            error: function(error) {
                console.error('Ошибка при авторизации', error);
                $('#errorMessage').text('Ошибка при авторизации');
                $('#passwordInput').val('');
            }
        });
    });
});
    </script>
</body>
</html>
