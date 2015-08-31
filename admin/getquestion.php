<?php
try
{ 
$q = intval($_GET['q']);
include_once("function1.php");
$sql="SELECT * FROM student_question WHERE topic_id = ".$q;
$result = $con->query($sql);

if ($result->num_rows > 0) 
{
	$i=1;
	while($row = $result->fetch_assoc()) 
	{
		//echo($i.".)".$row['questions']."");
		$arrans=explode('|',$row['answers']);
		echo("<hr><center><b>Question ".$i."</b></center><br>".trim($row['questions'])."<b><br>Options</b><br>1.) ".$arrans[1]."<br>2.) ".$arrans[2]."<br>3.) ".$arrans[3]."<br>4.) ".$arrans[4]."<br><b>Answer : ".$arrans[$row['correct']]."</b><br><br>");
		
		
		$i++;
	}
}

}
catch(Exception $e)
{
	
}
?>