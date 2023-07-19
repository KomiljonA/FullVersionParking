<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Восстановить пароль</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width">
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <!--Иконка логотипа-->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" />
    <!-- Подключение Bootstrap CSS -->
    <link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <img src="images/logo.png" class="logo" alt="Logo">
            <div class="card-body" id="phoneForm">
                <form id="loginForm">
                    <div>
                        <h2>Восстановить пароль</h2>
                    </div>
                    <div class="input-group mb-3">
                        
                        <span class="input-group-text" id="basic-addon1">+992</span>
                        <input type="text" class="form-control" id="telephoneInput" name="telephone" data-phone-pattern="_________" placeholder="Номер телефона" aria-label="Номер телефона" aria-describedby="basic-addon1" inputmode="tel" required>

                    </div>
                    <button id="getCodeButton" class="btn btn-primary">Получить код</button>
                </form>
            </div>
            <div class="card-body" id="smsForm" style="display: none;">
                <form id="smsCodeForm" action="login.php" method="post">
                    <div>
                        <h2>Восстановить пароль</h2>
                    </div>
                    <div class="mb-3">
                        <label for="smsCodeInput" class="form-label">СМС код</label>
                        <input id="smsCodeInput" name="confirm_reset_sms_code" type="text" class="form-control" placeholder="СМС код" pattern="\d{6}" maxlength="6" inputmode="tel" required>

                    </div>
                    <button id="verifyButton" class="btn btn-primary">Войти</button>
                    <button id="resendCodeButton" class="btn btn-secondary">Отправить еще раз</button>
                </form>
            </div>
            <div class="card-body" id="passwordForm" style="display: none;">
                <form id="passwordResetForm" action="login.php" method="post">
                    <div>
                        <h2>Восстановить пароль</h2>
                    </div>
                    <div class="mb-3">
                        <label for="passwordInput" class="form-label">Новый пароль</label>
                        <input id="passwordInput" name="password" type="password" class="form-control" placeholder="Новый пароль"  minlength="6"  required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPasswordInput" class="form-label">Подтвердите пароль</label>
                        <input id="confirmPasswordInput" name="confirm_password" type="password" class="form-control" placeholder="Подтвердите пароль"  minlength="6"   required>
                    </div>
                    <button id="resetPasswordButton" class="btn btn-primary">Сбросить пароль</button>
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
            var passwordForm = $('#passwordForm');
            var getCodeButton = $('#getCodeButton');
            var verifyButton = $('#verifyButton');
            var resendCodeButton = $('#resendCodeButton');
            var resendCodeTimeout = null;

            getCodeButton.click(function(e) {
                e.preventDefault(); // Предотвращаем отправку формы

                var telInput = $('#telephoneInput');

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
                        url: 'https://api.parking.dc.tj/api/v1/sendSMS1',
                        method: 'POST',
                        cache: false,
                        data: {
                            telephone: '992' + telInput.val() // Добавляем префикс "992" к номеру телефона
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
                        url: 'https://api.parking.dc.tj/api/v1/confirmSMS',
                        method: 'POST',
                        cache: false,
                        data: {
                            telephone: '992' + $('#telephoneInput').val(),
                            confirm_reset_sms_code: smsCodeInput.val()
                        },
                        success: function(response, status, xhr) {
                            console.log('Успешный ответ от сервера', response);
                            console.log('Статус ответа:', xhr.status); // Проверка статуса ответа через xhr.status

                            if (xhr.status === 201) {
                                console.log('SMS-код верный');
                                phoneForm.hide();
                                smsForm.hide();
                                passwordForm.show();
                                $('#passwordInput').focus();
                            } else if (xhr.status === 200) {
                                console.log('SMS-код неверный');
                                alert('Неправильный SMS-код'); // Если SMS-код неправильный
                            } else {
                                console.log('Некорректный статус ответа');
                                alert('Некорректный статус ответа');
                            }
                        },
                        error: function(error) {
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
                    url: 'https://api.parking.dc.tj/api/v1/sendSMS1',
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

            $('#resetPasswordButton').click(function(e) {
                e.preventDefault(); // Предотвращаем отправку формы

                var passwordInput = $('#passwordInput');
                var confirmPasswordInput = $('#confirmPasswordInput');

                if (passwordInput.val() !== '' && passwordInput.val() === confirmPasswordInput.val()) {
                    // Отправляем данные на API
                    $.ajax({
                        url: 'https://api.parking.dc.tj/api/v1/ResetPassword',
                        method: 'POST',
                        cache: false,
                        data: {
                            telephone: '992' + $('#telephoneInput').val(),
                            password: passwordInput.val()
                        },
                        success: function(response) {
                            console.log('Пароль успешно сброшен', response);
                            alert('Пароль успешно сброшен');
                            window.location.href = 'login.php'; // Переход на страницу login.php после сброса пароля
                        },
                        error: function(error) {
                            console.error('Ошибка при сбросе пароля', error);
                            alert('Ошибка при сбросе пароля');
                        }
                    });
                } else {
                    console.log('Пароли не совпадают');
                    alert('Пароли не совпадают');
                }
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

    </script>
</body>
</html>
