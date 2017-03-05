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
    $u_name=$_SESSION['unamefac'];
  ?>
   

<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <?php include 'include.inc.php';?>

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
      <a class="mdl-navigation__link" href="facultyy.php"><i class="material-icons">dashboard</i> Dashboard </a>
      <a class="mdl-navigation__link" href="editinfo.php"><i class="material-icons">line_weight</i> Edit Info</a>
      
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

