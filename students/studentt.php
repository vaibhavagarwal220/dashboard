   <?php


  require 'connect.php' ;
  require 'core.php' ;
  
  if(!loggedin())
  {
    header('Location:studentlogin.php');
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
<?php include 'include.inc.php';?>

   
    </head>

 
  <body >

<!-- Always shows a header, even in smaller screens. -->
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
      <a class="mdl-navigation__link" href="#"><i class="material-icons">dashboard</i> Dashboard </a>
      <a class="mdl-navigation__link" href="sedit.php"><i class="material-icons">line_weight</i> Edit Info</a>
      
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">

<br><br><br>
<div class="mdl-grid">
<div class="mdl-cell mdl-cell--8-col">

<?php

$cour=$db->query("SELECT * FROM forum_post ORDER by time DESC");

if (!$cour->num_rows)
{   
die('No posts.');
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
    echo " <div class=\"opts feed\">".getname($ath)." posted in <a href=show_and_create_post.php?cid=".$sn['course_id']."&fid=".$sn['forum_id']."> ".$sn['forum_name']."</a> <br><br><br> <b>$ttl</b><br><br> $bdy
  </div><br><br>";
       } 
}
?>

</div>

<div class="mdl-cell mdl-cell--4-col ">
<center class=opts>
 <h4> My Courses </h4>

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


  echo "<a href=x.php?q=$cid class=\"mdl-chip\"><span class=\"mdl-chip__text\">$cname</span>
</a><br><br>";
}
  ?>  </center>
<br>
<div class="mdl-grid opts">

<a class="ablock rbg mdl-cell mdl-cell--4-col" title="Calendar" href="cal.php"><i class="material-icons">date_range</i></a>
<a class="ablock gbg mdl-cell mdl-cell--4-col" title=Timetable><i class="material-icons">list</i></a>
<a class="ablock rbg mdl-cell mdl-cell--4-col" title="Course Review" href="review.php"><i class="material-icons">grade</i></a>
<a class="ablock bbg mdl-cell mdl-cell--4-col" title=Contact><i class="material-icons">call</i></a>
<a class="ablock pbg mdl-cell mdl-cell--4-col" title="Book Bus Tickets" href="https://www.redbus.in/bus-tickets/mandi-himachal-pradesh-to-delhi.aspx"><i class="material-icons">event_seat</i></a>
<a href=depart.php class="ablock rbg mdl-cell mdl-cell--4-col" title="Student Departures"><i class="material-icons">flight_takeoff</i></a>     
<a class="ablock gbg mdl-cell mdl-cell--4-col" href=planatrip.php title="Plan A Trip"><i class="material-icons">motorcycle</i></a>
<a class="ablock gbg mdl-cell mdl-cell--4-col" href=adddrop.php title="Plan A Trip"><i class="material-icons">iso</i></a>

</div>





    </div>

    </div>





    <!-- Your content goes here -->
    </div>
  </main>
</div>

</body>
</html>

