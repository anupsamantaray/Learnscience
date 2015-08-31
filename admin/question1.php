<?php
include_once("function.php");
$id=$_GET['val'];
?>
<tr>
<td>Question Name</td>
	<td>
<select name="qusname" class="textbox" onchange="return get_anss(this.value);">
<option value="">Select</option>
<?php
$result=mysql_query("select * from `student_question` where `topic_id`='$id'");
while($roo=mysql_fetch_array($result)){

?>

<option value="<?php echo $roo['id'];?>"><?php echo $roo['questions'];?></option>
<?php
}
?>
</select>

</td>
</tr>