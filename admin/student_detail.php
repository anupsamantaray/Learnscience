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
										Casual User
								</div>
								<div id="content2">
										<?php
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
										  }
										?>
											<form name="student" action="" method="post">
											  <table class="table1" cellpadding="5" style="margin-top:15px;">
											    <?php
											    $fetchdetail=mysql_query("select * from `login` where `slno`='$slno'");
											    $resdetail=mysql_fetch_array($fetchdetail);
											    
											    $fetchclass2=mysql_query("select * from `student_class` where `id`='$resdetail[class]'");
											    $resclass2=mysql_fetch_array($fetchclass2);
											    ?>
											    <tr>
											      <td>Name</td>
											      <td><?php echo $resdetail['name'];?></td>
											    </tr>
											    <tr>
											      <td>Class</td>
											      <td><?php echo $resclass2['class'];?></td>
											    </tr>
											    
											    <tr>
											      <td>Email</td>
											      <td><?php echo $resdetail['email'];?></td>
											    </tr>
											    <tr>
											      <td>School</td>
											      <td><?php echo $resdetail['school'];?></td>
											    </tr>
											    <tr>
											      <td>City</td>
											      <td><?php echo $resdetail['city'];?></td>
											    </tr>
											    <tr>
											      <td>Phone</td>
											      <td><?php echo $resdetail['phone'];?></td>
											    </tr>
											  </table>
											</form>
											
											<table class="tab" align="center">
											  <tr>
											    <td><a href="score_chapter.php?id=<?php echo $slno;?>">Score chapterwise</a></td>
											  </tr>
											  <tr>
											    <td><a href="score_overall.php?id=<?php echo $slno;?>">Overall score</a></td>
											  </tr>
											  <tr>
											    <td><a href="score_month.php?id=<?php echo $slno;?>">Score as per month</a></td>
											  </tr>
											  <tr>
											    <td><a href="score_subject.php?id=<?php echo $slno;?>">Score subjectwise</a></td>
											  </tr>
											  <tr>
											    <td><a href="score_mark.php?id=<?php echo $slno;?>">Fees paid till date for various quiz exams</a></td>
											  </tr>
											  <!--<tr>
											    <td><a href="#">Any files that the student has downloaded from the website</a></td>
											  </tr>-->
											</table>
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