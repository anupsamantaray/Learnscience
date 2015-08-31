<?php
include_once("function.php");
include_once("function1.php");
if(!isset($_SESSION['id'])){
header("location:../login.php");
}
else{
	if(!empty($_POST['cboconcept']) && !empty($_POST['txtnotes']) && $_FILES['fileToUpload'])
	{
		$target_dir = "concept_notes/";
		$target_file = $target_dir . basename($_SESSION['id'].$_FILES["fileToUpload"]["name"]);
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		$sqlinsertconcept="insert into tblrefconcept(concept_id,Notes,Path) values(".$_POST['cboconcept'].",'".$_POST['txtnotes']."','".$target_file."')";
		$resultinsertconcept=$con->query($sqlinsertconcept);
	}
	header("location:add_concepts_notes.php");
?>

<?php
}
?>