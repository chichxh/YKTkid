<?php 
require 'connect.php';

if (isset($_POST['addEvent'])) {
	    $link_name = $_FILES['photo']['name'];
	    $link_tmp = $_FILES['photo']['tmp_name'];
	    move_uploaded_file($link_tmp,"uploads/".$link_name);

		$path = 'uploads/';
        $query = "INSERT INTO event (name, description, place, typebill, organizer, dateofevent, photo) VALUES ('". $_POST['name'] ."', '". $_POST['description'] ."', '". $_POST['place'] ."', '". $_POST['typebill'] ."', '". $_POST['organizer'] ."', '". $_POST['dateofevent'] ."', '". $path . $_FILES['photo']['name'] ."')";
        $res = mysqli_query($link, $query);
        if ($res) {
        	header("Location: do/index.php");
        }
        else {
        	echo "error";
        }
    }

if (isset($_POST['addSection'])) {
	    $link_name = $_FILES['photo']['name'];
	    $link_tmp = $_FILES['photo']['tmp_name'];
	    move_uploaded_file($link_tmp,"uploads/".$link_name);
		$path = 'uploads/';
        $query = "INSERT INTO section (name, eductype, description, place, typebill, teacher, dateofevent, photo) VALUES ('". $_POST['name'] ."', '". $_POST['eductype'] ."', '". $_POST['description'] ."', '". $_POST['place'] ."', '". $_POST['typebill'] ."', '". $_POST['teacher'] ."', '". $_POST['dateofevent'] ."', '". $path . $_FILES['photo']['name'] ."')";
        $res = mysqli_query($link, $query);
        if ($res) {
        	header("Location: do/index.php");
        }
        else {
        	echo "error";
        }
    }

if (isset($_POST['addLecture'])) {
	    $link_name = $_FILES['video']['name'];
	    $link_tmp = $_FILES['video']['tmp_name'];
	    move_uploaded_file($link_tmp,"uploads/".$link_name);
		$path = 'uploads/';
        $query = "INSERT INTO lecture (name, shortdescription, fulldescription, video) VALUES ('". $_POST['name'] ."', '". $_POST['shortdescription'] ."', '". $_POST['fulldescription'] ."', '". $path . $_FILES['video']['name'] ."')";
        $res = mysqli_query($link, $query);
        if ($res) {
        	header("Location: do/index.php");
        }
        else {
        	echo "error";
        }
    }
 ?>