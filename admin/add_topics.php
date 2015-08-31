<?php
//session_start();
//$con=new mysqli("localhost","learnsci_twcta","hHeOhbPMtR&F","learnsci_kriti");
include_once("function.php");
include_once("function1.php");
$q = intval($_GET['q']);

$_SESSION['subject_id']=$q;
$getclass="Select subject from student_subject where id=".$q;
$res_getclass=$con->query($getclass);
if($res_getclass->num_rows>0)
{
	while($rows=$res_getclass->fetch_assoc())
	{
		$_SESSION['subj']=$rows['subject']	;
	}
}
$sql1="Select * from  student_topic where subject_id=".$q;
$res_sql1=$con->query($sql1);
echo("<td>Topic</td><td><select class='form' name='cbotopic' style='width:250px;height:30px;' ><option value='select'>Select</option>");
if ($res_sql1->num_rows > 0) 
{
    while($row = $res_sql1->fetch_assoc()) 
	{
		echo "<option value='".$row["topic"]."'>".$row['topic']."</option>";
	}
}
echo("</select></td>");
?>