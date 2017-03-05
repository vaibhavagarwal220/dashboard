   <?php


  require 'connect.php' ;
  require 'core.php' ;
  
  if(!loggedin())
  {
    header('Location:studentlogin.php');
  }

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

    $query_res=$db->query("SELECT NAME from students where ROLLNO='".@$_SESSION['uname']."' ");
    $rows=$query_res->fetch_all(MYSQLI_ASSOC) ;

    foreach($rows as $row)
      {
        $nm=$row['NAME'] ;
        echo $nm;
      }

    ?></span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="studentt.php"><i class="material-icons">dashboard</i> Dashboard </a>
      <a class="mdl-navigation__link" href="sedit.php"><i class="material-icons">line_weight</i> Edit Info</a>
      </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">


  <?php
  if(!loggedin()) header("Location:studentlogin.php");
$cour=$db->query("SELECT * FROM trips ORDER by doj DESC");
$fu=1;$fp=1;$ft=1;
if (!$cour->num_rows)
{   
die('No trips to show ');
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

