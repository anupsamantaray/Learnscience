<?php
include_once("function.php");
if(isset($_POST['submit'])){
$classid=htmlentities($_POST['sell'],ENT_QUOTES);
$subjectid=htmlentities($_POST['sub'],ENT_QUOTES);
$topname=htmlentities($_POST['topname'],ENT_QUOTES);
if($classid!="" && $subjectid!="" && $topname!="")
{
    $fet=mysql_query("select * from `student_topic` where  `class_id`='$classid' and `subject_id`='$subjectid' and `topic`='$topname'")or die(mysql_error());
    $res=mysql_numrows($fet);
    if($res==0)
    {
        //echo "insert into `student_topic` set `class_id`='$classid',`subject_id`='$subjectid',`topic`='$topname'";
        $res1=mysql_query("insert into `student_topic` set `class_id`='$classid',`subject_id`='$subjectid',`topic`='$topname'");
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
header("location:topic_add.php?msg=$msg");
?>
