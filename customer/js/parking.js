var map = L.map('map').setView([38.56295, 68.7966], 17);
L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var greenIcon = L.icon({
  iconUrl: 'icon/cp.svg',
  iconSize: [40, 40],
  popupAnchor: [0, -25]
});

var customIcon = L.icon({
  iconUrl: 'icon/YourPasition.svg',
  iconSize: [38, 38],
  iconAnchor: [19, 19],
  popupAnchor: [0, -19]
});

var markers = []; // массив для хранения маркеров

function createMarker(parking) {
  var marker = L.marker([parking.latitude, parking.longitude], { icon: greenIcon });

  var popupContent = `
    <div class="satpp">
      <p class="pop">${parking.parking}</p>
      <txt class="po2">${parking.address}</txt>
      <div class="cl-tt">
        <p class="opl"><i class="fa fa-credit-card" aria-hidden="true"></i>Стоимость в час</p>
        <p class="lpo">${parking.tarif}</p>
      </div>
      <div class="cl-tt">
        <p class="opl"><i class="fa fa-bolt" aria-hidden="true"></i>Зарядная станция</p>
        <p class="lpo">${parking.power}</p>
      </div>
      <div class="">Парковачных мест: ${parking.mest}</div>
    </div>
  `;

  marker.bindPopup(popupContent);

  marker.on('click', function(e) {
    var latlng = e.latlng;

    var flyOptions = {
      duration: 0.2,  // Длительность анимации в секундах
      easeLinearity: 1  // Коэффициент плавности анимации (значение от 0 до 1)
    };

    map.flyTo(latlng, 17, flyOptions);
    e.target.openPopup();
  });

  markers.push(marker); // добавляем маркер в массив

  return marker;
}

function createPolygon(parking) {
  var polygonPoints = [
    [parking.polygon1, parking.polygon2],
    [parking.polygon21, parking.polygon22]
  ];

  var polygon = L.polygon(polygonPoints, {
    fillColor: '#3388ff',
    fillOpacity: 0.3,
    color: '#3388ff',
    weight: 7
  });

  // Добавляем обработчик клика на полигон
  polygon.on('click', function() {
    var marker = this.options.marker; // получаем маркер, связанный с полигоном
    marker.openPopup(); // открываем попап маркера
  });

  return polygon;
}

function fetchParkingsData() {
  var id = Math.floor(Math.random() * 100) + 1; // Генерация случайного числа от 1 до 100
  var session_id = md5(Math.floor(Math.random() * 31000) + 1000); // Генерация случайного числа от 1000 до 32000
  var sign = md5('klsajhfLKSDJBhiuh2q3qn4daisuQWni'); // Генерация подписи с помощью md5

  var params = {
    id: id,
    sign: sign,
    session_id: session_id
  };

  var paramString = Object.keys(params).map(function(key) {
    return key + '=' + encodeURIComponent(params[key]);
  }).join('&');

  var apiUrl = 'http://10.10.11.67:8080/api/v1/getMarkerParking?' + paramString;

  fetch(apiUrl)
    .then(function(response) {
      if (!response.ok) {
        throw new Error('HTTP error, status = ' + response.status);
      }
      return response.json();
    })
    .then(function(data) {
      data.forEach(function(parking) {
        var marker = createMarker(parking);
        var polygon = createPolygon(parking);

        marker.addTo(map);
        polygon.addTo(map);

        // Связываем маркер с полигоном
        marker.options.polygon = polygon;
        polygon.options.marker = marker;
      });
    })
    .catch(function(error) {
      console.log('Ошибка получения данных с API:', error);
    });
}

map.locate({ setView: true, maxZoom: 17 });

function onLocationFound(e) {
  var radius = Math.round(Math.min(e.accuracy, 99));

  L.marker(e.latlng, { icon: customIcon })
    .bindPopup(`Вы находитесь в ${radius} метрах от этой точки`)
    .addTo(map)
    .openPopup();
}

function onLocationError(e) {
  if (e.code !== 1) {
    alert(e.message);
  }
}

map.on('locationfound', onLocationFound);
map.on('locationerror', onLocationError);

fetchParkingsData();
