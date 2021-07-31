<?php
require '../PHPMailer-5.2.27/PHPMailerAutoload.php';
require '../PHPMailer-5.2.27/class.smtp.php';
//require 'PDO_Connection.php';
if (isset($_POST['email'])) {
//    $body = "please open link to verified ur email";
//    $mail = new PHPMailer;
//
//    $mail->isSMTP();
//    $mail->Host = "smtp.gmail.com";
//    $mail->SMTPAuth = true;
//    $mail->Username = "salonisindhi1999@gmail.com";
//    $mail->Password = "saloni2463";
//    $mail->SMTPSecure = 'tls';
//    $mail->Port = 587;
//    $mail->addAddress("kachhiakhantil1999@gmail.com");
//
//    $mail->isHTML(true);
//    $mail->Body = $body;
//    $mail->Subject = "Email Verification";
//
//    if (!$mail->send()) {
//        echo "error: " . $mail->ErrorInfo;
//    } else {
//        echo "Email sent";
//        //header('Location:registration.php');
//    }

$body = "You are registered as event-handler for the event and your email";
$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "salonisindhi1999@gmail.com";
$mail->Password = "saloni2463";
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->addAddress("kacciakhantil1999@gmail.com");

$mail->isHTML(true);
$mail->Body = $body;
$mail->Subject = "Email Verification";

if (!$mail->send()) {
    echo "error: " . $mail->ErrorInfo;
} else {
    echo "Email sent";
//              header('Location:registration.php');

}


}
?>

<form action="email.php" method="post">
    <input type="submit" name="email" id="email">
</form>