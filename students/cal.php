<html>
<head>
<title>Calendar | IIT Mandi</title>
</head>
<?php 
require 'connect.php' ;
  require 'core.php' ;
  
  if(!loggedin())
  {
    header('Location:studentlogin.php');
  }
$title="Calendar";
include 'include.inc.php';?>
<style type="text/css">
  iframe{background:url('assets/img/cload.gif');background-repeat:round;}
</style>

	<br>
	<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=450&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=iitmandi.cal%40gmail.com&amp;color=%23333333&amp;src=gymkhanaiitmandi%40gmail.com&amp;color=%230F4B38&amp;ctz=Asia%2FCalcutta" style="border-width:0"  frameborder="0" scrolling="no" id=caln></iframe>
	<br>
	

	</div></main></div>

</body>
</html>