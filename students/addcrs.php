<?php
require 'core.php';
require 'connect.php';

$cid=$_POST['cid'];

$cnm=""; 
$cour=$db->query("SELECT NAME,slot FROM sem_courses where COURSE_ID=".$cid."");

if (!$cour->num_rows)
{   
echo "Error";
  
}
else 
{
$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{

  $cnm=$row['NAME'] ;
  $slt=$row['slot'] ;
 
}

}


$cou=$db->query("SELECT * from coursedata where STID=".$_SESSION['uname']." AND CID IN (SELECT COURSE_ID FROM sem_courses where slot='".$slt."')");

if (!$cou->num_rows)
{  

if ($db->query("INSERT INTO `coursedata`(`CID`, `STID`, `ATTENDANCE`, `QUIZ1`, `QUIZ2`, `QUIZ3`, `ANNCS`, `TOTAL_CLASSES`,`Course Name`) VALUES (".$cid.",".$_SESSION['uname'].",0,0,0,0,'No Announcements',40,'$cnm')"))
{   
http_response_code(200);
echo "Course Added";

  //echo 'Permission granted Enjoy due '  //print_r($per);}
}
else {echo "Error";}


}

else 
{
$rows=$cou->fetch_all(MYSQLI_ASSOC) ;
foreach($rows as $row)
{
  $cnm=$row['Course Name'] ;
}
echo "0";
}

 





?>