<?php
include_once("function.php");
$name=htmlentities($_POST['uname']);
$id=$_GET['id1'];
$res=mysql_query("delete from `student_class`  where `id`='$id'");
header("location:class_add.php");
?>
