<?php
include_once("function.php");
$fetch=mysql_query("select MAX(count) as mak from `hits`");
$res=mysql_fetch_array($fetch);
$max=$res['mak'];
$mak=$max+1;
$ip=$_SERVER['REMOTE_ADDR'];
//$ip = $this->getIpAddressFromProxy();
mysql_query("insert into `hits` set `count`='$mak',`page`='$ip'") or die();
echo $mak;
?>