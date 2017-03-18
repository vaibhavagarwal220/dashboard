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
  <title>Add</title>
    </head>
  <body>
  <?php include 'include.inc.php';?>
<?php

if( isset($_POST['cnamen'])&&isset($_POST['cidn'])&&isset($_POST['des'])&&isset($_POST['code']))
{
   if(!empty($_POST['cnamen'])&& !empty($_POST['cidn'])&& !empty($_POST['des'])&& !empty($_POST['code']))
   {


    $quer=@$db->query("SELECT * FROM SEM_COURSES WHERE COURSE_ID=".$_POST['cidn']."");
    
    if(!@$quer->num_rows)
    {

    //echo '1';
    
    $q ="INSERT INTO  SEM_COURSES (NAME,COURSE_ID,slot,code) VALUES ('".$_POST['cnamen']."' ,".$_POST['cidn'].",'".$_POST['des']."','".$_POST['code']."')";

    //echo $q ;

     @$db->query($q);

    if(@$db->affected_rows > 0)
    {
      echo "<center><h4>Sucessfully Added the Course Record!</h4></center>";
      mkdir("../Lectures/".$_POST['cidn']."",0777 );
    }


    else 
      echo "<center><h4>Course record was not inserted into the database!</h4></center>" ;
    }

  else
    echo "<center><h4>Course ID already exists!</h4></center> ";


   }
}


?>
<br><br>
<center class=opts id=frm>
  <h3>Add Courses</h3>
  
  <form action="addcrs.php" method="POST">

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="cidn" required>
    <label class="mdl-textfield__label" for="sample3">Course ID</label>
  </div>


    <br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample4" name="cnamen" required>
    <label class="mdl-textfield__label" for="sample4">Course Name</label>
  </div>


    <br>
  
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample6" name="code" required>
    <label class="mdl-textfield__label" for="sample6">Course Code</label>
  </div><br>

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample5" name="des" required>
    <label class="mdl-textfield__label" for="sample5">Slot</label>
  </div>
    <br>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">Submit</button>
</form>
</center>
    </div>
  </main>
</div>

</body>
</html>

