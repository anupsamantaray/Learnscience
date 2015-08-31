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
				<div id="right_box" style="margin-left:40px;">
						<div class="headline">
								<a href="">Dashboard </a> 
								 <a href="">Settings</a>
						</div>
						<div id="content1">
								<div class="head2">
										Add Concept Notes
								</div>
								<div id="content2">
										  <?php
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:red; margin-left:20px;'>".$mess."</span>";
										  }
										  ?>
											<form name="f" method="post" action="insert_concept_notes.php" enctype="multipart/form-data">
											<table class="table" style="height:100px;">
												<tr>												</tr>
												<tr>
												<td>Concepts</td>
												<td>
                                                <select name="cboconcept" class="form">
                                                <?php
													$sqlconceptid="Select id,concept from tblconcepts";
													$resultconcept=$con->query($sqlconceptid);
													if($resultconcept->num_rows > 0)
													{
														while($rowsconcept = $resultconcept->fetch_assoc() )
														{
												?>
                                                		
                                                     		<option value="<?php echo($rowsconcept['id']); ?>" ><?php echo($rowsconcept['concept']); ?></option>   	
                                                        
                                                <?php
														}
													}
												?>
                                                </select>
                                                </td>
												</tr>
                                                
                                                <tr>
												<td>Notes</td>
												<td>
                                                		<input type="text" name="txtnotes" class="form">
                                                </td>
												</tr>
												
                                                
                                                 <tr>
												<td>Upload File</td>
												<td>
                                                		<input type="File" name="fileToUpload" class="form">
                                                </td>
												</tr>
                                                					
												<tr> 
												<td>&nbsp;</td> 
												<td><input type="submit" name="submit" value="Add" class="button" ></td> 
												</tr>
												</table>  
											</form>
		
											 <table class="table1" cellpadding="5" >
						<tr>
							<th>Concept</th>
                            <th>Notes</th>
							<th colspan="2">Action</th>
						</tr>
						<?php
							
							$sqlclass=mysql_query("select * from `tblrefconcept`");
							while($rowclass=mysql_fetch_array($sqlclass)){
							
						?>
						<tr>
							<td><?php 
								$sqlconcept=mysql_query("select concept from tblconcepts where id=".$rowclass['concept_id']);
								while($rowsconceptval=mysql_fetch_array($sqlconcept))
								{
									echo($rowsconceptval['concept']);
								}
							 ?></td>
                             <td><?php 
								
									echo("<a href='".$rowclass['Path']."'>".$rowclass['Notes']."</a>");
								
							 ?></td>
							<td><a href="class_edit.php?id=<?php echo $rowclass['id'];?>"><img src="image/edit.png"></a></td>
							<td onClick="delete_data(<?php echo $rowclass['id']; ?>)"><img src="image/delete.png"></td>
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