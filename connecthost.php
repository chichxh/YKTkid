<?php

$database = 'j50267013_yktkids';
$user = 'j50267013';
$password = 'lwfjHFUAWEGPY';
$host = 'localhost';

$mysqli = new mysqli($host, $user, $password, $database);

$link = mysqli_connect($host, $user, $password, $database);

if ($link == false){
	print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}


?>