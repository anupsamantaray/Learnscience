<?php
include_once("function.php");
if(isset($_GET['err']))
{
$mess=$_GET['err'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Learnscience:Makes learning easy & fast</title>
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
	<script type="text/javascript" src="js/jquery-2.0.0.min.js"></script>
	
  
    <!-- FlexSlider -->
    
   <link rel="stylesheet" type="text/css" href="css/styles.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="js/jquery.easing-1.3.js"></script>
  <script type="text/javascript" charset="utf-8" src="js/jquery.iosslider.min.js"></script>
    
    <script type="text/javascript" src="scripts/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
	 <link rel="stylesheet" href="default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="slider.css" type="text/css" media="screen" />
    <script  type='text/javascript'>
function valid(){
   var jname=document.getElementById('jname').value;
var jemail=document.getElementById('jemail').value;
var jphone=document.getElementById('jphone').value;
var forma = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(jname==""){
		alert("Please Enter Your name");
		return false;
	}
if(jemail=="")
{
		alert("Please Enter Your emailaddress");
		return false;
}
	if(!jemail.match(forma))
	{
	alert("You have entered an wrong email address!"); 
	return false;
	}
	if(jphone==""){
		alert("Please Enter Your phone number");
		return false;
	}
	if(isNaN(jphone)|| jphone.indexOf(" ")!=-1)

	{
               alert("Enter numeric value");
	    return false;
	 }
	
}
    </script>
<script  type='text/javascript'>
function validate(){
 var uname=document.getElementById('name').value;
var emailid=document.getElementById('email').value;
var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
var contact=document.getElementById('phone').value;
var catsel=document.getElementById('class');
 var strcat = catsel.options[catsel.selectedIndex].value;
  var upass=document.getElementById('pass').value;
   var confirm=document.getElementById('confirm').value;
       
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
	if(confirm==""){

		alert("Please Confirm Password");

		return false;

	}
	
   if(confirm!=upass){

		alert("Please Enter Correct Password");

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
</head>
<body style="background:#ccc; background:url(images/bg04.png) repeat #ccc;">
 <!--------------top bar --------->
 <div id="top_bar" style="display: none;">
 		<div id="top_box">
		
		</div>
 </div>
 <!--------------top bar end-------->

 <!--------------header bar -------->
<?php include_once("topbar.php");?>
<!----pop up------>
<div id="myModal" class="reveal-modal" style="width:400px;">
		<h1 style="font-size:20px;">Create Account</h1>
		<form name="creataccount" action="creataction.php" method="post" onsubmit="return validate();">
		<table style="width:100%; height:250px; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#333;">
				<tr>
						<td>Name</td>
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
						<td>School</td>
						<td><input type="text" name="school" id="school" class="form2"/></td>
				</tr>
				<tr>
						<td>City</td>
						<td><input type="text" name="city" id="city" class="form2"/></td>
				</tr>
				<tr>
						<td>Password</td>
						<td><input type="password" name="pass" id="pass" class="form2"/></td>
				</tr>
				<tr>
						<td>Confirm Pwd</td>
						<td><input type="password" name="confirm" id="confirm" class="form2"/></td>
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
 <div id="banner-bar" style="height:350px; margin-top:0px;">
 		<div id="banner1">
				<div class="sliderContainer">
                        <div class="iosSlider">
                            <div class="slider">
                                
                                <div class="item item1">
                                    <div class="inner">
                                        <div class="text2"><span style="font-size:30px; line-height:1.4; color:#125eb7; text-shadow:1px 1px 1px #000; font-weight:bold; font-family: 'open_sans_condensedbold';">Best teacher support.</span></div>
                                    </div>
                                </div>
                                
                                <div class="item item1">
                                    <div class="inner">
                                        <div class="text2"><span style="font-size:30px; line-height:1.4; color:#ee8f03; text-shadow:1px 1px 1px #000; font-weight:bold; font-family: 'open_sans_condensedbold';">Learn the smart<br /> and quick way.</span></div>
                                    </div>
                                </div>
                                
                                 <div class="item item1">
                                    <div class="inner">
                                        <div class="text2"><span style="font-size:30px; line-height:1.4; color:#e20626; text-shadow:1px 1px 1px #000; font-weight:bold; font-family: 'open_sans_condensedbold';">Win prizes.</span></div>
                                    </div>
                                </div>
                                
                                <div class="item item1">
                                    <div class="inner">
                                        <div class="text2"><span style="font-size:30px; line-height:1.4; color:#125eb7; text-shadow:1px 1px 1px #000; font-weight:bold; font-family: 'open_sans_condensedbold';">Customised quentions and<br /> content for each student.</span></div>
                                    </div>
                                </div>
                                
                            </div>
                
                        
                        <div class="slideSelectors" style="margin-left:500px;">
                            <div class="item selected"></div>
                            <div class="item"></div>
                            <div class="item"></div>
                            <div class="item"></div>
                            <div class="item"></div>
                        </div>
                    </div>
                </div>
                
		</div>
        
		<div id="banner-box">
				<div id="form-box" style="border:none;">
						<div class="head3" style="font-weight:normal; text-align:center; margin-left:0px; background:#fff;">
								<span><img src="images/image.gif" style="float: left; margin-left: 25px; margin-top:5px; width:100px;"/></span>
								  <span style="float: left; margin-left: 5px;">for FREE</span>
						</div>
						<form name="join" action="joinaction.php" method="post" onsubmit="return valid();">
						<div id="form-box2" style="background:#fff;">
								<table id="form-table">
										<tr>
												<td colspan="4"><input type="text" name="jname" id="jname" value="" placeholder="Name" class="form"/></td>
										</tr>
										<tr>
												<td colspan="4"><input type="text" name="jemail" id="jemail" value="" placeholder="Email" class="form"/></td>
										</tr>
											<tr>
												<td colspan="4"><input type="text" name="jphone" id="jphone" value="" placeholder="Phone" class="form"/></td>
										</tr>
										
										<!--<tr>
												<td colspan="4"><select class="form"><option>Select</option></select></td>
										</tr>-->
										
										<tr>
												<td colspan="4"><input type="submit" name="submit" value="Join Now" class="button" /></td>
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
  
  
   <div style="width:100%; height:auto; float:left;">
    		<div style="width:1000px; margin:auto; background:#000; padding-top:3px; padding-bottom:3px; color:#fff; font-size:14px; font-family:Arial, Helvetica, sans-serif; padding-left:10px;">
            		 India's only website for quick and easy learning !
            </div>
   </div>
   
<!--------------text line bar-------->
<div id="textline_bar">
		<div id="textline_box">
				<p class="text" style="color:#fff; margin-left:60px; margin-top:10px; float:left; font-style:italic; "><img src="image/img2.jpg" style="float:left; border-radius:70px;"/>
				<span style="margin-top:25px; float:left; margin-left:10px; font-size:20px;">I learnt chapters in just a few minutes. <br />Its so easy with EasyLearn !</span> </p>
		</div>
</div>
<!--------------text line end-------->
<style>
.hover_box{ width:150px; height:auto; float:left; text-align:center; font-family:Arial, Helvetica, sans-serif; background:#3399cc; color:#fff; position:absolute; z-index:999; padding-top:10px; padding-bottom:10px; margin-top:110px;}
</style>
<!--------------hover box-------->
<div id="hover_bar">
		<div id="hover_box">
				<div id="hover_box2">
				<section class="section products-section">
		<div class="products-container wrapper" style="background:none; margin-bottom:0px;" align="center">
			<style type="text/css" scoped="scoped">
				ul#product-menu li { width: 151px }
			</style>

			<ul class="product-menu clearfix clear five" id="sti-menu">
				<li>
					<a href="courses/wil_index.php?id=old">
						<h1 class="hover_box">Sample Questions</h1>
						<!--<div class="rotate-holder">
						<span class="product-alternative-text">1</span>
						</div>-->
						<span class="product-icon product-item" data-type="icon">
							<span class="icon-img" style="background: url('images/1.jpg') no-repeat center center"></span>
						</span>
					</a>
				</li>
				<li>
					<a href="courses/wil_index.php?id=ebook">
						<h1 class="hover_box">Ebook</h1>
						<!--<div class="rotate-holder">
						<span class="product-alternative-text">2</span>
						</div>-->
						<span class="product-icon product-item" data-type="icon">
							<span class="icon-img" style="background: url('images/2.jpg') no-repeat center center"></span>
						</span>
					</a>
				</li>
				<li>
					<a href="courses/wil_index.php?id=video">
						<h1 class="hover_box">Video</h1>
						<!--<div class="rotate-holder">
						<span class="product-alternative-text">3</span>
						</div>-->
						<span class="product-icon product-item" data-type="icon">
							<span class="icon-img" style="background: url('images/5.jpg') no-repeat center center"></span>
						</span>
					</a>
				</li>
			        <!--<li>
					<a href="courses/wil_index.php">
						<h3 class="product-item" data-type="mText">Subject</h3>
						<!--<div class="rotate-holder">
						<span class="product-alternative-text">4</span>
						</div>
						<span class="product-icon product-item" data-type="icon">
							<span class="icon-img" style="background: url('images/4.jpg') no-repeat center center"></span>
						</span>
					</a>-->
				</li>
			</ul>
		</div>
	</section>
		<div id="shadowbox">
				<img src="image/big_shadow.png" style=" width:100%;"/>
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
										<div style="width:100%; height:auto; float:left;">
										<h1 class="head3" style="margin-top:0px; margin-bottom:20px;">Welcome to School.</h1>
										<p class="text" style="line-height:1.6;">
										<img src="image/img3.jpg" style="float:left; margin-right:10px; border:2px solid #c7c7c7;"/>
										We are a dedicated team of professionals who want to make learning easy, simple and fun for school kids. Based out of Bhubaneswar with Offices in Bangalore & Mumbai we leverage technology to develop superior products & services that benefit our customers in an enlightening way. We are supported by an Odisha based NGO named GyanTarang which endeavours to improve the spread of education through new age technology. 
										</p>
										</div>
										<div class="content-rightbox1" style=" width:94%; background-color: #104673;">
												<div class="content-rightbox2" style="width:96%;">
														<h1 class="head3" style=" padding:0px; margin-left:0px; height:50px;">Latest News</h1>
												<!--<div>-->
												   <marquee direction="up" scrollamount="2">
												      <?php
												   $fetch=mysql_query("select * from `news`");
												   while($res=mysql_fetch_array($fetch))
												   { ?>
												   <a href="<?php echo $res['link'];?>">
												   <?php
												    echo html_entity_decode($res['news'])."</br>"; }?></a>
												   </marquee>
												<!--</div>-->
												
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
						<li><a href="http://www.facebook.com" target="_blank"><img src="image/facebook.png" style="float: left;  margin-top: 5px;"></a><a href="http://www.youtube.com/watch?v=mPTh8OEBwEo" target="_blank"><img src="image/youtube.png" style="float: left; margin-left: 5px;margin-top: 5px;"></a><a href="http://www.twitter.com" target="_blank"><img src="image/twitter.png" style="float: left;margin-left: 5px; margin-top: 5px;"></a></li>
						<li style="color: white;">Guest number<?php include_once("counter.php");?></li>
				</ul>
                <p class="copy">Copyright © 2014. All Rights Reserved</p>
		</div>
 </div>
  <!--------------footer end---------> 
  <script type="text/javascript">
$(document).ready(function() {
	
	$('.iosSlider').iosSlider({
		desktopClickDrag: true,
		snapToChildren: true,
		navSlideSelector: '.sliderContainer .slideSelectors .item',
		onSlideComplete: slideComplete,
		onSliderLoaded: sliderLoaded,
		onSlideChange: slideChange,
		scrollbar: false,
		autoSlide: true,
		autoSlideTimer: 3000,
    infiniteSlider: true
	});
	
});

function slideChange(args) {
			
	$('.sliderContainer .slideSelectors .item').removeClass('selected');
	$('.sliderContainer .slideSelectors .item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');

}

function slideComplete(args) {
	
	if(!args.slideChanged) return false;
	
	$(args.sliderObject).find('.text1, .text2').attr('style', '');
	
	$(args.currentSlideObject).find('.text1').animate({
		right: '100px',
		opacity: '0.8'
	}, 400, 'easeOutQuint');
	
	$(args.currentSlideObject).find('.text2').delay(200).animate({
		right: '350px',
		opacity: '0.8'
	}, 400, 'easeOutQuint');
	
}

function sliderLoaded(args) {
		
	$(args.sliderObject).find('.text1, .text2').attr('style', '');
	
	$(args.currentSlideObject).find('.text1').animate({
		right: '100px',
		opacity: '0.8'
	}, 400, 'easeOutQuint');
	
	$(args.currentSlideObject).find('.text2').delay(200).animate({
		right: '350px',
		opacity: '0.8'
	}, 400, 'easeOutQuint');
	
	slideChange(args);
	
}
</script>
</body>
</html>
