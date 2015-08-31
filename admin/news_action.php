<?php
include_once('function.php');
if(isset($_POST['submit']))
{
    $news=htmlentities($_REQUEST['news']);
    $link=htmlentities($_REQUEST['link']);
    $date=date("Y-m-d");
    if($news!=""){
    mysql_query("insert into `news` set `news`='$news',`date`='$date',`link`='$link'");
    $err="sucessfully inserted";
    }   
    header("location:add_news.php?err=$err");
}

?>