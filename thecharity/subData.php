<?php
session_start();
require "config.php";
if (isset($_POST['event_id']) && isset($_POST['donor_id'])) {
    $e_id=$_POST['event_id'];
    $donor_id=$_POST['donor_id'];
    $sql3="insert into event_register (donor_id,event_id) values ('$donor_id','$e_id')";
    //echo $sql3;
    $res3=mysqli_query($conn,$sql3);
    if($res3)
    {
        echo "ok";
    }

}

if(isset($_POST['data_volunteer'])){
    session_destroy();
    echo "DONE";
}
if(isset($_POST['data_admin'])){
    session_destroy();
    echo "DONE";
}

if(isset($_POST['data_donor'])){
    session_destroy();
    echo "DONE";
}
?>