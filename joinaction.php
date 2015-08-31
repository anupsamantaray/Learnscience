<?php
include_once('function.php');
if(isset($_POST['submit']))
{
    $name=htmlentities($_REQUEST['jname']);
    $phone=htmlentities($_REQUEST['jphone']);
    $email=htmlentities($_REQUEST['jemail']);
   $pass=uniqid();
    if($name!="" && $phone!="" && $email!="")
    {
     //$fet=mysql_query("select * from `login` where `email`='$email' and `name`='$name'")or die(mysql_error());
     $fet=mysql_query("select * from `login` where `email`='$email'")or die(mysql_error());
     $res=mysql_numrows($fet);
    if($res==0)
    {
        //echo "insert into `login` set `name`='$name',`class`='$class', `phone`='$phone',  `password`='$pass', `email`='$email'";
        mysql_query("insert into `casual` set `name`='$name',`phone`='$phone',`email`='$email'") or die(mysql_error());
		$err="Your new account has been successfully created!";
		$message="Thank you for join in quiz\n";
	       $subject="email verification";
	       $from="krititech.com";
                mail($email,$subject,$message,"From: $from\n");
    }
    else{
	 $err="An account already exists with the same email address. Login or create an account with another email address.";
	}
    }
    header("location:index.php?err=$err");
}

?>