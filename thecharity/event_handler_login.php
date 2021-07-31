<?php
session_start();
include("config.php");

if(isset($_POST['submit']))
{

    $email=$_POST['email'];
    $pass=$_POST['pass'];




    $qry = "select * from event_handler where user='$email' and pass='$pass'";
    $qry_ex = mysqli_query($conn,$qry);


    if(mysqli_num_rows($qry_ex) >0)
    {
        while($rt=mysqli_fetch_assoc($qry_ex))
        {

            session_start();

//
            $_SESSION['event_handler']['eh_id']=$rt['eh_id'];
//            $_SESSION['email']=$rt['email'];
            header('Location:event_handler_index.php');
            exit();

        }
    }
    else
    {
       ?>
        <script>alert("Invalid User Name Or Password")</script>
<?php
        header('Location:event_handler_login.php');
        exit();
    }

}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->

    <link rel="stylesheet" href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="admin/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body bgcolor="Dark red" class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a><b>Event Handler</b>&nbsp;Login</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="email" placeholder="User Name">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="pass" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


        <!-- /.social-auth-links -->

      

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="admin/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
