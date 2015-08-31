<?php
$filejj = explode("/",$_GET["file"]);
$file=$filejj[1];
$filepath='../admin/'.$_GET["file"];
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $file . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');
@readfile($filepath);
?>