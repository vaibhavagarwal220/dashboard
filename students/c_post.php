<?php

require 'connect.php';
require 'core.php';


//$post_title=$_POST['post_title'];
//$post_body=$_POST['post_body'];
$cid=$_GET['cid'];
$post_author=$_SESSION['uname'];
$fiid=$_GET['fid'];
//$fid=$_
//echo $post_title;
//echo $post_body;




$sql = "INSERT INTO forum_post(
                    post_body,course_id,post_author,forum_id)
				VALUES('".$_POST['post_body']."',".$cid.",'".$post_author."',".$_GET['fid'].")
                ";
         
        $result = $db->query($sql);
        
    if ($result->num_rows)
  {   
    
    //echo ('NO topics are created under this course ');
  }   


   else
    {      
    		//redirect to back page
          header("Location:show_and_create_post.php?cid=$cid&fid=$fiid");
            //echo 'post submitted successfully';
        
       }

?>
