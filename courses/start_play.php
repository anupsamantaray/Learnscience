<?php
include_once("../function.php");
$vid=$_GET['vid'];
 $fet2=mysql_query("select * from `extra_detail` where  `id`='$vid'");
 $res=mysql_fetch_array($fet2);
 $link=$res['video'];
 $st=$res['status']+1;
 mysql_query("update `extra_detail` set `status`='$st' where  `id`='$vid'");
 
					$format=explode(".",$link);
					$form=$format[1];
					//echo $link;
					if($form=="mp4"){
					?>
					<object data="../admin/<?php echo $link?>" width="1000" height="400">
					<?php
					}
					if($form=="swf"){		
					?>
					<embed src="../admin/<?php echo $link?>" width="1000" height="400" >
					<?php
					}
					if($form=="flv")
					{
					?>
					<embed src="../admin/<?php echo $link?>" width="1000" height="400" >
					<?php 
					}
					?>