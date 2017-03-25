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
  <title>Remove Course</title>
    </head>
  <body>
<?php 
$title="Remove Course";
include 'include.inc.php';?>
<?php

if( isset($_POST['cidd']))
{

    if(!empty($_POST['cidd']))
  {

    $querm=$db->query("SELECT * FROM SEM_COURSES WHERE COURSE_ID=".$_POST['cidd']."");
    
    if($querm->num_rows)
    {

    //echo '1';
    
    $q ="DELETE FROM SEM_COURSES WHERE COURSE_ID=".$_POST['cidd']."";

    //echo $q ;

     $db->query($q);

    if($db->affected_rows > 0)
      echo "<center><h4>Sucessfully Deleted the Course Record!</h4></center>";


    else 
      echo "<center><h4>Course record was not deleted from the database!</h4></center>" ;
    }

  else
    echo "<center><h4>Course ID does not exists! </h4></center>";


  }

}

?>
<br><br>
<center class=opts id=frm>

  <form action="delcrs.php" method="POST">
    
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample5" name="cidd" required>
    <label class="mdl-textfield__label" for="sample5">Course ID</label>
  </div>

    <br>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" >DELETE</button>
    </form>
</center>

<br><br>

    </div>
  </main>
</div>

</body>
</html>

