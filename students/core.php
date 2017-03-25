


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


function iscrs($cid)
{
$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Unable to connect to the database ');
}
$cour=$db->query("SELECT * FROM sem_courses where COURSE_ID=".$cid."");

if (!$cour->num_rows)
{   
return 0;
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}
else 
{
return 1;
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

function getcrscde($cid)
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


function hasrev()
{
$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Unable to connect to the database ');
}
$cour=$db->query("SELECT * FROM creview where ROLLNO=".$_SESSION['uname']."");

if (!$cour->num_rows)
{   
return 0;
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}
else 
{
return 1;
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


function getpass($roll)
{
 
$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Unable to connect to the database ');
}

$cour=$db->query("SELECT PASSWORD FROM students where ROLLNO=$roll");

if (!$cour->num_rows)
{   
echo 'Invalid Roll No.';
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $nm=$row['PASSWORD'] ;
  return $nm; 
}

}




function getposter($roll)
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
      echo 'Invalid Person ';
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



function isgrp($roll)
{
 

$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  echo 'Unable to connect to the database ';
}

$cour=$db->query("SELECT * FROM groups where id='".$roll."'");

return $cour->num_rows;


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

function getgcname($roll)
{
 

$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  echo 'Unable to connect to the database ';
}

$cour=$db->query("SELECT cname FROM groups where id=".$roll."");

if (!$cour->num_rows)
   echo 'Invalid Group Details.';
else{
      $rows=$cour->fetch_all(MYSQLI_ASSOC) ;
foreach($rows as $row)
{
  $nm=$row['cname'] ;
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

$cour=$db->query("SELECT name FROM groups where id=".$roll."");

if (!$cour->num_rows)
   echo '';
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


function ispending($stid,$gid)
{
 
$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Unable to connect to the database ');
}

$cour=$db->query("SELECT STID FROM groupdata where STID=".$stid." AND GID=".$gid." && stat=1");

 return $cour->num_rows;

}


?>