<?php

require 'connect.php';
require 'core.php';

//  user name and course id are inputs
/*  here first we show topics under a course each having a link which shows posts in that topic
    then if required topic is not present then we give an option to create that topic */
    $cr_id=$_GET['cid'];
    //echo $cr_id;
    /*if(loggedin())
    {
      $u_name=$_SESSION['uname'];
    }

    else if(loggedinfac())
    {
      $u_name=$_SESSION['unamefac'];
    }
    */
    $u_name=$_SESSION['uname'];
  ?>
   

<!DOCTYPE html>
<html>
<head>
  <title>Topics | Discussion Forum</title>
  <?php include 'include.inc.php';?>

  <body >
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Topics</span>
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
    <a class="mdl-navigation__link" href="studentt.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">dashboard</i> Dashboard </a>
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
    <a class="mdl-navigation__link"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">call</i> Contact</a>
    <a class="mdl-navigation__link" href="https://www.redbus.in/bus-tickets/mandi-himachal-pradesh-to-delhi.aspx"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">event_seat</i> Book Bus Tickets</a>
    <a class="mdl-navigation__link" href=depart.php><i class="material-icons mdl-color-text--blue-grey-400 material-icons">flight_takeoff</i> Student Departures</a>     
    <a class="mdl-navigation__link" href=planatrip.php><i class="material-icons mdl-color-text--blue-grey-400 material-icons">motorcycle</i> Plan A Trip</a>
    

    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
     <?php
        echo "<br><br><center class=opts id=frm><form method='POST' action='c_topic.php?uname=".$u_name."&cid=".$cr_id."'>
        
         

    

        <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
        <input name='forum_name' class=\"mdl-textfield__input\" type=\"text\" id=\"sample3\">
        <label class=\"mdl-textfield__label\" for=\"sample3\">Topic</label>
        </div>
        
        <br>

         <div class=\"mdl-textfield mdl-js-textfield\"> 
        <textarea name='forum_description' class=\"mdl-textfield__input\"  rows= \"3\" id=\"sample5\"></textarea>
            <label class=\"mdl-textfield__label\" for=\"sample5\">Description</label>
          </div>

        <br><br>

        
        <input type='submit' value='Create Topic' class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\"/>
     </form></center>";   





    echo '<center>
    <h4>Created topics under this course for discussion are:</h4>
  
  </center>';
/*if($_SESSION['signed_in'] == false)
{
    //the user is not signed in
    echo "Sorry, you have to be signed in to create a topic or participate in discussion";
}

else
{*/
	$sql = "SELECT
                    forum_id,
                    forum_name,
                    forum_description
                FROM
                    table_forum
                WHERE course_id=".$cr_id."";
         
        $result = $db->query($sql);
        
    if (!$result->num_rows)
  {   
    echo ('No topics are created under this course ');
  }   


   else
    {
           
           // echo '1';
          $rows=$result->fetch_all(MYSQLI_ASSOC);
          

          foreach($rows as $row)
          {

            $q="SELECT * FROM table_forum WHERE  forum_id=".$row['forum_id']." "; 
            $name=$db->query($q);
		if(!$name->num_rows)
			echo 'query works';
            $sname=$name->fetch_all(MYSQLI_ASSOC);
           
		//echo '2';
		
	    foreach($sname as $sn)
            {
		echo "<center> <a href=show_and_create_post.php?cid=".$cr_id."&fid=".$sn['forum_id']." > ".$sn['forum_name']."</a></center>";
		echo "</br>";
	     }
          }


       }


    /* now we create option to start new discussion under this course......<td>".$row['STID']."</td>
            </tr>*/
//$uname="atharva";    
//echo $u_name;

?>


<br><br><br><br><br></div></main></div>
</body>
</html>

