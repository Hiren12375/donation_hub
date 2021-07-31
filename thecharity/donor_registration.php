<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
require 'PHPMailer-5.2.27/PHPMailerAutoload.php';
require 'PHPMailer-5.2.27/class.smtp.php';

include("config.php");
if (isset($_POST['add'])) 
{
    $sql="select * from donor_register where email='".$_POST['inputEmail']."'";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    $err="";
    if($_POST['firstName']=="")
    {
        $err="Required field";
    }
    else if(!preg_match("/^[a-z A-Z]+$/",$_POST['firstName']))
    {
        $err="only alphabets are allowed.";
    }
    else
    {
        $firstname = $_POST['firstName'];
    }

    filter_var($_POST['inputEmail'],FILTER_SANITIZE_EMAIL);
    if(empty($_POST['inputEmail']))
    {
        $mailerr="Required field.";
    }
    else if(!filter_var($_POST['inputEmail'],FILTER_VALIDATE_EMAIL))
    {
        $mailerr="Email must be in proper format.";
    }
    else if($count>0)
    {
        $mailerr="Email Is Already Exist ";
    }
    else
    {
        $email=$_POST['inputEmail'];
    }

    if($_POST['inputPassword']=="")
    {
        $passerr="Required field";
    }
    else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $_POST['inputPassword']))
    {
        $passerr="Password Have 8 To 12 Characters and Must Contain At Least  One Capital Letters Small Letter and One Spacial Characters";
    }
    else
    {
        $password = $_POST['inputPassword'];
    }


    if($_POST['confirmPassword']=="")
    {
        $conpaaerr="Required field";
    }
    else if(strcasecmp($_POST['inputPassword'],$_POST['confirmPassword']))
    {
        $conpaaerr="Confirm Password Must Same As Password.";
    }
    else
    {
        $conpaa = $_POST['confirmPassword'];
    }

     if($_POST['inputcontactno']=="")
     {
         $mobileerr="Required field";
     }
     else if(!preg_match('/^[0-9]{10}$/',$_POST['inputcontactno']))
     {
         $mobileerr=".Only 10 Digits Are Allowed ";
     }
     else
     {
         $mobile = $_POST['inputcontactno'];
     }

    if($_POST['inputAddress']=="")
    {
        $Adderr="Required field";
    }
    else
    {
        $address = $_POST['inputAddress'];
    }


    if(empty($_FILES['file']['name']))
    {
        $fileerr="Please Select File";
    }
    else
    {
        $file = time() . "_" . $_FILES['file']['name'];
        $temp_name = $_FILES['file']['tmp_name'];
        $folder = "images/donor/" . $file;
    }

    if($_POST['bloodgroup']=="no")
    {
        $bloodgrouperr="Please Select Blood Group";
    }
    else
    {
        $bloodgroup = $_POST['bloodgroup'];
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
    if(empty($_POST['date']))
    {
        $birthdateerr="Required Field";
    }
    else
    {
        $birthdate = $_POST['date'];
    }

    $gender = $_POST['gender'];





if(empty($err) && empty($mailerr) && empty($fileerr) && empty($bloodgrouperr) && empty($passerr) && empty($conpaaerr) && empty($Adderr) && empty($cityerr) && empty($areaerr) && empty($birthdateerr))
{


    $sql = "insert into donor_register(firstname,email,password,contactno,address,city,area_name,bloodgroup,gender,birthdate,pic)values('$firstname','$email','$password','$mobile','$address','$city','$area','$bloodgroup','$gender','$birthdate','$folder')";


        $result = mysqli_query($conn, $sql);
        $last_id=mysqli_insert_id($conn);
        if ($result && move_uploaded_file($temp_name, $folder))
        {

            $base_url = "http://localhost/D_H/thecharity/verified.php";


            $body = "please open link to verified ur email-" . $base_url . "?donor_id=".$last_id;
            echo $body;
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "donationhub2@gmail.com";
            $mail->Password = "donate123";
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->addAddress($email);


            $mail->isHTML(true);
            $mail->Body = $body;
            $mail->Subject = "Email Verification";
            $mail->setFrom("donationhub2@gmail.com","Donation Hub");

            if (!$mail->send())
             {
                echo "error: " . $mail->ErrorInfo;
            }
            else
            {
                echo "Email sent";
                header('Location:login.php');
            }

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

    <!-- Bootstrap CSS -->
<!--    <link rel="stylesheet" href="css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

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
    <link rel="stylesheet" type="text/css" href="admin/jquery.datetimepicker.min.css"/>
    <style>
        .field-icon {
            float: right;
            margin-left: -27px;
            margin-top: -27px;
            margin-right: 5px;

            position: relative;
            z-index: 2;
        }


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
                        <a class="d-block" href="index.php" rel="home"><img class="d-block" src="images/donation_hub_black_edit.png" alt="logo"></a>
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
                <h1>Donor Registration</h1>
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
                <div class="card-header">Register an Account</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           
                                    <div class="form-label-group">
                                        <label for="firstName">First name</label>
                                        <input type="text" name="firstName"  class="form-control"
                                               placeholder="First name"  value="<?php if(isset($firstname)) echo $firstname ?>" >
                                    </div>
                            <span class="error text-danger"><?php if(isset($err)) echo "*".$err; ?></span>
                                
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputEmail">Email address</label>
                                <input type="text" name="inputEmail" class="form-control" placeholder="Email address" value="<?php if(isset($email)) echo $email ?>">
                            </div>
                            <span class="error text-danger"><?php if(isset($mailerr)) echo "*".$mailerr; ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="inputPassword">Password</label>
                                        <input type="password" name="inputPassword" class="form-control"
                                               placeholder="Password" id="Password"  value="<?php if(isset($password)) echo $password ?>">

                                        <span  class="fa fa-fw fa-eye field-icon toggle-password" id="Show_Password"></span>
                                    </div>
                                    <span class="error text-danger"><?php if(isset($passerr)) echo "*".$passerr; ?></span>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="confirmPassword">Confirm password</label>
                                        <input type="password" name="confirmPassword" class="form-control"
                                               placeholder="Confirm password" id="con_pass" value="<?php if(isset($conpaa)) echo $conpaa ?>" >
                                        <span  class="fa fa-fw fa-eye field-icon toggle-password" id="Show_Password1"></span>
                                    </div>
                                    <span class="error text-danger"><?php if(isset($conpaaerr)) echo "*".$conpaaerr; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="gender">Gender</label><br>
                                <input type="radio" name="gender" value="male" checked> Male
                                <input type="radio" name="gender" value="female"> Female
                                <input type="radio" name="gender" value="other"> Other
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputcontactno">Contact no</label>
                                <input type="text" name="inputcontactno" class="form-control"
                                       placeholder="Contact no" value="<?php if(isset($mobile)) echo $mobile ?>">
                            </div>
                            <span class="error text-danger"><?php if(isset($mobileerr)) echo "*".$mobileerr; ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputAddress">Address</label>
                                <textarea rows="5" name="inputAddress" class="form-control" placeholder="Address"><?php if(isset($address)) echo $address?></textarea>
                            </div>
                            <span class="error text-danger"><?php if(isset($Adderr)) echo "*".$Adderr; ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="city">City</label>
                                        <select name="city" class="custom-select form-control" id="city">
                                            <option value="0">SELECT CITY</option>
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
                                    <span class="error text-danger"><?php if(isset($cityerr)) echo "*".$cityerr; ?></span>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="area">Area</label><br>
                                        <select name="area" class="custom-select form-control" id="area">
                                            <option value="0">SELECT AREA</option>
                                        </select>
                                    </div>
                                    <span class="error text-danger"><?php if(isset($areaerr)) echo "*".$areaerr; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="b'd">BirthDate :- </label><br>
                                        <input type="text" name="date" class="form-control" placeholder="date"  id="datetimepicker1"
                                               autocomplete="true">
                                    </div>
                                    <span class="error text-danger"><?php if(isset($birthdateerr)) echo "*".$birthdateerr; ?></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">

                                        <label for="Bg">BloodGroup :- </label><br>
                                        <select name="bloodgroup" class="form-control" id="Bg">
                                            <option value="no">---Select Blood Group---</option>
                                            <option value="a+">A+</option>
                                            <option value="a-">A-</option>
                                            <option value="b+">B+</option>
                                            <option value="b-">B-</option>
                                            <option value="o+">O+</option>
                                            <option value="o-">O-</option>
                                            <option value="ab">AB</option>
                                            <option value="ab">AB-</option>
                                        </select>
                                    </div>
                                    <span class="error text-danger"><?php if(isset($bloodgrouperr)) echo "*".$bloodgrouperr; ?></span>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-label-group">
                                        <label for="Type"> Profile pic :- </label>
                                        <input type="file" name="file" class="form-control"
                                              >
                                    </div>
                                    <span class="error text-danger"><?php if(isset($fileerr)) echo "*".$fileerr; ?></span>

                                </div>
                                

                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="add" class="btn gradient-bg btn-block" value="Register"
                                   align="absbottom">
                        </div>


                    </form>
                </div>
            </div>
        </div><!-- .col -->


    </div><!-- .row -->
</div><!-- .container -->
<!--</div>-->
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

<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/jquery.countdown.min.js'></script>
<script type='text/javascript' src='js/circle-progress.min.js'></script>
<script type='text/javascript' src='js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='js/jquery.barfiller.js'></script>
<script type='text/javascript' src='js/custom.js'></script>
<script src="jquery.js"></script>
<script src="admin/jquery.datetimepicker.js"></script>

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
        $('#datetimepicker1').datetimepicker({
            timepicker:false,
            format:"Y-m-d"
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#Show_Password").click(function () {
            var Type=$('#Password').attr('type');

            if(Type==="password")
            {
                $('#Password').attr('type',"text");

            }
            else {
                $('#Password').attr('type', "password");

            }

        });
        $("#Show_Password1").click(function () {

            var Type1=$('#con_pass').attr('type');
            if(Type1==="password")
            {

                $('#con_pass').attr('type',"text");
            }
            else {

                $('#con_pass').attr('type', "password");
            }

        })

    });
</script>

</body>
</html>