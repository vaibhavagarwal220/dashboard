<?php
require 'core.php';
require 'connect.php';

$cid=$_POST['stid'];
if ($db->query("UPDATE `groupdata` SET stat=2 WHERE STID=".$cid." AND GID=".getid("".$_SESSION['unamegrp']).""))
{   
http_response_code(200);
echo "Member Added";

  //echo 'Permission granted Enjoy due '  //print_r($per);}
}

else {echo "Error";}



 





?>