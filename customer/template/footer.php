<div id="footer" class="fixed-bottom">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <button class="cl-but navbar-toggler mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Переключатель навигации">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="justify-content: center;">
        <ul class="navbar-nav align-items-center" style="border-radius: 12px; color: white; padding: 5px 16px; background: #0a66e6; box-shadow: 0px 4px 12px rgb(0 0 0 / 12%);">
          <li class="nav-item">
            <a <?php if (basename($_SERVER['PHP_SELF']) == '/index.php') echo 'class="active-nav"'; ?> href="/index.php">Parking</a>
          </li>
          <li class="nav-item">
            <a <?php if (basename($_SERVER['PHP_SELF']) == '/power.php') echo 'class="active-nav"'; ?> href="/power.php">Power</a>
          </li>
          <li class="nav-item">
            <a <?php if (basename($_SERVER['PHP_SELF']) == '/about.php') echo 'class="active-nav"'; ?> href="/about.php">О проекте</a>
          </li>
          <li class="nav-item">
            <a <?php if (basename($_SERVER['PHP_SELF']) == '/new.php') echo 'class="active-nav"'; ?> href="/new.php">Новости</a>
          </li>
          <li class="nav-item">
            <a <?php if (basename($_SERVER['PHP_SELF']) == '/rates.php') echo 'class="active-nav"'; ?> href="/rates.php">Тарифы</a>
          </li>
          <li class="nav-item">
            <a <?php if (basename($_SERVER['PHP_SELF']) == '/rules-and-penalties.php') echo 'class="active-nav"'; ?> href="/rules-and-penalties.php">Правила и штрафы</a>
          </li>
          <li class="nav-item">
            <a <?php if (basename($_SERVER['PHP_SELF']) == '/question-and-answer.php') echo 'class="active-nav"'; ?> href="/question-and-answer.php">Вопрос - ответ</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

    <!--Плагины для карты-->
    <script src="map-set/leaflet.js"></script>
    <script src="map-set/leaflet-src.esm.js"></script>
    <script src="map-set/leaflet-src.esm.js.map"></script>
    <script src="map-set/leaflet-src.js"></script>
    <script src="map-set/leaflet-src.js.map"></script>
    <script src="map-set/leaflet.js.map"></script>
    <script src="map-set/"></script>
    <!--Плагины-->
    <script src='js/jquery.js'></script>
    <!--Скрипты-->
	<script src="json/ia-parkings.json"></script>

    <script src="js/script.js"></script>
    <!--Динамические влкдаки-->
    <script type="text/javascript" src="js/pill.js"></script>
    <script src="js/add-car-number.js"></script>
    <script src="js/add-card.js"></script>
    <!--Бутсрап 5-->
    <script src="/parkovka/js/bootstrap/bootstrap.bundle.min.js"></script>






