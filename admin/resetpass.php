<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Mar 2021 16:46:59 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reset Password | Log in</title>
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
      <a href="resetpass.php"><b>Reset Password</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
     <p class="login-box-msg">Enter email to continue</p>
    <?php
include('z_db.php');
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
   $error="<p>Invalid email address please type a valid email address!</p>";
   }else{
   $sel_query = "SELECT * FROM `admin` WHERE email='".$email."'";
   $results = mysqli_query($con,$sel_query);
   $row = mysqli_num_rows($results);
   if ($row==""){
   $error= "<p>No user is registered with this email address!</p>";
   }
  }
   if($error!=""){
   echo "<div class='error'>".$error."</div>
   <br /><a href='javascript:history.go(-1)'>Go Back</a>";
   }else{
   $expFormat = mktime(
   date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
   );
   $expDate = date("Y-m-d H:i:s",$expFormat);
   $key = md5(2418*2);
   $addKey = substr(md5(uniqid(rand(),1)),3,10);
   $key = $key . $addKey;
// Insert Temp Table
mysqli_query($con,
"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");

$output="Dear admin,\r\n"; 
$output.="Please click on the following link to reset your password.\r\n";
$output.="$url/admin/reset-password.php?key=$key&email=$email&action=reset \r\n";		
$output.="Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.\r\n";
$output.="If you did not request this forgotten password email, no action 
is needed, your password will not be reset.\r\n";   	
$output.="Thanks,\r\n";
$output.="$site_name Team";
$body = $output; 
$subject = "Password Recovery - $site_name";

$to_email_address = $email;
$headers .= "From: $email_sender" . "\r\n" .
    "Reply-To: $email_sender" . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
     $headers .= "X-Priority: 1\n"; // Urgent message!
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
$message= $body;
$em= mail($to_email_address,$subject,$message,$headers);

if(!$em){
echo "Error!";
}else{
echo "<div class='error'>
<p>An email has been sent to you with instructions on how to reset your password.</p>
</div><br /><br /><br />";
	}
   }
}else{
?>
    
    <form action="" method="post">
      <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="row">
   
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
<?php } ?>

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
