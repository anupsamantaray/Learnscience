<?php
	include_once("function.php");
	if(!isset($_SESSION['id'])){
header("location:adminlogin.php");
}
else{
?>
<html>
<head>
<title>Admin Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
        
</head>
<body>
<!--------------top bar -------->
 <div id="top_bar">
 		<div id="top_box">
				<h2 style="margin-top:0px; padding-top:8px; font-family:Arial, Helvetica, sans-serif; color:#f5f5f5;">Admin Panel</h2>
		</div>
 </div>
 <!--------------top bar end-------->
 
<!--------------content bar-------->
 <div id="main_bar">
 		<div id="main_box">
				<div id="left_box">
						 <?php include_once("conleft_bar.php"); ?>
				</div>
				<div id="right_box" style="margin-left:40px;">
						<div class="headline">
								<a href="">Dashboard </a> /
								 <a href="">Settings</a>
						</div>
						<div id="content1">
								<div class="head2">
										Topic Edit
								</div>
								<div id="content2">
										<form name="f" method="post" action="topic_update.php">
												<table class="table" style="height:80px;">
												
												<?php
										
											$ids=$_GET['id'];
											$sqltopic=mysql_query("select * from `student_topic` where `id`='$ids'");
											$restopic=mysql_fetch_array($sqltopic);
									
										?>
												<tr>
												   <td>topic Name</td>
												   <td><input type="text" name="topic" class="textbox form" value="<?php echo $restopic['topic']; ?>"></td> 
													   <input type="hidden" name="hidden_id2" class="form" value="<?php echo $restopic['id']; ?>"/>
												</tr>
												<tr> 
													<td>&nbsp;</td> 
													<td><input type="submit" name="submit" value="Update" class="button"></td> 
												</tr>
												</table>  
												 </form>
								</div>
						</div>
				</div>
		</div>
 </div>
  <!--------------content bar end-------->
			
<!--------------footer---------> 
 <div id="footer-bar">
 		<div id="footer">
				<ul>
						<li><a href="index.html"><span>Home</span></a></li>
						<li><a href="work.html"><span>Work</span></a></li>
						<li><a href="about.html"><span>About</span></a></li>
						<li><a href="services.html"><span>Services</span></a></li>
						<li><a href="contact.html"><span>Contact</span></a></li>
				</ul>
		</div>
 </div>
  <!--------------footer end--------->			
       
    </body>
</html>
<?php
}
?>