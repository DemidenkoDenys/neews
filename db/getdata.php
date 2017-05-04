<?php
	include ("database.php");

	//=================== ПОЛУЧИТЬ ДАННЫЕ ====================//
	function get_data($sql)
	{
		$link = db_connect();
		$db_data = array();

		$result = mysqli_query($link, $sql);

		if(!$result) die(mysqli_error($link));
		$n = mysqli_num_rows($result);

		for($i = 0; $i < $n; $i++)
			$db_data[] = mysqli_fetch_assoc($result);

		return $db_data;
		// mysqli_close($link);
	}

	function set_data($sql)
	{
		$link = db_connect();
		mysqli_query($link, $sql);
	}
?>