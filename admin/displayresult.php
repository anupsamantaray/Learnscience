<?php
include_once("function.php");
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
                                             	<caption><h2><b>Published Result</b></h2></caption>
						<tr>
							
							<th>Name</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Topic</th>
                            <th>Marks obtained</th>
                            <th>Out Of</th>
                            <th>Percentage</th>
                            <th>Level</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Time Taken</th>
                           <!-- <th>Publish</th>-->
                            <th>Date</th>
						</tr>
						<?php
							
							$sqlclass=mysql_query("select * from student_result where Publish='Yes' order by Percent DESC;");
							while($rowclass=mysql_fetch_array($sqlclass)){
							
						?>
						<tr>
							
                            <td><?php echo $rowclass["Student_name"]; ?></td>
                             <td><?php echo $rowclass["Subject_class"]; ?></td>
                              <td><?php echo $rowclass["Subject"]; ?></td>
                               <td><?php echo $rowclass["Student_topic"]; ?></td>
                            <td><?php echo $rowclass["obtained_marks"]; ?></td>
                            <td><?php echo $rowclass["Outof_marks"]; ?></td>
                            <td><?php echo $rowclass["Percent"]; ?></td>
                            <?php if($rowclass["level"]=='0')
								{
									echo("<td >Low</td>");
								}
								else if($rowclass["level"]=='1')
								{
									echo("<td>Medium</td>");
								}
								else if($rowclass["level"]=='3')
								{
									echo("<td>High</td>");
								}?>
                            <td><?php echo $rowclass["strt_time"]; ?></td>
                            <td><?php echo $rowclass["end_time"]; ?></td>
                            <td><?php echo $rowclass["total_time"]." secs"; ?></td>
                           <!-- <td><?php //echo $rowclass["Publish"]; ?></td>-->
                            <td><?php echo $rowclass["Date"]; ?></td>
						</tr>
						<?php
							}
						?>
                          </table>
                       
                        	 <table class="table1" cellpadding="5" style="padding-top:20px;" >
                             <caption><h2><b>UnPublished Result</b></h2></caption>
						<tr>
							
							<th>Name</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Topic</th>
                            <th>Marks obtained</th>
                            <th>Out Of</th>
                            <th>Percentage</th>
                            <th>Level</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Time Taken</th>
                           <!-- <th>Publish</th>-->
                            <th>Date</th>
						</tr>
						<?php
							
							$sqlclass=mysql_query("select * from student_result where Publish='No' order by Percent DESC;");
							while($rowclass=mysql_fetch_array($sqlclass)){
							
						?>
						<tr>
							
                            <td><?php echo $rowclass["Student_name"]; ?></td>
                             <td><?php echo $rowclass["Subject_class"]; ?></td>
                              <td><?php echo $rowclass["Subject"]; ?></td>
                               <td><?php echo $rowclass["Student_topic"]; ?></td>
                            <td><?php echo $rowclass["obtained_marks"]; ?></td>
                            <td><?php echo $rowclass["Outof_marks"]; ?></td>
                            <td><?php echo $rowclass["Percent"]; ?></td>
                            <?php if($rowclass["level"]=='0')
								{
									echo("<td >Low</td>");
								}
								else if($rowclass["level"]=='1')
								{
									echo("<td>Medium</td>");
								}
								else if($rowclass["level"]=='3')
								{
									echo("<td>High</td>");
								}?>
                            <td><?php echo $rowclass["strt_time"]; ?></td>
                            <td><?php echo $rowclass["end_time"]; ?></td>
                            <td><?php echo $rowclass["total_time"]." secs"; ?></td>
                            <!--<td><?php //echo $rowclass["Publish"]; ?></td>-->
                            <td><?php echo $rowclass["Date"]; ?></td>
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