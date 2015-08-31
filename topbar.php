<?php
if(isset($_SESSION['name'])){
 $name=$_SESSION['name'];
?>
<div id="header">
		<div id="header-bar">
			<div id="header-box1">
				<div class="logo">
					<a href="index.php">
							<img src="image/logo.png" width="170" border="0" alt="logo" />						
					</a>				
				</div>
				<div id="search-box" style="width:auto;float:right; margin-top:-10px;">
						<table style="width:100%; height:110px;">
								
								<tr>
										<td  align="right" style="float:right; text-align: right;">
												 <img src="courses/images/user.png" style="float: left; margin-right: 10px;height: 32px;margin-top: -5px;" />  
												 Welcome <span style="color: rgb(0, 112, 176); "><?php echo $name;?></span><br/>
             <span style="font-size:12px;float: right;">Last login:<span style="float: right;color: rgb(0, 112, 176); "><?php echo $date=date("Y-m-d"); ?></span></span>
             
												
										</td>
								</tr>
								<tr>
									       <td  style="float: right;">
										 <a href="courses/logout.php"><img src="courses/images/logout.png"/></a>
										</td>
								</tr>
								
								<tr>
								<td style="float:right; text-align: right;" >
								 <a href="courses/index.php" style="font-family:arial; font-size:14px; color: #666;">All Courses</a>
								</td>
								</tr>
								<tr>
										<td style="float:right; text-align: right;" colspan="2"><img src="image/2.png"  /> <img src="image/4.png"  /><img src="image/3.png"  /></td>
										
								</tr>
						</table>
						</div>
				</div>
		</div>
</div>
<?php
	}
	else
	{
?>
<div id="header">
		<div id="header-bar">
			<div id="header-box1">
				<div class="logo">
						<a href="index.php">
								<img src="image/logo.png" width="170" border="0" alt="logo" />						
						</a>				
				</div>
<script>
function showsrch() {
     document.forms['f1'].submit();
}
</script>
				<div id="search-box" style="float:right; margin-top:10px;">
						<table style="width:100%; height:122px;">
								<tr>
										<td colspan="2">
											<form name='f1' action='search_bar.php' method='post'><input type="text" name="serval" id="serval"  value=""  class="form2" style="width:235px; height: 15px; float:left;" />&nbsp;&nbsp;<img src="images/serch.jpeg" style="width:120px; float:left; height: 27px;" onclick="showsrch()">
											</form>
                                        </td>
								</tr>
								<tr>
								 <td style=" text-align: right;  margin-top: 10px;">
												
												<a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade"><img src="images/create1.png"style="width:130px; height: 35px;background:url(images/create1.png); "/>
												</a>
												
										</td>
								 <td  style="text-align:left;  ">
								  		<a href="login.php"><img src="images/login.png"></a>
										
                                                                                </td>
										
                                                                                
								</tr>
								<tr>
										<td align="right" style="text-align: right;"><img src="image/2.png"  /> <img src="image/4.png"  /></td>
										<td><img src="image/3.png"  /></td>
								</tr>
						</table>
				</div>
			</div>
		</div>
</div>
<?php
}
?>