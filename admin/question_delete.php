<?php
include_once("function.php");
$id=$_GET['id1'];
$res=mysql_query("delete from `student_question`  where `id`='$id'");
header("location:question_add.php");
?>
