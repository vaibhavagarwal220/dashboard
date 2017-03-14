 <link rel="stylesheet" href="assets/material.min.css" /> 
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script defer src="assets/material.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lemonada|Roboto|Pacifico" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>





h1,h2,h3,h4,h5,h6{font-family:'Pacifico';}
.alig{
  vertical-align:-21%;font-size:20px;
}
.feedimg{width:500px;height:400px;}
.mdl-navigation__link{font-size:11px;color:white !important;font-family:'Lemonada';}
.mdl-navigation__link:hover{font-size:11px;color:black !important;}
a{text-decoration:none;}
.ts{color:grey;}
.mdl-menu{max-height:200px;overflow:auto; }
.mdl-layout__drawer{width:252px;height:100% !important;}
#dj{color:#E91E63;position:relative;left:-110px; font-size:12px; }
#frm{display:inline-block;padding:20px;}
.ablock{width:90px;height:90px;margin:10px;}
.opts{background:white;padding:10px;}
a:hover{text-decoration:none;color:default;}
.ablock img{width:90px;height:90px;}

body{font-family:'Roboto';color:black;background:#EFF3F6;}
.head{background: white;font-family:'Roboto';font-size:40;}
#logo{margin:10px;}

.contain{width:90%;margin: auto;background: white;}
.page-content{width:90%;margin: auto;color:black;font-size:16px;}
#crs{font-size: 40px;}

#nost{list-style:none;}

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
      <nav class="mdl-navigation mdl-layout--large-screen-only">
     

       
     <!-- Right aligned menu below button -->
 
       </nav>
    </div>  
     
      
  </header>
  <div class="mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
    <span class="mdl-layout-title">
      <?php 

    $query_res=$db->query("SELECT NAME from groups where cname='".@$_SESSION['unamegrp']."'");
    $rows=$query_res->fetch_all(MYSQLI_ASSOC) ;

    foreach($rows as $row)
      {
        $nm=$row['NAME']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id=demo-menu-lower
        class=\"mdl-button mdl-js-button mdl-button--icon\">
  <i class=material-icons>more_vert</i>
</button>

<ul class=\"mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect\"
    for=demo-menu-lower>
   <a href=\"sedit.php\"><li class=mdl-menu__item><i class=\"alig material-icons\">line_weight</i> Edit Info</li></a>
  <a href=\"logout.php\"><li class=mdl-menu__item><i class=\"material-icons alig\">launch</i> Log Out</li></a>
 
  
</ul>" ;
        echo $nm;
      }

    ?></span>

    </span>
    <nav class="mdl-navigation mdl-color--blue-grey-800 mdl-color-text--blue-white-20" id=menuw>
    <a class="mdl-navigation__link" href="index.php"><i class=" material-icons">dashboard</i> Dashboard </a>
  

	<a class="mdl-navigation__link" href=adddrop.php ><i class="material-icons">iso</i> Add/Drop Members</a>
     
    

    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
