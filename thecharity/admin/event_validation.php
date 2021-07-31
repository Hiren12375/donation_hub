<?php
include("conn.php");
session_start();
if (!isset($_SESSION['id'])) {

    header("location:index.php");
}
//echo "EVENT_ID".$_SESSION['event_handler']['event_id'];
$admin_logged = $_SESSION['id'];



$donor1 = "select * from donor_register where admin_accept=0 and verified='verified'";
$donor2 = mysqli_query($conn, $donor1);
$donorcount = mysqli_num_rows($donor2);

$vol1 = "select * from volunteer_register where admin_accept=0 and verified='verified'";
$vol2 = mysqli_query($conn, $vol1);
$volcount = mysqli_num_rows($vol2);



$totalCount = $volcount + $donorcount;
if(isset($_POST['add']))
{

if($_POST['ename']=="")
    {
        $err="Required field";
    }
    else if(!preg_match("/^[a-z A-z]+$/",$_POST['ename']))
    {
        $err="Only alphabets are allowed.";
    }
    else
    {
        $name = $_POST['ename'];
    }
    
//$name=$_POST['ename'];

    if($_POST['ecolor']=="")
     {
         $colorerr="Required field";
     }
     
     else
     {
         $color = $_POST['ecolor'];
     }
//$color=$_POST['ecolor'];
     if(empty($_POST['s_date']))
    {
        $sdateerr="Required Field";
    }
    else
    {
        $s_date = $_POST['s_date'];
    }
    if(empty($_POST['e_date']))
    {
        $edateerr="Required Field";
    }
    else
    {
        $e_date = $_POST['e_date'];
    }
//$e_date=$_POST['e_date'];

    if($_POST['eplace']=="")
    {
        $placeerr="Required field";
    }
    else if(!preg_match("/^[a-z A-z]+$/",$_POST['eplace']))
    {
        $placeerr="Only alphabets are allowed.";
    }
    else
    {
        $place = $_POST['eplace'];
    }

if(empty($err) && empty($colorerr) && empty($sdateerr)  && empty($edateerr) && empty($placeerr))
    {

$q="insert into upcoming_event(event_name,event_date,end_date,color,border_color,event_place)values('$name','$s_date','$e_date','$color','$color','$place')";

$result=mysqli_query($conn,$q);
if($result)
{
header("location:calendar.php");

}
else
{
echo "ooopss..Something went Wrong !!";
}

}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Calendar</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="jquery.datetimepicker.min.css"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

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
                                    
                                    </form>
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
                                        <a href=""><i class="fa fa-lock"></i>&nbsp;Change Password</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="lockscreen.php"><i class="fa fa-lock"></i>&nbsp;Lock</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="logout.php"><i class="fa fa-sign-out"></i>Sign Out</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->

                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
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
                Calendar
                
            </h1>
            
        </section>


        <section class="content">
            <div class="row">
                <div class="col-md-3">

                    <!-- /. box -->
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Create Event</h3>
                        </div>
                        <div class="box-body">
                            <form method="post">
                                <!-- /btn-group -->
                                <div class="input-group">
                                    <label for="ename">Event Name</label>
                                    <input id="event" type="text" name="ename" class="form-control" placeholder="Event Name" value="<?php if(isset($name)) echo $name ?>">
                                     <span class="error text-danger"><?php if(isset($err)) echo "*".$err; ?></span>
                                </div><br>
                                <div class="input-group">
                                    <label for="ecolor">Event Color</label>
                                    <input id="event-color" type="color" name="ecolor" class="form-control" placeholder="Event Name">
                                    <span class="error text-danger"><?php if(isset($colorerr)) echo "*".$colorerr; ?></span>
                                </div><br>
                                <div class="input-group">
                                    <label for="sdate">Start Date</label>
                                    <input id="datetimepicker1" type="text" name="s_date" autocomplete="off" class="form-control">
                                    <span class="error text-danger"><?php if(isset($sdateerr)) echo "*".$sdateerr; ?></span>
                                </div><br>
                                <div class="input-group">
                                    <label for="edate">End Date</label>
                                    <input id="datetimepicker2" type="text" name="e_date" autocomplete="off" class="form-control">
                                    <span class="error text-danger"><?php if(isset($edateerr)) echo "*".$edateerr; ?></span>
                                </div><br>
                                <div class="input-group">
                                    <label for="eplace">Event Place</label>
                                    <input id="event-place" type="text" class="form-control" name="eplace" placeholder="Event Place" value="<?php if(isset($place)) echo $place ?>">
                                    <span class="error text-danger"><?php if(isset($placeerr)) echo "*".$placeerr; ?></span>
                                </div><br>
                                <!-- /btn-group -->

                                <div class="input-group-btn">
                                    <input  type="submit" name="add" class="btn btn-block btn-danger" value="ADD">
                                </div>
                                <!-- /input-group -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-body no-padding">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
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
<script src="jquery.min.js"></script>

<script src="jquery.datetimepicker.js"></script>

<!--<script src="bower_components/jquery/dist/jquery.min.js"></script>-->
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->


<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- fullCalendar -->
<script src="bower_components/moment/moment.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- Page specific script -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#datetimepicker1').datetimepicker();
        $('#datetimepicker2').datetimepicker();
    });
</script>
<script>
    // setTimeout(function(){
    //     window.location.reload(1);
    // }, 1000);



    $(document).ready(function () {

        $("#myModal").hide();
        var calendar = $('#calendar').fullCalendar({

            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },

            events: 'load.php',

            eventClick: function(calEvent) {
                var title=calEvent.title;
                var date=calEvent.start;
                var end_date=calEvent.end;
                var place=calEvent.place;
                var event_id=calEvent.id;
              //  alert(title);


                var pos=$.post("demo.php",{event_id:event_id});
                pos.done(function (data) {
           if(data==="done")
           {
               window.location.href="volunt_list.php";
           }
                 //

                })
                //window.location.href="volunt_list.php?event_id="+calEvent.id;


            },






            eventMouseover: function (calEvent, jsEvent) {
                var tooltip = '<div class="tooltipevent" style="width:100px;height:100px;background:#abc;position:absolute;z-index: 10;">' + calEvent.title + '<br >' + calEvent.place + '</div>';
                var $tooltip = $(tooltip).appendTo('body');


                $(this).mouseover(function (e) {
                    $(this).css('z-index', 100);
                    $tooltip.fadeIn('50000000000');
                    $tooltip.fadeTo('1000', 1.9);
                }).mousemove(function (e) {
                    $tooltip.css('top', e.pageY + 10);
                    $tooltip.css('left', e.pageX + 20);
                });
            },

            eventMouseout: function (calEvent, jsEvent) {
                $(this).css('z-index', 8);
                $('.tooltipevent').remove();
            },
            selectable: true,
            selectHelper: true,




        });




    });



</script>
</body>
</html>
