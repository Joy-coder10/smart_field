<?php include 'header.php'; 
 require_once 'z_db.php';
 $toupdate =  mysqli_real_escape_string($con,$_GET['id']);
?> 

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     Update Blog
     
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Blog</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Edit Post</h3>
            </div>
            <!-- /.box-header -->
            
           	
            <?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
						{
						print $errormsg;
						}
   ?>   
            
            
             <?php 
					 $query="SELECT * FROM  blog where id='$toupdate' "; 
 
 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$to="$row[id]";
	$title="$row[title]";
	$suma="$row[suma]";
	$details="$row[details]";
	
 
					  
		}			  ?>  
            
            
             <form action="updateblogpost.php" method="post" enctype="multipart/form-data">
            <div class="box-body">
             <input type="hidden" value="<?php print $toupdate ?>" name="id">
               <div class="form-group">
                   <label>Title</label>
                   <input class="form-control" value="<?php print $title ?>"  name="title" placeholder="Title" required="" maxlength="50">
              </div>
                 <div class="form-group">
                     <label>Summary</label>
                     <textarea id="compose-textarea" name="suma" class="form-control" required="" maxlength="100"> <?php print $suma ?> </textarea>
              </div>
              <div class="form-group">
                  <label>News Detail</label>
                  <textarea id="compose-textarea"  name="details" class="form-control" style="height: 300px" required=""> <?php print $details ?> </textarea>
              </div>
                 <script>
                        CKEDITOR.replace( 'details' );
                </script>
            
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