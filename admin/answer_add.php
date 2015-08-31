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
<title>Admin Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

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
xmlhttp.open("GET","subject2.php?val="+id,true);
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
xmlhttp.open("GET","topic1.php?val="+vals,true);
xmlhttp.send();

}
</script>
<script>
function get_question(valss)
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
    document.getElementById("qnt").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","question.php?vall="+valss,true);
xmlhttp.send();

}
</script>
<script type="text/javascript">
    $(function(){
	$('#add1').click(function () {
	if ($('#tbb').find('textarea').length < 4) {
        $('#tbb').append('<tr><td><textarea name="ans[]"/></textarea></td></tr>');
		}
});
	
    });
</script>
 <script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete answer?");
			if(con){
			window.location="answer_delete.php?id1="+vals;
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
										Add Answer
								</div>
								<div id="content2">
										 <?php
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
										  }
										  ?>
									<form name="f" method="post" action="insert_answer.php" enctype="multipart/form-data">
										<table class="table" style="line-height:3.1;">
										 <tr>
										   <td>Class Name</td>
											<td>
											<select name="selcls" onChange="return getval(this.value);"  required class="form2">
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
											
												<tbody id="tp">
									
												</tbody>
											
										</tr>
										<tr>
											
												<tbody id="qnt">
									
												</tbody>
											
										</tr>
										<tr id="tbb">
										   <td>Answers</td>
											
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td><input type="button" name="button" value="addnew" class="button" id="add1"></td> 
										</tr>
										<tr>
											<td>Correct Answer</td>
											<td>
											<select name="correct" id="correct" class="form2">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
											</select>
											</td> 
										</tr>
										<!--<tr>
											<td>Full mark</td>
											<td>
											<input type="text" name="fullmark" />
											</td> 
										</tr>-->
										<tr> 
											<td>&nbsp;</td> 
											<td><input type="submit" name="submit" class="button" value="Add"></td> 
										</tr>
										</table>  
									</form>
									
									<table class="table1" cellpadding="5">
						<tr>
							<th>Class Name</th>
							<th>Subject Name</th>
							<th>Topic Name</th>
							<th>Questions</th>
							<th>Answers</th>
							<th>Correct answer</th>
							<th colspan="2">Action</th>
						</tr>
						<?php
							
							$sqlanswer=mysql_query("select * from `student_answer`");
							while($resanswer=mysql_fetch_array($sqlanswer)){
							$classid=$resanswer['class_id'];
							$subjectid=$resanswer['subject_id'];
							$topicid=$resanswer['topic_id'];
							$questionid=$resanswer['question_id'];
							$sqlclass=mysql_query("select * from `student_class` where `id`='$classid'");
							$resclass=mysql_fetch_array($sqlclass);
							$sqlsubject=mysql_query("select * from `student_subject` where `id`='$subjectid'");
							$ressubject=mysql_fetch_array($sqlsubject);
							$sqltopic=mysql_query("select * from `student_topic` where `id`='$topicid'");
							$restopic=mysql_fetch_array($sqltopic);
							$sqlquestion=mysql_query("select * from `student_question` where `id`='$questionid'");
							$resquestion=mysql_fetch_array($sqlquestion);
							
						?>
						<tr>
							<td><?php echo $resclass['class']; ?></td>
							<td><?php echo $ressubject['subject'];?></td>
							<td><?php echo $restopic['topic'];?></td>
							<td><?php echo $resquestion['questions'];?></td>
							<td><?php echo $resanswer['answers'];?></td>
								<td><?php echo $resanswer['correctanswer'];?></td>
							<td><a href="answer_edit.php?id=<?php echo $resanswer['id'];?>"><img src="image/edit.png" width="50" ></a></td>
							<td onClick="delete_data(<?php echo $resanswer['id']; ?>)"><img src="image/delete.png" width="70" ></td>
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