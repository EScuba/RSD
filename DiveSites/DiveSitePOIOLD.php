<?php /**/ ?><?php
session_start();
require_once('SystemFunctions.php');
#ValidUserForProgram($_SESSION['User'],'DiveSitePOI.php');

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

$table="DiveSitePOI";
$CallingProgram="index.php";
#-------------------------Get a Desired Record -------------------------

function GetLoadDesiredRecord()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
global $DesiredRecord;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSitePOI where(DiveSitePOIId = '".strip_tags(addslashes($DesiredRecord))."') order by DiveSitePOIId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI Select * failure");
$NumDiveSitePOIRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSitePOIRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSitePOIId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSitePOIEnteredBy=$rowdata[2];
$DiveSitePixDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSitePOITitle=$rowdata[12];
$DiveSitePOIType=$rowdata[13];
$DiveSitePOINoteKeywords=$rowdata[14];
$DiveSitePOIPictureURLFileInfo=$rowdata[15];
$DiveSitePOINotes=$rowdata[16];
}
PutVariablesIntoSession();
return;
}
#-------------------------Transfer Screen to Session Variables--------------------------

function PutVariablesIntoSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
$_SESSION['DiveSitePOIId'] = $DiveSitePOIId;
$_SESSION['DiveSiteId'] = $DiveSiteId;
$_SESSION['DiveSitePOIEnteredBy'] = $DiveSitePOIEnteredBy;
$_SESSION['DiveSitePixDateEntered'] = $DiveSitePixDateEntered;
$_SESSION['DiveSiteCity'] = $DiveSiteCity;
$_SESSION['DiveSiteProvince'] = $DiveSiteProvince;
$_SESSION['DiveSiteCountry'] = $DiveSiteCountry;
$_SESSION['DiveSiteName'] = $DiveSiteName;
$_SESSION['DiveSiteMajorName'] = $DiveSiteMajorName;
$_SESSION['DiveSiteMinorName'] = $DiveSiteMinorName;
$_SESSION['DiveSiteExactLat'] = $DiveSiteExactLat;
$_SESSION['DiveSiteExactLong'] = $DiveSiteExactLong;
$_SESSION['DiveSitePOITitle'] = $DiveSitePOITitle;
$_SESSION['DiveSitePOIType'] = $DiveSitePOIType;
$_SESSION['DiveSitePOINoteKeywords'] = $DiveSitePOINoteKeywords;
$_SESSION['DiveSitePOIPictureURLFileInfo'] = $DiveSitePOIPictureURLFileInfo;
$_SESSION['DiveSitePOINotes'] = $DiveSitePOINotes;
return;
}

#--------------------Transfer POST to screen variables ----------------------------------

function GetPostVariables()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
$DiveSitePOIId=$_POST['DiveSitePOIId'];
$DiveSiteId=$_POST['DiveSiteId'];
$DiveSitePOIEnteredBy=$_POST['DiveSitePOIEnteredBy'];
$DiveSitePixDateEntered=$_POST['DiveSitePixDateEntered'];
$DiveSiteCity=$_POST['DiveSiteCity'];
$DiveSiteProvince=$_POST['DiveSiteProvince'];
$DiveSiteCountry=$_POST['DiveSiteCountry'];
$DiveSiteName=$_POST['DiveSiteName'];
$DiveSiteMajorName=$_POST['DiveSiteMajorName'];
$DiveSiteMinorName=$_POST['DiveSiteMinorName'];
$DiveSiteExactLat=$_POST['DiveSiteExactLat'];
$DiveSiteExactLong=$_POST['DiveSiteExactLong'];
$DiveSitePOITitle=$_POST['DiveSitePOITitle'];
$DiveSitePOIType=$_POST['DiveSitePOIType'];
$DiveSitePOINoteKeywords=$_POST['DiveSitePOINoteKeywords'];
$DiveSitePOIPictureURLFileInfo=$_POST['DiveSitePOIPictureURLFileInfo'];
$DiveSitePOINotes=$_POST['DiveSitePOINotes'];
return;
}

#-----------------------Transfer Session Variables to Screen variables---------------------

function GetVariablesFromSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
$DiveSitePOIId=$_SESSION['DiveSitePOIId'];
$DiveSiteId=$_SESSION['DiveSiteId'];
$DiveSitePOIEnteredBy=$_SESSION['DiveSitePOIEnteredBy'];
$DiveSitePixDateEntered=$_SESSION['DiveSitePixDateEntered'];
$DiveSiteCity=$_SESSION['DiveSiteCity'];
$DiveSiteProvince=$_SESSION['DiveSiteProvince'];
$DiveSiteCountry=$_SESSION['DiveSiteCountry'];
$DiveSiteName=$_SESSION['DiveSiteName'];
$DiveSiteMajorName=$_SESSION['DiveSiteMajorName'];
$DiveSiteMinorName=$_SESSION['DiveSiteMinorName'];
$DiveSiteExactLat=$_SESSION['DiveSiteExactLat'];
$DiveSiteExactLong=$_SESSION['DiveSiteExactLong'];
$DiveSitePOITitle=$_SESSION['DiveSitePOITitle'];
$DiveSitePOIType=$_SESSION['DiveSitePOIType'];
$DiveSitePOINoteKeywords=$_SESSION['DiveSitePOINoteKeywords'];
$DiveSitePOIPictureURLFileInfo=$_SESSION['DiveSitePOIPictureURLFileInfo'];
$DiveSitePOINotes=$_SESSION['DiveSitePOINotes'];
return;
}

#----------------------------Get Last Database Record-----------------------------------------
function GetLastRecord($conn,$result)
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
for($i=1;$i<=$NumDiveSitePOIRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSitePOIId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSitePOIEnteredBy=$rowdata[2];
$DiveSitePixDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSitePOITitle=$rowdata[12];
$DiveSitePOIType=$rowdata[13];
$DiveSitePOINoteKeywords=$rowdata[14];
$DiveSitePOIPictureURLFileInfo=$rowdata[15];
$DiveSitePOINotes=$rowdata[16];
}
PutVariablesIntoSession();
return;
}
#----------------------------Common Form-----------------------------------------------------
function CommonForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
global $Mode;
echo stripslashes("
<TABLE border='1' align='center'><tr><td>
<TABLE border='1' align='center' cellspacing='5'>
<tr><th valign='top' align ='left' scope='row'>DiveSitePOIId</th>
<td><input type ='text' NAME='DiveSitePOIId' VALUE='$DiveSitePOIId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSitePOIId' READONLY><br /></td>
</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSitePOIEnteredBy</th>
");
echo ("<td><input type ='text' NAME='DiveSitePOIEnteredBy' VALUE='$DiveSitePOIEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSitePOIEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSitePOIEnteredBy.value)) {alert('DiveSitePOIEnteredBy cannot be blank');this.form.DiveSitePOIEnteredBy.style.background='Yellow';}else{this.form.DiveSitePOIEnteredBy.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSitePixDateEntered</th>
<td><input type ='text' NAME='DiveSitePixDateEntered' VALUE='$DiveSitePixDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSitePixDateEntered' 
   onBlur=\"if(isBlank(this.form.DiveSitePixDateEntered.value)) {alert('DiveSitePixDateEntered cannot be blank');this.form.DiveSitePixDateEntered.style.background='Yellow';}else{this.form.DiveSitePixDateEntered.style.background='White';}\">");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSitePOIEdit\'].DiveSitePixDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSitePOIEntry\'].DiveSitePixDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
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
<tr><th valign='top' align ='left' scope='row'>DiveSitePOITitle</th>
");
echo ("<td><input type ='text' NAME='DiveSitePOITitle' VALUE='$DiveSitePOITitle'  SIZE='80' MAXLENGTH='80'  tabindex='13' id ='DiveSitePOITitle' 
   onBlur=\"if(isBlank(this.form.DiveSitePOITitle.value)) {alert('DiveSitePOITitle cannot be blank');this.form.DiveSitePOITitle.style.background='Yellow';}else{this.form.DiveSitePOITitle.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSitePOIType</th>
");
echo ("<td><input type ='text' NAME='DiveSitePOIType' VALUE='$DiveSitePOIType'  SIZE='20' MAXLENGTH='20'  tabindex='14' id ='DiveSitePOIType' 
   onBlur=\"if(isBlank(this.form.DiveSitePOIType.value)) {alert('DiveSitePOIType cannot be blank');this.form.DiveSitePOIType.style.background='Yellow';}else{this.form.DiveSitePOIType.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSitePOINoteKeywords</th>
<td><TEXTAREA NAME='DiveSitePOINoteKeywords' COLS=100 ROW=3 TABINDEX='15'>$DiveSitePOINoteKeywords</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSitePOIPictureURLFileInfo</th>
<td><input type='file' NAME='DiveSitePOIPictureURLFileInfo'  VALUE='$DiveSitePOIPictureURLFileInfo'  SIZE='150' MAXLENGTH='150'  tabindex='16' id ='DiveSitePOIPictureURLFileInfo' 
   onBlur=\"if(isBlank(this.form.DiveSitePOIPictureURLFileInfo.value)) {alert('DiveSitePOIPictureURLFileInfo cannot be blank');this.form.DiveSitePOIPictureURLFileInfo.style.background='Yellow';}else{this.form.DiveSitePOIPictureURLFileInfo.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSitePOINotes</th>
<td><TEXTAREA NAME='DiveSitePOINotes' COLS=100 ROW=3 TABINDEX='17'>$DiveSitePOINotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
");}
#----------------------------Entry Form----------------------------------------------------

function AddForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
global $Mode;
$Mode='ADD';
echo stripslashes("
<FORM NAME='DiveSitePOIEntry' action='DiveSitePOI.php' method='POST'>");
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
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
global $Mode;
$Mode='EDIT';
echo stripslashes("
<FORM NAME='DiveSitePOIEdit' action='DiveSitePOI.php' method='POST'>");
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
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
echo stripslashes("
<FORM NAME='DiveSitePOIDelete' action='DiveSitePOI.php' method='POST'>
<TABLE  align='center' border='1'><tr><td>
<TABLE align='center' border='1' cellspacing='5'>
<tr><th align ='left' valign='top' scope='row'>DiveSitePOIId</th>
<td><input type ='text' READONLY NAME='DiveSitePOIId' VALUE='$DiveSitePOIId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSitePOIId' READONLY><br /></td></tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSitePOIEnteredBy</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSitePOIEnteredBy' VALUE='$DiveSitePOIEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSitePOIEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSitePOIEnteredBy.value)) {alert('DiveSitePOIEnteredBy cannot be blank');this.form.DiveSitePOIEnteredBy.style.background='Yellow';}else{this.form.DiveSitePOIEnteredBy.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSitePixDateEntered</th>
<td><input type ='text'READONLY NAME='DiveSitePixDateEntered' VALUE='$DiveSitePixDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSitePixDateEntered'>");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSitePOIEdit\'].DiveSitePixDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSitePOIEntry\'].DiveSitePixDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
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
<tr><th align ='left' valign='top' scope='row'>DiveSitePOITitle</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSitePOITitle' VALUE='$DiveSitePOITitle'  SIZE='80' MAXLENGTH='80'  tabindex='13' id ='DiveSitePOITitle' 
   onBlur=\"if(isBlank(this.form.DiveSitePOITitle.value)) {alert('DiveSitePOITitle cannot be blank');this.form.DiveSitePOITitle.style.background='Yellow';}else{this.form.DiveSitePOITitle.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSitePOIType</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSitePOIType' VALUE='$DiveSitePOIType'  SIZE='20' MAXLENGTH='20'  tabindex='14' id ='DiveSitePOIType' 
   onBlur=\"if(isBlank(this.form.DiveSitePOIType.value)) {alert('DiveSitePOIType cannot be blank');this.form.DiveSitePOIType.style.background='Yellow';}else{this.form.DiveSitePOIType.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSitePOINoteKeywords</th>
<td><TEXTAREA NAME='DiveSitePOINoteKeywords' READONLY COLS=100 ROW=3 TABINDEX='15'>$DiveSitePOINoteKeywords</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSitePOIPictureURLFileInfo</th>
<td><input type='file'READONLY NAME='DiveSitePOIPictureURLFileInfo'  VALUE='$DiveSitePOIPictureURLFileInfo'  SIZE='150' MAXLENGTH='150'  tabindex='16' id ='DiveSitePOIPictureURLFileInfo' 
   onBlur=\"if(isBlank(this.form.DiveSitePOIPictureURLFileInfo.value)) {alert('DiveSitePOIPictureURLFileInfo cannot be blank');this.form.DiveSitePOIPictureURLFileInfo.style.background='Yellow';}else{this.form.DiveSitePOIPictureURLFileInfo.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSitePOINotes</th>
<td><TEXTAREA NAME='DiveSitePOINotes' READONLY COLS=100 ROW=3 TABINDEX='17'>$DiveSitePOINotes</TEXTAREA></td>");
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
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
echo stripslashes("
<FORM NAME='DiveSitePOIDisplay' action='DiveSitePOI.php' method='POST'>
<TABLE  align='center' border='1'><tr><td>
<TABLE align='center' border='1' cellspacing='5'>
<tr><th align ='left' valign='top' scope='row'>DiveSitePOIId</th>
<td><input type ='text' READONLY NAME='DiveSitePOIId' VALUE='$DiveSitePOIId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSitePOIId' READONLY><br /></td>
</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId'><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId'><br /></td>");}
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSitePOIEnteredBy</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSitePOIEnteredBy' VALUE='$DiveSitePOIEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSitePOIEnteredBy'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSitePixDateEntered</th>
<td><input type ='text'READONLY NAME='DiveSitePixDateEntered' VALUE='$DiveSitePixDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSitePixDateEntered'>");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSitePOIEdit\'].DiveSitePixDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSitePOIEntry\'].DiveSitePixDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
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
<tr><th align ='left' valign='top' scope='row'>DiveSitePOITitle</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSitePOITitle' VALUE='$DiveSitePOITitle'  SIZE='80' MAXLENGTH='80'  tabindex='13' id ='DiveSitePOITitle'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSitePOIType</th>
");
echo ("<td><input type ='text'READONLY NAME='DiveSitePOIType' VALUE='$DiveSitePOIType'  SIZE='20' MAXLENGTH='20'  tabindex='14' id ='DiveSitePOIType'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSitePOINoteKeywords</th>
<td><TEXTAREA NAME='DiveSitePOINoteKeywords' READONLY COLS=100 ROW=3 TABINDEX='15'>$DiveSitePOINoteKeywords</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSitePOIPictureURLFileInfo</th>
<td><input type='file'READONLY NAME='DiveSitePOIPictureURLFileInfo'  VALUE='$DiveSitePOIPictureURLFileInfo'  SIZE='150' MAXLENGTH='150'  tabindex='16' id ='DiveSitePOIPictureURLFileInfo'><br /></td>");
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSitePOINotes</th>
<td><TEXTAREA NAME='DiveSitePOINotes' READONLY COLS=100 ROW=3 TABINDEX='17'>$DiveSitePOINotes</TEXTAREA></td>");
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
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
$DiveSitePOIId='TBD';
$DiveSiteId='';
$DiveSitePOIEnteredBy='';
$DiveSitePixDateEntered='';
$DiveSiteCity='';
$DiveSiteProvince='';
$DiveSiteCountry='';
$DiveSiteName='';
$DiveSiteMajorName='';
$DiveSiteMinorName='';
$DiveSiteExactLat='';
$DiveSiteExactLong='';
$DiveSitePOITitle='';
$DiveSitePOIType='';
$DiveSitePOINoteKeywords='';
$DiveSitePOIPictureURLFileInfo='';
$DiveSitePOINotes='';
return;
}
#----------------------------Get Next Record in Database -----------------------------------

function Db_Next()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
if($NumDiveSitePOIRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSitePOI where(DiveSiteId > '".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI Select * failure");
$NumDiveSitePOIRecordsDesired = mysql_num_rows($result);
if($NumDiveSitePOIRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSitePOIId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSitePOIEnteredBy=$rowdata[2];
$DiveSitePixDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSitePOITitle=$rowdata[12];
$DiveSitePOIType=$rowdata[13];
$DiveSitePOINoteKeywords=$rowdata[14];
$DiveSitePOIPictureURLFileInfo=$rowdata[15];
$DiveSitePOINotes=$rowdata[16];
}
else
{
$sql="select * from DiveSitePOI order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI Select * failure");
$NumDiveSitePOIRecordsDesired = mysql_num_rows($result);
if($NumDiveSitePOIRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSitePOIId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSitePOIEnteredBy=$rowdata[2];
$DiveSitePixDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSitePOITitle=$rowdata[12];
$DiveSitePOIType=$rowdata[13];
$DiveSitePOINoteKeywords=$rowdata[14];
$DiveSitePOIPictureURLFileInfo=$rowdata[15];
$DiveSitePOINotes=$rowdata[16];
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
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
if($NumDiveSitePOIRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSitePOI where(DiveSiteId < '".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI Select * failure");
$NumDiveSitePOIRecordsDesired = mysql_num_rows($result);
if($NumDiveSitePOIRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSitePOIRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSitePOIId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSitePOIEnteredBy=$rowdata[2];
$DiveSitePixDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSitePOITitle=$rowdata[12];
$DiveSitePOIType=$rowdata[13];
$DiveSitePOINoteKeywords=$rowdata[14];
$DiveSitePOIPictureURLFileInfo=$rowdata[15];
$DiveSitePOINotes=$rowdata[16];
}
}
else
{
$sql="select * from DiveSitePOI order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI Select * failure");
$NumDiveSitePOIRecordsDesired = mysql_num_rows($result);
if($NumDiveSitePOIRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSitePOIRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSitePOIId=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSitePOIEnteredBy=$rowdata[2];
$DiveSitePixDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSitePOITitle=$rowdata[12];
$DiveSitePOIType=$rowdata[13];
$DiveSitePOINoteKeywords=$rowdata[14];
$DiveSitePOIPictureURLFileInfo=$rowdata[15];
$DiveSitePOINotes=$rowdata[16];
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
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$DiveSitePOIId=$_SESSION['DiveSitePOIId'];
$sql="update DiveSitePOI SET ";
$sql=$sql."DiveSiteId='".strip_tags(addslashes($DiveSiteId))."',";
$sql=$sql."DiveSitePOIEnteredBy='".strip_tags(addslashes($DiveSitePOIEnteredBy))."',";
$sql=$sql."DiveSitePixDateEntered='".strip_tags(addslashes($DiveSitePixDateEntered))."',";
$sql=$sql."DiveSiteCity='".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."DiveSiteProvince='".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."DiveSiteCountry='".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."DiveSiteName='".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."DiveSiteMajorName='".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."DiveSiteMinorName='".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."DiveSiteExactLat='".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."DiveSiteExactLong='".strip_tags(addslashes($DiveSiteExactLong))."',";
$sql=$sql."DiveSitePOITitle='".strip_tags(addslashes($DiveSitePOITitle))."',";
$sql=$sql."DiveSitePOIType='".strip_tags(addslashes($DiveSitePOIType))."',";
$sql=$sql."DiveSitePOINoteKeywords='".strip_tags(addslashes($DiveSitePOINoteKeywords))."',";
$sql=$sql."DiveSitePOIPictureURLFileInfo='".strip_tags(addslashes($DiveSitePOIPictureURLFileInfo))."',";
$sql=$sql."DiveSitePOINotes='".strip_tags(addslashes($DiveSitePOINotes))."' where DiveSitePOIId='".$DiveSitePOIId."'"; 
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI DATA failure");
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#-----------------------------Print Out Current Form Variables--------------------------

function PrintFormVars()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
OutputMessage('NumDiveSitePOIRecords: '.$NumDiveSitePOIRecords);
OutputMessage('DiveSitePOIId: '.$DiveSitePOIId);
OutputMessage('DiveSiteId: '.$DiveSiteId);
OutputMessage('DiveSitePOIEnteredBy: '.$DiveSitePOIEnteredBy);
OutputMessage('DiveSitePixDateEntered: '.$DiveSitePixDateEntered);
OutputMessage('DiveSiteCity: '.$DiveSiteCity);
OutputMessage('DiveSiteProvince: '.$DiveSiteProvince);
OutputMessage('DiveSiteCountry: '.$DiveSiteCountry);
OutputMessage('DiveSiteName: '.$DiveSiteName);
OutputMessage('DiveSiteMajorName: '.$DiveSiteMajorName);
OutputMessage('DiveSiteMinorName: '.$DiveSiteMinorName);
OutputMessage('DiveSiteExactLat: '.$DiveSiteExactLat);
OutputMessage('DiveSiteExactLong: '.$DiveSiteExactLong);
OutputMessage('DiveSitePOITitle: '.$DiveSitePOITitle);
OutputMessage('DiveSitePOIType: '.$DiveSitePOIType);
OutputMessage('DiveSitePOINoteKeywords: '.$DiveSitePOINoteKeywords);
OutputMessage('DiveSitePOIPictureURLFileInfo: '.$DiveSitePOIPictureURLFileInfo);
OutputMessage('DiveSitePOINotes: '.$DiveSitePOINotes);
return;
}
#-----------------------------Database Add Function---------------------------------------

function Db_Add()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="insert into DiveSitePOI(DiveSiteId,DiveSitePOIEnteredBy,DiveSitePixDateEntered,DiveSiteCity,DiveSiteProvince,DiveSiteCountry,DiveSiteName,DiveSiteMajorName,DiveSiteMinorName,DiveSiteExactLat,DiveSiteExactLong,DiveSitePOITitle,DiveSitePOIType,DiveSitePOINoteKeywords,DiveSitePOIPictureURLFileInfo,DiveSitePOINotes) values (";
$sql=$sql."'".strip_tags(addslashes($DiveSiteId))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSitePOIEnteredBy))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSitePixDateEntered))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLong))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSitePOITitle))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSitePOIType))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSitePOINoteKeywords))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSitePOIPictureURLFileInfo))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSitePOINotes))."')";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI ADD failure");
$DiveSitePOIId=mysql_insert_id($connection);
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#----------------------------Database Delete Function------------------------------------

function Db_Delete()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="delete from DiveSitePOI where DiveSitePOIId='".$DiveSitePOIId."'";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI DELETE failure");
mysql_close($connection);
return;
}
#-----------------------------Get Current Number of Records -----------------------------

function CurrentNumberRecords()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSitePOI order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI GetNumRecs failure");
$NumDiveSitePOIRecords = mysql_num_rows($result);
mysql_close($connection);
return;
}
#------------------------------Screen Report of Records in Database ---------------------

function ListRecords()
 { 
global $user, $serverhost,$db,$password;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSitePOI order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI GetNumRecs failure");
$NumDiveSitePOIRecords = mysql_num_rows($result);
echo "<form action='DiveSitePOI.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSitePOIId</b></td>";
echo "<td align='center' ><b>DiveSiteId</b></td>";
echo "<td align='center' ><b>DiveSitePOIEnteredBy</b></td>";
echo "<td align='center' ><b>DiveSitePixDateEntered</b></td>";
echo "<td align='center' ><b>DiveSiteCity</b></td>";
echo "<td align='center' ><b>DiveSiteProvince</b></td>";
echo "<td align='center' ><b>DiveSiteCountry</b></td>";
echo "<td align='center' ><b>DiveSiteName</b></td>";
echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
echo "<td align='center' ><b>DiveSiteExactLat</b></td>";
echo "<td align='center' ><b>DiveSiteExactLong</b></td>";
echo "<td align='center' ><b>DiveSitePOITitle</b></td>";
echo "<td align='center' ><b>DiveSitePOIType</b></td>";
echo "<td align='center' ><b>DiveSitePOINoteKeywords</b></td>";
echo "<td align='center' ><b>DiveSitePOIPictureURLFileInfo</b></td>";
echo "<td align='center' ><b>DiveSitePOINotes</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSitePOIRecords;$i++)
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
$sql="select * from DiveSitePOI order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI GetNumRecs failure");
$NumDiveSitePOIRecords = mysql_num_rows($result);
mysql_close($connection);
echo "<form name='ListMenu' action='DiveSitePOI.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<input type='hidden' name='check' id='check'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSitePOIId</b></td>";
echo "<td align='center' ><b>DiveSiteId</b></td>";
echo "<td align='center' ><b>DiveSitePOIEnteredBy</b></td>";
echo "<td align='center' ><b>DiveSitePixDateEntered</b></td>";
echo "<td align='center' ><b>DiveSiteCity</b></td>";
echo "<td align='center' ><b>DiveSiteProvince</b></td>";
echo "<td align='center' ><b>DiveSiteCountry</b></td>";
echo "<td align='center' ><b>DiveSiteName</b></td>";
echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
echo "<td align='center' ><b>DiveSiteExactLat</b></td>";
echo "<td align='center' ><b>DiveSiteExactLong</b></td>";
echo "<td align='center' ><b>DiveSitePOITitle</b></td>";
echo "<td align='center' ><b>DiveSitePOIType</b></td>";
echo "<td align='center' ><b>DiveSitePOINoteKeywords</b></td>";
echo "<td align='center' ><b>DiveSitePOIPictureURLFileInfo</b></td>";
echo "<td align='center' ><b>DiveSitePOINotes</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSitePOIRecords;$i++)
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
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSitePOI order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI InitializeProgram failure");
$NumDiveSitePOIRecords = mysql_num_rows($result);
if($NumDiveSitePOIRecords==0)
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
global $NumDiveSitePOIRecords,$DiveSitePOIId,$DiveSiteId,$DiveSitePOIEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePOITitle,$DiveSitePOIType;
global $DiveSitePOINoteKeywords,$DiveSitePOIPictureURLFileInfo,$DiveSitePOINotes;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSitePOI where(DiveSiteId ='".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI Select * failure");
$NumDiveSitePOIRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSitePOIRecordsDesired>0)
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
