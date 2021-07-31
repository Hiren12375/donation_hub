<?php
require "conn.php";
require '../PHPMailer-5.2.27/PHPMailerAutoload.php';
require '../PHPMailer-5.2.27/class.smtp.php';
if (isset($_GET['event_handler_id'])) {
    if (isset($_POST['approve'])) {
        $id = $_POST['id'];
        $sql = "update event_handler set handler_status=1 where eh_id=" . $id;
        $res = mysqli_query($conn, $sql);
        if ($res) {
            $sql1 = "select * from event_handler where eh_id=" . $id;
            $res1 = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_array($res1);
            $user = $row['user'];
            $pass = $row['pass'];
            $volunteer_id = $row['volunteer_id'];
            $body = "Thank you to become a event handler your user name= " . $user . " and password= " . $pass;

            $sql2 = "select * from volunteer_register where volunteer_id=" . $volunteer_id;
            $res2 = mysqli_query($conn, $sql2);
            $row1 = mysqli_fetch_array($res2);
            $email = $row1['email'];

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
            } else {
                echo "smthing went wrong...!";
            }
        }
    }
}

if (isset($_GET['event_volunteer_id'])) {
    if (isset($_POST['approve'])) {
        echo "heloo";
        $event_volunteer_id = $_POST['event_volunteer_id'];
        $sql = "select * from event_volunteer where event_vol_id=" . $event_volunteer_id;
       echo $sql;
        $res = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($res)) {
            $event_handler_id = $row['eh_id'];
            $volunteer_id = $row['volunteer_id'];
        }
        $sql1 = "select * from event_handler where eh_id=" . $event_handler_id;
//        echo $sql1;
        $res1 = mysqli_query($conn, $sql1);
        if ($row1 = mysqli_fetch_assoc($res1)) {
            $event_id = $row1['event_id'];

        }
        $sql2 = "select * from upcoming_event where event_id=" . $event_id;
//        echo $sql2;
        $res2 = mysqli_query($conn, $sql2);
        if ($row2 = mysqli_fetch_assoc($res2)) {
            $event_name = $row2['event_name'];


        }

        $sql3 = "select * from volunteer_register where volunteer_id=" . $volunteer_id;
//        echo $sql3;
        $res3 = mysqli_query($conn, $sql3);
        if ($row3 = mysqli_fetch_assoc($res3)) {
            $volunteer_birth_date = $row3['birthdate'];
            $volunteer_email = $row3['email'];
            $volunteer_name = $row3['firstname'];


        }
        $string = explode(" ", $event_name);
//        print_r($string);

        $first_letter = substr($string[0], 0, 1);
        $second_letter = substr($string[1], 0, 1);
        echo $first_letter;
        echo $second_letter;

        $event_volunteer_password = $volunteer_birth_date;
        $event_volunteer_user_name = $first_letter . $second_letter . "_" . $volunteer_id;
        if (isset($event_volunteer_password) && isset($event_volunteer_password)) {

            $body = "Thank you to become a event volunteer your user name= " . $event_volunteer_user_name . " and password= " . $event_volunteer_password;
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "donationhub2@gmail.com";
            $mail->Password = "donate123";
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->addAddress($volunteer_email);
            $mail->setFrom("donationhub2@gmail.com", "Donation Hub");
            $mail->isHTML(true);
            $mail->Body = $body;
            $mail->Subject = "New Registration";
            if (!$mail->send()) {
                echo "error: " . $mail->ErrorInfo;
            } else {
                $sql4 = "update event_volunteer set user_name='" . $event_volunteer_user_name . "' , password='" . $event_volunteer_password . "' where event_vol_id=" . $event_volunteer_id;
                echo $sql4;
                $re4 = mysqli_query($conn, $sql4);

            }
        }
    }
}
?>
<html>
<head></head>
<body>
<form method="post" action="">
    <?php
    if (isset($_GET['event_handler_id'])) {
        echo "<input type='hidden' value='" . $_GET['event_handler_id'] . "' name='id'>";
    }
    else if(isset($_GET['event_volunteer_id']))
    {
        echo "<input type='hidden' value='" . $_GET['event_volunteer_id'] . "' name='event_volunteer_id'>";
    }
    ?>

    <input type="submit" name="approve" value="Approve">
    <input type="submit" name="disapprove" value="Disapprove">
    <a href="home1.php">Back to home</a>
</form>
</body>
</html>