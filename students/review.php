<!doctype html>
<?php 
require 'core.php';
require 'connect.php';
if(!loggedin())
  {
    header('Location:studentlogin.php');
  }
      $cd=-1;
  if(isset($_GET['q'])&&!empty($_GET['q'])) $cd=$_GET['q'];

if(isset($_POST['descri'])&&isset($_POST['sld']))
{
 if(!empty($_POST['descri'])&&!empty($_POST['sld'])) 
    {


      $cour=$db->query("SELECT * FROM creview where ROLLNO=".$_SESSION['uname']." && cid=".$cd."");
      if (!$cour->num_rows){
      $dsc=$_POST['descri'];
      $slid=$_POST['sld'];

      $sqquer="INSERT INTO `creview` (`id`, `ROLLNO`, `cid`, `rating`, `descr`, `time`) VALUES (NULL, ".$_SESSION['uname'].", ".$cd.", ".$slid.", '".$dsc."', CURRENT_TIMESTAMP)";
      $db->query($sqquer);
    }
    }
}

  
?>
  
<html>
  <head>
  <title>Course Reviews</title>
<?php include 'include.inc.php';?>
  <style type="text/css">
       #content {width:100%;margin:auto;}

         </style>
       


  </head>
  <body>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Course Reviews</span>
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
     <!-- Right aligned menu below button -->
 
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
    <nav class="mdl-navigation mdl-color--blue-grey-800 mdl-color-text--blue-white-20" id=menuw>
    <a class="mdl-navigation__link" href="index.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">dashboard</i> Dashboard </a>
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
    <a class="mdl-navigation__link" href="timetable.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">list</i> Timetable</a>
    <a class="mdl-navigation__link" href="review.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">grade</i> Course Review</a>
    <a class="mdl-navigation__link" href="contacts.php"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">call</i> Contact</a>
    <a class="mdl-navigation__link" href="https://www.redbus.in/bus-tickets/mandi-himachal-pradesh-to-delhi.aspx"><i class="material-icons mdl-color-text--blue-grey-400 material-icons">event_seat</i> Book Bus Tickets</a>
    <a class="mdl-navigation__link" href=depart.php><i class="material-icons mdl-color-text--blue-grey-400 material-icons">flight_takeoff</i> Student Departures</a>     
    <a class="mdl-navigation__link" href=planatrip.php><i class="material-icons mdl-color-text--blue-grey-400 material-icons">motorcycle</i> Plan A Trip</a>
    

    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
    <style>
    .opt{background-color: white;display: inline-block;padding:10px;}
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

if($cd==-1){
echo "<br><br><center class=opts>
<br><br>
 <h4> My Courses </h4><br><br><br>";

$cour=$db->query("SELECT * FROM sem_courses");

if (!$cour->num_rows)
{   
//echo "No Course to show ";
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $cname=$row['NAME'] ;
  $cid=$row['COURSE_ID'];


  echo "<a href=review.php?q=$cid class=\"mdl-chip\"><span class=\"mdl-chip__text\">$cname</span>
</a> ";
}
echo "</center>";}

else {
echo  "<br><br>";

  $cour=$db->query("SELECT * FROM creview where ROLLNO=".$_SESSION['uname']." && cid=".$cd."");

echo "<h4>".getcrs($cd)."</h4>  ";

$cou=$db->query("SELECT round(avg(rating),2) as avgr FROM creview where cid=".$cd."");
$rowsr=$cou->fetch_all(MYSQLI_ASSOC) ;
if (!$cou->num_rows)
{}

else{foreach($rowsr as $row)
{
echo "&nbsp;&nbsp;&nbsp;<div class=\"rte rshw\" > <i class=\"material-icons alig\">grade</i> ".$row['avgr']."</div>";
}
}

if (!$cour->num_rows)
{   

?>
&nbsp;&nbsp;&nbsp;
<button class="mdl-js-ripple-effect mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored" id="show-dialog" title="Review this Course">
  <i class="material-icons">add</i>
</button>

  <dialog class="mdl-dialog">
    <h4 class="mdl-dialog__title">Add review</h4>
    <div class="mdl-dialog__content">
      <p>
       <form action=review.php?q=<?php echo $cd;?> method=POST class=opts>
    <div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" rows= "2" id="sample5" name=descri ></textarea>
    <label class="mdl-textfield__label" for="sample5">Type your review..</label>
  </div><br>
  <input class="mdl-slider mdl-js-slider" type=range 
  min=1 max=5 value=1 tabindex=0 name=sld id=sld oninput="showVal(this.value)" onchange="showVal(this.value)"><div id=showv></div><br>
  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type=submit>
  SUBMIT
</button>   
  </form>
      </p>
    </div>
    <div class="mdl-dialog__actions">
      <button type="button" class="mdl-button close">CANCEL</button>
    </div>
  </dialog>
  <script>
    var dialog = document.querySelector('dialog');
    var showDialogButton = document.querySelector('#show-dialog');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    showDialogButton.addEventListener('click', function() {
      dialog.showModal();
    });
    dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  </script>

  
  <br><br>
 
  
  <script type="text/javascript">
    $(document).ready(function(){

    showVal(document.getElementById("sld").value);

    });

    function showVal(newVal){
  document.getElementById("showv").innerHTML="<div class=\"rte r"+newVal+"\"> <i class=\"material-icons align\">grade</i>" + newVal + "</div>" ;
}

  </script>

<?php  //echo 'Permission granted Enjoy due '  //print_r($per);}
}
else 
{
echo "<br><br><div class=opts>You have already reviewed this course</div><br><br>";
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
}}

}
  ?>  

   <br><br>

<div id=content>
</div>
  </div></main></div>

</body>
</html>