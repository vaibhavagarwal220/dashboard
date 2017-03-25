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
  <title>Remove Student</title>     
    </head>
  <body>
<?php 
$title="Remove Student";
include 'include.inc.php';?>

    <?php

if( isset($_POST['unamedel']))
{

    if(!empty($_POST['unamedel']))
  {

    $querm=$db->query("SELECT * FROM Students WHERE ROLLNO=".$_POST['unamedel']."");
    
    if($querm->num_rows)
    {

    //echo '1';
    
    $q ="DELETE FROM Students WHERE ROLLNO=".$_POST['unamedel']."";

    //echo $q ;

     $db->query($q);

    if($db->affected_rows > 0)
      echo "<center><h4>Sucessfully Deleted the Student Record!</h3></center>";


    else 
      echo "<center><h4>Student record was not deleted from the database!</h3></center>" ;
    }

  else
    echo "<center><h4>Student ID does not exists! </h3></center>";


  }

}

?>
<br><br>
<center class=opts id=frm>

  <form action="rmst.php" method="POST">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="unamedel"  required>
    <label class="mdl-textfield__label" for="sample3">Student ID</label>
  </div><br>
 <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">DELETE</button>
</center>
<br><br>

    </div>
  </main>
</div>





</body>
</html>

