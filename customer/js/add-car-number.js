// Получаем элементы DOM
var addCarBtn = document.getElementById("add-car-btn");
var addCarModal = document.getElementById("add-car-modal");
var carForm = document.getElementById("car-form");
var carList = document.getElementById("car-list");

// Показываем модальное окно при клике на кнопку
addCarBtn.onclick = function() {
  addCarModal.style.display = "block";
}

// Скрываем модальное окно при клике на кнопку закрытия
var closeBtn = addCarModal.getElementsByClassName("close")[0];
closeBtn.onclick = function() {
  addCarModal.style.display = "none";
}

// Восстановление информации о машинах при загрузке страницы
window.onload = function() {
  var savedCars = getSavedCarsFromLocalStorage();
  if (savedCars) {
    savedCars.forEach(function(carData) {
      createCarItem(carData);
    });
  }
}

// Функция для проверки, добавлена ли уже машина с указанным номером
function checkCarExists(number) {
  var savedCars = getSavedCarsFromLocalStorage();
  var carExists = savedCars.some(function(carData) {
    return carData.number === number;
  });
  return carExists;
}

// Функция для создания элементов DOM и добавления их в список
function createCarItem(carData) {
  var carItem = document.createElement("div");
  var carNumber = document.createElement("span");
  var carPhoto = document.createElement("img");
  var deleteBtn = document.createElement("button");

  carNumber.textContent = carData.number;
  carPhoto.src = carData.photo;
  carPhoto.alt = carData.number;
  carPhoto.width = 40;
  carPhoto.padding = 10;
  deleteBtn.textContent = "Удалить";

  carItem.classList.add("car-item");
  carPhoto.classList.add("car-photo");
  deleteBtn.classList.add("delete-btn");
  deleteBtn.onclick = function() {
    carItem.remove();
    removeCarFromLocalStorage(carData.number);
  }

  carItem.appendChild(carPhoto);
  carItem.appendChild(carNumber);
  carItem.appendChild(deleteBtn);
  carList.appendChild(carItem);
}

// Функция для сохранения информации о машине в локальное хранилище
function saveCarToLocalStorage(carData) {
  var savedCars = getSavedCarsFromLocalStorage();
  savedCars.push(carData);
  localStorage.setItem('cars', JSON.stringify(savedCars));

  
}

// Функция для удаления информации о машине из локального хранилища
function removeCarFromLocalStorage(number) {
  var savedCars = getSavedCarsFromLocalStorage();
  var updatedCars = savedCars.filter(function(carData) {
    return carData.number !== number;
  });
  localStorage.setItem('cars', JSON.stringify(updatedCars));
}

// Функция для получения сохраненных данных о машинах из локального хранилища
function getSavedCarsFromLocalStorage() {
  var savedCars = localStorage.getItem('cars');
  return savedCars ? JSON.parse(savedCars) : [];
}

// Добавляем машину в список при отправке формы
carForm.onsubmit = function(event) {
  event.preventDefault(); // предотвращаем отправку формы
  var number = document.getElementById("car-number").value;
  var passport = document.getElementById("passport").value;
  var photo = document.getElementById("photo").value;
  var defaultPhoto = 'images/add.svg'; // путь к фотографии по умолчанию

  if (!number) {
    alert("Пожалуйста, введите номер машины");
    return;
  }

  // Проверяем, не добавлена ли уже машина с таким номером
  var carExists = checkCarExists(number);
  if (carExists) {
    alert("Машина с таким номером уже добавлена");
    return;
  }

  // Создаем элементы DOM для новой машины
  var carItem = document.createElement("div");
  var carNumber = document.createElement("span");
  var carPhoto = document.createElement("img");
  var deleteBtn = document.createElement("button");

  // Устанавливаем атрибуты и содержимое элементов
  carNumber.textContent = number;

  if (photo) {
    carPhoto.src = URL.createObjectURL(photo);
  } else {
    carPhoto.src = defaultPhoto;
  }

  carPhoto.alt = number;
  carPhoto.width = 40;
  carPhoto.padding = 10;
  deleteBtn.textContent = "Удалить";

  // Добавляем классы и обработчик события кнопке удаления
  carItem.classList.add("car-item");
  carPhoto.classList.add("car-photo");
  deleteBtn.classList.add("delete-btn");
  deleteBtn.onclick = function() {
    carItem.remove();
    removeCarFromLocalStorage(number);
  }

  // Добавляем элементы в DOM
  carItem.appendChild(carPhoto);
  carItem.appendChild(carNumber);
  carItem.appendChild(deleteBtn);
  carList.appendChild(carItem);

  // Сохраняем информацию о машине в локальное хранилище
  var carData = {
    number: number,
    passport: passport,
    photo: photo || defaultPhoto
  };
  saveCarToLocalStorage(carData);

  // Скрываем модальное окно
  addCarModal.style.display = "none";
  
  // Страница Ожидание
  const session_id3 = '8954b3eebb94b46ddf1c1a09c48e9e67'; // Задайте фиксированное значение session_id
  const sign3 = '16cc778952c9d7ac18efbc11bac61903'; // Задайте фиксированное значение sign
  
      const params3 = new URLSearchParams({
          meta_Plate_TX: number,
          sign: sign3,
          session_id: session_id3
      });
  
      const url3 = `https://api.parking.dc.tj/api/v1/getHistoryException?${params3}`;
  // Находим элемент загрузки
var loadingSpinner = document.getElementById("loading-spinner");
// Показываем элемент загрузки
loadingSpinner.style.display = "block";
      fetch(url3)
          .then(function (response) {
              return response.json();
          })
          .then(function (data) {
            // Скрываем элемент загрузки
            loadingSpinner.style.display = "none";
              var clOsElement3 = document.querySelector('#my-cl-os3');
              if (data.length === 0) {
                  var noHistoryText3 = document.createElement('p');
                  noHistoryText3.innerHTML = 'Нет операции';
                  clOsElement3.appendChild(noHistoryText3);
              } else {
                  data.forEach(function (item, key) {
                      var historyElement3 = createHistoryElement3(item, key);
                      clOsElement3.appendChild(historyElement3);
                  });
              }
          })
          .catch(function (error) {
            console.log(error);
            // Скрываем элемент загрузки в случае ошибки
            loadingSpinner.style.display = "none";
        });
  
      function createHistoryElement3(item, key) {
          var historyElement3 = document.createElement('div');
          historyElement3.classList.add('sat-1');
  
          historyElement3.innerHTML = `
              <p>Оплата за парковку <br><txt class="2en">${item.address}</txt></p>
              <div class="cl-tt">
                  <p class="opl">
                      <i class="fa fa-credit-card" aria-hidden="true"></i>
                      К оплате
                  </p>
                  <p class="lpo">${item.park_hour * 3} сом</p>
              </div>
              <div class="cl-tt">
                  <p class="opl">
                      <i class="fa fa-car" aria-hidden="true"></i>
                      Машина
                  </p>
                  <p class="lpo">${item.meta_Plate_TX}</p>
              </div>
              <div class="but22">
                  <button class="open-popup" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions${key}-parking" aria-controls="offcanvasWithBothOptions${key}-parking">Подробнее</button>
                  <button>Оплатить</button>
              </div>
              <p class="plo">${item.first_meta_Time.slice(0, -4)}</p>
          `;
  
          var offcanvasElement3 = document.createElement('div');
          offcanvasElement3.classList.add('offcanvas', 'offcanvas-start');
          offcanvasElement3.setAttribute('data-bs-scroll', 'true');
          offcanvasElement3.setAttribute('tabindex', '-1');
          offcanvasElement3.setAttribute('id', `offcanvasWithBothOptions${key}-parking`);
          offcanvasElement3.setAttribute('aria-labelledby', `offcanvasWithBothOptionsLabel${key}-parking`);
  
          var offcanvasHeader3 = document.createElement('div');
          offcanvasHeader3.classList.add('offcanvas-header');
  
          offcanvasHeader3.innerHTML = `
              <h5 class="offcanvas-title">Парковка</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          `;
  
          var offcanvasBody3 = document.createElement('div');
          offcanvasBody3.classList.add('offcanvas-body');
  
          offcanvasBody3.innerHTML = `
              <p>Оплата за парковку <br><txt class="2en">${item.address}</txt></p>
              <div class="cl-tte">
                  <p class="opl">
                      <i class="fa fa-credit-card" aria-hidden="true"></i>
                      К оплате
                  </p>
                  <p class="lpo">${item.park_hour * 3} сом</p>
              </div>
              <div class="cl-tte">
                  <p class="opl">
                      <i class="fa fa-car" aria-hidden="true"></i>
                      Машина
                  </p>
                  <p class="lpo">${item.meta_Plate_TX}</p>
              </div>
              <div class="but22">
                  <button style="width: 100%; margin-top: 1em;">Оплатить</button>
              </div>
              <p class="plo"><strong>От: </strong>${item.first_meta_Time.slice(0, -4)}</p>
              <p class="plo"><strong>До: </strong>${item.last_meta_Time.slice(0, -4)}</p>
              <p class="plo"><strong>Время прибывания (час): </strong>${item.park_hour}</p>
          `;
  
          offcanvasElement3.appendChild(offcanvasHeader3);
          offcanvasElement3.appendChild(offcanvasBody3);
          historyElement3.appendChild(offcanvasElement3);
  
          return historyElement3;
      }
      // Страница Штрафы
      const session_id2 = '8954b3eebb94b46ddf1c1a09c48e9e67'; // Задайте фиксированное значение session_id
      const sign2 = '16cc778952c9d7ac18efbc11bac61903'; // Задайте фиксированное значение sign
  
      const params2 = new URLSearchParams({
          meta_Plate_TX: number,
          sign: sign2,
          session_id: session_id2
      });
  
      const url2 = `https://api.parking.dc.tj/api/v1/getHistoryFine?${params2}`;
  // Находим элемент загрузки
var loadingSpinner2 = document.getElementById("loading-spinner2");
// Показываем элемент загрузки
loadingSpinner2.style.display = "block";
      fetch(url2)
          .then(function (response) {
              return response.json();
          })
          .then(function (data) {
            // Скрываем элемент загрузки
            loadingSpinner2.style.display = "none";
              var clOsElement2 = document.querySelector('#my-cl-os2');
              if (data.length === 0) {
                  var noHistoryText2 = document.createElement('p');
                  noHistoryText2.innerHTML = 'Нет операции';
                  clOsElement2.appendChild(noHistoryText2);
              } else {
                  data.forEach(function (item, key) {
                      var historyElement2 = createHistoryElement2(item, key);
                      clOsElement2.appendChild(historyElement2);
                  });
              }
          })
          .catch(function (error) {
            console.log(error);
            // Скрываем элемент загрузки в случае ошибки
            loadingSpinner2.style.display = "none";
        });
  
      function createHistoryElement2(item, key) {
          var historyElement2 = document.createElement('div');
          historyElement2.classList.add('sat-1');
  
          historyElement2.innerHTML = `
              <p><!--Потом-->Не оплата<br><txt class="2en">${item.address}</txt></p>
              <div class="cl-tt">
                  <p class="opl"><i class="fa fa-credit-card" aria-hidden="true"></i>К оплате</p>
                  <p class="lpo">${item.park_hour * 3} сом</p>
              </div>
              <div class="cl-tt">
                  <p class="opl"><i class="fa fa-car" aria-hidden="true"></i>Машина</p>
                  <p class="lpo">${item.meta_Plate_TX}</p>
              </div>
              <div class="but22">
                  <button class="open-popup" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions${key}-shtraf" aria-controls="offcanvasWithBothOptions${key}-shtraf">Подробнее</button>
                  <button>Оплатить</button>
              </div>
              <p class="plo">${item.first_meta_Time.slice(0, -4)}</p>
          `;
  
          var offcanvasElement2 = document.createElement('div');
          offcanvasElement2.classList.add('offcanvas', 'offcanvas-start');
          offcanvasElement2.setAttribute('data-bs-scroll', 'true');
          offcanvasElement2.setAttribute('tabindex', '-1');
          offcanvasElement2.setAttribute('id', `offcanvasWithBothOptions${key}-shtraf`);
          offcanvasElement2.setAttribute('aria-labelledby', `offcanvasWithBothOptionsLabel${key}-shtraf`);
  
          var offcanvasHeader2 = document.createElement('div');
          offcanvasHeader2.classList.add('offcanvas-header');
  
          offcanvasHeader2.innerHTML = `
              <h5 class="offcanvas-title">Штраф</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          `;
  
          var offcanvasBody2 = document.createElement('div');
          offcanvasBody2.classList.add('offcanvas-body');
  
          offcanvasBody2.innerHTML = `
              <p><!--Потом-->Не оплата<br><txt class="2en">${item.address}</txt></p>
              <div class="cl-tte">
                  <p class="opl"><i class="fa fa-credit-card" aria-hidden="true"></i>К оплате</p>
                  <p class="lpo">${item.park_hour * 3} сом</p>
              </div>
              <div class="cl-tte">
                  <p class="opl"><i class="fa fa-car" aria-hidden="true"></i>Машина</p>
                  <p class="lpo">${item.meta_Plate_TX}</p>
              </div>
              <div class="but22">
                  <button style="width: 100%; margin-top: 1em;">Оплатить</button>
              </div>
              <p class="plo">${item.first_meta_Time.slice(0, -4)}</p>
          `;
  
          offcanvasElement2.appendChild(offcanvasHeader2);
          offcanvasElement2.appendChild(offcanvasBody2);
          historyElement2.appendChild(offcanvasElement2);
  
          return historyElement2;
      }
      // Страница Итсория
      const session_id = '8954b3eebb94b46ddf1c1a09c48e9e67'; // Задайте фиксированное значение session_id
      const sign = '16cc778952c9d7ac18efbc11bac61903'; // Задайте фиксированное значение sign
  
      const params = new URLSearchParams({
          meta_Plate_TX: number,
          sign: sign,
          session_id: session_id
      });
  
      const url = `https://api.parking.dc.tj/api/v1/getHistoryPaid?${params}`;
  // Находим элемент загрузки
var loadingSpinner3 = document.getElementById("loading-spinner3");
// Показываем элемент загрузки
loadingSpinner3.style.display = "block";
      fetch(url)
          .then(function (response) {
              return response.json();
          })
          .then(function (data) {
            // Скрываем элемент загрузки
            loadingSpinner3.style.display = "none";
              var clOsElement = document.querySelector('#my-cl-os');
              if (data.length === 0) {
                  var noHistoryText = document.createElement('p');
                  noHistoryText.innerHTML = 'Нет операции';
                  clOsElement.appendChild(noHistoryText);
              } else {
                  data.forEach(function (item) {
                      var historyElement = createHistoryElement(item);
                      clOsElement.appendChild(historyElement);
                  });
              }
          })
          .catch(function (error) {
              console.log(error);
          });
  
      function createHistoryElement(item) {
          var historyElement = document.createElement('div');
          historyElement.classList.add('sat-1');
  
          historyElement.innerHTML = `
              <p><!--Потом--> Оплата<br><txt class="2en">${item.address}</txt></p>
              <div class="cl-tt">
                  <p class="opl"><i class="fa fa-credit-card" aria-hidden="true"></i>Оплаченно</p>
                  <p class="lpo">${item.park_hour * 3} сом</p>
              </div>
              <div class="cl-tt">
                  <p class="opl"><i class="fa fa-car" aria-hidden="true"></i>Машина</p>
                  <p class="lpo">${item.meta_Plate_TX}</p>
              </div>
              <p class="plo"><strong>От: </strong>${item.first_meta_Time.slice(0, -4)} <strong> До: </strong>${item.last_meta_Time.slice(0, -4)}</p>
              <p class="plo"><strong>Время прибывания(час): </strong>${item.park_hour}</p>
          `;
  
          return historyElement;
      }

  // Сбрасываем значения формы
  carForm.reset();
}








