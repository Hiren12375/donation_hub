<?php

session_start();
include("conn.php");
if(!isset($_SESSION['admin'])){

	header("location:index.php");
}
$admin_logged = $_SESSION['admin']['id'];

$donor1 = "select * from donor_register where admin_accept=0 and verified='verified'";
$donor2 = mysqli_query($conn, $donor1);
$donorcount = mysqli_num_rows($donor2);

$vol1 = "select * from volunteer_register where admin_accept=0 and verified='verified'";
$vol2 = mysqli_query($conn, $vol1);
$volcount = mysqli_num_rows($vol2);



$sql="select * from Blood_Donors where admin_accept=0";
$res1=mysqli_query($conn,$sql);
$bloodcount=mysqli_num_rows($res1);

$totalCount = $volcount + $donorcount+$bloodcount;
?>

<?php

if(isset($_POST['update']))
{
   $id=$_POST['id'];
    $ename=$_POST['ename'];
     $edate=$_POST['edate'];
      $etime=$_POST['etime'];
    $q="update upcoming_event set event_name='$ename',event_date='$edate',event_time='$etime' where up_id=$id";
      
      $result=mysqli_query($conn,$q);
      if($result)
      {
        header("location:view_event.php");
        
      }
      else
      {
        echo "ooopss..Something went Wrong !!";
      }   

  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Event List</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
                                    <li>
                                        <!--                                        <input type="hidden" name="name" value="volunteer">-->
                                        <a href="displayDetails.php?name=blood">
                                            <i class="fa fa-users text-aqua"></i> <?php echo $bloodcount ?> Blood uploads
                                        </a>

                                    </li>
                                    
                                    </form>
                                </ul>
                            </li>


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
                                <img src="<?php echo $row['image'];?>" class="img-circle">

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
                <li>
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
                <li class="active">
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
        View Events
      </h1>
      <ol class="breadcrumb">
                <a href="calendar.php"><button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;<b>Add</b></button></a>
            </ol>
      
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
                  <th>Name</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Place</th>
                  <th>Action</th>
                  
                  
                  
                </tr>
                </thead>
                <tbody>
                
				<?php
				$run=mysqli_query($conn,"select * from upcoming_event");
				while($row=mysqli_fetch_assoc($run))
				{
				?>
                <tr>
                  <td><?php echo $row['event_name'];?></td>
                  <td><?php echo $row['event_date'];?></td>
				         <td><?php echo $row['end_date'];?></td>
                 <td><?php echo $row['event_place'];?></td>
                 <td><a class="btn btn-social-icon btn-dropbox" href="event_update.php?id=<?php echo $row['event_id'];?>"><i class="fa fa-edit"></i></a>&nbsp;
             <a class="btn btn-social-icon btn-dropbox" href="del_event.php?id=<?php echo $row['event_id'];?>" onclick="return confirm('You sure to delete <?php echo $row['event_name'];?>');"><i class="fa fa-remove"></i></a>
              </td>
              
                  
                  	</tr>
                
				<?php }?>
        </tbody>
                <tfoot>
                
                </tfoot>
              </table>
			   <?php mysqli_close($conn);?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </section>
      <div class="modal modal-danger fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Event</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        
                            <form method="post" action="view_event.php">
                                
                                      <div class="form-group">
                                        <label for="ename">Event Name</label>
                                        <input id="event" type="text" name="ename" class="form-control" placeholder="Event Name">
                                      </div>
                                    
                                    <div class="form-group">
                                    <label for="eplace">Event Place</label>
                                    <input id="event-place" type="text" class="form-control" name="eplace" placeholder="Event Place">
                                </div>
                              
                                <div class="form-group">
                                    <label for="sdate">Start Date</label>
                                    <input id="datetimepicker1" type="text" name="s_date" autocomplete="off" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edate">End Date</label>
                                    <input id="datetimepicker2" type="text" name="e_date" autocomplete="off" class="form-control">
                                </div>
                              </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <input  type="submit" name="update" class="btn btn-block btn-danger" value="UPDATE">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
<!-- Modal End -->


      
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
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true    })
  })
</script>
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
