<!DOCTYPE html>
<?php

  require 'connect.php' ;
  require 'core.php' ;

if(!loggedinfac())
  {
    header('Location:facultylogin.php');
  }


   if(isset($_GET['sid'])&&!empty($_GET['sid']) && isset($_GET['cid']) && !empty($_GET['cid']))
    {
      $cid=$_GET['cid'];
      $sid=$_GET['sid'];
       //echo $cid;
    }



//echo $_POST['name'];
//echo "$_POST['uname']";


?>
<?php
if( isset($_POST['ann1']))
{

    if(!empty($_POST['ann1']))
  {

    
    $q2 ="UPDATE CourseData SET ANNCS='".$_POST['ann1']."'  WHERE STID=".$sid." && CID=".$cid." ";

    //echo $q;

     $db->query($q2);

    if($db->affected_rows > 0)
      echo '<center><h5>Sucessfully Updated the Announcements</center></h5>';


    else 
      echo "<center><h5> No update done </center></h5>" ;


    }
}
?>
<?php
if( isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3']))
{

    if(!empty($_POST['q1']) && !empty($_POST['q2']) && !empty($_POST['q3']) )
  {

    
    $q1 ="UPDATE CourseData SET QUIZ1=".$_POST['q1']." , QUIZ2=".$_POST['q2']." , QUIZ3=".$_POST['q3']."  WHERE STID=".$sid." && CID=".$cid." ";

    //echo $q;

     $db->query($q1);

    if($db->affected_rows > 0)
      echo '<center><h5>Sucessfully Updated the Quiz Marks</center></h5>';


    else 
      echo "<center><h5>No update done </center></h5>" ;
  }
}

?>

    <?php
    if( isset($_POST['ca']) && isset($_POST['ctotal']))
{

    if(!empty($_POST['ca']) && !empty($_POST['ctotal']) )
  {

    
    
    $q ="UPDATE CourseData SET TOTAL_CLASSES=".$_POST['ctotal']." , ATTENDANCE=".$_POST['ca']." WHERE STID=".$sid." && CID=".$cid." ";

    //echo $q;

     $db->query($q);

    if($db->affected_rows > 0)
      echo '<center><h5>Sucessfully Updated the Attendance</center></h5>';


    else 
      echo "<center><h5>No update done</center></h5>" ;
  }

  
  
}
    ?>



<html>
<head>
<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
  <title>Student Details</title>


    </head>
  <body>
<?php include 'include.php';?>


  <br><br>
<center class=opts id=frm>
  <h3>Edit News</h3>
  <?php  



   
   $studd=$db->query("SELECT * fROM CourseData WHERE CID=".$cid." && STID=".$sid." ");

  $rows=$studd->fetch_all(MYSQLI_ASSOC) ;


  foreach($rows as $row)
{
  echo"<form action=\"faculty3.php?sid=$sid&cid=$cid\" method=\"POST\">
  
    <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample3\" name=\"ann1\"  value=\"".$row['ANNCS']."\"  required>
    <label class=\"mdl-textfield__label\" for=\"sample3\">Announcement</label>
  </div>
    <br>

    <button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\" type=\"submit\">UPDATE</button>
  </form>
";
}
?>

<br>

</center>




      <!-- Your content goes here --></div>
    </section>
    <section class="mdl-layout__tab-panel" id="fixed-tab-2">
      <div class="page-content"><!-- Your content goes here -->
        




<br><br>
<center class=opts id=frm>

 <h3>Edit Quiz Marks</h3>
<?php

foreach($rows as $row)
{
  echo "<form action=\"faculty3.php?sid=$sid&cid=$cid\" method=\"POST\">

    <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample4\" name=\"q1\" value=\"".$row['QUIZ1']."\"  required>
    <label class=\"mdl-textfield__label\" for=\"sample4\">Quiz 1</label>
  </div>

    
    <br>

    <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample5\" name=\"q2\" value=\"".$row['QUIZ2']."\"  required>
    <label class=\"mdl-textfield__label\" for=\"sample5\">Quiz 2</label>
  </div>

    <br>


    <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample5\" name=\"q3\" value=\"".$row['QUIZ3']."\"  required>
    <label class=\"mdl-textfield__label\" for=\"sample5\">Quiz 3</label>
  </div>
<br>
    
    <br>
    <button  class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\" type=\"submit\">UPDATE</button>
    </form>
    ";
}

?>
</center>

    <br><br>








      </div>
    </section>
    <section class="mdl-layout__tab-panel" id="fixed-tab-3">
      <div class="page-content"><!-- Your content goes here -->
        
<br><br>
<center class=opts id=frm>

 <h3>Attendance</h3>
<?php

foreach($rows as $row)
{
  //echo $row['NAME'] ;
  echo "<form action=\"faculty3.php?sid=$sid&cid=$cid\" method=\"POST\">
        <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample6\" name=\"ca\" value=\"".$row['ATTENDANCE']."\"  required>
    <label class=\"mdl-textfield__label\" for=\"sample6\">Attended</label>
  </div>


    <br>

        <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
    <input class=\"mdl-textfield__input\" type=\"text\" id=\"sample7\" name=\"ctotal\"  value=\"".$row['TOTAL_CLASSES']."\"    required>
    <label class=\"mdl-textfield__label\" for=\"sample7\">Total Classes</label>
  </div>


    <br><br>
    <button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\" type=\"submit\">UPDATE</button>
    </form>
    ";
}
?>
</center>


      </div>
    </section>
  </main>
</div>




<br>


<br><br><br><br><br>
</body>
</html>