<?php

require 'core.php';
require 'connect.php';
unset($_SESSION['uname']);
unset($_SESSION['password']);

setcookie('us', null, -(86400 * 30), '/');


header("Location:../index.php");
//header('Location:index.php');
?>