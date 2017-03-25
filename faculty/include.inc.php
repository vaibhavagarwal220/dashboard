 <link rel="stylesheet" href="assets/css/material.min.css" /> 
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script defer src="assets/js/material.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Cabin|Lato" rel="stylesheet">

  <script src="assets/js/jquery.min.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>




<style>
.alig{
  vertical-align:-21%;font-size:20px;
}
.acnt{font-size:26px;}

a{text-decoration:none;}

.mdl-navigation__link{font-family:'Lato' !important;}

.mdl-navigation__link{font-size:15px;color:white !important;}

.mdl-navigation__link:hover{font-size:15px;color:black !important;}

.ablock{width:150px;height:150px;background:white;text-align:center;font-size:20px;margin:10px;line-height:200px;}
.opts{background:white;padding:20px;}
a:hover{text-decoration:none;color:default;}
.ablock i{font-size:80px;}
body{background:#eff3f6;font-family:'Open Sans';color:black;}
#frm{display:inline-block; margin-left:35%;}
#logo{margin:10px;}
#caln{width:600px;height:400px;margin:auto;}
.page-content{width:90%;margin: auto;color:black;}
.rbg{background:#cc2c2c;color: white;}
.gbg{background:#08a334;color: white;}
.bbg{background:#245199;color: white;}
.pbg{background:#80159b;color: white;}
#crs{font-size: 40px;}
.feed{padding:20px;}
#nost{list-style:none;}

#mid{margin:auto;}
  
</style>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title"><?php echo $title;?></span>
      <div class="mdl-layout-spacer"></div>
      <nav class="mdl-navigation mdl-layout--large-screen-only">
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
    <span class="mdl-layout-title">
    <?php 

    $query_res=$db->query("SELECT NAME from prof where TEACHER_ID=".@$_SESSION['unamefac']." ");
    $rows=$query_res->fetch_all(MYSQLI_ASSOC) ;

    foreach($rows as $row)
      {
        $nm="<i class=\"material-icons alig acnt\">account_circle</i> &nbsp;".$row['NAME']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id=demo-menu-lower
        class=\"mdl-button mdl-js-button mdl-button--icon\">
  <i class=material-icons>more_vert</i>
</button>

<ul class=\"mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect\"
    for=demo-menu-lower>
   <a href=\"editinfo.php\"><li class=mdl-menu__item><i class=\"alig material-icons\">line_weight</i> Edit Info</li></a>
  <a href=\"logout.php\"><li class=mdl-menu__item><i class=\"material-icons alig\">launch</i> Log Out</li></a>
 
  
</ul>" ;
        echo $nm;
      }

    ?></span>
    <nav class="mdl-navigation mdl-color--blue-grey-800 mdl-color-text--blue-white-20">
      <a class="mdl-navigation__link" href="index.php"><i class="material-icons">dashboard</i> Home </a>
      <a class="mdl-navigation__link" href="editinfo.php"><i class="material-icons">line_weight</i> Edit Info</a>
      <a class="mdl-navigation__link" href="cal.php"><i class="material-icons">date_range</i> Calendar</a>
      <a class="mdl-navigation__link" href="timetable.php"><i class="material-icons">list</i> Timetable</a>
      <a class="mdl-navigation__link" href="review.php"><i class="material-icons">grade</i> Course Review</a>
      <a class="mdl-navigation__link" href="fupl.php"><i class="material-icons">unarchive</i> Upload</a>
      <a class="mdl-navigation__link" href="listst.php"><i class="material-icons">recent_actors</i> Student List</a>
      
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
