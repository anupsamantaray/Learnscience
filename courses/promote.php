<?php
include_once("../function.php");
ob_start();
if (!$_SESSION['name']){
header("location:login.php");
}
else{
    $uname=$_SESSION['name'];
if(isset($_POST['submit']))
{
    $fet=mysql_query("select * from `login` where `name`='$uname'");
$res=mysql_fetch_array($fet);
$email=$res['email'];
  $message="click this link"."http//www.learnscience.co.in/vpromote.php?uid=$uname";
	       $subject="email verification";
	       $from="noreply@learnscience.co.in";
                mail($email,$subject,$message,"From: $from\n");
		$msg="check your mail";  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="all" />
<title>quiz</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link href="style.css" type="text/css" rel="stylesheet" />
<style>
	table{
	border-collapse:collapse;
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	color:#333333;
	
	}
	tr{
	height:35px;
	 text-shadow: 0 1px 0 #FFFFFF;
	 	}
		td{
		
		}
th{
background-image: -moz-linear-gradient(center top , #F9F9F9, #ECECEC);
text-align:center;
}
.box1{
width:47%;
height:auto;
margin-top:2%;
background:#ffffff;
border:1px solid #CCCCCC;
border-bottom-left-radius:3px;
-moz-border-bottom-left-radius:3px;
border-bottom-right-radius:3px;
-moz-border-bottom-right-radius:3px;
}


#top1{
		width:960px;
		height:40px;
		margin:auto;
		}
#topbar_left{
		width:300px;
		height:40px;
		float:left;
		padding-top:10px;
		
		}
		#topbar_right{
		width:500px;
		height:40px;
		float:left;
		padding-top:10px;
	
		}
		.textbox{
		    height:35px;
		    width:200px;
		    border:1px solid #dedede;
		}
</style>
<body>
<div id="top">
					
<div id="top_bar">
	<div style="float: left;">
	    <?php include_once('header.php');?>
	</div>
	<div style="float: right;font-family:arial; font-size:14px; color: #fff;">
	</div>
</div>
</div>
	
 <div id="container">
        <div id="container_content">
            <div id="page">
		 <div id="container_right" style="width:960px;">
			      
					    <div style="width:400px; padding: 20px; float: left; margin-top: 30px; height: 150px; background: #efefef;">
						<h2>Promotion</h2>
						<form name="myform" action="" method="post">
						   <table style="width: 300px; height: 120px;">
						      <tr>
							 <td>User Id</td>
							 <td><input type="text" name="userid" value="<?php echo $uname;?>" class="textbox" readonly="true"></td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td><input type="submit" name="submit" value="Promote" style="background:#2a7cbf; border-radius:5px; -moz-border-radius:5px;color: #fff; padding: 6px; border:none;"></td>
						      </tr>
						      <?php if($msg!=""){?><p><?php echo $msg;?></p><?php }?>
						   </table>
						</form>
					    </div>
				
			 

		 </div>
	    </div>
	</div>
 </div>
     <?php include_once('footer.php')?>
</body>
</html><?php }?>
