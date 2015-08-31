<?php
include_once("function.php");
$ids=$_GET['id'];
$re1=mysql_query("select * from `student_answer` where `id`='$ids'");
$r=mysql_fetch_array($re1);
?>
<html>
<head>
<title>Admin Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

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
										Edit answer
								</div>
								<div id="content2">
										<form name="f" method="post" action="answer_update.php" enctype="multipart/form-data">
												<table class="table" style="line-height:3.5;">
												<tr>
													
													 <input type="hidden" name="hidden_id1" class="form" value="<?php echo $r['id']; ?>"/>
												</tr>
												<tr>
												<td>Qusetion</td>
												<td><?php
												$sqlques=mysql_query("select `questions` from `student_question` where `id`='$r[question_id]'");
												$resques=mysql_fetch_array($sqlques);
												echo $resques['questions'];
												?></td>
												</tr>
												<!--<tr>
												   <td>answer Name</td>
													<td>
													<textarea name="answer" class="textbox"><?php echo $r['answers']; ?></textarea>
													</td> 
												   <input type="hidden" name="hidden_id1" value="<?php echo $r['id']; ?>"/>
												</tr>-->
												<?php
													$i=0;
													$ans=$r['answers'];
													$x=explode("|",$ans);
													foreach($x as $anss){
													$unit1=$anss;
													if($unit1!=""){
													$i++;
													?>
												<tr>
													<td><?php echo $i.")";?></td>
													<td><input type="text" name="anns[]" class="form" value="<?php echo $unit1; ?>" /></td>
												</tr>
												<?php
												}
												}
												?>
												<tr>
												<td>Correct answer</td>
												<td><input type="text" name="corect" class="form" value="<?php echo $r['correctanswer']; ?>" /></td>
												</tr>
												 <tr>  
													<td>&nbsp;</td>
													<td><input type="submit" name="submit" value="Update" class="btn button"></td> 
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
				<ul>
						<li><a href="index.html"><span>Home</span></a></li>
						<li><a href="work.html"><span>Work</span></a></li>
						<li><a href="about.html"><span>About</span></a></li>
						<li><a href="services.html"><span>Services</span></a></li>
						<li><a href="contact.html"><span>Contact</span></a></li>
				</ul>
		</div>
 </div>
 <!--------------footer end--------->
</body>
</html>
