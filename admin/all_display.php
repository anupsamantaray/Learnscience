<style>
#exportid:hover
{
	background-color:#F00;
}
</style>
<?php
//$con=new mysqli("localhost","root","","learnsci_kriti");
include_once("function1.php");
?>
<html>
    <head>
			<title>Admin Panel</title>
      		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<link href="css/style.css" rel="stylesheet" type="text/css" />
			<script type="text/javascript">
				function delete_data(vals){
					var con=confirm("Do you want to delete?");
					if(con){
					window.location="time_delete.php?id1="+vals;
					}
				}
				
				/*function showsubject(str)
				{
					 if (str=="") 
					 {
					    document.getElementById('loadsubject').innerHTML="";
					    return;
  					} 
				   if (window.XMLHttpRequest) 
				   {
					    // code for IE7+, Firefox, Chrome, Opera, Safari
					    xmlhttp=new XMLHttpRequest();
				  } 
				  else 
				  { // code for IE6, IE5
					    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  				  }
					  xmlhttp.onreadystatechange=function() 
					  {
					    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
						{
					    	document.getElementById("loadsubject").innerHTML=xmlhttp.responseText;
    					}
  					}
  					xmlhttp.open("GET","addsubject.php?q="+str,true);
  					xmlhttp.send();
					
				}
				
				
				
				function showtopic(str)
				{
					 if (str=="") 
					 {
					    document.getElementById('loadtopic').innerHTML="";
					    return;
  					} 
				   if (window.XMLHttpRequest) 
				   {
					    // code for IE7+, Firefox, Chrome, Opera, Safari
					    xmlhttp=new XMLHttpRequest();
				  } 
				  else 
				  { // code for IE6, IE5
					    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  				  }
					  xmlhttp.onreadystatechange=function() 
					  {
					    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
						{
					    	document.getElementById("loadtopic").innerHTML=xmlhttp.responseText;
    					}
  					}
  					xmlhttp.open("GET","add_topics.php?q="+str,true);
  					xmlhttp.send();
					
				}*/
				
				
				
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
								<a href="">Dashboard </a> 
								 <a href="">Settings</a>
						</div>
						<div id="content1">
								<div class="head2">
										 <table width="100%"><tr><td width='50%'>Display All </td><td width='50%' height='100%' align="right"><span style="font-size:25px;color:#fff;background-color:#1E59A6;" id='exportid' >&nbsp;&nbsp;&nbsp;<a href='export.php' style="color:#fff;" >Export</a>&nbsp;&nbsp;&nbsp;    </span></td></tr></table>
								</div>
								<div id="content2">
										  <?php
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
										  }
										  ?>
											<!--<form name="f" method="post" action="insert_time.php">
											<table class="table" style="height:100px;">												</tr>-->
                                            <table class="table1" cellpadding="5" >
													<tr>
														<th>Class</th>
														<th>Subject</th>
														<th>Topic</th>
														<th >E-Book</th>
                                                       <th >Videos</th>
                                                       <th>Quiz</th> 
													</tr>
													<?php
														$arrclass=array();
														$arrsubject=array();
														$arrtopic=array();
														$sql="select * from extra_detail";
														$result=$con->query($sql);
														if ($result->num_rows > 0) 
														{
															
															while($row = $result->fetch_assoc()) 
															{
														$sqlclass="select class from student_class where id= ".$row['class_id'];
																$result_sqlclass=$con->query($sqlclass);
																while($row_class = $result_sqlclass->fetch_assoc())
																{
																	echo("<tr><td>".$row_class['class']."</td>");
																}
																
																
												$sqlsubject="select subject from student_subject where id= ".$row['subject_id'];
																$result_sqlsubject=$con->query($sqlsubject);
																while($row_subject = $result_sqlsubject->fetch_assoc())
																{
																	echo("<td>".$row_subject['subject']."</td>");
																}
																
																
																
													$sqltopic="select topic from student_topic where id= ".$row['topic_id'];
																$result_sqltopic=$con->query($sqltopic);
																while($row_topic = $result_sqltopic->fetch_assoc())
																{
																	echo("<td>".$row_topic['topic']."</td>");
																}
																$arrebook=explode("/",$row['ebook']);
					echo("<td><a href='".$row['ebook']."' target='_blank' >".$arrebook[count($arrebook)-1]."</a></td>");
					
																
																$arrevideos=explode("/",$row['video']);
					echo("<td><a href='".$row['video']."' target='_blank' >".$arrevideos[count($arrevideos)-1]."</a></td>");
																
																echo("<td><a href='exportquiz.php?class=".$row['class_id']."&subject=".$row['subject_id']."&topic=".$row['topic_id']."'>Quiz</a></td></tr>");
					
					
															}
															
														}
														
															?>
											</table>
												<!--<tr>
												<td>Class</td>
												<td><select name='cboclass' class="form" onchange="showsubject(this.value)" style="width:250px;height:30px;">
                                                <option value='select'>Select</option>
                                                <?php 
													/*$sql1="Select * from  student_class";
													$res_sql1=$con->query($sql1);
													if ($res_sql1->num_rows > 0) 
													{
    												    while($row = $res_sql1->fetch_assoc()) 
														{
																echo "<option value='".$row["id"]."'>".$row['class']."</option>";
    													}
													}*/
												?>
                                                </select></td>
												</tr>
                                                <tr id='loadsubject'>
												
												
												</tr>
                                               <tr id='loadtopic'>
                                               </tr>
                                                <tr>
												<td>1st Level Time</td>
												<td><input type="text" name="time" class="form"  required><span style="font-size:12px; margin-left:10px;">Seconds</span></td>
												</tr>
												<tr>
												<td>2nd Level Time</td>
												<td><input type="text" name="time1" class="form"  required><span style="font-size:12px; margin-left:10px;">Seconds</span></td>
												</tr>
												<tr>
												<td>3rd Level Time</td>
												<td><input type="text" name="time2" class="form"  required><span style="font-size:12px; margin-left:10px;">Seconds</span></td>
												</tr>
												<tr> 
												<td>&nbsp;</td> 
												<td><input type="submit" name="submit" value="Add" class="button" ></td> 
												</tr>
												</table>  
											</form>->
											<table class="table1" cellpadding="5" >
													<tr>
														<th>1st Level Time</th>
														<th>2nd Level Time</th>
														<th>3rd Level Time</th>
														<th colspan="2">Action</th>
													</tr>
													<?php
														
														/*$sqltime=$con->query("select * from `time`");
														while($rowtime= $sqltime->fetch_assoc()){*/
														
													?>
													<tr>
														<td><?php //echo $rowtime['time']; ?></td>
														<td><?php //echo $rowtime['time1']; ?></td>
														<td><?php //echo $rowtime['time2']; ?></td>
														<td><a href="time_edit.php?id=<?php //echo $rowtime['id'];?>"><img src="image/edit.png"></a></td>
														<td onClick="delete_data(<?php //echo $rowtime['id']; ?>)"><img src="image/delete.png"></td>
													</tr>-->
													<?php
														//}
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
