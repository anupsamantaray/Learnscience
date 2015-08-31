<?php
include_once("function.php");
if(isset($_POST['submit']))
{
$classid=htmlentities($_POST['sel'],ENT_QUOTES);
$subname=htmlentities($_POST['subname'],ENT_QUOTES);
$details=htmlentities($_POST['details'],ENT_QUOTES);
$image =$_FILES['imag']['name'];
if($classid!="" && $subname!="")
{
    $ext1=end(explode(".", $_FILES["imag"]["name"]));

if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif" || $ext1=="pdf" || $ext1=="txt" || $ext1=="svg")
    {
        $folder="image/";
        $filename = $folder . $image; 
		//echo $filename."<br/>" ;
         $copied = copy($_FILES['imag']['tmp_name'], $filename);
	}
    $fet=mysql_query("select * from `student_subject` where `class_id`='$classid' and `subject`='$subname'") or die(mysql_error());
    $res=mysql_num_rows($fet);
    if($res==0)
    {
       // echo "insert into `student_subject` set `class_id`='$classid',`subject`='$subname'";
        $res1=mysql_query("insert into `student_subject` set `class_id`='$classid',`subject`='$subname',`detail`='$details',`image`='$filename'")or die(mysql_error());
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
header("location:subject_add.php?msg=$msg");
?>
