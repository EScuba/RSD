<?php /**/ ?><?php  
//require("phpsqlsearch_dbinfo.php");

$username="kenpon";
$password="@notherP@ssw0rd";
$database="aquatreasurequest";
$serverhost="mysql.aquatreasurequest.com";




// Get parameters from URL
$divesite_lat = $_GET["lat"];
$divesite_lng = $_GET["lng"];







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
//  $query = sprintf("SELECT TreasureTroveCode,TreasureTroveSiteName,TreasureTroveMajorName,TreasureTroveMinorName, TreasureTroveDifficulty, TreasureTroveShoreLat, TreasureTroveShoreLong,TreasureTroveExactLat,TreasureTroveExactLong,TreasureTroveType, ( 6371 * acos( cos( radians('%s') ) * cos( radians(TreasureTroveExactLat) ) * cos( radians(TreasureTroveExactLong) - radians('%s') ) + sin( radians('%s') ) * sin( radians( TreasureTroveExactLat ) ) ) ) AS distance FROM TreasureTrove HAVING distance < '%s' ORDER BY distance",
    $query = sprintf("SELECT DiveSiteExactLat,DiveSiteExactLong,DiveSitePixPictureURLFileInfo, DiveSitePixTitle from DiveSitePix where DiveSiteExactLat=".$divesite_lat." AND DiveSiteExactLong=".$divesite_lng." order by DiveSiteId");
# echo('sql: '.$query);
  mysql_real_escape_string($DiveSiteExactLat);
  mysql_real_escape_string($DiveSiteExactLong);
 

$result = mysql_query($query);

if (!$result) {                                                                                              
  die("Invalid query: " . mysql_error());
}

while ($row = mysql_fetch_row($result))

{
 #echo('<br/>'.$row[2]);
 echo('<br/><img src="../DiveSiteImages/'.$row[2].'" height="30%" alt="Picture one"/><br/>');
 echo('<br/><bold>'.$row[3].'</bold>');
 
}




?>

