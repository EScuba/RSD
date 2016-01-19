<?php /**/ ?><?php
session_start();
require_once('SystemFunctions.php');



echo('
<html>
<head>
	
<center><IMG SRC="../red_MarkerD.png" ALT="Dive Flag" ></center>

<center><h4>Navigation</h4></center>
</head>
<body bgcolor="red">
<form>');

if((int)$_SESSION['DiveSiteId']==0 || !isset($_SESSION['DiveSiteId']) || $_SESSION['DiveSiteId']=='0000')
  { echo ('<center>
<INPUT TYPE="BUTTON" style="width: 150px"  VALUE="Dive Sites" onClick="parent.showframe0.location.href=\'DiveSite.php\';">	<br />  	
<INPUT TYPE="BUTTON" style="width: 150px"  VALUE="Dive Facilities" onClick="parent.showframe0.location.href=\'DiveSupport.php\';">	<br /><br/>
<INPUT TYPE="BUTTON" style="width: 150px"  disabled VALUE="Emergency" onClick="parent.showframe.location.href=\'DiveSiteEAP.php\';">	<br />
<INPUT TYPE="BUTTON"  style="width: 150px"  VALUE="Pictures" onClick="parent.showframe.location.href=\'DiveSitePix.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"   disabled VALUE="Videos" onClick="parent.showframe.location.href=\'DiveSiteVideo.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"   disabled VALUE="Reviews" onClick="parent.showframe.location.href=\'DiveSiteReview.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"   VALUE="Maps" onClick="parent.showframe.location.href=\'DiveSiteMap.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"  disabled VALUE="Marine Life" onClick="parent.showframe.location.href=\'DiveSiteMarineLife.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"  VALUE="Points of Interest" onClick="parent.showframe.location.href=\'DiveSitePOI.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"  disabled VALUE="Surface Interval" onClick="parent.showframe.location.href=\'DiveSiteSI.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"  VALUE="Courses" onClick="parent.showframe.location.href=\'DiveSiteCourses.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"  disabled VALUE="Buddies" onClick="parent.showframe.location.href=\'DiveSiteBuddy.php\';">	<br />




</center>');
}

else
{echo('<center>
<INPUT TYPE="BUTTON" style="width: 150px"  VALUE="Dive Sites" onClick="parent.showframe0.location.href=\'DiveSite.php\';">	<br />  	
<INPUT TYPE="BUTTON" style="width: 150px"  VALUE="Dive Facilities" onClick="parent.showframe0.location.href=\'DiveSupport.php\';">	<br /><br/>
<INPUT TYPE="BUTTON" style="width: 150px"  disabled VALUE="Emergency" onClick="parent.showframe.location.href=\'DiveSiteEAP.php\';">	<br />
<INPUT TYPE="BUTTON"  style="width: 150px"  VALUE="Pictures" onClick="parent.showframe.location.href=\'DiveSitePix.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"   disabled VALUE="Videos" onClick="parent.showframe.location.href=\'DiveSiteVideo.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"   disabled VALUE="Reviews" onClick="parent.showframe.location.href=\'DiveSiteReview.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"   VALUE="Maps" onClick="parent.showframe.location.href=\'DiveSiteMap.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"  disabled VALUE="Marine Life" onClick="parent.showframe.location.href=\'DiveSiteMarineLife.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"  VALUE="Points of Interest" onClick="parent.showframe.location.href=\'DiveSitePOI.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"  disabled VALUE="Surface Interval" onClick="parent.showframe.location.href=\'DiveSiteSI.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"  VALUE="Courses" onClick="parent.showframe.location.href=\'DiveSiteCourses.php\';">	<br />
<INPUT TYPE="BUTTON" style="width: 150px"  disabled VALUE="Buddies" onClick="parent.showframe.location.href=\'DiveSiteBuddy.php\';">	<br />


	</center>');
 	
}

if($_SESSION['Access']!='TRUE')
 {
echo('










<br />
<br />
<br />
<br />
<br /><center>
<INPUT TYPE="BUTTON" style="width: 150px" disabled VALUE="Administration" onClick="window.parent.location=\'DiveSiteAdmin.php\'"><br /><br />
');
}

else
{
	echo('

<br />
<br />
<br />
<br />
<br /><center>
<INPUT TYPE="BUTTON" style="width: 150px" VALUE="Administration" onClick="window.parent.location=\'DiveSitesSystem.php\'"><br /><br />
');
}


echo('
<br />
<br />
<br />

<INPUT TYPE="BUTTON" style="width: 150px" VALUE="Exit Dive Sites System" onClick="window.parent.location=\'DiveSitesSystem.php\'"></center> 	<br />




</form>



</body>
</html>
');
?>