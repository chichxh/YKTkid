<?php 
require 'connect.php';


if(isset($_POST['signinParent'])) {

    $query = mysqli_query($link,"SELECT * FROM parents WHERE emailp = '".$_POST['emailp']."'");
    $data = mysqli_fetch_assoc($query);
    if($data['passwordp'] === $_POST['passwordp'])
    {
        header('Location: parent/index.php'); 
        session_start();
        $_SESSION['idp'] = (int)$data['id'];
        $_SESSION['namep'] = $data['namep'];
        $_SESSION['surnamep'] = $data['surnamep'];
        $_SESSION['patronymicp'] = $data['patronymicp'];
        $_SESSION['userpicp'] = $data['userpicp'];
        $_SESSION['emailp'] = $data['emailp'];
        $_SESSION['passwordp'] = $data['passwordp'];
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }

}

if(isset($_POST['signinKid'])) {

    $query = mysqli_query($link,"SELECT * FROM kids WHERE email = '".$_POST['email']."'");
    $data = mysqli_fetch_assoc($query);

    if($data['password'] === $_POST['password'])
    {
        header('Location: kids/index.php'); 
        session_start();
        $_SESSION['id'] = (int)$data['id'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['surname'] = $data['surname'];
        $_SESSION['patronymic'] = $data['patronymic'];
        $_SESSION['userpic'] = $data['userpic'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['age'] = $data['age'];
        $_SESSION['school'] = $data['school'];
        $_SESSION['clas'] = $data['clas'];
        $_SESSION['password'] = $data['password'];
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
if(isset($_POST['signinDO'])) {

    $query = mysqli_query($link,"SELECT * FROM do WHERE loginDO = '".$_POST['loginDO']."'");
    $data = mysqli_fetch_assoc($query);

    if($data['passwordDO'] === $_POST['passwordDO'])
    {
        header('Location: do/index.php'); 
        session_start();
        $_SESSION['idDO'] = (int)$data['id'];
        $_SESSION['loginDO'] = $data['loginDO'];
        $_SESSION['passwordDO'] = $data['passwordDO'];
        $_SESSION['fullname'] = $data['fullname'];
        $_SESSION['typeDO'] = $data['typeDO'];
        $_SESSION['placeDO'] = $data['placeDO'];
        $_SESSION['contactDO'] = $data['contactDO'];
        $_SESSION['directorDO'] = $data['directorDO'];
        $_SESSION['siteDO'] = $data['siteDO'];
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
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
	<?php require 'header.php' ?>
	<div class="container">
		<h1>Войти</h1>
		<p>Выберите роль</p>
		<button class="btn btn-primary" onclick="openKid()">Ребенок</button>
		<button class="btn btn-primary" onclick="openParent()">Родитель</button>
		<button class="btn btn-primary" onclick="openDO()">ДО, ОО</button>
	
		<div id="kid" class="mb-3">
			<button class="btn btn-primary" onclick="closeEverything()">Х</button>
			<form action="signin.php" method="post">
				<div class="mb-3">
				    <label class="form-label">Эл. адресс</label>
				    <input type="email" class="form-control" id="email" name="email">
				</div>
				<div class="mb-3">
				    <label class="form-label">Password</label>
				    <input type="password" class="form-control" name="password">
				</div>
				<button type="submit" class="btn btn-primary" name="signinKid">Войти</button>
			</form>
		</div>

		<div id="parent" class="mb-3">
			<button class="btn btn-primary" onclick="closeEverything()">Х</button>
			<form action="signin.php" method="post">
				<div class="mb-3">
				    <label class="form-label">Эл. адресс</label>
				    <input type="email" class="form-control" name="emailp">
				</div>
				<div class="mb-3">
				    <label class="form-label">Пароль</label>
				    <input type="password" class="form-control" name="passwordp">
				</div>
				<button type="submit" class="btn btn-primary" name="signinParent">Войти</button>
			</form>
		</div>

		<div id="do" class="mb-3">
			<p>do</p>
			<button class="btn btn-primary" onclick="closeEverything()">Х</button>
			<form action="signin.php" method="post">
				<div class="mb-3">
				    <label class="form-label">Логин</label>
				    <input type="text" class="form-control" name="loginDO">
				</div>
				<div class="mb-3">
				    <label class="form-label">Пароль</label>
				    <input type="password" class="form-control" name="passwordDO">
				</div>
				<button type="submit" class="btn btn-primary" name="signinDO">Войти</button>
			</form>
		</div>
	</div>
	
	<script type="text/javascript">
		let kidDiv = document.getElementById('kid')
		let parentDiv = document.getElementById('parent')
		let doDiv = document.getElementById('do')

		function openKid() {
			kidDiv.style.display = "block"
			parentDiv.style.display = "none"
			doDiv.style.display = "none"
		}
		function openParent() {
			kidDiv.style.display = "none"
			parentDiv.style.display = "block"
			doDiv.style.display = "none"
		}
		function openDO() {
			kidDiv.style.display = "none"
			parentDiv.style.display = "none"
			doDiv.style.display = "block"
		}
		function closeEverything() {
			kidDiv.style.display = "none"
			parentDiv.style.display = "none"
			doDiv.style.display = "none"
		}
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>