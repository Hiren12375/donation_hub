<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="delimg.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="content">
    <div class="container-fluid">


        <div class="container">

            <?php
            require("conn.php");
            $sql="SELECT * FROM gallery";

            echo $sql;
            $res=mysqli_query($conn,$sql);
            ?>

                <?php

                while($row=mysqli_fetch_array($res))
                {

                    ?>

                     <img  src="<?php echo $row['photo'] ?>"  height="150px" width="150px"  alt=""/ >
                    <input type="checkbox" id="ch">
                    <?php
                }
                ?>



        </div>
    </div>
</div>

</body>
</html>
<script>
    $(document).ready(function () {
        $("#ch:checked")
    })
</script>

<!-- End Navbar -->

<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        alert("hello");-->
<!--    })-->
<!--</script>-->
