<?php
	
		//$con=new mysqli("localhost","learnsci_twcta","hHeOhbPMtR&F","learnsci_kriti");
		$class_id = intval($_GET['class']);
		$subject_id=intval($_GET['subject']);
		$topic_id=intval($_GET['topic']);
		include_once('function1.php');
		$filename ='uploads/Quiz/Quiz_'.$class_id.'_'.$subject_id.'_'.$topic_id.'.csv';
		$sqlinserttemp="";
	   $fp=fopen($filename,"w");
	  $sqltbltemp='Delete from tbltemp1';
	  $result_sqltbltemp=$con->query($sqltbltemp);
	  
	/*  echo $class_id;
		echo $subject_id;
		echo $topic_id;*/
	  
	  
	  
	  $seprator="";
	  $comma="";
	  
	  
	  
	  
	  
	  
	  
	  // $sqltable="create table tbltemp(class varchar(80),subject varchar(80), Topic varchar(80),ebook varchar(200),videos varchar(200))";
       //$resulttable=$con->query($sqltable);
	   
	   $sql="select * from student_question where class_id=".$class_id." and subject_id=".$subject_id." and topic_id=".$topic_id;
	   $result=$con->query($sql);
	   if ($result->num_rows > 0) 
	   {
		 $class;
		 $subject;
		 $topic;
		 while($row = $result->fetch_assoc()) 
		 {
			$sqlclass="select class from student_class where id= ".$row['class_id'];
			$result_sqlclass=$con->query($sqlclass);
			while($row_class = $result_sqlclass->fetch_assoc())
			{
				$class=$row_class['class'];
				//echo $class." ";
			}
			$sqlsubject="select subject from student_subject where id= ".$row['subject_id'];
			$result_sqlsubject=$con->query($sqlsubject);
			while($row_subject = $result_sqlsubject->fetch_assoc())
			{
				$subject=$row_subject['subject'];
				//echo $subject." ";
			}
			$sqltopic="select topic from student_topic where id= ".$row['topic_id'];
		    $result_sqltopic=$con->query($sqltopic);
			while($row_topic = $result_sqltopic->fetch_assoc())
			{
				$topic=$row_topic['topic'];
				//echo $topic." ";
			}
			$arranswer=explode("|",$row['answers']);
			//echo "<br>";
			//$arrevideos=explode("/",$row['video']);
			//echo($class." , ".$subject." , ".$topic." , ".$row['questions']." , ".$row['answers']." , ".$arranswer[$row['correct']]."<br>");
			//echo($class." , ".$subject." , ".$topic." , ".$row['question']." , ".$row['answer']." , ".$arranswer[$row['correct']-1]."<br>");
			$sqlinserttemp="insert into tbltemp1(class_name,subject,topic,question,answer,correct) values('".$class."','".$subject."','".$topic."','".$row['questions']."','".$row['answers']."','".$arranswer[$row['correct']]."')";
			$result_sqlinserttemp=$con->query($sqlinserttemp);
		}
		//$con->multi_query($sqlinserttemp);
	}
		
		
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		$sqlshow_temptable="Select class_name,subject,topic,question,answer,correct from tbltemp1";
		$result_sqlshow_temptable=$con->query($sqlshow_temptable);
		
		while($row=$result_sqlshow_temptable->fetch_assoc())
		{
			$seprator="";
			$comma="";
			foreach($row as $name =>$value)
			{
				$seprator .=$comma .''.str_replace('','""',$name);
				$comma=",";	
			}
			$seprator .="\n";
		}
		//echo($seprator);
		fputs($fp,$seprator);
		//echo $row;
		mysqli_data_seek($result_sqlshow_temptable,0);
		while($row=$result_sqlshow_temptable->fetch_assoc())
		{
			$seprator="";
			$comma="";
			foreach($row as $name =>$value)
			{
				$seprator .=$comma .''.str_replace('','""',$value);
				$comma=",";	
			}
			$seprator .="\n";
		
		//echo($seprator);
		fputs($fp,$seprator);
		}
		fclose($fp);
		header("location:".$filename);
		//header("location:all_display.php");
	
?>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   		 
  
																				
                                            
												