<?php include 'header.php'; 
 require_once 'z_db.php';
 $username= $_SESSION['username'];
?> 

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     Change Password
     
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            
           	 <?php
           $status = "OK"; //initial status
$msg="";
           if(ISSET($_POST['save'])){
//$user_id = mysqli_real_escape_string($con,$_POST['user_id']);
$pass1 = mysqli_real_escape_string($con,$_POST['pass1']);
$pass2 = mysqli_real_escape_string($con,$_POST['pass2']);
 if ($pass1!=$pass2){
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>Password do not match, both password should be same. </div>"; //printing error if found in validation

  }
 

  elseif ($pass1=$pass2)
{
$qb=mysqli_query($con,"UPDATE `admin` SET `password`='".$pass1."' WHERE `username`='".$username."'");

		if($qb){
		    	$errormsg= "
<div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Success : </br></strong>Password Set Succefully.</div>"; //printing error if found in validation

		}else{
			$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>Some Technical Glitch Is There. Please Try Again Later Or Ask Admin For Help. </div>"; //printing error if found in validation
				
	 
		}
	}
           }
           ?>
                          
            
            
            <?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
						{
						print $errormsg;
						}
   ?>   
             <form action="" method="post" enctype="multipart/form-data">
              
            <div class="box-body">
            
             <div class="form-group">
                   <label>New Password</label>
                   <input type="password" class="form-control" name="pass1" placeholder="Password 1" required="">
              </div>
                 <div class="form-group">
                   <label>New Password again</label>
                   <input type="password" class="form-control" name="pass2" placeholder="Password 2" required="">
              </div>
         
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                 <button   type="submit" name="save" class="btn btn-primary"> Change Password</button>
              </div>
            </div>
             </form>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php include 'footer.php'; ?> 