<?php 
require '../connect.php';
session_start();
$id = $_SESSION['idDO'];
$login = $_SESSION['loginDO'];
$fullname = $_SESSION['fullname'];
$typeDO = $_SESSION['typeDO'];
$placeDO = $_SESSION['placeDO'];
$contactDO = $_SESSION['contactDO'];
$directorDO = $_SESSION['directorDO'];
$siteDO = $_SESSION['siteDO'];
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
		.bg-kid {
			background: #F8F4F4;
			border-radius: 10.935px;
			padding: 15px 30px;
		}
		.bg-kid p {
			margin: 0px;
		}
	</style>
</head>
<body>
	<?php require 'header.php' ?>

	<div class="container mt-5">
		<div class="row">
			<div class="col-6">
				<p>Полное наименование учреждения</p>
				<div class="bg-kid">
					<p><?= $fullname ?></p>
				</div>
			</div>
			<div class="col-6">
				<p>Тип учреждения</p>
				<div class="bg-kid">
					<p><?= $typeDO ?></p>
				</div>
			</div>
			<div class="col-6">
				<p>Местоположение</p>
				<div class="bg-kid">
					<p><?= $placeDO ?></p>
				</div>
			</div>
			<div class="col-6">
				<p>Сайт</p>
				<div class="bg-kid">
					<a href="https://<?= $siteDO ?>"><?= $siteDO ?></a>
				</div>
			</div>
			<div class="col-6">
				<p>Контакты</p>
				<div class="bg-kid">
					<p><?= $contactDO ?></p>
				</div>
			</div>
			<div class="col-6">
				<p>Директор</p>
				<div class="bg-kid">
					<p><?= $directorDO ?></p>
				</div>
			</div>
			
			
			
		</div>
		<div class="row mb-5 mt-5">
			<h1>Добавить мероприятие</h1>
			<form action="../upload.php" method="post" enctype=multipart/form-data>
				<div class="mb-3">
				    <label class="form-label">Название</label>
				    <input type="text" class="form-control" name="name">
				</div>
				<div class="mb-3">
				    <label class="form-label">Описание</label>
				    <input type="text" class="form-control" name="description">
				</div>
				<div class="mb-3">
				    <label class="form-label">Место проведения</label>
				    <input type="text" class="form-control" name="place">
				</div>
				<div class="mb-3">
				    <label class="form-label">Тип оплаты</label>
				    <input type="text" class="form-control" name="typebill">
				</div>
				<div class="mb-3">
				    <label class="form-label">Организатор</label>
				    <input type="text" class="form-control" name="organizer">
				</div>
				<div class="mb-3">
				    <label class="form-label">Дата проведения</label>
				    <input type="text" class="form-control" name="dateofevent">
				</div>
				<div class="mb-3">
					<label class="form-label">Фото</label>
					<input type="file" class="form-control" name="photo" multiple>
				</div>
				<button type="submit" class="btn btn-primary" name="addEvent">Добавить мероприятие</button>
			</form>
		</div>

	<!-- добавить кружок -->
		<div class="row mb-5">
			<h1>Добавить кружок</h1>
			<form action="../upload.php" method="post" enctype=multipart/form-data>
				<div class="mb-3">
				    <label class="form-label">Название</label>
				    <input type="text" class="form-control" name="name">
				</div>
				<div class="mb-3">
				    <label class="form-label">Тип кружка</label>
				    <select class="form-select" name="eductype">
						<option selected>Выберите один из типов</option>
						<option value="Спорт">Спорт</option>
						<option value="Образование">Образование</option>
						<option value="Искусство">Искусство</option>
					</select>
				</div>
				<div class="mb-3">
				    <label class="form-label">Описание</label>
				    <input type="text" class="form-control" name="description">
				</div>
				<div class="mb-3">
				    <label class="form-label">Место проведения</label>
				    <input type="text" class="form-control" name="place">
				</div>
				<div class="mb-3">
				    <label class="form-label">Тип оплаты</label>
				    <input type="text" class="form-control" name="typebill">
				</div>
				<div class="mb-3">
				    <label class="form-label">Руководитель</label>
				    <input type="text" class="form-control" name="teacher">
				</div>
				<div class="mb-3">
				    <label class="form-label">Дата проведения</label>
				    <input type="text" class="form-control" name="dateofevent">
				</div>
				<div class="mb-3">
					<label class="form-label">Фото</label>
					<input type="file" class="form-control" name="photo" multiple>
				</div>
				<button type="submit" class="btn btn-primary" name="addSection">Добавить кружок</button>
			</form>
		</div>

		<!-- добавление лекций -->
		<div class="row mb-5">
			<h1>Добавить лекцию</h1>
			<form action="../upload.php" method="post" enctype=multipart/form-data>
				<div class="mb-3">
				    <label class="form-label">Название лекции</label>
				    <input type="text" class="form-control" name="name">
				</div>
				<div class="mb-3">
				    <label class="form-label">Краткое описание</label>
				    <input type="text" class="form-control" name="shortdescription">
				</div>
				<div class="mb-3">
				    <label class="form-label">Полное описание</label>
				    <input type="text" class="form-control" name="fulldescription">
				</div>
				<div class="mb-3">
				    <label class="form-label">Видео-материал</label>
				    <input type="file" class="form-control" name="video" multiple>
				</div>
				<button type="submit" class="btn btn-primary" name="addLecture">Добавить кружок</button>
			</form>
		</div>
	</div>
	<?php require '../footer.php' ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>