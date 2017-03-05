


<?php
session_start();

//require 'connect.php';

function loggedin()
{
  if(isset($_SESSION['uname'])&&!empty($_SESSION['uname']))
    return true;
  else
  {
    return false;
  }
}

//function onln($uname)
//{
  //$query="SELECT COUNT(*) from online where username='$uname'";
  //$res=mysql_query($query);
  //$rows=mysql_result($res,0,'COUNT(*)');
  //if ($rows==0) return false;
 // else if($rows==1) return true;
//}

function getname($roll)
{
 
/*if($query_res=$db->query("SELECT $field from students where ROLLNO='".@$_SESSION['uname']."' "))
  {if($fieldres=$db->result($query_res,0,$field))
    {
    return $fieldres;
    }
  }
} 
*/


$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Unable to connect to the database ');
}

$cour=$db->query("SELECT NAME FROM students where ROLLNO=$roll");

if (!$cour->num_rows)
{   
echo 'Invalid Roll No.';
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $nm=$row['NAME'] ;
  return $nm; 
}

}




function hascrs($crsid)
{
 
$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Unable to connect to the database ');
}

$cour=$db->query("SELECT id FROM coursedata where STID=".$_SESSION['uname']." AND CID=".$crsid."");

 return $cour->num_rows;

}




function tmppf($doj)
{
 
$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Unable to connect to the database ');
}

$cour=$db->query("SELECT DATEDIFF(CURDATE(),'".$doj."') as DIFFDATE");


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $nm=$row['DIFFDATE'] ;
  if($nm>0) return -1;
  else if($nm==0) return 0;
  else return 1; 
}


}

?>