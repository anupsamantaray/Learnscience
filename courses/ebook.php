<?php
include_once("../function.php");
if($_GET['class']){
  $class=$_GET['class'];
}
if($_SESSION['name']){
  $n=$_SESSION['name'];
  $slno=$_SESSION['slno'];
  $fet=mysql_query("select * from `login` where `name`='$n' and `slno`='$slno'");
  $res=mysql_fetch_array($fet);
  $class=$res['class'];
}
if($_GET['clid']){
	$idd=$_GET['clid'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>..:learnscience: Makes learning easy & fast.:..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!-----pop up------>
<script type="text/javascript" src="../js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="../js/jquery.reveal.js"></script>
<link rel="stylesheet" href="../css/reveal.css">
<!-----pop up ned------>
<link href="style.css" type="text/css" rel="stylesheet" media="screen" />
<style>
a.li1:link, a.li1:hover, a.li1:active, a.li1:visited{ color : blue;}
</style>
<script type='text/javascript' src="../js/jquery-1.6.min.js"></script>
<script type="text/javascript">
function getebkval(clsval)
            {
              $.ajax({url:"getebook.php?class="+clsval,success:function(result){
                $("#t1").html(result);
                }});  
            }
</script>
<script type="text/javascript">
$(function()
{

	$('.sp').click(function() 
	{
	$('.sp').css("color","#666");
	$(this).css("color","#0070B0");
	
	});
});
</script>
<script>
function getpop()
{
alert("please login to download");
}
</script>
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
					if(isset($_GET['clid'])){
						?>
						<ul style="margin-left: 0px; padding: 5px; ">
							<?php
							   $sqlcla=mysql_query("select * from `student_class` where `id`='$idd'");
							   $rescla=mysql_fetch_array($sqlcla);
							?>
							<li class="list active">
							   <img src="images/arrow.png" style="float: left; margin-right: 5px;" />
							   <a href="#"><span class="sp" style="color: #0070B0;" onclick="return getval(<?php echo $idd;?>);"> Class <?php echo $rescla['class'];?></span></a>
							</li>
						</ul>
					<?php
					}else{
					?>					
						<ul style="margin-left: 0px; padding: 5px;">
						  <?php
						  $fetch=mysql_query("select * from `student_class`");
							while($receive=mysql_fetch_array($fetch)){
								if($receive['class']=='x'){
									?>
									<li class="list active">
									  <!-- <a href="ebook.php?class=<?php echo $receive['class'];?>">-->
									   <img src="images/arrow.png" style="float:left; margin-right: 5px;" />
									  <a href="javascript:void(0)"><span class="sp" style="color: #0070B0;" onclick="return getebkval(<?php echo $receive['id'];?>);"> Class <?php echo $receive['class'];?></span></a>
									   <!--</a>-->
									</li>
								<?php
								}else{
								?>
									<li class="list active">
									  <!-- <a href="ebook.php?class=<?php echo $receive['class'];?>">-->
									   <img src="images/arrow.png" style="float: none; margin-right: 5px;" />
									  <a href="javascript:void(0)"><span class="sp" style="color: #666;" onclick="return getebkval(<?php echo $receive['id'];?>);"> Class <?php echo $receive['class'];?></span></a>
									   <!--</a>-->
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
                <div id="container_right">
					<div class="topiccontent" id="t1">
						<div class="welcome">
							Welcome <?php if($_SESSION['name']){echo $_SESSION['name'];} ?>
						</div>
						<h5 style="color: blue;">
							This section contains the Ebook and Revision notes. Revision notes are very  helpful in quick preparation for exam.
						</h5>
					<?php
					if(isset($_GET['clid'])){
						$sqlcl=mysql_query("select * from `student_class` where `id`='$idd'");
						$rescl=mysql_fetch_array($sqlcl);
					?>
						<h5>Ebooks For Free Download  <span style="margin: 10px;">CLASS</span><span style="color: red;"><?php echo $rescl['class'];?></span></h5>
							<?php
							 $fet=mysql_query("select * from `student_subject` where `class_id`='$idd'");
							 $nu=mysql_num_rows($fet);
							 if($nu!=0){
								while($res=mysql_fetch_array($fet)){
                         ?>
								<h2 style="background-color:#efefef;">
									<img src="../admin/<?php echo $res['image'];?>" style="float: left; margin-right: 5px; width:40px; margin-top: -10px;"/>
									<?php echo $res['subject'];?>
								</h2>
								<h4></h4>
								<ul>
									<?php
										$subjid=$res['id'];
										$fet3=mysql_query("select * from `student_topic` where `class_id`='$idd' and `subject_id`='$subjid'");
										
										while($re=mysql_fetch_array($fet3)){
											$tidd=$re['id'];
											$fet4=mysql_query("select * from `extra_detail` where `class_id`='$idd' and `subject_id`='$subjid' and `topic_id`='$tidd' AND ebook!=''");
											
											$nos=mysql_num_rows($fet4);
												if($nos>0){
													while($ree=mysql_fetch_array($fet4)){
									?>
													<li class="list1">
														<a href="pdf_server.php?file=../admin/<?php echo $ree['ebook'];?>"><span style="display: initial;"><a class="li1" href="notes2.php?cncptid=../admin/<?php echo $res3['ebook'];?>"><?php echo $re['topic'];?></a></span><?php if (!$_SESSION['name']){ ?><img src="images/download.png" style="height: 30px;float: right; margin-left: 25px;" onclick="return getpop();"/><?php }else{?>
														<img src="images/download.png" style="height: 30px;float: right; margin-left: 25px;" /></a><?php } ?>
													</li>
												<?php
													} 
												}else{
												//echo "<span style='font-family:arial; font-size:14px;'>There is no record.</span>";
												}
										}
									?>
								</ul>
								<?php 
								}
							}else{ 
								?>
								 <!--<h5>Ebooks For Free Download  <span style="margin: 10px;">CLASS</span><span style="color: red;">x</span></h5>-->
								<?php
								$fet1=mysql_query("select * from `student_subject` where `class_id`='7'");
								while($res1=mysql_fetch_array($fet1)){
									?>
									<div style="background-color:#efefef;">
										<img src="notes2.php?cncptid=../admin/<?php echo $res1['image'];?>" style="float: left; margin-right: 10px; width:40px; margin-top: -10px;"/>
										<h2>
											<?php echo $res1['subject'];?>
										</h2>
									</div>
									<ul>
									  <?php
									  $subid=$res1['id'];
									  //echo "select * from `student_topic` where `class_id`='$class' and `subject_id`='$subid'";
									  $fet2=mysql_query("select * from `student_topic` where `class_id`='9' and `subject_id`='$subid'");
									  while($res2=mysql_fetch_array($fet2)){
										$tid=$res2['id'];
									  //echo "select * from `student_topic` where `class_id`='$class' and `subject_id`='$subid'";
									  $fet3=mysql_query("select * from `extra_detail` where `class_id`='9' and `subject_id`='$subid' and `topic_id`='$tid'");
									  while($res3=mysql_fetch_array($fet3)){
									  ?>
										<li class="list1">
											<span style=""><a class="li1" href="notes2.php?cncptid=../admin/<?php echo $res3['ebook'];?>"><?php echo $res2['topic'];?></a></span><?php if (!$_SESSION['name']){ ?><img src="images/download.png" style="height: 30px;float: right; margin-left: 25px;" /><?php }else{?>
											<a href="pdf_server.php?file=../admin/<?php echo $res3['ebook'];?>"><img src="images/download.png" style="height: 30px;float: right; margin-left: 25px;" /></a><?php } ?>
										</li><?php } }?>
									</ul>
								<?php
								}
							}
							?>
					<?php
					}else{
					?>
					   <!--<h5>Ebooks For Free Download  <span style="margin: 10px;">CLASS</span><span style="color: red;"><?php echo x;?></span></h5>-->
						  <?php
                        $fet1=mysql_query("select * from `student_subject` where `class_id`='$class'");
                        $num=mysql_num_rows($fet1);
                        if($num!=0){
							while($res1=mysql_fetch_array($fet1)){
                         ?>
						<div style="background-color:#efefef;padding:3px;">
							<img src="../admin/<?php echo $res1['image'];?>" style="float: left; margin-right: 10px; width:40px; margin-top: 10px;"/>
							<h2>
								<?php echo $res1['subject'];?>
							</h2>
						</div>
						<ul>
							 <?php
							$subid=$res1['id'];
							$fet2=mysql_query("select * from `student_topic` where `class_id`='$class' and `subject_id`='$subid'");
								while($res2=mysql_fetch_array($fet2)){
									$tid=$res2['id'];
									$fet3=mysql_query("select * from `extra_detail` where `class_id`='$class' and `subject_id`='$subid' and `topic_id`='$tid'");
									$no=mysql_num_rows($fet3);
										if($no>0){
											while($res3=mysql_fetch_array($fet3)){
                              ?>
												<li class="list1">
													<span style=""><a class="li1" href="notes2.php?cncptid=../admin/<?php echo $res3['ebook'];?>"><?php echo $res2['topic'];?></a></span><?php if (!$_SESSION['name']){ ?><img src="images/download.png" style="height: 30px;float: right; margin-left: 25px;" /><?php }else{?>
													<a href="pdf_server.php?file=../admin/<?php echo $res3['ebook'];?>"><img src="images/download.png" style="height: 30px;float: right; margin-left: 25px;" /></a><?php } ?>
												</li>
										<?php
											} 
										}else{
											//echo "<span style='font-family:arial; font-size:14px;'>There is no record.</span>";
										}
								}
								?>
						</ul>
							<?php 
							}
							}
							else
							{ 
							?>
							 <h5>Ebooks For Free Download  <span style="margin: 10px;">CLASS</span><span style="color: red;">x</span></h5>
							  <?php
                         $fet1=mysql_query("select * from `student_subject` where `class_id`='9'");
                         while($res1=mysql_fetch_array($fet1))
                         {
                         ?>
                            <h2><img src="../admin/<?php echo $res1['image'];?>" style="float: left; margin-right: 10px; width:40px; margin-top: -10px;"/>
							<?php echo $res1['subject'];?>
							</h2>
						  <h4></h4>
                             <ul>
                              <?php
                              $subid=$res1['id'];
                              //echo "select * from `student_topic` where `class_id`='$class' and `subject_id`='$subid'";
                              $fet2=mysql_query("select * from `student_topic` where `class_id`='9' and `subject_id`='$subid'");
                              while($res2=mysql_fetch_array($fet2))
                              {
                                $tid=$res2['id'];
                              //echo "select * from `student_topic` where `class_id`='$class' and `subject_id`='$subid'";
                              $fet3=mysql_query("select * from `extra_detail` where `class_id`='9' and `subject_id`='$subid' and `topic_id`='$tid'");
                              while($res3=mysql_fetch_array($fet3))
                              {
                              ?>
                                <li class="list1">
                                    <span style=""><a class="li1" href="notes2.php?cncptid=../admin/<?php echo $res3['ebook'];?>"><?php echo $res2['topic'];?></a></span><?php if (!$_SESSION['name']){ ?><img src="images/download.png" style="height: 30px;float: right; margin-left: 25px;" /><?php }else{?>
                                    <a href="pdf_server.php?file=../admin/<?php echo $res3['ebook'];?>"><img src="images/download.png" style="height: 30px;float:right; margin-left: 25px;" /></a><?php } ?>
                                </li><?php } }?>
                            </ul>
							<?php
							}
							}
							}
							?>
							
                    </div>
                </div>
            </div>
        </div>
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