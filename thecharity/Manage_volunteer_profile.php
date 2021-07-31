<?php
session_start();
require "config.php";
if(empty($_SESSION['volunteer']['id']))
{
 header("");
}
else {


    $volunteer_id = $_SESSION['volunteer']['id'];
    $sql2 = "select * from volunteer_register where volunteer_id=" . $volunteer_id;
    $res2 = mysqli_query($conn, $sql2);
    if ($row2 = mysqli_fetch_array($res2)) {
        $vol_name = $row2['firstname'];
        $vol_email = $row2['email'];
        $vol_pass = $row2['password'];
        $vol_conpass = $row2['password'];
        $vol_gender = $row2['gender'];
        $vol_contact_nos = $row2['contactno'];
        $vol_address = $row2['address'];
        $vol_city = $row2['city'];
        $vol_area = $row2['area_name'];
        $vol_birth_date = $row2['birthdate'];
        $vol_blood_group = $row2['bloodgroup'];



    }
}
if (isset($_POST['add'])) {
    $err = "";
    if ($_POST['firstName'] == "") {
        $err = "Required field";
    } else if (!preg_match("/^[a-zA-z]+$/", $_POST['firstName'])) {
        $err = "only alphabets are allowed.";
    } else {
        $firstname = $_POST['firstName'];
    }

    filter_var($_POST['inputEmail'], FILTER_SANITIZE_EMAIL);
    if (empty($_POST['inputEmail'])) {
        $mailerr = "Required field.";
    } else if (!filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL)) {
        $mailerr = "Email must be in proper format.";
    } else {
        $email = $_POST['inputEmail'];
    }

    if ($_POST['inputPassword'] == "") {
        $passerr = "Required field";
    } else if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $_POST['inputPassword'])) {
        $passerr = "Password Have 8 To 12 Characters and Must Contain At Least  One Capital Letters Small Letter and One Spacial Characters";
    } else {
        $password = $_POST['inputPassword'];
    }


    if ($_POST['confirmPassword'] == "") {
        $conpaaerr = "Required field";
    } else if (strcasecmp($_POST['inputPassword'], $_POST['confirmPassword'])) {
        $conpaaerr = "Confirm Password Must Same As Password.";
    } else {
        $conpaa = $_POST['confirmPassword'];
    }

    if ($_POST['inputcontactno'] == "") {
        $mobileerr = "Required field";
    } else if (!preg_match('/^[0-9]{10}$/', $_POST['inputcontactno'])) {
        $mobileerr = ".Only 10 Digits Are Allowed ";
    } else {
        $mobile = $_POST['inputcontactno'];
    }

    if ($_POST['inputAddress'] == "") {
        $Adderr = "Required field";
    } else {
        $address = $_POST['inputAddress'];
    }


    if (!$_FILES['file']['name']) {
        $fileerr = "Please Select File";
    } else {
        $file = time() . "_" . $_FILES['file']['name'];
    }

    if ($_POST['bloodgroup'] == "no") {
        $bloodgrouperr = "Please Select Blood Group";
    } else {
        $bloodgroup = $_POST['bloodgroup'];
    }
    $city=$_POST['city'];
    $area=$_POST['area'];
    $gender=$_POST['gender'];
    $bod=$_POST['date'];
    if(isset($firstname) && isset($address) && isset($mobile)  && isset($email)  && isset($password) && isset($bloodgroup)  && isset($city) && isset($area)){
        $sql1="update volunteer_register set firstname='$firstname',email='$email', password='$password',contactno='$mobile',address='$address',city='$city',area_name='$area',bloodgroup='$bloodgroup',gender='$gender',birthdate='$bod' where volunteer_id=".$volunteer_id;
        $res1=mysqli_query($conn,$sql1);
        if($res1){
            echo "updated";
        }
        else
            echo "problem";
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
    <link rel="stylesheet" type="text/css" href="admin/jquery.datetimepicker.min.css"/>
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
                        <a id="logout">Sign out</a>
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
                            <li><a href="volunteer.php">Home</a></li>
                            <li class="current-menu-item"><a href="Manage_volunteer_profile.php">Manage profile</a></li>
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
                <h1>Manage Profile</h1>
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
                <div class="card-header">Manage Your Account</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="Manage_volunteer_profile.php">
                        <div class="form-group">

                            <div class="form-label-group">
                                <label for="firstName">First name :- </label>
                                <input type="text" name="firstName"  class="form-control"
                                       placeholder="First name"  value="<?php if(isset($firstname)){ echo $firstname;} elseif(isset($vol_name)) { echo  $vol_name;} ?>" >
                            </div>
                            <span class="error text-danger"><?php if(isset($err)) echo "*".$err; ?></span>

                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputEmail">Email address :- </label>
                                <input type="text" name="inputEmail" class="form-control" placeholder="Email address" value="<?php if(isset($email)) {echo $email;} elseif(isset($vol_email)) { echo  $vol_email;} ?>">
                            </div>
                            <span class="error text-danger"><?php if(isset($mailerr)) {echo "*".$mailerr;}   ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="inputPassword">Password :- </label>
                                        <input type="password" name="inputPassword" class="form-control"
                                               placeholder="Password"   value="<?php if(isset($password)){ echo $password;} elseif(isset($vol_pass)) { echo  $vol_pass;} ?>">
                                    </div>
                                    <span class="error text-danger"><?php if(isset($passerr)) echo "*".$passerr; ?></span>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="confirmPassword">Confirm password :- </label>
                                        <input type="password" name="confirmPassword" class="form-control"
                                               placeholder="Confirm password"  value="<?php if(isset($conpaa)) {echo $conpaa;} elseif(isset($vol_conpass)) { echo  $vol_conpass;} ?>" >
                                    </div>
                                    <span class="error text-danger"><?php if(isset($conpaaerr)) echo "*".$conpaaerr; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="gender">Gender :- </label><br>
                                <?php
                                if(isset($vol_gender))
                                {
                                    if($vol_gender=="male")
                                    {
                                        ?>
                                        <input type="radio" name="gender" value="male" checked> Male
                                        <input type="radio" name="gender" value="female"> Female
                                        <input type="radio" name="gender" value="other"> Other
                                <?php
                                    }
                                    elseif($vol_gender=="female")
                                    {
                                        ?>
                                        <input type="radio" name="gender" value="male" > Male
                                        <input type="radio" name="gender" value="female" checked> Female
                                        <input type="radio" name="gender" value="other"> Other
                                        <?php
                                    }
                                    else
                                    {
                                        ?>

                                        <input type="radio" name="gender" value="male" > Male
                                        <input type="radio" name="gender" value="female"> Female
                                        <input type="radio" name="gender" value="other" checked> Other
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>

                                    <input type="radio" name="gender" value="male" checked> Male
                                    <input type="radio" name="gender" value="female"> Female
                                    <input type="radio" name="gender" value="other"> Other
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputcontactno">Contact no :- </label>
                                <input type="text" name="inputcontactno" class="form-control"
                                       placeholder="Contact no"  value="<?php if(isset($mobile)) {echo $mobile;}  elseif(isset($vol_contact_nos)) { echo  $vol_contact_nos;}?>">
                            </div>
                            <span class="error text-danger"><?php if(isset($mobileerr)) echo "*".$mobileerr; ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputAddress">Address :- </label>
                                <textarea rows="5" name="inputAddress" class="form-control" placeholder="Address"><?php if(isset($address)) {echo $address;} elseif(isset($vol_address)) { echo  $vol_address;}?></textarea>
                            </div>
                            <span class="error text-danger"><?php if(isset($Adderr)) echo "*".$Adderr; ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="city">City</label>
                                        <select name="city" class="custom-select form-control" id="city">
                                            <option value="no">SELECT CITY</option>
                                            <?php
                                            $sql1="select * from city";
                                            $res1=mysqli_query($conn,$sql1);
                                            while ($row1 = mysqli_fetch_array($res1)) {
                                                if($row1['c_id']==$vol_city) 
                                                {
                                                    ?>
                                                    <option name="<?php echo $row1['c_name'] ?>"
                                                            value="<?php echo $row1['c_id'] ?>" selected="selected">
                                                        <?php echo $row1['c_name'] ?></option>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <option name="<?php echo $row1['c_name'] ?>"
                                                            value="<?php echo $row1['c_id'] ?>" >
                                                        <?php echo $row1['c_name'] ?></option>

                                            <?php
                                                }
                                            }

                                            ?>

                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="area">Area</label><br>
                                        <select name="area" class="custom-select form-control" id="area">
                                            <option>SELECT AREA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="b'd">BirthDate :- </label><br>
                                        <input type="text" name="date" class="form-control" placeholder="date" id="datetimepicker1"
                                             autocomplete="true"  value="<?php if(isset($vol_birth_date)) { echo date( "Y-m-d",strtotime($vol_birth_date));}?>">
                                    </div>
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



                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="add" class="btn btn-danger border-0 btn-block" value="UPDATE"
                                   align="absbottom">
                        </div>


                    </form>
                </div>
            </div>
        </div><!-- .col -->


    </div><!-- .row -->
</div><!-- .container -->









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
<script>
    $(document).ready(function () {

            var city_id="<?php echo $vol_city ?>";
            // alert(city_id);
            var area_id="<?php echo $vol_area?>";
            var vol_id= "<?php  echo $volunteer_id?>";
    // alert(vol_id);
    // alert(area_id);

                var pos = $.post("datares.php", {city_id: city_id,vol_id:vol_id,area_id:area_id});
                $("#area").empty();
                pos.done(function (data) {
                    $("#area").append(data);
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
</body>
</html>