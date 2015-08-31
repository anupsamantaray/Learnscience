<?php
include_once("function.php");
$id=$_GET['id1'];
$res=mysql_query("delete from `extra_detail` where `id`='$id'");           
header("location:extra_add.php");
?>

