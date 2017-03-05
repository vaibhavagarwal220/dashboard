<?php
require 'core.php';
require 'connect.php';

$cid=$_POST['cid'];

$nm=""; 
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
  $nm=$row['NAME'] ;
 
}

}





 

if ($db->query("INSERT INTO `coursedata`(`CID`, `STID`, `ATTENDANCE`, `QUIZ1`, `QUIZ2`, `QUIZ3`, `ANNCS`, `TOTAL_CLASSES`, `Course Name`) VALUES (".$cid.",".$_SESSION['uname'].",0,0,0,0,'No Announcements',40,'$nm')"))
{   
echo "Course Added";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}
else {echo "Error";}



?>