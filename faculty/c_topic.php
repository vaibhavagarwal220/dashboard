<?php
require 'connect.php';
require 'core.php';




$forum_name=$_POST['forum_name'];
$cid=$_GET['cid'];

$sql = "INSERT INTO table_forum(forum_name,course_id)
				VALUES('".$forum_name."',".$cid.")
                ";
         
        $result = $db->query($sql);
        
    if (!$result->num_rows)
  {   
     
    header("Location:show_and_create_topics.php?cid=$cid");
    
  }   


   else
    {      

            echo 'Topic added successfully';
       }

?>
