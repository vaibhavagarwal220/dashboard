<?php

require 'core.php';
require 'connect.php';

unset($_SESSION['unameadm']);
unset($_SESSION['passwordadm']);
setcookie('usadm',null,  -(86400 * 30 ),'/');


header("Location:../index.php");
//header('Location:index.php');
?>