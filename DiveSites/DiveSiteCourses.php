<?php
session_start();
require_once('SystemFunctions.php');
//ValidUserForProgram($_SESSION['User'],'DiveSiteCourses.php');

// $Add=$_SESSION['Add'];

// $Edit=$_SESSION['Edit'];

// $Delete=$_SESSION['Delete'];

// $Search=$_SESSION['Search'];

// $Start=$_SESSION['Start'];

// $Expiry=$_SESSION['Expiry'];

 if($_SESSION['DiveSiteId'] =='00000000')
  {
  	 header("Location: EmptyFrame.php");
  	exit();
  }


 if(($_POST['display_button']=='Back')||($_POST['display_button']=='Logout'))
  { 
      header('Location: index.php');
  } 
  
  
  
  
  
$db="divesites";
$table="DiveSiteCourses";
$CallingProgram="index.php";



$coursesArray=array("","Altitude","Drysuit","Peak Performance Buoyancy","Navigation","Orienteering","Deep","Enriched Air","Multilevel (Computer)","Night",
                    "Drift Diver","Equipment","Ice","Wreck Diver","Search and Recovery","Diver Propulsion Vehicle","Cavern","Boat",
                    "Digital Underwater Photography","Underwater Photographer","Videographer",
                    "Naturalist","Project AWARE","Fish Identiication","Coral Reef Conservation",
                    "Rebreather","Emergency Oxygen","Emergency First Response","Public Safety Diver","Sidemount",
                    "Tec 40","Tec 45","Tec 50","Tec Trimix 65","Tec Trimix","Tec Gas Blender","Tec 40 CCR","Tec 60 CCR","Tec 100 CCR","Tec Sidemount",
                    "Distinctive Specialty (See Notes)");



#-------------------------Get a Desired Record -------------------------

function GetLoadDesiredRecord()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
global $DesiredRecord;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSiteCourses where(DiveSiteCourse = '".strip_tags(addslashes($DesiredRecord))."') order by DiveSiteCourse";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteCourses Select * failure");
$NumDiveSiteCoursesRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteCoursesRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteCourse=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteCourseEnteredBy=$rowdata[2];
$DiveSiteCourseDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteCourseTitle=$rowdata[12];
$DiveSiteCourseNoteKeywords=$rowdata[13];
$DiveSiteCourseWhyNotes=$rowdata[14];
$DiveSiteCourseURLFileInfo=$rowdata[15];
}
PutVariablesIntoSession();
return;
}
#-------------------------Transfer Screen to Session Variables--------------------------

function PutVariablesIntoSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
$_SESSION['DiveSiteCourse'] = $DiveSiteCourse;
$_SESSION['DiveSiteId'] = $DiveSiteId;
$_SESSION['DiveSiteCourseEnteredBy'] = $DiveSiteCourseEnteredBy;
$_SESSION['DiveSiteCourseDateEntered'] = $DiveSiteCourseDateEntered;
$_SESSION['DiveSiteCity'] = $DiveSiteCity;
$_SESSION['DiveSiteProvince'] = $DiveSiteProvince;
$_SESSION['DiveSiteCountry'] = $DiveSiteCountry;
$_SESSION['DiveSiteName'] = $DiveSiteName;
$_SESSION['DiveSiteMajorName'] = $DiveSiteMajorName;
$_SESSION['DiveSiteMinorName'] = $DiveSiteMinorName;
$_SESSION['DiveSiteExactLat'] = $DiveSiteExactLat;
$_SESSION['DiveSiteExactLong'] = $DiveSiteExactLong;
$_SESSION['DiveSiteCourseTitle'] = $DiveSiteCourseTitle;
$_SESSION['DiveSiteCourseNoteKeywords'] = $DiveSiteCourseNoteKeywords;
$_SESSION['DiveSiteCourseWhyNotes'] = $DiveSiteCourseWhyNotes;
$_SESSION['DiveSiteCourseURLFileInfo'] = $DiveSiteCourseURLFileInfo;
return;
}

#--------------------Transfer POST to screen variables ----------------------------------

function GetPostVariables()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
$DiveSiteCourse=$_POST['DiveSiteCourse'];
$DiveSiteId=$_POST['DiveSiteId'];
$DiveSiteCourseEnteredBy=$_POST['DiveSiteCourseEnteredBy'];
$DiveSiteCourseDateEntered=$_POST['DiveSiteCourseDateEntered'];
$DiveSiteCity=$_POST['DiveSiteCity'];
$DiveSiteProvince=$_POST['DiveSiteProvince'];
$DiveSiteCountry=$_POST['DiveSiteCountry'];
$DiveSiteName=$_POST['DiveSiteName'];
$DiveSiteMajorName=$_POST['DiveSiteMajorName'];
$DiveSiteMinorName=$_POST['DiveSiteMinorName'];
$DiveSiteExactLat=$_POST['DiveSiteExactLat'];
$DiveSiteExactLong=$_POST['DiveSiteExactLong'];
$DiveSiteCourseTitle=$_POST['DiveSiteCourseTitle'];
$DiveSiteCourseNoteKeywords=$_POST['DiveSiteCourseNoteKeywords'];
$DiveSiteCourseWhyNotes=$_POST['DiveSiteCourseWhyNotes'];
$DiveSiteCourseURLFileInfo=$_POST['DiveSiteCourseURLFileInfo'];
return;
}

#-----------------------Transfer Session Variables to Screen variables---------------------

function GetVariablesFromSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
$DiveSiteCourse=$_SESSION['DiveSiteCourse'];
$DiveSiteId=$_SESSION['DiveSiteId'];
$DiveSiteCourseEnteredBy=$_SESSION['DiveSiteCourseEnteredBy'];
$DiveSiteCourseDateEntered=$_SESSION['DiveSiteCourseDateEntered'];
$DiveSiteCity=$_SESSION['DiveSiteCity'];
$DiveSiteProvince=$_SESSION['DiveSiteProvince'];
$DiveSiteCountry=$_SESSION['DiveSiteCountry'];
$DiveSiteName=$_SESSION['DiveSiteName'];
$DiveSiteMajorName=$_SESSION['DiveSiteMajorName'];
$DiveSiteMinorName=$_SESSION['DiveSiteMinorName'];
$DiveSiteExactLat=$_SESSION['DiveSiteExactLat'];
$DiveSiteExactLong=$_SESSION['DiveSiteExactLong'];
$DiveSiteCourseTitle=$_SESSION['DiveSiteCourseTitle'];
$DiveSiteCourseNoteKeywords=$_SESSION['DiveSiteCourseNoteKeywords'];
$DiveSiteCourseWhyNotes=$_SESSION['DiveSiteCourseWhyNotes'];
$DiveSiteCourseURLFileInfo=$_SESSION['DiveSiteCourseURLFileInfo'];
return;
}


#-----------------------Transfer Common Session Variables to Screen variables---------------------

function GetCommonVariablesFromSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSitePixRecords,$DiveSitePixId,$DiveSiteId,$DiveSitePixEnteredBy,$DiveSitePixDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSitePixTitle,$DIveSitePixType;
global $DiveSitePixNoteKeywords,$DiveSitePixPictureURLFileInfo,$DiveSitePixNotes;


$DiveSiteId=$_SESSION['DiveSiteId'];

$DiveSiteCity=$_SESSION['DiveSiteCity'];
$DiveSiteProvince=$_SESSION['DiveSiteProvince'];
$DiveSiteCountry=$_SESSION['DiveSiteCountry'];
$DiveSiteName=$_SESSION['DiveSiteName'];
$DiveSiteMajorName=$_SESSION['DiveSiteMajorName'];
$DiveSiteMinorName=$_SESSION['DiveSiteMinorName'];
$DiveSiteExactLat=$_SESSION['DiveSiteExactLat'];
$DiveSiteExactLong=$_SESSION['DiveSiteExactLong'];




return;
}


#----------------------------Get Last Database Record-----------------------------------------
function GetLastRecord($conn,$result)
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
for($i=1;$i<=$NumDiveSiteCoursesRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteCourse=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteCourseEnteredBy=$rowdata[2];
$DiveSiteCourseDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteCourseTitle=$rowdata[12];
$DiveSiteCourseNoteKeywords=$rowdata[13];
$DiveSiteCourseWhyNotes=$rowdata[14];
$DiveSiteCourseURLFileInfo=$rowdata[15];
}
PutVariablesIntoSession();
return;
}
#----------------------------Common Form-----------------------------------------------------
function CommonForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
global $Mode;

global $coursesArray;
echo stripslashes("

<input type ='text' NAME='DiveSiteCity' hidden VALUE='$DiveSiteCity'  SIZE='30' MAXLENGTH='30'  tabindex='5' id ='DiveSiteCity'>
<input type ='text' NAME='DiveSiteProvince' hidden VALUE='$DiveSiteProvince'  SIZE='15' MAXLENGTH='15'  tabindex='6' id ='DiveSiteProvince'>
<input type ='text' NAME='DiveSiteCountry' hidden VALUE='$DiveSiteCountry'  SIZE='15' MAXLENGTH='15'  tabindex='7' id ='DiveSiteCountry'>
<input type ='text' NAME='DiveSiteName' hidden VALUE='$DiveSiteName'  SIZE='80' MAXLENGTH='80'  tabindex='8' id ='DiveSiteName'> 
<input type ='text' NAME='DiveSiteMajorName' hidden VALUE='$DiveSiteMajorName'  SIZE='80' MAXLENGTH='80'  tabindex='9' id ='DiveSiteMajorName'> 
<input type ='text' NAME='DiveSiteMinorName' hidden VALUE='$DiveSiteMinorName'  SIZE='80' MAXLENGTH='80'  tabindex='10' id ='DiveSiteMinorName'> 
<input type ='text' NAME='DiveSiteExactLat' hidden VALUE='$DiveSiteExactLat'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='11' id ='DiveSiteExactLat'>
<input type ='text' NAME='DiveSiteExactLong' hidden VALUE='$DiveSiteExactLong'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='12' id ='DiveSiteExactLong'>



<TABLE border='1' align='center'><tr><td>
<TABLE border='1' align='center' cellspacing='5'>


<tr><th valign='top' align ='left' scope='row'>Dive Site Course ID</th>
<td colspan='5'><table><tr>
<td><input type ='text' NAME='DiveSiteCourse' VALUE='$DiveSiteCourse' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteCourse' READONLY><br /></td>
<th valign='top' align ='left' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>");
echo("</table></td></tr>");

echo("<tr><th valign='top' align ='left' scope='row'>Site Course Entered By</th>");
echo("<td colspan='5'><table><tr>");
echo ("<td><input type ='text' NAME='DiveSiteCourseEnteredBy' VALUE='$DiveSiteCourseEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSiteCourseEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSiteCourseEnteredBy.value)) {alert('DiveSiteCourseEnteredBy cannot be blank');this.form.DiveSiteCourseEnteredBy.style.background='Yellow';}else{this.form.DiveSiteCourseEnteredBy.style.background='White';}\"><br /></td>");


echo("<th valign='top' align ='left' scope='row'>Date Entered</th>
<td><input type ='text' NAME='DiveSiteCourseDateEntered' VALUE='$DiveSiteCourseDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteCourseDateEntered' 
   onBlur=\"if(isBlank(this.form.DiveSiteCourseDateEntered.value)) {alert('DiveSiteCourseDateEntered cannot be blank');this.form.DiveSiteCourseDateEntered.style.background='Yellow';}else{this.form.DiveSiteCourseDateEntered.style.background='White';}\">");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteCoursesEdit\'].DiveSiteCourseDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteCoursesEntry\'].DiveSiteCourseDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
echo("</td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");


//echo("<tr><th valign='top' align ='left' scope='row'>DiveSiteCity</th>");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteCity' VALUE='$DiveSiteCity'  SIZE='30' MAXLENGTH='30'  tabindex='5' id ='DiveSiteCity' 
//   onBlur=\"if(isBlank(this.form.DiveSiteCity.value)) {alert('DiveSiteCity cannot be blank');this.form.DiveSiteCity.style.background='Yellow';}else{this.form.DiveSiteCity.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteProvince</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteProvince' VALUE='$DiveSiteProvince'  SIZE='15' MAXLENGTH='15'  tabindex='6' id ='DiveSiteProvince' 
//   onBlur=\"if(isBlank(this.form.DiveSiteProvince.value)) {alert('DiveSiteProvince cannot be blank');this.form.DiveSiteProvince.style.background='Yellow';}else{this.form.DiveSiteProvince.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteCountry</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteCountry' VALUE='$DiveSiteCountry'  SIZE='15' MAXLENGTH='15'  tabindex='7' id ='DiveSiteCountry' 
//   onBlur=\"if(isBlank(this.form.DiveSiteCountry.value)) {alert('DiveSiteCountry cannot be blank');this.form.DiveSiteCountry.style.background='Yellow';}else{this.form.DiveSiteCountry.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteName</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteName' VALUE='$DiveSiteName'  SIZE='80' MAXLENGTH='80'  tabindex='8' id ='DiveSiteName' 
//   onBlur=\"if(isBlank(this.form.DiveSiteName.value)) {alert('DiveSiteName cannot be blank');this.form.DiveSiteName.style.background='Yellow';}else{this.form.DiveSiteName.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteMajorName</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteMajorName' VALUE='$DiveSiteMajorName'  SIZE='80' MAXLENGTH='80'  tabindex='9' id ='DiveSiteMajorName' 
//   onBlur=\"if(isBlank(this.form.DiveSiteMajorName.value)) {alert('DiveSiteMajorName cannot be blank');this.form.DiveSiteMajorName.style.background='Yellow';}else{this.form.DiveSiteMajorName.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteMinorName</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteMinorName' VALUE='$DiveSiteMinorName'  SIZE='80' MAXLENGTH='80'  tabindex='10' id ='DiveSiteMinorName' 
//   onBlur=\"if(isBlank(this.form.DiveSiteMinorName.value)) {alert('DiveSiteMinorName cannot be blank');this.form.DiveSiteMinorName.style.background='Yellow';}else{this.form.DiveSiteMinorName.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteExactLat</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteExactLat' VALUE='$DiveSiteExactLat'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='11' id ='DiveSiteExactLat' 
//   onBlur=\"if(isBlank(this.form.DiveSiteExactLat.value)) {alert('DiveSiteExactLat cannot be blank');this.form.DiveSiteExactLat.style.background='Yellow';}else{this.form.DiveSiteExactLat.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteExactLong</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteExactLong' VALUE='$DiveSiteExactLong'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='12' id ='DiveSiteExactLong' 
//   onBlur=\"if(isBlank(this.form.DiveSiteExactLong.value)) {alert('DiveSiteExactLong cannot be blank');this.form.DiveSiteExactLong.style.background='Yellow';}else{this.form.DiveSiteExactLong.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>");

echo("<tr><th valign='top' align ='left' scope='row'>Select Course</th>");

$array_length = count($coursesArray);
echo('<td>');
echo('<select name="DiveSiteCourseTitle" tabindex=13 id="DiveSiteCourseTitle" VALUE="$DiveSiteCourseTitle">');
for ($i=0;$i<$array_length;$i++)
    {
    	if($Mode=='ADD')
    	 {
           $selopt="";  
       }
       else
       {
       	   if($DiveSiteCourseTitle == $coursesArray[$i]){$selopt="selected";}else{$selopt="";}  
       }      	
echo ('<option value="'.$coursesArray[$i].'" '.$selopt.'>'.$coursesArray[$i].'</option>');
    }
echo('</select>');
echo('</td>');


//echo ("<td><input type ='text' NAME='DiveSiteCourseTitle' VALUE='$DiveSiteCourseTitle'  SIZE='80' MAXLENGTH='80'  tabindex='13' id ='DiveSiteCourseTitle' 
//   onBlur=\"if(isBlank(this.form.DiveSiteCourseTitle.value)) {alert('DiveSiteCourseTitle cannot be blank');this.form.DiveSiteCourseTitle.style.background='Yellow';}else{this.form.DiveSiteCourseTitle.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Course Keywords</th>
<td><TEXTAREA NAME='DiveSiteCourseNoteKeywords' COLS=100 ROW=3 TABINDEX='14'>$DiveSiteCourseNoteKeywords</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Reason for course:</th>
<td><TEXTAREA NAME='DiveSiteCourseWhyNotes' COLS=100 ROW=3 TABINDEX='15'>$DiveSiteCourseWhyNotes</TEXTAREA></td>");
echo stripslashes("</tr>");
//echo("<tr><th valign='top' align ='left' scope='row'>DiveSiteCourseURLFileInfo</th>
//<td><input type='file' NAME='DiveSiteCourseURLFileInfo'  VALUE='$DiveSiteCourseURLFileInfo'  SIZE='150' MAXLENGTH='150'  tabindex='16' id ='DiveSiteCourseURLFileInfo' 
//   onBlur=\"if(isBlank(this.form.DiveSiteCourseURLFileInfo.value)) {alert('DiveSiteCourseURLFileInfo cannot be blank');this.form.DiveSiteCourseURLFileInfo.style.background='Yellow';}else{this.form.DiveSiteCourseURLFileInfo.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>");
echo("<tr></tr><tr></tr><tr></tr>
<tr>
");}
#----------------------------Entry Form----------------------------------------------------

function AddForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
global $Mode;
$Mode='ADD';
echo stripslashes("
<FORM NAME='DiveSiteCoursesEntry' action='DiveSiteCourses.php' method='POST'>");
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
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
global $Mode;
$Mode='EDIT';
echo stripslashes("
<FORM NAME='DiveSiteCoursesEdit' action='DiveSiteCourses.php' method='POST'>");
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
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;

global $coursesArray;
echo stripslashes("
<FORM NAME='DiveSiteCoursesDelete' action='DiveSiteCourses.php' method='POST'>

<input type ='text' NAME='DiveSiteCity' hidden VALUE='$DiveSiteCity'  SIZE='30' MAXLENGTH='30'  tabindex='5' id ='DiveSiteCity'>
<input type ='text' NAME='DiveSiteProvince' hidden VALUE='$DiveSiteProvince'  SIZE='15' MAXLENGTH='15'  tabindex='6' id ='DiveSiteProvince'>
<input type ='text' NAME='DiveSiteCountry' hidden VALUE='$DiveSiteCountry'  SIZE='15' MAXLENGTH='15'  tabindex='7' id ='DiveSiteCountry'>
<input type ='text' NAME='DiveSiteName' hidden VALUE='$DiveSiteName'  SIZE='80' MAXLENGTH='80'  tabindex='8' id ='DiveSiteName'> 
<input type ='text' NAME='DiveSiteMajorName' hidden VALUE='$DiveSiteMajorName'  SIZE='80' MAXLENGTH='80'  tabindex='9' id ='DiveSiteMajorName'> 
<input type ='text' NAME='DiveSiteMinorName' hidden VALUE='$DiveSiteMinorName'  SIZE='80' MAXLENGTH='80'  tabindex='10' id ='DiveSiteMinorName'> 
<input type ='text' NAME='DiveSiteExactLat' hidden VALUE='$DiveSiteExactLat'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='11' id ='DiveSiteExactLat'>
<input type ='text' NAME='DiveSiteExactLong' hidden VALUE='$DiveSiteExactLong'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='12' id ='DiveSiteExactLong'>



<TABLE border='1' align='center'><tr><td>
<TABLE border='1' align='center' cellspacing='5'>

<tr>
<td colspan ='2' align='center'>
<input type ='SUBMIT' NAME='display_button' Value = 'Return'>
<input type ='SUBMIT' NAME='display_button' Value = 'Edit'>
<input type ='SUBMIT' NAME='display_button' Value = 'Delete'>
</td>
</tr>

<tr><th valign='top' align ='left' scope='row'>Dive Site Course ID</th>
<td colspan='5'><table><tr>
<td><input type ='text' READONLY NAME='DiveSiteCourse' VALUE='$DiveSiteCourse' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteCourse' READONLY><br /></td>
<th valign='top' align ='left' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>");
echo("</table></td></tr>");

echo("<tr><th valign='top' align ='left' scope='row'>Site Course Entered By</th>");
echo("<td colspan='5'><table><tr>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteCourseEnteredBy' VALUE='$DiveSiteCourseEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSiteCourseEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSiteCourseEnteredBy.value)) {alert('DiveSiteCourseEnteredBy cannot be blank');this.form.DiveSiteCourseEnteredBy.style.background='Yellow';}else{this.form.DiveSiteCourseEnteredBy.style.background='White';}\"><br /></td>");


echo("<th valign='top' align ='left' scope='row'>Date Entered</th>
<td><input type ='text' READONLY NAME='DiveSiteCourseDateEntered' VALUE='$DiveSiteCourseDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteCourseDateEntered' 
   onBlur=\"if(isBlank(this.form.DiveSiteCourseDateEntered.value)) {alert('DiveSiteCourseDateEntered cannot be blank');this.form.DiveSiteCourseDateEntered.style.background='Yellow';}else{this.form.DiveSiteCourseDateEntered.style.background='White';}\">");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteCoursesEdit\'].DiveSiteCourseDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteCoursesEntry\'].DiveSiteCourseDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
echo("</td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");


//echo("<tr><th valign='top' align ='left' scope='row'>DiveSiteCity</th>");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteCity' VALUE='$DiveSiteCity'  SIZE='30' MAXLENGTH='30'  tabindex='5' id ='DiveSiteCity' 
//   onBlur=\"if(isBlank(this.form.DiveSiteCity.value)) {alert('DiveSiteCity cannot be blank');this.form.DiveSiteCity.style.background='Yellow';}else{this.form.DiveSiteCity.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteProvince</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteProvince' VALUE='$DiveSiteProvince'  SIZE='15' MAXLENGTH='15'  tabindex='6' id ='DiveSiteProvince' 
//   onBlur=\"if(isBlank(this.form.DiveSiteProvince.value)) {alert('DiveSiteProvince cannot be blank');this.form.DiveSiteProvince.style.background='Yellow';}else{this.form.DiveSiteProvince.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteCountry</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteCountry' VALUE='$DiveSiteCountry'  SIZE='15' MAXLENGTH='15'  tabindex='7' id ='DiveSiteCountry' 
//   onBlur=\"if(isBlank(this.form.DiveSiteCountry.value)) {alert('DiveSiteCountry cannot be blank');this.form.DiveSiteCountry.style.background='Yellow';}else{this.form.DiveSiteCountry.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteName</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteName' VALUE='$DiveSiteName'  SIZE='80' MAXLENGTH='80'  tabindex='8' id ='DiveSiteName' 
//   onBlur=\"if(isBlank(this.form.DiveSiteName.value)) {alert('DiveSiteName cannot be blank');this.form.DiveSiteName.style.background='Yellow';}else{this.form.DiveSiteName.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteMajorName</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteMajorName' VALUE='$DiveSiteMajorName'  SIZE='80' MAXLENGTH='80'  tabindex='9' id ='DiveSiteMajorName' 
//   onBlur=\"if(isBlank(this.form.DiveSiteMajorName.value)) {alert('DiveSiteMajorName cannot be blank');this.form.DiveSiteMajorName.style.background='Yellow';}else{this.form.DiveSiteMajorName.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteMinorName</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteMinorName' VALUE='$DiveSiteMinorName'  SIZE='80' MAXLENGTH='80'  tabindex='10' id ='DiveSiteMinorName' 
//   onBlur=\"if(isBlank(this.form.DiveSiteMinorName.value)) {alert('DiveSiteMinorName cannot be blank');this.form.DiveSiteMinorName.style.background='Yellow';}else{this.form.DiveSiteMinorName.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteExactLat</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteExactLat' VALUE='$DiveSiteExactLat'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='11' id ='DiveSiteExactLat' 
//   onBlur=\"if(isBlank(this.form.DiveSiteExactLat.value)) {alert('DiveSiteExactLat cannot be blank');this.form.DiveSiteExactLat.style.background='Yellow';}else{this.form.DiveSiteExactLat.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteExactLong</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteExactLong' VALUE='$DiveSiteExactLong'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='12' id ='DiveSiteExactLong' 
//   onBlur=\"if(isBlank(this.form.DiveSiteExactLong.value)) {alert('DiveSiteExactLong cannot be blank');this.form.DiveSiteExactLong.style.background='Yellow';}else{this.form.DiveSiteExactLong.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>");

echo("<tr><th valign='top' align ='left' scope='row'>Select Course</th>");

$array_length = count($coursesArray);
echo('<td>');
echo('<select DISABLED name="DiveSiteCourseTitle" tabindex=13 id="DiveSiteCourseTitle" VALUE="$DiveSiteCourseTitle">');
for ($i=0;$i<$array_length;$i++)
    {
    	if($DiveSiteCourseTitle == $coursesArray[$i]){$selopt="selected";}else{$selopt="";}  
echo ('<option value="'.$coursesArray[$i].'" '.$selopt.'>'.$coursesArray[$i].'</option>');
    }
echo('</select>');
echo('</td>');


//echo ("<td><input type ='text' NAME='DiveSiteCourseTitle' VALUE='$DiveSiteCourseTitle'  SIZE='80' MAXLENGTH='80'  tabindex='13' id ='DiveSiteCourseTitle' 
//   onBlur=\"if(isBlank(this.form.DiveSiteCourseTitle.value)) {alert('DiveSiteCourseTitle cannot be blank');this.form.DiveSiteCourseTitle.style.background='Yellow';}else{this.form.DiveSiteCourseTitle.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Course Keywords</th>
<td><TEXTAREA READONLY NAME='DiveSiteCourseNoteKeywords' COLS=100 ROW=3 TABINDEX='14'>$DiveSiteCourseNoteKeywords</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Reason for course:</th>
<td><TEXTAREA READONLY NAME='DiveSiteCourseWhyNotes' COLS=100 ROW=3 TABINDEX='15'>$DiveSiteCourseWhyNotes</TEXTAREA></td>");
echo stripslashes("</tr>");
//echo("<tr><th valign='top' align ='left' scope='row'>DiveSiteCourseURLFileInfo</th>
//<td><input type='file' NAME='DiveSiteCourseURLFileInfo'  VALUE='$DiveSiteCourseURLFileInfo'  SIZE='150' MAXLENGTH='150'  tabindex='16' id ='DiveSiteCourseURLFileInfo' 
//   onBlur=\"if(isBlank(this.form.DiveSiteCourseURLFileInfo.value)) {alert('DiveSiteCourseURLFileInfo cannot be blank');this.form.DiveSiteCourseURLFileInfo.style.background='Yellow';}else{this.form.DiveSiteCourseURLFileInfo.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>");
echo("<tr></tr><tr></tr><tr></tr>
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
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;

global $coursesArray;
echo stripslashes("
<FORM NAME='DiveSiteCoursesDisplay' action='DiveSiteCourses.php' method='POST'>
<TABLE border='1' align='center'><tr><td>
<TABLE border='1' align='center' cellspacing='5'>

<input type ='text' NAME='DiveSiteCity' hidden VALUE='$DiveSiteCity'  SIZE='30' MAXLENGTH='30'  tabindex='5' id ='DiveSiteCity'>
<input type ='text' NAME='DiveSiteProvince' hidden VALUE='$DiveSiteProvince'  SIZE='15' MAXLENGTH='15'  tabindex='6' id ='DiveSiteProvince'>
<input type ='text' NAME='DiveSiteCountry' hidden VALUE='$DiveSiteCountry'  SIZE='15' MAXLENGTH='15'  tabindex='7' id ='DiveSiteCountry'>
<input type ='text' NAME='DiveSiteName' hidden VALUE='$DiveSiteName'  SIZE='80' MAXLENGTH='80'  tabindex='8' id ='DiveSiteName'> 
<input type ='text' NAME='DiveSiteMajorName' hidden VALUE='$DiveSiteMajorName'  SIZE='80' MAXLENGTH='80'  tabindex='9' id ='DiveSiteMajorName'> 
<input type ='text' NAME='DiveSiteMinorName' hidden VALUE='$DiveSiteMinorName'  SIZE='80' MAXLENGTH='80'  tabindex='10' id ='DiveSiteMinorName'> 
<input type ='text' NAME='DiveSiteExactLat' hidden VALUE='$DiveSiteExactLat'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='11' id ='DiveSiteExactLat'>
<input type ='text' NAME='DiveSiteExactLong' hidden VALUE='$DiveSiteExactLong'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='12' id ='DiveSiteExactLong'>

<tr>
<td colspan ='2' align='center'>
<input type ='SUBMIT' NAME='display_button' Value = 'Return'>
<input type ='SUBMIT' NAME='display_button' Value = 'Edit'>
<input type ='SUBMIT' NAME='display_button' Value = 'Delete'>
</td>
</tr>

<tr><th valign='top' align ='left' scope='row'>Dive Site Course ID</th>
<td colspan='5'><table><tr>
<td><input type ='text' READONLY NAME='DiveSiteCourse' VALUE='$DiveSiteCourse' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteCourse' READONLY><br /></td>
<th valign='top' align ='left' scope='row'>DiveSiteId</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteId' VALUE='$DiveSiteId'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSiteId' 
   onBlur=\"if(isBlank(this.form.DiveSiteId.value)) {alert('DiveSiteId cannot be blank');this.form.DiveSiteId.style.background='Yellow';}else{this.form.DiveSiteId.style.background='White';}\"><br /></td>");}
echo stripslashes("</tr>");
echo("</table></td></tr>");

echo("<tr><th valign='top' align ='left' scope='row'>Site Course Entered By</th>");
echo("<td colspan='5'><table><tr>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteCourseEnteredBy' VALUE='$DiveSiteCourseEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex='3' id ='DiveSiteCourseEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSiteCourseEnteredBy.value)) {alert('DiveSiteCourseEnteredBy cannot be blank');this.form.DiveSiteCourseEnteredBy.style.background='Yellow';}else{this.form.DiveSiteCourseEnteredBy.style.background='White';}\"><br /></td>");


echo("<th valign='top' align ='left' scope='row'>Date Entered</th>
<td><input type ='text' READONLY NAME='DiveSiteCourseDateEntered' VALUE='$DiveSiteCourseDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex='4' id ='DiveSiteCourseDateEntered' 
   onBlur=\"if(isBlank(this.form.DiveSiteCourseDateEntered.value)) {alert('DiveSiteCourseDateEntered cannot be blank');this.form.DiveSiteCourseDateEntered.style.background='Yellow';}else{this.form.DiveSiteCourseDateEntered.style.background='White';}\">");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteCoursesEdit\'].DiveSiteCourseDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteCoursesEntry\'].DiveSiteCourseDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
echo("</td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");


//echo("<tr><th valign='top' align ='left' scope='row'>DiveSiteCity</th>");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteCity' VALUE='$DiveSiteCity'  SIZE='30' MAXLENGTH='30'  tabindex='5' id ='DiveSiteCity' 
//   onBlur=\"if(isBlank(this.form.DiveSiteCity.value)) {alert('DiveSiteCity cannot be blank');this.form.DiveSiteCity.style.background='Yellow';}else{this.form.DiveSiteCity.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteProvince</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteProvince' VALUE='$DiveSiteProvince'  SIZE='15' MAXLENGTH='15'  tabindex='6' id ='DiveSiteProvince' 
//   onBlur=\"if(isBlank(this.form.DiveSiteProvince.value)) {alert('DiveSiteProvince cannot be blank');this.form.DiveSiteProvince.style.background='Yellow';}else{this.form.DiveSiteProvince.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteCountry</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteCountry' VALUE='$DiveSiteCountry'  SIZE='15' MAXLENGTH='15'  tabindex='7' id ='DiveSiteCountry' 
//   onBlur=\"if(isBlank(this.form.DiveSiteCountry.value)) {alert('DiveSiteCountry cannot be blank');this.form.DiveSiteCountry.style.background='Yellow';}else{this.form.DiveSiteCountry.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteName</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteName' VALUE='$DiveSiteName'  SIZE='80' MAXLENGTH='80'  tabindex='8' id ='DiveSiteName' 
//   onBlur=\"if(isBlank(this.form.DiveSiteName.value)) {alert('DiveSiteName cannot be blank');this.form.DiveSiteName.style.background='Yellow';}else{this.form.DiveSiteName.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteMajorName</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteMajorName' VALUE='$DiveSiteMajorName'  SIZE='80' MAXLENGTH='80'  tabindex='9' id ='DiveSiteMajorName' 
//   onBlur=\"if(isBlank(this.form.DiveSiteMajorName.value)) {alert('DiveSiteMajorName cannot be blank');this.form.DiveSiteMajorName.style.background='Yellow';}else{this.form.DiveSiteMajorName.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteMinorName</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteMinorName' VALUE='$DiveSiteMinorName'  SIZE='80' MAXLENGTH='80'  tabindex='10' id ='DiveSiteMinorName' 
//   onBlur=\"if(isBlank(this.form.DiveSiteMinorName.value)) {alert('DiveSiteMinorName cannot be blank');this.form.DiveSiteMinorName.style.background='Yellow';}else{this.form.DiveSiteMinorName.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteExactLat</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteExactLat' VALUE='$DiveSiteExactLat'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='11' id ='DiveSiteExactLat' 
//   onBlur=\"if(isBlank(this.form.DiveSiteExactLat.value)) {alert('DiveSiteExactLat cannot be blank');this.form.DiveSiteExactLat.style.background='Yellow';}else{this.form.DiveSiteExactLat.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>
//<tr><th valign='top' align ='left' scope='row'>DiveSiteExactLong</th>
//");
//echo ("<td><input type ='text' READONLY NAME='DiveSiteExactLong' VALUE='$DiveSiteExactLong'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='12' id ='DiveSiteExactLong' 
//   onBlur=\"if(isBlank(this.form.DiveSiteExactLong.value)) {alert('DiveSiteExactLong cannot be blank');this.form.DiveSiteExactLong.style.background='Yellow';}else{this.form.DiveSiteExactLong.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>");

echo("<tr><th valign='top' align ='left' scope='row'>Select Course</th>");

$array_length = count($coursesArray);
echo('<td>');
echo('<select DISABLED name="DiveSiteCourseTitle" tabindex=13 id="DiveSiteCourseTitle" VALUE="$DiveSiteCourseTitle">');
for ($i=0;$i<$array_length;$i++)
    {
    	if($DiveSiteCourseTitle == $coursesArray[$i]){$selopt="selected";}else{$selopt="";}  
echo ('<option value="'.$coursesArray[$i].'" '.$selopt.'>'.$coursesArray[$i].'</option>');
    }
echo('</select>');
echo('</td>');


//echo ("<td><input type ='text' NAME='DiveSiteCourseTitle' VALUE='$DiveSiteCourseTitle'  SIZE='80' MAXLENGTH='80'  tabindex='13' id ='DiveSiteCourseTitle' 
//   onBlur=\"if(isBlank(this.form.DiveSiteCourseTitle.value)) {alert('DiveSiteCourseTitle cannot be blank');this.form.DiveSiteCourseTitle.style.background='Yellow';}else{this.form.DiveSiteCourseTitle.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Course Keywords</th>
<td><TEXTAREA READONLY NAME='DiveSiteCourseNoteKeywords' COLS=100 ROW=3 TABINDEX='14'>$DiveSiteCourseNoteKeywords</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Reason for course:</th>
<td><TEXTAREA READONLY NAME='DiveSiteCourseWhyNotes' COLS=100 ROW=3 TABINDEX='15'>$DiveSiteCourseWhyNotes</TEXTAREA></td>");
echo stripslashes("</tr>");
//echo("<tr><th valign='top' align ='left' scope='row'>DiveSiteCourseURLFileInfo</th>
//<td><input type='file' NAME='DiveSiteCourseURLFileInfo'  VALUE='$DiveSiteCourseURLFileInfo'  SIZE='150' MAXLENGTH='150'  tabindex='16' id ='DiveSiteCourseURLFileInfo' 
//   onBlur=\"if(isBlank(this.form.DiveSiteCourseURLFileInfo.value)) {alert('DiveSiteCourseURLFileInfo cannot be blank');this.form.DiveSiteCourseURLFileInfo.style.background='Yellow';}else{this.form.DiveSiteCourseURLFileInfo.style.background='White';}\"><br /></td>");
//echo stripslashes("</tr>");
echo("<tr></tr><tr></tr><tr></tr>
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
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
$DiveSiteCourse='TBD';
$DiveSiteId='';
$DiveSiteCourseEnteredBy='';
$DiveSiteCourseDateEntered='';
$DiveSiteCity='';
$DiveSiteProvince='';
$DiveSiteCountry='';
$DiveSiteName='';
$DiveSiteMajorName='';
$DiveSiteMinorName='';
$DiveSiteExactLat='';
$DiveSiteExactLong='';
$DiveSiteCourseTitle='';
$DiveSiteCourseNoteKeywords='';
$DiveSiteCourseWhyNotes='';
$DiveSiteCourseURLFileInfo='';

GetCommonVariablesFromSession();



return;
}
#----------------------------Get Next Record in Database -----------------------------------

function Db_Next()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
if($NumDiveSiteCoursesRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSiteCourses where(DiveSiteId > '".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteCourses Select * failure");
$NumDiveSiteCoursesRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteCoursesRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteCourse=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteCourseEnteredBy=$rowdata[2];
$DiveSiteCourseDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteCourseTitle=$rowdata[12];
$DiveSiteCourseNoteKeywords=$rowdata[13];
$DiveSiteCourseWhyNotes=$rowdata[14];
$DiveSiteCourseURLFileInfo=$rowdata[15];
}
else
{
$sql="select * from DiveSiteCourses order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteCourses Select * failure");
$NumDiveSiteCoursesRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteCoursesRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteCourse=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteCourseEnteredBy=$rowdata[2];
$DiveSiteCourseDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteCourseTitle=$rowdata[12];
$DiveSiteCourseNoteKeywords=$rowdata[13];
$DiveSiteCourseWhyNotes=$rowdata[14];
$DiveSiteCourseURLFileInfo=$rowdata[15];
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
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
if($NumDiveSiteCoursesRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSiteCourses where(DiveSiteId < '".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteCourses Select * failure");
$NumDiveSiteCoursesRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteCoursesRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteCoursesRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteCourse=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteCourseEnteredBy=$rowdata[2];
$DiveSiteCourseDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteCourseTitle=$rowdata[12];
$DiveSiteCourseNoteKeywords=$rowdata[13];
$DiveSiteCourseWhyNotes=$rowdata[14];
$DiveSiteCourseURLFileInfo=$rowdata[15];
}
}
else
{
$sql="select * from DiveSiteCourses order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteCourses Select * failure");
$NumDiveSiteCoursesRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteCoursesRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteCoursesRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteCourse=$rowdata[0];
$DiveSiteId=$rowdata[1];
$DiveSiteCourseEnteredBy=$rowdata[2];
$DiveSiteCourseDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteExactLat=$rowdata[10];
$DiveSiteExactLong=$rowdata[11];
$DiveSiteCourseTitle=$rowdata[12];
$DiveSiteCourseNoteKeywords=$rowdata[13];
$DiveSiteCourseWhyNotes=$rowdata[14];
$DiveSiteCourseURLFileInfo=$rowdata[15];
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
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$DiveSiteCourse=$_SESSION['DiveSiteCourse'];
$sql="update DiveSiteCourses SET ";
$sql=$sql."DiveSiteId='".strip_tags(addslashes($DiveSiteId))."',";
$sql=$sql."DiveSiteCourseEnteredBy='".strip_tags(addslashes($DiveSiteCourseEnteredBy))."',";
$sql=$sql."DiveSiteCourseDateEntered='".strip_tags(addslashes($DiveSiteCourseDateEntered))."',";
$sql=$sql."DiveSiteCity='".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."DiveSiteProvince='".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."DiveSiteCountry='".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."DiveSiteName='".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."DiveSiteMajorName='".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."DiveSiteMinorName='".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."DiveSiteExactLat='".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."DiveSiteExactLong='".strip_tags(addslashes($DiveSiteExactLong))."',";
$sql=$sql."DiveSiteCourseTitle='".strip_tags(addslashes($DiveSiteCourseTitle))."',";
$sql=$sql."DiveSiteCourseNoteKeywords='".strip_tags(addslashes($DiveSiteCourseNoteKeywords))."',";
$sql=$sql."DiveSiteCourseWhyNotes='".strip_tags(addslashes($DiveSiteCourseWhyNotes))."',";
$sql=$sql."DiveSiteCourseURLFileInfo='".strip_tags(addslashes($DiveSiteCourseURLFileInfo))."' where DiveSiteCourse='".$DiveSiteCourse."'"; 
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteCourses DATA failure");
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#-----------------------------Print Out Current Form Variables--------------------------

function PrintFormVars()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
OutputMessage('NumDiveSiteCoursesRecords: '.$NumDiveSiteCoursesRecords);
OutputMessage('DiveSiteCourse: '.$DiveSiteCourse);
OutputMessage('DiveSiteId: '.$DiveSiteId);
OutputMessage('DiveSiteCourseEnteredBy: '.$DiveSiteCourseEnteredBy);
OutputMessage('DiveSiteCourseDateEntered: '.$DiveSiteCourseDateEntered);
OutputMessage('DiveSiteCity: '.$DiveSiteCity);
OutputMessage('DiveSiteProvince: '.$DiveSiteProvince);
OutputMessage('DiveSiteCountry: '.$DiveSiteCountry);
OutputMessage('DiveSiteName: '.$DiveSiteName);
OutputMessage('DiveSiteMajorName: '.$DiveSiteMajorName);
OutputMessage('DiveSiteMinorName: '.$DiveSiteMinorName);
OutputMessage('DiveSiteExactLat: '.$DiveSiteExactLat);
OutputMessage('DiveSiteExactLong: '.$DiveSiteExactLong);
OutputMessage('DiveSiteCourseTitle: '.$DiveSiteCourseTitle);
OutputMessage('DiveSiteCourseNoteKeywords: '.$DiveSiteCourseNoteKeywords);
OutputMessage('DiveSiteCourseWhyNotes: '.$DiveSiteCourseWhyNotes);
OutputMessage('DiveSiteCourseURLFileInfo: '.$DiveSiteCourseURLFileInfo);
return;
}
#-----------------------------Database Add Function---------------------------------------

function Db_Add()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;


// echo('here at add db: '.$DiveSiteCity.' '.$DiveSiteProvince);

$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="insert into DiveSiteCourses(DiveSiteId,DiveSiteCourseEnteredBy,DiveSiteCourseDateEntered,DiveSiteCity,DiveSiteProvince,DiveSiteCountry,DiveSiteName,DiveSiteMajorName,DiveSiteMinorName,DiveSiteExactLat,DiveSiteExactLong,DiveSiteCourseTitle,DiveSiteCourseNoteKeywords,DiveSiteCourseWhyNotes,DiveSiteCourseURLFileInfo) values (";
$sql=$sql."'".strip_tags(addslashes($DiveSiteId))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCourseEnteredBy))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCourseDateEntered))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLong))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCourseTitle))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCourseNoteKeywords))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCourseWhyNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCourseURLFileInfo))."')";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteCourses ADD failure");
$DiveSiteCourse=mysql_insert_id($connection);

mysql_close($connection);
return;
}
#----------------------------Database Delete Function------------------------------------

function Db_Delete()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="delete from DiveSiteCourses where DiveSiteCourse='".$DiveSiteCourse."'";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteCourses DELETE failure");
mysql_close($connection);
return;
}
#-----------------------------Get Current Number of Records -----------------------------

function CurrentNumberRecords()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSiteCourses order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteCourses GetNumRecs failure");
$NumDiveSiteCoursesRecords = mysql_num_rows($result);
mysql_close($connection);
return;
}
#------------------------------Screen Report of Records in Database ---------------------

function ListRecords()
 { 
global $user, $serverhost,$db,$password;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSiteCourses order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteCourses GetNumRecs failure");
$NumDiveSiteCoursesRecords = mysql_num_rows($result);
echo "<form action='DiveSiteCourses.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSiteCourse</b></td>";
echo "<td align='center' ><b>DiveSiteId</b></td>";
echo "<td align='center' ><b>DiveSiteCourseEnteredBy</b></td>";
echo "<td align='center' ><b>DiveSiteCourseDateEntered</b></td>";
echo "<td align='center' ><b>DiveSiteCity</b></td>";
echo "<td align='center' ><b>DiveSiteProvince</b></td>";
echo "<td align='center' ><b>DiveSiteCountry</b></td>";
echo "<td align='center' ><b>DiveSiteName</b></td>";
echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
echo "<td align='center' ><b>DiveSiteExactLat</b></td>";
echo "<td align='center' ><b>DiveSiteExactLong</b></td>";
echo "<td align='center' ><b>DiveSiteCourseTitle</b></td>";
echo "<td align='center' ><b>DiveSiteCourseNoteKeywords</b></td>";
echo "<td align='center' ><b>DiveSiteCourseWhyNotes</b></td>";
echo "<td align='center' ><b>DiveSiteCourseURLFileInfo</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteCoursesRecords;$i++)
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
echo "</tr>";
}
echo "<tr><td colspan='16' align='center'><input type ='SUBMIT' NAME='display_button' Value = 'Back to Main'></td></tr>";
echo '</table>';
echo '</form>';
mysql_close($connection);
return;
}
#------------------------------List Menu of Records in Database ---------------------

function ListMenu()
 { 
global $user, $serverhost,$db,$password;
global $DiveSiteId;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSiteCourses where(DiveSiteId = '".strip_tags(addslashes($DiveSiteId))."') order by DiveSiteCourse";

$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteCourses GetNumRecs failure");
$NumDiveSiteCoursesRecords = mysql_num_rows($result);
mysql_close($connection);
echo "<form name='ListMenu' action='DiveSiteCourses.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<input type='hidden' name='check' id='check'>";
echo "<tr>";
echo "<td align='center' ><b>Site Course</b></td>";

echo "<td align='center' ><b>Dive Site Id</b></td>";

echo "<td align='center' ><b>Course Entered By</b></td>";
//echo "<td align='center' ><b>DiveSiteCourseDateEntered</b></td>";

//echo "<td align='center' ><b>DiveSiteCity</b></td>";
//echo "<td align='center' ><b>DiveSiteProvince</b></td>";
//echo "<td align='center' ><b>DiveSiteCountry</b></td>";
//echo "<td align='center' ><b>DiveSiteName</b></td>";
//echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
//echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
//echo "<td align='center' ><b>DiveSiteExactLat</b></td>";
//echo "<td align='center' ><b>DiveSiteExactLong</b></td>";

echo "<td align='center' ><b>DiveSiteCourseTitle</b></td>";

echo "<td align='center' ><b>DiveSiteCourseNoteKeywords</b></td>";

echo "<td align='center' ><b>DiveSiteCourseWhyNotes</b></td>";

//echo "<td align='center' ><b>DiveSiteCourseURLFileInfo</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteCoursesRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
echo "<tr>";
echo "<td align='center'><input type=radio id='SelectRecord' NAME='SelectRecord' VALUE='".$rowdata[0]."' onClick=\"document.forms.ListMenu.display_button.value = 'Display';document.forms.ListMenu.check.value = 'Display';document.forms.ListMenu.submit();\" >&nbsp; </td>";
echo "<td align='left'>".$rowdata[1]."&nbsp; </td>";

echo "<td align='left'>".$rowdata[2]."&nbsp;<br>".$rowdata[3]." </td>";
//echo "<td align='left'>".$rowdata[3]."&nbsp; </td>";

//echo "<td align='left'>".$rowdata[4]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[5]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[6]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[7]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[8]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[9]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[10]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[11]."&nbsp; </td>";

echo "<td align='left'>".$rowdata[12]."&nbsp; </td>";

echo "<td align='left'>".$rowdata[13]."&nbsp; </td>";

echo "<td align='left'>".$rowdata[14]."&nbsp; </td>";

//echo "<td align='left'>".$rowdata[15]."&nbsp; </td>";
echo "</tr>";
}
echo "<tr><td colspan='16' align='center'>

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
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSiteCourses order by DiveSiteId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteCourses InitializeProgram failure");
$NumDiveSiteCoursesRecords = mysql_num_rows($result);
if($NumDiveSiteCoursesRecords==0)
{InitializeVariables();}
else
{}

mysql_close($connection);
return;
}
#-------------------------Validate Unique Code ---------------------------------------------

function ValidUniqueCode()

 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSiteCoursesRecords,$DiveSiteCourse,$DiveSiteId,$DiveSiteCourseEnteredBy,$DiveSiteCourseDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteExactLat,$DiveSiteExactLong,$DiveSiteCourseTitle,$DiveSiteCourseNoteKeywords;
global $DiveSiteCourseWhyNotes,$DiveSiteCourseURLFileInfo;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSiteCourses where(DiveSiteId ='".strip_tags(addslashes($DiveSiteId))."' AND DiveSiteCourseTitle ='".strip_tags(addslashes($DiveSiteCourseTitle))."') order by DiveSiteCourse";

$result = mysql_query($sql,$connection) or die("ERROR!! DiveSiteCourses Select * failure");
$NumDiveSiteCoursesRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteCoursesRecordsDesired>0)
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
               GetCommonVariablesFromSession();
//               echo('at add: '.$DiveSiteCity);
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
           
//              echo('before get post: '.$DiveSiteCity.' '.$DiveSiteProvince);
              
               GetPostVariables();
               
               
//             echo('here: '.$DiveSiteCity.' '.$DiveSiteProvince);
              
               
               if(ValidUniqueCode())
                 {  
                 	
                 	
//               echo('here before add db: '.$DiveSiteCity.' '.$DiveSiteProvince);
              
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
         GetCommonVariablesFromSession();
        ListMenu();
       
   }
echo"
</body>
</html>"
?>
