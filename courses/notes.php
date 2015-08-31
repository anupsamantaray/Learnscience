<?php
include_once("../function.php");
include_once("../function1.php");
$idd=$_GET['clid'];
$randid=rand(1,10000000)
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
function starttimer()
{
	setInterval(function(){showtime()},5000);
}
function showtime()
{
	var time=document.getElementById('txttimer').value;
	var time=parseInt(time);
	time=time+5;
	document.getElementById('txttimer').value=time;
	//alert("Hello");
	//document.getElementById('txttimer').value=time;
	var rid=<?php echo $randid; ?>;
	pth= document.getElementById("txtpth").value;
	//alert(pth);
	//alert(rid);
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               //alert(xmlhttp.responseText);
			    //document.getElementById("txttimer").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","get_time.php?q="+time+"&rid="+rid+"&pth="+pth,true);
        xmlhttp.send();
		if(time==2700)
		{
			if (confirm("Do you want to appear for quiz ?") == true) 
			{
       			window.location.assign('ShowQuizes.php');
   		 	} 
		}
		
}
</script>
</head>
<body onload="starttimer()">
  
<?php include_once('header.php')?>
    <div id="container">
        <div id="container_content">
            <div id="page">
                
                
                <div id="container_right" class="t1">
                		<div class="welcome" style="text-align:left;">
                        	<a href="index.php" style="color:#00F;"><img src="images/back.jpg" style="width:8%;" /></a>
              				<form method='post' style="display:none;" >
                            <input type='text' id='txttimer' value='0' />
                            <input type="text" id="txtpth" value="<?php echo($_POST['txtnotes']); ?>"/>
                            </form>
                		</div>
                        <div style="padding-top:40px;">
                        	<iframe src='<?php echo($_POST['txtnotes']); ?>' style="width:125%;height:700px;"></iframe>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div id="myModal" class="reveal-modal">
	<div class="vide">
				
	</div>
	<a class="close-reveal-modal">&#215;</a>
    </div>
       <div id="myModal1" class="reveal-modal" style="width:400px;">
	<div class="vide">
	 Exams are made easy through unique teaching tools in our website. So Students ..no more fear.. !!
Our educational content is created in a way to improvise the speed and ease of learning by any student of any talent level. Even a weak student can easily cross the exam hurdles by following our education content. A few hours study on our website  in exam time can help you easily pass and excel in the exam.. "			
	</div>
	<a class="close-reveal-modal">&#215;</a>
    </div>-->
    
   <?php //include_once('footer.php')?>
</body>
</html>