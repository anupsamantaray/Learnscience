<?php
include_once("function.php");
?>
 <!-- Load TinyMCE-->
 <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="js/setup.js" type="text/javascript"></script/>
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
        });
    </script>
    <!-- /TinyMCE -->
<style>
.btm{
margin-bottom:5px;
}
</style>
<script>
    function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="add_newsdelete.php?id1="+vals;
			}
		}
</script>
</head>
<body>
<!--------------top bar -------->
 <div id="top_bar">
 		<div id="top_box">
				<h2 style="margin-top:0px; padding-top:8px; font-family:Arial, Helvetica, sans-serif; color:#f5f5f5;">Admin Panel</h2>
		</div>
 </div>
 <!--------------top bar end-------->
 
 <!--------------content bar-------->
 <div id="main_bar">
 		<div id="main_box">
				<div id="left_box">
						<?php include_once("conleft_bar.php"); ?>
				</div>
				<div id="right_box" style="margin-left:40px; width:830px;">
						<div class="headline">
								<a href="">Dashboard </a> /
								 <a href="">Settings</a>
						</div>
						<div id="content1">
								<div class="head2">
										Change Password
								</div>
								<div id="content2">
										<?php
											  if(isset($_GET['msg']))
											  {
											  $mess=$_GET['msg'];
											   echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
											  }
											  ?>
										<form name="f" method="post" id="formid" action="change_passwordaction.php" enctype="multipart/form-data">
											<table class="table" style="line-height:2.5;" id="TableMain">
											    <tr>
												<td>Exist Admin Name</td>
												<td><input type="text" name="user"></td>
											    </tr>
											    <tr>
												<td>New Admin Name(Name Replacement)</td>
												<td><input type="text" name="replaceuser"></td>
											    </tr>
											    <tr>
												<td>Current Password</td>
												<td><input type="password" name="password" ></td>
											    </tr>
											    <tr>
												<td>New Password</td>
												<td><input type="password" name="newpassword" ></td>
											    </tr>
											    <tr>
												<td>Confirm Password</td>
												<td><input type="password" name="confpassword" ></td>
											    </tr>
											    <tr>
												<td colspan="2" align="center"><input type="submit" name="submit" value="submit" class="button"></td>
											    </tr>
											</table>
											<table class="table" style="line-height:2.5;" id="TableMain">
											    <tr>
												<td>User mail</td>
												<td><input type="text" name="user1"></td>
											    </tr>
											    <tr>
												<td>New Password</td>
												<td><input type="password" name="newpassword1" ></td>
											    </tr>
											    <tr>
												<td>confirm Password</td>
												<td><input type="password" name="confpassword1" ></td>
											    </tr>
											    <tr>
												<td colspan="2" align="center"><input type="submit" name="sub" value="submit" class="button"></td>
											    </tr>
											</table>
										</from>
								</div>
						</div>
				</div>
		</div>
 </div>
  <!--------------content bar end-------->
	
<!--------------footer---------> 
 <div id="footer-bar">
 		<div id="footer">
				<?php include_once('footermenu.php');?>
		</div>
 </div>
  <!--------------footer end--------->                   
</body>
</html>
