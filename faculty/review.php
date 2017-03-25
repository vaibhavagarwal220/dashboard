<!doctype html>
<?php 
require 'core.php';
require 'connect.php';
if(!loggedinfac())
  {
    header('Location:facultylogin.php');
  }
      $cd=$_SESSION['unamefac'];
 

  
?>
  
<html>
  <head>
<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
  <title>Course Reviews</title>
</head>
  <body>

  <?php 
$title="Course Reviews";
  include 'include.inc.php';?>
  <style type="text/css">
       #content {width:100%;margin:auto;}
    .opt{background-color: white;display: inline-block;padding:10px;margin:4px;}
.align{
  vertical-align:-21%;font-size:16px;
}
form{width:200px;text-align:center;}

.rte{color:white;display:inline-block;padding:6px;border-radius:5px;}
.r5{background-color:#088712;}
.r4{background-color:#23ce30;}
.r3{background-color:#b29d13;}
.r2{background-color:#db700d;}
.r1{background-color:#e53a0b;}
.rshw{background-color:#FFD700; font-size:20px; }
.alig{
  vertical-align:-21%;font-size:20px;
}
h4{display: inline;}


  </style>

<?php

echo  "<br><br>";

  $cour=$db->query("SELECT * FROM creview where cid=".$_SESSION['unamefac']."");

echo "<h4>".getcrs($cd)."</h4>  ";

$cou=$db->query("SELECT round(avg(rating),2) as avgr FROM creview where cid=".$cd."");
$rowsr=$cou->fetch_all(MYSQLI_ASSOC) ;
if (!$cou->num_rows)
{}

else{foreach($rowsr as $row)
{
echo "&nbsp;&nbsp;&nbsp;<div class=\"rte rshw\" > <i class=\"material-icons alig\">grade</i> ".$row['avgr']."</div><br><br>";
}





$cour=$db->query("SELECT * FROM creview where cid=".$cd."");

if (!$cour->num_rows)
{   
echo "<br><div class=opts>No one has reviewed the course</div>";
}
else{

//if(!hasrev()) echo "HELLO";

  
$rows=$cour->fetch_all(MYSQLI_ASSOC) ;




foreach($rows as $row)
{
  $rating=$row['rating'] ;
  $descr=$row['descr'];


  if($rating==5)echo "<div class=opt><div class=\"rte r5\"> <i class=\"material-icons align\">grade</i> $rating </div>&nbsp;&nbsp;&nbsp;&nbsp;$descr</div> ";
  else if($rating==4)echo "<div class=opt> <div class=\"rte r4\"> <i class=\"material-icons align\">grade</i> $rating </div>&nbsp;&nbsp;&nbsp;&nbsp; $descr</div> ";
  else if($rating==3)echo "<div class=opt><div class=\"rte r3\"> <i class=\"material-icons align\">grade</i> $rating </div>&nbsp;&nbsp;&nbsp;&nbsp; $descr</div> ";
  else if($rating==2)echo "<div class=opt><div class=\"rte r2\"> <i class=\"material-icons align\">grade</i> $rating </div> &nbsp;&nbsp;&nbsp;&nbsp;$descr</div> ";
  else if($rating==1)echo "<div class=opt><div class=\"rte r1\"> <i class=\"material-icons align\">grade</i> $rating </div> &nbsp;&nbsp;&nbsp;&nbsp;$descr</div> ";
}
}

}
  ?>  

   <br><br>

<div id=content>
</div>
  </div></main></div>

</body>
</html>