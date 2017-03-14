


<!DOCTYPE html>
<html>
<head>
  <title>Edit Info</title>
  <?php 
    require 'connect.php' ;
  require 'core.php' ;

if(!loggedin())
  {
    header('Location:studentlogin.php');
  }
  $title="Edit Details";
  include 'include.inc.php';?>

    </head>

  <body>
<br>
<center class=opts id=frm>
<br>    
     <?php

//echo $_POST['name'];
//echo "$_POST['uname']";


if(isset($_POST['psw']) && isset($_POST['name'])&&isset($_POST['info']) &&isset($_POST['address']) &&isset($_POST['cno']) )
{

    if(!empty($_POST['psw']) && !empty($_POST['name'])&& !empty($_POST['info']) && !empty($_POST['address']) && !empty($_POST['cno']))
  {

    
    $q ="UPDATE Students SET NAME='".$_POST['name']."' , PASSWORD= '".$_POST['psw']."', CONTACT=".$_POST['cno'].", INFO='".$_POST['info']."', ADDRESS='".$_POST['address']."' WHERE ROLLNO=".$_SESSION['uname']." ";

    //echo $q;

     $db->query($q);

    if($db->affected_rows > 0)
      echo 'Sucessfully Updated the record<br><br>';


    else 
      echo "Update Failed / Info provided was same<br><br>" ;
  

  }

}

  
  $prof=$db->query("SELECT * fROM Students WHERE ROLLNO=".$_SESSION['uname']." ");

  $rows=$prof->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  //echo $row['NAME'] ;

    
  

  echo "<form action=\"sedit.php\" method=\"POST\">
  

      <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample3\" name=\"name\" value=\"".$row['NAME']."\"  required>
    <label class=\"mdl-textfield__label\" for=\"sample3\">Name</label>
</div>
<br>

<br>
  <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample4\" name=\"cno\"  value=\"".$row['CONTACT']."\"    required>
    <label class=\"mdl-textfield__label\" for=\"sample4\">Contact</label>
</div>
<br>
  <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
 
    <input class=\"mdl-textfield__input\" type=\"password\" id=\"sample5\" name=\"psw\"   value=\"".$row['PASSWORD']."\"  required>
    <label class=\"mdl-textfield__label\" for=\"sample5\">Password</label>
</div>
<br>
  <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample6\" name=\"address\"    value=\"".$row['ADDRESS']."\"  required>
    <label class=\"mdl-textfield__label\" for=\"sample6\">Address</label>
</div>
<br>
  <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
  
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample7\" name=\"info\"    value=\"".$row['INFO']."\"  required>
    <label class=\"mdl-textfield__label\" for=\"sample7\">Info</label>
    </div>
<br><br>
    <button type=\"submit\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\">Update</button>
    </form><br>
    ";
      
      


}
?>
</center>
    </div></main></div>
</body>
</html>