<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE/=edge">
  <title>Technoguide | Papers</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
       
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
     
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" onclick="myFunction()" href="#">
          <i class="far fa-bell"></i>
          <!-- <span id="notification-count" class="badge badge-warning navbar-badge"><?php if($count>0) { echo $count; } ?></span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!--<span class="dropdown-item dropdown-header">15 Notifications</span>-->
          <div class="dropdown-divider"></div>
           <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="notification-latest"></div>
          <div class="dropdown-divider"></div>
        </div>

      </li>
 
        <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
       <li class="nav-item btn-group">

      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: white; color: black; border: none; padding-top: 0px; ">
         <li class="nav-item ">
          <?php 
          if($row['profile']){
          ?>
        <img src="./images/<?php echo $row['profile']; ?>" alt="User Avatar" class="img-size-50 img-circle ">
        <?php }
        else {
        ?>
         <img src="./img/use.jpg ?>" alt="User Avatar" class="img-size-50 img-circle ">
       <?php }?>
      </li>
        <?php echo $row['uname']; ?>
      </button>
      <div class="dropdown-menu dropdown-menu-right">
       <a href="profile.php"><button class="dropdown-item" type="button">Profile</button></a>
        <a href="logout.php"><button class="dropdown-item" type="button" name="logout">Logout</button></a>
        <!-- <button class="dropdown-item" type="button" >Something else here</button> -->
      </div>
    </li>
      <li class="nav-item ">
        <?php 
         if (isset($_SESSION['name'])) { 
        ?>
          <a href="#"><?php echo $_SESSION['name']; ?></a>
          <!-- <a href="index3.html" class="nav-link">Alexander Pierce</a> -->
        <?php 
        } 
        ?>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
     
    <!-- Brand Logo-->
    <a href="index.php" class="brand-link">
         <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">   -->
      <span class="brand-text font-weight-light"><b><strong>TechnoDigital</strong></b></span>
    </a> 

    <!-- Sidebar -->
    <div class="sidebar">
        

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         

          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="enqiryvew.php" class="nav-link">
              <i class="nav-icon far fa fa-file"></i>
              <p>
                Plans
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addplan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Plans</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="viewplan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Plan</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="enqiryvew.php" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Client
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addclient.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Client</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vsubscriber.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Subscription</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sendsub1.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send Flyer</p>
                </a>
              </li>
            </ul>
          </li>

         <!--  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              
             <i class="fas fa-thumbtack nav-icon"></i>
              <p>
               To Do Task
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="vproject.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Task</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Viewvisa.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
              
            </ul>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="admincal.php" class="nav-link">
             <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calender
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
           <!--  <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="folCal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FollowUp Calender</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Task Calender</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Due Payment Calender</p>
                </a>
              </li>
            </ul> -->
          </li>
          <li class="nav-item has-treeview">
            <a href="enqiryvew.php" class="nav-link">
              <i class="nav-icon far fa fa-file"></i>
              <p>
                Inquiry
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addenquiry.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Inquiry</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="venquiry.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Inquiry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addvisainquiry.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Add Visa Inquiry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="visainq_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Visa Inquiry</p>
                </a>
              </li>
              
            </ul>
          </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Student
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addstud.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Student</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vstud.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Student</p>
                </a>
              </li>
               <!-- <li class="nav-item">
                <a href="folCal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FollowUp User</p>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Intern
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addintern.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Intern</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vintern.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Intern</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="addstudproj.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Project</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employee
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addemployee.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vemploy.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Employee</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="addproject.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Project</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="adduser.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="studview.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="folCal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FollowUp User</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="addproject.php" class="nav-link">
              <i class="nav-icon fas fa-chevron-circle-down"></i>
              <p>
              Project
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="vproject.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vintproject.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Intern</p>
                </a>
              </li>
              <!-- <li class="nav-item">
              <a href="addtask.php" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
                <p>Add Task</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="vtask.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Task</p>
                </a>
              </li> -->
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              
              <i class="nav-icon fas fa fa-plane"></i>
              <p>
               Visa
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addvisa.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Visa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="visa_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Visa</p>
                </a>
              </li>
              
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="gallery.php" class="nav-link">
             <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Gallery
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
         </li>

        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h1>Update</h1>
          </div> -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Papers</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
            <div class="col-md-9" style=" margin-left: 140px">
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Add Papers</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
                <div class="row">
                 
                   <div class="col-sm-6">
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" class="form-control" placeholder="Enter ..." name="decr">
                    </div>
                </div>
                <div class="col-sm-4">
                <div class="form-group">
                   <label>Upload Documents</label>
                   <input type="file" name="pdfs[]" class="btn btn-info btn-block file" multiple style="height: 40px">
                 </div>
               </div>
              </div>
              
                <div class="row">

                  <div class="col-sm-12">
                              <div class="col-sm-12">
                              <input type="submit" class="btn btn-info" name="addpaper" value="submit">
                           
                  </div>
                  </div>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.card-body -->
          </div>
          <!--/.card  -->
          </div>
          
         
         
            <!-- /.card -->
          </div>
          <!--/.col  -->
          
          
          </form>
          
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section><!-- /.section -->
  </div><!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <!-- 2014-2019 --> <a href="https://technoguideinfo.com/">Technoguide Infosoft Pvt. Ltd</a>.</strong>
    All rights reserved.
    <!-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.1
    </div> -->
  </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- for add row in document-->
 <script>
  
  function addeng() {
  $('#eng tbody').append('<tr><td><input type="date" class="form-control" placeholder="Enter ..." name="day[]" required pattern="\Y{4}-\m{2}-\d{2}" >'+
    '</td><td><select class="form-control" name="tname[]">'+
    '<option>Select</option>'+
    '<option value="IELTS">IELTS</option>'+
    '<option value="TOFEL">TOFEL</option>'+
    '<option value="GRE">GRE</option>'+
    '<option value="GMAT">GMAT</option>'+
    '<option value"SAT>SAT</option>'+
    
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="speak[]">'+ 
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="reading[]">'+ 
    '</td>><td><input type="text" class="form-control" placeholder="Enter...." name="listen[]">'+ 
    '</select>' +  '</td><td><input type="text" class="form-control" placeholder="Enter...." name="writing[]">' +
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name=overall[]>'+ 
    '</td><td> <button type="button" class="btn btn-info btn-sm" onclick="addeng()"><i class="fas fa-plus-square"></i></button>'+ ' '+
    '<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>'+ 
    '</td></tr>');
  rowNo++;
  }
  var rowNo = 2;
  function adddoc() {

  $('#doc tbody').append('<tr><td>' + rowNo + '</td><td><input type="file" name="files[]" class="btn btn-info btn-block file" multiple>' + '</td><td> <button type="button" class="btn btn-info btn-sm" onclick="adddoc()"><i class="fas fa-plus-square"></i></button>'+' '+ '<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>'+ 
    '</td></tr>');
  rowNo++;
  }
  function addWork() {
  $('#work tbody').append('<tr><td><input type="text" class="form-control" placeholder="Enter...." name="title[]">'+'</td><td><input type="text" class="form-control" placeholder="Enter...." name="company[]">' +  '</td><td><input type="date" class="form-control" placeholder="Enter ..." name="Start[]">' + '</td><td><input type="date" class="form-control" placeholder="Enter ..." name="end[]">'+ '</td><td><input type="text" class="form-control" placeholder="Enter...." name="experience[]">'+ '</td><td><button type="button" class="btn btn-info btn-sm" onclick="addWork()"><i class="fas fa-plus-square"></i></button>'+ ' '+'<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>'+ 
    '</td></tr>');
  rowNo++;
  }
  function addAcc() {
  $('#Acc tbody').append('<tr><td><?php
                        $sql1 = "SELECT  level FROM level ";
                        if($result = mysqli_query($link, $sql1))
                        {?>
                          <select class="form-control" name="acdlevel[]"><?php
                          while ($row = mysqli_fetch_assoc($result)) {
                            $level = $row['level'];
                            echo '<option value="'.$level.'">'.$level.'</option>';
                          }
                          echo "</select>";
                        }
                        else
                          echo "error";
                          ?>
                   '+
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="sub[]">'+ 
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="uni[]">'+ 
    '</td><td><?php
                           $currently_selected = date('Y');
                           $earliest_year = 1997;
                           $latest_year = date('Y+2');?>
                          <select class="form-control" name="acdyr[]"> <?php
                           foreach ( range( $latest_year, $earliest_year ) as $i ) {
                            print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                            }
                            print '</select>';
                            ?>'+ 
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="result[]">'+ 
    '</td></td><td><select class="form-control" name="medium[]">'+
                       '<option>Select</option>'+
                       '<option value="Hindi">Hindi</option>'+
                       '<option value="English">English</option>'+
                       '</select>'+ 
    '</td><td><button type="button" class="btn btn-info btn-sm" onclick="addAcc()"><i class="fas fa-plus-square"></i></button>'+' '+
    '<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>'+ 
    '</td></tr>');
  
  }
  function del() {
    $(".delete").click(function() {
    $(this).closest("tr").remove();
    });
  }
  
 </script>
<script type="text/javascript">

  function myFunction() {
    $.ajax({
      url: "view_notification.php",
      type: "POST",
      processData:true,
      success: function(data){
        $("#notification-count").remove();          
        $("#notification-latest").show();$("#notification-latest").html(data);
      },
      error: function(){}           
    });
   }
   
   $(document).ready(function() {
    $('body').click(function(e){
      if ( e.target.id != 'notification-icon'){
        $("#notification-latest").hide();
      }
    });
  });
     
  </script>
</body>
</html>
