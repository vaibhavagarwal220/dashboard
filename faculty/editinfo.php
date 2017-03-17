<?php

  require 'connect.php' ;
  require 'core.php' ;

if(!loggedinfac())
  {
    header('Location:facultylogin.php');
  }

?>



<!DOCTYPE html>
<html>
<head>
  <title>Edit Info</title>
    </head>
  <body>
  <?php include 'include.inc.php';?>

    <?php

//echo $_POST['name'];
//echo "$_POST['uname']";


if(isset($_POST['psw']) && isset($_POST['name'])&&isset($_POST['info'])&&isset($_POST['address']) &&isset($_POST['cno']) )
{

    if(!empty($_POST['psw']) && !empty($_POST['name'])&& !empty($_POST['info'])&& !empty($_POST['address']) && !empty($_POST['cno']))
  {

    
    $q ="UPDATE PROF SET NAME='".$_POST['name']."' , PASSWORD= '".$_POST['psw']."', CONTACT=".$_POST['cno'].", INFO='".$_POST['info']."', ADDRESS='".$_POST['address']."' WHERE TEACHER_ID=".$_SESSION['unamefac']." ";

    //echo $q;

     $db->query($q);

    if($db->affected_rows > 0)
      echo '<center><h4>Sucessfully Updated the record</h4></center>';


    else 
      echo "<center><h4>Update Failed</h4></center>" ;
  

  }

}

  
  $prof=$db->query("SELECT * fROM PROF WHERE TEACHER_ID=".$_SESSION['unamefac']." ");

  $rows=$prof->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  //echo $row['NAME'] ;
  echo "<br><br><center class=opts id=frm>  <h4>Users Info</h4><form action=\"editinfo.php\" method=\"POST\">
 
    <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample3\" name=\"name\" value=\"".$row['NAME']."\" required>
    <label class=\"mdl-textfield__label\" for=\"sample3\">Name</label>
  </div>

    <br>
       <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample5\" name=\"cno\"  value=\"".$row['CONTACT']."\"   required>
    <label class=\"mdl-textfield__label\" for=\"sample5\">Contact</label>
  </div>
    <br>

       <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    <input class=\"mdl-textfield__input\" type=\"password\" id=\"sample6\" name=\"psw\" required>
    <label class=\"mdl-textfield__label\" for=\"sample6\">Password</label>
  </div>

    <br>
       <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample7\" value=\"".$row['ADDRESS']."\" required name=address>
    <label class=\"mdl-textfield__label\" for=\"sample7\">Address</label>
  </div>

    <br>

       <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample8\" name=\"info\" value=\"".$row['INFO']."\" required>
    <label class=\"mdl-textfield__label\" for=\"sample8\">Info</label>
  </div>
    <br>
    <button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\" type=\"submit\">Submit</button>
  </form></center>
  ";
      
      


}
?>
</div></main></div>
</body>
</html>