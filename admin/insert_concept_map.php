<?php
include_once("function.php");
if(isset($_POST['submit'])){
	$classid=htmlentities($_POST['selcls'],ENT_QUOTES);
	$subjectid=htmlentities($_POST['sub'],ENT_QUOTES);
	$topid=htmlentities($_POST['topicname'],ENT_QUOTES);
	$bookdetail=htmlentities($_POST['bookdetails'],ENT_QUOTES);
	$ebookimage =$_FILES['ebook']['name'];
	if($classid!="" && $subjectid!="" && $topid!="" && $ebookimage!="" && $bookdetail!="" ){
		$ext1=end(explode(".", $_FILES["ebook"]["name"]));
		if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif" || $ext1=="pdf" || $ext1=="txt"){
			$folder="concept_map_images/";
			$filename = $folder . $ebookimage;
			$copied = copy($_FILES['ebook']['tmp_name'], $filename);
			
			mysql_query("INSERT INTO `student_concept_maps` (`class_id` ,`subject_id` ,`topic_id` ,`map_image` ,`map_text`) VALUES ('$classid',  '$subjectid',  '$topid',  '$filename',  '$bookdetail')") or die(mysql_error());
			$msg="successfully added";
		}
	}
	header("location:addConceptMap.php?msg=$msg");
}
?>
