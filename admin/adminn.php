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

 <?php include 'include.inc.php';?>
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
echo $_SESSION['unameadm'];
  ?></span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="#"><i class="material-icons">dashboard</i> Dashboard</a>
      <a class="mdl-navigation__link" href="listst.php"><i class="material-icons">recent_actors</i> Student List</a>
      <a class="mdl-navigation__link" href="listfc.php"><i class="material-icons">recent_actors</i> Faculty List</a>
      <a class="mdl-navigation__link" href="addst.php"><i class="material-icons">playlist_add</i> Add Student</a>
      <a class="mdl-navigation__link" href=addfc.php><i class="material-icons">playlist_add</i> Add Faculty</a>
      <a class="mdl-navigation__link" href="rmst.php"><i class="material-icons">delete_sweep</i> Remove Student</a>
      <a href=rmfac.php class="mdl-navigation__link"><i class="material-icons">delete_sweep</i> Remove Faculty</a>
      <a href=addcrs.php class="mdl-navigation__link"><i class="material-icons">create_new_folder</i> Add Course</a>
      <a href=delcrs.php class="mdl-navigation__link"><i class="material-icons">remove_circle</i> Remove Course</a>     

    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content"><!-- Your content goes here -->
      

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


</div>







</div>
  </main>
</div>

</body>
</html>

