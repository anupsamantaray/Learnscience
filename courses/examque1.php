<?php  include_once("../function.php");
$t=$_SESSION['time'];
$uname=$_SESSION['name'];
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
                <div id="container_right">
                    <div class="topiccontent">
                     <?php
                                    $class=$_GET['c'];
                                     $subject=$_GET['s'];
                                     $topic=$_GET['t'];
                                     $qid=$_GET['q'];
                     $fet=mysql_query("select * from `student_subject` where `id`='$subject'");
                         $r=mysql_fetch_array($fet);
                         $fet1=mysql_query("select * from `student_topic` where `id`='$topic'");
                         $r1=mysql_fetch_array($fet1);
                         $fetclass=mysql_query("select * from `student_class` where `id`='$class'");
                         $rclass=mysql_fetch_array($fetclass);
                         ?>
                       
                         <h5>Exam For Class <?php echo $rclass['class'];?></h5>
                   
                            <h2><img src="images/math.svg" style="float: left; margin-right: 10px; width:40px; margin-top: -10px;"/><?php echo $r['subject'];?></h2>
                            <h4><?php echo $r1['topic'];?></h4>
                            <table style="width:100%; height: auto; font-family: arial; font-size:14px; color: #333;">
 <tr>
                                    <td colspan="2"><span style="background:green; padding: 10px;color: #fff;">Marks secured=<?php
                                    $found=mysql_query("select sum(mark) as mark from `select_answer` where `time`='$t'") or die(mysql_error());
                                    $found1=mysql_query("select * from `select_answer` where `time`='$t'") or die(mysql_error());
                                    $num=mysql_numrows($found1);
                                    $fetch=mysql_fetch_array($found);
                                   echo $fetch['mark'];
                                    ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span style="background:#8a2121; padding: 10px; color: #fff;">Questions Appeared=<?php echo $num; unset($_SESSION['time']); ?></span></td>
                                </tr>
                                <?php
                                     $class=$_GET['c'];
                                     $subject=$_GET['s'];
                                     $topic=$_GET['t'];
                                     $qid=$_GET['q'];
                                     $qu=explode("|",$qid);
                                     $i=0;
                                     foreach( $qu as $qrr)
                                     {
                                     
                                    //$fetch=mysql_query("select * from `student_answer` where `class_id`='$class' and `subject_id`='$subject' and `topic_id`='$topic'") or die(mysql_error());
                                   // echo "SELECT * FROM student_question where `class_id`='$class' and `subject_id`='$subject' and `topic_id`='$topic' ORDER BY RAND( ) LIMIT 0 , 10";
                                   $result = mysql_query("SELECT * FROM student_question where `class_id`='$class' and `subject_id`='$subject' and `topic_id`='$topic' and `id`='$qrr' ")or die(mysql_error());
                                  
                                  
                                while($row=mysql_fetch_array($result)) 
                                {
                                    $q=$row['questions'];
                                    $aid=1;
                                    $ans=$row['answers'];
                                    $question=$row['id'];
                                    $correct=$row['correct'];
                                    $ansarr=explode("|",$ans);
                                    $i++;
                                    
                                    
                                ?>
                                
                                <tr>
                                <td><?php echo $i.")";?></td>
                                <td><?php echo $q ;?></td>
                                </tr>
                                <?php
                                foreach($ansarr as $arr)
                                {
                                  if($arr!="")
                                  {
                                    $sql=mysql_query("select * from `select_answer` where `time`='$t' and `question`='$qrr'");
                                    $res=mysql_fetch_array($sql);
                                    $sanswer=$res['answer'];
                                ?>
                                <tr>
                                <td colspan="2"><?php echo $arr;?></td><?php if($sanswer==$correct && $sanswer==$aid) { ?><td ><img src="img/tick.png"></td><?php } elseif($sanswer!=$correct && $correct==$aid){ ?><td><img src="img/tick.png"></td><?php }if($sanswer!=$correct && $sanswer==$aid){?><td><img src="img/cross.png"></td><?php }?>
                                </tr>
                                <?php $aid++;
                                } } }}
                                ?>
                                </tr>
                               
                               
                            </table>

                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    
    <?php include_once('footer.php')?>
</body>
</html>