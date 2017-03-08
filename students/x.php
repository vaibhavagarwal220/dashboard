<?php


require 'connect.php' ;
require 'core.php' ;
//session_start();
 if(isset($_GET['q'])&&!empty($_GET['q']))
    {
      $cid=$_GET['q'];
      //echo $cid;
    }


?>   


<?php

             $cour=$db->query("SELECT ATTENDANCE,TOTAL_CLASSES,QUIZ1,QUIZ2,QUIZ3,avg(QUIZ1) as q1,avg(QUIZ2) as q2,avg(QUIZ3) as q3,max(QUIZ1) as m1,max(QUIZ2) as m2,max(QUIZ3) as m3 FROM CourseData WHERE STID=".$_SESSION["uname"]." && CID=".$cid." ");
             $cour1=$db->query("SELECT avg(QUIZ1) as q1,avg(QUIZ2) as q2,avg(QUIZ3) as q3,max(QUIZ1) as m1,max(QUIZ2) as m2,max(QUIZ3) as m3 FROM CourseData WHERE CID=".$cid." ");
            //echo $cid;
if (!$cour->num_rows)
{   
echo 'No Course to show ';
}         
          //$att=$db->result($cour,0,'ATTENDANCE');

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
?>

<!DOCTYPE html>
<html>
<head>
  <title>Course Details</title>
<?php include 'include.inc.php';?>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">

          // Load the Visualization API and the piechart package.
          google.load('visualization', '1.0', {'packages':['corechart']});

          // Set a callback to run when the Google Visualization API is loaded.
          google.setOnLoadCallback(drawChart);

          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Status');    
            data.addColumn('number', 'Number');
            

           data.addRows([ 
                ['Attended', <?php echo $att; ?>],
                ['Not Attended',<?php echo $atttotal-$att;?>]
                ]);

                        // Create the data table.
          
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

            

            // Set chart options
            var options = {'title':'Attendance Record',
                           'width':600,
                           'height':400};
            // Set chart options
           
            // Set chart options
            var options3 = {'title':'Marks Sheet',
                           'width':600,
                           'height':400};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            
            var chart3 =  new google.visualization.ColumnChart(document.getElementById('chart_div3'));
            chart3.draw(data3, options3);

          }
        </script>
    </head>


  <body>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title"><?php 

$query_res=$db->query("SELECT NAME from sem_courses where COURSE_ID=$cid" );
    $rows=$query_res->fetch_all(MYSQLI_ASSOC) ;

    foreach($rows as $row)
      {
        $nm=$row['NAME'] ;
        echo "$nm";
      }
      ?></span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
      <button id="demo-menu-lower-right"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">forum</i>
</button>

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="demo-menu-lower-right">
    <?php

$cour=$db->query("SELECT * FROM forum_post ORDER by time DESC");

if (!$cour->num_rows)
{   
echo 'No posts.';
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;

//  <a href=show_and_create_post.php?cid=".$cr_id."&fid=".$sn['forum_id']."&uname=".$u_name." > ".$sn['forum_name']."</a>

foreach($rows as $row)
{
  $ttl=$row['post_title'] ;
  $ath=$row['post_author'];
  $bdy=$row['post_body'] ;
  
  $fid=$row['forum_id'] ;


      $q="SELECT * FROM table_forum WHERE  forum_id=".$fid." "; 
            $name=$db->query($q);
    if(!$name->num_rows)
      echo 'query works';
            $sname=$name->fetch_all(MYSQLI_ASSOC);
           
    //echo '2';
    
      foreach($sname as $sn)
            {
    echo "<a href=show_and_create_post.php?cid=".$sn['course_id']."&fid=".$sn['forum_id']."><li class=\"mdl-menu__item\">".getname($ath)." posted in ".$sn['forum_name']."</li> </a>";
       } 
}
?>

 
</ul>
       <a class="mdl-navigation__link" href="logout.php"><i class="material-icons">launch</i> Log Out</a> 
       </nav>
    </div>  
     
      
  </header>
  <div class="mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
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

    </span>
    <nav class="mdl-navigation mdl-color--blue-grey-800 mdl-color-text--blue-white-20">
    <a class="mdl-navigation__link" href="studentt.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">dashboard</i> Dashboard </a>
    <a class="mdl-navigation__link" href="#" id=viewc> <i class="material-icons mdl-color-text--blue-grey-400 material-icons">class</i> Courses</a>
     <div id=showc> 
  <?php
  if(!loggedin()) header("Location:studentlogin.php");
$cour=$db->query("SELECT * FROM CourseData WHERE STID=".$_SESSION['uname']."");

if (!$cour->num_rows)
{   
echo "No Course to show ";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $cname=$row['Course Name'] ;
  $cid=$row['CID'];


  echo "     <a href=x.php?q=$cid class=\"mdl-navigation__link\">$cname
</a>";
}
  ?>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#showc').hide();
    count=0;
  });
  $('#viewc').click(function(){
    if(count%2==0) $('#showc').slideDown();
    else $('#showc').slideUp();
    count++;
  })
</script>


    <a class="mdl-navigation__link" href=adddrop.php ><i class="material-icons mdl-color-text--blue-grey-400 material-icons">iso</i> Add/Drop Courses</a>
        <a class="mdl-navigation__link" href="sedit.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">line_weight</i> Edit Info</a>
        <a class="mdl-navigation__link" href="cal.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">date_range</i> Calendar</a>
    <a class="mdl-navigation__link" href="timetable/index.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">list</i> Timetable</a>
    <a class="mdl-navigation__link" href="review.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">grade</i> Course Review</a>
    <a class="mdl-navigation__link"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">call</i> Contact</a>
    <a class="mdl-navigation__link" href="https://www.redbus.in/bus-tickets/mandi-himachal-pradesh-to-delhi.aspx"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">event_seat</i> Book Bus Tickets</a>
    <a class="mdl-navigation__link" href=depart.php><i class="material-icons mdl-color-text--blue-grey-400 material-icons">flight_takeoff</i> Student Departures</a>     
    <a class="mdl-navigation__link" href=planatrip.php><i class="material-icons mdl-color-text--blue-grey-400 material-icons">motorcycle</i> Plan A Trip</a>
    

    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
<br><br>


<div class=mdl-grid>
<div class="mdl-cell mdl-cell--8-col">
<br>
<div id="chart_div"></div>
        
        </div>


<div class="mdl-cell mdl-cell--4-col">


    <?php

$per=$db->query("SELECT * FROM Students WHERE ROLLNO=".$_SESSION["uname"]." ") ;
 
if (!$per->num_rows)
{   
die('Username and Password is incorrect ');
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}



$cour=$db->query("SELECT * FROM CourseData WHERE STID=".$_SESSION["uname"]." && CID=$cid ");

if (!$cour->num_rows)
{   
echo 'No Course to show ';
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;
  
echo "<div class=opts><center><h4>Announcements</h4>";

foreach($rows as $row)
{
    echo '<br>' ;
    echo $row['ANNCS'] ;
    }
echo "</center>
 </div>";
?>
<br><br>
<center>
<a href="show_and_create_topics.php?cid=<?php echo $cid?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Discussion Forum</a></center>

<br><br>

<div class="opts">
<center>
<?php
//$a=$_GET['cid'];
$thelist="";  
if ($handle = opendir('../Lectures/' .$cid. '/')) { //replace 111 by course ID variable
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
  $thelist .= "<li>$file<a href=../Lectures/$cid/$file> <i class=\"material-icons\">get_app</i> </a> </li>";
      }
    }
    closedir($handle);
  }
?>

<h4>List of files</h4>
<ul id=nost><?php echo $thelist; ?></ul>
</center>
</div>

 </div>


<div class="mdl-cell mdl-cell--8-col">


      <div id="chart_div3"></div>

      </div>


     </div>


    


</div>
  </main>
</div>
</body>
</html>

