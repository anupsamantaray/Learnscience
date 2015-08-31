  <?php
include_once("../function.php");
include_once("../function1.php");
ob_start();
if ($_SESSION['name'])
{
 $name=$_SESSION['name'];
 $email=$_SESSION['email'];
}
//echo $name;
?>
<?php
/*$str="";
$sqlconcept="Select * from tblweakcconcept where eid='".$_SESSION['email']."' Order By id DESC LIMIT 1";
$resultconcept=$con->query($sqlconcept);
if($resultconcept->num_rows>0)
{
	while($rowsconcept=$resultconcept->fetch_assoc())
	{
			$str=$rowsconcept['weak_concept'];
	}
}*/
?>
<link href="menubardemo.css" type="text/css" rel="stylesheet" media="screen" />
  <div id="topbar" style="height: auto;">
        <div id="topbar_content" style="height: none;">
            <div id="logo" style="margin: 0px;">
               <a href="../index.php"> 
					<img src="images/logo.png" style="width:150px;" />
				</a>
            </div><div style="float:left;padding-top:20px;padding-left:50px;font-weight:bold;color:#F00;width:500px;"><?php
			if ($_SESSION['name'])
			{
			// $len=strlen($str)-1; echo("These concepts may be improved : ".substr($str,1,$len)); 
			}
			?></div>
            <div id="logo_content">
	     <?php if($_SESSION['name']){
			 $sql_img=mysql_query("Select pro_pic from login where name='$name'");
			 if( $res=mysql_fetch_array($sql_img))
			 {
				 $img_val=$res['pro_pic'];
			 }
			 if(!empty($img_val))
			 {
			 ?>
              <img src="<?php echo($img_val); ?>" style="float: left; margin-right: 10px;height: 80px;margin-top: -5px;" />&nbsp;
         		<?php
			 }
				else
				{
					?>
             <img src="images/user.png" style="float: left; margin-right: 10px;height:80px;margin-top: -5px;" />
             <?php } ?>   Welcome <span style="color: rgb(0, 112, 176); "><?php echo $name;?></span><br/>
             <span style="font-size:12px;">Last login:<span style="color: rgb(0, 112, 176); "><?php echo $date=date("Y-m-d"); ?></span></span>
             <a href="logout.php"><img src="images/logout.png"/></a>
	     <?php } else{?>
	     <a href="../index.php" style="text-decoration: none; color: #fff;"><img src="images/create1.png"/></a>
	     <a href="../login.php" style="text-decoration: none; color: #fff;"><img src="images/login.png"/></a><?php }?>
            </div>
        </div>
    </div>
    <?php
	$idd=null;
	if($idd)
	{
	?>
	<div id="menubar" style="width:100%" align="center" >
       <div id="menubar_content" style="width:10%" align="center" >
	    <div class="menu">
               <a href="../index.php?clid=<?php echo $idd;?>"><img src="images/homeicon.png" style=" float: left; margin-top: -20px;"></a>
            </div>
            <!--<div class="menu">
               <a href="index.php?clid=<?php //echo $idd;?>">Home</a> 
            </div>-->
	    <?php if($_SESSION['name']){?>
	    <div class="menu">
               <a href="student_detail.php">My Profile</a> 
            </div><?php } ?>
            <div class="menu">
               <a href="ebook.php?clid=<?php echo $idd;?>">Ebook</a>
            </div>
            <div class="menu">
               <a href="video.php?clid=<?php echo $idd;?>">Video</a>
            </div>
            <div class="menu" style="vertical-align:top;width:5%;">
                <!-- <ul id="menu-bar" style="width:100%;"><li><a href="video.php?clid=<?php //echo $idd;?>">Quizzes</a>
                <ul>
  				 <li><a href="#"><b>Basic Quiz</b></a></li>
  				 <li><a href="#"><b>Competitive Quiz</b></a></li>
  				</ul></li></ul>
             <ul id="menu-bar" ><li>-->  <?php if ($_SESSION['name'])
	       {
	       ?><a href="ShowQuizes.php">Quizzes</a>
             <?php
		   }
            else 
		   { 
		   ?>    <ul id="menu-bar" ><li><a href="#">Quizzes</a>
               	<ul>
  				 <li><a href="wil_index1.php?prir=0">Basic Quiz</a></li>
  				 <li><a href="wil_index2.php?prir=1">Competitive Quiz</a></li>
  				</ul></li></ul>
		   <?php 
		   } 
		   ?> <!-- <ul>
  				 <li><a href="wil_index1.php?prir=0">Basic Quiz</a></li>
  				 <li><a href="wil_index2.php?prir=1">Competitive Quiz</a></li>
  				</ul></li></ul></center>-->
            </div>
            <div class="menu">
               <a href="oldquestion.php?clid=<?php echo $idd;?>">Sample Questions</a>
            </div>
            
	       <?php if ($_SESSION['name'])
	       {
	       ?>
              <!-- <a href="exam.php">Exam</a>-->
	       <?php
		   }
		   else 
		   { 
		   ?><div class="menu"> <a href="#myModal1" class="big-link" data-reveal-id="myModal1" data-animation="fade">Exam Time Tips & Tricks.</a></div>
         
		   <?php 
		   } 
		   ?>
            
	    <?php if ($_SESSION['name'])
	       {
	       ?>
	    <div class="menu">
               <a href="promote.php">Promotion</a>
            </div><?php } ?>
           
        </div>
    </div>
	<?php
	//echo $idd."nnn";
	}
	else{
	?>
	
    <div id="menubar" style="width:100%" align="center" >
        <div id="menubar_content" style="width:85%" align="center" >
	  <div class="menu">
               <a href="../index.php"><img src="images/homeicon.png" style=" float: left; margin-top: -20px;"></a>
            </div>
	  <div class="menu">
               <a href="student_detail.php">My Profile</a> 
            </div>
            <div class="menu">
               <a href="ebook.php">Ebook</a>
            </div>
            <div class="menu">
               <a href="video.php">Video</a>
            </div>
            <div class="menu" style="vertical-align:top;width:5%;">
             <!-- <ul id="menu-bar" style="width:100%;"><li><a href="video.php?clid=<?php //echo $idd;?>">Quizzes</a>
                <ul>
  				 <li><a href="#"><b>Basic Quiz</b></a></li>
  				 <li><a href="#"><b>Competitive Quiz</b></a></li>
  				</ul></li></ul>-->
                 <?php if ($_SESSION['name'])
	       {
	       ?><a href="ShowQuizes.php">Quizzes</a>
             <?php
		   }
            else 
		   { 
		   ?>    <ul id="menu-bar" ><li><a href="#">Quizzes</a>
               	<ul>
  				 <li><a href="wil_index1.php?prir=0">Basic Quiz</a></li>
  				 <li><a href="wil_index2.php?prir=1">Competitive Quiz</a></li>
  				</ul></li></ul>
		   <?php 
		   } 
		   ?>
            </div>
            <div class="menu">
               <a href="oldquestion.php">Sample Questions</a>
            </div>
            
	       <?php if ($_SESSION['name'])
	       {
	       ?>
              <!-- <a href="exam.php">Exam</a>-->
	       <?php } else { ?><div class="menu"> <a href="#" class="big-link" data-reveal-id="myModal1" data-animation="fade">Exam Time Tips & Tricks.</a></div><?php } ?>
            
	    
	    <?php if ($_SESSION['name'])
	       {
	       ?>
	    <div class="menu">
               <a href="promote.php">Promotion</a>
            </div>
			<div class="menu">
               <a href="show_result.php">Check How Others Had Scored</a>
            </div>
			<div class="menu">
               <a href="feedback.php">Feedback</a>
            </div><?php } ?>
           
        </div>
    </div>
	<?php
	}
	?>
	
    <?php
	if ($_SESSION['name'])
	       {}
		   else
		   {
			   ?>
     <div id="myModal1" class="reveal-modal" style="width:400px;">
	<div class="vide">
	 Exams are made easy through unique teaching tools in our website. So Students ..no more fear.. !!
Our educational content is created in a way to improvise the speed and ease of learning by any student of any talent level. Even a weak student can easily cross the exam hurdles by following our education content. A few hours study on our website  in exam time can help you easily pass and excel in the exam.. "			
	</div>
	<a class="close-reveal-modal">&#215;</a>
    </div>
    <?php
		   }
		   ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    