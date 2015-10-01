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
<<<<<<< HEAD
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		setupTinyMCE();
	});
	function getval(id){
	  $.ajax({url:"subject1.php?val="+id,success:function(result){
		$("#t1").html(result);
		}});  
	}
	function get_topic(vals){
		$.ajax({url:"topic.php?val="+vals,success:function(result){
			$("#tp").html(result);
		}});  
	}
=======
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
>>>>>>> b82c6f76c9069e7030a89612c350798b2992773a
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
<<<<<<< HEAD
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
=======
 <div id="main_bar">
 		<div id="main_box">
				<div id="left_box">
					<?php
						if($_SESSION['admin_type'] == 1){
							include_once("conleft_bar_sub.php");
						}else{
							include_once("conleft_bar.php");
						}
					?>
>>>>>>> b82c6f76c9069e7030a89612c350798b2992773a
				</div>
				<div id="content2">
					<?php
					if(isset($_GET['msg'])){
						$mess=$_GET['msg'];
						echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
					}
				  ?>
					<form name="f" method="post" id="formid" action="insert_question.php" enctype="multipart/form-data">
						<table class="table" style="line-height:2.5;" id="TableMain">
							<tr>
							   <td colspan="2">Class Name
									<select name="selcls" onChange="return getval(this.value);" class="form2" id="classid" required/>
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
							<tr id="tp"></tr>
							<tr>
								<td>
									<textarea  class="tinymce" name="quesname[]" id="question" style="width:50px;"></textarea>
								</td>
								<td>
									<span>Answers</span><br/><input type="text" name="ans1[]" class="form btm"/><br/>
									<input type="text" name="ans1[]" class="form btm"/><br/>
									<input type="text" name="ans1[]" class="form btm"/><br/>
									<input type="text" name="ans1[]" class="form btm"/>
								</td>
							</tr>
							<tr>
								<td colspan="2">Correct Answer
									<select name="correct[]" class="form2">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
									</td> 
							</tr>
							<tr>
								<td colspan="2">Difficulty
								
								<select name="difficulty[]" class="form2">
									<option value="0">low</option>
									<option value="1">Medium</option>
									<option value="2">High</option>
								</select>
								</td>
							</tr>
							<tr><td id="tbb" colspan="2"></td></tr>
							<tr> 
								<td><input type="submit" name="submit" value="Add" class="button"></td> 
								<td>
								<!--<input type="button" name="button" value="addnew" id="add1">-->
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
			<br/><br/>
			<div id="content1">
				<div class="head2">
					Search Questions
				</div>
				<div id="content2">
					<table class="table" style="line-height:2.5;" id="TableMain">
						<tr>
							<td><b>Select Class</b><br/>
								<select name='cboclass' id='cboclass' class="form2"  onchange="showsubject(this.value)"><option value=''>Select</option><?php
										 $sqlclass = "SELECT * FROM student_class";
										$result_sqlclass = $con->query($sqlclass);
										if ($result_sqlclass->num_rows > 0) 
										{
											while($row_class = $result_sqlclass->fetch_assoc()) 
											{
												echo("<option value='".$row_class['id']."'>".$row_class['class']."</option>");		
											}
										}
							?>	</select>
							</td>
								<td id='load_subject'></td>
								<td id='load_topic'></td>
						</tr>
					</table><br/>
					<div id='content2'>
						<table class="table" style="width:100%" id="TableMain">
							
							<tr>
								<td id='load_questions'>
									
								</td>
							 </tr>
						 </table>
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
			<?php include_once('footermenu.php');?>
	</div>
</div>
  <!--------------footer end--------->                   
</body>
</html>
<script>
function showsubject(str) {
    if (str == "") {
        document.getElementById("load_subject").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("load_subject").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getsubject.php?q="+str,true);
        xmlhttp.send();
    }
}
function showtopic(str) {
    if (str == "") {
        document.getElementById("load_topic").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("load_topic").innerHTML = xmlhttp.responseText;
            }
        }
		
		xmlhttp.open("GET","gettopic.php?q="+str,true);
        xmlhttp.send();
    }
}
function showquestions(str) {
    if (str == "") {
        document.getElementById("load_questions").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getquestion.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>