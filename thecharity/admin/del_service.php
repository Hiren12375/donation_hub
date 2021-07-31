<?php
include("conn.php");

    $id=$_GET['id'];
	
	 $q="delete from services where id=$id";
     $res=mysqli_query($conn,$q);
	  
	 if($res)
	 {

         header("location:view_service.php");
	 }

   
?>



