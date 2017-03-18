<?php


if(isset($_POST['uname'])&&isset($_POST['psw']))
{
  if(!empty($_POST['uname'])&&!empty($_POST['psw']))
  {
    $per=$db->query("SELECT * FROM Students WHERE ROLLNO=".mysql_real_escape_string($_POST['uname'])." && PASSWORD='".mysql_real_escape_string($_POST['psw'])."' ") ;



if(isset($_COOKIE['us'])&&!empty($_COOKIE['us']))
{
  $_SESSION["uname"]= $_COOKIE['us'];
  header('Location:index.php');
}

if (!$per->num_rows)
{ 
echo 'Username and Password is incorrect ';
}
 
else
{
$_SESSION["uname"]= $_POST['uname'];
$_SESSION["password"] = $_POST['psw'];

if(isset($_POST['rmm'])) setcookie('us',$_POST['uname'], time() + (86400 * 30), "/");

header('Location:index.php');
}

  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
   <link rel="stylesheet" href="assets/css/material.min.css" /> 
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script defer src="assets/js/material.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lemonada|Roboto|Pacifico" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
        <h2 class="mdl-card__title-text">Login  &nbsp; &nbsp;&nbsp;<i class="material-icons">dashboard</i></h2>
      </div>
      <div class="mdl-card__supporting-text">
        <form action="studentlogin.php" method=POST>
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="username"  name="uname" required>
            <label class="mdl-textfield__label" for="username">Roll No</label>
          </div>
          <br>
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="password" id="userpass" name="psw" required />
            <label class="mdl-textfield__label" for="userpass">Password</label>
            </div>
            <br>
    <input type="checkbox" checked="checked" style="display: inline;" name=rmm> <p style="display: inline;">Stay Signed In</p>
    <br>
    <div class="mdl-card__actions mdl-card--border">
        <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Log in</button>
      </div>
        </form>
        <a href=forgotpass.php>Forgot Password</a>

                  </div>
      
    </div>
  </main>
</div>

</body>
</html>



