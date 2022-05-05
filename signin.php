<?php 
require 'connect.php';

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

		<div id="parent">
			<p>paretn</p>
			<button onclick="closeEverything()">Х</button>
			<form action="signin.php" method="post">
				<div class="mb-3">
				    <label class="form-label">Эл. адресс</label>
				    <input type="email" class="form-control" id="email" name="email">
				</div>
				<div class="mb-3">
				    <label class="form-label">Password</label>
				    <input type="password" class="form-control" name="password">
				</div>
				<button type="submit" class="btn btn-primary" name="signupKid">Войти</button>

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