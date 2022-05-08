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

if (isset($_POST['submitorderp'])) {
	    $link_name = $_FILES['photo']['name'];
	    $link_tmp = $_FILES['photo']['tmp_name'];
	    move_uploaded_file($link_tmp,"uploads/".$link_name);
		$path = 'uploads/';
        $query = "INSERT INTO orders (title, category, fulldescription, photo, deadline, budget, customer) VALUES ('". $_POST['title'] ."', '". $_POST['category'] ."', '". $_POST['fulldescription'] ."', '". $path . $_FILES['photo']['name'] ."', '". $_POST['deadline'] ."', '". $_POST['budget'] ."', '". $_POST['customer'] ."')";
        $res = mysqli_query($link, $query);
        if ($res) {
        	header("Location: parent/index.php");
        }
        else {
        	echo "error";
        }
    }
if (isset($_POST['submitorderk'])) {
	    $link_name = $_FILES['photo']['name'];
	    $link_tmp = $_FILES['photo']['tmp_name'];
	    move_uploaded_file($link_tmp,"uploads/".$link_name);
		$path = 'uploads/';
        $query = "INSERT INTO orders (title, category, fulldescription, photo, deadline, budget, customer) VALUES ('". $_POST['title'] ."', '". $_POST['category'] ."', '". $_POST['fulldescription'] ."', '". $path . $_FILES['photo']['name'] ."', '". $_POST['deadline'] ."', '". $_POST['budget'] ."', '". $_POST['customer'] ."')";
        $res = mysqli_query($link, $query);
        if ($res) {
        	header("Location: kids/index.php");
        }
        else {
        	echo "error";
        }
    }

if (isset($_POST['submitresponse'])) {
        $query = "INSERT INTO order_responses (order_id, response_text, executor_id, executor) VALUES ('". $_POST['order_id'] ."', '". $_POST['response'] ."', '". $_POST['executor_id'] ."', '". $_POST['executor'] ."')";
        $res = mysqli_query($link, $query);
        if ($res) {
            header("Location: kids/index.php");
        }
        else {
            echo "error";
        }
    }

if (isset($_POST['submitTeam'])) {
        $query = "INSERT INTO teams (team_name, team_descr, member_one, member_two, member_three, member_four, member_foive, member_six, member_seven, member_eight, member_nine, member_ten) VALUES ('". $_POST['teamname'] ."', '". $_POST['teamdescr'] ."', '". $_POST['member_one'] ."', '". $_POST['member_two'] ."', '". $_POST['member_three'] ."', '". $_POST['member_four'] ."', '". $_POST['member_foive'] ."', '". $_POST['member_six'] ."', '". $_POST['member_seven'] ."', '". $_POST['member_eight'] ."', '". $_POST['member_nine'] ."', '". $_POST['member_ten'] ."')";
        $res = mysqli_query($link, $query);
        $query = "UPDATE kids SET team_id='". $_POST['team_id'] ."' WHERE id = " . $_POST['member_one'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team_id='". $_POST['team_id'] ."' WHERE id = " . $_POST['member_two'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team_id='". $_POST['team_id'] ."' WHERE id = " . $_POST['member_three'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team_id='". $_POST['team_id'] ."' WHERE id = " . $_POST['member_four'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team_id='". $_POST['team_id'] ."' WHERE id = " . $_POST['member_foive'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team_id='". $_POST['team_id'] ."' WHERE id = " . $_POST['member_six'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team_id='". $_POST['team_id'] ."' WHERE id = " . $_POST['member_seven'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team_id='". $_POST['team_id'] ."' WHERE id = " . $_POST['member_eight'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team_id='". $_POST['team_id'] ."' WHERE id = " . $_POST['member_nine'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team_id='". $_POST['team_id'] ."' WHERE id = " . $_POST['member_ten'];
        $mysqli->query($query);

        $query = "UPDATE kids SET team='". $_POST['teamname'] ."' WHERE id = " . $_POST['member_one'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team='". $_POST['teamname'] ."' WHERE id = " . $_POST['member_two'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team='". $_POST['teamname'] ."' WHERE id = " . $_POST['member_three'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team='". $_POST['teamname'] ."' WHERE id = " . $_POST['member_four'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team='". $_POST['teamname'] ."' WHERE id = " . $_POST['member_foive'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team='". $_POST['teamname'] ."' WHERE id = " . $_POST['member_six'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team='". $_POST['teamname'] ."' WHERE id = " . $_POST['member_seven'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team='". $_POST['teamname'] ."' WHERE id = " . $_POST['member_eight'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team='". $_POST['teamname'] ."' WHERE id = " . $_POST['member_nine'];
        $mysqli->query($query);
        $query = "UPDATE kids SET team='". $_POST['teamname'] ."' WHERE id = " . $_POST['member_ten'];
        $mysqli->query($query);
        if ($res) {
            header("Location: kids/index.php");
        }
        else {
            echo "error";
        }
    }
?>