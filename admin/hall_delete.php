<?php
include_once("function.php");

	$slno=$_GET['id1'];
	mysql_query("delete from `halloffame_image` where `id`='$slno'");
header("location:hallimage.php");
?>