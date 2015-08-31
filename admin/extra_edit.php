<?php
include_once("function.php");
if(!isset($_SESSION['id'])){
header("location:adminlogin.php");
}
else{
$id=$_GET['id'];
$sql=mysql_query("select * from `extra_detail` where `id`='$id'");
$row=mysql_fetch_array($sql);
?>
<html>
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
										Edit Ebook
								</div>
								<div id="content2">
										<div style="width:90%; height:auto; float:left; margin-left:2%;">
										<form action="extra_update.php" method="post" enctype="multipart/form-data">
										
										<input type="hidden" name="hidden_id" value="<?php echo $row['id']; ?>" />
										
									    <embed src="../admin/<?php echo $row['ebook']; ?>" width="100" height="100" /><br /><br />
										
										<input type="hidden" name="ebookimage" value="<?php echo $row['ebook']; ?>"/>
										
										<label for="file" style="font-family:Arial, Helvetica, sans-serif; font-size:13px;">Filename:</label>
										
										<input type="file" name="img1" id="file"><br>
										
										<!--<div><embed src="../admin/<?php echo $row['video']; ?>" width="100" height="100" /></div>
										
										<input type="hidden" name="videoimage" value="<?php echo $row['video']; ?>"/>
										<label for="file" style="font-family:Arial, Helvetica, sans-serif; font-size:13px;">videoname:</label>
										<input type="file" name="img2" id="file1"><br /><br />-->
										<input type="submit" name="submit" value="update" class="button">
										</form>
										</div>
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