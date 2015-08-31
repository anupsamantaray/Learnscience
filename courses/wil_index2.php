<?php
include_once("../function.php");
if($_GET['id']){
$id=$_GET['id'];
 }else
 {
 $id=7;
 }
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>..:Learnscience:Makes learning easy & fast:..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" type="text/css" rel="stylesheet" media="screen" />
<style>

.h5_class{
	border: 1px solid #CCCCCC;
padding: 20px;
border-radius: 5px;
/*box-shadow: 3px 3px 5px 5px #CCCCCC;*/
margin-top:10px;
}

 #cssmenu,
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul li a {
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  line-height: 1;
  display: block;
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
#cssmenu {
  width: 760px;
  font-family: Helvetica, Arial, sans-serif;
  color: #ffffff;
  margin-top: 15px;
}
#cssmenu ul ul {
  display: none;
}
.align-right {
  float: right;
}
#cssmenu > ul > li > a {
  padding: 10px 20px;
  border-left: 1px solid #1682ba;
  border-right: 1px solid #1682ba;
  border-top: 1px solid #1682ba;
  cursor: pointer;
  z-index: 2;
  font-size: 16px;

  text-decoration: none;
  color: #f2920c;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.35);
  background: #36aae7;
  background: -webkit-linear-gradient(#36aae7, #1fa0e4);
  background: -moz-linear-gradient(#36aae7, #1fa0e4);
  background: -o-linear-gradient(#36aae7, #1fa0e4);
  background: -ms-linear-gradient(#36aae7, #1fa0e4);
  background: linear-gradient(#36aae7, #1fa0e4);
  background: url(images/menubg.jpg) repeat-x;
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15);
}
#cssmenu > ul > li > a:hover,
#cssmenu > ul > li.active > a,
#cssmenu > ul > li.open > a {
  color: #fff;
  background: #1fa0e4;

  background: url(images/menubg.jpg) repeat-x;
}
#cssmenu > ul > li.open > a {
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.15);
  border-bottom: 1px solid #32373e;
}
#cssmenu > ul > li:last-child > a,
#cssmenu > ul > li.last > a {
  border-bottom: 1px solid #32373e;
}
.holder {
  width: 0;
  height: 0;
  position: absolute;
  top: 0;
  right: 0;
}
.holder::after,
.holder::before {
  display: block;
  position: absolute;
  content: "";
  width: 6px;
  height: 6px;
  right: 20px;
  z-index: 10;
  -webkit-transform: rotate(-135deg);
  -moz-transform: rotate(-135deg);
  -ms-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  transform: rotate(-135deg);
}
.holder::after {
  top: 10px;
  border-top: 2px solid #ffffff;
  border-left: 2px solid #ffffff;
}
#cssmenu > ul > li > a:hover > span::after,
#cssmenu > ul > li.active > a > span::after,
#cssmenu > ul > li.open > a > span::after {
  border-color: #eeeeee;
}
.holder::before {
  top: 10px;
  border-top: 2px solid;
  border-left: 2px solid;
  border-top-color: inherit;
  border-left-color: inherit;
}
#cssmenu ul ul li a {
  cursor: pointer;
  border-bottom: 1px solid #32373e;
  border-left: 1px solid #32373e;
  border-right: 1px solid #32373e;
  padding: 10px 20px;
  z-index: 1;
  text-decoration: none;
  font-size: 14px;
  color: #fff;
background: rgb(255,183,107); /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmYjc2YiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUwJSIgc3RvcC1jb2xvcj0iI2ZmYTczZCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZjdjMDAiIHN0b3Atb3BhY2l0eT0iMSIvPgogICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjZmY3ZjA0IiBzdG9wLW9wYWNpdHk9IjEiLz4KICA8L2xpbmVhckdyYWRpZW50PgogIDxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjZ3JhZC11Y2dnLWdlbmVyYXRlZCkiIC8+Cjwvc3ZnPg==);
background: -moz-linear-gradient(left, rgba(255,183,107,1) 0%, rgba(255,167,61,1) 50%, rgba(255,124,0,1) 100%, rgba(255,127,4,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(255,183,107,1)), color-stop(50%,rgba(255,167,61,1)), color-stop(100%,rgba(255,124,0,1)), color-stop(100%,rgba(255,127,4,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(left, rgba(255,183,107,1) 0%,rgba(255,167,61,1) 50%,rgba(255,124,0,1) 100%,rgba(255,127,4,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(left, rgba(255,183,107,1) 0%,rgba(255,167,61,1) 50%,rgba(255,124,0,1) 100%,rgba(255,127,4,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(left, rgba(255,183,107,1) 0%,rgba(255,167,61,1) 50%,rgba(255,124,0,1) 100%,rgba(255,127,4,1) 100%); /* IE10+ */
background: linear-gradient(to right, rgba(255,183,107,1) 0%,rgba(255,167,61,1) 50%,rgba(255,124,0,1) 100%,rgba(255,127,4,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffb76b', endColorstr='#ff7f04',GradientType=1 ); /* IE6-8 */
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
}
#cssmenu ul ul li:hover > a,
#cssmenu ul ul li.open > a,
#cssmenu ul ul li.active > a {
  background: #424852;
  color: #ffffff;
}
#cssmenu ul ul li:first-child > a {
  box-shadow: none;
}
#cssmenu ul ul ul li:first-child > a {
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
}
#cssmenu ul ul ul li a {
  padding-left: 30px;
}
#cssmenu > ul > li > ul > li:last-child > a,
#cssmenu > ul > li > ul > li.last > a {
   border-bottom: 1px solid #32373e;
}
#cssmenu > ul > li > ul > li.open:last-child > a,
#cssmenu > ul > li > ul > li.last.open > a {
  border-bottom: 1px solid #32373e;
}
#cssmenu > ul > li > ul > li.open:last-child > ul > li:last-child > a {
  border-bottom: 1px solid #32373e;
}
#cssmenu ul ul li.has-sub > a::after {
  display: block;
  position: absolute;
  content: "";
  width: 5px;
  height: 5px;
  right: 20px;
  z-index: 10;
  top: 11.5px;
  border-top: 2px solid #eeeeee;
  border-left: 2px solid #eeeeee;
  -webkit-transform: rotate(-135deg);
  -moz-transform: rotate(-135deg);
  -ms-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  transform: rotate(-135deg);
}
#cssmenu ul ul li.active > a::after,
#cssmenu ul ul li.open > a::after,
#cssmenu ul ul li > a:hover::after {
  border-color: #ffffff;
}




.quizzes{
	font-family: arial;
	float:right;
	padding-right:20px;
}
.quizzes a{
	color:blue;
	text-decoration:none;
}
.quizzes a:hover{
	text-decoration:underline;
}




.modalDialog {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.8);
	z-index: 99999;
	opacity:0;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	pointer-events: none;
}

.modalDialog:target {
	opacity:1;
	pointer-events: auto;
}

.modalDialog > div {
	width: 400px;
	position: relative;
	margin: 10% auto;
	padding: 5px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
	background: -moz-linear-gradient(#fff, #999);
	background: -webkit-linear-gradient(#fff, #999);
	background: -o-linear-gradient(#fff, #999);
}

</style>

<script type='text/javascript' src="js/latest.min.js"></script>
 <script src="script.js"></script>
<script type='text/javascript' src="js/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" href="reveal.css">	
<script type="text/javascript" src="jquery.reveal.js"></script>
<script type="text/javascript">
function getval(clsval)
            {
             window.location.href = 'wil_index1.php?id='+clsval;
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
					//alert(video);
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
			function getpopup(tot)
			{
			alert("Mark secured  ("+tot+"). Thank you for attending the quiz.Please register to gain access on more contents.");
			window.location.href="../index.php";
			}
</script>
</head>
<body>
<?php include_once('header.php');
                  $tot=0;
                  if(isset($_POST['submit']))
                  {
                   $n1=$_REQUEST['1'];
                   $nh1=$_REQUEST['h1'];
                   if($n1==$nh1){$tot=$tot+1;}
                   $n2=$_REQUEST['2'];
                   $nh2=$_REQUEST['h2'];
                   if($n2==$nh2){$tot=$tot+1;}
                   $n3=$_REQUEST['3'];
                   $nh3=$_REQUEST['h3'];
                   if($n3==$nh3){$tot=$tot+1;}
                   $n4=$_REQUEST['4'];
                   $nh4=$_REQUEST['h4'];
                   if($n4==$nh4){$tot=$tot+1;}
                   $n5=$_REQUEST['5'];
                   $nh5=$_REQUEST['h5'];
                   if($n5==$nh5){$tot=$tot+1;}
                   $n6=$_REQUEST['6'];
                   $nh6=$_REQUEST['h6'];
                   if($n6==$nh6){$tot=$tot+1;}
                   $n7=$_REQUEST['7'];
                   $nh7=$_REQUEST['h7'];
                   if($n7==$nh7){$tot=$tot+1;}
                  ?>
                  <script>getpopup(<?php echo $tot;?>)</script>
                  <?php }?>
    <div id="container">
        <div id="container_content">
            <div id="page">
                <div id="container_left">
                    <div class="heading">
                        <h3>All Class</h3>
                        
                    </div>
		      <ul style="margin-left: 0px; padding: 5px;">
			<?php
			$fet=mysql_query("select * from `student_class`");
			while($res=mysql_fetch_array($fet))
			{
			 if($res['class']=='x'){
			?>
                        <li class="list active">
                            <img src="images/arrow.png" style="float: left; margin-right: 5px;" />
							<span class="sp" style="color:#0070B0;" onClick="return getval(<?php echo $res['id'];?>)">Class <?php echo $res['class'];?></span>
                        </li><?php }else{?>
			
			 <li class="list">
                            <img src="images/arrow.png" style="float: left; margin-right: 5px;" />
							<span class="sp" style="color:#666;" onClick="return getval(<?php echo $res['id'];?>)">Class <?php echo $res['class'];?></span>
                        </li>
			<?php }
			}?>
                    </ul>
                </div>
                <div id="container_right" class="t1">
		 <div id='cssmenu'>
                  <h5 class="h5_class" style="color: blue; font-size: 15px;">
                   Our quiz enables students to learn at different levels of difficulty and adjust their pace of learning. Our Software Quisy would be launched soon...this software understands a students responses in the quiz and tells a student what exactly he needs to learn
                  </h5>
                  <form name="f" action="will_index2_action.php" method="post">
		    <table>
            		<tr>
                   		 <td align="right"> For more quizzes <a href="#openModal" style="color:blue;">Click Here</a></td>
                    </tr>
                     <tr>
                      <td>1.     Directions A person throws a ball vertically upward with an initial velocity of 15 m/s.How long the ball is in air before it comes to his hand?</td>
                     </tr>
                     <tr><td><input type="radio" name="1" id="1" value="1">2.0 s</td></tr>
                     <tr><td><input type="radio" name="1" id="1" value="2">1.0 s</td></tr>
                     <tr><td><input type="radio" name="1" id="1" value="3">3.06 s</td></tr>
                     <tr><td><input type="radio" name="1" id="1" value="4">5.01 s</td></tr>
                     <input type="hidden" name="h1" value="1" >
                     <tr>
                      <td>2.     When a body is stationary?</td>
                     </tr>
                     <tr><td><input type="radio" name="2" id="2" value="1">There is no force acting on it</td></tr>
                     <tr><td><input type="radio" name="2" id="2" value="2">The force acting on it not in contact with it</td></tr>
                     <tr><td><input type="radio" name="2" id="2" value="3">The combination of forces acting on it balances each other</td></tr>
                     <tr><td><input type="radio" name="2" id="2" value="4">The body is in vacuum</td></tr>
                      <input type="hidden" name="h2" value="2" >
                     <tr>
                      <td>3.     A fish is swimming upward at an angle of 30 deg with the horizontal. The direction of the force of gravity acting on it is -</td>
                     </tr>
                     <tr><td><input type="radio" name="3" id="3" value="1">upward</td></tr>
                     <tr><td><input type="radio" name="3" id="3" value="2">downward</td></tr>
                     <tr><td><input type="radio" name="3" id="3" value="3">horizontal</td></tr>
                     <tr><td><input type="radio" name="3" id="3" value="4">at an angle upward </td></tr>
                     <input type="hidden" name="h3" value="3" >
                     <tr>
                      <td>4.     Condensation and evaporation are:</td>
                     </tr>
                     <tr><td><input type="radio" name="4" id="4" value="1">Irreversible change </td></tr>
                     <tr><td><input type="radio" name="4" id="4" value="2">Reversible change</td></tr>
                     <tr><td><input type="radio" name="4" id="4" value="3">Desirable change</td></tr>
                     <tr><td><input type="radio" name="4" id="4" value="4">None of these</td></tr>
                     <input type="hidden" name="h4" value="4" >
                     <tr>
                      <td>5.     Solubility is affected by:</td>
                     </tr>
                     <tr><td><input type="radio" name="5" id="5" value="1">Temperature</td></tr>
                     <tr><td><input type="radio" name="5" id="5" value="2">Pressure</td></tr>
                     <tr><td><input type="radio" name="5" id="5" value="3">Both</td></tr>
                     <tr><td><input type="radio" name="5" id="5" value="4">None of these</td></tr>
                     <input type="hidden" name="h5" value="4" >
                     <tr>
                      <td>6.     Schiff's reagent gives pink colour with:</td>
                     </tr>
                     <tr><td><input type="radio" name="6" id="6" value="1">Acetaldehyde</td></tr>
                     <tr><td><input type="radio" name="6" id="6" value="2">Formaldehyde</td></tr>
                     <tr><td><input type="radio" name="6" id="6" value="3">Acetone</td></tr>
                     <tr><td><input type="radio" name="6" id="6" value="4">None of these</td></tr>
                     <input type="hidden" name="h6" value="3" >
                     <tr>
                      <td>7.     Why the dam of water reservoir is thick at the bottom -</td>
                     </tr>
                     <tr><td><input type="radio" name="7" id="7" value="1">Quantity of water increases with depth </td></tr>
                     <tr><td><input type="radio" name="7" id="7" value="2">Density of water increases with depth</td></tr>
                     <tr><td><input type="radio" name="7" id="7" value="3">Pressure of water increases with depth</td></tr>
                     <tr><td><input type="radio" name="7" id="7" value="4">Temperature of water increases with depth</td></tr>
                     <input type="hidden" name="h7" value="2" >
                     <tr><td><input type="submit" name="submit" value="submit"></td></tr>
                    </table>
                  </form>
		 </div>
                </div>
                  <!--<div class="quizzes">For more quizzes <a href="#openModal">click here</a></div>-->
                  <div id="openModal" class="modalDialog">
							<div>
                            <style>
							#cross:link {color:blue;}
							#cross:visited {color: blue;}
							#cross:hover {color: blue;}
							#cross:active {color: blue;}
								
							</style>
									<div align="right" ><span style="text-align:right;"><a  href="#close" id='cross' title="Close" class="close">X</a></span></div>
									<center><h2>Create Account</h2></center>
									<form name="creataccount" action="../creataction.php" method="post" onSubmit="return validate();" enctype="multipart/form-data">
		<table border='0' style="width:100%; height:250px; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#333;">
				<tr>
						<td>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><input type="text" name="name" id="name"  class="form2"/></td>
				</tr>
				<tr>
						<td>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><input type="text" name="email" id="email"  class="form2"/></td>
				</tr>
				<tr>
						<td>Contact &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><input type="text" name="phone" id="phone" class="form2" onKeyUp="return numberonly();"/></td>
				</tr>
				<tr>
						<td>Class &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>
						<select  name="class" id="class"  class="form2" style="height:28px;width:175px ;  padding:0px;">
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
						<td>School &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><input type="text" name="school" id="school" class="form2"/></td>
				</tr>
				<tr>
						<td>City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><input type="text" name="city" id="city" class="form2"/></td>
				</tr>
				<tr>
						<td>Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td> <input type="password" name="pass" id="pass" class="form2"/></td>
				</tr>
				<tr>
						<td>Confirm Pwd &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td> <input type="password" name="confirm" id="confirm" class="form2"/></td>
				</tr>
				<tr>
						<td>Upload Photo</td>
						<td><input type="file" name="fileToUpload" id="fileToUpload" /></td>
				</tr>
				<tr>
						<td colspan='2'>
								<center>&nbsp;&nbsp;<input type="submit" name="button" value="        Log In        " class="button1" style="background:#69a4ce; border-radius:3px; border:1px solid #5589b0;"/></center>
						</td>
				</tr>
		</table>
	<!--	<a class="close-reveal-modal">&#215;</a>-->
		</form>
							</div>

            </div>
        </div>
    </div>
	
   <!-- <div id="myModal" class="reveal-modal">
	<div class="vide">
				
	</div>
	<a class="close-reveal-modal">&#215;</a>
    </div>-->
       <div id="myModal" class="reveal-modal" style="width:400px;">
	<div class="vide">
	 Exams are made easy through unique teaching tools in our website. So Students ..no more fear.. !!
Our educational content is created in a way to improvise the speed and ease of learning by any student of any talent level. Even a weak student can easily cross the exam hurdles by following our education content. A few hours study on our website  in exam time can help you easily pass and excel in the exam.. "			
	</div>
	<a class="close-reveal-modal">&#215;</a>
    </div>
   
   <?php include_once('footer.php')?>
</body>
</html>