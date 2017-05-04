<?php
	session_start();

	include('db/setdata.php');

	if($_POST['name'] == "" or $_POST['text'] == "" or $_POST['cat'] == 0 or !copy($_FILES['pict']['tmp_name'],"img/".$_FILES['pict']['name']))
	{	header("location: user.php?do=clear");
		exit();
		unset($_FILES); }
	else
	{	$pict = $_FILES['pict']['name'];

		$query = "INSERT INTO new (
			id,
			id_category,
			id_number,
			id_user,
			title,
			text,
			date,
			picture,
			redaction)
		VALUES (
			NULL,
			".$_POST['cat'].",
			".$_SESSION['number'].",
			".$_SESSION['id'].",
			'".$_POST['name']."',
			'".$_POST['text']."',
			NOW(),
			'img/".$pict."',
			0);";

		set_data($query); }

	header("location: user.php?do=added");
	exit();
?>