<?php
include_once("function.php");
$id1=$_POST['hidden_id'];
$year=$_POST['year'];
$oldquesimage=$_POST['oldquesimage'];
$img=$_FILES['img1']['name'];
if($img=='')
{
$res=mysql_query("UPDATE `oldquestion` SET `oldquestion`='$oldquesimage',`year`='$year' WHERE `id`='$id1'");

 }
else
{
$ext1=end(explode(".", $_FILES["img1"]["name"]));

if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif" || $ext1=="pdf")

         {
                                    $folder="image/";

                                                $filename = $folder . $img;
                                               
                                                $copied = copy($_FILES['img1']['tmp_name'], $filename);


$res=mysql_query("UPDATE `oldquestion` SET `oldquestion`='$filename',`year`='$year' WHERE `id`='$id1'");
         }
}

header("location:oldquestion.php");
?>
