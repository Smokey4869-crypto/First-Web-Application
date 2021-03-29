<?php
	session_start();
	$sql_table = "attempts";
	$name = $_POST["name"];
	$id = $_POST["id"];
	$_SESSION["query"] = "select form $sql_table where firstname like '$name' or lastname like '$name' or student_id like '$id'";
	header("location:manage.php");
?>