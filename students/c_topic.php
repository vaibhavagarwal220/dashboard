<?php
require 'connect.php';
require 'core.php';




$forum_name=$_POST['forum_name'];
$forum_description=$_POST['forum_description'];
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
    		//redirect to back page

            echo 'topic added successfully';
         /* $rows=$result->fetch_all(MYSQLI_ASSOC);
          

          foreach($rows as $row)
          {

            $q="SELECT forum_id,forum_name , forum_description FROM table_forum WHERE course_id=".$row['course_id']." AND forum_id=".$row['forum_id']." "; 
            $name=$db->query($q);
            $sname=$name->fetch_all(MYSQLI_ASSOC);
           /* foreach($sname as $name)
            {
              $studentname =$name['NAME']; 
            }  */

/*
            echo "
            <td> <a href=show_and_create_post.php?cid=".$row['course_id']."&=fid".$row['forum_id'].">".$sname['forum_name']."</a></td>
            <td>".$row['STID']."</td>
            </tr>
              ";
          }
*/
       }

?>
