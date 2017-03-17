 <?php

if(loggedinadm())
{
 header('Location:adminn.php'); 
}
if(isset($_POST['uname'])&&isset($_POST['psw']))
{
  if(!empty($_POST['uname'])&&!empty($_POST['psw']))
  {
    $per=$db->query("SELECT * FROM ADMIN WHERE NAME='".mysql_real_escape_string($_POST['uname'])."' && PASSWORD='".mysql_real_escape_string($_POST['psw'])."' ") ;



if(isset($_COOKIE['usadm'])&&!empty($_COOKIE['usadm']))
{
  $_SESSION["unameadm"]= $_COOKIE['usadm'];
  header('Location:index.php');
}

if (!$per->num_rows)
{ 
echo 'Username and Password is incorrect ';
}
 
else
{
$_SESSION["unameadm"]= $_POST['uname'];
$_SESSION["passwordadm"] = $_POST['psw'];

if(isset($_POST['rmm'])) setcookie('usadm',$_POST['uname'], time() + (86400 * 30), "/");

header('Location:index.php');
}

  }
}
?>

 
<!DOCTYPE html>
<html>
<head>
  <title>Login : Dashboard | Admin</title>
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.red-blue.min.css" /> 
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>




<style>
.ablock{width:150px;height:150px;background:white;text-align:center;font-size:20px;margin:10px;line-height:200px;}
.opts{background:white;padding:20px;}
a:hover{text-decoration:none;color:default;}
.ablock i{font-size:80px;}
body{background:#eff3f6;font-family:'Open Sans';color:black;}
.head{background: white;font-family:'Open Sans';font-size:40;}
#frm{display:inline-block; margin-left:35%;}
#logo{margin:10px;}
#caln{width:600px;height:400px;margin:auto;}
.contain{width:90%;margin: auto;background: white;}
.page-content{width:90%;margin: auto;color:black;}
.rbg{background:#cc2c2c;color: white;}
.gbg{background:#08a334;color: white;}
.bbg{background:#245199;color: white;}
.pbg{background:#80159b;color: white;}
#crs{font-size: 40px;}
.feed{padding:20px;}
#nost{list-style:none;}
.past{background:gray;color: white;}
.tod{background:#08a334;color: white;}
.fut{background:gray;color: white;}
#mid{margin:auto;}
</style>

 <style type="text/css">
      .mdl-layout {
  align-items: center;
  justify-content: center;
}
.mdl-layout__content {
  padding: 24px;
  flex: none;
}
#bg{background-image: url('assets/img/back.jpg') ;background-repeat: round;}
    </style>
</head>
<body>


<div id=bg class="mdl-layout mdl-js-layout mdl-color--grey-100">
  <main class="mdl-layout__content">
    <div class="mdl-card mdl-shadow--6dp">
      <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text">Login  &nbsp; &nbsp;&nbsp;<i class="material-icons">dashboard</i></h2>
      </div>
      <div class="mdl-card__supporting-text">
        <form action="adminloginpage.php" method=POST>
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="username"  name="uname" required>
            <label class="mdl-textfield__label" for="username">Username</label>
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

                  </div>
      
    </div>
  </main>
</div>

<br><br><br>
</body>
</html>

