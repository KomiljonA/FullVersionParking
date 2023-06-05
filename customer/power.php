<?php
$pageTitle = "CityPower";
require'template/header.php';
?>
<body>
        <div id="map">
        </div>
    <!--Добавляем верзнее меню-->
    <?php 
    $pageName = "CityPower";
    require 'template/main.php';
    ?>  
    <!--Добавляем Footer-->
    <?php require 'template/footer.php'?>
    <!--Координаты для Parking-->
    <script src="js/power.js"></script>

</body>
</html>
