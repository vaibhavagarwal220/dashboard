


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

function getslot($cid)
{
$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Unable to connect to the database ');
}
$cour=$db->query("SELECT slot FROM sem_courses where COURSE_ID=".$cid."");

if (!$cour->num_rows)
{   
echo "Error";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}
else 
{
$rows=$cour->fetch_all(MYSQLI_ASSOC) ;

foreach($rows as $row)
{
  return $row['slot'] ;
 
}
}

}

function getcode($cid)
{
  $db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Unable to connect to the database ');
}

$cour=$db->query("SELECT code FROM sem_courses where COURSE_ID=".$cid."");

if (!$cour->num_rows)
{   
echo "Error";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}
else 
{
$rows=$cour->fetch_all(MYSQLI_ASSOC) ;

foreach($rows as $row)
{
  return $row['code'] ;
 
}
}

}


function getname($roll)
{
 
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