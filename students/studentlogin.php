<?php
require 'core.php' ;
require 'connect.php' ;
if(loggedin())
{
 header('Location:studentt.php'); 
}
if(isset($_COOKIE['us'])&&!empty($_COOKIE['us']))
{
  $_SESSION["uname"]= $_COOKIE['us'];
  header('Location:studentt.php');
}
else include 'student1.php';

?>