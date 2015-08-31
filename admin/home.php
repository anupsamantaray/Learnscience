<?php 
include_once("function.php");
if(!isset($_SESSION['id'])){
header("location:adminlogin.php");
}
else{
?>
<html>
<head>
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
						<div class="list_menu">
								 <ul>
										<li class="active">
											<i class="icon-chevron-right"></i> Dashboard</li>
										<li>
											<a href="class_add.php"><i class="icon-chevron-right"><img src="image/1.png" /></i>add class</a>
										</li>
										<li>
											<a href="subject_add.php"><i class="icon-chevron-right"><img src="image/1.png" /></i>add subject</a>
										</li>
										<li>
											<a href="topic_add.php"><i class="icon-chevron-right"><img src="image/1.png" /></i>add topic</a>
										</li>
										<li>
											<a href="question_add.php"><i class="icon-chevron-right"><img src="image/1.png" /></i>add question</a>
										</li>
										<li>
											<a href="answer_add.php"><i class="icon-chevron-right"><img src="image/1.png" /></i>add answer</a>
										</li>
										<li>
											<a href="extra_add.php"><i class="icon-chevron-right"><img src="image/1.png" /></i>add ebook&video </a>
										</li>
										<li>
											<a href="adminlogout.php"><i class="icon-chevron-right"><img src="image/1.png" /></i>logout</a>
										</li>
										
						  </ul>
						</div>
				</div>
				<div id="right_box" style="margin-left:40px;">
						<div class="headline">
								<a href="">Dashboard </a> /
								 <a href="">Settings</a>
						</div>
						<div id="content1">
								<div class="head2">
										Form Example
								</div>
								<div id="content2" style="min-height:350px;">
										<table>
												<tr>
														<td></td>
														<td></td>
														<td></td>
												</tr>
										</table>
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