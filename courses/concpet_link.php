<?php
include_once("../function.php");
include_once("../function1.php");
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
					
                   <?php 
				   $str="";
$sqlconcept="Select * from tblweakcconcept where eid='".$_SESSION['email']."' Order By id DESC LIMIT 1";
$resultconcept=$con->query($sqlconcept);
if($resultconcept->num_rows>0)
{
	while($rowsconcept=$resultconcept->fetch_assoc())
	{
			$str=$rowsconcept['weak_concept'];
	}
}
				   if ($_SESSION['name'])
					{
						//echo($str);
						if(!empty($str))
						{
							echo('<div style="font-weight:bold;width:100%;"><div style="background-color:#efefef;color:#f68b1c;padding-left:10px;padding-top:10px;padding-bottom:10px;border-radius:10px;border:1px solid #000;">');
							 $len=strlen($str)-1; echo("Areas of improvement :<br> ");//substr($str,1,$len)); 
							 echo("<br>");
							 $strarr=explode(",",$str);
							 for($i=0;$i<count($strarr);$i++)
							 {
								 $sqlweakconcept="Select id from tblconcepts where concept='".trim($strarr[$i]," ")."'";
								
								 $resultweakconcept=$con->query($sqlweakconcept);
								 if($resultweakconcept->num_rows > 0)
								 {
									 while($rowsweakconcept=$resultweakconcept->fetch_assoc())
									 {
										//echo("<br><span>".$strarr[$i]."</span>");
									 	echo("<a href='concpet_link.php?cncptid=".$rowsweakconcept['id']."' style='color:#f68b1c;'>".$strarr[$i]."</a><br><br>");
									 }
								 }
								 // echo($sqlweakconcept);
							 }
							 echo('</div></div>');
						}
					}
					?>
                    
                </div>
                
                <div id="container_right" class="t1">
                		<div class="welcome">
              				Welcome <?php if($_SESSION['name']){echo $_SESSION['name'];} ?>
                		</div>
                        <div style="padding-top:40px;">
                        	<?php 
								$sqlconceptnotes="Select concept_id,notes,path from tblrefconcept where concept_id=".$_GET['cncptid'];
								$resultconceptnotes=$con->query($sqlconceptnotes);
								if($resultconceptnotes->num_rows > 0)
								{
									while($rowsconceptsnotes =$resultconceptnotes->fetch_assoc())
									{
										$strpath=$rowsconceptsnotes['path'];
										//echo($strpath);
										$strnotes="../admin/".$rowsconceptsnotes['path'];
										?>
                                        <h2 style="background-color:#fff;"><a style='color:#f68b1c;' href='notes1.php?ref=<?php echo($strnotes); ?>'><?php echo $rowsconceptsnotes['notes']; ?></a></h2><br><br>
                                        <?php
										//echo("<a style='color:#f68b1c; href='".."'>".$rowsconceptsnotes['notes']."</a><br><br>");	
									}
								}
							?>
                        </div>
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