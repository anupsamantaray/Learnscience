<?php
include_once("../function.php");
$classid=$_GET['classid'];
$i=0;
$getsubject=mysql_query("select * from `student_subject` where `class_id`='$classid'")or die(mysql_error());
$numsub=mysql_num_rows($getsubject);
if($numsub>0){
	while($getressubject=mysql_fetch_array($getsubject)){
?>
		<h2>
			<img src="../admin/<?php echo $getressubject['image'];?>" style="float: left; margin:0 15px; width:40px;"/>
			<!--Mathematics-->
			<?php echo $getressubject['subject'];?>
		</h2>
		<?php
		$gettopic=mysql_query("select * from `student_topic` where `class_id`='$classid' and `subject_id`='$getressubject[id]'")or die(mysql_error());
		$numvd=mysql_num_rows($gettopic);
		if($numvd>0){
			while($getrestopic=mysql_fetch_array($gettopic)){
	?>	
				<div class="videonew">
					<h4 style="float:left;">
						<?php echo $getrestopic['topic'];?>
						<!--Algebra-->
					</h4>
					<div style="width:100%; height:auto; float:left;">
						<?php
						$getvideo=mysql_query("select * from `extra_detail` where `class_id`='$classid' and `subject_id`='$getressubject[id]' and `topic_id`='$getrestopic[id]' and `video`!=''");
						$numvideo=mysql_num_rows($getvideo);
						if($numvideo>0){
							while($resvideo=mysql_fetch_array($getvideo)){
								$i++;
								if($i==1){
									?>
									<div class="videobox" style="margin-left:0px;">
										<a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade">
											<img src="images/play.jpg" onclick="play('<?php echo $resvideo['id'];?>')" style="width:100%; float:left;">
										</a>
									</div>
									<?php
								}
								elseif($i%4==0){
								?>
									<div class="videobox" style="margin-left:0px;">
										<a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade">
											<img src="images/play.jpg" onclick="play('<?php echo $resvideo['id'];?>')" style="width:100%; float:left;">
										</a>
									</div>
									<?php
								}
								else{
								?>
									<div class="videobox">
										<a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade">
											<img src="images/play.jpg" onclick="play('<?php echo $resvideo['id'];?>')" style="width:100%; float:left;">
										</a>
									</div>
									<?php
								}
							}
						}
						else{
						?>
							<h4 style="color: red; font-size: 14px;">Video Comming Soon</h4>
						<?php
						}
						?>
					</div>	
				</div>					
				<?php
			}
		}else{
		?>
			<h4>There is no video.</h4>
		<?php
		}
	}
}
else{
?>
	<h4>There are no records.</h4>
<?php
}
?>				