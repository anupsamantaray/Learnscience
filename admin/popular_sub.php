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
<?php
if(isset($_POST['sub']))
{
 $arr=$_REQUEST['check'];
 foreach($arr as $a)
 {
  $fet=mysql_query("select * from `student_subject` where `id`='$a'");
  $res=mysql_fetch_array($fet);
  $stat=$res['status']+1;
  mysql_query("update `student_subject` set `status`='$stat' where `id`='$a'") or die(mysql_error());
 }
}
?>
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
										Mark Subject
								</div>
								<div id="content2">
										<?php
						  if(isset($_GET['msg']))
						  {
						  $mess=$_GET['msg'];
						   echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
						  }
						  ?>
					<form name="f" method="post" action="" enctype="multipart/form-data">
					    <table class="table" style="height:120px;">
						<tr>
							
						</tr>
						<tr>
						   <th style="text-align: left;">Subject  Name</th>
						</tr>
					     
								<?php
									$res=mysql_query("select * from `student_subject`");
									while($row=mysql_fetch_array($res)){
								?>
					     <tr>
						<td><?php echo $row['subject']; ?></td><td><input type="checkbox" name="check[]" value="<?php echo $row['id']; ?>"></td> <?php }?>
					     </tr>
					     <tr>
							      <td align="center" colspan="2"><input type="submit" name="sub" value="submit" class="button"></td>
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