 <?php include_once('function.php');?>
 <style type="text/css">
      h2{
	    margin-bottom: 0px;
	    padding-bottom: 0px !important;
      }
      #color-menubox1{
	  background:#671142;
      }
      #color-menubox1 li {
	    width:auto !important;
	    padding-left:35px;
	    padding-right:35px;
      }
      #color-menubox1 li ul li{
	    width:auto !important;
	    padding-left: 10px;
	    padding-right: 10px;
	    font-family:arial;
	    font-size:12px;
	   
	   
      }
      
       #color-menubox1 li ul li a:hover {
	    background: none;
	    
       }
       a:hover{
	    background: none !important;
       }
</style>
 
 <div id="color-menubar" >
						<div id="color-menu" >
								<div id="color-menubox1" style="padding-left:10px;">
										<ul>
												<li style="background:#073974;border-radius:10px;"><a href="index.php" class="active">Home</a>
												      <ul>
													    <li style="background:#1a5fb1;"><a href="about.php">About us</a></li>
													    <li style="background:#1a5fb1;"><a href="faq.php">FAQ</a></li>
													    <li style="background:#1a5fb1;"><a href="services.php">Other Services</a></li>
												      </ul>
												</li>
												<li style="background:#c57b0e;border-radius:10px;"><a href="faq.php">Remember Cards</a>
												       <ul>
													    <li style="background:#ed9e3e;"><a href="pagetest.php">Memory Cards</a></li>
													    <li style="background:#ed9e3e;"><a href="concept.php">Concept Map</a></li>
													    <li style="background:#ed9e3e;"><a href="picture.php">Picture Game</a></li>
												      </ul>
												</li>
												<li style="background:#073974;border-radius:10px;"><a href="" class="active">Our Courses</a>
														<ul>
														<?php
														$sql=mysql_query("select * from `student_class`");
														while($res=mysql_fetch_array($sql)){
														$id=$res['id'];
														?>
														<li style="background:#1a5fb1;"><a href="courses/index.php?clid=<?php echo $id;?>"><?php echo $res['class'];?></a>
																<!--<li style="background:#1a5fb1;"><a href="courses/index.php?clid=10">Class IX</a></li>
																<li style="background:#1a5fb1;"><a href="courses/index.php?clid=7">Class X</a></li>-->
														</li>
														<?php
														}
														?>	
														</ul>
												</li>
												
												
												<li style="background:#517e09;border-radius:10px;"><a href="hall.php">Hall Of Fame</a></li>
												<li style="background:#c61831;border-radius:10px;"><a href="services.php">Quizzes</a>
												      <ul>
													    <li style="background:#f0485b;"><a href="courses/wil_index1.php?prir=0">Basic Quiz</a></li>
													    <li style="background:#f0485b;"><a href="courses/wil_index2.php?prir=1">Competitive Quiz</a></li>
												      </ul>
												</li>
												<li style="background:#FF4500;border-radius:10px;"><a href="games.php">Videos & Fun Games</a></li>
										</ul>
								</div>
						</div>
				 </div>