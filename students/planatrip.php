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

			      $dstr=strtotime($_POST['depdate']);
  $dte=date('Y-m-d',$dstr);
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
          header("Location:planatrip.php");
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>

<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
  <title>Plan a Trip</title>
    </head>
  <body>

  <?php 
  $title="Plan a Trip";
  include 'include.inc.php';?>
  <style type="text/css">
.ptrip{font-size:15px;color:black !important;background-color:white !important; }
  
</style>

    <br><br>
<center class="opts posme">
<h4>Add a Trip</h4>
<form action="c_trip.php" method=POST>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample4" name="dest" required>
    <label class="mdl-textfield__label" for="sample4">Destination</label>
  </div><br>
<div id=dj>Date of Journey</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="date" id="sample3" name="depdate" required>
    <label class="mdl-textfield__label" for="sample3"></label>
  </div>
  <br>
  <input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  </form>
  </center>
<script type="text/javascript">
  
  var today = new Date().toISOString().split('T')[0];
document.getElementsByName("depdate")[0].setAttribute('min', today);
document.getElementsByName("depdate")[0].setAttribute('max', today+'+3M');

</script>


<br><br><br><br>
    </div>
  </main>
</div>

</body>
</html>

