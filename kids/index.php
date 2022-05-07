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
$sql = 'SELECT * FROM event';
$resultEvent = mysqli_query($link, $sql);
$sql = 'SELECT * FROM section';
$resultSection = mysqli_query($link, $sql);
$sql = 'SELECT * FROM section';
$resultSection1 = mysqli_query($link, $sql);
$sql = 'SELECT * FROM lecture';
$resultLecture = mysqli_query($link, $sql);
$sql = 'SELECT * FROM lecture';
$resultLecture1 = mysqli_query($link, $sql);
$sql = 'SELECT * FROM event';
$resultEvent1 = mysqli_query($link, $sql);
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
		.btn-head {
			background: #FFFFFF;
			border-radius: 10.935px;
			padding: 10px;
			margin-bottom: 20px;
		}
		.btn-head:hover {
			box-shadow: 0px 0px 5.4675px rgba(0, 0, 0, 0.16);
		}
		#contentDiv {
			display: none;
		}
		#eventsDiv {
			display: none;
		}
		#sectionDiv {
			display: none;
		}
		#teamDiv {
			display: none;
		}
		#btnNews {
			box-shadow: 0px 0px 5.4675px rgba(0, 0, 0, 0.16);
		}
		a {
			text-decoration: none;
			color: #000;
		}
		a:hover {
			color: #FFC53A;
		}
		img {
			width: 90%;
		}
	</style>
</head>
<body>
	<?php require 'header.php' ?>

	<div class="container mt-5">
		<div class="row">
			<div class="col-3">
				<button id="btnNews" class="btn btn-head" onclick="openNews()">
					<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1.91321 9.21729H26.7742" stroke="#85FF3A" stroke-width="2.5"/>
					<rect x="1.39966" y="1.59717" width="25.624" height="25.624" rx="5.13866" stroke="#272521" stroke-width="2"/>
					</svg>
					Новости
				</button> <br>
				<button id="btnContent" class="btn btn-head" onclick="openContent()">
					<svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="1.39966" y="1.37671" width="25.624" height="25.624" rx="5.13866" stroke="#272521" stroke-width="2"/>
					<path d="M11.3781 16.7105V9.52708C11.3781 9.03363 11.9308 8.74185 12.3382 9.02021L17.3075 12.4151C17.6531 12.6512 17.6663 13.1564 17.3334 13.4102L12.3641 17.1987C11.96 17.5067 11.3781 17.2186 11.3781 16.7105Z" stroke="#FFC53A" stroke-width="2.45546"/>
					<path d="M1.79321 21.8845C5.72115 22.4586 16.1876 23.2623 26.6299 21.8845" stroke="#272521" stroke-width="2"/>
					</svg>
					Контент
				</button> <br>
				<button id="btnEvent" class="btn btn-head" onclick="openEvent()">
					<svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M2.93335 25.1687C5.88547 22.1524 14.7547 16.0813 26.6144 15.9272" stroke="#CC3AFF" stroke-width="2.45546"/>
					<path d="M1.04358 13.6603C3.88203 13.4922 10.9483 14.0524 16.5057 17.6379" stroke="#CC3AFF" stroke-width="2.45546"/>
					<rect x="1.39966" y="1.17651" width="25.624" height="25.624" rx="5.13866" stroke="#272521" stroke-width="2"/>
					<path d="M20.9127 1.20654V6.87836" stroke="#272521" stroke-width="2"/>
					<path d="M7.79236 1.20654V6.87836" stroke="#272521" stroke-width="2"/>
					<path d="M1.33191 6.7998H27.0914" stroke="#272521" stroke-width="2"/>
					</svg>
					Мероприятия
				</button> <br>
				<button id="btnSection" class="btn btn-head" onclick="openSection()">
					<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="1.39966" y="1.62939" width="25.624" height="25.624" rx="5.13866" stroke="#272521" stroke-width="2"/>
					<path d="M6.18701 7.02905H19.0813" stroke="#FFC53A" stroke-width="2.45546"/>
					<path d="M6.18701 16.8325H19.0813" stroke="#FFC53A" stroke-width="2.45546"/>
					<path d="M6.18701 11.9705H22.4786" stroke="#FFC53A" stroke-width="2.45546"/>
					<path d="M6.18701 21.8535H22.4786" stroke="#FFC53A" stroke-width="2.45546"/>
					</svg>
					Кружки
				</button> <br>
				<button id="btnTeam" class="btn btn-head" onclick="openTeam()">
					<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="1" y="1" width="25.624" height="25.624" rx="5.13866" stroke="#272521" stroke-width="2"/>
					<circle cx="9.45307" cy="12.6187" r="2.4642" transform="rotate(33.6628 9.45307 12.6187)" stroke="#85FF3A" stroke-width="2"/>
					<circle cx="18.1708" cy="12.6346" r="2.4642" transform="rotate(33.6628 18.1708 12.6346)" stroke="#85FF3A" stroke-width="2"/>
					<circle cx="13.5793" cy="19.5291" r="2.4642" transform="rotate(33.6628 13.5793 19.5291)" stroke="#85FF3A" stroke-width="2"/>
					<path d="M6.12207 6.51196H21.502" stroke="#272521" stroke-width="2" stroke-linecap="round"/>
					</svg>
					Команды
				</button>
			</div>
			<div class="col-9">
				<div id="newsDiv">
					<div class="row">
						<?php while ($row = mysqli_fetch_array($resultLecture1)): ?>
							<div class="col-6 mb-3">
								<h3><?= $row['name']; ?></h3>
								<p><?= $row['shortdescription']; ?></p>
								<p><?= $row['fulldescription']; ?></p>
								<img src="../<?= $row['video']; ?>">
							</div>
						<?php endwhile; ?>
						<?php while ($row = mysqli_fetch_array($resultEvent1)): ?>
							<div class="col-6 mb-3">
								<img src="../<?= $row['photo']; ?>">
								<p><?= $row['name']; ?></p>
								<p><?= $row['dateofevent']; ?></p>
								<hr>
							</div>
						<?php endwhile; ?>
						<?php while ($row = mysqli_fetch_array($resultSection1)): ?>
							<div class="col-6 mb-3">
								<img src="../<?= $row['photo']; ?>">
								<p><?= $row['name']; ?></p>
								<p><?= $row['dateofevent']; ?></p>
								<hr>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
				<div id="contentDiv">
					<div class="row">
						<?php while ($row = mysqli_fetch_array($resultLecture)): ?>
							<div class="col-6">
								<h3><?= $row['name']; ?></h3>
								<p><?= $row['shortdescription']; ?></p>
								<p><?= $row['fulldescription']; ?></p>
								<!-- <video  width="400" height="300" controls="controls"><source src="<?= $row['video']; ?>" type='video/ogg; codecs="theora, vorbis"'></video> -->
							</div>
						<?php endwhile; ?>
					</div>
				</div>
				<div id="eventsDiv" class="row">
					<?php while ($row = mysqli_fetch_array($resultEvent)): ?>
						<div class="col-6">
							<img src="../<?= $row['photo']; ?>">
							<p><?= $row['name']; ?></p>
							<p><?= $row['dateofevent']; ?></p>
							<hr>
						</div>
					<?php endwhile; ?>
				</div>
				<div id="sectionDiv">
					<?php while ($row = mysqli_fetch_array($resultSection)): ?>
						<div class="col-6">
							<img src="../<?= $row['photo']; ?>">
							<p><?= $row['name']; ?></p>
							<p><?= $row['dateofevent']; ?></p>
							<hr>
						</div>
					<?php endwhile; ?>
				</div>
				<div id="teamDiv" class="row">
					<h1>Создать команду</h1>
					<p>Максимум 10 участников(не надо заполнять лишние строки, оставьте их пустыми, не пишите никаких - . ' ' и тп)</p>
					<form action="../upload.php" method="post">
						<div class="mb-3">
						    <label class="form-label">Название команды</label>
						    <input type="text" class="form-control" name="teamname">
						</div>
						<div class="row">
							<div class="col-2 mb-3">
								<label class="form-label">Ваш id</label>
						    	<input type="text" class="form-control" name="member_one" value="<?= $userID; ?>">
							</div>
							<div class="col-2 mb-3">
								<label class="form-label">id 2 учасника</label>
						    	<input type="text" class="form-control" name="member_two">
							</div>
							<div class="col-2 mb-3">
								<label class="form-label">id 3 учасника</label>
						    	<input type="text" class="form-control" name="member_three">
							</div>
							<div class="col-2 mb-3">
								<label class="form-label">id 4 учасника</label>
						    	<input type="text" class="form-control" name="member_four">
							</div>
							<div class="col-2 mb-3">
								<label class="form-label">id 5 учасника</label>
						    	<input type="text" class="form-control" name="member_foive">
							</div>
							<div class="col-2 mb-3">
								<label class="form-label">id 6 учасника</label>
						    	<input type="text" class="form-control" name="member_six">
							</div>
							<div class="col-2 mb-3">
								<label class="form-label">id 7 учасника</label>
						    	<input type="text" class="form-control" name="member_seven">
							</div>
							<div class="col-2 mb-3">
								<label class="form-label">id 8 учасника</label>
						    	<input type="text" class="form-control" name="member_eight">
							</div>
							<div class="col-2 mb-3">
								<label class="form-label">id 9 учасника</label>
						    	<input type="text" class="form-control" name="member_nine">
							</div>
							<div class="col-2 mb-3">
								<label class="form-label">id 10 учасника</label>
						    	<input type="text" class="form-control" name="member_ten">
							</div>
							<div class="col-4 d-flex align-items-end">
								<input type="hidden" class="form-control" name="team_id">
								<button type="submit" class="btn btn-kid" name="submitTeam">Создать команду</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<script type="text/javascript">
				let btnNews = document.getElementById('btnNews')
				let btnContent = document.getElementById('btnContent')
				let btnSection = document.getElementById('btnSection')
				let btnEvent = document.getElementById('btnEvent')
				let btnTeam = document.getElementById('btnTeam')
				let newsDiv = document.getElementById('newsDiv')
				let contentDiv = document.getElementById('contentDiv')
				let eventDiv = document.getElementById('eventsDiv')
				let sectionDiv = document.getElementById('sectionDiv')
				let teamDiv = document.getElementById('teamDiv')

				function openNews() {
					newsDiv.style.display = "flex"
					contentDiv.style.display = "none"
					eventDiv.style.display = "none"
					sectionDiv.style.display = "none"
					teamDiv.style.display = "none"
					btnNews.style.boxShadow = "0px 0px 5.4675px rgba(0, 0, 0, 0.16)"
					btnContent.style.boxShadow = "none"
					btnSection.style.boxShadow = "none"
					btnEvent.style.boxShadow = "none"
					btnTeam.style.boxShadow = "none"
				}
				function openContent() {
					newsDiv.style.display = "none"
					contentDiv.style.display = "flex"
					eventDiv.style.display = "none"
					sectionDiv.style.display = "none"
					teamDiv.style.display = "none"
					btnNews.style.boxShadow = "none"
					btnContent.style.boxShadow = "0px 0px 5.4675px rgba(0, 0, 0, 0.16)"
					btnSection.style.boxShadow = "none"
					btnEvent.style.boxShadow = "none"
					btnTeam.style.boxShadow = "none"
				}
				function openEvent() {
					newsDiv.style.display = "none"
					contentDiv.style.display = "none"
					eventDiv.style.display = "flex"
					sectionDiv.style.display = "none"
					teamDiv.style.display = "none"
					btnNews.style.boxShadow = "none"
					btnContent.style.boxShadow = "none"
					btnSection.style.boxShadow = "none"
					btnEvent.style.boxShadow = "0px 0px 5.4675px rgba(0, 0, 0, 0.16)"
					btnTeam.style.boxShadow = "none"
				}
				function openSection() {
					newsDiv.style.display = "none"
					contentDiv.style.display = "none"
					eventDiv.style.display = "none"
					sectionDiv.style.display = "flex"
					teamDiv.style.display = "none"
					btnNews.style.boxShadow = "none"
					btnContent.style.boxShadow = "none"
					btnSection.style.boxShadow = "0px 0px 5.4675px rgba(0, 0, 0, 0.16)"
					btnEvent.style.boxShadow = "none"
					btnTeam.style.boxShadow = "none"
				}
				function openTeam() {
					newsDiv.style.display = "none"
					contentDiv.style.display = "none"
					eventDiv.style.display = "none"
					sectionDiv.style.display = "none"
					teamDiv.style.display = "flex"
					btnNews.style.boxShadow = "none"
					btnContent.style.boxShadow = "none"
					btnSection.style.boxShadow = "none"
					btnEvent.style.boxShadow = "none"
					btnTeam.style.boxShadow = "0px 0px 5.4675px rgba(0, 0, 0, 0.16)"
				}

			</script>
		</div>
	</div>
	<!-- <div class="container">
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
						<?php while ($rowresponse = mysqli_fetch_array($resultResponses)): ?>
							<?php if ($rowresponse['order_id'] == $row['id']): ?>
								<p><?= $rowresponse['response']; ?></p>
							<?php endif ?>
						<?php endwhile; ?>
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
	</div> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>