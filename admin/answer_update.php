<?php
include_once("function.php");
$answer=htmlentities($_POST['answer'],ENT_QUOTES);
$id=$_POST['hidden_id1'];
$corect=htmlentities($_POST['corect'],ENT_QUOTES);
$desc='';
foreach ($_POST['anns'] as $un) {
$desc.=$un.'|';
}
$res=mysql_query("update `student_answer` set `answers`='$desc',`correctanswer`='$corect' where `id`='$id'");
header("location:answer_add.php");
?>
