<?php
$data = array(
 array('field1'=> 'field1a data','field2' => 'field2a data','field3'=>'field3a data'),
 array('field1'=> 'field1b data','field2' => 'field2b data','field3'=>'field3b data'),
 array('field1'=> 'field1c data','field2' => 'field2c data','field3'=>'field3c data'));
 
 
$data=array('field1'=> 'field1 data','field2' => 'field2 data','field3'=>'field3 data'); 
 
header('Content-type:application/json');
// echo json_encode($data);

$path = 'PICT0029.JPG';
 $type = pathinfo($path,PATHINFO_EXTENSION);
 $dara = file_get_contents($path);
$base64='data:image/'.$type.';base64,'.base64_encode($dara);

// echo($base64);

 $imagetosend = array('initial'=>'stuff','image'=> $base64,'image2'=> $base64);
 echo json_encode($imagetosend);

//$file=fopen($path, "rb");
//$contents = fread($file, filesize($path));
//fclose($file);



//$imagetosend = array('initial'=>'stuff','image'=> $contents);

//echo json_encode($imagetosend);

?>
