<?php
include_once("function.php");
include_once("function1.php");
if(isset($_POST['submit'])){
	$class=$_POST['cboclass'];
	$subject=$_POST['cbosubject'];
	$topic=$_POST['cbotopic'];
$time=htmlentities($_POST['time'],ENT_QUOTES);
$time1=htmlentities($_POST['time1'],ENT_QUOTES);
$time2=htmlentities($_POST['time2'],ENT_QUOTES);
//$fullmark=htmlentities($_POST['fullmark'],ENT_QUOTES);
$fullmark=100;
if(!empty($_POST['time']) && !empty($_POST['time1'])  && !empty($_POST['time2'])  && !empty($class) && !empty($subject) && !empty($topic))
{
  	$sqlclass="Select class from student_class where id=".(int)$class ;
	$resultclass=$con->query($sqlclass);
	$class_name;
	if($resultclass->num_rows>0)
	{
		while($rowsclass=$resultclass->fetch_assoc())
		{
				$class_name=$rowsclass['class'];
		}	
	}
	
	$sqlsubject="Select `subject` from student_subject where id=".(int)$subject ;
	$resultsubject=$con->query($sqlsubject);
	$subject_name;
	if($resultsubject->num_rows>0)
	{
		while($rowssubject=$resultsubject->fetch_assoc())
		{
				$subject_name=$rowssubject['subject'];
		}	
	}
   /* $fet=mysql_query("select * from `time`")or die(mysql_error());
     $res=mysql_numrows($fet);
    if($res==0)
    {
    mysql_query("insert into `time` set `time`='$time',`time1`='$time1',`time2`='$time2',`fullmark`='$fullmark'")or die(mysql_error());
	$msg="successfully added";
    }
	else{
	    $stim=mysql_fetch_array($fet);
	    $tim=$stim['time'];
	mysql_query("update `time` set `time`='$time',`time1`='$time1',`time2`='$time2',`fullmark`='$fullmark' where `time`='$tim'")or die(mysql_error());;
	}*/
	$stmt = $con->prepare("INSERT INTO time (Class,Subject,Topic,time,time1,time2,fullmark) VALUES (?, ?, ?, ?, ?, ?,?)");
	$stmt->bind_param("sssiiii", $class_name,$subject_name, $topic,$time,$time1,$time2,$fullmark);
	$stmt->execute();
	
}
else{
$msg="Please Fillup All Required Fields";
}
}
header("location:time_add.php?msg=$msg");
?>
