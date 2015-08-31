<?php
include_once("function.php");
if(isset($_POST['submit']))
{
$classid=htmlentities($_POST['selcls'],ENT_QUOTES);
$subjectid=htmlentities($_POST['sub'],ENT_QUOTES);
$topid=htmlentities($_POST['topicname'],ENT_QUOTES);
$ebookimage =$_FILES['ebook']['name'];
$priority=$_REQUEST['priority'];
if( $ebookimage!="" && $classid!=""  && $subjectid!=""  && $topid!="")
{
$ext1=end(explode(".", $_FILES["ebook"]["name"]));
//echo $ext1;
if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif" || $ext1=="pdf" || $ext1=="txt")
    {
        $folder="image/";
        $filename = $folder . $ebookimage;
        //echo $filename;
        $copied = copy($_FILES['ebook']['tmp_name'], $filename);
	//echo "insert into `quiz` set `quiz`='$filename',`status`='$priority',`classid`='$classid',`subjectid`='$subjectid',`topicid`='$topid'";
	mysql_query("insert into `quiz` set `quiz`='$filename',`status`='$priority',`classid`='$classid',`subjectid`='$subjectid',`topicid`='$topid'") or die(mysql_error());
	$msg="successfully added";
}
}else{$msg="failed";}
header("location:quiz_add.php?msg=$msg");
}
?>
