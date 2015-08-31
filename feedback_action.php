<?php include_once('function.php');
	include_once('function1.php');
	 $ip = $_SERVER['REMOTE_ADDR'];     
        if($ip){
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            return $ip;
        }
		
		
    $sql="insert into feedback(Contact_no,eid,IP_addr,message) values('".$_POST['phone']."','".$_POST['email']."','".$ip."','".$_POST['feedback']."')";
	$resultsql=$con->query($sql);
	$name=htmlentities($_REQUEST['name']);
    $phone=htmlentities($_REQUEST['phone']);
    $email=htmlentities($_REQUEST['email']);
    $feed=htmlentities($_REQUEST['feedback']);
    $header="from: noreply@learnscience.co.in";
    $header1="from: $email";
		$feedback="Thank you for contacting us";
	       $subject="email verification";
	       $from="noreply@learnscience.co.in";
		$sentmail = mail($email,$subject,$feedback,$header);
		$sentmail1 = mail($from,$subject,$feed,$header1);
    header("location:feedback.php");

?>