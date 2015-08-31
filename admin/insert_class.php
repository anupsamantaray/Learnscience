<?php
include_once("function.php");
if(isset($_POST['submit'])){
$name=htmlentities($_POST['uname'],ENT_QUOTES);
if($name!=""){
    $fet=mysql_query("select * from `student_class` where `class`='$name'")or die(mysql_error());
     $res=mysql_numrows($fet);
    if($res==0)
    {
        //echo "insert into `student_class` set `class`='$name'";
    $res=mysql_query("insert into `student_class` set `class`='$name'")or die(mysql_error());
	$msg="successfully added";
    }
	else{
	$msg="this is already exist";
	}
}
else{
$msg="Please Fillup All Required Fields";
}
}
header("location:class_add.php?msg=$msg");
?>
