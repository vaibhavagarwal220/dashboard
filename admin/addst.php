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
  <title>Add Student</title>
 
      <?php include 'include.inc.php';?>
      
    </head>
  <body >



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

if( isset($_POST['uname'])&&isset($_POST['psw']) && isset($_POST['info'])&&isset($_POST['name']) &&isset($_POST['address']) &&isset($_POST['cno']) )
{

    if(!empty($_POST['uname'])&& !empty($_POST['psw']) && !empty($_POST['name'])&& !empty($_POST['info']) && !empty($_POST['address'])&& !empty($_POST['cno']) )
  {

    $quer=$db->query("SELECT * FROM Students WHERE ROLLNO=".$_POST['uname']."");
    
    if(!$quer->num_rows)
    {

    //echo '1';
    
    $q ="INSERT INTO Students (NAME,PASSWORD,CONTACT,INFO,ADDRESS,ROLLNO) VALUES ('".$_POST['name']."' ,'".$_POST['psw']."',".$_POST['cno'].",'".$_POST['info']."','".$_POST['address']."' ,".$_POST['uname'].") ";

    //echo $q ;

     $db->query($q);

    if($db->affected_rows > 0)
      echo "<center><h5>Sucessfully Added the Student Record!</h5></center>";


    else 
      echo "<center><h5>Student record was not inserted into the database!</h5></center>" ;
    }

  else
    echo "<center><h5>Student ID already exists!</h5></center> ";


  }

}

?>


<br><br>
<center class=opts id=frm>
 <h3>Add Student</h3>


  <form action="addst.php" method="POST">
  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="name" required>
    <label class="mdl-textfield__label" for="sample3">Name</label>
  </div>

    <br>
  

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample4" name="uname" required>
    <label class="mdl-textfield__label" for="sample4">Roll No</label>
  </div>

    <br>
  
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample5" name="cno" required>
    <label class="mdl-textfield__label" for="sample5">Contact</label>
  </div>

    <br>
  
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" id="sample6" name=psw required>
    <label class="mdl-textfield__label" for="sample6">Password</label>
  </div>


    <br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample7" name="address" required>
    <label class="mdl-textfield__label" for="sample7">Address</label>
  </div>

    <br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="info" required>
    <label class="mdl-textfield__label" for="sample3">Info</label>
  </div>

    <br>

<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type=submit>
ADD STUDENT
</button>

   </form>

</center>
<br><br>

    </div>
  </main>
</div>





    


</body>
</html>

