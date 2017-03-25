
<!DOCTYPE html>
<html>
<head>

<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>

</head>
                    <!--===========================FreiChat=======START=========================-->
<!--  For uninstalling ME , first remove/comment all FreiChat related code i.e below code
   Then remove FreiChat tables frei_session & frei_chat if necessary
         The best/recommended way is using the module for installation                         -->

<?php

  require 'connect.php' ;
  require 'core.php' ;
  
  if(!loggedin())
  {
    header('Location:studentlogin.php');
  }


if(loggedin())
{ 
    $ses = $_SESSION['uname']; //tell freichat the userid of the current user
    setcookie("freichat_user", "LOGGED_IN", time()+3600, "/"); // *do not change -> freichat code
}
else {
    $ses = null; //tell freichat that the current user is a guest
    setcookie("freichat_user", null, time()+3600, "/"); // *do not change -> freichat code
} 
if(!function_exists("freichatx_get_hash")){
function freichatx_get_hash($ses){
       if(is_file("C:/xamp/htdocs/projects/dash/students/freichat/hardcode.php")){
               require "C:/xamp/htdocs/projects/dash/students/freichat/hardcode.php";
               $temp_id =  $ses . $uid;
               return md5($temp_id);
       }
       else
       {
               echo "<script>alert('module freichatx says: hardcode.php file not
found!');</script>";
       }
       return 0;
}
}
?>
<script type="text/javascript" language="javascipt" src="http://localhost/projects/dash/students/freichat/client/main.php?id=<?php echo $ses;?>&xhash=<?php echo freichatx_get_hash($ses); ?>"></script>
  <link rel="stylesheet" href="http://localhost/projects/dash/students/freichat/client/jquery/freichat_themes/freichatcss.php" type="text/css">


<body>
<script src="assets/js/jquery.min.js"></script>
<style type="text/css">
  #loading{
    position: absolute; width: 100%; height: 100%; background: url('../assets/img/loading.gif') no-repeat center center;}
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $('#loading').hide();
});
</script>
<div id="loading"></div>


<?php


  $title="Home";
  include 'include.inc.php';

?>

<style type="text/css">
  .dashb{font-size:15px;color:black !important;background-color:white !important; }
  
</style>



<!-- Always shows a header, even in smaller screens. -->

<br>
<div class="mdl-grid">

<center class="mdl-grid opts feed">

<a class="ablock mdl-cell mdl-cell--3-col" title="Calendar" href="cal.php"><img src=assets/img/cal.png></a>
<a class="ablock mdl-cell mdl-cell--3-col" title=Timetable href="timetable.php"><img src=assets/img/ttbl.png></a>
<a class="ablock mdl-cell mdl-cell--3-col" title="Course Review" href="review.php"><img src=assets/img/rev.png></a>
<a class="ablock mdl-cell mdl-cell--3-col cont" title=Contact href=contacts.php><img src=assets/img/cont.ico></a>
<a class="ablock mdl-cell mdl-cell--3-col" title="Book Bus Tickets" target=_blank href="https://www.redbus.in/bus-tickets/mandi-himachal-pradesh-to-delhi.aspx"><img src=assets/img/busicon.ico></a>
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

    echo " <div class=\"opts feed mdl-cell mdl-cell--6-col mdl-shadow--6dp\">".getposter($ath)." posted in  <b>".getcrs($cd)."</b><br><div class=ts>".date("F jS Y H:i:s", strtotime($row['time']))."</div><br><br> <a href=show_and_create_post.php?cid=".$sn['course_id']."&fid=".$fid."> ".$sn['forum_name']."</a><br><br> $bdy
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

    if(ismember($_SESSION['uname'],$gid)){$topr="<div class=\"opts feedgr mdl-shadow--6dp\">".getposte($ath)." posted in <a href=clubs.php?grp=".$gid.">".getgnameid($gid)."</a> <div class=ts>".date("F jS Y H:i:s", strtotime($row['time']))."</div><br>";
    
$pattern = '@(http(s)?://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
   $topr = $topr.preg_replace($pattern, '<a href="http$2://$3" target=_blank>$0</a>', $bdy)."<br>";

    echo $topr;if($ttl!="") echo "<a href=\"$ttl\" data-lightbox=\"image-$id\" data-title=\"".getposte($ath)." posted in <a href=clubs.php?grp=".$gid.">".getgnameid($gid)."</a><br><br>$bdy<br><br>\"><img src=$ttl class=feedimg></a>";
    echo "<br><br>
  </div>";}

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
<br><br><br><br>
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

