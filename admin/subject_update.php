<?php
include_once("function.php");
$subject=htmlentities($_POST['uname'],ENT_QUOTES);
//$class=htmlentities($_POST['sel']);
$id=$_POST['hidden_id1'];
$oldimage=$_POST['oldimage'];
$newimage=$_FILES['imgg']['name'];
if($newimage=='')
{
mysql_query("update `student_subject` set `subject`='$subject',`image`='$oldimage' where `id`='$id'");
$msg="successfully updated";
 }
else
{
$ext1=end(explode(".", $_FILES["imgg"]["name"]));

if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif" || $ext1=="pdf" || $ext1=="svg")

         {
                                    $folder="image/";

                                                $filename = $folder . $newimage;
                                               
                                                $copied = copy($_FILES['imgg']['tmp_name'], $filename); 
}

$res=mysql_query("update `student_subject` set `subject`='$subject',`image`='$filename' where `id`='$id'");
}
header("location:subject_add.php");
?>
