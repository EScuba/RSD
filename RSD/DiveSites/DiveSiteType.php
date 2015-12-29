<?php /**/ ?><?php
session_start();
require_once('SystemFunctions.php');
#ValidUserForProgram($_SESSION['User'],'DiveSiteType.php');

 $Add=$_SESSION['Add'];

 $Edit=$_SESSION['Edit'];

 $Delete=$_SESSION['Delete'];

 $Search=$_SESSION['Search'];

 $Start=$_SESSION['Start'];

 $Expiry=$_SESSION['Expiry'];

 if(($_POST['display_button']=='Back')||($_POST['display_button']=='Logout'))
  { 
      header('Location: DiveSiteAdmin.php');
  } 
$db="aquatreasurequest";
$table="DiveSiteType";
$CallingProgram="DiveSiteAdmin.php";
#-------------------------Get a Desired Record -------------------------

function GetLoadDesiredRecord()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
global $DesiredRecord;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteType where(DiveSiteTypeId = '".strip_tags(addslashes($DesiredRecord))."') order by DiveSiteTypeId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteType Select * failure");
$NumDiveSiteTypeRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteTypeRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteTypeId=$rowdata[0];
$DiveSiteTypeRank=$rowdata[1];
$DiveSiteTypeDescription=$rowdata[2];
}
PutVariablesIntoSession();
return;
}
#-------------------------Transfer Screen to Session Variables--------------------------

function PutVariablesIntoSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
$_SESSION['DiveSiteTypeId'] = $DiveSiteTypeId;
$_SESSION['DiveSiteTypeRank'] = $DiveSiteTypeRank;
$_SESSION['DiveSiteTypeDescription'] = $DiveSiteTypeDescription;
return;
}

#--------------------Transfer POST to screen variables ----------------------------------

function GetPostVariables()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
$DiveSiteTypeId=$_POST['DiveSiteTypeId'];
$DiveSiteTypeRank=$_POST['DiveSiteTypeRank'];
$DiveSiteTypeDescription=$_POST['DiveSiteTypeDescription'];
return;
}

#-----------------------Transfer Session Variables to Screen variables---------------------

function GetVariablesFromSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
$DiveSiteTypeId=$_SESSION['DiveSiteTypeId'];
$DiveSiteTypeRank=$_SESSION['DiveSiteTypeRank'];
$DiveSiteTypeDescription=$_SESSION['DiveSiteTypeDescription'];
return;
}

#----------------------------Get Last Database Record-----------------------------------------
function GetLastRecord($conn,$result)
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
for($i=1;$i<=$NumDiveSiteTypeRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteTypeId=$rowdata[0];
$DiveSiteTypeRank=$rowdata[1];
$DiveSiteTypeDescription=$rowdata[2];
}
PutVariablesIntoSession();
return;
}
#----------------------------Common Form-----------------------------------------------------
function CommonForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
global $Mode;
echo stripslashes("
<TABLE border='1' align='center'><tr><td>
<TABLE border='1' align='center' cellspacing='5'>
<tr><th valign='top' align ='left' scope='row'>DiveSiteTypeId</th>
<td><input type ='text' NAME='DiveSiteTypeId' VALUE='$DiveSiteTypeId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteTypeId' READONLY><br /></td>
</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteTypeRank</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteTypeRank' VALUE='$DiveSiteTypeRank'  SIZE='11' MAXLENGTH='11'  tabindex='2' id ='DiveSiteTypeRank' 
   onBlur=\"if(isBlank(this.form.DiveSiteTypeRank.value)) {alert('DiveSiteTypeRank cannot be blank');this.form.DiveSiteTypeRank.style.background='Yellow';}else{this.form.DiveSiteTypeRank.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' NAME='DiveSiteTypeRank' VALUE='$DiveSiteTypeRank'  SIZE='11' MAXLENGTH='11'  tabindex='2' id ='DiveSiteTypeRank' 
   onBlur=\"if(isBlank(this.form.DiveSiteTypeRank.value)) {alert('DiveSiteTypeRank cannot be blank');this.form.DiveSiteTypeRank.style.background='Yellow';}else{this.form.DiveSiteTypeRank.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>DiveSiteTypeDescription</th>
<td><TEXTAREA NAME='DiveSiteTypeDescription' COLS=100 ROW=3 TABINDEX='3'>$DiveSiteTypeDescription</TEXTAREA></td>");
echo stripslashes("</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
");}
#----------------------------Entry Form----------------------------------------------------

function AddForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
global $Mode;
$Mode='ADD';
echo stripslashes("
<FORM NAME='DiveSiteTypeEntry' action='DiveSiteType.php' method='POST'>");
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
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
global $Mode;
$Mode='EDIT';
echo stripslashes("
<FORM NAME='DiveSiteTypeEdit' action='DiveSiteType.php' method='POST'>");
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
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
echo stripslashes("
<FORM NAME='DiveSiteTypeDelete' action='DiveSiteType.php' method='POST'>
<TABLE  align='center' border='1'><tr><td>
<TABLE align='center' border='1' cellspacing='5'>
<tr><th align ='left' valign='top' scope='row'>DiveSiteTypeId</th>
<td><input type ='text' READONLY NAME='DiveSiteTypeId' VALUE='$DiveSiteTypeId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteTypeId' READONLY><br /></td></tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteTypeRank</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteTypeRank' VALUE='$DiveSiteTypeRank'  SIZE='11' MAXLENGTH='11'  tabindex='2' id ='DiveSiteTypeRank' 
   onBlur=\"if(isBlank(this.form.DiveSiteTypeRank.value)) {alert('DiveSiteTypeRank cannot be blank');this.form.DiveSiteTypeRank.style.background='Yellow';}else{this.form.DiveSiteTypeRank.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteTypeRank' VALUE='$DiveSiteTypeRank'  SIZE='11' MAXLENGTH='11'  tabindex='2' id ='DiveSiteTypeRank' 
   onBlur=\"if(isBlank(this.form.DiveSiteTypeRank.value)) {alert('DiveSiteTypeRank cannot be blank');this.form.DiveSiteTypeRank.style.background='Yellow';}else{this.form.DiveSiteTypeRank.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteTypeDescription</th>
<td><TEXTAREA NAME='DiveSiteTypeDescription' READONLY COLS=100 ROW=3 TABINDEX='3'>$DiveSiteTypeDescription</TEXTAREA></td>");
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
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
echo stripslashes("
<FORM NAME='DiveSiteTypeDisplay' action='DiveSiteType.php' method='POST'>
<TABLE  align='center' border='1'><tr><td>
<TABLE align='center' border='1' cellspacing='5'>
<tr><th align ='left' valign='top' scope='row'>DiveSiteTypeId</th>
<td><input type ='text' READONLY NAME='DiveSiteTypeId' VALUE='$DiveSiteTypeId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteTypeId' READONLY><br /></td>
</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteTypeRank</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteTypeRank' VALUE='$DiveSiteTypeRank'  SIZE='11' MAXLENGTH='11'  tabindex='2' id ='DiveSiteTypeRank'><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteTypeRank' VALUE='$DiveSiteTypeRank'  SIZE='11' MAXLENGTH='11'  tabindex='2' id ='DiveSiteTypeRank'><br /></td>");}
echo stripslashes("</tr>
<tr><th align ='left' valign='top' scope='row'>DiveSiteTypeDescription</th>
<td><TEXTAREA NAME='DiveSiteTypeDescription' READONLY COLS=100 ROW=3 TABINDEX='3'>$DiveSiteTypeDescription</TEXTAREA></td>");
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
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
$DiveSiteTypeId='TBD';
$DiveSiteTypeRank='';
$DiveSiteTypeDescription='';
return;
}
#----------------------------Get Next Record in Database -----------------------------------

function Db_Next()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
if($NumDiveSiteTypeRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteType where(DiveSiteTypeRank > '".strip_tags(addslashes($DiveSiteTypeRank))."') order by DiveSiteTypeRank";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteType Select * failure");
$NumDiveSiteTypeRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteTypeRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteTypeId=$rowdata[0];
$DiveSiteTypeRank=$rowdata[1];
$DiveSiteTypeDescription=$rowdata[2];
}
else
{
$sql="select * from DiveSiteType order by DiveSiteTypeRank";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteType Select * failure");
$NumDiveSiteTypeRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteTypeRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteTypeId=$rowdata[0];
$DiveSiteTypeRank=$rowdata[1];
$DiveSiteTypeDescription=$rowdata[2];
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
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
if($NumDiveSiteTypeRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteType where(DiveSiteTypeRank < '".strip_tags(addslashes($DiveSiteTypeRank))."') order by DiveSiteTypeRank";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteType Select * failure");
$NumDiveSiteTypeRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteTypeRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteTypeRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteTypeId=$rowdata[0];
$DiveSiteTypeRank=$rowdata[1];
$DiveSiteTypeDescription=$rowdata[2];
}
}
else
{
$sql="select * from DiveSiteType order by DiveSiteTypeRank";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteType Select * failure");
$NumDiveSiteTypeRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteTypeRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteTypeRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteTypeId=$rowdata[0];
$DiveSiteTypeRank=$rowdata[1];
$DiveSiteTypeDescription=$rowdata[2];
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
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$DiveSiteTypeId=$_SESSION['DiveSiteTypeId'];
$sql="update DiveSiteType SET ";
$sql=$sql."DiveSiteTypeRank='".strip_tags(addslashes($DiveSiteTypeRank))."',";
$sql=$sql."DiveSiteTypeDescription='".strip_tags(addslashes($DiveSiteTypeDescription))."' where DiveSiteTypeId='".$DiveSiteTypeId."'"; 
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteType DATA failure");
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#-----------------------------Print Out Current Form Variables--------------------------

function PrintFormVars()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
OutputMessage('NumDiveSiteTypeRecords: '.$NumDiveSiteTypeRecords);
OutputMessage('DiveSiteTypeId: '.$DiveSiteTypeId);
OutputMessage('DiveSiteTypeRank: '.$DiveSiteTypeRank);
OutputMessage('DiveSiteTypeDescription: '.$DiveSiteTypeDescription);
return;
}
#-----------------------------Database Add Function---------------------------------------

function Db_Add()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="insert into DiveSiteType(DiveSiteTypeRank,DiveSiteTypeDescription) values (";
$sql=$sql."'".strip_tags(addslashes($DiveSiteTypeRank))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteTypeDescription))."')";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteType ADD failure");
$DiveSiteTypeId=mysql_insert_id($connection);
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#----------------------------Database Delete Function------------------------------------

function Db_Delete()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="delete from DiveSiteType where DiveSiteTypeId='".$DiveSiteTypeId."'";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteType DELETE failure");
mysql_close($connection);
return;
}
#-----------------------------Get Current Number of Records -----------------------------

function CurrentNumberRecords()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteType order by DiveSiteTypeRank";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteType GetNumRecs failure");
$NumDiveSiteTypeRecords = mysql_num_rows($result);
mysql_close($connection);
return;
}
#------------------------------Screen Report of Records in Database ---------------------

function ListRecords()
 { 
global $user, $serverhost,$db,$password;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteType order by DiveSiteTypeRank";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteType GetNumRecs failure");
$NumDiveSiteTypeRecords = mysql_num_rows($result);
echo "<form action='DiveSiteType.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSiteTypeId</b></td>";
echo "<td align='center' ><b>DiveSiteTypeRank</b></td>";
echo "<td align='center' ><b>DiveSiteTypeDescription</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteTypeRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
echo "<tr>";
echo "<td align='left'>".$rowdata[0]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[1]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[2]."&nbsp; </td>";
echo "</tr>";
}
echo "<tr><td colspan='3' align='center'><input type ='SUBMIT' NAME='display_button' Value = 'Back to Main'></td></tr>";
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
$sql="select * from DiveSiteType order by DiveSiteTypeRank";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteType GetNumRecs failure");
$NumDiveSiteTypeRecords = mysql_num_rows($result);
mysql_close($connection);
echo "<form name='ListMenu' action='DiveSiteType.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<input type='hidden' name='check' id='check'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSiteTypeId</b></td>";
echo "<td align='center' ><b>DiveSiteTypeRank</b></td>";
echo "<td align='center' ><b>DiveSiteTypeDescription</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteTypeRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
echo "<tr>";
echo "<td align='center'><input type=radio id='SelectRecord' NAME='SelectRecord' VALUE='".$rowdata[0]."' onClick=\"document.forms.ListMenu.display_button.value = 'Display';document.forms.ListMenu.check.value = 'Display';document.forms.ListMenu.submit();\" >&nbsp; </td>";
echo "<td align='left'>".$rowdata[1]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[2]."&nbsp; </td>";
echo "</tr>";
}
echo "<tr><td colspan='3' align='center'>
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
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteType order by DiveSiteTypeRank";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteType InitializeProgram failure");
$NumDiveSiteTypeRecords = mysql_num_rows($result);
if($NumDiveSiteTypeRecords==0)
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
global $NumDiveSiteTypeRecords,$DiveSiteTypeId,$DiveSiteTypeRank,$DiveSiteTypeDescription;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSiteType where(DiveSiteTypeRank ='".strip_tags(addslashes($DiveSiteTypeRank))."') order by DiveSiteTypeRank";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteType Select * failure");
$NumDiveSiteTypeRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteTypeRecordsDesired>0)
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
