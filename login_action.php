<?php
include_once("function.php");
if(isset($_POST['submit'])){
	$err="";
    $un=htmlentities($_REQUEST['usrname']);
    $ps=htmlentities($_REQUEST['pass']);
    $fet_admin=mysql_query("select * from `adminlogin` where `username`='$un' and `password`='$ps'") or die(mysql_error());
	if(mysql_num_rows($fet_admin)>0){
		$relt = mysql_fetch_assoc($fet_admin);
		$_SESSION['name1']=$res['username'];
		$_SESSION['id']=$relt['id'];
		$_SESSION['admin_type']=$relt['admin_type'];
		if($relt['admin_type'] == 1){
			header("location:admin/question_add.php");
		}else{
			header("location:admin/class_add.php");
		}
	}else{
		$fet=mysql_query("select * from `login` where `email`='$un' and `password`='$ps'") or die(mysql_error());	
		if( $res=mysql_fetch_array($fet)){
			$pass=$res['password'];
			$stat=$res['status'];
			$slno=$res['slno'];
			$class=$res['class'];
			if($pass==$ps && $stat==0){
				$_SESSION['name']=$res['name'];
				$_SESSION['email']=$res['email'];
				$_SESSION['slno']=$slno;
				$_SESSION['class']=$class;
				if(isset($_SESSION['name'])){
					header("location:courses/index.php");
				}
			}elseif($pass==$ps && $stat==1){
				$_SESSION['name1']=$res['name'];
				$_SESSION['id']=$slno;
				if(isset($_SESSION['name1'])){
					header("location:admin/class_add.php");
				}
			}else{
				$err="CREATE AN ACCOUNT TO LOGIN";
				header("location:login.php?msg=$err");}
		}else{
			$err="Wrong Password";
			header("location:login.php?msg=$err");
		}
	}
}
?>