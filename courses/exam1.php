<?php
$con=new mysqli("localhost","root","","learnsci_kriti");
//include_once("../admin/function1.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>..:User Panel:..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" type="text/css" rel="stylesheet" media="screen" />
</head>
<body>
   <?php include_once('header_exam.php');
   $sqlclass="Select class from student_class";
   $result_sqlclass=$con->query($sqlclass);
   
   ?>

    
    <div id="container">
        <div id="container_content">
            <div id="page">
                <div id="container_left">
                    <div class="heading">
                        <h3>All Class</h3>
                        
                    </div>
                    <ul style="margin-left: 0px; padding: 5px;">
                       <?php if ($result_sqlclass->num_rows > 0){ 
					   		while($row = $result_sqlclass->fetch_assoc())
							{?><li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" /> Class<?php echo($row['class']) ?>
                        </li><?php } }?>
                    </ul>
                </div>
                <div id="container_right">
                  <div class="welcome">
              			Welcome <?php if($_SESSION['name']){echo $_SESSION['name'];} ?>
	              </div>
                </div>
