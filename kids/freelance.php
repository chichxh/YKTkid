<?php 
require '../connect.php';
session_start();
$idp = $_SESSION['idp'];
$namep = $_SESSION['namep'];
$surnamep = $_SESSION['surnamep'];
$patronymicp = $_SESSION['patronymicp'];
$userpicp = $_SESSION['userpicp'];
$emailp = $_SESSION['emailp'];
$customer = $surname . ' ' . $name . ' ' . $patronymic;
$sql = 'SELECT * FROM event';
$resultEvent = mysqli_query($link, $sql);
$sql = 'SELECT * FROM section';
$resultSection = mysqli_query($link, $sql);
$sql = 'SELECT * FROM orders';
$resultOrder = mysqli_query($link, $sql);
$sql = 'SELECT * FROM order_responses';
$resultResponses = mysqli_query($link, $sql);
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
</body>
	<?php require 'header.php' ?>
	<div class="container">
		<div class="row">
			<h1>Найти заказ</h1>
			<?php while ($row = mysqli_fetch_array($resultOrder)): ?>
				<div class="order mb-3">
					<h3><?= $row['title']; ?></h3>
					<p><?= $row['category']; ?></p>
					<p><?= $row['fulldescription']; ?></p>
					<img src="../<?= $row['photo']; ?>">
					<p><?= $row['deadline']; ?></p>
					<p><?= $row['budget']; ?></p>
					<p><?= $row['status']; ?></p>
					<p><?= $row['customer']; ?></p>
					<button class="btn btn-primary" onclick="openOrder()">Отозваться</button>

					<div id="orderDiv" class="mt-3">
						<button class="btn btn-primary" onclick="closeEverything()">Х</button>
						<form action="../upload.php" method="post">
							<div class="mb-3">
							    <label class="form-label">Распишите ваши умения и опыт, чтобы заказчик выбрал вас</label>
							    <input type="text" class="form-control" name="response">
							</div>
							<input type="hidden" class="form-control" name="order_id" value="<?= $row['id']; ?>">
							<input type="hidden" class="form-control" name="executor_id" value="<?= $userID ; ?>">
							<input type="hidden" class="form-control" name="executor" value="<?= $customer; ?>">
							<button type="submit" class="btn btn-primary" name="submitresponse">Отправить</button>
						</form>
						<h3>Другие отзывы</h3>
						<!-- <?php while ($rowresponse = mysqli_fetch_array($resultResponses)): ?>
							<?php if ($rowresponse['order_id'] == $row['id']): ?>
								<p><?= $rowresponse['response']; ?></p>
							<?php endif ?>
						<?php endwhile; ?> -->
					</div>
					<script type="text/javascript">
						let orderDiv = document.getElementById('orderDiv')
						function openOrder() {
							orderDiv.style.display = 'block'
						}
						function closeEverything() {
							orderDiv.style.display = "none"
						}
					</script>
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