<!DOCTYPE html>
<html>
<head>
<title>Student Departures</title>
</head>
<?php
  require 'connect.php' ;
  require 'core.php' ;
  
  if(!loggedin())
  {
    header('Location:studentlogin.php');
  }

$title="Student Departures";
include 'include.inc.php';?>

  <?php
  if(!loggedin()) header("Location:studentlogin.php");
$cour=$db->query("SELECT * FROM trips ORDER by doj DESC");
$fu=1;$fp=1;$ft=1;
if (!$cour->num_rows)
{   
echo "<br><br><center class=opts>No trips to show</center>";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $rno=$row['ROLLNO'] ;
  $dst=$row['dest'];
  $doj=$row['doj'];
  if($rno==$_SESSION['uname'] && tmppf($doj)>=0) $rep="You are";
  else if($rno==$_SESSION['uname']) $rep="You";
  else if(tmppf($doj)>=0) $rep=getname($rno)." is";
  else $rep=getname($rno);  
  

    if(tmppf($doj)==1&&$fu) {echo "<h4>Upcoming</h4><br>";$fu=0;}
    if(tmppf($doj)==0&&$ft) {echo "<h4>Today</h4><br>";$ft=0;}
    if(tmppf($doj)==-1&&$fp) {echo "<h4>Past</h4><br>";$fp=0;}

    if(tmppf($doj)==1) {$doj=date('F jS Y',strtotime($doj));echo "<div class=\"opts fut\">".$rep." going from <b>Mandi</b> to <b>$dst</b> on $doj </div> <br>";}
    else if(tmppf($doj)==0){$doj=date('F jS Y',strtotime($doj));echo "<div class=\"opts tod\">".$rep." going from <b>Mandi</b> to <b>$dst</b> on $doj </div> <br>";}
    else {$doj=date('F jS Y',strtotime($doj));echo "<div class=\"opts past\">".$rep." went to <b>$dst</b> on $doj </div> <br>";}
}
  ?>








    </div>
  </main>
</div>

</body>
</html>

