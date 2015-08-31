<?php
include_once("../function.php");
$class=$_GET['class'];
$sqlcls=mysql_query("select * from `student_class` where `id`='$class'");
$rescls=mysql_fetch_array($sqlcls);

?>
                         <h5>Old Questions For Free Download <span style="margin: 10px;">CLASS</span><span style="color: red;"><?php echo $rescls['class'];?></span></h5>
                        <?php
                         $fet1=mysql_query("select * from `student_subject` where `class_id`='$class'");
                         while($res1=mysql_fetch_array($fet1))
                         {$sid=$res1['id'];
                        ?>
                        <h2><img src="../admin/<?php echo $res1['image'];?>" style="float: left; margin-right: 10px; width:40px; margin-top: -10px;"/><?php echo $res1['subject'];?><!--<img src="images/download.png" style="height: 22px;float: right; " />--></h2>
                            <?php
                            //$fet2=mysql_query("select * from `student_topic` where `class_id`='$class' and `subject_id`='$sid'");
                           // while($res2=mysql_fetch_array($fet2))
                            //{$tid=$res2['id'];
                            $fet3=mysql_query("select * from `oldquestion` where `class_id`='$class' and `subject_id`='$sid' order by year");
                            $num=mysql_numrows($fet3);
                            if($num!=0){
                            while($res3=mysql_fetch_array($fet3))
                            {
                            ?>
                            <?php if($_SESSION['name']){ ?>
                            <h4><?php echo $res3['year'];?><a href="pdf_server.php?file=../admin/<?php echo $res3['oldquestion'];?>"><img src="images/download.png" style="height: 22px;float: right; " /></a></h4>
                            <?php }else{?>
                            <h4><?php echo $res3['year'];?><img src="images/download.png" style="height: 22px;float: right; " onclick="popup()" /></h4>
                            <?php }}}else{?><h4><?php echo $res3['year'];?><span style="height: 22px;float: right; "><?php echo "No records found";?></span></h4><?php }//}
                            }
							
							?>
