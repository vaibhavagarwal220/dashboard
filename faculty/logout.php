<?php

require 'core.php';
require 'connect.php';

unset($_SESSION['unamefac']);
unset($_SESSION['passwordfac']);

setcookie('usfac',null,  -(86400 * 30 ),'/');

header("Location:../index.php");
//header('Location:index.php');
?>