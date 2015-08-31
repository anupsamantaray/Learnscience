<?php
include_once("../function.php");
$subjectid=$_GET['subid'];
$topicid=$_GET['topid'];
$clid=$_GET['classid'];
$sqlsubname=mysql_query("select * from `student_subject` where `id`='$subjectid' and `class_id`='$clid'");
$ressubname=mysql_fetch_array($sqlsubname);
?>
<style>
a.li1:link, a.li1:hover, a.li1:active, a.li1:visited{ color : blue;}
</style>
    <div id="container">
        <div id="container_content">
            <div id="page" style="box-shadow:none; background:none;">
                <div id="container_right">
                    <h2><img src="../admin/<?php echo $ressubname['image'];?>" style="float: left; margin-right: 10px; width:40px; margin-top: -10px;"/>
					<!--Mathematics------------>
					<span class="topic">
					<!--Algebra-->
					<?php 
					$sqltopname=mysql_query("select * from `student_topic` where `id`='$topicid' and `class_id`='$clid' and `subject_id`='$subjectid'");
					$restopname=mysql_fetch_array($sqltopname);
					echo $restopname['topic'];
					?>
					</span></h2>
                    
                    <div class="topiccontent">
                       
                        
                            <h5>Ebooks For Free Download</h5>
                             <ul>
							<?php
							//echo "select * from `extra_detail` where `class_id`='$clid' and `subject_id`='$subjectid' and `topic_id`='$topicid'";
							    $getebook=mysql_query("select * from `extra_detail` where `class_id`='$clid' and `subject_id`='$subjectid' and `topic_id`='$topicid'");
							    $bookno=mysql_num_rows($getebook);
							    if($bookno>0)
							    {
							    while($resebook=mysql_fetch_array($getebook)){
							?>
                                <li class="list1">
                                    <span style="float: left;">
									
									<?php 
									$x=$resebook['ebook'];
									$ebk=explode("/",$x);
									echo '<a class="li1" href="notes2.php?cncptid=../admin/'.$x.'">'.$ebk[1].'</a>';
									?>
									
									</span>
									<?php
									//if($_SESSION['name']){
									?>
									<!--<img src="images/download.png" style="height: 30px;float: left; margin-left: 25px;" />-->
									<?php
									//}
									?>
									<?php if (!$_SESSION['name']){ ?><img src="images/download.png" style="height: 30px;float: left; margin-left: 25px;" onclick="return getpop();"/><?php }else{?>
                                    <a href="pdf_server.php?file=../admin/<?php echo $x;?>"><img src="images/download.png" style="height: 30px;float: right; margin-left: 25px;" /></a><?php } ?>
                                </li>
							<?php
								} }else{
							?>
							<li class="list1">
							    <h5 style="color: red;"> Ebook Comming soon...........</h5>
							</li><?php }?>
                            </ul>
                            <h5>Videos Under This Topic</h5>
							<?php
							$i=0;
							$getvideo=mysql_query("select * from `extra_detail` where `class_id`='$clid' and `subject_id`='$subjectid' and `topic_id`='$topicid'");
							 $videono=mysql_num_rows($getvideo);
							    if($videono>0)
							    {
							while($resvideo=mysql_fetch_array($getvideo))
							{
							$i++;
							if($i==1){
							?>
                            <div class="videobox" style="margin-left: 0px;">
                               <!--<object width="230" height="200">-->
							  <!-- <param name="movie" value="//www.youtube-nocookie.com/v/-xYYnj-SrsM?hl=en_US&amp;version=3"></param>-->
							   <!--<param name="movie" value="../admin/<?php echo $resvideo['video'];?>"></param>-->
							   <!--<param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>-->
							   <!--<embed src="http://www.youtube-nocookie.com/v/-xYYnj-SrsM?hl=en_US&amp;version=3" type="application/x-shockwave-flash" width="230" height="200" allowscriptaccess="always" allowfullscreen="true"></embed>-->
							   <!--<embed src="../admin/<?php echo $resvideo['video'];?>" type="application/x-shockwave-flash" width="230" height="200" allowscriptaccess="always" allowfullscreen="true"></embed>
							   </object>-->
							   <a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade">
                                                                         <img src="images/play.jpg" onclick="play('<?php echo $resvideo['id'];?>')"></a>
                            </div>
							<?php
							}
							elseif($i%4==0)
							{
							?>
							 <div class="videobox" style="margin-left: 0px;">
                              <!-- <object width="230" height="200">
							   <param name="movie" value="//www.youtube-nocookie.com/v/-xYYnj-SrsM?hl=en_US&amp;version=3"></param>
							   <param name="movie" value="../admin/<?php echo $resvideo['video'];?>"></param>
							   <param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>
							   
							   <embed src="../admin/<?php echo $resvideo['video'];?>" type="application/x-shockwave-flash" width="230" height="200" allowscriptaccess="always" allowfullscreen="true"></embed>
							   </object>-->
							  
							  <a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade">
                                                                         <img src="images/play.jpg" onclick="play('<?php echo $resvideo['id'];?>')"></a>
                            </div>
							<?php
							}
							else
							{
							?>
							 <div class="videobox">
                              <!--  <object width="230" height="200">
							  <param name="movie" value="//www.youtube-nocookie.com/v/-xYYnj-SrsM?hl=en_US&amp;version=3"></param>
							  <param name="movie" value="../admin/<?php echo $resvideo['video'];?>"></param>
							   <param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>
							   
							   <embed src="../admin/<?php echo $resvideo['video'];?>" type="application/x-shockwave-flash" width="230" height="200" allowscriptaccess="always" allowfullscreen="true"></embed>
							   </object>-->
							   <a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade">
                                                                         <img src="images/play.jpg" onclick="play('<?php echo $resvideo['id'];?>')"></a>
                            </div>
							<?php
							}
							}
							    }else{
							?>
                         <h5 style="color: red;">Video Comming soon.....</h5><?php }?>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>