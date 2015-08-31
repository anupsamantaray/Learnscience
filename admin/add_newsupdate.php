<?php
include_once("function.php");
if(isset($_POST['submit']))
{
	$news=$_REQUEST['news'];
	$slno=$_REQUEST['slno'];
	mysql_query("update `news` set `news`='$news' where `slno`='$slno'");
}
header("location:add_news.php");
?>