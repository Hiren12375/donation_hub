<?php
require "config.php";
session_start();
$volunteer_id=$_SESSION['volunteer']['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donation Hub</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--    <link rel="stylesheet" href="css/bootstrap.css">-->

    <link rel="stylesheet" href="css/bootstrapcss.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">


    <!--    <link rel="stylesheet" href="css/bootstrap.min.css">-->
    <!--    <link rel="stylesheet" href="css/bootstrap.css">-->
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>-->
    <!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


    <script>
        $(document).ready(function () {

            $("#logout").click(function () {


                var data = 1;

                var pos = $.post("datares.php", {data: data});
                pos.done(function (data) {

                    $("#logout").attr("href", "d1.php");

                });
                // sessionStorage.removeItem('volunteer');
                // $("#logout").attr("href","d1.php");
                //
                // window.location.href='login.php';

            });
        });

    </script>


</head>
<body>
<header class="site-header">
    <div class="top-header-bar">
        <div class="container">
            <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">
                <div class="col-12 col-lg-8 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                    <div class="header-bar-email">
                            MAIL: <a href="#">info@srvmfoundation.com</a>
                        </div><!-- .header-bar-email -->

                        <div class="header-bar-text">
                            <p>PHONE: <span>+91-9662533897</span></p>
                        </div><!-- .header-bar-text -->
                </div><!-- .col -->

                <div class="col-12 col-lg-4 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">

                    <?php
                    if (isset($_SESSION['volunteer']['id']) || isset($_SESSION['donor']['id'])) {
                        ?>
                        <div class="donate-btn ml-5">
                            <a id="logout">Sign out</a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="donate-btn ml-5">
                            <a href="login.php">Sign in</a>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <div class="nav-bar">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="site-branding d-flex align-items-center">
                        <a class="d-block" href="index.php" rel="home"><img class="d-block" src="images/donation_hub_black_edit.png" alt="logo"></a>
                    </div><!-- .site-branding -->

                    <nav class="site-navigation d-flex justify-content-end align-items-center">
                        <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                            <li><a href="volunteer.php">Home</a></li>
                            <li><a href="Manage_volunteer_profile.php">Manage Profile</a></li>
                            <li class="current-menu-item"><a href="acceptList.php">Accept</a></li>
                            <li><a href="requestList.php">Request</a></li>
                             <li><a href="user_request.php">User Request</a></li>
                            <!-- <li><a href="volunteergallary.php">Gallery</a></li> -->
                            <?php
                            $sql2="select * from event_handler where volunteer_id=$volunteer_id";
                            $res2=mysqli_query($conn,$sql2);
                            if($res2){
                                $count=mysqli_num_rows($res2);
                                if($count>=1){
                                    ?>
                                    <li><a href="event_handler_login.php">Event Handler</a></li>
                                    <?php
                                }
                            }
                            ?>

                            <!--                            <li class="nav-item dropdown ">-->
                            <!--                                <a class="nav-link dropdown-toggle" id="demo" href="--><?php //echo $row['menu_link'] ?><!--"-->
                            <!--                                   data-toggle="dropdown"-->
                            <!--                                   aria-haspopup="true" aria-expanded="false">Request-->
                            <!--                                </a>-->
                            <!---->
                            <!--                                <div class="dropdown-menu ">-->
                            <!--                                    <div class="agile_inner_drop_nav_info p-4">-->
                            <!--                                        <h5 class="mb-3"></h5>-->
                            <!--                                        <div class="row">-->
                            <!--                                            <div class="col-sm-6 multi-gd-img">-->
                            <!--                                                <ul class="multi-column-dropdown">-->
                            <!--                                                    <li>DEMOO</li>-->
                            <!--                                                    <li>DEMOO</li>-->
                            <!--                                                    <li>DEMOO</li>-->
                            <!--                                                    <li>DEMOO</li>-->
                            <!---->
                            <!---->
                            <!--                                                </ul>-->
                            <!--                                            </div>-->
                            <!---->
                            <!--                                        </div>-->
                            <!---->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </li>-->
                            <!---->

                            <li></li>
                        </ul>
                    </nav>

                    <div class="hamburger-menu d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<br><br>
<div class="container">
    <center><h2> Donation Type</h2></center><br>
    <table class="table-bordered table table-striped">
        <tr>
            <th>Donor name</th>
            <th>product name</th>
            <th>Quantity</th>
            <th>Email</th>
            <th>Contact no</th>

        </tr>
        <?php
     $sql = "select * from product_type where volunteer_accept=1 and area='".$_SESSION['volunteer']['area']."'";
        $res = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_array($res)){
            $id=$row['donor_id'];
            $donate_type=$row['donate_type'];
            $qty=$row['quantity'];

            $sql1="select * from donor_register where donor_id=".$id;
            $res1=mysqli_query($conn,$sql1);
            while($row1=mysqli_fetch_array($res1)) {
                echo "<tr><td>" . $row1['firstname'] . "</td>";
                echo "<td>" . $donate_type . "</td>";
                echo "<td>" . $qty . "</td>";
                echo "<td>" . $row1['email'] . "</td>";
                echo "<td>" . $row1['contactno'] . "</td></tr>";

            }
        }
        ?>
    </table>
    <br><br>
    <center><h2> Donation Request</h2></center><br>
    <table class="table-bordered table table-striped">
        <tr>
            <th>User name</th>
            <th>Product name</th>
            <th>Sub type</th>
            <th>Quantity</th>
            <th>Email</th>
            <th>Contact no</th>
            <th>City</th>
            <th>Area</th>

        </tr>
        <?php
        if (isset($_SESSION['volunteer'])) {
            $sql = "select * from request where vol_accept=1 and area='" . $_SESSION['volunteer']['area'] . "'";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($res)) {

                $sql1 = "select * from city where c_id=" . $row['city'];
                $res1 = mysqli_query($conn, $sql1);
                if ($row1 = mysqli_fetch_array($res1)) {
                    $city = $row1['c_name'];
                }

                $sql2 = "select * from area where area_id=" . $row['area'];
                $res2 = mysqli_query($conn, $sql2);
                if ($row2 = mysqli_fetch_array($res2)) {
                    $area = $row2['area_name'];
                }

                echo "<tr><td>" . $row['name'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['sub_type'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['contact'] . "</td>";
                echo "<td>" . $city . "</td>";
                echo "<td>" . $area . "</td>";


            }
        }
        ?>
    </table>

</div>
</body>
<script src="jquery.js"></script>
<script>
    $(document).ready(function () {
        $("#logout").click(function () {
            var data_volunteer="volunteer";
            var pos=$.post("subData.php",{data_volunteer:data_volunteer});
            pos.done(function (data) {
                if(data==='DONE'){
                    window.location.href="login.php";
                }
            })
        })
    })
</script>