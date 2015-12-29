<?php /**/ ?><?php  
//require("phpsqlsearch_dbinfo.php");

$username="kenpon";
$password="@notherP@ssw0rd";
$database="aquatreasurequest";
$serverhost="mysql.aquatreasurequest.com";




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
	

	
	

	
  $node = $dom->createElement("DiveSite");
  $newnode = $parnode->appendChild($node);
 // echo($row['DiveSiteId'].'<br>');

  $newnode->setAttribute("DiveSiteId", $row['DiveSiteId']);
  $newnode->setAttribute("DiveSiteName", $row['DiveSiteName']);
  $newnode->setAttribute("DiveSiteMajorName", $row['DiveSiteMajorName']);
  $newnode->setAttribute("DiveSiteMinorName", $row['DiveSiteMinorName']);
  $newnode->setAttribute("DiveSiteDifficulty", $row['DiveSiteDifficulty']);
  $newnode->setAttribute("DiveSiteShoreLat", $row['DiveSiteShoreLat']);
  $newnode->setAttribute("DiveSiteShoreLong", $row['DiveSiteShoreLong']);
  $newnode->setAttribute("DiveSiteExactLat", $row['DiveSiteExactLat']);
  $newnode->setAttribute("DiveSiteExactLong", $row['DiveSiteExactLong']);
  $newnode->setAttribute("DiveSiteType", $row['DiveSiteType']);
  $newnode->setAttribute("distance", $row['distance']);
  

}









echo $dom->saveXML();
// $dom->save("output.xml");

?>

