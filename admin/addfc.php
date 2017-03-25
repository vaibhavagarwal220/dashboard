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
  <title>Add Faculty</title>
    </head>
  <body >
<?php 
$title="Add Faculty";
include 'include.inc.php';?>

<?php

if( isset($_POST['uname'])&&isset($_POST['psw'])&&isset($_POST['name']) &&isset($_POST['address']) &&isset($_POST['cno']) )
{
  //echo '1';

    if(!empty($_POST['uname'])&& !empty($_POST['psw']) && !empty($_POST['name'])&& !empty($_POST['address'])&& !empty($_POST['cno']))
  {

    //echo '2';

    $quermm=$db->query("SELECT * FROM PROF WHERE TEACHER_ID=".$_POST['uname']."");
    
    if(!$quermm->num_rows)
    {

    //echo '1';

    
    $q ="INSERT INTO PROF (NAME,PASSWORD,CONTACT,ADDRESS,TEACHER_ID) VALUES ('".$_POST['name']."' ,'".$_POST['psw']."',".$_POST['cno'].",'".$_POST['address']."' ,".$_POST['uname'].") ";

    //echo $q ;

     $db->query($q);

    if($db->affected_rows > 0)
      echo "<center><h4>Sucessfully Added the Professor Record!</h4></center>";


    else 
      echo "<center><h4>Professor record was not inserted into the database!(i.e. No course with given course ID is available)</h4></center>" ;
    }

  else
    echo "<center><h4>Professor ID already exists!</h4></center> ";


  }

}

?>
<br><br>
<center class=opts id=frm>
  <form action="addfc.php" method="POST">

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
<?php
$q="SELECT COURSE_ID FROM sem_courses where COURSE_ID NOT IN (SELECT TEACHER_ID FROM prof)";
$qr=$db->query($q);
    
    if(!$qr->num_rows)
    {


    }

    else{

          $rows=$qr->fetch_all(MYSQLI_ASSOC);
          
          echo "<select name=\"uname\" id=sample16 class=\"mdl-textfield__input\">";
          foreach($rows as $row)
          {
            echo "<option>".$row['COURSE_ID']."</option>";
          }
          echo "</select>";
        }
?>
<label class="mdl-textfield__label" for="sample16">Course ID</label>
  </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="name" required>
    <label class="mdl-textfield__label" for="sample3">Name</label>
  </div>
    <br>



    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample5" name="cno" required>
    <label class="mdl-textfield__label" for="sample5">Contact</label>
  </div>
    <br>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" id="sample6" name="psw" required>
    <label class="mdl-textfield__label" for="sample6">Password</label>
  </div>
    <br>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample8" name="address" required>
    <label class="mdl-textfield__label" for="sample8">Address</label>
  </div>

    <br>

 <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type=submit>
  ADD FACULTY
</button>

    </form>

</center>
<br><br>
    </div>
  </main>
</div>
</body>
</html>