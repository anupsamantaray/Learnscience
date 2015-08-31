<?php
include_once("../function.php");
$class=$_SESSION['class'];
$sqlcl=mysql_query("select * from `student_class` where `id`='$class'");
$rescl=mysql_fetch_array($sqlcl);
$slno=$_SESSION['slno'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>..:learnscience: Makes learning easy & fast.:..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" type="text/css" rel="stylesheet" media="screen" />
<script type='text/javascript' src="../js/jquery-1.6.min.js"></script>
<link rel="stylesheet" href="reveal.css">	
<script type="text/javascript" src="jquery.reveal.js"></script>
<script>
function getpop()
{
alert("please login to download");
}
</script>
<style>
  .tab{ outline: thin solid; }
  .tab th {
    background: #2c66a8;
padding: 8px;
line-height: 25px;
text-align: center;
font-family: Arial, Helvetica, sans-serif;
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
					<?php
					if(isset($_SESSION['class']))
					{
				
					?>
					<ul style="margin-left: 0px; padding: 5px; ">
						<li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" />
						   <a href="#"><span class="sp" style="color: #0070B0;" onclick="return getval(<?php echo $idd;?>);"> Class <?php echo $rescl['class'];?></span></a>
                        </li>
					</ul>
				
					<?php
					}
					else{

					?>
					 <ul style="margin-left: 0px; padding: 5px;">
					<?php
					
						   $sqlclass=mysql_query("select * from `student_class`");
						   while($resclass=mysql_fetch_array($sqlclass)){
						   if($resclass['class']=='x'){
					?>
                        <li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" />
						 <a href="#"><span class="sp" style="color: #0070B0;" onclick="return getval(<?php echo $resclass['id'];?>);"> Class <?php echo $resclass['class'];?></span></a>
                        </li>
					<?php
						   }
						   else{
						   
					?>	
					
                        <li class="list">
                            <img src="images/arrow.png" style="float: left; margin-right: 5px;" />
							<a href="#"><span class="sp" style="color:#666;" onclick="return getval(<?php echo $resclass['id'];?>);">Class <?php echo $resclass['class'];?></span></a>
                        </li>
					<?php
					}
					}
					?>	
            
                    </ul>
                   <?php
				   }
				   ?>
					
                </div>
                
                <div id="container_right" class="t1">
                <div class="welcome">
              			Welcome <?php if($_SESSION['name']){echo $_SESSION['name'];} ?>
                </div>
			<?php
			  if ($_SESSION['slno']){
			  ?>
		      <form name="student" action="student_action.php" method="post">
			<center><table border="0" style="border:1px solid #000;border-radius:5px;">
			  <?php
			  $fetchdetail=mysql_query("select * from `login` where `slno`='$_SESSION[slno]'");
			  $resdetail=mysql_fetch_array($fetchdetail);
			  
			  $fetchclass2=mysql_query("select * from `student_class` where `id`='$resdetail[class]'");
			  $resclass2=mysql_fetch_array($fetchclass2);
			  ?>
			  <tr>
              <style>
			  td.tdclass{padding-top:5px;padding-bottom:5px;padding-left:20px;padding-right:10px;}
			  .form{padding-top:5px;padding-bottom:5px;border-radius:3px;}
			  </style>
			    <td class="tdclass" >Name</td>
			    <td class="tdclass"><input class="form" type="text" readonly="readonly" value="<?php echo $resdetail['name'];?>" /></td>
			  </tr>
              <td colspan="2">	
              	<hr />
              </td> 
			  <tr>
			    <td class="tdclass">Class</td>
			    <td class="tdclass"><input class="form" type="text" readonly="readonly" value="<?php echo $resclass2['class'];?>" /> </td>
			  </tr>
			  <td colspan="2">	
              	<hr />
              </td>
			  <tr>
			    <td class="tdclass">Email</td>
			    <td class="tdclass"><input class="form" type="text" readonly="readonly" value="<?php echo $resdetail['email'];?>"  /></td>
			  </tr>
              <td colspan="2">	
              	<hr />
              </td>
			  <tr>
			    <td class="tdclass">School</td>
			    <td class="tdclass"><input class="form" type="text" readonly="readonly" value="<?php echo $resdetail['school'];?>" /></td>
			  </tr>
              <td colspan="2">	
              	<hr />
              </td>
			  <tr>
			    <td class="tdclass">City</td>
			    <td class="tdclass"><input class="form" type="text" readonly="readonly" value="<?php echo $resdetail['city'];?>" /></td>
			  </tr>
              <td colspan="2">	
              	<hr />
              </td>
			  <tr>
			    <td class="tdclass">Phone</td>
			    <td class="tdclass"><input class="form" type="text" name="phone" id="phone" value="<?php echo $resdetail['phone'];?>"></td>
			  </tr>
              <td colspan="2">	
              	<hr />
              </td>
			  <tr>
			    <td class="tdclass">Current Pwd</td>
			    <td class="tdclass"><input class="form" type="text" name="current" id="current" value=""></td>
			  </tr>
              <td colspan="2">	
              	<hr />
              </td>
			  <tr>
			    <td class="tdclass">Password</td>
			    <td class="tdclass"><input class="form" type="text" name="pass" id="pass" value=""></td>
			  </tr>
              <td colspan="2">	
              	<hr />
              </td>
			  <tr>
			    <td class="tdclass">Confirm Pwd</td>
			    <td class="tdclass"><input class="form" type="text" name="confirm" id="confirm" value=""></td>
			  </tr>
              <td colspan="2">	
              	<hr />
              </td>
			  <tr>
			    <td class="tdclass">Level</td>
			    <td class="tdclass"><select class="form" name="level" style="width:173px;">
				  <option value="0">Easy</option>
				  <option value="1">Moderate</option>
				  <option value="2">Hard</option>
				</select>
			    </td>
			  </tr>
              <td colspan="2">	
              	<hr />
              </td>
			  <tr>
			    <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="  Submit  " style="padding-top:5px;padding-bottom:5px;padding-left:5px;padding-right:5px;border-radius:5px;background-color:#2c66a8;color:#fff;"></td>
			  </tr>
			</table></center> <?php }?><br />
		      </form>
		      <div>
			<table class="tab">
			  <tr>
			    <!--<th>Subject</th>-->
			    <th>Topic</th>
			    <th>Question attent</th>
			    <th>Wrong answer</th>
			    <th>Correct answer</th>
			    <th>Mark</th>
			    <th>Date</th>
			  </tr>
			  <?php
			  $fetch=mysql_query("SELECT DISTINCT `time` FROM `select_answer` where `userid`='$_SESSION[slno]'");
			  while($res=mysql_fetch_array($fetch))
			  { $uid=$res['time'];
			  $fetchdetail=mysql_query("select * from `select_answer` where `time`='$uid'");
			  $resdetail=mysql_fetch_array($fetchdetail);
			  $fetchmark=mysql_query("select sum(mark) as smark from `select_answer` where `time`='$uid'");
			  $resmark=mysql_fetch_array($fetchmark);
			  $fetchsubject=mysql_query("select * from `student_subject` where `id`='$resdetail[subject]'");
			  $ressubject=mysql_fetch_array($fetchsubject);
			  $fetchtopic=mysql_query("select * from `student_topic` where `id`='$resdetail[topic]'");
			  $restopic=mysql_fetch_array($fetchtopic);
			  
			  $fetchwrong=mysql_query("select * from `select_answer` where `time`='$uid' and `mark`='0'");
			  $fetchright=mysql_query("select * from `select_answer` where `time`='$uid' and `mark`='1'");
			  $wrong=mysql_numrows($fetchwrong);
			  $right=mysql_numrows($fetchright);
			  $qatten=mysql_numrows($fetchdetail);
			  ?>
			  <tr>
			    <td><a href="student_examque.php?ti=<?php echo $uid;?>&s=<?php echo $resdetail['subject'];?>&t=<?php echo $resdetail['topic'];?>" style="color: black;"><?php echo $restopic['topic'];?></a></td>
			    <td align="center"><?php echo $qatten;?></td>
			    <td align="center"><?php echo $wrong;?></td>
			    <td align="center"><?php echo $right;?></td>
			    <td align="center"><?php echo $resmark['smark'];?></td>
			    <td><?php echo $resdetail['date'];?></td>
			  </tr>
			  <?php }?>
			</table>
		      </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="reveal-modal">
	<div class="vide">
				
	</div>
	<a class="close-reveal-modal">&#215;</a>
    </div>
    
   <?php include_once('footer.php')?>
</body>
</html>