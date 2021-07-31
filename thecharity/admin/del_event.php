<?php
include("conn.php");

    $id=$_GET['id'];
	
	 $q="delete from upcoming_event where event_id=$id";
     $res=mysqli_query($conn,$q);
	  
	 if($res)
	 {
			header("location:view_event.php");
	 }

   
?>



