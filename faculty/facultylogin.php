<?php
require 'core.php' ;
require 'connect.php' ;
if(loggedinfac())
{
 header('Location:facultyy.php'); 
}
if(isset($_COOKIE['usfac'])&&!empty($_COOKIE['usfac']))
{
  $_SESSION["unamefac"]= $_COOKIE['usfac'];
  header('Location:facultyy.php');
}
else include 'faculty1.php';

?>