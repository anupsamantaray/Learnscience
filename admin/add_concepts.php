<?php
include_once("function.php");
include_once("function1.php");
$res=mysql_query("select * from `student_class`");
?>
<html>
<title>Admin Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<!--<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
 <!-- Load TinyMCE-->
 <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="js/setup.js" type="text/javascript"></script>
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
	
            setupTinyMCE();
	
        });
		

    </script>
    <!-- /TinyMCE -->
<script>
 function getval(id)
            {
              $.ajax({url:"subject1.php?val="+id,success:function(result){
                $("#t1").html(result);
                }});  
            }
</script>
<script>
 function get_topic(vals)
            {
              $.ajax({url:"topic.php?val="+vals,success:function(result){
                $("#tp").html(result);
                }});  
            }
</script>
<style>
.btm{
margin-bottom:5px;
}
</style>
	<script type="text/javascript">
    $(function(){
	var i=1;
	$('#add1').click(function () {
	i++;
        $('#tbb').append('<tr><td><span>'+i+'</span><textarea class="tinymce" name="quesname[]" id="question'+i+'" /></textarea></td><td><span>Answers</span><br/><input type="text" name="ans'+i+'[]" id="answer'+i+'" class="form btm"/><br/><input type="text" name="ans'+i+'[]" id="answer'+i+'" class="form btm"/><br/><input type="text" name="ans'+i+'[]" id="answer'+i+'" class="form btm"/><br/><input type="text" name="ans'+i+'[]" id="answer'+i+'" class="form btm"/></td></tr><tr><td colspan="2">Correct answer<select name="correct[]" class="form2"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></td></tr><tr><td colspan="2">Difficulty<select name="difficulty[]" class="form2"><option value="0">low</option><option value="1">Midium</option><option value="2">High</option></select></td></tr>');
		tinymce.EditorManager.execCommand('mceAddEditor', true, "question"+i);
});
 
	
    });
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
				
                
                <div id="right_box" style="margin-left:40px; width:830px;">
						<div class="headline">
								<a href="">Dashboard </a> /
								 <a href="">Settings</a>
						</div>
						<div id="content1">
								<div class="head2">
										Add Concepts
								</div>
								<div id="content2">
										<?php
											  if(isset($_GET['msg']))
											  {
											  $mess=$_GET['msg'];
											   echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
											  }
											  ?>
										<form name="f" method="post" id="formid" action="insert_concept.php" enctype="multipart/form-data">
											<table class="table" style="line-height:2.5;" id="TableMain">
											
											 <tr>
											   <td colspan="2">Class Name &nbsp;&nbsp;&nbsp;&nbsp; <select class="form2" name="class" id="class" onChange="showSubject(this.value)" onclick="showSubject(this.value)">
                                               									<option value=''>Select Class</option>
                                               									<?php
																					$sqladdclass="Select * from student_class";
																					$resultaddclass=$con->query($sqladdclass);
																					if($resultaddclass->num_rows>0)
																					{
																						while($rowaddclass=$resultaddclass->fetch_assoc())
																						{
																								echo("<option value=".$rowaddclass['id'].">".$rowaddclass['class']."</option>");
																						}
																					}
																				?>
                                                                			</select>
                                                                            
																			<script>
																				function showSubject(str) 
																				{
																					if (str.length == 0) { 
																						document.getElementById("subject").innerHTML = "";
																						return;
																					} else {
																						var xmlhttp = new XMLHttpRequest();
																						xmlhttp.onreadystatechange = function() {
																							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
																								document.getElementById("subject").innerHTML = xmlhttp.responseText;
																							}
																						}
																						xmlhttp.open("GET", "getsubject1.php?q=" + str, true);
																						xmlhttp.send();
																					}
																				}
																			</script>
																			
												
												
												
												</td> 
											</tr>
                                            <tr>
                                            	<td colspan='2'></td>
                                            </tr>
                                            <tr>
											   <td colspan="2">Subject &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select class="form2" name="subject" id="subject" onChange="showtopic(this.value)" onclick="showtopic(this.value)">
                                               									<option value=''>Select Subject</option>
                                               									
                                                                			</select>
                                                                            <script>
																				function showtopic(str) 
																				{
																					if (str.length == 0) { 
																						document.getElementById("topic").innerHTML = "";
																						return;
																					} else {
																						var xmlhttp = new XMLHttpRequest();
																						xmlhttp.onreadystatechange = function() {
																							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
																								document.getElementById("topic").innerHTML = xmlhttp.responseText;
																							}
																						}
																						xmlhttp.open("GET", "gettopic1.php?q=" + str, true);
																						xmlhttp.send();
																					}
																				}
																				
																			</script>
												
												
												
												</td> 
											</tr>
                                            <tr>
                                            	<td colspan='2'></td>
                                            </tr>
                                            <tr>
											   <td colspan="2">Topic &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select class="form2" name="topic" id="topic">
                                               									<option>Select Topic</option>
                                               									
                                                                			</select>
												
												
												
												</td> 
											</tr>
                                            
                                            <tr>
                                            	<td colspan='2'></td>
                                            </tr>
                                            <tr>
											   <td colspan="2">Enter Concept &nbsp; <input type="text" class="form2" name="txtconcept"  id="txtconcept"><!-- &nbsp;&nbsp;<input class="button" type="button" id="btnadd" value="Add Concept" onclick="addconcept()">--> </td>
												
											</tr>
                                            <!--<tr>
                                            	<td colspan='2'></td>
                                            </tr>
                                            <tr>
                                            	<td colspan='2'></td>
                                            </tr>
                                            <tr>
											   <td style="padding-left:95px;"><textarea name="txtconcept1"  id="txtconcept1" cols="33" readonly rows="4" style="border-radius:5px;"></textarea>  </td>
												
											</tr>-->
                                            
											<tr>
											  <tbody id="t1">
											  </tbody>
											</tr>
											
											
											<tr><td id="tbb" colspan="2"></td></tr>
					
											<tr> 
												 
												<td style="padding-left:95px;"><input type="submit" name="submit" value="Add" class="button"></td> 
												<td>
												<!--<input type="button" name="button" value="addnew" id="add1">-->
												</td>
											</tr>
											</table>  
										</form>
                                        <br><br>
                                         <table class="table1" cellpadding="5" >
						<tr>
							<th>Class</th>
                            <th>Subject</th>
                            <th>Topic</th>
                            <th>Concept</th>
							<th colspan="2">Action</th>
						</tr>
						<?php
							
							$sqlconcept=$con->query("select * from `tblconcepts`");
							while($rowclass=$sqlconcept->fetch_assoc()){
							
						?>
						<tr>
                        <?php $sqlclass="Select class from  student_class where id=".$rowclass['class'];
								$resultclass=$con->query($sqlclass);
								if($resultclass->num_rows>0)
								{
									while($rowsclass=$resultclass->fetch_assoc())
									{
										$classval=$rowsclass['class'];
									}
								}
								
								$sqlsubject="Select * from  student_subject where id=".$rowclass['subject'];
								$resultsubject=$con->query($sqlsubject);
								if($resultsubject->num_rows>0)
								{
									while($rowssubject=$resultsubject->fetch_assoc())
									{
										$subjectval=$rowssubject['subject'];
									}
								}
								
								$sqltopic="Select * from  student_topic where id=".$rowclass['topic'];
								$resulttopic=$con->query($sqltopic);
								if($resulttopic->num_rows>0)
								{
									while($rowstopic=$resulttopic->fetch_assoc())
									{
										$topicval=$rowstopic['topic'];
									}
								}
								?>
							<td><?php echo $classval; ?></td>
                            <td><?php echo $subjectval; ?></td>
                            <td><?php echo $topicval; ?></td>
                            <td><?php echo $rowclass['concept']; ?></td>
							<td><a href="concept_edit.php?id=<?php echo $rowclass['id'];?>"><img src="image/edit.png"></a></td>
                            <td><a href="concept_delete.php?id=<?php echo $rowclass['id'];?>"><img src="image/delete.png"></a></td>
							<!--<td onClick="delete_data(<?php //echo $rowclass['id']; ?>)"><img src="image/delete.png"></td>-->
						</tr>
						<?php
							}
						?>
					    </table>
						  
										
											
											
											
								</div>
                                </div>
                                <br><br>
                                
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

