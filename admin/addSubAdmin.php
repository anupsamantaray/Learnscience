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

<script type="text/javascript">
function delete_data(vals){
	var con=confirm("Do you want to delete subadmin?");
	if(con){
	window.location="deete_sub_admin.php?id1="+vals;
	}
}
</script>
</head>
<body>
 <!--------------top bar -------->
 <div id="top_bar">
	<div id="top_box">
			<h2 style="margin-top:0px; padding-top:8px; font-family:Arial, Helvetica, sans-serif; color:#f5f5f5;">Admin Panel</h2>
	</div>
</div>
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
				<div class="head2">Add Sub Admin</div>
				<div id="content2">
					<?php
					if(isset($_REQUEST['msg']) && ($_REQUEST['msg'] != '')){
						echo '<span style="font-family:arial; color:red; margin-left:20px;">'.$_REQUEST['msg'].'</span>';
					}
					?>
					<form  name="f" method="post" id="formid" action="insert_admin_user.php" enctype="multipart/form-data">
						<table class="table1" cellpadding="5" style="margin-top:15px;">
							<tr>
								<td colspan="2">Enter Username &nbsp; 
								<input type="text" class="form2" name="txtadusername" id="txtadusername" required="required"></td>
							</tr>
							<tr>
								<td colspan="2">Enter Password &nbsp; 
								<input type="text" class="form2" name="txtadpaassword" id="txtadpaassword" required="required"></td>
							</tr>
							<tr>
								<td style="padding-left:95px;"><input type="submit" name="submit" value="Add" class="button"></td>
							</tr>
						</table>
					</form>
					<table class="table1" cellpadding="5" >
						<tr>
							<th>Admin Name</th>
							<th>Password</th>
							<th colspan="2">Action</th>
						</tr>
						<?php
							
							$r1=mysql_query("select * from adminlogin WHERE admin_type=1");
							while($row1=mysql_fetch_array($r1)){
							
							?>
						<tr>
							<td><?php echo $row1['username']; ?></td>
							<td><?php echo $row1['password'];?></td>
							<!--td>
								<a href="subject_edit.php?id=<?php echo $row1['id'];?>"><img src="image/edit.png"></a>
							</td-->
							<td onClick="delete_data(<?php echo $row1['id']; ?>)"><a href="javascript:void(0)"><img src="image/delete.png"></a></td>
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