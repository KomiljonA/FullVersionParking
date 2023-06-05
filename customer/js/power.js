var map = L.map('map').setView([38.56295, 68.7966], 17);

L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var greenIcon = L.icon({
  iconUrl: 'icon/power.svg',
  iconSize: [40, 40],
  popupAnchor: [0, -25]
});

for (var num = 0; num < parkings.length; num++) {
  var parking = parkings[num];
  var { latitude, longitude, parking: parking_name, address: parking_address, power: parking_power, mest: parking_mest, tarif: parking_tarif, powerst: parking_powerst } = parking;

  var marker = L.marker([latitude, longitude], { icon: greenIcon }).addTo(map);

  var popup_html = `
    <div class="satpp">
      <p class="pop">${parking_powerst}</p>
      <txt class="po2">${parking_address}</txt>
      <div class="cl-tt">
        <p class="opl"><i class="fa fa-credit-card" aria-hidden="true"></i>Стоимость в час</p>
        <p class="lpo">${parking_tarif}</p>
      </div>
      <div class="cl-tt">
        <p class="opl"><i class="fa fa-bolt" aria-hidden="true"></i></i>Зарядная станция</p>
        <p class="lpo">${parking_power}</p>
      </div>
      <div class="">Зарядних мест: ${parking_mest}</div>
    </div>`;

  marker.bindPopup(popup_html);

  marker.on('click', function(e) {
    var latlng = e.latlng;
    map.flyTo(latlng, 17);
    e.target.openPopup();
  });
}

var customIcon = L.icon({
  iconUrl: 'icon/YourPasition.svg',
  iconSize: [38, 38],
  iconAnchor: [19, 19],
  popupAnchor: [0, -19]
});

map.locate({ setView: true, maxZoom: 17 });

function onLocationFound(e) {
  var radius = Math.round(Math.min(e.accuracy, 99));

  L.marker(e.latlng, { icon: customIcon })
    .bindPopup(`Вы находитесь в ${radius} метрах от этой точки`)
    .addTo(map)
    .openPopup();
}

function onLocationError(e) {
  alert(e.message);
}

map.on('locationfound', onLocationFound);
map.on('locationerror', onLocationError);
