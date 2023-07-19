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
    <!-- Подключение Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <img src="images/logo.png" class="logo" alt="Logo">
            <div class="card-body" id="phoneForm">
                <form id="loginForm" method="post" action="https://api.parking.dc.tj/api/v1/authForUser">
                    <div>
                        <h1>Войти</h1>
                        <span>Парковки и зарядные станции Душанбе</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="loginInput" name="login" placeholder="Логин"  minlength="5" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Пароль"  minlength="6" required>
                        <i class="far fa-eye" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #6c757d;"></i>
                    </div>
                    <a href="recover_password.php" id="forgotPasswordLink" style="margin: 0;">Забыли пароль?</a>
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
    success: function(response, status, xhr) {
        console.log('Успешный ответ от сервера', response);
        console.log('Статус ответа:', xhr.status);

        if (xhr.status === 201) {
            console.log('SMS-код верный');
            var tokenData = {
                telephone: response.telephone,
                name: response.name,
                surname: response.surname
                // Добавьте здесь другие поля, которые хотите сохранить в токене
            };

            $.ajax({
                url: 'create_token.php',
                method: 'POST',
                cache: false,
                data: tokenData,
                success: function(response) {
                    console.log('Токен создан и сохранен', response);
                    // Перенаправление на другую страницу
                    window.location.href = 'account.php';
                },
                error: function(error) {
                    console.error('Ошибка при создании и сохранении токена', error);
                }
            });
        } else if (xhr.status === 200) {
            console.log('SMS-код неверный');
            alert('Неправильный SMS-код');
        } else {
            console.log('Некорректный статус ответа');
            alert('Неправильный Логин или Пароль');
        }
    },
    error: function(error) {
        console.error('Ошибка при авторизации', error);
        $('#errorMessage').text('Ошибка при авторизации');
        $('#passwordInput').val('');
    }
});
            });

            $('#togglePassword').click(function() {
                var passwordInput = $('#passwordInput');
                var passwordFieldType = passwordInput.attr('type');
                var eyeIcon = $('#togglePassword');

                if (passwordFieldType === 'password') {
                    passwordInput.attr('type', 'text');
                    eyeIcon.removeClass('far fa-eye').addClass('far fa-eye-slash');
                } else {
                    passwordInput.attr('type', 'password');
                    eyeIcon.removeClass('far fa-eye-slash').addClass('far fa-eye');
                }
            });

            // $('#forgotPasswordLink').click(function(e) {
            //     e.preventDefault();
            //     alert('Функция восстановления пароля будет добавлена в будущих обновлениях.');
            // });
        });
    </script>
</body>
</html>