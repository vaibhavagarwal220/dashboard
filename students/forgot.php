
<?php

require 'core.php';
require 'connect.php';

if(!isset($_POST['uname'])||empty($_POST['uname'])) {header('Location:forgotpass.php');}


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


$eid = $_POST["uname"];
//or die('Error connecting to MySQL server.');

//$per=$db->query("SELECT * FROM student WHERE emailid='".$eid."'");
//$var=$per->num_rows;
//$encrypted = md5($changedpass);

$db->query("UPDATE students SET PASSWORD= '".$changedpass."' where ROLLNO='".$eid."' " );
//echo $encrypted;
//if (!$per->num_rows)
//{ 
//echo "Wrong Email-id";
//}
//else
//{
	

 //   $rows1=$per->fetch_all(MYSQLI_ASSOC);
    
 //   foreach($rows1 as $row )
 //   {
 //       $user = $row['name'];
      
  //  }

 

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
$mail->addAddress("b".$eid."@students.iitmandi.ac.in", "User");
 
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

?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>

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
  padding: 4px;
  flex: none;
}
#bg{background-image: url('assets/img/back1.jpg') ;background-repeat: round;}
    </style>
</head>
<body >






<div id=bg class="mdl-layout mdl-js-layout mdl-color--grey-100">
  <main class="mdl-layout__content">
    <div class="mdl-shadow--6dp">
      <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text"></h2>
      


<?php
 
echo 'Your changed password has been sent to your email'; 

?>
      
      </div>
    </div>
  </main>
</div>

</body>
</html>



