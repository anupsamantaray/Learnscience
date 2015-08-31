<?php
include_once("../function.php");
ob_start();
if (!$_SESSION['name']){
header("location:logout.php");
}
else{
$class=$_SESSION['class'];
$sqlcl=mysql_query("select * from `student_class` where `id`='$class'");
$rescl=mysql_fetch_array($sqlcl);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>..:User Panel:..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" type="text/css" rel="stylesheet" media="screen" />
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
                    <ul style="margin-left: 0px; padding: 5px;">
                        <li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" /> Class <?php echo $rescl['class'];?>
                        </li>
                    </ul>
                </div>
                <div id="container_right">
                  <div class="welcome">
              			Welcome <?php if($_SESSION['name']){echo $_SESSION['name'];} ?>
                </div>
                  <?php
                      $fetch=mysql_query("select * from `student_subject` where `class_id`='$class'") or die(mysql_error());
                      while($receive=mysql_fetch_array($fetch))
                      {
                         $sid=$receive['id'];
                         ?>
                    <h2><img src="../admin/<?php echo $receive['image'];?>" style="float: left; margin-right: 10px; width:40px; margin-top: -10px;"/><?php echo $receive['subject']; ?></h2>
                     <?php
                     $fetc=mysql_query("select * from `student_topic` where `class_id`='$class' and `subject_id`='$sid'")or die(mysql_error());
                      $num=mysql_numrows($fetc);
                      if($num!=0){
                      while($rec=mysql_fetch_array($fetc))
                     { $tid=$rec['id'];
                      ?>
                    <h4><a href="examque.php?class=<?php echo $class; ?>&sub=<?php echo $sid; ?>&topic=<?php echo $tid; ?>" style="text-decoration: none; color: rgb(0, 112, 176);"><?php echo $rec['topic']; ?></a></h4>
                    <?php } }else{?><h4><?php echo " No records found";}?></h4><?php }?>
                </div>
            </div>
        </div>
    </div>
    
    <?php include_once('footer.php')?>
</body>
</html><?php } ?>