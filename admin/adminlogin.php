<?php
include_once("function.php");
if(isset($_POST['submit'])){
 $user=htmlentities($_POST['usrname']);
 $pwd=htmlentities($_POST['pass']);
$res=mysql_query("select * from `adminlogin` where `username`='$user' and `password`='$pwd'");
$no=mysql_num_rows($res);
if($no>=1){
$_SESSION['id']=$user;
$_SESSION['pass']=$pwd;

header("location:class_add.php");
}
else{
header("location:adminlogin.php");
}
}
?>
<html>
    <head>
			<link rel="stylesheet" href="login.css">
    </head>
    <body>
	
					<div id="container">
		
		<form name="f" method="post" action="#">
		
		<label for="name">Username:</label>
		
		<input type="name" name="usrname" placeholder="Username" >
		
		<label for="username">Password:</label>
		
		<p><a href="#">Forgot your password?</a>
		
		<input type="password" name="pass" placeholder="Password" >
		
		<div id="lower">
		
		<input type="checkbox"><label class="check" for="checkbox">Keep me logged in</label>
		
		<input type="submit" name="submit" value="Login" >
		
		</div>
		
		</form>
		
	</div>
					
					
					
			
        
    </body>
</html>
