<?php

require 'core.php';
require 'connect.php';

unset($_SESSION['unameadm']);
setcookie('usadm',null,  -(86400 * 30 ),'/');


header("Location:../index.php");
//header('Location:index.php');
?>