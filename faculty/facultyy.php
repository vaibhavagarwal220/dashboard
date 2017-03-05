<?php


  require 'connect.php' ;
  require 'core.php' ;

if(!loggedinfac())
  {
    header('Location:facultylogin.php');
  }
?>


<!DOCTYPE html>
<html>
<head>
  <title>Faculty Access</title>
  <?php include 'include.inc.php';?>



    </head>

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
        $q="SELECT * FROM PROF WHERE TEACHER_ID=".$_SESSION['unamefac']."";
        $x=$db->query($q);
        $y=$x->fetch_all(MYSQLI_ASSOC);
        foreach($y as $row)
        {
          $n=$row['NAME'];
        }

      echo $n;

      ?></span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="#"><i class="material-icons">dashboard</i> Dashboard</a>
      <a class="mdl-navigation__link" href="editinfo.php"><i class="material-icons">line_weight</i> Edit Info</a>
    

    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content"><!-- Your content goes here -->
      

     <?php

  if(!loggedinfac()) header("Location:facultylogin.php");

$cour=$db->query("SELECT * FROM SEM_COURSES WHERE COURSE_ID= ".$_SESSION['unamefac']."");

if (!$cour->num_rows)
{ 

echo 'No Course to show';
//echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{

  $cname=$row['NAME'] ;
  $cid=$row['COURSE_ID'];
  echo "<br><center><a class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\" href=\"show_and_create_topics.php?cid=".$cid."\">$cname DISCUSSION FORUM</a></center><br>";      
}
?>





<div class="mdl-grid">
<div class="mdl-cell mdl-cell--8-col">

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
    echo " <div class=\"opts feed\">".getname($ath)." posted in <a href=show_and_create_post.php?cid=".$sn['course_id']."&fid=".$sn['forum_id']."> ".$sn['forum_name']."</a> <br><br><br> <b>$ttl</b><br><br> $bdy
  </div><br><br>";
       } 
}
?>

</div>

<div class="mdl-cell mdl-cell--4-col ">

<div class="mdl-grid opts">

<a class="ablock rbg mdl-cell mdl-cell--4-col" title="Calendar" href="cal.php"><i class="material-icons">date_range</i></a>
<a class="ablock pbg mdl-cell mdl-cell--4-col" title=Timetable><i class="material-icons">list</i></a>
<a class="ablock gbg mdl-cell mdl-cell--4-col" title="Course Review" href="review.php"><i class="material-icons">grade</i></a>
<a class="ablock bbg mdl-cell mdl-cell--4-col" title=Contact><i class="material-icons">call</i></a>
<a class="ablock pbg mdl-cell mdl-cell--4-col" title=Upload href="fupl.php?q=<?php echo $cid;?>"><i class="material-icons">unarchive</i></a>
<a class="ablock rbg mdl-cell mdl-cell--4-col" title="Student List" href="listst.php"><i class="material-icons">recent_actors</i></a>




</div>





    </div>

    </div>





    <!-- Your content goes here -->



  
 </div>
  </main>
</div>

 </body>
</html>

