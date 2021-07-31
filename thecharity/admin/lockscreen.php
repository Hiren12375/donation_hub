<?php
include("conn.php");
session_start();
if(!isset($_SESSION['admin'])){

	header("location:index.php");
}
$admin_logged = $_SESSION['admin']['id'];

$name = mysqli_query($conn, "select * from admin_register where id = '$admin_logged'");
$row = mysqli_fetch_array($name);


if(isset($_POST['submit']))
{
	$pass=$_POST['pass'];
	$qry ="select * from admin_register where email='".$_SESSION['admin']['email']."'";
	echo  $qry;
	$qry_ex = mysqli_query($conn,$qry);
	if(mysqli_num_rows($qry_ex)>0)
	{
		$rt=mysqli_fetch_assoc($qry_ex);

        var_dump(password_verify($pass,$rt['password']));
        if(password_verify($pass,$rt['password']))
		{
			
     		 $_SESSION['id']=$rt['id'];
			 $_SESSION['email']=$rt['email'];
			 $_SESSION['pass']=$rt['password'];
	 		header("Location:home1.php");
			exit();
		}
  }
	 else
   {
     
//	 $_SESSION['msg']="Invalid Userid or password";
	 header('Location:lockscreen.php');
//	 exit();
   }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Lockscreen</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a><b>Donation</b>HUB</a>
  </div>
  <!-- User name -->
  
  <div class="lockscreen-name"><?php echo $row['fullname'];?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?php echo $row['image'];?>">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post">
      <div class="input-group">
        <input type="password" class="form-control"  name="pass" placeholder="Password">

        <div class="input-group-btn">
          <button type="submit" name="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a id="logout">Or sign in as a different user</a>
  </div>
  <div class="lockscreen-footer text-center">
    
  </div>
</div>
<!-- /.center -->
<?php mysqli_close($conn);?>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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
