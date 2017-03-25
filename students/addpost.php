

<?php
require 'core.php';
require 'connect.php';
//INSERT INTO `groupdata` (`id`, `GID`, `STID`, `stat`) VALUES (NULL, '', '', '')
$dsc=$_POST['dsc'];
$iurl=$_POST['iurl'];
$gid=$_POST['gid'];

if ($db->query("INSERT INTO `group_post` (`post_id`,`post_img`, `post_author`, `post_body`, `gid`) VALUES (NULL, '".$iurl."', ".$_SESSION['uname'].", '".nl2br($dsc)."', ".$gid.")"))
{   
http_response_code(200);
echo "<br><br><center class=\"opts\">Post Added</center><br><br>";
echo "<div class=\"opts mdl-shadow--6dp\">".getposte($_SESSION['uname'])." posted in <a href=clubs.php?grp=".$gid.">".getgnameid($gid)."</a> <div class=ts>Just Now</div><br>".$dsc."<br>";

if($iurl!="") echo "<img src=".$iurl." class=feedimg>";

echo "</div><br><br>";


  //echo 'Permission granted Enjoy due '  //print_r($per);}
}

else {echo "<br><br><center class=\"opts mdl-shadow--6dp\">Error</center><br><br>";}



 





?>