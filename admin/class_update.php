<?php
include_once("function.php");
$name=htmlentities($_POST['uname'],ENT_QUOTES);
$id=$_POST['hidden_id'];
$res=mysql_query("update `student_class` set `class`='$name' where `id`='$id'");
header("location:class_add.php");
?>
