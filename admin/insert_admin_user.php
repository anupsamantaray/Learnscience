<?php
include_once("function.php");
if(isset($_POST['submit'])){
	$txtadusername=htmlentities($_POST['txtadusername'],ENT_QUOTES);
	$txtadpaassword=htmlentities($_POST['txtadpaassword'],ENT_QUOTES);
	if(!empty($txtadusername) && !empty($txtadpaassword)){
		$fet=mysql_query("select * from `adminlogin` where `username`='$txtadusername'")or die(mysql_error());
		$res=mysql_num_rows($fet);
		if($res==0){
			mysql_query("insert into `adminlogin` (username, password, admin_type) values ('".$txtadusername."', '".$txtadpaassword."', '1')")or die(mysql_error());
			$msg="Sub admin added successfully.";
		}else{
			$msg="Sub admin already exists with this username. Try different username";
		}
	}else{
		$msg="Username and password both must be given.";
	}
}
header("location:addSubAdmin.php?msg=$msg");
?>