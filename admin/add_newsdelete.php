<?php
include_once("function.php");

	$slno=$_GET['id1'];
	mysql_query("delete from `news` where `slno`='$slno'");
header("location:add_news.php");
?>