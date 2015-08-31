<?php
include_once("function.php");
if(!isset($_SESSION['id'])){
header("location:adminlogin.php");
}
else{
$slno=$_GET['id'];
?>
<html>
<head>
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
 <!--------------top bar -------->
 <div id="top_bar">
 		<div id="top_box">
				<h2 style="margin-top:0px; padding-top:8px; font-family:Arial, Helvetica, sans-serif; color:#f5f5f5;">Admin Panel</h2>
		</div>
 </div>
 <!--------------top bar end-------->
 
 
<!--------------content bar-------->
 <div id="main_bar">
 		<div id="main_box">
				<div id="left_box">
						<?php include_once("conleft_bar.php"); ?>
				</div>
				<div id="right_box" style="margin-left:40px;">
						<div class="headline">
								<a href="">Dashboard </a> /
								 <a href="">Settings</a>
						</div>
						<div id="content1">
								<div class="head2">
										Registered User
								</div>
								<div id="content2">
										<?php
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
										  }
										   $name=mysql_query("select * from `login` where `slno`='$slno'");
										  $rname=mysql_fetch_array($name);
										  echo $rname['name'];
										?>
											<table class="tab" align="center">
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
											    $fetch=mysql_query("SELECT DISTINCT `time` FROM `select_answer` where `userid`='$slno'");
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
											      <!--<td><?php echo $ressubject['subject'];?></td>-->
											      <td><?php echo $restopic['topic'];?></td>
											      <td align="center"><?php echo $qatten;?></td>
											      <td align="center"><?php echo $wrong;?></td>
											      <td align="center"><?php echo $right;?></td>
											      <td align="center"><?php echo $resmark['smark'];?></td>
											      <td><?php echo $resdetail['date'];?></td>
											    </tr>
											    <?php }?>
											  </table>
										    <form name="fmonth" action="exel_chapter.php?id=<?php echo $slno;?>" method="post">
										      <table align="center">
											<tr>
											  <td><input type="submit" name="submi" value="hardcopy"></td>
											  <input type="hidden" name="id" value="<?php echo $slno;?>">
											</tr>
										      </table>
										    </form> 
								</div>
						</div>
				</div>
		</div>
 </div>
  <!--------------content bar end-------->
	
<!--------------footer---------> 
 <div id="footer-bar">
 		<div id="footer">
				<?php include_once('footermenu.php');?>
		</div>
 </div>
  <!--------------footer end--------->                
</body>
</html>
<?php
}
?>