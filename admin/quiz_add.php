<?php
include_once("function.php");
if(!isset($_SESSION['id'])){
header("location:adminlogin.php");
}
else{
$res=mysql_query("select * from `student_class`");

?>
<html>
<head>
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script>
function getval(id)
{

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("t1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","subject3.php?val="+id,true);
xmlhttp.send();
}
</script>
<script>
function get_topic(vals)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("tp").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","topic2.php?val="+vals,true);
xmlhttp.send();

}
</script>
 <script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="extra_delete.php?id1="+vals;
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
										Add quiz
								</div>
								<div id="content2">
										<?php
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
										  }
										?>
									<form name="f" method="post" action="quiz_extra.php" enctype="multipart/form-data">
										<table class="table" style="line-height:2.5;">
										
										 <tr>
										   <td>Class Name</td>
											<td>
											<select name="selcls" onChange="return getval(this.value);" class="form2"  required >
												<option>select</option>
												<?php
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
											
										  <tbody id="t1">
									
										  </tbody>
											
										</tr>
										<tr>
										<td>Quiz</td>
										<td><input type="file" name="ebook"/><br/><span style="color:#858585; font-size:12px; ">Notice:(.txt,.doc,.pdf are available)</span></td>
										</tr>
										<tr>
										<td>Priority</td>
										<td><input type="checkbox" name="priority" value="1" class="form2"/><br/><span style="color:#858585; font-size:12px; ">Notice:(check for compititive)</span></td>
										</tr>
										<tr> 
											<td>&nbsp;</td> 
											<td><input type="submit" name="submit" value="Add" class="button"></td> 
										</tr>
										</table>  
									</form>
									
											<!--<table class="table1" cellpadding="5" style="margin-top:15px;">
												<tr>
													<th>quiz</th>
													<th colspan="2">Action</th>
												</tr>
												<?php
													
													$sqlextra=mysql_query("select * from `quiz`");
													while($resextra=mysql_fetch_array($sqlextra)){
												?>
												<tr>
													<td><?php echo $resextra['quiz'];?></td>
													<td><a href="quiz_edit.php?id=<?php echo $resextra['slno'];?>"><img src="image/edit.png"></a></td>
													<td onClick="delete_data(<?php echo $resextra['slno']; ?>)"><img src="image/delete.png"></td>
												</tr>
												<?php
													}
												?>
											</table>-->
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