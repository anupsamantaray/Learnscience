<?php
include_once("function.php");
session_destroy();
ob_flush();
header('location:index1.php');
?>

