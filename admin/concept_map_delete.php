<?php
include_once("function.php");
$id=$_GET['id1'];
$res=mysql_query("delete from `student_concept_maps` where `id`='$id'");           
header("location:addConceptMap.php");
?>

