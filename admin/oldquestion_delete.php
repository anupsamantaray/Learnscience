<?php
include_once("function.php");
$id=$_GET['id1'];
$res=mysql_query("delete from `oldquestion`  where `id`='$id'");
header("location:oldquestion.php");
?>