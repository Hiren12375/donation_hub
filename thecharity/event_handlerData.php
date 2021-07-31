<?php
require "config.php";
require 'PHPMailer-5.2.27/PHPMailerAutoload.php';
require 'PHPMailer-5.2.27/class.smtp.php';
if(($_POST['vol_id']) && $_POST['event_handler_id']) 
{
    $event_handler_id=$_POST['event_handler_id'];
    $sql="select * from event_handler where eh_id=$event_handler_id";
    $result=mysqli_query($conn,$sql);
    if($result)
    {

    }

    $array=$_POST['vol_id'];
    // print_r($_POST);
    $array1=[];

    for($i=0;$i<count($array);$i++)
    {
        $array1[$i]=$array[$i];
        // print_r($array1[$i]);
    }
   echo "event_handler_id:".$_POST['event_handler_id']."<br>";


    for($j=0;$j<count($array1);$j++)
    {
        $sql2="insert into event_volunteer(eh_id,volunteer_id) values ($event_handler_id,$array1[$j])";
        $res=mysqli_query($conn,$sql2);
        $last_eh_id=mysqli_insert_id($conn);

        $sql1="select * from volunteer_register where volunteer_id=".$array1[$j];
        $res1=mysqli_query($conn,$sql1);
        if($row=mysqli_fetch_array($res1)){
            $email=$row['email'];
        }
        echo "last:".$last_eh_id;
        if ($result) {
            $base_url = "http://localhost/D_H/thecharity/admin/verified.php";


            $body = "You are registered as volunteer-handler for the event .... please open link to accept the request " . $base_url."?event_volunteer_id=".$last_eh_id;
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "donationhub2@gmail.com";
            $mail->Password = "donate123";
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->addAddress($email);
            $mail->setFrom("donationhub2@gmail.com", "Donation Hub ");
            $mail->isHTML(true);
            $mail->Body = $body;
            $mail->Subject = "Email Verification";

            if (!$mail->send()) {
                echo "error: " . $mail->ErrorInfo;
            } else {
                $sql3="update volunteer_register set is_event_volunteer=1 where volunteer_id=".$array1[$j];
                $res3=mysqli_query($conn,$sql3);
             header('Location:event_handler_volunteer.php');
            }

            //header("location:volunt_list.php");

        } else {
            echo "ooopss..Something went Wrong !!";
        }

    }




}
//print_r($array1);
