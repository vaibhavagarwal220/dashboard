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
  <title>Add Course</title>
    </head>
  <body>
  <?php 
$title="Add Course";
  include 'include.inc.php';?>
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
<select name=des id=sample16 class=mdl-textfield__input>
            <option>A3</option>
            <option>B3</option>
            <option>C3</option>
            <option>D3</option>
            <option>E3</option>
            <option>F3</option>
            <option>G3</option>
            <option>I3</option>
            <option>A4</option>
            <option>B4</option>
            <option>C4</option>
            <option>D4</option>
            <option>E4</option>
            <option>F4</option>
            <option>G4</option>
            <option>I4</option>
            <option>L1</option>
            <option>L2</option>
            <option>L3</option>
            <option>L4</option>
            <option>L5</option>



</select>
<label class="mdl-textfield__label" for="sample16">Slot</label>
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

