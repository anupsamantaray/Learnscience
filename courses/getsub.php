<?php
include_once("../function.php");
$classid=$_GET['classid'];
$getsubject=mysql_query("select * from `student_subject` where `class_id`='$classid'")or die(mysql_error());
$numsub=mysql_num_rows($getsubject);
if($numsub>0){
while($getressubject=mysql_fetch_array($getsubject))
						{	
?>

<h2><img src="../admin/<?php echo $getressubject['image'];?>" style="float: left; margin-right: 10px; width:40px; margin-top: -10px;"/>
					
						<?php echo $getressubject['subject'];?>
						
</h2>
<?php
$gettopic=mysql_query("select * from `student_topic` where `class_id`='$classid' and `subject_id`='$getressubject[id]'")or die(mysql_error());
$numtopp=mysql_num_rows($gettopic);
if($numtopp>0){
while($getrestopic=mysql_fetch_array($gettopic))
						{
?>
<h4 onclick="return topval(<?php echo $getressubject['id'];?>,<?php echo $getrestopic['id'];?>,<?php echo $classid;?>);">
					
					<?php echo $getrestopic['topic'];?>
					
					
</h4>
<?php
}
}
else
{
?>
<h4>There are no records.</h4>
<?php
//echo "no records";
}
}
}
else
{
?>
<h4>There are no records.</h4>
<?php
}
?>