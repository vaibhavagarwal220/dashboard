   <?php


  require 'connect.php' ;
  require 'core.php' ;
  
  if(!loggedinfac())
  {
    header('Location:facultylogin.php');
  }

?>


<html>
<head>
<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
<title>Calendar | IIT Mandi</title>
</head>
<body>
<?php 
$title="Calendar";
include 'include.inc.php';?>


	

	<br><br>

	<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=400&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=iitmandi.cal%40gmail.com&amp;color=%23333333&amp;src=gymkhanaiitmandi%40gmail.com&amp;color=%230F4B38&amp;ctz=Asia%2FCalcutta" style="border-width:0"  frameborder="0" scrolling="no" id=caln></iframe>
	<br>
	

	</div></main></div>

</body>
</html>