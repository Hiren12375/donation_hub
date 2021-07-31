<?php
session_start();
// print_r($_SESSION);
include("config.php");
$donor_id = $_SESSION['donor']['id'];
$sql = "select * from services";
$res = mysqli_query($conn, $sql);
if (isset($_POST['submit'])) {
    $type = $_POST['type'];
    $sub_type = $_POST['sub_cat'];
    $quantity = $_POST['quantity'];
   $city=$_POST['city'];
   $area=$_POST['area'];

       $sql2 = "insert into product_type(donor_id,donate_type,sub_categories,quantity,area,city) values ($donor_id,'$type','$sub_type','$quantity','$area','$city')";
//    echo $sql2;
    $res3 = mysqli_query($conn, $sql2);
    if ($res3) {
        echo "successful";
    } else {
        echo "fail";
    }

}

if(isset($_POST['add'])){
    $file=time()."_".$_FILES['upload']['name'];
    $tmp_name=$_FILES['upload']['tmp_name'];
    $folder = "images/Confirmation/" . $file;

    $sql3="insert into Blood_Donors (donor_id,pic) values ('$donor_id','$folder')";
    $res2=mysqli_query($conn,$sql3);
    if($res2 && move_uploaded_file($tmp_name,$folder))
        echo "success";
    else
        echo "problem";
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
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
<!-- <script src="validation..js"></script> -->
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
                        if(!isset($_SESSION['donor'])) {
                            ?>
                            <a href="login.php">Sign in</a>
                            <?php
                        }else{
                            ?>
                            <a id="logout">Sign out</a>
                            <?php
                        }
                        ?>
                        <a href="#myModal" data-toggle="modal" class="">Receipt Upload </a>
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
                            <!-- <li><a data-toggle="modal" data-target="#myModal">Blood Donor</a></li> -->
    


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
</-header><!-- .site-header -->

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Donor Home</h1>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header -->



  

<div class="welcome-wrap" align="center">
    <div class="container" align="center">
        <div class="row">
            <div class="col-12 col-lg-6 order-1 order-lg-2">
                 <img src="images/D Photos/Blood Donation/14671367_1300439109989487_3162973573434259667_n.png" alt="welcome">
            </div><!-- .col -->

            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <div class="card-header">Request a Donation</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" id="myform">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="Type">Donation_type</label>
                                        <select name="type" class="custom-select form-control" id="Type">
                                            <option>SELECT DONATION TYPE</option>
                                            <?php
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
                                </div>
                                <div class="col-md-6">

                                    <label for="sub_cat">Sub catagory</label><br>
                                    <select name="sub_cat" class="custom-select custom-control" id="sub_cat">
                                        <option>SELECT DONATION SUB-TYPE</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="city">City</label>
                                        <select name="city" class="custom-select form-control" id="city">
                                            <option>SELECT CITY</option>
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

                                </div>
                                <div class="col-md-6">

                                    <label for="area">Area</label><br>
                                    <select name="area" class="custom-select custom-control" id="area">
                                        <option>SELECT AREA</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">


                            <div class="form-label-group" >
                                <label for="quantity">Quantity</label>
                                <input type="text" name="quantity" class="form-control" placeholder="quantity"
                                       id="demo" required="required" disabled>
<!--                               <span class="error">--><?php ////if(isset($err)) echo $err ?><!-- </span>-->
                            </div>

                        </div>
                        <div id="demo">

                        </div>
                        <div class="form-group">
                            <button  name="submit"
                                    class="btn gradient-bg btn-block" >Donate</button>
                        </div>
                    </form>
                </div>
            </div>
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
                            <p>One good thing about donation, once you do it, you get addicted to it because it brings great joy and happiness to you.     </p>
                        </div>

                        <div class="entry-footer d-flex flex-wrap align-items-center mt-5">
                            

                            <h4>Charles Dicken</h4>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 offset-lg-2 col-lg-5">
                    <div class="testimonial-cont">
                        <div class="entry-content">
                            <p>You give but little when you give of your possessions. It is when you give of yourself that you truly give.   </p>
                        </div>

                        <div class="entry-footer d-flex flex-wrap align-items-center mt-5">
                           

                            <h4>Kahlil Gibran</h4>
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
<script src="js/jquery.min.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {

        $("#Type").change(function () {

            var sub_cat = $("#Type").val();
            //var sub_cat_name = $("#Type").val();
            // var name = $("#Type").attr("name");
        // alert(sub_cat);
            var donor_id="<?php echo $_SESSION['donor']['id'] ?>";


            var pos = $.post("datares.php", {sub_cat: sub_cat,donor_id:donor_id});
            $("#sub_cat").empty();
            pos.done(function (data) {
                $("#sub_cat").append(data);
            });
            if(sub_cat==="Cloth"  )
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
<div class="modal fade " id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
            <!-- Modal Header -->
            <div class="modal-header ">
                <h4 class="modal-title">Blood Receipt Upload</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                    <div class="form-group">
                        <div class="form-label-group">
                            <label for="file">Upload Pic</label>
                            <input type="file" class="form-control" name="upload">
                        </div>
                    </div>


            </div>


            <div class="modal-footer">
                <button type="submit" name="add" class="btn btn-danger border-0 btn-block ">submit</button>
            </div>
                <!-- Modal footer -->



<!--            </div>-->
            </form>
        </div>
    </div>
</div>

</body>
</html>