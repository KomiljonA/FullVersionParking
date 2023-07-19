<?php
session_start();
?>
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
<div class="container register" id="container">
    <div class="form-container sign-in-container">
        <img src="images/logo.png" class="logo" alt="Logo">
        <div class="card-body" id="phoneForm">
            <form id="loginForm">
                <div>
                    <h1>Войти</h1>
                    <span>Парковки и зарядные станции Душанбе</span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Имя</span>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" aria-label="Имя" required minlength="3" maxlength="18">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Фамилия</span>
                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Фамилия" aria-label="Фамилия" required minlength="3" maxlength="18">
                </div>
                <!-- <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Отчество</span>
                    <input type="text" class="form-control" id="patronymic" name="patronymic" placeholder="Отчество" aria-label="Отчество" required minlength="3" maxlength="18">
                </div> -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Логин</span>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Логин" aria-label="Логин" aria-describedby="basic-addon1" required minlength="5">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Пароль</span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Пароль" aria-label="Пароль" aria-describedby="basic-addon1" required minlength="8">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Пароль</span>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Повторите пароль" aria-label="Повторите пароль" aria-describedby="basic-addon1" required minlength="8" oninput="checkPasswordMatch()">
                </div>
                <small id="passwordMatchError" style="display: none; color: red;">Пароли не совпадают.</small>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Машина</span>
                    <input type="text" class="form-control" id="car1" name="car1" placeholder="Номер машины" aria-label="Номер машины" required minlength="7" maxlength="8">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">+992</span>
                    <input type="text" class="form-control" id="telephoneInput" name="telephone" data-phone-pattern="_________" placeholder="Номер телефона" aria-label="Номер телефона" aria-describedby="basic-addon1" inputmode="tel" required>
                </div>
                <button id="getCodeButton" class="btn btn-primary">Получить код</button>
            </form>     
        </div>
        <div class="card-body" id="smsForm" style="display: none;">
            <form id="smsCodeForm" action="account.php" method="post">
                <div>
                    <h1>Войти</h1>
                    <span>Парковки и зарядные станции Душанбе</span>
                </div>
                <div class="mb-3">
                    <label for="smsCodeInput" class="form-label">СМС код</label>
                    <input id="smsCodeInput" name="p0" type="text" class="form-control" placeholder="СМС код" pattern="\d{6}" maxlength="6" inputmode="tel" required>
                </div>
                <button id="verifyButton" class="btn btn-primary">Войти</button>
                <button id="resendCodeButton" class="btn btn-secondary">Отправить еще раз</button>
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
<script src="https://cdn.jsdelivr.net/npm/jsrsasign"></script>
<script>
$(document).ready(function() {
    var phoneForm = $('#phoneForm');
    var smsForm = $('#smsForm');
    var getCodeButton = $('#getCodeButton');
    var verifyButton = $('#verifyButton');
    var resendCodeButton = $('#resendCodeButton');
    var resendCodeTimeout = null;

    getCodeButton.click(function(e) {
        e.preventDefault(); // Предотвращаем отправку формы

        var telInput = $('#telephoneInput');
        var nameInput = $('#name');
        var surnameInput = $('#surname');
        // var patronymicInput = $('#patronymic');
        var loginInput = $('#login');
        var carInput = $('#car1');
        var passwordInput = $('#password');

        if (telInput.val() !== '') {
            telInput.prop('readonly', true);
            telInput.attr('disabled', 'disabled');

            phoneForm.hide();
            smsForm.show();
            $('#smsCodeInput').focus();

            resendCodeButton.prop('disabled', true);
            resendCodeTimeout = setTimeout(function() {
                resendCodeButton.prop('disabled', false);
            }, 30000);

            // Отправляем POST-запрос для получения смс кода
            $.ajax({
                url: 'https://api.parking.dc.tj/api/v1/registerForUser',
                method: 'POST',
                cache: false,
                data: {
                    telephone: '992' + $('#telephoneInput').val(),
                    name: nameInput.val(),
                    surname: surnameInput.val(),
                    // patronymic: patronymicInput.val(),
                    login: loginInput.val(),
                    car1: carInput.val(),
                    password: passwordInput.val()
                },
                success: function(response) {
                    // Обработка успешного ответа от сервера
                    console.log('SMS-код отправлен');
                    alert('SMS-код отправлен');
                },
                error: function(error) {
                    // Обработка ошибки
                    console.error('Ошибка при отправке запроса', error);
                    alert('Ошибка при отправке запроса');
                }
            });
        }
    });

    verifyButton.click(function(e) {
                e.preventDefault(); // Предотвращаем отправку формы

                var smsCodeInput = $('#smsCodeInput');

                if (smsCodeInput.val() !== '') {
                    // Отправляем POST-запрос для проверки смс кода
                    $.ajax({
                        url: 'https://api.parking.dc.tj/api/v1/confirmSMSAccount',
                        method: 'POST',
                        data: {
                            telephone: '992' + $('#telephoneInput').val(), // Добавляем префикс "992" к номеру телефона
                            p0: smsCodeInput.val()
                        },
                        success: function(response) {
                            // Обработка успешного ответа от сервера
                            console.log('Успешный ответ от сервера', response);
                            if (Array.isArray(response) && response.length > 0 && response[0].id) {
                                console.log('SMS-код верный');
                                window.location.href = 'account.php'; // Если SMS-код верный
                            } else {
                                console.log('Неправильный SMS-код');
                                alert('Неправильный SMS-код'); // Если SMS-код неправильный
                            }
                        },
                        error: function(error) {
                            // Обработка ошибки
                            console.error('Ошибка при отправке запроса', error);
                            alert('Ошибка при отправке запроса');
                        }
                    });
                }
            });

    resendCodeButton.click(function(e) {
        e.preventDefault(); // Предотвращаем отправку формы

        clearTimeout(resendCodeTimeout);
        resendCodeButton.prop('disabled', true);

        // Отправляем POST-запрос для повторной отправки смс кода
        $.ajax({
            url: 'https://api.parking.dc.tj/api/v1/storeAccount',
            method: 'POST',
            cache: false,
            data: {
                telephone: '992' + $('#telephoneInput').val()
            },
            success: function(response) {
                console.log('SMS-код отправлен');
                alert('SMS-код отправлен');
                resendCodeTimeout = setTimeout(function() {
                    resendCodeButton.prop('disabled', false);
                }, 30000);
            },
            error: function(error) {
                console.error('Ошибка при отправке запроса', error);
                alert('Ошибка при отправке запроса');
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var eventCallback = function(e) {
        var el = e.target,
            clearVal = el.dataset.phoneClear,
            pattern = el.dataset.phonePattern,
            matrix_def = "(___) ___-__-__",
            matrix = pattern ? pattern : matrix_def,
            i = 0,
            def = matrix.replace(/\D/g, ""),
            val = e.target.value.replace(/\D/g, "");
        if (clearVal !== 'false' && e.type === 'blur') {
            if (val.length < matrix.match(/([\_\d])/g).length) {
                e.target.value = '';
                return;
            }
        }
        if (def.length >= val.length) val = def;
        e.target.value = matrix.replace(/./g, function(a) {
            return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
        }).replace(/-/g, ''); // Удалить все дефисы
    };

    var phoneInputs = document.querySelectorAll('[data-phone-pattern]');
    for (var i = 0; i < phoneInputs.length; i++) {
        var elem = phoneInputs[i];
        ['input', 'blur', 'focus'].forEach(function(ev) {
            elem.addEventListener(ev, eventCallback);
        });
    }
});

$('#smsCodeInput').on('input', function(e) {
    var inputValue = $(this).val();
    $(this).val(inputValue.replace(/\D/g, '')); // Удалить все нецифровые символы
});

function checkPasswordMatch() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var errorText = document.getElementById("passwordMatchError");

    if (password === confirmPassword) {
        errorText.style.display = "none";
    } else {
        errorText.style.display = "block";
    }
}
</script>
</body>
</html>
