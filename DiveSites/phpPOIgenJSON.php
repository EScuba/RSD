<?php
session_start();
// require_once('SystemFunctions.php');

$username="kenspon";
$user="kenspon";
$password="Forget01";
$database="divesites";
$db="divesites";
$serverhost="divesites.kenspon.com";


$DesiredDiveSiteId = $_GET["DesiredDiveSite"];

# echo('got: '.$DesiredDiveSiteId);


#------------------------------Pull All POI Records Out ---------------------

function CreateJSON()
 { 
global $user, $serverhost,$db,$password;
global $DesiredDiveSiteId;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSitePOI where DiveSiteId =".$DesiredDiveSiteId;

#echo('sql: '.$sql);

$result = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI GetNumRecs failure");
$NumDiveSitePOIRecords = mysql_num_rows($result);
mysql_close($connection);

if($NumDiveSitePOIRecords !=0)
{
echo('[');

 for($i=1;$i<=$NumDiveSitePOIRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
echo ("{");
echo ('"DiveSitePOIId":"'.$rowdata[0].'",');
#echo "<td align='left'>".$rowdata[1]."&nbsp; </td>";
#echo "<td align='left'>".$rowdata[2]."&nbsp; </td>";
#echo "<td align='left'>".$rowdata[3]."&nbsp; </td>";
#echo "<td align='left'>".$rowdata[4]."&nbsp; </td>";
#echo "<td align='left'>".$rowdata[5]."&nbsp; </td>";
#echo "<td align='left'>".$rowdata[6]."&nbsp; </td>";
echo ('"DiveSiteName":"'.$rowdata[7].'",');
echo ('"DiveSiteMajorName":"'.$rowdata[8].'",');
echo ('"DiveSiteMinorName":"'.$rowdata[9].'",');
echo ('"DiveSiteExactLat":"'.$rowdata[10].'",');
echo ('"DiveSiteExactLong":"'.$rowdata[11].'",');
echo ('"DiveSitePOITitle":"'.$rowdata[12].'",');
echo ('"DiveSitePOIType":"'.$rowdata[13].'",');
echo ('"DiveSitePOILat":"'.$rowdata[14].'",');
echo ('"DiveSitePOILong":"'.$rowdata[15].'",');
#echo "<td align='left'>".$rowdata[16]."&nbsp; </td>";
echo ('"DiveSitePOINotes":"'.$rowdata[17].'"');
#echo "<td align='left'>".$rowdata[18]."&nbsp; </td>";
if($i != $NumDiveSitePOIRecords)
 {
echo ("},");
 }
 else
 {
echo ("}"); 	
 }
}
echo("]");
}

return;
}

#------------  Main Program ------------------------------------
CreateJSON();

?>