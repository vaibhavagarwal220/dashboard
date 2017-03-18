<?php
session_start();

     if(!(isset($_COOKIE['rollno']) and isset($_COOKIE['persontype'])) and !($_SESSION['rollno'] and $_SESSION['persontype'] ) )
{
    $rollno = $_COOKIE['rollno'];
    $person = $_COOKIE['persontype'];
    $_SESSION['rollno']= $rollno;
    $_SESSION['persontype']= $person;
    header("location:logout.php");
}
$club = $_POST['club'];
$rollno = $_POST['rollno'];

$db = new mysqli('localhost','root','','gymkhana') ;//or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Sorry,have a problem');
}

$name=$db->query("SELECT name FROM student WHERE rollno='".$rollno."'") ;
$phno=$db->query("SELECT phoneno FROM student WHERE rollno='".$rollno."'") ;
$email=$db->query("SELECT emailid FROM student WHERE rollno='".$rollno."'") ;
$p1=$db->query("SELECT * FROM student WHERE rollno='".$rollno."'") ;

$p="";
$rows=$p1->fetch_all(MYSQLI_ASSOC);
    foreach($rows as $row )
    {$p=$row['password'];}
$w="SELECT * FROM coordinator WHERE club ='".$club."'";
$check=$db->query($w);

$q2="INSERT INTO coordinator(name, rollno, club, phoneno, emailid, password) VALUES ('".$row['name']."','".$row['rollno']."','".$club."','".$row['phoneno']."','".$row['emailid']."','".$row['password']."')";

$q1="UPDATE coordinator SET name='".$row['name']."', rollno='".$row['rollno']."', phoneno = '".$row['phoneno']."', emailid= '".$row['emailid']."', password='".$row['password']."' WHERE club = '".$club."'";
if($check->num_rows)
{
    $result=$db->query($q1);

}
else
{
    $result=$db->query($q2);    
    //$q="INSERT INTO coordinator ( name, rollno,club, phoneno, emailid, password) VALUES ('".$name."','".$rollno."','".$club."','".$phno."','".$email."','".$password."')";   
}
//$result=$db->query($q) ;
?>
<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>

   

        <!-- Title -->
        <title>Student Gymkhana IIT Mandi</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- Favicon -->
        <link href="favicon.ico" rel="shortcut icon">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/nexus.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
        <!-- Google Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div id="body-bg">
            <div id="header">
                <div class="container">
                    <div class="row">
                    <!--<div><img src="assets/img/logo.jpg" alt="Logo2" height="100px" width="100px"></div>-->
                        <!-- Logo -->
                        <div class="logo">

                            <a href="index.html" title="">
                                <img src="assets/img/logo.jpg" alt="Logo" align="left"/>
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>
                </div>
            </div>
            <!-- End Header -->
            <!-- Top Menu -->
            <div id="hornav" class="bottom-border-shadow">
                <div class="container no-padding border-bottom">
                    <div class="row">
                        <div class="col-md-11 no-padding">
                            <div class="visible-lg">
                                <ul id="hornavmenu" class="nav navbar-nav">
                                    <li>
                                        <a href="index.html" class="fa-home active">Home</a>
                                    </li>
                                     <li>
                                        <a href="con_p.php"><span class="fa-pencil-square-o ">Edit Profile</a>
                                    </li>
                                     <li>
                                        <a href="admin_welcome.php" >Account</a>
                                    </li>
                                    <li>
                                        <a href="logout.php"><span class="fa-sign-out ">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-1 no-padding">
                            <ul class="social-icons pull-right">
                                <li class="social-facebook">
                                    <a href="https://www.facebook.com/gymkhanaiitmandi/" target="_blank" title="Facebook"></a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- End Top Menu -->
            <!-- === END HEADER === -->
<center>


</center>

            <!-- Main Text -->
       <center>                 <h4><b>Welcome  <?php
                                
                               echo $_SESSION['rollno'  ] ;?><br>
                                
</center>     
 <br>
<?php
if($db->affected_rows>0)
{
?>
<h4>Coordinator details updated in database.</h4>
<?php
}
else
{ 
?>
<h4>Wrong input.</h4>
<?php   
}
?>     
<br>
<a href="modify.php">
<p>Modify database</p>
</a>
<br>
<a href="see_d.php">
<p>See database</p>
</a>
<br><br>
</b>

</h4>

<!-- === BEGIN FOOTER === -->
            
            <!-- Footer -->
            <div id="footer" class="background-grey">
                <div class="container">
                    <div class="row">
                        <!-- Footer Menu -->
                        
                        <!-- End Footer Menu -->
                        <!-- Copyright -->
                        <div id="copyright" >
                            <center>© All rights reserved | IIT Mandi.</center>
                        </div>
                        <!-- End Copyright -->
                    </div>
                </div>
            </div>
            <!-- End Footer -->
            <!-- JS -->
            <script type="text/javascript" src="assets/js/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/scripts.js"></script>
            <!-- Isotope - Portfolio Sorting -->
            <script type="text/javascript" src="assets/js/jquery.isotope.js" type="text/javascript"></script>
            <!-- Mobile Menu - Slicknav -->
            <script type="text/javascript" src="assets/js/jquery.slicknav.js" type="text/javascript"></script>
            <!-- Animate on Scroll-->
            <script type="text/javascript" src="assets/js/jquery.visible.js" charset="utf-8"></script>
            <!-- Sticky Div -->
            <script type="text/javascript" src="assets/js/jquery.sticky.js" charset="utf-8"></script>
            <!-- Slimbox2-->
            <script type="text/javascript" src="assets/js/slimbox2.js" charset="utf-8"></script>
            <!-- Modernizr -->
            <script src="assets/js/modernizr.custom.js" type="text/javascript"></script>
            <!-- End JS -->
    </body>
</html>
<!-- === END FOOTER === -->