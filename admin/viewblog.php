<?php
include_once ("z_db.php");
// Inialize session
 include 'header.php'; 
 $toupdate =  mysqli_real_escape_string($con,$_GET['id']);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
Read Post
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Read Post</li>
      </ol>
    </section>
  <section class="content">
      <div class="row">
            
  <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
             
            </div>
            <!-- /.box-header -->
               <?php 
					 $query="SELECT * FROM blog where id='$toupdate' "; 
 
 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$to="$row[id]";
	$title="$row[title]";
	$details="$row[details]";
        $ufile="$row[ufile]";
		$date="$row[date]";
        $date= date("l jS \of F Y h:i:s A", strtotime($date));
			  
		}			  ?>  
            
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>  <?php print $title ?></h3>
               
                  <span class="mailbox-read-time pull-right"><?php print $date ?></span></h5>
              </div>
              <!-- /.mailbox-read-info -->
         
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                  <li>
                  <span class="mailbox-attachment-icon has-img"><img src="uploads/<?php print $ufile ?>" alt="Attachment"></span>

                </li>
                <?php print $details ?>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
           
            <!-- /.box-footer -->
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
  
  </section>
    <!-- /.content -->
  </div>
<?php include 'footer.php'; ?>