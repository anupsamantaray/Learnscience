<?php
include_once("function.php");
$id1=$_POST['hidden_id'];
$videoimage=$_POST['videoimage'];
$imgg=$_FILES['img2']['name'];
if($imgg=='')
{
$res=mysql_query("UPDATE `extra_detail` SET `video`='$videoimage' WHERE `id`='$id1'");

 }
else
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
}
header("location:extra_add1.php");
?>
