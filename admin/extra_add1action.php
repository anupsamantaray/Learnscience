<?php
include_once("function.php");
if(isset($_POST['submit']))
{
$classid=htmlentities($_POST['selcls'],ENT_QUOTES);
$subjectid=htmlentities($_POST['sub'],ENT_QUOTES);
$topid=htmlentities($_POST['topicname'],ENT_QUOTES);
$videodetail=htmlentities($_POST['videodetails'],ENT_QUOTES);
$video =$_FILES['video']['name'];
 //echo  $ebookimage;
if($classid!="" && $subjectid!="" && $topid!="" && $video!="" && $videodetail!="")
{   
        $ext=end(explode(".", $_FILES["video"]["name"]));

if($ext=='mpg' || $ext=='wmv' || $ext=='mp4' ||$ext=='swf'||$ext=='flv')

    {
        $folder1="video/";
        $filename1 = $folder1 . $video;
       $copied = copy($_FILES['video']['tmp_name'], $filename1);
    }
	mysql_query("insert into `extra_detail` set `class_id`='$classid',`subject_id`='$subjectid',`topic_id`='$topid',`video`='$filename1',`videodetails`='$videodetail'") or die(mysql_error());
	//echo "insert into `extra_detail` set `class_id`='$classid',`subject_id`='$subjectid',`topic_id`='$topid',`ebook`='$filename',`video`='$filename1'";
	$msg="successfully added";
}
header("location:extra_add1.php?msg=$msg");
}
?>
