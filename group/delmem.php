<?php
require 'core.php';
require 'connect.php';

$cid=$_POST['stid'];



if ($db->query("UPDATE groupdata SET stat=1 WHERE STID=".$cid." AND GID=".getid("".$_SESSION['unamegrp']).""))
{   
echo "Member Removed";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}
else {echo "Error";}

?>