<?php
session_start();
error_reporting(1);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {

    $stid = intval($_GET['stid']);

    if (isset($_POST['submit'])) {

         // Check if the form was submitted
         if($_SERVER["REQUEST_METHOD"] == "POST"){
                // echo '<script>alert("'.$e->getMessage().'")</script>';
             
            // Check if file was uploaded without errors
            if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["image"]["name"];
                $filetype = $_FILES["image"]["type"];
                $filesize = $_FILES["image"]["size"];
            
                // Verify file extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
            
                // Verify file size - 5MB maximum
                $maxsize = 5 * 1024 * 1024;
                if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
            
                // Verify MYME type of the file
                if(in_array($filetype, $allowed)){
                    // Check whether file exists before uploading it
                    if(file_exists("upload/" . $filename)){
                        echo $filename . " is already exists.";
                        // unlink("upload/". $filename);
                    } else{
                        move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $filename);
                        echo "Your file was uploaded successfully.";
                    } 
                } else{
                    echo "Error: There was a problem uploading your file. Please try again."; 
                }
            } else{
                echo "Errors: " . $_FILES["image"]["error"];
            }
        }

        $studentname = $_POST['fullanme'];
        $roolid = $_POST['rollid'];
        $studentemail = $_POST['emailid'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $classid = $_POST['class'];

        $sql = "update tblstudents set StudentName=:studentname,RollId=:roolid,StudentEmail=:studentemail,Gender=:gender,DOB=:dob, ClassId=:classid, image=:image where StudentId=:stid ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':studentname', $studentname, PDO::PARAM_STR);
        $query->bindParam(':roolid', $roolid, PDO::PARAM_STR);
        $query->bindParam(':studentemail', $studentemail, PDO::PARAM_STR);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':dob', $dob);
        $query->bindParam(':stid', $stid);
        $query->bindParam(':classid', $classid, PDO::PARAM_STR);
        $query->bindParam(':image', $filename, PDO::PARAM_STR);
        $query->execute();

        $msg = "Student info updated successfully";

        
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin| Edit Student < </title>
                <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
                <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
                <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
                <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
                <link rel="stylesheet" href="css/prism/prism.css" media="screen">
                <link rel="stylesheet" href="css/select2/select2.min.css">
                <link rel="stylesheet" href="css/main.css" media="screen">
                <script src="js/modernizr/modernizr.min.js"></script>
    </head>

    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php'); ?>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                    <?php include('includes/leftbar.php'); ?>
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Student Admission</h2>

                                </div>

                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

                                        <li class="active">Student Admission</li>
                                    </ul>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>Fill the Student info</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <?php if ($msg) { ?>
                                                <div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                                </div><?php } else if ($error) { ?>
                                                <div class="alert alert-danger left-icon-alert" role="alert">
                                                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                                </div>
                                            <?php } ?>
                                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                                <?php

                                                $sql = "SELECT tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.StudentEmail,tblstudents.Gender,tblstudents.DOB,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.StudentId=:stid";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':stid', $stid, PDO::PARAM_STR);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {  ?>


                                                        <div class="form-group">
                                                            <label for="default" class="col-sm-2 control-label">Full Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="fullanme" class="form-control" id="fullanme" value="<?php echo htmlentities($result->StudentName) ?>" required="required" autocomplete="off">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="default" class="col-sm-2 control-label">Role Id</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="rollid" class="form-control" id="rollid" value="<?php echo htmlentities($result->RollId) ?>" maxlength="5" required="required" autocomplete="off">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="default" class="col-sm-2 control-label">Email </label>
                                                            <div class="col-sm-10">
                                                                <input type="email" name="emailid" class="form-control" id="email" value="<?php echo htmlentities($result->StudentEmail) ?>" required="required" autocomplete="off">
                                                            </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <label for="default" class="col-sm-2 control-label">Gender</label>
                                                            <div class="col-sm-10">
                                                                <?php $gndr = $result->Gender;
                                                                if ($gndr == "Male") {
                                                                ?>
                                                                    <input type="radio" name="gender" value="Male" required="required" checked>Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
                                                                <?php } ?>
                                                                <?php
                                                                if ($gndr == "Female") {
                                                                ?>
                                                                    <input type="radio" name="gender" value="Male" required="required">Male <input type="radio" name="gender" value="Female" required="required" checked>Female <input type="radio" name="gender" value="Other" required="required">Other
                                                                <?php } ?>
                                                                <?php
                                                                if ($gndr == "Other") {
                                                                ?>
                                                                    <input type="radio" name="gender" value="Male" required="required">Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required" checked>Other
                                                                <?php } ?>


                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Class</label>
                                                        <div class="col-sm-10">
                                                            <select name="class" class="form-control" id="default" required="required">
                                                                <option value="">Select Class</option>
                                                                <?php $sql = "SELECT * from tblclasses";
                                                                $query = $dbh->prepare($sql);
                                                                $query->execute();
                                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                if ($query->rowCount() > 0) {
                                                                    foreach ($results as $result) {   ?>
                                                                        <option value="<?php echo htmlentities($result->id); ?>">
                                                                            <?php echo htmlentities($result->ClassName); ?>&nbsp; Section-
                                                                            <?php echo htmlentities($result->Section); ?>
                                                                        </option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                        <div class="form-group">
                                                            <label for="date" class="col-sm-2 control-label">DOB</label>
                                                            <div class="col-sm-10">
                                                                <input type="date" name="dob" class="form-control" value="<?php echo htmlentities($result->DOB) ?>" id="date">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="Image" class="col-sm-2 control-label">Student Image</label>
                                                            <div class="col-sm-10">
                                                                <input type="file" name="image" class="form-control" id="image">
                                                            </div>
                                                        </div>
                                                        

                                                        

                                                <?php }
                                                } ?>


                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                        </div>
                    </div>
                    <!-- /.content-container -->
                </div>
                <!-- /.content-wrapper -->
            </div>
            <!-- /.main-wrapper -->
            <script src="js/jquery/jquery-2.2.4.min.js"></script>
            <script src="js/bootstrap/bootstrap.min.js"></script>
            <script src="js/pace/pace.min.js"></script>
            <script src="js/lobipanel/lobipanel.min.js"></script>
            <script src="js/iscroll/iscroll.js"></script>
            <script src="js/prism/prism.js"></script>
            <script src="js/select2/select2.min.js"></script>
            <script src="js/main.js"></script>
            <script>
                $(function($) {
                    $(".js-states").select2();
                    $(".js-states-limit").select2({
                        maximumSelectionLength: 2
                    });
                    $(".js-states-hide").select2({
                        minimumResultsForSearch: Infinity
                    });
                });
            </script>
    </body>

    </html>
<?php } ?>