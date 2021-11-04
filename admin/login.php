<?php
include_once("z_db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
  $status = "OK"; //initial status
  $msg = "";
  $username = mysqli_real_escape_string($con, $_POST['username']); //fetching details through post method
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $phoneNumber = "";
  if (strlen($username) < 6) {
    $msg = $msg . "Username must be more than 5 char legth<BR>";
    $status = "NOTOK";
  }

  if (strlen($password) < 6) { //checking if password is greater then 8 or not
    $msg = $msg . "Password must be more than 5 char legth<BR>";
    $status = "NOTOK";
  }

  if ($status == "OK") {

    // Retrieve username and password from database according to user's input, preventing sql injection
    $query = "SELECT * FROM admin WHERE (username = '" . mysqli_real_escape_string($con, $_POST['username']) . "') AND (password = '" . mysqli_real_escape_string($con, $_POST['password']) . "')";
    if ($stmt = mysqli_prepare($con, $query)) {

      /* execute query */
      mysqli_stmt_execute($stmt);

      /* store result */
      mysqli_stmt_store_result($stmt);

      $num = mysqli_stmt_num_rows($stmt);

      /* close statement */
      mysqli_stmt_close($stmt);
    }
    //mysqli_close($con);
    // Check username and password match

   if ($num == 1){
   
       session_start();
        // Set username session variable
        $_SESSION['username'] = $username;
		
        // Jump to secured page
		print "
				<script language='javascript'>
					window.location = 'index.php';
				</script>"; 
/*if($curdate > $expirydate)
{
	$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>Hello User, Your Account Has Been Deactivated, As Your Account Is Expired. Please Check Below To Renew Your Account.</div>"; //printing error if found in validation
				
   $statusflag= "NOTOK";
}*/
}
	 



else{
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>Username And/Or Password Does Not Match Or Your Account Is Inactive.</div>"; //printing error if found in validation
				
}} 
else {
        
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation
				
	 
}
}


?>

<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Mar 2021 16:46:59 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>News Admin | Log in</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>School News Admin</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to update news</p>
 <?php 
						if($_SERVER['REQUEST_METHOD'] == 'POST' && ($errormsg!=""))
						{
						print $errormsg;
						}
						?>
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>"  method="post">
      <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
   
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
      </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="resetpass.php">I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
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

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Mar 2021 16:47:02 GMT -->
</html>
