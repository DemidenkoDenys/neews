<?php
	include ("database.php");

	function set_data($sql)
	{
		$link = db_connect();
		mysqli_query($link, $sql);
		mysqli_close($link);
	}
?>