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
<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
  <title>File Upload</title>
    </head>
  <body>
    <?php 
    $title="Upload Files";
    include 'include.inc.php';
    $cid=$_SESSION['unamefac'];
    ?>

<br><br>

<?php
if(isset($_FILES['Filename']['name'])&&isset($_FILES['Filename']['tmp_name'])&&isset($cid)){

  $fileName = $_FILES['Filename']['name'];
    $fileTarget = "../Lectures/".$cid."/".$fileName; 
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
 <form method="POST" action="fupl.php" enctype="multipart/form-data">
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

