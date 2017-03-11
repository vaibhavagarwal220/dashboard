<!doctype html>
<?php 
require 'core.php';
require 'connect.php';
if(!loggedin())
  {
    header('Location:studentlogin.php');
  }
//I4=H4
//I3=H3
$time = array
  (
  "","8:00-9:00 AM","9:00-10:00 AM","10:00-11:00 AM","11:00-12:00 PM","12:00-1:00PM","1:00-2:00 PM","2:00-3:00 PM","3:00-4:00 PM","4:00-5:00 PM","5:00-6:00 PM","6:00-7:00 PM"
  );
 $days =array( "Monday","Tuesday","Wednesday","Thursday","Friday");
$ftime = array
  (
  array("<div class=\"A3 A4 co\"></div>","<div class=\"B3 B4 co\"></div>","<div class=\"co C3 C4\"></div>","<div class=\"co D3 D4\"></div>","L","<div class=\"co G3 G4\"></div>","<div class=\"co I3 I4\"></div><div class=\"L1 co\"></div>","<div class=\"L1 co\"></div>","<div class=\"L1 co\"></div>","",""),
  
  array("<div class=\"E3 E4 co\"></div>","<div class=\"F3 F4 co\"></div>","<div class=\"G3 G4 co\"></div>","<div class=\"co I3 I4\"></div>","U","<div class=\"A4 co\"></div>","<div class=\"L2 co\"></div><div class=\"C4 co\"></div>","<div class=\"L2 co\"></div>","<div class=\"L2 co\"></div>","",""),
  
  array("<div class=\"B3 B4 co\"></div>","<div class=\"C3 C4 co\"></div>","<div class=\"D3 D4 co\"></div>","<div class=\"A3 A4 co\"></div>","N","<div class=\"F3 F4 co\"></div>","<div class=\"L3 co\"></div><div class=\"G4 co\"></div>","<div class=\"L3 co\"></div><div class=\"E4 co\"></div>","<div class=\"L3 co\"></div><div class=\"I4 co\"></div>","",""),

  array("<div class=\"F3 F4 co\"></div>","<div class=\"E3 E4 co\"></div>","<div class=\"I3 I4 co\"></div>","<div class=\"G3 G4 co\"></div>","C","<div class=\"D4 co\"></div>","<div class=\"L4 co\"></div><div class=\"B4 co\"></div>","<div class=\"L4 co\"></div>","<div class=\"L4 co\"></div>","","") ,

  array("<div class=\"C3 C4 co\"></div>","<div class=\"D3 D4 co\"></div>","<div class=\"A3 A4 co\"></div>","<div class=\"B3 B4 co\"></div>","H","<div class=\"E3 E4 co\"></div>","<div class=\"F4 co\"></div><div class=\"L5 co\"></div>","<div class=\"L5 co\"></div>","<div class=\"L5 co\"></div>","","")
  );?>
	
<html>
  <head>
  <title>Timetable</title>
<?php include 'include.inc.php';?>
  <style type="text/css">
  		 .tt{width:100%;zoom:0.9;margin:auto;}
       #content {width:100%;margin:auto;}

         </style>
       


  </head>
  <body>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Timetable</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
      <button id="demo-menu-lower-right"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">forum</i>
</button>

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="demo-menu-lower-right">
    <?php

$cour=$db->query("SELECT * FROM forum_post ORDER by time DESC");

if (!$cour->num_rows)
{   
echo 'No posts.';
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;

//  <a href=show_and_create_post.php?cid=".$cr_id."&fid=".$sn['forum_id']."&uname=".$u_name." > ".$sn['forum_name']."</a>

foreach($rows as $row)
{
  $ttl=$row['post_title'] ;
  $ath=$row['post_author'];
  $bdy=$row['post_body'] ;
  
  $fid=$row['forum_id'] ;


      $q="SELECT * FROM table_forum WHERE  forum_id=".$fid." "; 
            $name=$db->query($q);
    if(!$name->num_rows)
      echo 'query works';
            $sname=$name->fetch_all(MYSQLI_ASSOC);
           
    //echo '2';
    
      foreach($sname as $sn)
            {
    echo "<a href=show_and_create_post.php?cid=".$sn['course_id']."&fid=".$sn['forum_id']."><li class=\"mdl-menu__item\">".getname($ath)." posted in ".$sn['forum_name']."</li> </a>";
       } 
}
?>

 
</ul>

       <a class="mdl-navigation__link" href="logout.php"><i class="material-icons">launch</i> Log Out</a>
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
        $nm=$row['NAME'] ;
        echo $nm;
      }

    ?></span>

    </span>
    <nav class="mdl-navigation mdl-color--blue-grey-800 mdl-color-text--blue-white-20" id=menuw>
    <a class="mdl-navigation__link" href="index.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">dashboard</i> Dashboard </a>
    <a class="mdl-navigation__link" href="#" id=viewc> <i class="material-icons mdl-color-text--blue-grey-400 material-icons">class</i> Courses</a>
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


  <a class="mdl-navigation__link" href=adddrop.php ><i class="material-icons mdl-color-text--blue-grey-400 material-icons">iso</i> Add/Drop Courses</a>
     <a class="mdl-navigation__link" href="sedit.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">line_weight</i> Edit Info</a>
     <a class="mdl-navigation__link" href="cal.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">date_range</i> Calendar</a>
    <a class="mdl-navigation__link" href="timetable.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">list</i> Timetable</a>
    <a class="mdl-navigation__link" href="review.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">grade</i> Course Review</a>
    <a class="mdl-navigation__link" href="contacts.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">call</i> Contact</a>
    <a class="mdl-navigation__link" href="https://www.redbus.in/bus-tickets/mandi-himachal-pradesh-to-delhi.aspx"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">event_seat</i> Book Bus Tickets</a>
    <a class="mdl-navigation__link" href=depart.php><i class="material-icons mdl-color-text--blue-grey-400 material-icons">flight_takeoff</i> Student Departures</a>     
    <a class="mdl-navigation__link" href=planatrip.php><i class="material-icons mdl-color-text--blue-grey-400 material-icons">motorcycle</i> Plan A Trip</a>
    

    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">



   <br><br>
<div id=content>

  	<div id=crss>
  	</div>
  	<br><br>
  	<?php

 echo "<div class=tt><table class=\"mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp\"><tr>";  
  for($i=0;$i<10;$i++)
    echo "<th class=\"mdl-data-table__cell--non-numeric\">".$time[$i]."</th>";
   echo "</tr>";

  for($i=0;$i<5;$i++)
    { echo "<tr><th class=\"mdl-data-table__cell--non-numeric\">".$days[$i]."</th>";
      for($j=0;$j<9;$j++){
        echo "<td class=\"mdl-data-table__cell--non-numeric\"  >".$ftime[$i][$j]."</td>";
      }
    echo "</tr>";
      
      }echo "</table></div>";
?>
<br><br>

<br><br>
<b><i>Note:</i></b><ol>
<li>Slots A3, B3, C3 and D3 are for 3 credit courses that can be used for core subjects.</li>
<li>Slots A4, B4, C4, D4, E4, F4, G4 and I4 are for 4 credit elective courses, (used for core if needed).</li>
<li>L1, L2, L3, L4, L5, L6, L7, L8, and L9 are the lab slots.</li>
<li>CS303 Software Engineering will be conducted from 2pm to 5 pm on Thursday in A5-3 (Conference room).</li>
<li>CS207 has 1 hour of lecture and will be conducted in slot D4 (Thursday)</li> 
<li>The classes for I Semester- M.Tech. (Mechanical /Energy) 2016 Batch will be held in North Campus Room B22-1 (Hostel Building).
</li>
<li>The classes for EN504/HS540 will be conducted in SC-1</li>
<li>The Classes for M.Tech. in Biotechnology 2016 Batch will be held in G1-104.</li>
<li>IC250 Class is only on Monday</li>
<li>CS207 Theory class is on thursday 1-2 PM</li>
  </ol>
  <?php
$cour=$db->query("SELECT * FROM CourseData WHERE STID=".$_SESSION['uname']."");

if (!$cour->num_rows)
{   
echo "No Course to show ";
}

$rows=$cour->fetch_all(MYSQLI_ASSOC) ;

foreach($rows as $row)
{
  $cd=$row['CID'] ;
  $nm=$row['Course Name'] ;
  $code=getcode($cd);
  $slot=getslot($cd);

  echo "<script>

$('#crss').hide().append('<span class=\"mdl-chip\" > <span class=\"mdl-chip__text\" title=\"$nm\">".$code."</span></span>').fadeIn();

$('.".$slot."').not('option').hide().html('<span class=\"mdl-chip\" cont=".$code."> <span class=\"mdl-chip__text\" style=\"font-size:12px;\">".$code."</span></span>').fadeIn();

</script>";
}
?>

</div>
  </div></main></div>

</body>
</html>