<?php
session_start();

//print_r($_SESSION);
include("config.php");
if (isset($_POST['login'])) {


    $type = $_POST['type'];

    if(empty($_POST['email']))
    {
        $emailerr="Required Field";
    }
    else
    {
        $user = $_POST['email'];
    }

    if(empty($_POST['password']))
    {

        $passerr="Required Field";
    }
    else
    {
        $pass = $_POST['password'];
    }
    if($_POST['type']=="0")
    {
        $typeerr="Please Select Type";
    }
    else
    {
        $type = $_POST['type'];
    }

    if(empty($emailerr) && empty($passerr) && empty($typeerr)) {


        if ($type == 'volunteer') {
            $qry = "select * from volunteer_register where email='$user' and password='$pass'";


            if ($res = mysqli_query($conn, $qry)) {
                if ($result = mysqli_fetch_assoc($res)) {
                    if ($result['verified'] == 'verified') {
                        if ($result['admin_accept'] == 1) {


                            print_r($result);
                            $_SESSION['volunteer']['area'] = $result['area_name'];
                            $_SESSION['volunteer']['id'] = $result['volunteer_id'];
                            header('location:volunteer.php');
                        } else {
                            $err = "Your Registration Process Pending By the System";

                        }
                    } else {
                        $err = "Your Verification is Pending First go to email and verified";


                    }
                }
                else {
                    $Msg = "Your Email Address Or Password Is Wrong";

                }
            }
        } 
        elseif ($type == 'donor') 
        {
            $qry = "select * from donor_register where email='$user' and password='$pass'";

            if ($res = mysqli_query($conn, $qry))
             {
                if ($result = mysqli_fetch_assoc($res))
                 {
                    if ($result['verified'] == 'verified') 
                    {
                        if ($result['admin_accept'] == 1) 
                        {


                            print_r($result);
                            $_SESSION['donor']['area'] = $result['area_name'];
                            $_SESSION['donor']['id'] = $result['donor_id'];
                            $_SESSION['donor']['name'] = $result['firstname'];
                            header('location:donor.php');
                        } 
                        else
                         {
                            $err = "Your Registration Process Pending By the System";

                        }
                    } 
                    else 
                    {
                        $err = "Your Verfication is Pending First go to email and verified";


                    }

                }
                else 
                {
                    $Msg = "Your Email Address Or Password Is Wrong";

                }
            }
        }

    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donation Hub</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

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
        <style>
            .field-icon {
                float: right;
                margin-left: -27px;
                margin-top: -27px;
                margin-right: 5px;

                position: relative;
                z-index: 2;
            }

            /*.container{*/
                /*padding-top:50px;*/
                /*margin: auto;*/
            /*}*/
    </style>

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
                        <a class="d-block" href="index.php" rel="home"><img class="d-block" src="images/donation_hub_black_edit.png"
                                                                            alt="logo"></a>
                    </div><!-- .site-branding -->

                    <nav class="site-navigation d-flex justify-content-end align-items-center">
                        <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                            <li class="current-menu-item"><a href="index.php">Home</a></li>
                            <li><a href="about.php">About us</a></li>
                                                        <li><a href="bdonor_list.php">Blood Donor</a></li>
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
                <h1>Login</h1>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header -->

<div class="welcome-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <img src="images/D Photos/Food donation/images.png">
            </div><!-- .col -->

            <div class="col-12 col-lg-6 order-2 order-lg-1">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="login.php" method="post" onsubmit="alert($err)">
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputEmail">Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="Email address" value="<?php if(isset($user)) echo $user?>">
                            </div>
                            <span class="error text-danger"><?php if(isset($emailerr)) echo "*".$emailerr; ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputPassword">Password</label>

                                <input type="password" name="password" id="Password" class="form-control"
                                       placeholder="Password"  value="<?php if(isset($pass)) echo $pass?>" >
                                <span  class="fa fa-fw fa-eye field-icon toggle-password" id="Show_Password"></span>


                            </div>
                            <span class="error text-danger"><?php if(isset($Msg)) {echo "*".$Msg;} elseif (isset($passerr)) { echo "*".$passerr;} ?></span>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="type">Type</label><br>
                                    <select name="type" class="form-control" id="type">
                                        <?php
                                        if($type=="volunteer")
                                        {
                                            ?>
                                            <option value="0">--Select Type--</option>
                                            <option value="volunteer" selected>Volunteer</option>
                                            <option value="donor">Donor</option>
                                        <?php
                                        }
                                        elseif ($type=="donor")
                                        {
                                            ?>
                                            <option value="0">--Select Type--</option>
                                            <option value="volunteer">Volunteer</option>
                                            <option value="donor" selected>Donor</option>
                                        <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="0">--Select Type--</option>
                                            <option value="volunteer">Volunteer</option>
                                            <option value="donor" >Donor</option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <span class="error text-danger"><?php if(isset($typeerr)) echo "*".$typeerr; ?></span>
                            </div>
                            
                            <input type="submit" name="login" class="btn gradient-bg btn-block" value="Sign in">
                    </form>
                </div>
                    <div class="text-center">
                        <a class="d-block small mt-3" href="donor_registration.php" style="text-decoration: none;">Register an Account</a>
                        <a class="d-block small" href="forget_pass.php" style="text-decoration: none;">Forgot Password?</a>
                    </div>

                </div><!-- .col -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->

    
    
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
    <script src="js/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var err = "<?php echo $err;?>";
            if (err !== "") {
                alert(err);
            }

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#Show_Password").click(function () {
                var Type = $('#Password').attr('type');
                // var Type1=$('#con_pass').attr('type');
                if (Type === "password") {
                    $('#Password').attr('type', "text");
                    //$('#con_pass').attr('type',"text");
                } else {
                    $('#Password').attr('type', "password");
                    // $('#con_pass').attr('type', "password");
                }

            })

        });
    </script>

</body>
</html>