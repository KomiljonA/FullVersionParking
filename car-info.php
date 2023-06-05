<html>
<head>
	<title>Главная</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width">
	<link href="css/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container" id="container">
		<div class="form-container sign-in-container">
			<img src="images/logo.png" class="logo" alt="Logo">
			<div class="sign-up-container" style="display: contents;">
			
			<div class="signup-align">
				<form id="login-form" method="post">
				<div class="form-group">
					<label for="car-number">Номер машины:</label>
					<input type="text" id="car-number" name="car-number" required>
				</div>
				<div class="form-group">
					<label for="tech-passport">Серия техпаспорта:</label>
					<input type="text" id="tech-passport" name="tech-passport" required>
				</div>
				<button type="submit" id="login-btn">Войти</button>
			</form>
			</div>
		</div>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<object type="image/svg+xml" data="images/bac.svg" class="bac" alt="Background"></object>
					<h3 class="index ttt">Легкий поиск парковок и зарядных станций</h3>
					<p class="index fff">Найдите парковку и зарядную станцию, вы можете сразу заплатить за проведенное время. Так же можно оплатить штрафы.</p>
				</div>
			</div>
		</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="js/login.js"></script>
</body>
</html>
