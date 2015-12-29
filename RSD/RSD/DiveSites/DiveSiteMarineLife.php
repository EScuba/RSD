<?php /**/ ?><?php
session_start();
require_once('SystemFunctions.php');
#ValidUserForProgram($_SESSION['User'],'DiveSiteMarineLife.php');

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
$db="aquatreasurequest";
$table="DiveSiteMarineLife";
$CallingProgram="index.php";
#-------------------------Get a Desired Record -------------------------

function GetLoadDesiredRecord()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
global $DesiredRecord;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMarineLife where(DiveSiteMarineLifeId = '".strip_tags(addslashes($DesiredRecord))."') order by DiveSiteMarineLifeId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMarineLife Select * failure");
$NumDiveSiteMarineLifeRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteMarineLifeRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteMarineLifeId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteMarineLifeEnteredBy=$rowdata[2];
$DiveSiteMarineLifeDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteMarineLifeDomain=$rowdata[12];
$DiveSiteMarineLifeKingdom=$rowdata[13];
$DiveSiteMarineLifePhylum=$rowdata[14];
$DiveSiteMarineLifeClass=$rowdata[15];
$DiveSiteMarineLifeSubClass=$rowdata[16];
$DiveSiteMarineLifeInfraClass=$rowdata[17];
$DiveSiteMarineLifeOrder=$rowdata[18];
$DiveSiteMarineLifeFamily=$rowdata[19];
$DiveSiteMarineLifeGenus=$rowdata[20];
$DiveSiteMarineLifeSpecies=$rowdata[21];
$DiveSiteMarineLifeCommonName=$rowdata[22];
$DiveSiteMarineLifeScientificName=$rowdata[23];
$DiveSiteMarineLifePictureURLFileInfo1=$rowdata[24];
$DiveSiteMarineLifePictureURLFileInfo2=$rowdata[25];
$DiveSiteMarineLifePictureURLFileInfo3=$rowdata[26];
$DiveSiteMarineLifePictureURLFileInfo4=$rowdata[27];
$DiveSiteMarineLifePictureURLFileInfo5=$rowdata[28];
$DiveSiteMarineLifeNotes=$rowdata[29];
}
PutVariablesIntoSession();
return;
}
#-------------------------Transfer Screen to Session Variables--------------------------

function PutVariablesIntoSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
$_SESSION['DiveSiteMarineLifeId'] = $DiveSiteMarineLifeId;
$_SESSION['DiveSiteId'] = $DiveSiteId;
$_SESSION['DiveSiteMarineLifeEnteredBy'] = $DiveSiteMarineLifeEnteredBy;
$_SESSION['DiveSiteMarineLifeDateEntered'] = $DiveSiteMarineLifeDateEntered;
$_SESSION['DiveSiteCity'] = $DiveSiteCity;
$_SESSION['DiveSiteProvince'] = $DiveSiteProvince;
$_SESSION['DiveSiteCountry'] = $DiveSiteCountry;
$_SESSION['DiveSiteName'] = $DiveSiteName;
$_SESSION['DiveSiteMajorName'] = $DiveSiteMajorName;
$_SESSION['DiveSiteMinorName'] = $DiveSiteMinorName;
$_SESSION['DiveSiteExactLat'] = $DiveSiteExactLat;
$_SESSION['DiveSiteExactLong'] = $DiveSiteExactLong;
$_SESSION['DiveSiteMarineLifeDomain'] = $DiveSiteMarineLifeDomain;
$_SESSION['DiveSiteMarineLifeKingdom'] = $DiveSiteMarineLifeKingdom;
$_SESSION['DiveSiteMarineLifePhylum'] = $DiveSiteMarineLifePhylum;
$_SESSION['DiveSiteMarineLifeClass'] = $DiveSiteMarineLifeClass;
$_SESSION['DiveSiteMarineLifeSubClass'] = $DiveSiteMarineLifeSubClass;
$_SESSION['DiveSiteMarineLifeInfraClass'] = $DiveSiteMarineLifeInfraClass;
$_SESSION['DiveSiteMarineLifeOrder'] = $DiveSiteMarineLifeOrder;
$_SESSION['DiveSiteMarineLifeFamily'] = $DiveSiteMarineLifeFamily;
$_SESSION['DiveSiteMarineLifeGenus'] = $DiveSiteMarineLifeGenus;
$_SESSION['DiveSiteMarineLifeSpecies'] = $DiveSiteMarineLifeSpecies;
$_SESSION['DiveSiteMarineLifeCommonName'] = $DiveSiteMarineLifeCommonName;
$_SESSION['DiveSiteMarineLifeScientificName'] = $DiveSiteMarineLifeScientificName;
$_SESSION['DiveSiteMarineLifePictureURLFileInfo1'] = $DiveSiteMarineLifePictureURLFileInfo1;
$_SESSION['DiveSiteMarineLifePictureURLFileInfo2'] = $DiveSiteMarineLifePictureURLFileInfo2;
$_SESSION['DiveSiteMarineLifePictureURLFileInfo3'] = $DiveSiteMarineLifePictureURLFileInfo3;
$_SESSION['DiveSiteMarineLifePictureURLFileInfo4'] = $DiveSiteMarineLifePictureURLFileInfo4;
$_SESSION['DiveSiteMarineLifePictureURLFileInfo5'] = $DiveSiteMarineLifePictureURLFileInfo5;
$_SESSION['DiveSiteMarineLifeNotes'] = $DiveSiteMarineLifeNotes;
return;
}

#--------------------Transfer POST to screen variables ----------------------------------

function GetPostVariables()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
$DiveSiteMarineLifeId=$_POST['DiveSiteMarineLifeId'];
$DiveSiteId=$_POST['DiveSiteId'];
$DiveSiteMarineLifeEnteredBy=$_POST['DiveSiteMarineLifeEnteredBy'];
$DiveSiteMarineLifeDateEntered=$_POST['DiveSiteMarineLifeDateEntered'];
$DiveSiteCity=$_POST['DiveSiteCity'];
$DiveSiteProvince=$_POST['DiveSiteProvince'];
$DiveSiteCountry=$_POST['DiveSiteCountry'];
$DiveSiteName=$_POST['DiveSiteName'];
$DiveSiteMajorName=$_POST['DiveSiteMajorName'];
$DiveSiteMinorName=$_POST['DiveSiteMinorName'];
$DiveSiteExactLat=$_POST['DiveSiteExactLat'];
$DiveSiteExactLong=$_POST['DiveSiteExactLong'];
$DiveSiteMarineLifeDomain=$_POST['DiveSiteMarineLifeDomain'];
$DiveSiteMarineLifeKingdom=$_POST['DiveSiteMarineLifeKingdom'];
$DiveSiteMarineLifePhylum=$_POST['DiveSiteMarineLifePhylum'];
$DiveSiteMarineLifeClass=$_POST['DiveSiteMarineLifeClass'];
$DiveSiteMarineLifeSubClass=$_POST['DiveSiteMarineLifeSubClass'];
$DiveSiteMarineLifeInfraClass=$_POST['DiveSiteMarineLifeInfraClass'];
$DiveSiteMarineLifeOrder=$_POST['DiveSiteMarineLifeOrder'];
$DiveSiteMarineLifeFamily=$_POST['DiveSiteMarineLifeFamily'];
$DiveSiteMarineLifeGenus=$_POST['DiveSiteMarineLifeGenus'];
$DiveSiteMarineLifeSpecies=$_POST['DiveSiteMarineLifeSpecies'];
$DiveSiteMarineLifeCommonName=$_POST['DiveSiteMarineLifeCommonName'];
$DiveSiteMarineLifeScientificName=$_POST['DiveSiteMarineLifeScientificName'];
$DiveSiteMarineLifePictureURLFileInfo1=$_POST['DiveSiteMarineLifePictureURLFileInfo1'];
$DiveSiteMarineLifePictureURLFileInfo2=$_POST['DiveSiteMarineLifePictureURLFileInfo2'];
$DiveSiteMarineLifePictureURLFileInfo3=$_POST['DiveSiteMarineLifePictureURLFileInfo3'];
$DiveSiteMarineLifePictureURLFileInfo4=$_POST['DiveSiteMarineLifePictureURLFileInfo4'];
$DiveSiteMarineLifePictureURLFileInfo5=$_POST['DiveSiteMarineLifePictureURLFileInfo5'];
$DiveSiteMarineLifeNotes=$_POST['DiveSiteMarineLifeNotes'];
return;
}

#-----------------------Transfer Session Variables to Screen variables---------------------

function GetVariablesFromSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
$DiveSiteMarineLifeId=$_SESSION['DiveSiteMarineLifeId'];
$DiveSiteId=$_SESSION['DiveSiteId'];
$DiveSiteMarineLifeEnteredBy=$_SESSION['DiveSiteMarineLifeEnteredBy'];
$DiveSiteMarineLifeDateEntered=$_SESSION['DiveSiteMarineLifeDateEntered'];
$DiveSiteCity=$_SESSION['DiveSiteCity'];
$DiveSiteProvince=$_SESSION['DiveSiteProvince'];
$DiveSiteCountry=$_SESSION['DiveSiteCountry'];
$DiveSiteName=$_SESSION['DiveSiteName'];
$DiveSiteMajorName=$_SESSION['DiveSiteMajorName'];
$DiveSiteMinorName=$_SESSION['DiveSiteMinorName'];
$DiveSiteExactLat=$_SESSION['DiveSiteExactLat'];
$DiveSiteExactLong=$_SESSION['DiveSiteExactLong'];
$DiveSiteMarineLifeDomain=$_SESSION['DiveSiteMarineLifeDomain'];
$DiveSiteMarineLifeKingdom=$_SESSION['DiveSiteMarineLifeKingdom'];
$DiveSiteMarineLifePhylum=$_SESSION['DiveSiteMarineLifePhylum'];
$DiveSiteMarineLifeClass=$_SESSION['DiveSiteMarineLifeClass'];
$DiveSiteMarineLifeSubClass=$_SESSION['DiveSiteMarineLifeSubClass'];
$DiveSiteMarineLifeInfraClass=$_SESSION['DiveSiteMarineLifeInfraClass'];
$DiveSiteMarineLifeOrder=$_SESSION['DiveSiteMarineLifeOrder'];
$DiveSiteMarineLifeFamily=$_SESSION['DiveSiteMarineLifeFamily'];
$DiveSiteMarineLifeGenus=$_SESSION['DiveSiteMarineLifeGenus'];
$DiveSiteMarineLifeSpecies=$_SESSION['DiveSiteMarineLifeSpecies'];
$DiveSiteMarineLifeCommonName=$_SESSION['DiveSiteMarineLifeCommonName'];
$DiveSiteMarineLifeScientificName=$_SESSION['DiveSiteMarineLifeScientificName'];
$DiveSiteMarineLifePictureURLFileInfo1=$_SESSION['DiveSiteMarineLifePictureURLFileInfo1'];
$DiveSiteMarineLifePictureURLFileInfo2=$_SESSION['DiveSiteMarineLifePictureURLFileInfo2'];
$DiveSiteMarineLifePictureURLFileInfo3=$_SESSION['DiveSiteMarineLifePictureURLFileInfo3'];
$DiveSiteMarineLifePictureURLFileInfo4=$_SESSION['DiveSiteMarineLifePictureURLFileInfo4'];
$DiveSiteMarineLifePictureURLFileInfo5=$_SESSION['DiveSiteMarineLifePictureURLFileInfo5'];
$DiveSiteMarineLifeNotes=$_SESSION['DiveSiteMarineLifeNotes'];
return;
}

#----------------------------Get Last Database Record-----------------------------------------
function GetLastRecord($conn,$result)
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
for($i=1;$i<=$NumDiveSiteMarineLifeRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteMarineLifeId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteMarineLifeEnteredBy=$rowdata[2];
$DiveSiteMarineLifeDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteMarineLifeDomain=$rowdata[12];
$DiveSiteMarineLifeKingdom=$rowdata[13];
$DiveSiteMarineLifePhylum=$rowdata[14];
$DiveSiteMarineLifeClass=$rowdata[15];
$DiveSiteMarineLifeSubClass=$rowdata[16];
$DiveSiteMarineLifeInfraClass=$rowdata[17];
$DiveSiteMarineLifeOrder=$rowdata[18];
$DiveSiteMarineLifeFamily=$rowdata[19];
$DiveSiteMarineLifeGenus=$rowdata[20];
$DiveSiteMarineLifeSpecies=$rowdata[21];
$DiveSiteMarineLifeCommonName=$rowdata[22];
$DiveSiteMarineLifeScientificName=$rowdata[23];
$DiveSiteMarineLifePictureURLFileInfo1=$rowdata[24];
$DiveSiteMarineLifePictureURLFileInfo2=$rowdata[25];
$DiveSiteMarineLifePictureURLFileInfo3=$rowdata[26];
$DiveSiteMarineLifePictureURLFileInfo4=$rowdata[27];
$DiveSiteMarineLifePictureURLFileInfo5=$rowdata[28];
$DiveSiteMarineLifeNotes=$rowdata[29];
}
PutVariablesIntoSession();
return;
}
#----------------------------Common Form-----------------------------------------------------
function CommonForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
global $Mode;
echo stripslashes("
<TABLE border='1' align='center'><tr><td>
<TABLE border='1' align='center' cellspacing='5'>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeId</th>
<td><input type ='text' NAME='DiveSiteMarineLifeId' VALUE='$DiveSiteMarineLifeId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteMarineLifeId' READONLY><br /></td>
</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeEnteredBy</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMarineLifeEnteredBy' VALUE='$DiveSiteMarineLifeEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSiteMarineLifeEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeEnteredBy.value)) {alert('DiveSiteMarineLifeEnteredBy cannot be blank');this.form.DiveSiteMarineLifeEnteredBy.style.background='Yellow';}else{this.form.DiveSiteMarineLifeEnteredBy.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeDateEntered</th>
<td><input type ='text' NAME='DiveSiteMarineLifeDateEntered' VALUE='$DiveSiteMarineLifeDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteMarineLifeDateEntered' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeDateEntered.value)) {alert('DiveSiteMarineLifeDateEntered cannot be blank');this.form.DiveSiteMarineLifeDateEntered.style.background='Yellow';}else{this.form.DiveSiteMarineLifeDateEntered.style.background='White';}\">");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteMarineLifeEdit\'].DiveSiteMarineLifeDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteMarineLifeEntry\'].DiveSiteMarineLifeDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
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
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeDomain</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMarineLifeDomain' VALUE='$DiveSiteMarineLifeDomain'  SIZE='20' MAXLENGTH='20'  tabindex='13' id ='DiveSiteMarineLifeDomain' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeDomain.value)) {alert('DiveSiteMarineLifeDomain cannot be blank');this.form.DiveSiteMarineLifeDomain.style.background='Yellow';}else{this.form.DiveSiteMarineLifeDomain.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeKingdom</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMarineLifeKingdom' VALUE='$DiveSiteMarineLifeKingdom'  SIZE='20' MAXLENGTH='20'  tabindex='14' id ='DiveSiteMarineLifeKingdom' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeKingdom.value)) {alert('DiveSiteMarineLifeKingdom cannot be blank');this.form.DiveSiteMarineLifeKingdom.style.background='Yellow';}else{this.form.DiveSiteMarineLifeKingdom.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifePhylum</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMarineLifePhylum' VALUE='$DiveSiteMarineLifePhylum'  SIZE='20' MAXLENGTH='20'  tabindex='15' id ='DiveSiteMarineLifePhylum' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifePhylum.value)) {alert('DiveSiteMarineLifePhylum cannot be blank');this.form.DiveSiteMarineLifePhylum.style.background='Yellow';}else{this.form.DiveSiteMarineLifePhylum.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeClass</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMarineLifeClass' VALUE='$DiveSiteMarineLifeClass'  SIZE='20' MAXLENGTH='20'  tabindex='16' id ='DiveSiteMarineLifeClass' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeClass.value)) {alert('DiveSiteMarineLifeClass cannot be blank');this.form.DiveSiteMarineLifeClass.style.background='Yellow';}else{this.form.DiveSiteMarineLifeClass.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeSubClass</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMarineLifeSubClass' VALUE='$DiveSiteMarineLifeSubClass'  SIZE='20' MAXLENGTH='20'  tabindex='17' id ='DiveSiteMarineLifeSubClass' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeSubClass.value)) {alert('DiveSiteMarineLifeSubClass cannot be blank');this.form.DiveSiteMarineLifeSubClass.style.background='Yellow';}else{this.form.DiveSiteMarineLifeSubClass.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeInfraClass</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMarineLifeInfraClass' VALUE='$DiveSiteMarineLifeInfraClass'  SIZE='20' MAXLENGTH='20'  tabindex='18' id ='DiveSiteMarineLifeInfraClass' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeInfraClass.value)) {alert('DiveSiteMarineLifeInfraClass cannot be blank');this.form.DiveSiteMarineLifeInfraClass.style.background='Yellow';}else{this.form.DiveSiteMarineLifeInfraClass.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeOrder</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMarineLifeOrder' VALUE='$DiveSiteMarineLifeOrder'  SIZE='20' MAXLENGTH='20'  tabindex='19' id ='DiveSiteMarineLifeOrder' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeOrder.value)) {alert('DiveSiteMarineLifeOrder cannot be blank');this.form.DiveSiteMarineLifeOrder.style.background='Yellow';}else{this.form.DiveSiteMarineLifeOrder.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeFamily</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMarineLifeFamily' VALUE='$DiveSiteMarineLifeFamily'  SIZE='20' MAXLENGTH='20'  tabindex='20' id ='DiveSiteMarineLifeFamily' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeFamily.value)) {alert('DiveSiteMarineLifeFamily cannot be blank');this.form.DiveSiteMarineLifeFamily.style.background='Yellow';}else{this.form.DiveSiteMarineLifeFamily.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeGenus</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMarineLifeGenus' VALUE='$DiveSiteMarineLifeGenus'  SIZE='20' MAXLENGTH='20'  tabindex='21' id ='DiveSiteMarineLifeGenus' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeGenus.value)) {alert('DiveSiteMarineLifeGenus cannot be blank');this.form.DiveSiteMarineLifeGenus.style.background='Yellow';}else{this.form.DiveSiteMarineLifeGenus.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeSpecies</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMarineLifeSpecies' VALUE='$DiveSiteMarineLifeSpecies'  SIZE='20' MAXLENGTH='20'  tabindex='22' id ='DiveSiteMarineLifeSpecies' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeSpecies.value)) {alert('DiveSiteMarineLifeSpecies cannot be blank');this.form.DiveSiteMarineLifeSpecies.style.background='Yellow';}else{this.form.DiveSiteMarineLifeSpecies.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeCommonName</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMarineLifeCommonName' VALUE='$DiveSiteMarineLifeCommonName'  SIZE='40' MAXLENGTH='40'  tabindex='23' id ='DiveSiteMarineLifeCommonName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeCommonName.value)) {alert('DiveSiteMarineLifeCommonName cannot be blank');this.form.DiveSiteMarineLifeCommonName.style.background='Yellow';}else{this.form.DiveSiteMarineLifeCommonName.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeScientificName</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMarineLifeScientificName' VALUE='$DiveSiteMarineLifeScientificName'  SIZE='40' MAXLENGTH='40'  tabindex='24' id ='DiveSiteMarineLifeScientificName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeScientificName.value)) {alert('DiveSiteMarineLifeScientificName cannot be blank');this.form.DiveSiteMarineLifeScientificName.style.background='Yellow';}else{this.form.DiveSiteMarineLifeScientificName.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifePictureURLFileInfo1</th>
<td><input type='file' NAME='DiveSiteMarineLifePictureURLFileInfo1'  VALUE='$DiveSiteMarineLifePictureURLFileInfo1'  SIZE='150' MAXLENGTH='150'  tabindex='25' id ='DiveSiteMarineLifePictureURLFileInfo1' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifePictureURLFileInfo1.value)) {alert('DiveSiteMarineLifePictureURLFileInfo1 cannot be blank');this.form.DiveSiteMarineLifePictureURLFileInfo1.style.background='Yellow';}else{this.form.DiveSiteMarineLifePictureURLFileInfo1.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifePictureURLFileInfo2</th>
<td><input type='file' NAME='DiveSiteMarineLifePictureURLFileInfo2'  VALUE='$DiveSiteMarineLifePictureURLFileInfo2'  SIZE='150' MAXLENGTH='150'  tabindex='26' id ='DiveSiteMarineLifePictureURLFileInfo2' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifePictureURLFileInfo2.value)) {alert('DiveSiteMarineLifePictureURLFileInfo2 cannot be blank');this.form.DiveSiteMarineLifePictureURLFileInfo2.style.background='Yellow';}else{this.form.DiveSiteMarineLifePictureURLFileInfo2.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifePictureURLFileInfo3</th>
<td><input type='file' NAME='DiveSiteMarineLifePictureURLFileInfo3'  VALUE='$DiveSiteMarineLifePictureURLFileInfo3'  SIZE='150' MAXLENGTH='150'  tabindex='27' id ='DiveSiteMarineLifePictureURLFileInfo3' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifePictureURLFileInfo3.value)) {alert('DiveSiteMarineLifePictureURLFileInfo3 cannot be blank');this.form.DiveSiteMarineLifePictureURLFileInfo3.style.background='Yellow';}else{this.form.DiveSiteMarineLifePictureURLFileInfo3.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifePictureURLFileInfo4</th>
<td><input type='file' NAME='DiveSiteMarineLifePictureURLFileInfo4'  VALUE='$DiveSiteMarineLifePictureURLFileInfo4'  SIZE='150' MAXLENGTH='150'  tabindex='28' id ='DiveSiteMarineLifePictureURLFileInfo4' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifePictureURLFileInfo4.value)) {alert('DiveSiteMarineLifePictureURLFileInfo4 cannot be blank');this.form.DiveSiteMarineLifePictureURLFileInfo4.style.background='Yellow';}else{this.form.DiveSiteMarineLifePictureURLFileInfo4.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifePictureURLFileInfo5</th>
<td><input type='file' NAME='DiveSiteMarineLifePictureURLFileInfo5'  VALUE='$DiveSiteMarineLifePictureURLFileInfo5'  SIZE='150' MAXLENGTH='150'  tabindex='29' id ='DiveSiteMarineLifePictureURLFileInfo5' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifePictureURLFileInfo5.value)) {alert('DiveSiteMarineLifePictureURLFileInfo5 cannot be blank');this.form.DiveSiteMarineLifePictureURLFileInfo5.style.background='Yellow';}else{this.form.DiveSiteMarineLifePictureURLFileInfo5.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteMarineLifeNotes</th>
<td><TEXTAREA NAME='DiveSiteMarineLifeNotes' COLS=100 ROW=3 TABINDEX='30'>$DiveSiteMarineLifeNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
");}
#----------------------------Entry Form----------------------------------------------------

function AddForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
global $Mode;
$Mode='ADD';
echo stripslashes("
<FORM NAME='DiveSiteMarineLifeEntry' action='DiveSiteMarineLife.php' method='POST'>");
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
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
global $Mode;
$Mode='EDIT';
echo stripslashes("
<FORM NAME='DiveSiteMarineLifeEdit' action='DiveSiteMarineLife.php' method='POST'>");
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
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
echo stripslashes("
<FORM NAME='DiveSiteMarineLifeDelete' action='DiveSiteMarineLife.php' method='POST'>
<TABLE  align='center' border='1'><tr><td>
<TABLE align='center' border='1' cellspacing='5'>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeId</th>
<td><input type ='text' READONLY NAME='DiveSiteMarineLifeId' VALUE='$DiveSiteMarineLifeId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteMarineLifeId' READONLY><br /></td></tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeEnteredBy</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeEnteredBy' VALUE='$DiveSiteMarineLifeEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSiteMarineLifeEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeEnteredBy.value)) {alert('DiveSiteMarineLifeEnteredBy cannot be blank');this.form.DiveSiteMarineLifeEnteredBy.style.background='Yellow';}else{this.form.DiveSiteMarineLifeEnteredBy.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeDateEntered</th>
<td><input type ='text'READONLY NAME='DiveSiteMarineLifeDateEntered' VALUE='$DiveSiteMarineLifeDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteMarineLifeDateEntered'>");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteMarineLifeEdit\'].DiveSiteMarineLifeDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteMarineLifeEntry\'].DiveSiteMarineLifeDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
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
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeDomain</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeDomain' VALUE='$DiveSiteMarineLifeDomain'  SIZE='20' MAXLENGTH='20'  tabindex='13' id ='DiveSiteMarineLifeDomain' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeDomain.value)) {alert('DiveSiteMarineLifeDomain cannot be blank');this.form.DiveSiteMarineLifeDomain.style.background='Yellow';}else{this.form.DiveSiteMarineLifeDomain.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeKingdom</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeKingdom' VALUE='$DiveSiteMarineLifeKingdom'  SIZE='20' MAXLENGTH='20'  tabindex='14' id ='DiveSiteMarineLifeKingdom' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeKingdom.value)) {alert('DiveSiteMarineLifeKingdom cannot be blank');this.form.DiveSiteMarineLifeKingdom.style.background='Yellow';}else{this.form.DiveSiteMarineLifeKingdom.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifePhylum</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifePhylum' VALUE='$DiveSiteMarineLifePhylum'  SIZE='20' MAXLENGTH='20'  tabindex='15' id ='DiveSiteMarineLifePhylum' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifePhylum.value)) {alert('DiveSiteMarineLifePhylum cannot be blank');this.form.DiveSiteMarineLifePhylum.style.background='Yellow';}else{this.form.DiveSiteMarineLifePhylum.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeClass</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeClass' VALUE='$DiveSiteMarineLifeClass'  SIZE='20' MAXLENGTH='20'  tabindex='16' id ='DiveSiteMarineLifeClass' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeClass.value)) {alert('DiveSiteMarineLifeClass cannot be blank');this.form.DiveSiteMarineLifeClass.style.background='Yellow';}else{this.form.DiveSiteMarineLifeClass.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeSubClass</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeSubClass' VALUE='$DiveSiteMarineLifeSubClass'  SIZE='20' MAXLENGTH='20'  tabindex='17' id ='DiveSiteMarineLifeSubClass' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeSubClass.value)) {alert('DiveSiteMarineLifeSubClass cannot be blank');this.form.DiveSiteMarineLifeSubClass.style.background='Yellow';}else{this.form.DiveSiteMarineLifeSubClass.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeInfraClass</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeInfraClass' VALUE='$DiveSiteMarineLifeInfraClass'  SIZE='20' MAXLENGTH='20'  tabindex='18' id ='DiveSiteMarineLifeInfraClass' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeInfraClass.value)) {alert('DiveSiteMarineLifeInfraClass cannot be blank');this.form.DiveSiteMarineLifeInfraClass.style.background='Yellow';}else{this.form.DiveSiteMarineLifeInfraClass.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeOrder</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeOrder' VALUE='$DiveSiteMarineLifeOrder'  SIZE='20' MAXLENGTH='20'  tabindex='19' id ='DiveSiteMarineLifeOrder' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeOrder.value)) {alert('DiveSiteMarineLifeOrder cannot be blank');this.form.DiveSiteMarineLifeOrder.style.background='Yellow';}else{this.form.DiveSiteMarineLifeOrder.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeFamily</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeFamily' VALUE='$DiveSiteMarineLifeFamily'  SIZE='20' MAXLENGTH='20'  tabindex='20' id ='DiveSiteMarineLifeFamily' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeFamily.value)) {alert('DiveSiteMarineLifeFamily cannot be blank');this.form.DiveSiteMarineLifeFamily.style.background='Yellow';}else{this.form.DiveSiteMarineLifeFamily.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeGenus</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeGenus' VALUE='$DiveSiteMarineLifeGenus'  SIZE='20' MAXLENGTH='20'  tabindex='21' id ='DiveSiteMarineLifeGenus' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeGenus.value)) {alert('DiveSiteMarineLifeGenus cannot be blank');this.form.DiveSiteMarineLifeGenus.style.background='Yellow';}else{this.form.DiveSiteMarineLifeGenus.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeSpecies</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeSpecies' VALUE='$DiveSiteMarineLifeSpecies'  SIZE='20' MAXLENGTH='20'  tabindex='22' id ='DiveSiteMarineLifeSpecies' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeSpecies.value)) {alert('DiveSiteMarineLifeSpecies cannot be blank');this.form.DiveSiteMarineLifeSpecies.style.background='Yellow';}else{this.form.DiveSiteMarineLifeSpecies.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeCommonName</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeCommonName' VALUE='$DiveSiteMarineLifeCommonName'  SIZE='40' MAXLENGTH='40'  tabindex='23' id ='DiveSiteMarineLifeCommonName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeCommonName.value)) {alert('DiveSiteMarineLifeCommonName cannot be blank');this.form.DiveSiteMarineLifeCommonName.style.background='Yellow';}else{this.form.DiveSiteMarineLifeCommonName.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeScientificName</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeScientificName' VALUE='$DiveSiteMarineLifeScientificName'  SIZE='40' MAXLENGTH='40'  tabindex='24' id ='DiveSiteMarineLifeScientificName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifeScientificName.value)) {alert('DiveSiteMarineLifeScientificName cannot be blank');this.form.DiveSiteMarineLifeScientificName.style.background='Yellow';}else{this.form.DiveSiteMarineLifeScientificName.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifePictureURLFileInfo1</th>
<td><input type='file'READONLY NAME='DiveSiteMarineLifePictureURLFileInfo1'  VALUE='$DiveSiteMarineLifePictureURLFileInfo1'  SIZE='150' MAXLENGTH='150'  tabindex='25' id ='DiveSiteMarineLifePictureURLFileInfo1' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifePictureURLFileInfo1.value)) {alert('DiveSiteMarineLifePictureURLFileInfo1 cannot be blank');this.form.DiveSiteMarineLifePictureURLFileInfo1.style.background='Yellow';}else{this.form.DiveSiteMarineLifePictureURLFileInfo1.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifePictureURLFileInfo2</th>
<td><input type='file'READONLY NAME='DiveSiteMarineLifePictureURLFileInfo2'  VALUE='$DiveSiteMarineLifePictureURLFileInfo2'  SIZE='150' MAXLENGTH='150'  tabindex='26' id ='DiveSiteMarineLifePictureURLFileInfo2' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifePictureURLFileInfo2.value)) {alert('DiveSiteMarineLifePictureURLFileInfo2 cannot be blank');this.form.DiveSiteMarineLifePictureURLFileInfo2.style.background='Yellow';}else{this.form.DiveSiteMarineLifePictureURLFileInfo2.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifePictureURLFileInfo3</th>
<td><input type='file'READONLY NAME='DiveSiteMarineLifePictureURLFileInfo3'  VALUE='$DiveSiteMarineLifePictureURLFileInfo3'  SIZE='150' MAXLENGTH='150'  tabindex='27' id ='DiveSiteMarineLifePictureURLFileInfo3' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifePictureURLFileInfo3.value)) {alert('DiveSiteMarineLifePictureURLFileInfo3 cannot be blank');this.form.DiveSiteMarineLifePictureURLFileInfo3.style.background='Yellow';}else{this.form.DiveSiteMarineLifePictureURLFileInfo3.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifePictureURLFileInfo4</th>
<td><input type='file'READONLY NAME='DiveSiteMarineLifePictureURLFileInfo4'  VALUE='$DiveSiteMarineLifePictureURLFileInfo4'  SIZE='150' MAXLENGTH='150'  tabindex='28' id ='DiveSiteMarineLifePictureURLFileInfo4' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifePictureURLFileInfo4.value)) {alert('DiveSiteMarineLifePictureURLFileInfo4 cannot be blank');this.form.DiveSiteMarineLifePictureURLFileInfo4.style.background='Yellow';}else{this.form.DiveSiteMarineLifePictureURLFileInfo4.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifePictureURLFileInfo5</th>
<td><input type='file'READONLY NAME='DiveSiteMarineLifePictureURLFileInfo5'  VALUE='$DiveSiteMarineLifePictureURLFileInfo5'  SIZE='150' MAXLENGTH='150'  tabindex='29' id ='DiveSiteMarineLifePictureURLFileInfo5' 
   onBlur=\"if(isBlank(this.form.DiveSiteMarineLifePictureURLFileInfo5.value)) {alert('DiveSiteMarineLifePictureURLFileInfo5 cannot be blank');this.form.DiveSiteMarineLifePictureURLFileInfo5.style.background='Yellow';}else{this.form.DiveSiteMarineLifePictureURLFileInfo5.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeNotes</th>
<td><TEXTAREA NAME='DiveSiteMarineLifeNotes' READONLY COLS=100 ROW=3 TABINDEX='30'>$DiveSiteMarineLifeNotes</TEXTAREA></td>");
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
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
echo stripslashes("
<FORM NAME='DiveSiteMarineLifeDisplay' action='DiveSiteMarineLife.php' method='POST'>
<TABLE  align='center' border='1'><tr><td>
<TABLE align='center' border='1' cellspacing='5'>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeId</th>
<td><input type ='text' READONLY NAME='DiveSiteMarineLifeId' VALUE='$DiveSiteMarineLifeId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteMarineLifeId' READONLY><br /></td>
</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId'><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId'><br /></td>");}
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeEnteredBy</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeEnteredBy' VALUE='$DiveSiteMarineLifeEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSiteMarineLifeEnteredBy'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeDateEntered</th>
<td><input type ='text'READONLY NAME='DiveSiteMarineLifeDateEntered' VALUE='$DiveSiteMarineLifeDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteMarineLifeDateEntered'>");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteMarineLifeEdit\'].DiveSiteMarineLifeDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteMarineLifeEntry\'].DiveSiteMarineLifeDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
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
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeDomain</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeDomain' VALUE='$DiveSiteMarineLifeDomain'  SIZE='20' MAXLENGTH='20'  tabindex='13' id ='DiveSiteMarineLifeDomain'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeKingdom</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeKingdom' VALUE='$DiveSiteMarineLifeKingdom'  SIZE='20' MAXLENGTH='20'  tabindex='14' id ='DiveSiteMarineLifeKingdom'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifePhylum</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifePhylum' VALUE='$DiveSiteMarineLifePhylum'  SIZE='20' MAXLENGTH='20'  tabindex='15' id ='DiveSiteMarineLifePhylum'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeClass</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeClass' VALUE='$DiveSiteMarineLifeClass'  SIZE='20' MAXLENGTH='20'  tabindex='16' id ='DiveSiteMarineLifeClass'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeSubClass</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeSubClass' VALUE='$DiveSiteMarineLifeSubClass'  SIZE='20' MAXLENGTH='20'  tabindex='17' id ='DiveSiteMarineLifeSubClass'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeInfraClass</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeInfraClass' VALUE='$DiveSiteMarineLifeInfraClass'  SIZE='20' MAXLENGTH='20'  tabindex='18' id ='DiveSiteMarineLifeInfraClass'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeOrder</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeOrder' VALUE='$DiveSiteMarineLifeOrder'  SIZE='20' MAXLENGTH='20'  tabindex='19' id ='DiveSiteMarineLifeOrder'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeFamily</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeFamily' VALUE='$DiveSiteMarineLifeFamily'  SIZE='20' MAXLENGTH='20'  tabindex='20' id ='DiveSiteMarineLifeFamily'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeGenus</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeGenus' VALUE='$DiveSiteMarineLifeGenus'  SIZE='20' MAXLENGTH='20'  tabindex='21' id ='DiveSiteMarineLifeGenus'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeSpecies</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeSpecies' VALUE='$DiveSiteMarineLifeSpecies'  SIZE='20' MAXLENGTH='20'  tabindex='22' id ='DiveSiteMarineLifeSpecies'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeCommonName</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeCommonName' VALUE='$DiveSiteMarineLifeCommonName'  SIZE='40' MAXLENGTH='40'  tabindex='23' id ='DiveSiteMarineLifeCommonName'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeScientificName</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteMarineLifeScientificName' VALUE='$DiveSiteMarineLifeScientificName'  SIZE='40' MAXLENGTH='40'  tabindex='24' id ='DiveSiteMarineLifeScientificName'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifePictureURLFileInfo1</th>
<td><input type='file'READONLY NAME='DiveSiteMarineLifePictureURLFileInfo1'  VALUE='$DiveSiteMarineLifePictureURLFileInfo1'  SIZE='150' MAXLENGTH='150'  tabindex='25' id ='DiveSiteMarineLifePictureURLFileInfo1'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifePictureURLFileInfo2</th>
<td><input type='file'READONLY NAME='DiveSiteMarineLifePictureURLFileInfo2'  VALUE='$DiveSiteMarineLifePictureURLFileInfo2'  SIZE='150' MAXLENGTH='150'  tabindex='26' id ='DiveSiteMarineLifePictureURLFileInfo2'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifePictureURLFileInfo3</th>
<td><input type='file'READONLY NAME='DiveSiteMarineLifePictureURLFileInfo3'  VALUE='$DiveSiteMarineLifePictureURLFileInfo3'  SIZE='150' MAXLENGTH='150'  tabindex='27' id ='DiveSiteMarineLifePictureURLFileInfo3'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifePictureURLFileInfo4</th>
<td><input type='file'READONLY NAME='DiveSiteMarineLifePictureURLFileInfo4'  VALUE='$DiveSiteMarineLifePictureURLFileInfo4'  SIZE='150' MAXLENGTH='150'  tabindex='28' id ='DiveSiteMarineLifePictureURLFileInfo4'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifePictureURLFileInfo5</th>
<td><input type='file'READONLY NAME='DiveSiteMarineLifePictureURLFileInfo5'  VALUE='$DiveSiteMarineLifePictureURLFileInfo5'  SIZE='150' MAXLENGTH='150'  tabindex='29' id ='DiveSiteMarineLifePictureURLFileInfo5'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteMarineLifeNotes</th>
<td><TEXTAREA NAME='DiveSiteMarineLifeNotes' READONLY COLS=100 ROW=3 TABINDEX='30'>$DiveSiteMarineLifeNotes</TEXTAREA></td>");
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
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
$DiveSiteMarineLifeId='TBD';
$DiveSiteId='';
$DiveSiteMarineLifeEnteredBy='';
$DiveSiteMarineLifeDateEntered='';
$DiveSiteCity='';
$DiveSiteProvince='';
$DiveSiteCountry='';
$DiveSiteName='';
$DiveSiteMajorName='';
$DiveSiteMinorName='';
$DiveSiteExactLat='';
$DiveSiteExactLong='';
$DiveSiteMarineLifeDomain='';
$DiveSiteMarineLifeKingdom='';
$DiveSiteMarineLifePhylum='';
$DiveSiteMarineLifeClass='';
$DiveSiteMarineLifeSubClass='';
$DiveSiteMarineLifeInfraClass='';
$DiveSiteMarineLifeOrder='';
$DiveSiteMarineLifeFamily='';
$DiveSiteMarineLifeGenus='';
$DiveSiteMarineLifeSpecies='';
$DiveSiteMarineLifeCommonName='';
$DiveSiteMarineLifeScientificName='';
$DiveSiteMarineLifePictureURLFileInfo1='';
$DiveSiteMarineLifePictureURLFileInfo2='';
$DiveSiteMarineLifePictureURLFileInfo3='';
$DiveSiteMarineLifePictureURLFileInfo4='';
$DiveSiteMarineLifePictureURLFileInfo5='';
$DiveSiteMarineLifeNotes='';
return;
}
#----------------------------Get Next Record in Database -----------------------------------

function Db_Next()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
if($NumDiveSiteMarineLifeRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMarineLife where(DiveSiteId > '".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMarineLife Select * failure");
$NumDiveSiteMarineLifeRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteMarineLifeRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteMarineLifeId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteMarineLifeEnteredBy=$rowdata[2];
$DiveSiteMarineLifeDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteMarineLifeDomain=$rowdata[12];
$DiveSiteMarineLifeKingdom=$rowdata[13];
$DiveSiteMarineLifePhylum=$rowdata[14];
$DiveSiteMarineLifeClass=$rowdata[15];
$DiveSiteMarineLifeSubClass=$rowdata[16];
$DiveSiteMarineLifeInfraClass=$rowdata[17];
$DiveSiteMarineLifeOrder=$rowdata[18];
$DiveSiteMarineLifeFamily=$rowdata[19];
$DiveSiteMarineLifeGenus=$rowdata[20];
$DiveSiteMarineLifeSpecies=$rowdata[21];
$DiveSiteMarineLifeCommonName=$rowdata[22];
$DiveSiteMarineLifeScientificName=$rowdata[23];
$DiveSiteMarineLifePictureURLFileInfo1=$rowdata[24];
$DiveSiteMarineLifePictureURLFileInfo2=$rowdata[25];
$DiveSiteMarineLifePictureURLFileInfo3=$rowdata[26];
$DiveSiteMarineLifePictureURLFileInfo4=$rowdata[27];
$DiveSiteMarineLifePictureURLFileInfo5=$rowdata[28];
$DiveSiteMarineLifeNotes=$rowdata[29];
}
else
{
$sql="select * from DiveSiteMarineLife order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMarineLife Select * failure");
$NumDiveSiteMarineLifeRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteMarineLifeRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteMarineLifeId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteMarineLifeEnteredBy=$rowdata[2];
$DiveSiteMarineLifeDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteMarineLifeDomain=$rowdata[12];
$DiveSiteMarineLifeKingdom=$rowdata[13];
$DiveSiteMarineLifePhylum=$rowdata[14];
$DiveSiteMarineLifeClass=$rowdata[15];
$DiveSiteMarineLifeSubClass=$rowdata[16];
$DiveSiteMarineLifeInfraClass=$rowdata[17];
$DiveSiteMarineLifeOrder=$rowdata[18];
$DiveSiteMarineLifeFamily=$rowdata[19];
$DiveSiteMarineLifeGenus=$rowdata[20];
$DiveSiteMarineLifeSpecies=$rowdata[21];
$DiveSiteMarineLifeCommonName=$rowdata[22];
$DiveSiteMarineLifeScientificName=$rowdata[23];
$DiveSiteMarineLifePictureURLFileInfo1=$rowdata[24];
$DiveSiteMarineLifePictureURLFileInfo2=$rowdata[25];
$DiveSiteMarineLifePictureURLFileInfo3=$rowdata[26];
$DiveSiteMarineLifePictureURLFileInfo4=$rowdata[27];
$DiveSiteMarineLifePictureURLFileInfo5=$rowdata[28];
$DiveSiteMarineLifeNotes=$rowdata[29];
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
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
if($NumDiveSiteMarineLifeRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMarineLife where(DiveSiteId < '".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMarineLife Select * failure");
$NumDiveSiteMarineLifeRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteMarineLifeRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteMarineLifeRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteMarineLifeId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteMarineLifeEnteredBy=$rowdata[2];
$DiveSiteMarineLifeDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteMarineLifeDomain=$rowdata[12];
$DiveSiteMarineLifeKingdom=$rowdata[13];
$DiveSiteMarineLifePhylum=$rowdata[14];
$DiveSiteMarineLifeClass=$rowdata[15];
$DiveSiteMarineLifeSubClass=$rowdata[16];
$DiveSiteMarineLifeInfraClass=$rowdata[17];
$DiveSiteMarineLifeOrder=$rowdata[18];
$DiveSiteMarineLifeFamily=$rowdata[19];
$DiveSiteMarineLifeGenus=$rowdata[20];
$DiveSiteMarineLifeSpecies=$rowdata[21];
$DiveSiteMarineLifeCommonName=$rowdata[22];
$DiveSiteMarineLifeScientificName=$rowdata[23];
$DiveSiteMarineLifePictureURLFileInfo1=$rowdata[24];
$DiveSiteMarineLifePictureURLFileInfo2=$rowdata[25];
$DiveSiteMarineLifePictureURLFileInfo3=$rowdata[26];
$DiveSiteMarineLifePictureURLFileInfo4=$rowdata[27];
$DiveSiteMarineLifePictureURLFileInfo5=$rowdata[28];
$DiveSiteMarineLifeNotes=$rowdata[29];
}
}
else
{
$sql="select * from DiveSiteMarineLife order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMarineLife Select * failure");
$NumDiveSiteMarineLifeRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteMarineLifeRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteMarineLifeRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteMarineLifeId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteMarineLifeEnteredBy=$rowdata[2];
$DiveSiteMarineLifeDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteMarineLifeDomain=$rowdata[12];
$DiveSiteMarineLifeKingdom=$rowdata[13];
$DiveSiteMarineLifePhylum=$rowdata[14];
$DiveSiteMarineLifeClass=$rowdata[15];
$DiveSiteMarineLifeSubClass=$rowdata[16];
$DiveSiteMarineLifeInfraClass=$rowdata[17];
$DiveSiteMarineLifeOrder=$rowdata[18];
$DiveSiteMarineLifeFamily=$rowdata[19];
$DiveSiteMarineLifeGenus=$rowdata[20];
$DiveSiteMarineLifeSpecies=$rowdata[21];
$DiveSiteMarineLifeCommonName=$rowdata[22];
$DiveSiteMarineLifeScientificName=$rowdata[23];
$DiveSiteMarineLifePictureURLFileInfo1=$rowdata[24];
$DiveSiteMarineLifePictureURLFileInfo2=$rowdata[25];
$DiveSiteMarineLifePictureURLFileInfo3=$rowdata[26];
$DiveSiteMarineLifePictureURLFileInfo4=$rowdata[27];
$DiveSiteMarineLifePictureURLFileInfo5=$rowdata[28];
$DiveSiteMarineLifeNotes=$rowdata[29];
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
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$DiveSiteMarineLifeId=$_SESSION['DiveSiteMarineLifeId'];
$sql="update DiveSiteMarineLife SET ";
$sql=$sql."DiveSiteId='".strip_tags(addslashes($DiveSiteId))."',";
$sql=$sql."DiveSiteMarineLifeEnteredBy='".strip_tags(addslashes($DiveSiteMarineLifeEnteredBy))."',";
$sql=$sql."DiveSiteMarineLifeDateEntered='".strip_tags(addslashes($DiveSiteMarineLifeDateEntered))."',";
$sql=$sql."DiveSiteCity='".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."DiveSiteProvince='".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."DiveSiteCountry='".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."DiveSiteName='".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."DiveSiteMajorName='".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."DiveSiteMinorName='".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."DiveSiteExactLat='".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."DiveSiteExactLong='".strip_tags(addslashes($DiveSiteExactLong))."',";
$sql=$sql."DiveSiteMarineLifeDomain='".strip_tags(addslashes($DiveSiteMarineLifeDomain))."',";
$sql=$sql."DiveSiteMarineLifeKingdom='".strip_tags(addslashes($DiveSiteMarineLifeKingdom))."',";
$sql=$sql."DiveSiteMarineLifePhylum='".strip_tags(addslashes($DiveSiteMarineLifePhylum))."',";
$sql=$sql."DiveSiteMarineLifeClass='".strip_tags(addslashes($DiveSiteMarineLifeClass))."',";
$sql=$sql."DiveSiteMarineLifeSubClass='".strip_tags(addslashes($DiveSiteMarineLifeSubClass))."',";
$sql=$sql."DiveSiteMarineLifeInfraClass='".strip_tags(addslashes($DiveSiteMarineLifeInfraClass))."',";
$sql=$sql."DiveSiteMarineLifeOrder='".strip_tags(addslashes($DiveSiteMarineLifeOrder))."',";
$sql=$sql."DiveSiteMarineLifeFamily='".strip_tags(addslashes($DiveSiteMarineLifeFamily))."',";
$sql=$sql."DiveSiteMarineLifeGenus='".strip_tags(addslashes($DiveSiteMarineLifeGenus))."',";
$sql=$sql."DiveSiteMarineLifeSpecies='".strip_tags(addslashes($DiveSiteMarineLifeSpecies))."',";
$sql=$sql."DiveSiteMarineLifeCommonName='".strip_tags(addslashes($DiveSiteMarineLifeCommonName))."',";
$sql=$sql."DiveSiteMarineLifeScientificName='".strip_tags(addslashes($DiveSiteMarineLifeScientificName))."',";
$sql=$sql."DiveSiteMarineLifePictureURLFileInfo1='".strip_tags(addslashes($DiveSiteMarineLifePictureURLFileInfo1))."',";
$sql=$sql."DiveSiteMarineLifePictureURLFileInfo2='".strip_tags(addslashes($DiveSiteMarineLifePictureURLFileInfo2))."',";
$sql=$sql."DiveSiteMarineLifePictureURLFileInfo3='".strip_tags(addslashes($DiveSiteMarineLifePictureURLFileInfo3))."',";
$sql=$sql."DiveSiteMarineLifePictureURLFileInfo4='".strip_tags(addslashes($DiveSiteMarineLifePictureURLFileInfo4))."',";
$sql=$sql."DiveSiteMarineLifePictureURLFileInfo5='".strip_tags(addslashes($DiveSiteMarineLifePictureURLFileInfo5))."',";
$sql=$sql."DiveSiteMarineLifeNotes='".strip_tags(addslashes($DiveSiteMarineLifeNotes))."' where DiveSiteMarineLifeId='".$DiveSiteMarineLifeId."'"; 
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMarineLife DATA failure");
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#-----------------------------Print Out Current Form Variables--------------------------

function PrintFormVars()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
OutputMessage('NumDiveSiteMarineLifeRecords: '.$NumDiveSiteMarineLifeRecords);
OutputMessage('DiveSiteMarineLifeId: '.$DiveSiteMarineLifeId);
OutputMessage('DiveSiteId: '.$DiveSiteId);
OutputMessage('DiveSiteMarineLifeEnteredBy: '.$DiveSiteMarineLifeEnteredBy);
OutputMessage('DiveSiteMarineLifeDateEntered: '.$DiveSiteMarineLifeDateEntered);
OutputMessage('DiveSiteCity: '.$DiveSiteCity);
OutputMessage('DiveSiteProvince: '.$DiveSiteProvince);
OutputMessage('DiveSiteCountry: '.$DiveSiteCountry);
OutputMessage('DiveSiteName: '.$DiveSiteName);
OutputMessage('DiveSiteMajorName: '.$DiveSiteMajorName);
OutputMessage('DiveSiteMinorName: '.$DiveSiteMinorName);
OutputMessage('DiveSiteExactLat: '.$DiveSiteExactLat);
OutputMessage('DiveSiteExactLong: '.$DiveSiteExactLong);
OutputMessage('DiveSiteMarineLifeDomain: '.$DiveSiteMarineLifeDomain);
OutputMessage('DiveSiteMarineLifeKingdom: '.$DiveSiteMarineLifeKingdom);
OutputMessage('DiveSiteMarineLifePhylum: '.$DiveSiteMarineLifePhylum);
OutputMessage('DiveSiteMarineLifeClass: '.$DiveSiteMarineLifeClass);
OutputMessage('DiveSiteMarineLifeSubClass: '.$DiveSiteMarineLifeSubClass);
OutputMessage('DiveSiteMarineLifeInfraClass: '.$DiveSiteMarineLifeInfraClass);
OutputMessage('DiveSiteMarineLifeOrder: '.$DiveSiteMarineLifeOrder);
OutputMessage('DiveSiteMarineLifeFamily: '.$DiveSiteMarineLifeFamily);
OutputMessage('DiveSiteMarineLifeGenus: '.$DiveSiteMarineLifeGenus);
OutputMessage('DiveSiteMarineLifeSpecies: '.$DiveSiteMarineLifeSpecies);
OutputMessage('DiveSiteMarineLifeCommonName: '.$DiveSiteMarineLifeCommonName);
OutputMessage('DiveSiteMarineLifeScientificName: '.$DiveSiteMarineLifeScientificName);
OutputMessage('DiveSiteMarineLifePictureURLFileInfo1: '.$DiveSiteMarineLifePictureURLFileInfo1);
OutputMessage('DiveSiteMarineLifePictureURLFileInfo2: '.$DiveSiteMarineLifePictureURLFileInfo2);
OutputMessage('DiveSiteMarineLifePictureURLFileInfo3: '.$DiveSiteMarineLifePictureURLFileInfo3);
OutputMessage('DiveSiteMarineLifePictureURLFileInfo4: '.$DiveSiteMarineLifePictureURLFileInfo4);
OutputMessage('DiveSiteMarineLifePictureURLFileInfo5: '.$DiveSiteMarineLifePictureURLFileInfo5);
OutputMessage('DiveSiteMarineLifeNotes: '.$DiveSiteMarineLifeNotes);
return;
}
#-----------------------------Database Add Function---------------------------------------

function Db_Add()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="insert into DiveSiteMarineLife(DiveSiteId,DiveSiteMarineLifeEnteredBy,DiveSiteMarineLifeDateEntered,DiveSiteCity,DiveSiteProvince,DiveSiteCountry,DiveSiteName,DiveSiteMajorName,DiveSiteMinorName,DiveSiteExactLat,DiveSiteExactLong,DiveSiteMarineLifeDomain,DiveSiteMarineLifeKingdom,DiveSiteMarineLifePhylum,DiveSiteMarineLifeClass,DiveSiteMarineLifeSubClass,DiveSiteMarineLifeInfraClass,DiveSiteMarineLifeOrder,DiveSiteMarineLifeFamily,DiveSiteMarineLifeGenus,DiveSiteMarineLifeSpecies,DiveSiteMarineLifeCommonName,DiveSiteMarineLifeScientificName,DiveSiteMarineLifePictureURLFileInfo1,DiveSiteMarineLifePictureURLFileInfo2,DiveSiteMarineLifePictureURLFileInfo3,DiveSiteMarineLifePictureURLFileInfo4,DiveSiteMarineLifePictureURLFileInfo5,DiveSiteMarineLifeNotes) values (";
$sql=$sql."'".strip_tags(addslashes($DiveSiteId))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifeEnteredBy))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifeDateEntered))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLong))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifeDomain))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifeKingdom))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifePhylum))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifeClass))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifeSubClass))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifeInfraClass))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifeOrder))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifeFamily))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifeGenus))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifeSpecies))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifeCommonName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifeScientificName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifePictureURLFileInfo1))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifePictureURLFileInfo2))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifePictureURLFileInfo3))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifePictureURLFileInfo4))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifePictureURLFileInfo5))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMarineLifeNotes))."')";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMarineLife ADD failure");
$DiveSiteMarineLifeId=mysql_insert_id($connection);
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#----------------------------Database Delete Function------------------------------------

function Db_Delete()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="delete from DiveSiteMarineLife where DiveSiteMarineLifeId='".$DiveSiteMarineLifeId."'";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMarineLife DELETE failure");
mysql_close($connection);
return;
}
#-----------------------------Get Current Number of Records -----------------------------

function CurrentNumberRecords()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMarineLife order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMarineLife GetNumRecs failure");
$NumDiveSiteMarineLifeRecords = mysql_num_rows($result);
mysql_close($connection);
return;
}
#------------------------------Screen Report of Records in Database ---------------------

function ListRecords()
 { 
global $user, $serverhost,$db,$password;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMarineLife order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMarineLife GetNumRecs failure");
$NumDiveSiteMarineLifeRecords = mysql_num_rows($result);
echo "<form action='DiveSiteMarineLife.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSiteMarineLifeId</b></td>";
echo "<td align='center' ><b>DiveSiteId</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeEnteredBy</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeDateEntered</b></td>";
echo "<td align='center' ><b>DiveSiteCity</b></td>";
echo "<td align='center' ><b>DiveSiteProvince</b></td>";
echo "<td align='center' ><b>DiveSiteCountry</b></td>";
echo "<td align='center' ><b>DiveSiteName</b></td>";
echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
echo "<td align='center' ><b>DiveSiteExactLat</b></td>";
echo "<td align='center' ><b>DiveSiteExactLong</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeDomain</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeKingdom</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifePhylum</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeClass</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeSubClass</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeInfraClass</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeOrder</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeFamily</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeGenus</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeSpecies</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeCommonName</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeScientificName</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifePictureURLFileInfo1</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifePictureURLFileInfo2</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifePictureURLFileInfo3</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifePictureURLFileInfo4</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifePictureURLFileInfo5</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeNotes</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteMarineLifeRecords;$i++)
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
echo "<td align='left'>".$rowdata[14]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[15]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[16]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[17]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[18]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[19]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[20]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[21]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[22]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[23]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[24]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[25]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[26]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[27]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[28]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[29]."&nbsp; </td>";
echo "</tr>";
}
echo "<tr><td colspan='30' align='center'><input type ='SUBMIT' NAME='display_button' Value = 'Back to Main'></td></tr>";
echo '</table>';
echo '</form>';
mysql_close($connection);
return;
}
#------------------------------List Menu of Records in Database ---------------------

function ListMenu()
 { 
global $user, $serverhost,$db,$password;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMarineLife order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMarineLife GetNumRecs failure");
$NumDiveSiteMarineLifeRecords = mysql_num_rows($result);
mysql_close($connection);
echo "<form name='ListMenu' action='DiveSiteMarineLife.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<input type='hidden' name='check' id='check'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSiteMarineLifeId</b></td>";
echo "<td align='center' ><b>DiveSiteId</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeEnteredBy</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeDateEntered</b></td>";
echo "<td align='center' ><b>DiveSiteCity</b></td>";
echo "<td align='center' ><b>DiveSiteProvince</b></td>";
echo "<td align='center' ><b>DiveSiteCountry</b></td>";
echo "<td align='center' ><b>DiveSiteName</b></td>";
echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
echo "<td align='center' ><b>DiveSiteExactLat</b></td>";
echo "<td align='center' ><b>DiveSiteExactLong</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeDomain</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeKingdom</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifePhylum</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeClass</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeSubClass</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeInfraClass</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeOrder</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeFamily</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeGenus</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeSpecies</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeCommonName</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeScientificName</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifePictureURLFileInfo1</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifePictureURLFileInfo2</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifePictureURLFileInfo3</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifePictureURLFileInfo4</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifePictureURLFileInfo5</b></td>";
echo "<td align='center' ><b>DiveSiteMarineLifeNotes</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteMarineLifeRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
echo "<tr>";
echo "<td align='center'><input type=radio id='SelectRecord' NAME='SelectRecord' VALUE='".$rowdata[0]."' onClick=\"document.forms.ListMenu.display_button.value = 'Display';document.forms.ListMenu.check.value = 'Display';document.forms.ListMenu.submit();\" >&nbsp; </td>";
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
echo "<td align='left'>".$rowdata[14]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[15]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[16]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[17]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[18]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[19]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[20]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[21]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[22]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[23]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[24]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[25]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[26]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[27]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[28]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[29]."&nbsp; </td>";
echo "</tr>";
}
echo "<tr><td colspan='30' align='center'>
<input type ='SUBMIT' NAME='display_button' Value = 'Back'>
<input type ='SUBMIT' NAME='display_button' Value = 'Add'>";
echo "</td></tr>";
echo '</table>';
echo '</form>';
return;
}
#----------------------------Initialize Program Start ---------------------------------------

function InitializeProgram()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMarineLife order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMarineLife InitializeProgram failure");
$NumDiveSiteMarineLifeRecords = mysql_num_rows($result);
if($NumDiveSiteMarineLifeRecords==0)
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
global $NumDiveSiteMarineLifeRecords,$DiveSiteMarineLifeId,$DiveSiteId,$DiveSiteMarineLifeEnteredBy;
global $DiveSiteMarineLifeDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteMarineLifeDomain;
global $DiveSiteMarineLifeKingdom,$DiveSiteMarineLifePhylum,$DiveSiteMarineLifeClass,$DiveSiteMarineLifeSubClass;
global $DiveSiteMarineLifeInfraClass,$DiveSiteMarineLifeOrder,$DiveSiteMarineLifeFamily;
global $DiveSiteMarineLifeGenus,$DiveSiteMarineLifeSpecies,$DiveSiteMarineLifeCommonName;
global $DiveSiteMarineLifeScientificName,$DiveSiteMarineLifePictureURLFileInfo1,$DiveSiteMarineLifePictureURLFileInfo2;
global $DiveSiteMarineLifePictureURLFileInfo3,$DiveSiteMarineLifePictureURLFileInfo4,$DiveSiteMarineLifePictureURLFileInfo5;
global $DiveSiteMarineLifeNotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteMarineLife where(DiveSiteId ='".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteMarineLife Select * failure");
$NumDiveSiteMarineLifeRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteMarineLifeRecordsDesired>0)
{return FALSE;}
  else
{return TRUE;}
}
#----------------------------Main Program--------------------------------------------

echo "<html>
<head><title>".$table." Maintenance</title>
<h4><center>".$table." Maintenance</center></h4>

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
