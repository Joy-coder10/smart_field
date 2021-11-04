<?php
header( "refresh:2;url=post.php" );
include_once ("z_db.php");
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        print "
				<script language='javascript'>
					window.location = 'index.php';
				</script>
			";
			
}
$todelete= mysqli_real_escape_string($con,$_GET["id"]);

$result=mysqli_query($con,"DELETE FROM blog WHERE id='$todelete'");
if ($result)
{
print "<center>Blog deleted<br/>Redirecting in 2 seconds...</center>";
}
else
{
print "<center>Action could not be performed, check back again<br/>Redirecting in 2 seconds...</center>";
}

?>