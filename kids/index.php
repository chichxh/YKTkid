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
$sql = 'SELECT * FROM teams';
$resultTeam = mysqli_query($link, $sql);

// $_SESSION['Lname'] = array();
// $_SESSION['Lshortdescription'] = array();
// $_SESSION['Lfulldescription'] = array();
// $_SESSION['Lfulldescription'] = array();
// $_SESSION['Lvideo'] = array();
// я пытался сделать, но не получилось
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
		#freelanceDiv {
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
			width: 100%;
		}
		.statusCircle {
			border-radius: 100%;
			width: 10px;
			height: 10px;
		}
		.col-1 {
			padding: 0px;
		}
		.bg-content {
			background-color: #F5F5F5;
			border-radius: 5px;
			padding: 10px
		}
		.eventBlock {
			width: 30%;
			border: 1px solid #B8B8B8;
			border-radius: 10px;
			padding-top: 10px;
			padding-bottom: 20px;
		}
		.nav img {
			max-width: 25%;
		}
		#doOrder {
			display: none;
		}
		#clOrderBtn {
			display: none;
		}
		#orderDiv {
			display: none;
		}
		#teamBigBtn {
			display: none;
		}
		#myTeam {
			display: none;
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
				</button> <br>
				<div id="teamBigBtn">
					<button class="btn btn-head" onclick="openCreateTeam()">Созадть свою команду</button> <br>
					<button class="btn btn-head" onclick="openMyTeam()">Моя команда</button>
				</div>
				<button id="btnFreelance" class="btn btn-head" onclick="openFreelance()">
					<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M2.34082 24.9647C6.27011 22.202 18.2734 18.9775 26.3249 19.4945" stroke="#CC3AFF" stroke-width="2" stroke-linecap="round"/>
					<path d="M19.3349 15.3975L19.4697 8.99609" stroke="#CC3AFF" stroke-width="2" stroke-linecap="round"/>
					<path d="M14.1953 15.9328L12.5752 9.73828" stroke="black" stroke-width="2" stroke-linecap="round"/>
					<path d="M8.90069 17.6774L6.10742 11.916" stroke="#CC3AFF" stroke-width="2" stroke-linecap="round"/>
					<rect x="1.52051" y="1.63281" width="25.624" height="25.624" rx="5.13866" stroke="black" stroke-width="2"/>
					</svg>
					Фриланс
				</button>
			</div>
			<div class="col-9">
				<div id="newsDiv">
					<div class="row">
						<?php while ($row = mysqli_fetch_array($resultEvent)): ?>
						<?php 
							$_SESSION['Ename'] = $row['name'];
							$_SESSION['Esdescription'] = $row['sdescription'];
							$_SESSION['Eplace'] = $row['place'];
							$_SESSION['Etypebill'] = $row['typebill'];
							$_SESSION['Eorganizer'] = $row['organizer'];
							$_SESSION['Edateofevent'] = $row['dateofevent'];
							$_SESSION['Ephoto'] = $row['photo'];
							$_SESSION['Estatus'] = $row['status'];
						 ?>
						<div class="col-6 mb-3">
							<a href="moreInfoEvent.php">
								<div class="row">
									<div class="col-11">
										<img src="../<?= $row['photo']; ?>">
									</div>
									<div class="col-1">
										<div class="statusCircle" style="background-color: <?= $row['status']; ?>"></div>
									</div>
								</div>
								<p><?= $row['name']; ?></p>
								<p><?= $row['dateofevent']; ?></p>
								<hr>
							</a>
						</div>
					<?php endwhile; ?>

						<?php while ($row = mysqli_fetch_array($resultLecture1)): ?>
							<?php 
								session_start();
								// array_push($_SESSION['Lname'], $row['name']);
								// array_push($_SESSION['Lshortdescription'], $row['shortdescription']);
								// array_push($_SESSION['Lfulldescription'], $row['fulldescription']);
								// array_push($_SESSION['Lvideo'], $row['video']);
								$_SESSION['Lname'] = $row['name'];
								$_SESSION['Lshortdescription'] = $row['shortdescription'];
								$_SESSION['Lfulldescription'] = $row['fulldescription'];
								$_SESSION['Lvideo'] = $row['video'];
							 ?>
							<div class="col-12 mb-3">
								<a href="moreInfoLecture.php">
									<div class="row">
										<div class="col-8">
											<img src="../<?= $row['video']; ?>">
										</div>
										<div class="col-4 bg-content">
											<h3><?= $row['name']; ?></h3>
											<p><?= $row['shortdescription']; ?></p>
											<p><?= $row['fulldescription']; ?></p>
										</div>
									</div>
								</a>
							</div>
						<?php endwhile; ?>
						
						<?php while ($row = mysqli_fetch_array($resultSection1)): ?>
							<?php 
								$_SESSION['Sname'] = $row['name'];
								$_SESSION['Seductype'] = $row['eductype'];
								$_SESSION['Sdescription'] = $row['description'];
								$_SESSION['Splace'] = $row['place'];
								$_SESSION['Stypebill'] = $row['typebill'];
								$_SESSION['Steacher'] = $row['teacher'];
								$_SESSION['Sdateofevent'] = $row['dateofevent'];
								$_SESSION['Sphoto'] = $row['photo'];
							 ?>
							<div class="col-6 mb-3">
								<a href="moreInfoSection.php">
									<img src="../<?= $row['photo']; ?>">
									<p><?= $row['name']; ?></p>
									<p><?= $row['dateofevent']; ?></p>
									<hr>
								</a>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
				<div id="contentDiv">
					<div class="row">
						<?php while ($row = mysqli_fetch_array($resultLecture)): ?>
							<?php 
								session_start();
								// array_push($_SESSION['Lname'], $row['name']);
								// array_push($_SESSION['Lshortdescription'], $row['shortdescription']);
								// array_push($_SESSION['Lfulldescription'], $row['fulldescription']);
								// array_push($_SESSION['Lvideo'], $row['video']);
								$_SESSION['Lname'] = $row['name'];
								$_SESSION['Lshortdescription'] = $row['shortdescription'];
								$_SESSION['Lfulldescription'] = $row['fulldescription'];
								$_SESSION['Lvideo'] = $row['video'];
							 ?>
							<div class="col-12 mb-3">
								<a href="moreInfoLecture.php">
									<div class="row">
										<div class="col-8">
											<img src="../<?= $row['video']; ?>">
										</div>
										<div class="col-4 bg-content">
											<h3><?= $row['name']; ?></h3>
											<p><?= $row['shortdescription']; ?></p>
											<p><?= $row['fulldescription']; ?></p>
										</div>
									</div>
								</a>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
				<div id="eventsDiv" class="row">
					<h2>События</h2>
					<?php while ($row = mysqli_fetch_array($resultEvent1)): ?>
						<?php 
							$_SESSION['Ename'] = $row['name'];
							$_SESSION['Esdescription'] = $row['sdescription'];
							$_SESSION['Eplace'] = $row['place'];
							$_SESSION['Etypebill'] = $row['typebill'];
							$_SESSION['Eorganizer'] = $row['organizer'];
							$_SESSION['Edateofevent'] = $row['dateofevent'];
							$_SESSION['Ephoto'] = $row['photo'];
							$_SESSION['Estatus'] = $row['status'];
						 ?>
						<div class="col-4 mb-3 eventBlock me-3">
							<a href="moreInfoEvent.php">
								<div class="row">
									<div class="col-11">
										<p><?= $row['dateofevent']; ?></p>
									</div>
									<div class="col-1">
										<div>
											<div class="statusCircle" style="background-color: <?= $row['status']; ?>"></div>
										</div>
									</div>
									<h5><?= $row['name']; ?></h5>
									<p><?= $row['sdescription']; ?></p>
								</div>
								<div class="row align-items-end">
									<a href="moreInfoEvent.php">Подробнее</a>
								</div>
							</a>
						</div>
					<?php endwhile; ?>
				</div>
				<div id="sectionDiv" class="row">
					<h2>Каталог программ</h2>
					<?php while ($row = mysqli_fetch_array($resultSection)): ?>
						<?php 
							$_SESSION['Sname'] = $row['name'];
							$_SESSION['Seductype'] = $row['eductype'];
							$_SESSION['Sdescription'] = $row['description'];
							$_SESSION['Splace'] = $row['place'];
							$_SESSION['Stypebill'] = $row['typebill'];
							$_SESSION['Steacher'] = $row['teacher'];
							$_SESSION['Sdateofevent'] = $row['dateofevent'];
							$_SESSION['Sphoto'] = $row['photo'];
						 ?>
						<div class="col-4 mb-3 eventBlock me-3">
							<a href="moreInfoSection.php">
								<p><?= $row['dateofevent']; ?></p>
								<h5><?= $row['name']; ?></h5>
								<p><?= $row['Sdescription']; ?></p>
								<a href="moreInfoSection.php">Подробнее</a>
							</a>
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
						<div class="mb-3">
						    <label class="form-label">Описание команды</label>
						    <input type="text" class="form-control" name="teamdescr">
						</div>
						<div class="row">
							<p>id участника можно увидеть в личном кабинете</p>
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

				<div id="myTeam" class="row">
					<?php while ($row = mysqli_fetch_array($resultTeam)): ?>
						<div class="col-6 eventBlock mb-3 me-3">
							<h3><?= $row['team_name'] ?></h3>
							<p><?= $row['team_descr'] ?></p>
						</div>
					<?php endwhile; ?>
				</div>

				<div id="freelanceDiv" class="row">
					<h1>Создать свой заказ</h1>
					<div class="container mt-5">
					<button id="doOrderBtn" class="btn btn-primary" onclick="openOrderDiv()">Создать заказ</button>
					<button id="clOrderBtn" class="btn" onclick="closeOrderDiv()">
						<svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M16.2217 15.6953L27.6738 27.1475" stroke="#000" stroke-width="3" stroke-linecap="round"/>
						<path d="M27.6738 15.6953L16.2217 27.1475" stroke="#000" stroke-width="3" stroke-linecap="round"/>
						<rect x="1.39648" y="0.871094" width="41.1031" height="41.1031" rx="9.5" stroke="#000"/>
						</svg>
					</button>

					<div id="doOrder" class="row">
						
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

					<script type="text/javascript">
						let doOrderBtn = document.getElementById('doOrderBtn')
						let clOrderBtn = document.getElementById('clOrderBtn')
						let doOrder = document.getElementById('doOrder')

						function openOrderDiv() {
							doOrder.style.display = "block"
							doOrderBtn.style.display = "none"
							clOrderBtn.style.display = "block"
						}

						function closeOrderDiv() {
							doOrder.style.display = "none"
							doOrderBtn.style.display = "block"
							clOrderBtn.style.display = "none"
						}
					</script>
				</div>

				<div class="container mt-5">
					<div class="row">
						<h1>Актуальные заказы</h1>
						<?php while ($row = mysqli_fetch_array($resultOrder)): ?>
							<div class="col-5 mb-3 orders">
								<h4><?= $row['title']; ?></h4>
								<p><?= $row['fulldescription']; ?></p>

								<button class="btn btn-primary" onclick="openOrder()">Отозваться</button>

								<div id="orderDiv" class="mt-3">
									<button class="btn" onclick="closeEverything()">
										<svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M16.2217 15.6953L27.6738 27.1475" stroke="#000" stroke-width="3" stroke-linecap="round"/>
										<path d="M27.6738 15.6953L16.2217 27.1475" stroke="#000" stroke-width="3" stroke-linecap="round"/>
										<rect x="1.39648" y="0.871094" width="41.1031" height="41.1031" rx="9.5" stroke="#000"/>
										</svg>
									</button>
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
									<!-- <?php while ($rowresponse = mysqli_fetch_array($resultResponses)): ?>
										<?php if ($rowresponse['order_id'] == $row['id']): ?>
											<p><?= $rowresponse['response']; ?></p>
										<?php endif ?>
									<?php endwhile; ?> -->
								</div>
								<script type="text/javascript">
									let orderDiv = document.getElementById('orderDiv')
									console.log(orderDiv)
									function openOrder() {
										orderDiv.style.display = "block"
									}
									function closeEverything() {
										orderDiv.style.display = "none"
									}
								</script>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
				</div>
			</div>

			<script type="text/javascript">
				let btnNews = document.getElementById('btnNews')
				let btnContent = document.getElementById('btnContent')
				let btnSection = document.getElementById('btnSection')
				let btnEvent = document.getElementById('btnEvent')
				let btnTeam = document.getElementById('btnTeam')
				let btnFreelance = document.getElementById('btnFreelance')
				let newsDiv = document.getElementById('newsDiv')
				let contentDiv = document.getElementById('contentDiv')
				let eventDiv = document.getElementById('eventsDiv')
				let sectionDiv = document.getElementById('sectionDiv')
				let teamDiv = document.getElementById('teamDiv')
				let freelanceDiv = document.getElementById('freelanceDiv')
				let teamBigBtn = document.getElementById('teamBigBtn')
				let myTeam = document.getElementById('myTeam')

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
					btnFreelance.style.boxShadow = "none"
					freelanceDiv.style.display = "none"
					myTeam.style.display = "none"
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
					btnFreelance.style.boxShadow = "none"
					freelanceDiv.style.display = "none"
					myTeam.style.display = "none"
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
					btnFreelance.style.boxShadow = "none"
					freelanceDiv.style.display = "none"
					myTeam.style.display = "none"
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
					btnFreelance.style.boxShadow = "none"
					freelanceDiv.style.display = "none"
					myTeam.style.display = "none"
				}
				function openTeam() {
					btnNews.style.boxShadow = "none"
					btnContent.style.boxShadow = "none"
					btnSection.style.boxShadow = "none"
					btnEvent.style.boxShadow = "none"
					btnTeam.style.boxShadow = "0px 0px 5.4675px rgba(0, 0, 0, 0.16)"
					btnFreelance.style.boxShadow = "none"
					teamBigBtn.style.display = "block"
				}
				function openCreateTeam() {
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
					btnFreelance.style.boxShadow = "none"
					freelanceDiv.style.display = "none"
					teamBigBtn.style.display = "block"
					myTeam.style.display = "none"
				}
				function openMyTeam() {
					newsDiv.style.display = "none"
					contentDiv.style.display = "none"
					eventDiv.style.display = "none"
					sectionDiv.style.display = "none"
					teamDiv.style.display = "none"
					btnNews.style.boxShadow = "none"
					btnContent.style.boxShadow = "none"
					btnSection.style.boxShadow = "none"
					btnEvent.style.boxShadow = "none"
					btnTeam.style.boxShadow = "0px 0px 5.4675px rgba(0, 0, 0, 0.16)"
					btnFreelance.style.boxShadow = "none"
					freelanceDiv.style.display = "none"
					teamBigBtn.style.display = "block"
					myTeam.style.display = "flex"
				}
				function openFreelance() {
					newsDiv.style.display = "none"
					contentDiv.style.display = "none"
					eventDiv.style.display = "none"
					sectionDiv.style.display = "none"
					teamDiv.style.display = "none"
					btnNews.style.boxShadow = "none"
					btnContent.style.boxShadow = "none"
					btnSection.style.boxShadow = "none"
					btnEvent.style.boxShadow = "none"
					btnTeam.style.boxShadow = "none"
					btnFreelance.style.boxShadow = "0px 0px 5.4675px rgba(0, 0, 0, 0.16)"
					freelanceDiv.style.display = "flex"
					myTeam.style.display = "none"
				}
			</script>
		</div>
	</div>
	<?php require '../footer.php' ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>