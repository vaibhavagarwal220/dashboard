
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
  <title>Course Details</title>

  
    </head>
  <body>
<?php


require 'connect.php' ;
require 'core.php' ;

if(!loggedin()) 
  header("Location:studentlogin.php");
$title="";

  if(@iscrs($_GET['q'])) $title=@getcrscde($_GET['q']);

  include 'include.inc.php';
 if(isset($_GET['q'])&&!empty($_GET['q'])&&iscrs($_GET['q']))
    {
      $cid=$_GET['q'];

$cour=$db->query("SELECT ATTENDANCE,TOTAL_CLASSES,QUIZ1,QUIZ2,QUIZ3,avg(QUIZ1) as q1,avg(QUIZ2) as q2,avg(QUIZ3) as q3,max(QUIZ1) as m1,max(QUIZ2) as m2,max(QUIZ3) as m3 FROM CourseData WHERE STID=".$_SESSION["uname"]." && CID=".$cid." ");
$cour1=$db->query("SELECT avg(QUIZ1) as q1,avg(QUIZ2) as q2,avg(QUIZ3) as q3,max(QUIZ1) as m1,max(QUIZ2) as m2,max(QUIZ3) as m3 FROM CourseData WHERE CID=".$cid." ");
      if (!$cour->num_rows)
      {   
      echo '<div class=opts>Not enrolled in this course</div>';
      }         
    else{
      $rows=$cour->fetch_all(MYSQLI_ASSOC);
          $rows1=$cour1->fetch_all(MYSQLI_ASSOC);
          foreach($rows as $row)
            {
            $att= $row['ATTENDANCE'] ;
            $atttotal= $row['TOTAL_CLASSES'];
            $q1= $row['QUIZ1'] ;
            $q2= $row['QUIZ2'];
            $q3= $row['QUIZ3'] ;
            }

         foreach($rows1 as $row1)
           {
          $a1= $row1['q1'] ;
          $a2= $row1['q2'];
          $a3= $row1['q3'] ;
          $m1= $row1['m1'] ;
          $m2= $row1['m2'];
          $m3= $row1['m3'] ;
            }
    }
?>
  <style type="text/css">
  .crss{font-size:15px;color:black !important;background-color:white !important; }
  
</style>

  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">

          google.load('visualization', '1.0', {'packages':['corechart']});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Status');    
            data.addColumn('number', 'Number');
           data.addRows([ 
                ['Attended', <?php echo $att; ?>],
                ['Not Attended',<?php echo $atttotal-$att;?>]
                ]);

            var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'Quiz');
            data3.addColumn('number', 'Highest');
            data3.addColumn('number', 'Average');
            data3.addColumn('number', 'User Marks');
            
            data3.addRows([
              ['Quiz 1', <?php echo $m1; ?>,<?php echo $a1; ?>,<?php echo $q1; ?>],
              ['Quiz 2', <?php echo $m2; ?>,<?php echo $a2; ?>,<?php echo $q2; ?>],
              ['Quiz 3', <?php echo $m3; ?>,<?php echo $a3; ?>,<?php echo $q3; ?>],
            ]);
            var options = {'title':'Attendance Record',
                           'width':600,
                           'height':400};
            var options3 = {'title':'Marks Sheet',
                           'width':600,
                           'height':400};

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            var chart3 =  new google.visualization.ColumnChart(document.getElementById('chart_div3'));
            chart3.draw(data3, options3);

          }
        </script>
        <style type="text/css">
          #chart_div{width:100%;height:45%;zoom:0.9;}
          #chart_div3{width:100%;height:45%;zoom:0.9;}
          .lects{margin:auto;overflow:auto;height:200px;}
           .lect{margin:auto;overflow:auto;height:220px;line-height:1.7em;}
        </style>

<div class=mdl-grid>
<div class="mdl-cell mdl-cell--7-col">
<br>
<div id="chart_div" ></div>
<br><br>
<div id="chart_div3"></div>        
        </div>


<div class="mdl-cell mdl-cell--5-col">
    <?php
$cour=$db->query("SELECT * FROM CourseData WHERE STID=".$_SESSION["uname"]." && CID=$cid ");

if (!$cour->num_rows)
{   
die('</div></div><center class=opts>Not enrolled in this course</center>');
}

else{
  $rows=$cour->fetch_all(MYSQLI_ASSOC) ;
  
echo "<center class=\"opts mdl-shadow--6dp\"><h4>Announcements</h4>";

    foreach($rows as $row)
    
      echo "<div class=lect>".$row['ANNCS']. "</div>";
    
echo "</center>";

}
?>
<br><br>
<center>
<a href="show_and_create_topics.php?cid=<?php echo $cid?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Discussion Forum</a></center>

<br><br>


<?php

//$a=$_GET['cid'];
$thelist="";  
if ($handle = opendir("../Lectures/".$cid."/")) 
{ 
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
  $thelist .= "<a class=\"mdl-chip\" href=../Lectures/$cid/$file  target=_blank>
    <span class=\"mdl-chip__text\">$file</span>
    <button type=\"button\" class=\"mdl-chip__action\"><i class=\"material-icons\">get_app</i></button></a><br><br>";
      }
    }
    closedir($handle);
  }
?>
<center class="opts mdl-shadow--6dp">
<h4>List of files</h4>
<div class=lects>
<ul id=nost><?php echo $thelist; ?></ul></div>
</center>
 </div>
     </div>

<?php
 
}
else {
  die('<br><br><center class=opts>No such course in our records</center>'); }?>

</div>
  </main>
</div>
</body>
</html>

