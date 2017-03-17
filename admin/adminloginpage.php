<?php
require 'core.php' ;
require 'connect.php' ;
if(loggedinadm())
{
 header('Location:index.php'); 
}
if(isset($_COOKIE['usadm'])&&!empty($_COOKIE['usadm']))
{
  $_SESSION["unameadm"]= $_COOKIE['usadm'];
  header('Location:index.php');
}
else include 'adminlogin.php';

?>