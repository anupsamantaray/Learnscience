<?php
	
		//$con=new mysqli("localhost","learnsci_twcta","hHeOhbPMtR&F","learnsci_kriti");
		include_once('function1.php');
		$filename ='uploads/'.date("d-m-y").'.csv';
		$sqlinserttemp="";
	   $fp=fopen($filename,"w");
	  $sqltbltemp='Delete from tbltemp';
	  $result_sqltbltemp=$con->query($sqltbltemp);
	  
	  
	  
	  
	  $seprator="";
	  $comma="";
	  
	  
	  
	  
	  
	  
	  
	  // $sqltable="create table tbltemp(class varchar(80),subject varchar(80), Topic varchar(80),ebook varchar(200),videos varchar(200))";
       //$resulttable=$con->query($sqltable);
	   
	   $sql="select * from extra_detail";
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
			}
			$sqlsubject="select subject from student_subject where id= ".$row['subject_id'];
			$result_sqlsubject=$con->query($sqlsubject);
			while($row_subject = $result_sqlsubject->fetch_assoc())
			{
				$subject=$row_subject['subject'];
			}
			$sqltopic="select topic from student_topic where id= ".$row['topic_id'];
		    $result_sqltopic=$con->query($sqltopic);
			while($row_topic = $result_sqltopic->fetch_assoc())
			{
				$topic=$row_topic['topic'];
			}
			$arrebook=explode("/",$row['ebook']);
			$arrevideos=explode("/",$row['video']);
			//echo($class." , ".$subject." , ".$topic." , ".$arrebook[count($arrebook)-1]." , ".$arrevideos[count($arrevideos)-1]."<br>");
			$sqlinserttemp="insert into tbltemp(class,subject,Topic,ebook,videos) values('".$class."','".$subject."','".$topic."','".$arrebook[count($arrebook)-1]."','".$arrevideos[count($arrevideos)-1]."')";
			$result_sqlinserttemp=$con->query($sqlinserttemp);
		}
		//$con->multi_query($sqlinserttemp);
	}
		
		
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		$sqlshow_temptable="Select * from tbltemp";
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

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   		 
  
																				
                                            
												