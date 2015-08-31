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
						<div style="background-color:#efefef;padding:5px;padding-bottom:5px;"><img src="../admin/<?php echo $res1['image'];?>" style="float: left; margin-right: 10px; width:40px; margin-top: 0px;"/>
							<h2><?php echo $res1['subject'];?>
						</h2></div>
						
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
                                    <span style="float: none;"><a class="li1" href="notes2.php?cncptid=../admin/<?php echo $res3['ebook'];?>"><?php echo $res2['topic'];?></a></span><?php if (!$_SESSION['name']){ ?><img src="images/download.png" style="height: 30px;float: right; margin-left: 25px;" /><?php }else{?>
                                    <a href="pdf_server.php?file=../admin/<?php echo $res3['ebook'];?>"><img src="images/download.png" style="height: 30px;float: right; margin-left: 25px;" /></a><?php } ?>
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
							<?php
							}
							?>