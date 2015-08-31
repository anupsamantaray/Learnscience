<?php
include_once("function.php");
$id1=$_POST['hidden_id'];
$ebookimage=$_POST['ebookimage'];
$img=$_FILES['img1']['name'];
if($img=='')
{
$res=mysql_query("UPDATE `extra_detail` SET `ebook`='$ebookimage' WHERE `id`='$id1'");

 }
else
{
$ext1=end(explode(".", $_FILES["img1"]["name"]));

if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif" || $ext1=="pdf")

         {
                                    $folder="image/";

                                                $filename = $folder . $img;
                                               
                                                $copied = copy($_FILES['img1']['tmp_name'], $filename);


$res=mysql_query("UPDATE `extra_detail` SET `ebook`='$filename' WHERE `id`='$id1'");
//header("location:list.php");
         }
}
$videoimage=$_POST['videoimage'];
$imgg=$_FILES['img2']['name'];
if($imgg=='')
{
$res=mysql_query("UPDATE `extra_detail` SET `video`='$videoimage' WHERE `id`='$id1'");

 }
/*else
{
$ext=end(explode(".", $_FILES["img2"]["name"]));

if($ext=="MPG" || $ext=="MOV" || $ext=="WMV" || $ext=="mp4"||$ext=='swf'||$ext=='flv')

         {
                                    $folder="video/";

                                                $filename1 = $folder . $imgg;
                                               
                                                $copied = copy($_FILES['img2']['tmp_name'], $filename1);


$res=mysql_query("UPDATE `extra_detail` SET `video`='$filename1' WHERE `id`='$id1'");
//header("location:list.php");
         }
}*/
header("location:extra_add.php");
?>
