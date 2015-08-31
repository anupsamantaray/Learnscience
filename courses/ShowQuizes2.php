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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<title>..:User Panel:..</title>
<link href="style.css" type="text/css" rel="stylesheet" media="screen" />
<link href="css_menu/timeTo.css" type="text/css" rel="stylesheet"/>
 <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.timeTo.js"></script>

 <script>

 </script>



<?php 
$time1=0;
$time2=0;
$time3=0;
$tid=$_GET['tid'];
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
if($result_gettime->num_rows>0)
{
	while($rows_gettime=$result_gettime->fetch_assoc())
	{
		$time1=$rows_gettime['time'];
		$time2=$rows_gettime['time1'];
		$time3=$rows_gettime['time2'];
		}
		
	}
	if($time1==NULL)
		{$time1=1;
		}
		if($time2==NULL)
		{$time2=1;
		}
		if($time3==NULL)
		{$time3=1;
		}
	
echo("<script>function showtime()
{
	var low1=document.getElementById('cbouplimit').value 
	var up1=document.getElementById('cbollimit').value
	if(low1!='' && up1!='')
	{
	document.getElementById('btnlow').style.display='none'; 
	document.getElementById('btnmid').style.display='none'; 
	document.getElementById('btnhigh').style.display='none'; 
	document.getElementById('level').align='left';
	document.getElementById('level').innerHTML='Quiz Started...';
	document.getElementById('txtstarttime').value=".$time1." 
	/*document.getElementByName('btnmid').innerHTML='none';
	document.getElementByName('btnhigh').style.display='none';
		document.getElementById('level').innerHTML='Quiz Started...'; */
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('showquestions').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open('GET','getquestion2.php?q=+".$tid."&d=0&l1='+low1+'&up1='+up1,true);
        xmlhttp.send();
		//alert('hello');
		
	/***
		set timer countdown in seconds with callback
		where 10 define the second left in count.
		after 10 second it will show alert.
		wait for 10 second to see it.
	*/
	 
	$('#countdown-1').timeTo(".$time1.", function()
	{
		var time=".$time1."
		if(time==1)
		{
			callsubmit1();
		}
		else
		{
			alert('Countdown finished');
			callsubmit1();
		}
	});

	/**
	 * Set timer countdown to specyfied date
	 */
	$('#countdown-2').timeTo(
	{
		timeTo: new Date('Jul 10 2014 00:00:00')
	});
	
	/**
	 * Set theme and captions
	 */
	$('#countdown-3').timeTo(
	{
		/*
			timeTo: date object specify date and time for current time 
			or for countdown to,
			default null.
		*/
		timeTo: new Date('Jul 27 2014 12:00:00'),
		/*
			theme: string name of color theme,
			available 'white' and 'black',
			default 'white';
		*/
		theme: 'black',
		/*
			displayCaption: boolean if true then captions display, default false;
		*/
		displayCaptions: true,
		/*
			fontSize: integer font-size by pixels for digits, default 28;
		*/
		fontSize: 48,
		/*
			captionSize: integer font-size by pixels for captions,
			if 0 then calculate automaticaly, default 0;
		*/
		captionSize: 14
	});
	}
	else
	{
		alert('Please select The Question to start and the Question to End')
	}
}</script>");


echo("<script>function showtime2()
{
	var low1=document.getElementById('cbouplimit').value 
	var up1=document.getElementById('cbollimit').value
	if(low1!='' && up1!='')
	{
	document.getElementById('btnlow').style.display='none'; 
	document.getElementById('btnmid').style.display='none'; 
	document.getElementById('btnhigh').style.display='none'; 
	document.getElementById('level').align='left';
	document.getElementById('level').innerHTML='Quiz Started...';
	document.getElementById('txtstarttime').value=".$time2." 
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('showquestions').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open('GET','getquestion2.php?q=+".$tid."&d=1&l1='+low1+'&up1='+up1',true);
        xmlhttp.send();
	/***
		set timer countdown in seconds with callback
		where 10 define the second left in count.
		after 10 second it will show alert.
		wait for 10 second to see it.
	*/
	
	$('#countdown-1').timeTo(".$time2.", function()
	{
		var time=".$time2."
		if(time==1)
		{
			callsubmit1();
		}
		else
		{
			alert('Countdown finished');
			callsubmit1();
		}
		
	});

	/**
	 * Set timer countdown to specyfied date
	 */
	$('#countdown-2').timeTo(
	{
		timeTo: new Date('Jul 10 2014 00:00:00')
	});
	
	/**
	 * Set theme and captions
	 */
	$('#countdown-3').timeTo(
	{
		/*
			timeTo: date object specify date and time for current time 
			or for countdown to,
			default null.
		*/
		timeTo: new Date('Jul 27 2014 12:00:00'),
		/*
			theme: string name of color theme,
			available 'white' and 'black',
			default 'white';
		*/
		theme: 'black',
		/*
			displayCaption: boolean if true then captions display, default false;
		*/
		displayCaptions: true,
		/*
			fontSize: integer font-size by pixels for digits, default 28;
		*/
		fontSize: 48,
		/*
			captionSize: integer font-size by pixels for captions,
			if 0 then calculate automaticaly, default 0;
		*/
		captionSize: 14
	});
	}
	else
	{
		alert('Please select The Question to start and the Question to End')
	}
}</script>");


echo("<script>function showtime3()
{
	var low1=document.getElementById('cbouplimit').value 
	var up1=document.getElementById('cbollimit').value
	if(low1!='' && up1!='')
	{
		document.getElementById('btnlow').style.display='none'; 
	document.getElementById('btnmid').style.display='none'; 
	document.getElementById('btnhigh').style.display='none'; 
	document.getElementById('level').align='left';
	document.getElementById('level').innerHTML='Quiz Started...';
	document.getElementById('txtstarttime').value=".$time3." 
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('showquestions').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open('GET','getquestion2.php?q=+".$tid."&d=2&l1='+low1+'&up1='+up1',true);
        xmlhttp.send();
	/***
		set timer countdown in seconds with callback
		where 10 define the second left in count.
		after 10 second it will show alert.
		wait for 10 second to see it.
	*/
	
	$('#countdown-1').timeTo(".$time3.", function()
	{
		var time=".$time3."
		if(time==1)
		{
			callsubmit1();
		}
		else
		{
			alert('Countdown finished');
			callsubmit1()
		}
		
	});

	/**
	 * Set timer countdown to specyfied date
	 */
	$('#countdown-2').timeTo(
	{
		timeTo: new Date('Jul 10 2014 00:00:00')
	});
	
	/**
	 * Set theme and captions
	 */
	$('#countdown-3').timeTo(
	{
		/*
			timeTo: date object specify date and time for current time 
			or for countdown to,
			default null.
		*/
		timeTo: new Date('Jul 27 2014 12:00:00'),
		/*
			theme: string name of color theme,
			available 'white' and 'black',
			default 'white';
		*/
		theme: 'black',
		/*
			displayCaption: boolean if true then captions display, default false;
		*/
		displayCaptions: true,
		/*
			fontSize: integer font-size by pixels for digits, default 28;
		*/
		fontSize: 48,
		/*
			captionSize: integer font-size by pixels for captions,
			if 0 then calculate automaticaly, default 0;
		*/
		captionSize: 14
	});
	}
	else
	{
		alert('Please select The Question to start and the Question to End')
	}
}</script>");


?>
<script>
function blankfun()
{

}
function callsubmit1()
{
	//alert("hello");
	var e11=document.getElementById("countdown-1").firstChild.firstChild.firstChild.innerHTML;
	e11=parseInt(e11);
	//alert(e11);
	var e12=document.getElementById("countdown-1").childNodes[1].firstChild.firstChild.innerHTML;
	e12=parseInt(e12);
	//alert(e12);
	var colon1=document.getElementById("countdown-1").childNodes[2].innerHTML;
	//colon1=parseInt(colon1);
	//alert(colon1);
	
	var e21=document.getElementById("countdown-1").childNodes[3].firstChild.firstChild.innerHTML;
	e11=parseInt(e21);
	//alert(e21);
	var e22=document.getElementById("countdown-1").childNodes[4].firstChild.firstChild.innerHTML;
	e12=parseInt(e22);
	//alert(e22);
	var colon2=document.getElementById("countdown-1").childNodes[5].innerHTML;
	//colon1=parseInt(colon1);
	//alert(colon2);
	
	var e31=document.getElementById("countdown-1").childNodes[6].firstChild.firstChild.innerHTML;
	e31=parseInt(e31);
	//alert(e31);
	var e32=document.getElementById("countdown-1").childNodes[7].firstChild.firstChild.innerHTML;
	e32=parseInt(e32);
	//alert(e32);
	document.getElementById("txtendtime").value=e11+e12+colon1+e21+e22+colon2+e31+e32;
	document.forms["f1"].submit();
	//var x1= x[0].firstChild.innerHTML;
	
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

   <?php include_once('header2.php')?>

    
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
                        <li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" /> Subject <u><?php echo $subject1;?></u>
                        </li>
                        <li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" /> Topic <u><?php echo $topic;?></u>
                        </li>
                        <!--<li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" /> <a href="show_result.php?tid=<?php echo $tid; ?>" style="color:rgb(0,112,176);" > Display Result</a>
                        </li>-->
                    </ul>
                </div>
                <div id="container_right">
                  <div class="welcome" id="welcome" style="float:left">
              			<span style="font-size:20px; font-weight:normal;">Welcome <?php if($_SESSION['name']){echo $_SESSION['name'];} ?></span>
                        
               	 </div>
                <br />
                
                  <?php
				  echo("<script>
				  </script>
				  ");
				  	$tid=$_GET['tid'];?>
                   <form name='f1' method='post' action='getresult.php'>
                    <span style="font-size:18px;font-weight:bold;color:rgb(0, 112, 176);padding-left:18px;">Start With the Question Number &nbsp;: &nbsp;</span>
                    <select name='cbouplimit' style="width:15%;height:30px;" id="cbouplimit" onclick="ldlimit()" onchange="ldlimit()"><option></option>
                    	<?php
							$sql_uplimit="Select * from student_question where topic_id = ".(int)$tid;
							$result_uplimit=$con->query($sql_uplimit);
							$iup=0;
							if($result_uplimit->num_rows>0)
							{
								
								while($rows_uplimit=$result_uplimit->fetch_assoc())
								{
									$iup++;
									echo("<option value='".$iup."'>".$iup."</option>");	
								}	
							}
						?>
                    </select>
                   <!-- <span style="padding-left:150px;padding-right:0px;"><a href="show_result.php?tid=<?php echo $tid; ?>" style="color:#06F;font-size:14px;">Click here to Display result</a></span>-->
                    <br/><input style="display:none;" type='text' name='txtuplimit' id="txtuplimit" value="<?php echo($iup); ?>" /><br />
                    <script>
					function ldlimit()
					{
						document.getElementById("cbollimit").options.length = 0;
						var up=document.getElementById("txtuplimit").value;
						var low=document.getElementById("cbouplimit").value;
						//var i=0;
						up=parseInt(up);
						low=parseInt(low);
						var x = document.getElementById("cbollimit");
						for(i=low;i<=up;i++)
						{
							var option = document.createElement("option");
						    option.text = i;
							option.value=i;
					    	x.add(option);
						}
						//alert("Hello");
						
					}
					</script>
                    <span style="font-size:18px;font-weight:bold;color:rgb(0, 112, 176);padding-left:18px;">End&nbsp; With the Question Number &nbsp; : &nbsp;</span>
                    <select name="cbollimit" style="width:15%;height:30px;" id="cbollimit">
                    	
                    </select>                   
                    <?php
					echo("<h1 id='level' style='color:#e05f03;'>&nbsp;&nbsp;Levels</h1><br>");
					
							echo("<div class='sub'><span><b><a href='#' name='btnlow' id='btnlow' value='0'  onclick='showtime()'><b>Low</b></a></b></span>&nbsp;&nbsp;&nbsp;<span><b><a href='#' name='btnmid' value='1' id='btnmid' onclick='showtime2()'><b>Middle</b></a></b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b><a href='#' name='btnhigh' value='2' id='btnhigh' onclick='showtime3()'><b>High</b></a></b></span></div><div id='clockcontainer' style='position: fixed;left:70%;'><div id='countdown-1'></div></div>");	
					
                  ?>
                  <!--<form name='f1' method='post' action='getresult.php'>-->
                   <input type="text" name="txtname" id="txtname" value="<?php if($_SESSION['name']){echo $_SESSION['name'];} ?>" style="display:none;"/>
                    <input type="text" name="txtclass" id="txtclass" value="<?php echo $rescl['class'];?>" style="display:none;"/>
                     <input type="text" name="txtsubject" id="txtsubject" value="<?php echo $subject1;?>" style="display:none;"/>
                      <input type="text" name="txttopic" id="txttopic" value="<?php echo $topic;?>" style="display:none;"/>
                  <input type="text" name="txtendtime" id="txtendtime" style="display:none;"/>
                  <input type="text" name="txtstarttime" id="txtstarttime" style="display:none;" /> 
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

