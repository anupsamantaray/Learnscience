
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Learnscience:Makes learning easy & fast</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" media="screen" href="css/style1.css">

<link rel="stylesheet" type="text/css" href="styles.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
	
	<!-----pop up------>
<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="js/jquery.reveal.js"></script>
<link rel="stylesheet" href="css/reveal.css">
<!-----pop up ned------>	
    <!-- jQuery -->
	<script type="text/javascript" src="js/jquery-2.0.0.min.js"></script>
	
  
    <!-- FlexSlider -->
    
   <link rel="stylesheet" type="text/css" href="css/styles.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="js/jquery.easing-1.3.js"></script>
  <script type="text/javascript" charset="utf-8" src="js/jquery.iosslider.min.js"></script>
    
    <script type="text/javascript" src="scripts/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
	 <link rel="stylesheet" href="default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="slider.css" type="text/css" media="screen" />
    <script  type='text/javascript'>
function valid(){
   var jname=document.getElementById('jname').value;
var jemail=document.getElementById('jemail').value;
var jphone=document.getElementById('jphone').value;
var forma = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(jname==""){
		alert("Please Enter Your name");
		return false;
	}
if(jemail=="")
{
		alert("Please Enter Your emailaddress");
		return false;
}
	if(!jemail.match(forma))
	{
	alert("You have entered an wrong email address!"); 
	return false;
	}
	if(jphone==""){
		alert("Please Enter Your phone number");
		return false;
	}
	if(isNaN(jphone)|| jphone.indexOf(" ")!=-1)

	{
               alert("Enter numeric value");
	    return false;
	 }
	
}
    </script>
<script  type='text/javascript'>
function validate(){
 var uname=document.getElementById('name').value;
var emailid=document.getElementById('email').value;
var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
var contact=document.getElementById('phone').value;
var catsel=document.getElementById('class');
 var strcat = catsel.options[catsel.selectedIndex].value;
  var upass=document.getElementById('pass').value;
   var confirm=document.getElementById('confirm').value;
       
	if(uname==""){

		alert("Please Enter a Name");

		return false;

	}
	
	if(emailid==""){

		alert("Please Enter Your emailaddress");

		return false;

	}
	if(!emailid.match(format))

	{

	alert("You have entered an wrong email address!"); 
	return false;
    

	}
	
	if(contact==""){

		alert("Please Enter Your contactno");

		return false;

	}
	if(contact.length<10){

		alert("Please Enter 10 digit phonenumber");

		return false;

	}
	if(contact.length>10){

		alert("Please Enter 10 digit phonenumber");

		return false;

	}
	 if(strcat==0)
            {
              alert("Please Choose a Class");
			return false;
           }
	if(upass==""){

		alert("Please Enter Password");

		return false;

	}
	if(confirm==""){

		alert("Please Confirm Password");

		return false;

	}
	
   if(confirm!=upass){

		alert("Please Enter Correct Password");

		return false;

	}
	
}
</script>
  <script  type='text/javascript'>

function numberonly()

{

	var contact=document.getElementById('phone').value;

	if(isNaN(contact)|| contact.indexOf(" ")!=-1)

	{

              			alert("Enter numeric value");

			return false;

    }

}
function callmodal()
{
	window.location.href='#mymodal';	
}
</script>
<body onload="callmodal()">

		<h1 style="font-size:20px;">Create Account</h1>
		<form name="creataccount" action="../creataction.php" method="post" onsubmit="return validate();">
		<table style="width:100%; height:250px; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#333;">
				<tr>
						<td>Name</td>
						<td><input type="text" name="name" id="name"  class="form2"/></td>
				</tr>
				<tr>
						<td>Email</td>
						<td><input type="text" name="email" id="email"  class="form2"/></td>
				</tr>
				<tr>
						<td>Contact</td>
						<td><input type="text" name="phone" id="phone" class="form2" onkeyup="return numberonly();"/></td>
				</tr>
				<tr>
						<td>Class</td>
						<td>
						<select  name="class" id="class"  class="form2" style="height:28px; width:295px; padding:0px;">
						<option value="0">select</option>
						<?php
						$sqlcls=mysql_query("select * from `student_class`");
						while($rescls=mysql_fetch_array($sqlcls)){
						?>
						<option value="<?php echo $rescls['id'];?>"><?php echo $rescls['class'];?></option>
						<?php
						}
						?>
						</select>
						<!--<input type="text" name="class" id="class"  class="form2"/>-->
						</td>
				</tr>
				<tr>
						<td>School</td>
						<td><input type="text" name="school" id="school" class="form2"/></td>
				</tr>
				<tr>
						<td>City</td>
						<td><input type="text" name="city" id="city" class="form2"/></td>
				</tr>
				<tr>
						<td>Password</td>
						<td><input type="password" name="pass" id="pass" class="form2"/></td>
				</tr>
				<tr>
						<td>Confirm Pwd</td>
						<td><input type="password" name="confirm" id="confirm" class="form2"/></td>
				</tr>

				<tr>
						<td>
								<input type="submit" name="button" value="Log In" class="button1" style="background:#69a4ce; border-radius:3px; border:1px solid #5589b0;"/>
						</td>
				</tr>
		</table>
	<!--	<a class="close-reveal-modal">&#215;</a>-->
		</form>

<!----pop up end------>

</body>