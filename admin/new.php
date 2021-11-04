<?php include 'header.php'; 
 require_once 'z_db.php';
?> 

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      New Blog
     
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Blog</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Post</h3>
            </div>
            <!-- /.box-header -->
            
           	 <?php
           $status = "OK"; //initial status
$msg="";
           if(ISSET($_POST['save'])){
//$user_id = mysqli_real_escape_string($con,$_POST['user_id']);
$title = mysqli_real_escape_string($con,$_POST['title']);
$suma = mysqli_real_escape_string($con,$_POST['suma']);
 $details = mysqli_real_escape_string($con,$_POST['details']);
           
$uploads_dir = 'uploads';

        $tmp_name = $_FILES["ufile"]["tmp_name"];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["ufile"]["name"]); 
        $random_digit=rand(0000,9999);
        $new_file_name=$random_digit.$name;
        
        move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");

if($status=="OK")
{
$qb=mysqli_query($con,"INSERT INTO blog (title, suma, details, ufile) VALUES ('$title', '$suma', '$details', '$new_file_name')");
 

		if($qb){
		    	$errormsg= "
<div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Success : </br></strong>Blog Submitted Succefully.</div>"; //printing error if found in validation

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
                   <label>Title</label>
                   <input class="form-control" name="title" placeholder="Title" required="" maxlength="50">
              </div>
                 <div class="form-group">
                     <label>Summary</label>
                     <textarea id="compose-textarea"  name="suma" class="form-control" required="" maxlength="100" ></textarea>
                     <span id="rchars"></span> Maximuim of 100 characters
              </div>

              <!-- <script>
                var maxlength = 100;
                  $('textarea').keyup(function() {
                     var textlen = maxlength - $(this).val().length;
                     $('#rchars').text(textlen);
                  }); 
              </script> -->


              <div class="form-group">
                  <label>News Detail</label>
                  <textarea id="compose-textarea"  name="details" class="form-control" style="height: 300px" required=""></textarea>
              </div>
                 <script>
                        CKEDITOR.replace( 'details' );
                </script>
              <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Featured Image
                  <input type="file" name="ufile" id="ufile" class="form-control" required>
                </div>
                <p class="help-block">Max. 32MB</p>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                 <button   type="submit" name="save" class="btn btn-primary"> Submit Post</button>
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