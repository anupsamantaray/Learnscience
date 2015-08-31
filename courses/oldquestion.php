<?php
include_once("../function.php");
if($_GET['class'])
{
   $class=$_GET['class'];
}
elseif($_SESSION['name'])
{
  $n=$_SESSION['name'];
  $slno=$_SESSION['slno'];
  $fet=mysql_query("select * from `login` where `name`='$n' and `slno`='$slno'");
  $res=mysql_fetch_array($fet);
  $class=$res['class'];
}

if($_GET['clid'])
{ $idd=$_GET['clid'];}
else{ $idd=9;}
//echo $idd;
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
<script type='text/javascript' src="../js/jquery-1.6.min.js"></script>
<script type="text/javascript">
function getold(clsval)
            {//alert(clsval);
              $.ajax({url:"oldajax.php?class="+clsval,success:function(result){
                $("#t1").html(result);
                }});
              $('.sp').click(function() 
	{
	$('.sp').css("color","#666");
	$(this).css("color","#0070B0");
	
	});
            }
</script>
<script>
function popup()
{
alert("please login to download");
}
</script>
</head>
<body onload="getold(<?php echo $idd;?>)">
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
					}
					else{
					?>
                    <ul style="margin-left: 0px; padding: 5px;">
                        <?php
                      $fetch=mysql_query("select * from `student_class`");
                      while($receive=mysql_fetch_array($fetch))
                      {
                        if($receive['class']=='x')
                        {
                      ?>
                      <li class="list active">
                           <img src="images/arrow.png" style="float: left; margin-right: 5px;" />
			    <a href="#"><span class="sp" style="color: #0070B0;" onclick="getold(<?php echo $receive['id'];?>)">Class <?php echo $receive['class'];?></span></a>
                        </li>
                        <?php
                        }
                        else
                        {
						?>
                        <li class="list">
                            <img src="images/arrow.png" style="float: left; margin-right: 5px;" />
			    <a href="#"><span class="sp" style="color:#666;" onclick="return getold(<?php echo $receive['id'];?>);">Class <?php echo $receive['class'];?></span></a>
                        </li>
                            
                       <?php }
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
		  <div>
		     <p>These are a set of old questions..You can practice from these questions to do better in exams..Also, we shall soon provide here Sample Questions which may come in your exam</p>
		  </div>
                    <div class="topiccontent">
                        <div id="t1">
							
							
                        </div>
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