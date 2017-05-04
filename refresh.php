<?php
	session_start();

	if($_POST['id'] == '0') $_SESSION['currentnew'] = 1;
	else if($_POST['id'] == '999999') $_SESSION['currentnew'] = $_SESSION['countnew'];
	else if($_POST['id'] == '-1') $_SESSION['currentnew'] = $_SESSION['currentnew'] - 1;
	else $_SESSION['currentnew'] = $_POST['id'];

	header("location: index.php");
	exit();

?>