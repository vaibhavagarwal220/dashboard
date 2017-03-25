 <link rel="stylesheet" href="assets/css/material.min.css" /> 
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script defer src="assets/js/material.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Cabin|Lato" rel="stylesheet">
  <script src="assets/js/jquery.min.js"></script>




<style>
.mdl-navigation__link{font-family:'Lato' !important;}

.mdl-navigation__link{font-size:15px;color:white !important;}

.mdl-navigation__link:hover{font-size:15px;color:black !important;}


.ablock{width:120px;height:120px;background:white;text-align:center;font-size:20px;margin:10px;line-height:200px;}
.opts{background:white;padding:20px;margin:auto;width:350px;}
.opt{background:white;padding:20px;margin:auto;}
a:hover{text-decoration:none;color:default;}
.ablock i{font-size:90px;}
body{background:#eff3f6;font-family:'Open Sans';color:black;}


.page-content{width:90%;margin: auto;color:black;}
.rbg{background:#cc2c2c;color: white;}
.gbg{background:#08a334;color: white;}
.bbg{background:#245199;color: white;}
.pbg{background:#80159b;color: white;}
#crs{font-size: 40px;}
#nost{list-style:none;}

#mid{margin:auto;}
</style>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title"><?php echo $title;?></span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="logout.php"><i class="material-icons">launch</i> Log Out</a>

      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
    <span class="mdl-layout-title"><?php
echo $_SESSION['unameadm'];
  ?></span>
    <nav class="mdl-navigation mdl-color--blue-grey-800 mdl-color-text--blue-white-20">
      <a class="mdl-navigation__link" href="index.php"><i class="material-icons">dashboard</i> Home </a>
      <a class="mdl-navigation__link" href="listst.php"><i class="material-icons">recent_actors</i> Student List</a>
      <a class="mdl-navigation__link" href="listfc.php"><i class="material-icons">recent_actors</i> Faculty List</a>
      <a href=listgrp.php class="mdl-navigation__link"><i class="material-icons">group</i> Groups List</a>
      <a href=listcrs.php class="mdl-navigation__link"><i class="material-icons">book</i> Courses List</a>

      <a class="mdl-navigation__link" href="addst.php"><i class="material-icons">playlist_add</i> Add Student</a>
      <a class="mdl-navigation__link" href=addfc.php><i class="material-icons">playlist_add</i> Add Faculty</a>
      <a href=addcrs.php class="mdl-navigation__link"><i class="material-icons">create_new_folder</i> Add Course</a>
      <a href=addgrp.php class="mdl-navigation__link"><i class="material-icons">group_add</i> Add Group</a>

      <a class="mdl-navigation__link" href="rmst.php"><i class="material-icons">delete_sweep</i> Remove Student</a>
      <a href=rmfac.php class="mdl-navigation__link"><i class="material-icons">delete_sweep</i> Remove Faculty</a>
      <a href=delcrs.php class="mdl-navigation__link"><i class="material-icons">remove_circle</i> Remove Course</a>
      <a href=rmgrp.php class="mdl-navigation__link"><i class="material-icons">group</i> Remove Group</a>     

    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content"><!-- Your content goes here -->