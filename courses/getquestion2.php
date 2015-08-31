
<?php
//include_once("../function.php");
include_once("../function1.php");
$q=intval($_GET['q']);
$d=intval($_GET['d']);
$low=intval($_GET['l1']);
$up=intval($_GET['up1']);
$diff= $up-$low;
$sqlquestion="Select * from  student_question where topic_id=".$q." and difficulty=".$d." limit ".(int)($diff+1)." offset ".(int)($low-1) ;
$result_question=$con->query($sqlquestion);
$arrquestion=array();
$i=0;
$j=0;
if($result_question->num_rows>0)
{
	
	while($rows_question=$result_question->fetch_assoc())
	{
		$arrquestion[$i]=$rows_question['questions'];
		$arranswer=explode("|",$rows_question['answers']);
		$arranswer2[$i][1]=$arranswer[1];
		$arranswer2[$i][2]=$arranswer[2];
		$arranswer2[$i][3]=$arranswer[3];
		$arranswer2[$i][4]=$arranswer[4];
		$correct[$i]=$arranswer2[$i][$rows_question['correct']];
				$i++;		
	}
		//echo("<input type='text' name='hidecnt' value='".$i."' style='visibility:hidden;' ><input type='submit' value='submit' name='submit'>");



$j=$i;
$k=1;
$l=1;
 
for($i=0;$i<$j;$i++)
{
	//if($i % 10==0)
	//{
		
	//}
	try{
	echo("<h2> Question ".($i+1)."</h2>");
	echo($arrquestion[$i]);	
	echo("<br>");
	echo("<input type='radio' value='".$arranswer2[$i][1]."' name='radio".$i."'>".$arranswer2[$i][1]."<br>");
	echo("<input type='radio' value='".$arranswer2[$i][2]."' name='radio".$i."'>".$arranswer2[$i][2]."<br>");
	echo("<input type='radio' value='".$arranswer2[$i][3]."' name='radio".$i."'>".$arranswer2[$i][3]."<br>");
	echo("<input type='radio' value='".$arranswer2[$i][4]."' name='radio".$i."'>".$arranswer2[$i][4]."<br>");
	echo("<input type='text' value='".$correct[$i]."' name='txtc".$i."' style='display:none;'><br>");
	}
	catch(Exception $e)
	{}
	
}

//$l++;

/*
echo($low);
echo("<br>");
echo($up);
echo("<br>");*/
echo'<input type="text" name="txtlevel" value="'.$d.'" style="display:none;">';
echo("<input type='button' value='submit' name='result' onclick='callsubmit1()' >");
echo("</div>");
}
else
{
	echo("<h1 id='level' style='color:#e05f03;'>&nbsp;&nbsp;Questions for this level are not yet uploaded.</h1>");
}
echo("<input type='text' name='count' value='".$j."' style='display:none;'>
<input type='text' name='tid' value='".$q."' style='display:none;'>
<input type='text' name='diff' value='".$d."' style='display:none;'>");
?>