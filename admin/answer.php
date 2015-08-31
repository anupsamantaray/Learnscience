<?php
include_once("function.php");
$id=$_GET['val'];
$re=mysql_query("select * from `student_answer` where `question_id`='$id'");
echo "select * from `student_answer` where `question_id`='$id'";
while($ro=mysql_fetch_array($re))
{
?>
<td><input type="radio" value="<?php echo $ro['id'];?>"/></td>
<td><?php echo $ro['answers'];?></td>
<?php
}
?>