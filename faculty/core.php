<?php
session_start();


function loggedinfac()
{
  if(isset($_SESSION['unamefac'])&&!empty($_SESSION['unamefac']))
    return true;
  else
  {
    return false;
  }
}

function getcrs($cid)
{
$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Unable to connect to the database ');
}
$cour=$db->query("SELECT NAME FROM sem_courses where COURSE_ID=".$cid."");

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
  return $row['NAME'] ;
 
}
}

}


function getname($roll)
{
 

$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  echo 'Unable to connect to the database ';
}

$cour=$db->query("SELECT NAME FROM students where ROLLNO=$roll");

if (!$cour->num_rows)
{  $cou=$db->query("SELECT NAME FROM prof where TEACHER_ID=$roll"); 
      if (!$cou->num_rows)
      echo 'Invalid Course Details.';
    else{
      $rows=$cou->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $nm=$row['NAME'] ;
  return $nm; 
}
    }
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $nm=$row['NAME'] ;
  return $nm; 
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




?>