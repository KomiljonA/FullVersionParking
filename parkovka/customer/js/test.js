<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user-registration";

// Создание соединения
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверка соединения
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
?>


/* Исходная точка */
var map = L.map('map').setView([38.56295, 68.7966], 17);
L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
var greenIcon = L.icon({
    iconUrl: 'icon/cp.svg',
    iconSize: [40, 40],
    popupAnchor: [0, -25]
});


// Получаем данные из базы данных
fetch('/user-registration/parking_zones')
  .then(response => response.json())
  .then(data => {
   // Проходимся по данным в цикле
    data.forEach(item => {
      const latlng = [item.latitude, item.longitude];

      // Создаем содержимое всплывающего окна
      const popupContent = `<div class="satpp">
        <p class="pop">Парковачная зона №${item.number}</p>
        <txt class="po2">${item.address}</txt>
        <div class="cl-tt"><p class="opl"><i class="fa fa-credit-card" aria-hidden="true"></i>Стоимость в час</p><p class="lpo">${item.price} сом</p></div>
        <div class="cl-tt"><p class="opl"><i class="fa fa-bolt" aria-hidden="true"></i></i>Зарядная станция</p><p class="lpo">${item.charging ? 'Есть' : 'Нет'}</p></div>
        <div class="">Парковочных мест: ${item.spaces}</div>
      </div>`;

      // Создаем маркер
      const marker = L.marker(latlng, { icon: greenIcon })
        .bindPopup(popupContent)
        .addTo(map)
        .on('click', function (e) {
          map.setView(e.target.getLatLng(), 18); // переместить карту на место клика
          e.target.openPopup(); // открыть попап
        });

      // Создаем полигон
      const polygon = L.polygon(item.coordinates, {
        fillColor: '#3388ff',
        fillOpacity: 0.3,
        color: '#3388ff',
        weight: 7
      }).bindPopup(popupContent);

      // Добавляем маркер и полигон в группу
      L.layerGroup([marker, polygon]).addTo(map);
    });
  });

/* Добавляем поиск по местонахождению */
// Создаем объект иконки
var customIcon = L.icon({
    iconUrl: 'icon/YourPasition.svg',
    iconSize: [38, 38],
    iconAnchor: [19, 19],
    popupAnchor: [0, -19]
});
// Локализация
map.locate({ setView: true, maxZoom: 17 });
function onLocationFound(e) {
    var radius = e.accuracy;
    radius = Math.min(radius, 99); // ограничиваем радиус до 99 метров
    radius = Math.round(radius); // округляем радиус до ближайшего целого числа

    // Используем созданную иконку
    L.marker(e.latlng, { icon: customIcon }).addTo(map)
        .bindPopup("Вы находитесь в " + radius + " метрах от этой точки").openPopup();
}
function onLocationError(e) {
    alert(e.message);
}
map.on('locationfound', onLocationFound);
map.on('locationerror', onLocationError);