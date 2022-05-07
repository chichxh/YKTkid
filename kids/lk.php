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
	</style>
</head>
<body>
	<?php require '../header.php' ?>

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


	<div class="container">
		<div class="row">
			<h1>Создать команду</h1>
			<p>максимум 10 участников(не надо заполнять лишние строки, оставьте их пустыми, не пишите никаких - . ' ' и тп)</p>
			<form action="../upload.php" method="post">
				<div class="mb-3">
				    <label class="form-label">Название команды</label>
				    <input type="text" class="form-control" name="teamname">
				</div>
				<div class="mb-3">
				    <label class="form-label">Ваш id</label>
				    <input type="text" class="form-control" name="member_one" value="<?= $userID; ?>">
				</div>
				<div class="mb-3">
				    <label class="form-label">2. id участника (в личном кабинете пользователя)</label>
				    <input type="text" class="form-control" name="member_two">
				</div>
				<div class="mb-3">
				    <label class="form-label">3. id участника (в личном кабинете пользователя)</label>
				    <input type="text" class="form-control" name="member_three">
				</div>
				<div class="mb-3">
				    <label class="form-label">4. id участника (в личном кабинете пользователя)</label>
				    <input type="text" class="form-control" name="member_four">
				</div>
				<div class="mb-3">
				    <label class="form-label">5. id участника (в личном кабинете пользователя)</label>
				    <input type="text" class="form-control" name="member_foive">
				</div>
				<div class="mb-3">
				    <label class="form-label">6. id участника (в личном кабинете пользователя)</label>
				    <input type="text" class="form-control" name="member_six">
				</div>
				<div class="mb-3">
				    <label class="form-label">7. id участника (в личном кабинете пользователя)</label>
				    <input type="text" class="form-control" name="member_seven">
				</div>
				<div class="mb-3">
				    <label class="form-label">8. id участника (в личном кабинете пользователя)</label>
				    <input type="text" class="form-control" name="member_eight">
				</div>
				<div class="mb-3">
				    <label class="form-label">9. id участника (в личном кабинете пользователя)</label>
				    <input type="text" class="form-control" name="member_nine">
				</div>
				<div class="mb-3">
				    <label class="form-label">10. id участника (в личном кабинете пользователя)</label>
				    <input type="text" class="form-control" name="member_ten">
				</div>
				<input type="hidden" class="form-control" name="team_id">
				<button type="submit" class="btn btn-primary" name="submitTeam">Создать команду</button>
			</form>
		</div>
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