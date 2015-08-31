<?php  include_once("../function.php");
ob_start();
if(!isset($_SESSION['time']))
$_SESSION['time']=time();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>..:User Panel:..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" type="text/css" rel="stylesheet" media="screen" />
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
        //document.getElementById("myForm").submit();
        document.MyForm.submit();
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
    <style>
        .tdclass{ width: 20px;}
		p
		{
		float:left;
		margin:0px;
		}
    </style>
</head>
<body>
    <?php include_once('header.php')?>  
    <div id="container">
        <div id="container_content">
            <div id="page">
                <?php
                $slno=$_SESSION['slno'];
                $fslno=mysql_query("select * from `login` where `slno`='$slno'");
                $rslno=mysql_fetch_array($fslno);
                $lev=$rslno['level'];
   $ftime=mysql_query("select * from `time`");
   $rtime=mysql_fetch_array($ftime);
   if($lev==1){ $time=$rtime['time1'];}
   elseif($lev==2){ $time=$rtime['time2'];}
   else{ $time=$rtime['time'];}
   ?>
                <div id="container_right">  
                    <div class="topiccontent">
                         <?php
                          $class=$_GET['class'];
                          $subject=$_GET['sub'];
                          $topic=$_GET['topic'];
                         $fet=mysql_query("select * from `student_subject` where `id`='$subject'");
                         $r=mysql_fetch_array($fet);
                         $fet1=mysql_query("select * from `student_topic` where `id`='$topic'");
                         $r1=mysql_fetch_array($fet1);
                         $fetclass=mysql_query("select * from `student_class` where `id`='$class'");
                         $rclass=mysql_fetch_array($fetclass);
                         ?>
                         <h5>Exam For Class <?php echo $rclass['class'];?></h5>
                   
                            <h2><img src="../admin/<?php echo $r['image'];?>" style="float: left; margin-right: 10px; width:40px; margin-top: -10px;"/><?php echo $r['subject'];?></h2>
                            <h4><?php echo $r1['topic'];?></h4>
                            
                            <form name="MyForm" action="insert.php" method="post">  
                               <table style="width:100%; height: auto; font-family: arial; font-size:14px; color: #333;">
                                <tr>
                                    <td colspan="2"><div style="width:90px; height: 24px; padding: 3px; float: right; background:#a82920; text-align: center; line-height: 1.5;color: #fff; font-size: 16px; "><input type="hidden" name="time" id="time" value="<?php echo $time; ?>"><div id="time"><div id='timer' /></div></div></td>
                                </tr>
                                <input type="hidden" name="hidden_class"  id="hidden_class"value="<?php echo $_GET['class'];?>"/>
                                <input type="hidden" name="hidden_subject" id="hidden_subject" value="<?php echo $_GET['sub'];?>"/>
                                <input type="hidden" name="hidden_topic" id="hidden_topic" value="<?php echo  $_GET['topic'];?>"/>
                                    <?php
                                    //$fetch=mysql_query("select * from `student_answer` where `class_id`='$class' and `subject_id`='$subject' and `topic_id`='$topic'") or die(mysql_error());
                                   // echo "SELECT * FROM student_question where `class_id`='$class' and `subject_id`='$subject' and `topic_id`='$topic' ORDER BY RAND( ) LIMIT 0 , 10";
                                   $result=mysql_query("SELECT * FROM student_question where `class_id`='$class' and `subject_id`='$subject' and `topic_id`='$topic' and `difficulty`='$lev' and id not in (SELECT question FROM select_answer WHERE userid=$_SESSION[slno]) LIMIT 0 , 10 ") or die(mysql_error());
                                   //$result = mysql_query("SELECT * FROM student_question where `class_id`='$class' and `subject_id`='$subject' and `topic_id`='$topic' ORDER BY RAND( ) LIMIT 0 , 10")or die(mysql_error());
                                   $number=mysql_numrows($result);
                                   if($number!=0){
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
                                <td colspan="2"><div style="width:40px; float:left;"><?php echo $i.")";?></div><?php echo $q;?></td>
                               <!-- <td><?php echo $q ;?></td>-->
                                </tr>
                                <?php
                                foreach($ansarr as $arr)
                                {
                                  if($arr!="")
                                  {
                                ?>
                                <tr>
                                <td colspan="2"><input type="radio" name="answerbutton<?php echo $question ;?>" value="<?php echo $aid;?>" style="margin-right:20px;"><?php echo $arr;?></td>
								
                                </tr>
                                <?php $aid++;
                                } } }
                                ?>
                                </tr>
                                <input type="hidden" name="hidden_quid" id="hidden_quid" value="<?php echo $quid; ?>" />
                                <tr>
                                <td><input type="submit" name="submitval" value="submit/finish" style="width:100px;" /></td>
                                <td align="right"><input type="submit" name="sub" value="Next" style="width:100px;" /></td>
                                </tr><?php }else{ header("location:examque2.php?c=$class&s=$subject&t=$topic");}?>
                                </table>
                                </form>
                            </div>

                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    
    <?php include_once('footer.php')?>
</body>
</html>