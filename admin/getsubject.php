<?php
try
{ 
$q = intval($_GET['q']);
include_once("function1.php");
$sql="SELECT * FROM student_subject WHERE class_id = ".$q;
$result = $con->query($sql);
echo("<b>Select Subject</b><br><select name='cbosubject' id='cbosubject' class='form2'  onchange='showtopic(this.value)'><option value=''>Select</option>");
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
		echo("<option value='".$row['id']."'>".$row['subject']."</option>");
	}
}
echo("</select>");
}
catch(Exception $e)
{
	
}
?>