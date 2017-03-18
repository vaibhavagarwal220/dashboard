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
                                        <a href="coordinator_welcome.php" >Account</a>
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
//require ('2.php');
$db = new mysqli('localhost','root','','gymkhana') or die('Error connecting to MySQL server.');
$result=$db->query("SELECT * FROM coordinator where rollno='".$_SESSION['rollno']."' ");


echo "<br>";

$result1=$db->query("SELECT * FROM coordinator where rollno='".$_SESSION['rollno']."' ");
$club="";

 if($result1->num_rows)
{
    $rows1=$result1->fetch_all(MYSQLI_ASSOC);
    
    foreach($rows1 as $row )
    {
        $club = $row['club'];
        echo ' '.$club.' ';
    }
}
    echo " club coordinator";


?><br>
                                
    
                        
     
<br><br>
</b>
</center>
</h4>
<!-- 2 start-->
            <div id="icons" class="bottom-border-shadow">
                <div class="container background-grey bottom-border">
                    <div class="row padding-vert-60">
                        <!-- Icons -->
                        <div class="col-md-4 text-center">
                        <a href="form_room.html">
                            <i class="fa-group fa-4x color-primary animate fadeIn"></i>
                            <h2 class="padding-top-10 animate fadeIn">Book Room</a></h2>
                            
                        </div>
                        <div class="col-md-4 text-center">
                        <a href="issue_equip.php">
                            <i class="fa-wrench fa-4x color-primary animate fadeIn"></i>
                            <h2 class="padding-top-10 animate fadeIn">Equipment Requests</a></h2>
                            
                        </div>
                        <div class="col-md-4 text-center"><a href="issue_project.php">
                            <i class="fa-gears fa-4x color-primary animate fadeIn"></i>
                            <h2 class="padding-top-10 animate fadeIn">Project Requests</a></h2>
                            
                        </div>
                        <!-- End Icons -->
                    </div>
                </div>
            </div>
<!-- 2 end-->
<br><br><br>   
<!-- === BEGIN FOOTER === -->
            
            <!-- Footer -->
            <div id="footer" class="background-grey">
                <div class="container">
                    <div class="row">
                        <!-- Footer Menu -->
                        
                        <!-- End Footer Menu -->
                        <!-- Copyright -->
                        <div id="copyright"  >
                        <bottom><center>© All rights reserved | IIT Mandi.</center></bottom>
                            
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
