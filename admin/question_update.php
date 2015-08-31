<?php
include_once("function.php");
$question=htmlentities($_POST['question'],ENT_QUOTES);
$id=$_POST['hidden_id1'];
$res=mysql_query("update `student_question` set `questions`='$question' where `id`='$id'");
header("location:question_add.php");
?>
