<?php
require "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donation Hub</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        #myInput {
            /*background-image: url('');*/
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 50%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }

        #myInput1 {
            /*background-image: url('');*/
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 50%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }

        #myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 18px;
        }

        #myTable th, #myTable td {
            text-align: left;
            padding: 12px;
        }

        #myTable tr {
            border-bottom: 1px solid #ddd;
        }

        #myTable tr.header, #myTable tr:hover {
            background-color: #f1f1f1;
        }
    </style>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

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

</head>
<body class="single-page causes-page">
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
                    <div class="donate-btn">
                        <a href="donor_registration.php">Donate Now</a>
                        <a href="login.php">Sign in</a>
                    </div><!-- .donate-btn -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .top-header-bar -->


    <div class="nav-bar">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="site-branding d-flex align-items-center">
                        <a class="d-block" href="index.php" rel="home"><img class="d-block" src="images/donation_hub_black_edit.png" alt="logo"></a>
                    </div><!-- .site-branding -->

                    <nav class="site-navigation d-flex justify-content-end align-items-center">
                        <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About us</a></li>
                            <li class="current-menu-item"><a href="bdonor_list.php">Blood Donor</a></li>
                            <li><a href="portfolio.php">Gallery</a></li>
                            <!-- <li><a href="news.php">News</a></li> -->
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </nav><!-- .site-navigation -->

                    <div class="hamburger-menu d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div><!-- .hamburger-menu -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .nav-bar -->
</header><!-- .site-header -->

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Blood Donor List</h1>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header -->

<div class="featured-cause">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-label-group">
                    <label for="city">City</label>
                    <select name="city" class="custom-select form-control" id="city">
                        <option value="0">Display All</option>
                        <?php
                        $sql1 = "select * from city";
                        $res1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_array($res1)) {
                            ?>
                            <option name="<?php echo $row1['c_name'] ?>"
                                    value="<?php echo $row1['c_id'] ?>">
                                <?php echo $row1['c_name'] ?></option>
                            <?php
                        }

                        ?>

                    </select>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-label-group">

                    <label for="Bg">BloodGroup :- </label><br>
                    <select name="bloodgroup" class="form-control" id="Bg">
                        <option value="0">Display All</option>
                        <option value="a+">A+</option>
                        <option value="a-">A-</option>
                        <option value="b+">B+</option>
                        <option value="b-">B-</option>
                        <option value="o+">O+</option>
                        <option value="o-">O-</option>
                        <option value="ab+">AB+</option>
                        <option value="ab-">AB-</option>
                    </select>
                </div>
            </div>
        </div><br><br>
        <!-- .section-heading -->


        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th>Phone</th>
                <th>BloodGroup</th>
                <th>Donate Point</th>


            </tr>


            </thead>
            <tbody id="Tabel_data">
            <?php

            $run = mysqli_query($conn, "select * from donor_register");
            while ($row = mysqli_fetch_assoc($run)) {
                $query1 = "select * from city where c_id=" . $row['city'];
                $result1 = mysqli_query($conn, $query1);
                if ($res1 = mysqli_fetch_assoc($result1)) {
                    $city = $res1['c_name'];
                }
                //        $query2="select * from area where area_id=".$row['area_name'];
                //        $result2=mysqli_query($conn,$query2);
                //        if($res2=mysqli_fetch_assoc($result2))
                //        {
                //            $area_name=$res2['area_name'];
                //        }
                ?>

                <tr>

                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $city ?></td>
                    <td><?php echo $row['contactno']; ?></td>
                    <td><?php echo $row['bloodgroup']; ?></td>
                    <?php 
                    $bg = $row['blood_reward']; 
                    ?>
                    
                    <td><?php
                    	for($i=1;$i<=$bg;$i++)
                    	{
                    		?>
                    		<i class="fa fa-heart" style="color:red;"></i>
                    	<?php
                    }
                    ?></td>
                </tr>

            <?php } ?>

            </tbody>
        </table>

    </div><!-- .container -->
</div><!-- .featured-cause -->
<?php mysqli_close($conn); ?>
<!--        -->
<!--            <table id="example1" class="table table-bordered table-striped">-->
<!--                <thead>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--               -->
<!--                </tbody>-->
<!--            </table>-->





<footer class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="foot-about">
                            <h2><a class="foot-logo" href="#"><img src="images/donation_hub_white_edit.png"  width="230"></a></h2>

                            <p style="text-align: justify;">No one is useless in this world who lightens the burdens of another. The real destroyer of the liberties of the people is he who spreads among them bounties, donations and benefits. You have not lived today until you have done something for someone who can never repay you. Donation for the society.</p>

                        </div><!-- .foot-about -->
                    </div><!-- .col -->
                        <div class="col-12 col-md-5 col-lg-2 mt-5 mt-md-0">
                       
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mt-5  mt-md-0">
                        <h2>Useful Links</h2>

                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="vol_registration.php">Become  a Volunteer</a></li>
                            <li><a href="donor_registration.php">Donate</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="bdonor_list.php">Blood Donor</a></li>
                            <li><a href="portfolio.php">Gallery</a></li>
                            <!-- <li><a href="news.php">News</a></li> -->
                        </ul>
                    </div><!-- .col -->

                    
                  
                    <div class="col-12 col-md-6 col-lg-3 mt-5 ml-md-5 mt-md-0">
                        <div class="foot-contact">
                            <h2>Contact</h2>

                            <ul>
                                <li><i class="fa fa-phone"></i><span>+91 96625333897</span></li>
                                <li><i class="fa fa-envelope"></i><span>info@srvmfoundation.com</span></li>
                                <li><i class="fa fa-map-marker"></i><span>310(Top Floor),"Triveni" Arcade, A. V. Road, Anand-388001</span></li>
                            </ul>
                        </div><!-- .foot-contact -->

                        <div class="subscribe-form">
                            <form class="d-flex flex-wrap align-items-center">
                                <input type="email" placeholder="Your email">
                                <input type="submit" value="send">
                            </form><!-- .flex -->
                        </div><!-- .search-widget -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .footer-widgets -->

        
    </footer><!-- .site-footer -->

<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/jquery.countdown.min.js'></script>
<script type='text/javascript' src='js/circle-progress.min.js'></script>
<script type='text/javascript' src='js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='js/jquery.barfiller.js'></script>
<script type='text/javascript' src='js/custom.js'></script>
<script src="jquery.js"></script>
<script>
    $(document).ready(function () {
        $("#city").change(function () {
            var city = $("#city").val();
            var blood = $("#Bg").val();

            if (blood !== "0") {

                var pos = $.post("datares.php", {city: city, blood: blood});
                pos.done(function (data) {
                    $("#Tabel_data").html(data);
                });
            }
            else if(city==="0")
            {
                var pos1 = $.post("datares.php", {city: city});
                pos1.done(function (data) {
                    $("#Tabel_data").html(data);
                });
            }
            else {

                var pos2 = $.post("datares.php", {city: city});
                pos2.done(function (data) {
                    $("#Tabel_data").html(data);
                });
            }


        });
        $("#Bg").change(function () {
            var city = $("#city").val();
            var blood = $("#Bg").val();

            if (city !== "0") {

                var pos = $.post("datares.php", {city: city, blood: blood});
                pos.done(function (data) {
                    $("#Tabel_data").html(data);
                });
            }
            else if(blood==="0")
            {
                var pos1 = $.post("datares.php", {blood: blood});
                pos1.done(function (data) {
                    $("#Tabel_data").html(data);
                });
            }

            else {

                var pos2 = $.post("datares.php", {blood: blood});
                pos2.done(function (data) {

                    $("#Tabel_data").html(data);
                });
            }
        });
    });
</script>

</body>
</html>