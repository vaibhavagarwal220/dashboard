<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<?php
$type = $_POST["type"];
$eid = $_POST["email"];
$db = new mysqli('localhost','root','','gymkhana') ;//or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Sorry,have a problem');
}

$per=$db->query("SELECT * FROM student WHERE emailid='".$eid."'");
$var=$per->num_rows;



if (!$per->num_rows)
{ 
die('Incorrect details. Authentication failed!! ');
}



?>
    <!-- === BEGIN HEADER === -->

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
            <div id="pre-header" class="background-gray-lighter">
                <div class="container no-padding">
                        
                </div>
            </div>
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
            <!-- Top Menu -->
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
                                        <a href="members.html" class="fa-features">Members</a>
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
                                        <a href="gallery.html">Gallery</a>                                   </li>
                                   
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
                                                <a href="pages-login.html">Login</a>
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
                    <div class="row margin-vert-30">
                        <div class="col-md-12 margin-top-30">
                        <b><center>
                        <?php
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$changedpass = generateRandomString();

$type = $_POST["type"];
$eid = $_POST["email"];
$db = new mysqli('localhost','root','','gymkhana') ;//or die('Error connecting to MySQL server.');

if($db->connect_errno)
{
  echo $db->connect_error;
  die ('Sorry,have a problem');
}
$per=$db->query("SELECT * FROM student WHERE emailid='".$eid."'");
$var=$per->num_rows;
$encrypted = md5($changedpass);

$db->query("UPDATE student SET password= '".$encrypted."' where emailid='".$eid."' " );
echo $encrypted;
if (!$per->num_rows)
{ 
echo "Wrong Email-id";
}
else
{
	

    $rows1=$per->fetch_all(MYSQLI_ASSOC);
    
    foreach($rows1 as $row )
    {
        $user = $row['name'];
      
    }

 


  //  $email = "r_goyal@students.iitmandi.ac.in";
   require 'PHPMailer/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
 
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'shubhamsharma1497@gmail.com';
$mail->Password = '@Delhi53';
$mail->SMTPSecure = 'tls';
 
$mail->From = 'shubhamsharma1497@gmail.com';
$mail->FromName = 'IITMANDI | Gymkhana';
$mail->addAddress($eid, "User");
 
$mail->addReplyTo('shubhamsharma1497@gmail.com', 'IITMandi|Gymkhana');
 
$mail->WordWrap = 50;
$mail->isHTML(true);
 
$mail->Subject = 'Password Change|Gymkhana IITMandi';
$mail->Body    = 'your changed password is '.$changedpass ;
 
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
 
echo 'Message has been sent'; 
   // shell_exec('echo -e "Subject: Test Mail\r\n\r\nThis  email." |msmtp --debug --from=default -t   ');
  /*$from    = 'shubhamsharma1497@gmail.com';
  $to      = 'r_goyal@students.iitmandi.ac.in';

  $subject = 'Test Subject';
  $message = 'Hello. Testing email.';
  $headers =
    'From: ' . $from . "\r\n" .
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  if(mail($to, $subject, $message, $headers))
    echo 'Mail function returned successfully. Mail has probably been sent.';
  else
    echo 'Error! Mail function failed. Mail NOT sent.';
*/


                      
}


?>
</center>
</b>

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