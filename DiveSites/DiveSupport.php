<?php
session_start();
require_once('SystemFunctions.php');
//ValidUserForProgram($_SESSION['User'],'DiveSupport.php');

 //$Add=$_SESSION['Add'];

 //$Edit=$_SESSION['Edit'];

 //$Delete=$_SESSION['Delete'];

 //$Search=$_SESSION['Search'];

 //$Start=$_SESSION['Start'];

// $Expiry=$_SESSION['Expiry']; $Expiry=$_SESSION['Expiry'];

 if(($_POST['display_button']=='Back')||($_POST['display_button']=='Logout'))
  { 
      header('Location: DiveSite.php');
  } 
  
$_SESSION['DiveSiteId'] = '00000000';  
  
$db="divesites";
$table="DiveSupport";

$facilityTypeArray=array("Dive Shop","Firehall","Commercial Dive Operation","Independent Supplier","Dive Club","Other (Notes)");
$facilityServicesArray=array("Air fills","Enriched Air","Trimix","Argon","Oxygen Fills","Equipment Rental","Equipment Service","Equipment Sales","Local Tours","Travel Services","Accommodations","Dive Information","Dive Instruction","PADI","NAUI","SSI","SDI","TDI","CMAS","BSAC","PSI","Other (Notes)");
$facilityPhoneTypeArray=array("Landline","Cell-text","Cell","FAX");




$siteProvinceArray=array("Alberta","British Columbia","Saskatchewan","Manitoba","Ontario","Quebec","Prince Edward Island","New Brunswick","Nova Scotia","Newfoundland","Northwest Territories","Yukon","Nunavut",
"Alabama","Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois","Indiana", "Iowa", "Kansas", "Kentucky", 
"Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana","Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", 
"North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania","Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", 
"Wisconsin", "Wyoming");
$siteCountryArray=array("Canada","United States");
$SiteCityArray=array("Calgary","Red Deer","Banff","Edmonton","Lethbridge","Medecine Hat","Waterton","Jasper","Pincher Creek","Hinton");

$CallingProgram="index.php";
#-------------------------Get a Desired Record -------------------------
 $Expiry=$_SESSION['Expiry'];
function GetLoadDesiredRecord()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
global $DesiredRecord;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSupport where(DiveSupportId = '".strip_tags(addslashes($DesiredRecord))."') order by DiveSupportId";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSupport Select * failure");
$NumDiveSupportRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSupportRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSupportId=$rowdata[0];
$DiveSupportStatus=$rowdata[1];
$DiveSupportType=$rowdata[2];
$DiveSupportName=$rowdata[3];
$DiveSupportAddress1=$rowdata[4];
$DiveSupportAddress2=$rowdata[5];
$DiveSupportCity=$rowdata[6];
$DiveSupportProvince=$rowdata[7];
$DiveSupportCountry=$rowdata[8];
$DiveSupportPhone1=$rowdata[9];
$DiveSupportPhone1Type=$rowdata[10];
$DiveSupportPhone2=$rowdata[11];
$DiveSupportPhone2Type=$rowdata[12];
$DiveSupportPhone3=$rowdata[13];
$DiveSupportPhone3Type=$rowdata[14];
$DiveSupportWebsite=$rowdata[15];
$DiveSupportEmail=$rowdata[16];
$DiveSupportExactLat=$rowdata[17];
$DiveSupportExactLong=$rowdata[18];
$DiveSupportHoursMon=$rowdata[19];
$DiveSupportHoursTues=$rowdata[20];
$DiveSupportHoursWed=$rowdata[21];
$DiveSupportHoursThu=$rowdata[22];
$DiveSupportHoursFri=$rowdata[23];
$DiveSupportHoursSat=$rowdata[24];
$DiveSupportHoursSun=$rowdata[25];
$DiveSupportServices=$rowdata[26];
$DiveSupportSuppliersNote=$rowdata[27];
$DiveSupportNotes=$rowdata[28];
$DiveSupportPaidDate=$rowdata[29];
$DiveSupportPCZip=$rowdata[30];
}
PutVariablesIntoSession();
return;
}
#-------------------------Transfer Screen to Session Variables--------------------------

function PutVariablesIntoSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
$_SESSION['DiveSupportId'] = $DiveSupportId;
$_SESSION['DiveSupportStatus'] = $DiveSupportStatus;
$_SESSION['DiveSupportType'] = $DiveSupportType;
$_SESSION['DiveSupportName'] = $DiveSupportName;
$_SESSION['DiveSupportAddress1'] = $DiveSupportAddress1;
$_SESSION['DiveSupportAddress2'] = $DiveSupportAddress2;
$_SESSION['DiveSupportCity'] = $DiveSupportCity;
$_SESSION['DiveSupportProvince'] = $DiveSupportProvince;
$_SESSION['DiveSupportCountry'] = $DiveSupportCountry;
$_SESSION['DiveSupportPhone1'] = $DiveSupportPhone1;
$_SESSION['DiveSupportPhone1Type'] = $DiveSupportPhone1Type;
$_SESSION['DiveSupportPhone2'] = $DiveSupportPhone2;
$_SESSION['DiveSupportPhone2Type'] = $DiveSupportPhone2Type;
$_SESSION['DiveSupportPhone3'] = $DiveSupportPhone3;
$_SESSION['DiveSupportPhone3Type'] = $DiveSupportPhone3Type;
$_SESSION['DiveSupportWebsite'] = $DiveSupportWebsite;
$_SESSION['DiveSupportEmail'] = $DiveSupportEmail;
$_SESSION['DiveSupportExactLat'] = $DiveSupportExactLat;
$_SESSION['DiveSupportExactLong'] = $DiveSupportExactLong;
$_SESSION['DiveSupportHoursMon'] = $DiveSupportHoursMon;
$_SESSION['DiveSupportHoursTues'] = $DiveSupportHoursTues;
$_SESSION['DiveSupportHoursWed'] = $DiveSupportHoursWed;
$_SESSION['DiveSupportHoursThu'] = $DiveSupportHoursThu;
$_SESSION['DiveSupportHoursFri'] = $DiveSupportHoursFri;
$_SESSION['DiveSupportHoursSat'] = $DiveSupportHoursSat;
$_SESSION['DiveSupportHoursSun'] = $DiveSupportHoursSun;
$_SESSION['DiveSupportServices'] = $DiveSupportServices;
$_SESSION['DiveSupportSuppliersNote'] = $DiveSupportSuppliersNote;
$_SESSION['DiveSupportNotes'] = $DiveSupportNotes;
$_SESSION['DiveSupportPaidDate'] = $DiveSupportPaidDate;
$_SESSION['DiveSupportPCZip']=$DiveSupportPCZip;
return;
}

#--------------------Transfer POST to screen variables ----------------------------------

function GetPostVariables()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;

global $facilityTypeArray,$facilityServicesArray;
global $siteProvinceArray,$siteCountryArray;
global $facilityPhoneTypeArray;





$DiveSupportId=$_POST['DiveSupportId'];
$DiveSupportStatus=$_POST['DiveSupportStatus'];
$DiveSupportType=$_POST['DiveSupportType'];
$DiveSupportName=$_POST['DiveSupportName'];
$DiveSupportAddress1=$_POST['DiveSupportAddress1'];
$DiveSupportAddress2=$_POST['DiveSupportAddress2'];
$DiveSupportCity=$_POST['DiveSupportCity'];
$DiveSupportProvince=$_POST['DiveSupportProvince'];
$DiveSupportCountry=$_POST['DiveSupportCountry'];
$DiveSupportPhone1=$_POST['DiveSupportPhone1'];
$DiveSupportPhone1Type=$_POST['DiveSupportPhone1Type'];
$DiveSupportPhone2=$_POST['DiveSupportPhone2'];
$DiveSupportPhone2Type=$_POST['DiveSupportPhone2Type'];
$DiveSupportPhone3=$_POST['DiveSupportPhone3'];
$DiveSupportPhone3Type=$_POST['DiveSupportPhone3Type'];
$DiveSupportWebsite=$_POST['DiveSupportWebsite'];
$DiveSupportEmail=$_POST['DiveSupportEmail'];
$DiveSupportExactLat=$_POST['DiveSupportExactLat'];
$DiveSupportExactLong=$_POST['DiveSupportExactLong'];
$DiveSupportHoursMon=$_POST['DiveSupportHoursMon'];
$DiveSupportHoursTues=$_POST['DiveSupportHoursTues'];
$DiveSupportHoursWed=$_POST['DiveSupportHoursWed'];
$DiveSupportHoursThu=$_POST['DiveSupportHoursThu'];
$DiveSupportHoursFri=$_POST['DiveSupportHoursFri'];
$DiveSupportHoursSat=$_POST['DiveSupportHoursSat'];
$DiveSupportHoursSun=$_POST['DiveSupportHoursSun'];
$DiveSupportServices=$_POST['DiveSupportServices'];
$DiveSupportSuppliersNote=$_POST['DiveSupportSuppliersNote'];
$DiveSupportNotes=$_POST['DiveSupportNotes'];
$DiveSupportPaidDate=$_POST['DiveSupportPaidDate'];
$DiveSupportPCZip=$_POST['DiveSupportPCZip'];



if(isset($_POST['SupportType'])){
	
	
	
	 $postSiteTypeArray=$_POST['SupportType'];
	 
	 	$numElementsPosted=count($postSiteTypeArray);
 	  $numPossibleElements=count($facilityTypeArray);
 	
//	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	

   $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postSiteTypeArray[$j] == $facilityTypeArray[$i]) {$processArray[$i]='1';}
 	  		
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
	
	 
	 $DiveSupportType=$createdString;
	 	 
	
}	


if(isset($_POST['SupportPhone1Type'])){
	
	
	
	 $postSiteTypeArray=$_POST['SupportPhone1Type'];
	 
	 	$numElementsPosted=count($postSiteTypeArray);
 	  $numPossibleElements=count($facilityPhoneTypeArray);
 	
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
 	  		if($postSiteTypeArray[$j] == $facilityPhoneTypeArray[$i]) {$processArray[$i]='1';}
 	  		
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
	
	 
	 $DiveSupportPhone1Type=$createdString;
	 	 
	
}	


if(isset($_POST['SupportPhone2Type'])){
	
	
	
	 $postSiteTypeArray=$_POST['SupportPhone2Type'];
	 
	 	$numElementsPosted=count($postSiteTypeArray);
 	  $numPossibleElements=count($facilityPhoneTypeArray);
 	
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
 	  		if($postSiteTypeArray[$j] == $facilityPhoneTypeArray[$i]) {$processArray[$i]='1';}
 	  		
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
	
	 
	 $DiveSupportPhone2Type=$createdString;
	 	 
	
}	





if(isset($_POST['SupportPhone3Type'])){
	
	
	
	 $postSiteTypeArray=$_POST['SupportPhone3Type'];
	 
	 	$numElementsPosted=count($postSiteTypeArray);
 	  $numPossibleElements=count($facilityPhoneTypeArray);
 	
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
 	  		if($postSiteTypeArray[$j] == $facilityPhoneTypeArray[$i]) {$processArray[$i]='1';}
 	  		
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
	
	 
	 $DiveSupportPhone3Type=$createdString;
	 	 
	
}	

if(isset($_POST['SupportServices'])){
	
	
	
	 $postSiteTypeArray=$_POST['SupportServices'];
	 
	 	$numElementsPosted=count($postSiteTypeArray);
 	  $numPossibleElements=count($facilityServicesArray);
 	
//	 echo('<br>in isset'. 	$numElementsPosted.'  '.$numPossibleElements);	

   $processArray=array();
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	  $processArray[$i]='0';               #create  array to hold what has been selected
 	  }	
 	  
 	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	
 	  	for($j=0;$j < $numElementsPosted; $j++)
 	  	{
 	  		if($postSiteTypeArray[$j] == $facilityServicesArray[$i]) {$processArray[$i]='1';}
 	  		
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
	
	 
	 $DiveSupportServices=$createdString;
	 	 
	
}	















return;
}

#-----------------------Transfer Session Variables to Screen variables---------------------

function GetVariablesFromSession()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
$DiveSupportId=$_SESSION['DiveSupportId'];
$DiveSupportStatus=$_SESSION['DiveSupportStatus'];
$DiveSupportType=$_SESSION['DiveSupportType'];
$DiveSupportName=$_SESSION['DiveSupportName'];
$DiveSupportAddress1=$_SESSION['DiveSupportAddress1'];
$DiveSupportAddress2=$_SESSION['DiveSupportAddress2'];
$DiveSupportCity=$_SESSION['DiveSupportCity'];
$DiveSupportProvince=$_SESSION['DiveSupportProvince'];
$DiveSupportCountry=$_SESSION['DiveSupportCountry'];
$DiveSupportPhone1=$_SESSION['DiveSupportPhone1'];
$DiveSupportPhone1Type=$_SESSION['DiveSupportPhone1Type'];
$DiveSupportPhone2=$_SESSION['DiveSupportPhone2'];
$DiveSupportPhone2Type=$_SESSION['DiveSupportPhone2Type'];
$DiveSupportPhone3=$_SESSION['DiveSupportPhone3'];
$DiveSupportPhone3Type=$_SESSION['DiveSupportPhone3Type'];
$DiveSupportWebsite=$_SESSION['DiveSupportWebsite'];
$DiveSupportEmail=$_SESSION['DiveSupportEmail'];
$DiveSupportExactLat=$_SESSION['DiveSupportExactLat'];
$DiveSupportExactLong=$_SESSION['DiveSupportExactLong'];
$DiveSupportHoursMon=$_SESSION['DiveSupportHoursMon'];
$DiveSupportHoursTues=$_SESSION['DiveSupportHoursTues'];
$DiveSupportHoursWed=$_SESSION['DiveSupportHoursWed'];
$DiveSupportHoursThu=$_SESSION['DiveSupportHoursThu'];
$DiveSupportHoursFri=$_SESSION['DiveSupportHoursFri'];
$DiveSupportHoursSat=$_SESSION['DiveSupportHoursSat'];
$DiveSupportHoursSun=$_SESSION['DiveSupportHoursSun'];
$DiveSupportServices=$_SESSION['DiveSupportServices'];
$DiveSupportSuppliersNote=$_SESSION['DiveSupportSuppliersNote'];
$DiveSupportNotes=$_SESSION['DiveSupportNotes'];
$DiveSupportPaidDate=$_SESSION['DiveSupportPaidDate'];
$DiveSupportPCZip=$_SESSION['DiveSupportPCZip'];
return;
}

#----------------------------Get Last Database Record-----------------------------------------
function GetLastRecord($conn,$result)
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
for($i=1;$i<=$NumDiveSupportRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSupportId=$rowdata[0];
$DiveSupportStatus=$rowdata[1];
$DiveSupportType=$rowdata[2];
$DiveSupportName=$rowdata[3];
$DiveSupportAddress1=$rowdata[4];
$DiveSupportAddress2=$rowdata[5];
$DiveSupportCity=$rowdata[6];
$DiveSupportProvince=$rowdata[7];
$DiveSupportCountry=$rowdata[8];
$DiveSupportPhone1=$rowdata[9];
$DiveSupportPhone1Type=$rowdata[10];
$DiveSupportPhone2=$rowdata[11];
$DiveSupportPhone2Type=$rowdata[12];
$DiveSupportPhone3=$rowdata[13];
$DiveSupportPhone3Type=$rowdata[14];
$DiveSupportWebsite=$rowdata[15];
$DiveSupportEmail=$rowdata[16];
$DiveSupportExactLat=$rowdata[17];
$DiveSupportExactLong=$rowdata[18];
$DiveSupportHoursMon=$rowdata[19];
$DiveSupportHoursTues=$rowdata[20];
$DiveSupportHoursWed=$rowdata[21];
$DiveSupportHoursThu=$rowdata[22];
$DiveSupportHoursFri=$rowdata[23];
$DiveSupportHoursSat=$rowdata[24];
$DiveSupportHoursSun=$rowdata[25];
$DiveSupportServices=$rowdata[26];
$DiveSupportSuppliersNote=$rowdata[27];
$DiveSupportNotes=$rowdata[28];
$DiveSupportPaidDate=$rowdata[29];
$DiveSupportPCZip=$rowdata[30];
}
PutVariablesIntoSession();
return;
}
#----------------------------Common Form-----------------------------------------------------
function CommonForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
global $Mode;
global $facilityTypeArray,$facilityServicesArray;
global $siteProvinceArray,$siteCountryArray;
global $facilityPhoneTypeArray;





echo stripslashes("
<TABLE border='1' align='center'><tr><td>
<TABLE border='1' align='center' cellspacing='5'>
<tr><th>Support Facility</th><td colspan='5'><table><th valign='top' align ='left' scope='row'>Id</th>
<td><input type ='text' NAME='DiveSupportId' VALUE='$DiveSupportId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSupportId' READONLY><br /></td>

<th valign='top' align ='left' scope='row'>Status</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSupportStatus' VALUE='$DiveSupportStatus'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSupportStatus' 
   onBlur=\"if(isBlank(this.form.DiveSupportStatus.value)) {alert('DiveSupportStatus cannot be blank');this.form.DiveSupportStatus.style.background='Yellow';}else{this.form.DiveSupportStatus.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' NAME='DiveSupportStatus' VALUE='$DiveSupportStatus'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSupportStatus' 
   onBlur=\"if(isBlank(this.form.DiveSupportStatus.value)) {alert('DiveSupportStatus cannot be blank');this.form.DiveSupportStatus.style.background='Yellow';}else{this.form.DiveSupportStatus.style.background='White';}\"><br /></td>");}
echo("</table></td></tr>");


echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Type</th><td colspan='5'><table><tr>");


$tabcount=2;
	$numPossibleElements = count($facilityTypeArray);
	
	
	
if(strlen($DiveSupportType)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportType[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' name='SupportType[]' value='".$facilityTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityTypeArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityTypeArray[$i] == 'Dive Shop') {$state='checked';} else {$state='';}
          
          echo stripslashes("<td><input type= 'radio' name='SupportType[]' value='".$facilityTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityTypeArray[$i]."&nbsp;&nbsp;</td>");

       }
}


//echo ("<td><input type ='text' NAME='DiveSupportType' VALUE='$DiveSupportType'  SIZE='10' MAXLENGTH='10'  tabindex='3' id ='DiveSupportType' 
//   onBlur=\"if(isBlank(this.form.DiveSupportType.value)) {alert('DiveSupportType cannot be blank');this.form.DiveSupportType.style.background='Yellow';}else{this.form.DiveSupportType.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");


echo("<tr><th valign='top' align ='left' scope='row'>Name</th>");
echo ("<td><input type ='text' NAME='DiveSupportName' VALUE='$DiveSupportName'  SIZE='100' MAXLENGTH='100'  tabindex='4' id ='DiveSupportName' 
   onBlur=\"if(isBlank(this.form.DiveSupportName.value)) {alert('DiveSupportName cannot be blank');this.form.DiveSupportName.style.background='Yellow';}else{this.form.DiveSupportName.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("<tr><th valign='top' align ='left' scope='row'>Address 1</th>");

echo ("<td><input type ='text' NAME='DiveSupportAddress1' VALUE='$DiveSupportAddress1'  SIZE='100' MAXLENGTH='100'  tabindex='5' id ='DiveSupportAddress1' 
   onBlur=\"if(isBlank(this.form.DiveSupportAddress1.value)) {alert('DiveSupportAddress1 cannot be blank');this.form.DiveSupportAddress1.style.background='Yellow';}else{this.form.DiveSupportAddress1.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("<tr><th valign='top' align ='left' scope='row'>Address 2</th>");
echo ("<td><input type ='text' NAME='DiveSupportAddress2' VALUE='$DiveSupportAddress2'  SIZE='100' MAXLENGTH='100'  tabindex='6' id ='DiveSupportAddress2' 
   onBlur=\"if(isBlank(this.form.DiveSupportAddress2.value)) {alert('DiveSupportAddress2 cannot be blank');this.form.DiveSupportAddress2.style.background='Yellow';}else{this.form.DiveSupportAddress2.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("<tr><th valign='top' align ='left' scope='row'>City</th>");
echo("<td colspan='5'><table><tr>");
echo ("<td><input type ='text' NAME='DiveSupportCity' VALUE='$DiveSupportCity'  SIZE='25' MAXLENGTH='25'  tabindex='7' id ='DiveSupportCity' 
   onBlur=\"if(isBlank(this.form.DiveSupportCity.value)) {alert('DiveSupportCity cannot be blank');this.form.DiveSupportCity.style.background='Yellow';}else{this.form.DiveSupportCity.style.background='White';}\"><br /></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Province</th>");



$array_length = count($siteProvinceArray);
echo('<td>');
echo('<select name="DiveSiteProvince" tabindex=7 id="DiveSiteProvince" VALUE="$DiveSiteProvince">');
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




//echo ("<td><input type ='text' NAME='DiveSupportProvince' VALUE='$DiveSupportProvince'  SIZE='25' MAXLENGTH='25'  tabindex='8' id ='DiveSupportProvince' 
//   onBlur=\"if(isBlank(this.form.DiveSupportProvince.value)) {alert('DiveSupportProvince cannot be blank');this.form.DiveSupportProvince.style.background='Yellow';}else{this.form.DiveSupportProvince.style.background='White';}\"><br /></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Country</th>");

$array_length = count($siteCountryArray);
echo('<td>');
echo('<select name="DiveSiteCountry" tabindex=8 id="DiveSiteProvince" VALUE="$DiveSiteCountry">');
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

echo("<th valign='top' align ='left' scope='row'>PC/Zip:</th>");
echo ("<td><input type ='text' NAME='DiveSupportPCZip' VALUE='$DiveSupportPCZip'  SIZE='10' MAXLENGTH='10'  tabindex='9' id ='DiveSupportPCZip' 
   onBlur=\"if(isBlank(this.form.DiveSupportPCZip.value)) {alert('DiveSupportPCZip cannot be blank');this.form.DiveSupportPCZip1.style.background='Yellow';}else{this.form.DiveSupportPCZip.style.background='White';}\"><br /></td>");



//echo ("<td><input type ='text' NAME='DiveSupportCountry' VALUE='$DiveSupportCountry'  SIZE='25' MAXLENGTH='25'  tabindex='9' id ='DiveSupportCountry' 
//   onBlur=\"if(isBlank(this.form.DiveSupportCountry.value)) {alert('DiveSupportCountry cannot be blank');this.form.DiveSupportCountry.style.background='Yellow';}else{this.form.DiveSupportCountry.style.background='White';}\"><br /></td>");

echo stripslashes("</tr>");
echo("</table></td>");


echo("<tr><th>Phones:<br>FORMAT: ###-###-####</th><td colspan ='5'><table>");
echo("<tr><th valign='top' align ='left' scope='row'>Phone 1</th>");
echo ("<td><input type ='text' NAME='DiveSupportPhone1' VALUE='$DiveSupportPhone1'  SIZE='15' MAXLENGTH='15'  tabindex='10' id ='DiveSupportPhone1' 
   onBlur=\"if(isBlank(this.form.DiveSupportPhone1.value)) {alert('DiveSupportPhone1 cannot be blank');this.form.DiveSupportPhone1.style.background='Yellow';}else{this.form.DiveSupportPhone1.style.background='White';}\"><br /></td>");

$tabcount=10;
	$numPossibleElements = count($facilityPhoneTypeArray);
	
	
echo("<td>");	
if(strlen($DiveSupportPhone1Type)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportPhone1Type[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<input type= 'radio' name='SupportPhone1Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityPhoneTypeArray[$i] == 'Landline') {$state='checked';} else {$state='';}
          
          echo stripslashes("<input type= 'radio' name='SupportPhone1Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");

       }
}

echo("</td>");



//echo ("<td><input type ='text' NAME='DiveSupportPhone1Type' VALUE='$DiveSupportPhone1Type'  SIZE='15' MAXLENGTH='15'  tabindex='11' id ='DiveSupportPhone1Type' 
//   onBlur=\"if(isBlank(this.form.DiveSupportPhone1Type.value)) {alert('DiveSupportPhone1Type cannot be blank');this.form.DiveSupportPhone1Type.style.background='Yellow';}else{this.form.DiveSupportPhone1Type.style.background='White';}\"><br /></td>");

echo("</tr>");
echo("<tr>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Phone2</th>");
echo ("<td><input type ='text' NAME='DiveSupportPhone2' VALUE='$DiveSupportPhone2'  SIZE='15' MAXLENGTH='15'  tabindex='12' id ='DiveSupportPhone2' 
   onBlur=\"if(isBlank(this.form.DiveSupportPhone2.value)) {alert('DiveSupportPhone2 cannot be blank');this.form.DiveSupportPhone2.style.background='Yellow';}else{this.form.DiveSupportPhone2.style.background='White';}\"><br /></td>");

$tabcount=12;
	$numPossibleElements = count($facilityPhoneTypeArray);
	
	
echo("<td>");	
if(strlen($DiveSupportPhone2Type)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportPhone2Type[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<input type= 'radio' name='SupportPhone2Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityPhoneTypeArray[$i] == 'Cell-text') {$state='checked';} else {$state='';}
          
          echo stripslashes("<input type= 'radio' name='SupportPhone2Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");

       }
}

echo("</td>");

//echo ("<td><input type ='text' NAME='DiveSupportPhone2Type' VALUE='$DiveSupportPhone2Type'  SIZE='15' MAXLENGTH='15'  tabindex='13' id ='DiveSupportPhone2Type' 
//   onBlur=\"if(isBlank(this.form.DiveSupportPhone2Type.value)) {alert('DiveSupportPhone2Type cannot be blank');this.form.DiveSupportPhone2Type.style.background='Yellow';}else{this.form.DiveSupportPhone2Type.style.background='White';}\"><br /></td>");
echo("</tr>");

echo("<tr>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Phone3</th>");
echo ("<td><input type ='text' NAME='DiveSupportPhone3' VALUE='$DiveSupportPhone3'  SIZE='15' MAXLENGTH='15'  tabindex='14' id ='DiveSupportPhone3' 
   onBlur=\"if(isBlank(this.form.DiveSupportPhone3.value)) {alert('DiveSupportPhone3 cannot be blank');this.form.DiveSupportPhone3.style.background='Yellow';}else{this.form.DiveSupportPhone3.style.background='White';}\"><br /></td>");
$tabcount=14;
	$numPossibleElements = count($facilityPhoneTypeArray);
	
	
echo("<td>");	
if(strlen($DiveSupportPhone3Type)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportPhone3Type[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<input type= 'radio' name='SupportPhone3Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityPhoneTypeArray[$i] == 'Cell') {$state='checked';} else {$state='';}
          
          echo stripslashes("<input type= 'radio' name='SupportPhone3Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");

       }
}

echo("</td>");






//echo ("<td><input type ='text' NAME='DiveSupportPhone3Type' VALUE='$DiveSupportPhone3Type'  SIZE='15' MAXLENGTH='15'  tabindex='15' id ='DiveSupportPhone3Type' 
//   onBlur=\"if(isBlank(this.form.DiveSupportPhone3Type.value)) {alert('DiveSupportPhone3Type cannot be blank');this.form.DiveSupportPhone3Type.style.background='Yellow';}else{this.form.DiveSupportPhone3Type.style.background='White';}\"><br /></td>");
echo("</tr>");

echo stripslashes("</tr>");
echo ("</table></td></tr>");

echo("<tr><th valign='top' align ='center' scope='row'>Website</th>
");
echo ("<td><input type ='text' NAME='DiveSupportWebsite' VALUE='$DiveSupportWebsite'  SIZE='100' MAXLENGTH='150'  tabindex='16' id ='DiveSupportWebsite' 
   onBlur=\"if(isBlank(this.form.DiveSupportWebsite.value)) {alert('DiveSupportWebsite cannot be blank');this.form.DiveSupportWebsite.style.background='Yellow';}else{this.form.DiveSupportWebsite.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='center' scope='row'>Email</th>
");
echo ("<td><input type ='text' NAME='DiveSupportEmail' VALUE='$DiveSupportEmail'  SIZE='100' MAXLENGTH='150'  tabindex='17' id ='DiveSupportEmail' 
   onBlur=\"if(isBlank(this.form.DiveSupportEmail.value)) {alert('DiveSupportEmail cannot be blank');this.form.DiveSupportEmail.style.background='Yellow';}else{this.form.DiveSupportEmail.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");

echo("<tr><th>Location:</th><td colspan ='5'><table>");
echo("<tr><th valign='top' align ='left' scope='row'>Latitude</th>");
echo ("<td><input type ='text' NAME='DiveSupportExactLat' VALUE='$DiveSupportExactLat'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='18' id ='DiveSupportExactLat' 
   onBlur=\"if(isBlank(this.form.DiveSupportExactLat.value)) {alert('DiveSupportExactLat cannot be blank');this.form.DiveSupportExactLat.style.background='Yellow';}else{this.form.DiveSupportExactLat.style.background='White';}\"><br /></td>");

echo stripslashes("<th valign='top' align ='left' scope='row'>Longitude</th>");
echo ("<td><input type ='text' NAME='DiveSupportExactLong' VALUE='$DiveSupportExactLong'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='13' id ='DiveSupportExactLong' 
   onBlur=\"if(isBlank(this.form.DiveSupportExactLong.value)) {alert('DiveSupportExactLong cannot be blank');this.form.DiveSupportExactLong.style.background='Yellow';}else{this.form.DiveSupportExactLong.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");

echo("<tr><th>Hours of Operation<br>24 hour clock: ####-####</td></th><td colspan='5'><table>");
echo("<tr><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th><th>Sunday</th><tr>");
// echo("<tr><th valign='top' align ='left' scope='row'>DiveSupportHoursMon</th>");
echo("<tr>");
echo ("<td><input type ='text' NAME='DiveSupportHoursMon' VALUE='$DiveSupportHoursMon'  SIZE='10' MAXLENGTH='10'  tabindex='14' id ='DiveSupportHoursMon' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursMon.value)) {alert('DiveSupportHoursMon cannot be blank');this.form.DiveSupportHoursMon.style.background='Yellow';}else{this.form.DiveSupportHoursMon.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursTues</th>");
echo ("<td><input type ='text' NAME='DiveSupportHoursTues' VALUE='$DiveSupportHoursTues'  SIZE='10' MAXLENGTH='10'  tabindex='15' id ='DiveSupportHoursTues' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursTues.value)) {alert('DiveSupportHoursTues cannot be blank');this.form.DiveSupportHoursTues.style.background='Yellow';}else{this.form.DiveSupportHoursTues.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursWed</th>");
echo ("<td><input type ='text' NAME='DiveSupportHoursWed' VALUE='$DiveSupportHoursWed'  SIZE='10' MAXLENGTH='10'  tabindex='16' id ='DiveSupportHoursWed' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursWed.value)) {alert('DiveSupportHoursWed cannot be blank');this.form.DiveSupportHoursWed.style.background='Yellow';}else{this.form.DiveSupportHoursWed.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursThu</th>");
echo ("<td><input type ='text' NAME='DiveSupportHoursThu' VALUE='$DiveSupportHoursThu'  SIZE='10' MAXLENGTH='10'  tabindex='17' id ='DiveSupportHoursThu' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursThu.value)) {alert('DiveSupportHoursThu cannot be blank');this.form.DiveSupportHoursThu.style.background='Yellow';}else{this.form.DiveSupportHoursThu.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursFri</th>");
echo ("<td><input type ='text' NAME='DiveSupportHoursFri' VALUE='$DiveSupportHoursFri'  SIZE='10' MAXLENGTH='10'  tabindex='18' id ='DiveSupportHoursFri' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursFri.value)) {alert('DiveSupportHoursFri cannot be blank');this.form.DiveSupportHoursFri.style.background='Yellow';}else{this.form.DiveSupportHoursFri.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursSat</th>");
echo ("<td><input type ='text' NAME='DiveSupportHoursSat' VALUE='$DiveSupportHoursSat'  SIZE='10' MAXLENGTH='10'  tabindex='19' id ='DiveSupportHoursSat' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursSat.value)) {alert('DiveSupportHoursSat cannot be blank');this.form.DiveSupportHoursSat.style.background='Yellow';}else{this.form.DiveSupportHoursSat.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursSun</th>");
echo ("<td><input type ='text' NAME='DiveSupportHoursSun' VALUE='$DiveSupportHoursSun'  SIZE='10' MAXLENGTH='10'  tabindex='20' id ='DiveSupportHoursSun' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursSun.value)) {alert('DiveSupportHoursSun cannot be blank');this.form.DiveSupportHoursSun.style.background='Yellow';}else{this.form.DiveSupportHoursSun.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");

echo("<tr><th valign='top' align ='left' scope='row'>DiveSupportServices</th>");
echo("<td colspan='5'><table><tr>");
$tabcount=20;
	$numPossibleElements = count($facilityServicesArray);
	

	
if(strlen($DiveSupportServices)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportServices[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'checkbox' name='SupportServices[]' value='".$facilityServicesArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityServicesArray[$i]."</td>");  
 	    if($facilityServicesArray[$i] == 'Oxygen Fills'){echo('<tr>');}
 	    if($facilityServicesArray[$i] == 'Equipment Sales'){echo('</tr><tr>');}
 	    if($facilityServicesArray[$i] == 'Dive Information'){echo('</tr><tr>');}
 	    if($facilityServicesArray[$i] == 'Dive Instruction'){echo('</tr><tr><td colspan=6><table><tr><td>');}
 	    if($facilityServicesArray[$i] == 'PSI'){echo('</td></tr></table></td></tr><tr>');}
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityServicesArray[$i] == '') {$state='checked';} else {$state='';}
          
          echo stripslashes("<td><input type= 'checkbox' name='SupportServices[]' value='".$facilityServicesArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityServicesArray[$i]."&nbsp;&nbsp;</td>");
         if($facilityServicesArray[$i] == 'Oxygen Fills'){echo('<tr>');}
 	       if($facilityServicesArray[$i] == 'Equipment Sales'){echo('</tr><tr>');}
 	       if($facilityServicesArray[$i] == 'Dive Information'){echo('</tr><tr>');}
 	       if($facilityServicesArray[$i] == 'Dive Instruction'){echo('</tr><tr><td colspan=6><table><tr><td>');}
 	       if($facilityServicesArray[$i] == 'PSI'){echo('</td></tr></table></td></tr><tr>');}
       }
  }
echo('</tr>');
 
//echo ("<td><input type ='text' NAME='DiveSupportServices' VALUE='$DiveSupportServices'  SIZE='25' MAXLENGTH='25'  tabindex='21' id ='DiveSupportServices' 
//   onBlur=\"if(isBlank(this.form.DiveSupportServices.value)) {alert('DiveSupportServices cannot be blank');this.form.DiveSupportServices.style.background='Yellow';}else{this.form.DiveSupportServices.style.background='White';}\"><br /></td>");

echo stripslashes("</tr></table></td>");
echo("<tr><th valign='top' align ='left' scope='row'>Suppliers/Brands</th>");
echo("<td><TEXTAREA NAME='DiveSupportSuppliersNote' COLS=100 ROW=3 TABINDEX='28'>$DiveSupportSuppliersNote</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Notes/Comments</th>
<td><TEXTAREA NAME='DiveSupportNotes' COLS=100 ROW=3 TABINDEX='29'>$DiveSupportNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Paid Date</th>
<td><input type ='text' NAME='DiveSupportPaidDate' VALUE='$DiveSupportPaidDate'  SIZE='11' MAXLENGTH='11'  tabindex='30' id ='DiveSupportPaidDate' 
   onBlur=\"if(isBlank(this.form.DiveSupportPaidDate.value)) {alert('DiveSupportPaidDate cannot be blank');this.form.DiveSupportPaidDate.style.background='Yellow';}else{this.form.DiveSupportPaidDate.style.background='White';}\">");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSupportEdit\'].DiveSupportPaidDate,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSupportEntry\'].DiveSupportPaidDate,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
echo("</td>");
echo stripslashes("</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
");}
#----------------------------Entry Form----------------------------------------------------

function AddForm ()  {
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;

global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
global $Mode;
$Mode='ADD';

$DiveSupportStatus='PENDING';
echo stripslashes("
<FORM NAME='DiveSupportEntry' action='DiveSupport.php' method='POST'>");
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
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
global $Mode;
$Mode='EDIT';
echo stripslashes("
<FORM NAME='DiveSupportEdit' action='DiveSupport.php' method='POST'>");
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
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;

global $facilityTypeArray,$facilityServicesArray;
global $siteProvinceArray,$siteCountryArray;
global $facilityPhoneTypeArray;

echo stripslashes("
<FORM NAME='DiveSupportDelete' action='DiveSupport.php' method='POST'>
<TABLE border='1' align='center'><tr><td>
<TABLE border='1' align='center' cellspacing='5'>

<tr>
<td colspan ='2' align='center'>
<input type ='SUBMIT' NAME='display_button' Value = 'Cancel Delete'>
<input type ='SUBMIT' NAME='display_button' Value = 'Submit Delete'>
</td>
</tr>



<tr><th>Support Facility</th><td colspan='5'><table><th valign='top' align ='left' scope='row'>Id</th>
<td><input type ='text' NAME='DiveSupportId' VALUE='$DiveSupportId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSupportId' READONLY><br /></td>

<th valign='top' align ='left' scope='row'>Status</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSupportStatus' VALUE='$DiveSupportStatus'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSupportStatus' 
   onBlur=\"if(isBlank(this.form.DiveSupportStatus.value)) {alert('DiveSupportStatus cannot be blank');this.form.DiveSupportStatus.style.background='Yellow';}else{this.form.DiveSupportStatus.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSupportStatus' VALUE='$DiveSupportStatus'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSupportStatus' 
   onBlur=\"if(isBlank(this.form.DiveSupportStatus.value)) {alert('DiveSupportStatus cannot be blank');this.form.DiveSupportStatus.style.background='Yellow';}else{this.form.DiveSupportStatus.style.background='White';}\"><br /></td>");}
echo("</table></td></tr>");


echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Type</th><td colspan='5'><table><tr>");


$tabcount=2;
	$numPossibleElements = count($facilityTypeArray);
	
	
	
if(strlen($DiveSupportType)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportType[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' DISABLED name='SupportType[]' value='".$facilityTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityTypeArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityTypeArray[$i] == 'Dive Shop') {$state='checked';} else {$state='';}
          
          echo stripslashes("<td><input type= 'radio' DISABLED name='SupportType[]' value='".$facilityTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityTypeArray[$i]."&nbsp;&nbsp;</td>");

       }
}


//echo ("<td><input type ='text' NAME='DiveSupportType' VALUE='$DiveSupportType'  SIZE='10' MAXLENGTH='10'  tabindex='3' id ='DiveSupportType' 
//   onBlur=\"if(isBlank(this.form.DiveSupportType.value)) {alert('DiveSupportType cannot be blank');this.form.DiveSupportType.style.background='Yellow';}else{this.form.DiveSupportType.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");


echo("<tr><th valign='top' align ='left' scope='row'>Name</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportName' VALUE='$DiveSupportName'  SIZE='100' MAXLENGTH='100'  tabindex='4' id ='DiveSupportName' 
   onBlur=\"if(isBlank(this.form.DiveSupportName.value)) {alert('DiveSupportName cannot be blank');this.form.DiveSupportName.style.background='Yellow';}else{this.form.DiveSupportName.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("<tr><th valign='top' align ='left' scope='row'>Address 1</th>");

echo ("<td><input type ='text' READONLY NAME='DiveSupportAddress1' VALUE='$DiveSupportAddress1'  SIZE='100' MAXLENGTH='100'  tabindex='5' id ='DiveSupportAddress1' 
   onBlur=\"if(isBlank(this.form.DiveSupportAddress1.value)) {alert('DiveSupportAddress1 cannot be blank');this.form.DiveSupportAddress1.style.background='Yellow';}else{this.form.DiveSupportAddress1.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("<tr><th valign='top' align ='left' scope='row'>Address 2</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportAddress2' VALUE='$DiveSupportAddress2'  SIZE='100' MAXLENGTH='100'  tabindex='6' id ='DiveSupportAddress2' 
   onBlur=\"if(isBlank(this.form.DiveSupportAddress2.value)) {alert('DiveSupportAddress2 cannot be blank');this.form.DiveSupportAddress2.style.background='Yellow';}else{this.form.DiveSupportAddress2.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("<tr><th valign='top' align ='left' scope='row'>City</th>");
echo("<td colspan='5'><table><tr>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportCity' VALUE='$DiveSupportCity'  SIZE='25' MAXLENGTH='25'  tabindex='7' id ='DiveSupportCity' 
   onBlur=\"if(isBlank(this.form.DiveSupportCity.value)) {alert('DiveSupportCity cannot be blank');this.form.DiveSupportCity.style.background='Yellow';}else{this.form.DiveSupportCity.style.background='White';}\"><br /></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Province</th>");



$array_length = count($siteProvinceArray);
echo('<td>');
echo('<select DISABLED name="DiveSiteProvince" tabindex=7 id="DiveSiteProvince" VALUE="$DiveSiteProvince">');
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




//echo ("<td><input type ='text' NAME='DiveSupportProvince' VALUE='$DiveSupportProvince'  SIZE='25' MAXLENGTH='25'  tabindex='8' id ='DiveSupportProvince' 
//   onBlur=\"if(isBlank(this.form.DiveSupportProvince.value)) {alert('DiveSupportProvince cannot be blank');this.form.DiveSupportProvince.style.background='Yellow';}else{this.form.DiveSupportProvince.style.background='White';}\"><br /></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Country</th>");

$array_length = count($siteCountryArray);
echo('<td>');
echo('<select DISABLED name="DiveSiteCountry" tabindex=8 id="DiveSiteProvince" VALUE="$DiveSiteCountry">');
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

echo("<th valign='top' align ='left' scope='row'>PC/Zip:</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportPCZip' VALUE='$DiveSupportPCZip'  SIZE='10' MAXLENGTH='10'  tabindex='9' id ='DiveSupportPCZip' 
   onBlur=\"if(isBlank(this.form.DiveSupportPCZip.value)) {alert('DiveSupportPCZip cannot be blank');this.form.DiveSupportPCZip1.style.background='Yellow';}else{this.form.DiveSupportPCZip.style.background='White';}\"><br /></td>");



//echo ("<td><input type ='text' NAME='DiveSupportCountry' VALUE='$DiveSupportCountry'  SIZE='25' MAXLENGTH='25'  tabindex='9' id ='DiveSupportCountry' 
//   onBlur=\"if(isBlank(this.form.DiveSupportCountry.value)) {alert('DiveSupportCountry cannot be blank');this.form.DiveSupportCountry.style.background='Yellow';}else{this.form.DiveSupportCountry.style.background='White';}\"><br /></td>");

echo stripslashes("</tr>");
echo("</table></td>");


echo("<tr><th>Phones:<br>FORMAT: ###-###-####</th><td colspan ='5'><table>");
echo("<tr><th valign='top' align ='left' scope='row'>Phone 1</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportPhone1' VALUE='$DiveSupportPhone1'  SIZE='15' MAXLENGTH='15'  tabindex='10' id ='DiveSupportPhone1' 
   onBlur=\"if(isBlank(this.form.DiveSupportPhone1.value)) {alert('DiveSupportPhone1 cannot be blank');this.form.DiveSupportPhone1.style.background='Yellow';}else{this.form.DiveSupportPhone1.style.background='White';}\"><br /></td>");

$tabcount=10;
	$numPossibleElements = count($facilityPhoneTypeArray);
	
	
echo("<td>");	
if(strlen($DiveSupportPhone1Type)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportPhone1Type[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<input type= 'radio' DISABLED name='SupportPhone1Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityPhoneTypeArray[$i] == 'Landline') {$state='checked';} else {$state='';}
          
          echo stripslashes("<input type= 'radio' DISABLED name='SupportPhone1Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");

       }
}

echo("</td>");



//echo ("<td><input type ='text' NAME='DiveSupportPhone1Type' VALUE='$DiveSupportPhone1Type'  SIZE='15' MAXLENGTH='15'  tabindex='11' id ='DiveSupportPhone1Type' 
//   onBlur=\"if(isBlank(this.form.DiveSupportPhone1Type.value)) {alert('DiveSupportPhone1Type cannot be blank');this.form.DiveSupportPhone1Type.style.background='Yellow';}else{this.form.DiveSupportPhone1Type.style.background='White';}\"><br /></td>");

echo("</tr>");
echo("<tr>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Phone2</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportPhone2' VALUE='$DiveSupportPhone2'  SIZE='15' MAXLENGTH='15'  tabindex='12' id ='DiveSupportPhone2' 
   onBlur=\"if(isBlank(this.form.DiveSupportPhone2.value)) {alert('DiveSupportPhone2 cannot be blank');this.form.DiveSupportPhone2.style.background='Yellow';}else{this.form.DiveSupportPhone2.style.background='White';}\"><br /></td>");

$tabcount=12;
	$numPossibleElements = count($facilityPhoneTypeArray);
	
	
echo("<td>");	
if(strlen($DiveSupportPhone2Type)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportPhone2Type[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<input type= 'radio' DISABLED name='SupportPhone2Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityPhoneTypeArray[$i] == 'Cell-text') {$state='checked';} else {$state='';}
          
          echo stripslashes("<input type= 'radio' DISABLED name='SupportPhone2Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");

       }
}

echo("</td>");

//echo ("<td><input type ='text' NAME='DiveSupportPhone2Type' VALUE='$DiveSupportPhone2Type'  SIZE='15' MAXLENGTH='15'  tabindex='13' id ='DiveSupportPhone2Type' 
//   onBlur=\"if(isBlank(this.form.DiveSupportPhone2Type.value)) {alert('DiveSupportPhone2Type cannot be blank');this.form.DiveSupportPhone2Type.style.background='Yellow';}else{this.form.DiveSupportPhone2Type.style.background='White';}\"><br /></td>");
echo("</tr>");

echo("<tr>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Phone3</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportPhone3' VALUE='$DiveSupportPhone3'  SIZE='15' MAXLENGTH='15'  tabindex='14' id ='DiveSupportPhone3' 
   onBlur=\"if(isBlank(this.form.DiveSupportPhone3.value)) {alert('DiveSupportPhone3 cannot be blank');this.form.DiveSupportPhone3.style.background='Yellow';}else{this.form.DiveSupportPhone3.style.background='White';}\"><br /></td>");
$tabcount=14;
	$numPossibleElements = count($facilityPhoneTypeArray);
	
	
echo("<td>");	
if(strlen($DiveSupportPhone3Type)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportPhone3Type[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<input type= 'radio' DISABLED name='SupportPhone3Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityPhoneTypeArray[$i] == 'Cell') {$state='checked';} else {$state='';}
          
          echo stripslashes("<input type= 'radio' DISABLED name='SupportPhone3Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");

       }
}

echo("</td>");






//echo ("<td><input type ='text' NAME='DiveSupportPhone3Type' VALUE='$DiveSupportPhone3Type'  SIZE='15' MAXLENGTH='15'  tabindex='15' id ='DiveSupportPhone3Type' 
//   onBlur=\"if(isBlank(this.form.DiveSupportPhone3Type.value)) {alert('DiveSupportPhone3Type cannot be blank');this.form.DiveSupportPhone3Type.style.background='Yellow';}else{this.form.DiveSupportPhone3Type.style.background='White';}\"><br /></td>");
echo("</tr>");

echo stripslashes("</tr>");
echo ("</table></td></tr>");

echo("<tr><th valign='top' align ='center' scope='row'>Website</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSupportWebsite' VALUE='$DiveSupportWebsite'  SIZE='100' MAXLENGTH='150'  tabindex='16' id ='DiveSupportWebsite' 
   onBlur=\"if(isBlank(this.form.DiveSupportWebsite.value)) {alert('DiveSupportWebsite cannot be blank');this.form.DiveSupportWebsite.style.background='Yellow';}else{this.form.DiveSupportWebsite.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='center' scope='row'>Email</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSupportEmail' VALUE='$DiveSupportEmail'  SIZE='100' MAXLENGTH='150'  tabindex='17' id ='DiveSupportEmail' 
   onBlur=\"if(isBlank(this.form.DiveSupportEmail.value)) {alert('DiveSupportEmail cannot be blank');this.form.DiveSupportEmail.style.background='Yellow';}else{this.form.DiveSupportEmail.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");

echo("<tr><th>Location:</th><td colspan ='5'><table>");
echo("<tr><th valign='top' align ='left' scope='row'>Latitude</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportExactLat' VALUE='$DiveSupportExactLat'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='18' id ='DiveSupportExactLat' 
   onBlur=\"if(isBlank(this.form.DiveSupportExactLat.value)) {alert('DiveSupportExactLat cannot be blank');this.form.DiveSupportExactLat.style.background='Yellow';}else{this.form.DiveSupportExactLat.style.background='White';}\"><br /></td>");

echo stripslashes("<th valign='top' align ='left' scope='row'>Longitude</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportExactLong' VALUE='$DiveSupportExactLong'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='13' id ='DiveSupportExactLong' 
   onBlur=\"if(isBlank(this.form.DiveSupportExactLong.value)) {alert('DiveSupportExactLong cannot be blank');this.form.DiveSupportExactLong.style.background='Yellow';}else{this.form.DiveSupportExactLong.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");

echo("<tr><th>Hours of Operation<br>24 hour clock: ####-####</td></th><td colspan='5'><table>");
echo("<tr><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th><th>Sunday</th><tr>");
// echo("<tr><th valign='top' align ='left' scope='row'>DiveSupportHoursMon</th>");
echo("<tr>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportHoursMon' VALUE='$DiveSupportHoursMon'  SIZE='10' MAXLENGTH='10'  tabindex='14' id ='DiveSupportHoursMon' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursMon.value)) {alert('DiveSupportHoursMon cannot be blank');this.form.DiveSupportHoursMon.style.background='Yellow';}else{this.form.DiveSupportHoursMon.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursTues</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportHoursTues' VALUE='$DiveSupportHoursTues'  SIZE='10' MAXLENGTH='10'  tabindex='15' id ='DiveSupportHoursTues' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursTues.value)) {alert('DiveSupportHoursTues cannot be blank');this.form.DiveSupportHoursTues.style.background='Yellow';}else{this.form.DiveSupportHoursTues.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursWed</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportHoursWed' VALUE='$DiveSupportHoursWed'  SIZE='10' MAXLENGTH='10'  tabindex='16' id ='DiveSupportHoursWed' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursWed.value)) {alert('DiveSupportHoursWed cannot be blank');this.form.DiveSupportHoursWed.style.background='Yellow';}else{this.form.DiveSupportHoursWed.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursThu</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportHoursThu' VALUE='$DiveSupportHoursThu'  SIZE='10' MAXLENGTH='10'  tabindex='17' id ='DiveSupportHoursThu' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursThu.value)) {alert('DiveSupportHoursThu cannot be blank');this.form.DiveSupportHoursThu.style.background='Yellow';}else{this.form.DiveSupportHoursThu.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursFri</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportHoursFri' VALUE='$DiveSupportHoursFri'  SIZE='10' MAXLENGTH='10'  tabindex='18' id ='DiveSupportHoursFri' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursFri.value)) {alert('DiveSupportHoursFri cannot be blank');this.form.DiveSupportHoursFri.style.background='Yellow';}else{this.form.DiveSupportHoursFri.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursSat</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportHoursSat' VALUE='$DiveSupportHoursSat'  SIZE='10' MAXLENGTH='10'  tabindex='19' id ='DiveSupportHoursSat' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursSat.value)) {alert('DiveSupportHoursSat cannot be blank');this.form.DiveSupportHoursSat.style.background='Yellow';}else{this.form.DiveSupportHoursSat.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursSun</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportHoursSun' VALUE='$DiveSupportHoursSun'  SIZE='10' MAXLENGTH='10'  tabindex='20' id ='DiveSupportHoursSun' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursSun.value)) {alert('DiveSupportHoursSun cannot be blank');this.form.DiveSupportHoursSun.style.background='Yellow';}else{this.form.DiveSupportHoursSun.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");

echo("<tr><th valign='top' align ='left' scope='row'>DiveSupportServices</th>");
echo("<td colspan='5'><table><tr>");
$tabcount=20;
	$numPossibleElements = count($facilityServicesArray);
	

	
if(strlen($DiveSupportServices)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportServices[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'checkbox' DISABLED name='SupportServices[]' value='".$facilityServicesArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityServicesArray[$i]."</td>");  
 	    if($facilityServicesArray[$i] == 'Oxygen Fills'){echo('<tr>');}
 	    if($facilityServicesArray[$i] == 'Equipment Sales'){echo('</tr><tr>');}
 	    if($facilityServicesArray[$i] == 'Dive Information'){echo('</tr><tr>');}
 	    if($facilityServicesArray[$i] == 'Dive Instruction'){echo('</tr><tr><td colspan=6><table><tr><td>');}
 	    if($facilityServicesArray[$i] == 'PSI'){echo('</td></tr></table></td></tr><tr>');}
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityServicesArray[$i] == '') {$state='checked';} else {$state='';}
          
          echo stripslashes("<td><input type= 'checkbox' DISABLED name='SupportServices[]' value='".$facilityServicesArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityServicesArray[$i]."&nbsp;&nbsp;</td>");
         if($facilityServicesArray[$i] == 'Oxygen Fills'){echo('<tr>');}
 	       if($facilityServicesArray[$i] == 'Equipment Sales'){echo('</tr><tr>');}
 	       if($facilityServicesArray[$i] == 'Dive Information'){echo('</tr><tr>');}
 	       if($facilityServicesArray[$i] == 'Dive Instruction'){echo('</tr><tr><td colspan=6><table><tr><td>');}
 	       if($facilityServicesArray[$i] == 'PSI'){echo('</td></tr></table></td></tr><tr>');}
       }
  }
echo('</tr>');
 
//echo ("<td><input type ='text' NAME='DiveSupportServices' VALUE='$DiveSupportServices'  SIZE='25' MAXLENGTH='25'  tabindex='21' id ='DiveSupportServices' 
//   onBlur=\"if(isBlank(this.form.DiveSupportServices.value)) {alert('DiveSupportServices cannot be blank');this.form.DiveSupportServices.style.background='Yellow';}else{this.form.DiveSupportServices.style.background='White';}\"><br /></td>");

echo stripslashes("</tr></table></td>");
echo("<tr><th valign='top' align ='left' scope='row'>Suppliers/Brands</th>");
echo("<td><TEXTAREA READONLY NAME='DiveSupportSuppliersNote' COLS=100 ROW=3 TABINDEX='28'>$DiveSupportSuppliersNote</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Notes/Comments</th>
<td><TEXTAREA READONLY NAME='DiveSupportNotes' COLS=100 ROW=3 TABINDEX='29'>$DiveSupportNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Paid Date</th>
<td><input type ='text' READONLY NAME='DiveSupportPaidDate' VALUE='$DiveSupportPaidDate'  SIZE='11' MAXLENGTH='11'  tabindex='30' id ='DiveSupportPaidDate' 
   onBlur=\"if(isBlank(this.form.DiveSupportPaidDate.value)) {alert('DiveSupportPaidDate cannot be blank');this.form.DiveSupportPaidDate.style.background='Yellow';}else{this.form.DiveSupportPaidDate.style.background='White';}\">");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSupportEdit\'].DiveSupportPaidDate,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSupportEntry\'].DiveSupportPaidDate,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
echo("</td>");
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
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;

global $facilityTypeArray,$facilityServicesArray;
global $siteProvinceArray,$siteCountryArray;
global $facilityPhoneTypeArray;



echo stripslashes("
<FORM NAME='DiveSupportDisplay' action='DiveSupport.php' method='POST'>
<TABLE border='1' align='center'><tr><td>
<TABLE border='1' align='center' cellspacing='5'>

<tr>
<td colspan ='2' align='center'>
<input type ='SUBMIT' NAME='display_button' Value = 'Return'>
<input type ='SUBMIT' NAME='display_button' Value = 'Edit'>
<input type ='SUBMIT' NAME='display_button' Value = 'Delete'>
</td>
</tr>




<tr><th>Support Facility</th><td colspan='5'><table><th valign='top' align ='left' scope='row'>Id</th>
<td><input type ='text' NAME='DiveSupportId' VALUE='$DiveSupportId' SIZE='8' MAXLENGTH='8' tabindex ='1' id ='DiveSupportId' READONLY><br /></td>

<th valign='top' align ='left' scope='row'>Status</th>
"); if($Mode=='EDIT')
{echo ("<td><input type ='text' style='color: gray' READONLY NAME='DiveSupportStatus' VALUE='$DiveSupportStatus'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSupportStatus' 
   onBlur=\"if(isBlank(this.form.DiveSupportStatus.value)) {alert('DiveSupportStatus cannot be blank');this.form.DiveSupportStatus.style.background='Yellow';}else{this.form.DiveSupportStatus.style.background='White';}\"><br /></td>");}
else 
{echo ("<td><input type ='text' READONLY NAME='DiveSupportStatus' VALUE='$DiveSupportStatus'  SIZE='8' MAXLENGTH='8'  tabindex='2' id ='DiveSupportStatus' 
   onBlur=\"if(isBlank(this.form.DiveSupportStatus.value)) {alert('DiveSupportStatus cannot be blank');this.form.DiveSupportStatus.style.background='Yellow';}else{this.form.DiveSupportStatus.style.background='White';}\"><br /></td>");}
echo("</table></td></tr>");


echo stripslashes("<tr><th valign='top' align ='left' scope='row'>Type</th><td colspan='5'><table><tr>");


$tabcount=2;
	$numPossibleElements = count($facilityTypeArray);
	
	
	
if(strlen($DiveSupportType)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportType[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'radio' DISABLED name='SupportType[]' value='".$facilityTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityTypeArray[$i]."</td>");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityTypeArray[$i] == 'Dive Shop') {$state='checked';} else {$state='';}
          
          echo stripslashes("<td><input type= 'radio' DISABLED name='SupportType[]' value='".$facilityTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityTypeArray[$i]."&nbsp;&nbsp;</td>");

       }
}


//echo ("<td><input type ='text' NAME='DiveSupportType' VALUE='$DiveSupportType'  SIZE='10' MAXLENGTH='10'  tabindex='3' id ='DiveSupportType' 
//   onBlur=\"if(isBlank(this.form.DiveSupportType.value)) {alert('DiveSupportType cannot be blank');this.form.DiveSupportType.style.background='Yellow';}else{this.form.DiveSupportType.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");


echo("<tr><th valign='top' align ='left' scope='row'>Name</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportName' VALUE='$DiveSupportName'  SIZE='100' MAXLENGTH='100'  tabindex='4' id ='DiveSupportName' 
   onBlur=\"if(isBlank(this.form.DiveSupportName.value)) {alert('DiveSupportName cannot be blank');this.form.DiveSupportName.style.background='Yellow';}else{this.form.DiveSupportName.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("<tr><th valign='top' align ='left' scope='row'>Address 1</th>");

echo ("<td><input type ='text' READONLY NAME='DiveSupportAddress1' VALUE='$DiveSupportAddress1'  SIZE='100' MAXLENGTH='100'  tabindex='5' id ='DiveSupportAddress1' 
   onBlur=\"if(isBlank(this.form.DiveSupportAddress1.value)) {alert('DiveSupportAddress1 cannot be blank');this.form.DiveSupportAddress1.style.background='Yellow';}else{this.form.DiveSupportAddress1.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("<tr><th valign='top' align ='left' scope='row'>Address 2</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportAddress2' VALUE='$DiveSupportAddress2'  SIZE='100' MAXLENGTH='100'  tabindex='6' id ='DiveSupportAddress2' 
   onBlur=\"if(isBlank(this.form.DiveSupportAddress2.value)) {alert('DiveSupportAddress2 cannot be blank');this.form.DiveSupportAddress2.style.background='Yellow';}else{this.form.DiveSupportAddress2.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("<tr><th valign='top' align ='left' scope='row'>City</th>");
echo("<td colspan='5'><table><tr>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportCity' VALUE='$DiveSupportCity'  SIZE='25' MAXLENGTH='25'  tabindex='7' id ='DiveSupportCity' 
   onBlur=\"if(isBlank(this.form.DiveSupportCity.value)) {alert('DiveSupportCity cannot be blank');this.form.DiveSupportCity.style.background='Yellow';}else{this.form.DiveSupportCity.style.background='White';}\"><br /></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Province</th>");



$array_length = count($siteProvinceArray);
echo('<td>');
echo('<select DISABLED name="DiveSiteProvince" tabindex=7 id="DiveSiteProvince" VALUE="$DiveSiteProvince">');
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




//echo ("<td><input type ='text' NAME='DiveSupportProvince' VALUE='$DiveSupportProvince'  SIZE='25' MAXLENGTH='25'  tabindex='8' id ='DiveSupportProvince' 
//   onBlur=\"if(isBlank(this.form.DiveSupportProvince.value)) {alert('DiveSupportProvince cannot be blank');this.form.DiveSupportProvince.style.background='Yellow';}else{this.form.DiveSupportProvince.style.background='White';}\"><br /></td>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Country</th>");

$array_length = count($siteCountryArray);
echo('<td>');
echo('<select DISABLED name="DiveSiteCountry" tabindex=8 id="DiveSiteProvince" VALUE="$DiveSiteCountry">');
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

echo("<th valign='top' align ='left' scope='row'>PC/Zip:</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportPCZip' VALUE='$DiveSupportPCZip'  SIZE='10' MAXLENGTH='10'  tabindex='9' id ='DiveSupportPCZip' 
   onBlur=\"if(isBlank(this.form.DiveSupportPCZip.value)) {alert('DiveSupportPCZip cannot be blank');this.form.DiveSupportPCZip1.style.background='Yellow';}else{this.form.DiveSupportPCZip.style.background='White';}\"><br /></td>");



//echo ("<td><input type ='text' NAME='DiveSupportCountry' VALUE='$DiveSupportCountry'  SIZE='25' MAXLENGTH='25'  tabindex='9' id ='DiveSupportCountry' 
//   onBlur=\"if(isBlank(this.form.DiveSupportCountry.value)) {alert('DiveSupportCountry cannot be blank');this.form.DiveSupportCountry.style.background='Yellow';}else{this.form.DiveSupportCountry.style.background='White';}\"><br /></td>");

echo stripslashes("</tr>");
echo("</table></td>");


echo("<tr><th>Phones:<br>FORMAT: ###-###-####</th><td colspan ='5'><table>");
echo("<tr><th valign='top' align ='left' scope='row'>Phone 1</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportPhone1' VALUE='$DiveSupportPhone1'  SIZE='15' MAXLENGTH='15'  tabindex='10' id ='DiveSupportPhone1' 
   onBlur=\"if(isBlank(this.form.DiveSupportPhone1.value)) {alert('DiveSupportPhone1 cannot be blank');this.form.DiveSupportPhone1.style.background='Yellow';}else{this.form.DiveSupportPhone1.style.background='White';}\"><br /></td>");

$tabcount=10;
	$numPossibleElements = count($facilityPhoneTypeArray);
	
	
echo("<td>");	
if(strlen($DiveSupportPhone1Type)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportPhone1Type[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<input type= 'radio' DISABLED name='SupportPhone1Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityPhoneTypeArray[$i] == 'Landline') {$state='checked';} else {$state='';}
          
          echo stripslashes("<input type= 'radio' DISABLED name='SupportPhone1Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");

       }
}

echo("</td>");



//echo ("<td><input type ='text' NAME='DiveSupportPhone1Type' VALUE='$DiveSupportPhone1Type'  SIZE='15' MAXLENGTH='15'  tabindex='11' id ='DiveSupportPhone1Type' 
//   onBlur=\"if(isBlank(this.form.DiveSupportPhone1Type.value)) {alert('DiveSupportPhone1Type cannot be blank');this.form.DiveSupportPhone1Type.style.background='Yellow';}else{this.form.DiveSupportPhone1Type.style.background='White';}\"><br /></td>");

echo("</tr>");
echo("<tr>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Phone2</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportPhone2' VALUE='$DiveSupportPhone2'  SIZE='15' MAXLENGTH='15'  tabindex='12' id ='DiveSupportPhone2' 
   onBlur=\"if(isBlank(this.form.DiveSupportPhone2.value)) {alert('DiveSupportPhone2 cannot be blank');this.form.DiveSupportPhone2.style.background='Yellow';}else{this.form.DiveSupportPhone2.style.background='White';}\"><br /></td>");

$tabcount=12;
	$numPossibleElements = count($facilityPhoneTypeArray);
	
	
echo("<td>");	
if(strlen($DiveSupportPhone2Type)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportPhone2Type[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<input type= 'radio' DISABLED name='SupportPhone2Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityPhoneTypeArray[$i] == 'Cell-text') {$state='checked';} else {$state='';}
          
          echo stripslashes("<input type= 'radio' DISABLED name='SupportPhone2Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");

       }
}

echo("</td>");

//echo ("<td><input type ='text' NAME='DiveSupportPhone2Type' VALUE='$DiveSupportPhone2Type'  SIZE='15' MAXLENGTH='15'  tabindex='13' id ='DiveSupportPhone2Type' 
//   onBlur=\"if(isBlank(this.form.DiveSupportPhone2Type.value)) {alert('DiveSupportPhone2Type cannot be blank');this.form.DiveSupportPhone2Type.style.background='Yellow';}else{this.form.DiveSupportPhone2Type.style.background='White';}\"><br /></td>");
echo("</tr>");

echo("<tr>");
echo stripslashes("<th valign='top' align ='left' scope='row'>Phone3</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportPhone3' VALUE='$DiveSupportPhone3'  SIZE='15' MAXLENGTH='15'  tabindex='14' id ='DiveSupportPhone3' 
   onBlur=\"if(isBlank(this.form.DiveSupportPhone3.value)) {alert('DiveSupportPhone3 cannot be blank');this.form.DiveSupportPhone3.style.background='Yellow';}else{this.form.DiveSupportPhone3.style.background='White';}\"><br /></td>");
$tabcount=14;
	$numPossibleElements = count($facilityPhoneTypeArray);
	
	
echo("<td>");	
if(strlen($DiveSupportPhone3Type)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportPhone3Type[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<input type= 'radio' DISABLED name='SupportPhone3Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");  
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityPhoneTypeArray[$i] == 'Cell') {$state='checked';} else {$state='';}
          
          echo stripslashes("<input type= 'radio' DISABLED name='SupportPhone3Type[]' value='".$facilityPhoneTypeArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityPhoneTypeArray[$i]."&nbsp;&nbsp;");

       }
}

echo("</td>");






//echo ("<td><input type ='text' NAME='DiveSupportPhone3Type' VALUE='$DiveSupportPhone3Type'  SIZE='15' MAXLENGTH='15'  tabindex='15' id ='DiveSupportPhone3Type' 
//   onBlur=\"if(isBlank(this.form.DiveSupportPhone3Type.value)) {alert('DiveSupportPhone3Type cannot be blank');this.form.DiveSupportPhone3Type.style.background='Yellow';}else{this.form.DiveSupportPhone3Type.style.background='White';}\"><br /></td>");
echo("</tr>");

echo stripslashes("</tr>");
echo ("</table></td></tr>");

echo("<tr><th valign='top' align ='center' scope='row'>Website</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSupportWebsite' VALUE='$DiveSupportWebsite'  SIZE='100' MAXLENGTH='150'  tabindex='16' id ='DiveSupportWebsite' 
   onBlur=\"if(isBlank(this.form.DiveSupportWebsite.value)) {alert('DiveSupportWebsite cannot be blank');this.form.DiveSupportWebsite.style.background='Yellow';}else{this.form.DiveSupportWebsite.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='center' scope='row'>Email</th>
");
echo ("<td><input type ='text' READONLY NAME='DiveSupportEmail' VALUE='$DiveSupportEmail'  SIZE='100' MAXLENGTH='150'  tabindex='17' id ='DiveSupportEmail' 
   onBlur=\"if(isBlank(this.form.DiveSupportEmail.value)) {alert('DiveSupportEmail cannot be blank');this.form.DiveSupportEmail.style.background='Yellow';}else{this.form.DiveSupportEmail.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");

echo("<tr><th>Location:</th><td colspan ='5'><table>");
echo("<tr><th valign='top' align ='left' scope='row'>Latitude</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportExactLat' VALUE='$DiveSupportExactLat'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='18' id ='DiveSupportExactLat' 
   onBlur=\"if(isBlank(this.form.DiveSupportExactLat.value)) {alert('DiveSupportExactLat cannot be blank');this.form.DiveSupportExactLat.style.background='Yellow';}else{this.form.DiveSupportExactLat.style.background='White';}\"><br /></td>");

echo stripslashes("<th valign='top' align ='left' scope='row'>Longitude</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportExactLong' VALUE='$DiveSupportExactLong'  SIZE='11,7' MAXLENGTH='11,7'  tabindex='13' id ='DiveSupportExactLong' 
   onBlur=\"if(isBlank(this.form.DiveSupportExactLong.value)) {alert('DiveSupportExactLong cannot be blank');this.form.DiveSupportExactLong.style.background='Yellow';}else{this.form.DiveSupportExactLong.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");

echo("<tr><th>Hours of Operation<br>24 hour clock: ####-####</td></th><td colspan='5'><table>");
echo("<tr><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th><th>Sunday</th><tr>");
// echo("<tr><th valign='top' align ='left' scope='row'>DiveSupportHoursMon</th>");
echo("<tr>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportHoursMon' VALUE='$DiveSupportHoursMon'  SIZE='10' MAXLENGTH='10'  tabindex='14' id ='DiveSupportHoursMon' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursMon.value)) {alert('DiveSupportHoursMon cannot be blank');this.form.DiveSupportHoursMon.style.background='Yellow';}else{this.form.DiveSupportHoursMon.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursTues</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportHoursTues' VALUE='$DiveSupportHoursTues'  SIZE='10' MAXLENGTH='10'  tabindex='15' id ='DiveSupportHoursTues' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursTues.value)) {alert('DiveSupportHoursTues cannot be blank');this.form.DiveSupportHoursTues.style.background='Yellow';}else{this.form.DiveSupportHoursTues.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursWed</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportHoursWed' VALUE='$DiveSupportHoursWed'  SIZE='10' MAXLENGTH='10'  tabindex='16' id ='DiveSupportHoursWed' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursWed.value)) {alert('DiveSupportHoursWed cannot be blank');this.form.DiveSupportHoursWed.style.background='Yellow';}else{this.form.DiveSupportHoursWed.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursThu</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportHoursThu' VALUE='$DiveSupportHoursThu'  SIZE='10' MAXLENGTH='10'  tabindex='17' id ='DiveSupportHoursThu' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursThu.value)) {alert('DiveSupportHoursThu cannot be blank');this.form.DiveSupportHoursThu.style.background='Yellow';}else{this.form.DiveSupportHoursThu.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursFri</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportHoursFri' VALUE='$DiveSupportHoursFri'  SIZE='10' MAXLENGTH='10'  tabindex='18' id ='DiveSupportHoursFri' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursFri.value)) {alert('DiveSupportHoursFri cannot be blank');this.form.DiveSupportHoursFri.style.background='Yellow';}else{this.form.DiveSupportHoursFri.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursSat</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportHoursSat' VALUE='$DiveSupportHoursSat'  SIZE='10' MAXLENGTH='10'  tabindex='19' id ='DiveSupportHoursSat' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursSat.value)) {alert('DiveSupportHoursSat cannot be blank');this.form.DiveSupportHoursSat.style.background='Yellow';}else{this.form.DiveSupportHoursSat.style.background='White';}\"><br /></td>");
//echo stripslashes("<th valign='top' align ='left' scope='row'>DiveSupportHoursSun</th>");
echo ("<td><input type ='text' READONLY NAME='DiveSupportHoursSun' VALUE='$DiveSupportHoursSun'  SIZE='10' MAXLENGTH='10'  tabindex='20' id ='DiveSupportHoursSun' 
   onBlur=\"if(isBlank(this.form.DiveSupportHoursSun.value)) {alert('DiveSupportHoursSun cannot be blank');this.form.DiveSupportHoursSun.style.background='Yellow';}else{this.form.DiveSupportHoursSun.style.background='White';}\"><br /></td>");
echo stripslashes("</tr>");
echo("</table></td></tr>");

echo("<tr><th valign='top' align ='left' scope='row'>DiveSupportServices</th>");
echo("<td colspan='5'><table><tr>");
$tabcount=20;
	$numPossibleElements = count($facilityServicesArray);
	

	
if(strlen($DiveSupportServices)!=0)
 {
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	  {
 	  	$tabcount++;
 	  	if($DiveSupportServices[$i]=="1") {$state='checked';}else{$state='';}
 	  	echo stripslashes("<td><input type= 'checkbox' DISABLED name='SupportServices[]' value='".$facilityServicesArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityServicesArray[$i]."</td>");  
 	    if($facilityServicesArray[$i] == 'Oxygen Fills'){echo('<tr>');}
 	    if($facilityServicesArray[$i] == 'Equipment Sales'){echo('</tr><tr>');}
 	    if($facilityServicesArray[$i] == 'Dive Information'){echo('</tr><tr>');}
 	    if($facilityServicesArray[$i] == 'Dive Instruction'){echo('</tr><tr><td colspan=6><table><tr><td>');}
 	    if($facilityServicesArray[$i] == 'PSI'){echo('</td></tr></table></td></tr><tr>');}
 	  }	
 	  	  	
 }
 	  
 else
 { 
 	  	
 	  	for($i=0;$i < $numPossibleElements;$i++)
 	     {
 	     	 
 	     	 $tabcount++;
 	       if($facilityServicesArray[$i] == '') {$state='checked';} else {$state='';}
          
          echo stripslashes("<td><input type= 'checkbox' DISABLED name='SupportServices[]' value='".$facilityServicesArray[$i]."'tabindex=".$tabcount." ".$state.">".$facilityServicesArray[$i]."&nbsp;&nbsp;</td>");
         if($facilityServicesArray[$i] == 'Oxygen Fills'){echo('<tr>');}
 	       if($facilityServicesArray[$i] == 'Equipment Sales'){echo('</tr><tr>');}
 	       if($facilityServicesArray[$i] == 'Dive Information'){echo('</tr><tr>');}
 	       if($facilityServicesArray[$i] == 'Dive Instruction'){echo('</tr><tr><td colspan=6><table><tr><td>');}
 	       if($facilityServicesArray[$i] == 'PSI'){echo('</td></tr></table></td></tr><tr>');}
       }
  }
echo('</tr>');
 
//echo ("<td><input type ='text' NAME='DiveSupportServices' VALUE='$DiveSupportServices'  SIZE='25' MAXLENGTH='25'  tabindex='21' id ='DiveSupportServices' 
//   onBlur=\"if(isBlank(this.form.DiveSupportServices.value)) {alert('DiveSupportServices cannot be blank');this.form.DiveSupportServices.style.background='Yellow';}else{this.form.DiveSupportServices.style.background='White';}\"><br /></td>");

echo stripslashes("</tr></table></td>");
echo("<tr><th valign='top' align ='left' scope='row'>Suppliers/Brands</th>");
echo("<td><TEXTAREA READONLY NAME='DiveSupportSuppliersNote' COLS=100 ROW=3 TABINDEX='28'>$DiveSupportSuppliersNote</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Notes/Comments</th>
<td><TEXTAREA READONLY NAME='DiveSupportNotes' COLS=100 ROW=3 TABINDEX='29'>$DiveSupportNotes</TEXTAREA></td>");
echo stripslashes("</tr>
<tr><th valign='top' align ='left' scope='row'>Paid Date</th>
<td><input type ='text' READONLY NAME='DiveSupportPaidDate' VALUE='$DiveSupportPaidDate'  SIZE='11' MAXLENGTH='11'  tabindex='30' id ='DiveSupportPaidDate' 
   onBlur=\"if(isBlank(this.form.DiveSupportPaidDate.value)) {alert('DiveSupportPaidDate cannot be blank');this.form.DiveSupportPaidDate.style.background='Yellow';}else{this.form.DiveSupportPaidDate.style.background='White';}\">");
if($Mode=='EDIT')
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSupportEdit\'].DiveSupportPaidDate,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
else 
{echo '<A HREF="#" onClick="cal.select(document.forms[\'DiveSupportEntry\'].DiveSupportPaidDate,\'anchor\',\'yyyy-MM-dd\');return false;" NAME="anchor" ID="anchor">Calendar</A>';}
echo("</td>");
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
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
$DiveSupportId='TBD';
$DiveSupportStatus='';
$DiveSupportType='';
$DiveSupportName='';
$DiveSupportAddress1='';
$DiveSupportAddress2='';
$DiveSupportCity='';
$DiveSupportProvince='';
$DiveSupportCountry='';
$DiveSupportPhone1='';
$DiveSupportPhone1Type='';
$DiveSupportPhone2='';
$DiveSupportPhone2Type='';
$DiveSupportPhone3='';
$DiveSupportPhone3Type='';
$DiveSupportWebsite='';
$DiveSupportEmail='';
$DiveSupportExactLat='';
$DiveSupportExactLong='';
$DiveSupportHoursMon='';
$DiveSupportHoursTues='';
$DiveSupportHoursWed='';
$DiveSupportHoursThu='';
$DiveSupportHoursFri='';
$DiveSupportHoursSat='';
$DiveSupportHoursSun='';
$DiveSupportServices='';
$DiveSupportSuppliersNote='';
$DiveSupportNotes='';
$DiveSupportPaidDate='';
$DiveSupportPCZip='';
return;
}
#----------------------------Get Next Record in Database -----------------------------------

function Db_Next()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
if($NumDiveSupportRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSupport where(DiveSupportStatus > '".strip_tags(addslashes($DiveSupportStatus))."') order by DiveSupportStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSupport Select * failure");
$NumDiveSupportRecordsDesired = mysql_num_rows($result);
if($NumDiveSupportRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSupportId=$rowdata[0];
$DiveSupportStatus=$rowdata[1];
$DiveSupportType=$rowdata[2];
$DiveSupportName=$rowdata[3];
$DiveSupportAddress1=$rowdata[4];
$DiveSupportAddress2=$rowdata[5];
$DiveSupportCity=$rowdata[6];
$DiveSupportProvince=$rowdata[7];
$DiveSupportCountry=$rowdata[8];
$DiveSupportPhone1=$rowdata[9];
$DiveSupportPhone1Type=$rowdata[10];
$DiveSupportPhone2=$rowdata[11];
$DiveSupportPhone2Type=$rowdata[12];
$DiveSupportPhone3=$rowdata[13];
$DiveSupportPhone3Type=$rowdata[14];
$DiveSupportWebsite=$rowdata[15];
$DiveSupportEmail=$rowdata[16];
$DiveSupportExactLat=$rowdata[17];
$DiveSupportExactLong=$rowdata[18];
$DiveSupportHoursMon=$rowdata[19];
$DiveSupportHoursTues=$rowdata[20];
$DiveSupportHoursWed=$rowdata[21];
$DiveSupportHoursThu=$rowdata[22];
$DiveSupportHoursFri=$rowdata[23];
$DiveSupportHoursSat=$rowdata[24];
$DiveSupportHoursSun=$rowdata[25];
$DiveSupportServices=$rowdata[26];
$DiveSupportSuppliersNote=$rowdata[27];
$DiveSupportNotes=$rowdata[28];
$DiveSupportPaidDate=$rowdata[29];
$DiveSupportPCZip=$rowdata[30];
}
else
{
$sql="select * from DiveSupport order by DiveSupportStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSupport Select * failure");
$NumDiveSupportRecordsDesired = mysql_num_rows($result);
if($NumDiveSupportRecordsDesired>0)
{
$rowdata=mysql_fetch_row($result);
$DiveSupportId=$rowdata[0];
$DiveSupportStatus=$rowdata[1];
$DiveSupportType=$rowdata[2];
$DiveSupportName=$rowdata[3];
$DiveSupportAddress1=$rowdata[4];
$DiveSupportAddress2=$rowdata[5];
$DiveSupportCity=$rowdata[6];
$DiveSupportProvince=$rowdata[7];
$DiveSupportCountry=$rowdata[8];
$DiveSupportPhone1=$rowdata[9];
$DiveSupportPhone1Type=$rowdata[10];
$DiveSupportPhone2=$rowdata[11];
$DiveSupportPhone2Type=$rowdata[12];
$DiveSupportPhone3=$rowdata[13];
$DiveSupportPhone3Type=$rowdata[14];
$DiveSupportWebsite=$rowdata[15];
$DiveSupportEmail=$rowdata[16];
$DiveSupportExactLat=$rowdata[17];
$DiveSupportExactLong=$rowdata[18];
$DiveSupportHoursMon=$rowdata[19];
$DiveSupportHoursTues=$rowdata[20];
$DiveSupportHoursWed=$rowdata[21];
$DiveSupportHoursThu=$rowdata[22];
$DiveSupportHoursFri=$rowdata[23];
$DiveSupportHoursSat=$rowdata[24];
$DiveSupportHoursSun=$rowdata[25];
$DiveSupportServices=$rowdata[26];
$DiveSupportSuppliersNote=$rowdata[27];
$DiveSupportNotes=$rowdata[28];
$DiveSupportPaidDate=$rowdata[29];
$DiveSupportPCZip=$rowdata[30];
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
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
if($NumDiveSupportRecords==0)
{InitializeVariables();}
else
{
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSupport where(DiveSupportStatus < '".strip_tags(addslashes($DiveSupportStatus))."') order by DiveSupportStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSupport Select * failure");
$NumDiveSupportRecordsDesired = mysql_num_rows($result);
if($NumDiveSupportRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSupportRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSupportId=$rowdata[0];
$DiveSupportStatus=$rowdata[1];
$DiveSupportType=$rowdata[2];
$DiveSupportName=$rowdata[3];
$DiveSupportAddress1=$rowdata[4];
$DiveSupportAddress2=$rowdata[5];
$DiveSupportCity=$rowdata[6];
$DiveSupportProvince=$rowdata[7];
$DiveSupportCountry=$rowdata[8];
$DiveSupportPhone1=$rowdata[9];
$DiveSupportPhone1Type=$rowdata[10];
$DiveSupportPhone2=$rowdata[11];
$DiveSupportPhone2Type=$rowdata[12];
$DiveSupportPhone3=$rowdata[13];
$DiveSupportPhone3Type=$rowdata[14];
$DiveSupportWebsite=$rowdata[15];
$DiveSupportEmail=$rowdata[16];
$DiveSupportExactLat=$rowdata[17];
$DiveSupportExactLong=$rowdata[18];
$DiveSupportHoursMon=$rowdata[19];
$DiveSupportHoursTues=$rowdata[20];
$DiveSupportHoursWed=$rowdata[21];
$DiveSupportHoursThu=$rowdata[22];
$DiveSupportHoursFri=$rowdata[23];
$DiveSupportHoursSat=$rowdata[24];
$DiveSupportHoursSun=$rowdata[25];
$DiveSupportServices=$rowdata[26];
$DiveSupportSuppliersNote=$rowdata[27];
$DiveSupportNotes=$rowdata[28];
$DiveSupportPaidDate=$rowdata[29];
$DiveSupportPCZip=$rowdata[30];
}
}
else
{
$sql="select * from DiveSupport order by DiveSupportStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSupport Select * failure");
$NumDiveSupportRecordsDesired = mysql_num_rows($result);
if($NumDiveSupportRecordsDesired>0)
{
for($i=1;$i<=$NumDiveSupportRecordsDesired;$i++)
{
$rowdata=mysql_fetch_row($result);
$DiveSupportId=$rowdata[0];
$DiveSupportStatus=$rowdata[1];
$DiveSupportType=$rowdata[2];
$DiveSupportName=$rowdata[3];
$DiveSupportAddress1=$rowdata[4];
$DiveSupportAddress2=$rowdata[5];
$DiveSupportCity=$rowdata[6];
$DiveSupportProvince=$rowdata[7];
$DiveSupportCountry=$rowdata[8];
$DiveSupportPhone1=$rowdata[9];
$DiveSupportPhone1Type=$rowdata[10];
$DiveSupportPhone2=$rowdata[11];
$DiveSupportPhone2Type=$rowdata[12];
$DiveSupportPhone3=$rowdata[13];
$DiveSupportPhone3Type=$rowdata[14];
$DiveSupportWebsite=$rowdata[15];
$DiveSupportEmail=$rowdata[16];
$DiveSupportExactLat=$rowdata[17];
$DiveSupportExactLong=$rowdata[18];
$DiveSupportHoursMon=$rowdata[19];
$DiveSupportHoursTues=$rowdata[20];
$DiveSupportHoursWed=$rowdata[21];
$DiveSupportHoursThu=$rowdata[22];
$DiveSupportHoursFri=$rowdata[23];
$DiveSupportHoursSat=$rowdata[24];
$DiveSupportHoursSun=$rowdata[25];
$DiveSupportServices=$rowdata[26];
$DiveSupportSuppliersNote=$rowdata[27];
$DiveSupportNotes=$rowdata[28];
$DiveSupportPaidDate=$rowdata[29];
$DiveSupportPCZip=$rowdata[30];
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
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$DiveSupportId=$_SESSION['DiveSupportId'];
$sql="update DiveSupport SET ";
$sql=$sql."DiveSupportStatus='".strip_tags(addslashes($DiveSupportStatus))."',";
$sql=$sql."DiveSupportType='".strip_tags(addslashes($DiveSupportType))."',";
$sql=$sql."DiveSupportName='".strip_tags(addslashes($DiveSupportName))."',";
$sql=$sql."DiveSupportAddress1='".strip_tags(addslashes($DiveSupportAddress1))."',";
$sql=$sql."DiveSupportAddress2='".strip_tags(addslashes($DiveSupportAddress2))."',";
$sql=$sql."DiveSupportCity='".strip_tags(addslashes($DiveSupportCity))."',";
$sql=$sql."DiveSupportProvince='".strip_tags(addslashes($DiveSupportProvince))."',";
$sql=$sql."DiveSupportCountry='".strip_tags(addslashes($DiveSupportCountry))."',";
$sql=$sql."DiveSupportPhone1='".strip_tags(addslashes($DiveSupportPhone1))."',";
$sql=$sql."DiveSupportPhone1Type='".strip_tags(addslashes($DiveSupportPhone1Type))."',";
$sql=$sql."DiveSupportPhone2='".strip_tags(addslashes($DiveSupportPhone2))."',";
$sql=$sql."DiveSupportPhone2Type='".strip_tags(addslashes($DiveSupportPhone2Type))."',";
$sql=$sql."DiveSupportPhone3='".strip_tags(addslashes($DiveSupportPhone3))."',";
$sql=$sql."DiveSupportPhone3Type='".strip_tags(addslashes($DiveSupportPhone3Type))."',";
$sql=$sql."DiveSupportWebsite='".strip_tags(addslashes($DiveSupportWebsite))."',";
$sql=$sql."DiveSupportEmail='".strip_tags(addslashes($DiveSupportEmail))."',";
$sql=$sql."DiveSupportExactLat='".strip_tags(addslashes($DiveSupportExactLat))."',";
$sql=$sql."DiveSupportExactLong='".strip_tags(addslashes($DiveSupportExactLong))."',";
$sql=$sql."DiveSupportHoursMon='".strip_tags(addslashes($DiveSupportHoursMon))."',";
$sql=$sql."DiveSupportHoursTues='".strip_tags(addslashes($DiveSupportHoursTues))."',";
$sql=$sql."DiveSupportHoursWed='".strip_tags(addslashes($DiveSupportHoursWed))."',";
$sql=$sql."DiveSupportHoursThu='".strip_tags(addslashes($DiveSupportHoursThu))."',";
$sql=$sql."DiveSupportHoursFri='".strip_tags(addslashes($DiveSupportHoursFri))."',";
$sql=$sql."DiveSupportHoursSat='".strip_tags(addslashes($DiveSupportHoursSat))."',";
$sql=$sql."DiveSupportHoursSun='".strip_tags(addslashes($DiveSupportHoursSun))."',";
$sql=$sql."DiveSupportServices='".strip_tags(addslashes($DiveSupportServices))."',";
$sql=$sql."DiveSupportSuppliersNote='".strip_tags(addslashes($DiveSupportSuppliersNote))."',";
$sql=$sql."DiveSupportNotes='".strip_tags(addslashes($DiveSupportNotes))."',";
$sql=$sql."DiveSupportPaidDate='".strip_tags(addslashes($DiveSupportPaidDate))."',";
$sql=$sql."DiveSupportPCZip='".strip_tags(addslashes($DiveSupportPCZip))."' where DiveSupportId='".$DiveSupportId."'"; 
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSupport DATA failure");
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#-----------------------------Print Out Current Form Variables--------------------------

function PrintFormVars()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
OutputMessage('NumDiveSupportRecords: '.$NumDiveSupportRecords);
OutputMessage('DiveSupportId: '.$DiveSupportId);
OutputMessage('DiveSupportStatus: '.$DiveSupportStatus);
OutputMessage('DiveSupportType: '.$DiveSupportType);
OutputMessage('DiveSupportName: '.$DiveSupportName);
OutputMessage('DiveSupportAddress1: '.$DiveSupportAddress1);
OutputMessage('DiveSupportAddress2: '.$DiveSupportAddress2);
OutputMessage('DiveSupportCity: '.$DiveSupportCity);
OutputMessage('DiveSupportProvince: '.$DiveSupportProvince);
OutputMessage('DiveSupportCountry: '.$DiveSupportCountry);
OutputMessage('DiveSupportPhone1: '.$DiveSupportPhone1);
OutputMessage('DiveSupportPhone1Type: '.$DiveSupportPhone1Type);
OutputMessage('DiveSupportPhone2: '.$DiveSupportPhone2);
OutputMessage('DiveSupportPhone2Type: '.$DiveSupportPhone2Type);
OutputMessage('DiveSupportPhone3: '.$DiveSupportPhone3);
OutputMessage('DiveSupportPhone3Type: '.$DiveSupportPhone3Type);
OutputMessage('DiveSupportWebsite: '.$DiveSupportWebsite);
OutputMessage('DiveSupportEmail: '.$DiveSupportEmail);
OutputMessage('DiveSupportExactLat: '.$DiveSupportExactLat);
OutputMessage('DiveSupportExactLong: '.$DiveSupportExactLong);
OutputMessage('DiveSupportHoursMon: '.$DiveSupportHoursMon);
OutputMessage('DiveSupportHoursTues: '.$DiveSupportHoursTues);
OutputMessage('DiveSupportHoursWed: '.$DiveSupportHoursWed);
OutputMessage('DiveSupportHoursThu: '.$DiveSupportHoursThu);
OutputMessage('DiveSupportHoursFri: '.$DiveSupportHoursFri);
OutputMessage('DiveSupportHoursSat: '.$DiveSupportHoursSat);
OutputMessage('DiveSupportHoursSun: '.$DiveSupportHoursSun);
OutputMessage('DiveSupportServices: '.$DiveSupportServices);
OutputMessage('DiveSupportSuppliersNote: '.$DiveSupportSuppliersNote);
OutputMessage('DiveSupportNotes: '.$DiveSupportNotes);
OutputMessage('DiveSupportPaidDate: '.$DiveSupportPaidDate);
OutputMessage('DiveSupportPCZip: '.$DiveSupportPCZip);
return;
}
#-----------------------------Database Add Function---------------------------------------

function Db_Add()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="insert into DiveSupport(DiveSupportStatus,DiveSupportType,DiveSupportName,DiveSupportAddress1,DiveSupportAddress2,DiveSupportCity,DiveSupportProvince,DiveSupportCountry,DiveSupportPhone1,DiveSupportPhone1Type,DiveSupportPhone2,DiveSupportPhone2Type,DiveSupportPhone3,DiveSupportPhone3Type,DiveSupportWebsite,DiveSupportEmail,DiveSupportExactLat,DiveSupportExactLong,DiveSupportHoursMon,DiveSupportHoursTues,DiveSupportHoursWed,DiveSupportHoursThu,DiveSupportHoursFri,DiveSupportHoursSat,DiveSupportHoursSun,DiveSupportServices,DiveSupportSuppliersNote,DiveSupportNotes,DiveSupportPaidDate,DiveSupportPCZip) values (";
$sql=$sql."'".strip_tags(addslashes($DiveSupportStatus))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportType))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportName))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportAddress1))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportAddress2))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportCity))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportProvince))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportCountry))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportPhone1))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportPhone1Type))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportPhone2))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportPhone2Type))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportPhone3))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportPhone3Type))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportWebsite))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportEmail))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportExactLat))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportExactLong))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportHoursMon))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportHoursTues))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportHoursWed))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportHoursThu))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportHoursFri))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportHoursSat))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportHoursSun))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportServices))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportSuppliersNote))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportNotes))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportPaidDate))."',";
$sql=$sql."'".strip_tags(addslashes($DiveSupportPCZip))."')";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSupport ADD failure");
$DiveSupportId=mysql_insert_id($connection);
PutVariablesIntoSession();
mysql_close($connection);
return;
}
#----------------------------Database Delete Function------------------------------------

function Db_Delete()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="delete from DiveSupport where DiveSupportId='".$DiveSupportId."'";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSupport DELETE failure");
mysql_close($connection);
return;
}
#-----------------------------Get Current Number of Records -----------------------------

function CurrentNumberRecords()
 { 
global $db, $user, $serverhost, $password, $Add, $Edit, $Delete, $Search, $Start, $Expiry;
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSupport order by DiveSupportStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSupport GetNumRecs failure");
$NumDiveSupportRecords = mysql_num_rows($result);
mysql_close($connection);
return;
}
#------------------------------Screen Report of Records in Database ---------------------

function ListRecords()
 { 
global $user, $serverhost,$db,$password;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSupport order by DiveSupportStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSupport GetNumRecs failure");
$NumDiveSupportRecords = mysql_num_rows($result);
echo "<form action='DiveSupport.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSupportId</b></td>";
echo "<td align='center' ><b>DiveSupportStatus</b></td>";
echo "<td align='center' ><b>DiveSupportType</b></td>";
echo "<td align='center' ><b>DiveSupportName</b></td>";
echo "<td align='center' ><b>DiveSupportAddress1</b></td>";
echo "<td align='center' ><b>DiveSupportAddress2</b></td>";
echo "<td align='center' ><b>DiveSupportCity</b></td>";
echo "<td align='center' ><b>DiveSupportProvince</b></td>";
echo "<td align='center' ><b>DiveSupportCountry</b></td>";
echo "<td align='center' ><b>DiveSupportPhone1</b></td>";
echo "<td align='center' ><b>DiveSupportPhone1Type</b></td>";
echo "<td align='center' ><b>DiveSupportPhone2</b></td>";
echo "<td align='center' ><b>DiveSupportPhone2Type</b></td>";
echo "<td align='center' ><b>DiveSupportPhone3</b></td>";
echo "<td align='center' ><b>DiveSupportPhone3Type</b></td>";
echo "<td align='center' ><b>DiveSupportWebsite</b></td>";
echo "<td align='center' ><b>DiveSupportEmail</b></td>";
echo "<td align='center' ><b>DiveSupportExactLat</b></td>";
echo "<td align='center' ><b>DiveSupportExactLong</b></td>";
echo "<td align='center' ><b>DiveSupportHoursMon</b></td>";
echo "<td align='center' ><b>DiveSupportHoursTues</b></td>";
echo "<td align='center' ><b>DiveSupportHoursWed</b></td>";
echo "<td align='center' ><b>DiveSupportHoursThu</b></td>";
echo "<td align='center' ><b>DiveSupportHoursFri</b></td>";
echo "<td align='center' ><b>DiveSupportHoursSat</b></td>";
echo "<td align='center' ><b>DiveSupportHoursSun</b></td>";
echo "<td align='center' ><b>DiveSupportServices</b></td>";
echo "<td align='center' ><b>DiveSupportSuppliersNote</b></td>";
echo "<td align='center' ><b>DiveSupportNotes</b></td>";

echo "<td align='center' ><b>DiveSupportPaidDate</b></td>";
echo "<td align='center' ><b>DiveSupportPCZip</b></td>";
echo '</tr>';
 for($i=1;$i<=$NumDiveSupportRecords;$i++)
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
echo "<td align='left'>".$rowdata[17]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[18]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[19]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[20]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[21]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[22]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[23]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[24]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[25]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[26]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[27]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[28]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[29]."&nbsp; </td>";
echo "<td align='left'>".$rowdata[30]."&nbsp; </td>";
echo "</tr>";
}
echo "<tr><td colspan='30' align='center'><input type ='SUBMIT' NAME='display_button' Value = 'Back to Main'></td></tr>";
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
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSupport order by DiveSupportStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSupport GetNumRecs failure");
$NumDiveSupportRecords = mysql_num_rows($result);
mysql_close($connection);
echo "<form name='ListMenu' action='DiveSupport.php' method ='POST'>";
echo"<table align='center' border = '1' cellspacing ='3'>";
echo "<input type='hidden' name='check' id='check'>";
echo "<tr>";
echo "<td align='center' ><b>DiveSupportId</b></td>";

echo "<td align='center' ><b>DiveSupportStatus</b></td>";

//echo "<td align='center' ><b>DiveSupportType</b></td>";

echo "<td align='center' ><b>DiveSupportName</b></td>";

echo "<td align='center' ><b>Address</b></td>";
//echo "<td align='center' ><b>DiveSupportAddress2</b></td>";
//echo "<td align='center' ><b>DiveSupportCity</b></td>";
//echo "<td align='center' ><b>DiveSupportProvince</b></td>";
//echo "<td align='center' ><b>DiveSupportCountry</b></td>";

echo "<td align='center' ><b>Phones</b></td>";
//echo "<td align='center' ><b>DiveSupportPhone1Type</b></td>";
//echo "<td align='center' ><b>DiveSupportPhone2</b></td>";
//echo "<td align='center' ><b>DiveSupportPhone2Type</b></td>";
//echo "<td align='center' ><b>DiveSupportPhone3</b></td>";
//echo "<td align='center' ><b>DiveSupportPhone3Type</b></td>";
//echo "<td align='center' ><b>DiveSupportWebsite</b></td>";
//echo "<td align='center' ><b>DiveSupportEmail</b></td>";
//echo "<td align='center' ><b>DiveSupportExactLat</b></td>";
//echo "<td align='center' ><b>DiveSupportExactLong</b></td>";
//echo "<td align='center' ><b>DiveSupportHoursMon</b></td>";
//echo "<td align='center' ><b>DiveSupportHoursTues</b></td>";
//echo "<td align='center' ><b>DiveSupportHoursWed</b></td>";
//echo "<td align='center' ><b>DiveSupportHoursThu</b></td>";
//echo "<td align='center' ><b>DiveSupportHoursFri</b></td>";
//echo "<td align='center' ><b>DiveSupportHoursSat</b></td>";
//echo "<td align='center' ><b>DiveSupportHoursSun</b></td>";
//echo "<td align='center' ><b>DiveSupportServices</b></td>";
//echo "<td align='center' ><b>DiveSupportSuppliersNote</b></td>";
//echo "<td align='center' ><b>DiveSupportNotes</b></td>";

echo "<td align='center' ><b>DiveSupportPaidDate</b></td>";

echo '</tr>';
 for($i=1;$i<=$NumDiveSupportRecords;$i++)
{
$rowdata=mysql_fetch_row($result);
echo "<tr>";
echo "<td align='center'><input type=radio id='SelectRecord' NAME='SelectRecord' VALUE='".$rowdata[0]."' onClick=\"document.forms.ListMenu.display_button.value = 'Display';document.forms.ListMenu.check.value = 'Display';document.forms.ListMenu.submit();\" >&nbsp; </td>";

echo "<td align='left'>".$rowdata[1]."&nbsp; </td>";

//echo "<td align='left'>".$rowdata[2]."&nbsp; </td>";

echo "<td align='left'>".$rowdata[3]."&nbsp; </td>";

echo "<td align='left'>".$rowdata[4]."&nbsp; <br>".$rowdata[5]."<br>".$rowdata[6]."<br>".$rowdata[7]."<br>".$rowdata[8].'<br>'.$rowdata[30];
//echo "<td align='left'>".$rowdata[5]."&nbsp; <br>";
//echo "<td align='left'>".$rowdata[6]."&nbsp; <br>";
//echo "<td align='left'>".$rowdata[7]."&nbsp; <br>";
//echo "<td align='left'>".$rowdata[8]."&nbsp; </td>";

echo "<td align='left'>".$rowdata[9]."&nbsp; <br>".$rowdata[11]."<br>".$rowdata[13];
//echo "<td align='left'>".$rowdata[10]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[11]."&nbsp; <br>";
//echo "<td align='left'>".$rowdata[12]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[13]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[14]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[15]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[16]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[17]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[18]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[19]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[20]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[21]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[22]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[23]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[24]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[25]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[26]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[27]."&nbsp; </td>";
//echo "<td align='left'>".$rowdata[28]."&nbsp; </td>";

echo "<td align='left'>".$rowdata[29]."&nbsp; </td>";
echo "</tr>";
}
echo "<tr><td colspan='30' align='center'>
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
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
$sql="select * from DiveSupport order by DiveSupportStatus";
$result = mysql_query($sql,$connection) or die("ERROR!! DiveSupport InitializeProgram failure");
$NumDiveSupportRecords = mysql_num_rows($result);
if($NumDiveSupportRecords==0)
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
global $NumDiveSupportRecords,$DiveSupportId,$DiveSupportStatus,$DiveSupportType,$DiveSupportName;
global $DiveSupportAddress1,$DiveSupportAddress2,$DiveSupportCity,$DiveSupportProvince,$DiveSupportCountry;
global $DiveSupportPhone1,$DiveSupportPhone1Type,$DiveSupportPhone2,$DiveSupportPhone2Type;
global $DiveSupportPhone3,$DiveSupportPhone3Type,$DiveSupportWebsite,$DiveSupportEmail,$DiveSupportExactLat;
global $DiveSupportExactLong,$DiveSupportHoursMon,$DiveSupportHoursTues,$DiveSupportHoursWed;
global $DiveSupportHoursThu,$DiveSupportHoursFri,$DiveSupportHoursSat,$DiveSupportHoursSun;
global $DiveSupportServices,$DiveSupportSuppliersNote,$DiveSupportNotes,$DiveSupportPaidDate,$DiveSupportPCZip;
$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to divesites database');
//$sql="select * from DiveSupport where(DiveSupportStatus ='".strip_tags(addslashes($DiveSupportStatus))."') order by DiveSupportStatus";

$sql="select * from DiveSupport where(DiveSupportName ='".strip_tags(addslashes($DiveSupportName))."') order by DiveSupportName";

$result = mysql_query($sql,$connection) or die("ERROR!! DiveSupport Select * failure");
$NumDiveSupportRecordsDesired = mysql_num_rows($result);
mysql_close($connection);
if($NumDiveSupportRecordsDesired>0)
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