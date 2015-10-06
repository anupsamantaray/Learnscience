<?php
include_once("function.php");
$id1=$_POST['hidden_id'];
$ebookimage=$_POST['ebookimage'];
$mapdtls=$_POST['mapdtls'];
$img=$_FILES['img1']['name'];
if($img==''){
	$res=mysql_query("UPDATE `student_concept_maps` SET `map_image`='$ebookimage', `map_text`='$mapdtls' WHERE `id`='$id1'");
}else{
	$srch = mysql_query("SELECT * FROM student_concept_maps WHERE `id`='$id1'");
	$rslt = mysql_fetch_assoc($srch);
	unlink($rslt['map_image']);
	$ext1=end(explode(".", $_FILES["img1"]["name"]));
	if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif" || $ext1=="pdf"){
		$folder="concept_map_images/";
		$filename = $folder . $img;
		$copied = copy($_FILES['img1']['tmp_name'], $filename);
		$res=mysql_query("UPDATE `student_concept_maps` SET `map_image`='$filename', `map_text`='$mapdtls' WHERE `id`='$id1'");
	}
}
header("location:addConceptMap.php");
?>
