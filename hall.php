<?php 
include_once('function.php');
 if(isset($_GET['err']))
{
$mess=$_GET['err'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" media="screen" href="css/style1.css">

<link rel="stylesheet" type="text/css" href="styles.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
	
	<!-----pop up------>
<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="js/jquery.reveal.js"></script>
<link rel="stylesheet" href="css/reveal.css">
<!-----pop up ned------>
    <!-- jQuery -->
   	<script type="text/javascript" src="scripts/jquery-1.9.0.min.js"></script>
    <!-- FlexSlider -->
    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" charset="utf-8">
    var $ = jQuery.noConflict();
    $(window).load(function() {
    $('.flexslider').flexslider({
          animation: "fade"
    });
	
	$(function() {
		$('.show_menu').click(function(){
				$('.menu').fadeIn();
				$('.show_menu').fadeOut();
				$('.hide_menu').fadeIn();
		});
		$('.hide_menu').click(function(){
				$('.menu').fadeOut();
				$('.show_menu').fadeIn();
				$('.hide_menu').fadeOut();
		});
	});
  });
</script>
<!-----pop up
<script type="text/javascript" src="js/jquery.reveal.js"></script>
<link rel="stylesheet" href="css/reveal.css">
<!-----pop up ned------>
	
<link rel="stylesheet" href="default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="slider.css" type="text/css" media="screen" />
	
	
		<script  type='text/javascript'>
function validate(){
 var uname=document.getElementById('name').value;
var emailid=document.getElementById('email').value;
var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
var contact=document.getElementById('phone').value;
var catsel=document.getElementById('class');
 var strcat = catsel.options[catsel.selectedIndex].value;
  var upass=document.getElementById('pass').value;
       
	if(uname==""){

		alert("Please Enter a Name");

		return false;

	}
	
	if(emailid==""){

		alert("Please Enter Your emailaddress");

		return false;

	}
	if(!emailid.match(format))

	{

	alert("You have entered an wrong email address!"); 
	return false;
    

	}
	
	if(contact==""){

		alert("Please Enter Your contactno");

		return false;

	}
	if(contact.length<10){

		alert("Please Enter 10 digit phonenumber");

		return false;

	}
	if(contact.length>10){

		alert("Please Enter 10 digit phonenumber");

		return false;

	}
	 if(strcat==0)
            {
              alert("Please Choose a Class");
			return false;
           }
	if(upass==""){

		alert("Please Enter Password");

		return false;

	}

	
}
</script>
  <script  type='text/javascript'>

function numberonly()

{

	var contact=document.getElementById('phone').value;

	if(isNaN(contact)|| contact.indexOf(" ")!=-1)

	{

              			alert("Enter numeric value");

			return false;

    }

}

</script>
<script>
<?php
if($mess){
?>
alert('<?= $mess ?>');
<?php
}
?>
</script>
<script language=JavaScript>
var message="Function Disabled!";
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}
function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}
if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}
document.oncontextmenu=new Function("alert(message);return false")
</script>
<style>
      #rank{ color: #104673; font-family: arial;}
      #rankphoto{ color: #104673; font-family: arial;}
</style>
</head>
<body style="background:#ccc; background:url(images/bg04.png) repeat #ccc;">
 <!--------------top bar -------->
 <div id="top_bar"  style="display: none;">
 		<div id="top_box">
		
		</div>
 </div>
 <!--------------top bar end-------->

 <!--------------header bar -------->
<div id="header">
		<?php include_once('topbar.php');?>
</div>
<!----pop up------>
<div id="myModal" class="reveal-modal" style="width:400px;">
		<h1 style="font-size:20px;">Create Account</h1>
		<form name="creataccount" action="creataction.php" method="post" onsubmit="return validate();">
		<table style="width:100%; height:250px; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#333;">
				<tr>
						<td>Name (login id)</td>
						<td><input type="text" name="name" id="name"  class="form2"/></td>
				</tr>
				<tr>
						<td>Email</td>
						<td><input type="text" name="email" id="email"  class="form2"/></td>
				</tr>
				<tr>
						<td>Contact</td>
						<td><input type="text" name="phone" id="phone" class="form2" onkeyup="return numberonly();"/></td>
				</tr>
				<tr>
						<td>Class</td>
						<td>
						<select  name="class" id="class"  class="form2" style="height:28px; width:295px; padding:0px;">
						<option value="0">select</option>
						<?php
						$sqlcls=mysql_query("select * from `student_class`");
						while($rescls=mysql_fetch_array($sqlcls)){
						?>
						<option value="<?php echo $rescls['id'];?>"><?php echo $rescls['class'];?></option>
						<?php
						}
						?>
						</select>
						<!--<input type="text" name="class" id="class"  class="form2"/>-->
						</td>
				</tr>
				<tr>
						<td>Password</td>
						<td><input type="password" name="pass" id="pass" class="form2"/></td>
				</tr>

				<tr>
						<td>
								<input type="submit" name="button" value="Log In" class="button1" style="background:#69a4ce; border-radius:3px; border:1px solid #5589b0;"/>
						</td>
				</tr>
		</table>
		<a class="close-reveal-modal">&#215;</a>
		</form>
</div>
<!----pop up end------>

 <!--------------header bar end -------->
  
  <!--------------menu bar -------->

   				<?php include_once('menubar.php'); ?>

<!--------------menu bar end -------->  
  
   <!--------------banner bar --------> 
 <div id="banner-bar" style="height:350px; margin-top:10px; display:none;">
 		<div id="banner1">
				<div class="slider_container">
		<div class="flexslider">
	      <ul class="slides">
	    	<li>
	    		<a href="http://www.freshdesignweb.com"><img src="images/slider/slide1.jpg" width="980" height="330" alt="" title=""/></a>
	    		<div class="flex-caption">
                     <div class="caption_title_line"><h2>Demo Heaading</h2><p>This is demo text. To be modified with real content later.</p></div>
                </div>
	    	</li>
	    	<li>
	    		<a href="http://www.freshdesignweb.com"><img src="images/slider/slide2.jpg" width="980" height="330" alt="" title=""/></a>
	    		<div class="flex-caption">
                     <div class="caption_title_line"><h2>Demo Heaading</h2><p>This is demo text. To be modified with real content later.This is demo text. To be modified with real content later.</p></div>
                </div>
	    	</li>
	    	<li>
	    		<a href="http://www.freshdesignweb.com"><img src="images/slider/slide3.jpg" width="980" height="330" alt="" title=""/></a>
	    		<div class="flex-caption">
                     <div class="caption_title_line"><h2>Demo Heaading</h2><p>This is demo text. To be modified with real content later.This is demo text. To be modified with real content later.This is demo text. To be modified with real content later.</p></div>
                </div>
	    	</li>
	    	
	    </ul>
	  </div>
   </div>
		</div>
		<div id="banner-box">
				<div id="form-box" style="background:none; border:none;">
						<div class="head3" style="font-weight:normal; text-align:center; margin-left:0px; background:#fff;">
								Join now for FREE
						</div>
						<form name="creatacc" action="creataction.php" method="post">
						<div id="form-box2" style="background:#fff;">
								<table id="form-table">
										<tr>
												<td colspan="4"><input type="text" name="name" value="" placeholder="Name" class="form" required/></td>
										</tr>
										<tr>
												<td colspan="4"><input type="text" name="email" value="" placeholder="Email" class="form" required/></td>
										</tr>
											<tr>
												<td colspan="4"><input type="text" name="phone" value="" placeholder="Phone" class="form" required/></td>
										</tr>
										<tr>
												<td colspan="4"><input type="text" name="class" value="" placeholder="Class" class="form" required/></td>
										</tr>
										<tr>
												<td colspan="4"><input type="password" name="pass" value="" placeholder="password" class="form" required/></td>
										</tr>
										<!--<tr>
												<td colspan="4"><select class="form"><option>Select</option></select></td>
										</tr>-->
										
										<tr>
												<td colspan="4"><input type="submit" name="button" value="Join Now" class="button" /></td>
										</tr>
								</table>
						</form>
		  </div>
						<div style="width:100%; height:50px; float:left; background:#000; background:url(image/bg1.png) no-repeat;">
						
						</div>
   </div>
</div>
 </div> 
  <!--------------banner bar end-------->
   
<!--------------text line bar-------->
<div id="textline_bar" style="display:none;">
		<div id="textline_box">
				<p class="text" style="color:#fff; margin-left:60px; margin-top:10px; float:left; font-style:italic; "><img src="image/img2.jpg" style="float:left; border-radius:70px;"/>
				<span style="margin-top:25px; float:left; margin-left:10px;">This is demo text. To be modified with real content later.<br /> This is demo text. To be modified with real content later.This is demo text. To be modified with real content later.</span> </p>
		</div>
</div>
<!--------------text line end-------->

<!--------------hover box-------->
<div id="hover_bar" style="display:none;">
		<div id="hover_box">
				<div id="hover_box2">
				<section class="section products-section">
		<div class="products-container wrapper" style="background:none; margin-bottom:0px;">
			<style type="text/css" scoped="scoped">
				ul#product-menu li { width: 151px }
			</style>

			<ul class="product-menu clearfix clear five" id="sti-menu">
				<li>
					<a href="http://preview.ait-themes.com/drivingschool/wp1/price-list-of-courses/">
						<h3 class="product-item" data-type="mText">Heading Here</h3>
						<div class="rotate-holder">
						<span class="product-alternative-text">1</span>
						</div>
						<span class="product-icon product-item" data-type="icon">
							<span class="icon-img" style="background: url('http\:\/\/preview\.ait-themes\.com\/drivingschool\/wp1\/wp-content\/uploads\/driving-theory4\.jpg') no-repeat center center"></span>
						</span>
					</a>
				</li>
				<li>
					<a href="http://preview.ait-themes.com/drivingschool/wp1/price-list-of-courses/">
						<h3 class="product-item" data-type="mText">Heading Here</h3>
						<div class="rotate-holder">
						<span class="product-alternative-text">2</span>
						</div>
						<span class="product-icon product-item" data-type="icon">
							<span class="icon-img" style="background: url('http\:\/\/preview\.ait-themes\.com\/drivingschool\/wp1\/wp-content\/uploads\/first-aid\.jpg') no-repeat center center"></span>
						</span>
					</a>
				</li>
				<li>
					<a href="http://preview.ait-themes.com/drivingschool/wp1/price-list-of-courses/">
						<h3 class="product-item" data-type="mText">Heading Here</h3>
						<div class="rotate-holder">
						<span class="product-alternative-text">3</span>
						</div>
						<span class="product-icon product-item" data-type="icon">
							<span class="icon-img" style="background: url('http\:\/\/preview\.ait-themes\.com\/drivingschool\/wp1\/wp-content\/uploads\/test-drive1\.jpg') no-repeat center center"></span>
						</span>
					</a>
				</li>
				<li>
					<a href="http://preview.ait-themes.com/drivingschool/wp1/price-list-of-courses/">
						<h3 class="product-item" data-type="mText">Heading Here</h3>
						<div class="rotate-holder">
						<span class="product-alternative-text">4</span>
						</div>
						<span class="product-icon product-item" data-type="icon">
							<span class="icon-img" style="background: url('http\:\/\/preview\.ait-themes\.com\/drivingschool\/wp1\/wp-content\/uploads\/examination\.jpg') no-repeat center center"></span>
						</span>
					</a>
				</li>
				<li>
					<a href="http://preview.ait-themes.com/drivingschool/wp1/price-list-of-courses/">
						<h3 class="product-item" data-type="mText">Heading Here</h3>
						<div class="rotate-holder">
						<span class="product-alternative-text">5</span>
						</div>
						<span class="product-icon product-item" data-type="icon">
							<span class="icon-img" style="background: url('http\:\/\/preview\.ait-themes\.com\/drivingschool\/wp1\/wp-content\/uploads\/happy-driver\.jpg') no-repeat center center"></span>
						</span>
					</a>
				</li>
			</ul>
		</div>
	</section>
		<div id="shadowbox">
				<img src="image/big_shadow.png" style=" width:100%;"/>
			</div>
		</div>
</div>
</div>
<!--------------hover box end-------->
 
 <!--------------content---------> 
  <div id="content-menubar" style="display:none;">
		<div id="content-menu">
				<ul>
						<li>
								<h2 class="head1">Study</h2>
								<p class="text">Videos, Animations and</p>
						</li>
						<li>
								<h2 class="head1">Test</h2>
								<p class="text">Videos, Animations and</p>
						</li>
						<li>
								<h2 class="head1">Revise</h2>
								<p class="text">Videos, Animations and</p>
						</li>
						<li>
								<h2 class="head1">Subject</h2>
								<p class="text">Videos, Animations and</p>
						</li>
						<li>
								<h2 class="head1">Boards</h2>
								<p class="text">Videos, Animations and</p>
						</li>
						<li>
								<h2 class="head1">Study</h2>
								<p class="text">Videos, Animations and</p>
						</li>
				</ul>
		</div>
 </div>
 
 <div id="content-bar">
 		<div id="content">
				<div class="content-box">
				  <div class="content-box">
								<div class="content-left">
										<div style="width:100%; height:auto; float:left; min-height:250px;">
										<div style="width: 100%; height: auto;">
										   <!-- <p class="text"> We are pleased to announce the winners of our last quiz who made it to the list of top performers. We also award students for improvement in scores. Congratulations to all</p>-->
										<p class="text">We are pleased to announce that we had conducted the first Quiz in Bhubaneswar on December 28, 2014. We thank all the participants. Mr.Suman Acharya, Student Class IX of DAV Chandrashekharpur is the proud winner of the contest winning a handsome cash prize. We wish him all the best for future endeavor.</p>
										</div>
										<?php
										$fetch=mysql_query("select * from `halloffame_image`");
										while($res=mysql_fetch_array($fetch))
										{
										?>
										<div style="width: 70%; float: left; height: auto;"><br /><br />
                                        <div style="float: left;">
										 <img src="../<?php echo $res['image'];?>" width="165" height="200" style=" border:2px solid #ccc;"/>
                                         </div>
                                         <div style="float: left;">  <br /><br />
                                           &nbsp;&nbsp;&nbsp; <span id="rank"><?php echo $res['rank'];?> Rank</span><br /><br />
										   &nbsp;&nbsp;&nbsp; <span id="rankphoto"><?php echo $res['name'];?></span>
										 </div>   
										</div><br /><br />
										<?php }?>
										</div>
										<div class="content-rightbox1" style=" width:94%; display:none;">
												<div class="content-rightbox2" style="width:96%;">
														<img src="image/img5.jpg" width="165" style=" border:2px solid #ccc;"/>
														<img src="image/img6.jpg" width="184" style="margin-left:4px; border:2px solid #ccc;"/>
														<img src="image/img7.jpg" width="184" style="margin-left:4px; border:2px solid #ccc;"  />
												</div>
										</div>
								</div>
								
								<div class="content-right">
										<h1 class="head3" style="margin-top:0px;">&nbsp;</h1>
										<div class="content-rightbox1" style="background-color: #104673;">
												<div class="content-rightbox2">
														<div id="wrapper">
                                                            <div class="slider-wrapper theme-default">
                                                                <div id="slider" class="nivoSlider">
                                                                 <img src="images/play.jpg" data-thumb="images/nemo.jpg" alt="" height="200" width="200"   />
                                                                    <img src="images/deer.jpg" data-thumb="images/up.jpg" alt="" height="200" width="200"  />
                                                                     <img src="images/bird.jpg" data-thumb="images/bird.jpg" height="200" width="200"  alt="" />
                                                                    <img src="images/butterfly.jpg" data-thumb="images/walle.jpg" alt="" height="200" width="200" />
                                                                   
                                                                </div>
                                                               
                                                            </div>

    </div>
    
    <script type="text/javascript" src="scripts/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>	
												</div>
										</div>
								</div>
				  </div>
				</div>
		</div>
 </div>
 <!--------------content bar emd---------> 
 
 <!--------------footer---------> 
 <div id="footer-bar">
 		<div id="footer">
				<ul>
						<li><a href="index.php" class="active"><span>Home</span></a></li>
						<li><a href="feedback.php"><span>Feedback</span></a></li>
						<li><a href="about.php"><span>About</span></a></li>
						<li><a href="services.php"><span>Services</span></a></li>
						<li><a href="contact.php"><span>Contact</span></a></li>
						<li>
							<a href="http://www.facebook.com" target="_blank">
								<img src="image/facebook.png" style="float: left;">
							</a>
							<a href="http://www.youtube.com/watch?v=mPTh8OEBwEo" target="_blank">
								<img src="image/youtube.png" style="float: left;">
							</a>
							<a href="http://www.twitter.com" target="_blank">
								<img src="image/twitter.png" style="float: left;">
							</a>
						</li>
				</ul>
                <p class="copy">Copyright © 2014. All Rights Reserved</p>
		</div>
 </div>
  <!--------------footer end---------> 
  
</body>
</html>
