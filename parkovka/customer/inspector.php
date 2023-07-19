<?php
$pageTitle = "Профиль";
require 'template/header.php';
?>

<body style="background: #fff;">
    <?php 
    $pageName = "Аккаунт";
    require 'template/main.php';
    ?>        

    <div class="container">
        <a href="#" onclick="history.back();" class="back-button">Назад</a>
        <div class="row">
            <div class="col-12 col-md-8 border-end border-2">
                <div class="inspector-content">
                    <h2>Добро пожаловать в Народный инспектор!</h2>
                    <p>Народный инспектор - это удобный инструмент, позволяющий гражданам фиксировать нарушения правил парковки и сообщать о них соответствующим органам.</p>
                    <p>Вы можете загружать фотографии нарушений, указывать номера ТС и выбирать типы правонарушений для дальнейшей отправки.</p>
                    <p>Используйте форму на правой стороне, чтобы зафиксировать нарушение ПДД и внести свой вклад в обеспечение безопасности и порядка на дорогах.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="inspector-actions">
                    <p class="text-uppercase">Зафиксировать нарушение</p>
                    <button id="showFormButton" class="btn btn-primary py-3 w-100 mb-1">Нарушение ПДД</button>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="myForm" method="post" action="#" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="file" accept="image/*" capture="camera" class="form-control" name="resp_content" id="resp_content" required>
                    <label for="resp_content">Обзорное фотоматериал (фото с камеры)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="meta_Plate_TX" placeholder="xxxxAA01" minlength="8" maxlength="8" required>
                    <label for="meta_Plate_TX">Вводите номер ТС</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="meta_Address_TX" placeholder="Введите адрес парковки" required>
                    <label for="meta_Address_TX">Адрес парковки</label>
                </div>
                <div class="form-floating mb-4">
                    <select class="form-select" name="shtraf" aria-label="Default select example">
                        <option value="1">Неправильное парковка</option>
                        <option value="2">Парковка в неположенном месте</option>
                        <option value="3">Номер ТС скрыт</option>
                    </select>
                    <label for="shtraf">Выберите нарушение</label>
                </div>
                <div class="d-grid mt-0">
                    <input type="submit" name="send" value="Отправить" class="btn btn-primary py-3 w-100 mb-1">
                </div>
                <div id="photoTime"></div> <!-- Элемент для отображения времени -->
            </form>
        </div>
    </div>

    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Форма успешно отправлена!</p>
        </div>
    </div>

    <script>
        const form = document.getElementById('myForm');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const url = form.getAttribute('action');
            const formData = new FormData(form);

            fetch(url, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    console.log('Форма успешно отправлена');
                    // Закрываем форму
                    var modal = document.getElementById("myModal");
                    modal.style.display = "none";
                    // Открываем модальное окно с сообщением
                    var successModal = document.getElementById("successModal");
                    successModal.style.display = "block";
                    // Сбрасываем форму
                    form.reset();
                } else {
                    console.error('Ошибка при отправке формы');
                    // Дополнительные действия в случае ошибки отправки формы
                }
            })
            .catch(error => {
                console.error('Произошла ошибка', error);
                // Дополнительные действия в случае общей ошибки
            });
        });

        document.getElementById("resp_content").addEventListener("change", function(event) {
            var fileInput = event.target;
            var file = fileInput.files[0];

            if (file) {
                var currentTime = new Date().toLocaleString(); // Получаем текущее время

                // Отображение времени под формой
                var photoTimeElement = document.getElementById("photoTime");
                photoTimeElement.innerHTML = "Время: " + currentTime;
            }
        });

        // Проверка на мобильное устройство
        if (!/Mobi|Android/i.test(navigator.userAgent)) {
            var inspectorActions = document.getElementsByClassName("inspector-actions")[0];
            inspectorActions.style.display = "none";
        }

        var modal = document.getElementById("myModal");
        var btn = document.getElementById("showFormButton");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == successModal) {
                successModal.style.display = "none";
            }
        }

        var successModal = document.getElementById("successModal");
        var successModalClose = successModal.getElementsByClassName("close")[0];

        successModalClose.onclick = function() {
            successModal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == successModal) {
                successModal.style.display = "none";
            }
        }
    </script>

    <!-- Добавляем Footer -->
    <?php require 'template/footer.php'?>
</body>

</html>
