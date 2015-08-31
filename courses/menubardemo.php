
<style>
#menu-bar {
  width: 95%;
  margin: 0px 0px 0px 0px;
  padding: 6px 6px 4px 6px;
  height: 40px;
  line-height: 100%;
 
  /*-webkit-border-radius: 24px;*/
  -moz-border-radius: 24px;
  box-shadow: 2px 2px 3px #666666;
  -webkit-box-shadow: 2px 2px 3px #666666;
  -moz-box-shadow: 2px 2px 3px #666666;
  background: url(images/menubg.jpg) repeat;
  background: url(images/menubg.jpg) repeat;
  background: url(images/menubg.jpg) repeat;
  background: url(images/menubg.jpg) repeat;
  background: url(images/menubg.jpg) repeat);
 /* border: solid 1px #6D6D6D;*/
  position:relative;
  z-index:999;
}
#menu-bar li {
  margin: 0px 0px 6px 0px;
  padding: 0px 6px 0px 6px;
  float: left;
  position: relative;
  list-style: none;
}
#menu-bar a {
  font-weight: bold;
  font-family: arial;
  font-style: normal;
  font-size: 12px;
  color: #fff;
  text-decoration: none;
  display: block;
  padding: 6px 20px 6px 20px;
  margin: 0;
  margin-bottom: 6px;
  /*border-radius: 10px;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  text-shadow: 2px 2px 3px #000000;*/
}
#menu-bar li ul li a {
  margin: 0;
}
#menu-bar .active a, #menu-bar li:hover > a {
  background:url(images/menubg.jpg) repeat;
  background:url(images/menubg.jpg) repeat;
  background:url(images/menubg.jpg) repeat;
  background:url(images/menubg.jpg) repeat;
  background:url(images/menubg.jpg) repeat;
  color: #fff;
/*  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
  -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
  box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
  text-shadow: 2px 2px 3px #FFFFFF;*/
}
#menu-bar ul li:hover a, #menu-bar li:hover li a {
  background: none;
  border: none;
  color: #fff;
/*  -box-shadow: none;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;*/
}
#menu-bar ul a:hover {
  background:url(images/menubg.jpg) repeat !important;
  background: url(images/menubg.jpg) repeat !important;
  background:url(images/menubg.jpg) repeat!important;
  background:url(images/menubg.jpg) repeat !important;
  background:url(images/menubg.jpg) repeat !important;
  color: #FFF !important;
 /* border-radius: 0;*/
 /* -webkit-border-radius: 0;*/
 /* -moz-border-radius: 0;*/
  text-shadow: 2px 2px 3px #FFFFFF;
}
#menu-bar li:hover > ul {
  display: block;
}
#menu-bar ul {
  background:url(images/menubg.jpg) repeat;
  background:url(images/menubg.jpg) repeat;
  background: url(images/menubg.jpg) repeat;
  background: url(images/menubg.jpg) repeat;
  background: url(images/menubg.jpg) repeat;
  display: none;
  margin: 0;
  padding: 0;
  width: 185px;
  position: absolute;
  top: 30px;
  left: 0;
  
  
 /* -webkit-border-radius: 10px;*/
/*  -moz-border-radius: 10px;
  -webkit-box-shadow: 2px 2px 3px #222222;
  -moz-box-shadow: 2px 2px 3px #222222;
  box-shadow: 2px 2px 3px #222222;*/
}
#menu-bar ul li {
  float: none;
  margin: 0;
  padding: 0;
}
#menu-bar ul a {
  padding:10px 0px 10px 15px;
  color:#fff !important;
  font-size:12px;
  font-style:normal;
  font-family:arial;
  font-weight: normal;
 /* text-shadow: 2px 2px 3px #FFFFFF;*/
}
#menu-bar ul li:first-child > a {
  border-top-left-radius: 10px;
  -webkit-border-top-left-radius: 10px;
  -moz-border-radius-topleft: 10px;
 /* border-top-right-radius: 10px;
  -webkit-border-top-right-radius: 10px;
  -moz-border-radius-topright: 10px;*/
}
#menu-bar ul li:last-child > a {
 /* border-bottom-left-radius: 10px;
  -webkit-border-bottom-left-radius: 10px;
  -moz-border-radius-bottomleft: 10px;
  border-bottom-right-radius: 10px;
  -webkit-border-bottom-right-radius: 10px;
  -moz-border-radius-bottomright: 10px;*/
}
#menu-bar:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}
#menu-bar {
  display: inline-block;
}
  html[xmlns] #menu-bar {
  display: block;
}
* html #menu-bar {
  height: 1%;
}
</style>
<body>
 <?php
include_once("../function.php");
ob_start();
if ($_SESSION['name'])
{
 $name=$_SESSION['name'];
}
//echo $idd."menuu";
?>
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
	if($idd)
	{
	?>
<div style="url(images/menubg.jpg) repeat;">
<center><ul id="menu-bar">
 <li> <a href="../index.php"><img src="images/homeicon.png" style=" float: left; margin-top: -20px;"></a></li>
 <?php if($_SESSION['name']){?> <li>  <a href="student_detail.php">My Profile</a> </li><?php } ?>
 <li> <a href="../index.php">E Book</a></li>
 <li> <a href="../index.php">Video</a></li>
 <li><a href="#">Quizzes</a>
  <ul>
   <li><a href="#"><b>Basic Quiz</b></a></li>
   <li><a href="#"><b>Competitive Quiz</b></a></li>
  </ul>
 </li>
 
 <li><a href="#">Sample Questions</a></li>
  <?php if ($_SESSION['name'])
	       {
	       ?><li><a href="#">Exam</a></li>
             <?php
		   }
		   else 
		   { 
		   ?><li> <a href="#" class="big-link" data-reveal-id="myModal1" data-animation="fade">Exam Time Tips & Tricks.</a></li>
            <?php 
		   } 
		   ?>  <?php if ($_SESSION['name'])
	       {
	       ?>
  <li><a href="#">Promotion</a></li><?php } ?>
</ul></center><div>
<?php
	//echo $idd."nnn";
	}
	else{
	?>
<div style="url(images/menubg.jpg) repeat;">
<center><ul id="menu-bar">
 <li> <a href="../index.php"><img src="images/homeicon.png" style=" float: left; margin-top: -20px;"></a></li>
 <?php if($_SESSION['name']){?> <li>  <a href="student_detail.php">My Profile</a> </li><?php } ?>
 <li> <a href="../index.php">E Book</a></li>
 <li> <a href="../index.php">Video</a></li>
 <li><a href="#">Quizzes</a>
  <ul>
   <li><a href="#"><b>Basic Quiz</b></a></li>
   <li><a href="#"><b>Competitive Quiz</b></a></li>
  </ul>
 </li>
 
 <li><a href="#">Sample Questions</a></li>
  <?php if ($_SESSION['name'])
	       {
	       ?><li><a href="#">Exam</a></li>
             <?php
		   }
		   else 
		   { 
		   ?><li> <a href="#" class="big-link" data-reveal-id="myModal1" data-animation="fade">Exam Time Tips & Tricks.</a></li>
            <?php 
		   } 
		   ?>  <?php if ($_SESSION['name'])
	       {
	       ?>
  <li><a href="#">Promotion</a></li><?php } ?>
</ul></center><div>
<?php
	//echo $idd."nnn";
	}
	
	?>