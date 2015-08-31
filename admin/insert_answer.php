<?php
include_once("function.php");
if(isset($_POST['submit']))
{
$classid=htmlentities($_POST['selcls'],ENT_QUOTES);
$subjectid=htmlentities($_POST['sub'],ENT_QUOTES);
$topid=htmlentities($_POST['topicname'],ENT_QUOTES);
$quesid=htmlentities($_POST['qusname'],ENT_QUOTES);
$correct=htmlentities($_POST['correct'],ENT_QUOTES);
$fullmark=htmlentities($_POST['fullmark'],ENT_QUOTES);
$date=date("Y-m-d");

 $ans=$_POST['ans'];
 $answer="";
foreach($ans as $anss)
{
 $answer=$answer."|".$anss;
}
if($classid!="" && $subjectid!="" && $quesid!="" && $answer!="" || $topid!="" )
{
    $fet=mysql_query("select * from `student_answer` where   `class_id`='$classid' and `subject_id`='$subjectid' and `topic_id`='$topid' and `question_id`='$quesid' and `answers`='$answer' and `correctanswer`='$correct' and `fullmark`='$fullmark' and `date`='$date'")or die(mysql_error());
    $res=mysql_numrows($fet);
    if($res==0)
    {
	echo $answer;
	if($answer!=""){
mysql_query("insert into `student_answer` set `class_id`='$classid',`subject_id`='$subjectid',`topic_id`='$topid',`question_id`='$quesid',`answers`='$answer',`correctanswer`='$correct',`fullmark`='$fullmark',`date`='$date'");
$msg="successfully added";
//echo "insert into `student_answer` set `class_id`='$classid',`subject_id`='$subjectid',`topic_id`='$topid',`question_id`='$quesid',`answers`='$answer',`correctanswer`='$correct',`fullmark`='$fullmark',`date`='$date'";
    }
	}
	else{
	$msg="this is already exist";
	}
}


}
header("location:answer_add.php?msg=$msg");
?>
