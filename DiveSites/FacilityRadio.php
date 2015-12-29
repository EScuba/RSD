<?php /**/ ?><?php

session_start();
require_once('SystemFunctions.php');

unset($_SESSION['DiveSiteCommunityAssessmentIdArray']);
unset($_SESSION['DiveSiteCommunityAssessmentRankArray']);
unset($_SESSION['DiveSiteCommunityAssessmentDescriptionArray']);

unset($DiveSiteCommunityAssessmentIdArray);
unset($DiveSiteCommunityAssessmentRankArray);
unset($DiveSiteCommunityAssessmentDescriptionArray);

function GetRadioRecords()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCommunityAssessmentRecordsDesired,$DiveSiteCommunityAssessmentId,$DiveSiteCommunityAssessmentRank,$DiveSiteCommunityAssessmentDescription;
global $DesiredRecord;

global $DiveSiteCommunityAssessmentIdArray,$DiveSiteCommunityAssessmentRankArray,$DiveSiteCommunityAssessmentDescriptionArray;





$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
# $sql="select * from DiveSiteCommunityAssessment where(DiveSiteCommunityAssessmentId = '".strip_tags(addslashes($DesiredRecord))."') order by DiveSiteCommunityAssessmentId";

$sql="select DiveSiteCommunityAssessmentId,DiveSiteCommunityAssessmentRank,DiveSiteCommunityAssessmentDescription from DiveSiteCommunityAssessment order by DiveSiteCommunityAssessmentRank";


$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteCommunityAssessment Select * failure");
$NumDiveSiteCommunityAssessmentRecordsDesired = mysql_num_rows($result);
mysql_close($connection);

for($i=0;$i<$NumDiveSiteCommunityAssessmentRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteCommunityAssessmentIdArray[]=$rowdata[0];
$DiveSiteCommunityAssessmentRankArray[]=$rowdata[1];
$DiveSiteCommunityAssessmentDescriptionArray[]=$rowdata[2];
}
PutVariablesIntoSession();
return;
}

function PutVariablesIntoSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCommunityAssessmentRecordsDesired,$DiveSiteCommunityAssessmentId,$DiveSiteCommunityAssessmentRank,$DiveSiteCommunityAssessmentDescription;
global $DiveSiteCommunityAssessmentIdArray,$DiveSiteCommunityAssessmentRankArray,$DiveSiteCommunityAssessmentDescriptionArray;

$_SESSION['DiveSiteCommunityAssessmentIdArray'] = $DiveSiteCommunityAssessmentIdArray;
$_SESSION['DiveSiteCommunityAssessmentRankArray'] = $DiveSiteCommunityAssessmentRankArray;
$_SESSION['DiveSiteCommunityAssessmentDescriptionArray'] = $DiveSiteCommunityAssessmentDescriptionArray;

return;
}



echo('<html><head></head><body>');
$DisplayColumns=4;
GetRadioRecords();
for($i=0;$i < $NumDiveSiteCommunityAssessmentRecordsDesired;$i++)
{
	echo('<br />');
	echo($i.' '. $DiveSiteCommunityAssessmentIdArray[$i]);
	
	echo(' '. $DiveSiteCommunityAssessmentRankArray[$i]);
	
	echo(' '.$DiveSiteCommunityAssessmentDescriptionArray[$i]);
	
}

echo('<form action="MultiRadioProcess.php" method="post">');
echo('<table border="1">');
echo('<tr><th>Review Factor</th><th colspan="5" align="center" >Worst------->Best</th></tr>');
$colcount=0;echo('<tr>');
for($i=0;$i < $NumDiveSiteCommunityAssessmentRecordsDesired;$i++)
{
	echo('<th align="left">'.$DiveSiteCommunityAssessmentDescriptionArray[$i].'</th>');
	for($j=0; $j < 5;$j++)
	 {
	  echo('<td><input type="radio" name="DiveSiteCommunityAssessmentResponse['.$i.','.$j.']" value="1" /></td>');
	 }
#	echo('<td><input type="radio" name="DiveFacility[]" value ="'.$DiveSiteCommunityAssessmentDescriptionArray[$i].'" />'.$DiveSiteCommunityAssessmentDescriptionArray[$i].'</td>');
	 echo('</tr>');
	 
}	 
 echo('</table>');

echo('<input type ="submit" name="formSubmit" value="Submit" />'); 
 
 
 echo('</form>');
 echo('</body>');
 echo('</html>');
?>