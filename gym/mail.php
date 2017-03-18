<?php
require 'PHPMailer/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
 
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'shubhamsharma1497@gmail.com';
$mail->Password = 'jaybaruchel';
$mail->SMTPSecure = 'tls';
 
$mail->From = 'shubhamsharma1497@gmail.com';
$mail->FromName = 'IITMANDI | Gymkhana';
$mail->addAddress('riyanshgoyal@gmail.com', 'Riyansh Goyal');
 
$mail->addReplyTo('shubhamsharma1497@gmail.com', 'IITMandi|Gymkhana');
 
$mail->WordWrap = 50;
$mail->isHTML(true);
 
$mail->Subject = 'Password Change';
$mail->Body    = 'your current password is......';
 
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
 
echo 'Message has been sent';
?>
