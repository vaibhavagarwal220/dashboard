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
  <title>Add Student</title>
    </head>
  <body>
  <?php 
  $title="Add Group";
  include 'include.inc.php';?>
   <?php

if(isset($_POST['cname'])&&isset($_POST['psw'])&&isset($_POST['name']) &&isset($_POST['descr']))
{

    if(!empty($_POST['cname'])&& !empty($_POST['psw']) && !empty($_POST['name'])&& !empty($_POST['descr']))
  {

    $quer=$db->query("SELECT * FROM groups WHERE cname='".$_POST['cname']."'");
    
    if(!$quer->num_rows)
    {

    //echo '1';
    
    $q ="INSERT INTO groups (cname,password,descr,name) VALUES ('".$_POST['cname']."' ,'".$_POST['psw']."','".$_POST['descr']."' ,'".$_POST['name']."') ";

    //echo $q ;

     $db->query($q);

    if($db->affected_rows > 0)
      echo "<center><h5>Sucessfully Added the Group!</h5></center>";


    else 
      echo "<center><h5>Group was not inserted into the database!</h5></center>" ;
    }

  else
    echo "<center><h5>Group username already exists!</h5></center> ";


  }

}

?>


<br><br>
<center class=opts id=frm>



  <form action="addgrp.php" method="POST">
  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="cname" required>
    <label class="mdl-textfield__label" for="sample3">Userame</label>
  </div>

    <br>
  

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample4" name="name" required>
    <label class="mdl-textfield__label" for="sample4">Name</label>
  </div>

    <br>
  
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" id="sample6" name=psw required>
    <label class="mdl-textfield__label" for="sample6">Password</label>
  </div>


    <br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample7" name="descr" required>
    <label class="mdl-textfield__label" for="sample7">Description</label>
  </div>

   
    <br>

<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type=submit>
ADD GROUP
</button>

   </form>

</center>
<br><br>

    </div>
  </main>
</div>





    


</body>
</html>

