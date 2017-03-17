<?php
require 'core.php' ;
require 'connect.php' ;
if(loggedinfac())
{
 header('Location:index.php'); 
}
if(isset($_COOKIE['usfac'])&&!empty($_COOKIE['usfac']))
{
  $_SESSION["unamefac"]= $_COOKIE['usfac'];
  header('Location:index.php');
}
else include 'faculty1.php';

?>