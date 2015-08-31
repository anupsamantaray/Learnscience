<?php
include_once("../function.php");
$idd=$_GET['clid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" type="text/css" rel="stylesheet" media="screen" />
<script type='text/javascript' src="../js/jquery-1.6.min.js"></script>
<link rel="stylesheet" href="reveal.css">	
<script type="text/javascript" src="jquery.reveal.js"></script>
 <style>
				.button {
  width: 100px;
  height: 30px;
  padding: 5px;
  text-align: center;
  background: #b94a48;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
  color: #FFFFFF;
  border: none;
  border-radius: 4px;
  border: 1px solid #2a6d2a;
  font-weight: bold;
  background-image: -o-linear-gradient(bottom, #56BAD9 0%, #3197B6 100%);
  background-image: -moz-linear-gradient(bottom, #56BAD9 0%, #3197B6 100%);
  background-image: -webkit-linear-gradient(bottom, #56BAD9 0%, #3197B6 100%);
  background-image: -ms-linear-gradient(bottom, #56BAD9 0%, #3197B6 100%);
  background-image: linear-gradient(to bottom, #56BAD9 0%, #3197B6 100%);
  background-image: -o-linear-gradient(bottom, #5FBE5F 0%, #51A351 100%);
  background-image: -moz-linear-gradient(bottom, #5FBE5F 0%, #51A351 100%);
  background-image: -webkit-linear-gradient(bottom, #5FBE5F 0%, #51A351 100%);
  background-image: -ms-linear-gradient(bottom, #5FBE5F 0%, #51A351 100%);
  background-image: linear-gradient(to bottom, #5FBE5F 0%, #51A351 100%);
  text-shadow: 0px -1px 0px rgba(1, 1, 1, 1);
}

				</style>
<script type="text/javascript">
function getval(clsval)
            {
              $.ajax({url:"getsub.php?classid="+clsval,success:function(result){
                $(".t1").html(result);
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
<script type="text/javascript">
function topval(subval,topvals,clval)
            {
              $.ajax({url:"topic.php?subid="+subval+'&topid='+topvals+'&classid='+clval,success:function(result){
                $(".t1").html(result);
                }});  
            }
</script>
<script>
function getpop()
{
alert("please login to download");
}
</script>
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
					<?php
					if(isset($_GET['clid']))
					{
						$idd=intval($_GET['clid']);
					?>
					<ul style="margin-left: 0px; padding: 5px; ">
					<?php
					
						   $sqlcla=mysql_query("select * from `student_class` where `id`=".$idd);
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
						 <a href="#"><span class="sp" style="color: #0070B0;" onclick="return getval(<?php echo $resclass['id'];?>);"> Class <?php echo $resclass['class'];?></span></a>
                        </li>
					<?php
						   }
						   else{
						   
					?>	
					
                        <li class="list">
                            <img src="images/arrow.png" style="float: left; margin-right: 5px;" />
							<a href="#"><span class="sp" style="color:#666;" onclick="return getval(<?php echo $resclass['id'];?>);">Class <?php echo $resclass['class'];?></span></a>
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
                <style>
			textarea::-webkit-input-placeholder { /* WebKit browsers */
    color:#c3c3c3; font-weight:bold;font-size:24px;
}
				</style>
                <div id="container_right" class="t1">
                <div class="welcome">
              			Welcome <?php if($_SESSION['name']){echo $_SESSION['name'];} ?>
                </div>
						<form method="post" action="feedback_submit.php" style="padding-top:30px;">
                         <textarea name="txtfeedback" style="width:100%;" rows="20" placeholder="Enter your feedback"></textarea><br /><br />
                         <input type="submit" name="btnfeedback" value="Send" class="button" /> <span style="font-weight:bold;color:#58af58;">
						 <?php if($_GET['msg'])
						 {echo($_GET['msg']);} ?></span>
                        </form>
               
                
                                </div>
            </div>
        </div>
    </div>
    <!--<div id="myModal" class="reveal-modal">
	<div class="vide">
				
	</div>
	<a class="close-reveal-modal">&#215;</a>
    </div>-->
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