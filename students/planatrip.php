   <?php


  require 'connect.php' ;
  require 'core.php' ;
  
  if(!loggedin())
  {
    header('Location:studentlogin.php');
  }

?>

<?php
if(isset($_POST['depdate'])&&isset($_POST['dest']))
{
  $dte=date('Y-m-d',strtotime($_POST['depdate']));
  $dest=$_POST['dest'];
  if(!empty($dte)&&!empty($dest))
  {

$sql = "INSERT INTO trips(ROLLNO,dest,doj) VALUES('".$_SESSION['uname']."','".$dest."','".$dte."')";
         
        $result = $db->query($sql);
        
    if ($result->num_rows)
  {   
    
    //echo ('NO topics are created under this course ');
  }   


   else
    {      
        //redirect to back page
          header("Location:planatrip.php");
            //echo 'post submitted successfully';
        
       }



  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
<?php include 'include.inc.php';?>

   
    </head>

 
  <body >

<!-- Always shows a header, even in smaller screens. -->
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
    <span class="mdl-layout-title">
    <?php 

    $query_res=$db->query("SELECT NAME from students where ROLLNO='".@$_SESSION['uname']."' ");
    $rows=$query_res->fetch_all(MYSQLI_ASSOC) ;

    foreach($rows as $row)
      {
        $nm=$row['NAME'] ;
        echo $nm;
      }

    ?></span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="studentt.php"><i class="material-icons">dashboard</i> Dashboard </a>
      <a class="mdl-navigation__link" href="sedit.php"><i class="material-icons">line_weight</i> Edit Info</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">

<form action="c_trip.php" method=POST>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample4" name="dest">
    <label class="mdl-textfield__label" for="sample4">Destination</label>
  </div><br>
Date of Journey
<br>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="date" id="sample3" name="depdate">
    <label class="mdl-textfield__label" for="sample3"></label>
  </div>
  <input type="submit" name="ada">
  </form>
<script type="text/javascript">
  
  var today = new Date().toISOString().split('T')[0];
document.getElementsByName("depdate")[0].setAttribute('min', today);

</script>


<br><br><br><br>
    </div>
  </main>
</div>

</body>
</html>

