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
  <?php include 'include.inc.php';?>


    </head>
  <body>




<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">IIT Mandi</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link" href="logout.php"><i class="material-icons">launch</i> Log Out</a>

      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title"><?php
echo $_SESSION['unameadm'];
  ?></span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="adminn.php"><i class="material-icons">dashboard</i> Dashboard</a>
      <a class="mdl-navigation__link" href="listst.php"><i class="material-icons">recent_actors</i> Student List</a>
      <a class="mdl-navigation__link" href="listfc.php"><i class="material-icons">recent_actors</i> Faculty List</a>
      <a class="mdl-navigation__link" href="addst.php"><i class="material-icons">playlist_add</i> Add Student</a>
      <a class="mdl-navigation__link" href=addfc.php><i class="material-icons">playlist_add</i> Add Faculty</a>
      <a class="mdl-navigation__link" href="rmst.php"><i class="material-icons">delete_sweep</i> Remove Student</a>
      <a href=rmfac.php class="mdl-navigation__link"><i class="material-icons">delete_sweep</i> Remove Faculty</a>
      <a href=addcrs.php class="mdl-navigation__link"><i class="material-icons">create_new_folder</i> Add Course</a>
      <a href=delcrs.php class="mdl-navigation__link"><i class="material-icons">remove_circle</i> Remove Course</a>     

    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content"><!-- Your content goes here -->
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

