<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
 <link rel="stylesheet" href="assets/css/material.min.css" /> 
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script defer src="assets/js/material.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Cabin|Lato" rel="stylesheet">
<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="assets/js/lightbox.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/lightbox.css">


<style>



#demo-menu-lower-right{color:#3E2723;position:absolute;left:1000px;top:1px;cursor:hand;cursor:pointer;}


.mdl-navigation__link{font-family:'Lato' !important;}

.mdl-navigation__link{font-size:15px;color:white !important;}

.mdl-navigation__link:hover{font-size:15px;color:black !important;}


h1,h2,h3,h4,h5,h6{font-family:'Cabin';}

.alig{
  vertical-align:-21%;font-size:20px;
}

.rbg{background:#cc2c2c;color: white;}

.gbg{background:#08a334;color: white;}

.gbg:hover{background:#55a86d !important;color: white;}

.rbg:hover{background:#e04e4e !important;color: white;}


.mdl-lout{font-family:'Cabin';display:inline;}



.feedimg{width:550px;height:600px;}

a{text-decoration:none;}

.ts{color:grey;}

.mdl-menu{max-height:200px;overflow:auto; }

.mdl-layout__drawer{width:252px;height:100% !important;}

#dj{color:#E91E63;position:relative;left:-110px; font-size:12px; }

#frm{display:inline-block;}

.posme{margin:auto !important;width:330px;}

.ablock{width:90px;height:90px;margin:auto;}

.opts{background:white;padding:10px;margin:7px;}

a:hover{text-decoration:none;color:default;}

.ablock img{width:90px;height:90px;padding:10px;}

.acnt{font-size:26px;}

body{font-family:'Open Sans';color:black;background:#EFF3F6;line-height:1.7em;}
/*body{background-image:url('assets/img/back1.jpg');background-repeat:round;}*/

#logo{margin:10px;}

#caln{width:800px;height:540px;margin:auto;}

.cal{width:800px;height:540px;margin:auto;}

.page-content{width:90%;margin: auto;color:black;font-size:16px;}

.feed{padding:20px;display:inline-block;}
.feedgr{padding:20px;display:inline-block;width:600px;}

#feedspost{width:650px;}

#nost{list-style:none;}

.past,.fut{background:gray;color: white;}

.tod{background:#08a334;color: white;}

@media only screen and (max-width: 500px) {
          #chart_div{zoom:0.5 !important;}
          #chart_div3{zoom:0.5 !important;}
          .feedimg{width:245px !important;height:275px !important;}
          .ccde{display:none;}
          .cslt{display:none;}
          #caln{width:300px !important;height:275px !important;margin:auto !important;}
          .cont{display:none !important;}
          .cal{width:300px !important;height:275px !important;margin:auto !important;}
          #demo-menu-lower-right{color:#3E2723;position:absolute;left:255px;top:0px;cursor:hand;cursor:pointer;}
          .feedgr{padding:20px;display:inline-block;width:250px;}
          #feedspost{width:275px;}
}



</style>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title"><div class="mdl-lout"><?php echo $title;?> </div>

<div class="material-icons mdl-badge mdl-badge--overlap" id="demo-menu-lower-right">notifications</div>
  
  <script type="text/javascript">
      $('#demo-menu-lower-right').click(function(){$(this).css('color','#3E2723');$(this).removeAttr('data-badge');});
      var audio = new Audio('assets/notif.mp3');
      var result1="";
      $.post("getnotif.php", {}, function(result){
        if(result1!=result&&result1!=""){audio.play();}
        $("#shownotif").html(result);
        result1=result;
    });
      setInterval(function(){ $.post("getnotif.php", {}, function(result){
        if(result1!=result&&result1!=""){$('#demo-menu-lower-right').css('color','white');audio.play();$('#demo-menu-lower-right').attr('data-badge','★');}
        $("#shownotif").html(result);

        result1=result;
    });},1000);
  </script>
<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="demo-menu-lower-right" id=shownotif>

</ul>


      </span>
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

    $query_res=$db->query("SELECT NAME from students where ROLLNO='".@$_SESSION['uname']."' ");
    $rows=$query_res->fetch_all(MYSQLI_ASSOC) ;

    foreach($rows as $row)
      {
        $nm="<i class=\"material-icons alig acnt\">account_circle</i> &nbsp;".$row['NAME']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id=demo-menu-lower
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
    <a class="mdl-navigation__link dashb" href="index.php"><i class=" material-icons">dashboard</i> Home </a>
    <a class="mdl-navigation__link crss" href="#" id=viewc> <i class=" material-icons">class</i> Courses</a>
     <div id=showc> 
  <?php
$cour=$db->query("SELECT * FROM CourseData WHERE STID=".$_SESSION['uname']."");

if (!$cour->num_rows)
{   
echo "<a href=# class=\"mdl-navigation__link\">No Course to show 
</a>";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $cname=$row['Course Name'] ;
  $ci=$row['CID'];


  echo "     <a href=x.php?q=$ci class=\"mdl-navigation__link\">$cname
</a>";
}
  ?>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#showc').hide();
    count=0;
  });
  $('#viewc').click(function(){
    if(count%2==0) $('#showc').slideDown();
    else $('#showc').slideUp();
    count++;
  })
</script>

<a class="mdl-navigation__link grps" href="#" id=viewg> <i class="material-icons">group</i> Groups</a>
     <div id=showg> 
  <?php
$cour=$db->query("SELECT * FROM groups");

if (!$cour->num_rows)
{   
echo "<a href=# class=\"mdl-navigation__link\">No groups to show 
</a>";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $id=$row['id'] ;
  $name=$row['name'] ;



  echo "<a href=clubs.php?grp=$id class=\"mdl-navigation__link\">".$name."</a>";
}
  ?>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#showg').hide();
    count=0;
  });
  $('#viewg').click(function(){
    if(count%2==0) $('#showg').slideDown();
    else $('#showg').slideUp();
    count++;
  });

</script>

	<a class="mdl-navigation__link adrp" href=adddrop.php ><i class=" material-icons">iso</i> Add/Drop Courses</a>
     <a class="mdl-navigation__link caldr " href="cal.php"><i class="material-icons">date_range</i> Calendar</a>
    <a class="mdl-navigation__link ttmbl" href="timetable.php"><i class="material-icons">list</i> Timetable</a>
    <a class="mdl-navigation__link rview" href="review.php"><i class="material-icons">grade</i> Course Review</a>
    <a class="mdl-navigation__link cont cntckt" href="contacts.php"><i class=" material-icons">call</i> Contact</a>
    <a class="mdl-navigation__link bbtck " target=_blank href="https://www.redbus.in/bus-tickets/mandi-himachal-pradesh-to-delhi.aspx">
    <i class="material-icons">event_seat</i> Book Bus Tickets</a>
    <a class="mdl-navigation__link dept " href=depart.php><i class="material-icons">flight_takeoff</i> Departures</a>     
    <a class="mdl-navigation__link ptrip " href=planatrip.php><i class="material-icons">motorcycle</i> Plan A Trip</a>
    

    </nav>
  </div>

  <main class="mdl-layout__content">
    <div class="page-content">
