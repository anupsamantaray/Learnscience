<?php
include_once("function.php");
if(isset($_POST['submit']))
{
$classid=htmlentities($_POST['class'],ENT_QUOTES);
$subjectid=htmlentities($_POST['subject'],ENT_QUOTES);
$topid=htmlentities($_POST['topic'],ENT_QUOTES);
$concept=htmlentities($_POST['txtconcept'],ENT_QUOTES);
//$i=0;
//foreach($_POST['quesname'] as $qu => $quess)
//{ 
//$i++;
//$anss='ans'.$i;
//$an=$_POST[$anss];
//$answer='';
//foreach($an as $answ){
//$answer.="|".$answ;
//}
//$crtt='';
//$x=$_POST['correct'][$qu];
//$level=$_POST['difficulty'][$qu];
if(!empty($classid) && !empty($subjectid) && !empty($topid) && !empty($concept) )
{
$fet=mysql_query("select * from `tblconcepts` where `class`='$classid' and `subject`='$subjectid' and `topic`='$topid' and `concept`='$concept'")or die(mysql_error());
    $res=mysql_numrows($fet);
    if($res==0)
    {
//echo "insert into `student_question` set `class_id`='$classid',`subject_id`='$subjectid',`topic_id`='$topid',`questions`='$quess',`answers`='$answer',`correct`='$x',`difficulty`='$level'";
		mysql_query("insert into `tblconcepts` set `class`='$classid',`subject`='$subjectid',`topic`='$topid',`concept`='$concept'")or die(mysql_error());
	}
}
//}
}
$msg="successfully added";
header("location:add_concepts.php?msg=$msg");
?>