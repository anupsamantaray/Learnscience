<?php
include_once("function.php");
$res=mysql_query("select * from `student_class`");

?>
<html>
<head>
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

<script>
 function getval(id)
            {
              $.ajax({url:"subj.php?val="+id,success:function(result){
                $("#t1").html(result);
                }});  
            }
</script>
<script>
function get_topic(vals)
            {
              $.ajax({url:"top.php?val="+vals,success:function(result){
                $("#tp").html(result);
                }});  
            }
</script>
 <script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="oldquestion_delete.php?id1="+vals;
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
										Add Oldquestions
								</div>
								<div id="content2">
										<?php
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
										  }
										?>
									<form name="f" method="post" action="insert_oldquestion.php" enctype="multipart/form-data">
										<table class="table" style="line-height:2.5; margin-top:10px;">
										
										 <tr>
										   <td>Class Name</td>
											<td>
											<select name="selcls" onChange="return getval(this.value);" class="form2" id="classval">
												<option value="0">select</option>
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
											
										  <tbody id="tp">
									
										  </tbody>
											
										</tr>
										<tr>
										<td>oldquestion</td>
										<td><input type="file" name="oldquestion"/><br/><span style="color:#858585; font-size:12px; ">Notice:(.txt,.doc,.pdf are available)</span></td>
										</tr>
										<tr>
												<td>Year</td>
												<td>
												<input type="text" name="year" id="year" /></td>
										</tr>
										<tr> 
											<td>&nbsp;</td> 
											<td><input type="submit" name="submit" value="Add" class="button"></td> 
										</tr>
										</table>  
									</form>
									<table class="table1" cellpadding="5" style="margin-top:15px;">
												<tr>
													<th>Class Name</th>
													<th>Subject Name</th>
													<th>Oldquestion</th>
													<th colspan="2">Action</th>
												</tr>
												<?php
													
													$sqlold=mysql_query("select * from `oldquestion`");
													while($resold=mysql_fetch_array($sqlold)){
													$classid=$resold['class_id'];
											$subjectid=$resold['subject_id'];
											$topicid=$resold['topic_id'];
											$sqlclass=mysql_query("select * from `student_class` where `id`='$classid'");
											$resclass=mysql_fetch_array($sqlclass);
											$sqlsubject=mysql_query("select * from `student_subject` where `id`='$subjectid'");
											$ressubject=mysql_fetch_array($sqlsubject);
											//$sqltopic=mysql_query("select * from `student_topic` where `id`='$topicid'");
											//$restopic=mysql_fetch_array($sqltopic);
												?>
												<tr>
													<td><?php echo $resclass['class'];?></td>
													<td><?php echo $ressubject['subject'];?></td>
													<td><?php echo $resold['oldquestion'];?></td>
													<td><a href="oldquestion_edit.php?id=<?php echo $resold['id'];?>"><img src="image/edit.png"></a></td>
													<td onClick="delete_data(<?php echo $resold['id']; ?>)"><img src="image/delete.png"></td>
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
