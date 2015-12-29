<?php /**/ ?><?php
session_start();
require_once('SystemFunctions.php');
#ValidUserForProgram($_SESSION['User'],'DiveSiteSI.php');

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
$table="DiveSiteSI";
$CallingProgram="index.php";
#-------------------------Get a Desired Record -------------------------

function GetLoadDesiredRecord()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
global $DesiredRecord;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteSI where(DiveSiteSIId = '".strip_tags(addslashes($DesiredRecord))."') order by DiveSiteSIId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteSI Select * failure");
$NumDiveSiteSIRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteSIRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteSIId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteSIEnteredBy=$rowdata[2];
$DiveSiteSIDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteSITitle=$rowdata[12];
$DiveSiteSIType=$rowdata[13];
$DiveSiteSIFriendlyFacts=$rowdata[14];
$DiveSiteSIPictureURLFileInfo=$rowdata[15];
$DiveSiteSINotes=$rowdata[16];
}
PutVariablesIntoSession();
return;
}
#-------------------------Transfer Screen to Session Variables--------------------------

function PutVariablesIntoSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
$_SESSION['DiveSiteSIId'] = $DiveSiteSIId;
$_SESSION['DiveSiteId'] = $DiveSiteId;
$_SESSION['DiveSiteSIEnteredBy'] = $DiveSiteSIEnteredBy;
$_SESSION['DiveSiteSIDateEntered'] = $DiveSiteSIDateEntered;
$_SESSION['DiveSiteCity'] = $DiveSiteCity;
$_SESSION['DiveSiteProvince'] = $DiveSiteProvince;
$_SESSION['DiveSiteCountry'] = $DiveSiteCountry;
$_SESSION['DiveSiteName'] = $DiveSiteName;
$_SESSION['DiveSiteMajorName'] = $DiveSiteMajorName;
$_SESSION['DiveSiteMinorName'] = $DiveSiteMinorName;
$_SESSION['DiveSiteExactLat'] = $DiveSiteExactLat;
$_SESSION['DiveSiteExactLong'] = $DiveSiteExactLong;
$_SESSION['DiveSiteSITitle'] = $DiveSiteSITitle;
$_SESSION['DiveSiteSIType'] = $DiveSiteSIType;
$_SESSION['DiveSiteSIFriendlyFacts'] = $DiveSiteSIFriendlyFacts;
$_SESSION['DiveSiteSIPictureURLFileInfo'] = $DiveSiteSIPictureURLFileInfo;
$_SESSION['DiveSiteSINotes'] = $DiveSiteSINotes;
return;
}

#--------------------Transfer POST to screen variables ----------------------------------

function GetPostVariables()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
$DiveSiteSIId=$_POST['DiveSiteSIId'];
$DiveSiteId=$_POST['DiveSiteId'];
$DiveSiteSIEnteredBy=$_POST['DiveSiteSIEnteredBy'];
$DiveSiteSIDateEntered=$_POST['DiveSiteSIDateEntered'];
$DiveSiteCity=$_POST['DiveSiteCity'];
$DiveSiteProvince=$_POST['DiveSiteProvince'];
$DiveSiteCountry=$_POST['DiveSiteCountry'];
$DiveSiteName=$_POST['DiveSiteName'];
$DiveSiteMajorName=$_POST['DiveSiteMajorName'];
$DiveSiteMinorName=$_POST['DiveSiteMinorName'];
$DiveSiteExactLat=$_POST['DiveSiteExactLat'];
$DiveSiteExactLong=$_POST['DiveSiteExactLong'];
$DiveSiteSITitle=$_POST['DiveSiteSITitle'];
$DiveSiteSIType=$_POST['DiveSiteSIType'];
$DiveSiteSIFriendlyFacts=$_POST['DiveSiteSIFriendlyFacts'];
$DiveSiteSIPictureURLFileInfo=$_POST['DiveSiteSIPictureURLFileInfo'];
$DiveSiteSINotes=$_POST['DiveSiteSINotes'];
return;
}

#-----------------------Transfer Session Variables to Screen variables---------------------

function GetVariablesFromSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
$DiveSiteSIId=$_SESSION['DiveSiteSIId'];
$DiveSiteId=$_SESSION['DiveSiteId'];
$DiveSiteSIEnteredBy=$_SESSION['DiveSiteSIEnteredBy'];
$DiveSiteSIDateEntered=$_SESSION['DiveSiteSIDateEntered'];
$DiveSiteCity=$_SESSION['DiveSiteCity'];
$DiveSiteProvince=$_SESSION['DiveSiteProvince'];
$DiveSiteCountry=$_SESSION['DiveSiteCountry'];
$DiveSiteName=$_SESSION['DiveSiteName'];
$DiveSiteMajorName=$_SESSION['DiveSiteMajorName'];
$DiveSiteMinorName=$_SESSION['DiveSiteMinorName'];
$DiveSiteExactLat=$_SESSION['DiveSiteExactLat'];
$DiveSiteExactLong=$_SESSION['DiveSiteExactLong'];
$DiveSiteSITitle=$_SESSION['DiveSiteSITitle'];
$DiveSiteSIType=$_SESSION['DiveSiteSIType'];
$DiveSiteSIFriendlyFacts=$_SESSION['DiveSiteSIFriendlyFacts'];
$DiveSiteSIPictureURLFileInfo=$_SESSION['DiveSiteSIPictureURLFileInfo'];
$DiveSiteSINotes=$_SESSION['DiveSiteSINotes'];
return;
}

#----------------------------Get Last Database Record-----------------------------------------
function GetLastRecord($conn,$result)
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
for($i=1;$i<=$NumDiveSiteSIRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteSIId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteSIEnteredBy=$rowdata[2];
$DiveSiteSIDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteSITitle=$rowdata[12];
$DiveSiteSIType=$rowdata[13];
$DiveSiteSIFriendlyFacts=$rowdata[14];
$DiveSiteSIPictureURLFileInfo=$rowdata[15];
$DiveSiteSINotes=$rowdata[16];
}
PutVariablesIntoSession();
return;
}
#----------------------------Common Form-----------------------------------------------------
function CommonForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
global $Mode;
echo stripslashes("
<TABLE border='1' align='center'><tr><td>
<TABLE border='1' align='center' cellspacing='5'>
<tr><th valign='top' align ='left' scope='row'>DiveSiteSIId</th>
<td><input type ='text' NAME='DiveSiteSIId' VALUE='$DiveSiteSIId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteSIId' READONLY><br /></td>
</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteSIEnteredBy</th>
");
echo ("<td><input type ='text' NAME='DiveSiteSIEnteredBy' VALUE='$DiveSiteSIEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSiteSIEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSiteSIEnteredBy.value)) {alert('DiveSiteSIEnteredBy cannot be blank');this.form.DiveSiteSIEnteredBy.style.background='Yellow';}else{this.form.DiveSiteSIEnteredBy.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteSIDateEntered</th>
<td><input type ='text' NAME='DiveSiteSIDateEntered' VALUE='$DiveSiteSIDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteSIDateEntered' 
   onBlur=\"if(isBlank(this.form.DiveSiteSIDateEntered.value)) {alert('DiveSiteSIDateEntered cannot be blank');this.form.DiveSiteSIDateEntered.style.background='Yellow';}else{this.form.DiveSiteSIDateEntered.style.background='White';}\">");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteSIEdit\'].DiveSiteSIDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteSIEntry\'].DiveSiteSIDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
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
<tr><th valign='top' align ='left' scope='row'>DiveSiteSITitle</th>
");
echo ("<td><input type ='text' NAME='DiveSiteSITitle' VALUE='$DiveSiteSITitle'  SIZE='80' MAXLENGTH='80'  tabindex='13' id ='DiveSiteSITitle' 
   onBlur=\"if(isBlank(this.form.DiveSiteSITitle.value)) {alert('DiveSiteSITitle cannot be blank');this.form.DiveSiteSITitle.style.background='Yellow';}else{this.form.DiveSiteSITitle.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteSIType</th>
");
echo ("<td><input type ='text' NAME='DiveSiteSIType' VALUE='$DiveSiteSIType'  SIZE='50' MAXLENGTH='50'  tabindex='14' id ='DiveSiteSIType' 
   onBlur=\"if(isBlank(this.form.DiveSiteSIType.value)) {alert('DiveSiteSIType cannot be blank');this.form.DiveSiteSIType.style.background='Yellow';}else{this.form.DiveSiteSIType.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteSIFriendlyFacts</th>
");
echo ("<td><input type ='text' NAME='DiveSiteSIFriendlyFacts' VALUE='$DiveSiteSIFriendlyFacts'  SIZE='50' MAXLENGTH='50'  tabindex='15' id ='DiveSiteSIFriendlyFacts' 
   onBlur=\"if(isBlank(this.form.DiveSiteSIFriendlyFacts.value)) {alert('DiveSiteSIFriendlyFacts cannot be blank');this.form.DiveSiteSIFriendlyFacts.style.background='Yellow';}else{this.form.DiveSiteSIFriendlyFacts.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteSIPictureURLFileInfo</th>
<td><input type='file' NAME='DiveSiteSIPictureURLFileInfo'  VALUE='$DiveSiteSIPictureURLFileInfo'  SIZE='150' MAXLENGTH='150'  tabindex='16' id ='DiveSiteSIPictureURLFileInfo' 
   onBlur=\"if(isBlank(this.form.DiveSiteSIPictureURLFileInfo.value)) {alert('DiveSiteSIPictureURLFileInfo cannot be blank');this.form.DiveSiteSIPictureURLFileInfo.style.background='Yellow';}else{this.form.DiveSiteSIPictureURLFileInfo.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteSINotes</th>
<td><TEXTAREA NAME='DiveSiteSINotes' COLS=100 ROW=3 TABINDEX='17'>$DiveSiteSINotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
");}
#----------------------------Entry Form----------------------------------------------------

function AddForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
global $Mode;
$Mode='ADD';
echo stripslashes("
<FORM NAME='DiveSiteSIEntry' action='DiveSiteSI.php' method='POST'>");
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
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
global $Mode;
$Mode='EDIT';
echo stripslashes("
<FORM NAME='DiveSiteSIEdit' action='DiveSiteSI.php' method='POST'>");
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
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
echo stripslashes("
<FORM NAME='DiveSiteSIDelete' action='DiveSiteSI.php' method='POST'>
<TABLE  align='center' border='1'><tr><td>
<TABLE align='center' border='1' cellspacing='5'>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSIId</th>
<td><input type ='text' READONLY NAME='DiveSiteSIId' VALUE='$DiveSiteSIId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteSIId' READONLY><br /></td></tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSIEnteredBy</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteSIEnteredBy' VALUE='$DiveSiteSIEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSiteSIEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSiteSIEnteredBy.value)) {alert('DiveSiteSIEnteredBy cannot be blank');this.form.DiveSiteSIEnteredBy.style.background='Yellow';}else{this.form.DiveSiteSIEnteredBy.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSIDateEntered</th>
<td><input type ='text'READONLY NAME='DiveSiteSIDateEntered' VALUE='$DiveSiteSIDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteSIDateEntered'>");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteSIEdit\'].DiveSiteSIDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteSIEntry\'].DiveSiteSIDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
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
<tr><th align ='left' valign='top' scope='row'>DiveSiteSITitle</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteSITitle' VALUE='$DiveSiteSITitle'  SIZE='80' MAXLENGTH='80'  tabindex='13' id ='DiveSiteSITitle' 
   onBlur=\"if(isBlank(this.form.DiveSiteSITitle.value)) {alert('DiveSiteSITitle cannot be blank');this.form.DiveSiteSITitle.style.background='Yellow';}else{this.form.DiveSiteSITitle.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSIType</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteSIType' VALUE='$DiveSiteSIType'  SIZE='50' MAXLENGTH='50'  tabindex='14' id ='DiveSiteSIType' 
   onBlur=\"if(isBlank(this.form.DiveSiteSIType.value)) {alert('DiveSiteSIType cannot be blank');this.form.DiveSiteSIType.style.background='Yellow';}else{this.form.DiveSiteSIType.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSIFriendlyFacts</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteSIFriendlyFacts' VALUE='$DiveSiteSIFriendlyFacts'  SIZE='50' MAXLENGTH='50'  tabindex='15' id ='DiveSiteSIFriendlyFacts' 
   onBlur=\"if(isBlank(this.form.DiveSiteSIFriendlyFacts.value)) {alert('DiveSiteSIFriendlyFacts cannot be blank');this.form.DiveSiteSIFriendlyFacts.style.background='Yellow';}else{this.form.DiveSiteSIFriendlyFacts.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSIPictureURLFileInfo</th>
<td><input type='file'READONLY NAME='DiveSiteSIPictureURLFileInfo'  VALUE='$DiveSiteSIPictureURLFileInfo'  SIZE='150' MAXLENGTH='150'  tabindex='16' id ='DiveSiteSIPictureURLFileInfo' 
   onBlur=\"if(isBlank(this.form.DiveSiteSIPictureURLFileInfo.value)) {alert('DiveSiteSIPictureURLFileInfo cannot be blank');this.form.DiveSiteSIPictureURLFileInfo.style.background='Yellow';}else{this.form.DiveSiteSIPictureURLFileInfo.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSINotes</th>
<td><TEXTAREA NAME='DiveSiteSINotes' READONLY COLS=100 ROW=3 TABINDEX='17'>$DiveSiteSINotes</TEXTAREA></td>");
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
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
echo stripslashes("
<FORM NAME='DiveSiteSIDisplay' action='DiveSiteSI.php' method='POST'>
<TABLE  align='center' border='1'><tr><td>
<TABLE align='center' border='1' cellspacing='5'>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSIId</th>
<td><input type ='text' READONLY NAME='DiveSiteSIId' VALUE='$DiveSiteSIId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteSIId' READONLY><br /></td>
</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId'><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId'><br /></td>");}
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSIEnteredBy</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteSIEnteredBy' VALUE='$DiveSiteSIEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSiteSIEnteredBy'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSIDateEntered</th>
<td><input type ='text'READONLY NAME='DiveSiteSIDateEntered' VALUE='$DiveSiteSIDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteSIDateEntered'>");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteSIEdit\'].DiveSiteSIDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteSIEntry\'].DiveSiteSIDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
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
<tr><th align ='left' valign='top' scope='row'>DiveSiteSITitle</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteSITitle' VALUE='$DiveSiteSITitle'  SIZE='80' MAXLENGTH='80'  tabindex='13' id ='DiveSiteSITitle'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSIType</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteSIType' VALUE='$DiveSiteSIType'  SIZE='50' MAXLENGTH='50'  tabindex='14' id ='DiveSiteSIType'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSIFriendlyFacts</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSiteSIFriendlyFacts' VALUE='$DiveSiteSIFriendlyFacts'  SIZE='50' MAXLENGTH='50'  tabindex='15' id ='DiveSiteSIFriendlyFacts'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSIPictureURLFileInfo</th>
<td><input type='file'READONLY NAME='DiveSiteSIPictureURLFileInfo'  VALUE='$DiveSiteSIPictureURLFileInfo'  SIZE='150' MAXLENGTH='150'  tabindex='16' id ='DiveSiteSIPictureURLFileInfo'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteSINotes</th>
<td><TEXTAREA NAME='DiveSiteSINotes' READONLY COLS=100 ROW=3 TABINDEX='17'>$DiveSiteSINotes</TEXTAREA></td>");
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
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
$DiveSiteSIId='TBD';
$DiveSiteId='';
$DiveSiteSIEnteredBy='';
$DiveSiteSIDateEntered='';
$DiveSiteCity='';
$DiveSiteProvince='';
$DiveSiteCountry='';
$DiveSiteName='';
$DiveSiteMajorName='';
$DiveSiteMinorName='';
$DiveSiteExactLat='';
$DiveSiteExactLong='';
$DiveSiteSITitle='';
$DiveSiteSIType='';
$DiveSiteSIFriendlyFacts='';
$DiveSiteSIPictureURLFileInfo='';
$DiveSiteSINotes='';
return;
}
#----------------------------Get Next Record in Database -----------------------------------

function Db_Next()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
if($NumDiveSiteSIRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteSI where(DiveSiteId > '".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteSI Select * failure");
$NumDiveSiteSIRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteSIRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteSIId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteSIEnteredBy=$rowdata[2];
$DiveSiteSIDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteSITitle=$rowdata[12];
$DiveSiteSIType=$rowdata[13];
$DiveSiteSIFriendlyFacts=$rowdata[14];
$DiveSiteSIPictureURLFileInfo=$rowdata[15];
$DiveSiteSINotes=$rowdata[16];
}
else
{
$sql="select * from DiveSiteSI order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteSI Select * failure");
$NumDiveSiteSIRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteSIRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteSIId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteSIEnteredBy=$rowdata[2];
$DiveSiteSIDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteSITitle=$rowdata[12];
$DiveSiteSIType=$rowdata[13];
$DiveSiteSIFriendlyFacts=$rowdata[14];
$DiveSiteSIPictureURLFileInfo=$rowdata[15];
$DiveSiteSINotes=$rowdata[16];
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
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
if($NumDiveSiteSIRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteSI where(DiveSiteId < '".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteSI Select * failure");
$NumDiveSiteSIRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteSIRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteSIRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteSIId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteSIEnteredBy=$rowdata[2];
$DiveSiteSIDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteSITitle=$rowdata[12];
$DiveSiteSIType=$rowdata[13];
$DiveSiteSIFriendlyFacts=$rowdata[14];
$DiveSiteSIPictureURLFileInfo=$rowdata[15];
$DiveSiteSINotes=$rowdata[16];
}
}
else
{
$sql="select * from DiveSiteSI order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteSI Select * failure");
$NumDiveSiteSIRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteSIRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteSIRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteSIId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteSIEnteredBy=$rowdata[2];
$DiveSiteSIDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteSITitle=$rowdata[12];
$DiveSiteSIType=$rowdata[13];
$DiveSiteSIFriendlyFacts=$rowdata[14];
$DiveSiteSIPictureURLFileInfo=$rowdata[15];
$DiveSiteSINotes=$rowdata[16];
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
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$DiveSiteSIId=$_SESSION['DiveSiteSIId'];
$sql="update DiveSiteSI SET ";
$sql=$sql."DiveSiteId='".strip_tags(addslashes($DiveSiteId))."',";
$sql=$sql."DiveSiteSIEnteredBy='".strip_tags(addslashes($DiveSiteSIEnteredBy))."',";
$sql=$sql."DiveSiteSIDateEntered='".strip_tags(addslashes($DiveSiteSIDateEntered))."',";
$sql=$sql."DiveSiteCity='".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."DiveSiteProvince='".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."DiveSiteCountry='".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."DiveSiteName='".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."DiveSiteMajorName='".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."DiveSiteMinorName='".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."DiveSiteExactLat='".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."DiveSiteExactLong='".strip_tags(addslashes($DiveSiteExactLong))."',";
$sql=$sql."DiveSiteSITitle='".strip_tags(addslashes($DiveSiteSITitle))."',";
$sql=$sql."DiveSiteSIType='".strip_tags(addslashes($DiveSiteSIType))."',";
$sql=$sql."DiveSiteSIFriendlyFacts='".strip_tags(addslashes($DiveSiteSIFriendlyFacts))."',";
$sql=$sql."DiveSiteSIPictureURLFileInfo='".strip_tags(addslashes($DiveSiteSIPictureURLFileInfo))."',";
$sql=$sql."DiveSiteSINotes='".strip_tags(addslashes($DiveSiteSINotes))."' where DiveSiteSIId='".$DiveSiteSIId."'"; 
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteSI DATA failure");
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#-----------------------------Print Out Current Form Variables--------------------------

function PrintFormVars()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
OutputMessage('NumDiveSiteSIRecords: '.$NumDiveSiteSIRecords);
OutputMessage('DiveSiteSIId: '.$DiveSiteSIId);
OutputMessage('DiveSiteId: '.$DiveSiteId);
OutputMessage('DiveSiteSIEnteredBy: '.$DiveSiteSIEnteredBy);
OutputMessage('DiveSiteSIDateEntered: '.$DiveSiteSIDateEntered);
OutputMessage('DiveSiteCity: '.$DiveSiteCity);
OutputMessage('DiveSiteProvince: '.$DiveSiteProvince);
OutputMessage('DiveSiteCountry: '.$DiveSiteCountry);
OutputMessage('DiveSiteName: '.$DiveSiteName);
OutputMessage('DiveSiteMajorName: '.$DiveSiteMajorName);
OutputMessage('DiveSiteMinorName: '.$DiveSiteMinorName);
OutputMessage('DiveSiteExactLat: '.$DiveSiteExactLat);
OutputMessage('DiveSiteExactLong: '.$DiveSiteExactLong);
OutputMessage('DiveSiteSITitle: '.$DiveSiteSITitle);
OutputMessage('DiveSiteSIType: '.$DiveSiteSIType);
OutputMessage('DiveSiteSIFriendlyFacts: '.$DiveSiteSIFriendlyFacts);
OutputMessage('DiveSiteSIPictureURLFileInfo: '.$DiveSiteSIPictureURLFileInfo);
OutputMessage('DiveSiteSINotes: '.$DiveSiteSINotes);
return;
}
#-----------------------------Database Add Function---------------------------------------

function Db_Add()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="insert into DiveSiteSI(DiveSiteId,DiveSiteSIEnteredBy,DiveSiteSIDateEntered,DiveSiteCity,DiveSiteProvince,DiveSiteCountry,DiveSiteName,DiveSiteMajorName,DiveSiteMinorName,DiveSiteExactLat,DiveSiteExactLong,DiveSiteSITitle,DiveSiteSIType,DiveSiteSIFriendlyFacts,DiveSiteSIPictureURLFileInfo,DiveSiteSINotes) values (";
$sql=$sql."'".strip_tags(addslashes($DiveSiteId))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteSIEnteredBy))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteSIDateEntered))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLong))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteSITitle))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteSIType))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteSIFriendlyFacts))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteSIPictureURLFileInfo))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteSINotes))."')";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteSI ADD failure");
$DiveSiteSIId=mysql_insert_id($connection);
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#----------------------------Database Delete Function------------------------------------

function Db_Delete()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="delete from DiveSiteSI where DiveSiteSIId='".$DiveSiteSIId."'";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteSI DELETE failure");
mysql_close($connection);
return;
}
#-----------------------------Get Current Number of Records -----------------------------

function CurrentNumberRecords()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteSI order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteSI GetNumRecs failure");
$NumDiveSiteSIRecords = mysql_num_rows($result);
mysql_close($connection);
return;
}
#------------------------------Screen Report of Records in Database ---------------------

function ListRecords()
 { 
global $user, $serverhost,$db,$password;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteSI order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteSI GetNumRecs failure");
$NumDiveSiteSIRecords = mysql_num_rows($result);
echo "<form action='DiveSiteSI.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSiteSIId</b></td>";
echo "<td align='center' ><b>DiveSiteId</b></td>";
echo "<td align='center' ><b>DiveSiteSIEnteredBy</b></td>";
echo "<td align='center' ><b>DiveSiteSIDateEntered</b></td>";
echo "<td align='center' ><b>DiveSiteCity</b></td>";
echo "<td align='center' ><b>DiveSiteProvince</b></td>";
echo "<td align='center' ><b>DiveSiteCountry</b></td>";
echo "<td align='center' ><b>DiveSiteName</b></td>";
echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
echo "<td align='center' ><b>DiveSiteExactLat</b></td>";
echo "<td align='center' ><b>DiveSiteExactLong</b></td>";
echo "<td align='center' ><b>DiveSiteSITitle</b></td>";
echo "<td align='center' ><b>DiveSiteSIType</b></td>";
echo "<td align='center' ><b>DiveSiteSIFriendlyFacts</b></td>";
echo "<td align='center' ><b>DiveSiteSIPictureURLFileInfo</b></td>";
echo "<td align='center' ><b>DiveSiteSINotes</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteSIRecords;$i++)
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
echo "</tr>";
}
echo "<tr><td colspan='17' align='center'><input type ='SUBMIT' NAME='display_button' Value = 'Back to Main'></td></tr>";
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
$sql="select * from DiveSiteSI order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteSI GetNumRecs failure");
$NumDiveSiteSIRecords = mysql_num_rows($result);
mysql_close($connection);
echo "<form name='ListMenu' action='DiveSiteSI.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<input type='hidden' name='check' id='check'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSiteSIId</b></td>";
echo "<td align='center' ><b>DiveSiteId</b></td>";
echo "<td align='center' ><b>DiveSiteSIEnteredBy</b></td>";
echo "<td align='center' ><b>DiveSiteSIDateEntered</b></td>";
echo "<td align='center' ><b>DiveSiteCity</b></td>";
echo "<td align='center' ><b>DiveSiteProvince</b></td>";
echo "<td align='center' ><b>DiveSiteCountry</b></td>";
echo "<td align='center' ><b>DiveSiteName</b></td>";
echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
echo "<td align='center' ><b>DiveSiteExactLat</b></td>";
echo "<td align='center' ><b>DiveSiteExactLong</b></td>";
echo "<td align='center' ><b>DiveSiteSITitle</b></td>";
echo "<td align='center' ><b>DiveSiteSIType</b></td>";
echo "<td align='center' ><b>DiveSiteSIFriendlyFacts</b></td>";
echo "<td align='center' ><b>DiveSiteSIPictureURLFileInfo</b></td>";
echo "<td align='center' ><b>DiveSiteSINotes</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteSIRecords;$i++)
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
echo "</tr>";
}
echo "<tr><td colspan='17' align='center'>
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
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteSI order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteSI InitializeProgram failure");
$NumDiveSiteSIRecords = mysql_num_rows($result);
if($NumDiveSiteSIRecords==0)
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
global $NumDiveSiteSIRecords,$DiveSiteSIId,$DiveSiteId,$DiveSiteSIEnteredBy,$DiveSiteSIDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteSITitle,$DiveSiteSIType;
global $DiveSiteSIFriendlyFacts,$DiveSiteSIPictureURLFileInfo,$DiveSiteSINotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteSI where(DiveSiteId ='".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteSI Select * failure");
$NumDiveSiteSIRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteSIRecordsDesired>0)
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
