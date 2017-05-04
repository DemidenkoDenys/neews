<?php
	session_start();

	include('db/setdata.php');

	if($_POST['name'] == "" or $_POST['text'] == "" or $_POST['cat'] == 0)
	{	header("location: editor.php?do=clear");
		exit();   }
	else
	{
		if($_POST['redact'] == 1)
		{
			$query = "UPDATE new SET redaction = 1, text='".$_POST['text']."', title='".$_POST['name']."', id_category='".$_POST['cat']."', editorcomment='".$_POST['edcomment']."' WHERE id = '".$_SESSION['editid']."'";
			set_data($query);
			header("location: editor.php?do=redacted");
			exit();
		}
		else if($_POST['redact'] == 0)
		{
			$query = "UPDATE new SET editorcomment='".$_POST['edcomment']."' WHERE id = ".$_SESSION['editid'];

			set_data($query);
			header("location: editor.php?do=noredacted");
			exit();
		}
		else
			{	header("location: editor.php?do=clear");
				exit();	}
	}

	echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8">
	<title>Document</title></head><body>'.$_SESSION['editid'].'</body></html>';

?>

