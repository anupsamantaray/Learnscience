
<?php
//$con=new mysqli("localhost","learnsci_twcta","hHeOhbPMtR&F","learnsci_kriti");
//include_once("function.php");
include_once("function1.php");
$q = intval($_GET['q']);

//$_SESSION['class_id']=$q;
$sql1="Select * from  student_subject where class_id=".$q;
$getclass="Select class from student_class where id=".$q;
$res_getclass=$con->query($getclass);
if($res_getclass->num_rows>0)
{
	while($rows=$res_getclass->fetch_assoc())
	{
		$_SESSION['class']=$rows['class']	;
	}
}
$res_sql1=$con->query($sql1);
echo("<td>Subject</td><td><select class='form' name='cbosubject' style='width:250px;height:30px;' onchange='showtopic(this.value)'><option value='select'>Select</option>");
if ($res_sql1->num_rows > 0) 
{
    while($row = $res_sql1->fetch_assoc()) 
	{
		echo "<option value='".$row["id"]."'>".$row['subject']."</option>";
	}
}
echo("</select></td>");
?>