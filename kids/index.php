<?php 
require '../connect.php';
session_start();
$userID = $_SESSION['id'];
$name = $_SESSION['name'];
$surname = $_SESSION['surname'];
$patronymic = $_SESSION['patronymic'];
$userpic = $_SESSION['userpic'];
$email = $_SESSION['email'];
$age = $_SESSION['age'];
$school = $_SESSION['school'];
$clas = $_SESSION['clas'];
$customer = $surname . ' ' . $name . ' ' . $patronymic;
$sql = 'SELECT * FROM orders';
$resultOrder = mysqli_query($link, $sql);
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Jost&family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php require '../header.php' ?>
	<div class="container">
		<div class="row">
			<div class="col-2">
				<img src="../<?= $userpic; ?>">
			</div>
			<div class="col-10">
				<p>Привет, <?= $name; ?> <?= $surname; ?> <?= $patronymic; ?></p>
				<p>Почта: <?= $email; ?></p>
				<p>Школа: <?= $school; ?></p>
				<p>Класс: <?= $clas; ?></p>
				<p>Возраст: <?= $age; ?></p>
			</div>
		</div>

		<div class="row">
			<h1>Найти заказ</h1>
			<?php while ($row = mysqli_fetch_array($resultOrder)): ?>
				<div class="row order mb-3">
					<h3><?= $row['title']; ?></h3>
					<p><?= $row['category']; ?></p>
					<p><?= $row['fulldescription']; ?></p>
					<img src="<?= $row['photo']; ?>">
					<p><?= $row['deadline']; ?></p>
					<p><?= $row['budget']; ?></p>
					<p><?= $row['status']; ?></p>
					<p><?= $row['customer']; ?></p>
				</div>
			<?php endwhile; ?>
		</div>
		<div class="row">
			<h1>Оставить свой заказ</h1>
			<form action="../upload.php" method="post" enctype=multipart/form-data>
				<div class="mb-3">
				    <label class="form-label">Заголовок проекта</label>
				    <input type="text" class="form-control" name="title">
				</div>
				<div class="mb-3">
				    <label class="form-label">Категория проекта</label>
				    <select class="form-select" name="category">
					  	<option selected>Выберите категорию проекта</option>
					  	<option value="Разработка">Разработка</option>
					  	<option value="3D моделирование">3D моделирование</option>
					  	<option value="2D рисунок">2D рисунок</option>
					</select>
				</div>
				<div class="mb-3">
				    <label class="form-label">Полное описание проекта</label>
				    <input type="text" class="form-control" name="fulldescription">
				</div>
				<div class="mb-3">
				    <label class="form-label">Фото-материал</label>
				    <input type="file" class="form-control" name="photo">
				</div>
				<div class="mb-3">
				    <label class="form-label">Сроки</label>
				    <input type="text" class="form-control" name="deadline">
				</div>
				<div class="mb-3">
				    <label class="form-label">Бюджет</label>
				    <input type="text" class="form-control" name="budget">
				</div>
				<input type="hidden" class="form-control" name="customer" value="<?= $customer; ?>">
				<button type="submit" class="btn btn-primary" name="submitorderk">Оставить заказ</button>
			</form>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>