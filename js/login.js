$(document).ready(function() {
  // Функция, которая будет вызываться при отправке формы
  $('#login-form').submit(function(e) {
    e.preventDefault(); // Отменяем стандартное поведение отправки формы

    // Получаем данные из формы
    var carNumber = $('#car-number').val();
    var techPassport = $('#tech-passport').val();

    // Создаем объект с данными, которые будут отправлены на сервер
    var data = {
      carNumber: carNumber,
      techPassport: techPassport
    };

    // Отправляем данные на сервер с помощью AJAX запроса
    $.ajax({
      type: 'POST', // Отправляем данные методом POST
      url: 'car-info.php', // URL на который отправляем данные
      data: data, // Данные, которые отправляем
      success: function(response) { // Функция, которая будет вызвана при успешном выполнении запроса
        // Если сервер вернул ответ "success", то перенаправляем пользователя на страницу с информацией о машине
        if (response == 'success') {
          window.location.href = 'car-details.php';
        } else { // Иначе выводим сообщение об ошибке
          alert('Ошибка! Неверный номер машины или серия тех паспорта.');
        }
      },
      error: function() { // Функция, которая будет вызвана при ошибке выполнения запроса
        alert('Ошибка! Не удалось отправить данные на сервер.');
      }
    });
  });
});
