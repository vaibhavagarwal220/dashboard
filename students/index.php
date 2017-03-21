
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head> 
<body>
<?php


  require 'connect.php' ;
  require 'core.php' ;
  
  if(!loggedin())
  {
    header('Location:studentlogin.php');
  }
  $title="Home";
  include 'include.inc.php';

?>



<!-- Always shows a header, even in smaller screens. -->

<br>
<div class="mdl-grid">

<center class="mdl-grid opts feed">

<a class="ablock mdl-cell mdl-cell--3-col" title="Calendar" href="cal.php"><img src=assets/img/cal.png></a>
<a class="ablock mdl-cell mdl-cell--3-col" title=Timetable href="timetable.php"><img src=assets/img/ttbl.png></a>
<a class="ablock mdl-cell mdl-cell--3-col" title="Course Review" href="review.php"><img src=assets/img/rev.png></a>
<a class="ablock mdl-cell mdl-cell--3-col cont" title=Contact href=contacts.php><img src=assets/img/cont.ico></a>
<a class="ablock mdl-cell mdl-cell--3-col" title="Book Bus Tickets" href="https://www.redbus.in/bus-tickets/mandi-himachal-pradesh-to-delhi.aspx"><img src=assets/img/busicon.ico></a>
<a class="ablock mdl-cell mdl-cell--3-col" href=depart.php title="Student Departures"><img src=assets/img/depr.png></a>     
<a class="ablock mdl-cell mdl-cell--3-col" href=planatrip.php title="Plan A Trip"><img src=assets/img/trip.png></a>
<a class="ablock mdl-cell mdl-cell--3-col" href=adddrop.php title="Add/Drop Courses"><img src=assets/img/adrp.png></a>

</center>

<div class="mdl-cell mdl-cell--12-col"><br></div>
<div class="mdl-cell mdl-cell--8-col">

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
  $cd=$row['course_id'] ;

    if(hascrs($cd)){
      $q="SELECT * FROM table_forum WHERE  forum_id=".$fid." "; 
            $name=$db->query($q);
    
    if(!$name->num_rows)
     echo "";
            $sname=$name->fetch_all(MYSQLI_ASSOC);
    
      foreach($sname as $sn)
            {

    echo " <div class=\"opts feed mdl-cell mdl-cell--6-col\">".getposter($ath)." posted in <a href=show_and_create_post.php?cid=".$sn['course_id']."&fid=".$fid."> ".$sn['forum_name']."</a> <br><div class=ts>".date("F jS Y H:i:s", strtotime($row['time']))."</div><br><br> <b>$ttl</b><br><br> $bdy
  </div><br><br>";
       } 
     }
}
?>



<?php

$cour=$db->query("SELECT * FROM group_post ORDER by time DESC");

if (!$cour->num_rows)
{   
echo "<div class=\"opts feed\">No posts</div>";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;

//  <a href=show_and_create_post.php?cid=".$cr_id."&fid=".$sn['forum_id']."&uname=".$u_name." > ".$sn['forum_name']."</a>

foreach($rows as $row)
{
  $ttl=$row['post_img'] ;
  $ath=$row['post_author'];
  $bdy=$row['post_body'] ;
   $gid=$row['gid'] ;
   $id=$row['post_id'] ;

    if(ismember($_SESSION['uname'],$gid)){$topr="<div class=\"opts feed\">".getposte($ath)." posted in <a href=clubs.php?grp=".$gid.">".getgnameid($gid)."</a> <div class=ts>".date("F jS Y H:i:s", strtotime($row['time']))."</div><br>";
    
$pattern = '@(http(s)?://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
   $topr = $topr.preg_replace($pattern, '<a href="http$2://$3">$0</a>', $bdy)."<br>";

    echo $topr;if($ttl!="") echo "<a href=\"$ttl\" data-lightbox=\"image-$id\" data-title=\"".getposte($ath)." posted in <a href=clubs.php?grp=".$gid.">".getgnameid($gid)."</a><br><br>$bdy<br><br>\"><img src=$ttl class=feedimg></a>";
    echo "<br><br>
  </div><br><br>";}

}
?>

</div>

</div>

<div class="mdl-cell mdl-cell--4-col ">
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

