<?php
session_start();

require "config.php";


if(isset( $_POST['id'])){
    $id= $_POST['id'];
    $sql="select * from product_type pro,donor_register dr where dr.donor_id=$id and dr.donor_id=pro.donor_id";
    //echo $sql;
    $res=mysqli_query($conn,$sql);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>SB Admin - register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrapcss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <?php
    while ($row=mysqli_fetch_array($res))

    {
        ?>
        <div class="row border" >
            <div class="col-sm-6 mt-3">
        <div class="media " >
            <div class="media-left media-middle  mr-2" >
                <img src="images/a.png" class="media-object" height="50" width="100">
            </div>
            <div class="media-body">
                <label><?php echo "NAME:".$row['firstname']." ".$row['lastname'] ?></label><br>

                <label><?php echo "ADDRESS:".$row['address']?></label><br>

                <label><?php echo "EMAIL ADDRESS:".$row['email'] ?></label><br>

                <label><?php echo "BLOOD GROUP:".$row['bloodgroup'] ?></label><br>



            </div>
        </div>
            </div>
            <div class="col-sm-6 mt-4" >
        <div class="media" >

            <div class="media-right mr-3 " >
                <img src="images/a.png" class="media-object" height="50" width="100">
            </div>
            <div class="media-body mt-2">
                <label><?php echo "DONATE TYPE:".$row['donate_type'] ?></label><br>

                <label><?php echo "sub_categories".$row['sub_categories']?></label><br>
                <a href="" class='btn btn-primary'>Accept</a>
            </div>

        </div>
            </div>
        </div>
        <br><br>
        <?php


    }


    ?>


</div>


</body>