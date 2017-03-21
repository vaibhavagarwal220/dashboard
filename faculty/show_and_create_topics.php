<?php

require 'connect.php';
require 'core.php';

    $cr_id=$_GET['cid'];
    $u_name=$_SESSION['unamefac'];
  ?>
   

<!DOCTYPE html>
<html>
<head>
  <title>Show/Create Topics</title>
  

  <body>
<?php 
  $title="Topics";

include 'include.inc.php';



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

