<?php
/*ini_set("display_errors", 1);
error_reporting(E_ALL);
require 'PHPMailer-5.2.27/PHPMailerAutoload.php';
require 'PHPMailer-5.2.27/class.smtp.php';

include("config.php");
 if (isset($_POST['send'])) 
 {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $msg   = $_POST['msg'];
    $sql = "insert into contact(name,email,msg)values('$name','$email','$msg')";
    $result = mysqli_query($conn, $sql);


        if($result)
        {
      
            $body='<table style="width:100%">
        <tr><td>Name: '.$name.'</td></tr>
        <tr><td>Email: '.$email.'</td></tr>
        <tr><td>Message: '.$msg.'</td></tr>
       
        
    </table>';
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "donationhub2@gmail.com";
            $mail->Password = "donate123";
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->addAddress("donationhub2@gmail.com");
            $mail->setFrom("donationhub2@gmail.com", "Donation Hub");
            $mail->isHTML(true);
            $mail->Body = $body;
            $mail->Subject = "New Contact";
            if (!$mail->send()) 
            {
                echo "error: " . $mail->ErrorInfo;
            }
            else
             {
             header("location:contact.php");

            }
     }
     else
     {
        echo "something want wrong";
     }
}
*/
?>