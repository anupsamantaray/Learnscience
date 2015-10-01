<?php
include_once('function.php');
if(isset($_POST['button']))
{
    $name=htmlentities($_REQUEST['name']);
    $class=htmlentities($_REQUEST['class']);
    $phone=htmlentities($_REQUEST['phone']);
    $email=htmlentities($_REQUEST['email']);
    $pass=htmlentities($_REQUEST['pass']);
    $confirm=htmlentities($_REQUEST['confirm']);
     $school=htmlentities($_REQUEST['school']);
      $city=htmlentities($_REQUEST['city']);
   
    if($name!="" && $phone!="" && $email!="" &&  $pass==$confirm)
    {
     $fet=mysql_query("select * from `login` where `email`='$email'")or die(mysql_error());
     $res=mysql_numrows($fet);
    if($res==0)
    {
		if(!empty($_FILES['fileToUpload']))
		{
			mkdir("propic/".$_POST['email']);
			$target_dir = "propic/".$_POST['email']."/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
			echo($target_file);
			
			mysql_query("insert into `login` set `name`='$name',`class`='$class', `phone`='$phone',  `password`='$pass', `email`='$email',`school`='$school',`city`='$city',`pro_pic`='$target_file'") or die(mysql_error());
		}
		else
		{
			mysql_query("insert into `login` set `name`='$name',`class`='$class', `phone`='$phone',  `password`='$pass', `email`='$email',`school`='$school',`city`='$city'") or die(mysql_error());
		}
        //echo "insert into `login` set `name`='$name',`class`='$class', `phone`='$phone',  `password`='$pass', `email`='$email'";
        //mysql_query("insert into `login` set `name`='$name',`class`='$class', `phone`='$phone',  `password`='$pass', `email`='$email',`school`='$school',`city`='$city',`pro_pic`='".$target_file."'") or die(mysql_error());
		$err="Your new account has been successfully created!";
		$message="Thank you for register in quiz\n"."your password is= ".$pass;
	       $subject="email verification";
	       $from="noreply@learnscience.co.in";
			mail($email,$subject,$message,"From: $from\n");
    }
    else{
	 $err="An account already exists with the same email address. Login or create an account with another email address.";
	}
    }else{ $err="Enter correct password";}
    header("location:index.php?err=$err");
}

?>