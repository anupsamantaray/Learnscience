  <?php
include_once("../function.php");
include_once("../function1.php");
ob_start();
if ($_SESSION['name'])
{
 $name=$_SESSION['name'];
}
//echo $idd."menuu";
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
?>
  <div id="topbar">
        <div id="topbar_content">
            <div id="logo">
                <img src="images/logo.png" style="width:110px;" />
            </div><div style="float:left;padding-top:20px;padding-left:50px;"><?php
			//$len=strlen($str)-1; echo("You are weak in following concepts : ".substr($str,1,$len)); 
			
			?></div>
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
    <div id="menubar">
        <div id="menubar_content">
            <div class="menu">
               <a href="../index.php">Home</a> 
            </div>
            <div class="menu">
               <a href="wil_index.php?id=ebook">Ebook</a>
            </div>
            <div class="menu">
               <a href="wil_index.php?id=video">Video</a>
            </div>
            <div class="menu">
               <a href="wil_index.php?id=old">Sample Questions</a>
            </div>
            <div class="menu">
	       <?php if ($_SESSION['name'])
	       {
	       ?>
               <a href="exam.php">Exam</a>
	       <?php } else { ?>
	      <!-- <a href="logout.php"></a>-->
	       <a href="#" class="big-link" data-reveal-id="myModal1" data-animation="fade">Exam Time Tips & Tricks.</a>
	       <?php } ?>
            </div>
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
            </div>
			<?php } ?>
           
        </div>
    </div>
