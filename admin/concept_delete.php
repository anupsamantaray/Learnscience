<?php
include_once("function.php");
//$name=htmlentities($_POST['uname']);
$id=$_GET['id1'];
$res=mysql_query("delete from `tblconcepts`  where `id`='$id'");
header("location:add_concepts.php");
?>