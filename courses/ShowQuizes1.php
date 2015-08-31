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
/*a:link {
    color:blue;
}*/

/* visited link */
/*a:visited {
    color: blue;
}*/

/* mouse over link */
/*a:hover {
    color: blue;
}*/

/* selected link */
/*a:active {
    color: blue;
}*/
</style>
<style>
 					.sub span{
						margin:0 20px;
					}
				 	.sub span a{
						color:#de6a11; 
						font-weight:bold;
						font-size:20px;
						text-decoration:none;
						padding:8px 20px;
						/*background-color:#7FFFD4;*/
					}
					.sub span a:hover{
						/*color:#0070b1; 
						font-weight:bold;
						border: 1px solid #de6a11;*/
						color:#0070b1 !important;
						font-weight:bold;
						border: 1px solid #f68c1d;
						border-radius:50%;
						padding:8px 20px;
						text-decoration:none;
						font-size:20px;
						/*background-color:aquamarine;*/
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
                    
                  
                      </ul>
                    	 <?php
				  	$sqlsubject="Select * from  student_subject where class_id=".$class;
					$result_subject=$con->query($sqlsubject);
					echo("<div class='heading'><h3>Subjects</h3></div><br>");
					if($result_subject->num_rows>0)
					{
						while($rows_subject=$result_subject->fetch_assoc())	
						{
							echo("<ul style='margin-left: 0px; padding: 1px 5px;'><li class='list active li_sub'><img src='images/arrow.png' style='float: left; margin-right: 5px;'  ><a href='ShowQuizes1.php?sid=".$rows_subject['id']."'>".$rows_subject['subject']."</a> </li>
                        
                    </ul>");	
						}
					}
                  ?>
                    
                    
                    
                </div>
                <div id="container_right">
                  <div class="welcome">
              			Welcome <?php if($_SESSION['name']){echo $_SESSION['name'];} ?>
                </div>
                  <?php
				  	$sid=intval($_GET['sid']);
				  	$sqlsubject="Select * from student_topic where class_id=".$class." and  subject_id=".$sid;
					$result_subject=$con->query($sqlsubject);
					echo("<h1 style='padding-left: 40px;'>Topics</h1><br>");
					 echo("<div class='sub'>");
					if($result_subject->num_rows>0)
					{
						while($rows_subject=$result_subject->fetch_assoc())	
						{
							echo("<span><b><a href='ShowQuizes2.php?tid=".$rows_subject['id']."'>".$rows_subject['topic']."</a></b><span><br><br><br>");	
						}
					}
					echo("</div>");
                  ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php include_once('footer.php')?>
</body>
</html><?php } ?>