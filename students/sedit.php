


<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
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
<style type="text/css">
	.opts{width:350px;margin:auto;}
</style>
    </head>

  <body>
<br>
<center class=opts >
<br>    
     <?php

//echo $_POST['name'];
//echo "$_POST['uname']";


if(isset($_POST['psw']) && isset($_POST['name']) &&isset($_POST['address']) &&isset($_POST['cno'])&& isset($_POST['npsw']) )
{

    if(!empty($_POST['psw']) && !empty($_POST['name'])&& !empty($_POST['address']) && !empty($_POST['cno'])&& !empty($_POST['npsw']))
  {

    if(getpass($_SESSION['uname'])==$_POST['psw'])
    {
    $q ="UPDATE Students SET NAME='".$_POST['name']."' , PASSWORD= '".$_POST['npsw']."', CONTACT=".$_POST['cno'].", ADDRESS='".$_POST['address']."' WHERE ROLLNO=".$_SESSION['uname']." ";

    //echo $q;

     $db->query($q);

    if($db->affected_rows > 0)
      echo 'Sucessfully Updated the record<br><br>';


    else 
      echo "Update Failed / Info provided was same<br><br>" ;
  		}
	else 
	{
		 echo "Current Password is Incorrect<br><br>" ;
	}
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
 
    <input class=\"mdl-textfield__input\" type=\"password\" id=\"sample5\" name=\"psw\" required>
    <label class=\"mdl-textfield__label\" for=\"sample5\">Current Password</label>
</div>
<br>
<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
 
    <input class=\"mdl-textfield__input\" type=\"password\" id=\"sample10\" name=\"npsw\" required>
    <label class=\"mdl-textfield__label\" for=\"sample10\">New Password</label>
</div>
<br>
  <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample6\" name=\"address\"    value=\"".$row['ADDRESS']."\"  required>
    <label class=\"mdl-textfield__label\" for=\"sample6\">Address</label>
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