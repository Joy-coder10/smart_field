<?php
include_once ("z_db.php");
// Inialize session
 include 'header.php'; 
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
 All Posts
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Posts</li>
      </ol>
    </section>
  <section class="content">
      <div class="row">
              <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
              
             
                <!-- /.btn-group -->
              
                <!-- /.pull-right -->
              </div>
             <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <tr>
                     
                      <th width="10%">Blog Id</th>
                      <th width="60%">Title</th>
					 
					  <th width="30%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
				   $q="SELECT * FROM  blog ORDER BY id DESC"; 
 
 
 $r123 = mysqli_query($con,$q);

while($ro = mysqli_fetch_array($r123))
{
	
	$id="$ro[id]";
	$title="$ro[title]";
	
  print "<tr>
				  
				  <td>
				  $id
				  </td>
				  <td>
				  $title
				  </td>
				  
				  <td>
				  <a href='deleteblog.php?id=$id' class='btn btn-danger btn-sm'><li class='fa fa-close'></li>Delete</a> 
                                      <a href='edit.php?id=$id' class='btn btn-info btn-sm'><li class='fa fa-pencil'></li>Edit</a> 
				       <a href='viewblog.php?id=$id' class='btn btn-success btn-sm'><li class='fa fa-eye'></li>View</a> 
				  </td>
				  
				  </tr>";
  
  }
  ?>
				  
                   </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
          </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php include 'footer.php'; ?>