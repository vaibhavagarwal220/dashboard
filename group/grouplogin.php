<?php
require 'core.php' ;
require 'connect.php' ;
if(loggedin())
{
 header('Location:index.php'); 
}
if(isset($_COOKIE['usgrp'])&&!empty($_COOKIE['usgrp']))
{
  $_SESSION["unamegrp"]= $_COOKIE['usgrp'];
  header('Location:index.php');
}
else include 'group1.php';

?>
