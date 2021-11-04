<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

error_reporting(0);

include('includes/config.php');

// if($_SESSION['alogin']!=''){
// $_SESSION['alogin']='';
// }


if(isset($_POST['reset']))
{
$email=$_POST['email'];

$err = [];

$sql ="SELECT UserName FROM admin WHERE UserName=:uname";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$root_link = 'https://studentms.test/reset.php?user='.$email.'&code=';

$link = $root_link . md5($email);

if ($results) {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->CharSet = 'UTF-8';
            $mail->Host       = 'mail.alphaminning.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'support@alphaminning.com';                     //SMTP username
            $mail->Password   = 'alphapass0071#';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('support@alphaminning.com', 'SMS BOT');
            $mail->addAddress($email, '$fullname');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password Reset';
            $mail->Body    = "<p>Hello!"  . "\r\n" ."</p> <p>please click on the link to reset your password, <b style='color: red;'>$link</b> </p> <br> <p>Kind regards, <br> School System Bot </p>";

            $mail->send();

            echo "<script>alert(' Plase check your Email for reset link.');</script>";

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            // $err = ['Server Error, try again later or contact admin'];
        }
}else{
    $err = ['Email does not exist'];
    // echo 'email not here';
}



}

if (isset($_GET['user'])) {
    $place = $_GET['user'];
    
    if (isset($_POST['change'])) {
    
        $newpass = $_POST['newpass'];
    
        $sql ="UPDATE admin SET `Password` = :newpass WHERE UserName = :place";
        $query= $dbh -> prepare($sql);
        $query->bindParam(':newpass',$newpass,PDO::PARAM_STR);
        $query->bindParam(':place',$place,PDO::PARAM_STR);
        $query-> execute();
        
        header("Location: index.php");
       
    
    
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Login</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="">
        <div class="main-wrapper">

            <div class="">
                <div class="row">
 <h1 align="center">Student Result Management System</h1>
                    
                    <div class="col-lg-6 col-md-offset-3">
                        <?php if(!isset($_GET['code'])): ?>
                        <section class="section">
                            <div class="row mt-40">
                                <div class="col-md-10 col-md-offset-1 pt-50">

                                    <div class="row mt-30 ">
                                        <div class="col-md-11">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <div class="panel-title text-center">
                                                        <h4>Password Reset</h4>
                                                    </div>
                                                </div>
                                                <div class="panel-body p-20">

                                                    <div class="section-title">
                                                        <p class="sub-title">Enter your email, we'll send you a reset link</p>
                                                    </div>

                                                    <form class="form-horizontal" method="post">
                                                    	<div class="form-group">
                                                    		<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                                    		<div class="col-sm-10">
                                                    			<input type="email" required name="email" class="form-control" id="inputEmail3" placeholder="email">
                                                    		</div>

                                                            <span class="text-danger">
                                                                <!-- <?php if ($err) {
                                                                    echo $err;
                                                                } ?> -->
                                                            </span>
                                                    	</div>
                                                    	
                                                    
                                                        <div class="form-group mt-20">
                                                    		<div class="col-sm-offset-2 col-sm-10">
                                                           
                                                    			<button type="submit" name="reset" class="btn btn-success btn-labeled pull-right">Reset Password<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    		</div>
                                                    	</div>
                                                    </form>

                                            

                                                 
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                            <p class="text-muted text-center"><small>Copyright © SRMS</small></p>
                                        </div>
                                        <!-- /.col-md-11 -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </section>
                        <?php endif ?>
                         <?php if(isset($_GET['user'])): ?>
                            <?php $place = $_GET['user']; ?>
                         
                            <section class="section">
                            <div class="row mt-40">
                                <div class="col-md-10 col-md-offset-1 pt-50">

                                    <div class="row mt-30 ">
                                        <div class="col-md-11">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <div class="panel-title text-center">
                                                        <h4>Admin Reset Password</h4>
                                                    </div>
                                                </div>
                                                <div class="panel-body p-20">

                                                    <div class="section-title">
                                                        <p class="sub-title col-md-offset-3">Enter a new password</p>
                                                    </div>

                                                    <form class="form-horizontal" method="post">
                                                    	<div class="form-group">
                                                    		<label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                                                    		<div class="col-sm-8">
                                                    			<input disabled type="text" name="username" class="form-control" id="inputEmail3" value="<?php echo $place; ?>">
                                                    		</div>
                                                    	</div>
                                                    	<div class="form-group">
                                                    		<label for="inputPassword3" class="col-sm-4 control-label">New Password</label>
                                                    		<div class="col-sm-8">
                                                    			<input type="password" name="newpass" class="form-control" id="inputPassword3" placeholder="Password">
                                                    		</div>
                                                    	</div>
                                                    	
                                                    
                                                        <div class="form-group mt-20">
                                                    		<div class="col-sm-offset-2 col-sm-10">
                                                           
                                                    			<button type="submit" name="change" class="btn btn-success btn-labeled pull-right">Change password<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    		</div>
                                                    	</div>
                                                    </form>

                                            

                                                 
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                            <p class="text-muted text-center"><small>Copyright © SRMS</small></p>
                                        </div>
                                        <!-- /.col-md-11 -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                            </section>
                        <?php endif ?>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /. -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function(){

            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
