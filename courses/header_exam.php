  <?php
//include_once("../function1.php");
ob_start();
if ($_SESSION['name'])
{
 $name=$_SESSION['name'];
}
//echo $idd."menuu";
?>
<link href="menubardemo.css" type="text/css" rel="stylesheet" media="screen" />
  <div id="topbar" style="height: auto;">
        <div id="topbar_content" style="height: none;">
            <div id="logo" style="margin: 0px;">
                <img src="images/logo.png" style="width:150px;" />
            </div>
            <div id="logo_content">
	     <?php if($_SESSION['name']){?>
             <img src="images/user.png" style="float: left; margin-right: 10px;height: 32px;margin-top: -5px;" />   Welcome <span style="color: rgb(0, 112, 176); "><?php echo $name;?></span><br/>
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
	<div id="menubar" style="width:200px">
        <div id="menubar_content" style="width:200px">
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
            <div class="menu" style="vertical-align:top;">
                <!-- <ul id="menu-bar" style="width:100%;"><li><a href="video.php?clid=<?php //echo $idd;?>">Quizzes</a>
                <ul>
  				 <li><a href="#"><b>Basic Quiz</b></a></li>
  				 <li><a href="#"><b>Competitive Quiz</b></a></li>
  				</ul></li></ul>-->
                <ul id="menu-bar" style="width:100%;"><li><a href="../services.php">Quizzes</a>
                <ul>
  				 <li><a href="wil_index1.php?prir=0">Basic Quiz</a></li>
  				 <li><a href="wil_index2.php?prir=1">Competitive Quiz</a></li>
  				</ul></li></ul>
            </div>
            <div class="menu">
               <a href="oldquestion.php?clid=<?php echo $idd;?>">Sample Questions</a>
            </div>
            <div class="menu">
	       <?php if ($_SESSION['name'])
	       {
	       ?>
               <a href="exam.php">Exam</a>
	       <?php
		   }
		   else 
		   { 
		   ?> <a href="#" class="big-link" data-reveal-id="myModal1" data-animation="fade">Exam Time Tips & Tricks.</a>
		   <?php 
		   } 
		   ?>
            </div>
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
	
    <div id="menubar">
        <div id="menubar_content">
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
             <div class="menu" style="vertical-align:top;">
             <!-- <ul id="menu-bar" style="width:100%;"><li><a href="video.php?clid=<?php //echo $idd;?>">Quizzes</a>
                <ul>
  				 <li><a href="#"><b>Basic Quiz</b></a></li>
  				 <li><a href="#"><b>Competitive Quiz</b></a></li>
  				</ul></li></ul>-->
                <ul id="menu-bar" style="width:100%;"><li><a href="../services.php">Quizzes</a>
                <ul>
  				 <li><a href="wil_index1.php?prir=0">Basic Quiz</a></li>
  				 <li><a href="wil_index2.php?prir=1">Competitive Quiz</a></li>
  				</ul></li></ul>
            </div>
            <div class="menu">
               <a href="oldquestion.php">Sample Questions</a>
            </div>
            <div class="menu">
	       <?php if ($_SESSION['name'])
	       {
	       ?>
               <a href="exam.php">Exam</a>
	       <?php } else { ?> <a href="#" class="big-link" data-reveal-id="myModal1" data-animation="fade">Exam Time Tips & Tricks.</a><?php } ?>
            </div>
	    
	    <?php if ($_SESSION['name'])
	       {
	       ?>
	    <div class="menu">
               <a href="promote.php">Promotion</a>
            </div><?php } ?>
           
        </div>
    </div>
	<?php
	}
	?>