<?php
include_once("../function.php");
include_once("../function1.php");
$q=(int)$_GET['q'];
$rid=(int)$_GET['rid'];
if($_SESSION['email'])
{
	if($q==15)
	{
		$sql="insert into tblstudy(id,eid,notes,time,date)values(".$_GET['rid'].",'".$_SESSION['email']."','".$_GET['pth']."',".$q.",'".date("Y-M-d")."')";
		$result=$con->query($sql);
	}
	else
	{
		$sqlupdate="update tblstudy set time=".$q." where id=".$rid;
		$resultupdate=$con->query($sqlupdate);
	}
}
	//echo(16);
?>