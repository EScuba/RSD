<?php /**/ ?><?php

session_start();
require_once('SystemFunctions.php');

unset($_SESSION['DiveSiteFacilitiesIdArray']);
unset($_SESSION['DiveSiteFacilitiesRankArray']);
unset($_SESSION['DiveSiteFacilitiesDescriptionArray']);

unset($DiveSiteFacilitiesIdArray);
unset($DiveSiteFacilitiesRankArray);
unset($DiveSiteFacilitiesDescriptionArray);

function GetSelectBoxRecords()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteFacilitiesRecordsDesired,$DiveSiteFacilitiesId,$DiveSiteFacilitiesRank,$DiveSiteFacilitiesDescription;
global $DesiredRecord;

global $DiveSiteFacilitiesIdArray,$DiveSiteFacilitiesRankArray,$DiveSiteFacilitiesDescriptionArray;





$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
# $sql="select * from DiveSiteFacilities where(DiveSiteFacilitiesId = '".strip_tags(addslashes($DesiredRecord))."') order by DiveSiteFacilitiesId";

$sql="select DiveSiteFacilitiesId,DiveSiteFacilitiesRank,DiveSiteFacilitiesDescription from DiveSiteFacilities order by DiveSiteFacilitiesRank";


$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteFacilities Select * failure");
$NumDiveSiteFacilitiesRecordsDesired = mysql_num_rows($result);
mysql_close($connection);

for($i=0;$i<$NumDiveSiteFacilitiesRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteFacilitiesIdArray[]=$rowdata[0];
$DiveSiteFacilitiesRankArray[]=$rowdata[1];
$DiveSiteFacilitiesDescriptionArray[]=$rowdata[2];
}
PutVariablesIntoSession();
return;
}

function PutVariablesIntoSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteFacilitiesRecordsDesired,$DiveSiteFacilitiesId,$DiveSiteFacilitiesRank,$DiveSiteFacilitiesDescription;
global $DiveSiteFacilitiesIdArray,$DiveSiteFacilitiesRankArray,$DiveSiteFacilitiesDescriptionArray;

$_SESSION['DiveSiteFacilitiesIdArray'] = $DiveSiteFacilitiesIdArray;
$_SESSION['DiveSiteFacilitiesRankArray'] = $DiveSiteFacilitiesRankArray;
$_SESSION['DiveSiteFacilitiesDescriptionArray'] = $DiveSiteFacilitiesDescriptionArray;

return;
}



echo('<html><head></head><body>');
$DisplayColumns=2;
GetSelectBoxRecords();
for($i=0;$i<$NumDiveSiteFacilitiesRecordsDesired;$i++)
{
	echo('<br />');
	echo($i.' '. $DiveSiteFacilitiesIdArray[$i]);
	
	echo(' '. $DiveSiteFacilitiesRankArray[$i]);
	
	echo(' '.$DiveSiteFacilitiesDescriptionArray[$i]);
	
}

echo('<form action="FacilityCheckProcess.php" method="post">');
echo('<table>');
$colcount=0;echo('<tr><td>');
echo('<select multiple name="DiveFacility[]">');
for($i=0;$i<$NumDiveSiteFacilitiesRecordsDesired;$i++)
{
	
#	echo('<td><input type="checkbox" name="DiveFacility[]" value ="'.$DiveSiteFacilitiesDescriptionArray[$i].'" />'.$DiveSiteFacilitiesDescriptionArray[$i].'</td>');
	echo('<option value="'.$DiveSiteFacilitiesDescriptionArray[$i].'">'.$DiveSiteFacilitiesDescriptionArray[$i].'</option>');
	
	
}
 
	 	 echo('</td></tr>');
 	
 echo('</table>');

echo('<input type ="submit" name="formSubmit" value="Submit" />'); 
 
 
 echo('</form>');
 echo('</body>');
 echo('</html>');
?>