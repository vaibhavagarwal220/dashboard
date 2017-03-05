<?php
require 'core.php' ;
require 'connect.php' ;
if(loggedinadm())
{
 header('Location:adminn.php'); 
}
if(isset($_COOKIE['usadm'])&&!empty($_COOKIE['usadm']))
{
  $_SESSION["unameadm"]= $_COOKIE['usadm'];
  header('Location:adminn.php');
}
else include 'adminlogin.php';

?>