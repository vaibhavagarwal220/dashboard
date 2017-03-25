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
  <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
    </head>
  <body>
  <?php 
$title="Add Student";
  include 'include.inc.php';?>
   <?php

if( isset($_POST['uname'])&&isset($_POST['psw'])&&isset($_POST['name']) &&isset($_POST['address']) &&isset($_POST['cno']) )
{

    if(!empty($_POST['uname'])&& !empty($_POST['psw']) && !empty($_POST['name'])&& !empty($_POST['address'])&& !empty($_POST['cno']) )
  {

    $quer=$db->query("SELECT * FROM Students WHERE ROLLNO=".$_POST['uname']."");
    
    if(!$quer->num_rows)
    {

    //echo '1';
    
    $q ="INSERT INTO Students (NAME,PASSWORD,CONTACT,ADDRESS,ROLLNO) VALUES ('".$_POST['name']."' ,'".$_POST['psw']."',".$_POST['cno'].",'".$_POST['address']."' ,".$_POST['uname'].") ";

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

