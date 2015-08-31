<?php
include_once('function.php');
?>
<html>
    <head>
	<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Custom Login Form Styling</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
			<link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/login.css" />
		<script src="js/modernizr.custom.63321.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
		    @font-face {
    font-family: 'dobkin_scriptregular';
    src: url('dobkinscript-webfont.eot');
    src: url('dobkinscript-webfont.eot?#iefix') format('embedded-opentype'),
         url('dobkinscript-webfont.woff') format('woff'),
         url('dobkinscript-webfont.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;

}
		</style>
    </head>
    <body style="background: #fff;">
	
	<div class="container" style="margin-top: 200px;">
		
		<div style="width:400px; height: 350px; margin:auto; padding: 10px; background:url(images/bg-header.png) no-repeat; background-size: 100% 100%;-webkit-box-shadow: 0 10px 6px -6px black;
	   -moz-box-shadow: 0 10px 6px -6px black;
	        box-shadow: 0 10px 6px -6px black; border-radius:10px;">
			<!--<h1 style="text-align: center; color: #fff; font-size:46px; font-weight:normal; font-family: 'dobkin_scriptregular';">Login Here</h1>-->
			<h1 style="text-align: center; color: #fff; font-size:46px; font-weight:normal; font-family: 'arieal';">Login Here</h1>
          
			
			
			
			<section class="main" style="margin-top: 0px;">
				<form name="f" class="form-1"  method="post" action="login_action.php">
					<p class="field">
						<input type="text" name="usrname" placeholder="Email">
						<i class="icon-user icon-large"></i>
					</p>
						<p class="field">
							<input type="password" name="pass" placeholder="Password">
							<i class="icon-lock icon-large"></i>
					</p>
					<p class="submit">
						<a href="index.php"><button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button></a>
		
					</p>
					<?php if(isset($_GET['msg'])){?>
					<div style="width:100%; border:1px solid #dddddd; border-top:none; height: auto; float: left;padding: 7px; margin-top: 10px; color: #06598a; text-align: center; border-bottom-left-radius:5px; -moz-border-bottom-left-radius:5px; border-bottom-right-radius:5px; -moz-border-bottom-right-radius:5px; background: #efefef;">
					    <p><?php echo $msg=$_GET['msg'];?></p>
					</div><?php }?>
					<?php if($err!=""){ ?>
					<div style="width:100%; border:1px solid #dddddd; border-top:none; height: auto; float: left;padding: 7px; margin-top: 10px; color: #06598a; text-align: center; border-bottom-left-radius:5px; -moz-border-bottom-left-radius:5px; border-bottom-right-radius:5px; -moz-border-bottom-right-radius:5px; background: #efefef;">
					    <p><?php echo $err;?></p>
					</div><?php }?>
				</form>
			</section>
			
			</div>
			
        </div>
	<div style="width:149px; height: 148px; float: left; position: absolute; text-align: center; top:0px; right:0px; font-size:16px; background: url(homebg.jpg); background-size: 100% 100%;">
	    <a href="index.php"><img src="images/home.png" style="margin-top: 8px;"/><br/></a>
	    Back to Home  
	</div>  
    </body>
</html>
