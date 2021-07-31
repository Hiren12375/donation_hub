<?php
session_start();
// if(!isset($_SESSION['volunteer']) || !isset($_SESSION['donor'])){
//     header("location:login.php");
// }
require "config.php";
require 'PHPMailer-5.2.27/PHPMailerAutoload.php';
require 'PHPMailer-5.2.27/class.smtp.php';
if (isset($_POST['submit'])) 
{
    $id = $_POST['id'];

    $query = "select * from donor_register where donor_id=" . $id;
    $res1 = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($res1);
    $email = $row['email'];


    //$res = mysqli_query($conn, $sql);
    if ($res1) {
        $body = "your request is accepted";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "donationhub2@gmail.com";
        $mail->Password = "donate123";
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->addAddress("$email");

        $mail->isHTML(true);
        $mail->Body = $body;
        $mail->Subject = "Donation accepted.";
        $mail->setFrom("donationhub2@gmail.com", "Donation Hub");
        if (!$mail->send()) {
            echo "error: " . $mail->ErrorInfo;
        } else {
            $sql = "update product_type set volunteer_accept=1 where donor_id=$id";
            $res = mysqli_query($conn, $sql);
            header("location:acceptList.php");
        }
    }


}

if (isset($_POST['accept'])) {
    if (isset($_SESSION['volunteer'])) {
        $id = $_POST['id'];

        $query = "select * from request where req_id=" . $id;
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($res);
        $email = $row['email'];

        if ($res) {
            $body = "your request is accepted";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "donationhub2@gmail.com";
            $mail->Password = "donate123";
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Body = $body;
            $mail->Subject = "Request accepted.";
            $mail->setFrom("donationhub2@gmail.com", "Donation Hub");
            if (!$mail->send()) 
            {
                echo "error: " . $mail->ErrorInfo;
            } 
            else
             {
                $sql1 = "update request set vol_accept=1 where req_id=" . $id;
                $res1 = mysqli_query($conn, $sql1);
                header("location:user_request.php");
            }
        }
    }

if (isset($_SESSION['donor'])) {
    $id = $_POST['id'];
    $did=$_SESSION['donor']['id'];

    $query = "select * from request where req_id=" . $id;
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($res);
     $email = $row['email'];
    $ptype=$row['type'];

    if($ptype == 'Blood')
    {
        $sql1="select * from blood_donors where donor_id='$did' order by date desc";
        $res=mysqli_query($conn,$sql1);
        if($row=mysqli_fetch_assoc($res))
        {
            $date=date_create($row['date']);
            $c_date=date_create(date("Y-m-d"));
            // print_r($date);
            // echo "<br>".$c_date;
            $date1=date_diff($date,$c_date);
            $days= $date1->format("%a");
            if($days >= 90){
                $sql2="update request set donor_accept=1 where req_id=".$id;
                $res2=mysqli_query($conn,$sql2);
                
            }
            else
            {

                ?>
                <script> alert("Sorry you are not allow for blood donation"); 
                    window.location.href("user_request.php");
                </script>
                <?php
               
            }
             // header("location:");

        }
        


    }
    // if ($res) {
    //     $body = "your request is accepted";
    //     $mail = new PHPMailer;

    //     $mail->isSMTP();
    //     $mail->Host = "smtp.gmail.com";
    //     $mail->SMTPAuth = true;
    //     $mail->Username = "donationhub2@gmail.com";
    //     $mail->Password = "donate123";
    //     $mail->SMTPSecure = 'tls';
    //     $mail->Port = 587;
    //     $mail->addAddress($email);

    //     $mail->isHTML(true);
    //     $mail->Body = $body;
    //     $mail->Subject = "Donation accepted.";
    //     $mail->setFrom("donationhub2@gmail.com", "Donation Hub");
    //     if (!$mail->send()) {
    //         echo "error: " . $mail->ErrorInfo;
    //     } else {
    //         $sql1 = "update request set donor_accept=1 where req_id=" . $id;
    //         $res1 = mysqli_query($conn, $sql1);
    //         header("location:user_request.php");
    //     }

    
}}