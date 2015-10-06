<?php
try{
session_start();
}
catch(Exception $e){
}
	//$con=mysql_connect("localhost","learnsci_twcta","hHeOhbPMtR&F") or die(mysql_error());
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	$db=mysql_select_db("learnsci_kriti",$con)or die(mysql_error());
?>