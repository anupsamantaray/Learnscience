<?php
include_once("../function.php");
//$classid=$_GET['clid'];
if($_GET['clid']){
$idd=$_GET['clid'];}
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
<script type="text/javascript">
    
function getvals(clsval)
            {
              $.ajax({url:"getvideo.php?classid="+clsval,success:function(result){
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

function play(video)
	    {
				//	alert(video);
		$.ajax({url:"start_play.php?vid="+video,success:function(result){
			//alert(result);
					$(".vide").show();
		document.getElementsByClassName("vide")[0].innerHTML=result;
                }});

	    }
</script>
</head>
<body>
    <?php include_once('header2.php')?>
    
    <div id="container">
        <div id="container_content">
            <div id="page">
                <div id="container_left">
                    <div class="heading">
                        <h3>All Class</h3>
                        
                    </div>
					<?php
					if(isset($_GET['clid']))
					{
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
						   <a href="#"><span class="sp" style="color: #0070B0;" onclick="return getvals(<?php echo $resclass['id'];?>);"> Class <?php echo $resclass['class'];?></span></a>
                        </li>
					<?php
						   }
						   else{
					?>	
                         <li class="list">
                            <img src="images/arrow.png" style="float: left; margin-right: 5px;" /> 
							<a href="#"><span class="sp" style="color:#666;" onclick="return getvals(<?php echo $resclass['id'];?>);">Class <?php echo $resclass['class'];?></span></a>
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
                    
                    <div class="welcome">
              			Welcome <?php if($_SESSION['name']){echo $_SESSION['name'];} ?>
                </div>
                    <div class="topiccontent">
                       
                         <h5>Videos</h5>
                            <div  id="t1">
							<?php
					if(isset($_GET['clid']))
					{
					
					$i=0;
					$getsubj=mysql_query("select * from `student_subject` where `class_id`='$idd'")or die(mysql_error());
					while($getressubj=mysql_fetch_array($getsubj))
						{	
					?>
					<!--<h2>
					    <span><?php //echo $getressubj['subject'];?></span>
					    <img src="../admin/<?php //echo $getressubj['image'];?>" style="float: left; margin-right: 10px; width:40px; margin-top: -10px;"/>
					</h2>-->
					<?php
							
					$gettopp=mysql_query("select * from `student_topic` where `class_id`='$idd' and `subject_id`='$getressubj[id]'")or die(mysql_error());
					$numvd=mysql_num_rows($gettopp);
					if($numvd>0){
					while($getrestopp=mysql_fetch_array($gettopp))
						{
					?>	
					<h4 style="">
							<?php echo $getrestopp['topic'];?>
					</h4>
					<?php
					//echo "select * from `extra_detail` where `class_id`='$idd' and `subject_id`='$getressubj[id]' and `topic_id`='$getrestopp[id]'";
					$getvidd=mysql_query("select * from `extra_detail` where `class_id`='$idd' and `subject_id`='$getressubj[id]' and `topic_id`='$getrestopp[id]' and `video`!=''")or die(mysql_error());
					$numvd=mysql_num_rows($getvidd);
					if($numvd>0){
					?>
					<div style="width:100%; height:auto;">
					<?php
					while($resvidd=mysql_fetch_array($getvidd)){
					$i++;
					if($i==1)
							{
					?>
					
					      <div class="videobox" style="">
                                                                         <a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade" style="padding:0;">
                                                                         <img src="images/play.jpg" onclick="play('<?php echo $resvidd['id'];?>')" style="width:100%; padding:0;"></a>
							   
						</div>
					<?php
					}
					elseif($i%4==0)
					{
					?>
					<div class="videobox" style="">
                                                                         <a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade" style="padding:0;">
                                                                         <img src="images/play.jpg" onclick="play('<?php echo $resvidd['id'];?>')" style="width:100%; padding:0;"></a>
							   
					</div>
					<?php
					}
					else
					{
					?>
					<div class="videobox">
                                                                         <a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade" style="padding:0;">
                                                                         <img src="images/play.jpg" onclick="play('<?php echo $resvidd['id'];?>')" style="width:100%; padding:0;"></a>
							   
					</div>
					<?php
					}
					}
					?>
					</div>
					<?php
					}
					else
					{
					?>
					<h4 style="color: red;">Video coming soon...</h4>
					<?php
					}
					?>
					<!--</div>-->
					<?php
					
					}
					}
					else
					{
					?>
					<h4 style="color: red;">Video coming soon...</h4>
					<?php
					}
					}
					?>

					<?php
					}
					else{
	
					$i=0;
					$getsub=mysql_query("select * from `student_subject` where `class_id`='9'")or die(mysql_error());
					while($getressub=mysql_fetch_array($getsub))
						{	
					?>
					<!--<h2><span><?php echo $getressub['subject'];?></span>
							<img src="../admin/<?php echo $getressub['image'];?>" style="float: left; margin-right: 10px; width:40px; margin-top: -10px;"/>
							
					</h2>-->
					<?php
							
					$gettop=mysql_query("select * from `student_topic` where `class_id`='9' and `subject_id`='$getressub[id]'")or die(mysql_error());
					$numvdd=mysql_num_rows($gettop);
					if($numvdd>0){
					while($getrestop=mysql_fetch_array($gettop))
						{
					?>	
					<h4 style="">
							<?php echo $getrestop['topic'];?>
							<!--Algebra-->
					</h4>
					
					<!--<div style="width:100%; height:auto; float:left;">-->
					<?php
					$getvid=mysql_query("select * from `extra_detail` where `class_id`='9' and `subject_id`='$getressub[id]' and `topic_id`='$getrestop[id]' and `video`!=''");
					$numvdo=mysql_num_rows($getvid);
					if($numvdo>0){
					?>
					<div style="width:100%; height:auto;">
					<?php
					while($resvid=mysql_fetch_array($getvid)){
					$i++;
					if($i==1)
							{
					?>
						<div class="videobox" style="">
									 <!--<object width="230" height="200">
									 <param name="movie" value="../admin/<?php echo $resvid['video'];?>"></param>
									 <param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>
									 <embed src="../admin/<?php echo $resvid['video'];?>" type="application/x-shockwave-flash" width="230" height="200" allowscriptaccess="always" allowfullscreen="true"></embed>
									 </object>-->
                                                                         <a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade" style="padding:0;">
                                                                         <img src="images/play.jpg" onclick="play('<?php echo $resvid['id'];?>')" style="width:100%; padding:0;"></a>
							   
						</div>
					<?php
					}
					elseif($i%4==0)
					{
					?>
					<div class="videobox" style="">
									  <!--<object width="230" height="200">
									 <param name="movie" value="../admin/<?php echo $resvid['video'];?>"></param>
									 <param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>
									 <embed src="../admin/<?php echo $resvid['video'];?>" type="application/x-shockwave-flash" width="230" height="200" allowscriptaccess="always" allowfullscreen="true"></embed>
									 </object>-->
                                                                         <a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade" style="padding:0;">
                                                                         <img src="images/play.jpg" onclick="play('<?php echo $resvid['id'];?>')" style="width:100%; padding:0;"></a>
							   
					</div>
					<?php
					}
					else
					{
					?>
					<div class="videobox">
									  <!--<object width="230" height="200">
									 <param name="movie" value="../admin/<?php echo $resvid['video'];?>"></param>
									 <param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>
									 <embed src="../admin/<?php echo $resvid['video'];?>" type="application/x-shockwave-flash" width="230" height="200" allowscriptaccess="always" allowfullscreen="true"></embed>
									 </object>-->
                                                                         <a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade" style="padding:0;">
                                                                         <img src="images/play.jpg" onclick="play('<?php echo $resvid['id'];?>')" style="width:100%; padding:0;"></a>
							   
					</div>
					<?php
					}
					}
					?>
					</div>
					<?php
					}
					else
					{
					?>
					<h4 style="color: red;">Video coming soon...</h4>
					<?php
					}
					?>
					<!--</div>-->
					<?php
					
					}
					}
					else
					{
					?>
					<h4 style="color: red;">Video coming soon...</h4>
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
    </div>
    <div id="myModal" class="reveal-modal">
	<div class="vide">
				
	</div>
	<a class="close-reveal-modal" href="video.php<?php if($_GET['clid']){ echo "?clid=".$_GET['clid'];}?>">&#215;</a>
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