<?php
	ini_set('session.use_trans_sid', true);
	session_start();

	// вывод ошибок
	//ini_set('display_errors', 1);
	//error_reporting(E_ALL);

	include("db/getdata.php");

	// проверка получения данных через форму и на ручной ввод
	if($_POST)
	{
		$login = $_POST['login'];

		// получение данных из БД
		$query = "SELECT * FROM user WHERE login = '".$login."'";
		$user = get_data($query);
		$_SESSION['editor'] = $user[0]['editor'];
		$_SESSION['name'] = $user[0]['name'];
		$_SESSION['login'] = $user[0]['login'];
		$_SESSION['id'] = $user[0]['id'];

		// проверка логина и пароля
		if(	$_POST['login'] == "" or 
			$_POST['pass'] == "" or 
			$login != $user[0]['login'] or 
			$_POST['pass'] != $user[0]['password'])
		{ header("location: index.php?do=error"); exit(); }

		unset($_POST);
	}
	else
		if(isset($_SESSION['login'])) $login = $_SESSION['login'];
		else { header("location: index.php"); exit(); }

	// получаем категории
	$query = "SELECT * FROM categories ORDER BY title";
	$categories = get_data($query);

	// инициализация данных даты
	date_default_timezone_set('UTC');
	$days = array(1=>'Понедельник',2=>'Вторник',3=>'Среда',4=>'Четверг',5=>'Пятница',6=>'Суббота',7=>'Воскресенье');
	$monthes = array(1=>'Января',2=>'Февраля',3=>'Марта',4=>'Апреля',5=>'Мая',6=>'Июня',7=>'Июля',8=>'Августа',9=>'Сентября',10=>'Октября',11=>'Ноября',12=>'Декабря');

	// сообщение об отсутствии прав редактора
	if($_GET['do'] == 'error'){ print("<script language=javascript>window.alert('Вы не являетесь редактором!');</script>"); }
	if($_GET['do'] == 'added'){ print("<script language=javascript>window.alert('Статья добавлена! Она появится на сайте после одобрения корректором!');</script>"); }
	if($_GET['do'] == 'clear'){ print("<script language=javascript>window.alert('Заполните все поля!');</script>"); }


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Панель журналиста</title>

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

		<script src="js/jquery-2.2.3.js"></script>
		<script src="js/main.js"></script>

	</head>
	<body>
		<div class="container">
			<div class="row header main">
				<div class="col-xs-12">
					<h1>neews</h1>
					<p>Самые важные новости мира</p>
					<div><div class="abstract"></div></div>
				</div>
			</div>

			<div class="row stat main">
				<div class="col-xs-12">
					<div class="row">
						<div class="number col-lg-4 visible-lg">Добавление новости в #<?echo $_SESSION['number']?></div>
						<div class="date col-xs-12 col-sm-8 col-lg-4"><? echo $days[date("N")].", ".date("j")." ".$monthes[date("n")].", ".date("Y") ?></div>
						<div class="since col-sm-4 col-lg-4 visible-sm visible-md visible-lg"><? echo $_SESSION['name']; ?></div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 add">
					<div class="row add">
						<form action="addnew.php" method="post" enctype="multipart/form-data" >
							<div class="col-xs-4">
								<label for="name">Название<input id="name" name="name" class="form-control" type="text" placeholder="Введите название новости..."></label>
								<label for="categories">Категория
									<select class="form-control" id="categories" name="cat">
										<option style="color: grey" value="0" hidden disabled selected>Выберите категорию...</option>
										<?php foreach($categories as &$c) echo "<option value='".$c['id']."'>".$c['title']."</option>" ?>
									</select>
								</label>
								<label class="label-add-picture btn btn-primary" for="picture">Выберите картинку</label>
								<input type="file" id="picture" name="pict" class="form-control">
								<img class="picture-preview" src="img/clear.png" alt="" nocache>
							</div>

							<div class="col-xs-8">
								<label for="text">Текст новости<textarea id="text" name="text" class="form-control" placeholder="Введите текст новости..."></textarea></label>
							</div>

							<div class="col-xs-12">
								<? if($_SESSION['editor'] == 1) echo "<a class='btn btn-default editor-panel' href='editor.php'>Перейти в панель редактора</a>"?>
								<input type="submit" class="btn btn-primary submit" value="Добавить">
								<input type="reset" class="btn btn-default" value="Очистить">
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="row footer">
				<div class="col-xs-12">
					<ul>
						<li><a href="index.php?do=logout">Вернуться на сайт</a></li>
						<li><a>Стать редактором</a></li>
						<li><a>Правовая информация</a></li>
						<li><a>Онлайн-подписка</a></li>
						<li><a>Подписка на газету</a></li>
						<li><a>Карта сайта</a></li>
						<li><a>RSS</a></li>
					</ul>
					<br><br><p><i>ОАО «Журнал Neews»<br>info@neews.ua © 2016, все права защищены ООО «Ньювз»<br>127015, г. Харьков, Московский проезд, д.14, стр.2.<br>Тел.: (093) 748–87–04. Факс (096) 663–38–12.</i></p>
				</div>
			</div>
		</div>

		<script src="js/bootstrap.js"></script>

	</body>
</html>