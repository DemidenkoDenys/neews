<?php
	session_start();

	// вывод ошибок
	// ini_set('display_errors', 1);
	// error_reporting(E_ALL);

	// проверка на ручной ввод
	if(!$_SESSION['login']) { header("location: index.php"); exit(); }
	// проверка на права редактора
	if($_SESSION['editor'] != 1){ header("location: user.php?do=error"); exit(); }

	include("db/getdata.php");
	$query = "SELECT new.*, categories.title AS titlecat FROM new, categories WHERE categories.id = new.id_category AND new.redaction = 0 AND new.editorcomment = ''";
	$new = get_data($query);

	if(isset($_GET['id'])) $_SESSION['editid'] = $_GET['id'];
	else $_SESSION['editid'] = $new[0]['id'];

	for($i = 0; $i < count($new); $i++)
		if($_SESSION['editid'] == $new[$i]['id']){
			$_SESSION['curedid'] = $i; }

	$query = "SELECT * FROM categories ORDER BY title";
	$categories = get_data($query);

	// инициализация данных даты
	date_default_timezone_set('UTC');
	$days = array(1=>'Понедельник',2=>'Вторник',3=>'Среда',4=>'Четверг',5=>'Пятница',6=>'Суббота',7=>'Воскресенье');
	$monthes = array(1=>'Января',2=>'Февраля',3=>'Марта',4=>'Апреля',5=>'Мая',6=>'Июня',7=>'Июля',8=>'Августа',9=>'Сентября',10=>'Октября',11=>'Ноября',12=>'Декабря');

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

	if($_GET['do'] == 'clear'){ print("<script language=javascript>window.alert('Заполните все поля!');</script>"); }
	if($_GET['do'] == 'redacted'){ print("<script language=javascript>window.alert('Выложено на сайт!');</script>"); }
	if($_GET['do'] == 'noredacted'){ print("<script language=javascript>window.alert('Новость отклонена!');</script>"); }

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Панель редактора</title>

		<link href="css/style.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<script src="js/bootstrap.js"></script>
		<script src="js/jquery-2.2.3.js"></script>
		<script src="js/main.js"></script>

	</head>
	<body>
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
						<div class="number col-lg-4 visible-lg">Редактирование</div>
						<div class="date col-xs-12 col-sm-8 col-lg-4"><? echo $days[date("N")].", ".date("j")." ".$monthes[date("n")].", ".date("Y") ?></div>
						<div class="since col-sm-4 col-lg-4 visible-sm visible-md visible-lg"><? echo $_SESSION['name']; ?></div>
					</div>
				</div>
			</div>

			<div class="row newlist">
				<div class="col-xs-12">
					<ol>
						<?php
							for ($i = 0; $i < count($new); $i++)
								echo '<li><a href="editor.php?id='.$new[$i]['id'].'">'.$new[$i]['title'].'<small>'.dateSite($new[$i]['date']).'</small></a></li>';
						?>
					</ol>
				</div>
			</div>

			<div class="row redaction">
				<?php $disable = ' style="display: none" '; if(count($new) > 0) $disable = '';
					echo '<form '.$disable.'action="correct.php" method="post" enctype="multipart/form-data" >';
				?>
					<div class="col-xs-12 title-new">
						<?php echo "<label for='name'>Название<input id='name' name='name' class='form-control' type='text' value='".$new[$_SESSION["curedid"]]["title"]."' autocomplete='off'></label>"; ?>
					</div>

					<div class="col-xs-12">
						<div class="row add">
							<div class="col-xs-4">
								<label for="categories">Категория
									<select class="form-control" id="categories" name="cat">
										<?php
											foreach($categories as &$c){
												$sel = ''; if($new[$_SESSION['curedid']]['titlecat'] == $c['title']) $sel = 'selected';
												echo "<option value='".$c['id']."' ".$sel.">".$c['title']."</option>";
											}
										?>
									</select>
								</label>
								<label class="label-add-picture btn btn-primary" for="picture">Картинка</label>
								<input type="file" id="picture" name="pict" class="form-control">
								<img class="picture-preview" src="<?php echo $new[$_SESSION['curedid']]['picture']; ?>" alt="" nocache>
							</div>

							<div class="col-xs-8">
								<label for="text">Текст новости<textarea id="text" name="text" class="form-control"><?php echo $new[$_SESSION['curedid']]['text'] ?></textarea></label>
							</div>
						</div>
					</div>

					<div class="col-xs-12 editor-comment">
						<label for="edcomment">Ваш комментарий<input id="edcomment" name="edcomment" class="form-control" type="text" placeholder="ВНИМАНИЕ! оставьте комментарий пустым, чтобы статья попала в жернал!"></label>
					</div>
					<input class="redact" name="redact" type="text" value="0">
				</div>

				<div class="row control">
					<div class="col-xs-12">
						<a class="btn btn-default editor-panel" href="user.php">В панель журналиста...</a>
						<a class="btn btn-default editor-panel" href="index.php?do=logout">На сайт...</a>
						<?php 
							if(count($new) > 0){
								echo '<input type="submit" class="btn btn-primary approve" value="Утвердить" '.$disable.'>';
								echo '<input type="submit" class="btn btn-default ban" value="Отклонить"'.$disable.'>'; }
						?>
						
					</div>
				</div>
			</form>

			<div class="row footer">
				<div class="col">
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

	</body>
</html>