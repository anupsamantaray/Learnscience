<?php
include_once("function.php");
if(isset($_POST['submit']))
{
    $user=htmlentities($_REQUEST['user']);
    $replaceuser=htmlentities($_REQUEST['replaceuser']);
     $pass=htmlentities($_REQUEST['password']);
      $new=htmlentities($_REQUEST['newpassword']);
      $confirm=htmlentities($_REQUEST['confpassword']);
      
      if($new==$confirm){
      $fetch=mysql_query("select * from `login` where `name`='$user' and `password`='$pass' and `status`='1'");
      $resdetail=mysql_fetch_array($fetch);
      $email=$resdetail['email'];
      $res=mysql_numrows($fetch);
      if($res>0)
      {
	if(isset($_REQUEST['replaceuser']))
	{
	   $replaceuser=htmlentities($_REQUEST['replaceuser']); 
	}else{$replaceuser=$user;}
	mysql_query("update `login` set `password`='$new',`name`='$replaceuser',`email`='$replaceuser' where `name`='$user' and `password`='$pass' and `status`='1'");
	$msg="sucessfully changed";
	$message="Thank you for register in quiz\n"."your Newpassword is= ".$new."\n Your Admin Name=".$replaceuser;
	       $subject="email verification";
	       $from="krititech.com";
                mail($email,$subject,$message,"From: $from\n");
      }else{ $msg="password not matched";}
      }else{ $msg="password not matched";}
      header("location:change_password.php?msg=$msg");
      
}
if(isset($_POST['sub']))
{
    $user1=htmlentities($_REQUEST['user1']);
      $new1=htmlentities($_REQUEST['newpassword1']);
      $confirm1=htmlentities($_REQUEST['confpassword1']);
      if($new1==$confirm1){
      $fetch1=mysql_query("select * from `login` where `email`='$user1'");
      $resdetail1=mysql_fetch_array($fetch1);
      $email1=$resdetail1['email'];
      $res1=mysql_numrows($fetch1);
      if($res1>0)
      {
	mysql_query("update `login` set `password`='$new1' where `email`='$user1' and `status`='0'");
	$msg="sucessfully changed";
	$message1="Thank you for register in quiz\n"."your Newpassword is= ".$new1;
	       $subject1="email verification";
	       $from1="krititech.com";
                mail($email1,$subject1,$message1,"From: $from1\n");
      }else{ $msg="password not matched";}
      }else{ $msg="password not matched";}
      header("location:change_password.php?msg=$msg");
      
}
?>