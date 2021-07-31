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
<body class="single-page portfolio">
    <header class="site-header">
        <div class="top-header-bar">
            <div class="container">
                <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">
                    <div class="col-12 col-lg-8 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                        <div class="header-bar-email">
                            MAIL: <a href="#">contact@ourcharity.com</a>
                        </div><!-- .header-bar-email -->

                        <div class="header-bar-text">
                            <p>PHONE: <span>+24 3772 120 091 / +56452 4567</span></p>
                        </div><!-- .header-bar-text -->
                    </div><!-- .col -->

                    <div class="col-12 col-lg-4 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                        <div class="donate-btn">
                            <a href="registration.php">Donate Now</a>
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
                                <li><a href="bdonor_list.php">Blood Donor</a></li>
                                <li class="current-menu-item"><a href="portfolio.php">Gallery</a></li>
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
                    <h1>Gallery</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="portfolio-wrap">
        <div class="container">
            <div class="row portfolio-container">
                <?php 
                include("config.php");
                        $sql="select * from gallery";
                        $ex=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($ex))
                        {
                            $image=substr($row['photo'],3);
                           // echo $image;
                        ?>
                <div class="col-12 col-md-6 col-lg-4 portfolio-item">
                     
                    <div class="portfolio-cont">

                        <img src="<?php echo $image;?>">

                        <!-- <h3 class="entry-title"><?php echo $row['description'];?></h3> -->
                       <!-- <h4>2018 Causes</h4> -->
                    </div>
                
                </div>
<?php }?>
                

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

</body>
</html>