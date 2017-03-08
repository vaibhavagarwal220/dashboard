<?php

$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');
//$db = new MYSQLI('https://mysql5.000webhost.com','a6647829_vaibhav','vaibhav12345','a6647829_project') ; //or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Unable to connect to the database ');
}

?>