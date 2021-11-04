<?php
header( "refresh:3;url=post.php" );
session_start();
include_once("z_db.php");// database connection details stored here
// Collect the data from post method of form submission // 
$id=mysqli_real_escape_string($con,$_POST['id']);
$title=mysqli_real_escape_string($con,$_POST['title']);
$suma=mysqli_real_escape_string($con,$_POST['suma']);
$details=mysqli_real_escape_string($con,$_POST['details']);

//collection ends
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update</title>
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</head>
<?php
$check=1;
if($check==1){

$status = "OK";
$msg="";
//validation starts
// if userid is less than 6 char then status is not ok
	
}
if ($status=="OK") 
{

$query=mysqli_query($con,"update blog set title='$title', suma='$suma', details='$details' where id='$id'");
if ($query)
{
print "<center>Blog Updated Successfully<br/>Redirecting in 2 seconds...</center> $id";
}
else
{
print "<center>Action could not be performed, Something went wrong. Check back again<br/>Redirecting in 2 seconds...</center>";
}
}
?> 
</html>
