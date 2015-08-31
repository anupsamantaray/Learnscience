<?php
include_once("function.php");
$id=$_GET['val'];
$res1=mysql_query("select * from `student_subject` where `class_id`='$id'");


?>
<tr>
	<td>Subject Name</td>

	<td>

<select name="sub" class="textbox form2">
<?php
while($row=mysql_fetch_array($res1)){
?>
<option value="<?php echo $row['id'];?>"><?php echo $row['subject']; ?></option>
<?php
}
?>
</select>

</td>

</tr>