<?php
include("function.php");
include("function1.php");
$id=(int)($_GET['id1']);
$sql="Delete from about_content where slno=".$id;
$result=$con->query($sql);
header("location:add_content_about.php");
?>