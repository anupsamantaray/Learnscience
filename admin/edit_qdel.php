<?php
include_once("function.php");
$id=$_GET['id1'];
mysql_query("delete from `student_question` where `id`='$id'");
$msg="Sucessfully Deleated !";
header("location:edit_question.php?msg=$msg");
?>
