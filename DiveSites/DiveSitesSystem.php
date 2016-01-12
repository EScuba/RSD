<?php /**/ ?><?php
session_start();
require_once('SystemFunctions.php');
$SESSION['DiveSiteId']='00000000';

echo('
<html>

<frameset cols="15%,85%">
	<frame src="EmptyFrame.php" name="navframe" scrolling=auto>
	
<frameset rows="60%,40%">
<frame src="DiveSite.php" name="showframe0">
<frame src="EmptyFrame.php" name="showframe" scrolling=auto>

</frameset>

</frameset>

</html>
');

?>

