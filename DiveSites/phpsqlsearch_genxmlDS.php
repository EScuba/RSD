<?php /**/ ?><?php  
//require("phpsqlsearch_dbinfo.php");

$username="kenspon";
$user="kenspon";
$password="Forget01";
$database="divesites";
$db="divesites";
$serverhost="divesites.kenspon.com";

#$username="kenpon";
#$password="@notherP@ssw0rd";
#$database="aquatreasurequest";
#$serverhost="mysql.aquatreasurequest.com";





$unitArray=array("Feet","Meters"); #--- units for depth etc.
$siteWaterTypeArray=array("Fresh","Salt","Brackish");
$siteTypeArray=array("Shore","Boat");
$siteRatingArray=array("0","1","2","3","4");
$siteLevelArray=array("Open Water","Advanced Open Water","Rescue","Master Diver","Divemaster","Instructor");
$siteDifficultyArray=array("Novice","Intermediate","Advanced");
$siteBottomCompositionArray=array("Silt","Clay","Dirt","Sand","Gravel","Rock","Shells","Reef");
$siteHazardArray=array("Cold","Altitude","Depth","Boats","Lines","Vegetation","Surf","Nets","Current","Wildlife","Submerged Structures");
$siteMonthsArray=array("January","February","March","April","May","June","July","August","September","October","November","December");
$siteTempUnitsArray=array("DEGREESF","DEGREESC");
$siteFacilitiesArray=array("Washrooms","Picnic Shelters","Picnic Tables","Concession Stand","Fire Pits","Toilets","Parking","Telephone","Marked Dive Area","Accommodations");




// Get parameters from URL
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];

// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("DiveSite");
$parnode = $dom->appendChild($node);

// Opens a connection to a mySQL server
$connection=mysql_connect ($serverhost, $username, $password);
if (!$connection) {
  die("Not connected : " . mysql_error());
}

// Set the active mySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ("Can\'t use db : " . mysql_error());
}

// Search the rows in the markers table
// $query = sprintf("SELECT address, name, lat, lng, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < '%s' ORDER BY distance LIMIT 0 , 20",
//  $query = sprintf("SELECT address, name, lat, lng, ( 6371 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < '%s' ORDER BY distance LIMIT 0 , 20",
   $query = sprintf("SELECT DiveSiteId,DiveSiteName,DiveSiteMajorName,DiveSiteMinorName, DiveSiteDifficulty, DiveSiteShoreLat, DiveSiteShoreLong,DiveSiteExactLat,DiveSiteExactLong,DiveSiteType, ( 6371 * acos( cos( radians('%s') ) * cos( radians(DiveSiteExactLat) ) * cos( radians(DiveSiteExactLong) - radians('%s') ) + sin( radians('%s') ) * sin( radians( DiveSiteExactLat ) ) ) ) AS distance FROM DiveSite HAVING distance < '%s' ORDER BY distance",


  mysql_real_escape_string($center_lat),
  mysql_real_escape_string($center_lng),
  mysql_real_escape_string($center_lat),
  mysql_real_escape_string($radius));
$result = mysql_query($query);

if (!$result) {
  die("Invalid query: " . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
	

// convert to actual names required
$DiveSiteDifficulty=$row['DiveSiteDifficulty'];
$Difficulty='';
if(strlen($DiveSiteDifficulty) != 0)
 {
 	  for($i=0;$i < strlen($DiveSiteDifficulty);$i++)
 	    {
 	    	if($DiveSiteDifficulty[$i]=='1'){$Difficulty = $siteDifficultyArray[$i];}
 	    }
 	}
 	else
 	{
 	  $Difficulty='';	
 		
 	}	
 	
$DiveSiteType= $row['DiveSiteType'];
$SiteType='';
if(strlen($DiveSiteType)!=0)
 { 	    	
	 for($i=0;$i< strlen($DiveSiteType); $i++)
	  {
	  	if($DiveSiteType[$i]=='1'){$SiteType=$SiteType.$siteTypeArray[$i].',';}

	 }
	   $SiteType=substr($SiteType,0,strlen($SiteType)-1);   # remove the comma at the end
	} 
	else
	{
		$SiteType='';
	}	 

	
  $node = $dom->createElement("DiveSite");
  $newnode = $parnode->appendChild($node);
 // echo($row['DiveSiteId'].'<br>');

  $newnode->setAttribute("DiveSiteId", $row['DiveSiteId']);
  $newnode->setAttribute("DiveSiteName", $row['DiveSiteName']);
  $newnode->setAttribute("DiveSiteMajorName", $row['DiveSiteMajorName']);
  $newnode->setAttribute("DiveSiteMinorName", $row['DiveSiteMinorName']);
  $newnode->setAttribute("DiveSiteDifficulty", $Difficulty);
  $newnode->setAttribute("DiveSiteShoreLat", $row['DiveSiteShoreLat']);
  $newnode->setAttribute("DiveSiteShoreLong", $row['DiveSiteShoreLong']);
  $newnode->setAttribute("DiveSiteExactLat", $row['DiveSiteExactLat']);
  $newnode->setAttribute("DiveSiteExactLong", $row['DiveSiteExactLong']);
  $newnode->setAttribute("DiveSiteType", $SiteType);
  $newnode->setAttribute("distance", $row['distance']);
  
  
  
  
 

#$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
#$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSitePOI where DiveSiteId =".$row['DiveSiteId'];

#echo('sql: '.$sql);

$result1 = mysql_query($sql,$connection) or die("ERROR!! DiveSitePOI GetNumRecs failure");
$NumDiveSitePOIRecords = mysql_num_rows($result1);

$newnode->setAttribute("NumPOI", $NumDiveSitePOIRecords);
  
  
  

}

mysql_close($connection);







echo $dom->saveXML();
// $dom->save("output.xml");

?>

