<?php
include_once("function.php");
$id=$_GET['id1'];
$res=mysql_query("delete from `student_topic`  where `id`='$id'");
header("location:topic_add.php");
?>
