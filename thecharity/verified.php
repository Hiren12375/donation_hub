<?php
require "config.php";
require 'PHPMailer-5.2.27/PHPMailerAutoload.php';
require 'PHPMailer-5.2.27/class.smtp.php';
if (isset($_GET['volunteer_id'])){
    if (isset($_POST['approve'])) {
        $id = $_POST['id'];

//    $query = "select * from volunteer_register where volunteer_id=" . $id;
//    $res1 = mysqli_query($conn, $query);
//    $row = mysqli_fetch_array($res1);
//    $email = $row['email'];

        $sql = "update volunteer_register set verified='verified' where volunteer_id=" . $id;
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "Email varification done";
            $body = "New Volunteer registered..";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "donationhub2@gmail.com";
            $mail->Password = "donate123";
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->addAddress("donationhub2@gmail.com");

            $mail->isHTML(true);
            $mail->Body = $body;
            $mail->Subject = "New Registration";
            $mail->setFrom("Donation Hub");
            if (!$mail->send()) {
                echo "error: " . $mail->ErrorInfo;
            }
        }
    }


}elseif (isset($_GET['donor_id'])) {
    if (isset($_POST['approve'])) {
        $id = $_POST['id'];

//        $query = "select * from donor_register where donor_id=" . $id;
//        $res1 = mysqli_query($conn, $query);
//        $row = mysqli_fetch_array($res1);
//        $email = $row['email'];

        $sql = "update donor_register set verified='verified' where donor_id=" . $id;
        echo $sql;
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "Email varification done";
            $body = "New Donor registered..";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "donationhub2@gmail.com";
            $mail->Password = "donate123";
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->addAddress("donationhub2@gmail.com");

            $mail->isHTML(true);
            $mail->Body = $body;
            $mail->Subject = "New Registration";
            $mail->setFrom("Donation Hub");
            if (!$mail->send()) {
                echo "error: " . $mail->ErrorInfo;
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
    if (isset($_GET['donor_id'])) {
        ?>
        <input type="hidden" name="id" value="<?php echo $_GET['donor_id']; ?>">
        <?php
    } elseif (isset($_GET['volunteer_id'])) {
        ?>
        <input type="hidden" name="id" value="<?php echo $_GET['volunteer_id']; ?>">
    <?php } ?>

    <input type="submit" name="approve" value="Approve">
    <input type="submit" name="disapprove" value="Disapprove">
     <a href="index.php">Back to home</a>
</form>
</body>
</html>