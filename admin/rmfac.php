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
  <title>Remove Faculty</title>
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

    $querm=$db->query("SELECT * FROM PROF WHERE TEACHER_ID=".$_POST['unamedel']."");
    
    if($querm->num_rows)
    {

    //echo '1';
    
    $q ="DELETE FROM PROF WHERE TEACHER_ID=".$_POST['unamedel']."";

    //echo $q ;

     $db->query($q);

    if($db->affected_rows > 0)
      echo "<center><h4>Sucessfully Deleted the Professor Record!</h4></center>";


    else 
      echo "<center><h4>Professor record was not deleted from the database!</h4></center>" ;
    }

  else
    echo "<center><h4>Professor ID does not exists! </h4></center>";


  }

}

?>
<br><br>
<center class=opts id=frm>

  <form action="rmfac.php" method="POST">
    
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample" name="unamedel" required>
    <label class="mdl-textfield__label" for="sample4">Professor's Course ID</label>
  </div>

    <br>
    <br>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">DELETE</button>

    </form>
    </center>
    <br><br>

    
  <script>
function myFunction() {
    var x;
    if (confirm("Are You Sure To Delete!") == true) {
        //x = "You pressed OK!";
    } else {
        //x = "You pressed Cancel!";
    }
    //document.getElementById("demo").innerHTML = x;
}
</script>
    </div>
  </main>
</div>


</body>
</html>