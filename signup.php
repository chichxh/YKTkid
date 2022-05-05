<?php 
require 'connect.php';

if(isset($_POST['signupKid']))
{
	$query = mysqli_query($link, "SELECT id FROM kids WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'");
	if(mysqli_num_rows($query) > 0)
	{
	    $err[] = "Пользователь с такой электроной почтой уже существует";
	}

    if(count($err) == 0)
    {

        $email = $_POST['email'];

        $password = md5(md5(trim($_POST['password'])));

        $query = "INSERT INTO kids (name, surname, patronymic, age, school, clas, email, password) VALUES ('". $_POST['name'] ."', '". $_POST['surname'] ."', '". $_POST['patronymic'] ."', '". $_POST['age'] ."', '". $_POST['school'] ."', '". $_POST['clas'] ."', '". $_POST['email'] ."', '". $_POST['password'] ."')";
        $res = mysqli_query($link, $query);
        header("Location: kids/index.php");
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
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}

if(isset($_POST['signupParrent']))
{
	$query = mysqli_query($link, "SELECT id FROM parents WHERE emailPar='".mysqli_real_escape_string($link, $_POST['emailPar'])."'");
	if(mysqli_num_rows($query) > 0)
	{
	    $err[] = "Пользователь с такой электроной почтой уже существует";
	}

    if(count($err) == 0)
    {

        $email = $_POST['email'];

        $password = md5(md5(trim($_POST['passwordPar'])));
        #заменить здесь
        $query = "INSERT INTO parrent (namePar, surnamePar, patronymicPar, emailPar, passwordPar) VALUES ('". $_POST['namePar'] ."', '". $_POST['surnamePar'] ."', '". $_POST['patronymicPar'] ."', '". $_POST['emailPar'] ."', '". $_POST['passwordPar'] ."')";
        $res = mysqli_query($link, $query);
        header("Location: parrent/index.php");
        session_start();
        // $_SESSION['id'] = (int)$data['id'];
        // $_SESSION['name'] = $data['name'];
        // $_SESSION['surname'] = $data['surname'];
        // $_SESSION['patronymic'] = $data['patronymic'];
        // $_SESSION['userpic'] = $data['userpic'];
        // $_SESSION['email'] = $data['email'];
        // $_SESSION['age'] = $data['age'];
        // $_SESSION['school'] = $data['school'];
        // $_SESSION['clas'] = $data['clas'];
        // $_SESSION['password'] = $data['password'];
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
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
	<div class="container">
		<p>Выберите роль</p>
		<button onclick="openKid()">Ребенок</button>
		<button onclick="openParent()">Родитель</button>
		<button onclick="openDO()">ДО, ОО</button>
	
		<div id="kid">
			<button onclick="closeEverything()">Х</button>
			<form action="signup.php" method="post">
				<div class="mb-3">
				    <label class="form-label">Имя</label>
				    <input type="text" class="form-control" id="name" name="name">
				</div>
				<div class="mb-3">
				    <label class="form-label">Фамилия</label>
				    <input type="text" class="form-control" id="surname" name="surname">
				</div>
				<div class="mb-3">
				    <label class="form-label">Отчество</label>
				    <input type="text" class="form-control" id="patronymic" name="patronymic">
				</div>
				<div class="mb-3">
				    <label class="form-label">Возраст</label>
				    <input type="text" class="form-control" id="age" name="age">
				</div>
				<div class="mb-3">
				    <label class="form-label">Школа</label>
				    <input type="text" class="form-control" id="school" name="school">
				</div>
				<div class="mb-3">
				    <label class="form-label">Класс</label>
				    <input type="text" class="form-control" id="clas" name="clas">
				</div>
				<div class="mb-3">
				    <label class="form-label">Эл. адресс</label>
				    <input type="email" class="form-control" id="email" name="email">
				</div>
				<div class="mb-3">
				    <label class="form-label">Пароль</label>
				    <input type="password" class="form-control" name="password">
				</div>
				<button type="submit" class="btn btn-primary" name="signupKid">Войти</button>
			</form>
		</div>

		<div id="parent">
			<button onclick="closeEverything()">Х</button>
			<form action="signup.php" method="post">
				<div class="mb-3">
				    <label class="form-label">Имя</label>
				    <input type="text" class="form-control" id="name" name="namePar">
				</div>
				<div class="mb-3">
				    <label class="form-label">Фамилия</label>
				    <input type="text" class="form-control" id="surname" name="surnamePar">
				</div>
				<div class="mb-3">
				    <label class="form-label">Отчество</label>
				    <input type="text" class="form-control" id="patronymic" name="patronymicPar">
				</div>
				<div class="mb-3">
				    <label class="form-label">Эл. адресс</label>
				    <input type="email" class="form-control" id="email" name="emailPar">
				</div>
				<div class="mb-3">
				    <label class="form-label">Пароль</label>
				    <input type="password" class="form-control" name="passwordPar">
				</div>
				<button type="submit" class="btn btn-primary" name="signupParrent">Войти</button>
			</form>
		</div>

		<div id="do">
			<p>do</p>
			<button onclick="closeEverything()">Х</button>
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