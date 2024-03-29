<?php 
require '../connect.php';
session_start();
$userID = $_SESSION['id'];
$name = $_SESSION['name'];
$surname = $_SESSION['surname'];
$patronymic = $_SESSION['patronymic'];
$userpic = $_SESSION['userpic'];
$email = $_SESSION['email'];
$tel = $_SESSION['tel'];
$aboutme = $_SESSION['aboutme'];
$age = $_SESSION['age'];
$school = $_SESSION['school'];
$clas = $_SESSION['clas'];
$team = $_SESSION['team'];
$customer = $surname . ' ' . $name . ' ' . $patronymic;
$sql = 'SELECT * FROM orders';
$resultOrder = mysqli_query($link, $sql);
$sql = 'SELECT * FROM order_responses';
$resultResponses = mysqli_query($link, $sql);
$sql = 'SELECT * FROM teams';
$resultTest = mysqli_query($link, $sql);
$rowTest = mysqli_fetch_array($resultTest);
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
		.order {
			background-color: #eee;
		}
		.order img {
			width: 100px;
		}
		#orderDiv {
			display: none;
		}
		.bg-kid {
			background: #F8F4F4;
			border-radius: 10.935px;
			padding: 15px 30px;
		}
		.bg-kid p {
			margin: 0px;
		}
		a {
			text-decoration: none;
			color: #000;
		}
		a:hover {
			color: #FFC53A;
		}
		.nav img {
			max-width: 25%;
		}
	</style>
</head>
<body>
	<?php require 'header.php' ?>

	<div class="container">
		<div class="row align-items-center">
			<div class="col-2">
				<img src="../<?= $userpic; ?>">
			</div>
			<div class="col-10">
				<p>id: <?= $userID; ?> (Для добавления в команду)</p>
			</div>
		</div>
		<h1>Личная информация</h1>
		<div class="row">
			<div class="col-6">
				<div class="row">
					<div class="col-6">
						<p>Имя</p>
						<div class="bg-kid">
							<p><?= $name; ?></p>
						</div>
					</div>
					<div class="col-6">
						<p>Фамилия</p>
						<div class="bg-kid">
							<p><?= $surname; ?></p>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-6">
						<p>Email</p>
						<div class="bg-kid">
							<p><?= $email; ?></p>
						</div>
					</div>
					<div class="col-6">
						<p>Телефон</p>
						<div class="bg-kid">
							<p><?= $tel; ?></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<p>Учебное заведение</p>
						<div class="bg-kid">
							<p><?= $school; ?></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<p>Команда</p>
						<div class="bg-kid">
							<p><?= $team; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6">
				<p>Дополнительная информация</p>
				<div class="bg-kid">
					<p><?= $aboutme; ?></p>
				</div>
			</div>
		</div>
	</div>
	<?php require '../footer.php' ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>