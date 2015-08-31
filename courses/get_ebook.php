<?php
include_once("../function.php");
  $class=$_GET['class'];
  $sqlclass=mysql_query("select * from `student_class` where `id`='$class'");
  $resclass=mysql_fetch_array($sqlclass);
?>
<h5>Ebooks For Free Download  <span style="margin: 10px;">CLASS</span><span style="color: red;"><?php echo $resclass['class'];?></span></h5>
<?php
 $fet1=mysql_query("select * from `student_subject` where `class_id`='$class'");
   $num=mysql_num_rows($fet1);
                         if($num!=0){
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
                              $fet2=mysql_query("select * from `student_topic` where `class_id`='$class' and `subject_id`='$subid'");
                              while($res2=mysql_fetch_array($fet2))
                              {
                                $tid=$res2['id'];
                              //echo "select * from `student_topic` where `class_id`='$class' and `subject_id`='$subid'";
                              $fet3=mysql_query("select * from `extra_detail` where `class_id`='$class' and `subject_id`='$subid' and `topic_id`='$tid'");
							  $nu=mysql_num_rows($fet3);
							  if($nu>0){
                              while($res3=mysql_fetch_array($fet3))
                              {
                              ?>
                                <li class="list1">
                                    <a href="pdf_server_open.php?file=<?php echo $res3['ebook'];?>" target="_blank" class="inactiveanchor">
										<!--span style="float: left;"-->
										<span>
											<?php echo $res2['topic'];?>
										</span>
									</a>
                                    <a href="pdf_server.php?file=../admin/<?php echo $res3['ebook'];?>"><img src="images/download.png" style="height: 30px;float: right; margin-left: 25px;" /></a>
                                </li>
								<?php
								}
								}
								 else
								{
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
							<h4>There are no records.</h4>
							<?php } ?>
<style>
.inactiveanchor{
	color: #0070B0 !important;
    	text-decoration: none;
	list-style:none;

}
.inactiveanchor:hover{
	color: #0070B0 !important;
}
.inactiveanchor:active{
	color: #0070B0 !important;
}
.inactiveanchor:visited{
	color: #D3DBE6 !important;
}
</style>