<?php
include("../function.php");
include("../function1.php");
if(!empty($_POST['txtfeedback']))
{
	
	$sqlfeedback="Select * from login where email='".$_SESSION['email']."'";
	$resultfeedback=$con->query($sqlfeedback);
	if($resultfeedback->num_rows>0)
	{
		while($rows_feedback=$resultfeedback->fetch_assoc())
		{
			$name=$rows_feedback['name'];
			$eid=$rows_feedback['email'];
			$city=$rows_feedback['city'];	
		}	
	}
	
	 $ip = $_SERVER['REMOTE_ADDR'];     
        if($ip)
		{
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
			{
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } 
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
			{
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
           // return $ip;
        }
		//echo($ip);
	$sql="insert into feedback(Name,eid,city,IP_addr,message) values('".$name."','".$eid."','".$city."','".$ip."','".$_POST['txtfeedback']."')";
	$result=$con->query($sql);
	header("location:feedback.php?msg=Feedback Submitted");
}
?>