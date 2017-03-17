 <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-purple.min.css" /> 
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Asap|Lobster|Open+Sans|Roboto" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>




<style>
.ablock{width:150px;height:150px;background:white;text-align:center;font-size:20px;margin:10px;line-height:200px;}
.opts{background:white;padding:20px;}
a:hover{text-decoration:none;color:default;}
.ablock i{font-size:80px;}
body{background:#eff3f6;font-family:'Roboto';color:black;}
.head{background: white;font-family:'Roboto';font-size:40;}
#frm{display:inline-block; margin-left:35%;}
#logo{margin:10px;}
#caln{width:600px;height:400px;margin:auto;}
.contain{width:90%;margin: auto;background: white;}
.page-content{width:90%;margin: auto;color:black;}
.rbg{background:#cc2c2c;color: white;}
.gbg{background:#08a334;color: white;}
.bbg{background:#245199;color: white;}
.pbg{background:#80159b;color: white;}
#crs{font-size: 40px;}
.feed{padding:20px;}
#nost{list-style:none;}
.past{background:gray;color: white;}
.tod{background:#08a334;color: white;}
.fut{background:gray;color: white;}
#mid{margin:auto;}
  
</style>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title">IIT Mandi</span>
      <div class="mdl-layout-spacer"></div>
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
      <a class="mdl-navigation__link" href="index.php"><i class="material-icons">dashboard</i> Dashboard </a>
      <a class="mdl-navigation__link" href="editinfo.php"><i class="material-icons">line_weight</i> Edit Info</a>
      
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
