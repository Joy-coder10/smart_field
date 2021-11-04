
<?php
session_start();
error_reporting(1);
include('includes/config.php');



if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{

        if (isset($_GET['act']) && isset($_GET['stid']) && $_GET['act'] === 'del') {
            $stid = $_GET['stid'];

            $sql ="DELETE FROM tblstudents WHERE StudentId = :stid";
            $query= $dbh -> prepare($sql);
            $query->bindParam(':stid',$stid,PDO::PARAM_STR);
            $query-> execute();
            
            header("Location: manage-students.php");
        }
        
        
        if (isset($_GET['act']) && isset($_GET['stid']) && isset($_GET['stat']) && $_GET['act'] === 'changepaystatus') {
            $stid = $_GET['stid'];
            $status = $_GET['stat'];
            
            if ($status === 'o') {
                $updatestatusto = 'paid';
            }else if($status === 'p'){
                    $updatestatusto = 'owing';
                    
            }

            try {
                $pay_status_sql="UPDATE tblstudents SET paid = :updatestatusto WHERE StudentId = :studentid";
                $pay_status_query = $dbh->prepare($pay_status_sql);
                $pay_status_query->bindParam(':updatestatusto',$updatestatusto,PDO::PARAM_STR);
                $pay_status_query->bindParam(':studentid',$stid,PDO::PARAM_STR);

                $pay_status_query->execute();
            } catch (PDOException $e) {
                echo '<script>alert("'.$e->getMessage().'")</script>';
                
            }                                                                               
            
            header("Location: manage-students.php");
        }

        if (isset($_POST['submit'])) {
            // if(isset($_POST["amount"])) {
                $studentid = $_POST['studentid'];
                $amount = $_POST['amount'];

                try {
                    $installment_sql="UPDATE tblstudents SET installment = :installment WHERE StudentId = :studentid";
                    $installment_query = $dbh->prepare($installment_sql);
                    $installment_query->bindParam(':installment',$amount,PDO::PARAM_STR);
                    $installment_query->bindParam(':studentid',$studentid,PDO::PARAM_STR);

                    $installment_query->execute();
                } catch (PDOException $e) {
                    echo '<script>alert("'.$e->getMessage().'")</script>';
                    
                }                                                                               
                
                header("Location: manage-students.php");
            // }
        }

        if (isset($_GET['act']) && isset($_GET['stid']) && isset($_GET['detail']) && $_GET['act'] === 'changepaydetails') {
            $stid = $_GET['stid'];
            $detail = $_GET['detail'];
            
            if ($detail === 'part') {
                $updatedetailto = 'complete';
            }else if($detail === 'comp'){
                    $updatedetailto = 'partial';
                    
            }

            try {
                $pay_status_sql="UPDATE tblstudents SET pay_status = :updatedetailto WHERE StudentId = :studentid";
                $pay_status_query = $dbh->prepare($pay_status_sql);
                $pay_status_query->bindParam(':updatedetailto',$updatedetailto,PDO::PARAM_STR);
                $pay_status_query->bindParam(':studentid',$stid,PDO::PARAM_STR);

                $pay_status_query->execute();
            } catch (PDOException $e) {
                echo '<script>alert("'.$e->getMessage().'")</script>';
                
            }                                                                               
            
            header("Location: manage-students.php");
        }



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Manage Students</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
          <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
   <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Manage Students</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Students</li>
                                        <li class="active">Manage Students</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>View Students Info</h5>
                                                </div>
                                            </div>
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Student Name</th>
                                                            <th>Roll Id</th>
                                                            <th>Class</th>
                                                            <th>Reg Date</th>
                                                            <th>School Fees Installments</th>
                                                            <th>Fees Status</th>
                                                            <th>Result Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                          <th>#</th>
                                                            <th>Student Name</th>
                                                            <th>Roll Id</th>
                                                            <th>Class</th>
                                                            <th>Reg Date</th>
                                                            <th>School Fees Installments</th>
                                                            <th>Fees Status</th>
                                                            <th>Result Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
<?php $sql = "SELECT tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status, tblstudents.paid, tblstudents.installment, tblstudents.installment,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<tr>
 <td><?php echo htmlentities($cnt);?></td>
<td><?php echo htmlentities($result->StudentName);?></td>
<td><?php echo htmlentities($result->RollId);?></td>
<td><?php echo htmlentities($result->ClassName);?>(<?php echo htmlentities($result->Section);?>)</td>
<td><?php echo htmlentities($result->RegDate);?></td>
<td>
<?php  //if ($result->paid === 'paid'): ?>
    <?php echo $result->installment ?>
    <a href="#" data-toggle="modal" data-target="#fund-con" data-student="<?php echo $result->StudentId ?>" class="btn btn-success studentid"><span class="fa fa-plus">declare</span></a>

<?php //endif; ?>


</td>
<td><?php echo  $result->paid ;?></td>
<td>
<?php if($result->paid === 'Not Completed'): ?>
    <a data-msg="Do you really want to show result for this student?" class="btn btn-danger changepaystatus" href="?act=changepaystatus&stat=o&stid=<?php echo htmlentities($result->StudentId);?>">Blocked</a> 

<?php endif;?>
<?php if($result->paid === 'Completed'): ?>
    <a data-msg="Do you really want to block result for this student?" class="changepaystatus" href="?act=changepaystatus&stat=p&stid=<?php echo htmlentities($result->StudentId);?>"><button class="btn btn-secondary">Visible</button> </a> 

<?php endif;?>
</td>
<td>
<a  href="edit-student.php?stid=<?php echo htmlentities($result->StudentId);?>"><i class="fa fa-edit" title="Edit Record"></i> </a> 
<a  href="view-student.php?stid=<?php echo htmlentities($result->StudentId);?>"><i class="fa fa-eye" title="View Record"></i> </a> 
<a data-msg="Do you really want to delete this student?" class="delete-student"  href="?act=del&stid=<?php echo htmlentities($result->StudentId);?>" >
    <i class="fa fa-trash" title="Delete Record"></i> </a> 

</td>
</tr>
<?php $cnt=$cnt+1;}} ?>
                                                       
                                                    
                                                    </tbody>
                                                </table>

                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>



        <div id="fund-con" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom:1px solid white;">
                    <h4 class="modal-title" style="float:left;">School Fees Installment</h4>
                    <button type="button" style="float:right;" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <div class="modal-body" style="clear:both;">
                    <h5 class="alert alert-danger">Declare installment funds e.g 5,000 or 10,000</h5>
                    <p>Current installment:</p>
                    <p>N.B - current installment is added to amount declared below</p>
                    <form method="post" action="" name="installment">
                        <input type="hidden" name="studentid" id="studentid" class="form-control" value="" />
                        <div class="form-group">
                            <label>Installment Amount : </label>
                            <input style='background-color:#212529; color: #fff;' value="" type="text" class="form-control" name="amount">
                        </div>
                        <input type="submit" name="submit" value="Update" class="btn btn-primary" style="display:block;width:100%;">
                    </form>
                </div>
            </div>
        </div>
    </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });

            $(document).ready(function(){
                $(".delete-student").each(function(){
                    $(this).on("click", function(){
                        event.preventDefault();

                        var default_msg = "Do you really want to delete this student?";

                        if($(this).attr("data-msg")){
                            default_msg = $(this).attr("data-msg");
                        }

                        if(confirm(default_msg)) {
                            location.href = "manage-students.php" + $(this).attr("href");
                        } 
                    });
                }); 
            });
            $(document).ready(function(){
                $(".changepaystatus").each(function(){
                    $(this).on("click", function(){
                        event.preventDefault();

                        var default_msg = "Do you really want to update the status?";

                        if($(this).attr("data-msg")){
                            default_msg = $(this).attr("data-msg");
                        }

                        if(confirm(default_msg)) {
                            location.href = "manage-students.php" + $(this).attr("href");
                        } 
                    });
                }); 
            });
            $(document).ready(function(){
                $(".studentid").each(function(){
                    $(this).on("click", function(){
                        let studentid = $(this).attr("data-student");
                        
                        if($(this).attr("data-student")){
                            $("#studentid").val(studentid) ;
                        }

                         
                    });
                }); 
            });
            $(document).ready(function(){
                $(".changepaydetails").each(function(){
                    $(this).on("click", function(){
                        event.preventDefault();

                        var default_msg = "Do you really want to update the status?";

                        if($(this).attr("data-msg")){
                            default_msg = $(this).attr("data-msg");
                        }

                        if(confirm(default_msg)) {
                            location.href = "manage-students.php" + $(this).attr("href");
                        } 
                    });
                }); 
            });
        </script>
    </body>
</html>
<?php } ?>

