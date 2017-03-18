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

$p = $_POST['password'];
$type=$_SESSION['persontype'];
$db = new mysqli('localhost','root','','gymkhana') ;//or die('Error connecting to MySQL server.');

	$result1=$db->query("SELECT * FROM $type where rollno='".$_SESSION['rollno']."' ");
$pword=MD5($p);
$pas="";

    
 if($result1->num_rows)
{
    $rows1=$result1->fetch_all(MYSQLI_ASSOC);
    
    foreach($rows1 as $row )
    {
        $pas = $row['password'];
      
    }
}
if($pword==$pas)
{

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
                                     <?php
                    if($_SESSION['persontype']=="student")
                    {
                    ?>
                    <li>
                                        <span class="fa-gears ">Records</a></span>
                                        <ul>
                                            <li>
                                                <a href="eqi.php">Equipments Issued</a>
                                            </li>
                                            <li>
                                                <a href="eqr.php">Equipment Requests</a>
                                            </li>
                                            <li>
                                                <a href="ri.php">Rooms Booked</a>
                                            </li>
                                            <li>
                                                <a href="rr.php">Rooms Requested</a>
                                            </li>
                                        </ul>
                                    </li>
 
                                   <li>
                                        <span class="fa-gears ">Your projects</a></span>
                                        <ul>
                                            <li>
                                                <a href="pro_end.php">Completed</a>
                                            </li>
                                            <li>
                                                <a href="pro_pend.php">Pending</a>
                                            </li>
                                            <li>
                                                <a href="form_pro.php">New project</a>
                                            </li>
                                        </ul>
                                    </li>
                    <?php                   
                    }
                    ?>
                                    
                                    <li>
                                        <a href="con_p.php"><span class="fa-pencil-square-o ">Edit Profile</a>
                                    </li>
                                    <?php
                                    if(($_SESSION['persontype']=="student"))
                                    {

                                        ?>
                                     <li>
                                        <a href="student_welcome.php" >Account</a>
                                    </li>
                                    <?php
                                    }
                                    else if(($_SESSION['persontype']=="coordinator"))
                                    {

                                        ?>
                                     <li>
                                        <a href="coordinator_welcome.php" >Account</a>
                                    </li>
                                    <?php
                                    }
                                    if(($_SESSION['persontype']=="admin"))
                                    {

                                        ?>
                                     <li>
                                        <a href="admin_welcome.php" >Account</a>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                    
                                    <li>
                                        <a href="pages-login.html"><span class="fa-sign-out ">Logout</a>
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

            <!-- Main Text -->
        <center> 
            <h4><b>Welcome  <?php echo $_SESSION['rollno'  ] ; ?>
        </center>
        </b>
        </h4>
		<center>
        <div id="content">
                <div class="container background-white">
                    <div class="container">
                        <div class="row margin-vert-30">n
        <!-- Login Box -->
        <div class="col-md-6 col-md-offset-3">
            <form action="update.php" method="POST">
            	<form class="login-page">
                    <div class="login-header margin-bottom-30">
                        <h2>Please Enter new details</h2>
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon">
                            
                        </span>
                        <input name="name" placeholder="Name" id="name" class="form-control" type="text" required>
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon">
                            
                        </span>
                        <input name="phone" placeholder="Phone no. " id="phone" class="form-control" type="text" required>
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon">
                            
                        </span>
                        <input name="email" placeholder="Email ID" id="email" class="form-control" type="text" required>
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon">
                        >
                        </span>
                        <input name="password" placeholder="New Password" id="password" class="form-control" type="password" required>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary pull-right" type="submit">Submit</button>
                    </div>
            	</form>
            </form>
        </div>
        <!-- End Login Box -->
        </div>
        </div>
        </div>
        </div>
        </center>
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


<?php
}
else
{
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
                                     <!--<li>
                                        <a href="activites.html" ><span class="fa-globe ">Activities</a>
                                    </li>
                                    <li>
                                        <span class="fa-gears ">Your projects</a></span>
                                    	<ul>
                                            <li>
                                                <a href="pro_end.html">Completed</a>
                                            </li>
                                            <li>
                                                <a href="pro_pend.html">Pending</a>
                                            </li>
                                            <li>
                                                <a href="pro_new.html">New project</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="pages-login.html"><span class="fa-sign-out ">Logout</a>
                                    </li>-->
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

<br><br><br><br><h1><strong>Wrong Password</strong></h1><br><br><br>
<h3>Go back to <a href="con_p.php">Edit Profile</a> ?<br><br><br><br><br></h3>




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
<?php
}

?>