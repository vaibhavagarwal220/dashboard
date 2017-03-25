 <?php


  require 'connect.php' ;
  require 'core.php' ;
  if(!loggedinadm())
  {
    header('Location:adminloginpage.php');
  }

?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
  <title>Remove Group</title>     
    </head>
  <body>
<?php 
$title="Remove Group";
include 'include.inc.php';?>

    <?php

if( isset($_POST['unamedel']))
{

    if(!empty($_POST['unamedel']))
  {

    $querm=$db->query("SELECT * FROM groups WHERE cname='".$_POST['unamedel']."'");
    
    if($querm->num_rows)
    {

    //echo '1';
    
    $q ="DELETE FROM groups WHERE cname='".$_POST['unamedel']."'";

    //echo $q ;

     $db->query($q);

    if($db->affected_rows > 0)
      echo "<center><h4>Sucessfully Deleted the Group!</h3></center>";


    else 
      echo "<center><h4>Group was not deleted from the database!</h3></center>" ;
    }

  else
    echo "<center><h4>Group does not exist! </h3></center>";


  }

}

?>
<br><br>
<center class=opts id=frm>

  <form action="rmgrp.php" method="POST">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="unamedel"  required>
    <label class="mdl-textfield__label" for="sample3">Group Username</label>
  </div><br>
 <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">DELETE</button>
</center>
<br><br>

    </div>
  </main>
</div>





</body>
</html>

