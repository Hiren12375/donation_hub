   <?php
   session_start();
include("conn.php");
if (!isset($_SESSION['admin'])) {

    header("");
}
$admin_logged = $_SESSION['admin']['id'];

$req1 = "select * from request";
$req2 = mysqli_query($conn, $req1);
$reqcount = mysqli_num_rows($req2);


$donor1 = "select * from donor_register where admin_accept=0 and verified='verified'";
$donor2 = mysqli_query($conn, $donor1);
$donorcount = mysqli_num_rows($donor2);

$sql1="select * from donor_register";
$res = mysqli_query($conn, $sql1);
$donorcount1 = mysqli_num_rows($res);

$vol1 = "select * from volunteer_register where admin_accept=0 and verified='verified'";
$vol2 = mysqli_query($conn, $vol1);
$volcount = mysqli_num_rows($vol2);

$sql2="select * from volunteer_register";
$res2= mysqli_query($conn, $sql2);
$volcount1 = mysqli_num_rows($res2);

$ser1 = "select * from services";
$ser2 = mysqli_query($conn, $ser1);
$sercount = mysqli_num_rows($ser2);

$eve1 = "select * from upcoming_event";
$eve2 = mysqli_query($conn, $eve1);
$evecount = mysqli_num_rows($eve2);



$sql="select * from Blood_Donors where admin_accept=0";
$res1=mysqli_query($conn,$sql);
$bloodcount=mysqli_num_rows($res1);

   $totalCount = $volcount + $donorcount+$bloodcount;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Home</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b></b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Donation</b>HUB</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning"> <?php echo $totalCount ?></span> </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have <?php echo $totalCount ?> notifications<span
                                        class="badge"></span></li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
<!--                                    <form action="displayDetails.php" method="post">-->
                                    <li>
<!--                                        <input type="hidden" name="name" value="donor">-->
                                        <a href="displayDetails.php?name=donor">
                                            <i class="fa fa-users text-aqua"></i> <?php echo $donorcount ?> new donors
                                            register
                                        </a>

                                    </li>
                                    <li>
<!--                                        <input type="hidden" name="name" value="volunteer">-->
                                        <a href="displayDetails.php?name=volunteer">
                                            <i class="fa fa-users text-aqua"></i> <?php echo $volcount ?> new volunteers
                                            register
                                        </a>

                                    </li>
                                    <li>
                                        <!--                                        <input type="hidden" name="name" value="volunteer">-->
                                        <a href="displayDetails.php?name=blood">
                                            <i class="fa fa-users text-aqua"></i> <?php echo $bloodcount ?> Blood uploads
                                        </a>

                                    </li>
                                    
                                    
                                    
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <?php
                    $name = mysqli_query($conn, "select * from admin_register where id = '$admin_logged'");
                    $row = mysqli_fetch_array($name);
                    ?>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!--<img src=""  class="user-image" alt="">-->
                            <i class="fa fa-user"></i>
                            <span class="hidden-xs"><?php echo $row['fullname']; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo $row['image']; ?>" class="img-circle" >

                                <p>
                                    <?php echo $row['fullname']; ?> - Admin
                                    <small></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-footer">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="change_pass.php"><i class="fa fa-lock"></i>&nbsp;Change Password</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="lockscreen.php"><i class="fa fa-lock"></i>&nbsp;Lock</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a id="logout"><i class="fa fa-sign-out"></i>&nbsp;Sign Out</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->

                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- search form -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="home1.php">
                        <i class="fa fa-home"></i> <span>Home</span>          </a>        </li>


                <li>
                    <a href="admin_table.php">
                        <i class="fa fa-table"></i> <span>Admin</span>
                    </a>
                </li>
                <li >
                    <a href="donor_table.php">
                        <i class="fa fa-table"></i> <span>Donor</span>
                    </a>
                </li>
                <li>
                    <a href="volunteer.php">
                        <i class="fa fa-table"></i> <span>Volunteer</span>
                    </a>
                </li>

            <li>
                    <a href="request.php">
                        <i class="fa fa-table"></i> <span>Request</span>
                    </a>
                </li>

                <li>
                    <a href="calendar.php">
                        <i class="fa fa-calendar"></i> <span>Calendar</span>
                                 </a>        </li>
                

                <li>
                    <a href="view_service.php">
                        <i class="fa fa-user-plus"></i> <span>Services</span>
                    </a>
                </li>
                <li>
                    <a href="view_event.php">
                        <i class="fa  fa-calendar-plus-o"></i> <span>Events</span>
                    </a>
                </li>
                
                <li >
                    <a href="addGallery.php">
                        <i class="fa fa-photo"></i> <span>Gallery</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text-o"></i>
                        <span>Report</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu" style="display: none;">
                        <li><a href="event_report.php"><i class="fa fa-file-excel-o"></i> Event Report</a></li>
                        <li><a href="DonorReport.php"><i class="fa fa-file-excel-o"></i> Donation Report</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Welcome <?php echo $row['fullname']; ?>
            </h1>
            
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $donorcount1; ?></h3>

                            <p>Total Donor</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="donor_table.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $volcount1; ?></h3>

                            <p>Total Volunteer</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="volunteer.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $reqcount; ?></h3>

                            <p>Total Request</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="request.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo $evecount; ?></h3>

                            <p>Total Events</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="view_event.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col --><!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->


                <!-- Map box -->
                <!-- /.box -->
                <!-- solid sales graph -->
                <!-- /.box -->
                <!-- Calendar -->
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">

    </footer>

    <!-- Control Sidebar -->
     <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a></li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a></li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a></li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a></li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span></h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a></li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span></h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a></li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span></h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a></li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span></h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a></li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="../js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#logout").click(function () {
            var data_admin="admin";
            var pos=$.post("../subData.php",{data_admin:data_admin});
            pos.done(function (data) {
                if(data==='DONE'){
                    window.location.href="index.php";
                }
            })
        })
    })
</script>

</body>
</html>
