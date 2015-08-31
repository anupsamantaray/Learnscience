<?php
include("function.php");
include("function1.php");
$q = intval($_GET['q']);
$sql="Select concept from tblconcepts where topic=".$q;
$result=$con->query($sql);
if($result->num_rows>0)
{
	while($rows=$result->fetch_assoc())
	{
		echo("<option value='".$rows['concept']."'>".$rows['concept']."</option>");
	}	
}
?>