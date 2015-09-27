<?php
include_once("function.php");
if(!isset($_SESSION['id'])){
header("location:adminlogin.php");
}
else{
//$res=mysql_query("select * from `student_class`");

?>
<html>
<head>
<title>Home</title>
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
									Add Sub Admin
							</div>
							<div id="content2">
								<?php
								if(isset($_REQUEST['msg']) && ($_REQUEST['msg'] != '')){
									echo '<span style="font-family:arial; color:red; margin-left:20px;">'.$_REQUEST['msg'].'</span>';
								}
								?>
								<form  name="f" method="post" id="formid" action="insert_admin_user.php" enctype="multipart/form-data">
									<table class="table1" cellpadding="5" style="margin-top:15px;">
										<tr>
											<td colspan="2">Enter Username &nbsp; <input type="text" class="form2" name="txtadusername" id="txtadusername" required="required"></td>
										</tr>
										<tr>
											<td colspan="2">Enter Password &nbsp; <input type="text" class="form2" name="txtadpaassword" id="txtadpaassword" required="required"></td>
										</tr>
										<tr>
											<td style="padding-left:95px;"><input type="submit" name="submit" value="Add" class="button"></td>
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
				<?php include_once('footermenu.php');?>
		</div>
 </div>
  <!--------------footer end--------->                
</body>
</html>
<?php
}
?>