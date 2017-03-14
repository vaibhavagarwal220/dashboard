


<?php
session_start();

//require 'connect.php';

function loggedin()
{
  if(isset($_SESSION['unamegrp'])&&!empty($_SESSION['unamegrp']))
    return true;
  else
  {
    return false;
  }
}

function getposte($roll)
{
 

$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  echo 'Unable to connect to the database ';
}

$cour=$db->query("SELECT NAME FROM students where ROLLNO=$roll");

if (!$cour->num_rows)
{  $cou=$db->query("SELECT NAME FROM groups where id=$roll"); 
      if (!$cou->num_rows)
      echo 'Invalid group Details.';
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


function getid($roll)
{
 

$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  echo 'Unable to connect to the database ';
}

$cour=$db->query("SELECT id FROM groups where cname='".$roll."'");

if (!$cour->num_rows)
   echo 'Invalid Group Details.';
else{
      $rows=$cour->fetch_all(MYSQLI_ASSOC) ;
foreach($rows as $row)
{
  $nm=$row['id'] ;
  return $nm; 
}
    }

}

function getgname($roll)
{
 

$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  echo 'Unable to connect to the database ';
}

$cour=$db->query("SELECT name FROM groups where cname='".$roll."'");

if (!$cour->num_rows)
   echo 'Invalid Group Details.';
else{
      $rows=$cour->fetch_all(MYSQLI_ASSOC) ;
foreach($rows as $row)
{
  $nm=$row['name'] ;
  return $nm; 
}
    }

}


function getgnameid($roll)
{
 

$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  echo 'Unable to connect to the database ';
}

$cour=$db->query("SELECT name FROM groups where id='".$roll."'");

if (!$cour->num_rows)
   echo 'Invalid Group Details.';
else{
      $rows=$cour->fetch_all(MYSQLI_ASSOC) ;
foreach($rows as $row)
{
  $nm=$row['name'] ;
  return $nm; 
}
    }

}


function ismember($stid,$gid)
{
 
$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Unable to connect to the database ');
}

$cour=$db->query("SELECT STID FROM groupdata where STID=".$stid." AND GID=".$gid." && stat=2");

 return $cour->num_rows;

}
?>