<?php
include_once("function.php");
if(!isset($_SESSION['id'])){
header("location:adminlogin.php");
}
else{
$res=mysql_query("select * from `feedback`");
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
										Feedback
								</div>
								<div id="content2">
										<?php
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
										  }
										?>
											<table class="table1" cellpadding="5" style="margin-top:15px;">
												<tr>
													<!--<th>User Name</th>-->
													<th>Name</th>
                                                    <th>City</th>
                                                    <th>Contact Number</th>
													<th>Email Id</th>
                                                    <th>IP Address</th>
                                                    <th>Feedback</th>
													
													<!--<th colspan="2">Action</th>-->
												</tr>
												<?php
												$fetchd=mysql_query("select * from `feedback`");
												while($resd=mysql_fetch_array($fetchd))
												{
											         ?>
												<tr>
													<!--<td><?php //echo $resd['name'];?></td>-->
													<td><?php echo $resd['Name'];?></td>
                                                    <td><?php echo $resd['city'];?></td>
                                                    <td><?php echo $resd['Contact_no'];?></td>
													<td><?php echo $resd['eid'];?></td>
                                                    <td><?php echo $resd['IP_addr'];?></td>
                                                    <td><?php echo $resd['message'];?></td>

													<!--<td><a href="extra_edit.php?id=<?php echo $resextra['id'];?>"><img src="image/edit.png"></a></td>
													<td onClick="delete_data(<?php echo $resextra['id']; ?>)"><img src="image/delete.png"></td>-->
												</tr>
												
													
												
												<?php
													}
												?>
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
				<?php include_once('footermenu.php');?>
		</div>
 </div>
  <!--------------footer end--------->                
</body>
</html>
<?php
}
?>