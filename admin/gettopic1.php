<?php
include("function.php");
include("function1.php");
$q = intval($_GET['q']);
$sqltopic="Select * from student_topic where subject_id=".$q;
$resulttopic=$con->query($sqltopic);
if($resulttopic->num_rows>0)
{
	while($rowtopic=$resulttopic->fetch_assoc())
	{
		echo("<option value='".$rowtopic['id']."'>".$rowtopic['topic']."</option>");
	}	
}