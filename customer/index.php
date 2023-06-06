<?php
$pageTitle = "Главная";
require'template/header.php';
?>
<body>
        <div id="map">
        </div>
    <!--Добавляем верзнее меню-->
    <?php 
    $pageName = "CityParking";
    require 'template/main.php';
    ?>  
    
<?php require 'template/footer.php'?>
    <!--Координаты для Parking-->
    <script src="js/parking.js"></script>

	
	<!-- Our data sources -->

</body>
</html>
