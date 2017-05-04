<?php
	session_start();

	// создаем директорию для загрузки фото
	@mkdir("img", 0777);

	// проверяем на наличие данных файла
	if(!$_FILES)
	{	header("location: user.php?do=erpict"); exit; }
	else
	{	// копируем файл
		copy($_FILES['pict']['tmp_name'],"img/".$_FILES['pict']['name']);
		header("location: user.php"); exit; }
?>