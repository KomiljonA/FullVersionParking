<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width">
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <img src="images/logo.png" class="logo" alt="Logo">
            <form action="#" id="loginForm">
                <h1><!--Войти-->Скоро будет доступно!</h1>
                <span>Парковки и зарядные станции Душанбе</span>
                <input name="phone" data-phone-pattern placeholder="Номер телефона" inputmode="tel"/>
                <input type="text" name="smsCode" id="smsCodeInput" placeholder="СМС код" style="display: none;">
                <button type="submit" class="btn btn-info" style="width: 100%;background: #0a66e6;border-radius: 8px;height: 34px;display: flex;justify-content: center;align-items: center;color: white;">Войти</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <object type="image/svg+xml" data="images/bac.svg" class="bac" alt="Background"></object>
                    <h3 class="index ttt">Легкий поиск парковок и зарядных станций</h3>
                    <p class="index fff">Найдите парковку и зарядную станцию. Вы можете сразу заплатить за парковочное время. Так же можно оплатить штрафы.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(e) {
                e.preventDefault(); // Предотвращаем отправку формы

                var telInput = $('[name="phone"]');
                var smsCodeInput = $('#smsCodeInput');

                if (telInput.val() !== '') {
                    telInput.prop('readonly', true); // Заблокировать редактирование поля номера телефона
                    telInput.attr('disabled', 'disabled'); // Добавить атрибут disabled, чтобы поле было нередактируемым

                    smsCodeInput.show(); // Показываем поле для ввода смс кода
                    smsCodeInput.focus(); // Устанавливаем фокус на поле для ввода смс кода
                } else {
                    smsCodeInput.hide(); // Скрываем поле для ввода смс кода, если номер телефона не заполнен
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var eventCalllback = function(e) {
                var el = e.target,
                    clearVal = el.dataset.phoneClear,
                    pattern = el.dataset.phonePattern,
                    matrix_def = "+992(___) __-__-__",
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
                });
            }
            var phone_inputs = document.querySelectorAll('[data-phone-pattern]');
            for (let elem of phone_inputs) {
                for (let ev of ['input', 'blur', 'focus']) {
                    elem.addEventListener(ev, eventCalllback);
                }
            }
        });
    </script>
</body>
</html>
