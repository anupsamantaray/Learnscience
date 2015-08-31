<?php
include_once('function.php');
if($_GET['uid'])
{
    $uid=$_GET['uid'];
     ?>
<script>
    function load(id)
    {
	confirm("Do you want to promote");
	window.location.replace("praction.php?uid="+id);
    }
</script>
<html>
    <body onload="load('<?php echo $uid;?>')">
    </body>
</html><?php }?>
