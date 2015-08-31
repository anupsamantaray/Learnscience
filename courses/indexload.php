<?php  include_once("../function.php");
 $t=$_SESSION['time'];
$uname=$_SESSION['name'];
?>
<html>
<head>
    <script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.form.js"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script>
        window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
    </script>
   <!-- <script type="text/javascript">
var Timer;
var TotalSeconds;
function CreateTimer(TimerID, Time) {
    Timer = document.getElementById(TimerID);
    TotalSeconds = Time;
    
    UpdateTimer()
    window.setTimeout("Tick()", 1000);
} 
function Tick() {
    if (TotalSeconds <= 0) {
       window.location.replace("logout.php");
        return;
    }
      //
    
    TotalSeconds -= 1;
    UpdateTimer()
    window.setTimeout("Tick()", 1000);
}
function UpdateTimer() {
    var Seconds = TotalSeconds;
    
    var Days = Math.floor(Seconds / 86400);
    Seconds -= Days * 86400;
    var Hours = Math.floor(Seconds / 3600);
    Seconds -= Hours * (3600);
    var Minutes = Math.floor(Seconds / 60);
    Seconds -= Minutes * (60);
    var TimeStr = ((Days > 0) ? Days + " days " : "") + LeadingZero(Hours) + ":" + LeadingZero(Minutes) + ":" + LeadingZero(Seconds)
    Timer.innerHTML = TimeStr;
}
function LeadingZero(Time) {
    return (Time < 10) ? "0" + Time : + Time;
}

$('#time').ready(function()
{
    CreateTimer("timer", 60);
});
</script>-->
</head>
<body>
    <table>
    <?php
     $class=$_GET['c'];
     $subject=$_GET['s'];
     $topic=$_GET['t'];
     $qid=$_GET['q'];
     $qu=explode("|",$qid);
     $i=0;
     foreach( $qu as $qrr)
     {
     
    //$fetch=mysql_query("select * from `student_answer` where `class_id`='$class' and `subject_id`='$subject' and `topic_id`='$topic'") or die(mysql_error());
   // echo "SELECT * FROM student_question where `class_id`='$class' and `subject_id`='$subject' and `topic_id`='$topic' ORDER BY RAND( ) LIMIT 0 , 10";
   $result = mysql_query("SELECT * FROM student_question where `class_id`='$class' and `subject_id`='$subject' and `topic_id`='$topic' and `id`='$qrr' ")or die(mysql_error());
  
  
while($row=mysql_fetch_array($result)) 
{
    $q=$row['questions'];
    $aid=1;
    $ans=$row['answers'];
    $question=$row['id'];
    $correct=$row['correct'];
    $ansarr=explode("|",$ans);
    $i++;
    
    
?>
<tr>
<td><?php echo $i.")";?></td>
<td><?php echo $q ;?></td>
</tr>
<?php
foreach($ansarr as $arr)
{
  if($arr!="")
  {
    $sql=mysql_query("select * from `select_answer` where `time`='$t' and `question`='$qrr'");
    $res=mysql_fetch_array($sql);
    $sanswer=$res['answer'];
?>
<tr>
<td colspan="2"><?php echo $arr;?></td><?php if($sanswer==$correct && $sanswer==$aid) { ?><td><img src="img/tick.png"></td><?php } elseif($sanswer!=$correct && $correct==$aid){ ?><td><img src="img/tick.png"></td><?php }if($sanswer!=$correct && $sanswer==$aid){?><td><img src="img/cross.png"></td><?php }?>
</tr>
<?php $aid++;
} } }}
?>
</tr>
<tr>
    <td>Marks secured=<?php
    $found=mysql_query("select sum(mark) as mark from `select_answer` where `time`='$t'") or die(mysql_error());
    $found1=mysql_query("select * from `select_answer` where `time`='$t'") or die(mysql_error());
    $num=mysql_numrows($found1);
    $fetch=mysql_fetch_array($found);
    echo $fetch['mark'];
    ?></td>
</tr>
<tr>
    <td>Questions Appeared=<?php echo $num; unset($_SESSION['time']); ?></td>
</tr>
</table>
    <div id="time">
    <div id='timer' />
  </div>
</body>
</html> 