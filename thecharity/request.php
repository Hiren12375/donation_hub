<?php
session_start();
include("config.php");
$donor_id = $_SESSION['donor']['id'];
if (isset($_POST['add']))
{
    
    $err="";
    $quantity="";
    if($_POST['name']=="")
    {
        $err="Required field";
    }
    else if(!preg_match("/^[a-z A-z]+$/",$_POST['name']))
    {
        $err="only alphabets are allowed.";
    }
    else
    {
        $firstname = $_POST['name'];
    }

    filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    if(empty($_POST['email']))
    {
        $mailerr="Required field.";
    }
    else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
        $mailerr="Email must be in proper format.";
    }
    
    else
    {
        $email=$_POST['email'];
    }

    
     if($_POST['cno']=="")
     {
         $mobileerr="Required field";
     }
     else if(!preg_match('/^[0-9]{10}$/',$_POST['cno']))
     {
         $mobileerr=".Only 10 Digits Are Allowed ";
     }
     else
     {
         $mobile = $_POST['cno'];
     }

    if($_POST['address']=="")
    {
        $Adderr="Required field";
    }
    else
    {
        $address = $_POST['address'];
    }
    
    if($_POST['city']=="0")
    {
        $cityerr="Please Select City";
    }
    else
    {
        $city = $_POST['city'];
    }
    if($_POST['area']=="0")
    {
        $areaerr="Please Select Area";
    }
    else
    {
        $area = $_POST['area'];
    }

    if($_POST['type']=="0")
    {
        $typeerr="Please Select Type";
    }
    else
    {
        $type = $_POST['type'];
    }
    if($_POST['sub_cat']=="0")
    {
        $suberr="Please Select sub type";
    }
    else
    {
        $sub_type = $_POST['sub_cat'];
    }


    
    $gender = $_POST['gender'];
    
    
    $quantity=$_POST['quantity'];
    


if(empty($err) && empty($mailerr) && empty($mobileerr) && empty($Adderr)  && empty($cityerr) &&empty($areaerr) && empty($typeerr) && empty($suberr))
{
    $sql = "insert into request(name,email,gender,contact,city,area,address,type,sub_type,quantity)values('$firstname','$email','$gender','$mobile','$city','$area','$address','$type','$sub_type','$quantity')";
        
        $result = mysqli_query($conn, $sql);
        $last_id=mysqli_insert_id($conn);
        if ($result) 
        {

            echo "Register Successfully";
        } 
        else
         {
            echo "smthing went wrong...!";
        }
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donation Hub</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="admin/jquery.datetimepicker.min.css"/>

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
                <h1>Request</h1>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header -->

<div class="welcome-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <img src="images/D Photos/Blood Donation/wallpaper.jpg.jpg"><br>
                <img src="images/D Photos/cloth donation/1cb335b637ded38f37354895fd9c624a.jpeg">
            </div><!-- .col -->

            <div class="col-12 col-lg-6 order-2 order-lg-1">
                <div class="card-header">Request For Donation</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           
                                    <div class="form-label-group">
                                        <label for="firstName">Name</label>
                                        <input type="text" name="name"  class="form-control"
                                               placeholder="First name"  value="<?php if(isset($firstname)) echo $firstname ?>">
                                    </div>
                                    <span class="error text-danger"><?php if(isset($err)) echo "*".$err; ?></span>
                                
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email address" value="<?php if(isset($email)) echo $email ?>">
                            </div>
                            <span class="error text-danger"><?php if(isset($mailerr)) echo "*".$mailerr; ?></span>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="gender">Gender</label><br>
                                <input type="radio" name="gender" value="Male" checked> Male
                                <input type="radio" name="gender" value="Female"> Female
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputcontactno">Contact No</label>
                                <input type="text" name="cno" class="form-control"
                                       placeholder="Contact no"  value="<?php if(isset($mobile)) echo $mobile ?>">
                            </div>
                             <span class="error text-danger"><?php if(isset($mobileerr)) echo "*".$mobileerr; ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputAddress">Address</label>
                                <textarea rows="5" name="address" class="form-control" placeholder="Address"><?php if(isset($address)) echo $address?></textarea>
                            </div>
                            <span class="error text-danger"><?php if(isset($Adderr)) echo "*".$Adderr; ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="city">City</label>
                                        <select name="city" class="custom-select form-control" id="city">
                                            <option value="0">---SELECT CITY---</option>
                                            <?php
                                            $sql1="select * from city";
                                            $res1=mysqli_query($conn,$sql1);
                                            while ($row1 = mysqli_fetch_array($res1)) {
                                                ?>
                                                <option name="<?php echo $row1['c_name'] ?>"
                                                        value="<?php echo $row1['c_id'] ?>" >
                                                    <?php echo $row1['c_name'] ?></option>
                                                <?php
                                            }

                                            ?>

                                        </select>
                                    </div>
                                    <span class="error text-danger"><?php if(isset($cityerr)) echo $cityerr; ?></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="pincode">Area</label>
                                        <select name="area" class="custom-select form-control" id="area">
                                            <option value="0">---SELECT AREA---</option>
                                        </select>
                                    </div>
                                    <span class="error text-danger"><?php if(isset($areaerr)) echo $areaerr; ?></span>
                                </div>
                            </div>
                        </div>

                    <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="Type">Donation_type</label>
                                        <select name="type" class="custom-select form-control" id="Type">
                                            <option value="0">--SELECT DONATION TYPE--</option>
                                            <?php
                                            $sql = "select * from services";
                                            $res = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_array($res)) {
                                                ?>
                                                <option name="<?php echo $row['service_name'] ?>"
                                                        value="<?php echo $row['service_name'] ?>" >
                                                    <?php echo $row['service_name'] ?></option>
                                                <?php
                                            }

                                            ?>

                                        </select>
                                    </div>
                                    <span class="error text-danger"><?php if(isset($typeerr)) echo $typeerr; ?></span>
                                </div>
                                <div class="col-md-6">

                                    <label for="sub_cat">Sub catagory</label><br>
                                    <select name="sub_cat" class="custom-select custom-control" id="sub_cat">
                                        <option value="0">SELECT DONATION SUB-TYPE</option>
                                    </select>
                                        <span class="error text-danger"><?php if(isset($suberr)) echo $suberr; ?></span>
                                </div>
                                
                            </div>
                        </div>
    <div class="form-group">


                            <div class="form-label-group" >
                                <label for="quantity">Quantity</label>
                                <input type="text" name="quantity" class="form-control" placeholder="quantity"
                                       id="demo"  disabled>
                              
                            </div>

                        </div>

                        

                        <div class="form-group">
                            <input type="submit" name="add" class="btn btn-danger border-0 btn-block" value="Register"
                                   align="absbottom">
                        </div>


                    </form>
                </div>
            </div>
        </div><!-- .col -->


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
<script src="admin/jquery.min.js"></script>

<script src="admin/jquery.datetimepicker.js"></script>
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/jquery.countdown.min.js'></script>
<script type='text/javascript' src='js/circle-progress.min.js'></script>
<script type='text/javascript' src='js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='js/jquery.barfiller.js'></script>
<script type='text/javascript' src='js/custom.js'></script>
<script src="js/jquery.min.js"></script>

<script>
    $(document).ready(function () {

        $("#Type").change(function () {

            var sub_cat_1 = $("#Type").val();
            //var sub_cat_name = $("#Type").val();
            // var name = $("#Type").attr("name");
        alert(sub_cat_1);
            


            var pos = $.post("datares.php", {sub_cat_1: sub_cat_1});
            $("#sub_cat").empty();
            pos.done(function (data) {
                $("#sub_cat").append(data);
            });
            if(sub_cat_1==="Cloth"  )
            {
                $('#demo').attr('disabled', false);
            }
            else
            {
                $('#demo').attr('disabled', true);
            }
        });

    });
</script>
<script>
    $(document).ready(function () {
        $("#city").change(function () {
           var c_id=$("#city").val();
           var pos=$.post("datares.php",{c_id:c_id});
           $("#area").empty();
           pos.done(function (data) {
               $("#area").append(data);
           });

        });
    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datetimepicker').datetimepicker(
            {
                format:'Y-m-d',
                timepicker:false
            });
        
    });
</script>
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