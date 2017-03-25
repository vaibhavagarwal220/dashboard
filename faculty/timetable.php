<!doctype html>
<?php 
require 'core.php';
require 'connect.php';
if(!loggedinfac())
  {
    header('Location:facultylogin.php');
  }
//I4=H4
//I3=H3
$time = array
  (
  "","8:00-9:00 AM","9:00-10:00 AM","10:00-11:00 AM","11:00-12:00 PM","12:00-1:00PM","1:00-2:00 PM","2:00-3:00 PM","3:00-4:00 PM","4:00-5:00 PM","5:00-6:00 PM","6:00-7:00 PM"
  );
 $days =array( "Monday","Tuesday","Wednesday","Thursday","Friday");
$ftime = array
  (
  array("<div class=\"A3 A4\"></div>","<div class=\"B3 B4\"></div>","<div class=\"C3 C4\"></div>","<div class=\"D3 D4\"></div>","L","<div class=\"G3 G4\"></div>","<div class=\"I3 I4\"></div><div class=\"L1\"></div>","<div class=\"L1\"></div>","<div class=\"L1\"></div>","",""),
  
  array("<div class=\"E3 E4\"></div>","<div class=\"F3 F4\"></div>","<div class=\"G3 G4\"></div>","<div class=\"I3 I4\"></div>","U","<div class=\"A4\"></div>","<div class=\"L2\"></div><div class=\"C4\"></div>","<div class=\"L2 \"></div>","<div class=\"L2\"></div>","",""),
  
  array("<div class=\"B3 B4\"></div>","<div class=\"C3 C4\"></div>","<div class=\"D3 D4\"></div>","<div class=\"A3 A4\"></div>","N","<div class=\"F3 F4\"></div>","<div class=\"L3\"></div><div class=\"G4\"></div>","<div class=\"L3\"></div><div class=\"E4\"></div>","<div class=\"L3\"></div><div class=\"I4\"></div>","",""),

  array("<div class=\"F3 F4\"></div>","<div class=\"E3 E4\"></div>","<div class=\"I3 I4\"></div>","<div class=\"G3 G4\"></div>","C","<div class=\"D4\"></div>","<div class=\"L4\"></div><div class=\"B4\"></div>","<div class=\"L4\"></div>","<div class=\"L4\"></div>","","") ,

  array("<div class=\"C3 C4\"></div>","<div class=\"D3 D4\"></div>","<div class=\"A3 A4\"></div>","<div class=\"B3 B4\"></div>","H","<div class=\"E3 E4\"></div>","<div class=\"F4\"></div><div class=\"L5\"></div>","<div class=\"L5\"></div>","<div class=\"L5\"></div>","","")
  );?>
	
<html>
  <head>
  <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
  <title>Timetable</title>       
  </head>
  <body>
  <?php 
  $title="Timetable";
  include 'include.inc.php';?>
  <style type="text/css">
       .tt{margin:auto;overflow:auto;}
      
         </style>
  	<br><br>
  	<?php

 echo "<div class=tt><table class=\"mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--6dp\"><tr>";  
  for($i=0;$i<10;$i++)
    echo "<th class=\"mdl-data-table__cell--non-numeric\">".$time[$i]."</th>";
   echo "</tr>";

  for($i=0;$i<5;$i++)
    { echo "<tr><th class=\"mdl-data-table__cell--non-numeric\">".$days[$i]."</th>";
      for($j=0;$j<9;$j++){
        echo "<td class=\"mdl-data-table__cell--non-numeric\"  >".$ftime[$i][$j]."</td>";
      }
    echo "</tr>";
      
      }echo "</table></div>";
?>
<br><br>

<br><br>
<b><i>Note:</i></b><ol>
<li>Slots A3, B3, C3 and D3 are for 3 credit courses that can be used for core subjects.</li>
<li>Slots A4, B4, C4, D4, E4, F4, G4 and I4 are for 4 credit elective courses, (used for core if needed).</li>
<li>L1, L2, L3, L4, L5, L6, L7, L8, and L9 are the lab slots.</li>
<li>CS303 Software Engineering will be conducted from 2pm to 5 pm on Thursday in A5-3 (Conference room).</li>
<li>CS207 has 1 hour of lecture and will be conducted in slot D4 (Thursday)</li> 
<li>The classes for I Semester- M.Tech. (Mechanical /Energy) 2016 Batch will be held in North Campus Room B22-1 (Hostel Building).
</li>
<li>The classes for EN504/HS540 will be conducted in SC-1</li>
<li>The Classes for M.Tech. in Biotechnology 2016 Batch will be held in G1-104.</li>
<li>IC250 Class is only on Monday</li>
<li>CS207 Theory class is on thursday 1-2 PM</li>
  </ol>
  <?php

  $cd=$_SESSION['unamefac'];
 // $nm=$row['Course Name'] ;
  $code=getcode($cd);
  $slot=getslot($cd);

  echo "<script>
$('.".$slot."').not('option').hide().html('<span class=\"mdl-chip\" cont=".$code."> <span class=\"mdl-chip__text\" style=\"font-size:16px;\">".$code."</span></span>').fadeIn();

</script>";

?>


  </div></main></div>

</body>
  


</html>