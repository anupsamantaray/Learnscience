<?php
include_once("../function.php");
include_once("../function1.php");
ob_start();
if (!$_SESSION['name']){
header("location:logout.php");
}
else{
$class=$_SESSION['class'];
$sqlcl=mysql_query("select * from `student_class` where `id`='$class'");
$rescl=mysql_fetch_array($sqlcl);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>..:User Panel:..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" type="text/css" rel="stylesheet" media="screen" />
<style>
a:link {
    color:blue;
}

/* visited link */
a:visited {
    color: blue;
}

/* mouse over link */
a:hover {
    color: blue;
}

/* selected link */
a:active {
    color: blue;
}

</style>
 <style>
 					.sub span{
						margin:0 20px;
					}
				 	.sub span a{
						color:#de6a11; 
						font-weight:bold;
						border: 1px solid #f68c1d;
						border-radius:50%;
						padding:8px 20px;
						text-decoration:none;
						font-size:20px;
					}
					.sub span a:hover{
						color:#0070b1; 
						font-weight:bold;
						border: 1px solid #de6a11;
						}
                 </style>
</head>
<body>
   <?php include_once('header.php')?>

    
    <div id="container">
        <div id="container_content">
            <div id="page">
                <div id="container_left">
                    <div class="heading">
                        <h3>All Class</h3>
                        
                    </div>
                    <ul style="margin-left: 0px; padding: 5px;">
                        <li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" /> Class <?php echo $rescl['class'];?>
                        </li>
                    </ul>
                </div>
                <div id="container_right">
                  <div class="welcome">
              			Welcome <?php if($_SESSION['name']){echo $_SESSION['name'];} ?>
                </div>
                	<?php
				  	$sqlsubject="Select * from  student_subject where class_id=".$class;
					$result_subject=$con->query($sqlsubject);
					echo("<h1>Subjects</h1><br>");
					
                  ?>
               
                    <div class="sub">
                      <span><a href="#s">Sceince</a></span>
                      <span><a href="#s">Maths</a></span>
                   </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include_once('footer.php')?>
</body>
</html><?php } ?>