<?php 
require 'connect.php';
$sql = 'SELECT * FROM event';
$resultEvent = mysqli_query($link, $sql);
$sql = 'SELECT * FROM section';
$resultSection = mysqli_query($link, $sql);
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
	<a href="signin.php">Войти</a>
	<a href="signup.php">Регистрация</a>


	<!-- показ мероприятий -->
	<?php while ($row = mysqli_fetch_array($resultEvent)): ?>
		<p><?= $row['name']; ?></p>
		<p><?= $row['description']; ?></p>
		<p><?= $row['place']; ?></p>
		<p><?= $row['typebill']; ?></p>
		<p><?= $row['organaizer']; ?></p>
		<p><?= $row['dateofevent']; ?></p>
		<p><?= $row['photo']; ?></p>
	<?php endwhile; ?>

	<!-- показ кружков -->
	<?php while ($row = mysqli_fetch_array($resultSection)): ?>
		<p><?= $row['name']; ?></p>
		<p><?= $row['eductype']; ?></p>
		<p><?= $row['description']; ?></p>
		<p><?= $row['place']; ?></p>
		<p><?= $row['typebill']; ?></p>
		<p><?= $row['teacher']; ?></p>
		<p><?= $row['dateofevent']; ?></p>
		<p><?= $row['photo']; ?></p>
	<?php endwhile; ?>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>