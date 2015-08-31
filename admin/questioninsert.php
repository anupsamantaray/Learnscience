<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<?php
include_once("function.php");
$quval=$_GET['qusval'];
$firstans=$_GET['firstans'];
$secondans=$_GET['secondans'];
$thirdans=$_GET['thirdans'];
$fourthans=$_GET['fourthans'];
$classid=$_GET['classval'];
$subjectid=$_GET['subjectval'];
$topicid=$_GET['topicval'];
echo $quval; 
//echo $firstans;
//echo $secondans;
//echo $thirdans;
//echo $fourthans;
//echo $classid;
//echo $subjectid;
//echo $topicid;
$answer=$firstans."|".$secondans."|".$thirdans."|".$fourthans;
//echo $answer;

        //echo "insert into `student_question` set `class_id`='$classid',`subject_id`='$subjectid',`topic_id`='$topicid',`questions`='$quval',`answers`='$answer'";
        //mysql_query("insert into `student_question` set `class_id`='$classid',`subject_id`='$subjectid',`topic_id`='$topicid',`questions`='$quval',`answers`='$answer'");
		//$msg="successfully added";
		

?>
											<tr>
												<td>
													<label>
														Questions
													</label>
												</td>
												<td >
													<textarea class="tinymce" id="txt"></textarea>
												</td>
											</tr>											<tr>
												<td>Answers</td>
												<td><input type="text" name="ans[]" id="firstans"/></td>
												<td><input type="text" name="ans[]" id="secondans"/></td>
												<td><input type="text" name="ans[]" id="thirdans"/></td>
												<td><input type="text" name="ans[]" id="fourthans"/></td>
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