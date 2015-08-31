<?php
include_once("function.php");
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
<script src="js/setup.js" type="text/javascript"></script/>
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
xmlhttp.open("GET","subject1.php?val="+id,true);
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
xmlhttp.open("GET","topic.php?val="+vals,true);
xmlhttp.send();

}
</script>


	<script type="text/javascript">
    $(function(){
	var i=1;
	$('#add1').click(function () {
	i++;
        $('#tbb').append('<tr><td><textarea class="tinymce" name="quesname[]" id="question'+i+'"/></textarea></td><td><input type="text" name="ans[]"/><br/><input type="text" name="ans[]"/><br/><input type="text" name="ans[]"/><br/><input type="text" name="ans[]"/></td></tr>');
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
										Add Question
								</div>
								<div id="content2">
										<?php
											  if(isset($_GET['msg']))
											  {
											  $mess=$_GET['msg'];
											   echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
											  }
											  ?>
										<form name="f" method="post" id="formid" action="insert_question.php" enctype="multipart/form-data">
											<table class="table" style="line-height:2.5;" id="TableMain">
											
											 <tr>
											   <td>Class Name
												
												<select name="selcls" onChange="return getval(this.value);" class="form2" id="classid" required>
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
												
												<td>
													<textarea  class="tinymce" name="quesname[]" id="question" style="width:50px;"></textarea>
												</td >
												<td><input type="text" name="ans[]" /><br/>
												<input type="text" name="ans[]" /><br/>
												<input type="text" name="ans[]" /><br/>
												<input type="text" name="ans[]" /></td>
												
											</tr>
											
											<!--</tbody>-->
											<tr><td id="tbb"></td></tr>
											<tr>
												<td>Correct Answer
												
												<select name="correct" id="correct" class="form2">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
												</td> 
											</tr>
											<tr>
												<td>Time setting
												<input type="text" name="timing" /></td>
											</tr>
											<tr>
												<td>Year setting
												<input type="text" name="year" /></td>
											</tr>
											<!--<tr>
												<td colspan="5" style="text-align:right;">
													<input type="button" name="addmore" value="addmore questions" onclick="return getques();" />
												</td>
											</tr>-->
											<tr> 
												 
												<td><input type="submit" name="submit" value="Add" class="button"></td> 
												<td>
												<input type="button" name="button" value="addnew" id="add1" onclick="return addrow();">
												</td>
											</tr>
											</table>  
										</form>
						  
										
											<!--<table class="table1" cellspacing="0" cellpadding="5" style="text-align:center; margin-top:15px;" >
											<tr class="tr_con">
												<th>Class Name</th>
												<th>Subject Name</th>
												<th>Topic Name</th>
												<th>Question</th>
												<th colspan="2">Action</th>
											</tr>
											<?php
												
												$sqlquestion=mysql_query("select * from `student_question`");
												while($resquestion=mysql_fetch_array($sqlquestion)){
												$classid=$resquestion['class_id'];
												$subjectid=$resquestion['subject_id'];
												$topicid=$resquestion['topic_id'];
												$sqlclass=mysql_query("select * from `student_class` where `id`='$classid'");
												$resclass=mysql_fetch_array($sqlclass);
												$sqlsubject=mysql_query("select * from `student_subject` where `id`='$classid'");
												$ressubject=mysql_fetch_array($sqlsubject);
												$sqltopic=mysql_query("select * from `student_topic` where `id`='$topicid'");
												$restopic=mysql_fetch_array($sqltopic);
												
											?>
											<tr>
												<td class="td"><?php echo $resclass['class']; ?></td>
												<td  class="td"><?php echo $ressubject['subject'];?></td>
												<td  class="td"><?php echo $restopic['topic'];?></td>
												<td  class="td"><?php echo $resquestion['questions'];?></td>
												<td class="td"><a href="question_edit.php?id=<?php echo $resquestion['id'];?>"><img src="image/edit.png"></a></td>
												<td class="td" onClick="delete_data(<?php echo $resquestion['id']; ?>)"><img src="image/delete.png"></td>
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
