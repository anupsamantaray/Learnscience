<?php
include_once("function.php");
if(!isset($_SESSION['id'])){
header("location:adminlogin.php");
}
else{
$res=mysql_query("select * from `student_class`");
$slno=$_GET['id'];
if(isset($_POST['submit']))
{
	       $level=$_REQUEST['level'];
	       if($level!=""){ mysql_query("update login set `level`='$level' where `slno`='$slno'");}
}
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
										Registered User
								</div>
								<div id="content2">
										<?php
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
										  }
										?>
								<form name="f" action="" method="post">
											<table class="table1" cellpadding="5" style="margin-top:15px;">
												<?php
												$fetchd=mysql_query("select * from `login` where `slno`='$slno'");
												$resd=mysql_fetch_array($fetchd);
												?>
												<tr>
													<th>User Name</th>
													<td><?php echo $resd['name'];?></td>
											        </tr>
												<tr>
													<th>Phone</th>
													<td><?php echo $resd['phone'];?></td>
											        </tr>
												<tr>
													<th>Email </th>
													<td><?php echo $resd['email'];?></td>
											        </tr>
												<tr>
													<th>School </th>
													 <td><?php echo $resd['school'];?></td>
											        </tr>
												<tr>
													<th>Class </th>
													<td><?php echo $resd['class'];?></td>
											        </tr>
												<tr>
													<th>City </th>
													<td><?php echo $resd['city'];?></td>
												</tr>
												<tr>
													<th>Level</th>
													<td><select name="level">
													 <option value="0">Easy</option>
													 <option value="1">Moderate</option>
													 <option value="2">Hard</option>
													</select></td>
												</tr>
												<tr>
													<td colspan="2"><input type="submit" name="submit" value="update"></td>
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