<?php
include_once("../function.php");
if($_REQUEST['map_id']){
	$id=$_GET['map_id'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>..:Learnscience:Makes learning easy & fast:..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style1.css" type="text/css" rel="stylesheet" media="screen" />
<script type='text/javascript' src="../js/jquery-1.6.min.js"></script>
<link rel="stylesheet" href="reveal.css">	
<script type="text/javascript" src="jquery.reveal.js"></script>
</head>
<body onload="getval('9')">
	<?php include_once('header1.php')?>
	<div id="container">
		<div id="container_content">
			<div id="page">
				<!--div id="container_left">
					<div class="heading">
						<h3>All Class</h3>
					</div>
					<ul style="margin-left: 0px; padding: 5px;">
						<?php
						$fet=mysql_query("select * from `student_class`");
						while($res=mysql_fetch_array($fet))
						{
						if($res['class']=='x'){
						?>
						<li class="list active">
						   <img src="images/arrow.png" style="float: left; margin-right: 5px;" />
							<span class="sp" onclick="return getval(<?php echo $res['id'];?>);"> Class <?php echo $res['class'];?></span>
						</li>
						<?php
						}
						else{
						?>
						<li class="list">
							<img src="images/arrow.png" style="float: left; margin-right: 5px;" />
							<span class="sp" onclick="return getval(<?php echo $res['id'];?>);">Class <?php echo $res['class'];?></span>
						</li>
						<?php 
							}
						}
						?>
					</ul>
				</div-->
				<center><div id="container_right" class="t12" style="float:inherit; border-left:none; margin: 0px auto;">
					<?php
						$fetch=mysql_query("select SCM.map_text, SCM.map_image, SC.class, ST.topic from `student_concept_maps` SCM JOIN `student_class` SC ON SCM.class_id = SC.id JOIN `student_topic` ST ON SCM.topic_id = ST.id WHERE SCM.id = '".$id."'");
						while($rslt=mysql_fetch_array($fetch)){ ?>
							<div>
								<p>Class : <?=$rslt['class']?></p>
								<p>Topic : <?=$rslt['topic']?></p>
							</div>
							<div>
								<?=$rslt['map_text']?>
							</div><br />
							<div>
								<img src="../admin/<?=$rslt['map_image']?>" style="height: 65%; width: 65%;"/>
							</div>
							<br /><br /><br />
					<?php }
					?>
					<input type="button" class="backbtn" value="Back" onClick="history.back();">
				</div></center>
			</div>
		</div>
	</div>
	<div id="myModal" class="reveal-modal">
		<div class="vide"></div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	<div id="myModal1" class="reveal-modal" style="width:400px;">
		<div class="vide">
			Exams are made easy through unique teaching tools in our website. So Students ..no more fear.. !!
			Our educational content is created in a way to improvise the speed and ease of learning by any student of any talent level. Even a weak student can easily cross the exam hurdles by following our education content. A few hours study on our website  in exam time can help you easily pass and excel in the exam.. "			
		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	<?php include_once('footer.php')?>
</body>
</html>