<?php
include_once("function.php");
if(isset($_POST['submit']))
{
$name=htmlentities($_POST['name'],ENT_QUOTES);
$rank=htmlentities($_POST['rank'],ENT_QUOTES);
$hid=$_POST['hid'];
$image =$_FILES['imag']['name'];
if($image!="")
{
    $ext1=end(explode(".", $_FILES["imag"]["name"]));

if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif" || $ext1=="pdf" || $ext1=="txt" || $ext1=="svg")
    {
        $folder="image/";
        $filename = $folder . $image; 
		//echo $filename."<br/>" ;
         $copied = copy($_FILES['imag']['tmp_name'], $filename);
	}
    $fet=mysql_query("select * from `halloffame_image` where `name`='$name' and `rank`='$rank' and `image`='$filename'") or die(mysql_error());
    $res=mysql_num_rows($fet);
    if($res==0)
    {
       // echo "insert into `student_subject` set `class_id`='$classid',`subject`='$subname'";
        $res1=mysql_query("update `halloffame_image` set `name`='$name',`rank`='$rank',`image`='$filename' where `id`='$hid'")or die(mysql_error());
		$msg="successfully added";
    }
	else{
	$msg="this is already exist";
	}
}
else{
    //echo "update `halloffame_image` set `name`='$name',`rank`='$rank' where `id`='$hid'";
        $res1=mysql_query("update `halloffame_image` set `name`='$name',`rank`='$rank' where `id`='$hid'")or die(mysql_error());
		$msg="successfully added";
    }
}
header("location:hallimage.php?msg=$msg");
?>
