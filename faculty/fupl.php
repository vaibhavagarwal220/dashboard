<?php


  require 'connect.php' ;
  require 'core.php' ;

if(!loggedinfac())
  {
    header('Location:facultylogin.php');
  }


   if(isset($_GET['q'])&&!empty($_GET['q']))
    {
      $cid=$_GET['q'];
      //echo $cid;
    }?>


<!DOCTYPE html>
<html>
<head>
  <title>Faculty Access</title>
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

<br><br>

<?php
if(isset($_FILES['Filename']['name'])&&isset($_FILES['Filename']['tmp_name'])&&isset($cid)){

  $fileName = $_FILES['Filename']['name'];
    $fileTarget = "../Lectures/$cid/".$fileName; 
    $tempFileName = $_FILES["Filename"]["tmp_name"];
 	if(!empty($_FILES['Filename']['name'])&&!empty($_FILES['Filename']['tmp_name'])&&!empty($cid)){
    $result = move_uploaded_file($tempFileName,$fileTarget);
    if($result) { 


      echo "<center><h4>Your file <html><b><i>".$fileName."</i></b></html> has been successfully uploaded</center></h4>";   
               }
    else 
    {      
      echo "<center><h4>Sorry !!! There was an error in uploading your file</center></h4>";     
    }
}

else 
    {      
      echo "<center><h4>Please select a file</center></h4>";     
    }

}

?>

<center class=opts id=frm>
	
	<h3>Upload File</h3>
 <form method="POST" action="fupl.php?q=<?php echo $cid;?>" enctype="multipart/form-data">
     <input type="file" name="Filename">
    <br/>
<br><br>
<button  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" >Upload</button>
</form>
</center>


 </div>
  </main>
</div>

 </body>
</html>

