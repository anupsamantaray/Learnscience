<?php
include_once('function.php');
if($_GET['uid'])
{
    $uid=$_GET['uid'];
        if($uid!=""){
	    $fet=mysql_query("select * from `login` where `name`='$uid'");
	    $res=mysql_fetch_array($fet);
	    $class=$res['class']+1;
	    mysql_query("update `login` set `class`='$class' where `name`='$uid'");
	    $msg="you are sucessfully promoted";
        }
        else{$msg="promotion failed";}
        header("location:index.php?msg=$msg");
    }
    ?>