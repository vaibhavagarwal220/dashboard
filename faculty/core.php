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


?>