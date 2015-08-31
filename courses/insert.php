<?php
include_once("../function.php");
$uname=$_SESSION['name'];
$slno=$_SESSION['slno'];
$t=$_SESSION['time'];
$classid=$_POST['hidden_class'];
$subjectid=$_POST['hidden_subject'];
$topicid=$_POST['hidden_topic'];
 $quesid=$_POST['hidden_quid'];
 $question=explode("|",$quesid);
 $date=date("Y-m-d");
 $f=mysql_query("select * from `student_subject` where `id`='$subjectid'");
    $r=mysql_fetch_array($f);
    $c=$r['status']+1;
    mysql_query("update `student_subject` set `status`='$c' where `id`='$subjectid'");
foreach($question as $qid)
{
if($qid!=""){
 $name='answerbutton'.$qid;
  if(isset($_POST[$name]))
    {
 $nm=$_POST[$name];
$fet1=mysql_query("select * from `select_answer` where `name`='$uname' and `class`='$classid' and `subject`='$subjectid' and `topic`='$topicid' and `question`='$qid' and `answer`='$nm' and `time`='$t'")or die(mysql_error());
     $res1=mysql_numrows($fet1);
    if($res1==0)
    {
        $fetch=mysql_query("select * from `student_question` where `id`='$qid'");
        $r=mysql_fetch_array($fetch);
        $ans=$r['correct'];
        if($ans==$nm)
        {
        
mysql_query("insert into `select_answer` set `name`='$uname',`userid`='$slno',`class`='$classid',`subject`='$subjectid',`topic`='$topicid',`question`='$qid',`answer`='$nm',`time`='$t', `mark`='1',`date`='$date'") or die(mysql_error());
//echo "insert into `select_answer` set `name`='$uname',`class`='$classid',`subject`='$subjectid',`topic`='$topicid',`question`='$qid',`answer`='$nm'";
        }
        else{
            mysql_query("insert into `select_answer` set `name`='$uname',`userid`='$slno',`class`='$classid',`subject`='$subjectid',`topic`='$topicid',`question`='$qid',`answer`='$nm',`time`='$t', `mark`='0',`date`='$date'") or die(mysql_error());
           // echo "insert into `select_answer` set `name`='$uname',`userid`='$slno',`class`='$classid',`subject`='$subjectid',`topic`='$topicid',`question`='$qid',`answer`='$nm',`time`='$t', `mark`='0',`date`='$date'";
        
        }
    }
    }else{ mysql_query("insert into `select_answer` set `name`='$uname',`userid`='$slno',`class`='$classid',`subject`='$subjectid',`topic`='$topicid',`question`='$qid',`answer`='$nm',`time`='$t', `mark`='0',`date`='$date'") or die(mysql_error());
        //echo "insert into `select_answer` set `name`='$uname',`userid`='$slno',`class`='$classid',`subject`='$subjectid',`topic`='$topicid',`question`='$qid',`answer`='$nm',`time`='$t', `mark`='0',`date`='$date'";
        }
}
}
if(isset($_POST['sub'])){ header("location:examque.php?class=$classid&sub=$subjectid&topic=$topicid");
}else{
header("location:examque2.php?c=$classid&s=$subjectid&t=$topicid&q=$quesid");
}
?>
