<?php 
require '../connect.php';
$sql = 'SELECT * FROM lecture';
$resultLecture = mysqli_query($link, $sql);
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
	<p>Страница родителя</p>
	<!-- показ мероприятий -->
	<?php while ($row = mysqli_fetch_array($resultLecture)): ?>
		<p><?= $row['name']; ?></p>
		<p><?= $row['shortdescription']; ?></p>
		<p><?= $row['fulldescription']; ?></p>
		<video  width="400" height="300" controls="controls"><source src="<?= $row['video']; ?>" type='video/ogg; codecs="theora, vorbis"'></video>
	<?php endwhile; ?>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>