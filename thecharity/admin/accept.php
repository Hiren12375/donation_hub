<?php
require 'conn.php';
require '../PHPMailer-5.2.27/PHPMailerAutoload.php';
require '../PHPMailer-5.2.27/class.smtp.php';

    $id = $_POST['id'];
    $user=$_POST['user'];
    if($user=='donor') {

        $sql = "update donor_register set admin_accept=1 where donor_id='$id'";
        if(mysqli_query($conn,$sql)){
            $sql1="select * from donor_register where donor_id='$id'";
            $res1=mysqli_query($conn,$sql1);
            $row=mysqli_fetch_array($res1);
            $email=$row['email'];

            $body="you are registered successfully as Donor";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "donationhub2@gmail.com";
            $mail->Password = "donate123";
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->addAddress($email);
            $mail->setFrom("donationhub2@gmail.com", "Donation Hub");
            $mail->isHTML(true);
            $mail->Body = $body;
            $mail->Subject = "New Registration";
            if (!$mail->send()) {
                echo "error: " . $mail->ErrorInfo;
            }
        } else {
            header("location:displayDetails.php");

        }
    }
    elseif($user=='volunteer') {
        //echo $user;
        $sql = "update volunteer_register set admin_accept=1 where volunteer_id='$id'";
        if(mysqli_query($conn,$sql))
            $sql1="select * from volunteer_register where volunteer_id='$id'";
        $res1=mysqli_query($conn,$sql1);
        $row=mysqli_fetch_array($res1);
        $email=$row['email'];

        $body="you are registered successfully as Volunteer";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "donationhub2@gmail.com";
        $mail->Password = "donate123";
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->addAddress($email);
        $mail->setFrom("donationhub2@gmail.com", "Donation Hub");
        $mail->isHTML(true);
        $mail->Body = $body;
        $mail->Subject = "New Registration";
        if (!$mail->send()) {
            echo "error: " . $mail->ErrorInfo;
        }
    } else {
        header("location:displayDetails.php");

    }

    if($user=='blood'){
        $sql1=mysqli_query($conn,"select * from blood_donors where b_id='$id'");
        $res1=mysqli_fetch_array($sql1);
         $d_id=$res1['donor_id'];

        $sql2=mysqli_query($conn,"select * from donor_register where donor_id='$d_id'");
        $res2=mysqli_fetch_array($sql2);
         $b_re=$res2['blood_reward'];
         $b_re+=1;

          $sql3=mysqli_query($conn,"update donor_register set blood_reward='$b_re' where donor_id='$d_id'");
          if($sql3)
          {
            echo "Done";
          }
       


        $sql="update blood_donors set admin_accept=1 where b_id=".$id;
        echo $sql;
        $res=mysqli_query($conn,$sql);
        if($res){
            header("location:home1.php");
        }
    }
    
?>
