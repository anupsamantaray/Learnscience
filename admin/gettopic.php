<?php
try
{
	//$c= intval($_GET['c']);
$r = intval($_GET['q']);
include_once("function1.php");
$sql="SELECT * FROM student_topic WHERE  subject_id = ".$r;
$result = $con->query($sql);
echo("<b>Select Topic</b><br><select name='cbosubject' class='form2' onclick='showquestions(this.value)'><option value=''>Select</option>");
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
		echo("<option value='".$row['id']."'>".$row['topic']."</option>");
	}
}
echo("</select>");
}
catch(Exception $e)
{
	
}
?>