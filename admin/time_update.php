<?php
include_once("function.php");
$name=htmlentities($_POST['uname'],ENT_QUOTES);
$name1=htmlentities($_POST['uname1'],ENT_QUOTES);
$name2=htmlentities($_POST['uname2'],ENT_QUOTES);
$id=$_POST['hidden_id'];
$res=mysql_query("update `time` set `time`='$name',`time1`='$name1',`time2`='$name2' where `id`='$id'");
header("location:time_add.php");
?>
