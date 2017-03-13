
<?php

require 'connect.php';
require 'core.php';

//  user name and course id and forum id are inputs
/*  here first we show posts under a course 
    then if required postis not present then we give an option to create that post */
    $cr_id=$_GET['cid'];
    //$u_name=$_GET['uname'];
    $forum_id=$_GET['fid'];
    //echo $u_name;
  ?>
   

<!DOCTYPE html>
<html>
<head>
  <title>Posts | Discussion Forum</title>
  
<?php include 'include.inc.php';?>

    </head>

  <body >

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Posts</span>
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
    <nav class="mdl-navigation mdl-color--blue-grey-800 mdl-color-text--blue-white-20">
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

  <?php


    echo "<br><br><center class=opts id=frm><form method='POST' action='c_post.php?pauth=".$_SESSION['uname']."&cid=".$cr_id."&fid=".$forum_id."'>
                      <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
        <input name='post_title' class=\"mdl-textfield__input\" type=\"text\" id=\"sample3\">
        <label class=\"mdl-textfield__label\" for=\"sample3\">Title</label>
        </div>
        
        <br>

         <div class=\"mdl-textfield mdl-js-textfield\"> 
        <textarea name='post_body' class=\"mdl-textfield__input\"  rows= \"3\" id=\"sample5\"></textarea>
            <label class=\"mdl-textfield__label\" for=\"sample5\">Body</label>
          </div>

        <br><br>

        
        <input type='submit' value='Submit Reply' class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\"/>
     </form></center>";   


    echo '<center>
    <h4>Posts  under this topic for discussion are:</h4>
  </center>';
$sql = "SELECT
                    post_id,
                    post_author,
                    post_body,
                    post_title
                FROM
                    forum_post
                WHERE course_id=".$cr_id." AND forum_id=".$forum_id." ORDER BY time DESC ";
         
        $result = $db->query($sql);
        
    if (!$result->num_rows)
  {   
    echo '<center class=opts>No posts are created under this course</center>';
  }   


   else
    {
           
           // echo '1';
          $rows=$result->fetch_all(MYSQLI_ASSOC);
          

          foreach($rows as $row)
          {

//            $q="SELECT * FROM forum_post WHERE course_id=".$cr_id." && forum_id=".$forum_id." && post_id=".$row['post_id']." order by time ASC"; 
  //          $name=$db->query($q);

    //        $sname=$name->fetch_all(MYSQLI_ASSOC);
      //      foreach($sname as $name1)
        //    {
              //$studentname =$name['NAME']; 
            
//foreach($sname as $sn)
echo "<center class=opts>";
            echo "<h5>".$row['post_title']." posted by ".getname($row['post_author'])." </h5>";
                  echo "</br>";
                  
		  echo "</br>";
            echo $row['post_body'];
echo "</center><br><br>";
          //  }
              
          }

       }


    /* now we create option to start new discussion under this course*/
    //echo $u_name;



  


?>


</div></main></div>
</body>
</html>

