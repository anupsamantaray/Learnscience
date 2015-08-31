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
 <script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete subject?");
			if(con){
			window.location="subject_delete.php?id1="+vals;
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
										Add Subject
								</div>
								<div id="content2">
										<?php
						  if(isset($_GET['msg']))
						  {
						  $mess=$_GET['msg'];
						   echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
						  }
						  ?>
					<form name="f" method="post" action="insert_subject.php" enctype="multipart/form-data">
					    <table class="table" style="height:120px;">
						<tr>
							
						</tr>
						<tr>
						   <td>Class Name</td>
						    <td>
							<select name="sel" class="form2">
								<option value="">Select</option>
								<?php
									$res=mysql_query("select * from `student_class`");
									while($row=mysql_fetch_array($res)){
								?>
								<option value="<?php echo $row['id'];?>"><?php echo $row['class'];?></option>
								<?php
									}
								?>
							</select>
						    </td> 
						</tr>
						<tr>
						   <td>Subject Name</td>
						    <td><input type="text" name="subname" class="form"  required></td> 
						</tr>
						<tr>
						   <td>Subject Details</td>
						    <td><input type="text" name="details" class="form"  required></td> 
						</tr>
						<tr>
						   <td>Subject image</td>
						    <td><input type="file" name="imag" class="form"  required></td> 
						</tr>
						 <tr>  
						    <td>&nbsp;</td>
						    <td><input type="submit" name="submit" value="Add" class="button" ></td> 
						</tr>
					    </table>  
					</form>
				
					
					    <table class="table1" cellpadding="5" >
						<tr>
							<th>Class Name</th>
							<th>Subject Name</th>
							<th colspan="2">Action</th>
						</tr>
						<?php
							
							$r1=mysql_query("select * from `student_subject`");
							while($row1=mysql_fetch_array($r1)){
							$id=$row1['class_id'];
							$res=mysql_query("select * from `student_class` where `id`='$id'");
							$ro=mysql_fetch_array($res);
							
						?>
						<tr>
							<td><?php echo $ro['class']; ?></td>
							<td><?php echo $row1['subject'];?></td>
							<td><a href="subject_edit.php?id=<?php echo $row1['id'];?>"><img src="image/edit.png"></a></td>
							<td onClick="delete_data(<?php echo $row1['id']; ?>)"><img src="image/delete.png"></td>
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