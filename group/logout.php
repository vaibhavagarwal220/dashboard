<?php

require 'core.php';
require 'connect.php';
unset($_SESSION['unamegrp']);

setcookie('usgrp', null, -(86400 * 30), '/');


header("Location:../index.php");
//header('Location:index.php');
?>