
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

    $query_res=$db->query("SELECT NAME from prof where TEACHER_ID='".@$_SESSION['unamefac']."' ");
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


    echo "<br><br><center class=opts id=frm><form method='POST' action='c_post.php?cid=".$cr_id."&fid=".$forum_id."'>
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
    <h4>Posts  under this topic for discussion are:</h5>
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
    echo ('No posts are created under this course ');
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
            echo "<h4>posted by:  ".$row['post_author']." </h4>";
                  echo "</br>";
                  echo $row['post_title'];
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

