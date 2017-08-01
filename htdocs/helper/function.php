<?php
function send_code($code, $email){
// require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// $mail->SMTPDebug = 2;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'calit2.teamb@gmail.com';                 // SMTP username
$mail->Password = '~calit22017';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('calit2.teamb@gmail.com', 'calit2 teamB');
$mail->addAddress($email);     // Add a recipient              // Name is optional
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Confirmation';
$mail->Body    = "Thank you for Joining Us <br> <h2>Click the below URL to activate your account </h2><br> http://192.168.33.66/activate_account.php?code=".$code."";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}