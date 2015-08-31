<?php  include_once("../function.php");
ob_start();
if(!isset($_SESSION['time']))
$_SESSION['time']=time();
?>
<html>
<head>
    <script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.form.js"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

    <script type="text/javascript">
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
        alert("Time's up!")
        document.getElementById("myForm").submit();
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
  var t=$('#time').val();
  //alert(t);
    CreateTimer("timer", t);
});
</script>
    <script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}

$("#ajaxform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
            var qid=$("#hidden_quid").val();
            var cid=$("#hidden_class").val();
            //alert(cid);
            var sid=$("#hidden_subject").val();
            // alert(sid);
            var tid=$("#hidden_topic").val();
             //alert(tid);
            $.ajax({url:"indexload.php?s="+sid+'&c='+cid+'&t='+tid+'&q='+qid,success:function(result){
               $("#t1").html(result);
                }});
            
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //if fails
            alert("fail");
        }
    });
    e.preventDefault(); //STOP default action
    e.unbind(); //unbind. to stop multiple form submit.
});

</script>
    
</head>
<body>
  <?php
   $ftime=mysql_query("select * from `time`");
   $rtime=mysql_fetch_array($ftime);
   $time=$rtime['time'];
   ?>
  <input type="hidden" name="time" id="time" value="<?php echo $time; ?>">
    <div id="time">
    <div id='timer' />
  </div>

<div>
    <form name="f" action="insert.php" id="ajaxform" method="post">  
<table>
<tr>

<input type="hidden" name="hidden_class"  id="hidden_class"value="<?php echo $_GET['class'];?>"/>
<input type="hidden" name="hidden_subject" id="hidden_subject" value="<?php echo $_GET['sub'];?>"/>
<input type="hidden" name="hidden_topic" id="hidden_topic" value="<?php echo  $_GET['topic'];?>"/>
</tr>
    <?php
     $class=$_GET['class'];
     $subject=$_GET['sub'];
     $topic=$_GET['topic'];
     
    //$fetch=mysql_query("select * from `student_answer` where `class_id`='$class' and `subject_id`='$subject' and `topic_id`='$topic'") or die(mysql_error());
   // echo "SELECT * FROM student_question where `class_id`='$class' and `subject_id`='$subject' and `topic_id`='$topic' ORDER BY RAND( ) LIMIT 0 , 10";
   $result = mysql_query("SELECT * FROM student_question where `class_id`='$class' and `subject_id`='$subject' and `topic_id`='$topic' ORDER BY RAND( ) LIMIT 0 , 10")or die(mysql_error());
  $i=0;
  $quid="";
while($row=mysql_fetch_array($result)) 
{
    $q=$row['questions'];
    $aid=1;
    $ans=$row['answers'];
    $question=$row['id'];
    $ansarr=explode("|",$ans);
    $i++;
    $quid=$quid."|".$question;
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
?>
<tr>
<td colspan="2"><input type="radio" name="answerbutton<?php echo $question ;?>" value="<?php echo $aid;?>"><?php echo $arr;?></td>
</tr>
<?php $aid++;
} } }
?>
</tr>
<input type="hidden" name="hidden_quid" id="hidden_quid" value="<?php echo $quid; ?>" />
<tr>
<td colspan="2"><input type="submit" name="submitval" value="Go" style="width:100px;" /></td>
</tr>
</table>
</form>
</div>
</body>
</html>
