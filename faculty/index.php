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
<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
  <title>Faculty Access</title>
    </head>

  <body>
  <?php
  $title="Home"; 
  include 'include.inc.php';

  
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

<div class="mdl-grid opts">

<a class="ablock rbg mdl-cell mdl-cell--4-col" title="Calendar" href="cal.php"><i class="material-icons">date_range</i></a>
<a class="ablock pbg mdl-cell mdl-cell--4-col" title=Timetable href="timetable.php"><i class="material-icons">list</i></a>
<a class="ablock gbg mdl-cell mdl-cell--4-col" title="Course Review" href="review.php"><i class="material-icons">grade</i></a>
<a class="ablock pbg mdl-cell mdl-cell--4-col" title=Upload href="fupl.php?q=<?php echo $cid;?>"><i class="material-icons">unarchive</i></a>
<a class="ablock rbg mdl-cell mdl-cell--4-col" title="Student List" href="listst.php"><i class="material-icons">recent_actors</i></a>




</div>



<div class="mdl-grid">

<?php

$cour=$db->query("SELECT * FROM forum_post where course_id=".$_SESSION['unamefac']." ORDER by time DESC");

if (!$cour->num_rows)
{   
echo 'No posts';
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;

//  <a href=show_and_create_post.php?cid=".$cr_id."&fid=".$sn['forum_id']."&uname=".$u_name." > ".$sn['forum_name']."</a>

foreach($rows as $row)
{

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
    echo " <div class=\"opts feed mdl-cell mdl-cell--3-col\">".getname($ath)." <br> <a href=show_and_create_post.php?cid=".$sn['course_id']."&fid=".$sn['forum_id']."> ".$sn['forum_name']."</a> <br> ".nl2br($bdy)."
  </div><br><br>";
       } 
}
?>
    </div>





    <!-- Your content goes here -->



  
 </div>
  </main>
</div>

 </body>
</html>

