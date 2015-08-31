<?php
include_once("function.php");
$id=$_GET['id1'];
$res=mysql_query("delete from `student_answer`  where `id`='$id'");
header("location:answer_add.php");
?>
