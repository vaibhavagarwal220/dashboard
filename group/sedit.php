


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
    header('Location:grouplogin.php');
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


if(isset($_POST['psw']) && isset($_POST['name'])&&isset($_POST['address']) )
{

    if(!empty($_POST['psw']) && !empty($_POST['name']) && !empty($_POST['address']) )
  {

    
    $q ="UPDATE groups SET name='".$_POST['name']."' , password= '".$_POST['psw']."', descr='".$_POST['address']."' WHERE cname='".$_SESSION['unamegrp']."' ";

    //echo $q;

     $db->query($q);

    if($db->affected_rows > 0)
      echo 'Sucessfully Updated the record<br><br>';


    else 
      echo "Update Failed / Info provided was same<br><br>" ;
  

  }

}

  
  $prof=$db->query("SELECT * fROM groups WHERE cname='".$_SESSION['unamegrp']."' ");

  $rows=$prof->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  //echo $row['NAME'] ;

    
  

  echo "<form action=\"sedit.php\" method=\"POST\">
  

      <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample3\" name=\"name\" value=\"".$row['name']."\"  required>
    <label class=\"mdl-textfield__label\" for=\"sample3\">Name</label>
</div>

<br>
  <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
 
    <input class=\"mdl-textfield__input\" type=\"password\" id=\"sample5\" name=\"psw\" required>
    <label class=\"mdl-textfield__label\" for=\"sample5\">Password</label>
</div>
<br>
  <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample6\" name=\"address\"    value=\"".$row['descr']."\"  required>
    <label class=\"mdl-textfield__label\" for=\"sample6\">Description</label>
</div>
<br>

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