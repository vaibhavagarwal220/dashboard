    <?php

  require 'connect.php' ;
  require 'core.php' ;

$cour=$db->query("SELECT * FROM group_post WHERE post_author!=".$_SESSION['uname']." ORDER by time DESC");

if (!$cour->num_rows)
{   
echo 'No posts.';
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $ath=$row['post_author'];
  
  $gid=$row['gid'];
  $tm=$row['time'];
    if(ismember($_SESSION['uname'],$gid))
{

    echo "<a href=clubs.php?grp=".$gid." title=".$tm."><li class=\"mdl-menu__item\">".getposte($ath)." posted in ".getgnameid($gid)."</li> </a>";
}

}
?>