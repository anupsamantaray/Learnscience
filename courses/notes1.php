<html>
<head>
<script>
function callnotes()
{
	document.getElementById("cmdsubmit").click();
}
</script>
</head>
<body onload="callnotes()">
<form method="post" action="notes.php" style="display:none;">
	<input type="text" name="txtnotes" value="<?php echo($_GET['ref']); ?>" />
    <input type="submit" name="cmdsubmit" id="cmdsubmit" />
</form>
</body>
</html>