<?php
require 'core.php';
require 'connect.php';

$cid=$_POST['cid'];



if ($db->query("DELETE FROM coursedata WHERE STID=".$_SESSION['uname']." AND CID=".$cid.""))
{   
echo "Course Dropped";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}
else {echo "Error";}

?>