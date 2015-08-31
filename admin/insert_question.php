<?php
include_once("function.php");
if(isset($_POST['submit'])){
$classid=htmlentities($_POST['selcls'],ENT_QUOTES);
$subjectid=htmlentities($_POST['sub'],ENT_QUOTES);
$topid=htmlentities($_POST['topicname'],ENT_QUOTES);
$i=0;
foreach($_POST['quesname'] as $qu => $quess)
{ 
$i++;
$anss='ans'.$i;
$an=$_POST[$anss];
$answer='';
foreach($an as $answ){
$answer.="|".$answ;
}
$crtt='';
$x=$_POST['correct'][$qu];
$level=$_POST['difficulty'][$qu];
$fet=mysql_query("select * from `student_question` where `class_id`='$classid' and `subject_id`='$subjectid' and `topic_id`='$topid' and `questions`='$quess' and `answers`='$answer' and `correct`='$x'")or die(mysql_error());
    $res=mysql_numrows($fet);
    if($res==0)
    {
//echo "insert into `student_question` set `class_id`='$classid',`subject_id`='$subjectid',`topic_id`='$topid',`questions`='$quess',`answers`='$answer',`correct`='$x',`difficulty`='$level'";
mysql_query("insert into `student_question` set `class_id`='$classid',`subject_id`='$subjectid',`topic_id`='$topid',`questions`='$quess',`answers`='$answer',`correct`='$x',`difficulty`='$level'")or die(mysql_error());
}
}
}
$msg="successfully added";
header("location:question_add.php?msg=$msg");
?>