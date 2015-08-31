<?php
include_once("function.php");
include_once("function1.php");
if(!isset($_SESSION['id'])){
header("location:../login.php");
}
else{
?>
<html>
    <head>
			<title>Admin Panel</title>
      		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<link href="css/style.css" rel="stylesheet" type="text/css" />
			 <script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete class?");
			if(con){
			window.location="class_delete.php?id1="+vals;
			}
		}
		</script>
   </head>
    <body>
	<!--------------top bar -------->
 <div id="top_bar" style="width:105%;">
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
				<div id="right_box" style="margin-left:40px;">
						<div class="headline" style="width:127%;">
								<a href="">Dashboard </a> 
								 <a href="">Settings</a>
						</div>
						<div id="content1" style="width:130%;">
								<div class="head2">
										Display result
								</div>
								<div id="content2">
										  <?php
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
										  }
										  ?>
											
		
											 <table class="table1" cellpadding="5" >
                                             	
						<tr>
							
							<th colspan='1'>Student</th>
                            <th>Notes</th>
                           
                            <th>Time</th>
                            <th>Date</th>
                            
						</tr>
						<?php
							
							$sqlclass=mysql_query("select * from tblstudy");
							while($rowclass=mysql_fetch_array($sqlclass)){
								$sqlstud="select name from login where email='".$rowclass['eid']."'";
								$resultstud=$con->query($sqlstud);
								if($resultstud->num_rows >0)
								{
									while($rowsstudname=$resultstud->fetch_assoc())
									{
										$name=$rowsstudname['name'];
									}
								}
							$strnotes=explode("/",$rowclass["notes"]);
						?>
						<tr>
							
                            <td><?php echo $name; ?></td>
                            <td><?php echo "<a href='".$strnotes[2]."/".$strnotes[3]."'>".$strnotes[3]."</a>";  ?></td>
                            <td><?php echo $rowclass["time"]." secs"; ?></td>
                            
                            <td><?php echo $rowclass["date"]; ?></td>
                            
						</tr>
						<?php
							}
						?>
                          </table>
                       
                        	 
							
					
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
<?php
}
?>