<?php /**/ ?><?php

session_start();
require_once('SystemFunctions.php');
# print_r($_POST);
 
#foreach ($_POST['DiveSiteCommunityAssessmentResponse'] as $key => $value) 
# { echo "<li>".$key."==>".$value."</li>\n"; } 
 

#------ get the data from the entry program -------------------------------

$CommunityAssessment=$_POST['DiveSiteCommunityAssessmentResponse'];
echo('<br>');
print_r($CommunityAssessment);



$DiveSiteCommunityAssessmentIdArray=$_SESSION['DiveSiteCommunityAssessmentIdArray'] ;
$DiveSiteCommunityAssessmentRankArray=$_SESSION['DiveSiteCommunityAssessmentRankArray'];
$DiveSiteCommunityAssessmentDescriptionArray=$_SESSION['DiveSiteCommunityAssessmentDescriptionArray'] ;



function EncodeRadioData($SelectedItems,$ChoiceId,$ChoiceRank,$ChoiceDescription,&$Encoded)
 {

 # - function takes in data and returns a sting that encodes the items selected in checkboxes
 
 
#echo('<br>items: '.count($ChoiceDescription));
#echo('<br>Selected: ');
#print_r($SelectedItems);


if (empty($SelectedItems))
 {
    echo("no items selected");
  
 }
else
 {
  
    $NumSelectedItems=count($SelectedItems);
    
#    echo('<br>have: '.$NumSelectedItems);
   
#   echo('<br />');
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
     for ($i=0;$i < $NumAvailableChoices;$i++)
       {
       	
       	for ($j=0;$j < 5; $j++)
       	  {
 #      	  	 echo('<br>here: '.$i.' '.$j.' '.$SelectedItems[$i][$j]); 
       	  	
       	  	$array_key=$i.",".$j;
#       	  	echo('<br>'.$array_key);
#       	  	echo('<br> at  check: '.$SelectedItems[$array_key]);
       	  	if($SelectedItems[$array_key]==1)
       	  	   {       	  		
       	  		 	$Encoded=$Encoded.'1';
       	  		 }
       	  		 else
       	  		 {
       	  		 	$Encoded=$Encoded.'0';
       	  		 }		
       	  		 
       	  	}	
       	} 
        echo('coded-->'.$Encoded.'<br />');
     
       }
 
 
 
 
 
 return;
 
 
 
}
 


function DeCodeRadioData($Encoded,$ChoiceId,$ChoiceRank,$ChoiceDescription,&$DecodedDescription)
{

 
 $CodeLength= strlen($Encoded);
 $NumChoices=count($ChoiceRank);
 $CodedStringCount=0;
 for($i=0;$i < $NumChoices;$i++)
  { 
  	 for($j=0;$j < 5;$j++)
  	   {
  	   	 $array_key=$i.",".$j;
  	   	 if($Encoded[$CodedStringCount]==1)
  	   	  {
  	   	  	$DecodedDescription[$array_key]=1;
  	   	  }	
  	   	$CodedStringCount++;  
        }
    }    
$check=count($DecodedDescription);
print_r($DecodedDescription);

}


#print_r('<br>before'.$CommunityAssessment);

EncodeRadioData($CommunityAssessment,$DiveSiteCommunityAssessmentIdArray,$DiveSiteCommunityAssessmentRankArray,$DiveSiteCommunityAssessmentDescriptionArray,$CommunityAssessmentCode);


echo('<br>coded string is: '.$CommunityAssessmentCode);


DeCodeRadioData($CommunityAssessmentCode,$DiveSiteCommunityAssessmentIdArray,$DiveSiteCommunityAssessmentRankArray,$DiveSiteCommunityAssessmentDescriptionArray,$DecodedCommunityAssessmentCode);

  
for($i=0;$i<count($DiveSiteCommunityAssessmentRankArray);$i++)
 {
 	  
 	  for($j=0;$j < 5;$j++)
 	   {
 	   	 $array_key=$i.','.$j;
 	   	 if($DecodedCommunityAssessmentCode[$array_key]==1)
 	   	  {
 	   	  	 echo('<br>'.$DiveSiteCommunityAssessmentDescriptionArray[$i].'-->'.$j);
 	   	  }	 
 	}   	 
}   
     
     
  
  
 
  
  ?>     