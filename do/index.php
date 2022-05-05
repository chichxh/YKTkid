<?php 
require '../connect.php';
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
	<p>страница ДО, ОО</p>

	<!-- добавить мероприятие -->
	<div class="continer">
		<div class="row">
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
	</div>

	<!-- добавить кружок -->
	<div class="continer">
		<div class="row">
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

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>