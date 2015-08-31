<?php
include_once("../function.php");
include_once("../function1.php");
$m=intval( $_GET['m']);
$sql= "UPDATE `learnsci_kriti`.`student_result` SET `Publish` = 'Yes' WHERE `student_result`.`index` = ".$m.";";
$result= $con->query($sql);
header("Location:ShowQuizes.php");
?>