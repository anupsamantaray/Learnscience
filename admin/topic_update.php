<?php
include_once("function.php");
$topic=htmlentities($_POST['topic'],ENT_QUOTES);
$id=$_POST['hidden_id2'];
$res=mysql_query("update `student_topic` set `topic`='$topic' where `id`='$id'");
header("location:topic_add.php");
?>
