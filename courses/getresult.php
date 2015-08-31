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
$mydate=date("Y-M-d");
$irand=rand(1,10000000);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>..:User Panel:..</title>
<link href="style.css" type="text/css" rel="stylesheet" media="screen" />
<link href="css_menu/timeTo.css" type="text/css" rel="stylesheet"/>
<!-----pop up------>
<script type="text/javascript" src="../js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="../js/jquery.reveal.js"></script>
<link rel="stylesheet" href="../css/reveal.css">
<!-----pop up ned------>
 <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.timeTo.js"></script>



<script>
function popup()
{
	document.getElementById("clickid").click();
	
    //setTimeout(alertFunc, 1000);
}
</script>












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
}
*/
/* selected link */
/*a:active {
    color: blue;
}*/
</style>
</head>
<body onLoad="popup()">
<!--<form name='f1' method='post' action=''>-->
   <?php include_once('header2.php');
   	$starttime = $_POST["txtstarttime"];
	$substart_time=explode(":",$starttime);
	$strhr = (int)($substart_time[0]);
	$strhr =(int)$strhr * 60 * 60;
	
	$strmin = (int)($substart_time[1]);
	$strmin =(int)$strmin * 60;
	
	$strsec = (int)($substart_time[2]);
	$strsec =(int) $strsec;
	
	$starttime1= $strhr+$strmin+$strsec;
	
	$endtime = $_POST["txtendtime"];
	$subend_time=explode(":",$endtime);
	$endhr = (int)($subend_time[0]);
	$endhr =(int)$endhr * 60 * 60;
	
	$endmin = (int)($subend_time[1]);
	$endmin =(int)$endmin * 60;
	
	$endsec = (int)($subend_time[2]);
	$endsec = (int)$endsec;
	
	$endtime1=$endhr + $endmin + $endsec;
	
	$totaltime= $starttime1 - $endtime1;
	$totaltime1=$totaltime;
	
   ?>

    
    <div id="container">
        <div id="container_content">
            <div id="page">
                <div id="container_left">
                    <div class="heading">
                        <h3>All Class</h3>
                        
                    </div>
                    <ul style="margin-left: 0px; padding: 5px;">
                        <li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" />Class <u><?php echo $rescl['class'];?></u>
                        </li>
                        <li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" /> Subject <u><?php echo $_POST['txtsubject'];?></u>
                        </li>
                        <li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" /> Topic <u><?php echo $_POST['txttopic'];?></u>
                        </li>
                        <li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" /> <a href="publish.php?m=<?php echo $irand; ?>" style="color:rgb(0,112,176);" > Publish Result</a>
                        </li>
                    </ul>
                </div>
                <div id="container_right">
                  <div class="welcome" id="welcome">
              			Welcome <?php if($_SESSION['name']){echo $_SESSION['name'];} ?>
                </div>
                <div>
                <?php                       
 
	$cnt=0;
	for($i=0;$i<(int)($_POST['count']);$i++)
	{
		
		if(empty($_POST['radio'.$i]))
		{
		}
		elseif($_POST['radio'.$i]==$_POST['txtc'.$i])
		{
			$cnt=$cnt+1;
		}
	}	
	echo("<center><h1>Your Score is : ".$cnt." out of ".$_POST['count']."</h1></center>");
	$percent=($cnt/(float)$_POST['count'])*100;
	//header("location:ShowQuizes2.php?c=".$cnt);
?>
				 
             <div align="right"> <a href="publish.php?m=<?php echo $irand; ?>" style="color:rgb(0,112,176);" >Click Here To Publish Your Result</a></div>     

                </div>
              <div>
              <?php
			  $low=$_POST['cbouplimit'];
			  $up=$_POST['cbollimit'];
			  $minus=$up-$low;
              	$sqlquestion="Select * from  student_question where topic_id=".$_POST['tid']." and difficulty=".$_POST['diff']." limit ".(int)($minus+1)." offset ".(int)($low-1) ;
				$result_question=$con->query($sqlquestion);
				$arrquestion=array();
$i=0;
$j=0;
if($result_question->num_rows>0)
{
	
	while($rows_question=$result_question->fetch_assoc())
	{
		$arrquestion[$i]=$rows_question['questions'];
		$arranswer=explode("|",$rows_question['answers']);
		$arranswer2[$i][1]=$arranswer[1];
		$arranswer2[$i][2]=$arranswer[2];
		$arranswer2[$i][3]=$arranswer[3];
		$arranswer2[$i][4]=$arranswer[4];
		$correct[$i]=$arranswer2[$i][$rows_question['correct']];
		$concept[$i]=$rows_question['concepts'];
				$i++;		
	}
		//echo("<input type='text' name='hidecnt' value='".$i."' style='visibility:hidden;' ><input type='submit' value='submit' name='submit'>");
}


$j=$i;
$k=1;
$l=1;
 $jkl=0;
for($i=0;$i<$j;$i++)
{
	//if($i % 10==0)
	//{
		
	//}
	try{
	echo("<h2> Question ".($i+1)."</h2>");
	echo("<b>".$arrquestion[$i]."</b>");	
	echo("<br>");
	/*if($arranswer2[$i][1]==$correct[$i])
	{
		
		echo($arranswer2[$i][1]."&nbsp;&nbsp;&nbsp;<img src='../correct.jpg'><br>");
		
	}*/
	if($arranswer2[$i][1]==$correct[$i])
	{
		if(!empty($_POST['radio'.$i]))
		{
			if($_POST['radio'.$i]==$correct[$i])
			{
				echo($arranswer2[$i][1]."&nbsp;&nbsp;&nbsp;<img src='../correct.jpg'><br>");
			}
			else
			{
				echo($arranswer2[$i][1]."&nbsp;&nbsp;&nbsp;<br>");
			}
		}
		else
		{
			echo($arranswer2[$i][1]."&nbsp;&nbsp;&nbsp;<br>");	
		}
	}
	else
	{
		
			if(!empty($_POST['radio'.$i]))
			{
				if($_POST['radio'.$i]==$arranswer2[$i][1])
				{
					echo($arranswer2[$i][1]."&nbsp;&nbsp;&nbsp;<img src='../wrong.jpg'><br>");
				}
				else
				{
					echo("".$arranswer2[$i][1]."&nbsp;&nbsp;&nbsp;<br>");
				}
			}
			else
			{
				echo("".$arranswer2[$i][1]."&nbsp;&nbsp;&nbsp;<br>");
			}
		
	}
	
	
	
	if($arranswer2[$i][2]==$correct[$i])
	{
		if(!empty($_POST['radio'.$i]))
		{
			if($_POST['radio'.$i]==$correct[$i])
			{
				echo($arranswer2[$i][2]."&nbsp;&nbsp;&nbsp;<img src='../correct.jpg'><br>");
			}
			else
			{
				echo($arranswer2[$i][2]."&nbsp;&nbsp;&nbsp;<br>");
			}
		}
		else
		{
			echo($arranswer2[$i][2]."&nbsp;&nbsp;&nbsp;<br>");	
		}
	//	echo($arranswer2[$i][2]."&nbsp;&nbsp;&nbsp;<img src='../correct.jpg'><br>");
	//	echo($arranswer2[$i][2]."&nbsp;&nbsp;&nbsp;<img src='../correct.jpg'><br>");
		
	}
	else
	{
		
			if(!empty($_POST['radio'.$i]))
			{
				if($_POST['radio'.$i]==$arranswer2[$i][2])
				{
					echo($arranswer2[$i][2]."&nbsp;&nbsp;&nbsp;<img src='../wrong.jpg'><br>");
				}
				else
				{
					echo("".$arranswer2[$i][2]."&nbsp;&nbsp;&nbsp;<br>");
				}
			}
			else
			{
				echo("".$arranswer2[$i][2]."&nbsp;&nbsp;&nbsp;<br>");
			}
		
	}
	
	
	if($arranswer2[$i][3]==$correct[$i])
	{
		if(!empty($_POST['radio'.$i]))
		{
			if($_POST['radio'.$i]==$correct[$i])
			{
				echo($arranswer2[$i][3]."&nbsp;&nbsp;&nbsp;<img src='../correct.jpg'><br>");
			}
			else
			{
				echo($arranswer2[$i][3]."&nbsp;&nbsp;&nbsp;<br>");
			}
		}
		else
		{
			echo($arranswer2[$i][3]."&nbsp;&nbsp;&nbsp;<br>");	
		}
		//echo($arranswer2[$i][3]."&nbsp;&nbsp;&nbsp;<img src='../correct.jpg'><br>");
		
	}
	else
	{
		
			if(!empty($_POST['radio'.$i]))
			{
				if($_POST['radio'.$i]==$arranswer2[$i][3])
				{
					echo($arranswer2[$i][3]."&nbsp;&nbsp;&nbsp;<img src='../wrong.jpg'><br>");
				}
				else
				{
					echo("".$arranswer2[$i][3]."&nbsp;&nbsp;&nbsp;<br>");
				}
			}
			else
			{
		 		echo("".$arranswer2[$i][3]."&nbsp;&nbsp;&nbsp;<br>");
			}
		
	}
	
	
	if($arranswer2[$i][4]==$correct[$i])
	{
		
		if(!empty($_POST['radio'.$i]))
		{
			if($_POST['radio'.$i]==$correct[$i])
			{
				echo($arranswer2[$i][4]."&nbsp;&nbsp;&nbsp;<img src='../correct.jpg'><br>");
			}
			else
			{
				echo($arranswer2[$i][4]."&nbsp;&nbsp;&nbsp;<br>");
			}
		}
		else
		{
			echo($arranswer2[$i][4]."&nbsp;&nbsp;&nbsp;<br>");	
		}
		//echo($arranswer2[$i][4]."&nbsp;&nbsp;&nbsp;<img src='../correct.jpg'><br>");
		
	}
	else
	{
		
			if(!empty($_POST['radio'.$i]))
			{
				if($_POST['radio'.$i]==$arranswer2[$i][4])
				{
					echo($arranswer2[$i][4]."&nbsp;&nbsp;&nbsp;<img src='../wrong.jpg'><br>");
				}
				else
				{
					echo("".$arranswer2[$i][4]."&nbsp;&nbsp;&nbsp;<br>");
				}
			}
			else
			{
				echo("".$arranswer2[$i][4]."&nbsp;&nbsp;&nbsp;<br>");
			}
		
	}
	
	
	if(!empty($_POST['radio'.$i]))
	{
		//echo("<br><b><span style='color:blue'>Submitted Answer : </span>".$_POST['radio'.$i]."</b>");
		if($_POST['radio'.$i]!=$correct[$i])
		{
			echo("<br><b><span style='color:blue'>Correct&nbsp; Answer&nbsp;&nbsp;&nbsp; : </span>".$correct[$i]."</b><br>");			
			echo("<br><b><span style='color:blue'>Concepts&nbsp; Included&nbsp;&nbsp;&nbsp; : </span>".$concept[$i]."</b>");
			$concept1[$jkl]=explode(",",$concept[$i]);
			$jkl++;
		}
	}
	else if(empty($_POST['radio'.$i]))
	{
		echo("<br><b><span style='color:blue'>Correct&nbsp; Answer&nbsp;&nbsp;&nbsp; : </span>".$correct[$i]."</b><br>");
		echo("<br><b><span style='color:blue'>Concepts&nbsp; Included&nbsp;&nbsp;&nbsp; : </span>".$concept[$i]."</b>");
		$concept1[$jkl]=explode(",",$concept[$i]);
		$jkl++;
	}
	echo("<hr><br>");
	}
	catch(Exception $e)
	{}
	
}

//$l++;

			?>
              <div align="center" style="padding-bottom:20px;padding-right:50px;"> <a href="publish.php?m=<?php echo $irand; ?>" style="color:rgb(0,112,176);" >Click Here To Publish Your Result</a><a class="big-link" data-reveal-id="openModal" data-animation="fade" href="#"  style="color:blue;" id="clickid"></a>
              	<?php
					$x=0;
					for($z=0;$z<count($concept1);$z++)
					{
						for($y=0;$y<count($concept1[$z]);$y++)
						{
							if(!empty($concept1[$z][$y]))
							{
								$concept2[$x]=$concept1[$z][$y];
								$x++;
								
							}
						}	
					}
					for($w=0;$w<count($concept2);$w++)
					{
						//echo($concept2[$w].",");	
					}
					$t=0;
					for($v=0;$v<count($concept2);$v++)
					{
						$cntconcept=0;
						for($u=$v;$u>=0;$u--)
						{
							if($concept2[$u]==$concept2[$v])
							{
								$cntconcept++;	
							}	
							
						}
						if($cntconcept<=1)
						{
							$concept3[$t]=$concept2[$v];
							$t++;	
						}
						
					}
					$str="";
					//echo(count($concept3));
					for($s=0;$s<count($concept3);$s++)
					{
						//echo($concept3[$s].",");
						$str=$str.",".$concept3[$s];	
					}
					
					$str2=str_replace(" ,"," ",$str);
					//echo($str2);
					$concept4=explode(",",$str2);
					// a b c d e f g h i j k l m n o p q r s t u v w x y z
				?>
           
              </div>     

                </div>
			              </div>
            </div>
        </div>
    </div>
   <?php
 
  
   ?>
    <!--</form>-->
   <?php include_once('footer.php');?>
   <div id="openModal" class="reveal-modal" style="width:400px;" >
							<div>
                            <style>
							#cross:link {color:blue;}
							#cross:visited {color: blue;}
							#cross:hover {color: blue;}
							#cross:active {color: blue;}
								
							</style>
									<div align="right" ><span style="text-align:right;"><a  class="close-reveal-modal" style="color:#F00;">X</a></span></div>
										<h2><center>You need to study following concepts : </center></h2>
                                        <?php
										echo("<div style='padding-left:20px;'>");
											for($r=1;$r<count($concept4);$r++)
											{
												
													
														echo("".$concept4[$r]." <br><br> ");
														$str=$concept4[$r].",".$str;	
													
												
											}
											$str=implode(",",$concept4);
											//echo($str);
										echo("</div>");
										?>
                                        
							</div>
</div>
</body>
</html><?php
/*$sqlresult1="Select * from student_result where Subject_class='".$_SESSION['name']."' and Subject_class='".$_POST['txtclass']."' and 
Subject='".$_POST['txtsubject']."'
and Student_topic='".$_POST['txttopic']."' and obtained_marks='".$cnt."' and Outof_marks='".$_POST['count']."' and Percent='".$percent."' and 
level='".$_POST['txtlevel']."' and strt_time='".$starttime."' and end_time='".$endtime."' and total_time='".$totaltime1."' 
and Publish='No' and Date='".$mydate."' ";*/
$sqlresult1="Select `Student_name`,`Subject_class`,`Subject` from student_result where Student_name='".$_SESSION['name']."' and 
Subject_class='".$_POST['txtclass']."' 
and Subject='".$_POST['txtsubject']."' 
and Student_topic='".$_POST['txttopic']."' and obtained_marks='".$cnt."' and Outof_marks='".$_POST['count']."' and 
Percent='".$percent."' and level='".$_POST['txtlevel']."' and 
strt_time='".$starttime."' and end_time='".$endtime."' and total_time='".$totaltime1."' and Publish='No' and Date='".$mydate."'";
$resultResult1=$con->query($sqlresult1);
if($resultResult1->num_rows>0)
{
	
	// echo($sqlresult);
}
else
{
	//echo($resultResult1->num_rows);
	//echo($sqlresult1);
	//$sqlresult="insert into student_result(Student_name,Subject_class,Subject,Student_topic,obtained_marks,Outof_marks,Percent,level,strt_time,end_time,total_time,Publish,Date,index) values('".$_SESSION['name']."','".$_POST['txtclass']."','".$_POST['txtsubject']."','".$_POST['txttopic']."','".$cnt."','".$_POST['count']."','".$percent."','".$_POST['txtlevel']."','".$starttime."','".$endtime."','".$totaltime1."','No','".$mydate."','".$irand."')";
	$sqlresult="INSERT INTO `learnsci_kriti`.`student_result` 
	(`propic`, `Student_name`, 
	`Subject_class`, 
	`Subject`, 
	`Student_topic`, 
	`obtained_marks`, 
	`Outof_marks`,
	`Percent`, 
	`level`, 
	`strt_time`,
 	`end_time`, 
 	`total_time`, 
	 `Publish`, 
 	`Date`, 
	 `index`) 
	 VALUES ('".$img_val."', '".$_SESSION['name']."', 
	 '".$_POST['txtclass']."',
 	'".$_POST['txtsubject']."', 
 	'".$_POST['txttopic']."', 
 	'".$cnt."', '".$_POST['count']."', 
	 '".$percent."', '".$_POST['txtlevel']."', '".$starttime."', '".$endtime."', '".$totaltime1."', 'No', '".$mydate."', '".$irand."');";
 	$result_sqlresult=$con->query($sqlresult);
	
	
	 $sqlconcept="insert into tblweakcconcept(name,img,eid,class,subject,topic,date,weak_concept) values('".$_SESSION['name']."','".$img_val."','".$_SESSION['email']."','".$_POST['txtclass']."','".$_POST['txtsubject']."','".$_POST['txttopic']."','".$mydate."','".$str."')";
  	 $resultconcept=$con->query($sqlconcept);
	 
	 $body="You need to practice following concepts : ".$str;
	 $heading="Need to improve in...";
	 $mailheader = "From:  help@learnscience.co.in\r\n";  
$mailheader .= "Reply-To:  help@learnscience.co.in\r\n"; 
$mailheader .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
	 mail($_SESSION['email'],$heading,$body,$mailheader);
  
}
 } ?>

















