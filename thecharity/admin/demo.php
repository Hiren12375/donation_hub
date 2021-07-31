<?php
session_start();
if(isset($_POST['event_id']))
{

    $id=$_POST['event_id'];
   $_SESSION['event_handler']['event_id']=$id;
    if(isset( $_SESSION['event_handler']['event_id']))
    {
    //    echo  $_SESSION['event_handler']['event_id'];
       echo "done";
    }
}
?>