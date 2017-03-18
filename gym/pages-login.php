<?php
    
    if(isset($_COOKIE['rollno']) and isset($_COOKIE['persontype']))
    {
        
       $rollno = $_COOKIE['rollno'];
        $person = $_COOKIE['persontype'];
        session_start();
    $_SESSION['rollno']= $rollno;
    $_SESSION['persontype']= $person;
    if($person == "student")
    header("location:student_welcome.php");
    if($person == "coordinator")
    header("location:coordinator_welcome.php");
    if($person == "admin")
    header("location:admin_welcome.php");
    
        /*$rollno = $_COOKIE['rollno'];
        $pass = $_COOKIE['pass'];
        echo $rollno;
        echo $pass;
        echo"<script>
                document.getElementById('rollno').value='$rollno';
                document.getElementById('pass').value='$pass';
                document.getElementById('ckbox').value='checked';
            </script>";*/
    }

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<style type="text/css">
    .dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}


.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
   background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}
.dropdown:hover .dropdown-content{display:block;}

.dropdown:hover .dropbtn {
    background-color: : #3e8e41;
}

</style>
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
            <!-- Phone/Email -->
            
            <!-- End Phone/Email -->
            <!-- Header -->
            <div id="header">
                <div class="container">
                    <div class="row">
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
            <div id="hornav" class="bottom-border-shadow">
                <div class="container no-padding border-bottom">
                    <div class="row">
                        <div class="col-md-11 no-padding">
                            <div class="visible-lg">
                                <ul id="hornavmenu" class="nav navbar-nav">
                                    <li>
                                        <a href="index.html" class="fa-home">Home</a>
                                    </li>
                                     <li>
                                        <a href="members.html" >Members</a>
                                    </li>
                                    <!--<li>
                                        <span class="fa-gears ">features</span>
                                        <ul>
                                            <li class="parent">
                                                <span>Typography</span>
                                                <ul>
                                                    <li>
                                                        <a href="features-typo-basic.html">Basic Typography</a>
                                                    </li>
                                                    <li>
                                                        <a href="features-typo-blockquotes.html">Blockquotes</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="parent">
                                                <span>Components</span>
                                                <ul>
                                                    <li>
                                                        <a href="features-labels.html">Labels</a>
                                                    </li>
                                                    <li>
                                                        <a href="features-progress-bars.html">Progress Bars</a>
                                                    </li>
                                                    <li>
                                                        <a href="features-panels.html">Panels</a>
                                                    </li>
                                                    <li>
                                                        <a href="features-pagination.html">Pagination</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="parent">
                                                <span>Icons</span>
                                                <ul>
                                                    <li>
                                                        <a href="features-icons.html">Icons General</a>
                                                    </li>
                                                    <li>
                                                        <a href="features-icons-social.html">Social Icons</a>
                                                    </li>
                                                    <li>
                                                        <a href="features-icons-font-awesome.html">Font Awesome</a>
                                                    </li>
                                                    <li>
                                                        <a href="features-icons-glyphicons.html">Glyphicons</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="features-testimonials.html">Testimonials</a>
                                            </li>
                                            <li>
                                                <a href="features-accordions-tabs.html">Accordions & Tabs</a>
                                            </li>
                                            <li>
                                                <a href="features-buttons.html">Buttons</a>
                                            </li>
                                            <li>
                                                <a href="features-carousels.html">Carousels</a>
                                            </li>
                                            <li>
                                                <a href="features-grid.html">Grid System</a>
                                            </li>
                                            <li>
                                                <a href="features-animate-on-scroll.html">Animate On Scroll</a>
                                            </li>
                                        </ul>
                                    </li>-->
                                    <li>
                                        <a href="index.html#portfolio"><span class="fa-copy ">Clubs</span></a>
                                      
                                    </li>
                                    <li>
                                        <a href="gallery.html">Gallery</a>
                                    </li>
                                   
                                    <li>
                                        <a href="contact.html" class="fa-comment ">Contact</a>
                                    </li>
                                    <li>
                                                <a href="events.html" >Events</a>
                                     </li>
                                     <li>
                                                <a href="calendar.html">Calendar</a>
                                     </li>
                                     <li>
                                                <a href="pages-login.php" class="active"  >Login</a>
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
            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="container">
                        <div class="row margin-vert-30">
                            <!-- Login Box -->
                            <div class="col-md-6 col-md-offset-3">
                                <form action="login.php" method="POST">    
                                <form class="login-page">
                                    <div class="login-header margin-bottom-30">
                                        <h2>Login to your account</h2>
                                    </div>

                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input name="rollno" placeholder="ID" id="rollno" class="form-control" type="text" required>
                                    </div>


                  <!--                  <div class="container" >-->    
                                        
 
                                            
                                    <!--
                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon">
                                            <i class="fa fa-list"></i>
                                        </span>
                                        <input placeholder="User type" class="form-control" >
                                    </div> 
                                    -->

                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                         <input name="password" id = "pass" placeholder="Password" class="form-control" type="password" required> </div>
                                    <div class="input-group margin-bottom-20" >
                                        <label for="type" style= "font-size: 100%" text-align= "center" ></label>
                                        <select id="type" name="type"  style= "font-size: 120%" dir="" >
                                        <option value="student">Student</option>
                                        <option value="coordinator">Coordinator</option>
                                        <option value="admin">Admin</option>
                                        </select>
                                       
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="checkbox">
                                     <input name="remember" value="1" id="ckbox"type="checkbox">Stay signed in</label>
                                          </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-primary pull-right" type="submit">Login</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4>Forget your Password ?</h4>
                                    <p>
                                        <a href="forget.html">Click here </a>to reset your password.</p>

                                </form>
                                </form>
                            </div>
                            
                            <!-- End Login Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
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
