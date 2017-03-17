
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
  <title>Show/Create Posts</title>
    </head>
  <body>
<?php include 'include.inc.php';?>

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

