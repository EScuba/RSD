<?php /**/ ?><?php

session_start();
require_once('SystemFunctions.php');

unset($_SESSION['DiveSiteFacilitiesIdArray']);
unset($_SESSION['DiveSiteFacilitiesRankArray']);
unset($_SESSION['DiveSiteFacilitiesDescriptionArray']);

unset($DiveSiteFacilitiesIdArray);
unset($DiveSiteFacilitiesRankArray);
unset($DiveSiteFacilitiesDescriptionArray);

function GetCheckBoxRecords(&$NumRecords,&$CheckBoxId,&$CheckBoxRank,&$CheckBoxDescription,$CheckTable,&$CheckField)
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;

$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
# $sql="select * from DiveSiteFacilities where(DiveSiteFacilitiesId = '".strip_tags(addslashes($DesiredRecord))."') order by DiveSiteFacilitiesId";

#--- get table field names--------------------------------------------------------------------------------------------------
$sql="describe ".$CheckTable;
echo('here: '.$sql);
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
   
   echo($CheckField[$i].'<br>');
   $sql=$sql." ".$CheckField[$i];
   if($i != $rows -1) {$sql=$sql.",";}
    
 }

$sql=$sql." from ".$CheckTable." order by ".$CheckField[1];

echo("search: ".$sql);


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

function PutCheckVariablesIntoSession($CheckFieldNames,$CheckId,$CheckRank,$CheckDescription)
 { 


$_SESSION[$CheckFieldNames[0].'Array'] = $CheckId;
$_SESSION[$CheckFieldNames[1].'Array'] = $CheckRank;
$_SESSION[$CheckFieldNames[2].'Array'] = $CheckDescription;

return;
}






echo('<html><head>');
# -- javascript function --- checks to see if check boxes are checked to allow entry into a text field for descriptions ---
# -- elem is the field to be enabled or disabled, checkarray is the array of checkboxes the text field relates to ------
echo('<script type="text/javascript">
var currentEnabled = null;
function enableElement(elem,checkarray) {

var count=checkarray.length;
var wantfield = false;



for(i=0;i<count;i++)
 {
 
 alert(checkarray[i].value + checkarray[i].checked);
 if(checkarray[i].checked == true)
  {
    wantfield=true;
    elem.disabled=false;
    i=count+2;
  }
  else
  {
    wantfield=false;
    elem.disabled=true;
  }
 }  


}
</script>');

echo('</head><body>');
$DisplayColumns=4;


GetCheckBoxRecords($NumDiveSiteFacilitiesRecordsDesired,$DiveSiteFacilitiesIdArray,$DiveSiteFacilitiesRankArray,$DiveSiteFacilitiesDescriptionArray,'DiveSiteFacilities',$DiveSiteFacilityNames);

PutCheckVariablesIntoSession($DiveSiteFacilityNames,$DiveSiteFacilitiesIdArray,$DiveSiteFacilitiesRankArray,$DiveSiteFacilitiesDescriptionArray);




for($i=0;$i<$NumDiveSiteFacilitiesRecordsDesired;$i++)
{
	echo('<br />');
	echo($i.' '. $DiveSiteFacilitiesIdArray[$i]);
	
	echo(' '. $DiveSiteFacilitiesRankArray[$i]);
	
	echo(' '.$DiveSiteFacilitiesDescriptionArray[$i]);
	
}

echo('<form action="FacilityCheckProcess.php" method="post">');
echo('<table>');
$colcount=0;echo('<tr>');
for($i=0;$i<$NumDiveSiteFacilitiesRecordsDesired;$i++)
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
 
 echo('<tr><td><input type="text" name="DiveSiteFacilitiesNotes" disabled="disabled"></td></tr>');
 echo('</table>');

echo('<input type ="submit" name="formSubmit" value="Submit" />'); 
 
 
 echo('</form>');
 echo('</body>');
 echo('</html>');
?>