<?php
include("config.php");
session_start();
$event_handler_id = $_SESSION['event_handler']['eh_id'];

$sql="select * from event_handler where eh_id=".$_SESSION['event_handler']['eh_id'];

$res=mysqli_query($conn,$sql);
if($row1=mysqli_fetch_assoc($res))
{
    $event_id=$row1['event_id'];
    $vol_id=$row1['volunteer_id'];
}
$sql2="select * from upcoming_event where event_id=".$event_id;
$res2=mysqli_query($conn,$sql2);
if($row2=mysqli_fetch_assoc($res2))
{
    $event_name=$row2['event_name'];
    $start_date=$row2['event_date'];
    $end_date=$row2['end_date'];
    $event_place=$row2['event_place'];

}

$sql3="select * from volunteer_register where is_handler=1";

$res3=mysqli_query($conn,$sql3);
if($row3=mysqli_fetch_assoc($res3))
{
    $vol_nm=$row3['firstname'];
    $vol_pic=$row3['pic'];
}




?>


<?php
$donor1 = "select * from donor_register";
$donor2 = mysqli_query($conn, $donor1);
$donorcount=mysqli_num_rows($donor2);

$d1 = "select * from donor_register where admin_accept=0";
$d2 = mysqli_query($conn, $d1);
$dcount = mysqli_num_rows($d2);



$vol1 = "select * from volunteer_register";
$vol2 = mysqli_query($conn, $vol1);
$volcount=mysqli_num_rows($vol2);

$v1 = "select * from volunteer_register where admin_accept=0";
$v2 = mysqli_query($conn, $v1);
$vcount = mysqli_num_rows($v2);

$ser1 = "select * from services";
$ser2 = mysqli_query($conn, $ser1);
$sercount=mysqli_num_rows($ser2);

$event1 = "select * from upcoming_event";
$event2 = mysqli_query($conn, $event1);
$eventcount=mysqli_num_rows($event2);

$note=$vcount+$dcount;

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Event Donor List</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="admin/dist/css/skins/_all-skins.min.css">

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
        <a  class="logo">
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
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notifications: style can be found in dropdown.less -->
                     <!-- Tasks: style can be found in dropdown.less -->
                    <!-- User Account: style can be found in dropdown.less -->
                    
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $vol_pic;?>" class="user-image">
                            <span class="hidden-xs"><?php echo $vol_nm;?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo $vol_pic;?>" class="img-circle">

                                <p>
                                    <?php echo $vol_nm;?> - Event Handler

                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-footer">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="change_pass.php"><i class="fa fa-user"></i>&nbsp;Change Password</a>                  </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="lockscreen.php" ><i class="fa fa-lock"></i>&nbsp;Lock</a>                  </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;Sign Out</a>                  </div>
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

                <li>
                    <a href="event_handler_index.php">
                        <i class="fa fa-home"></i> <span>Home</span>          </a>        </li>


                <li >
                    <a href="event_handler_volunteer.php">
                        <i class="fa fa-table"></i> <span>Volunteers</span>
                    </a>
                </li>

                <li class="active treeview">
                    <a href="event_donor.php">
                        <i class="fa fa-table"></i> <span>Donors</span>
                    </a>
                </li>

                 <li>
                    <a href="event_volunteer.php">
                        <i class="fa fa-table"></i> <span>Event Volunteer</span>
                    </a>
                </li>

                <!--                <li>-->
<!--                    <a href="donor_table.php">-->
<!--                        <i class="fa fa-table"></i> <span>Donor</span>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="volunteer.php">-->
<!--                        <i class="fa fa-table"></i> <span>Volunteer</span>-->
<!--                    </a>-->
<!--                </li>-->
<!---->
<!--                <li>-->
<!--                    <a href="calendar.php">-->
<!--                        <i class="fa fa-calendar"></i> <span>Calendar</span>-->
<!--                        <span class="pull-right-container">-->
<!--              <small class="label pull-right bg-red"></small>-->
<!--              <small class="label pull-right bg-blue"></small>            </span>          </a>        </li>-->
<!--                <li>-->
<!--                    <a href="mailbox.php">-->
<!--                        <i class="fa fa-envelope"></i> <span>Mailbox</span>-->
<!--                    </a>-->
<!---->
<!--                </li>-->
<!---->
<!---->
<!---->
<!--                <li>-->
<!--                    <a href="view_service.php">-->
<!--                        <i class="fa fa-user-plus"></i> <span>Services</span>-->
<!--                    </a>-->
<!--                </li>-->
<!---->
<!--                <li>-->
<!--                    <a href="view_event.php">-->
<!--                        <i class="fa  fa-calendar-plus-o"></i> <span>Events</span>-->
<!--                    </a>-->
<!--                </li>-->
<!---->
<!--                <li>-->
<!--                    <a href="gallery.php">-->
<!--                        <i class="fa fa-photo"></i> <span>Gallery</span>-->
<!--                    </a>-->
<!--                </li>-->

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Event Donor List
                <small></small>
            </h1>
            
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- /.box -->
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>FName</th>
                                   
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <!-- <th>Action</th> -->

                                </tr>
                                
                                </thead>
                                <tbody>
                                    <?php
                                    $sql4="select * from event_register where event_id=".$event_id;
                                    $res4=mysqli_query($conn,$sql4);
                                    while($row4=mysqli_fetch_assoc($res4))
                                    {
                                         $d_id=$row4['donor_id'];
    //$d_nm=$row4['firstname'];
                                         $sql5="select * from donor_register where donor_id=".$d_id;
                                
                                    $run5=mysqli_query($conn,$sql5);
                                     if($row5=mysqli_fetch_assoc($run5))
                                    {
                                        $name=$row5['firstname'];
                                        $email=$row5['email'];
                                        $contact=$row5['contactno'];
                                    }

                                ?>
                                <tr>
                                    <td><?php echo $name;?></td>

                                    
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $contact;?></td>
                                     	</tr>
                                    <?php }?>
                                </tbody>
                                
                                <tfoot>

                                </tfoot>
                            </table>
                            <?php mysqli_close($conn);


                            ?>
                            <button id="subVol">Make Volunteers</button>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
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
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>

                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
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
                    <input type="hidden" value="<?php echo $event_handler_id?>" id="event_handler_id">
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
<script src="admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
<script>
    $(document).ready(function () {
        $("#subVol").click(function () {
            var vol_id=[];
            var event_handler_id=$("#event_handler_id").val()
            $.each($("input[name='makeVol']:checked"),function () {
                vol_id.push($(this).val())
            });
             // alert(vol_id);
             // alert(event_handler_id);

           var pos=$.post("event_handlerData.php",{vol_id:vol_id,event_handler_id:event_handler_id});
            pos.done(function (data)
              {
                  // window.location.href="event_handler_volunteer.php";
                  alert(data);
              });
        });
    });

</script>

</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Untitled Document</title>
</head>

<body>
</body>
</html>
