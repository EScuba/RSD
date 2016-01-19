<?php /**/ ?><?php


 require_once("SystemFunctions.php");
 $Table="DiveSiteCourses";$Columns = 2;
     

      
      
$conn = mysql_connect($serverhost, $user, $password);
       if($conn){ $msg="OK ".$username." is connected<br />"; OutputMessage($msg);}
echo('Database: '.$db);
$rs = mysql_select_db($db,$conn) or die("Error: Selecting files Database");


      $sql="describe"." ".$Table;

     $result = mysql_query($sql, $conn) or die("ERROR!! Describe failure");

    $rows = mysql_num_rows($result) or die ("ERROR!! Row count problem");

#     echo $rows.'<br />';

     for ($i=1;$i<=$rows;$i++)
      {
          $rowdata = mysql_fetch_row($result);
          $Field[$i]=$rowdata[0];
          $Type[$i]=$rowdata[1];
          $Test1 =strpos($Type[$i],'(');  
          $Test2 = strpos($Type[$i],')');        
          $Len =$Test2-$Test1-1;
          $VarLength[$i]=substr($Type[$i],$Test1+1,$Len);
#        echo $i.' '.$Test1.' '.$Test2.' '.$Len.' '.$VarLength[$i].'<br />';
#        echo($Field[$i].'  '.$Type[$i].'  '.strpos($Type[$i],"date").'<br />');
#       if($Type[$i]=='date')  {echo('it is a date!!');} else{echo('problem!');}
         
      }

  mysql_close($conn);
  
  
ob_start();

echo "<?php\n";

echo "session_start();\n";

echo "require_once('SystemFunctions.php');\n";

      
 echo("ValidUserForProgram(\$_SESSION['User'],'".$Table.".php');\n");
 echo("
 \$Add=\$_SESSION['Add'];\n
 \$Edit=\$_SESSION['Edit'];\n
 \$Delete=\$_SESSION['Delete'];\n
 \$Search=\$_SESSION['Search'];\n
 \$Start=\$_SESSION['Start'];\n
 \$Expiry=\$_SESSION['Expiry'];\n
 ");

echo "if((\$_POST['display_button']=='Back')||(\$_POST['display_button']=='Logout'))\n";
echo "  { \n";    
echo "      header('Location: index.php');\n";
echo "  } \n";




echo "\$db=\"$db\";\n";
echo "\$table=\"$Table\";\n";
echo "\$CallingProgram=\"index.php\";\n";

echo "#-------------------------Get a Desired Record -------------------------\n\n";

echo "function GetLoadDesiredRecord()
 { \n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      

echo "global \$DesiredRecord;\n";

$Count= "\$Num".$Table."Records";



echo "\$connection = mysql_connect(\$serverhost,\$user,\$password) or die('ERROR!!  Cannot connect to MySql');\n";   
echo "\$rs = mysql_select_db(\$db,\$connection)    or die('ERROR!! Cannot connect to $db database');\n";
echo "\$sql=\"select * from $Table where($Field[1] = '\".strip_tags(addslashes(\$DesiredRecord)).\"') order by $Field[1]\";\n";
echo "\$result = mysql_query(\$sql,\$connection) or die(\"ERROR!! $Table Select * failure\");\n";

echo $Count."Desired = mysql_num_rows(\$result);\n";
$Count2 =$Count."Desired";
echo "mysql_close(\$connection);\n";
echo "if(".$Count2.">0)\n";
  echo "{\n";
  echo "\$rowdata=mysql_fetch_row(\$result);\n";
for ($i=1;$i<=$rows;$i++)
    {
       $index=$i-1;        
       echo "\$".$Field[$i]."=\$rowdata[".$index."];\n"; 
    } 

echo "}\n";  
  
 echo "PutVariablesIntoSession();\n";
echo "return;\n"; 

echo "}\n";    

echo "#-------------------------Transfer Screen to Session Variables--------------------------\n\n";

echo "function PutVariablesIntoSession()
 { \n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      



for ($i=1;$i<=$rows;$i++)
    {
        echo "\$_SESSION['".$Field[$i]."'] = \$".$Field[$i].";\n";

    }

echo "return;\n";
echo"}\n\n";

echo "#--------------------Transfer POST to screen variables ----------------------------------\n\n";

echo "function GetPostVariables()
 { \n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


  
for ($i=1;$i<=$rows;$i++)
    {
        echo "\$".$Field[$i]."=\$_POST['".$Field[$i]."'];\n";

    }
echo "return;\n";
echo"}\n\n";
echo "#-----------------------Transfer Session Variables to Screen variables---------------------\n\n";

echo "function GetVariablesFromSession()
 { \n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


  for ($i=1;$i<=$rows;$i++)
    {
                echo "\$".$Field[$i]."=\$_SESSION['".$Field[$i]."'];\n"; 
    }
echo "return;\n";
echo"}\n\n";

echo "#----------------------------Get Last Database Record-----------------------------------------\n";

echo "function GetLastRecord(\$conn,\$result)
 { \n";
$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


$Count= "\$Num".$Table."Records";

echo "for(\$i=1;\$i<=".$Count.";\$i++)\n";
echo  "{\n";
echo "\$rowdata=mysql_fetch_row(\$result);\n";

  for ($i=1;$i<=$rows;$i++)
    {
       $index=$i-1;        
       echo "\$".$Field[$i]."=\$rowdata[".$index."];\n"; 
    } 
             
echo "}\n";
echo "PutVariablesIntoSession();\n";
echo "return;\n";
echo "}\n";

echo "#----------------------------Common Form-----------------------------------------------------\n";

echo "function CommonForm ()  {\n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


echo "global \$Mode;\n";      
echo "echo stripslashes(\"\n";

echo "<TABLE border='1' align='center'><tr><td>\n";

echo "<TABLE border='1' align='center' cellspacing='5'>\n";
for ($i=1;$i<=$rows;$i++)
     {    
        
          echo "<tr>";
          echo "<th valign='top' align ='left' scope='row'>".$Field[$i]."</th>\n";
          
       if ($i==1)      
           {echo "<td><input type ='text' NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."' SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."' tabindex ='".$i."' id ='".$Field[$i]."' READONLY><br /></td>\n";}
       else
        {
        	     if($i==2)
                	 	 {
                	 	 	
                	 	if($Type[$i]!='date') 	
                	 	 {
                	 	echo "\"); if(\$Mode=='EDIT')\n";
                	 	echo("{echo (\"<td><input type ='text' style='color: gray' READONLY NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."'  SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."'  tabindex='".$i."' id ='".$Field[$i]."' \n   onBlur=\\\"if(isBlank(this.form.".$Field[$i].".value)) {alert('".$Field[$i]." cannot be blank');this.form.".$Field[$i].".style.background='Yellow';}else{this.form.".$Field[$i].".style.background='White';}\\\"><br /></td>\");}\n");
                	 	echo "else \n";
                	 	echo("{echo (\"<td><input type ='text' NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."'  SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."'  tabindex='".$i."' id ='".$Field[$i]."' \n   onBlur=\\\"if(isBlank(this.form.".$Field[$i].".value)) {alert('".$Field[$i]." cannot be blank');this.form.".$Field[$i].".style.background='Yellow';}else{this.form.".$Field[$i].".style.background='White';}\\\"><br /></td>\");}\n");
                	 	echo("echo stripslashes(\"");  
                	   }
                	  else
                	   { 
                	   
                	   echo "<td><input type ='text' NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."'  SIZE='11' MAXLENGTH='11'  tabindex='".$i."' id ='".$Field[$i]."' \n   onBlur=\\\"if(isBlank(this.form.".$Field[$i].".value)) {alert('".$Field[$i]." cannot be blank');this.form.".$Field[$i].".style.background='Yellow';}else{this.form.".$Field[$i].".style.background='White';}\\\">\");\n";           
                	 	 echo "if(\$Mode=='EDIT')\n";             	
                	   echo "{echo '<A HREF=\"#\" onClick=\"cal.select(document.forms[\'".$Table.Edit."\'].".$Field[$i].",\'anchor\',\'yyyy-MM-dd\');return false;\" NAME=\"anchor\" ID=\"anchor\">Calendar</A>';}";
                     echo "\nelse \n";
                 	   echo "{echo '<A HREF=\"#\" onClick=\"cal.select(document.forms[\'".$Table.Entry."\'].".$Field[$i].",\'anchor\',\'yyyy-MM-dd\');return false;\" NAME=\"anchor\" ID=\"anchor\">Calendar</A>';}";
                     echo("\necho(\"</td>\");\n");
                	   echo("echo stripslashes(\"");  
                	    
                	 } 
                	   }
                 else
                	   {
        	
        	
            if (strpos($Field[$i],'Note') !=0 || strpos($Field[$i],'Comments' )!=0|| strpos($Field[$i],'Description' )!=0  )
                {
                	echo "<td><TEXTAREA NAME='".$Field[$i]."' COLS=100 ROW=3 TABINDEX='".$i."'>\$".$Field[$i]."</TEXTAREA></td>\");\n";
                	echo("echo stripslashes(\"");
                }
               else
                {
                	if($Type[$i]=='date')           	
                	 { 
                	 	 
                	 	 echo "<td><input type ='text' NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."'  SIZE='11' MAXLENGTH='11'  tabindex='".$i."' id ='".$Field[$i]."' \n   onBlur=\\\"if(isBlank(this.form.".$Field[$i].".value)) {alert('".$Field[$i]." cannot be blank');this.form.".$Field[$i].".style.background='Yellow';}else{this.form.".$Field[$i].".style.background='White';}\\\">\");\n";           
                	 	 echo "if(\$Mode=='EDIT')\n";             	
                	   echo "{echo '<A HREF=\"#\" onClick=\"cal.select(document.forms[\'".$Table.Edit."\'].".$Field[$i].",\'anchor\',\'yyyy-MM-dd\');return false;\" NAME=\"anchor\" ID=\"anchor\">Calendar</A>';}";
                     echo "\nelse \n";
                 	   echo "{echo '<A HREF=\"#\" onClick=\"cal.select(document.forms[\'".$Table.Entry."\'].".$Field[$i].",\'anchor\',\'yyyy-MM-dd\');return false;\" NAME=\"anchor\" ID=\"anchor\">Calendar</A>';}";
                     echo("\necho(\"</td>\");\n");
                	   echo("echo stripslashes(\"");
                	}
                	   	else
                	
                	 {
                	 	
                	 	  if (strpos($Field[$i],'FileInfo')!=0)
                           {
                           	echo "<td><input type='file' NAME='".$Field[$i]."'  VALUE='\$".$Field[$i]."'  SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."'  tabindex='".$i."' id ='".$Field[$i]."' \n   onBlur=\\\"if(isBlank(this.form.".$Field[$i].".value)) {alert('".$Field[$i]." cannot be blank');this.form.".$Field[$i].".style.background='Yellow';}else{this.form.".$Field[$i].".style.background='White';}\\\"><br /></td>\");\n";           
                            echo("echo stripslashes(\"");
                           }  
                       else
                       {
                       echo "\");";                	   	
                	 	   echo("\necho (\"<td><input type ='text' NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."'  SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."'  tabindex='".$i."' id ='".$Field[$i]."' \n   onBlur=\\\"if(isBlank(this.form.".$Field[$i].".value)) {alert('".$Field[$i]." cannot be blank');this.form.".$Field[$i].".style.background='Yellow';}else{this.form.".$Field[$i].".style.background='White';}\\\"><br /></td>\");\n");                	   	
                       echo("echo stripslashes(\"");   
                       }
                	   }	 
                	            	 	
                	 }     
                	
                }	 
           
        
          
         
      }
       echo "</tr>"."\n";
     } 
  echo "<tr></tr><tr></tr><tr></tr>\n";  
 echo "<tr>\n";

echo "\");}\n";


echo "#----------------------------Entry Form----------------------------------------------------\n\n";

echo "function AddForm ()  {\n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


echo "global \$Mode;\n";     
echo "\$Mode='ADD';\n";

echo "echo stripslashes(\"\n";
echo "<FORM NAME='".$Table.Entry."' action='".$Table.".php' method='POST'>\");\n";




echo "CommonForm();\n";

echo "echo stripslashes(\"\n";
     echo "<td colspan =2 align='center'>\n";          
     echo "<input type ='SUBMIT' NAME='display_button' Value = 'Cancel Add'>\n";
     echo "<input type ='SUBMIT' NAME='display_button' Value = 'Submit Add'>\n";
        
     echo "</td>\n";
     echo "</tr>\");\n";

echo "if (\$_SESSION['SystemMessage']!='')
   {
   	 echo(\"<tr><td align='center' colspan=2>\".\$_SESSION['SystemMessage'].\"</td></tr>\");
   	 \$_SESSION['SystemMessage']=\"\";
   }\n";


echo "echo stripslashes(\"\n";
echo "</TABLE>\n";
echo "</td></tr></TABLE>\n";
echo "</FORM>\");}\n";



echo "#----------------------------Edit Form---------------------------------------------------\n\n";

echo "function EditForm ()  {\n";
$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


echo "global \$Mode;\n";     
echo "\$Mode='EDIT';\n";       
echo "echo stripslashes(\"\n";
echo "<FORM NAME='".$Table.Edit."' action='".$Table.".php' method='POST'>\");\n";


echo "CommonForm();\n";

echo "echo stripslashes(\"\n";
     echo "<td colspan =2 align='center'>\n";          
     echo "<input type ='SUBMIT' NAME='display_button' Value = 'Cancel Edit'>\n";
     echo "<input type ='SUBMIT' NAME='display_button' Value = 'Submit Changes'>\n";
         
     echo "</td>\n";
     echo "</tr>\n";


echo "</TABLE>\n";
echo "</td></tr></TABLE>\n";
echo "</FORM>\");}\n";



echo "#-----------------------------Delete Form------------------------------------------------\n\n";

echo "function DeleteForm()  {\n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


echo "echo stripslashes(\"\n";
echo "<FORM NAME='".$Table.Delete."' action='".$Table.".php' method='POST'>\n";
echo "<TABLE  align='center' border='1'><tr><td>\n";

echo "<TABLE align='center' border='1' cellspacing='5'>\n";
for ($i=1;$i<=$rows;$i++)
     {    
        
          echo "<tr>";
          echo "<th align ='left' valign='top' scope='row'>".$Field[$i]."</th>\n";
          
       if ($i==1)      
           {echo "<td><input type ='text' READONLY NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."' SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."' tabindex ='".$i."' id ='".$Field[$i]."' READONLY><br /></td></tr>\n";}
       else
        {
        	     if($i==2)
                	 	 {
                	 	echo "\"); if(\$Mode=='EDIT')\n";
                	 	echo("{echo (\"<td><input type ='text' style='color: gray' READONLY NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."'  SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."'  tabindex='".$i."' id ='".$Field[$i]."' \n   onBlur=\\\"if(isBlank(this.form.".$Field[$i].".value)) {alert('".$Field[$i]." cannot be blank');this.form.".$Field[$i].".style.background='Yellow';}else{this.form.".$Field[$i].".style.background='White';}\\\"><br /></td>\");}\n");
                	 	echo "else \n";
                	 	echo("{echo (\"<td><input type ='text' READONLY NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."'  SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."'  tabindex='".$i."' id ='".$Field[$i]."' \n   onBlur=\\\"if(isBlank(this.form.".$Field[$i].".value)) {alert('".$Field[$i]." cannot be blank');this.form.".$Field[$i].".style.background='Yellow';}else{this.form.".$Field[$i].".style.background='White';}\\\"><br /></td>\");}\n");
                	 	echo("echo stripslashes(\"");   
                	   }
                 else
                	   {
        	
        	
            if (strpos($Field[$i],'Note') !=0 || strpos($Field[$i],'Comments' )!=0|| strpos($Field[$i],'Description' )!=0)
                {
                	echo "<td><TEXTAREA NAME='".$Field[$i]."' READONLY COLS=100 ROW=3 TABINDEX='".$i."'>\$".$Field[$i]."</TEXTAREA></td>\");\n";
                	echo("echo stripslashes(\"");
                }
               else
                {
                	if($Type[$i]=='date')                	
                	 { 
                	 	 
                	 	 echo "<td><input type ='text'READONLY NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."'  SIZE='11' MAXLENGTH='11'  tabindex='".$i."' id ='".$Field[$i]."'>\");\n";  
                	 	 echo "if(\$Mode=='EDIT')\n";             	
                	   echo "{echo '<A HREF=\"#\" onClick=\"cal.select(document.forms[\'".$Table.Edit."\'].".$Field[$i].",\'anchor\',\'yyyy-MM-dd\');return false;\" NAME=\"anchor\" ID=\"anchor\">Calendar</A>';}";
                     echo "\nelse \n";
                 	   echo "{echo '<A HREF=\"#\" onClick=\"cal.select(document.forms[\'".$Table.Entry."\'].".$Field[$i].",\'anchor\',\'yyyy-MM-dd\');return false;\" NAME=\"anchor\" ID=\"anchor\">Calendar</A>';}";
                     echo("\necho(\"</td>\");\n");
                	   echo("echo stripslashes(\"");
                	}
                	   	else
                	
                	 {
                	 	
                	 	  if (strpos($Field[$i],'FileInfo')!=0)
                           {
                           	echo "<td><input type='file'READONLY NAME='".$Field[$i]."'  VALUE='\$".$Field[$i]."'  SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."'  tabindex='".$i."' id ='".$Field[$i]."' \n   onBlur=\\\"if(isBlank(this.form.".$Field[$i].".value)) {alert('".$Field[$i]." cannot be blank');this.form.".$Field[$i].".style.background='Yellow';}else{this.form.".$Field[$i].".style.background='White';}\\\"><br /></td>\");\n";           
                            echo("echo stripslashes(\"");
                           }  
                       else
                       {
                       echo "\");";                	   	
                	 	   echo("\necho (\"<td><input type ='text'READONLY NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."'  SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."'  tabindex='".$i."' id ='".$Field[$i]."' \n   onBlur=\\\"if(isBlank(this.form.".$Field[$i].".value)) {alert('".$Field[$i]." cannot be blank');this.form.".$Field[$i].".style.background='Yellow';}else{this.form.".$Field[$i].".style.background='White';}\\\"><br /></td>\");\n");                	   	
                       echo("echo stripslashes(\"");   
                       }
                	   }	 
                	            	 	
                	 }     
                	
                }	 
           
        
          
          echo "</tr>"."\n";
      }
     } 
  echo "<tr></tr><tr></tr><tr></tr>\n";  
 echo "<tr>\n";



     echo "<td colspan ='2' align='center'>\n";          
     echo "<input type ='SUBMIT' NAME='display_button' Value = 'Cancel Delete'>\n";
     echo "<input type ='SUBMIT' NAME='display_button' Value = 'Submit Delete'>\n";           
     echo "</td>\n";
     echo "</tr>\n";


echo "</TABLE>\n";
echo "</td></tr></TABLE>\n";
echo "</FORM>\");}\n";

echo "#-----------------------------Display Form------------------------------------------------\n\n";

echo "function DisplayForm ()  {\n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


echo "echo stripslashes(\"\n";
echo "<FORM NAME='".$Table.Display."' action='".$Table.".php' method='POST'>\n";
echo "<TABLE  align='center' border='1'><tr><td>\n";

echo "<TABLE align='center' border='1' cellspacing='5'>\n";
for ($i=1;$i<=$rows;$i++)
     {    
        
          echo "<tr>";
          echo "<th align ='left' valign='top' scope='row'>".$Field[$i]."</th>\n";
          
       if ($i==1)      
           {echo "<td><input type ='text' READONLY NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."' SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."' tabindex ='".$i."' id ='".$Field[$i]."' READONLY><br /></td>\n";}
       else
        {
        	     if($i==2)
                	 	 {
                	 	echo "\"); if(\$Mode=='EDIT')\n";
                	 	echo("{echo (\"<td><input type ='text' style='color: gray' READONLY NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."'  SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."'  tabindex='".$i."' id ='".$Field[$i]."'><br /></td>\");}\n");
                	 	echo "else \n";
                	 	echo("{echo (\"<td><input type ='text' READONLY NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."'  SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."'  tabindex='".$i."' id ='".$Field[$i]."'><br /></td>\");}\n");
                	 	echo("echo stripslashes(\"");   
                	   }
                 else
                	   {
        	
        	
            if (strpos($Field[$i],'Note') !=0 || strpos($Field[$i],'Comments' )!=0 || strpos($Field[$i],'Description' )!=0)
                {
                	echo "<td><TEXTAREA NAME='".$Field[$i]."' READONLY COLS=100 ROW=3 TABINDEX='".$i."'>\$".$Field[$i]."</TEXTAREA></td>\");\n";
                	echo("echo stripslashes(\"");
                }
               else
                {
                	if($Type[$i]=='date')                	
                	 { 
                	 	 
                	 	 echo "<td><input type ='text'READONLY NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."'  SIZE='11' MAXLENGTH='11'  tabindex='".$i."' id ='".$Field[$i]."'>\");\n";  
                	 	 echo "if(\$Mode=='EDIT')\n";             	
                	   echo "{echo '<A HREF=\"#\" onClick=\"cal.select(document.forms[\'".$Table.Edit."\'].".$Field[$i].",\'anchor\',\'yyyy-MM-dd\');return false;\" NAME=\"anchor\" ID=\"anchor\">Calendar</A>';}";
                     echo "\nelse \n";
                 	   echo "{echo '<A HREF=\"#\" onClick=\"cal.select(document.forms[\'".$Table.Entry."\'].".$Field[$i].",\'anchor\',\'yyyy-MM-dd\');return false;\" NAME=\"anchor\" ID=\"anchor\">Calendar</A>';}";
                     echo("\necho(\"</td>\");\n");
                	   echo("echo stripslashes(\"");
                	}
                	   	else
                	
                	 {
                	 	
                	 	  if (strpos($Field[$i],'FileInfo')!=0)
                           {
                           	echo "<td><input type='file'READONLY NAME='".$Field[$i]."'  VALUE='\$".$Field[$i]."'  SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."'  tabindex='".$i."' id ='".$Field[$i]."'><br /></td>\");\n";           
                            echo("echo stripslashes(\"");
                           }  
                       else
                       {
                       echo "\");";                	   	
                	 	   echo("\necho (\"<td><input type ='text'READONLY NAME='".$Field[$i]."' VALUE='\$".$Field[$i]."'  SIZE='".$VarLength[$i]."' MAXLENGTH='".$VarLength[$i]."'  tabindex='".$i."' id ='".$Field[$i]."'><br /></td>\");\n");                	   	
                       echo("echo stripslashes(\"");   
                       }
                	   }	 
                	            	 	
                	 }     
                	
                }	 
           
        
          
         
      }
       echo "</tr>"."\n";
     } 
  echo "<tr></tr><tr></tr><tr></tr>\n";  
 echo "<tr>\n";



     echo "<td colspan ='2' align='center'>\n";          
     echo "<input type ='SUBMIT' NAME='display_button' Value = 'Return'>\n";
#     echo "<input type ='SUBMIT' NAME='display_button' Value = 'Logout'>\n";  
#     echo "<input type ='SUBMIT' NAME='display_button' Value = 'Add'>\n";
     echo "<input type ='SUBMIT' NAME='display_button' Value = 'Edit'>\n";
#     echo "<input type ='SUBMIT' NAME='display_button' Value = 'Next'>\n";
#     echo "<input type ='SUBMIT' NAME='display_button' Value = 'Previous'>\n";
     echo "<input type ='SUBMIT' NAME='display_button' Value = 'Delete'>\n";
#     echo "<input type ='SUBMIT' NAME='display_button' Value = 'List Records'>\n";       
     echo "</td>\n";
     echo "</tr>\n";


echo "</TABLE>\n";
echo "</td></tr></TABLE>\n";
echo "</FORM>\");}\n";




echo "#--------------------------Initialize Variables---------------------------------------\n\n";

echo "function InitializeVariables()
 { \n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


$Count= "\$Num".$Table."Records";


  for ($i=1;$i<=$rows;$i++)
    {
       if($i==1)    
         {echo "\$".$Field[$i]."='TBD';\n"; }
        else
         {echo "\$".$Field[$i]."='';\n";} 
    } 
  echo "return;\n";           
echo "}\n";

echo "#----------------------------Get Next Record in Database -----------------------------------\n\n";

echo "function Db_Next()
 { \n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


$Count= "\$Num".$Table."Records";

echo "if(".$Count."==0)\n";
 echo "{InitializeVariables();}\n";
 echo "else\n";
 echo "{\n";

echo "\$connection = mysql_connect(\$serverhost,\$user,\$password) or die('ERROR!!  Cannot connect to MySql');\n";   
echo "\$rs = mysql_select_db(\$db,\$connection)    or die('ERROR!! Cannot connect to $db database');\n";
echo "\$sql=\"select * from $Table where($Field[2] > '\".strip_tags(addslashes($".$Field[2].")).\"') order by $Field[2]\";\n";
echo "\$result = mysql_query(\$sql,\$connection) or die(\"ERROR!! $Table Select * failure\");\n";

echo $Count."Desired = mysql_num_rows(\$result);\n";
$Count2 =$Count."Desired";
echo "if(".$Count2.">0)\n";
  echo "{\n";
  echo "\$rowdata=mysql_fetch_row(\$result);\n";

for ($i=1;$i<=$rows;$i++)
    {
       $index=$i-1;        
       echo "\$".$Field[$i]."=\$rowdata[".$index."];\n"; 
    } 

echo "}\n";

echo "else\n";

echo "{\n";

 echo "\$sql=\"select * from $Table order by $Field[2]\";\n";
echo "\$result = mysql_query(\$sql,\$connection) or die(\"ERROR!! $Table Select * failure\");\n";
echo $Count."Desired = mysql_num_rows(\$result);\n";
echo "if(".$Count2.">0)\n";
  echo "{\n";
  echo "\$rowdata=mysql_fetch_row(\$result);\n";

for ($i=1;$i<=$rows;$i++)
    {
       $index=$i-1;        
       echo "\$".$Field[$i]."=\$rowdata[".$index."];\n"; 
    } 

echo "}\n";

echo "else\n";
echo "{\n";
echo "InitializeVariables();\n";

echo "}\n";
echo "}\n";
echo "}\n";
echo "PutVariablesIntoSession();\n";
echo "mysql_close(\$connection);\n";
echo "return;\n";

echo "}\n";


echo "#----------------------------Get Previous Record in Database ------------------------------\n\n";

echo "function Db_Prev()
 { \n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


$Count= "\$Num".$Table."Records";

echo "if(".$Count."==0)\n";
 echo "{InitializeVariables();}\n";
 echo "else\n";
 echo "{\n";

echo "\$connection = mysql_connect(\$serverhost,\$user,\$password) or die('ERROR!!  Cannot connect to MySql');\n";   
echo "\$rs = mysql_select_db(\$db,\$connection)    or die('ERROR!! Cannot connect to $db database');\n";
echo "\$sql=\"select * from $Table where($Field[2] < '\".strip_tags(addslashes($".$Field[2].")).\"') order by $Field[2]\";\n";
echo "\$result = mysql_query(\$sql,\$connection) or die(\"ERROR!! $Table Select * failure\");\n";

echo $Count."Desired = mysql_num_rows(\$result);\n";
$Count2 =$Count."Desired";
echo "if(".$Count2.">0)\n";
  echo "{\n";
echo "for(\$i=1;\$i<=$Count2;\$i++)\n";
echo "{\n";
  echo "\$rowdata=mysql_fetch_row(\$result);\n";

for ($i=1;$i<=$rows;$i++)
    {
       $index=$i-1;        
       echo "\$".$Field[$i]."=\$rowdata[".$index."];\n"; 
    } 

echo "}\n";
echo "}\n";

echo "else\n";

echo "{\n";

 echo "\$sql=\"select * from $Table order by $Field[2]\";\n";
echo "\$result = mysql_query(\$sql,\$connection) or die(\"ERROR!! $Table Select * failure\");\n";
echo $Count."Desired = mysql_num_rows(\$result);\n";
echo "if(".$Count2.">0)\n";
  echo "{\n";
      echo "for(\$i=1;\$i<=$Count2;\$i++)\n";
echo "{\n";
  echo "\$rowdata=mysql_fetch_row(\$result);\n";

for ($i=1;$i<=$rows;$i++)
    {
       $index=$i-1;        
       echo "\$".$Field[$i]."=\$rowdata[".$index."];\n"; 
    } 

echo "}\n";
echo "}\n";

echo "else\n";
echo "{\n";
echo "InitializeVariables();\n";

echo "}\n";
echo "}\n";
echo "}\n";
echo "PutVariablesIntoSession();\n";
echo "mysql_close(\$connection);\n";
echo "return;\n";

echo "}\n";


echo"#------------------------------Database Update Function--------------------------------------\n\n";
echo "function Db_Update()
 { \n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


echo "\$connection = mysql_connect(\$serverhost,\$user,\$password) or die('ERROR!!  Cannot connect to MySql');\n";   
echo "\$rs = mysql_select_db(\$db,\$connection)    or die('ERROR!! Cannot connect to $db database');\n";
echo "\$$Field[1]=\$_SESSION['$Field[1]'];\n";
echo "\$sql=\"update $Table SET \";\n";
  for ($i=2;$i<=$rows-1;$i++)
     {
         echo "\$sql=\$sql.\"$Field[$i]='\".strip_tags(addslashes(\$$Field[$i])).\"',\";\n";
     }

echo "\$sql=\$sql.\"$Field[$rows]='\".strip_tags(addslashes(\$$Field[$rows])).\"' where $Field[1]='\".$".$Field[1].".\"'\"; \n";
echo "\$result = mysql_query(\$sql,\$connection) or die(\"ERROR!! $Table DATA failure\");\n";
echo "PutVariablesIntoSession();\n";
echo "mysql_close(\$connection);\n";
echo "return;\n";
echo "}\n";

echo "#-----------------------------Print Out Current Form Variables--------------------------\n\n";
echo "function PrintFormVars()
 { \n";


$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


$Count= "\$Num".$Table."Records";
$CountM= "Num".$Table."Records";

echo "OutputMessage('$CountM: '.$Count);\n";
 for($i=1;$i<=$rows;$i++)
  {
      echo "OutputMessage('$Field[$i]: '.\$$Field[$i]);\n";
  }
echo "return;\n";
echo "}\n";

echo"#-----------------------------Database Add Function---------------------------------------\n\n";
echo "function Db_Add()
 { \n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


echo "\$connection = mysql_connect(\$serverhost,\$user,\$password) or die('ERROR!!  Cannot connect to MySql');\n";   
echo "\$rs = mysql_select_db(\$db,\$connection)    or die('ERROR!! Cannot connect to $db database');\n";


echo "\$sql=\"insert into $Table(";
for($i=2;$i<=$rows-1;$i++)
   {echo "$Field[$i]".",";}

echo "$Field[$rows]".") values (\";\n";

  for ($i=2;$i<=$rows-1;$i++)
     {
         echo "\$sql=\$sql.\"'\".strip_tags(addslashes(\$$Field[$i])).\"',\";\n";
     }

echo "\$sql=\$sql.\"'\".strip_tags(addslashes(\$$Field[$rows])).\"')\";\n";

echo "\$result = mysql_query(\$sql,\$connection) or die(\"ERROR!! $Table ADD failure\");\n";

echo "\$$Field[1]=mysql_insert_id(\$connection);\n";

echo "PutVariablesIntoSession();\n";
echo "mysql_close(\$connection);\n";
echo "return;\n";

echo "}\n";

echo"#----------------------------Database Delete Function------------------------------------\n\n";
echo "function Db_Delete()
 { \n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


echo "\$connection = mysql_connect(\$serverhost,\$user,\$password) or die('ERROR!!  Cannot connect to MySql');\n";   
echo "\$rs = mysql_select_db(\$db,\$connection)    or die('ERROR!! Cannot connect to $db database');\n";

echo "\$sql=\"delete from $Table where $Field[1]='\".\$$Field[1].\"'\";\n";

echo "\$result = mysql_query(\$sql,\$connection) or die(\"ERROR!! $Table DELETE failure\");\n";

echo "mysql_close(\$connection);\n";
echo "return;\n";
echo "}\n";

echo "#-----------------------------Get Current Number of Records -----------------------------\n\n";

echo "function CurrentNumberRecords()
 { \n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


echo "\$connection = mysql_connect(\$serverhost,\$user,\$password) or die('ERROR!!  Cannot connect to MySql');\n";   
echo "\$rs = mysql_select_db(\$db,\$connection)    or die('ERROR!! Cannot connect to $db database');\n";
 echo "\$sql=\"select * from $Table order by $Field[2]\";\n";
echo "\$result = mysql_query(\$sql,\$connection) or die(\"ERROR!! $Table GetNumRecs failure\");\n";
$Count= "\$Num".$Table."Records";
echo "$Count = mysql_num_rows(\$result);\n";
echo "mysql_close(\$connection);\n";
echo "return;\n";
echo "}\n";

echo "#------------------------------Screen Report of Records in Database ---------------------\n\n";

echo "function ListRecords()
 { \n";

echo "global \$user, \$serverhost,\$db,\$password;\n";

$Count= "\$Num".$Table."Records";
echo "\$connection = mysql_connect(\$serverhost,\$user,\$password) or die('ERROR!!  Cannot connect to MySql');\n";   
echo "\$rs = mysql_select_db(\$db,\$connection)    or die('ERROR!! Cannot connect to $db database');\n";
 echo "\$sql=\"select * from $Table order by $Field[2]\";\n";
echo "\$result = mysql_query(\$sql,\$connection) or die(\"ERROR!! $Table GetNumRecs failure\");\n";
$Count= "\$Num".$Table."Records";
echo "$Count = mysql_num_rows(\$result);\n";

 echo "echo \"<form action='$Table.php' method ='POST'>\";\n";
 echo "echo\"<table align='center' border = '1' cellspacing ='3'>\";\n";
 echo "echo \"<tr>\";\n";

  for($i=1;$i<=$rows;$i++)
    {echo "echo \"<td align='center' ><b>$Field[$i]</b></td>\";\n";}

 echo "echo '</tr>';\n";

echo " for(\$i=1;\$i<=$Count;\$i++)\n";
echo "{\n";

echo "\$rowdata=mysql_fetch_row(\$result);\n";
echo "echo \"<tr>\";\n";
for($i=0;$i<=$rows-1;$i++)
 { echo "echo \"<td align='left'>\".\$rowdata[$i].\"&nbsp; </td>\";\n";}

echo "echo \"</tr>\";\n";

echo "}\n";

echo "echo \"<tr><td colspan='".$rows."' align='center'><input type ='SUBMIT' NAME='display_button' Value = 'Back to Main'></td></tr>\";\n";
echo "echo '</table>';\n";
echo "echo '</form>';\n";
echo "mysql_close(\$connection);\n";
echo "return;\n";
echo "}\n";

echo "#------------------------------List Menu of Records in Database ---------------------\n\n";

echo "function ListMenu()
 { \n";

echo "global \$user, \$serverhost,\$db,\$password;\n";

$Count= "\$Num".$Table."Records";
echo "\$connection = mysql_connect(\$serverhost,\$user,\$password) or die('ERROR!!  Cannot connect to MySql');\n";   
echo "\$rs = mysql_select_db(\$db,\$connection)    or die('ERROR!! Cannot connect to $db database');\n";
 echo "\$sql=\"select * from $Table order by $Field[2]\";\n";
echo "\$result = mysql_query(\$sql,\$connection) or die(\"ERROR!! $Table GetNumRecs failure\");\n";
$Count= "\$Num".$Table."Records";
echo "$Count = mysql_num_rows(\$result);\n";
echo "mysql_close(\$connection);\n";

 echo "echo \"<form name='ListMenu' action='$Table.php' method ='POST'>\";\n";
 echo "echo\"<table align='center' border = '1' cellspacing ='3'>\";\n";
 echo "echo \"<input type='hidden' name='check' id='check'>\";\n";
 echo "echo \"<tr>\";\n";
 
  for($i=1;$i<=$rows;$i++)
    {echo "echo \"<td align='center' ><b>$Field[$i]</b></td>\";\n";}

 echo "echo '</tr>';\n";

echo " for(\$i=1;\$i<=$Count;\$i++)\n";
echo "{\n";

echo "\$rowdata=mysql_fetch_row(\$result);\n";
echo "echo \"<tr>\";\n";

#echo "echo \"<td align='center'><input type=radio checked NAME='SelectRecord' VALUE='\".\$rowdata[0].\"'>&nbsp; </td>\";\n";

echo "echo \"<td align='center'><input type=radio id='SelectRecord' NAME='SelectRecord' VALUE='\".\$rowdata[0].\"' onClick=\\\"document.forms.ListMenu.display_button.value = 'Display';document.forms.ListMenu.check.value = 'Display';document.forms.ListMenu.submit();\\\" >&nbsp; </td>\";\n";


for($i=1;$i<=$rows-1;$i++)
 { 
 	echo "echo \"<td align='left'>\".\$rowdata[$i].\"&nbsp; </td>\";\n";}

echo "echo \"</tr>\";\n";

echo "}\n";

echo "echo \"<tr><td colspan='".$rows."' align='center'>\n";
echo "<input type ='SUBMIT' NAME='display_button' Value = 'Back'>\n";
#echo "<input type ='SUBMIT' NAME='display_button' Value = 'Logout'>\n";
echo "<input type ='SUBMIT' NAME='display_button' Value = 'Add'>\";\n";

#echo "if($Count== 0)\n";
# echo "    { echo (\"<input type ='SUBMIT' disabled NAME='display_button' Value = 'Edit'>\n";      
# echo "     <input type ='SUBMIT' disabled NAME='display_button' Value = 'Delete'>\n";
# echo "     \");}\n";
# echo "else { echo (\"<input type ='SUBMIT' NAME='display_button' Value = 'Edit'>\n";
# echo "      <input type ='SUBMIT' NAME='display_button' Value = 'Delete'>\n";
# echo "    \");}\n";


echo "echo \"</td></tr>\";\n";
echo "echo '</table>';\n";
echo "echo '</form>';\n";

echo "return;\n";
echo "}\n";







echo "#----------------------------Initialize Program Start ---------------------------------------\n\n";

echo "function InitializeProgram()
 { \n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      


echo "\$connection = mysql_connect(\$serverhost,\$user,\$password) or die('ERROR!!  Cannot connect to MySql');\n";   
echo "\$rs = mysql_select_db(\$db,\$connection)    or die('ERROR!! Cannot connect to $db database');\n";
 echo "\$sql=\"select * from $Table order by $Field[2]\";\n";
echo "\$result = mysql_query(\$sql,\$connection) or die(\"ERROR!! $Table InitializeProgram failure\");\n";
$Count= "\$Num".$Table."Records";
echo "$Count = mysql_num_rows(\$result);\n";

echo "if($Count==0)\n";
echo "{InitializeVariables();}\n";
echo "else\n";
echo "{GetLastRecord(\$connection,\$result);}\n";

echo "PutVariablesIntoSession();\n";
echo "mysql_close(\$connection);\n";
echo "return;\n";
echo "}\n";

echo "#-------------------------Validate Unique Code ---------------------------------------------\n\n";

echo "function ValidUniqueCode()\n
 { \n";

$Count= "\$Num".$Table."Records";

echo "global \$db, \$user, \$serverhost, \$password, \$Add, \$Edit, \$Delete, \$Search, \$Start, \$Expiry;\n";

for ($i=1;$i<=$rows;$i++)
   {
      
     if($Count!="") 
          {$Count=$Count.',$'.$Field[$i];}
      else
          {$Count='$'.$Field[$i];}
      
      if(strlen($Count)>=80)
        {
        	echo "global ".$Count.";\n";
          $Count="";
        }
   }

if($Count!="")
  {
        echo "global ".$Count.";\n";
        
  }      



echo "\$connection = mysql_connect(\$serverhost,\$user,\$password) or die('ERROR!!  Cannot connect to MySql');\n";   
echo "\$rs = mysql_select_db(\$db,\$connection)    or die('ERROR!! Cannot connect to $db database');\n";
echo "\$sql=\"select * from $Table where($Field[2] ='\".strip_tags(addslashes($".$Field[2].")).\"') order by $Field[2]\";\n";
echo "\$result = mysql_query(\$sql,\$connection) or die(\"ERROR!! $Table Select * failure\");\n";
$Count= "\$Num".$Table."Records";
echo $Count."Desired = mysql_num_rows(\$result);\n";
echo "mysql_close(\$connection);\n";
echo("if(".$Count."Desired>0)\n");
echo("{return FALSE;}\n");
echo("  else\n");
echo("{return TRUE;}\n");
  


echo "}\n";











echo "#----------------------------Main Program--------------------------------------------\n\n";

echo "echo \"<html>
<head><title>\".\$table.\" Maintenance</title>
<h4><center>\".\$table.\" Maintenance</center></h4>

<SCRIPT LANGUAGE=\\\"JavaScript\\\" type=\\\"text/javascript\\\">\";\n";

echo"require('CalendarPopup.js');\n";

echo"echo\"</SCRIPT>\";\n";

echo"echo\"<SCRIPT LANGUAGE=\\\"JavaScript\\\" type=\\\"text/javascript\\\">\n
var cal = new CalendarPopup();\n
  </SCRIPT>\n


  

<SCRIPT LANGUAGE=\\\"JavaScript\\\" SRC=\\\"validations.js\\\"></SCRIPT>
<SCRIPT LANGUAGE=\\\"JavaScript\\\" type=\\\"text/javascript\\\">
function validatePhone(fld) {
    var error = \\\"\\\";
    var stripped = fld.value.replace(/[\\(\\)\\.\\-\\ ]/g,'');     

   if (fld.value == \\\"\\\") 
     {
        error = \\\"You didn't enter a phone number.\\\";
        fld.style.background = 'Yellow';
     } 
    else if (isNaN(stripped))
          {
             error = \\\"The phone number contains illegal characters.\\\";
             fld.style.background = 'Yellow';
          } else if (!(stripped.length == 10))
                 {
                       error = \\\"The phone number is the wrong length. Make sure you included an area code.\\\";
                       fld.style.background = 'Yellow';
                  } else 
                      {   fld.style.background= 'White';}
    return error;
}

function validateEmpty(fld) {
    var error = \\\"\\\";
  
    if (fld.value.length == 0) {
        fld.style.background = 'Yellow'; 
        error = \\\"The required field has not been filled in.\\\"
    } else {
        fld.style.background = 'White';
    }
    return error;   
}

function validateUsername(fld) {
    var error = \\\"\\\";
    var illegalChars = /\\W/; // allow letters, numbers, and underscores
 
    if (fld.value == \\\"\\\") {
        fld.style.background = 'Yellow'; 
        error = \\\"You didn't enter a username.\\\";
    } else if ((fld.value.length < 5) || (fld.value.length > 15)) {
        fld.style.background = 'Yellow'; 
        error = \\\"The username is the wrong length.\\\";
    } else if (illegalChars.test(fld.value)) {
        fld.style.background = 'Yellow'; 
        error = \\\"The username contains illegal characters.\\\";
    } else {
        fld.style.background = 'White';
    } 
    return error;
}

function trim(s)
{
  return s.replace(/^\\s+|\\s+$/, '');
} 

function validateEmail(fld) {
    var error=\\\"\\\";
    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\\.[^@]*\\w\\w$/ ;
    var illegalChars= /[\\(\\)\\<\\>\\,\\;\\:\\\\\\\"\\[\\]]/ ;
    
    if (fld.value == \\\"\\\") {
        fld.style.background = 'White';
    } else if (!emailFilter.test(tfld)) {              //test email for illegal characters
        fld.style.background = 'Yellow';
        error = \\\"Please enter a valid email address.\\\";
    } else if (fld.value.match(illegalChars)) {
        fld.style.background = 'Yellow';
        error = \\\"The email address contains illegal characters.\\\";
    } else {
        fld.style.background = 'White';
    }
    return error;
}

function validateDate(field){
var checkstr = \\\"0123456789\\\";
var DateField = field;
var Datevalue = \\\"\\\";
var DateTemp = \\\"\\\";
var seperator = \\\".\\\";
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
   
   if ((day > 31) && ((month == \\\"01\\\") || (month == \\\"03\\\") || (month == \\\"05\\\") || (month == \\\"07\\\") || (month == \\\"08\\\") || (month == \\\"10\\\") || (month == \\\"12\\\")))
    {
      err = 25;
    }
   if ((day > 30) && ((month == \\\"04\\\") || (month == \\\"06\\\") || (month == \\\"09\\\") || (month == \\\"11\\\")))
   {
      err = 26;
   }

   
    
   /* if 00 ist entered, no error, deleting the entry */
   if ((day == 0) && (month == 0) && (year == 00)) {
      err = 10; day = \\\"\\\"; month = \\\"\\\"; year = \\\"\\\"; seperator = \\\"\\\";
   }   
  
   
   
   
   /* if no error, write the completed date to Input-Field (e.g. 13.12.2001) */
   if (err == 0) {
      DateField.value = year+ seperator + month + seperator + day;
      error=\\\"\\\";
   }
   /* Error-message if err != 0 */
   else {
      error=\\\"Date format is yyyy.mm.dd\\\";
      
   }
  return error;
}

function validateFormOnSubmit(theForm) {
var reason = \\\"\\\";
     


       if(isBlank(theForm.MemberSurname.value)) 
           {reason+='Surname cannot be blank\\\\n';theForm.MemberSurname.style.background='Yellow';}
       else
           {theForm.MemberSurname.style.background='White';}
      
       if(isBlank(theForm.MemberGivenName.value)) 
           {reason+='Given Name cannot be blank\\\\n';theForm.MemberGivenName.style.background='Yellow';}
       else
           {theForm.MemberGivenName.style.background='White';}
 
      error=validateEmail(theForm.MemberEmailAddress1);
           if(error!=''){reason+=error+'(Email 1)\\\\n';}
 
     

      if(theForm.MemberInformationCertification.value!='YES')
          {reason+='Information Certification must be selected YES or Choose Cancel Add\\\\n';theForm.MemberInformationCertification.style.background='Yellow';}
      else
          {theForm.MemberInformationCertification.style.background='White';}
   
       error=validateDate(theForm.MemberBirthDate);
             if(error!='')
                {reason+=error+'(Birthdate)\\\\n';theForm.MemberBirthDate.style.background='Yellow';}
             else
                {theForm.MemberBirthDate.style.background='White';}
 
        if(theForm.MemberGender.value<=0)
               {reason+='Gender must be selected\\\\n';theForm.MemberGender.style.background='Yellow';}
             else
               {theForm.MemberGender.style.background='White';}

    
      
  if (reason != \\\"\\\") {
    alert(\\\"**Yellow fields need correction:**\\\\n\\\" + reason);
    return false;
  }

  return true;
}


//  End -->
</script>


</SCRIPT>
<script language=\\\"javascript\\\" type=\\\"text/javascript\\\">
function stopRKey(evt) {
	var evt  = (evt) ? evt : ((event) ? event : null);
	var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
	if ((evt.keyCode == 13) && (node.type==\\\"text\\\")) { return false; }
}
document.onkeypress = stopRKey;
</script>










</head>\";\n";
echo "echo \"<body bgcolor ='\".\$BackgroundColor.\"'>\";\n";

echo "

  CurrentNumberRecords();
 
  if (\$_POST)
   { 
     CurrentNumberRecords();
     GetVariablesFromSession();
   
     if(\$_POST['check']!='Display')
      {\$Action=\$_POST['display_button'];}
     else
      {\$Action=\$_POST['check'];}  
   
  
      switch(\$Action)
         {
             case 'Add':
               
               InitializeVariables();
               AddForm();
               break;

             case 'Edit':
               \$DesiredRecord=\$_POST['SelectRecord'];
               GetLoadDesiredRecord();
               EditForm();
               break;  
               
            case 'Display':
               \$DesiredRecord=\$_POST['SelectRecord'];
               GetLoadDesiredRecord();
               DisplayForm();
               break;       

             case 'Delete':
               \$DesiredRecord=\$_POST['SelectRecord'];
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
                   \$_SESSION['SystemMessage']='Code already on file!! Choose another.';
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
                  header(\"Location: \$CallingProgram\");
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
       
   }\n";





echo "echo\"
</body>
</html>\"\n";

echo"?>\n";

$program=ob_get_contents();
ob_end_clean();
$f=fopen("prog.txt","w");
fwrite($f,$program);
fclose($f);

?>