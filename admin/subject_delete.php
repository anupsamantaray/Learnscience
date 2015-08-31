<?php
include_once("function.php");
$id=$_GET['id1'];
$res=mysql_query("delete from `student_subject`  where `id`='$id'");
header("location:subject_add.php");
?>
