<?php
include_once('function.php');
if(isset($_POST['submit']))
{
    $content=htmlentities($_REQUEST['content']);
    $fet=mysql_query("select * from `about_content`");
    $num=mysql_num_rows($fet);
    if($content!="" && $num==0){
    mysql_query("insert into `about_content` set `content`='$content'");
    $err="sucessfully inserted";
    }else
    {
      mysql_query("update `about_content` set `content`='$content'");
      $err="sucessfully inserted";
    }
    header("location:add_content_about.php?err=$err");
}
?>