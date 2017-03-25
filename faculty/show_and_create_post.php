
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
<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
  <title>Show/Create Posts</title>
    </head>
  <body>
<?php 
  $title="Posts";
include 'include.inc.php';?>

  <?php


    echo "<br><br><center class=opts id=frm><form method='POST' action='c_post.php?cid=".$cr_id."&fid=".$forum_id."'>
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
                    post_body
                FROM
                    forum_post
                WHERE course_id=".$cr_id." AND forum_id=".$forum_id." ORDER BY time DESC ";
         
        $result = $db->query($sql);
        
    if (!$result->num_rows)
  {   
    echo '<center class=opts>No posts are created under this course </center>';
  }   


   else
    {
           
           // echo '1';
          $rows=$result->fetch_all(MYSQLI_ASSOC);
          

          foreach($rows as $row)
          {

echo "<center class=opts>";
            echo "<h4>".getname($row['post_author'])." </h4>";
                  echo $row['post_body']."</center><br>";
              
          }

       }


?>


</div></main></div>
</body>
</html>

