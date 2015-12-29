<?php /**/ ?><?php
session_start();
require_once('SystemFunctions.php');
$db="aquatreasurequest";
$table="DiveSite";
$CallingProgram="index.php";


function GetCheckBoxRecords(&$NumRecords,&$CheckBoxId,&$CheckBoxRank,&$CheckBoxDescription,$CheckTable,&$CheckField)
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;

$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
# $sql="select * from DiveSiteFacilities where(DiveSiteFacilitiesId = '".strip_tags(addslashes($DesiredRecord))."') order by DiveSiteFacilitiesId";

#--- get table field names--------------------------------------------------------------------------------------------------
$sql="describe ".$CheckTable;
#echo('here: '.$sql);
$result = mysql_query($sql,$connection) or die("ERROR!! Check box table read failure");
$rows = mysql_num_rows($result);

for ($i=0;$i < $rows;$i++)
 {
   $rowdata= mysql_fetch_row($result);
   $CheckField[$i]= $rowdata[0];
   
 }
$sql="select ";
for ($i=0;$i < $rows;$i++)
 {
   
#   echo($CheckField[$i].'<br>');
   $sql=$sql." ".$CheckField[$i];
   if($i != $rows -1) {$sql=$sql.",";}
    
 }

$sql=$sql." from ".$CheckTable." order by ".$CheckField[1];

#echo("search: ".$sql);


$result = mysql_query($sql,$connection) or die("ERROR!! CheckBox Select * failure");
$NumRecords = mysql_num_rows($result);
mysql_close($connection);

for($i=0;$i < $NumRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
$CheckBoxId[]=$rowdata[0];
$CheckBoxRank[]=$rowdata[1];
$CheckBoxDescription[]=$rowdata[2];
}

return;
}

function PutCheckVariablesIntoSession($CheckFieldNames,$CheckId,$CheckRank,$CheckDescription)
 { 


$_SESSION[$CheckFieldNames[0].'Array'] = $CheckId;
$_SESSION[$CheckFieldNames[1].'Array'] = $CheckRank;
$_SESSION[$CheckFieldNames[2].'Array'] = $CheckDescription;

return;
}







#-------------------------Transfer Screen to Session Variables--------------------------

function PutVariablesIntoSession()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
$_SESSION['DiveSiteId'] = $DiveSiteId;
$_SESSION['DiveSiteStatus'] = $DiveSiteStatus;
$_SESSION['DiveSiteEnteredBy'] = $DiveSiteEnteredBy;
$_SESSION['DiveSiteDateEntered'] = $DiveSiteDateEntered;
$_SESSION['DiveSiteCity'] = $DiveSiteCity;
$_SESSION['DiveSiteProvince'] = $DiveSiteProvince;
$_SESSION['DiveSiteCountry'] = $DiveSiteCountry;
$_SESSION['DiveSiteName'] = $DiveSiteName;
$_SESSION['DiveSiteMajorName'] = $DiveSiteMajorName;
$_SESSION['DiveSiteMinorName'] = $DiveSiteMinorName;
$_SESSION['DiveSiteRating'] = $DiveSiteRating;
$_SESSION['DiveSiteType'] = $DiveSiteType;
$_SESSION['DiveSiteLevel'] = $DiveSiteLevel;
$_SESSION['DiveSiteElevation'] = $DiveSiteElevation;
$_SESSION['DiveSiteElevationUnits'] = $DiveSiteElevationUnits;
$_SESSION['DiveSiteWater'] = $DiveSiteWater;
$_SESSION['DiveSiteDifficulty'] = $DiveSiteDifficulty;
$_SESSION['DiveSiteTideTable'] = $DiveSiteTideTable;
$_SESSION['DiveSiteTideTableNotes'] = $DiveSiteTideTableNotes;
$_SESSION['DiveSiteBestDiveMonths'] = $DiveSiteBestDiveMonths;
$_SESSION['DiveSiteTimeRestrictions'] = $DiveSiteTimeRestrictions;
$_SESSION['DiveSitePermitRequired'] = $DiveSitePermitRequired;
$_SESSION['DiveSiteWinterTemp'] = $DiveSiteWinterTemp;
$_SESSION['DiveSiteSummerTemp'] = $DiveSiteSummerTemp;
$_SESSION['DiveSiteFallTemp'] = $DiveSiteFallTemp;
$_SESSION['DiveSiteSpringTemp'] = $DiveSiteSpringTemp;
$_SESSION['DiveSiteDepthMin'] = $DiveSiteDepthMin;
$_SESSION['DiveSiteDepthMax'] = $DiveSiteDepthMax;
$_SESSION['DiveSiteDepthUnits'] = $DiveSiteDepthUnits;
$_SESSION['DiveSiteVisibilityMinimum'] = $DiveSiteVisibilityMinimum;
$_SESSION['DiveSiteVisibilityMaximum'] = $DiveSiteVisibilityMaximum;
$_SESSION['DiveSiteVisibilityUnits'] = $DiveSiteVisibilityUnits;
$_SESSION['DiveSiteHazards'] = $DiveSiteHazards;
$_SESSION['DiveSiteHazardNotes'] = $DiveSiteHazardNotes;
$_SESSION['DiveSiteBottomComposition'] = $DiveSiteBottomComposition;
$_SESSION['DiveSiteCompositionNotes'] = $DiveSiteCompositionNotes;
$_SESSION['DiveSiteTelephoneNotes'] = $DiveSiteTelephoneNotes;
$_SESSION['DiveSiteFacilities'] = $DiveSiteFacilities;
$_SESSION['DiveSiteFacilitiesNotes'] = $DiveSiteFacilitiesNotes;
$_SESSION['DiveSiteMedical'] = $DiveSiteMedical;
$_SESSION['DiveSiteMedicalNotes'] = $DiveSiteMedicalNotes;
$_SESSION['DiveSiteRecommendationNotes'] = $DiveSiteRecommendationNotes;
$_SESSION['DiveSiteEAPNotes'] = $DiveSiteEAPNotes;
$_SESSION['DiveSiteNotes'] = $DiveSiteNotes;
$_SESSION['DiveSiteExactLat'] = $DiveSiteExactLat;
$_SESSION['DiveSiteExactLong'] = $DiveSiteExactLong;
$_SESSION['DiveSiteShoreLat'] = $DiveSiteShoreLat;
$_SESSION['DiveSiteShoreLong'] = $DiveSiteShoreLong;
$_SESSION['DiveSiteShoreNotes'] = $DiveSiteShoreNotes;
$_SESSION['DiveSiteWebPage'] = $DiveSiteWebPage;
$_SESSION['DiveSiteBackground'] = $DiveSiteBackground;
return;
}

#--------------------Transfer POST to screen variables ----------------------------------

function GetPostVariables()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
$DiveSiteId=$_POST['DiveSiteId'];
$DiveSiteStatus=$_POST['DiveSiteStatus'];
$DiveSiteEnteredBy=$_POST['DiveSiteEnteredBy'];
$DiveSiteDateEntered=$_POST['DiveSiteDateEntered'];
$DiveSiteCity=$_POST['DiveSiteCity'];
$DiveSiteProvince=$_POST['DiveSiteProvince'];
$DiveSiteCountry=$_POST['DiveSiteCountry'];
$DiveSiteName=$_POST['DiveSiteName'];
$DiveSiteMajorName=$_POST['DiveSiteMajorName'];
$DiveSiteMinorName=$_POST['DiveSiteMinorName'];
$DiveSiteRating=$_POST['DiveSiteRating'];
$DiveSiteType=$_POST['DiveSiteType'];
$DiveSiteLevel=$_POST['DiveSiteLevel'];
$DiveSiteElevation=$_POST['DiveSiteElevation'];
$DiveSiteElevationUnits=$_POST['DiveSiteElevationUnits'];
$DiveSiteWater=$_POST['DiveSiteWater'];
$DiveSiteDifficulty=$_POST['DiveSiteDifficulty'];
$DiveSiteTideTable=$_POST['DiveSiteTideTable'];
$DiveSiteTideTableNotes=$_POST['DiveSiteTideTableNotes'];
$DiveSiteBestDiveMonths=$_POST['DiveSiteBestDiveMonths'];
$DiveSiteTimeRestrictions=$_POST['DiveSiteTimeRestrictions'];
$DiveSitePermitRequired=$_POST['DiveSitePermitRequired'];
$DiveSiteWinterTemp=$_POST['DiveSiteWinterTemp'];
$DiveSiteSummerTemp=$_POST['DiveSiteSummerTemp'];
$DiveSiteFallTemp=$_POST['DiveSiteFallTemp'];
$DiveSiteSpringTemp=$_POST['DiveSiteSpringTemp'];
$DiveSiteDepthMin=$_POST['DiveSiteDepthMin'];
$DiveSiteDepthMax=$_POST['DiveSiteDepthMax'];
$DiveSiteDepthUnits=$_POST['DiveSiteDepthUnits'];
$DiveSiteVisibilityMinimum=$_POST['DiveSiteVisibilityMinimum'];
$DiveSiteVisibilityMaximum=$_POST['DiveSiteVisibilityMaximum'];
$DiveSiteVisibilityUnits=$_POST['DiveSiteVisibilityUnits'];
$DiveSiteHazards=$_POST['DiveSiteHazards'];
$DiveSiteHazardNotes=$_POST['DiveSiteHazardNotes'];
$DiveSiteBottomComposition=$_POST['DiveSiteBottomComposition'];
$DiveSiteCompositionNotes=$_POST['DiveSiteCompositionNotes'];
$DiveSiteTelephoneNotes=$_POST['DiveSiteTelephoneNotes'];
$DiveSiteFacilities=$_POST['DiveSiteFacilities'];
$DiveSiteFacilitiesNotes=$_POST['DiveSiteFacilitiesNotes'];
$DiveSiteMedical=$_POST['DiveSiteMedical'];
$DiveSiteMedicalNotes=$_POST['DiveSiteMedicalNotes'];
$DiveSiteRecommendationNotes=$_POST['DiveSiteRecommendationNotes'];
$DiveSiteEAPNotes=$_POST['DiveSiteEAPNotes'];
$DiveSiteNotes=$_POST['DiveSiteNotes'];
$DiveSiteExactLat=$_POST['DiveSiteExactLat'];
$DiveSiteExactLong=$_POST['DiveSiteExactLong'];
$DiveSiteShoreLat=$_POST['DiveSiteShoreLat'];
$DiveSiteShoreLong=$_POST['DiveSiteShoreLong'];
$DiveSiteShoreNotes=$_POST['DiveSiteShoreNotes'];
$DiveSiteWebPage=$_POST['DiveSiteWebPage'];
$DiveSiteBackground=$_POST['DiveSiteBackground'];
return;
}

#-----------------------Transfer Session Variables to Screen variables---------------------

function GetVariablesFromSession()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
$DiveSiteId=$_SESSION['DiveSiteId'];
$DiveSiteStatus=$_SESSION['DiveSiteStatus'];
$DiveSiteEnteredBy=$_SESSION['DiveSiteEnteredBy'];
$DiveSiteDateEntered=$_SESSION['DiveSiteDateEntered'];
$DiveSiteCity=$_SESSION['DiveSiteCity'];
$DiveSiteProvince=$_SESSION['DiveSiteProvince'];
$DiveSiteCountry=$_SESSION['DiveSiteCountry'];
$DiveSiteName=$_SESSION['DiveSiteName'];
$DiveSiteMajorName=$_SESSION['DiveSiteMajorName'];
$DiveSiteMinorName=$_SESSION['DiveSiteMinorName'];
$DiveSiteRating=$_SESSION['DiveSiteRating'];
$DiveSiteType=$_SESSION['DiveSiteType'];
$DiveSiteLevel=$_SESSION['DiveSiteLevel'];
$DiveSiteElevation=$_SESSION['DiveSiteElevation'];
$DiveSiteElevationUnits=$_SESSION['DiveSiteElevationUnits'];
$DiveSiteWater=$_SESSION['DiveSiteWater'];
$DiveSiteDifficulty=$_SESSION['DiveSiteDifficulty'];
$DiveSiteTideTable=$_SESSION['DiveSiteTideTable'];
$DiveSiteTideTableNotes=$_SESSION['DiveSiteTideTableNotes'];
$DiveSiteBestDiveMonths=$_SESSION['DiveSiteBestDiveMonths'];
$DiveSiteTimeRestrictions=$_SESSION['DiveSiteTimeRestrictions'];
$DiveSitePermitRequired=$_SESSION['DiveSitePermitRequired'];
$DiveSiteWinterTemp=$_SESSION['DiveSiteWinterTemp'];
$DiveSiteSummerTemp=$_SESSION['DiveSiteSummerTemp'];
$DiveSiteFallTemp=$_SESSION['DiveSiteFallTemp'];
$DiveSiteSpringTemp=$_SESSION['DiveSiteSpringTemp'];
$DiveSiteDepthMin=$_SESSION['DiveSiteDepthMin'];
$DiveSiteDepthMax=$_SESSION['DiveSiteDepthMax'];
$DiveSiteDepthUnits=$_SESSION['DiveSiteDepthUnits'];
$DiveSiteVisibilityMinimum=$_SESSION['DiveSiteVisibilityMinimum'];
$DiveSiteVisibilityMaximum=$_SESSION['DiveSiteVisibilityMaximum'];
$DiveSiteVisibilityUnits=$_SESSION['DiveSiteVisibilityUnits'];
$DiveSiteHazards=$_SESSION['DiveSiteHazards'];
$DiveSiteHazardNotes=$_SESSION['DiveSiteHazardNotes'];
$DiveSiteBottomComposition=$_SESSION['DiveSiteBottomComposition'];
$DiveSiteCompositionNotes=$_SESSION['DiveSiteCompositionNotes'];
$DiveSiteTelephoneNotes=$_SESSION['DiveSiteTelephoneNotes'];
$DiveSiteFacilities=$_SESSION['DiveSiteFacilities'];
$DiveSiteFacilitiesNotes=$_SESSION['DiveSiteFacilitiesNotes'];
$DiveSiteMedical=$_SESSION['DiveSiteMedical'];
$DiveSiteMedicalNotes=$_SESSION['DiveSiteMedicalNotes'];
$DiveSiteRecommendationNotes=$_SESSION['DiveSiteRecommendationNotes'];
$DiveSiteEAPNotes=$_SESSION['DiveSiteEAPNotes'];
$DiveSiteNotes=$_SESSION['DiveSiteNotes'];
$DiveSiteExactLat=$_SESSION['DiveSiteExactLat'];
$DiveSiteExactLong=$_SESSION['DiveSiteExactLong'];
$DiveSiteShoreLat=$_SESSION['DiveSiteShoreLat'];
$DiveSiteShoreLong=$_SESSION['DiveSiteShoreLong'];
$DiveSiteShoreNotes=$_SESSION['DiveSiteShoreNotes'];
$DiveSiteWebPage=$_SESSION['DiveSiteWebPage'];
$DiveSiteBackground=$_SESSION['DiveSiteBackground'];
return;
}

#----------------------------Get Last Database Record-----------------------------------------
function GetLastRecord($conn,$result)
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
for($i=1;$i<=$NumDiveSiteRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteId=$rowdata[0];
$DiveSiteStatus=$rowdata[1];
$DiveSiteEnteredBy=$rowdata[2];
$DiveSiteDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteRating=$rowdata[10];
$DiveSiteType=$rowdata[11];
$DiveSiteLevel=$rowdata[12];
$DiveSiteElevation=$rowdata[13];
$DiveSiteElevationUnits=$rowdata[14];
$DiveSiteWater=$rowdata[15];
$DiveSiteDifficulty=$rowdata[16];
$DiveSiteTideTable=$rowdata[17];
$DiveSiteTideTableNotes=$rowdata[18];
$DiveSiteBestDiveMonths=$rowdata[19];
$DiveSiteTimeRestrictions=$rowdata[20];
$DiveSitePermitRequired=$rowdata[21];
$DiveSiteWinterTemp=$rowdata[22];
$DiveSiteSummerTemp=$rowdata[23];
$DiveSiteFallTemp=$rowdata[24];
$DiveSiteSpringTemp=$rowdata[25];
$DiveSiteDepthMin=$rowdata[26];
$DiveSiteDepthMax=$rowdata[27];
$DiveSiteDepthUnits=$rowdata[28];
$DiveSiteVisibilityMinimum=$rowdata[29];
$DiveSiteVisibilityMaximum=$rowdata[30];
$DiveSiteVisibilityUnits=$rowdata[31];
$DiveSiteHazards=$rowdata[32];
$DiveSiteHazardNotes=$rowdata[33];
$DiveSiteBottomComposition=$rowdata[34];
$DiveSiteCompositionNotes=$rowdata[35];
$DiveSiteTelephoneNotes=$rowdata[36];
$DiveSiteFacilities=$rowdata[37];
$DiveSiteFacilitiesNotes=$rowdata[38];
$DiveSiteMedical=$rowdata[39];
$DiveSiteMedicalNotes=$rowdata[40];
$DiveSiteRecommendationNotes=$rowdata[41];
$DiveSiteEAPNotes=$rowdata[42];
$DiveSiteNotes=$rowdata[43];
$DiveSiteExactLat=$rowdata[44];
$DiveSiteExactLong=$rowdata[45];
$DiveSiteShoreLat=$rowdata[46];
$DiveSiteShoreLong=$rowdata[47];
$DiveSiteShoreNotes=$rowdata[48];
$DiveSiteWebPage=$rowdata[49];
$DiveSiteBackground=$rowdata[50];
}
PutVariablesIntoSession();
return;
}
#----------------------------Common Form-----------------------------------------------------
function CommonForm ()  {
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
global $Mode;
echo stripslashes("
<TABLE border='1' align='center'><tr><td>
<TABLE cellspacing='5'>
<tr><th valign='top' align ='left' scope='row'>DiveSiteId</th>
<td><input type ='text' NAME='DiveSiteId' VALUE='$DiveSiteId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteId' READONLY><br></td>
</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteStatus</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteStatus' VALUE='$DiveSiteStatus'  SIZE='10' MAXLENGTH='10'  tabindex=2 id ='DiveSiteStatus' 
   onBlur=\"if(isBlank(this.form.DiveSiteStatus.value)) {alert('DiveSiteStatus cannot be blank');this.form.DiveSiteStatus.style.background='Yellow';}else{this.form.DiveSiteStatus.style.background='White';}\"><br></td>");}
else 
{echo ("<td><input type ='text' NAME='DiveSiteStatus' VALUE='$DiveSiteStatus'  SIZE='10' MAXLENGTH='10'  tabindex=2 id ='DiveSiteStatus' 
   onBlur=\"if(isBlank(this.form.DiveSiteStatus.value)) {alert('DiveSiteStatus cannot be blank');this.form.DiveSiteStatus.style.background='Yellow';}else{this.form.DiveSiteStatus.style.background='White';}\"><br></td>");}
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteEnteredBy</th>
");
echo ("<td><input type ='text' NAME='DiveSiteEnteredBy' VALUE='$DiveSiteEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex=3 id ='DiveSiteEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSiteEnteredBy.value)) {alert('DiveSiteEnteredBy cannot be blank');this.form.DiveSiteEnteredBy.style.background='Yellow';}else{this.form.DiveSiteEnteredBy.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteDateEntered</th>
<td><input type ='text' NAME='DiveSiteDateEntered' VALUE='$DiveSiteDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex=4 id ='DiveSiteDateEntered' 
   onBlur=\"if(isBlank(this.form.DiveSiteDateEntered.value)) {alert('DiveSiteDateEntered cannot be blank');this.form.DiveSiteDateEntered.style.background='Yellow';}else{this.form.DiveSiteDateEntered.style.background='White';}\">");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteEdit\'].DiveSiteDateEntered,\'anchor\',\'NNN-dd-yyyy\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteEntry\'].DiveSiteDateEntered,\'anchor\',\'NNN-dd-yyyy\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
echo("</td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteCity</th>
");
echo ("<td><input type ='text' NAME='DiveSiteCity' VALUE='$DiveSiteCity'  SIZE='30' MAXLENGTH='30'  tabindex=5 id ='DiveSiteCity' 
   onBlur=\"if(isBlank(this.form.DiveSiteCity.value)) {alert('DiveSiteCity cannot be blank');this.form.DiveSiteCity.style.background='Yellow';}else{this.form.DiveSiteCity.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteProvince</th>
");
echo ("<td><input type ='text' NAME='DiveSiteProvince' VALUE='$DiveSiteProvince'  SIZE='15' MAXLENGTH='15'  tabindex=6 id ='DiveSiteProvince' 
   onBlur=\"if(isBlank(this.form.DiveSiteProvince.value)) {alert('DiveSiteProvince cannot be blank');this.form.DiveSiteProvince.style.background='Yellow';}else{this.form.DiveSiteProvince.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteCountry</th>
");
echo ("<td><input type ='text' NAME='DiveSiteCountry' VALUE='$DiveSiteCountry'  SIZE='15' MAXLENGTH='15'  tabindex=7 id ='DiveSiteCountry' 
   onBlur=\"if(isBlank(this.form.DiveSiteCountry.value)) {alert('DiveSiteCountry cannot be blank');this.form.DiveSiteCountry.style.background='Yellow';}else{this.form.DiveSiteCountry.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteName</th>
");
echo ("<td><input type ='text' NAME='DiveSiteName' VALUE='$DiveSiteName'  SIZE='80' MAXLENGTH='80'  tabindex=8 id ='DiveSiteName' 
   onBlur=\"if(isBlank(this.form.DiveSiteName.value)) {alert('DiveSiteName cannot be blank');this.form.DiveSiteName.style.background='Yellow';}else{this.form.DiveSiteName.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMajorName</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMajorName' VALUE='$DiveSiteMajorName'  SIZE='80' MAXLENGTH='80'  tabindex=9 id ='DiveSiteMajorName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMajorName.value)) {alert('DiveSiteMajorName cannot be blank');this.form.DiveSiteMajorName.style.background='Yellow';}else{this.form.DiveSiteMajorName.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMinorName</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMinorName' VALUE='$DiveSiteMinorName'  SIZE='80' MAXLENGTH='80'  tabindex=10 id ='DiveSiteMinorName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMinorName.value)) {alert('DiveSiteMinorName cannot be blank');this.form.DiveSiteMinorName.style.background='Yellow';}else{this.form.DiveSiteMinorName.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteRating</th>
");
echo ("<td><input type ='text' NAME='DiveSiteRating' VALUE='$DiveSiteRating'  SIZE='10' MAXLENGTH='10'  tabindex=11 id ='DiveSiteRating' 
   onBlur=\"if(isBlank(this.form.DiveSiteRating.value)) {alert('DiveSiteRating cannot be blank');this.form.DiveSiteRating.style.background='Yellow';}else{this.form.DiveSiteRating.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteType</th>
");
echo ("<td><input type ='text' NAME='DiveSiteType' VALUE='$DiveSiteType'  SIZE='15' MAXLENGTH='15'  tabindex=12 id ='DiveSiteType' 
   onBlur=\"if(isBlank(this.form.DiveSiteType.value)) {alert('DiveSiteType cannot be blank');this.form.DiveSiteType.style.background='Yellow';}else{this.form.DiveSiteType.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteLevel</th>
");
echo ("<td><input type ='text' NAME='DiveSiteLevel' VALUE='$DiveSiteLevel'  SIZE='15' MAXLENGTH='15'  tabindex=13 id ='DiveSiteLevel' 
   onBlur=\"if(isBlank(this.form.DiveSiteLevel.value)) {alert('DiveSiteLevel cannot be blank');this.form.DiveSiteLevel.style.background='Yellow';}else{this.form.DiveSiteLevel.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteElevation</th>
");
echo ("<td><input type ='text' NAME='DiveSiteElevation' VALUE='$DiveSiteElevation'  SIZE='11' MAXLENGTH='11'  tabindex=14 id ='DiveSiteElevation' 
   onBlur=\"if(isBlank(this.form.DiveSiteElevation.value)) {alert('DiveSiteElevation cannot be blank');this.form.DiveSiteElevation.style.background='Yellow';}else{this.form.DiveSiteElevation.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteElevationUnits</th>
");
echo ("<td><input type ='text' NAME='DiveSiteElevationUnits' VALUE='$DiveSiteElevationUnits'  SIZE='5' MAXLENGTH='5'  tabindex=15 id ='DiveSiteElevationUnits' 
   onBlur=\"if(isBlank(this.form.DiveSiteElevationUnits.value)) {alert('DiveSiteElevationUnits cannot be blank');this.form.DiveSiteElevationUnits.style.background='Yellow';}else{this.form.DiveSiteElevationUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteWater</th>
");
echo ("<td><input type ='text' NAME='DiveSiteWater' VALUE='$DiveSiteWater'  SIZE='50' MAXLENGTH='50'  tabindex=16 id ='DiveSiteWater' 
   onBlur=\"if(isBlank(this.form.DiveSiteWater.value)) {alert('DiveSiteWater cannot be blank');this.form.DiveSiteWater.style.background='Yellow';}else{this.form.DiveSiteWater.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteDifficulty</th>
");
echo ("<td><input type ='text' NAME='DiveSiteDifficulty' VALUE='$DiveSiteDifficulty'  SIZE='20' MAXLENGTH='20'  tabindex=17 id ='DiveSiteDifficulty' 
   onBlur=\"if(isBlank(this.form.DiveSiteDifficulty.value)) {alert('DiveSiteDifficulty cannot be blank');this.form.DiveSiteDifficulty.style.background='Yellow';}else{this.form.DiveSiteDifficulty.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteTideTable</th>
");
echo ("<td><input type ='text' NAME='DiveSiteTideTable' VALUE='$DiveSiteTideTable'  SIZE='80' MAXLENGTH='80'  tabindex=18 id ='DiveSiteTideTable' 
   onBlur=\"if(isBlank(this.form.DiveSiteTideTable.value)) {alert('DiveSiteTideTable cannot be blank');this.form.DiveSiteTideTable.style.background='Yellow';}else{this.form.DiveSiteTideTable.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteTideTableNotes</th>
<td><TEXTAREA NAME='DiveSiteTideTableNotes' COLS=100 ROW=3 TABINDEX=19>$DiveSiteTideTableNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteBestDiveMonths</th>
");
echo ("<td><input type ='text' NAME='DiveSiteBestDiveMonths' VALUE='$DiveSiteBestDiveMonths'  SIZE='15' MAXLENGTH='15'  tabindex=20 id ='DiveSiteBestDiveMonths' 
   onBlur=\"if(isBlank(this.form.DiveSiteBestDiveMonths.value)) {alert('DiveSiteBestDiveMonths cannot be blank');this.form.DiveSiteBestDiveMonths.style.background='Yellow';}else{this.form.DiveSiteBestDiveMonths.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteTimeRestrictions</th>
");
echo ("<td><input type ='text' NAME='DiveSiteTimeRestrictions' VALUE='$DiveSiteTimeRestrictions'  SIZE='50' MAXLENGTH='50'  tabindex=21 id ='DiveSiteTimeRestrictions' 
   onBlur=\"if(isBlank(this.form.DiveSiteTimeRestrictions.value)) {alert('DiveSiteTimeRestrictions cannot be blank');this.form.DiveSiteTimeRestrictions.style.background='Yellow';}else{this.form.DiveSiteTimeRestrictions.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSitePermitRequired</th>
");
echo ("<td><input type ='text' NAME='DiveSitePermitRequired' VALUE='$DiveSitePermitRequired'  SIZE='50' MAXLENGTH='50'  tabindex=22 id ='DiveSitePermitRequired' 
   onBlur=\"if(isBlank(this.form.DiveSitePermitRequired.value)) {alert('DiveSitePermitRequired cannot be blank');this.form.DiveSitePermitRequired.style.background='Yellow';}else{this.form.DiveSitePermitRequired.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteWinterTemp</th>
");
echo ("<td><input type ='text' NAME='DiveSiteWinterTemp' VALUE='$DiveSiteWinterTemp'  SIZE='11' MAXLENGTH='11'  tabindex=23 id ='DiveSiteWinterTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteWinterTemp.value)) {alert('DiveSiteWinterTemp cannot be blank');this.form.DiveSiteWinterTemp.style.background='Yellow';}else{this.form.DiveSiteWinterTemp.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteSummerTemp</th>
");
echo ("<td><input type ='text' NAME='DiveSiteSummerTemp' VALUE='$DiveSiteSummerTemp'  SIZE='11' MAXLENGTH='11'  tabindex=24 id ='DiveSiteSummerTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteSummerTemp.value)) {alert('DiveSiteSummerTemp cannot be blank');this.form.DiveSiteSummerTemp.style.background='Yellow';}else{this.form.DiveSiteSummerTemp.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteFallTemp</th>
");
echo ("<td><input type ='text' NAME='DiveSiteFallTemp' VALUE='$DiveSiteFallTemp'  SIZE='11' MAXLENGTH='11'  tabindex=25 id ='DiveSiteFallTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteFallTemp.value)) {alert('DiveSiteFallTemp cannot be blank');this.form.DiveSiteFallTemp.style.background='Yellow';}else{this.form.DiveSiteFallTemp.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteSpringTemp</th>
");
echo ("<td><input type ='text' NAME='DiveSiteSpringTemp' VALUE='$DiveSiteSpringTemp'  SIZE='11' MAXLENGTH='11'  tabindex=26 id ='DiveSiteSpringTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteSpringTemp.value)) {alert('DiveSiteSpringTemp cannot be blank');this.form.DiveSiteSpringTemp.style.background='Yellow';}else{this.form.DiveSiteSpringTemp.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteDepthMin</th>
");
echo ("<td><input type ='text' NAME='DiveSiteDepthMin' VALUE='$DiveSiteDepthMin'  SIZE='80' MAXLENGTH='80'  tabindex=27 id ='DiveSiteDepthMin' 
   onBlur=\"if(isBlank(this.form.DiveSiteDepthMin.value)) {alert('DiveSiteDepthMin cannot be blank');this.form.DiveSiteDepthMin.style.background='Yellow';}else{this.form.DiveSiteDepthMin.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteDepthMax</th>
");
echo ("<td><input type ='text' NAME='DiveSiteDepthMax' VALUE='$DiveSiteDepthMax'  SIZE='11' MAXLENGTH='11'  tabindex=28 id ='DiveSiteDepthMax' 
   onBlur=\"if(isBlank(this.form.DiveSiteDepthMax.value)) {alert('DiveSiteDepthMax cannot be blank');this.form.DiveSiteDepthMax.style.background='Yellow';}else{this.form.DiveSiteDepthMax.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteDepthUnits</th>
");
echo ("<td><input type ='text' NAME='DiveSiteDepthUnits' VALUE='$DiveSiteDepthUnits'  SIZE='5' MAXLENGTH='5'  tabindex=29 id ='DiveSiteDepthUnits' 
   onBlur=\"if(isBlank(this.form.DiveSiteDepthUnits.value)) {alert('DiveSiteDepthUnits cannot be blank');this.form.DiveSiteDepthUnits.style.background='Yellow';}else{this.form.DiveSiteDepthUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteVisibilityMinimum</th>
");
echo ("<td><input type ='text' NAME='DiveSiteVisibilityMinimum' VALUE='$DiveSiteVisibilityMinimum'  SIZE='11' MAXLENGTH='11'  tabindex=30 id ='DiveSiteVisibilityMinimum' 
   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityMinimum.value)) {alert('DiveSiteVisibilityMinimum cannot be blank');this.form.DiveSiteVisibilityMinimum.style.background='Yellow';}else{this.form.DiveSiteVisibilityMinimum.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteVisibilityMaximum</th>
");
echo ("<td><input type ='text' NAME='DiveSiteVisibilityMaximum' VALUE='$DiveSiteVisibilityMaximum'  SIZE='11' MAXLENGTH='11'  tabindex=31 id ='DiveSiteVisibilityMaximum' 
   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityMaximum.value)) {alert('DiveSiteVisibilityMaximum cannot be blank');this.form.DiveSiteVisibilityMaximum.style.background='Yellow';}else{this.form.DiveSiteVisibilityMaximum.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteVisibilityUnits</th>
");
echo ("<td><input type ='text' NAME='DiveSiteVisibilityUnits' VALUE='$DiveSiteVisibilityUnits'  SIZE='15' MAXLENGTH='15'  tabindex=32 id ='DiveSiteVisibilityUnits' 
   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityUnits.value)) {alert('DiveSiteVisibilityUnits cannot be blank');this.form.DiveSiteVisibilityUnits.style.background='Yellow';}else{this.form.DiveSiteVisibilityUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteHazards</th>
");
echo ("<td><input type ='text' NAME='DiveSiteHazards' VALUE='$DiveSiteHazards'  SIZE='50' MAXLENGTH='50'  tabindex=33 id ='DiveSiteHazards' 
   onBlur=\"if(isBlank(this.form.DiveSiteHazards.value)) {alert('DiveSiteHazards cannot be blank');this.form.DiveSiteHazards.style.background='Yellow';}else{this.form.DiveSiteHazards.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteHazardNotes</th>
<td><TEXTAREA NAME='DiveSiteHazardNotes' COLS=100 ROW=3 TABINDEX=34>$DiveSiteHazardNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteBottomComposition</th>
");
echo ("<td><input type ='text' NAME='DiveSiteBottomComposition' VALUE='$DiveSiteBottomComposition'  SIZE='50' MAXLENGTH='50'  tabindex=35 id ='DiveSiteBottomComposition' 
   onBlur=\"if(isBlank(this.form.DiveSiteBottomComposition.value)) {alert('DiveSiteBottomComposition cannot be blank');this.form.DiveSiteBottomComposition.style.background='Yellow';}else{this.form.DiveSiteBottomComposition.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteCompositionNotes</th>
<td><TEXTAREA NAME='DiveSiteCompositionNotes' COLS=100 ROW=3 TABINDEX=36>$DiveSiteCompositionNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteTelephoneNotes</th>
<td><TEXTAREA NAME='DiveSiteTelephoneNotes' COLS=100 ROW=3 TABINDEX=37>$DiveSiteTelephoneNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteFacilities</th>
");

GetCheckBoxRecords($NumDiveSiteFacilitiesRecordsDesired,$DiveSiteFacilitiesIdArray,$DiveSiteFacilitiesRankArray,$DiveSiteFacilitiesDescriptionArray,'DiveSiteFacilities',$DiveSiteFacilityNames);

PutCheckVariablesIntoSession($DiveSiteFacilityNames,$DiveSiteFacilitiesIdArray,$DiveSiteFacilitiesRankArray,$DiveSiteFacilitiesDescriptionArray);
$DisplayColumns=4; $colcount=0;
echo('<td><table>');
echo('<tr>');
for($i=0;$i < $NumDiveSiteFacilitiesRecordsDesired;$i++)
{
	
	echo('<td><input type="checkbox" name="DiveFacility[]" value ="'.$DiveSiteFacilitiesDescriptionArray[$i].'" onclick="enableElement(this.form.elements[\'DiveSiteFacilitiesNotes\'],this.form.elements[\'DiveFacility[]\']);" />'.$DiveSiteFacilitiesDescriptionArray[$i].'</td>');
	
	$colcount++;
	if($colcount==$DisplayColumns)
	 {
	 	 echo('</tr><tr>');$colcount=0;
	 }	 
}
if($colcount !=0)
 {
	 	 echo('</tr>');$colcount=0;
 }	
 
 
 #echo('<tr><td><input type="text" name="DiveSiteFacilitiesNotes" disabled="disabled"></td></tr>');
 echo('</table></td>');




#echo ("<td><input type ='text' NAME='DiveSiteFacilities' VALUE='$DiveSiteFacilities'  SIZE='50' MAXLENGTH='50'  tabindex=38 id ='DiveSiteFacilities' 
#   onBlur=\"if(isBlank(this.form.DiveSiteFacilities.value)) {alert('DiveSiteFacilities cannot be blank');this.form.DiveSiteFacilities.style.background='Yellow';}else{this.form.DiveSiteFacilities.style.background='White';}\"><br></td>");







echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteFacilitiesNotes</th>
<td><TEXTAREA NAME='DiveSiteFacilitiesNotes' COLS=100 ROW=3 TABINDEX=39>$DiveSiteFacilitiesNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMedical</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMedical' VALUE='$DiveSiteMedical'  SIZE='50' MAXLENGTH='50'  tabindex=40 id ='DiveSiteMedical' 
   onBlur=\"if(isBlank(this.form.DiveSiteMedical.value)) {alert('DiveSiteMedical cannot be blank');this.form.DiveSiteMedical.style.background='Yellow';}else{this.form.DiveSiteMedical.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMedicalNotes</th>
<td><TEXTAREA NAME='DiveSiteMedicalNotes' COLS=100 ROW=3 TABINDEX=41>$DiveSiteMedicalNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteRecommendationNotes</th>
<td><TEXTAREA NAME='DiveSiteRecommendationNotes' COLS=100 ROW=3 TABINDEX=42>$DiveSiteRecommendationNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteEAPNotes</th>
<td><TEXTAREA NAME='DiveSiteEAPNotes' COLS=100 ROW=3 TABINDEX=43>$DiveSiteEAPNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteNotes</th>
<td><TEXTAREA NAME='DiveSiteNotes' COLS=100 ROW=3 TABINDEX=44>$DiveSiteNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteExactLat</th>
");
echo ("<td><input type ='text' NAME='DiveSiteExactLat' VALUE='$DiveSiteExactLat'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=45 id ='DiveSiteExactLat' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLat.value)) {alert('DiveSiteExactLat cannot be blank');this.form.DiveSiteExactLat.style.background='Yellow';}else{this.form.DiveSiteExactLat.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteExactLong</th>
");
echo ("<td><input type ='text' NAME='DiveSiteExactLong' VALUE='$DiveSiteExactLong'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=46 id ='DiveSiteExactLong' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLong.value)) {alert('DiveSiteExactLong cannot be blank');this.form.DiveSiteExactLong.style.background='Yellow';}else{this.form.DiveSiteExactLong.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteShoreLat</th>
");
echo ("<td><input type ='text' NAME='DiveSiteShoreLat' VALUE='$DiveSiteShoreLat'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=47 id ='DiveSiteShoreLat' 
   onBlur=\"if(isBlank(this.form.DiveSiteShoreLat.value)) {alert('DiveSiteShoreLat cannot be blank');this.form.DiveSiteShoreLat.style.background='Yellow';}else{this.form.DiveSiteShoreLat.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteShoreLong</th>
");
echo ("<td><input type ='text' NAME='DiveSiteShoreLong' VALUE='$DiveSiteShoreLong'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=48 id ='DiveSiteShoreLong' 
   onBlur=\"if(isBlank(this.form.DiveSiteShoreLong.value)) {alert('DiveSiteShoreLong cannot be blank');this.form.DiveSiteShoreLong.style.background='Yellow';}else{this.form.DiveSiteShoreLong.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteShoreNotes</th>
<td><TEXTAREA NAME='DiveSiteShoreNotes' COLS=100 ROW=3 TABINDEX=49>$DiveSiteShoreNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteWebPage</th>
");
echo ("<td><input type ='text' NAME='DiveSiteWebPage' VALUE='$DiveSiteWebPage'  SIZE='150' MAXLENGTH='150'  tabindex=50 id ='DiveSiteWebPage' 
   onBlur=\"if(isBlank(this.form.DiveSiteWebPage.value)) {alert('DiveSiteWebPage cannot be blank');this.form.DiveSiteWebPage.style.background='Yellow';}else{this.form.DiveSiteWebPage.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteBackground</th>
");
echo ("<td><input type ='text' NAME='DiveSiteBackground' VALUE='$DiveSiteBackground'  SIZE='150' MAXLENGTH='150'  tabindex=51 id ='DiveSiteBackground' 
   onBlur=\"if(isBlank(this.form.DiveSiteBackground.value)) {alert('DiveSiteBackground cannot be blank');this.form.DiveSiteBackground.style.background='Yellow';}else{this.form.DiveSiteBackground.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
");}
#----------------------------Entry Form----------------------------------------------------

function AddForm ()  {
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
global $Mode;
$Mode='ADD';
echo stripslashes("
<FORM NAME='DiveSiteEntry' action='DiveSite.php' method='POST'>");
CommonForm();
echo stripslashes("
<td colspan =2 align='center'>
<input type ='SUBMIT' NAME='display_button' Value = 'Cancel Add'>
<input type ='SUBMIT' NAME='display_button' Value = 'Submit Add'>
</td>
</tr>");
if ($_SESSION['SystemMessage']!='')
   {
   	 echo("<tr><td align='center' colspan=2>".$_SESSION['SystemMessage']."</td></tr>");
   	 $_SESSION['SystemMessage']="";
   }
echo stripslashes("
</TABLE>
</td></tr></TABLE>
</FORM>");}
#----------------------------Edit Form---------------------------------------------------

function EditForm ()  {
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
global $Mode;
$Mode='EDIT';
echo stripslashes("
<FORM NAME='DiveSiteEdit' action='DiveSite.php' method='POST'>");
CommonForm();
echo stripslashes("
<td colspan =2 align='center'>
<input type ='SUBMIT' NAME='display_button' Value = 'Cancel Edit'>
<input type ='SUBMIT' NAME='display_button' Value = 'Submit Changes'>
</td>
</tr>
</TABLE>
</td></tr></TABLE>
</FORM>");}
#-----------------------------Display Form------------------------------------------------

function DisplayForm ()  {
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
echo stripslashes("
<FORM NAME='DiveSiteDisplay' action='DiveSite.php' method='POST'>
<TABLE  align='center' border='1'><tr><td>
<TABLE cellspacing='5'>
<tr><th align ='left' valign='top' scope='row'>DiveSiteId</th>
<td><input type ='text' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteId' READONLY><br></td>
</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteStatus</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteStatus' VALUE='$DiveSiteStatus'  SIZE='10' MAXLENGTH='10'  tabindex=2 id ='DiveSiteStatus' 
   onBlur=\"if(isBlank(this.form.DiveSiteStatus.value)) {alert('DiveSiteStatus cannot be blank');this.form.DiveSiteStatus.style.background='Yellow';}else{this.form.DiveSiteStatus.style.background='White';}\"><br></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteStatus' VALUE='$DiveSiteStatus'  SIZE='10' MAXLENGTH='10'  tabindex=2 id ='DiveSiteStatus' 
   onBlur=\"if(isBlank(this.form.DiveSiteStatus.value)) {alert('DiveSiteStatus cannot be blank');this.form.DiveSiteStatus.style.background='Yellow';}else{this.form.DiveSiteStatus.style.background='White';}\"><br></td>");}
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteEnteredBy</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteEnteredBy' VALUE='$DiveSiteEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex=3 id ='DiveSiteEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSiteEnteredBy.value)) {alert('DiveSiteEnteredBy cannot be blank');this.form.DiveSiteEnteredBy.style.background='Yellow';}else{this.form.DiveSiteEnteredBy.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteDateEntered</th>
<td><input type ='text'READONLY NAME='DiveSiteDateEntered' VALUE='$DiveSiteDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex=4 id ='DiveSiteDateEntered'>");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteEdit\'].DiveSiteDateEntered,\'anchor\',\'NNN-dd-yyyy\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteEntry\'].DiveSiteDateEntered,\'anchor\',\'NNN-dd-yyyy\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
echo("</td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteCity</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteCity' VALUE='$DiveSiteCity'  SIZE='30' MAXLENGTH='30'  tabindex=5 id ='DiveSiteCity' 
   onBlur=\"if(isBlank(this.form.DiveSiteCity.value)) {alert('DiveSiteCity cannot be blank');this.form.DiveSiteCity.style.background='Yellow';}else{this.form.DiveSiteCity.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteProvince</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteProvince' VALUE='$DiveSiteProvince'  SIZE='15' MAXLENGTH='15'  tabindex=6 id ='DiveSiteProvince' 
   onBlur=\"if(isBlank(this.form.DiveSiteProvince.value)) {alert('DiveSiteProvince cannot be blank');this.form.DiveSiteProvince.style.background='Yellow';}else{this.form.DiveSiteProvince.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteCountry</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteCountry' VALUE='$DiveSiteCountry'  SIZE='15' MAXLENGTH='15'  tabindex=7 id ='DiveSiteCountry' 
   onBlur=\"if(isBlank(this.form.DiveSiteCountry.value)) {alert('DiveSiteCountry cannot be blank');this.form.DiveSiteCountry.style.background='Yellow';}else{this.form.DiveSiteCountry.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteName</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteName' VALUE='$DiveSiteName'  SIZE='80' MAXLENGTH='80'  tabindex=8 id ='DiveSiteName' 
   onBlur=\"if(isBlank(this.form.DiveSiteName.value)) {alert('DiveSiteName cannot be blank');this.form.DiveSiteName.style.background='Yellow';}else{this.form.DiveSiteName.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMajorName</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMajorName' VALUE='$DiveSiteMajorName'  SIZE='80' MAXLENGTH='80'  tabindex=9 id ='DiveSiteMajorName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMajorName.value)) {alert('DiveSiteMajorName cannot be blank');this.form.DiveSiteMajorName.style.background='Yellow';}else{this.form.DiveSiteMajorName.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMinorName</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMinorName' VALUE='$DiveSiteMinorName'  SIZE='80' MAXLENGTH='80'  tabindex=10 id ='DiveSiteMinorName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMinorName.value)) {alert('DiveSiteMinorName cannot be blank');this.form.DiveSiteMinorName.style.background='Yellow';}else{this.form.DiveSiteMinorName.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteRating</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteRating' VALUE='$DiveSiteRating'  SIZE='10' MAXLENGTH='10'  tabindex=11 id ='DiveSiteRating' 
   onBlur=\"if(isBlank(this.form.DiveSiteRating.value)) {alert('DiveSiteRating cannot be blank');this.form.DiveSiteRating.style.background='Yellow';}else{this.form.DiveSiteRating.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteType</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteType' VALUE='$DiveSiteType'  SIZE='15' MAXLENGTH='15'  tabindex=12 id ='DiveSiteType' 
   onBlur=\"if(isBlank(this.form.DiveSiteType.value)) {alert('DiveSiteType cannot be blank');this.form.DiveSiteType.style.background='Yellow';}else{this.form.DiveSiteType.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteLevel</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteLevel' VALUE='$DiveSiteLevel'  SIZE='15' MAXLENGTH='15'  tabindex=13 id ='DiveSiteLevel' 
   onBlur=\"if(isBlank(this.form.DiveSiteLevel.value)) {alert('DiveSiteLevel cannot be blank');this.form.DiveSiteLevel.style.background='Yellow';}else{this.form.DiveSiteLevel.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteElevation</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteElevation' VALUE='$DiveSiteElevation'  SIZE='11' MAXLENGTH='11'  tabindex=14 id ='DiveSiteElevation' 
   onBlur=\"if(isBlank(this.form.DiveSiteElevation.value)) {alert('DiveSiteElevation cannot be blank');this.form.DiveSiteElevation.style.background='Yellow';}else{this.form.DiveSiteElevation.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteElevationUnits</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteElevationUnits' VALUE='$DiveSiteElevationUnits'  SIZE='5' MAXLENGTH='5'  tabindex=15 id ='DiveSiteElevationUnits' 
   onBlur=\"if(isBlank(this.form.DiveSiteElevationUnits.value)) {alert('DiveSiteElevationUnits cannot be blank');this.form.DiveSiteElevationUnits.style.background='Yellow';}else{this.form.DiveSiteElevationUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteWater</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteWater' VALUE='$DiveSiteWater'  SIZE='50' MAXLENGTH='50'  tabindex=16 id ='DiveSiteWater' 
   onBlur=\"if(isBlank(this.form.DiveSiteWater.value)) {alert('DiveSiteWater cannot be blank');this.form.DiveSiteWater.style.background='Yellow';}else{this.form.DiveSiteWater.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteDifficulty</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteDifficulty' VALUE='$DiveSiteDifficulty'  SIZE='20' MAXLENGTH='20'  tabindex=17 id ='DiveSiteDifficulty' 
   onBlur=\"if(isBlank(this.form.DiveSiteDifficulty.value)) {alert('DiveSiteDifficulty cannot be blank');this.form.DiveSiteDifficulty.style.background='Yellow';}else{this.form.DiveSiteDifficulty.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteTideTable</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteTideTable' VALUE='$DiveSiteTideTable'  SIZE='80' MAXLENGTH='80'  tabindex=18 id ='DiveSiteTideTable' 
   onBlur=\"if(isBlank(this.form.DiveSiteTideTable.value)) {alert('DiveSiteTideTable cannot be blank');this.form.DiveSiteTideTable.style.background='Yellow';}else{this.form.DiveSiteTideTable.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteTideTableNotes</th>
<td><TEXTAREA NAME='DiveSiteTideTableNotes' READONLY COLS=100 ROW=3 TABINDEX=19>$DiveSiteTideTableNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteBestDiveMonths</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteBestDiveMonths' VALUE='$DiveSiteBestDiveMonths'  SIZE='15' MAXLENGTH='15'  tabindex=20 id ='DiveSiteBestDiveMonths' 
   onBlur=\"if(isBlank(this.form.DiveSiteBestDiveMonths.value)) {alert('DiveSiteBestDiveMonths cannot be blank');this.form.DiveSiteBestDiveMonths.style.background='Yellow';}else{this.form.DiveSiteBestDiveMonths.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteTimeRestrictions</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteTimeRestrictions' VALUE='$DiveSiteTimeRestrictions'  SIZE='50' MAXLENGTH='50'  tabindex=21 id ='DiveSiteTimeRestrictions' 
   onBlur=\"if(isBlank(this.form.DiveSiteTimeRestrictions.value)) {alert('DiveSiteTimeRestrictions cannot be blank');this.form.DiveSiteTimeRestrictions.style.background='Yellow';}else{this.form.DiveSiteTimeRestrictions.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSitePermitRequired</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSitePermitRequired' VALUE='$DiveSitePermitRequired'  SIZE='50' MAXLENGTH='50'  tabindex=22 id ='DiveSitePermitRequired' 
   onBlur=\"if(isBlank(this.form.DiveSitePermitRequired.value)) {alert('DiveSitePermitRequired cannot be blank');this.form.DiveSitePermitRequired.style.background='Yellow';}else{this.form.DiveSitePermitRequired.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteWinterTemp</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteWinterTemp' VALUE='$DiveSiteWinterTemp'  SIZE='11' MAXLENGTH='11'  tabindex=23 id ='DiveSiteWinterTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteWinterTemp.value)) {alert('DiveSiteWinterTemp cannot be blank');this.form.DiveSiteWinterTemp.style.background='Yellow';}else{this.form.DiveSiteWinterTemp.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSummerTemp</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteSummerTemp' VALUE='$DiveSiteSummerTemp'  SIZE='11' MAXLENGTH='11'  tabindex=24 id ='DiveSiteSummerTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteSummerTemp.value)) {alert('DiveSiteSummerTemp cannot be blank');this.form.DiveSiteSummerTemp.style.background='Yellow';}else{this.form.DiveSiteSummerTemp.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteFallTemp</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteFallTemp' VALUE='$DiveSiteFallTemp'  SIZE='11' MAXLENGTH='11'  tabindex=25 id ='DiveSiteFallTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteFallTemp.value)) {alert('DiveSiteFallTemp cannot be blank');this.form.DiveSiteFallTemp.style.background='Yellow';}else{this.form.DiveSiteFallTemp.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSpringTemp</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteSpringTemp' VALUE='$DiveSiteSpringTemp'  SIZE='11' MAXLENGTH='11'  tabindex=26 id ='DiveSiteSpringTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteSpringTemp.value)) {alert('DiveSiteSpringTemp cannot be blank');this.form.DiveSiteSpringTemp.style.background='Yellow';}else{this.form.DiveSiteSpringTemp.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteDepthMin</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteDepthMin' VALUE='$DiveSiteDepthMin'  SIZE='80' MAXLENGTH='80'  tabindex=27 id ='DiveSiteDepthMin' 
   onBlur=\"if(isBlank(this.form.DiveSiteDepthMin.value)) {alert('DiveSiteDepthMin cannot be blank');this.form.DiveSiteDepthMin.style.background='Yellow';}else{this.form.DiveSiteDepthMin.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteDepthMax</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteDepthMax' VALUE='$DiveSiteDepthMax'  SIZE='11' MAXLENGTH='11'  tabindex=28 id ='DiveSiteDepthMax' 
   onBlur=\"if(isBlank(this.form.DiveSiteDepthMax.value)) {alert('DiveSiteDepthMax cannot be blank');this.form.DiveSiteDepthMax.style.background='Yellow';}else{this.form.DiveSiteDepthMax.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteDepthUnits</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteDepthUnits' VALUE='$DiveSiteDepthUnits'  SIZE='5' MAXLENGTH='5'  tabindex=29 id ='DiveSiteDepthUnits' 
   onBlur=\"if(isBlank(this.form.DiveSiteDepthUnits.value)) {alert('DiveSiteDepthUnits cannot be blank');this.form.DiveSiteDepthUnits.style.background='Yellow';}else{this.form.DiveSiteDepthUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteVisibilityMinimum</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteVisibilityMinimum' VALUE='$DiveSiteVisibilityMinimum'  SIZE='11' MAXLENGTH='11'  tabindex=30 id ='DiveSiteVisibilityMinimum' 
   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityMinimum.value)) {alert('DiveSiteVisibilityMinimum cannot be blank');this.form.DiveSiteVisibilityMinimum.style.background='Yellow';}else{this.form.DiveSiteVisibilityMinimum.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteVisibilityMaximum</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteVisibilityMaximum' VALUE='$DiveSiteVisibilityMaximum'  SIZE='11' MAXLENGTH='11'  tabindex=31 id ='DiveSiteVisibilityMaximum' 
   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityMaximum.value)) {alert('DiveSiteVisibilityMaximum cannot be blank');this.form.DiveSiteVisibilityMaximum.style.background='Yellow';}else{this.form.DiveSiteVisibilityMaximum.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteVisibilityUnits</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteVisibilityUnits' VALUE='$DiveSiteVisibilityUnits'  SIZE='15' MAXLENGTH='15'  tabindex=32 id ='DiveSiteVisibilityUnits' 
   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityUnits.value)) {alert('DiveSiteVisibilityUnits cannot be blank');this.form.DiveSiteVisibilityUnits.style.background='Yellow';}else{this.form.DiveSiteVisibilityUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteHazards</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteHazards' VALUE='$DiveSiteHazards'  SIZE='50' MAXLENGTH='50'  tabindex=33 id ='DiveSiteHazards' 
   onBlur=\"if(isBlank(this.form.DiveSiteHazards.value)) {alert('DiveSiteHazards cannot be blank');this.form.DiveSiteHazards.style.background='Yellow';}else{this.form.DiveSiteHazards.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteHazardNotes</th>
<td><TEXTAREA NAME='DiveSiteHazardNotes' READONLY COLS=100 ROW=3 TABINDEX=34>$DiveSiteHazardNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteBottomComposition</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteBottomComposition' VALUE='$DiveSiteBottomComposition'  SIZE='50' MAXLENGTH='50'  tabindex=35 id ='DiveSiteBottomComposition' 
   onBlur=\"if(isBlank(this.form.DiveSiteBottomComposition.value)) {alert('DiveSiteBottomComposition cannot be blank');this.form.DiveSiteBottomComposition.style.background='Yellow';}else{this.form.DiveSiteBottomComposition.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteCompositionNotes</th>
<td><TEXTAREA NAME='DiveSiteCompositionNotes' READONLY COLS=100 ROW=3 TABINDEX=36>$DiveSiteCompositionNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteTelephoneNotes</th>
<td><TEXTAREA NAME='DiveSiteTelephoneNotes' READONLY COLS=100 ROW=3 TABINDEX=37>$DiveSiteTelephoneNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteFacilities</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteFacilities' VALUE='$DiveSiteFacilities'  SIZE='50' MAXLENGTH='50'  tabindex=38 id ='DiveSiteFacilities' 
   onBlur=\"if(isBlank(this.form.DiveSiteFacilities.value)) {alert('DiveSiteFacilities cannot be blank');this.form.DiveSiteFacilities.style.background='Yellow';}else{this.form.DiveSiteFacilities.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteFacilitiesNotes</th>
<td><TEXTAREA NAME='DiveSiteFacilitiesNotes' READONLY COLS=100 ROW=3 TABINDEX=39>$DiveSiteFacilitiesNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMedical</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMedical' VALUE='$DiveSiteMedical'  SIZE='50' MAXLENGTH='50'  tabindex=40 id ='DiveSiteMedical' 
   onBlur=\"if(isBlank(this.form.DiveSiteMedical.value)) {alert('DiveSiteMedical cannot be blank');this.form.DiveSiteMedical.style.background='Yellow';}else{this.form.DiveSiteMedical.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMedicalNotes</th>
<td><TEXTAREA NAME='DiveSiteMedicalNotes' READONLY COLS=100 ROW=3 TABINDEX=41>$DiveSiteMedicalNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteRecommendationNotes</th>
<td><TEXTAREA NAME='DiveSiteRecommendationNotes' READONLY COLS=100 ROW=3 TABINDEX=42>$DiveSiteRecommendationNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteEAPNotes</th>
<td><TEXTAREA NAME='DiveSiteEAPNotes' READONLY COLS=100 ROW=3 TABINDEX=43>$DiveSiteEAPNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteNotes</th>
<td><TEXTAREA NAME='DiveSiteNotes' READONLY COLS=100 ROW=3 TABINDEX=44>$DiveSiteNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteExactLat</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteExactLat' VALUE='$DiveSiteExactLat'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=45 id ='DiveSiteExactLat' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLat.value)) {alert('DiveSiteExactLat cannot be blank');this.form.DiveSiteExactLat.style.background='Yellow';}else{this.form.DiveSiteExactLat.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteExactLong</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteExactLong' VALUE='$DiveSiteExactLong'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=46 id ='DiveSiteExactLong' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLong.value)) {alert('DiveSiteExactLong cannot be blank');this.form.DiveSiteExactLong.style.background='Yellow';}else{this.form.DiveSiteExactLong.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteShoreLat</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteShoreLat' VALUE='$DiveSiteShoreLat'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=47 id ='DiveSiteShoreLat' 
   onBlur=\"if(isBlank(this.form.DiveSiteShoreLat.value)) {alert('DiveSiteShoreLat cannot be blank');this.form.DiveSiteShoreLat.style.background='Yellow';}else{this.form.DiveSiteShoreLat.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteShoreLong</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteShoreLong' VALUE='$DiveSiteShoreLong'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=48 id ='DiveSiteShoreLong' 
   onBlur=\"if(isBlank(this.form.DiveSiteShoreLong.value)) {alert('DiveSiteShoreLong cannot be blank');this.form.DiveSiteShoreLong.style.background='Yellow';}else{this.form.DiveSiteShoreLong.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteShoreNotes</th>
<td><TEXTAREA NAME='DiveSiteShoreNotes' READONLY COLS=100 ROW=3 TABINDEX=49>$DiveSiteShoreNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteWebPage</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteWebPage' VALUE='$DiveSiteWebPage'  SIZE='150' MAXLENGTH='150'  tabindex=50 id ='DiveSiteWebPage' 
   onBlur=\"if(isBlank(this.form.DiveSiteWebPage.value)) {alert('DiveSiteWebPage cannot be blank');this.form.DiveSiteWebPage.style.background='Yellow';}else{this.form.DiveSiteWebPage.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteBackground</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteBackground' VALUE='$DiveSiteBackground'  SIZE='150' MAXLENGTH='150'  tabindex=51 id ='DiveSiteBackground' 
   onBlur=\"if(isBlank(this.form.DiveSiteBackground.value)) {alert('DiveSiteBackground cannot be blank');this.form.DiveSiteBackground.style.background='Yellow';}else{this.form.DiveSiteBackground.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
<td colspan =2 align='center'>
<input type ='SUBMIT' NAME='display_button' Value = 'Back'>
<input type ='SUBMIT' NAME='display_button' Value = 'Logout'>
<input type ='SUBMIT' NAME='display_button' Value = 'Add'>
<input type ='SUBMIT' NAME='display_button' Value = 'Edit'>
<input type ='SUBMIT' NAME='display_button' Value = 'Next'>
<input type ='SUBMIT' NAME='display_button' Value = 'Previous'>
<input type ='SUBMIT' NAME='display_button' Value = 'Delete'>
<input type ='SUBMIT' NAME='display_button' Value = 'List Records'>
</td>
</tr>
</TABLE>
</td></tr></TABLE>
</FORM>");}
#--------------------------Initialize Variables---------------------------------------

function InitializeVariables()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
$DiveSiteId='TBD';
$DiveSiteStatus='';
$DiveSiteEnteredBy='';
$DiveSiteDateEntered='';
$DiveSiteCity='';
$DiveSiteProvince='';
$DiveSiteCountry='';
$DiveSiteName='';
$DiveSiteMajorName='';
$DiveSiteMinorName='';
$DiveSiteRating='';
$DiveSiteType='';
$DiveSiteLevel='';
$DiveSiteElevation='';
$DiveSiteElevationUnits='';
$DiveSiteWater='';
$DiveSiteDifficulty='';
$DiveSiteTideTable='';
$DiveSiteTideTableNotes='';
$DiveSiteBestDiveMonths='';
$DiveSiteTimeRestrictions='';
$DiveSitePermitRequired='';
$DiveSiteWinterTemp='';
$DiveSiteSummerTemp='';
$DiveSiteFallTemp='';
$DiveSiteSpringTemp='';
$DiveSiteDepthMin='';
$DiveSiteDepthMax='';
$DiveSiteDepthUnits='';
$DiveSiteVisibilityMinimum='';
$DiveSiteVisibilityMaximum='';
$DiveSiteVisibilityUnits='';
$DiveSiteHazards='';
$DiveSiteHazardNotes='';
$DiveSiteBottomComposition='';
$DiveSiteCompositionNotes='';
$DiveSiteTelephoneNotes='';
$DiveSiteFacilities='';
$DiveSiteFacilitiesNotes='';
$DiveSiteMedical='';
$DiveSiteMedicalNotes='';
$DiveSiteRecommendationNotes='';
$DiveSiteEAPNotes='';
$DiveSiteNotes='';
$DiveSiteExactLat='';
$DiveSiteExactLong='';
$DiveSiteShoreLat='';
$DiveSiteShoreLong='';
$DiveSiteShoreNotes='';
$DiveSiteWebPage='';
$DiveSiteBackground='';
return;
}
#----------------------------Get Next Record in Database -----------------------------------

function Db_Next()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
if($NumDiveSiteRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSite where(DiveSiteStatus > '".strip_tags(addslashes($DiveSiteStatus))."') order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite Select * failure");
$NumDiveSiteRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteId=$rowdata[0];
$DiveSiteStatus=$rowdata[1];
$DiveSiteEnteredBy=$rowdata[2];
$DiveSiteDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteRating=$rowdata[10];
$DiveSiteType=$rowdata[11];
$DiveSiteLevel=$rowdata[12];
$DiveSiteElevation=$rowdata[13];
$DiveSiteElevationUnits=$rowdata[14];
$DiveSiteWater=$rowdata[15];
$DiveSiteDifficulty=$rowdata[16];
$DiveSiteTideTable=$rowdata[17];
$DiveSiteTideTableNotes=$rowdata[18];
$DiveSiteBestDiveMonths=$rowdata[19];
$DiveSiteTimeRestrictions=$rowdata[20];
$DiveSitePermitRequired=$rowdata[21];
$DiveSiteWinterTemp=$rowdata[22];
$DiveSiteSummerTemp=$rowdata[23];
$DiveSiteFallTemp=$rowdata[24];
$DiveSiteSpringTemp=$rowdata[25];
$DiveSiteDepthMin=$rowdata[26];
$DiveSiteDepthMax=$rowdata[27];
$DiveSiteDepthUnits=$rowdata[28];
$DiveSiteVisibilityMinimum=$rowdata[29];
$DiveSiteVisibilityMaximum=$rowdata[30];
$DiveSiteVisibilityUnits=$rowdata[31];
$DiveSiteHazards=$rowdata[32];
$DiveSiteHazardNotes=$rowdata[33];
$DiveSiteBottomComposition=$rowdata[34];
$DiveSiteCompositionNotes=$rowdata[35];
$DiveSiteTelephoneNotes=$rowdata[36];
$DiveSiteFacilities=$rowdata[37];
$DiveSiteFacilitiesNotes=$rowdata[38];
$DiveSiteMedical=$rowdata[39];
$DiveSiteMedicalNotes=$rowdata[40];
$DiveSiteRecommendationNotes=$rowdata[41];
$DiveSiteEAPNotes=$rowdata[42];
$DiveSiteNotes=$rowdata[43];
$DiveSiteExactLat=$rowdata[44];
$DiveSiteExactLong=$rowdata[45];
$DiveSiteShoreLat=$rowdata[46];
$DiveSiteShoreLong=$rowdata[47];
$DiveSiteShoreNotes=$rowdata[48];
$DiveSiteWebPage=$rowdata[49];
$DiveSiteBackground=$rowdata[50];
}
else
{
$sql="select * from DiveSite order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite Select * failure");
$NumDiveSiteRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteId=$rowdata[0];
$DiveSiteStatus=$rowdata[1];
$DiveSiteEnteredBy=$rowdata[2];
$DiveSiteDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteRating=$rowdata[10];
$DiveSiteType=$rowdata[11];
$DiveSiteLevel=$rowdata[12];
$DiveSiteElevation=$rowdata[13];
$DiveSiteElevationUnits=$rowdata[14];
$DiveSiteWater=$rowdata[15];
$DiveSiteDifficulty=$rowdata[16];
$DiveSiteTideTable=$rowdata[17];
$DiveSiteTideTableNotes=$rowdata[18];
$DiveSiteBestDiveMonths=$rowdata[19];
$DiveSiteTimeRestrictions=$rowdata[20];
$DiveSitePermitRequired=$rowdata[21];
$DiveSiteWinterTemp=$rowdata[22];
$DiveSiteSummerTemp=$rowdata[23];
$DiveSiteFallTemp=$rowdata[24];
$DiveSiteSpringTemp=$rowdata[25];
$DiveSiteDepthMin=$rowdata[26];
$DiveSiteDepthMax=$rowdata[27];
$DiveSiteDepthUnits=$rowdata[28];
$DiveSiteVisibilityMinimum=$rowdata[29];
$DiveSiteVisibilityMaximum=$rowdata[30];
$DiveSiteVisibilityUnits=$rowdata[31];
$DiveSiteHazards=$rowdata[32];
$DiveSiteHazardNotes=$rowdata[33];
$DiveSiteBottomComposition=$rowdata[34];
$DiveSiteCompositionNotes=$rowdata[35];
$DiveSiteTelephoneNotes=$rowdata[36];
$DiveSiteFacilities=$rowdata[37];
$DiveSiteFacilitiesNotes=$rowdata[38];
$DiveSiteMedical=$rowdata[39];
$DiveSiteMedicalNotes=$rowdata[40];
$DiveSiteRecommendationNotes=$rowdata[41];
$DiveSiteEAPNotes=$rowdata[42];
$DiveSiteNotes=$rowdata[43];
$DiveSiteExactLat=$rowdata[44];
$DiveSiteExactLong=$rowdata[45];
$DiveSiteShoreLat=$rowdata[46];
$DiveSiteShoreLong=$rowdata[47];
$DiveSiteShoreNotes=$rowdata[48];
$DiveSiteWebPage=$rowdata[49];
$DiveSiteBackground=$rowdata[50];
}
else
{
InitializeVariables();
}
}
}
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#----------------------------Get Previous Record in Database ------------------------------

function Db_Prev()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
if($NumDiveSiteRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSite where(DiveSiteStatus < '".strip_tags(addslashes($DiveSiteStatus))."') order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite Select * failure");
$NumDiveSiteRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteId=$rowdata[0];
$DiveSiteStatus=$rowdata[1];
$DiveSiteEnteredBy=$rowdata[2];
$DiveSiteDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteRating=$rowdata[10];
$DiveSiteType=$rowdata[11];
$DiveSiteLevel=$rowdata[12];
$DiveSiteElevation=$rowdata[13];
$DiveSiteElevationUnits=$rowdata[14];
$DiveSiteWater=$rowdata[15];
$DiveSiteDifficulty=$rowdata[16];
$DiveSiteTideTable=$rowdata[17];
$DiveSiteTideTableNotes=$rowdata[18];
$DiveSiteBestDiveMonths=$rowdata[19];
$DiveSiteTimeRestrictions=$rowdata[20];
$DiveSitePermitRequired=$rowdata[21];
$DiveSiteWinterTemp=$rowdata[22];
$DiveSiteSummerTemp=$rowdata[23];
$DiveSiteFallTemp=$rowdata[24];
$DiveSiteSpringTemp=$rowdata[25];
$DiveSiteDepthMin=$rowdata[26];
$DiveSiteDepthMax=$rowdata[27];
$DiveSiteDepthUnits=$rowdata[28];
$DiveSiteVisibilityMinimum=$rowdata[29];
$DiveSiteVisibilityMaximum=$rowdata[30];
$DiveSiteVisibilityUnits=$rowdata[31];
$DiveSiteHazards=$rowdata[32];
$DiveSiteHazardNotes=$rowdata[33];
$DiveSiteBottomComposition=$rowdata[34];
$DiveSiteCompositionNotes=$rowdata[35];
$DiveSiteTelephoneNotes=$rowdata[36];
$DiveSiteFacilities=$rowdata[37];
$DiveSiteFacilitiesNotes=$rowdata[38];
$DiveSiteMedical=$rowdata[39];
$DiveSiteMedicalNotes=$rowdata[40];
$DiveSiteRecommendationNotes=$rowdata[41];
$DiveSiteEAPNotes=$rowdata[42];
$DiveSiteNotes=$rowdata[43];
$DiveSiteExactLat=$rowdata[44];
$DiveSiteExactLong=$rowdata[45];
$DiveSiteShoreLat=$rowdata[46];
$DiveSiteShoreLong=$rowdata[47];
$DiveSiteShoreNotes=$rowdata[48];
$DiveSiteWebPage=$rowdata[49];
$DiveSiteBackground=$rowdata[50];
}
}
else
{
$sql="select * from DiveSite order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite Select * failure");
$NumDiveSiteRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteId=$rowdata[0];
$DiveSiteStatus=$rowdata[1];
$DiveSiteEnteredBy=$rowdata[2];
$DiveSiteDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteRating=$rowdata[10];
$DiveSiteType=$rowdata[11];
$DiveSiteLevel=$rowdata[12];
$DiveSiteElevation=$rowdata[13];
$DiveSiteElevationUnits=$rowdata[14];
$DiveSiteWater=$rowdata[15];
$DiveSiteDifficulty=$rowdata[16];
$DiveSiteTideTable=$rowdata[17];
$DiveSiteTideTableNotes=$rowdata[18];
$DiveSiteBestDiveMonths=$rowdata[19];
$DiveSiteTimeRestrictions=$rowdata[20];
$DiveSitePermitRequired=$rowdata[21];
$DiveSiteWinterTemp=$rowdata[22];
$DiveSiteSummerTemp=$rowdata[23];
$DiveSiteFallTemp=$rowdata[24];
$DiveSiteSpringTemp=$rowdata[25];
$DiveSiteDepthMin=$rowdata[26];
$DiveSiteDepthMax=$rowdata[27];
$DiveSiteDepthUnits=$rowdata[28];
$DiveSiteVisibilityMinimum=$rowdata[29];
$DiveSiteVisibilityMaximum=$rowdata[30];
$DiveSiteVisibilityUnits=$rowdata[31];
$DiveSiteHazards=$rowdata[32];
$DiveSiteHazardNotes=$rowdata[33];
$DiveSiteBottomComposition=$rowdata[34];
$DiveSiteCompositionNotes=$rowdata[35];
$DiveSiteTelephoneNotes=$rowdata[36];
$DiveSiteFacilities=$rowdata[37];
$DiveSiteFacilitiesNotes=$rowdata[38];
$DiveSiteMedical=$rowdata[39];
$DiveSiteMedicalNotes=$rowdata[40];
$DiveSiteRecommendationNotes=$rowdata[41];
$DiveSiteEAPNotes=$rowdata[42];
$DiveSiteNotes=$rowdata[43];
$DiveSiteExactLat=$rowdata[44];
$DiveSiteExactLong=$rowdata[45];
$DiveSiteShoreLat=$rowdata[46];
$DiveSiteShoreLong=$rowdata[47];
$DiveSiteShoreNotes=$rowdata[48];
$DiveSiteWebPage=$rowdata[49];
$DiveSiteBackground=$rowdata[50];
}
}
else
{
InitializeVariables();
}
}
}
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#------------------------------Database Update Function--------------------------------------

function Db_Update()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$DiveSiteId=$_SESSION['DiveSiteId'];
$sql="update DiveSite SET ";
$sql=$sql."DiveSiteStatus='".strip_tags(addslashes($DiveSiteStatus))."',";
$sql=$sql."DiveSiteEnteredBy='".strip_tags(addslashes($DiveSiteEnteredBy))."',";
$sql=$sql."DiveSiteDateEntered='".strip_tags(addslashes($DiveSiteDateEntered))."',";
$sql=$sql."DiveSiteCity='".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."DiveSiteProvince='".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."DiveSiteCountry='".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."DiveSiteName='".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."DiveSiteMajorName='".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."DiveSiteMinorName='".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."DiveSiteRating='".strip_tags(addslashes($DiveSiteRating))."',";
$sql=$sql."DiveSiteType='".strip_tags(addslashes($DiveSiteType))."',";
$sql=$sql."DiveSiteLevel='".strip_tags(addslashes($DiveSiteLevel))."',";
$sql=$sql."DiveSiteElevation='".strip_tags(addslashes($DiveSiteElevation))."',";
$sql=$sql."DiveSiteElevationUnits='".strip_tags(addslashes($DiveSiteElevationUnits))."',";
$sql=$sql."DiveSiteWater='".strip_tags(addslashes($DiveSiteWater))."',";
$sql=$sql."DiveSiteDifficulty='".strip_tags(addslashes($DiveSiteDifficulty))."',";
$sql=$sql."DiveSiteTideTable='".strip_tags(addslashes($DiveSiteTideTable))."',";
$sql=$sql."DiveSiteTideTableNotes='".strip_tags(addslashes($DiveSiteTideTableNotes))."',";
$sql=$sql."DiveSiteBestDiveMonths='".strip_tags(addslashes($DiveSiteBestDiveMonths))."',";
$sql=$sql."DiveSiteTimeRestrictions='".strip_tags(addslashes($DiveSiteTimeRestrictions))."',";
$sql=$sql."DiveSitePermitRequired='".strip_tags(addslashes($DiveSitePermitRequired))."',";
$sql=$sql."DiveSiteWinterTemp='".strip_tags(addslashes($DiveSiteWinterTemp))."',";
$sql=$sql."DiveSiteSummerTemp='".strip_tags(addslashes($DiveSiteSummerTemp))."',";
$sql=$sql."DiveSiteFallTemp='".strip_tags(addslashes($DiveSiteFallTemp))."',";
$sql=$sql."DiveSiteSpringTemp='".strip_tags(addslashes($DiveSiteSpringTemp))."',";
$sql=$sql."DiveSiteDepthMin='".strip_tags(addslashes($DiveSiteDepthMin))."',";
$sql=$sql."DiveSiteDepthMax='".strip_tags(addslashes($DiveSiteDepthMax))."',";
$sql=$sql."DiveSiteDepthUnits='".strip_tags(addslashes($DiveSiteDepthUnits))."',";
$sql=$sql."DiveSiteVisibilityMinimum='".strip_tags(addslashes($DiveSiteVisibilityMinimum))."',";
$sql=$sql."DiveSiteVisibilityMaximum='".strip_tags(addslashes($DiveSiteVisibilityMaximum))."',";
$sql=$sql."DiveSiteVisibilityUnits='".strip_tags(addslashes($DiveSiteVisibilityUnits))."',";
$sql=$sql."DiveSiteHazards='".strip_tags(addslashes($DiveSiteHazards))."',";
$sql=$sql."DiveSiteHazardNotes='".strip_tags(addslashes($DiveSiteHazardNotes))."',";
$sql=$sql."DiveSiteBottomComposition='".strip_tags(addslashes($DiveSiteBottomComposition))."',";
$sql=$sql."DiveSiteCompositionNotes='".strip_tags(addslashes($DiveSiteCompositionNotes))."',";
$sql=$sql."DiveSiteTelephoneNotes='".strip_tags(addslashes($DiveSiteTelephoneNotes))."',";
$sql=$sql."DiveSiteFacilities='".strip_tags(addslashes($DiveSiteFacilities))."',";
$sql=$sql."DiveSiteFacilitiesNotes='".strip_tags(addslashes($DiveSiteFacilitiesNotes))."',";
$sql=$sql."DiveSiteMedical='".strip_tags(addslashes($DiveSiteMedical))."',";
$sql=$sql."DiveSiteMedicalNotes='".strip_tags(addslashes($DiveSiteMedicalNotes))."',";
$sql=$sql."DiveSiteRecommendationNotes='".strip_tags(addslashes($DiveSiteRecommendationNotes))."',";
$sql=$sql."DiveSiteEAPNotes='".strip_tags(addslashes($DiveSiteEAPNotes))."',";
$sql=$sql."DiveSiteNotes='".strip_tags(addslashes($DiveSiteNotes))."',";
$sql=$sql."DiveSiteExactLat='".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."DiveSiteExactLong='".strip_tags(addslashes($DiveSiteExactLong))."',";
$sql=$sql."DiveSiteShoreLat='".strip_tags(addslashes($DiveSiteShoreLat))."',";
$sql=$sql."DiveSiteShoreLong='".strip_tags(addslashes($DiveSiteShoreLong))."',";
$sql=$sql."DiveSiteShoreNotes='".strip_tags(addslashes($DiveSiteShoreNotes))."',";
$sql=$sql."DiveSiteWebPage='".strip_tags(addslashes($DiveSiteWebPage))."',";
$sql=$sql."DiveSiteBackground='".strip_tags(addslashes($DiveSiteBackground))."' where DiveSiteId='".$DiveSiteId."'"; 
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite DATA failure");
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#-----------------------------Print Out Current Form Variables--------------------------

function PrintFormVars()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
OutputMessage('NumDiveSiteRecords: '.$NumDiveSiteRecords);
OutputMessage('DiveSiteId: '.$DiveSiteId);
OutputMessage('DiveSiteStatus: '.$DiveSiteStatus);
OutputMessage('DiveSiteEnteredBy: '.$DiveSiteEnteredBy);
OutputMessage('DiveSiteDateEntered: '.$DiveSiteDateEntered);
OutputMessage('DiveSiteCity: '.$DiveSiteCity);
OutputMessage('DiveSiteProvince: '.$DiveSiteProvince);
OutputMessage('DiveSiteCountry: '.$DiveSiteCountry);
OutputMessage('DiveSiteName: '.$DiveSiteName);
OutputMessage('DiveSiteMajorName: '.$DiveSiteMajorName);
OutputMessage('DiveSiteMinorName: '.$DiveSiteMinorName);
OutputMessage('DiveSiteRating: '.$DiveSiteRating);
OutputMessage('DiveSiteType: '.$DiveSiteType);
OutputMessage('DiveSiteLevel: '.$DiveSiteLevel);
OutputMessage('DiveSiteElevation: '.$DiveSiteElevation);
OutputMessage('DiveSiteElevationUnits: '.$DiveSiteElevationUnits);
OutputMessage('DiveSiteWater: '.$DiveSiteWater);
OutputMessage('DiveSiteDifficulty: '.$DiveSiteDifficulty);
OutputMessage('DiveSiteTideTable: '.$DiveSiteTideTable);
OutputMessage('DiveSiteTideTableNotes: '.$DiveSiteTideTableNotes);
OutputMessage('DiveSiteBestDiveMonths: '.$DiveSiteBestDiveMonths);
OutputMessage('DiveSiteTimeRestrictions: '.$DiveSiteTimeRestrictions);
OutputMessage('DiveSitePermitRequired: '.$DiveSitePermitRequired);
OutputMessage('DiveSiteWinterTemp: '.$DiveSiteWinterTemp);
OutputMessage('DiveSiteSummerTemp: '.$DiveSiteSummerTemp);
OutputMessage('DiveSiteFallTemp: '.$DiveSiteFallTemp);
OutputMessage('DiveSiteSpringTemp: '.$DiveSiteSpringTemp);
OutputMessage('DiveSiteDepthMin: '.$DiveSiteDepthMin);
OutputMessage('DiveSiteDepthMax: '.$DiveSiteDepthMax);
OutputMessage('DiveSiteDepthUnits: '.$DiveSiteDepthUnits);
OutputMessage('DiveSiteVisibilityMinimum: '.$DiveSiteVisibilityMinimum);
OutputMessage('DiveSiteVisibilityMaximum: '.$DiveSiteVisibilityMaximum);
OutputMessage('DiveSiteVisibilityUnits: '.$DiveSiteVisibilityUnits);
OutputMessage('DiveSiteHazards: '.$DiveSiteHazards);
OutputMessage('DiveSiteHazardNotes: '.$DiveSiteHazardNotes);
OutputMessage('DiveSiteBottomComposition: '.$DiveSiteBottomComposition);
OutputMessage('DiveSiteCompositionNotes: '.$DiveSiteCompositionNotes);
OutputMessage('DiveSiteTelephoneNotes: '.$DiveSiteTelephoneNotes);
OutputMessage('DiveSiteFacilities: '.$DiveSiteFacilities);
OutputMessage('DiveSiteFacilitiesNotes: '.$DiveSiteFacilitiesNotes);
OutputMessage('DiveSiteMedical: '.$DiveSiteMedical);
OutputMessage('DiveSiteMedicalNotes: '.$DiveSiteMedicalNotes);
OutputMessage('DiveSiteRecommendationNotes: '.$DiveSiteRecommendationNotes);
OutputMessage('DiveSiteEAPNotes: '.$DiveSiteEAPNotes);
OutputMessage('DiveSiteNotes: '.$DiveSiteNotes);
OutputMessage('DiveSiteExactLat: '.$DiveSiteExactLat);
OutputMessage('DiveSiteExactLong: '.$DiveSiteExactLong);
OutputMessage('DiveSiteShoreLat: '.$DiveSiteShoreLat);
OutputMessage('DiveSiteShoreLong: '.$DiveSiteShoreLong);
OutputMessage('DiveSiteShoreNotes: '.$DiveSiteShoreNotes);
OutputMessage('DiveSiteWebPage: '.$DiveSiteWebPage);
OutputMessage('DiveSiteBackground: '.$DiveSiteBackground);
return;
}
#-----------------------------Database Add Function---------------------------------------

function Db_Add()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="insert into DiveSite(DiveSiteStatus,DiveSiteEnteredBy,DiveSiteDateEntered,DiveSiteCity,DiveSiteProvince,DiveSiteCountry,DiveSiteName,DiveSiteMajorName,DiveSiteMinorName,DiveSiteRating,DiveSiteType,DiveSiteLevel,DiveSiteElevation,DiveSiteElevationUnits,DiveSiteWater,DiveSiteDifficulty,DiveSiteTideTable,DiveSiteTideTableNotes,DiveSiteBestDiveMonths,DiveSiteTimeRestrictions,DiveSitePermitRequired,DiveSiteWinterTemp,DiveSiteSummerTemp,DiveSiteFallTemp,DiveSiteSpringTemp,DiveSiteDepthMin,DiveSiteDepthMax,DiveSiteDepthUnits,DiveSiteVisibilityMinimum,DiveSiteVisibilityMaximum,DiveSiteVisibilityUnits,DiveSiteHazards,DiveSiteHazardNotes,DiveSiteBottomComposition,DiveSiteCompositionNotes,DiveSiteTelephoneNotes,DiveSiteFacilities,DiveSiteFacilitiesNotes,DiveSiteMedical,DiveSiteMedicalNotes,DiveSiteRecommendationNotes,DiveSiteEAPNotes,DiveSiteNotes,DiveSiteExactLat,DiveSiteExactLong,DiveSiteShoreLat,DiveSiteShoreLong,DiveSiteShoreNotes,DiveSiteWebPage,DiveSiteBackground) values (";
$sql=$sql."'".strip_tags(addslashes($DiveSiteStatus))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteEnteredBy))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteDateEntered))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteRating))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteType))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteLevel))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteElevation))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteElevationUnits))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteWater))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteDifficulty))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteTideTable))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteTideTableNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteBestDiveMonths))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteTimeRestrictions))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSitePermitRequired))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteWinterTemp))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteSummerTemp))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteFallTemp))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteSpringTemp))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteDepthMin))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteDepthMax))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteDepthUnits))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteVisibilityMinimum))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteVisibilityMaximum))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteVisibilityUnits))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteHazards))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteHazardNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteBottomComposition))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCompositionNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteTelephoneNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteFacilities))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteFacilitiesNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMedical))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMedicalNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteRecommendationNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteEAPNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLong))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteShoreLat))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteShoreLong))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteShoreNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteWebPage))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteBackground))."')";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite ADD failure");
$DiveSiteId=mysql_insert_id($connection);
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#----------------------------Database Delete Function------------------------------------

function Db_Delete()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="delete from DiveSite where DiveSiteId='".$DiveSiteId."'";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite DELETE failure");
mysql_close($connection);
return;
}
#-----------------------------Get Current Number of Records -----------------------------

function CurrentNumberRecords()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSite order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite GetNumRecs failure");
$NumDiveSiteRecords = mysql_num_rows($result);
mysql_close($connection);
return;
}
#------------------------------Screen Report of Records in Database ---------------------

function ListRecords()
 { 
global $user, $serverhost,$db,$password;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSite order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite GetNumRecs failure");
$NumDiveSiteRecords = mysql_num_rows($result);
echo "<form action='DiveSite.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSiteId</b></td>";
echo "<td align='center' ><b>DiveSiteStatus</b></td>";
echo "<td align='center' ><b>DiveSiteEnteredBy</b></td>";
echo "<td align='center' ><b>DiveSiteDateEntered</b></td>";
echo "<td align='center' ><b>DiveSiteCity</b></td>";
echo "<td align='center' ><b>DiveSiteProvince</b></td>";
echo "<td align='center' ><b>DiveSiteCountry</b></td>";
echo "<td align='center' ><b>DiveSiteName</b></td>";
echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
echo "<td align='center' ><b>DiveSiteRating</b></td>";
echo "<td align='center' ><b>DiveSiteType</b></td>";
echo "<td align='center' ><b>DiveSiteLevel</b></td>";
echo "<td align='center' ><b>DiveSiteElevation</b></td>";
echo "<td align='center' ><b>DiveSiteElevationUnits</b></td>";
echo "<td align='center' ><b>DiveSiteWater</b></td>";
echo "<td align='center' ><b>DiveSiteDifficulty</b></td>";
echo "<td align='center' ><b>DiveSiteTideTable</b></td>";
echo "<td align='center' ><b>DiveSiteTideTableNotes</b></td>";
echo "<td align='center' ><b>DiveSiteBestDiveMonths</b></td>";
echo "<td align='center' ><b>DiveSiteTimeRestrictions</b></td>";
echo "<td align='center' ><b>DiveSitePermitRequired</b></td>";
echo "<td align='center' ><b>DiveSiteWinterTemp</b></td>";
echo "<td align='center' ><b>DiveSiteSummerTemp</b></td>";
echo "<td align='center' ><b>DiveSiteFallTemp</b></td>";
echo "<td align='center' ><b>DiveSiteSpringTemp</b></td>";
echo "<td align='center' ><b>DiveSiteDepthMin</b></td>";
echo "<td align='center' ><b>DiveSiteDepthMax</b></td>";
echo "<td align='center' ><b>DiveSiteDepthUnits</b></td>";
echo "<td align='center' ><b>DiveSiteVisibilityMinimum</b></td>";
echo "<td align='center' ><b>DiveSiteVisibilityMaximum</b></td>";
echo "<td align='center' ><b>DiveSiteVisibilityUnits</b></td>";
echo "<td align='center' ><b>DiveSiteHazards</b></td>";
echo "<td align='center' ><b>DiveSiteHazardNotes</b></td>";
echo "<td align='center' ><b>DiveSiteBottomComposition</b></td>";
echo "<td align='center' ><b>DiveSiteCompositionNotes</b></td>";
echo "<td align='center' ><b>DiveSiteTelephoneNotes</b></td>";
echo "<td align='center' ><b>DiveSiteFacilities</b></td>";
echo "<td align='center' ><b>DiveSiteFacilitiesNotes</b></td>";
echo "<td align='center' ><b>DiveSiteMedical</b></td>";
echo "<td align='center' ><b>DiveSiteMedicalNotes</b></td>";
echo "<td align='center' ><b>DiveSiteRecommendationNotes</b></td>";
echo "<td align='center' ><b>DiveSiteEAPNotes</b></td>";
echo "<td align='center' ><b>DiveSiteNotes</b></td>";
echo "<td align='center' ><b>DiveSiteExactLat</b></td>";
echo "<td align='center' ><b>DiveSiteExactLong</b></td>";
echo "<td align='center' ><b>DiveSiteShoreLat</b></td>";
echo "<td align='center' ><b>DiveSiteShoreLong</b></td>";
echo "<td align='center' ><b>DiveSiteShoreNotes</b></td>";
echo "<td align='center' ><b>DiveSiteWebPage</b></td>";
echo "<td align='center' ><b>DiveSiteBackground</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
echo "<tr>";
echo "<td align='center'>".$rowdata[0]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[1]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[2]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[3]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[4]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[5]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[6]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[7]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[8]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[9]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[10]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[11]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[12]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[13]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[14]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[15]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[16]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[17]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[18]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[19]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[20]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[21]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[22]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[23]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[24]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[25]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[26]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[27]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[28]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[29]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[30]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[31]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[32]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[33]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[34]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[35]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[36]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[37]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[38]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[39]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[40]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[41]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[42]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[43]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[44]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[45]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[46]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[47]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[48]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[49]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[50]."&nbsp; </td>";
echo "</tr>";
}
echo "<tr><td colspan='51' align='center'><input type ='SUBMIT' NAME='display_button' Value = 'Back to Main'></td></tr>";
echo '</table>';
echo '</form>';
mysql_close($connection);
return;
}
#----------------------------Initialize Program Start ---------------------------------------

function InitializeProgram()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSite order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite InitializeProgram failure");
$NumDiveSiteRecords = mysql_num_rows($result);
if($NumDiveSiteRecords==0)
{InitializeVariables();}
else
{GetLastRecord($connection,$result);}
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#-------------------------Validate Unique Code ---------------------------------------------

function ValidUniqueCode()

 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteType,$DiveSiteLevel,$DiveSiteElevation;
global $DiveSiteElevationUnits,$DiveSiteWater,$DiveSiteDifficulty,$DiveSiteTideTable,$DiveSiteTideTableNotes;
global $DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired,$DiveSiteWinterTemp;
global $DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteDepthMin,$DiveSiteDepthMax;
global $DiveSiteDepthUnits,$DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits;
global $DiveSiteHazards,$DiveSiteHazardNotes,$DiveSiteBottomComposition,$DiveSiteCompositionNotes;
global $DiveSiteTelephoneNotes,$DiveSiteFacilities,$DiveSiteFacilitiesNotes,$DiveSiteMedical;
global $DiveSiteMedicalNotes,$DiveSiteRecommendationNotes,$DiveSiteEAPNotes,$DiveSiteNotes;
global $DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes;
global $DiveSiteWebPage,$DiveSiteBackground;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSite where(DiveSiteStatus ='".strip_tags(addslashes($DiveSiteStatus))."') order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite Select * failure");
$NumDiveSiteRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteRecordsDesired>0)
{return FALSE;}
  else
{return TRUE;}
}
#----------------------------Main Program--------------------------------------------

echo "<html>
<head><title>".$table." Maintenance</title>
<h4><center>".$table." Maintenance</center></h4>

<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"CalendarPopup.js\"></SCRIPT>
	<SCRIPT LANGUAGE=\"JavaScript\">
	    var cal = new CalendarPopup();
  </SCRIPT>


<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"validations.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\" type=\"text/javascript\">
function validatePhone(fld) {
    var error = \"\";
    var stripped = fld.value.replace(/[\(\)\.\-\ ]/g,'');     

   if (fld.value == \"\") 
     {
        error = \"You didn't enter a phone number.\";
        fld.style.background = 'Yellow';
     } 
    else if (isNaN(stripped))
          {
             error = \"The phone number contains illegal characters.\";
             fld.style.background = 'Yellow';
          } else if (!(stripped.length == 10))
                 {
                       error = \"The phone number is the wrong length. Make sure you included an area code.\";
                       fld.style.background = 'Yellow';
                  } else 
                      {   fld.style.background= 'White';}
    return error;
}

function validateEmpty(fld) {
    var error = \"\";
  
    if (fld.value.length == 0) {
        fld.style.background = 'Yellow'; 
        error = \"The required field has not been filled in.\"
    } else {
        fld.style.background = 'White';
    }
    return error;   
}

function validateUsername(fld) {
    var error = \"\";
    var illegalChars = /\W/; // allow letters, numbers, and underscores
 
    if (fld.value == \"\") {
        fld.style.background = 'Yellow'; 
        error = \"You didn't enter a username.\";
    } else if ((fld.value.length < 5) || (fld.value.length > 15)) {
        fld.style.background = 'Yellow'; 
        error = \"The username is the wrong length.\";
    } else if (illegalChars.test(fld.value)) {
        fld.style.background = 'Yellow'; 
        error = \"The username contains illegal characters.\";
    } else {
        fld.style.background = 'White';
    } 
    return error;
}

function trim(s)
{
  return s.replace(/^\s+|\s+$/, '');
} 

function validateEmail(fld) {
    var error=\"\";
    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
    
    if (fld.value == \"\") {
        fld.style.background = 'White';
    } else if (!emailFilter.test(tfld)) {              //test email for illegal characters
        fld.style.background = 'Yellow';
        error = \"Please enter a valid email address.\";
    } else if (fld.value.match(illegalChars)) {
        fld.style.background = 'Yellow';
        error = \"The email address contains illegal characters.\";
    } else {
        fld.style.background = 'White';
    }
    return error;
}

function validateDate(field){
var checkstr = \"0123456789\";
var DateField = field;
var Datevalue = \"\";
var DateTemp = \"\";
var seperator = \".\";
var day;
var month;
var year;
var leap = 0;
var err = 0;
var i;
   err = 0;
   DateValue = DateField.value;
   /* Delete all chars except 0..9 */
   for (i = 0; i < DateValue.length; i++) {
	  if (checkstr.indexOf(DateValue.substr(i,1)) >= 0) {
	     DateTemp = DateTemp + DateValue.substr(i,1);
	  }
   }
   DateValue = DateTemp;
   /* Always change date to 8 digits - string*/
   /* if year is entered as 2-digit / always assume 20xx */
   if (DateValue.length == 6) {
      DateValue = '19' + DateValue.substr(0,2)+DateValue.substr(2,4) ; }
   if (DateValue.length != 8) {
      err = 19;}
   /* year is wrong if year = 0000 */
   year = DateValue.substr(0,4);
   if (year == 0) {
      err = 20;
   }
   /* Validation of month*/
   month = DateValue.substr(4,2);
   if ((month < 1) || (month > 12)) {
      err = 21;
   }
   /* Validation of day*/
   day = DateValue.substr(6,2);
   if (day < 1) {
     err = 22;
   }
   /* Validation leap-year / february / day */
   if ((year % 4 == 0) || (year % 100 == 0) || (year % 400 == 0)) {
      leap = 1;
   }
   if ((month == 2) && (leap == 1) && (day > 29)) {
      err = 23;
   }
   if ((month == 2) && (leap != 1) && (day > 28)) {
      err = 24;
   }
   
      /* Validation of other months */
   
   if ((day > 31) && ((month == \"01\") || (month == \"03\") || (month == \"05\") || (month == \"07\") || (month == \"08\") || (month == \"10\") || (month == \"12\")))
    {
      err = 25;
    }
   if ((day > 30) && ((month == \"04\") || (month == \"06\") || (month == \"09\") || (month == \"11\")))
   {
      err = 26;
   }

   
    
   /* if 00 ist entered, no error, deleting the entry */
   if ((day == 0) && (month == 0) && (year == 00)) {
      err = 10; day = \"\"; month = \"\"; year = \"\"; seperator = \"\";
   }   
  
   
   
   
   /* if no error, write the completed date to Input-Field (e.g. 13.12.2001) */
   if (err == 0) {
      DateField.value = year+ seperator + month + seperator + day;
      error=\"\";
   }
   /* Error-message if err != 0 */
   else {
      error=\"Date format is yyyy.mm.dd\";
      
   }
  return error;
}

function validateFormOnSubmit(theForm) {
var reason = \"\";
     


       if(isBlank(theForm.MemberSurname.value)) 
           {reason+='Surname cannot be blank\\n';theForm.MemberSurname.style.background='Yellow';}
       else
           {theForm.MemberSurname.style.background='White';}
      
       if(isBlank(theForm.MemberGivenName.value)) 
           {reason+='Given Name cannot be blank\\n';theForm.MemberGivenName.style.background='Yellow';}
       else
           {theForm.MemberGivenName.style.background='White';}
 
      error=validateEmail(theForm.MemberEmailAddress1);
           if(error!=''){reason+=error+'(Email 1)\\n';}
 
     

      if(theForm.MemberInformationCertification.value!='YES')
          {reason+='Information Certification must be selected YES or Choose Cancel Add\\n';theForm.MemberInformationCertification.style.background='Yellow';}
      else
          {theForm.MemberInformationCertification.style.background='White';}
   
       error=validateDate(theForm.MemberBirthDate);
             if(error!='')
                {reason+=error+'(Birthdate)\\n';theForm.MemberBirthDate.style.background='Yellow';}
             else
                {theForm.MemberBirthDate.style.background='White';}
 
        if(theForm.MemberGender.value<=0)
               {reason+='Gender must be selected\\n';theForm.MemberGender.style.background='Yellow';}
             else
               {theForm.MemberGender.style.background='White';}

    
      
  if (reason != \"\") {
    alert(\"**Yellow fields need correction:**\\n\" + reason);
    return false;
  }

  return true;
}


//  End -->
</script>


</SCRIPT>
<script language=\"javascript\" type=\"text/javascript\">
function stopRKey(evt) {
	var evt  = (evt) ? evt : ((event) ? event : null);
	var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
	if ((evt.keyCode == 13) && (node.type==\"text\")) { return false; }
}
document.onkeypress = stopRKey;
</script>










</head>";
echo "<body bgcolor ='".$BackgroundColor."' onLoad=\"parent.showframe.location.href='EmptyFrame.php';parent.navframe.location.href='DiveSitesSystemNavFrame.php';\">";


  CurrentNumberRecords();
 
  if ($_POST)
   { 
     CurrentNumberRecords();
     GetVariablesFromSession();
   
   $Action=$_POST['display_button'];
      switch($Action)
         {
             case 'Add':
               
               InitializeVariables();
               AddForm();
               break;

             case 'Edit':
              
               EditForm();
               break;  

             case 'Delete':
               Db_Delete();
               InitializeProgram();
               DisplayForm();
               break;  

             case 'Next':
              Db_Next();
              DisplayForm();
              break;  

             case 'Previous':
               
               Db_Prev();
               DisplayForm();
               break;        

             

            case 'Submit Changes':
              
               GetPostVariables();
               Db_Update();
               DisplayForm();
               break;
  
           case 'Submit Add':
               GetPostVariables();
               if(ValidUniqueCode())
                 {  
                   Db_Add();
                   DisplayForm();
                 }
               else
                 {
                   $_SESSION['SystemMessage']='Code already on file!! Choose another.';
                   AddForm();
                 }      
               
               break;
    
          case 'Cancel Add':
                   CurrentNumberRecords();
                   GetVariablesFromSession();
                   DisplayForm();
                   break;

          case 'List Records':
                   ListRecords();
                   break;

         case 'Back':
                  header("Location: $CallingProgram");
                  break;                  


        


            default:
              
               DisplayForm();
               break;   
         }  

   }
   else
   {
        InitializeProgram();
        DisplayForm();
       
   }
echo"
</body>
</html>"
?>
