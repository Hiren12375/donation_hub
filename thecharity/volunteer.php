<?php
session_start();
require "config.php";
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
<body class="single-page about-page">
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
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .top-header-bar -->

    <div class="nav-bar">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="site-branding d-flex align-items-center">
                        <a class="d-block" href="index.php" rel="home"><img class="d-block" src="images/donation_hub_black_edit.png"
                                                                            alt="logo"></a>
                    </div><!-- .site-branding -->

                    <nav class="site-navigation d-flex justify-content-end align-items-center">
                        <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                            <li class="current-menu-item"><a href="volunteer.php">Home</a></li>
                            <li><a href="Manage_volunteer_profile.php">Manage Profile</a></li>
                            <li><a href="acceptList.php">Accept</a></li>
                            <li><a href="requestList.php">Request</a></li>
                            <li><a href="user_request.php">User Request</a></li>
                            <!-- <li><a href="volunteergallary.php">Gallery</a></li> -->
                            <?php
                                $sql="select * from event_handler where volunteer_id=$volunteer_id";
                                $res=mysqli_query($conn,$sql);
                                if($res){
                                    $count=mysqli_num_rows($res);
                                    if($count>=1){
                                        ?>
                            <li><a href="event_handler_login.php">Event Handler</a></li>
                            <?php
                                    }
                                }
                            ?>

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
                <h1>Hello</h1>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header -->

<div class="welcome-wrap" align="center">
    <div class="container" align="center">
        <div class="row">
            <!-- dp -->
            <div class="col-md-5 w3l_dpdown5">
                <h3><b> Donation Process </b></h3>
            </div>
            <div class="aboutdown1">
                <img src="images/Donation.jpg" class="aboutdown1" height="450" width="1725">
            </div>
            <div class="clearfix"></div>
            <!--//dp-->

        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .home-page-icon-boxes -->

<div class="about-stats">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="circular-progress-bar">
                    <div class="circle" id="loader_1">
                        <strong class="d-flex justify-content-center"></strong>
                    </div>

                    <h3 class="entry-title">Hard Work</h3>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="circular-progress-bar">
                    <div class="circle" id="loader_2">
                        <strong class="d-flex justify-content-center"></strong>
                    </div>

                    <h3 class="entry-title">Pure Love</h3>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="circular-progress-bar">
                    <div class="circle" id="loader_3">
                        <strong class="d-flex justify-content-center"></strong>
                    </div>

                    <h3 class="entry-title">Smart Ideas</h3>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="circular-progress-bar">
                    <div class="circle" id="loader_4">
                        <strong class="d-flex justify-content-center"></strong>
                    </div>

                    <h3 class="entry-title">Good Decisions</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-testimonial">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-5">
                <div class="testimonial-cont">
                    <div class="entry-content">
                        <p>We love to help all the children that have problems in the world. After 15 years we have many
                            goals achieved.</p>
                    </div>

                    <div class="entry-footer d-flex flex-wrap align-items-center mt-5">
                        <img src="images/testimonial-1.jpg" alt="">

                        <h4>Maria Williams, <span>Volunteer</span></h4>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 offset-lg-2 col-lg-5">
                <div class="testimonial-cont">
                    <div class="entry-content">
                        <p>We love to help all the children that have problems in the world. After 15 years we have many
                            goals achieved.</p>
                    </div>

                    <div class="entry-footer d-flex flex-wrap align-items-center mt-5">
                        <img src="images/testimonial-2.jpg" alt="">

                        <h4>Cristian James, <span>Volunteer</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="help-us">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                <h2>Help us so we can help others</h2>

                <a class="btn orange-border" href="donor_registration.php">Donate now</a>
            </div>
        </div>
    </div>
</div>


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
</body>
</html>