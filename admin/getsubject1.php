<?php
include("function.php");
include("function1.php");
$q = intval($_GET['q']);
$sqlsubject="Select * from student_subject where class_id=".$q;
$resultsubject=$con->query($sqlsubject);
if($resultsubject->num_rows>0)
{
	while($rowsubject=$resultsubject->fetch_assoc())
	{
		echo("<option value='".$rowsubject['id']."'>".$rowsubject['subject']."</option>");
	}	
}