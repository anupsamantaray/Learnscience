<?php
include_once("function.php");
$id=$_GET['val'];
//$clid=$_GET['clid'];
?>
<tr>
<td colspan="2">Topic Name
	
<select name="topicname" class="textbox form2" id="topicid">
<option value="">Select</option>
<?php
$result=mysql_query("select * from `student_topic` where `subject_id`='$id'");
while($roo=mysql_fetch_array($result)){

?>

<option value="<?php echo $roo['id'];?>"><?php echo $roo['topic'];?></option>



<?php
}
?>
</select>

</td>
</tr>