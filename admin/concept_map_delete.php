<?php
include_once("function.php");
$id=$_GET['id1'];
$srch = mysql_query("SELECT * FROM student_concept_maps WHERE `id`='$id'");
$rslt = mysql_fetch_assoc($srch);
unlink($rslt['map_image']);
$res=mysql_query("delete from `student_concept_maps` where `id`='$id'");           
header("location:addConceptMap.php");
?>

