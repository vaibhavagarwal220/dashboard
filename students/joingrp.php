

<?php
require 'core.php';
require 'connect.php';
//INSERT INTO `groupdata` (`id`, `GID`, `STID`, `stat`) VALUES (NULL, '', '', '')
$cid=$_POST['gid'];

if ($db->query("INSERT INTO `groupdata` (`id`, `GID`, `STID`, `stat`) VALUES (NULL, ".$cid.", ".$_SESSION['uname'].", '1')"))
{   
http_response_code(200);
echo "Request Pending";

  //echo 'Permission granted Enjoy due '  //print_r($per);}
}

else {echo "Error";}



 





?>