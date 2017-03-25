 <link rel="stylesheet" href="assets/css/material.min.css" /> 
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script defer src="assets/js/material.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Cabin|Lato" rel="stylesheet">
<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>


.mdl-lout{font-family:'Cabin';display:inline;}

.mdl-navigation__link{font-family:'Lato' !important;}

#demo-menu-lower-right{color:#3E2723;position:absolute;left:1200px;top:20px;cursor:hand;cursor:pointer;}

h1,h2,h3,h4,h5,h6{font-family:'Cabin';}

.mdl-navigation__link{font-size:15px;color:white !important;}

.mdl-navigation__link:hover{font-size:15px;color:black !important;}

a{text-decoration:none;}

.ts{color:grey;}

.alig{

  vertical-align:-21%;font-size:20px;
}

.mdl-menu{max-height:200px;overflow:auto; }



#frm{display:inline-block; margin-left:35%;padding:20px;}


a:hover{text-decoration:none;color:default;}

body{font-family:'Open Sans';color:black;background:#EFF3F6;}


.page-content{width:90%;margin: auto;color:black;font-size:16px;}

.acnt{font-size:26px;}

#nost{list-style:none;}

</style>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
            mdl-layout--fixed-tabs">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title"><div class=mdl-lout><?php echo $title;?></div></span>
      <!-- Add spacer, to align navigation to the right -->
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

      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
  
       </nav>
    </div>
    <!-- Tabs -->
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
      <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Institute</a>
      <a href="#fixed-tab-2" class="mdl-layout__tab">B.Tech. 2013</a>
      <a href="#fixed-tab-3" class="mdl-layout__tab">B.Tech. 2014</a>
      <a href="#fixed-tab-4" class="mdl-layout__tab">B.Tech. 2015</a>
      <a href="#fixed-tab-5" class="mdl-layout__tab">B.Tech. 2016</a>
      <a href="#fixed-tab-6" class="mdl-layout__tab">MS</a>
      <a href="#fixed-tab-7" class="mdl-layout__tab">Ph. D</a>
      <a href="#fixed-tab-8" class="mdl-layout__tab">M.Sc.</a>
      <a href="#fixed-tab-9" class="mdl-layout__tab">M.Tech.</a>
      <a href="#fixed-tab-10" class="mdl-layout__tab">Int.Ph.D.</a>
      
    </div>
  </header>
  <div class="mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
    <span class="mdl-layout-title">
      <?php 

    $query_res=$db->query("SELECT NAME from students where ROLLNO='".@$_SESSION['uname']."' ");
    $rows=$query_res->fetch_all(MYSQLI_ASSOC) ;

    foreach($rows as $row)
      {
        $nm="<i class=\"material-icons alig acnt\">account_circle</i> &nbsp;".$row['NAME']."&nbsp;&nbsp;<button id=demo-menu-lower
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


    <nav class="mdl-navigation mdl-color--blue-grey-800 mdl-color-text--blue-white-20" id=menuw>
    <a class="mdl-navigation__link" href="index.php"><i class="material-icons">dashboard</i> Home </a>
    <a class="mdl-navigation__link" href="#" id=viewc> <i class="material-icons">class</i> Courses</a>
     <div id=showc> 
  <?php
  if(!loggedin()) header("Location:studentlogin.php");
$cour=$db->query("SELECT * FROM CourseData WHERE STID=".$_SESSION['uname']."");

if (!$cour->num_rows)
{   
echo "No Course to show ";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $cname=$row['Course Name'] ;
  $cid=$row['CID'];


  echo "     <a href=x.php?q=$cid class=\"mdl-navigation__link\">$cname
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

<a class="mdl-navigation__link" href="#" id=viewg> <i class="material-icons">group</i> Groups</a>
     <div id=showg> 
  <?php
$cour=$db->query("SELECT * FROM groups");

if (!$cour->num_rows)
{   
echo "<a href=# class=\"mdl-navigation__link\">No Course to show 
</a>";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $id=$row['id'] ;
  $name=$row['name'] ;



  echo "     <a href=clubs.php?grp=$id class=\"mdl-navigation__link\">".$name."</a>";
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
  })
</script>

  <a class="mdl-navigation__link" href=adddrop.php ><i class="material-icons">iso</i> Add/Drop Courses</a>
     <a class="mdl-navigation__link" href="cal.php"><i class="material-icons">date_range</i> Calendar</a>
    <a class="mdl-navigation__link" href="timetable.php"><i class="material-icons ">list</i> Timetable</a>
    <a class="mdl-navigation__link" href="review.php"><i class="material-icons">grade</i> Course Review</a>
    <a class="mdl-navigation__link cntckt" href="contacts.php"><i class="material-icons">call</i> Contact</a>
    <a class="mdl-navigation__link" target=_blank href="https://www.redbus.in/bus-tickets/mandi-himachal-pradesh-to-delhi.aspx"><i class="material-icons">event_seat</i> Book Bus Tickets</a>
    <a class="mdl-navigation__link" href=depart.php><i class="material-icons">flight_takeoff</i> Departures</a>     
    <a class="mdl-navigation__link" href=planatrip.php><i class="material-icons">motorcycle</i> Plan A Trip</a>
    

    </nav>
  </div>
  <main class="mdl-layout__content">

