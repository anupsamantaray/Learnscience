<?php
include_once("function.php");
$name=htmlentities($_POST['uname'],ENT_QUOTES);
$id=$_POST['hidden_id'];
$res=mysql_query("update `tblconcepts` set `concept`='$name' where `id`='$id'");
header("location:add_concepts.php");
?>
