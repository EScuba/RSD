<?php /**/ ?><?php











$username="kenpon";
$user="kenpon";
$password="@notherP@ssw0rd";
$database="aquatreasurequest";
$db="aquatreasurequest";
$serverhost="mysql.aquatreasurequest.com";




$BackgroundColor="#66ccff";

#-------------------Check for Program Execution Validity------------------------------------
function ValidUserForProgram($UserName, $Program)

{
	global $db, $user, $serverhost, $password;

$connection = mysql_connect($serverhost,$user,$password) or die('ERROR!!  Cannot connect to MySql');
$rs = mysql_select_db($db,$connection)    or die('ERROR!! Cannot connect to propipeemployeenew database');
$sql="select * from AccessList where(AccessUserName = '".strip_tags(addslashes($UserName))."' && AccessProgram = '".strip_tags(addslashes($Program))."' && AccessSearch = 'YES') order by AccessUserName";
#OutputMessage('Sql: '.$sql);
$result = mysql_query($sql,$connection) or die("ERROR!! AccessList Security * failure");
$NumAccessListRecordsDesired = mysql_num_rows($result);
#OutputMessage('num: '.$NumAccessListRecordsDesired);
mysql_close($connection);
if($NumAccessListRecordsDesired > 0)
{
	$rowdata=mysql_fetch_row($result);
	$_SESSION['Add']=$rowdata[3];
	$_SESSION['Edit']=$rowdata[4];
	$_SESSION['Delete']=$rowdata[5];
	$_SESSION['Search']=$rowdata[6];
	$_SESSION['Start']=$rowdata[12];
	$_SESSION['Expiry']=$rowdata[13];
	return TRUE;}
  else
{
	$_SESSION['Add']='NO';
	$_SESSION['Edit']='NO';
	$_SESSION['Delete']='NO';
	$_SESSION['Search']='NO';
	$_SESSION['Start']=date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")));
	$_SESSION['Expiry']=date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")));
	return FALSE;}
	
}





function WriteLogRecord($User,$Activity,$Status)
 {
     global $serverhost,$user, $password,$db;

      $table = "LoginData";
                             


     $conn = mysqli_connect($serverhost, $user,$password);
#        if($conn)
#            { $msg="OK User is connected";
#             echo($msg."<br>");}
    
      $rs = mysqli_select_db($conn, $db) or die("Error: Selecting Database for Log Recording");
      $sql = "insert into LoginData (LoginUser,LoginActivity,LoginDate,LoginTime,LoginStatus) values('".$User."','".$Activity."', CURDATE(), CURTIME(),'".$Status."')";
#     echo $sql.'<br>';
       $result = mysqli_query($conn, $sql) or die("Err: Log Data Insert");
       
       mysqli_close($conn);
 }

function OutputMessage($msg)
 {
      echo '<br>'.$msg.'<br>';

}
 

// Show an error and stop the script
function showerror()
{
   if (mysql_error())
      die("Error " . mysql_errno() . " : " . mysql_error());
   else
      die("Could not connect to the DBMS");
}

// Secure the user data by escaping characters 
// and shortening the input string
function clean($input, $maxlength)
{
  $input = substr($input, 0, $maxlength);
  $input = EscapeShellCmd($input);
  return ($input);
}

?>