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
  <title>Bootstrap Example</title>
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
        $q="SELECT * FROM PROF WHERE TEACHER_ID=".$_SESSION['unamefac']."";
        $x=$db->query($q);
        $y=$x->fetch_all(MYSQLI_ASSOC);
        foreach($y as $row)
        {
          $n=$row['NAME'];
        }

      echo $n;

      ?></span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="facultyy.php"><i class="material-icons">dashboard</i> Dashboard</a>
      <a class="mdl-navigation__link" href="editinfo.php"><i class="material-icons">line_weight</i> Edit Info</a>
    

    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content"><!-- Your content goes here -->
  
    
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