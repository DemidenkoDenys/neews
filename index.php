<?php
	ini_set('session.use_trans_sid', true);
	session_start();
	//ini_set('display_errors', 1);
	//error_reporting(E_ALL);

	include("db/getdata.php");

	// закрытие сессии
	if($_GET['do'] == 'logout'){ session_unset(); session_destroy(); }
	// ошибка авторизации 
	if($_GET['do'] == 'error') print("<script language=javascript>window.alert('Такого пользователя нет!');window.location = 'index.php';</script>");

	$query = 'SELECT max(id) AS maxnum FROM numbers';
	$maxnumber = get_data($query);
	if(!isset($_SESSION['number'])) $_SESSION['number'] = $maxnumber[0]['maxnum'];
	if($_GET['num']) $_SESSION['number'] = $_GET['num'];

	$query = "SELECT new.*, categories.title AS titlecat FROM new, categories WHERE new.id_category = categories.id AND new.id_number = ".$_SESSION['number']." AND redaction = 1 AND editorcomment = '' ORDER BY new.id DESC";
	$news = get_data($query);
	$_SESSION['countnew'] = count($news);

	if($_GET['id']){
		$_SESSION['currentid'] = $_GET['id'];
		$news = get_data($query);

		if(count($news) == 0) { header("location: index.php"); exit(); }

		$query = "UPDATE new SET views = views + 1 WHERE id = ".$_GET['id']." AND  id_number = ".$_SESSION['number'];
		set_data($query);
	}
	else $_SESSION['currentid'] = $news[0]['id'];

	for($i = 0; $i < count($news); $i++)
		if($_SESSION['currentid'] == $news[$i]['id']){
			$_SESSION['currentnew'] = $i; }

	// список самых популярных новостей
	$query = "SELECT new.*, categories.title AS titlecat FROM new, categories WHERE new.id_category = categories.id AND new.id_number = ".$_SESSION['number']." ORDER BY new.like + new.views - new.unlike DESC";
	$topnews = get_data($query);

	// список категорий
	$query = "SELECT * FROM categories";
	$cats = get_data($query);

	// инициализация данных даты
	date_default_timezone_set('UTC');
	$days = array(1=>'Понедельник',2=>'Вторник',3=>'Среда',4=>'Четверг',5=>'Пятница',6=>'Суббота',7=>'Воскресенье');
	$monthes = array(1=>'Января',2=>'Февраля',3=>'Марта',4=>'Апреля',5=>'Мая',6=>'Июня',7=>'Июля',8=>'Августа',9=>'Сентября',10=>'Октября',11=>'Ноября',12=>'Декабря');

	function formchar($p){ return nl2br(htmlspecialchars(trim($p), ENT_QUOTES), false); }
	function dateSite($t){
		$monthes2 = array(Jan=>'Января', Feb=>'Февраля', Mar=>'Марта', Apr=>'Апреля', May=>'Мая', Jun=>'Июня', Jul=>'Июля', Aug=>'Августа', Sep=>'Сентября', Oct=>'Октября',Nov=>'Ноября', Dec=>'Декабря');
		$datenew = date_create($t);
		if(date('j') == date_format($datenew, 'd') and date('m') == date_format($datenew, 'm'))
			{ $d = 'Сегодня '; $m = ''; }
		else if(date('j') - 1 == date_format($datenew, 'd') and date('m') == date_format($datenew, 'm'))
			{ $d = 'Вчера '; $m = ''; }
		else{ $d = date_format($datenew, 'd').' '; $m = $monthes2[date_format($datenew, 'M')].' '; }
		$h = date_format($datenew, 'H:i');
		return $d.$m.$h;
	};
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Neews - новости со всего мира</title>
		<link rel="shortcut icon" href="/img/icon.ico" type="image/x-icon">

		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-social.css" rel="stylesheet">

		<link href="css/style.css" rel="stylesheet">
		<link href="css/font-awesome.css" rel="stylesheet">

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<script src="js/jquery-2.2.3.js"></script>
		<script src="js/main.js"></script>

	</head>
	<body>
		<div class="modal fade" id="modal-id">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Авторизация</h4>
					</div>
					<div class="modal-body">
						<form class="form-inline" action="user.php" method="post">
							<input type="text" class="form-control input-small" placeholder="Email" name="login" value="admin">
							<input type="password" class="form-control input-small" placeholder="Password" name="pass" value="admin">
							<br><br><input type="button" class="btn btn-default" data-dismiss="modal" value='Отмена'>
							<input class="btn btn-primary" name="submit" type="submit" value="Войти">
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row header main">
				<div class="col">
					<h1>neews</h1>
					<p>Самые важные новости мира</p>
					<div><div class="abstract"></div></div>
				</div>
			</div>

			<div class="row stat main">
				<div class="col-xs-12">
					<div class="row">
						<div class="number col-lg-1 visible-lg">
							<?php
								if($_SESSION['number'] > 1) echo '<a href="index.php?num='.($_SESSION['number'] - 1).'"><span class="glyphicon glyphicon-chevron-left"></span></a>';
								echo '<b>#'.$_SESSION['number'].'</b>';
								if($_SESSION['number'] < $maxnumber[0]['maxnum']) echo '<a href="index.php?num='.($_SESSION['number'] + 1).'"><span class="glyphicon glyphicon-chevron-right"></span></a>';
							?>
						</div>

						<div class="col-lg-2 visible-lg"></div>
						<div class="date col-xs-12 col-sm-8 col-lg-6"><? echo $days[date("N")].", ".date("j")." ".$monthes[date("n")].", ".date("Y") ?></div>
						<div class="since col-sm-4 col-lg-3 visible-sm visible-md visible-lg">с 1875 года</div>
					</div>
				</div>
			</div>

			<div class="row sidebar">
				<div class="category bar col-lg-3 visible-lg">
					<h1>Категории</h1>

					<?php
						$n = 0;
						for($i = 0; $i < count($cats) and $n < 15; $i++)
						{
							$g = 0;
							for($nw = 0; $nw < count($news) and $n < 15 and $g < 4; $nw++)
							{
								if($news[$nw]['id_category'] == $cats[$i]['id'])
								{
									if($g == 0){ echo '<h3>'.$cats[$i]['title'].'</h3>'; $g = 1; }
									echo '<a class="new-by-category" href="index.php?num='.$_SESSION['number'].'&id='.$news[$nw]['id'].'"><span>'.$news[$nw]['title'].'</span><br><small>'.dateSite($news[$nw]['date']).'</small></a>';
									$n++; $g++;
								}
							}
						}
					?>

				</div>

				<div class="mainews col-sm-8 col-lg-6">
					<?php
						for($i = 0; $i < count($news); $i++)
							if($news[$i]['id'] == $_SESSION['currentid']){
								echo "<img src='".$news[$i]['picture']."' alt='".$news[$i]['title']."' title='".$news[$i]['title']."'>";
								echo '<div class="row preview"><div class="col-xs-4 col-md-4">';
								echo '<small class="public"><span class="glyphicon glyphicon-dashboard"></span>'.dateSite($news[$i]['date']).'</small>';
								echo '</div><div class="col-md-3 hidden-xs hidden-sm">';
								echo '<small class="categ"><span class="glyphicon glyphicon-list-alt"></span>'.$news[$i]['titlecat'].'</small>';
								echo '</div><div class="col-xs-8 col-md-5">';
								echo '<small class="unlikes"><span class="glyphicon glyphicon-thumbs-down"></span>'.$news[$i]['unlike'].'</small>';
								echo '<small class="likes"><span class="glyphicon glyphicon-thumbs-up"></span>'.$news[$i]['like'].'</small>';
								echo '<small class="comments"><span class="glyphicon glyphicon-comment"></span>'.$news[$i]['comments'].'</small>';
								echo '<small class="views"><span class="glyphicon glyphicon glyphicon-eye-open"></span>'.$news[$i]['views'].'</small></div></div>';
								echo '<h1 class="mainew" data-link='.$news[$i]['id'].'>'.$news[$i]['title'].'</h1>';
								echo "<p>".formchar($news[$i]['text'])."</p>";
							}
					?>

					<div class="row navigate">
						<div class="col-xs-12">
							<div class="btn-toolbar">
								<div class="btn-group">
								<?php
									$disable = 'disabled'; if($_SESSION['currentnew'] > 3) $disable = '';
									echo '<a href=index.php?id='.$news[0]['id'].' class="btn btn-default backward '.$disable.'"><span class="glyphicon glyphicon glyphicon-step-backward"></span></a>';

									$disable = 'disabled'; if($_SESSION['currentnew'] > 0) $disable = '';
									echo '<a href=index.php?id='.$news[$_SESSION['currentnew'] - 1]['id'].' class="btn btn-default left '.$disable.'"><span class="glyphicon glyphicon-chevron-left"></span></a>';

									if($_SESSION['currentnew'] < 4) $from = 0; else $from = $_SESSION['currentnew'] - 3;
									if($_SESSION['currentnew'] + 4 > $_SESSION['countnew']) $to = $_SESSION['countnew']-1; else $to = $_SESSION['currentnew'] + 3;

									for($i = $from; $i <= $to; $i++){
										if($i == $_SESSION['currentnew']) echo '<a href=index.php?id='.$news[$i]['id'].' class="btn btn-default current disabled">'.($_SESSION['currentnew'] + 1).'</a>';
										else echo '<a href=index.php?id='.$news[$i]['id'].' class="btn btn-default to">'.($i + 1).'</a>'; }

									$disable = 'disabled'; if($_SESSION['countnew'] - $_SESSION['currentnew'] > 1) $disable = ''; 
									echo '<a href=index.php?id='.$news[$_SESSION['currentnew'] + 1]['id'].' class="btn btn-default right '.$disable.'" '.$disable.'><span class="glyphicon glyphicon-chevron-right"></span></a>';

									$disable = 'disabled'; if($_SESSION['countnew'] - $_SESSION['currentnew'] > 4) $disable = '';
									echo '<a href=index.php?id='.$news[count($news) - 1]['id'].' class="btn btn-default forward '.$disable.'" '.$disable.'><span class="glyphicon glyphicon glyphicon-step-forward"></span></a>';
								?>

								</div>
							</div>
						</div>
					</div>

					<div class="row socials">
						<div class="col-xs-7 social-likes">

						<?php

							$sharePicture = $news[$_SESSION['currentnew']]['picture'];
							$shareText = str_replace('"','',$news[$_SESSION['currentnew']]['text']);
							$shareTitle = str_replace('"','',$news[$_SESSION['currentnew']]['title']);

							echo "<a class='btn btn-block btn-social btn-xs btn-facebook disabled'><span class='fa fa-facebook'></span>facebook</a>";
							echo "<a class=\"btn btn-block btn-social btn-xs btn-vk\" onclick=\"Share.vkontakte('http://neews.ua','".$shareTitle."','http://demidenko.foxmir.com/neews/".$sharePicture."','".$shareTitle."')\" target=\"_blank\"><span class=\"fa fa-vk\"></span>вконтакте</a>";
							echo "<a class='btn btn-block btn-social btn-xs btn-twitter disabled'><span class='fa fa-twitter'></span>twitter</a>";
							echo "<a class='btn btn-block btn-social btn-xs btn-odnoklassniki disabled'><span class='fa fa-odnoklassniki'></span>одноклассники</a>";
							echo "<a class='btn btn-block btn-social btn-xs btn-google disabled'><span class='fa fa-google'></span>google+1</a>";
						?>

						</div>
						<div class="col-xs-5">
							<a class="btn btn-block btn-social btn-xs btn-like disabled"><span class="fa fa-like"></span>Нравится</a>
							<a class="btn btn-block btn-social btn-xs btn-unlike disabled"><span class="fa fa-unlike"></span>Не нравится	</a>
						</div>
					</div>

				</div>

				<div class="top col-sm-4 col-lg-3">
					<h1>Топ новостей</h1>

					<?php
						$n = 10; if(count($news) < 10) $n = count($news);
						for($i = 0; $i < $n; $i++)
							echo '<div class="new-by-top"><a href="index.php?id='.$topnews[$i]['id'].'"><span>'.$topnews[$i]['title'].'</span> '.substr(formchar($topnews[$i]['text']), 0, 200).'</a></div>';
					?>

				</div>
				<div class="clearfix"></div>
			</div>

			<div class="row footer">
				<div class="col">
					<ul>
						<li><a data-target="#modal-id" data-toggle="modal" href="#">Добавить статью</a></li>
						<li><a>Реклама</a></li>
						<li><a>Рассылка в СМИ</a></li>
						<li><a>Правовая информация</a></li>
						<li><a>Онлайн-подписка</a></li>
						<li><a>Подписка на газету</a></li>
						<li><a>Карта сайта</a></li>
						<li><a>RSS</a></li>
					</ul>
					<br><br><p style="font-size: 14px"><i>ОАО «Журнал Neews»<br>info@neews.ua © 2016, все права защищены ООО «Ньювз»<br>127015, г. Харьков, Московский проезд, д.0, стр.0.<br>Тел.: (093) 000–00–00. Факс (096) 000–00–00.</i></p>
				</div>
			</div>
		</div>

		<script src="js/bootstrap.js"></script>

	</body>
</html>