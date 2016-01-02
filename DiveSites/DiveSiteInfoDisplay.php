<?php /**/ ?><?php
session_start();
require_once('SystemFunctions.php');

$db="aquatreasurequest";
$table="DiveSiteMap";

# ValidUserForProgram($_SESSION['User'],'DiveSiteMap.php');

 $Add=$_SESSION['Add'];

 $Edit=$_SESSION['Edit'];

 $Delete=$_SESSION['Delete'];

 $Search=$_SESSION['Search'];

 $Start=$_SESSION['Start'];

 $Expiry=$_SESSION['Expiry'];

 if(($_POST['display_button']=='Back')||($_POST['display_button']=='Logout'))
  { 
      header('Location: index.php');
  } 
  
  
// Get parameters from URL
$Desired_divesite =$_GET['DiveSite'];

  
//echo('here: '.$Desired_divesite.'--->'.$Desired_divesite);

echo('<html>');
echo('<body>');

DisplayDiveSiteGeneral();
DisplayDesiredMaps();
DisplayDesiredPictures();

echo('</body>');
echo('</html>');





exit(); 

//$CallingProgram="index.php";


#-------------------------Get and Display the DiveSite General Info--------------------------------------
function DisplayDiveSiteGeneral()
  {
   global $user, $serverhost,$db,$password,$Desired_divesite;
   
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
   
   
   $connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
   $rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to DiveSite database - General Info');
   $sql="select * from DiveSite where DiveSiteId=".$Desired_divesite." order by DiveSiteStatus";
   $result = mysql_query($sql,$connection) or die("ERROR!! DiveSite GetNumRecs failure");
   $NumDiveSiteRecords = mysql_num_rows($result);
   $rowdata=mysql_fetch_row($result);
   mysql_close($connection);
   
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
$DiveSiteElevation=$rowdata[11];
$DiveSiteElevationUnits=$rowdata[12];
$DiveSiteWater=$rowdata[13];
$DiveSiteDepthMin=$rowdata[14];
$DiveSiteDepthMax=$rowdata[15];
$DiveSiteDepthUnits=$rowdata[16];
$DiveSiteBottomComposition=$rowdata[17];
$DiveSiteHazards=$rowdata[18];
$DiveSiteHazardsNotes=$rowdata[19];
$DiveSiteType=$rowdata[20];
$DiveSiteLevel=$rowdata[21];
$DiveSiteDifficulty=$rowdata[22];
$DiveSiteTideTable=$rowdata[23];
$DiveSiteBestDiveMonths=$rowdata[24];
$DiveSiteTimeRestrictions=$rowdata[25];
$DiveSitePermitRequired=$rowdata[26];
$DiveSiteWinterTemp=$rowdata[27];
$DiveSiteSummerTemp=$rowdata[28];
$DiveSiteFallTemp=$rowdata[29];
$DiveSiteSpringTemp=$rowdata[30];
$DiveSiteTempUnits=$rowdata[31];
$DiveSiteVisibilityMinimum=$rowdata[32];
$DiveSiteVisibilityMaximum=$rowdata[33];
$DiveSiteVisibilityUnits=$rowdata[34];
$DiveSiteFacilities=$rowdata[35];
$DiveSiteFacilitiesNotes=$rowdata[36];
$DiveSiteRecommendationNotes=$rowdata[37];
$DiveSiteNotes=$rowdata[38];
$DiveSiteExactLat=$rowdata[39];
$DiveSiteExactLong=$rowdata[40];
$DiveSiteShoreLat=$rowdata[41];
$DiveSiteShoreLong=$rowdata[42];
$DiveSiteShoreNotes=$rowdata[43];
$DiveSiteWebPage=$rowdata[44];
$DiveSiteBackground=$rowdata[45];
$DiveSiteEAPId=$rowdata[46];
   
echo stripslashes("
<FORM NAME='DiveSiteDisplay' action='DiveSite.php' method='POST'>
<TABLE  align='center' border='1'><tr><th><bold>General Site Information</bold></tr><tr><td>
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
<tr><th align ='left' valign='top' scope='row'>DiveSiteElevation</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteElevation' VALUE='$DiveSiteElevation'  SIZE='11' MAXLENGTH='11'  tabindex=12 id ='DiveSiteElevation' 
   onBlur=\"if(isBlank(this.form.DiveSiteElevation.value)) {alert('DiveSiteElevation cannot be blank');this.form.DiveSiteElevation.style.background='Yellow';}else{this.form.DiveSiteElevation.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteElevationUnits</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteElevationUnits' VALUE='$DiveSiteElevationUnits'  SIZE='5' MAXLENGTH='5'  tabindex=13 id ='DiveSiteElevationUnits' 
   onBlur=\"if(isBlank(this.form.DiveSiteElevationUnits.value)) {alert('DiveSiteElevationUnits cannot be blank');this.form.DiveSiteElevationUnits.style.background='Yellow';}else{this.form.DiveSiteElevationUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteWater</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteWater' VALUE='$DiveSiteWater'  SIZE='50' MAXLENGTH='50'  tabindex=14 id ='DiveSiteWater' 
   onBlur=\"if(isBlank(this.form.DiveSiteWater.value)) {alert('DiveSiteWater cannot be blank');this.form.DiveSiteWater.style.background='Yellow';}else{this.form.DiveSiteWater.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteDepthMin</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteDepthMin' VALUE='$DiveSiteDepthMin'  SIZE='11' MAXLENGTH='11'  tabindex=15 id ='DiveSiteDepthMin' 
   onBlur=\"if(isBlank(this.form.DiveSiteDepthMin.value)) {alert('DiveSiteDepthMin cannot be blank');this.form.DiveSiteDepthMin.style.background='Yellow';}else{this.form.DiveSiteDepthMin.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteDepthMax</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteDepthMax' VALUE='$DiveSiteDepthMax'  SIZE='11' MAXLENGTH='11'  tabindex=16 id ='DiveSiteDepthMax' 
   onBlur=\"if(isBlank(this.form.DiveSiteDepthMax.value)) {alert('DiveSiteDepthMax cannot be blank');this.form.DiveSiteDepthMax.style.background='Yellow';}else{this.form.DiveSiteDepthMax.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteDepthUnits</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteDepthUnits' VALUE='$DiveSiteDepthUnits'  SIZE='5' MAXLENGTH='5'  tabindex=17 id ='DiveSiteDepthUnits' 
   onBlur=\"if(isBlank(this.form.DiveSiteDepthUnits.value)) {alert('DiveSiteDepthUnits cannot be blank');this.form.DiveSiteDepthUnits.style.background='Yellow';}else{this.form.DiveSiteDepthUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteBottomComposition</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteBottomComposition' VALUE='$DiveSiteBottomComposition'  SIZE='100' MAXLENGTH='100'  tabindex=18 id ='DiveSiteBottomComposition' 
   onBlur=\"if(isBlank(this.form.DiveSiteBottomComposition.value)) {alert('DiveSiteBottomComposition cannot be blank');this.form.DiveSiteBottomComposition.style.background='Yellow';}else{this.form.DiveSiteBottomComposition.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteHazards</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteHazards' VALUE='$DiveSiteHazards'  SIZE='100' MAXLENGTH='100'  tabindex=19 id ='DiveSiteHazards' 
   onBlur=\"if(isBlank(this.form.DiveSiteHazards.value)) {alert('DiveSiteHazards cannot be blank');this.form.DiveSiteHazards.style.background='Yellow';}else{this.form.DiveSiteHazards.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteHazardsNotes</th>
<td><TEXTAREA NAME='DiveSiteHazardsNotes' READONLY COLS=100 ROW=3 TABINDEX=20>$DiveSiteHazardsNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteType</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteType' VALUE='$DiveSiteType'  SIZE='100' MAXLENGTH='100'  tabindex=21 id ='DiveSiteType' 
   onBlur=\"if(isBlank(this.form.DiveSiteType.value)) {alert('DiveSiteType cannot be blank');this.form.DiveSiteType.style.background='Yellow';}else{this.form.DiveSiteType.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteLevel</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteLevel' VALUE='$DiveSiteLevel'  SIZE='100' MAXLENGTH='100'  tabindex=22 id ='DiveSiteLevel' 
   onBlur=\"if(isBlank(this.form.DiveSiteLevel.value)) {alert('DiveSiteLevel cannot be blank');this.form.DiveSiteLevel.style.background='Yellow';}else{this.form.DiveSiteLevel.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteDifficulty</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteDifficulty' VALUE='$DiveSiteDifficulty'  SIZE='20' MAXLENGTH='20'  tabindex=23 id ='DiveSiteDifficulty' 
   onBlur=\"if(isBlank(this.form.DiveSiteDifficulty.value)) {alert('DiveSiteDifficulty cannot be blank');this.form.DiveSiteDifficulty.style.background='Yellow';}else{this.form.DiveSiteDifficulty.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteTideTable</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteTideTable' VALUE='$DiveSiteTideTable'  SIZE='80' MAXLENGTH='80'  tabindex=24 id ='DiveSiteTideTable' 
   onBlur=\"if(isBlank(this.form.DiveSiteTideTable.value)) {alert('DiveSiteTideTable cannot be blank');this.form.DiveSiteTideTable.style.background='Yellow';}else{this.form.DiveSiteTideTable.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteBestDiveMonths</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteBestDiveMonths' VALUE='$DiveSiteBestDiveMonths'  SIZE='15' MAXLENGTH='15'  tabindex=25 id ='DiveSiteBestDiveMonths' 
   onBlur=\"if(isBlank(this.form.DiveSiteBestDiveMonths.value)) {alert('DiveSiteBestDiveMonths cannot be blank');this.form.DiveSiteBestDiveMonths.style.background='Yellow';}else{this.form.DiveSiteBestDiveMonths.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteTimeRestrictions</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteTimeRestrictions' VALUE='$DiveSiteTimeRestrictions'  SIZE='50' MAXLENGTH='50'  tabindex=26 id ='DiveSiteTimeRestrictions' 
   onBlur=\"if(isBlank(this.form.DiveSiteTimeRestrictions.value)) {alert('DiveSiteTimeRestrictions cannot be blank');this.form.DiveSiteTimeRestrictions.style.background='Yellow';}else{this.form.DiveSiteTimeRestrictions.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSitePermitRequired</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSitePermitRequired' VALUE='$DiveSitePermitRequired'  SIZE='50' MAXLENGTH='50'  tabindex=27 id ='DiveSitePermitRequired' 
   onBlur=\"if(isBlank(this.form.DiveSitePermitRequired.value)) {alert('DiveSitePermitRequired cannot be blank');this.form.DiveSitePermitRequired.style.background='Yellow';}else{this.form.DiveSitePermitRequired.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteWinterTemp</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteWinterTemp' VALUE='$DiveSiteWinterTemp'  SIZE='11' MAXLENGTH='11'  tabindex=28 id ='DiveSiteWinterTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteWinterTemp.value)) {alert('DiveSiteWinterTemp cannot be blank');this.form.DiveSiteWinterTemp.style.background='Yellow';}else{this.form.DiveSiteWinterTemp.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSummerTemp</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteSummerTemp' VALUE='$DiveSiteSummerTemp'  SIZE='11' MAXLENGTH='11'  tabindex=29 id ='DiveSiteSummerTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteSummerTemp.value)) {alert('DiveSiteSummerTemp cannot be blank');this.form.DiveSiteSummerTemp.style.background='Yellow';}else{this.form.DiveSiteSummerTemp.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteFallTemp</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteFallTemp' VALUE='$DiveSiteFallTemp'  SIZE='11' MAXLENGTH='11'  tabindex=30 id ='DiveSiteFallTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteFallTemp.value)) {alert('DiveSiteFallTemp cannot be blank');this.form.DiveSiteFallTemp.style.background='Yellow';}else{this.form.DiveSiteFallTemp.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSpringTemp</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteSpringTemp' VALUE='$DiveSiteSpringTemp'  SIZE='11' MAXLENGTH='11'  tabindex=31 id ='DiveSiteSpringTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteSpringTemp.value)) {alert('DiveSiteSpringTemp cannot be blank');this.form.DiveSiteSpringTemp.style.background='Yellow';}else{this.form.DiveSiteSpringTemp.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteTempUnits</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteTempUnits' VALUE='$DiveSiteTempUnits'  SIZE='12' MAXLENGTH='12'  tabindex=32 id ='DiveSiteTempUnits' 
   onBlur=\"if(isBlank(this.form.DiveSiteTempUnits.value)) {alert('DiveSiteTempUnits cannot be blank');this.form.DiveSiteTempUnits.style.background='Yellow';}else{this.form.DiveSiteTempUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteVisibilityMinimum</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteVisibilityMinimum' VALUE='$DiveSiteVisibilityMinimum'  SIZE='11' MAXLENGTH='11'  tabindex=33 id ='DiveSiteVisibilityMinimum' 
   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityMinimum.value)) {alert('DiveSiteVisibilityMinimum cannot be blank');this.form.DiveSiteVisibilityMinimum.style.background='Yellow';}else{this.form.DiveSiteVisibilityMinimum.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteVisibilityMaximum</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteVisibilityMaximum' VALUE='$DiveSiteVisibilityMaximum'  SIZE='11' MAXLENGTH='11'  tabindex=34 id ='DiveSiteVisibilityMaximum' 
   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityMaximum.value)) {alert('DiveSiteVisibilityMaximum cannot be blank');this.form.DiveSiteVisibilityMaximum.style.background='Yellow';}else{this.form.DiveSiteVisibilityMaximum.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteVisibilityUnits</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteVisibilityUnits' VALUE='$DiveSiteVisibilityUnits'  SIZE='15' MAXLENGTH='15'  tabindex=35 id ='DiveSiteVisibilityUnits' 
   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityUnits.value)) {alert('DiveSiteVisibilityUnits cannot be blank');this.form.DiveSiteVisibilityUnits.style.background='Yellow';}else{this.form.DiveSiteVisibilityUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteFacilities</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteFacilities' VALUE='$DiveSiteFacilities'  SIZE='50' MAXLENGTH='50'  tabindex=36 id ='DiveSiteFacilities' 
   onBlur=\"if(isBlank(this.form.DiveSiteFacilities.value)) {alert('DiveSiteFacilities cannot be blank');this.form.DiveSiteFacilities.style.background='Yellow';}else{this.form.DiveSiteFacilities.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteFacilitiesNotes</th>
<td><TEXTAREA NAME='DiveSiteFacilitiesNotes' READONLY COLS=100 ROW=3 TABINDEX=37>$DiveSiteFacilitiesNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteRecommendationNotes</th>
<td><TEXTAREA NAME='DiveSiteRecommendationNotes' READONLY COLS=100 ROW=3 TABINDEX=38>$DiveSiteRecommendationNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteNotes</th>
<td><TEXTAREA NAME='DiveSiteNotes' READONLY COLS=100 ROW=3 TABINDEX=39>$DiveSiteNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteExactLat</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteExactLat' VALUE='$DiveSiteExactLat'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=40 id ='DiveSiteExactLat' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLat.value)) {alert('DiveSiteExactLat cannot be blank');this.form.DiveSiteExactLat.style.background='Yellow';}else{this.form.DiveSiteExactLat.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteExactLong</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteExactLong' VALUE='$DiveSiteExactLong'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=41 id ='DiveSiteExactLong' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLong.value)) {alert('DiveSiteExactLong cannot be blank');this.form.DiveSiteExactLong.style.background='Yellow';}else{this.form.DiveSiteExactLong.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteShoreLat</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteShoreLat' VALUE='$DiveSiteShoreLat'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=42 id ='DiveSiteShoreLat' 
   onBlur=\"if(isBlank(this.form.DiveSiteShoreLat.value)) {alert('DiveSiteShoreLat cannot be blank');this.form.DiveSiteShoreLat.style.background='Yellow';}else{this.form.DiveSiteShoreLat.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteShoreLong</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteShoreLong' VALUE='$DiveSiteShoreLong'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=43 id ='DiveSiteShoreLong' 
   onBlur=\"if(isBlank(this.form.DiveSiteShoreLong.value)) {alert('DiveSiteShoreLong cannot be blank');this.form.DiveSiteShoreLong.style.background='Yellow';}else{this.form.DiveSiteShoreLong.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteShoreNotes</th>
<td><TEXTAREA NAME='DiveSiteShoreNotes' READONLY COLS=100 ROW=3 TABINDEX=44>$DiveSiteShoreNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteWebPage</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteWebPage' VALUE='$DiveSiteWebPage'  SIZE='150' MAXLENGTH='150'  tabindex=45 id ='DiveSiteWebPage' 
   onBlur=\"if(isBlank(this.form.DiveSiteWebPage.value)) {alert('DiveSiteWebPage cannot be blank');this.form.DiveSiteWebPage.style.background='Yellow';}else{this.form.DiveSiteWebPage.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteBackground</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteBackground' VALUE='$DiveSiteBackground'  SIZE='150' MAXLENGTH='150'  tabindex=46 id ='DiveSiteBackground' 
   onBlur=\"if(isBlank(this.form.DiveSiteBackground.value)) {alert('DiveSiteBackground cannot be blank');this.form.DiveSiteBackground.style.background='Yellow';}else{this.form.DiveSiteBackground.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteEAPId</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteEAPId' VALUE='$DiveSiteEAPId'  SIZE='8' MAXLENGTH='8'  tabindex=47 id ='DiveSiteEAPId' 
   onBlur=\"if(isBlank(this.form.DiveSiteEAPId.value)) {alert('DiveSiteEAPId cannot be blank');this.form.DiveSiteEAPId.style.background='Yellow';}else{this.form.DiveSiteEAPId.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
<td colspan =2 align='center'>
<input type ='SUBMIT' NAME='display_button' Value = 'Back'>
</td>
</tr>
</TABLE>
</td></tr></TABLE>
</FORM>");   


return;

}

#-------------------------Get And Display the Maps -------------------------

function DisplayDesiredMaps()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
global $DesiredRecord,$Desired_divesite;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMap where DiveSiteId = '".strip_tags(addslashes($Desired_divesite ))."' order by DiveSiteMapDateEntered";
# echo('sql command: '.$sql.'<br>');
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMap Select * failure");
$NumDiveSiteMapRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteMapRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteMapId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteMapEnteredBy=$rowdata[2];
$DiveSiteMapDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteMapFileInfo=$rowdata[12];
$DiveSiteMapNotes=$rowdata[13];
}

echo('<table align="center" border = "1">');
echo('<tr><th colspan ="3">Dive Site Map</th></tr>');
echo('<tr><th>Dive Site Map Date</th><th>Dive Site Maps</th><th>Dive Site Map Notes</th></tr>');

echo('<tr><td align="center">'.$DiveSiteMapDateEntered.'<br><br>by<br><br>'.$DiveSiteMapEnteredBy.'</td><td><img src="'.$DiveSiteMapFileInfo.'" alt="PICTURE" ></td><td>'.$DiveSiteMapNotes.'</td></td>');


echo('</table>');




return;
}



#-------------------------Get and Display Picures -------------------------

function DisplayDesiredPictures()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSitePixRecords,$DiveSitePixId,$DiveSiteId,$DiveSitePixEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePixTitle,$DIveSitePixType;
global $DiveSitePixNoteKeywords,$DiveSitePixPictureURLFileInfo,$DiveSitePixNotes;
global $DesiredRecord,$Desired_divesite;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSitePix where DiveSiteId = '".strip_tags(addslashes($Desired_divesite))."' order by DiveSitePixDateEntered";
#echo('pix select: '.$sql.'<br>');
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePix Select * failure");
$NumDiveSitePixRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSitePixRecordsDesired>0)
{
	
while ($rowdata = mysql_fetch_row($result))

{
 #echo('<br/>'.$row[2]);
 #echo('<br/><img src="../DiveSiteImages/'.$rowdata[2].'" height="30%" alt="Picture one"/><br/>');
 #echo('<br/><bold>'.$rowsata[3].'</bold>');
 


$DiveSitePixId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSitePixEnteredBy=$rowdata[2];
$DiveSitePixDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSitePixTitle=$rowdata[12];
$DIveSitePixType=$rowdata[13];
$DiveSitePixNoteKeywords=$rowdata[14];
$DiveSitePixPictureURLFileInfo=$rowdata[15];
$DiveSitePixNotes=$rowdata[16];

#echo('here: '.$DiveSitePixPictureURLFileInfo.'<br>');

echo('<table align="center" border="1">');
echo('<tr><th colspan ="3">Dive Site Pictures</th></tr>');
echo('<tr><th>Dive Site Picture Date</th><th>Dive Site Picture</th><th>Dive Site Picture Notes</th></tr>');
echo('<tr><td align="center">'.$DiveSitePixDateEntered.'<br><br>by<br><br>'.$DiveSitePixEnteredBy.'</td><td><img src="DiveSiteImages/'.$DiveSitePixPictureURLFileInfo.'" alt="PICTURE" ></td><td>'.$DiveSitePixNotes.'</td></td>');


echo('</table>');

}


}

return;
}





#-------------------------Get a Desired Record -------------------------

function GetLoadDesiredRecord()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
global $DesiredRecord;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMap where(DiveSiteMapId = '".strip_tags(addslashes($DesiredRecord))."') order by DiveSiteMapId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMap Select * failure");
$NumDiveSiteMapRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteMapRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteMapId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteMapEnteredBy=$rowdata[2];
$DiveSiteMapDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteMapFileInfo=$rowdata[12];
$DiveSiteMapNotes=$rowdata[13];
}
PutVariablesIntoSession();
return;
}
#-------------------------Transfer Screen to Session Variables--------------------------

function PutVariablesIntoSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
$_SESSION['DiveSiteMapId'] = $DiveSiteMapId;
$_SESSION['DiveSiteId'] = $DiveSiteId;
$_SESSION['DiveSiteMapEnteredBy'] = $DiveSiteMapEnteredBy;
$_SESSION['DiveSiteMapDateEntered'] = $DiveSiteMapDateEntered;
$_SESSION['DiveSiteCity'] = $DiveSiteCity;
$_SESSION['DiveSiteProvince'] = $DiveSiteProvince;
$_SESSION['DiveSiteCountry'] = $DiveSiteCountry;
$_SESSION['DiveSiteName'] = $DiveSiteName;
$_SESSION['DiveSiteMajorName'] = $DiveSiteMajorName;
$_SESSION['DiveSiteMinorName'] = $DiveSiteMinorName;
$_SESSION['DiveSiteExactLat'] = $DiveSiteExactLat;
$_SESSION['DiveSiteExactLong'] = $DiveSiteExactLong;
$_SESSION['DiveSiteMapFileInfo'] = $DiveSiteMapFileInfo;
$_SESSION['DiveSiteMapNotes'] = $DiveSiteMapNotes;
return;
}

#--------------------Transfer POST to screen variables ----------------------------------

function GetPostVariables()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
$DiveSiteMapId=$_POST['DiveSiteMapId'];
$DiveSiteId=$_POST['DiveSiteId'];
$DiveSiteMapEnteredBy=$_POST['DiveSiteMapEnteredBy'];
$DiveSiteMapDateEntered=$_POST['DiveSiteMapDateEntered'];
$DiveSiteCity=$_POST['DiveSiteCity'];
$DiveSiteProvince=$_POST['DiveSiteProvince'];
$DiveSiteCountry=$_POST['DiveSiteCountry'];
$DiveSiteName=$_POST['DiveSiteName'];
$DiveSiteMajorName=$_POST['DiveSiteMajorName'];
$DiveSiteMinorName=$_POST['DiveSiteMinorName'];
$DiveSiteExactLat=$_POST['DiveSiteExactLat'];
$DiveSiteExactLong=$_POST['DiveSiteExactLong'];
$DiveSiteMapFileInfo=$_POST['DiveSiteMapFileInfo'];
$DiveSiteMapNotes=$_POST['DiveSiteMapNotes'];
return;
}

#-----------------------Transfer Session Variables to Screen variables---------------------

function GetVariablesFromSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
$DiveSiteMapId=$_SESSION['DiveSiteMapId'];
$DiveSiteId=$_SESSION['DiveSiteId'];
$DiveSiteMapEnteredBy=$_SESSION['DiveSiteMapEnteredBy'];
$DiveSiteMapDateEntered=$_SESSION['DiveSiteMapDateEntered'];
$DiveSiteCity=$_SESSION['DiveSiteCity'];
$DiveSiteProvince=$_SESSION['DiveSiteProvince'];
$DiveSiteCountry=$_SESSION['DiveSiteCountry'];
$DiveSiteName=$_SESSION['DiveSiteName'];
$DiveSiteMajorName=$_SESSION['DiveSiteMajorName'];
$DiveSiteMinorName=$_SESSION['DiveSiteMinorName'];
$DiveSiteExactLat=$_SESSION['DiveSiteExactLat'];
$DiveSiteExactLong=$_SESSION['DiveSiteExactLong'];
$DiveSiteMapFileInfo=$_SESSION['DiveSiteMapFileInfo'];
$DiveSiteMapNotes=$_SESSION['DiveSiteMapNotes'];
return;
}

#----------------------------Get Last Database Record-----------------------------------------
function GetLastRecord($conn,$result)
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
for($i=1;$i<=$NumDiveSiteMapRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteMapId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteMapEnteredBy=$rowdata[2];
$DiveSiteMapDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteMapFileInfo=$rowdata[12];
$DiveSiteMapNotes=$rowdata[13];
}
PutVariablesIntoSession();
return;
}
#----------------------------Common Form-----------------------------------------------------
function CommonForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
global $Mode;
echo stripslashes("
<TABLE border='1' align='center'><tr><td>
<TABLE border='1' align='center' cellspacing='5'>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMapId</th>
<td><input type ='text' NAME='DiveSiteMapId' VALUE='$DiveSiteMapId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteMapId' READONLY><br /></td>
</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMapEnteredBy</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMapEnteredBy' VALUE='$DiveSiteMapEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSiteMapEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSiteMapEnteredBy.value)) {alert('DiveSiteMapEnteredBy cannot be blank');this.form.DiveSiteMapEnteredBy.style.background='Yellow';}else{this.form.DiveSiteMapEnteredBy.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMapDateEntered</th>
<td><input type ='text' NAME='DiveSiteMapDateEntered' VALUE='$DiveSiteMapDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteMapDateEntered' 
   onBlur=\"if(isBlank(this.form.DiveSiteMapDateEntered.value)) {alert('DiveSiteMapDateEntered cannot be blank');this.form.DiveSiteMapDateEntered.style.background='Yellow';}else{this.form.DiveSiteMapDateEntered.style.background='White';}\">");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteMapEdit\'].DiveSiteMapDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteMapEntry\'].DiveSiteMapDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
echo("</td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteCity</th>
");
echo ("<td><input type ='text' NAME='DiveSiteCity' VALUE='$DiveSiteCity'  SIZE='30' MAXLENGTH='30'  tabindex='5' id ='DiveSiteCity' 
   onBlur=\"if(isBlank(this.form.DiveSiteCity.value)) {alert('DiveSiteCity cannot be blank');this.form.DiveSiteCity.style.background='Yellow';}else{this.form.DiveSiteCity.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteProvince</th>
");
echo ("<td><input type ='text' NAME='DiveSiteProvince' VALUE='$DiveSiteProvince'  SIZE='15' MAXLENGTH='15'  tabindex='6' id ='DiveSiteProvince' 
   onBlur=\"if(isBlank(this.form.DiveSiteProvince.value)) {alert('DiveSiteProvince cannot be blank');this.form.DiveSiteProvince.style.background='Yellow';}else{this.form.DiveSiteProvince.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteCountry</th>
");
echo ("<td><input type ='text' NAME='DiveSiteCountry' VALUE='$DiveSiteCountry'  SIZE='15' MAXLENGTH='15'  tabindex='7' id ='DiveSiteCountry' 
   onBlur=\"if(isBlank(this.form.DiveSiteCountry.value)) {alert('DiveSiteCountry cannot be blank');this.form.DiveSiteCountry.style.background='Yellow';}else{this.form.DiveSiteCountry.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteName</th>
");
echo ("<td><input type ='text' NAME='DiveSiteName' VALUE='$DiveSiteName'  SIZE='80' MAXLENGTH='80'  tabindex='8' id ='DiveSiteName' 
   onBlur=\"if(isBlank(this.form.DiveSiteName.value)) {alert('DiveSiteName cannot be blank');this.form.DiveSiteName.style.background='Yellow';}else{this.form.DiveSiteName.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMajorName</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMajorName' VALUE='$DiveSiteMajorName'  SIZE='80' MAXLENGTH='80'  tabindex='9' id ='DiveSiteMajorName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMajorName.value)) {alert('DiveSiteMajorName cannot be blank');this.form.DiveSiteMajorName.style.background='Yellow';}else{this.form.DiveSiteMajorName.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMinorName</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMinorName' VALUE='$DiveSiteMinorName'  SIZE='80' MAXLENGTH='80'  tabindex='10' id ='DiveSiteMinorName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMinorName.value)) {alert('DiveSiteMinorName cannot be blank');this.form.DiveSiteMinorName.style.background='Yellow';}else{this.form.DiveSiteMinorName.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteExactLat</th>
");
echo ("<td><input type ='text' NAME='DiveSiteExactLat' VALUE='$DiveSiteExactLat'  SIZE='10,6' MAXLENGTH='10,6'  tabindex='11' id ='DiveSiteExactLat' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLat.value)) {alert('DiveSiteExactLat cannot be blank');this.form.DiveSiteExactLat.style.background='Yellow';}else{this.form.DiveSiteExactLat.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteExactLong</th>
");
echo ("<td><input type ='text' NAME='DiveSiteExactLong' VALUE='$DiveSiteExactLong'  SIZE='10,6' MAXLENGTH='10,6'  tabindex='12' id ='DiveSiteExactLong' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLong.value)) {alert('DiveSiteExactLong cannot be blank');this.form.DiveSiteExactLong.style.background='Yellow';}else{this.form.DiveSiteExactLong.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMapFileInfo</th>
<td><input type='file' NAME='DiveSiteMapFileInfo'  VALUE='$DiveSiteMapFileInfo'  SIZE='150' MAXLENGTH='150'  tabindex='13' id ='DiveSiteMapFileInfo' 
   onBlur=\"if(isBlank(this.form.DiveSiteMapFileInfo.value)) {alert('DiveSiteMapFileInfo cannot be blank');this.form.DiveSiteMapFileInfo.style.background='Yellow';}else{this.form.DiveSiteMapFileInfo.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMapNotes</th>
<td><TEXTAREA NAME='DiveSiteMapNotes' COLS=100 ROW=3 TABINDEX='14'>$DiveSiteMapNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
");}
#----------------------------Entry Form----------------------------------------------------

function AddForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
global $Mode;
$Mode='ADD';
echo stripslashes("
<FORM NAME='DiveSiteMapEntry' action='DiveSiteMap.php' method='POST'>");
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
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
global $Mode;
$Mode='EDIT';
echo stripslashes("
<FORM NAME='DiveSiteMapEdit' action='DiveSiteMap.php' method='POST'>");
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
#-----------------------------Delete Form------------------------------------------------

function DeleteForm()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
echo stripslashes("
<FORM NAME='DiveSiteMapDelete' action='DiveSiteMap.php' method='POST'>
<TABLE  align='center' border='1'><tr><td>
<TABLE align='center' border='1' cellspacing='5'>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMapId</th>
<td><input type ='text' READONLY NAME='DiveSiteMapId' VALUE='$DiveSiteMapId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteMapId' READONLY><br /></td></tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMapEnteredBy</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMapEnteredBy' VALUE='$DiveSiteMapEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSiteMapEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSiteMapEnteredBy.value)) {alert('DiveSiteMapEnteredBy cannot be blank');this.form.DiveSiteMapEnteredBy.style.background='Yellow';}else{this.form.DiveSiteMapEnteredBy.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMapDateEntered</th>
<td><input type ='text'READONLY NAME='DiveSiteMapDateEntered' VALUE='$DiveSiteMapDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteMapDateEntered'>");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteMapEdit\'].DiveSiteMapDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteMapEntry\'].DiveSiteMapDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
echo("</td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteCity</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteCity' VALUE='$DiveSiteCity'  SIZE='30' MAXLENGTH='30'  tabindex='5' id ='DiveSiteCity' 
   onBlur=\"if(isBlank(this.form.DiveSiteCity.value)) {alert('DiveSiteCity cannot be blank');this.form.DiveSiteCity.style.background='Yellow';}else{this.form.DiveSiteCity.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteProvince</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteProvince' VALUE='$DiveSiteProvince'  SIZE='15' MAXLENGTH='15'  tabindex='6' id ='DiveSiteProvince' 
   onBlur=\"if(isBlank(this.form.DiveSiteProvince.value)) {alert('DiveSiteProvince cannot be blank');this.form.DiveSiteProvince.style.background='Yellow';}else{this.form.DiveSiteProvince.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteCountry</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteCountry' VALUE='$DiveSiteCountry'  SIZE='15' MAXLENGTH='15'  tabindex='7' id ='DiveSiteCountry' 
   onBlur=\"if(isBlank(this.form.DiveSiteCountry.value)) {alert('DiveSiteCountry cannot be blank');this.form.DiveSiteCountry.style.background='Yellow';}else{this.form.DiveSiteCountry.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteName</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteName' VALUE='$DiveSiteName'  SIZE='80' MAXLENGTH='80'  tabindex='8' id ='DiveSiteName' 
   onBlur=\"if(isBlank(this.form.DiveSiteName.value)) {alert('DiveSiteName cannot be blank');this.form.DiveSiteName.style.background='Yellow';}else{this.form.DiveSiteName.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMajorName</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMajorName' VALUE='$DiveSiteMajorName'  SIZE='80' MAXLENGTH='80'  tabindex='9' id ='DiveSiteMajorName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMajorName.value)) {alert('DiveSiteMajorName cannot be blank');this.form.DiveSiteMajorName.style.background='Yellow';}else{this.form.DiveSiteMajorName.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMinorName</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMinorName' VALUE='$DiveSiteMinorName'  SIZE='80' MAXLENGTH='80'  tabindex='10' id ='DiveSiteMinorName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMinorName.value)) {alert('DiveSiteMinorName cannot be blank');this.form.DiveSiteMinorName.style.background='Yellow';}else{this.form.DiveSiteMinorName.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteExactLat</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteExactLat' VALUE='$DiveSiteExactLat'  SIZE='10,6' MAXLENGTH='10,6'  tabindex='11' id ='DiveSiteExactLat' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLat.value)) {alert('DiveSiteExactLat cannot be blank');this.form.DiveSiteExactLat.style.background='Yellow';}else{this.form.DiveSiteExactLat.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteExactLong</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteExactLong' VALUE='$DiveSiteExactLong'  SIZE='10,6' MAXLENGTH='10,6'  tabindex='12' id ='DiveSiteExactLong' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLong.value)) {alert('DiveSiteExactLong cannot be blank');this.form.DiveSiteExactLong.style.background='Yellow';}else{this.form.DiveSiteExactLong.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMapFileInfo</th>
<td><input type='file'READONLY NAME='DiveSiteMapFileInfo'  VALUE='$DiveSiteMapFileInfo'  SIZE='150' MAXLENGTH='150'  tabindex='13' id ='DiveSiteMapFileInfo' 
   onBlur=\"if(isBlank(this.form.DiveSiteMapFileInfo.value)) {alert('DiveSiteMapFileInfo cannot be blank');this.form.DiveSiteMapFileInfo.style.background='Yellow';}else{this.form.DiveSiteMapFileInfo.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMapNotes</th>
<td><TEXTAREA NAME='DiveSiteMapNotes' READONLY COLS=100 ROW=3 TABINDEX='14'>$DiveSiteMapNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
<td colspan ='2' align='center'>
<input type ='SUBMIT' NAME='display_button' Value = 'Cancel Delete'>
<input type ='SUBMIT' NAME='display_button' Value = 'Submit Delete'>
</td>
</tr>
</TABLE>
</td></tr></TABLE>
</FORM>");}
#-----------------------------Display Form------------------------------------------------

function DisplayForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
echo stripslashes("
<FORM NAME='DiveSiteMapDisplay' action='DiveSiteMap.php' method='POST'>
<TABLE  align='center' border='1'><tr><td>
<TABLE align='center' border='1' cellspacing='5'>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMapId</th>
<td><input type ='text' READONLY NAME='DiveSiteMapId' VALUE='$DiveSiteMapId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteMapId' READONLY><br /></td>
</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId'><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId'><br /></td>");}
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMapEnteredBy</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMapEnteredBy' VALUE='$DiveSiteMapEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSiteMapEnteredBy'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMapDateEntered</th>
<td><input type ='text'READONLY NAME='DiveSiteMapDateEntered' VALUE='$DiveSiteMapDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteMapDateEntered'>");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteMapEdit\'].DiveSiteMapDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteMapEntry\'].DiveSiteMapDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
echo("</td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteCity</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteCity' VALUE='$DiveSiteCity'  SIZE='30' MAXLENGTH='30'  tabindex='5' id ='DiveSiteCity'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteProvince</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteProvince' VALUE='$DiveSiteProvince'  SIZE='15' MAXLENGTH='15'  tabindex='6' id ='DiveSiteProvince'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteCountry</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteCountry' VALUE='$DiveSiteCountry'  SIZE='15' MAXLENGTH='15'  tabindex='7' id ='DiveSiteCountry'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteName</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteName' VALUE='$DiveSiteName'  SIZE='80' MAXLENGTH='80'  tabindex='8' id ='DiveSiteName'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMajorName</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMajorName' VALUE='$DiveSiteMajorName'  SIZE='80' MAXLENGTH='80'  tabindex='9' id ='DiveSiteMajorName'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMinorName</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMinorName' VALUE='$DiveSiteMinorName'  SIZE='80' MAXLENGTH='80'  tabindex='10' id ='DiveSiteMinorName'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteExactLat</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteExactLat' VALUE='$DiveSiteExactLat'  SIZE='10,6' MAXLENGTH='10,6'  tabindex='11' id ='DiveSiteExactLat'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteExactLong</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteExactLong' VALUE='$DiveSiteExactLong'  SIZE='10,6' MAXLENGTH='10,6'  tabindex='12' id ='DiveSiteExactLong'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMapFileInfo</th>
<td><input type='file'READONLY NAME='DiveSiteMapFileInfo'  VALUE='$DiveSiteMapFileInfo'  SIZE='150' MAXLENGTH='150'  tabindex='13' id ='DiveSiteMapFileInfo'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMapNotes</th>
<td><TEXTAREA NAME='DiveSiteMapNotes' READONLY COLS=100 ROW=3 TABINDEX='14'>$DiveSiteMapNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
<td colspan ='2' align='center'>
<input type ='SUBMIT' NAME='display_button' Value = 'Return'>
<input type ='SUBMIT' NAME='display_button' Value = 'Edit'>
<input type ='SUBMIT' NAME='display_button' Value = 'Delete'>
</td>
</tr>
</TABLE>
</td></tr></TABLE>
</FORM>");}
#--------------------------Initialize Variables---------------------------------------

function InitializeVariables()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
$DiveSiteMapId='TBD';
$DiveSiteId='';
$DiveSiteMapEnteredBy='';
$DiveSiteMapDateEntered='';
$DiveSiteCity='';
$DiveSiteProvince='';
$DiveSiteCountry='';
$DiveSiteName='';
$DiveSiteMajorName='';
$DiveSiteMinorName='';
$DiveSiteExactLat='';
$DiveSiteExactLong='';
$DiveSiteMapFileInfo='';
$DiveSiteMapNotes='';
return;
}
#----------------------------Get Next Record in Database -----------------------------------

function Db_Next()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
if($NumDiveSiteMapRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMap where(DiveSiteId > '".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMap Select * failure");
$NumDiveSiteMapRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteMapRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteMapId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteMapEnteredBy=$rowdata[2];
$DiveSiteMapDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteMapFileInfo=$rowdata[12];
$DiveSiteMapNotes=$rowdata[13];
}
else
{
$sql="select * from DiveSiteMap order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMap Select * failure");
$NumDiveSiteMapRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteMapRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteMapId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteMapEnteredBy=$rowdata[2];
$DiveSiteMapDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteMapFileInfo=$rowdata[12];
$DiveSiteMapNotes=$rowdata[13];
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
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
if($NumDiveSiteMapRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMap where(DiveSiteId < '".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMap Select * failure");
$NumDiveSiteMapRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteMapRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteMapRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteMapId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteMapEnteredBy=$rowdata[2];
$DiveSiteMapDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteMapFileInfo=$rowdata[12];
$DiveSiteMapNotes=$rowdata[13];
}
}
else
{
$sql="select * from DiveSiteMap order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMap Select * failure");
$NumDiveSiteMapRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteMapRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteMapRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteMapId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteMapEnteredBy=$rowdata[2];
$DiveSiteMapDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteMapFileInfo=$rowdata[12];
$DiveSiteMapNotes=$rowdata[13];
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
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$DiveSiteMapId=$_SESSION['DiveSiteMapId'];
$sql="update DiveSiteMap SET ";
$sql=$sql."DiveSiteId='".strip_tags(addslashes($DiveSiteId))."',";
$sql=$sql."DiveSiteMapEnteredBy='".strip_tags(addslashes($DiveSiteMapEnteredBy))."',";
$sql=$sql."DiveSiteMapDateEntered='".strip_tags(addslashes($DiveSiteMapDateEntered))."',";
$sql=$sql."DiveSiteCity='".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."DiveSiteProvince='".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."DiveSiteCountry='".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."DiveSiteName='".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."DiveSiteMajorName='".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."DiveSiteMinorName='".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."DiveSiteExactLat='".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."DiveSiteExactLong='".strip_tags(addslashes($DiveSiteExactLong))."',";
$sql=$sql."DiveSiteMapFileInfo='".strip_tags(addslashes($DiveSiteMapFileInfo))."',";
$sql=$sql."DiveSiteMapNotes='".strip_tags(addslashes($DiveSiteMapNotes))."' where DiveSiteMapId='".$DiveSiteMapId."'"; 
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMap DATA failure");
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#-----------------------------Print Out Current Form Variables--------------------------

function PrintFormVars()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
OutputMessage('NumDiveSiteMapRecords: '.$NumDiveSiteMapRecords);
OutputMessage('DiveSiteMapId: '.$DiveSiteMapId);
OutputMessage('DiveSiteId: '.$DiveSiteId);
OutputMessage('DiveSiteMapEnteredBy: '.$DiveSiteMapEnteredBy);
OutputMessage('DiveSiteMapDateEntered: '.$DiveSiteMapDateEntered);
OutputMessage('DiveSiteCity: '.$DiveSiteCity);
OutputMessage('DiveSiteProvince: '.$DiveSiteProvince);
OutputMessage('DiveSiteCountry: '.$DiveSiteCountry);
OutputMessage('DiveSiteName: '.$DiveSiteName);
OutputMessage('DiveSiteMajorName: '.$DiveSiteMajorName);
OutputMessage('DiveSiteMinorName: '.$DiveSiteMinorName);
OutputMessage('DiveSiteExactLat: '.$DiveSiteExactLat);
OutputMessage('DiveSiteExactLong: '.$DiveSiteExactLong);
OutputMessage('DiveSiteMapFileInfo: '.$DiveSiteMapFileInfo);
OutputMessage('DiveSiteMapNotes: '.$DiveSiteMapNotes);
return;
}
#-----------------------------Database Add Function---------------------------------------

function Db_Add()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="insert into DiveSiteMap(DiveSiteId,DiveSiteMapEnteredBy,DiveSiteMapDateEntered,DiveSiteCity,DiveSiteProvince,DiveSiteCountry,DiveSiteName,DiveSiteMajorName,DiveSiteMinorName,DiveSiteExactLat,DiveSiteExactLong,DiveSiteMapFileInfo,DiveSiteMapNotes) values (";
$sql=$sql."'".strip_tags(addslashes($DiveSiteId))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMapEnteredBy))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMapDateEntered))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLong))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMapFileInfo))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMapNotes))."')";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMap ADD failure");
$DiveSiteMapId=mysql_insert_id($connection);
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#----------------------------Database Delete Function------------------------------------

function Db_Delete()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="delete from DiveSiteMap where DiveSiteMapId='".$DiveSiteMapId."'";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMap DELETE failure");
mysql_close($connection);
return;
}
#-----------------------------Get Current Number of Records -----------------------------

function CurrentNumberRecords()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMap order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMap GetNumRecs failure");
$NumDiveSiteMapRecords = mysql_num_rows($result);
mysql_close($connection);
return;
}
#------------------------------Screen Report of Records in Database ---------------------

function ListRecords()
 { 
global $user, $serverhost,$db,$password;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMap order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMap GetNumRecs failure");
$NumDiveSiteMapRecords = mysql_num_rows($result);
echo "<form action='DiveSiteMap.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSiteMapId</b></td>";
echo "<td align='center' ><b>DiveSiteId</b></td>";
echo "<td align='center' ><b>DiveSiteMapEnteredBy</b></td>";
echo "<td align='center' ><b>DiveSiteMapDateEntered</b></td>";
echo "<td align='center' ><b>DiveSiteCity</b></td>";
echo "<td align='center' ><b>DiveSiteProvince</b></td>";
echo "<td align='center' ><b>DiveSiteCountry</b></td>";
echo "<td align='center' ><b>DiveSiteName</b></td>";
echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
echo "<td align='center' ><b>DiveSiteExactLat</b></td>";
echo "<td align='center' ><b>DiveSiteExactLong</b></td>";
echo "<td align='center' ><b>DiveSiteMapFileInfo</b></td>";
echo "<td align='center' ><b>DiveSiteMapNotes</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteMapRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
echo "<tr>";
echo "<td align='left'>".$rowdata[0]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[1]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[2]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[3]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[4]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[5]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[6]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[7]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[8]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[9]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[10]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[11]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[12]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[13]."&nbsp; </td>";
echo "</tr>";
}
echo "<tr><td colspan='14' align='center'><input type ='SUBMIT' NAME='display_button' Value = 'Back to Main'></td></tr>";
echo '</table>';
echo '</form>';
mysql_close($connection);
return;
}
#------------------------------List Menu of Records in Database ---------------------

function ListMenu()
 { 
global $user, $serverhost,$db,$password;
global $Desired_divesite_lat,$Desired_divesite_lng;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMap where DiveSiteExactLat=".$Desired_divesite_lat." and DiveSiteExactLong=".$Desired_divesite_lng." order by DiveSiteId";

#echo('here: '.$sql.'<br>');


$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMap GetNumRecs failure");
$NumDiveSiteMapRecords = mysql_num_rows($result);
mysql_close($connection);


echo "<form name='ListMenu' action='DiveSiteMap.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<input type='hidden' name='check' id='check'>";
echo "<tr>";
#echo "<td align='center' ><b>DiveSiteMapId</b></td>";
#echo "<td align='center' ><b>DiveSiteId</b></td>";
#echo "<td align='center' ><b>DiveSiteMapEnteredBy</b></td>";
#echo "<td align='center' ><b>DiveSiteMapDateEntered</b></td>";
#echo "<td align='center' ><b>DiveSiteCity</b></td>";
#echo "<td align='center' ><b>DiveSiteProvince</b></td>";
#echo "<td align='center' ><b>DiveSiteCountry</b></td>";
#echo "<td align='center' ><b>DiveSiteName</b></td>";
#echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
#echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
#echo "<td align='center' ><b>DiveSiteExactLat</b></td>";
#echo "<td align='center' ><b>DiveSiteExactLong</b></td>";
#echo "<td align='center' ><b>DiveSiteMapFileInfo</b></td>";
#echo "<td align='center' ><b>DiveSiteMapNotes</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteMapRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
echo "<tr>";
#echo "<td align='center'><input type=radio id='SelectRecord' NAME='SelectRecord' VALUE='".$rowdata[0]."' onClick=\"document.forms.ListMenu.display_button.value = 'Display';document.forms.ListMenu.check.value = 'Display';document.forms.ListMenu.submit();\" >&nbsp; </td>";
echo "<td align='left'>".$rowdata[1]."&nbsp; </td>";
echo "<td align='left' rowspan='10'><IMG SRC=".$rowdata[12].">&nbsp; </td></tr>";
echo "<tr><td align='left'>".$rowdata[2]."&nbsp; </td>";
echo "<tr><td align='left'>".$rowdata[3]."&nbsp; </td>";
echo "<tr><td align='left'>".$rowdata[4]."&nbsp; </td>";
echo "<tr><td align='left'>".$rowdata[5]."&nbsp; </td>";
echo "<tr><td align='left'>".$rowdata[6]."&nbsp; </td>";
echo "<tr><td align='left'>".$rowdata[7]."&nbsp; </td>";
echo "<tr><td align='left'>".$rowdata[8]."&nbsp; </td>";
echo "<tr><td align='left'>".$rowdata[9]."&nbsp; </td>";
echo "<tr><td align='left'>".$rowdata[10].", ".$rowdata[11]."&nbsp; </td>";
#echo "<tr><td align='left'>".$rowdata[11]."&nbsp; </td>";

#echo "<td align='left'><IMG SRC=".$rowdata[12].">&nbsp; </td>";



echo "<tr><td align='center' colspan='2'>".$rowdata[13]."&nbsp; </td>";

echo "</tr>";
}
echo "<tr><td colspan='2' align='center'>
<input type ='SUBMIT' disabled NAME='display_button' Value = 'Back'>";
echo "</td></tr>";
echo '</table>';
echo '</form>';
return;
}
#----------------------------Initialize Program Start ---------------------------------------

function InitializeProgram()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMap order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMap InitializeProgram failure");
$NumDiveSiteMapRecords = mysql_num_rows($result);
if($NumDiveSiteMapRecords==0)
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
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMapRecords,$DiveSiteMapId,$DiveSiteId,$DiveSiteMapEnteredBy,$DiveSiteMapDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMapFileInfo,$DiveSiteMapNotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMap where(DiveSiteId ='".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMap Select * failure");
$NumDiveSiteMapRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteMapRecordsDesired>0)
{return FALSE;}
  else
{return TRUE;}
}
#----------------------------Main Program--------------------------------------------

echo "<html>
<head>

<title>".$table." Display</title>
<h4><center>".$table." Display</center></h4>

<SCRIPT LANGUAGE=\"JavaScript\" type=\"text/javascript\">";
require('CalendarPopup.js');
echo"</SCRIPT>";
echo"<SCRIPT LANGUAGE=\"JavaScript\" type=\"text/javascript\">

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
echo "<body bgcolor ='".$BackgroundColor."'>";


  CurrentNumberRecords();
 
  if ($_POST)
   { 
     CurrentNumberRecords();
     GetVariablesFromSession();
   
     if($_POST['check']!='Display')
      {$Action=$_POST['display_button'];}
     else
      {$Action=$_POST['check'];}  
   
  
      switch($Action)
         {
             case 'Add':
               
               InitializeVariables();
               AddForm();
               break;

             case 'Edit':
               $DesiredRecord=$_POST['SelectRecord'];
               GetLoadDesiredRecord();
               EditForm();
               break;  
               
            case 'Display':
               $DesiredRecord=$_POST['SelectRecord'];
               GetLoadDesiredRecord();
               DisplayForm();
               break;       

             case 'Delete':
               $DesiredRecord=$_POST['SelectRecord'];
               GetLoadDesiredRecord();
               DeleteForm();

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
               ListMenu();
               break;
               
           case 'Submit Delete':
              
               GetPostVariables();
              Db_Delete();
               ListMenu();
               break;               
               
  
           case 'Submit Add':
               GetPostVariables();
               if(ValidUniqueCode())
                 {  
                   Db_Add();
                   ListMenu();
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
                   ListMenu();
                   break;

          case 'List Records':
                   ListRecords();
                   break;

         case 'Back':
                  header("Location: $CallingProgram");
                  break;                  


        


            default:
              
               ListMenu();
               break;   
         }  

   }
   else
   {
        InitializeProgram();
        ListMenu();
       
   }
echo"
</body>
</html>"
?>
