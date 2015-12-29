<?php /**/ ?><?php
session_start();
require_once('SystemFunctions.php');
#ValidUserForProgram($_SESSION['User'],'DiveSiteReview.php');

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
$table="DiveSiteReview";
$CallingProgram="index.php";
#-------------------------Get a Desired Record -------------------------

function GetLoadDesiredRecord()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
global $DesiredRecord;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteReview where(DiveSiteReviewId = '".strip_tags(addslashes($DesiredRecord))."') order by DiveSiteReviewId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteReview Select * failure");
$NumDiveSiteReviewRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteReviewRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteReviewId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteReviewReviewerLevel=$rowdata[2];
$DiveSiteReviewDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteReviewRating=$rowdata[10];
$DiveSiteReviewTemp=$rowdata[11];
$DiveSiteReviewVisibility=$rowdata[12];
$DiveSiteReviewNotes=$rowdata[13];
$DiveSiteReviewPix1URLFileInfo=$rowdata[14];
$DiveSiteReviewPix1Note=$rowdata[15];
$DiveSiteReviewPix2URLFileInfo=$rowdata[16];
$DiveSiteReviewPix2Note=$rowdata[17];
$DiveSiteReviewPix3URLFileInfo=$rowdata[18];
$DiveSiteReviewPix3Note=$rowdata[19];
$DiveSiteReviewPix4URLFileInfo=$rowdata[20];
$DiveSiteReviewPix4Note=$rowdata[21];
$DiveSiteExactLat=$rowdata[22];
$DiveSiteExactLong=$rowdata[23];
}
PutVariablesIntoSession();
return;
}
#-------------------------Transfer Screen to Session Variables--------------------------

function PutVariablesIntoSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
$_SESSION['DiveSiteReviewId'] = $DiveSiteReviewId;
$_SESSION['DiveSiteId'] = $DiveSiteId;
$_SESSION['DiveSiteReviewReviewerLevel'] = $DiveSiteReviewReviewerLevel;
$_SESSION['DiveSiteReviewDateEntered'] = $DiveSiteReviewDateEntered;
$_SESSION['DiveSiteCity'] = $DiveSiteCity;
$_SESSION['DiveSiteProvince'] = $DiveSiteProvince;
$_SESSION['DiveSiteCountry'] = $DiveSiteCountry;
$_SESSION['DiveSiteName'] = $DiveSiteName;
$_SESSION['DiveSiteMajorName'] = $DiveSiteMajorName;
$_SESSION['DiveSiteMinorName'] = $DiveSiteMinorName;
$_SESSION['DiveSiteReviewRating'] = $DiveSiteReviewRating;
$_SESSION['DiveSiteReviewTemp'] = $DiveSiteReviewTemp;
$_SESSION['DiveSiteReviewVisibility'] = $DiveSiteReviewVisibility;
$_SESSION['DiveSiteReviewNotes'] = $DiveSiteReviewNotes;
$_SESSION['DiveSiteReviewPix1URLFileInfo'] = $DiveSiteReviewPix1URLFileInfo;
$_SESSION['DiveSiteReviewPix1Note'] = $DiveSiteReviewPix1Note;
$_SESSION['DiveSiteReviewPix2URLFileInfo'] = $DiveSiteReviewPix2URLFileInfo;
$_SESSION['DiveSiteReviewPix2Note'] = $DiveSiteReviewPix2Note;
$_SESSION['DiveSiteReviewPix3URLFileInfo'] = $DiveSiteReviewPix3URLFileInfo;
$_SESSION['DiveSiteReviewPix3Note'] = $DiveSiteReviewPix3Note;
$_SESSION['DiveSiteReviewPix4URLFileInfo'] = $DiveSiteReviewPix4URLFileInfo;
$_SESSION['DiveSiteReviewPix4Note'] = $DiveSiteReviewPix4Note;
$_SESSION['DiveSiteExactLat'] = $DiveSiteExactLat;
$_SESSION['DiveSiteExactLong'] = $DiveSiteExactLong;
return;
}

#--------------------Transfer POST to screen variables ----------------------------------

function GetPostVariables()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
$DiveSiteReviewId=$_POST['DiveSiteReviewId'];
$DiveSiteId=$_POST['DiveSiteId'];
$DiveSiteReviewReviewerLevel=$_POST['DiveSiteReviewReviewerLevel'];
$DiveSiteReviewDateEntered=$_POST['DiveSiteReviewDateEntered'];
$DiveSiteCity=$_POST['DiveSiteCity'];
$DiveSiteProvince=$_POST['DiveSiteProvince'];
$DiveSiteCountry=$_POST['DiveSiteCountry'];
$DiveSiteName=$_POST['DiveSiteName'];
$DiveSiteMajorName=$_POST['DiveSiteMajorName'];
$DiveSiteMinorName=$_POST['DiveSiteMinorName'];
$DiveSiteReviewRating=$_POST['DiveSiteReviewRating'];
$DiveSiteReviewTemp=$_POST['DiveSiteReviewTemp'];
$DiveSiteReviewVisibility=$_POST['DiveSiteReviewVisibility'];
$DiveSiteReviewNotes=$_POST['DiveSiteReviewNotes'];
$DiveSiteReviewPix1URLFileInfo=$_POST['DiveSiteReviewPix1URLFileInfo'];
$DiveSiteReviewPix1Note=$_POST['DiveSiteReviewPix1Note'];
$DiveSiteReviewPix2URLFileInfo=$_POST['DiveSiteReviewPix2URLFileInfo'];
$DiveSiteReviewPix2Note=$_POST['DiveSiteReviewPix2Note'];
$DiveSiteReviewPix3URLFileInfo=$_POST['DiveSiteReviewPix3URLFileInfo'];
$DiveSiteReviewPix3Note=$_POST['DiveSiteReviewPix3Note'];
$DiveSiteReviewPix4URLFileInfo=$_POST['DiveSiteReviewPix4URLFileInfo'];
$DiveSiteReviewPix4Note=$_POST['DiveSiteReviewPix4Note'];
$DiveSiteExactLat=$_POST['DiveSiteExactLat'];
$DiveSiteExactLong=$_POST['DiveSiteExactLong'];
return;
}

#-----------------------Transfer Session Variables to Screen variables---------------------

function GetVariablesFromSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
$DiveSiteReviewId=$_SESSION['DiveSiteReviewId'];
$DiveSiteId=$_SESSION['DiveSiteId'];
$DiveSiteReviewReviewerLevel=$_SESSION['DiveSiteReviewReviewerLevel'];
$DiveSiteReviewDateEntered=$_SESSION['DiveSiteReviewDateEntered'];
$DiveSiteCity=$_SESSION['DiveSiteCity'];
$DiveSiteProvince=$_SESSION['DiveSiteProvince'];
$DiveSiteCountry=$_SESSION['DiveSiteCountry'];
$DiveSiteName=$_SESSION['DiveSiteName'];
$DiveSiteMajorName=$_SESSION['DiveSiteMajorName'];
$DiveSiteMinorName=$_SESSION['DiveSiteMinorName'];
$DiveSiteReviewRating=$_SESSION['DiveSiteReviewRating'];
$DiveSiteReviewTemp=$_SESSION['DiveSiteReviewTemp'];
$DiveSiteReviewVisibility=$_SESSION['DiveSiteReviewVisibility'];
$DiveSiteReviewNotes=$_SESSION['DiveSiteReviewNotes'];
$DiveSiteReviewPix1URLFileInfo=$_SESSION['DiveSiteReviewPix1URLFileInfo'];
$DiveSiteReviewPix1Note=$_SESSION['DiveSiteReviewPix1Note'];
$DiveSiteReviewPix2URLFileInfo=$_SESSION['DiveSiteReviewPix2URLFileInfo'];
$DiveSiteReviewPix2Note=$_SESSION['DiveSiteReviewPix2Note'];
$DiveSiteReviewPix3URLFileInfo=$_SESSION['DiveSiteReviewPix3URLFileInfo'];
$DiveSiteReviewPix3Note=$_SESSION['DiveSiteReviewPix3Note'];
$DiveSiteReviewPix4URLFileInfo=$_SESSION['DiveSiteReviewPix4URLFileInfo'];
$DiveSiteReviewPix4Note=$_SESSION['DiveSiteReviewPix4Note'];
$DiveSiteExactLat=$_SESSION['DiveSiteExactLat'];
$DiveSiteExactLong=$_SESSION['DiveSiteExactLong'];
return;
}

#----------------------------Get Last Database Record-----------------------------------------
function GetLastRecord($conn,$result)
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
for($i=1;$i<=$NumDiveSiteReviewRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteReviewId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteReviewReviewerLevel=$rowdata[2];
$DiveSiteReviewDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteReviewRating=$rowdata[10];
$DiveSiteReviewTemp=$rowdata[11];
$DiveSiteReviewVisibility=$rowdata[12];
$DiveSiteReviewNotes=$rowdata[13];
$DiveSiteReviewPix1URLFileInfo=$rowdata[14];
$DiveSiteReviewPix1Note=$rowdata[15];
$DiveSiteReviewPix2URLFileInfo=$rowdata[16];
$DiveSiteReviewPix2Note=$rowdata[17];
$DiveSiteReviewPix3URLFileInfo=$rowdata[18];
$DiveSiteReviewPix3Note=$rowdata[19];
$DiveSiteReviewPix4URLFileInfo=$rowdata[20];
$DiveSiteReviewPix4Note=$rowdata[21];
$DiveSiteExactLat=$rowdata[22];
$DiveSiteExactLong=$rowdata[23];
}
PutVariablesIntoSession();
return;
}
#----------------------------Common Form-----------------------------------------------------
function CommonForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
global $Mode;
echo stripslashes("
<TABLE border='1' align='center'><tr><td>
<TABLE border='1' align='center' cellspacing='5'>
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewId</th>
<td><input type ='text' NAME='DiveSiteReviewId' VALUE='$DiveSiteReviewId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteReviewId' READONLY><br /></td>
</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewReviewerLevel</th>
");
echo ("<td><input type ='text' NAME='DiveSiteReviewReviewerLevel' VALUE='$DiveSiteReviewReviewerLevel'  SIZE='15' MAXLENGTH='15'  tabindex='3' id ='DiveSiteReviewReviewerLevel' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewReviewerLevel.value)) {alert('DiveSiteReviewReviewerLevel cannot be blank');this.form.DiveSiteReviewReviewerLevel.style.background='Yellow';}else{this.form.DiveSiteReviewReviewerLevel.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewDateEntered</th>
<td><input type ='text' NAME='DiveSiteReviewDateEntered' VALUE='$DiveSiteReviewDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteReviewDateEntered' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewDateEntered.value)) {alert('DiveSiteReviewDateEntered cannot be blank');this.form.DiveSiteReviewDateEntered.style.background='Yellow';}else{this.form.DiveSiteReviewDateEntered.style.background='White';}\">");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteReviewEdit\'].DiveSiteReviewDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteReviewEntry\'].DiveSiteReviewDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
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
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewRating</th>
");
echo ("<td><input type ='text' NAME='DiveSiteReviewRating' VALUE='$DiveSiteReviewRating'  SIZE='10' MAXLENGTH='10'  tabindex='11' id ='DiveSiteReviewRating' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewRating.value)) {alert('DiveSiteReviewRating cannot be blank');this.form.DiveSiteReviewRating.style.background='Yellow';}else{this.form.DiveSiteReviewRating.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewTemp</th>
");
echo ("<td><input type ='text' NAME='DiveSiteReviewTemp' VALUE='$DiveSiteReviewTemp'  SIZE='11' MAXLENGTH='11'  tabindex='12' id ='DiveSiteReviewTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewTemp.value)) {alert('DiveSiteReviewTemp cannot be blank');this.form.DiveSiteReviewTemp.style.background='Yellow';}else{this.form.DiveSiteReviewTemp.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewVisibility</th>
");
echo ("<td><input type ='text' NAME='DiveSiteReviewVisibility' VALUE='$DiveSiteReviewVisibility'  SIZE='11' MAXLENGTH='11'  tabindex='13' id ='DiveSiteReviewVisibility' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewVisibility.value)) {alert('DiveSiteReviewVisibility cannot be blank');this.form.DiveSiteReviewVisibility.style.background='Yellow';}else{this.form.DiveSiteReviewVisibility.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewNotes</th>
<td><TEXTAREA NAME='DiveSiteReviewNotes' COLS=100 ROW=3 TABINDEX='14'>$DiveSiteReviewNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewPix1URLFileInfo</th>
<td><input type='file' NAME='DiveSiteReviewPix1URLFileInfo'  VALUE='$DiveSiteReviewPix1URLFileInfo'  SIZE='100' MAXLENGTH='100'  tabindex='15' id ='DiveSiteReviewPix1URLFileInfo' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewPix1URLFileInfo.value)) {alert('DiveSiteReviewPix1URLFileInfo cannot be blank');this.form.DiveSiteReviewPix1URLFileInfo.style.background='Yellow';}else{this.form.DiveSiteReviewPix1URLFileInfo.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewPix1Note</th>
<td><TEXTAREA NAME='DiveSiteReviewPix1Note' COLS=100 ROW=3 TABINDEX='16'>$DiveSiteReviewPix1Note</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewPix2URLFileInfo</th>
<td><input type='file' NAME='DiveSiteReviewPix2URLFileInfo'  VALUE='$DiveSiteReviewPix2URLFileInfo'  SIZE='100' MAXLENGTH='100'  tabindex='17' id ='DiveSiteReviewPix2URLFileInfo' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewPix2URLFileInfo.value)) {alert('DiveSiteReviewPix2URLFileInfo cannot be blank');this.form.DiveSiteReviewPix2URLFileInfo.style.background='Yellow';}else{this.form.DiveSiteReviewPix2URLFileInfo.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewPix2Note</th>
<td><TEXTAREA NAME='DiveSiteReviewPix2Note' COLS=100 ROW=3 TABINDEX='18'>$DiveSiteReviewPix2Note</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewPix3URLFileInfo</th>
<td><input type='file' NAME='DiveSiteReviewPix3URLFileInfo'  VALUE='$DiveSiteReviewPix3URLFileInfo'  SIZE='100' MAXLENGTH='100'  tabindex='19' id ='DiveSiteReviewPix3URLFileInfo' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewPix3URLFileInfo.value)) {alert('DiveSiteReviewPix3URLFileInfo cannot be blank');this.form.DiveSiteReviewPix3URLFileInfo.style.background='Yellow';}else{this.form.DiveSiteReviewPix3URLFileInfo.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewPix3Note</th>
<td><TEXTAREA NAME='DiveSiteReviewPix3Note' COLS=100 ROW=3 TABINDEX='20'>$DiveSiteReviewPix3Note</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewPix4URLFileInfo</th>
<td><input type='file' NAME='DiveSiteReviewPix4URLFileInfo'  VALUE='$DiveSiteReviewPix4URLFileInfo'  SIZE='100' MAXLENGTH='100'  tabindex='21' id ='DiveSiteReviewPix4URLFileInfo' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewPix4URLFileInfo.value)) {alert('DiveSiteReviewPix4URLFileInfo cannot be blank');this.form.DiveSiteReviewPix4URLFileInfo.style.background='Yellow';}else{this.form.DiveSiteReviewPix4URLFileInfo.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteReviewPix4Note</th>
<td><TEXTAREA NAME='DiveSiteReviewPix4Note' COLS=100 ROW=3 TABINDEX='22'>$DiveSiteReviewPix4Note</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteExactLat</th>
");
echo ("<td><input type ='text' NAME='DiveSiteExactLat' VALUE='$DiveSiteExactLat'  SIZE='10,6' MAXLENGTH='10,6'  tabindex='23' id ='DiveSiteExactLat' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLat.value)) {alert('DiveSiteExactLat cannot be blank');this.form.DiveSiteExactLat.style.background='Yellow';}else{this.form.DiveSiteExactLat.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteExactLong</th>
");
echo ("<td><input type ='text' NAME='DiveSiteExactLong' VALUE='$DiveSiteExactLong'  SIZE='10,6' MAXLENGTH='10,6'  tabindex='24' id ='DiveSiteExactLong' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLong.value)) {alert('DiveSiteExactLong cannot be blank');this.form.DiveSiteExactLong.style.background='Yellow';}else{this.form.DiveSiteExactLong.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
");}
#----------------------------Entry Form----------------------------------------------------

function AddForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
global $Mode;
$Mode='ADD';
echo stripslashes("
<FORM NAME='DiveSiteReviewEntry' action='DiveSiteReview.php' method='POST'>");
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
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
global $Mode;
$Mode='EDIT';
echo stripslashes("
<FORM NAME='DiveSiteReviewEdit' action='DiveSiteReview.php' method='POST'>");
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
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
echo stripslashes("
<FORM NAME='DiveSiteReviewDelete' action='DiveSiteReview.php' method='POST'>
<TABLE  align='center' border='1'><tr><td>
<TABLE align='center' border='1' cellspacing='5'>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewId</th>
<td><input type ='text' READONLY NAME='DiveSiteReviewId' VALUE='$DiveSiteReviewId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteReviewId' READONLY><br /></td></tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewReviewerLevel</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteReviewReviewerLevel' VALUE='$DiveSiteReviewReviewerLevel'  SIZE='15' MAXLENGTH='15'  tabindex='3' id ='DiveSiteReviewReviewerLevel' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewReviewerLevel.value)) {alert('DiveSiteReviewReviewerLevel cannot be blank');this.form.DiveSiteReviewReviewerLevel.style.background='Yellow';}else{this.form.DiveSiteReviewReviewerLevel.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewDateEntered</th>
<td><input type ='text'READONLY NAME='DiveSiteReviewDateEntered' VALUE='$DiveSiteReviewDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteReviewDateEntered'>");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteReviewEdit\'].DiveSiteReviewDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteReviewEntry\'].DiveSiteReviewDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
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
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewRating</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteReviewRating' VALUE='$DiveSiteReviewRating'  SIZE='10' MAXLENGTH='10'  tabindex='11' id ='DiveSiteReviewRating' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewRating.value)) {alert('DiveSiteReviewRating cannot be blank');this.form.DiveSiteReviewRating.style.background='Yellow';}else{this.form.DiveSiteReviewRating.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewTemp</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteReviewTemp' VALUE='$DiveSiteReviewTemp'  SIZE='11' MAXLENGTH='11'  tabindex='12' id ='DiveSiteReviewTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewTemp.value)) {alert('DiveSiteReviewTemp cannot be blank');this.form.DiveSiteReviewTemp.style.background='Yellow';}else{this.form.DiveSiteReviewTemp.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewVisibility</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteReviewVisibility' VALUE='$DiveSiteReviewVisibility'  SIZE='11' MAXLENGTH='11'  tabindex='13' id ='DiveSiteReviewVisibility' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewVisibility.value)) {alert('DiveSiteReviewVisibility cannot be blank');this.form.DiveSiteReviewVisibility.style.background='Yellow';}else{this.form.DiveSiteReviewVisibility.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewNotes</th>
<td><TEXTAREA NAME='DiveSiteReviewNotes' READONLY COLS=100 ROW=3 TABINDEX='14'>$DiveSiteReviewNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix1URLFileInfo</th>
<td><input type='file'READONLY NAME='DiveSiteReviewPix1URLFileInfo'  VALUE='$DiveSiteReviewPix1URLFileInfo'  SIZE='100' MAXLENGTH='100'  tabindex='15' id ='DiveSiteReviewPix1URLFileInfo' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewPix1URLFileInfo.value)) {alert('DiveSiteReviewPix1URLFileInfo cannot be blank');this.form.DiveSiteReviewPix1URLFileInfo.style.background='Yellow';}else{this.form.DiveSiteReviewPix1URLFileInfo.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix1Note</th>
<td><TEXTAREA NAME='DiveSiteReviewPix1Note' READONLY COLS=100 ROW=3 TABINDEX='16'>$DiveSiteReviewPix1Note</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix2URLFileInfo</th>
<td><input type='file'READONLY NAME='DiveSiteReviewPix2URLFileInfo'  VALUE='$DiveSiteReviewPix2URLFileInfo'  SIZE='100' MAXLENGTH='100'  tabindex='17' id ='DiveSiteReviewPix2URLFileInfo' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewPix2URLFileInfo.value)) {alert('DiveSiteReviewPix2URLFileInfo cannot be blank');this.form.DiveSiteReviewPix2URLFileInfo.style.background='Yellow';}else{this.form.DiveSiteReviewPix2URLFileInfo.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix2Note</th>
<td><TEXTAREA NAME='DiveSiteReviewPix2Note' READONLY COLS=100 ROW=3 TABINDEX='18'>$DiveSiteReviewPix2Note</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix3URLFileInfo</th>
<td><input type='file'READONLY NAME='DiveSiteReviewPix3URLFileInfo'  VALUE='$DiveSiteReviewPix3URLFileInfo'  SIZE='100' MAXLENGTH='100'  tabindex='19' id ='DiveSiteReviewPix3URLFileInfo' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewPix3URLFileInfo.value)) {alert('DiveSiteReviewPix3URLFileInfo cannot be blank');this.form.DiveSiteReviewPix3URLFileInfo.style.background='Yellow';}else{this.form.DiveSiteReviewPix3URLFileInfo.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix3Note</th>
<td><TEXTAREA NAME='DiveSiteReviewPix3Note' READONLY COLS=100 ROW=3 TABINDEX='20'>$DiveSiteReviewPix3Note</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix4URLFileInfo</th>
<td><input type='file'READONLY NAME='DiveSiteReviewPix4URLFileInfo'  VALUE='$DiveSiteReviewPix4URLFileInfo'  SIZE='100' MAXLENGTH='100'  tabindex='21' id ='DiveSiteReviewPix4URLFileInfo' 
   onBlur=\"if(isBlank(this.form.DiveSiteReviewPix4URLFileInfo.value)) {alert('DiveSiteReviewPix4URLFileInfo cannot be blank');this.form.DiveSiteReviewPix4URLFileInfo.style.background='Yellow';}else{this.form.DiveSiteReviewPix4URLFileInfo.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix4Note</th>
<td><TEXTAREA NAME='DiveSiteReviewPix4Note' READONLY COLS=100 ROW=3 TABINDEX='22'>$DiveSiteReviewPix4Note</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteExactLat</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteExactLat' VALUE='$DiveSiteExactLat'  SIZE='10,6' MAXLENGTH='10,6'  tabindex='23' id ='DiveSiteExactLat' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLat.value)) {alert('DiveSiteExactLat cannot be blank');this.form.DiveSiteExactLat.style.background='Yellow';}else{this.form.DiveSiteExactLat.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteExactLong</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteExactLong' VALUE='$DiveSiteExactLong'  SIZE='10,6' MAXLENGTH='10,6'  tabindex='24' id ='DiveSiteExactLong' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLong.value)) {alert('DiveSiteExactLong cannot be blank');this.form.DiveSiteExactLong.style.background='Yellow';}else{this.form.DiveSiteExactLong.style.background='White';}\"><br /></td>");
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
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
echo stripslashes("
<FORM NAME='DiveSiteReviewDisplay' action='DiveSiteReview.php' method='POST'>
<TABLE  align='center' border='1'><tr><td>
<TABLE align='center' border='1' cellspacing='5'>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewId</th>
<td><input type ='text' READONLY NAME='DiveSiteReviewId' VALUE='$DiveSiteReviewId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteReviewId' READONLY><br /></td>
</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId'><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId'><br /></td>");}
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewReviewerLevel</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteReviewReviewerLevel' VALUE='$DiveSiteReviewReviewerLevel'  SIZE='15' MAXLENGTH='15'  tabindex='3' id ='DiveSiteReviewReviewerLevel'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewDateEntered</th>
<td><input type ='text'READONLY NAME='DiveSiteReviewDateEntered' VALUE='$DiveSiteReviewDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteReviewDateEntered'>");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteReviewEdit\'].DiveSiteReviewDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteReviewEntry\'].DiveSiteReviewDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
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
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewRating</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteReviewRating' VALUE='$DiveSiteReviewRating'  SIZE='10' MAXLENGTH='10'  tabindex='11' id ='DiveSiteReviewRating'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewTemp</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteReviewTemp' VALUE='$DiveSiteReviewTemp'  SIZE='11' MAXLENGTH='11'  tabindex='12' id ='DiveSiteReviewTemp'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewVisibility</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteReviewVisibility' VALUE='$DiveSiteReviewVisibility'  SIZE='11' MAXLENGTH='11'  tabindex='13' id ='DiveSiteReviewVisibility'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewNotes</th>
<td><TEXTAREA NAME='DiveSiteReviewNotes' READONLY COLS=100 ROW=3 TABINDEX='14'>$DiveSiteReviewNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix1URLFileInfo</th>
<td><input type='file'READONLY NAME='DiveSiteReviewPix1URLFileInfo'  VALUE='$DiveSiteReviewPix1URLFileInfo'  SIZE='100' MAXLENGTH='100'  tabindex='15' id ='DiveSiteReviewPix1URLFileInfo'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix1Note</th>
<td><TEXTAREA NAME='DiveSiteReviewPix1Note' READONLY COLS=100 ROW=3 TABINDEX='16'>$DiveSiteReviewPix1Note</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix2URLFileInfo</th>
<td><input type='file'READONLY NAME='DiveSiteReviewPix2URLFileInfo'  VALUE='$DiveSiteReviewPix2URLFileInfo'  SIZE='100' MAXLENGTH='100'  tabindex='17' id ='DiveSiteReviewPix2URLFileInfo'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix2Note</th>
<td><TEXTAREA NAME='DiveSiteReviewPix2Note' READONLY COLS=100 ROW=3 TABINDEX='18'>$DiveSiteReviewPix2Note</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix3URLFileInfo</th>
<td><input type='file'READONLY NAME='DiveSiteReviewPix3URLFileInfo'  VALUE='$DiveSiteReviewPix3URLFileInfo'  SIZE='100' MAXLENGTH='100'  tabindex='19' id ='DiveSiteReviewPix3URLFileInfo'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix3Note</th>
<td><TEXTAREA NAME='DiveSiteReviewPix3Note' READONLY COLS=100 ROW=3 TABINDEX='20'>$DiveSiteReviewPix3Note</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix4URLFileInfo</th>
<td><input type='file'READONLY NAME='DiveSiteReviewPix4URLFileInfo'  VALUE='$DiveSiteReviewPix4URLFileInfo'  SIZE='100' MAXLENGTH='100'  tabindex='21' id ='DiveSiteReviewPix4URLFileInfo'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteReviewPix4Note</th>
<td><TEXTAREA NAME='DiveSiteReviewPix4Note' READONLY COLS=100 ROW=3 TABINDEX='22'>$DiveSiteReviewPix4Note</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteExactLat</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteExactLat' VALUE='$DiveSiteExactLat'  SIZE='10,6' MAXLENGTH='10,6'  tabindex='23' id ='DiveSiteExactLat'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteExactLong</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteExactLong' VALUE='$DiveSiteExactLong'  SIZE='10,6' MAXLENGTH='10,6'  tabindex='24' id ='DiveSiteExactLong'><br /></td>");
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
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
$DiveSiteReviewId='TBD';
$DiveSiteId='';
$DiveSiteReviewReviewerLevel='';
$DiveSiteReviewDateEntered='';
$DiveSiteCity='';
$DiveSiteProvince='';
$DiveSiteCountry='';
$DiveSiteName='';
$DiveSiteMajorName='';
$DiveSiteMinorName='';
$DiveSiteReviewRating='';
$DiveSiteReviewTemp='';
$DiveSiteReviewVisibility='';
$DiveSiteReviewNotes='';
$DiveSiteReviewPix1URLFileInfo='';
$DiveSiteReviewPix1Note='';
$DiveSiteReviewPix2URLFileInfo='';
$DiveSiteReviewPix2Note='';
$DiveSiteReviewPix3URLFileInfo='';
$DiveSiteReviewPix3Note='';
$DiveSiteReviewPix4URLFileInfo='';
$DiveSiteReviewPix4Note='';
$DiveSiteExactLat='';
$DiveSiteExactLong='';
return;
}
#----------------------------Get Next Record in Database -----------------------------------

function Db_Next()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
if($NumDiveSiteReviewRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteReview where(DiveSiteId > '".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteReview Select * failure");
$NumDiveSiteReviewRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteReviewRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteReviewId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteReviewReviewerLevel=$rowdata[2];
$DiveSiteReviewDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteReviewRating=$rowdata[10];
$DiveSiteReviewTemp=$rowdata[11];
$DiveSiteReviewVisibility=$rowdata[12];
$DiveSiteReviewNotes=$rowdata[13];
$DiveSiteReviewPix1URLFileInfo=$rowdata[14];
$DiveSiteReviewPix1Note=$rowdata[15];
$DiveSiteReviewPix2URLFileInfo=$rowdata[16];
$DiveSiteReviewPix2Note=$rowdata[17];
$DiveSiteReviewPix3URLFileInfo=$rowdata[18];
$DiveSiteReviewPix3Note=$rowdata[19];
$DiveSiteReviewPix4URLFileInfo=$rowdata[20];
$DiveSiteReviewPix4Note=$rowdata[21];
$DiveSiteExactLat=$rowdata[22];
$DiveSiteExactLong=$rowdata[23];
}
else
{
$sql="select * from DiveSiteReview order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteReview Select * failure");
$NumDiveSiteReviewRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteReviewRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteReviewId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteReviewReviewerLevel=$rowdata[2];
$DiveSiteReviewDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteReviewRating=$rowdata[10];
$DiveSiteReviewTemp=$rowdata[11];
$DiveSiteReviewVisibility=$rowdata[12];
$DiveSiteReviewNotes=$rowdata[13];
$DiveSiteReviewPix1URLFileInfo=$rowdata[14];
$DiveSiteReviewPix1Note=$rowdata[15];
$DiveSiteReviewPix2URLFileInfo=$rowdata[16];
$DiveSiteReviewPix2Note=$rowdata[17];
$DiveSiteReviewPix3URLFileInfo=$rowdata[18];
$DiveSiteReviewPix3Note=$rowdata[19];
$DiveSiteReviewPix4URLFileInfo=$rowdata[20];
$DiveSiteReviewPix4Note=$rowdata[21];
$DiveSiteExactLat=$rowdata[22];
$DiveSiteExactLong=$rowdata[23];
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
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
if($NumDiveSiteReviewRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteReview where(DiveSiteId < '".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteReview Select * failure");
$NumDiveSiteReviewRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteReviewRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteReviewRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteReviewId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteReviewReviewerLevel=$rowdata[2];
$DiveSiteReviewDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteReviewRating=$rowdata[10];
$DiveSiteReviewTemp=$rowdata[11];
$DiveSiteReviewVisibility=$rowdata[12];
$DiveSiteReviewNotes=$rowdata[13];
$DiveSiteReviewPix1URLFileInfo=$rowdata[14];
$DiveSiteReviewPix1Note=$rowdata[15];
$DiveSiteReviewPix2URLFileInfo=$rowdata[16];
$DiveSiteReviewPix2Note=$rowdata[17];
$DiveSiteReviewPix3URLFileInfo=$rowdata[18];
$DiveSiteReviewPix3Note=$rowdata[19];
$DiveSiteReviewPix4URLFileInfo=$rowdata[20];
$DiveSiteReviewPix4Note=$rowdata[21];
$DiveSiteExactLat=$rowdata[22];
$DiveSiteExactLong=$rowdata[23];
}
}
else
{
$sql="select * from DiveSiteReview order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteReview Select * failure");
$NumDiveSiteReviewRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteReviewRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteReviewRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteReviewId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteReviewReviewerLevel=$rowdata[2];
$DiveSiteReviewDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteReviewRating=$rowdata[10];
$DiveSiteReviewTemp=$rowdata[11];
$DiveSiteReviewVisibility=$rowdata[12];
$DiveSiteReviewNotes=$rowdata[13];
$DiveSiteReviewPix1URLFileInfo=$rowdata[14];
$DiveSiteReviewPix1Note=$rowdata[15];
$DiveSiteReviewPix2URLFileInfo=$rowdata[16];
$DiveSiteReviewPix2Note=$rowdata[17];
$DiveSiteReviewPix3URLFileInfo=$rowdata[18];
$DiveSiteReviewPix3Note=$rowdata[19];
$DiveSiteReviewPix4URLFileInfo=$rowdata[20];
$DiveSiteReviewPix4Note=$rowdata[21];
$DiveSiteExactLat=$rowdata[22];
$DiveSiteExactLong=$rowdata[23];
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
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$DiveSiteReviewId=$_SESSION['DiveSiteReviewId'];
$sql="update DiveSiteReview SET ";
$sql=$sql."DiveSiteId='".strip_tags(addslashes($DiveSiteId))."',";
$sql=$sql."DiveSiteReviewReviewerLevel='".strip_tags(addslashes($DiveSiteReviewReviewerLevel))."',";
$sql=$sql."DiveSiteReviewDateEntered='".strip_tags(addslashes($DiveSiteReviewDateEntered))."',";
$sql=$sql."DiveSiteCity='".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."DiveSiteProvince='".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."DiveSiteCountry='".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."DiveSiteName='".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."DiveSiteMajorName='".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."DiveSiteMinorName='".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."DiveSiteReviewRating='".strip_tags(addslashes($DiveSiteReviewRating))."',";
$sql=$sql."DiveSiteReviewTemp='".strip_tags(addslashes($DiveSiteReviewTemp))."',";
$sql=$sql."DiveSiteReviewVisibility='".strip_tags(addslashes($DiveSiteReviewVisibility))."',";
$sql=$sql."DiveSiteReviewNotes='".strip_tags(addslashes($DiveSiteReviewNotes))."',";
$sql=$sql."DiveSiteReviewPix1URLFileInfo='".strip_tags(addslashes($DiveSiteReviewPix1URLFileInfo))."',";
$sql=$sql."DiveSiteReviewPix1Note='".strip_tags(addslashes($DiveSiteReviewPix1Note))."',";
$sql=$sql."DiveSiteReviewPix2URLFileInfo='".strip_tags(addslashes($DiveSiteReviewPix2URLFileInfo))."',";
$sql=$sql."DiveSiteReviewPix2Note='".strip_tags(addslashes($DiveSiteReviewPix2Note))."',";
$sql=$sql."DiveSiteReviewPix3URLFileInfo='".strip_tags(addslashes($DiveSiteReviewPix3URLFileInfo))."',";
$sql=$sql."DiveSiteReviewPix3Note='".strip_tags(addslashes($DiveSiteReviewPix3Note))."',";
$sql=$sql."DiveSiteReviewPix4URLFileInfo='".strip_tags(addslashes($DiveSiteReviewPix4URLFileInfo))."',";
$sql=$sql."DiveSiteReviewPix4Note='".strip_tags(addslashes($DiveSiteReviewPix4Note))."',";
$sql=$sql."DiveSiteExactLat='".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."DiveSiteExactLong='".strip_tags(addslashes($DiveSiteExactLong))."' where DiveSiteReviewId='".$DiveSiteReviewId."'"; 
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteReview DATA failure");
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#-----------------------------Print Out Current Form Variables--------------------------

function PrintFormVars()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
OutputMessage('NumDiveSiteReviewRecords: '.$NumDiveSiteReviewRecords);
OutputMessage('DiveSiteReviewId: '.$DiveSiteReviewId);
OutputMessage('DiveSiteId: '.$DiveSiteId);
OutputMessage('DiveSiteReviewReviewerLevel: '.$DiveSiteReviewReviewerLevel);
OutputMessage('DiveSiteReviewDateEntered: '.$DiveSiteReviewDateEntered);
OutputMessage('DiveSiteCity: '.$DiveSiteCity);
OutputMessage('DiveSiteProvince: '.$DiveSiteProvince);
OutputMessage('DiveSiteCountry: '.$DiveSiteCountry);
OutputMessage('DiveSiteName: '.$DiveSiteName);
OutputMessage('DiveSiteMajorName: '.$DiveSiteMajorName);
OutputMessage('DiveSiteMinorName: '.$DiveSiteMinorName);
OutputMessage('DiveSiteReviewRating: '.$DiveSiteReviewRating);
OutputMessage('DiveSiteReviewTemp: '.$DiveSiteReviewTemp);
OutputMessage('DiveSiteReviewVisibility: '.$DiveSiteReviewVisibility);
OutputMessage('DiveSiteReviewNotes: '.$DiveSiteReviewNotes);
OutputMessage('DiveSiteReviewPix1URLFileInfo: '.$DiveSiteReviewPix1URLFileInfo);
OutputMessage('DiveSiteReviewPix1Note: '.$DiveSiteReviewPix1Note);
OutputMessage('DiveSiteReviewPix2URLFileInfo: '.$DiveSiteReviewPix2URLFileInfo);
OutputMessage('DiveSiteReviewPix2Note: '.$DiveSiteReviewPix2Note);
OutputMessage('DiveSiteReviewPix3URLFileInfo: '.$DiveSiteReviewPix3URLFileInfo);
OutputMessage('DiveSiteReviewPix3Note: '.$DiveSiteReviewPix3Note);
OutputMessage('DiveSiteReviewPix4URLFileInfo: '.$DiveSiteReviewPix4URLFileInfo);
OutputMessage('DiveSiteReviewPix4Note: '.$DiveSiteReviewPix4Note);
OutputMessage('DiveSiteExactLat: '.$DiveSiteExactLat);
OutputMessage('DiveSiteExactLong: '.$DiveSiteExactLong);
return;
}
#-----------------------------Database Add Function---------------------------------------

function Db_Add()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="insert into DiveSiteReview(DiveSiteId,DiveSiteReviewReviewerLevel,DiveSiteReviewDateEntered,DiveSiteCity,DiveSiteProvince,DiveSiteCountry,DiveSiteName,DiveSiteMajorName,DiveSiteMinorName,DiveSiteReviewRating,DiveSiteReviewTemp,DiveSiteReviewVisibility,DiveSiteReviewNotes,DiveSiteReviewPix1URLFileInfo,DiveSiteReviewPix1Note,DiveSiteReviewPix2URLFileInfo,DiveSiteReviewPix2Note,DiveSiteReviewPix3URLFileInfo,DiveSiteReviewPix3Note,DiveSiteReviewPix4URLFileInfo,DiveSiteReviewPix4Note,DiveSiteExactLat,DiveSiteExactLong) values (";
$sql=$sql."'".strip_tags(addslashes($DiveSiteId))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteReviewReviewerLevel))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteReviewDateEntered))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteReviewRating))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteReviewTemp))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteReviewVisibility))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteReviewNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteReviewPix1URLFileInfo))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteReviewPix1Note))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteReviewPix2URLFileInfo))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteReviewPix2Note))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteReviewPix3URLFileInfo))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteReviewPix3Note))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteReviewPix4URLFileInfo))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteReviewPix4Note))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLong))."')";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteReview ADD failure");
$DiveSiteReviewId=mysql_insert_id($connection);
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#----------------------------Database Delete Function------------------------------------

function Db_Delete()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="delete from DiveSiteReview where DiveSiteReviewId='".$DiveSiteReviewId."'";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteReview DELETE failure");
mysql_close($connection);
return;
}
#-----------------------------Get Current Number of Records -----------------------------

function CurrentNumberRecords()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteReview order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteReview GetNumRecs failure");
$NumDiveSiteReviewRecords = mysql_num_rows($result);
mysql_close($connection);
return;
}
#------------------------------Screen Report of Records in Database ---------------------

function ListRecords()
 { 
global $user, $serverhost,$db,$password;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteReview order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteReview GetNumRecs failure");
$NumDiveSiteReviewRecords = mysql_num_rows($result);
echo "<form action='DiveSiteReview.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSiteReviewId</b></td>";
echo "<td align='center' ><b>DiveSiteId</b></td>";
echo "<td align='center' ><b>DiveSiteReviewReviewerLevel</b></td>";
echo "<td align='center' ><b>DiveSiteReviewDateEntered</b></td>";
echo "<td align='center' ><b>DiveSiteCity</b></td>";
echo "<td align='center' ><b>DiveSiteProvince</b></td>";
echo "<td align='center' ><b>DiveSiteCountry</b></td>";
echo "<td align='center' ><b>DiveSiteName</b></td>";
echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
echo "<td align='center' ><b>DiveSiteReviewRating</b></td>";
echo "<td align='center' ><b>DiveSiteReviewTemp</b></td>";
echo "<td align='center' ><b>DiveSiteReviewVisibility</b></td>";
echo "<td align='center' ><b>DiveSiteReviewNotes</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix1URLFileInfo</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix1Note</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix2URLFileInfo</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix2Note</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix3URLFileInfo</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix3Note</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix4URLFileInfo</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix4Note</b></td>";
echo "<td align='center' ><b>DiveSiteExactLat</b></td>";
echo "<td align='center' ><b>DiveSiteExactLong</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteReviewRecords;$i++)
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
echo "</tr>";
}
echo "<tr><td colspan='24' align='center'><input type ='SUBMIT' NAME='display_button' Value = 'Back to Main'></td></tr>";
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
$sql="select * from DiveSiteReview order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteReview GetNumRecs failure");
$NumDiveSiteReviewRecords = mysql_num_rows($result);
mysql_close($connection);
echo "<form name='ListMenu' action='DiveSiteReview.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<input type='hidden' name='check' id='check'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSiteReviewId</b></td>";
echo "<td align='center' ><b>DiveSiteId</b></td>";
echo "<td align='center' ><b>DiveSiteReviewReviewerLevel</b></td>";
echo "<td align='center' ><b>DiveSiteReviewDateEntered</b></td>";
echo "<td align='center' ><b>DiveSiteCity</b></td>";
echo "<td align='center' ><b>DiveSiteProvince</b></td>";
echo "<td align='center' ><b>DiveSiteCountry</b></td>";
echo "<td align='center' ><b>DiveSiteName</b></td>";
echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
echo "<td align='center' ><b>DiveSiteReviewRating</b></td>";
echo "<td align='center' ><b>DiveSiteReviewTemp</b></td>";
echo "<td align='center' ><b>DiveSiteReviewVisibility</b></td>";
echo "<td align='center' ><b>DiveSiteReviewNotes</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix1URLFileInfo</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix1Note</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix2URLFileInfo</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix2Note</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix3URLFileInfo</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix3Note</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix4URLFileInfo</b></td>";
echo "<td align='center' ><b>DiveSiteReviewPix4Note</b></td>";
echo "<td align='center' ><b>DiveSiteExactLat</b></td>";
echo "<td align='center' ><b>DiveSiteExactLong</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteReviewRecords;$i++)
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
echo "</tr>";
}
echo "<tr><td colspan='24' align='center'>
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
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteReview order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteReview InitializeProgram failure");
$NumDiveSiteReviewRecords = mysql_num_rows($result);
if($NumDiveSiteReviewRecords==0)
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
global $NumDiveSiteReviewRecords,$DiveSiteReviewId,$DiveSiteId,$DiveSiteReviewReviewerLevel;
global $DiveSiteReviewDateEntered,$DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName;
global $DiveSiteMajorName,$DiveSiteMinorName,$DiveSiteReviewRating,$DiveSiteReviewTemp,$DiveSiteReviewVisibility;
global $DiveSiteReviewNotes,$DiveSiteReviewPix1URLFileInfo,$DiveSiteReviewPix1Note,$DiveSiteReviewPix2URLFileInfo;
global $DiveSiteReviewPix2Note,$DiveSiteReviewPix3URLFileInfo,$DiveSiteReviewPix3Note,$DiveSiteReviewPix4URLFileInfo;
global $DiveSiteReviewPix4Note,$DiveSiteExactLat,$DiveSiteExactLong;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteReview where(DiveSiteId ='".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteReview Select * failure");
$NumDiveSiteReviewRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteReviewRecordsDesired>0)
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
