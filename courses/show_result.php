<?php
include_once("../function.php");
include_once("../function1.php");
ob_start();
if (!$_SESSION['name']){
header("location:logout.php");
}
else{
	
$sqlpropic="Select pro_pic from login where email='".$_SESSION['email']."'";
$result_sqlpropic=$con->query($sqlpropic);
$pic;
if($result_sqlpropic->num_rows>0)
{
	while($row_pic=$result_sqlpropic->fetch_assoc())
	{
		$pic=$row_pic['pro_pic'];
	}
}
$class=$_SESSION['class'];
$sqlcl=mysql_query("select * from `student_class` where `id`='$class'");
$rescl=mysql_fetch_array($sqlcl);
$result_class=$con->query("select * from `student_class` where `id`='$class'");
if($result_class->num_rows>0)
{
	while($rows_class=$result_class->fetch_assoc())
	{
		$classvalue=$rows_class["class"];	
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<title>..:User Panel:..</title>
<link href="style.css" type="text/css" rel="stylesheet" media="screen" />
<link href="css_menu/timeTo.css" type="text/css" rel="stylesheet"/>
 <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.timeTo.js"></script>

 <script>

 </script>



<?php 

/*$tid=$_GET['tid'];
$sqlgettopic="Select * from  student_topic where id=".$tid;
$resultgettopic=$con->query($sqlgettopic);
if($resultgettopic->num_rows>0)
{
	while($rows_gettopic=$resultgettopic->fetch_assoc())
	{
		$topic=$rows_gettopic['topic'];
		$subject_id=$rows_gettopic['subject_id'];
	}
}
$sqlgetsubject="Select * from  student_subject where id=".$subject_id;
$resultgetsubject=$con->query($sqlgetsubject);
if($resultgetsubject->num_rows>0)
{
	while($rows_getsubject=$resultgetsubject->fetch_assoc())
	{
		$subject1=$rows_getsubject['subject'];
		//$subject_id=$rows_gettopic['subject_id'];
	}
}
$sqlgettime="select * from  time where Topic='".$topic."'";
$result_gettime=$con->query($sqlgettime);
*/
//$sql_result="Select * from student_result where Publish='Yes' and Subject_class='".$class."' and Subject='".$subject1."' and Student_topic='".$topic."' order by Percent;";	
$sql_result="Select * from student_result where Publish='Yes' and Subject_class='".$classvalue."' order by Percent desc" ;
$result_sql_result=$con->query($sql_result);

?>








   <!-- <script type="text/javascript" src="js/scripts.js"></script>-->
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
						margin:0 0px;
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
<!--<div class='navbar navbar-inverse navbar-fixed-top' style="background-color:#0B3861;">-->
<!--<form name='f1' method='post' action=''>-->

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
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" /> Class <u><?php echo $rescl['class'];?></u>
                        </li>
                        <!--<li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" /> Subject <u><?php echo $subject1;?></u>
                        </li>
                        <li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" /> Topic <u><?php echo $topic;?></u>
                        </li>
                        <li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" /> <a href="show_result.php?tid=<?php echo $tid; ?>" style="color:rgb(0,112,176);" > Display Result</a>
                        </li>-->
                    </ul>
                </div>
               <div id="container_right">
                  <div class="welcome" id="welcome">
              			Welcome <?php if($_SESSION['name']){echo $_SESSION['name'];} ?>
                </div>
                <div><br />
                
                  <?php
				  
				  	//$tid=$_GET['tid'];?>
                   <form name='f1' method='post' action='getresult.php'>
                                     
                  <center> <table style="border:0px solid #000;border-radius:10px;padding:5px 5px px 5px;">
                   	<tr style="border:1px solid #000;border-radius:10px;">
                    	
                        
                         <th colspan="2" style="padding:5px;background-color:#efefef;color:rgb(0, 112, 176);padding-left:5px;padding-right:5px;">
                         Name</th>
                          <th style="padding:5px;background-color:#efefef;color:rgb(0, 112, 176);padding-left:15px;padding-right:15px;">Subject</th>
                          <th style="padding:5px;background-color:#efefef;color:rgb(0, 112, 176);padding-left:15px;padding-right:15px;">Topic</th>
                        <th style="padding:5px;background-color:#efefef;color:rgb(0, 112, 176);padding-left:15px;padding-right:15px;">Marks obtained</th>
                        <th style="padding:5px;background-color:#efefef;color:rgb(0, 112, 176);padding-left:15px;padding-right:15px;">Out Of</th>
                       <!-- <th style="padding:5px;background-color:#efefef;color:rgb(0, 112, 176);">Percentage</th>-->
                        <th style="padding:5px;background-color:#efefef;color:rgb(0, 112, 176);padding-left:15px;padding-right:15px;">Level</th>
                         <!--<th style="padding:5px;background-color:#efefef;color:rgb(0, 112, 176);">Time</th>-->
                        <!-- <th style="padding:5px;background-color:#efefef;color:rgb(0, 112, 176);">Date</th>-->
                        <!-- <th style="padding:5px;background-color:#efefef;color:rgb(0, 112, 176);">Rank</th>-->
                    </tr>
                    <?php
						if($result_sql_result->num_rows>0)
						{	
							$i=1;
							while($rows_getresult=$result_sql_result->fetch_assoc())
							{
								echo("<tr>");
								
								
								if(!empty($rows_getresult['propic']))
								{
									echo("<td align='center' style='padding:5px;background-color:#efefef;color:rgb(0, 112, 176);padding-left:15px;padding-right:15px;'><img src='".$rows_getresult['propic']."' height='50px' width='50px'></td>");
								}
								else
								{
									echo("<td align='center' style='padding:5px;background-color:#efefef;color:rgb(0, 112, 176);padding-left:15px;padding-right:15px;'><img src='images/user.png' height='50px' width='50px'></td>");
								}
								echo("<td align='center' style='padding:5px;background-color:#efefef;color:rgb(0, 112, 176);padding-left:15px;padding-right:15px;'>".$rows_getresult['Student_name']."</td>");
								echo("<td align='center' style='padding:5px;background-color:#efefef;color:rgb(0, 112, 176);padding-left:15px;padding-right:15px;'>".$rows_getresult['Subject']."</td>");
								echo("<td align='center' style='padding:5px;background-color:#efefef;color:rgb(0, 112, 176);padding-left:15px;padding-right:15px;'>".$rows_getresult['Student_topic']."</td>");
								echo("<td align='center' style='padding:5px;background-color:#efefef;color:rgb(0, 112, 176);'>".$rows_getresult["obtained_marks"] ."</td>");
								echo("<td align='center' style='padding:5px;background-color:#efefef;color:rgb(0, 112, 176);'>".$rows_getresult["Outof_marks"] ."</td>");
								//echo("<td align='center' style='padding:5px;background-color:#efefef;color:rgb(0, 112, 176);'>".$rows_getresult["Percent"] ."</td>");
								if($rows_getresult["level"]=='0')
								{
									echo("<td align='center' style='padding:5px;background-color:#efefef;color:rgb(0, 112, 176);'>Low</td>");
								}
								else if($rows_getresult["level"]=='1')
								{
									echo("<td align='center' style='padding:5px;background-color:#efefef;color:rgb(0, 112, 176);'>Medium</td>");
								}
								else if($rows_getresult["level"]=='3')
								{
									echo("<td align='center' style='padding:5px;background-color:#efefef;color:rgb(0, 112, 176);'>High</td>");
								}
								//echo("<td align='center' style='padding:5px;background-color:#efefef;color:rgb(0, 112, 176);'>".$rows_getresult["total_time"] ."</td>");
								//echo("<td align='center' style='padding:5px;background-color:#efefef;color:rgb(0, 112, 176);'>".$rows_getresult["Date"] ."</td>");
								//echo("<td align='center' style='padding:5px;background-color:#efefef;color:rgb(0, 112, 176);'>".$i."</td>");
								echo("</tr>");
								$i++;
							}
						}
					?>
                   </table></center>
                  <!--<form name='f1' method='post' action='getresult.php'>-->
                   
                  <div id='showquestions' height="100%" >
                  
                        </div></form>

                </div>
            </div>
        </div>
    </div>
    <!--</form>-->
   <?php include_once('footer.php');?>
</body>
</html><?php } ?>

