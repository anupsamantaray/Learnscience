<?php
include_once("function.php");
if(isset($_POST['submit']))
{
$classid=htmlentities($_POST['selcls'],ENT_QUOTES);
$subjectid=htmlentities($_POST['sub'],ENT_QUOTES);
//$topid=htmlentities($_POST['topicname'],ENT_QUOTES);
$year=htmlentities($_POST['year'],ENT_QUOTES);
 $oldquestionimage =$_FILES['oldquestion']['name'];
 //echo  $ebookimage;
if($classid!="" && $subjectid!=""  && $oldquestionimage!="" && $year!="" ||  $topid!="")
{
    
$ext1=end(explode(".", $_FILES["oldquestion"]["name"]));
//echo $ext1;
if($ext1=="doc" || $ext1=="txt" || $ext1=="pdf" )

                                               {
//echo "aaa";
                                                $folder="image/";

                                                $filename = $folder . $oldquestionimage;
												echo $filename;
                                               
                                                $copied = copy($_FILES['oldquestion']['tmp_name'], $filename);
     $fet=mysql_query("select * from `oldquestion` where `class_id`='$classid' and `subject_id`='$subjectid' and `oldquestion`='$filename' and `year`='$year'")or die(mysql_error());
    $res=mysql_numrows($fet);
    if($res==0)
    {
	mysql_query("insert into `oldquestion` set `class_id`='$classid',`subject_id`='$subjectid',`oldquestion`='$filename',`year`='$year'") or die(mysql_error());
	//echo "insert into `oldquestion` set `class_id`='$classid',`subject_id`='$subjectid',`topic_id`='$topid',`oldquestion`='$filename',`year`='$year'";
	$msg="successfully added";
	}
	else{
	$msg="this is already exist";
	}


}
}
else{
$msg="Please Fillup All Required Fields";
}
}
header("location:oldquestion.php?msg=$msg");
?>
