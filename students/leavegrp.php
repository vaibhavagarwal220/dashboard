

<?php
require 'core.php';
require 'connect.php';
//INSERT INTO `groupdata` (`id`, `GID`, `STID`, `stat`) VALUES (NULL, '', '', '')
$cid=$_POST['gid'];

if ($db->query("DELETE FROM `groupdata` WHERE GID=".$cid." && STID=".$_SESSION['uname'].""))
{   
http_response_code(200);
echo "Unsubscribed";

  //echo 'Permission granted Enjoy due '  //print_r($per);}
}

else {echo "Error";}



 





?>