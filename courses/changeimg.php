 <?php
					if(isset($_POST["submit_img"]))
					{
						if(!empty($pic))
						{
							if (!file_exists("propic/".$email)) {
							mkdir("propic/".$email);
							
							}
							unlink($pic);
							$target_dir = "propic/".$email."/";
							$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
							move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
							mysql_query("Update login set pro_pic='".$target_file."' where email='".$email."'") or die(mysql_error());
						}
						else
						{
							if (!file_exists("propic/".$email)) {
							mkdir("propic/".$email);
							
							}
							$target_dir = "propic/".$email."/";
							$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
							move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
							mysql_query("Update login set pro_pic='".$target_file."' where email='".$email."'") or die(mysql_error());
								
						}
						//header("location:index.php");	
					
					}
				?>