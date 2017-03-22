<?php

require 'core.php';
require 'connect.php';
unset($_SESSION['uname']);

setcookie('us', null, -(86400 * 30), '/');


header("Location:../index.php");
//header('Location:index.php');
?>