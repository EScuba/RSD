<?php /**/ ?><?php

session_start();
require_once('SystemFunctions.php');
# print_r($_SESSION);

#------ get the data from the entry program -------------------------------

$Facilities=$_POST['DiveFacility'];

$DiveSiteFacilitiesIdArray=$_SESSION['DiveSiteFacilitiesIdArray'] ;
$DiveSiteFacilitiesRankArray=$_SESSION['DiveSiteFacilitiesRankArray'];
$DiveSiteFacilitiesDescriptionArray=$_SESSION['DiveSiteFacilitiesDescriptionArray'] ;



function EnCodeData($SelectedItems,$ChoiceId,$ChoiceRank,$ChoiceDescription,&$Encoded)
 {

 # - function takes in data and returns a sting that encodes the items selected in checkboxes
 
 





if (empty($SelectedItems))
 {
    echo("no items selected");
  
 }
else
 {
  
    $NumSelectedItems=count($SelectedItems);
    echo('<br />');
#    for ($i=0;$i < $NumSelectedItems;$i++)
#     {
#       echo($SelectedItems[$i]);
#       echo('<br />');
#     }
 # ------now take the array and process it into a string for storage--------------------------------------    
     $Encoded='';
 #    echo('check for: '.$ChoiceId[0]);
     $NumAvailableChoices=count($ChoiceId);
#    echo('count is: '.$NumAvailableChoices.'<br />');
     for ($i=0;$i < $NumSelectedItems;$i++)
       {
       	
       	for ($j=0;$j < $NumAvailableChoices; $j++)
       	  {
       	  	
       	  	if($SelectedItems[$i]==$ChoiceDescription[$j])
       	  	{
       	  		if ($Encoded=='')
       	  		 {
       	  		 	$Encoded=$ChoiceId[$j];
       	  		 }
       	  		 else
       	  		 {
       	  		 	$Encoded=$Encoded.'*'.$ChoiceId[$j];
       	  		 }		
       	  		 $j=$NumAvailableChoices+2;
       	  	}	
       	} 
#        echo('coded-->'.$Encoded.'<br />');
       }
 
 
 
 
 
 return;
 
 
 
}
 }


function DeCodeData($delimiter,$Encoded,$ChoiceId,$ChoiceRank,$ChoiceDescription,&$DecodedDescription)
{

 
 $CodeLength= strlen($Encoded);
# echo('<br>Code length: '.$CodeLength.'<br>');
 $index=0;
 for($i=0;$i < $CodeLength; $i++)
  {
#  	echo('<br>letter is: '.$Encoded[$i]);
  	if($Encoded[$i]!=$delimiter)
  	 {
  	 	 $Decoded[$index]=$Decoded[$index].$Encoded[$i];
  	 }
  	else
  	 {
  	 	 
  	 	 $index++;
#  	 	  echo('got to index update'.$index.'<br>');
  	 }
   }
   
#  for($i=0;$i <= $index; $i++)
#  {
 #  	 echo('<br>'.$i.' '.$Decoded[$i]);
 #  }	  
   
#---- translate it back to the descriptions --------------------------------------------   
 $NumAvailableChoices=count($ChoiceId);   
 
  for($i=0;$i <= $index; $i++)
   {
   	 
   	 for($j=0; $j < $NumAvailableChoices; $j++)
   	   {
   	   	
   	   	 if ($Decoded[$i]==$ChoiceId[$j])
   	   	   {
#   	   	   	 echo('<br>'.$ChoiceDescription[$j]);
   	   	   	  $DecodedDescription[$i]=$ChoiceDescription[$j];
   	   	   	 $j= $NumAvailableChoices+2;
   	   	   }
   	   	   	 
   	   }  	    
   	 

   	 
   	 
   	 
   	 
   	 
   	 
   }



}

EnCodeData($Facilities,$DiveSiteFacilitiesIdArray,$DiveSiteFacilitesRankArray,$DiveSiteFacilitiesDescriptionArray,$FacilityCode);


echo('coded string is: '.$FacilityCode);


DeCodeData('*',$FacilityCode,$DiveSiteFacilitiesIdArray,$DiveSiteFacilitesRankArray,$DiveSiteFacilitiesDescriptionArray,$DecodedFacilityDescription);

  
for($i=0;$i<count($DecodedFacilityDescription);$i++)
 {
 	  echo('<br>'.$i.'===>'.$DecodedFacilityDescription[$i]);
}   
     
     
  
  
 
  
  ?>     