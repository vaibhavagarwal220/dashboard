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
  <title>Admin Access</title>
  <body>
   <?php include 'include.inc.php';?>
<br>
<div class="mdl-grid opts" id=mid>

<a class="ablock rbg mdl-cell mdl-cell--4-col" title="Student List" href="listst.php"><i class="material-icons">recent_actors</i></a>
<a class="ablock gbg mdl-cell mdl-cell--4-col" title="Faculty List" href="listfc.php"><i class="material-icons">recent_actors</i></a>
<a class="ablock bbg mdl-cell mdl-cell--4-col" title="Add Student" href="addst.php"><i class="material-icons">playlist_add</i></a>
<a class="ablock pbg mdl-cell mdl-cell--4-col" title="Add Faculty" href=addfc.php><i class="material-icons">playlist_add</i></a>
<a class="ablock rbg mdl-cell mdl-cell--4-col" title="Remove Student" href="rmst.php"><i class="material-icons">delete_sweep</i></a>
<a href=rmfac.php class="ablock gbg mdl-cell mdl-cell--4-col" title="Remove Faculty"><i class="material-icons">delete_sweep</i></a>
<a href=addcrs.php class="ablock bbg mdl-cell mdl-cell--4-col" title="Add Course"><i class="material-icons">create_new_folder</i></a>
<a href=delcrs.php class="ablock pbg mdl-cell mdl-cell--4-col" title="Remove Course"><i class="material-icons">remove_circle</i></a>
<a href=addgrp.php class="ablock gbg mdl-cell mdl-cell--4-col" title="Add Group"><i class="material-icons">group_add</i></a>
<a href=rmgrp.php class="ablock rbg mdl-cell mdl-cell--4-col" title="Remove Group"><i class="material-icons">group</i></a>     


</div>







</div>
  </main>
</div>

</body>
</html>

