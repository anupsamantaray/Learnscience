<?php
include_once("function.php");
$id=$_GET['id1'];
$res=mysql_query("delete from adminlogin  where id='$id'");
header("location:addSubAdmin.php");
?>
