<?php
session_start();
require "config.php";
$id = $_GET['event_id'];

$donor_id = $_SESSION['donor']['id'];

if(!isset($_SESSION['donor']['id']))
    header('location:login.php');

$sql = "select * from upcoming_event where event_id=$id";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);

$sql1 = "select * from donor_register where donor_id=$donor_id";
$res1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($res1);


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
                    <div class="donate-btn">
                       <?php
                    if (isset($_SESSION['volunteer']['id']) || isset($_SESSION['donor']['id'])) {
                        ?>
                        <div class="donate-btn ml-5">
                            <a id="logout">Sign Out</a>
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
                            <li class="current-menu-item"><a href="donor.php">Home</a></li>
                            <li><a href="Manage_donor_profile.php">Manage profile</a></li>
                            <li><a href="user_request.php">User Request</a></li>
                            <!-- <li><a href="donorgallary.php">Gallery</a></li> -->
                            <li><a href="calender.php">Events</a></li>
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
                <h1>Donate</h1>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header -->

<div class="welcome-wrap">
    <div class="container">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php  echo $_GET['event_id']; ?>" id="event_id">
            <input type="hidden" name="donor_id" value="<?php  echo $donor_id ?>" id="donor_id">
            <div class="row">

                <div class="col-12 col-lg-6 order-1 order-lg-2">
                    <div class="card-header">Events Details</div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputEventname">Event Name</label>
                                <input type="text" class="form-control" placeholder="Event Name"
                                       value="<?php echo $row['event_name'] ?>"
                                      disabled  required="required" autofocus="autofocus" id="event_name">
                                <input type="hidden"   value="<?php echo $row['event_name'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="b'd">Start Date</label><br>
                                <input type="text" id="start_date" class="form-control" placeholder="date"
                                       value="<?php echo $row['event_date'] ?>"
                                       disabled required="required" autofocus="autofocus">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="enddate">End Date</label><br>
                                <input type="text" id="end_date" class="form-control" placeholder="date"
                                       value="<?php echo $row['end_date'] ?>"
                                       disabled required="required" autofocus="autofocus">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputplace">Place</label>
                                <input type="text" id="Place" class="form-control" placeholder="Place"
                                       value="<?php echo $row['event_place'] ?>"
                                       disabled required="required">
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->


                <div class="col-12 col-lg-6 order-2 order-lg-1">
                    <div class="card-header">Personal Info</div>
                    <div class="card-body">
                        <!--          <form action="" method="post">-->
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputname">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name"
                                       disabled value="<?php echo $row1['firstname'] ?>"
                                       required="required" autofocus="autofocus">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputaddress">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address"
                                       disabled value="<?php echo $row1['address'] ?>"
                                       required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputemail">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="email"
                                       disabled value="<?php echo $row1['email'] ?>"
                                       required="required" autofocus="autofocus">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputmobileno">Mobile No</label>
                                <input type="text" name="mobileno" class="form-control" placeholder="Mobile no"
                                       disabled value="<?php echo $row1['contactno'] ?>"
                                       required="required">
                            </div>
                        </div>


                    </div><!-- .col -->
                </div>
            </div>
            <br><br>

        </form>
        <div class="">
            <!--                <center><input type="submit" align="middle" name="Submit"-->
            <!--                               class="btn btn-secondary btn-group-vertical border-0"-->
            <!--                               value="Submit"></center>-->

            <center> <button class="btn gradient-bg btn-block" align="middle" id="btnsub">Submit</button>
            </center>

            <br>
        </div>

    </div>
</div>


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
                        <p>We love to help all the children that have problems in the world. After 15 years we have
                            many goals achieved.</p>
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
                        <p>We love to help all the children that have problems in the world. After 15 years we have
                            many goals achieved.</p>
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

                <a class="btn orange-border" href="#">Donate now</a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--<script type='text/javascript' src='js/jquery.js'></script>-->
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/jquery.countdown.min.js'></script>
<script type='text/javascript' src='js/circle-progress.min.js'></script>
<script type='text/javascript' src='js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='js/jquery.barfiller.js'></script>
<script type='text/javascript' src='js/custom.js'></script>
<script>

    $(document).ready(function () {
        
        $("#btnsub").click(function () {
            var donor_id=$("#donor_id").val();
            var event_id=$("#event_id").val();

            var pos=$.post("subData.php",{donor_id:donor_id,event_id:event_id});
            pos.done(function (data) {
                if(data==="ok")
                {
                    alert("your registration is completed..");
                    window.location.href="donor.php";
                }
            })



        })
    })
</script>
<script>
    $(document).ready(function () {
        $("#logout").click(function () {
            var data_donor="donor";
            var pos=$.post("subData.php",{data_donor:data_donor});
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