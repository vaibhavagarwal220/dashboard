<?php

require 'connect.php';
require 'core.php';

    $cr_id=$_GET['cid'];
    
    $u_name=$_SESSION['uname'];
  ?>
   

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
  <title>Topics</title>
  <body>
    <?php 
  $title="Topics";
  include 'include.inc.php';?>
     <?php
        echo "<br><br><center class=\"opts posme\"><form method='POST' action='c_topic.php?cid=".$cr_id."'>
        
         

    

        <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
        <input name='forum_name' class=\"mdl-textfield__input\" type=\"text\" id=\"sample3\" required>
        <label class=\"mdl-textfield__label\" for=\"sample3\">Topic</label>
        </div>
        
        <br>
<br>

        
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
                    forum_name
                FROM
                    table_forum
                WHERE course_id=".$cr_id."";
         
        $result = $db->query($sql);
        
    if (!$result->num_rows)
  {   
    echo '<center class=opts>No topics are created under this course</center>';
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
		echo "<center>"; 
	    foreach($sname as $sn)
            {
		echo "<a  class=\"mdl-chip\" href=show_and_create_post.php?cid=".$cr_id."&fid=".$sn['forum_id']."><span class=\"mdl-chip__text\">".$sn['forum_name']."</span></a>";
		
	     }
      echo "</center>"; 
          }
       }

?>


<br><br></div></main></div>
</body>
</html>

