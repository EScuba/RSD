<?php /**/ ?><?php
session_start();
require_once('SystemFunctions.php');


echo('
<html>

<frameset cols="15%,85%">
	<frame src="EmptyFrame.php" name="navframe">
	
<frameset rows="60%,40%">
<frame src="DiveSite.php" name="showframe0">
<frame src="EmptyFrame.php" name="showframe">

</frameset>

</frameset>

</html>
');

?>

