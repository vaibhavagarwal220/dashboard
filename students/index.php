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
  <title>Home</title>
<?php include 'include.inc.php';?>

   
    </head>

 
  <body >
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Home</span>
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

<!-- Always shows a header, even in smaller screens. -->


<div class="mdl-grid">
<div class="mdl-grid">

<a class="ablock mdl-cell mdl-cell--4-col" title="Calendar" href="cal.php"><img src=assets/img/cal.png></a>
<a class="ablock mdl-cell mdl-cell--4-col" title=Timetable href="timetable.php"><img src=assets/img/ttbl.png></a>
<a class="ablock mdl-cell mdl-cell--4-col" title="Course Review" href="review.php"><img src=assets/img/rev.png></a>
<a class="ablock mdl-cell mdl-cell--4-col" title=Contact href=contacts.php><img src=assets/img/cont.ico></a>
<a class="ablock mdl-cell mdl-cell--4-col" title="Book Bus Tickets" href="https://www.redbus.in/bus-tickets/mandi-himachal-pradesh-to-delhi.aspx">
  <img src=assets/img/bus.ico>
</a>
<a href=depart.php class="ablock mdl-cell mdl-cell--4-col" title="Student Departures"><img src=assets/img/depr.png></a>     
<a class="ablock mdl-cell mdl-cell--4-col" href=planatrip.php title="Plan A Trip"><img src=assets/img/trip.png></a>
<a class="ablock mdl-cell mdl-cell--4-col" href=adddrop.php title="Add/Drop Courses"><img src=assets/img/adrp.png></a>
</div>
<div class="mdl-cell mdl-cell--9-col">

<div class="mdl-grid">
<?php

$cour=$db->query("SELECT * FROM forum_post ORDER by time DESC");

if (!$cour->num_rows)
{   
echo '<div class=opts>No posts</div>';
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
     
            $sname=$name->fetch_all(MYSQLI_ASSOC);
    
      foreach($sname as $sn)
            {
    echo " <div class=\"opts feed mdl-cell mdl-cell--4-col\">".getname($ath)." posted in <a href=show_and_create_post.php?cid=".$sn['course_id']."&fid=".$sn['forum_id']."> ".$sn['forum_name']."</a> <br><div class=ts>".date("F jS Y H:i:s", strtotime($row['time']))."</div><br><br> <b>$ttl</b><br><br> $bdy
  </div><br><br>";
       } 
}
?>
</div>
</div>

<div class="mdl-cell mdl-cell--3-col ">
<center class=opts>
 <h4> My Courses </h4>

  <?php
 
$cour=$db->query("SELECT * FROM CourseData WHERE STID=".$_SESSION['uname']."");

if (!$cour->num_rows)
{   
echo "No Course to show ";
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

    </div>
    </div>

    <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://dashboard-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


    </div>
  </main>
</div>

</body>
</html>

