<?php /**/ ?><?php
session_start();
require_once('SystemFunctions.php');

$table="DiveSite";
$CallingProgram="index.php";

$_SESSION['DiveSiteId'] = '00000000';  


#----------------- load the array for use with radio/check buttons ----------------------------------------
#------------------caution - changing the order of the items in these arrays will cause data errors -----------------
#------------------these arrays are needed for any program that accesses the database
#------------------all fields for radio/check buttons are stored as a string of 1 and 0 to indicate which options apply to the information in question
#-----------------each array is passed in the variable name from the database ---------------------------------------



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



#------------- for future use -----------------------------------------------------------------

$siteProvinceArray=array("Alberta","British Columbia","Saskatchewan","Manitoba","Ontario","Quebec","Prince Edward Island","New Brunswick","Nova Scotia","Newfoundland","Northwest Territories","Yukon","Nunavut",
"Alabama","Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois","Indiana", "Iowa", "Kansas", "Kentucky", 
"Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana","Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", 
"North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania","Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", 
"Wisconsin", "Wyoming");
$siteCountryArray=array("Canada","United States");
$SiteCityArray=array("Calgary","Red Deer","Banff","Edmonton","Lethbridge","Medecine Hat","Waterton","Jasper","Pincher Creek","Hinton");







#foreach ($_POST as $key => $value)
# echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
	
#print_r($_POST);

#foreach( $_POST as $stuff ) {
#    if( is_array( $stuff ) ) {
#        foreach( $stuff as $thing ) {
#            echo $thing;
#        }
#    } else {
#        echo $stuff;
#    }
#}

#------- try to do myqldump for information ------------------


# exec("mysqldump -h mysql.aquatreasurequest.com -ukenpon -p@notherP@ssw0rd aquatreasurequest >aqdump.sql");


#-------------------------Get a Desired Record -------------------------

function GetLoadDesiredRecord()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;

global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
global $DesiredRecord;

$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesite database - at get load');
$sql="select * from DiveSite where(DiveSiteId = '".strip_tags(addslashes($DesiredRecord))."') order by DiveSiteId";
# echo('sql: '.$sql);
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite Get Load Select * failure");
$NumDiveSiteDesired = mysql_num_rows($result);
# echo('<br> NUM: '.$NumDiveSiteDesired);
mysql_close($connection);
if($NumDiveSiteDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteId=$rowdata[0];
$DiveSiteStatus=$rowdata[1];
$DiveSiteEnteredBy=$rowdata[2];
$DiveSiteDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteRating=$rowdata[10];
$DiveSiteElevation=$rowdata[11];
$DiveSiteElevationUnits=$rowdata[12];
$DiveSiteWater=$rowdata[13];
$DiveSiteDepthMin=$rowdata[14];
$DiveSiteDepthMax=$rowdata[15];
$DiveSiteDepthUnits=$rowdata[16];
$DiveSiteBottomComposition=$rowdata[17];
$DiveSiteHazards=$rowdata[18];
$DiveSiteHazardsNotes=$rowdata[19];
$DiveSiteType=$rowdata[20];
$DiveSiteLevel=$rowdata[21];
$DiveSiteDifficulty=$rowdata[22];
$DiveSiteTideTable=$rowdata[23];
$DiveSiteBestDiveMonths=$rowdata[24];
$DiveSiteTimeRestrictions=$rowdata[25];
$DiveSitePermitRequired=$rowdata[26];
$DiveSiteWinterTemp=$rowdata[27];
$DiveSiteSummerTemp=$rowdata[28];
$DiveSiteFallTemp=$rowdata[29];
$DiveSiteSpringTemp=$rowdata[30];
$DiveSiteTempUnits=$rowdata[31];
$DiveSiteVisibilityMinimum=$rowdata[32];
$DiveSiteVisibilityMaximum=$rowdata[33];
$DiveSiteVisibilityUnits=$rowdata[34];
$DiveSiteFacilities=$rowdata[35];
$DiveSiteFacilitiesNotes=$rowdata[36];
$DiveSiteRecommendationNotes=$rowdata[37];
$DiveSiteNotes=$rowdata[38];
$DiveSiteExactLat=$rowdata[39];
$DiveSiteExactLong=$rowdata[40];
$DiveSiteShoreLat=$rowdata[41];
$DiveSiteShoreLong=$rowdata[42];
$DiveSiteShoreNotes=$rowdata[43];
$DiveSiteWebPage=$rowdata[44];
$DiveSiteBackground=$rowdata[45];
$DiveSiteEAPId=$rowdata[46];

}
PutVariablesIntoSession();
return;
}


function GetCheckBoxRecords(&$NumRecords,&$CheckBoxId,&$CheckBoxRank,&$CheckBoxDescription,$CheckTable,&$CheckField)
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;

$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
# $sql="select * from DiveSiteFacilities where(DiveSiteFacilitiesId = '".strip_tags(addslashes($DesiredRecord))."') order by DiveSiteFacilitiesId";

#--- get table field names--------------------------------------------------------------------------------------------------
$sql="describe ".$CheckTable;
#echo('here: '.$sql);
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
   
#   echo($CheckField[$i].'<br>');
   $sql=$sql." ".$CheckField[$i];
   if($i != $rows -1) {$sql=$sql.",";}
    
 }

$sql=$sql." from ".$CheckTable." order by ".$CheckField[1];

#echo("search: ".$sql);


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

function PutCheckVariablesIntoSession($CheckFieldNames,$CheckId,$CheckRank,$CheckDescription)
 { 


$_SESSION[$CheckFieldNames[0].'Array'] = $CheckId;
$_SESSION[$CheckFieldNames[1].'Array'] = $CheckRank;
$_SESSION[$CheckFieldNames[2].'Array'] = $CheckDescription;

return;
}




#-------------------------Transfer Screen to Session Variables--------------------------

function PutVariablesIntoSession()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
$_SESSION['DiveSiteId'] = $DiveSiteId;
$_SESSION['DiveSiteStatus'] = $DiveSiteStatus;
$_SESSION['DiveSiteEnteredBy'] = $DiveSiteEnteredBy;
$_SESSION['DiveSiteDateEntered'] = $DiveSiteDateEntered;
$_SESSION['DiveSiteCity'] = $DiveSiteCity;
$_SESSION['DiveSiteProvince'] = $DiveSiteProvince;
$_SESSION['DiveSiteCountry'] = $DiveSiteCountry;
$_SESSION['DiveSiteName'] = $DiveSiteName;
$_SESSION['DiveSiteMajorName'] = $DiveSiteMajorName;
$_SESSION['DiveSiteMinorName'] = $DiveSiteMinorName;
$_SESSION['DiveSiteRating'] = $DiveSiteRating;
$_SESSION['DiveSiteElevation'] = $DiveSiteElevation;
$_SESSION['DiveSiteElevationUnits'] = $DiveSiteElevationUnits;
$_SESSION['DiveSiteWater'] = $DiveSiteWater;
$_SESSION['DiveSiteDepthMin'] = $DiveSiteDepthMin;
$_SESSION['DiveSiteDepthMax'] = $DiveSiteDepthMax;
$_SESSION['DiveSiteDepthUnits'] = $DiveSiteDepthUnits;
$_SESSION['DiveSiteBottomComposition'] = $DiveSiteBottomComposition;
$_SESSION['DiveSiteHazards'] = $DiveSiteHazards;
$_SESSION['DiveSiteHazardsNotes'] = $DiveSiteHazardsNotes;
$_SESSION['DiveSiteType'] = $DiveSiteType;
$_SESSION['DiveSiteLevel'] = $DiveSiteLevel;
$_SESSION['DiveSiteDifficulty'] = $DiveSiteDifficulty;
$_SESSION['DiveSiteTideTable'] = $DiveSiteTideTable;
$_SESSION['DiveSiteBestDiveMonths'] = $DiveSiteBestDiveMonths;
$_SESSION['DiveSiteTimeRestrictions'] = $DiveSiteTimeRestrictions;
$_SESSION['DiveSitePermitRequired'] = $DiveSitePermitRequired;
$_SESSION['DiveSiteWinterTemp'] = $DiveSiteWinterTemp;
$_SESSION['DiveSiteSummerTemp'] = $DiveSiteSummerTemp;
$_SESSION['DiveSiteFallTemp'] = $DiveSiteFallTemp;
$_SESSION['DiveSiteSpringTemp'] = $DiveSiteSpringTemp;
$_SESSION['DiveSiteTempUnits'] = $DiveSiteTempUnits;
$_SESSION['DiveSiteVisibilityMinimum'] = $DiveSiteVisibilityMinimum;
$_SESSION['DiveSiteVisibilityMaximum'] = $DiveSiteVisibilityMaximum;
$_SESSION['DiveSiteVisibilityUnits'] = $DiveSiteVisibilityUnits;
$_SESSION['DiveSiteFacilities'] = $DiveSiteFacilities;
$_SESSION['DiveSiteFacilitiesNotes'] = $DiveSiteFacilitiesNotes;
$_SESSION['DiveSiteRecommendationNotes'] = $DiveSiteRecommendationNotes;
$_SESSION['DiveSiteNotes'] = $DiveSiteNotes;
$_SESSION['DiveSiteExactLat'] = $DiveSiteExactLat;
$_SESSION['DiveSiteExactLong'] = $DiveSiteExactLong;
$_SESSION['DiveSiteShoreLat'] = $DiveSiteShoreLat;
$_SESSION['DiveSiteShoreLong'] = $DiveSiteShoreLong;
$_SESSION['DiveSiteShoreNotes'] = $DiveSiteShoreNotes;
$_SESSION['DiveSiteWebPage'] = $DiveSiteWebPage;
$_SESSION['DiveSiteBackground'] = $DiveSiteBackground;
$_SESSION['DiveSiteEAPId'] = $DiveSiteEAPId;
return;
}

#--------------------Transfer POST to screen variables ----------------------------------

function GetPostVariables()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;

global $unitArray,$postElevUnitArray;
global $siteTypeArray, $postSiteTypeArray;
global $siteRatingArray,$postSiteRatingArray;
global $siteLevelArray,$postSiteLevelArray;
global $siteDifficultyArray,$postSiteDifficultyArray;
global $siteWaterTypeArray,$postSiteWaterTypeArray;
global $postSiteDepthUnitsArray;
global $siteBottomCompositionArray,$postSiteBottomCompositionArray;
global $siteHazardArray, $postSiteHazardArray;
global $siteMonthsArray, $postSiteMonthsArray;
global $siteTempUnitsArray, $postSiteTempUnitsArray;
global $postSiteVisibilityUnitsArray;
global $siteFacilitiesArray,$postSiteFacilitiesArray;


$DiveSiteId=$_POST['DiveSiteId'];
$DiveSiteStatus=$_POST['DiveSiteStatus'];
$DiveSiteEnteredBy=$_POST['DiveSiteEnteredBy'];
$DiveSiteDateEntered=$_POST['DiveSiteDateEntered'];
$DiveSiteCity=$_POST['DiveSiteCity'];
$DiveSiteProvince=$_POST['DiveSiteProvince'];
$DiveSiteCountry=$_POST['DiveSiteCountry'];
$DiveSiteName=$_POST['DiveSiteName'];
$DiveSiteMajorName=$_POST['DiveSiteMajorName'];
$DiveSiteMinorName=$_POST['DiveSiteMinorName'];
$DiveSiteRating=$_POST['DiveSiteRating'];
$DiveSiteElevation=$_POST['DiveSiteElevation'];
$DiveSiteElevationUnits=$_POST['DiveSiteElevationUnits'];
$DiveSiteWater=$_POST['DiveSiteWater'];
$DiveSiteDepthMin=$_POST['DiveSiteDepthMin'];
$DiveSiteDepthMax=$_POST['DiveSiteDepthMax'];
$DiveSiteDepthUnits=$_POST['DiveSiteDepthUnits'];
$DiveSiteBottomComposition=$_POST['DiveSiteBottomComposition'];
$DiveSiteHazards=$_POST['DiveSiteHazards'];
$DiveSiteHazardsNotes=$_POST['DiveSiteHazardsNotes'];
$DiveSiteType=$_POST['DiveSiteType'];
$DiveSiteLevel=$_POST['DiveSiteLevel'];
$DiveSiteDifficulty=$_POST['DiveSiteDifficulty'];
$DiveSiteTideTable=$_POST['DiveSiteTideTable'];
$DiveSiteBestDiveMonths=$_POST['DiveSiteBestDiveMonths'];
$DiveSiteTimeRestrictions=$_POST['DiveSiteTimeRestrictions'];
$DiveSitePermitRequired=$_POST['DiveSitePermitRequired'];
$DiveSiteWinterTemp=$_POST['DiveSiteWinterTemp'];
$DiveSiteSummerTemp=$_POST['DiveSiteSummerTemp'];
$DiveSiteFallTemp=$_POST['DiveSiteFallTemp'];
$DiveSiteSpringTemp=$_POST['DiveSiteSpringTemp'];
$DiveSiteTempUnits=$_POST['DiveSiteTempUnits'];
$DiveSiteVisibilityMinimum=$_POST['DiveSiteVisibilityMinimum'];
$DiveSiteVisibilityMaximum=$_POST['DiveSiteVisibilityMaximum'];
$DiveSiteVisibilityUnits=$_POST['DiveSiteVisibilityUnits'];
$DiveSiteFacilities=$_POST['DiveSiteFacilities'];
$DiveSiteFacilitiesNotes=$_POST['DiveSiteFacilitiesNotes'];
$DiveSiteRecommendationNotes=$_POST['DiveSiteRecommendationNotes'];
$DiveSiteNotes=$_POST['DiveSiteNotes'];
$DiveSiteExactLat=$_POST['DiveSiteExactLat'];
$DiveSiteExactLong=$_POST['DiveSiteExactLong'];
$DiveSiteShoreLat=$_POST['DiveSiteShoreLat'];
$DiveSiteShoreLong=$_POST['DiveSiteShoreLong'];
$DiveSiteShoreNotes=$_POST['DiveSiteShoreNotes'];
$DiveSiteWebPage=$_POST['DiveSiteWebPage'];
$DiveSiteBackground=$_POST['DiveSiteBackground'];
$DiveSiteEAPId=$_POST['DiveSiteEAPId'];

# echo('got here at post processing');	

#------Process all of the check boxes ---------------------------------------------

#-----------Dive Site Elevation Units-----------------------------------------------

#-----------Get the post array and process it into two character string in DiveSiteElevation 


if(isset($_POST['SiteElevationUnits'])) {
	 
	 
	 
	 $postElevUnitArray=$_POST['SiteElevationUnits'];
	 
	 
	 
 	
 	$numElementsPosted=count($postElevUnitArray);
 	$numPossibleElements=count($unitArray);
 	
 #	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	

  $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postElevUnitArray[$j] == $unitArray[$i]) {$processArray[$i]='1';}
 	  		
 	  	}	
 	  	
 	  }	
 	  
 	 #-----Process array contains the options chosen, convert to string for passing
#   print_r($postElevUnitArray);    
#   echo('<br>');        # what was returned from POST
# 	 print_r($processArray);  
# 	  echo('<br>');                # what was found to be marked
	
	
	 #----- here will create custom method
	 #-----we know that the process array contains the data we need
	 $createdString='';
	 $numProcessElements = count($processArray);
	 for($i=0;$i < $numProcessElements;$i++)
	    {
	     $createdString=$createdString.$processArray[$i];
	    }
#	echo('<br>created: '.$createdString.'size: '.strlen($createdString)); 
	# ---- so pass the created string for all processing --------
	# ----- commands to turn string back into an array for processing --------
	 $lengthofString=strlen($createdString);
	 for($i=0;$i < $lengthofString; $i++)
	  { $newProcess[$i] = $createdString[$i];}
	  
#	 echo('<br><br>');
#	 print_r($processArray);
#	 echo('<br>');
#	 print_r($newProcess); 
	 
	 
	 $DiveSiteElevationUnits=$createdString;

	 
	
}	



if(isset($_POST['SiteType'])){
	
	
	
	 $postSiteTypeArray=$_POST['SiteType'];
	 
	 	$numElementsPosted=count($postSiteTypeArray);
 	  $numPossibleElements=count($siteTypeArray);
 	
 #	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	

   $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postSiteTypeArray[$j] == $siteTypeArray[$i]) {$processArray[$i]='1';}
 	  		
 	  	}	
 	  	
 	  }	
 	  
 	 #-----Process array contains the options chosen, convert to string for passing
  
	 #-----we know that the process array contains the data we need
	 $createdString='';
	 $numProcessElements = count($processArray);
	 for($i=0;$i < $numProcessElements;$i++)
	    {
	     $createdString=$createdString.$processArray[$i];
	    }
#	echo('<br>created: '.$createdString.'size: '.strlen($createdString)); 
	# ---- so pass the created string for all processing --------
	
	 
	 $DiveSiteType=$createdString;
	 	 
	
}	




if(isset($_POST['SiteRating'])){
#	 echo('got to set ');
	 $postSiteRatingArray=$_POST['SiteRating'];
#	 print_r($postSiteRatingArray);

   	$numElementsPosted=count($postSiteRatingArray);
 	  $numPossibleElements=count($siteRatingArray);
 	
 #	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	

   $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postSiteRatingArray[$j] == $siteRatingArray[$i]) {$processArray[$i]='1';}
 	  		
 	  	}	
 	  	
 	  }	
 	  
 	 #-----Process array contains the options chosen, convert to string for passing
  
	 #-----we know that the process array contains the data we need
	 $createdString='';
	 $numProcessElements = count($processArray);
	 for($i=0;$i < $numProcessElements;$i++)
	    {
	     $createdString=$createdString.$processArray[$i];
	    }
#	echo('<br>created: '.$createdString.'size: '.strlen($createdString)); 
	# ---- so pass the created string for all processing --------
	
	 
	 $DiveSiteRating=$createdString;








}	










if(isset($_POST['SiteLevel'])){
	
	$postSiteLevelArray=$_POST['SiteLevel'];
	
	
	 	$numElementsPosted=count($postSiteLevelArray);
 	  $numPossibleElements=count($siteLevelArray);
 	
 #	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	

   $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postSiteLevelArray[$j] == $siteLevelArray[$i]) {$processArray[$i]='1';}
 	  		
 	  	}	
 	  	
 	  }	
 	  
 	 #-----Process array contains the options chosen, convert to string for passing
  
	 #-----we know that the process array contains the data we need
	 $createdString='';
	 $numProcessElements = count($processArray);
	 for($i=0;$i < $numProcessElements;$i++)
	    {
	     $createdString=$createdString.$processArray[$i];
	    }
#	echo('<br>created: '.$createdString.'size: '.strlen($createdString)); 
	# ---- so pass the created string for all processing --------
	
	 
	 $DiveSiteLevel=$createdString;



	
	
	
	
	
	
	
	
	
	
	
}

if(isset($_POST['SiteDifficulty'])){
	
	$postSiteDifficultyArray=$_POST['SiteDifficulty'];
	
		$numElementsPosted=count($postSiteDifficultyArray);
 	  $numPossibleElements=count($siteDifficultyArray);
 	
 #	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	

   $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postSiteDifficultyArray[$j] == $siteDifficultyArray[$i]) {$processArray[$i]='1';}
 	  		
 	  	}	
 	  	
 	  }	
 	  
 	 #-----Process array contains the options chosen, convert to string for passing
  
	 #-----we know that the process array contains the data we need
	 $createdString='';
	 $numProcessElements = count($processArray);
	 for($i=0;$i < $numProcessElements;$i++)
	    {
	     $createdString=$createdString.$processArray[$i];
	    }
#	echo('<br>created: '.$createdString.'size: '.strlen($createdString)); 
	# ---- so pass the created string for all processing --------
	
	 
	 $DiveSiteDifficulty=$createdString;	
}

if(isset($_POST['SiteWaterType'])){
	
	$postSiteWaterTypeArray=$_POST['SiteWaterType'];
	
    $numElementsPosted=count($postSiteWaterTypeArray);
 	  $numPossibleElements=count($siteWaterTypeArray);
 	
 #	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	

   $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postSiteWaterTypeArray[$j] == $siteWaterTypeArray[$i]) {$processArray[$i]='1';}
 	  		
 	  	}	
 	  	
 	  }	
 	  
 	 #-----Process array contains the options chosen, convert to string for passing
  
	 #-----we know that the process array contains the data we need
	 $createdString='';
	 $numProcessElements = count($processArray);
	 for($i=0;$i < $numProcessElements;$i++)
	    {
	     $createdString=$createdString.$processArray[$i];
	    }
#	echo('<br>created: '.$createdString.'size: '.strlen($createdString)); 
	# ---- so pass the created string for all processing --------
	
	 
	 $DiveSiteWater=$createdString;		
	
	
	
	
	
	
}

if(isset($_POST['SiteDepthUnits'])){
	
	$postSiteDepthUnitsArray=$_POST['SiteDepthUnits'];
	
	   $numElementsPosted=count($postSiteDepthUnitsArray);
 	   $numPossibleElements=count($unitArray);
 	
 #	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	

     $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postSiteDepthUnitsArray[$j] == $unitArray[$i]) {$processArray[$i]='1';}
 	  		
 	  	}	
 	  	
 	  }	
 	  
 	 #-----Process array contains the options chosen, convert to string for passing
  
	 #-----we know that the process array contains the data we need
	 $createdString='';
	 $numProcessElements = count($processArray);
	 for($i=0;$i < $numProcessElements;$i++)
	    {
	     $createdString=$createdString.$processArray[$i];
	    }
#	echo('<br>created: '.$createdString.'size: '.strlen($createdString)); 
	# ---- so pass the created string for all processing --------
	
	 
	 $DiveSiteDepthUnits=$createdString;		
	
	
	
	
	
	
	
	
	
	
}


if(isset($_POST['SiteBottomComposition'])){
	
	$postSiteBottomCompositionArray=$_POST['SiteBottomComposition'];
	
	 $numElementsPosted=count($postSiteBottomCompositionArray);
 	   $numPossibleElements=count($siteBottomCompositionArray);
 	
 #	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	

    $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postSiteBottomCompositionArray[$j] == $siteBottomCompositionArray[$i]) {$processArray[$i]='1';}
 	  		
 	  	}	
 	  	
 	  }	
 	  
 	 #-----Process array contains the options chosen, convert to string for passing
  
	 #-----we know that the process array contains the data we need
	 $createdString='';
	 $numProcessElements = count($processArray);
	 for($i=0;$i < $numProcessElements;$i++)
	    {
	     $createdString=$createdString.$processArray[$i];
	    }
#	echo('<br>created: '.$createdString.'size: '.strlen($createdString)); 
	# ---- so pass the created string for all processing --------
	
	 
	 $DiveSiteBottomComposition=$createdString;		
	
	
}


if(isset($_POST['SiteHazard'])){
	
	  $postSiteHazardArray=$_POST['SiteHazard'];
	
		 $numElementsPosted=count($postSiteHazardArray);
 	   $numPossibleElements=count($siteHazardArray);
 	
 #	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	

    $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postSiteHazardArray[$j] == $siteHazardArray[$i]) {$processArray[$i]='1';}
 	  		
 	  	}	
 	  	
 	  }	
 	  
 	 #-----Process array contains the options chosen, convert to string for passing
  
	 #-----we know that the process array contains the data we need
	 $createdString='';
	 $numProcessElements = count($processArray);
	 for($i=0;$i < $numProcessElements;$i++)
	    {
	     $createdString=$createdString.$processArray[$i];
	    }
#	echo('<br>created: '.$createdString.'size: '.strlen($createdString)); 
	# ---- so pass the created string for all processing --------
	
	 
	 $DiveSiteHazards=$createdString;		
	
	
	
	
	
	
	
	
	
	
}

if(isset($_POST['SiteMonths'])){
	
	$postSiteMonthsArray=$_POST['SiteMonths'];
	
		$numElementsPosted=count($postSiteMonthsArray);
 	  $numPossibleElements=count($siteMonthsArray);
 	
 #	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	

    $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postSiteMonthsArray[$j] == $siteMonthsArray[$i]) {$processArray[$i]='1';}
 	  		
 	  	}	
 	  	
 	  }	
 	  
 	 #-----Process array contains the options chosen, convert to string for passing
  
	 #-----we know that the process array contains the data we need
	 $createdString='';
	 $numProcessElements = count($processArray);
	 for($i=0;$i < $numProcessElements;$i++)
	    {
	     $createdString=$createdString.$processArray[$i];
	    }
#	echo('<br>created: '.$createdString.'size: '.strlen($createdString)); 
	# ---- so pass the created string for all processing --------
	
	 
	 $DiveSiteBestDiveMonths=$createdString;		
	
		
	
}

if(isset($_POST['SiteTempUnits'])){
	
	$postSiteTempUnitsArray=$_POST['SiteTempUnits'];
	
	$numElementsPosted=count($postSiteTempUnitsArray);
 	  $numPossibleElements=count($siteTempUnitsArray);
 	
 #	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	

    $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postSiteTempUnitsArray[$j] == $siteTempUnitsArray[$i]) {$processArray[$i]='1';}
 	  		
 	  	}	
 	  	
 	  }	
 	  
 	 #-----Process array contains the options chosen, convert to string for passing
  
	 #-----we know that the process array contains the data we need
	 $createdString='';
	 $numProcessElements = count($processArray);
	 for($i=0;$i < $numProcessElements;$i++)
	    {
	     $createdString=$createdString.$processArray[$i];
	    }
#	echo('<br>created: '.$createdString.'size: '.strlen($createdString)); 
	# ---- so pass the created string for all processing --------
	
	 
	 $DiveSiteTempUnits=$createdString;			
	
	
	
	
	
	
	
	
	
	
}

if(isset($_POST['SiteVisibilityUnits'])){
	
	$postSiteVisibilityUnitsArray=$_POST['SiteVisibilityUnits'];
	
	
	$numElementsPosted=count($postSiteVisibilityUnitsArray);
 	  $numPossibleElements=count($unitArray);
 	
#	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	
#   echo('<br>');
#   print_r($postSiteVisibilityUnitsArray);
 
 
    $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postSiteVisibilityUnitsArray[$j] == $unitArray[$i]) {$processArray[$i]='1';}
 	  		
 	  	}	
 	  	
 	  }	
 	  
 	 #-----Process array contains the options chosen, convert to string for passing
  
	 #-----we know that the process array contains the data we need
	 $createdString='';
	 $numProcessElements = count($processArray);
	 for($i=0;$i < $numProcessElements;$i++)
	    {
	     $createdString=$createdString.$processArray[$i];
	    }
	#    	echo('<br>created: '.$createdString.'size: '.strlen($createdString)); 
	# ---- so pass the created string for all processing --------
	
	 
	 $DiveSiteVisibilityUnits=$createdString;			
	
	
	
	
	
	
	
	
}

if(isset($_POST['SiteFacilities'])){
	
	$postSiteFacilitiesArray=$_POST['SiteFacilities'];
	
		
    $numElementsPosted=count($postSiteFacilitiesArray);
 	  $numPossibleElements=count($siteFacilitiesArray);
 	
#	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	
#   echo('<br>');
#   print_r($postSiteVisibilityUnitsArray);
 
 
   $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postSiteFacilitiesArray[$j] == $siteFacilitiesArray[$i]) {$processArray[$i]='1';}
 	  		
 	  	}	
 	  	
 	  }	
 	  
 	 #-----Process array contains the options chosen, convert to string for passing
  
	 #-----we know that the process array contains the data we need
	 $createdString='';
	 $numProcessElements = count($processArray);
	 for($i=0;$i < $numProcessElements;$i++)
	    {
	     $createdString=$createdString.$processArray[$i];
	    }
	#    	echo('<br>created: '.$createdString.'size: '.strlen($createdString)); 
	# ---- so pass the created string for all processing --------
	
	 
	 $DiveSiteFacilities=$createdString;	
	
	
	
	
	
	
	
}





return;
}

#-----------------------Transfer Session Variables to Screen variables---------------------

function GetVariablesFromSession()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
$DiveSiteId=$_SESSION['DiveSiteId'];
$DiveSiteStatus=$_SESSION['DiveSiteStatus'];
$DiveSiteEnteredBy=$_SESSION['DiveSiteEnteredBy'];
$DiveSiteDateEntered=$_SESSION['DiveSiteDateEntered'];
$DiveSiteCity=$_SESSION['DiveSiteCity'];
$DiveSiteProvince=$_SESSION['DiveSiteProvince'];
$DiveSiteCountry=$_SESSION['DiveSiteCountry'];
$DiveSiteName=$_SESSION['DiveSiteName'];
$DiveSiteMajorName=$_SESSION['DiveSiteMajorName'];
$DiveSiteMinorName=$_SESSION['DiveSiteMinorName'];
$DiveSiteRating=$_SESSION['DiveSiteRating'];
$DiveSiteElevation=$_SESSION['DiveSiteElevation'];
$DiveSiteElevationUnits=$_SESSION['DiveSiteElevationUnits'];
$DiveSiteWater=$_SESSION['DiveSiteWater'];
$DiveSiteDepthMin=$_SESSION['DiveSiteDepthMin'];
$DiveSiteDepthMax=$_SESSION['DiveSiteDepthMax'];
$DiveSiteDepthUnits=$_SESSION['DiveSiteDepthUnits'];
$DiveSiteBottomComposition=$_SESSION['DiveSiteBottomComposition'];
$DiveSiteHazards=$_SESSION['DiveSiteHazards'];
$DiveSiteHazardsNotes=$_SESSION['DiveSiteHazardsNotes'];
$DiveSiteType=$_SESSION['DiveSiteType'];
$DiveSiteLevel=$_SESSION['DiveSiteLevel'];
$DiveSiteDifficulty=$_SESSION['DiveSiteDifficulty'];
$DiveSiteTideTable=$_SESSION['DiveSiteTideTable'];
$DiveSiteBestDiveMonths=$_SESSION['DiveSiteBestDiveMonths'];
$DiveSiteTimeRestrictions=$_SESSION['DiveSiteTimeRestrictions'];
$DiveSitePermitRequired=$_SESSION['DiveSitePermitRequired'];
$DiveSiteWinterTemp=$_SESSION['DiveSiteWinterTemp'];
$DiveSiteSummerTemp=$_SESSION['DiveSiteSummerTemp'];
$DiveSiteFallTemp=$_SESSION['DiveSiteFallTemp'];
$DiveSiteSpringTemp=$_SESSION['DiveSiteSpringTemp'];
$DiveSiteTempUnits=$_SESSION['DiveSiteTempUnits'];
$DiveSiteVisibilityMinimum=$_SESSION['DiveSiteVisibilityMinimum'];
$DiveSiteVisibilityMaximum=$_SESSION['DiveSiteVisibilityMaximum'];
$DiveSiteVisibilityUnits=$_SESSION['DiveSiteVisibilityUnits'];
$DiveSiteFacilities=$_SESSION['DiveSiteFacilities'];
$DiveSiteFacilitiesNotes=$_SESSION['DiveSiteFacilitiesNotes'];
$DiveSiteRecommendationNotes=$_SESSION['DiveSiteRecommendationNotes'];
$DiveSiteNotes=$_SESSION['DiveSiteNotes'];
$DiveSiteExactLat=$_SESSION['DiveSiteExactLat'];
$DiveSiteExactLong=$_SESSION['DiveSiteExactLong'];
$DiveSiteShoreLat=$_SESSION['DiveSiteShoreLat'];
$DiveSiteShoreLong=$_SESSION['DiveSiteShoreLong'];
$DiveSiteShoreNotes=$_SESSION['DiveSiteShoreNotes'];
$DiveSiteWebPage=$_SESSION['DiveSiteWebPage'];
$DiveSiteBackground=$_SESSION['DiveSiteBackground'];
$DiveSiteEAPId=$_SESSION['DiveSiteEAPId'];
return;
}

#----------------------------Get Last Database Record-----------------------------------------
function GetLastRecord($conn,$result)
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
for($i=1;$i<=$NumDiveSiteRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteId=$rowdata[0];
$DiveSiteStatus=$rowdata[1];
$DiveSiteEnteredBy=$rowdata[2];
$DiveSiteDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteRating=$rowdata[10];
$DiveSiteElevation=$rowdata[11];
$DiveSiteElevationUnits=$rowdata[12];
$DiveSiteWater=$rowdata[13];
$DiveSiteDepthMin=$rowdata[14];
$DiveSiteDepthMax=$rowdata[15];
$DiveSiteDepthUnits=$rowdata[16];
$DiveSiteBottomComposition=$rowdata[17];
$DiveSiteHazards=$rowdata[18];
$DiveSiteHazardsNotes=$rowdata[19];
$DiveSiteType=$rowdata[20];
$DiveSiteLevel=$rowdata[21];
$DiveSiteDifficulty=$rowdata[22];
$DiveSiteTideTable=$rowdata[23];
$DiveSiteBestDiveMonths=$rowdata[24];
$DiveSiteTimeRestrictions=$rowdata[25];
$DiveSitePermitRequired=$rowdata[26];
$DiveSiteWinterTemp=$rowdata[27];
$DiveSiteSummerTemp=$rowdata[28];
$DiveSiteFallTemp=$rowdata[29];
$DiveSiteSpringTemp=$rowdata[30];
$DiveSiteTempUnits=$rowdata[31];
$DiveSiteVisibilityMinimum=$rowdata[32];
$DiveSiteVisibilityMaximum=$rowdata[33];
$DiveSiteVisibilityUnits=$rowdata[34];
$DiveSiteFacilities=$rowdata[35];
$DiveSiteFacilitiesNotes=$rowdata[36];
$DiveSiteRecommendationNotes=$rowdata[37];
$DiveSiteNotes=$rowdata[38];
$DiveSiteExactLat=$rowdata[39];
$DiveSiteExactLong=$rowdata[40];
$DiveSiteShoreLat=$rowdata[41];
$DiveSiteShoreLong=$rowdata[42];
$DiveSiteShoreNotes=$rowdata[43];
$DiveSiteWebPage=$rowdata[44];
$DiveSiteBackground=$rowdata[45];
$DiveSiteEAPId=$rowdata[46];
}
PutVariablesIntoSession();
return;
}
#----------------------------Common Form-----------------------------------------------------
function CommonForm ()  {
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
global $Mode;

global $unitArray,$postElevUnitArray;
global $siteTypeArray, $postSiteTypeArray;
global $siteRatingArray,$postSiteRatingArray;
global $siteLevelArray,$postSiteLevelArray;
global $siteDifficultyArray,$postSiteDifficultyArray;
global $siteWaterTypeArray,$postSiteWaterTypeArray;
global $postSiteDepthUnitsArray;
global $siteBottomCompositionArray,$postSiteBottomCompositionArray;
global $siteHazardArray, $postSiteHazardArray;
global $siteMonthsArray, $postSiteMonthsArray;
global $siteTempUnitsArray, $postSiteTempUnitsArray;
global $postSiteVisibilityUnitsArray;
global $siteFacilitiesArray,$postSiteFacilitiesArray;
global $siteProvinceArray,$siteCountryArray;


echo stripslashes("
<TABLE border='1' align='center'><tr><td>
<TABLE cellspacing='5'><tr style='outline: thin solid'><th bgcolor='#faa0f2' colspan=\"8\">Where is the Site?</th></tr>


<tr><th valign='top' align ='left' scope='row'>Site Information</th>
<td colspan=\"7\"><table><tr>
<th valign='top' align ='left' scope='row'>System Id&nbsp;&nbsp;&nbsp;</th>
<td><input type ='text' NAME='DiveSiteId' VALUE='$DiveSiteId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteId' READONLY><br></td><th valign='top' align ='left' scope='row'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;System Status&nbsp;</th>"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteStatus' VALUE='$DiveSiteStatus'  SIZE='10' MAXLENGTH='10'  tabindex=2 id ='DiveSiteStatus' 
   onBlur=\"if(isBlank(this.form.DiveSiteStatus.value)) {alert('DiveSiteStatus cannot be blank');this.form.DiveSiteStatus.style.background='Yellow';}else{this.form.DiveSiteStatus.style.background='White';}\"><br></td>");}
else 
{echo ("<td><input type ='text' NAME='DiveSiteStatus' VALUE='$DiveSiteStatus'  SIZE='10' MAXLENGTH='10'  tabindex=2 id ='DiveSiteStatus' 
   onBlur=\"if(isBlank(this.form.DiveSiteStatus.value)) {alert('DiveSiteStatus cannot be blank');this.form.DiveSiteStatus.style.background='Yellow';}else{this.form.DiveSiteStatus.style.background='White';}\"><br></td>");}
echo stripslashes("</tr>");
echo("</tr></table></td>");

echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Information Source</th>");
echo stripslashes("<td colspan=\"7\"><table><tr>");
echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Entered By</th>");
echo ("<td><input type ='text' NAME='DiveSiteEnteredBy' VALUE='$DiveSiteEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex=3 id ='DiveSiteEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSiteEnteredBy.value)) {alert('DiveSiteEnteredBy cannot be blank');this.form.DiveSiteEnteredBy.style.background='Yellow';}else{this.form.DiveSiteEnteredBy.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Date Entered&nbsp;&nbsp;</th>
<td colspan='3'><input type ='text' NAME='DiveSiteDateEntered' VALUE='$DiveSiteDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex=4 id ='DiveSiteDateEntered' 
   onBlur=\"if(isBlank(this.form.DiveSiteDateEntered.value)) {alert('DiveSiteDateEntered cannot be blank');this.form.DiveSiteDateEntered.style.background='Yellow';}else{this.form.DiveSiteDateEntered.style.background='White';}\">");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteEdit\'].DiveSiteDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteEntry\'].DiveSiteDateEntered,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
echo("</td>");
echo stripslashes("</tr>");
echo("</tr></table></td>");

echo("<tr><th valign='top' align ='left' scope='row'>Closest City</th>");
echo("<td colspan=\"7\"><table><tr>");
echo stripslashes("<th valign='top' align ='left' scope='row'>City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>");
echo ("<td><input type ='text' NAME='DiveSiteCity' VALUE='$DiveSiteCity'  SIZE='30' MAXLENGTH='30'  tabindex=5 id ='DiveSiteCity' 
   onBlur=\"if(isBlank(this.form.DiveSiteCity.value)) {alert('DiveSiteCity cannot be blank');this.form.DiveSiteCity.style.background='Yellow';}else{this.form.DiveSiteCity.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Province&nbsp;</th>");



$array_length = count($siteProvinceArray);
echo('<td>');
echo('<select name="DiveSiteProvince" tabindex=6 id="DiveSiteProvince" VALUE="$DiveSiteProvince">');
for ($i=0;$i<$array_length;$i++)
    {
    	if($Mode=='ADD')
    	 {
           if($siteProvinceArray == 'Alberta'){$selopt="selected";}else{$selopt="";}  
       }
       else
       {
       	   if($DiveSiteProvince == $siteProvinceArray[$i]){$selopt="selected";}else{$selopt="";}  
       }      	
echo ('<option value="'.$siteProvinceArray[$i].'" '.$selopt.'>'.$siteProvinceArray[$i].'</option>');
    }
echo('</select>');
echo('</td>');





#echo ("<td><input type ='text' NAME='DiveSiteProvince' VALUE='$DiveSiteProvince'  SIZE='15' MAXLENGTH='15'  tabindex=6 id ='DiveSiteProvince' 
#   onBlur=\"if(isBlank(this.form.DiveSiteProvince.value)) {alert('DiveSiteProvince cannot be #blank');this.form.DiveSiteProvince.style.background='Yellow';}else{this.form.DiveSiteProvince.style.background='White';}\"><br></td>");

echo stripslashes("<th valign='top' align ='left' scope='row'>Country</th>
");


$array_length = count($siteCountryArray);
echo('<td>');
echo('<select name="DiveSiteCountry" tabindex=6 id="DiveSiteProvince" VALUE="$DiveSiteCountry">');
for ($i=0;$i<$array_length;$i++)
    {
    	if($Mode=='ADD')
    	 {
           if($siteCountryArray == 'Alberta'){$selopt="selected";}else{$selopt="";}  
       }
       else
       {
       	   if($DiveSiteCountry == $siteCountryArray[$i]){$selopt="selected";}else{$selopt="";}  
       }      	
echo ('<option value="'.$siteCountryArray[$i].'" '.$selopt.'>'.$siteCountryArray[$i].'</option>');
    }
echo('</select>');
echo('</td>');








#echo ("<td><input type ='text' NAME='DiveSiteCountry' VALUE='$DiveSiteCountry'  SIZE='15' MAXLENGTH='15'  tabindex=7 id ='DiveSiteCountry' 
#   onBlur=\"if(isBlank(this.form.DiveSiteCountry.value)) {alert('DiveSiteCountry cannot be #blank');this.form.DiveSiteCountry.style.background='Yellow';}else{this.form.DiveSiteCountry.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");
echo("</tr></table></td>");






echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Site Name</th>
");
echo ("<td><input type ='text' NAME='DiveSiteName' VALUE='$DiveSiteName'  SIZE='80' MAXLENGTH='80'  tabindex=8 id ='DiveSiteName' 
   onBlur=\"if(isBlank(this.form.DiveSiteName.value)) {alert('DiveSiteName cannot be blank');this.form.DiveSiteName.style.background='Yellow';}else{this.form.DiveSiteName.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Major Site</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMajorName' VALUE='$DiveSiteMajorName'  SIZE='80' MAXLENGTH='80'  tabindex=9 id ='DiveSiteMajorName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMajorName.value)) {alert('DiveSiteMajorName cannot be blank');this.form.DiveSiteMajorName.style.background='Yellow';}else{this.form.DiveSiteMajorName.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Minor Site</th>
");
echo ("<td><input type ='text' NAME='DiveSiteMinorName' VALUE='$DiveSiteMinorName'  SIZE='80' MAXLENGTH='80'  tabindex=10 id ='DiveSiteMinorName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMinorName.value)) {alert('DiveSiteMinorName cannot be blank');this.form.DiveSiteMinorName.style.background='Yellow';}else{this.form.DiveSiteMinorName.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");



echo stripslashes("<tr><td>Site Location</td><td colspan=\"7\"> <table>");
echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Latitude</th>
");
echo ("<td><input type ='text' NAME='DiveSiteExactLat' VALUE='$DiveSiteExactLat'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=11 id ='DiveSiteExactLat' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLat.value)) {alert('DiveSiteExactLat cannot be blank');this.form.DiveSiteExactLat.style.background='Yellow';}else{this.form.DiveSiteExactLat.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Longitude</th>");
echo ("<td><input type ='text' NAME='DiveSiteExactLong' VALUE='$DiveSiteExactLong'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=12 id ='DiveSiteExactLong' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLong.value)) {alert('DiveSiteExactLong cannot be blank');this.form.DiveSiteExactLong.style.background='Yellow';}else{this.form.DiveSiteExactLong.style.background='White';}\"><br></td>");
echo stripslashes("</table></td></tr>");   
   
   
echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Dive Site Notes</th>
<td><TEXTAREA NAME='DiveSiteNotes' COLS=100 ROW=3 TABINDEX=13>$DiveSiteNotes</TEXTAREA></td>");
echo stripslashes("</tr>");

echo stripslashes("<tr><td>Parking Location</td><td colspan=\"7\"> <table>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Latitude</th>");
echo ("<td><input type ='text' NAME='DiveSiteShoreLat' VALUE='$DiveSiteShoreLat'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=14 id ='DiveSiteShoreLat' 
   onBlur=\"if(isBlank(this.form.DiveSiteShoreLat.value)) {alert('DiveSiteShoreLat cannot be blank');this.form.DiveSiteShoreLat.style.background='Yellow';}else{this.form.DiveSiteShoreLat.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Longitude</th>");
echo ("<td><input type ='text' NAME='DiveSiteShoreLong' VALUE='$DiveSiteShoreLong'  SIZE='10,6' MAXLENGTH='10,6'  tabindex=15 id ='DiveSiteShoreLong' 
   onBlur=\"if(isBlank(this.form.DiveSiteShoreLong.value)) {alert('DiveSiteShoreLong cannot be blank');this.form.DiveSiteShoreLong.style.background='Yellow';}else{this.form.DiveSiteShoreLong.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");
echo stripslashes("</table></td></tr>"); 

echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Parking Notes</th>
<td><TEXTAREA NAME='DiveSiteShoreNotes' COLS=100 ROW=3 TABINDEX=16>$DiveSiteShoreNotes</TEXTAREA></td>");
echo stripslashes("</tr>");

echo stripslashes("<tr style='outline: thin solid'><th bgcolor='#faa0f2' colspan=\"8\">Site Diving Information</th></tr>");

echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Altitude</th>");
echo stripslashes("<td colspan='7'><table>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Elevation</th>");
echo ("<td><input type ='text' NAME='DiveSiteElevation' VALUE='$DiveSiteElevation'  SIZE='11' MAXLENGTH='11'  tabindex=17 id ='DiveSiteElevation' 
   onBlur=\"if(isBlank(this.form.DiveSiteElevation.value)) {alert('DiveSiteElevation cannot be blank');this.form.DiveSiteElevation.style.background='Yellow';}else{this.form.DiveSiteElevation.style.background='White';}\"><br></td>");

echo stripslashes("<th valign='top' align ='left' scope='row'></th>");

echo stripslashes("<td><table><tr>");

   $tabcount=17;
	 $numPossibleElements = count($unitArray);
	
if(strlen($DiveSiteElevationUnits) != 0)
 {
 	
 
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSiteElevationUnits[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' name='SiteElevationUnits[]' value='".$unitArray[$i]."'tabindex=".$tabcount." ".$state.">".$unitArray[$i]."</td>");
 	  }	
 	  	  	
 	}
 	
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($unitArray[$i] == 'Feet') {$state='checked';} else {$state='';}
          
          echo stripslashes("<td><input type= 'radio' name='SiteElevationUnits[]' value='".$unitArray[$i]."'tabindex=".$tabcount." ".$state.">".$unitArray[$i]."</td>");

       }
 }
 



#echo ("<td><input type ='text' NAME='DiveSiteElevationUnits' VALUE='$DiveSiteElevationUnits'  SIZE='5' MAXLENGTH='5'  tabindex=13 id ='DiveSiteElevationUnits' 
#   onBlur=\"if(isBlank(this.form.DiveSiteElevationUnits.value)) {alert('DiveSiteElevationUnits cannot be #blank');this.form.DiveSiteElevationUnits.style.background='Yellow';}else{this.form.DiveSiteElevationUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr></table></td>");   
echo stripslashes("</tr>");
echo stripslashes("</td></table>");



echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Type of Site</th>");
echo stripslashes("<td colspan='7'><table>");

$tabcount=19;
	$numPossibleElements = count($siteTypeArray);
	
	
	
if(strlen($DiveSiteType)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSiteType[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'checkbox' name='SiteType[]' value='".$siteTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteTypeArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($siteTypeArray[$i] == 'Shore') {$state='checked';} else {$state='';}
          
          echo stripslashes("<td><input type= 'checkbox' name='SiteType[]' value='".$siteTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteTypeArray[$i]."</td>");

       }
}


















#echo stripslashes("<td><input type= 'checkbox' name='SiteType[]' value='Shore' tabindex=20>Shore</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteType[]' value='Boat' tabindex=21>Boat</td>");
#echo ("<td><input type ='text' NAME='DiveSiteType' VALUE='$DiveSiteType'  SIZE='100' MAXLENGTH='100'  tabindex=21 id ='DiveSiteType' 
#   onBlur=\"if(isBlank(this.form.DiveSiteType.value)) {alert('DiveSiteType cannot be #blank');this.form.DiveSiteType.style.background='Yellow';}else{this.form.DiveSiteType.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");



echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Dive Site Rating</th>");
echo stripslashes("<td colspan='7'><table><tr><td bgcolor='YELLOW'>YUCK&nbsp;&nbsp;</td>");



$tabcount=21;

	$numPossibleElements = count($siteRatingArray);
	
	
	
if(strlen($DiveSiteRating!=0))
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSiteRating[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' name='SiteRating[]' value='".$siteRatingArray[$i]."'tabindex=".$tabcount." ".$state."></td>");  
 	  }	
 	  	  	
 }
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	      
          
          echo stripslashes("<td><input type= 'radio' name='SiteRating[]' value='".$siteRatingArray[$i]."'tabindex=".$tabcount."</td>");

       }
}












#echo stripslashes("<td><input type= 'checkbox' name='SiteRating[]' value='1' tabindex=22></td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteRating[]' value='2' tabindex=23></td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteRating[]' value='3' tabindex=24></td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteRating[]' value='4' tabindex=25></td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteRating[]' value='5' tabindex=26></td>");
#echo ("<td><input type ='text' NAME='DiveSiteRating' VALUE='$DiveSiteRating'  SIZE='10' MAXLENGTH='10'  tabindex=11 id ='DiveSiteRating' 
#   onBlur=\"if(isBlank(this.form.DiveSiteRating.value)) {alert('DiveSiteRating cannot be #blank');this.form.DiveSiteRating.style.background='Yellow';}else{this.form.DiveSiteRating.style.background='White';}\"><br></td>");
echo stripslashes("<td bgcolor='#00FF00'>&nbsp;&nbsp;YAY</td></tr>");
echo("</table></td></tr>");



echo stripslashes("<th valign='top' align ='left' scope='row'>Recommended Diver Level</th>");
echo stripslashes("<td colspan='7'><table><tr>");


$tabcount=26;

	$numPossibleElements = count($siteLevelArray);
	
	
	
if(strlen($DiveSiteLevel !=0))
{
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSiteLevel[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' name='SiteLevel[]' value='".$siteLevelArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteLevelArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	      
          
          echo stripslashes("<td><input type= 'radio' name='SiteLevel[]' value='".$siteLevelArray[$i]."'tabindex=".$tabcount.">".$siteLevelArray[$i]."</td>");

       }
}














#echo stripslashes("<td><input type= 'checkbox' name='SiteLevel[]' value='OW' tabindex=27>Open Water</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteLevel[]' value='AOW' tabindex=28>Advanced Open Water</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteLevel[]' value='RESCUE' tabindex=29>Rescue</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteLevel[]' value='MD' tabindex=30>Master Diver</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteLevel[]' value='DM' tabindex=31>Divemaster</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteLevel[]' value='INST' tabindex=32>Instructor</td>");


#echo ("<td><input type ='text' NAME='DiveSiteLevel' VALUE='$DiveSiteLevel'  SIZE='100' MAXLENGTH='100'  tabindex=22 id ='DiveSiteLevel' 
#   onBlur=\"if(isBlank(this.form.DiveSiteLevel.value)) {alert('DiveSiteLevel cannot be #blank');this.form.DiveSiteLevel.style.background='Yellow';}else{this.form.DiveSiteLevel.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");


echo stripslashes("<th valign='top' align ='left' scope='row'>Experience Level</th>");
echo stripslashes("<td colspan='7'><table>");


$tabcount=32;

	$numPossibleElements = count($siteDifficultyArray);
	
	
	
if(strlen($DiveSiteDifficulty) !=0)
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSiteDifficulty[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' name='SiteDifficulty[]' value='".$siteDifficultyArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteDifficultyArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	      
          
          echo stripslashes("<td><input type= 'radio' name='SiteDifficulty[]' value='".$siteDifficultyArray[$i]."'tabindex=".$tabcount.">".$siteDifficultyArray[$i]."</td>");

       }
}






















#echo stripslashes("<td><input type= 'checkbox' name='SiteDifficulty[]' value='NOVICE' tabindex=33>Novice</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteDifficulty[]' value='INTERMEDIATE'tabindex=34>Intermediate</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteDifficulty[]' value='ADVANCED' tabindex=35>Advanced</td>");
#echo ("<td><input type ='text' NAME='DiveSiteDifficulty' VALUE='$DiveSiteDifficulty'  SIZE='20' MAXLENGTH='20'  tabindex=23 id ='DiveSiteDifficulty' 
#   onBlur=\"if(isBlank(this.form.DiveSiteDifficulty.value)) {alert('DiveSiteDifficulty cannot be #blank');this.form.DiveSiteDifficulty.style.background='Yellow';}else{this.form.DiveSiteDifficulty.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");


echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Water Information</th>");
echo stripslashes("<td colspan='7'><table><tr>");
echo stripslashes("<th valign='top' align ='left' scope='row' tabindex=36>Type</th>");

echo stripslashes("<td><table><tr>");


$tabcount=36;

	$numPossibleElements = count($siteWaterTypeArray);
	
	
	
if(strlen($DiveSiteWater) !=0)
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSiteWater[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' name='SiteWaterType[]' value='".$siteWaterTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteWaterTypeArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	      
          
          echo stripslashes("<td><input type= 'radio' name='SiteWaterType[]' value='".$siteWaterTypeArray[$i]."'tabindex=".$tabcount.">".$siteWaterTypeArray[$i]."</td>");

       }
}


















#echo stripslashes("<td><input type= 'radio' name='SiteWaterType[]' value='FRESH' tabindex=37>Fresh</td>");
#echo stripslashes("<td><input type= 'radio' name='SiteWaterType[]' value='SALT' tabindex=38>Salt</td>");
#echo stripslashes("<td><input type= 'radio' name='SiteWaterType[]' value='BRACKISH' tabindex=39>Brackish</td>");



#echo ("<td><input type ='text' NAME='DiveSiteWater' VALUE='$DiveSiteWater'  SIZE='50' MAXLENGTH='50'  tabindex=14 id ='DiveSiteWater' 
#   onBlur=\"if(isBlank(this.form.DiveSiteWater.value)) {alert('DiveSiteWater cannot be #blank');this.form.DiveSiteWater.style.background='Yellow';}else{this.form.DiveSiteWater.style.background='White';}\"><br></td>");
echo stripslashes("</tr></table></td>");

echo stripslashes("</tr>");
echo stripslashes("<tr><td colspan='7'><table><tr>");
echo("<th valign='top' align ='left' scope='row'>Min Depth</th>");
echo ("<td><input type ='text' NAME='DiveSiteDepthMin' VALUE='$DiveSiteDepthMin'  SIZE='11' MAXLENGTH='11'  tabindex=40 id ='DiveSiteDepthMin' 
   onBlur=\"if(isBlank(this.form.DiveSiteDepthMin.value)) {alert('DiveSiteDepthMin cannot be blank');this.form.DiveSiteDepthMin.style.background='Yellow';}else{this.form.DiveSiteDepthMin.style.background='White';}\"><br></td>");
echo stripslashes("<td></td><th valign='top' align ='left' scope='row'>Max Depth</th>
");
echo ("<td><input type ='text' NAME='DiveSiteDepthMax' VALUE='$DiveSiteDepthMax'  SIZE='11' MAXLENGTH='11'  tabindex=41 id ='DiveSiteDepthMax' 
   onBlur=\"if(isBlank(this.form.DiveSiteDepthMax.value)) {alert('DiveSiteDepthMax cannot be blank');this.form.DiveSiteDepthMax.style.background='Yellow';}else{this.form.DiveSiteDepthMax.style.background='White';}\"><br></td>");
#echo stripslashes("<th valign='top' align ='left' scope='row'></th>");

echo stripslashes("<td><table><tr>");


$tabcount=41;

	$numPossibleElements = count($unitArray);
	
	
	
if(strlen($DiveSiteDepthUnits) !=0)
 {
 	
 
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSiteDepthUnits[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' name='SiteDepthUnits[]' value='".$unitArray[$i]."'tabindex=".$tabcount." ".$state.">".$unitArray[$i]."</td>");
 	  }	
 	  	  	
 	}
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	      
          if($unitArray[$i]=="Feet"){$state='checked';} else {$state='';}
          echo stripslashes("<td><input type= 'radio' name='SiteDepthUnits[]' value='".$unitArray[$i]."'tabindex=".$tabcount." ".$state.">".$unitArray[$i]."</td>");  

       }
}














#echo stripslashes("<td><input type= 'radio' name='SiteDepthUnits[]' value='FEET' checked tabindex=42>feet</td>");
#echo stripslashes("<td><input type= 'radio' name='SiteDepthUnits[]' value='METERS' tabindex=43>meters</td>");




#echo ("<td><input type ='text' NAME='DiveSiteDepthUnits' VALUE='$DiveSiteDepthUnits'  SIZE='5' MAXLENGTH='5'  tabindex=17 id ='DiveSiteDepthUnits' 
#   onBlur=\"if(isBlank(this.form.DiveSiteDepthUnits.value)) {alert('DiveSiteDepthUnits cannot be #blank');this.form.DiveSiteDepthUnits.style.background='Yellow';}else{this.form.DiveSiteDepthUnits.style.background='White';}\"><br></td>");
echo("</tr></table></td>");
#echo stripslashes("</tr>");
echo("</tr></table></td></tr>");


echo ('</TABLE>');

echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Applicable Tide Tables</th>");
echo ("<td><input type ='text' NAME='DiveSiteTideTable' VALUE='$DiveSiteTideTable'  SIZE='80' MAXLENGTH='80'  tabindex=44 id ='DiveSiteTideTable' 
   onBlur=\"if(isBlank(this.form.DiveSiteTideTable.value)) {alert('DiveSiteTideTable cannot be blank');this.form.DiveSiteTideTable.style.background='Yellow';}else{this.form.DiveSiteTideTable.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");




echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Bottom Composition</th>");


echo stripslashes("<td colspan='7'><table>");



$tabcount=44;

	$numPossibleElements = count($siteBottomCompositionArray);
	
	
$colcount=0;	
if(strlen($DiveSiteBottomComposition) !=0)
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	$colcount++;
 	  	if($colcount==5){echo('</tr><tr>');}
 	  	if($DiveSiteBottomComposition[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='".$siteBottomCompositionArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteBottomCompositionArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	$colcount=0;
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	      
          $colcount++;
 	  	    if($colcount==5){echo('</tr><tr>');}
          echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]'value='".$siteBottomCompositionArray[$i]."'tabindex=".$tabcount.">".$siteBottomCompositionArray[$i]."</td>");

       }
}



















#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='SILT' tabindex=45>Silt</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='CLAY' tabindex=46>Clay</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='DIRT' tabindex=47>Dirt</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='SAND' tabindex=48>Sand</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='GRAVEL'tabindex=49>Gravel</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='ROCK'tabindex=50>Rock</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='SHELLS' tabindex=51>Shells</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='REEF' tabindex=52>Reef</td>");


#echo ("<td><input type ='text' NAME='DiveSiteBottomComposition' VALUE='$DiveSiteBottomComposition'  SIZE='100' MAXLENGTH='100'  tabindex=18 id #='DiveSiteBottomComposition' 
#   onBlur=\"if(isBlank(this.form.DiveSiteBottomComposition.value)) {alert('DiveSiteBottomComposition cannot be #blank');this.form.DiveSiteBottomComposition.style.background='Yellow';}else{this.form.DiveSiteBottomComposition.style.background='White';}\"><br></td>");
echo stripslashes("</table></td>");
echo stripslashes("</tr>");


echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Hazards</th>");

echo stripslashes("<td colspan='7'><table><tr>");


$tabcount=52;

	$numPossibleElements = count($siteHazardArray);
	
	
$colcount=0;	
if(strlen($DiveSiteHazards) !=0)
{
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	$colcount++;
 	  	if($colcount == 6){echo('</tr><tr>');}
 	  	if($DiveSiteHazards[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='".$siteHazardArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteHazardArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	$colcount=0;
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       $colcount++;
 	       if($colcount == 6){echo stripslashes('</tr><tr>');}
          
          echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]'value='".$siteHazardArray[$i]."'tabindex=".$tabcount.">".$siteHazardArray[$i]."</td>");

       }
}











#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='COLD' checked tabindex=53>Cold</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='ALTITUDE' checked tabindex=54>Altitude</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='DEPTH' tabindex=55>Depth</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='BOATS' tabindex=56>Boats</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='LINES' tabindex=57>Line</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='VEGETATION' tabindex=58>Vegetation</td>");

#echo stripslashes("<tr>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='NETS'tabindex=59>Nets</td>");

#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='CURRENT' tabindex=60>Current</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='WILDLIFE' tabindex=61>Wildlife</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='STRUCTURES' tabindex=62>Submerged Structures</td>");

#echo stripslashes("</tr>");





#echo ("<td><input type ='text' NAME='DiveSiteHazards' VALUE='$DiveSiteHazards'  SIZE='100' MAXLENGTH='100'  tabindex=19 id ='DiveSiteHazards' 
#   onBlur=\"if(isBlank(this.form.DiveSiteHazards.value)) {alert('DiveSiteHazards cannot be #blank');this.form.DiveSiteHazards.style.background='Yellow';}else{this.form.DiveSiteHazards.style.background='White';}\"><br></td>");
echo stripslashes("</tr></table></td>");

echo stripslashes("</tr>");
echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Hazards Notes</th>
<td><TEXTAREA NAME='DiveSiteHazardsNotes' COLS=100 ROW=3 TABINDEX=63>$DiveSiteHazardsNotes</TEXTAREA></td>");
echo stripslashes("</tr>");

echo("<tr><th valign='top' align ='left' scope='row'>Permit/Permission Required</th>");
echo ("<td><input type ='text' NAME='DiveSitePermitRequired' VALUE='$DiveSitePermitRequired'  SIZE='50' MAXLENGTH='50'  tabindex=64 id ='DiveSitePermitRequired' 
   onBlur=\"if(isBlank(this.form.DiveSitePermitRequired.value)) {alert('DiveSitePermitRequired cannot be blank');this.form.DiveSitePermitRequired.style.background='Yellow';}else{this.form.DiveSitePermitRequired.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");


echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Time Restrictions</th>");
echo ("<td><input type ='text' NAME='DiveSiteTimeRestrictions' VALUE='$DiveSiteTimeRestrictions'  SIZE='50' MAXLENGTH='50'  tabindex=65 id ='DiveSiteTimeRestrictions' 
   onBlur=\"if(isBlank(this.form.DiveSiteTimeRestrictions.value)) {alert('DiveSiteTimeRestrictions cannot be blank');this.form.DiveSiteTimeRestrictions.style.background='Yellow';}else{this.form.DiveSiteTimeRestrictions.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");




echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Best Dive Months</th>");

echo("<td><table><tr>");




$tabcount=65;

	$numPossibleElements = count($siteMonthsArray);
	
	
$colcount=0;	
if(strlen($DiveSiteBestDiveMonths) !=0)
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	$colcount++;
 	  	if($colcount == 7){echo('</tr><tr>');}
 	  	if($DiveSiteBestDiveMonths[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='".$siteMonthsArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteMonthsArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	$colcount=0;
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       $colcount++;
 	       if($colcount == 7){echo stripslashes('</tr><tr>');}
          
          echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]'value='".$siteMonthsArray[$i]."'tabindex=".$tabcount.">".$siteMonthsArray[$i]."</td>");

       }
}









#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='JANUARY' tabindex=66>January</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='FEBRUARY'tabindex=67>February</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='MARCH'tabindex=68>March</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='APRIL' tabindex=69>April</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='MAY' checked tabindex=70>May</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='JUNE' checked tabindex=71>June</td>");
#echo stripslashes("<tr>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='JULY' checked tabindex=72>July</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='AUGUST'checked tabindex=73>August</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='SEPTEMBER' checked tabindex=74>September</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='OCTOBER' checked tabindex=75>October</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='NOVEMBER' tabindex=76>November</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='DECEMBER' tabindex=77>December</td>");
echo stripslashes("</tr>");





#echo ("<td><input type ='text' NAME='DiveSiteBestDiveMonths' VALUE='$DiveSiteBestDiveMonths'  SIZE='15' MAXLENGTH='15'  tabindex=25 id ='DiveSiteBestDiveMonths' 
#   onBlur=\"if(isBlank(this.form.DiveSiteBestDiveMonths.value)) {alert('DiveSiteBestDiveMonths cannot be #blank');this.form.DiveSiteBestDiveMonths.style.background='Yellow';}else{this.form.DiveSiteBestDiveMonths.style.background='White';}\"><br></td>");

echo("</tr></table></td>");
echo stripslashes("</tr>");



echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Site Temperatures</th>");
echo stripslashes("<td colspan='7'><table><tr>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Winter&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>");
echo ("<td><input type ='text' NAME='DiveSiteWinterTemp' VALUE='$DiveSiteWinterTemp'  SIZE='11' MAXLENGTH='11'  tabindex=78 id ='DiveSiteWinterTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteWinterTemp.value)) {alert('DiveSiteWinterTemp cannot be blank');this.form.DiveSiteWinterTemp.style.background='Yellow';}else{this.form.DiveSiteWinterTemp.style.background='White';}\"><br></td>");

echo stripslashes("<th valign='top' align ='left' scope='row'>&nbsp;&nbsp;Summer&nbsp;</th>");
echo ("<td><input type ='text' NAME='DiveSiteSummerTemp' VALUE='$DiveSiteSummerTemp'  SIZE='11' MAXLENGTH='11'  tabindex=79 id ='DiveSiteSummerTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteSummerTemp.value)) {alert('DiveSiteSummerTemp cannot be blank');this.form.DiveSiteSummerTemp.style.background='Yellow';}else{this.form.DiveSiteSummerTemp.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Fall</th>
");
echo ("<td><input type ='text' NAME='DiveSiteFallTemp' VALUE='$DiveSiteFallTemp'  SIZE='11' MAXLENGTH='11'  tabindex=80 id ='DiveSiteFallTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteFallTemp.value)) {alert('DiveSiteFallTemp cannot be blank');this.form.DiveSiteFallTemp.style.background='Yellow';}else{this.form.DiveSiteFallTemp.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Spring</th>
");
echo ("<td><input type ='text' NAME='DiveSiteSpringTemp' VALUE='$DiveSiteSpringTemp'  SIZE='11' MAXLENGTH='11'  tabindex=81 id ='DiveSiteSpringTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteSpringTemp.value)) {alert('DiveSiteSpringTemp cannot be blank');this.form.DiveSiteSpringTemp.style.background='Yellow';}else{this.form.DiveSiteSpringTemp.style.background='White';}\"><br></td>");
   
   
echo stripslashes("<th valign='top' align ='left' scope='row'></th>");

echo stripslashes("<td><table><tr>");

$tabcount=81;

	$numPossibleElements = count($siteTempUnitsArray);
	
	
$colcount=0;	
if(strlen($DiveSiteTempUnits)!=0)
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	$colcount++;
 	  	if($colcount == 7){echo('</tr><tr>');}
 	  	if($DiveSiteTempUnits[$i]=="1") {$state='checked';}else{$state='';}
 	  	if($siteTempUnitsArray[$i]=='DEGREESF'){$display='&degF';} 
 	    if($siteTempUnitsArray[$i]=='DEGREESC'){$display='&degC';} 

 	  	echo stripslashes("<td><input type= 'radio' name='SiteTempUnits[]' value='".$siteTempUnitsArray[$i]."'tabindex=".$tabcount." ".$state.">".$display."</td>");  
 	  }	
 	  	  	
 }
 	  
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($siteTempUnitsArray[$i]=='DEGREESF'){$state='checked';} else {$state='';}
 	  	   if($siteTempUnitsArray[$i]=='DEGREESF'){$display='&degF';} 
 	  	   if($siteTempUnitsArray[$i]=='DEGREESC'){$display='&degC';} 
          
           echo stripslashes("<td><input type= 'radio' name='SiteTempUnits[]' value='".$siteTempUnitsArray[$i]."'tabindex=".$tabcount." ".$state.">".$display."</td>");  	
       }
}














#echo stripslashes("<td><input type= 'radio' name='SiteTempUnits[]' value='DEGREESF' checked tabindex=82>&degF</td>");
#echo stripslashes("<td><input type= 'radio' name='SiteTempUnits[]' value='DEGREESC' tabindex=83>&degC</td>");





#echo ("<td><input type ='text' NAME='DiveSiteTempUnits' VALUE='$DiveSiteTempUnits'  SIZE='12' MAXLENGTH='12'  tabindex=32 id ='DiveSiteTempUnits' 
#   onBlur=\"if(isBlank(this.form.DiveSiteTempUnits.value)) {alert('DiveSiteTempUnits cannot be #blank');this.form.DiveSiteTempUnits.style.background='Yellow';}else{this.form.DiveSiteTempUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr></table></td>");
echo stripslashes("</tr>");
echo stripslashes("</tr></table></td>");


echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Site Visibility</th>");
echo stripslashes("<td colspan='7'><table><tr>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Minimum</th>");
echo ("<td><input type ='text' NAME='DiveSiteVisibilityMinimum' VALUE='$DiveSiteVisibilityMinimum'  SIZE='11' MAXLENGTH='11'  tabindex=84 id ='DiveSiteVisibilityMinimum' 
   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityMinimum.value)) {alert('DiveSiteVisibilityMinimum cannot be blank');this.form.DiveSiteVisibilityMinimum.style.background='Yellow';}else{this.form.DiveSiteVisibilityMinimum.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Maximum</th>");
echo ("<td><input type ='text' NAME='DiveSiteVisibilityMaximum' VALUE='$DiveSiteVisibilityMaximum'  SIZE='11' MAXLENGTH='11'  tabindex=85 id ='DiveSiteVisibilityMaximum' 
   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityMaximum.value)) {alert('DiveSiteVisibilityMaximum cannot be blank');this.form.DiveSiteVisibilityMaximum.style.background='Yellow';}else{this.form.DiveSiteVisibilityMaximum.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'></th>");
echo stripslashes("<td><table><tr>");


$tabcount=85;

	$numPossibleElements = count($unitArray);
	
	
	
if(strlen($DiveSiteVisibilityUnits)!=0)
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	$colcount++;
 	  	if($colcount == 7){echo('</tr><tr>');}
 	  	if($DiveSiteVisibilityUnits[$i]=="1") {$state='checked';}else{$state='';}
 	  	

 	  	echo stripslashes("<td><input type= 'radio' name='SiteVisibilityUnits[]' value='".$unitArray[$i]."'tabindex=".$tabcount." ".$state.">".$unitArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	      
          if($unitArray[$i]=="Feet"){$state='checked';} else {$state='';}
          echo stripslashes("<td><input type= 'radio' name='SiteVisibilityUnits[]' value='".$unitArray[$i]."'tabindex=".$tabcount." ".$state.">".$unitArray[$i]."</td>");  

       }
}














#echo stripslashes("<td><input type= 'radio' name='SiteVisibilityUnits[]' value='FEET' checked tabindex=86>feet</td>");
#echo stripslashes("<td><input type= 'radio' name='SiteVisibilityUnits[]' value='METERS' tabindex=87>meters</td>");


#echo ("<td><input type ='text' NAME='DiveSiteVisibilityUnits' VALUE='$DiveSiteVisibilityUnits'  SIZE='15' MAXLENGTH='15'  tabindex=35 id ='DiveSiteVisibilityUnits' 
#   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityUnits.value)) {alert('DiveSiteVisibilityUnits cannot be #blank');this.form.DiveSiteVisibilityUnits.style.background='Yellow';}else{this.form.DiveSiteVisibilityUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr></table></td>");
echo stripslashes("</tr>");


echo stripslashes("</tr></table></td>");


echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Site Facilities</th>");


$DisplayColumns=5; $colcount=0;
echo('<td><table>');
echo('<tr>');

$tabcount=90;

	$numPossibleElements = count($siteFacilitiesArray);
	
	
$colcount=0;	
if(strlen($DiveSiteFacilities) !=0)
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	$colcount++;
 	  	if($colcount == 7){echo('</tr><tr>');}
 	  	if($DiveSiteFacilities[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'checkbox' name='SiteFacilities[]' value='".$siteFacilitiesArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteFacilitiesArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	$colcount=0;
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       $colcount++;
 	       if($colcount == 7){echo stripslashes('</tr><tr>');}
          
          echo stripslashes("<td><input type= 'checkbox' name='SiteFacilities[]'value='".$siteFacilitiesArray[$i]."'tabindex=".$tabcount.">".$siteFacilitiesArray[$i]."</td>");

       }
}






 echo('</tr></table></td>');




#echo ("<td><input type ='text' NAME='DiveSiteFacilities' VALUE='$DiveSiteFacilities'  SIZE='50' MAXLENGTH='50'  tabindex=38 id ='DiveSiteFacilities' 
#   onBlur=\"if(isBlank(this.form.DiveSiteFacilities.value)) {alert('DiveSiteFacilities cannot be blank');this.form.DiveSiteFacilities.style.background='Yellow';}else{this.form.DiveSiteFacilities.style.background='White';}\"><br></td>");






echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Facilities Notes</th>
<td><TEXTAREA NAME='DiveSiteFacilitiesNotes' COLS=100 ROW=3 TABINDEX=110>$DiveSiteFacilitiesNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Recommendation Notes</th>
<td><TEXTAREA NAME='Site RecommendationNotes' COLS=100 ROW=3 TABINDEX=111>$DiveSiteRecommendationNotes</TEXTAREA></td>");
echo stripslashes("</tr>");

echo stripslashes("<tr style='outline: thin solid'><th bgcolor='#faa0f2' colspan=\"8\">Background Site Information</th></tr>");

echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Site WebPage</th>
");
echo ("<td><input type ='text' NAME='DiveSiteWebPage' VALUE='$DiveSiteWebPage'  SIZE='100' MAXLENGTH='150'  tabindex=112 id ='DiveSiteWebPage' 
   onBlur=\"if(isBlank(this.form.DiveSiteWebPage.value)) {alert('DiveSiteWebPage cannot be blank');this.form.DiveSiteWebPage.style.background='Yellow';}else{this.form.DiveSiteWebPage.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Site Background</th>
");
echo ("<td><input type ='text' NAME='DiveSiteBackground' VALUE='$DiveSiteBackground'  SIZE='100' MAXLENGTH='150'  tabindex=113 id ='DiveSiteBackground' 
   onBlur=\"if(isBlank(this.form.DiveSiteBackground.value)) {alert('DiveSiteBackground cannot be blank');this.form.DiveSiteBackground.style.background='Yellow';}else{this.form.DiveSiteBackground.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Site EAP Id</th>
");
echo ("<td><input type ='text' NAME='DiveSiteEAPId' VALUE='$DiveSiteEAPId'  SIZE='8' MAXLENGTH='8'  tabindex=114 id ='DiveSiteEAPId' 
   onBlur=\"if(isBlank(this.form.DiveSiteEAPId.value)) {alert('DiveSiteEAPId cannot be blank');this.form.DiveSiteEAPId.style.background='Yellow';}else{this.form.DiveSiteEAPId.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
");}
#----------------------------Entry Form----------------------------------------------------

function AddForm ()  {
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
global $Mode;

global $unitArray,$postElevUnitArray;
global $siteTypeArray, $postSiteTypeArray;
global $siteRatingArray,$postSiteRatingArray;
global $siteBottomCompositionArray,$postSiteBottomCompositionArray;
global $siteTempUnitsArray, $postSiteUnitsArray;


$Mode='ADD';
echo stripslashes("
<FORM NAME='DiveSiteEntry' action='DiveSite.php' method='POST'>");
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
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
global $Mode;

global $unitArray,$postElevUnitArray;
global $siteTypeArray, $postSiteTypeArray;
global $siteRatingArray,$postSiteRatingArray;


$Mode='EDIT';
echo stripslashes("
<FORM NAME='DiveSiteEdit' action='DiveSite.php' method='POST'>");
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
#-----------------------------Display Form------------------------------------------------

function DisplayForm ()  {
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;

global $unitArray,$postElevUnitArray;
global $siteTypeArray, $postSiteTypeArray;
global $siteRatingArray,$postSiteRatingArray;
global $siteLevelArray,$postSiteLevelArray;
global $siteDifficultyArray,$postSiteDifficultyArray;
global $siteWaterTypeArray,$postSiteWaterTypeArray;
global $postSiteDepthUnitsArray;
global $siteBottomCompositionArray,$postSiteBottomCompositionArray;
global $siteHazardArray, $postSiteHazardArray;
global $siteMonthsArray, $postSiteMonthsArray;
global $siteTempUnitsArray, $postSiteTempUnitsArray;
global $postSiteVisibilityUnitsArray;
global $siteFacilitiesArray,$postSiteFacilitiesArray;

echo stripslashes("
<FORM NAME='DiveSiteDisplay' action='DiveSite.php' method='POST'>
<TABLE  align='center' border='1'><tr><td>
<TABLE cellspacing='5'>
<tr>
<td colspan =2 align='center'>

<input type ='SUBMIT' NAME='display_button' Value = 'Return'>
<input type ='SUBMIT' NAME='display_button' Value = 'Edit'>
<input type ='SUBMIT' NAME='display_button' Value = 'Delete'>
</td>
</td>
</tr>

<tr style='outline: thin solid'><th bgcolor='#faa0f2' colspan=\"8\">Where is the Site?</th></tr>


<tr><th valign='top' align ='left' scope='row'>Site Information</th>
<td colspan=\"7\"><table><tr>
<th valign='top' align ='left' scope='row'>System Id&nbsp;&nbsp;&nbsp;</th>
<td><input type ='text' NAME='DiveSiteId' VALUE='$DiveSiteId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSiteId' READONLY><br></td><th valign='top' align ='left' scope='row'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;System Status&nbsp;</th>"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSiteStatus' VALUE='$DiveSiteStatus'  SIZE='10' MAXLENGTH='10'  tabindex=2 id ='DiveSiteStatus' 
   onBlur=\"if(isBlank(this.form.DiveSiteStatus.value)) {alert('DiveSiteStatus cannot be blank');this.form.DiveSiteStatus.style.background='Yellow';}else{this.form.DiveSiteStatus.style.background='White';}\"><br></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSiteStatus' VALUE='$DiveSiteStatus'  SIZE='10' MAXLENGTH='10'  tabindex=2 id ='DiveSiteStatus' 
   onBlur=\"if(isBlank(this.form.DiveSiteStatus.value)) {alert('DiveSiteStatus cannot be blank');this.form.DiveSiteStatus.style.background='Yellow';}else{this.form.DiveSiteStatus.style.background='White';}\"><br></td>");}
echo stripslashes("</tr>");
echo("</tr></table></td>");

echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Information Source</th>");
echo stripslashes("<td colspan=\"7\"><table><tr>");
echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Entered By</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteEnteredBy' VALUE='$DiveSiteEnteredBy'  SIZE='25' MAXLENGTH='25'  tabindex=3 id ='DiveSiteEnteredBy' 
   onBlur=\"if(isBlank(this.form.DiveSiteEnteredBy.value)) {alert('DiveSiteEnteredBy cannot be blank');this.form.DiveSiteEnteredBy.style.background='Yellow';}else{this.form.DiveSiteEnteredBy.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Date Entered&nbsp;&nbsp;</th>
<td colspan='3'><input type ='text' READONLY NAME='DiveSiteDateEntered' VALUE='$DiveSiteDateEntered'  SIZE='11' MAXLENGTH='11'  tabindex=4 id ='DiveSiteDateEntered' 
   onBlur=\"if(isBlank(this.form.DiveSiteDateEntered.value)) {alert('DiveSiteDateEntered cannot be blank');this.form.DiveSiteDateEntered.style.background='Yellow';}else{this.form.DiveSiteDateEntered.style.background='White';}\">");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteEdit\'].DiveSiteDateEntered,\'anchor\',\'NNN-dd-yyyy\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSiteEntry\'].DiveSiteDateEntered,\'anchor\',\'NNN-dd-yyyy\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
echo("</td>");
echo stripslashes("</tr>");
echo("</tr></table></td>");

echo("<tr><th valign='top' align ='left' scope='row'>Nearest Town/City</th>");
echo("<td colspan=\"7\"><table><tr>");
echo stripslashes("<th valign='top' align ='left' scope='row'>City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteCity' VALUE='$DiveSiteCity'  SIZE='30' MAXLENGTH='30'  tabindex=5 id ='DiveSiteCity' 
   onBlur=\"if(isBlank(this.form.DiveSiteCity.value)) {alert('DiveSiteCity cannot be blank');this.form.DiveSiteCity.style.background='Yellow';}else{this.form.DiveSiteCity.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Province&nbsp;</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteProvince' VALUE='$DiveSiteProvince'  SIZE='15' MAXLENGTH='15'  tabindex=6 id ='DiveSiteProvince' 
   onBlur=\"if(isBlank(this.form.DiveSiteProvince.value)) {alert('DiveSiteProvince cannot be blank');this.form.DiveSiteProvince.style.background='Yellow';}else{this.form.DiveSiteProvince.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Country</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSiteCountry' VALUE='$DiveSiteCountry'  SIZE='15' MAXLENGTH='15'  tabindex=7 id ='DiveSiteCountry' 
   onBlur=\"if(isBlank(this.form.DiveSiteCountry.value)) {alert('DiveSiteCountry cannot be blank');this.form.DiveSiteCountry.style.background='Yellow';}else{this.form.DiveSiteCountry.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");
echo("</tr></table></td>");






echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Site Name</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSiteName' VALUE='$DiveSiteName'  SIZE='80' MAXLENGTH='80'  tabindex=8 id ='DiveSiteName' 
   onBlur=\"if(isBlank(this.form.DiveSiteName.value)) {alert('DiveSiteName cannot be blank');this.form.DiveSiteName.style.background='Yellow';}else{this.form.DiveSiteName.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Major Site</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSiteMajorName' VALUE='$DiveSiteMajorName'  SIZE='80' MAXLENGTH='80'  tabindex=9 id ='DiveSiteMajorName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMajorName.value)) {alert('DiveSiteMajorName cannot be blank');this.form.DiveSiteMajorName.style.background='Yellow';}else{this.form.DiveSiteMajorName.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Minor Site</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSiteMinorName' VALUE='$DiveSiteMinorName'  SIZE='80' MAXLENGTH='80'  tabindex=10 id ='DiveSiteMinorName' 
   onBlur=\"if(isBlank(this.form.DiveSiteMinorName.value)) {alert('DiveSiteMinorName cannot be blank');this.form.DiveSiteMinorName.style.background='Yellow';}else{this.form.DiveSiteMinorName.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");



echo stripslashes("<tr><td>Site Location</td><td colspan=\"7\"> <table>");
echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Latitude</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSiteExactLat' VALUE='$DiveSiteExactLat'  SIZE='11,7' MAXLENGTH='11,7'  tabindex=11 id ='DiveSiteExactLat' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLat.value)) {alert('DiveSiteExactLat cannot be blank');this.form.DiveSiteExactLat.style.background='Yellow';}else{this.form.DiveSiteExactLat.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Longitude</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteExactLong' VALUE='$DiveSiteExactLong'  SIZE='11,7' MAXLENGTH='11,7'  tabindex=12 id ='DiveSiteExactLong' 
   onBlur=\"if(isBlank(this.form.DiveSiteExactLong.value)) {alert('DiveSiteExactLong cannot be blank');this.form.DiveSiteExactLong.style.background='Yellow';}else{this.form.DiveSiteExactLong.style.background='White';}\"><br></td>");
echo stripslashes("</table></td></tr>");   
   
   
echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Dive Site Notes</th>
<td><TEXTAREA READONLY NAME='DiveSiteNotes' COLS=100 ROW=3 TABINDEX=13>$DiveSiteNotes</TEXTAREA></td>");
echo stripslashes("</tr>");

echo stripslashes("<tr><td>Parking Location</td><td colspan=\"7\"> <table>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Latitude</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteShoreLat' VALUE='$DiveSiteShoreLat'  SIZE='11,7' MAXLENGTH='11,7'  tabindex=14 id ='DiveSiteShoreLat' 
   onBlur=\"if(isBlank(this.form.DiveSiteShoreLat.value)) {alert('DiveSiteShoreLat cannot be blank');this.form.DiveSiteShoreLat.style.background='Yellow';}else{this.form.DiveSiteShoreLat.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Longitude</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteShoreLong' VALUE='$DiveSiteShoreLong'  SIZE='11,7' MAXLENGTH='11,7'  tabindex=15 id ='DiveSiteShoreLong' 
   onBlur=\"if(isBlank(this.form.DiveSiteShoreLong.value)) {alert('DiveSiteShoreLong cannot be blank');this.form.DiveSiteShoreLong.style.background='Yellow';}else{this.form.DiveSiteShoreLong.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");
echo stripslashes("</table></td></tr>"); 

echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Parking Notes</th>
<td><TEXTAREA READONLY NAME='DiveSiteShoreNotes' COLS=100 ROW=3 TABINDEX=16>$DiveSiteShoreNotes</TEXTAREA></td>");
echo stripslashes("</tr>");

echo stripslashes("<tr style='outline: thin solid'><th bgcolor='#faa0f2' colspan=\"8\">Site Diving Information</th></tr>");

echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Altitude</th>");
echo stripslashes("<td colspan='7'><table>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Elevation</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteElevation' VALUE='$DiveSiteElevation'  SIZE='11' MAXLENGTH='11'  tabindex=17 id ='DiveSiteElevation' 
   onBlur=\"if(isBlank(this.form.DiveSiteElevation.value)) {alert('DiveSiteElevation cannot be blank');this.form.DiveSiteElevation.style.background='Yellow';}else{this.form.DiveSiteElevation.style.background='White';}\"><br></td>");

echo stripslashes("<th valign='top' align ='left' scope='row'></th>");

echo stripslashes("<td><table><tr>");

   $tabcount=17;
	 $numPossibleElements = count($unitArray);
	
if(strlen($DiveSiteElevationUnits) != 0)
 {
 	
 
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSiteElevationUnits[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteElevationUnits[]' value='".$unitArray[$i]."'tabindex=".$tabcount." ".$state.">".$unitArray[$i]."</td>");
 	  }	
 	  	  	
 	}
 	
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($unitArray[$i] == 'Feet') {$state='checked';} else {$state='';}
          
          echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteElevationUnits[]' value='".$unitArray[$i]."'tabindex=".$tabcount." ".$state.">".$unitArray[$i]."</td>");

       }
 }
 



#echo ("<td><input type ='text' NAME='DiveSiteElevationUnits' VALUE='$DiveSiteElevationUnits'  SIZE='5' MAXLENGTH='5'  tabindex=13 id ='DiveSiteElevationUnits' 
#   onBlur=\"if(isBlank(this.form.DiveSiteElevationUnits.value)) {alert('DiveSiteElevationUnits cannot be #blank');this.form.DiveSiteElevationUnits.style.background='Yellow';}else{this.form.DiveSiteElevationUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr></table></td>");   
echo stripslashes("</tr>");
echo stripslashes("</td></table>");



echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Type of Site</th>");
echo stripslashes("<td colspan='7'><table>");

$tabcount=19;
	$numPossibleElements = count($siteTypeArray);
	
	
	
if(strlen($DiveSiteType)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSiteType[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'checkbox' DISABLED READONLY NAME='SiteType[]' value='".$siteTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteTypeArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($siteTypeArray[$i] == 'Shore') {$state='checked';} else {$state='';}
          
          echo stripslashes("<td><input type= 'checkbox' DISABLED READONLY NAME='SiteType[]' value='".$siteTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteTypeArray[$i]."</td>");

       }
}


















#echo stripslashes("<td><input type= 'checkbox' name='SiteType[]' value='Shore' tabindex=20>Shore</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteType[]' value='Boat' tabindex=21>Boat</td>");
#echo ("<td><input type ='text' NAME='DiveSiteType' VALUE='$DiveSiteType'  SIZE='100' MAXLENGTH='100'  tabindex=21 id ='DiveSiteType' 
#   onBlur=\"if(isBlank(this.form.DiveSiteType.value)) {alert('DiveSiteType cannot be #blank');this.form.DiveSiteType.style.background='Yellow';}else{this.form.DiveSiteType.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");



echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Dive Site Rating</th>");
echo stripslashes("<td colspan='7'><table><tr><td bgcolor='YELLOW'>YUCK&nbsp;&nbsp;</td>");



$tabcount=21;

	$numPossibleElements = count($siteRatingArray);
	
	
	
if(strlen($DiveSiteRating!=0))
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSiteRating[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteRating[]' value='".$siteRatingArray[$i]."'tabindex=".$tabcount." ".$state."></td>");  
 	  }	
 	  	  	
 }
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	      
          
          echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteRating[]' value='".$siteRatingArray[$i]."'tabindex=".$tabcount."</td>");

       }
}












#echo stripslashes("<td><input type= 'checkbox' name='SiteRating[]' value='1' tabindex=22></td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteRating[]' value='2' tabindex=23></td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteRating[]' value='3' tabindex=24></td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteRating[]' value='4' tabindex=25></td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteRating[]' value='5' tabindex=26></td>");
#echo ("<td><input type ='text' NAME='DiveSiteRating' VALUE='$DiveSiteRating'  SIZE='10' MAXLENGTH='10'  tabindex=11 id ='DiveSiteRating' 
#   onBlur=\"if(isBlank(this.form.DiveSiteRating.value)) {alert('DiveSiteRating cannot be #blank');this.form.DiveSiteRating.style.background='Yellow';}else{this.form.DiveSiteRating.style.background='White';}\"><br></td>");
echo stripslashes("<td bgcolor='#00FF00'>&nbsp;&nbsp;YAY</td></tr>");
echo("</table></td></tr>");



echo stripslashes("<th valign='top' align ='left' scope='row'>Recommended Diver Level</th>");
echo stripslashes("<td colspan='7'><table><tr>");


$tabcount=26;

	$numPossibleElements = count($siteLevelArray);
	
	
	
if(strlen($DiveSiteLevel !=0))
{
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSiteLevel[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteLevel[]' value='".$siteLevelArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteLevelArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	      
          
          echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteLevel[]' value='".$siteLevelArray[$i]."'tabindex=".$tabcount.">".$siteLevelArray[$i]."</td>");

       }
}














#echo stripslashes("<td><input type= 'checkbox' name='SiteLevel[]' value='OW' tabindex=27>Open Water</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteLevel[]' value='AOW' tabindex=28>Advanced Open Water</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteLevel[]' value='RESCUE' tabindex=29>Rescue</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteLevel[]' value='MD' tabindex=30>Master Diver</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteLevel[]' value='DM' tabindex=31>Divemaster</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteLevel[]' value='INST' tabindex=32>Instructor</td>");


#echo ("<td><input type ='text' NAME='DiveSiteLevel' VALUE='$DiveSiteLevel'  SIZE='100' MAXLENGTH='100'  tabindex=22 id ='DiveSiteLevel' 
#   onBlur=\"if(isBlank(this.form.DiveSiteLevel.value)) {alert('DiveSiteLevel cannot be #blank');this.form.DiveSiteLevel.style.background='Yellow';}else{this.form.DiveSiteLevel.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");


echo stripslashes("<th valign='top' align ='left' scope='row'>Experience Level</th>");
echo stripslashes("<td colspan='7'><table>");


$tabcount=32;

	$numPossibleElements = count($siteDifficultyArray);
	
	
	
if(strlen($DiveSiteDifficulty) !=0)
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSiteDifficulty[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteDifficulty[]' value='".$siteDifficultyArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteDifficultyArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	      
          
          echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteDifficulty[]' value='".$siteDifficultyArray[$i]."'tabindex=".$tabcount.">".$siteDifficultyArray[$i]."</td>");

       }
}






















#echo stripslashes("<td><input type= 'checkbox' name='SiteDifficulty[]' value='NOVICE' tabindex=33>Novice</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteDifficulty[]' value='INTERMEDIATE'tabindex=34>Intermediate</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteDifficulty[]' value='ADVANCED' tabindex=35>Advanced</td>");
#echo ("<td><input type ='text' NAME='DiveSiteDifficulty' VALUE='$DiveSiteDifficulty'  SIZE='20' MAXLENGTH='20'  tabindex=23 id ='DiveSiteDifficulty' 
#   onBlur=\"if(isBlank(this.form.DiveSiteDifficulty.value)) {alert('DiveSiteDifficulty cannot be #blank');this.form.DiveSiteDifficulty.style.background='Yellow';}else{this.form.DiveSiteDifficulty.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");


echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Water Information</th>");
echo stripslashes("<td colspan='7'><table><tr>");
echo stripslashes("<th valign='top' align ='left' scope='row' tabindex=36>Type</th>");

echo stripslashes("<td><table><tr>");


$tabcount=36;

	$numPossibleElements = count($siteWaterTypeArray);
	
	
	
if(strlen($DiveSiteWater) !=0)
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSiteWater[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteWaterType[]' value='".$siteWaterTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteWaterTypeArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	      
          
          echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteWaterType[]' value='".$siteWaterTypeArray[$i]."'tabindex=".$tabcount.">".$siteWaterTypeArray[$i]."</td>");

       }
}


















#echo stripslashes("<td><input type= 'radio' name='SiteWaterType[]' value='FRESH' tabindex=37>Fresh</td>");
#echo stripslashes("<td><input type= 'radio' name='SiteWaterType[]' value='SALT' tabindex=38>Salt</td>");
#echo stripslashes("<td><input type= 'radio' name='SiteWaterType[]' value='BRACKISH' tabindex=39>Brackish</td>");



#echo ("<td><input type ='text' NAME='DiveSiteWater' VALUE='$DiveSiteWater'  SIZE='50' MAXLENGTH='50'  tabindex=14 id ='DiveSiteWater' 
#   onBlur=\"if(isBlank(this.form.DiveSiteWater.value)) {alert('DiveSiteWater cannot be #blank');this.form.DiveSiteWater.style.background='Yellow';}else{this.form.DiveSiteWater.style.background='White';}\"><br></td>");
echo stripslashes("</tr></table></td>");

echo stripslashes("</tr>");
echo stripslashes("<tr><td colspan='7'><table><tr>");
echo("<th valign='top' align ='left' scope='row'>Min Depth</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteDepthMin' VALUE='$DiveSiteDepthMin'  SIZE='11' MAXLENGTH='11'  tabindex=40 id ='DiveSiteDepthMin' 
   onBlur=\"if(isBlank(this.form.DiveSiteDepthMin.value)) {alert('DiveSiteDepthMin cannot be blank');this.form.DiveSiteDepthMin.style.background='Yellow';}else{this.form.DiveSiteDepthMin.style.background='White';}\"><br></td>");
echo stripslashes("<td></td><th valign='top' align ='left' scope='row'>Max Depth</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSiteDepthMax' VALUE='$DiveSiteDepthMax'  SIZE='11' MAXLENGTH='11'  tabindex=41 id ='DiveSiteDepthMax' 
   onBlur=\"if(isBlank(this.form.DiveSiteDepthMax.value)) {alert('DiveSiteDepthMax cannot be blank');this.form.DiveSiteDepthMax.style.background='Yellow';}else{this.form.DiveSiteDepthMax.style.background='White';}\"><br></td>");
#echo stripslashes("<th valign='top' align ='left' scope='row'></th>");

echo stripslashes("<td><table><tr>");


$tabcount=41;

	$numPossibleElements = count($unitArray);
	
	
	
if(strlen($DiveSiteDepthUnits) !=0)
 {
 	
 
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSiteDepthUnits[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteDepthUnits[]' value='".$unitArray[$i]."'tabindex=".$tabcount." ".$state.">".$unitArray[$i]."</td>");
 	  }	
 	  	  	
 	}
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	      
          if($unitArray[$i]=="Feet"){$state='checked';} else {$state='';}
          echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteDepthUnits[]' value='".$unitArray[$i]."'tabindex=".$tabcount." ".$state.">".$unitArray[$i]."</td>");  

       }
}














#echo stripslashes("<td><input type= 'radio' name='SiteDepthUnits[]' value='FEET' checked tabindex=42>feet</td>");
#echo stripslashes("<td><input type= 'radio' name='SiteDepthUnits[]' value='METERS' tabindex=43>meters</td>");




#echo ("<td><input type ='text' NAME='DiveSiteDepthUnits' VALUE='$DiveSiteDepthUnits'  SIZE='5' MAXLENGTH='5'  tabindex=17 id ='DiveSiteDepthUnits' 
#   onBlur=\"if(isBlank(this.form.DiveSiteDepthUnits.value)) {alert('DiveSiteDepthUnits cannot be #blank');this.form.DiveSiteDepthUnits.style.background='Yellow';}else{this.form.DiveSiteDepthUnits.style.background='White';}\"><br></td>");
echo("</tr></table></td>");
#echo stripslashes("</tr>");
echo("</tr></table></td></tr>");


echo ('</TABLE>');

echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Applicable Tide Tables</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteTideTable' VALUE='$DiveSiteTideTable'  SIZE='80' MAXLENGTH='80'  tabindex=44 id ='DiveSiteTideTable' 
   onBlur=\"if(isBlank(this.form.DiveSiteTideTable.value)) {alert('DiveSiteTideTable cannot be blank');this.form.DiveSiteTideTable.style.background='Yellow';}else{this.form.DiveSiteTideTable.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");




echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Bottom Composition</th>");


echo stripslashes("<td colspan='7'><table>");



$tabcount=44;

	$numPossibleElements = count($siteBottomCompositionArray);
	
	
$colcount=0;	
if(strlen($DiveSiteBottomComposition) !=0)
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	$colcount++;
 	  	if($colcount==5){echo('</tr><tr>');}
 	  	if($DiveSiteBottomComposition[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'checkbox' DISABLED READONLY NAME='SiteBottomComposition[]' value='".$siteBottomCompositionArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteBottomCompositionArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	$colcount=0;
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	      
          $colcount++;
 	  	    if($colcount==5){echo('</tr><tr>');}
          echo stripslashes("<td><input type= 'checkbox' DISABLED READONLY NAME='SiteBottomComposition[]'value='".$siteBottomCompositionArray[$i]."'tabindex=".$tabcount.">".$siteBottomCompositionArray[$i]."</td>");

       }
}



















#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='SILT' tabindex=45>Silt</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='CLAY' tabindex=46>Clay</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='DIRT' tabindex=47>Dirt</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='SAND' tabindex=48>Sand</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='GRAVEL'tabindex=49>Gravel</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='ROCK'tabindex=50>Rock</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='SHELLS' tabindex=51>Shells</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteBottomComposition[]' value='REEF' tabindex=52>Reef</td>");


#echo ("<td><input type ='text' NAME='DiveSiteBottomComposition' VALUE='$DiveSiteBottomComposition'  SIZE='100' MAXLENGTH='100'  tabindex=18 id #='DiveSiteBottomComposition' 
#   onBlur=\"if(isBlank(this.form.DiveSiteBottomComposition.value)) {alert('DiveSiteBottomComposition cannot be #blank');this.form.DiveSiteBottomComposition.style.background='Yellow';}else{this.form.DiveSiteBottomComposition.style.background='White';}\"><br></td>");
echo stripslashes("</table></td>");
echo stripslashes("</tr>");


echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Hazards</th>");

echo stripslashes("<td colspan='7'><table><tr>");


$tabcount=52;

	$numPossibleElements = count($siteHazardArray);
	
	
$colcount=0;	
if(strlen($DiveSiteHazards) !=0)
{
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	$colcount++;
 	  	if($colcount == 6){echo('</tr><tr>');}
 	  	if($DiveSiteHazards[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'checkbox' DISABLED READONLY NAME='SiteHazard[]' value='".$siteHazardArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteHazardArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	$colcount=0;
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       $colcount++;
 	       if($colcount == 6){echo stripslashes('</tr><tr>');}
          
          echo stripslashes("<td><input type= 'checkbox' DISABLED READONLY NAME='SiteHazard[]'value='".$siteHazardArray[$i]."'tabindex=".$tabcount.">".$siteHazardArray[$i]."</td>");

       }
}











#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='COLD' checked tabindex=53>Cold</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='ALTITUDE' checked tabindex=54>Altitude</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='DEPTH' tabindex=55>Depth</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='BOATS' tabindex=56>Boats</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='LINES' tabindex=57>Line</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='VEGETATION' tabindex=58>Vegetation</td>");

#echo stripslashes("<tr>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='NETS'tabindex=59>Nets</td>");

#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='CURRENT' tabindex=60>Current</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='WILDLIFE' tabindex=61>Wildlife</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteHazard[]' value='STRUCTURES' tabindex=62>Submerged Structures</td>");

#echo stripslashes("</tr>");





#echo ("<td><input type ='text' NAME='DiveSiteHazards' VALUE='$DiveSiteHazards'  SIZE='100' MAXLENGTH='100'  tabindex=19 id ='DiveSiteHazards' 
#   onBlur=\"if(isBlank(this.form.DiveSiteHazards.value)) {alert('DiveSiteHazards cannot be #blank');this.form.DiveSiteHazards.style.background='Yellow';}else{this.form.DiveSiteHazards.style.background='White';}\"><br></td>");
echo stripslashes("</tr></table></td>");

echo stripslashes("</tr>");
echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Hazards Notes</th>
<td><TEXTAREA READONLY NAME='DiveSiteHazardsNotes' COLS=100 ROW=3 TABINDEX=63>$DiveSiteHazardsNotes</TEXTAREA></td>");
echo stripslashes("</tr>");

echo("<tr><th valign='top' align ='left' scope='row'>Permit/Permission Required</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSitePermitRequired' VALUE='$DiveSitePermitRequired'  SIZE='50' MAXLENGTH='50'  tabindex=64 id ='DiveSitePermitRequired' 
   onBlur=\"if(isBlank(this.form.DiveSitePermitRequired.value)) {alert('DiveSitePermitRequired cannot be blank');this.form.DiveSitePermitRequired.style.background='Yellow';}else{this.form.DiveSitePermitRequired.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");


echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Time Restrictions</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteTimeRestrictions' VALUE='$DiveSiteTimeRestrictions'  SIZE='50' MAXLENGTH='50'  tabindex=65 id ='DiveSiteTimeRestrictions' 
   onBlur=\"if(isBlank(this.form.DiveSiteTimeRestrictions.value)) {alert('DiveSiteTimeRestrictions cannot be blank');this.form.DiveSiteTimeRestrictions.style.background='Yellow';}else{this.form.DiveSiteTimeRestrictions.style.background='White';}\"><br></td>");
echo stripslashes("</tr>");




echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Best Dive Months</th>");

echo("<td><table><tr>");




$tabcount=65;

	$numPossibleElements = count($siteMonthsArray);
	
	
$colcount=0;	
if(strlen($DiveSiteBestDiveMonths) !=0)
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	$colcount++;
 	  	if($colcount == 7){echo('</tr><tr>');}
 	  	if($DiveSiteBestDiveMonths[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'checkbox' DISABLED READONLY NAME='SiteMonths[]' value='".$siteMonthsArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteMonthsArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	$colcount=0;
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       $colcount++;
 	       if($colcount == 7){echo stripslashes('</tr><tr>');}
          
          echo stripslashes("<td><input type= 'checkbox' DISABLED READONLY NAME='SiteMonths[]'value='".$siteMonthsArray[$i]."'tabindex=".$tabcount.">".$siteMonthsArray[$i]."</td>");

       }
}









#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='JANUARY' tabindex=66>January</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='FEBRUARY'tabindex=67>February</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='MARCH'tabindex=68>March</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='APRIL' tabindex=69>April</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='MAY' checked tabindex=70>May</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='JUNE' checked tabindex=71>June</td>");
#echo stripslashes("<tr>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='JULY' checked tabindex=72>July</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='AUGUST'checked tabindex=73>August</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='SEPTEMBER' checked tabindex=74>September</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='OCTOBER' checked tabindex=75>October</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='NOVEMBER' tabindex=76>November</td>");
#echo stripslashes("<td><input type= 'checkbox' name='SiteMonths[]' value='DECEMBER' tabindex=77>December</td>");
echo stripslashes("</tr>");





#echo ("<td><input type ='text' NAME='DiveSiteBestDiveMonths' VALUE='$DiveSiteBestDiveMonths'  SIZE='15' MAXLENGTH='15'  tabindex=25 id ='DiveSiteBestDiveMonths' 
#   onBlur=\"if(isBlank(this.form.DiveSiteBestDiveMonths.value)) {alert('DiveSiteBestDiveMonths cannot be #blank');this.form.DiveSiteBestDiveMonths.style.background='Yellow';}else{this.form.DiveSiteBestDiveMonths.style.background='White';}\"><br></td>");

echo("</tr></table></td>");
echo stripslashes("</tr>");



echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Site Temperatures</th>");
echo stripslashes("<td colspan='7'><table><tr>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Winter&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteWinterTemp' VALUE='$DiveSiteWinterTemp'  SIZE='11' MAXLENGTH='11'  tabindex=78 id ='DiveSiteWinterTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteWinterTemp.value)) {alert('DiveSiteWinterTemp cannot be blank');this.form.DiveSiteWinterTemp.style.background='Yellow';}else{this.form.DiveSiteWinterTemp.style.background='White';}\"><br></td>");

echo stripslashes("<th valign='top' align ='left' scope='row'>&nbsp;&nbsp;Summer&nbsp;</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteSummerTemp' VALUE='$DiveSiteSummerTemp'  SIZE='11' MAXLENGTH='11'  tabindex=79 id ='DiveSiteSummerTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteSummerTemp.value)) {alert('DiveSiteSummerTemp cannot be blank');this.form.DiveSiteSummerTemp.style.background='Yellow';}else{this.form.DiveSiteSummerTemp.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Fall</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSiteFallTemp' VALUE='$DiveSiteFallTemp'  SIZE='11' MAXLENGTH='11'  tabindex=80 id ='DiveSiteFallTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteFallTemp.value)) {alert('DiveSiteFallTemp cannot be blank');this.form.DiveSiteFallTemp.style.background='Yellow';}else{this.form.DiveSiteFallTemp.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Spring</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSiteSpringTemp' VALUE='$DiveSiteSpringTemp'  SIZE='11' MAXLENGTH='11'  tabindex=81 id ='DiveSiteSpringTemp' 
   onBlur=\"if(isBlank(this.form.DiveSiteSpringTemp.value)) {alert('DiveSiteSpringTemp cannot be blank');this.form.DiveSiteSpringTemp.style.background='Yellow';}else{this.form.DiveSiteSpringTemp.style.background='White';}\"><br></td>");
   
   
echo stripslashes("<th valign='top' align ='left' scope='row'></th>");

echo stripslashes("<td><table><tr>");

$tabcount=81;

	$numPossibleElements = count($siteTempUnitsArray);
	
	
$colcount=0;	
if(strlen($DiveSiteTempUnits)!=0)
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	$colcount++;
 	  	if($colcount == 7){echo('</tr><tr>');}
 	  	if($DiveSiteTempUnits[$i]=="1") {$state='checked';}else{$state='';}
 	  	if($siteTempUnitsArray[$i]=='DEGREESF'){$display='&degF';} 
 	    if($siteTempUnitsArray[$i]=='DEGREESC'){$display='&degC';} 

 	  	echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteTempUnits[]' value='".$siteTempUnitsArray[$i]."'tabindex=".$tabcount." ".$state.">".$display."</td>");  
 	  }	
 	  	  	
 }
 	  
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($siteTempUnitsArray[$i]=='DEGREESF'){$state='checked';} else {$state='';}
 	  	   if($siteTempUnitsArray[$i]=='DEGREESF'){$display='&degF';} 
 	  	   if($siteTempUnitsArray[$i]=='DEGREESC'){$display='&degC';} 
          
           echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteTempUnits[]' value='".$siteTempUnitsArray[$i]."'tabindex=".$tabcount." ".$state.">".$display."</td>");  	
       }
}














#echo stripslashes("<td><input type= 'radio' name='SiteTempUnits[]' value='DEGREESF' checked tabindex=82>&degF</td>");
#echo stripslashes("<td><input type= 'radio' name='SiteTempUnits[]' value='DEGREESC' tabindex=83>&degC</td>");





#echo ("<td><input type ='text' NAME='DiveSiteTempUnits' VALUE='$DiveSiteTempUnits'  SIZE='12' MAXLENGTH='12'  tabindex=32 id ='DiveSiteTempUnits' 
#   onBlur=\"if(isBlank(this.form.DiveSiteTempUnits.value)) {alert('DiveSiteTempUnits cannot be #blank');this.form.DiveSiteTempUnits.style.background='Yellow';}else{this.form.DiveSiteTempUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr></table></td>");
echo stripslashes("</tr>");
echo stripslashes("</tr></table></td>");


echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Site Visibility</th>");
echo stripslashes("<td colspan='7'><table><tr>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Minimum</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteVisibilityMinimum' VALUE='$DiveSiteVisibilityMinimum'  SIZE='11' MAXLENGTH='11'  tabindex=84 id ='DiveSiteVisibilityMinimum' 
   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityMinimum.value)) {alert('DiveSiteVisibilityMinimum cannot be blank');this.form.DiveSiteVisibilityMinimum.style.background='Yellow';}else{this.form.DiveSiteVisibilityMinimum.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Maximum</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSiteVisibilityMaximum' VALUE='$DiveSiteVisibilityMaximum'  SIZE='11' MAXLENGTH='11'  tabindex=85 id ='DiveSiteVisibilityMaximum' 
   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityMaximum.value)) {alert('DiveSiteVisibilityMaximum cannot be blank');this.form.DiveSiteVisibilityMaximum.style.background='Yellow';}else{this.form.DiveSiteVisibilityMaximum.style.background='White';}\"><br></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'></th>");
echo stripslashes("<td><table><tr>");


$tabcount=85;

	$numPossibleElements = count($unitArray);
	
	
	
if(strlen($DiveSiteVisibilityUnits)!=0)
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	$colcount++;
 	  	if($colcount == 7){echo('</tr><tr>');}
 	  	if($DiveSiteVisibilityUnits[$i]=="1") {$state='checked';}else{$state='';}
 	  	

 	  	echo stripslashes("<td><input type= 'radio' DISABLED READONLY NAME='SiteVisibilityUnits[]' value='".$unitArray[$i]."'tabindex=".$tabcount." ".$state.">".$unitArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	      
          if($unitArray[$i]=="Feet"){$state='checked';} else {$state='';}
          echo stripslashes("<td><input type= 'radio'DISABLED READONLY NAME='SiteVisibilityUnits[]' value='".$unitArray[$i]."'tabindex=".$tabcount." ".$state.">".$unitArray[$i]."</td>");  

       }
}














#echo stripslashes("<td><input type= 'radio' name='SiteVisibilityUnits[]' value='FEET' checked tabindex=86>feet</td>");
#echo stripslashes("<td><input type= 'radio' name='SiteVisibilityUnits[]' value='METERS' tabindex=87>meters</td>");


#echo ("<td><input type ='text' NAME='DiveSiteVisibilityUnits' VALUE='$DiveSiteVisibilityUnits'  SIZE='15' MAXLENGTH='15'  tabindex=35 id ='DiveSiteVisibilityUnits' 
#   onBlur=\"if(isBlank(this.form.DiveSiteVisibilityUnits.value)) {alert('DiveSiteVisibilityUnits cannot be #blank');this.form.DiveSiteVisibilityUnits.style.background='Yellow';}else{this.form.DiveSiteVisibilityUnits.style.background='White';}\"><br></td>");
echo stripslashes("</tr></table></td>");
echo stripslashes("</tr>");


echo stripslashes("</tr></table></td>");


echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Site Facilities</th>");


$DisplayColumns=5; $colcount=0;
echo('<td><table>');
echo('<tr>');

$tabcount=90;

	$numPossibleElements = count($siteFacilitiesArray);
	
	
$colcount=0;	
if(strlen($DiveSiteFacilities) !=0)
 {
 	
 		for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	$colcount++;
 	  	if($colcount == 7){echo('</tr><tr>');}
 	  	if($DiveSiteFacilities[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'checkbox' DISABLED READONLY NAME='SiteFacilities[]' value='".$siteFacilitiesArray[$i]."'tabindex=".$tabcount." ".$state.">".$siteFacilitiesArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	$colcount=0;
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       $colcount++;
 	       if($colcount == 7){echo stripslashes('</tr><tr>');}
          
          echo stripslashes("<td><input type= 'checkbox' DISABLED READONLY NAME='SiteFacilities[]'value='".$siteFacilitiesArray[$i]."'tabindex=".$tabcount.">".$siteFacilitiesArray[$i]."</td>");

       }
}






 echo('</tr></table></td>');




#echo ("<td><input type ='text' READONLY NAME='DiveSiteFacilities' VALUE='$DiveSiteFacilities'  SIZE='50' MAXLENGTH='50'  tabindex=38 id ='DiveSiteFacilities' 
#   onBlur=\"if(isBlank(this.form.DiveSiteFacilities.value)) {alert('DiveSiteFacilities cannot be blank');this.form.DiveSiteFacilities.style.background='Yellow';}else{this.form.DiveSiteFacilities.style.background='White';}\"><br></td>");






echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Facilities Notes</th>
<td><TEXTAREA READONLY NAME='DiveSiteFacilitiesNotes' COLS=100 ROW=3 TABINDEX=110>$DiveSiteFacilitiesNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Recommendation Notes</th>
<td><TEXTAREA READONLY NAME='Site RecommendationNotes' COLS=100 ROW=3 TABINDEX=111>$DiveSiteRecommendationNotes</TEXTAREA></td>");
echo stripslashes("</tr>");

echo stripslashes("<tr style='outline: thin solid'><th bgcolor='#faa0f2' colspan=\"8\">Background Site Information</th></tr>");

echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Site WebPage</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSiteWebPage' VALUE='$DiveSiteWebPage'  SIZE='100' MAXLENGTH='150'  tabindex=112 id ='DiveSiteWebPage' 
   onBlur=\"if(isBlank(this.form.DiveSiteWebPage.value)) {alert('DiveSiteWebPage cannot be blank');this.form.DiveSiteWebPage.style.background='Yellow';}else{this.form.DiveSiteWebPage.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Site Background</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSiteBackground' VALUE='$DiveSiteBackground'  SIZE='100' MAXLENGTH='150'  tabindex=113 id ='DiveSiteBackground' 
   onBlur=\"if(isBlank(this.form.DiveSiteBackground.value)) {alert('DiveSiteBackground cannot be blank');this.form.DiveSiteBackground.style.background='Yellow';}else{this.form.DiveSiteBackground.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Site EAP Id</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSiteEAPId' VALUE='$DiveSiteEAPId'  SIZE='8' MAXLENGTH='8'  tabindex=114 id ='DiveSiteEAPId' 
   onBlur=\"if(isBlank(this.form.DiveSiteEAPId.value)) {alert('DiveSiteEAPId cannot be blank');this.form.DiveSiteEAPId.style.background='Yellow';}else{this.form.DiveSiteEAPId.style.background='White';}\"><br></td>");
echo stripslashes("</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
<td colspan =2 align='center'>



<input type ='SUBMIT' NAME='display_button' Value = 'Return'>
<input type ='SUBMIT' NAME='display_button' Value = 'Edit'>
<input type ='SUBMIT' NAME='display_button' Value = 'Delete'>
</td>
</td>
</tr>
</TABLE>
</td></tr></TABLE>
</FORM>");}
#--------------------------Initialize Variables---------------------------------------

function InitializeVariables()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;

global $unitArray,$postElevUnitArray;
global $siteTypeArray, $postSiteTypeArray;
global $siteRatingArray,$postSiteRatingArray;
global $siteLevelArray,$postSiteLevelArray;
global $siteDifficultyArray,$postSiteDifficultyArray;
global $siteWaterTypeArray, $postSiteWaterTypeArray;
global $postSiteDepthUnitsArray;
global $siteBottomCompositionArray,$postSiteBottomCompositionArray;
global $siteHazardArray, $postSiteHazardArray;
global $siteMonthsArray, $postSiteMonthsArray;
global $siteTempUnitsArray, $postTempUnitsArray;
global $postSiteVisibilityUnits;

$DiveSiteId='TBD';
$DiveSiteStatus='';
$DiveSiteEnteredBy='';
$DiveSiteDateEntered='';
$DiveSiteCity='';
$DiveSiteProvince='';
$DiveSiteCountry='';
$DiveSiteName='';
$DiveSiteMajorName='';
$DiveSiteMinorName='';
$DiveSiteRating='';
$DiveSiteElevation='';
$DiveSiteElevationUnits='';
$DiveSiteWater='';
$DiveSiteDepthMin='';
$DiveSiteDepthMax='';
$DiveSiteDepthUnits='';
$DiveSiteBottomComposition='';
$DiveSiteHazards='';
$DiveSiteHazardsNotes='';
$DiveSiteType='';
$DiveSiteLevel='';
$DiveSiteDifficulty='';
$DiveSiteTideTable='';
$DiveSiteBestDiveMonths='';
$DiveSiteTimeRestrictions='';
$DiveSitePermitRequired='';
$DiveSiteWinterTemp='';
$DiveSiteSummerTemp='';
$DiveSiteFallTemp='';
$DiveSiteSpringTemp='';
$DiveSiteTempUnits='';
$DiveSiteVisibilityMinimum='';
$DiveSiteVisibilityMaximum='';
$DiveSiteVisibilityUnits='';
$DiveSiteFacilities='';
$DiveSiteFacilitiesNotes='';
$DiveSiteRecommendationNotes='';
$DiveSiteNotes='';
$DiveSiteExactLat='';
$DiveSiteExactLong='';
$DiveSiteShoreLat='';
$DiveSiteShoreLong='';
$DiveSiteShoreNotes='';
$DiveSiteWebPage='';
$DiveSiteBackground='';
$DiveSiteEAPId='';


unset($GLOBAL['postElevUnitArray']);
unset($GLOBAL['postSiteTypeArray']);
unset($GLOBAL['postSiteRatingArray']);
unset($GLOBAL['postSiteLevelArray']);
unset($GLOBAL['postSiteDifficultyArray']);
unset($GLOBAL['postSiteWaterTypeArray']);
unset($GLOBAL['postSiteDepthUnitsArray']);
unset($GLOBAL['postSiteHazardArray']);
unset($GLOBAL['postSiteMonthsArray']);
unset($GLOBAL['postSiteTempUnitsArray']);
unset($GLOBAL['postSiteVisibilityUnitsArray']);
unset($GLOBAL['postSiteFacilitiesArray']);

return;
}
#----------------------------Get Next Record in Database -----------------------------------

function Db_Next()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
if($NumDiveSiteRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSite where(DiveSiteStatus > '".strip_tags(addslashes($DiveSiteStatus))."') order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite Select * failure");
$NumDiveSiteRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteId=$rowdata[0];
$DiveSiteStatus=$rowdata[1];
$DiveSiteEnteredBy=$rowdata[2];
$DiveSiteDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteRating=$rowdata[10];
$DiveSiteElevation=$rowdata[11];
$DiveSiteElevationUnits=$rowdata[12];
$DiveSiteWater=$rowdata[13];
$DiveSiteDepthMin=$rowdata[14];
$DiveSiteDepthMax=$rowdata[15];
$DiveSiteDepthUnits=$rowdata[16];
$DiveSiteBottomComposition=$rowdata[17];
$DiveSiteHazards=$rowdata[18];
$DiveSiteHazardsNotes=$rowdata[19];
$DiveSiteType=$rowdata[20];
$DiveSiteLevel=$rowdata[21];
$DiveSiteDifficulty=$rowdata[22];
$DiveSiteTideTable=$rowdata[23];
$DiveSiteBestDiveMonths=$rowdata[24];
$DiveSiteTimeRestrictions=$rowdata[25];
$DiveSitePermitRequired=$rowdata[26];
$DiveSiteWinterTemp=$rowdata[27];
$DiveSiteSummerTemp=$rowdata[28];
$DiveSiteFallTemp=$rowdata[29];
$DiveSiteSpringTemp=$rowdata[30];
$DiveSiteTempUnits=$rowdata[31];
$DiveSiteVisibilityMinimum=$rowdata[32];
$DiveSiteVisibilityMaximum=$rowdata[33];
$DiveSiteVisibilityUnits=$rowdata[34];
$DiveSiteFacilities=$rowdata[35];
$DiveSiteFacilitiesNotes=$rowdata[36];
$DiveSiteRecommendationNotes=$rowdata[37];
$DiveSiteNotes=$rowdata[38];
$DiveSiteExactLat=$rowdata[39];
$DiveSiteExactLong=$rowdata[40];
$DiveSiteShoreLat=$rowdata[41];
$DiveSiteShoreLong=$rowdata[42];
$DiveSiteShoreNotes=$rowdata[43];
$DiveSiteWebPage=$rowdata[44];
$DiveSiteBackground=$rowdata[45];
$DiveSiteEAPId=$rowdata[46];
}
else
{
$sql="select * from DiveSite order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite Select * failure");
$NumDiveSiteRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteId=$rowdata[0];
$DiveSiteStatus=$rowdata[1];
$DiveSiteEnteredBy=$rowdata[2];
$DiveSiteDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteRating=$rowdata[10];
$DiveSiteElevation=$rowdata[11];
$DiveSiteElevationUnits=$rowdata[12];
$DiveSiteWater=$rowdata[13];
$DiveSiteDepthMin=$rowdata[14];
$DiveSiteDepthMax=$rowdata[15];
$DiveSiteDepthUnits=$rowdata[16];
$DiveSiteBottomComposition=$rowdata[17];
$DiveSiteHazards=$rowdata[18];
$DiveSiteHazardsNotes=$rowdata[19];
$DiveSiteType=$rowdata[20];
$DiveSiteLevel=$rowdata[21];
$DiveSiteDifficulty=$rowdata[22];
$DiveSiteTideTable=$rowdata[23];
$DiveSiteBestDiveMonths=$rowdata[24];
$DiveSiteTimeRestrictions=$rowdata[25];
$DiveSitePermitRequired=$rowdata[26];
$DiveSiteWinterTemp=$rowdata[27];
$DiveSiteSummerTemp=$rowdata[28];
$DiveSiteFallTemp=$rowdata[29];
$DiveSiteSpringTemp=$rowdata[30];
$DiveSiteTempUnits=$rowdata[31];
$DiveSiteVisibilityMinimum=$rowdata[32];
$DiveSiteVisibilityMaximum=$rowdata[33];
$DiveSiteVisibilityUnits=$rowdata[34];
$DiveSiteFacilities=$rowdata[35];
$DiveSiteFacilitiesNotes=$rowdata[36];
$DiveSiteRecommendationNotes=$rowdata[37];
$DiveSiteNotes=$rowdata[38];
$DiveSiteExactLat=$rowdata[39];
$DiveSiteExactLong=$rowdata[40];
$DiveSiteShoreLat=$rowdata[41];
$DiveSiteShoreLong=$rowdata[42];
$DiveSiteShoreNotes=$rowdata[43];
$DiveSiteWebPage=$rowdata[44];
$DiveSiteBackground=$rowdata[45];
$DiveSiteEAPId=$rowdata[46];
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
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
if($NumDiveSiteRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSite where(DiveSiteStatus < '".strip_tags(addslashes($DiveSiteStatus))."') order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite Select * failure");
$NumDiveSiteRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteId=$rowdata[0];
$DiveSiteStatus=$rowdata[1];
$DiveSiteEnteredBy=$rowdata[2];
$DiveSiteDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteRating=$rowdata[10];
$DiveSiteElevation=$rowdata[11];
$DiveSiteElevationUnits=$rowdata[12];
$DiveSiteWater=$rowdata[13];
$DiveSiteDepthMin=$rowdata[14];
$DiveSiteDepthMax=$rowdata[15];
$DiveSiteDepthUnits=$rowdata[16];
$DiveSiteBottomComposition=$rowdata[17];
$DiveSiteHazards=$rowdata[18];
$DiveSiteHazardsNotes=$rowdata[19];
$DiveSiteType=$rowdata[20];
$DiveSiteLevel=$rowdata[21];
$DiveSiteDifficulty=$rowdata[22];
$DiveSiteTideTable=$rowdata[23];
$DiveSiteBestDiveMonths=$rowdata[24];
$DiveSiteTimeRestrictions=$rowdata[25];
$DiveSitePermitRequired=$rowdata[26];
$DiveSiteWinterTemp=$rowdata[27];
$DiveSiteSummerTemp=$rowdata[28];
$DiveSiteFallTemp=$rowdata[29];
$DiveSiteSpringTemp=$rowdata[30];
$DiveSiteTempUnits=$rowdata[31];
$DiveSiteVisibilityMinimum=$rowdata[32];
$DiveSiteVisibilityMaximum=$rowdata[33];
$DiveSiteVisibilityUnits=$rowdata[34];
$DiveSiteFacilities=$rowdata[35];
$DiveSiteFacilitiesNotes=$rowdata[36];
$DiveSiteRecommendationNotes=$rowdata[37];
$DiveSiteNotes=$rowdata[38];
$DiveSiteExactLat=$rowdata[39];
$DiveSiteExactLong=$rowdata[40];
$DiveSiteShoreLat=$rowdata[41];
$DiveSiteShoreLong=$rowdata[42];
$DiveSiteShoreNotes=$rowdata[43];
$DiveSiteWebPage=$rowdata[44];
$DiveSiteBackground=$rowdata[45];
$DiveSiteEAPId=$rowdata[46];
}
}
else
{
$sql="select * from DiveSite order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite Select * failure");
$NumDiveSiteRecordsDesired = mysql_num_rows($result);
if($NumDiveSiteRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSiteRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSiteId=$rowdata[0];
$DiveSiteStatus=$rowdata[1];
$DiveSiteEnteredBy=$rowdata[2];
$DiveSiteDateEntered=$rowdata[3];
$DiveSiteCity=$rowdata[4];
$DiveSiteProvince=$rowdata[5];
$DiveSiteCountry=$rowdata[6];
$DiveSiteName=$rowdata[7];
$DiveSiteMajorName=$rowdata[8];
$DiveSiteMinorName=$rowdata[9];
$DiveSiteRating=$rowdata[10];
$DiveSiteElevation=$rowdata[11];
$DiveSiteElevationUnits=$rowdata[12];
$DiveSiteWater=$rowdata[13];
$DiveSiteDepthMin=$rowdata[14];
$DiveSiteDepthMax=$rowdata[15];
$DiveSiteDepthUnits=$rowdata[16];
$DiveSiteBottomComposition=$rowdata[17];
$DiveSiteHazards=$rowdata[18];
$DiveSiteHazardsNotes=$rowdata[19];
$DiveSiteType=$rowdata[20];
$DiveSiteLevel=$rowdata[21];
$DiveSiteDifficulty=$rowdata[22];
$DiveSiteTideTable=$rowdata[23];
$DiveSiteBestDiveMonths=$rowdata[24];
$DiveSiteTimeRestrictions=$rowdata[25];
$DiveSitePermitRequired=$rowdata[26];
$DiveSiteWinterTemp=$rowdata[27];
$DiveSiteSummerTemp=$rowdata[28];
$DiveSiteFallTemp=$rowdata[29];
$DiveSiteSpringTemp=$rowdata[30];
$DiveSiteTempUnits=$rowdata[31];
$DiveSiteVisibilityMinimum=$rowdata[32];
$DiveSiteVisibilityMaximum=$rowdata[33];
$DiveSiteVisibilityUnits=$rowdata[34];
$DiveSiteFacilities=$rowdata[35];
$DiveSiteFacilitiesNotes=$rowdata[36];
$DiveSiteRecommendationNotes=$rowdata[37];
$DiveSiteNotes=$rowdata[38];
$DiveSiteExactLat=$rowdata[39];
$DiveSiteExactLong=$rowdata[40];
$DiveSiteShoreLat=$rowdata[41];
$DiveSiteShoreLong=$rowdata[42];
$DiveSiteShoreNotes=$rowdata[43];
$DiveSiteWebPage=$rowdata[44];
$DiveSiteBackground=$rowdata[45];
$DiveSiteEAPId=$rowdata[46];
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
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$DiveSiteId=$_SESSION['DiveSiteId'];
$sql="update DiveSite SET ";
$sql=$sql."DiveSiteStatus='".strip_tags(addslashes($DiveSiteStatus))."',";
$sql=$sql."DiveSiteEnteredBy='".strip_tags(addslashes($DiveSiteEnteredBy))."',";
$sql=$sql."DiveSiteDateEntered='".strip_tags(addslashes($DiveSiteDateEntered))."',";
$sql=$sql."DiveSiteCity='".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."DiveSiteProvince='".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."DiveSiteCountry='".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."DiveSiteName='".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."DiveSiteMajorName='".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."DiveSiteMinorName='".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."DiveSiteRating='".strip_tags(addslashes($DiveSiteRating))."',";
$sql=$sql."DiveSiteElevation='".strip_tags(addslashes($DiveSiteElevation))."',";
$sql=$sql."DiveSiteElevationUnits='".strip_tags(addslashes($DiveSiteElevationUnits))."',";
$sql=$sql."DiveSiteWater='".strip_tags(addslashes($DiveSiteWater))."',";
$sql=$sql."DiveSiteDepthMin='".strip_tags(addslashes($DiveSiteDepthMin))."',";
$sql=$sql."DiveSiteDepthMax='".strip_tags(addslashes($DiveSiteDepthMax))."',";
$sql=$sql."DiveSiteDepthUnits='".strip_tags(addslashes($DiveSiteDepthUnits))."',";
$sql=$sql."DiveSiteBottomComposition='".strip_tags(addslashes($DiveSiteBottomComposition))."',";
$sql=$sql."DiveSiteHazards='".strip_tags(addslashes($DiveSiteHazards))."',";
$sql=$sql."DiveSiteHazardsNotes='".strip_tags(addslashes($DiveSiteHazardsNotes))."',";
$sql=$sql."DiveSiteType='".strip_tags(addslashes($DiveSiteType))."',";
$sql=$sql."DiveSiteLevel='".strip_tags(addslashes($DiveSiteLevel))."',";
$sql=$sql."DiveSiteDifficulty='".strip_tags(addslashes($DiveSiteDifficulty))."',";
$sql=$sql."DiveSiteTideTable='".strip_tags(addslashes($DiveSiteTideTable))."',";
$sql=$sql."DiveSiteBestDiveMonths='".strip_tags(addslashes($DiveSiteBestDiveMonths))."',";
$sql=$sql."DiveSiteTimeRestrictions='".strip_tags(addslashes($DiveSiteTimeRestrictions))."',";
$sql=$sql."DiveSitePermitRequired='".strip_tags(addslashes($DiveSitePermitRequired))."',";
$sql=$sql."DiveSiteWinterTemp='".strip_tags(addslashes($DiveSiteWinterTemp))."',";
$sql=$sql."DiveSiteSummerTemp='".strip_tags(addslashes($DiveSiteSummerTemp))."',";
$sql=$sql."DiveSiteFallTemp='".strip_tags(addslashes($DiveSiteFallTemp))."',";
$sql=$sql."DiveSiteSpringTemp='".strip_tags(addslashes($DiveSiteSpringTemp))."',";
$sql=$sql."DiveSiteTempUnits='".strip_tags(addslashes($DiveSiteTempUnits))."',";
$sql=$sql."DiveSiteVisibilityMinimum='".strip_tags(addslashes($DiveSiteVisibilityMinimum))."',";
$sql=$sql."DiveSiteVisibilityMaximum='".strip_tags(addslashes($DiveSiteVisibilityMaximum))."',";
$sql=$sql."DiveSiteVisibilityUnits='".strip_tags(addslashes($DiveSiteVisibilityUnits))."',";
$sql=$sql."DiveSiteFacilities='".strip_tags(addslashes($DiveSiteFacilities))."',";
$sql=$sql."DiveSiteFacilitiesNotes='".strip_tags(addslashes($DiveSiteFacilitiesNotes))."',";
$sql=$sql."DiveSiteRecommendationNotes='".strip_tags(addslashes($DiveSiteRecommendationNotes))."',";
$sql=$sql."DiveSiteNotes='".strip_tags(addslashes($DiveSiteNotes))."',";
$sql=$sql."DiveSiteExactLat='".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."DiveSiteExactLong='".strip_tags(addslashes($DiveSiteExactLong))."',";
$sql=$sql."DiveSiteShoreLat='".strip_tags(addslashes($DiveSiteShoreLat))."',";
$sql=$sql."DiveSiteShoreLong='".strip_tags(addslashes($DiveSiteShoreLong))."',";
$sql=$sql."DiveSiteShoreNotes='".strip_tags(addslashes($DiveSiteShoreNotes))."',";
$sql=$sql."DiveSiteWebPage='".strip_tags(addslashes($DiveSiteWebPage))."',";
$sql=$sql."DiveSiteBackground='".strip_tags(addslashes($DiveSiteBackground))."',";
$sql=$sql."DiveSiteEAPId='".strip_tags(addslashes($DiveSiteEAPId))."' where DiveSiteId='".$DiveSiteId."'"; 
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite DATA failure");
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#-----------------------------Print Out Current Form Variables--------------------------

function PrintFormVars()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
OutputMessage('NumDiveSiteRecords: '.$NumDiveSiteRecords);
OutputMessage('DiveSiteId: '.$DiveSiteId);
OutputMessage('DiveSiteStatus: '.$DiveSiteStatus);
OutputMessage('DiveSiteEnteredBy: '.$DiveSiteEnteredBy);
OutputMessage('DiveSiteDateEntered: '.$DiveSiteDateEntered);
OutputMessage('DiveSiteCity: '.$DiveSiteCity);
OutputMessage('DiveSiteProvince: '.$DiveSiteProvince);
OutputMessage('DiveSiteCountry: '.$DiveSiteCountry);
OutputMessage('DiveSiteName: '.$DiveSiteName);
OutputMessage('DiveSiteMajorName: '.$DiveSiteMajorName);
OutputMessage('DiveSiteMinorName: '.$DiveSiteMinorName);
OutputMessage('DiveSiteRating: '.$DiveSiteRating);
OutputMessage('DiveSiteElevation: '.$DiveSiteElevation);
OutputMessage('DiveSiteElevationUnits: '.$DiveSiteElevationUnits);
OutputMessage('DiveSiteWater: '.$DiveSiteWater);
OutputMessage('DiveSiteDepthMin: '.$DiveSiteDepthMin);
OutputMessage('DiveSiteDepthMax: '.$DiveSiteDepthMax);
OutputMessage('DiveSiteDepthUnits: '.$DiveSiteDepthUnits);
OutputMessage('DiveSiteBottomComposition: '.$DiveSiteBottomComposition);
OutputMessage('DiveSiteHazards: '.$DiveSiteHazards);
OutputMessage('DiveSiteHazardsNotes: '.$DiveSiteHazardsNotes);
OutputMessage('DiveSiteType: '.$DiveSiteType);
OutputMessage('DiveSiteLevel: '.$DiveSiteLevel);
OutputMessage('DiveSiteDifficulty: '.$DiveSiteDifficulty);
OutputMessage('DiveSiteTideTable: '.$DiveSiteTideTable);
OutputMessage('DiveSiteBestDiveMonths: '.$DiveSiteBestDiveMonths);
OutputMessage('DiveSiteTimeRestrictions: '.$DiveSiteTimeRestrictions);
OutputMessage('DiveSitePermitRequired: '.$DiveSitePermitRequired);
OutputMessage('DiveSiteWinterTemp: '.$DiveSiteWinterTemp);
OutputMessage('DiveSiteSummerTemp: '.$DiveSiteSummerTemp);
OutputMessage('DiveSiteFallTemp: '.$DiveSiteFallTemp);
OutputMessage('DiveSiteSpringTemp: '.$DiveSiteSpringTemp);
OutputMessage('DiveSiteTempUnits: '.$DiveSiteTempUnits);
OutputMessage('DiveSiteVisibilityMinimum: '.$DiveSiteVisibilityMinimum);
OutputMessage('DiveSiteVisibilityMaximum: '.$DiveSiteVisibilityMaximum);
OutputMessage('DiveSiteVisibilityUnits: '.$DiveSiteVisibilityUnits);
OutputMessage('DiveSiteFacilities: '.$DiveSiteFacilities);
OutputMessage('DiveSiteFacilitiesNotes: '.$DiveSiteFacilitiesNotes);
OutputMessage('DiveSiteRecommendationNotes: '.$DiveSiteRecommendationNotes);
OutputMessage('DiveSiteNotes: '.$DiveSiteNotes);
OutputMessage('DiveSiteExactLat: '.$DiveSiteExactLat);
OutputMessage('DiveSiteExactLong: '.$DiveSiteExactLong);
OutputMessage('DiveSiteShoreLat: '.$DiveSiteShoreLat);
OutputMessage('DiveSiteShoreLong: '.$DiveSiteShoreLong);
OutputMessage('DiveSiteShoreNotes: '.$DiveSiteShoreNotes);
OutputMessage('DiveSiteWebPage: '.$DiveSiteWebPage);
OutputMessage('DiveSiteBackground: '.$DiveSiteBackground);
OutputMessage('DiveSiteEAPId: '.$DiveSiteEAPId);
return;
}
#-----------------------------Database Add Function---------------------------------------

function Db_Add()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="insert into DiveSite(DiveSiteStatus,DiveSiteEnteredBy,DiveSiteDateEntered,DiveSiteCity,DiveSiteProvince,DiveSiteCountry,DiveSiteName,DiveSiteMajorName,DiveSiteMinorName,DiveSiteRating,DiveSiteElevation,DiveSiteElevationUnits,DiveSiteWater,DiveSiteDepthMin,DiveSiteDepthMax,DiveSiteDepthUnits,DiveSiteBottomComposition,DiveSiteHazards,DiveSiteHazardsNotes,DiveSiteType,DiveSiteLevel,DiveSiteDifficulty,DiveSiteTideTable,DiveSiteBestDiveMonths,DiveSiteTimeRestrictions,DiveSitePermitRequired,DiveSiteWinterTemp,DiveSiteSummerTemp,DiveSiteFallTemp,DiveSiteSpringTemp,DiveSiteTempUnits,DiveSiteVisibilityMinimum,DiveSiteVisibilityMaximum,DiveSiteVisibilityUnits,DiveSiteFacilities,DiveSiteFacilitiesNotes,DiveSiteRecommendationNotes,DiveSiteNotes,DiveSiteExactLat,DiveSiteExactLong,DiveSiteShoreLat,DiveSiteShoreLong,DiveSiteShoreNotes,DiveSiteWebPage,DiveSiteBackground,DiveSiteEAPId) values (";
$sql=$sql."'".strip_tags(addslashes($DiveSiteStatus))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteEnteredBy))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteDateEntered))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCity))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteProvince))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteCountry))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMajorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteMinorName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteRating))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteElevation))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteElevationUnits))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteWater))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteDepthMin))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteDepthMax))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteDepthUnits))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteBottomComposition))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteHazards))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteHazardsNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteType))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteLevel))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteDifficulty))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteTideTable))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteBestDiveMonths))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteTimeRestrictions))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSitePermitRequired))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteWinterTemp))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteSummerTemp))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteFallTemp))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteSpringTemp))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteTempUnits))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteVisibilityMinimum))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteVisibilityMaximum))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteVisibilityUnits))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteFacilities))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteFacilitiesNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteRecommendationNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLat))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteExactLong))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteShoreLat))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteShoreLong))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteShoreNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteWebPage))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteBackground))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSiteEAPId))."')";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite ADD failure");
$DiveSiteId=mysql_insert_id($connection);
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#----------------------------Database Delete Function------------------------------------

function Db_Delete()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="delete from DiveSite where DiveSiteId='".$DiveSiteId."'";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite DELETE failure");
mysql_close($connection);
return;
}
#-----------------------------Get Current Number of Records -----------------------------

function CurrentNumberRecords()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSite order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite GetNumRecs failure");
$NumDiveSiteRecords = mysql_num_rows($result);
mysql_close($connection);
return;
}

#------------------------------List Menu of Records in Database ---------------------

function ListMenu()
 { 
global $user, $serverhost,$db,$password;
$_SESSION['DiveSiteId']='00000000';
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSite order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite GetNumRecs failure");
$NumDiveSiteRecords = mysql_num_rows($result);
mysql_close($connection);
echo "<form name='ListMenu' action='DiveSite.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<input type='hidden' name='check' id='check'>";

echo "<tr><td colspan='10' align='center'>

<input type ='SUBMIT' NAME='display_button' Value = 'Add'>";
echo "</td></tr>";


echo "<tr>";
echo "<td align='center' ><b>DiveSiteId</b></td>";
echo "<td align='center' ><b>DiveSiteStatus</b></td>";

echo "<td align='center' ><b>DiveEntered</b></td>";
#echo "<td align='center' ><b>DiveSiteDateEntered</b></td>";

echo "<td align='center' ><b>Location</b></td>";
#echo "<td align='center' ><b>DiveSiteProvince</b></td>";
#echo "<td align='center' ><b>DiveSiteCountry</b></td>";

echo "<td align='center' ><b>Dive SiteName </b></td>";
#echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
#echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
echo "<tr>";
echo "<td align='center'><input type=radio id='SelectRecord' NAME='SelectRecord' VALUE='".$rowdata[0]."' onClick=\"document.forms.ListMenu.display_button.value = 'Display';document.forms.ListMenu.check.value = 'Display';document.forms.ListMenu.submit();\" >&nbsp; </td>";
echo "<td align='left'>".$rowdata[1]."&nbsp;</td>";

echo "<td align='center'>".$rowdata[2]."&nbsp;<br>".$rowdata[3]."</td>";
#echo "<td align='left'>".$rowdata[3]."&nbsp; </td>";

echo "<td align='center'>".$rowdata[4].",&nbsp;".$rowdata[5]."<br>".$rowdata[6]."</td>";
#echo "<td align='left'>".$rowdata[5]."&nbsp; </td>";
#echo "<td align='left'>".$rowdata[6]."&nbsp; </td>";

echo "<td align='center'>".$rowdata[7].",&nbsp;".$rowdata[8]."<br>".$rowdata[9]."</td>";
#echo "<td align='left'>".$rowdata[8]."&nbsp; </td>";
#echo "<td align='left'>".$rowdata[9]."&nbsp; </td>";
echo "</tr>";
}
echo "<tr><td colspan='10' align='center'>

<input type ='SUBMIT' NAME='display_button' Value = 'Add'>";
echo "</td></tr>";
echo '</table>';
echo '</form>';
return;
}







#------------------------------Screen Report of Records in Database ---------------------

function ListRecords()
 { 
global $user, $serverhost,$db,$password;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSite order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite GetNumRecs failure");
$NumDiveSiteRecords = mysql_num_rows($result);
echo "<form action='DiveSite.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSiteId</b></td>";
echo "<td align='center' ><b>DiveSiteStatus</b></td>";
echo "<td align='center' ><b>DiveSiteEnteredBy</b></td>";
echo "<td align='center' ><b>DiveSiteDateEntered</b></td>";
echo "<td align='center' ><b>DiveSiteCity</b></td>";
echo "<td align='center' ><b>DiveSiteProvince</b></td>";
echo "<td align='center' ><b>DiveSiteCountry</b></td>";
echo "<td align='center' ><b>DiveSiteName</b></td>";
echo "<td align='center' ><b>DiveSiteMajorName</b></td>";
echo "<td align='center' ><b>DiveSiteMinorName</b></td>";
echo "<td align='center' ><b>DiveSiteRating</b></td>";
echo "<td align='center' ><b>DiveSiteElevation</b></td>";
echo "<td align='center' ><b>DiveSiteElevationUnits</b></td>";
echo "<td align='center' ><b>DiveSiteWater</b></td>";
echo "<td align='center' ><b>DiveSiteDepthMin</b></td>";
echo "<td align='center' ><b>DiveSiteDepthMax</b></td>";
echo "<td align='center' ><b>DiveSiteDepthUnits</b></td>";
echo "<td align='center' ><b>DiveSiteBottomComposition</b></td>";
echo "<td align='center' ><b>DiveSiteHazards</b></td>";
echo "<td align='center' ><b>DiveSiteHazardsNotes</b></td>";
echo "<td align='center' ><b>DiveSiteType</b></td>";
echo "<td align='center' ><b>DiveSiteLevel</b></td>";
echo "<td align='center' ><b>DiveSiteDifficulty</b></td>";
echo "<td align='center' ><b>DiveSiteTideTable</b></td>";
echo "<td align='center' ><b>DiveSiteBestDiveMonths</b></td>";
echo "<td align='center' ><b>DiveSiteTimeRestrictions</b></td>";
echo "<td align='center' ><b>DiveSitePermitRequired</b></td>";
echo "<td align='center' ><b>DiveSiteWinterTemp</b></td>";
echo "<td align='center' ><b>DiveSiteSummerTemp</b></td>";
echo "<td align='center' ><b>DiveSiteFallTemp</b></td>";
echo "<td align='center' ><b>DiveSiteSpringTemp</b></td>";
echo "<td align='center' ><b>DiveSiteTempUnits</b></td>";
echo "<td align='center' ><b>DiveSiteVisibilityMinimum</b></td>";
echo "<td align='center' ><b>DiveSiteVisibilityMaximum</b></td>";
echo "<td align='center' ><b>DiveSiteVisibilityUnits</b></td>";
echo "<td align='center' ><b>DiveSiteFacilities</b></td>";
echo "<td align='center' ><b>DiveSiteFacilitiesNotes</b></td>";
echo "<td align='center' ><b>DiveSiteRecommendationNotes</b></td>";
echo "<td align='center' ><b>DiveSiteNotes</b></td>";
echo "<td align='center' ><b>DiveSiteExactLat</b></td>";
echo "<td align='center' ><b>DiveSiteExactLong</b></td>";
echo "<td align='center' ><b>DiveSiteShoreLat</b></td>";
echo "<td align='center' ><b>DiveSiteShoreLong</b></td>";
echo "<td align='center' ><b>DiveSiteShoreNotes</b></td>";
echo "<td align='center' ><b>DiveSiteWebPage</b></td>";
echo "<td align='center' ><b>DiveSiteBackground</b></td>";
echo "<td align='center' ><b>DiveSiteEAPId</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSiteRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
echo "<tr>";
echo "<td align='center'>".$rowdata[0]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[1]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[2]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[3]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[4]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[5]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[6]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[7]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[8]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[9]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[10]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[11]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[12]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[13]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[14]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[15]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[16]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[17]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[18]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[19]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[20]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[21]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[22]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[23]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[24]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[25]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[26]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[27]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[28]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[29]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[30]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[31]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[32]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[33]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[34]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[35]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[36]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[37]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[38]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[39]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[40]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[41]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[42]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[43]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[44]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[45]."&nbsp; </td>";
echo "<td align='center'>".$rowdata[46]."&nbsp; </td>";
echo "</tr>";
}
echo "<tr><td colspan='47' align='center'><input type ='SUBMIT' NAME='display_button' Value = 'Back to Main'></td></tr>";
echo '</table>';
echo '</form>';
mysql_close($connection);
return;
}
#----------------------------Initialize Program Start ---------------------------------------

function InitializeProgram()
 { 
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSite order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite InitializeProgram failure");
$NumDiveSiteRecords = mysql_num_rows($result);
if($NumDiveSiteRecords==0)
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
global $db, $user, $serverhost, $password;
global $NumDiveSiteRecords,$DiveSiteId,$DiveSiteStatus,$DiveSiteEnteredBy,$DiveSiteDateEntered;
global $DiveSiteCity,$DiveSiteProvince,$DiveSiteCountry,$DiveSiteName,$DiveSiteMajorName;
global $DiveSiteMinorName,$DiveSiteRating,$DiveSiteElevation,$DiveSiteElevationUnits,$DiveSiteWater;
global $DiveSiteDepthMin,$DiveSiteDepthMax,$DiveSiteDepthUnits,$DiveSiteBottomComposition;
global $DiveSiteHazards,$DiveSiteHazardsNotes,$DiveSiteType,$DiveSiteLevel,$DiveSiteDifficulty;
global $DiveSiteTideTable,$DiveSiteBestDiveMonths,$DiveSiteTimeRestrictions,$DiveSitePermitRequired;
global $DiveSiteWinterTemp,$DiveSiteSummerTemp,$DiveSiteFallTemp,$DiveSiteSpringTemp,$DiveSiteTempUnits;
global $DiveSiteVisibilityMinimum,$DiveSiteVisibilityMaximum,$DiveSiteVisibilityUnits,$DiveSiteFacilities;
global $DiveSiteFacilitiesNotes,$DiveSiteRecommendationNotes,$DiveSiteNotes,$DiveSiteExactLat;
global $DiveSiteExactLong,$DiveSiteShoreLat,$DiveSiteShoreLong,$DiveSiteShoreNotes,$DiveSiteWebPage;
global $DiveSiteBackground,$DiveSiteEAPId;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to aquatreasurequest database');
$sql="select * from DiveSite where(DiveSiteStatus ='".strip_tags(addslashes($DiveSiteStatus))."') order by DiveSiteStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSite Select * failure");
$NumDiveSiteRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSiteRecordsDesired>0)
{return FALSE;}
  else
{return TRUE;}
}
#----------------------------Main Program--------------------------------------------

echo "<html>
<head><title>".$table." Maintenance</title>
<h4><center>".$table." Maintenance</center></h4>

<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"CalendarPopup.js\"></SCRIPT>
	<SCRIPT LANGUAGE=\"JavaScript\">
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


<style>
th [colspan=\"8\"] {
    text-align: center;
}
</style>







</head>";
echo "<body bgcolor ='".$BackgroundColor."' onLoad=\"parent.showframe.location.href='EmptyFrame.php';parent.navframe.location.href='DiveSitesSystemNavFrame.php';\">";

  CurrentNumberRecords();
 
  if ($_POST)
   { 
     CurrentNumberRecords();
     GetVariablesFromSession();
     
      if($_POST['check']!='Display')
      {$Action=$_POST['display_button'];}
     else
      {$Action=$_POST['check'];}  
      
#   echo('AT MENU: '.$Action.' '.$_POST['SelectRecord'].'<br>');
   
 # $Action=$_POST['display_button'];
   
      switch($Action)
         {
             case 'Add':
               
               InitializeVariables();
               AddForm();
               break;
               
             case 'Display':
             
#               echo('at display');
             
               $DesiredRecord=$_POST['SelectRecord'];
               GetLoadDesiredRecord();
               DisplayForm();
               break;            

             case 'Edit':
              $DesiredRecord=$_POST['SelectRecord']; 
               GetLoadDesiredRecord();
               EditForm();
               break;  

             case 'Delete':
              $DesiredRecord=$_POST['SelectRecord'];
               GetLoadDesiredRecord();
               Db_Delete();
               InitializeProgram();
               DisplayForm();
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
               DisplayForm();
               break;
  
           case 'Submit Add':
               
               
            
               
               GetPostVariables();    #--- At end of this - we have the data ready for database processing
               
               
#               if(ValidUniqueCode())
#                 {  
                   Db_Add();
                   DisplayForm();
#                 }
#               else
#                 {
#                   $_SESSION['SystemMessage']='Code already on file!! Choose another.';
#                   AddForm();
#                 }      
               
               break;
    
          case 'Cancel Add':
                   CurrentNumberRecords();
                   GetVariablesFromSession();
                   DisplayForm();
                   break;

          case 'List Records':
                   ListRecords();
                   break;

         case 'Back':
                  header("Location: $CallingProgram");
                  break;                  


        


            default:
               ListMenu();
             #  DisplayForm();
               break;   
         }  

   }
   else
   {
        InitializeProgram();
 #       DisplayForm();
         ListMenu();
   }
echo"
</body>
</html>"
?>
