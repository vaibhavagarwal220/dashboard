<?php
require "core.php";
require "connect.php";
if(loggedin()) header('Location:index.php');

?>


<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
  <title>Forgot Password</title>
     <link rel="stylesheet" href="assets/css/material.min.css" /> 
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script defer src="assets/js/material.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<script src="assets/js/jquery.min.js"></script>

    <style type="text/css">
      .mdl-layout {
  align-items: center;
  justify-content: center;
}
.mdl-layout__content {
  padding: 24px;
  flex: none;
}
#bg{background-image: url('assets/img/back1.jpg') ;background-repeat: round;}
    </style>
</head>
<body >






<div id=bg class="mdl-layout mdl-js-layout mdl-color--grey-100">
  <main class="mdl-layout__content">
    <div class="mdl-card mdl-shadow--6dp">
      <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text">Forgot Password  &nbsp; &nbsp;&nbsp;<i class="material-icons">dashboard</i></h2>
      </div>
      <div class="mdl-card__supporting-text">
        <form action="forgot.php" method=POST>
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="username"  name="uname" required>
            <label class="mdl-textfield__label" for="username">Roll No</label>
          </div>
          <br>

    <div class="mdl-card__actions mdl-card--border">
        <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Send Password</button>
      </div>
        </form>
                  </div>
      
    </div>
  </main>
</div>

</body>
</html>



