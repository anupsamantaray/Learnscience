<?php
include_once("function.php");
if(!isset($_SESSION['id'])){
header("location:adminlogin.php");
}
else{
$id=$_GET['id'];
$sql=mysql_query("select * from `student_question` where `id`='$id'");
$row=mysql_fetch_array($sql);
$ques=$row['questions'];
$canswer=$row['correct'];
$cid=$row['class_id'];
$sid=$row['subject_id'];
$tid=$row['topic_id'];
$ansarr=explode("|",$row['answers']);
$level=$row['difficulty'];
$concept=$row['concepts'];
?>
<?php
if(isset($_POST['submit']))
{
 $ans=$_REQUEST['answer'];
 $fclass=$_REQUEST['class'];
 $fsub=$_REQUEST['subject'];
 $ftopic=$_REQUEST['topic'];
 $diff_level=$_REQUEST['level'];
 $concept1=$_REQUEST['totconcept'];
 //echo "update `student_question` set `correct`='$ans',`class_id`='$fclass',`subject_id`='$fsub',`topic_id`='$ftopic' where `id`='$id'";
 mysql_query("update `student_question` set `concepts`='$concept1',`correct`='$ans',`class_id`='$fclass',`subject_id`='$fsub',`topic_id`='$ftopic',`difficulty`='$diff_level' where `id`='$id'") or die(mysql_error());
 $msg="sucessfully updated";
 header("location:edit_question.php?msg=$msg");
}
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
										Edit question
								</div>
								<div id="content2">
										<div style="width:90%; height:auto; float:left; margin-left:2%;">
										<form action="" method="post" enctype="multipart/form-data">
									            <table class="table">
											  <tr>
											     <td>Question</td>
											     <td><?php echo $ques; ?></td>
											  </tr>
											  <tr>
											     <td>Answers</td>
											     <td>1)&nbsp;<?php echo $ansarr[1];?>&nbsp;2)&nbsp;<?php echo $ansarr[2];?>&nbsp;3)&nbsp;<?php echo $ansarr[3];?>&nbsp;4)&nbsp;<?php echo $ansarr[4];?></td>
											  </tr>
											  <tr>
											     <td>Correct Answer</td>
											     <td>
											       <select name="answer" class="form2"  required>
													 <?php if($canswer==1){?><option value="1" selected="selected">1</option><?php }else{?>
													 <option value="1">1</option><?php }?>
													 <?php if($canswer==2){?><option value="2" selected="selected">2</option><?php }else{?>
													 <option value="2">2</option><?php }?>
													 <?php if($canswer==3){?><option value="3" selected="selected">3</option><?php }else{?>
													 <option value="3">3</option><?php }?>
													 <?php if($canswer==4){?><option value="4" selected="selected">4</option><?php }else{?>
													 <option value="4">4</option><?php }?>
											       </select>
											     </td>
											  </tr>
											  <tr>
											     <td>class</td>
											     <td>
											      <select name="class" id="class" class="form2">
											      <?php
											      $fetchclass=mysql_query("select * from `student_class`");
											      while($resclass=mysql_fetch_array($fetchclass))
											      {
											       if($resclass['id']==$cid){
											      ?>
												 <option value="<?php echo $resclass['id'];?>" selected="selected"><?php echo $resclass['class'];?></option><?php }else{?>
												 <option value="<?php echo $resclass['id'];?>"><?php echo $resclass['class'];?></option>
												 <?php }}?>
												</select>
											     </td>
											  </tr>
											  <tr>
											     <td>Subject</td>
											     <td>
											     <select name="subject" id="subject" class="form2">
											      <?php
											      $fetchsubject=mysql_query("select * from `student_subject`");
											      while($ressubject=mysql_fetch_array($fetchsubject))
											      {
											       $class=$ressubject['class_id'];
											       $fetchclass1=mysql_query("select * from `student_class` where `id`='$class'");
											      $resclass1=mysql_fetch_array($fetchclass1);
											      if($ressubject['id']==$sid){
											      ?>
												 <option value="<?php echo $ressubject['id'];?>" selected="selected"><?php echo $ressubject['subject']."(".$resclass1['class'].")";?></option><?php } else{?>
												 <option value="<?php echo $ressubject['id'];?>"><?php echo $ressubject['subject']."(".$resclass1['class'].")";?></option><?php }}?>
												</select>
											     </td>
											  </tr>
											 <tr>
											     <td>Topic</td>
											     <td>
											     <select name="topic" id="topic" class="form2" onclick="showconcept(this.value)">
											      <?php
											      $fetchtopic=mysql_query("select * from `student_topic`");
											      while($restopic=mysql_fetch_array($fetchtopic))
											      {
											       $classid=$restopic['class_id'];
											       $subjectid=$restopic['subject_id'];
											      
											      $fetchsubject1=mysql_query("select * from `student_subject` where `id`='$restopic[subject_id]'");
											      $ressubject1=mysql_fetch_array($fetchsubject1);
											      
											       $class=$ressubject['class_id'];
											       $fetchclass2=mysql_query("select * from `student_class` where `id`='$restopic[class_id]'");
											      $resclass2=mysql_fetch_array($fetchclass2);
											      if($restopic['id']==$tid)
												  {
											      ?>
												 <option value="<?php echo $restopic['id'];?>" selected="selected"><?php echo $restopic['topic']."(".$ressubject1['subject'].")(".$resclass2['class'].")";?></option><?php }else{?>
												  <option value="<?php echo $restopic['id'];?>"><?php echo $restopic['topic']."(".$ressubject1['subject'].")(".$resclass2['class'].")";?></option><?php 
												  }}?>
												</select>
                                                <script>
												function showconcept(str) 
												{
														if (str == "") 
														{
															document.getElementById("concept").innerHTML = "";
															return;
														} 
														else 
														{ 
															if (window.XMLHttpRequest) 
															{
																// code for IE7+, Firefox, Chrome, Opera, Safari
																xmlhttp = new XMLHttpRequest();
															} 
															else 
															{
																// code for IE6, IE5
																xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
															}
															xmlhttp.onreadystatechange = function() 
															{
																if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
																{
																	document.getElementById("concept").innerHTML = xmlhttp.responseText;
																}
														}
														xmlhttp.open("GET","getconcept.php?q="+str,true);
														xmlhttp.send();
													}
												}
												</script>
											     </td>
											  </tr>
                                              
                                              
                                              <tr>
											     <td>Difficulty</td>
											     <td>
											     <select name="level" id="level" class="form2">
											     <?php if($level==1)
												 {
													 ?>
                                                    <option value="1" selected>Middle</option>
                                                 <?php
                                                 }
												 else
												 {
												 ?>
                                                 	<option value='1'>Middle</option>
                                                 <?php
												 }
												 if($level==0)
												 {
													 ?>
                                                     <option value="0" selected>Low</option>
                                                  <?php
                                                  }
												  else
												 {
												 ?>
                                                 	<option value='0'>Low</option>
                                                 <?php
												 }
												 if($level==2)
												 {
												  ?>
                                                  <option value="2" selected>High</option>
                                                  <?php
												 }
												 else
												 {
													 ?>
                                                     <option value="2">High</option>
                                                     <?php
												 }
												 ?>
												</select>
											     </td>
											  </tr>
                                              
                                              
                                              
                                              <tr>
											     <td>Concept </td>
											     <td>
											     <select name="concept" id="concept" class="form2">
											     		
												</select>&nbsp;&nbsp;&nbsp;<input type="button" name="btnadd" value="Add" class="button" onClick="addconcept()">
                                                <script>
													function addconcept()
													{
														if(document.getElementById("concept").value!="")
														{
															if(document.getElementById("totconcept").value=="")
															{
																
																document.getElementById("totconcept").value=document.getElementById("concept").value;	
															}
															else
															{
																
																document.getElementById("totconcept").value=document.getElementById("concept").value+","+document.getElementById("totconcept").value;	
															}
														}
													}
												</script>
											     </td>
											  </tr>
                                              
                                              <tr><td colspan="2"></td></tr>
                                              <tr>
											     <td>Total Concept </td>
											     <td>
											     <textarea name="totconcept" id="totconcept" cols='33' rows='5' style="border-radius:5px;" readonly onblur='disableconcept()'><?php echo($concept); ?>
                                                 </textarea>&nbsp;&nbsp;&nbsp;<input type="button" name="btnedit" value="Edit" class="button" onClick="editconcept()">
                                                 <script>
												 	function editconcept()
													{
															document.getElementById("totconcept").removeAttribute("readonly");
													}
													function disableconcept()
													{
														document.getElementById("totconcept").setAttribute("readonly",true);
														//document.getElementById("totconcept").attributes="readonly";
													}
												 </script>
											     </td>
											  </tr>
                                              
                                              <tr>
                                              	<td></td>
                                              </tr>
                                               <tr>
                                              	<td></td>
                                              </tr>
                                              
											  <tr>
											     <td></td>
											     <td><input type="submit" name="submit" value="update" class="button"></td>
											  </tr>
										</table>
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