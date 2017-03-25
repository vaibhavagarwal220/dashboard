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
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
  <title>Course Reviews</title>


</head>
  <body>

  <?php 
$title="Course Reviews";
  include 'include.inc.php';?>
    <style type="text/css">
.rview{font-size:15px;color:black !important;background-color:white !important; }
  
</style>
  <style type="text/css">

       #content {width:100%;margin:auto;}
       .mdl-chip{margin:10px;}
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

if($cd==-1){
echo "<br><br><center class=opts>
<br>
 <h4>Courses </h4><br>";

$cour=$db->query("SELECT * FROM sem_courses");

if (!$cour->num_rows)
{   
//echo "No Course to show ";
}
?>
 <div class="mdl-textfield mdl-js-textfield">
    <input type=text class="mdl-textfield__input" id="sample9">
    <label class="mdl-textfield__label" for="sample9">Search</label>
  </div><br>

<?php
$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $cname=$row['NAME'] ;
  $cid=$row['COURSE_ID'];


  echo "<a href=review.php?q=$cid class=\"mdl-chip\"><span class=\"mdl-chip__text\">$cname</span>
</a> ";
}
echo "</center><br><br><br>";}

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

if(!hascrs($cd)) echo "<br><div class=opts>You are not enrolled in this course</div>";
else if (!$cour->num_rows) 
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
  min=1 max=5 value=1 tabindex=0 name=sld id=sld oninput="showVal(this.value)" onchange="showVal(this.value)"><br><div id=showv></div><br>
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
echo "<br><div class=opts>You have already reviewed this course</div><br>";
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
<script type="text/javascript">
$('#sample9').keyup(function(){
var txt = $('#sample9').val();
$('.mdl-chip').hide();
//$('.mdl-chip:contains("'+txt+'")').show();
//});
$('.mdl-chip').each(function(){
   if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
       $(this).show();
   }
});});
</script>
</body>
</html>