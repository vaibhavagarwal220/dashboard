<!doctype html>
<html>
<head>
<style type="text/css">
.caldr{font-size:15px;color:black !important;background-color:white !important; }  
</style>

<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
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
  #caln{background:url('assets/img/cload2.gif');background-repeat:round;}
  #caln{display:block;}
</style>

<style type="text/css">
.caldr{font-size:15px;color:black !important;background-color:white !important; }
  
</style>


	<br>
    

	<div id=caln></div>
  <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=iitmandi.cal%40gmail.com&amp;color=%23333333&amp;src=gymkhanaiitmandi%40gmail.com&amp;color=%230F4B38&amp;ctz=Asia%2FCalcutta" 
  style="border-width:0"  frameborder="0" scrolling="no" class=cal>
    
  </iframe>
  
	<br>
 <script type="text/javascript">
 $(document).ready(function(){
$('.cal').hide();
 });
 setTimeout(
  function() 
  {
    $('#caln').hide();
    $('.cal').show();
  }, 2700);

  </script>


	</div></main></div>

</body>
</html>