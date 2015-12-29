<?php /**/ ?><?php

session_start();
require_once('SystemFunctions.php');

#if($_SESSION['Access']!='TRUE')
#        {header("Location: index.php"); exit();}

echo stripslashes("

<head>
<title>DiveSite Administration</title>

<center><IMG SRC='../red_MarkerD.png' ALT='Dive Flag' ></center><br /><br />
<center><h1>DiveSite ADMINISTRATION</h1></center>
</head>


<body bgcolor ='".$BackgroundColor."'>

<br />
<br />







<table align='center'border='1'><tr><td>

<TABLE cellpadding='2' cellspacing='5'border='0' align='center'>
<tr>

<td>
<button style='width: 250px; height: 40px' onClick='window.location=\"DiveSiteRating.php\"'>Dive Site Ratings</button><br /><br />
<button style='width: 250px; height: 40px' onClick='window.location=\"DiveSiteType.php\"'>Dive Site Types</button><br /><br />
<button style='width: 250px; height: 40px' onClick='window.location=\"DiveSiteLevel.php\"'>Dive Site Levels</button><br /><br />
<button style='width: 250px; height: 40px' onClick='window.location=\"DiveSiteDifficulty.php\"'>Dive Site Difficulty</button><br /><br />
<button style='width: 250px; height: 40px' onClick='window.location=\"DiveSiteHazards.php\"'>Dive Site Hazards</button><br /><br />
<button style='width: 250px; height: 40px' onClick='window.location=\"DiveSiteComposition.php\"'>Dive Site Bottom Composition</button><br /><br />
<button style='width: 250px; height: 40px' onClick='window.location=\"DiveSiteTelephone.php\"'>Dive Site Telephone</button><br /><br />
<button style='width: 250px; height: 40px' onClick='window.location=\"DiveSiteFacilities.php\"'>Dive Site Facilities</button><br /><br />
<button style='width: 250px; height: 40px' onClick='window.location=\"DiveSiteWater.php\"'>Dive Site Water Type</button><br /><br />
<button style='width: 250px; height: 40px' onClick='window.location=\"DiveSiteMedical.php\"'>Dive Site Medical Services</button><br /><br />

</td>




</td>

</tr>
</table>

</td></tr></table>

<br />
<center>
<button style='width: 250px; height: 30px' onClick='window.location=\"DiveSitesSystem.php\"'>Dive Site System</button>


</center>


</body>
")
?>
