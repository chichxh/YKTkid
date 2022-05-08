<?php 
require '../connect.php';
session_start();
$userID = $_SESSION['id'];
$name = $_SESSION['name'];
$surname = $_SESSION['surname'];
$patronymic = $_SESSION['patronymic'];
$userpic = $_SESSION['userpic'];
$customer = $surname . ' ' . $name . ' ' . $patronymic;
$Sname = $_SESSION['Sname'];
$Seductype = $_SESSION['Seductype'];
$Sdescription = $_SESSION['Sdescription'];
$Splace = $_SESSION['Splace'];
$Stypebill = $_SESSION['Stypebill'];
$Steacher = $_SESSION['Steacher'];
$Sdateofevent = $_SESSION['Sdateofevent'];
$Sphoto = $_SESSION['Sphoto'];
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../favicon.png" type="image/png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Jost&family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		a {
			text-decoration: none;
			color: #000;
		}
		a:hover {
			color: #FFC53A;
		}
		img {
			width: 100%;
		}
		.statusCircle {
			border-radius: 100%;
			width: 20px;
			height: 20px;
		}
		.col-1 {
			padding: 0px;
		}
		.nav img {
			max-width: 25%;
		}	
	</style>
</head>
<body>
	<?php require 'header.php' ?>
	<!-- здесь про мероприятия -->
	<div class="container mt-5">
		<div class="row">
			<a href="index.php">
				<svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M16.2217 15.6953L27.6738 27.1475" stroke="#000" stroke-width="3" stroke-linecap="round"/>
				<path d="M27.6738 15.6953L16.2217 27.1475" stroke="#000" stroke-width="3" stroke-linecap="round"/>
				<rect x="1.39648" y="0.871094" width="41.1031" height="41.1031" rx="9.5" stroke="#000"/>
				</svg>
			</a>
		</div>
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				<div class="row">
					<img src="../<?= $Sphoto ?>">
				</div>
				
				<p><?= $Sname ?></p>
			</div>
			<div class="col-1"></div>
		</div>
		<div class="row">
			<p><?= $Sdescription ?></p>
			<p>Учитель: <?= $Steacher ?></p>
			<p>Тип обучения: <?= $Seductype ?></p>
			<p>Дата провдения: <?= $Sdateofevent ?></p>
			<p>Место проведения: <?= $Splace ?></p>
			<p>Тип оплаты: <?= $Stypebill ?></p>
			<button class="btn btn-primary">Записаться на кружок</button>
		</div>
	</div>

	<?php require '../footer.php' ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>	