<?php
// $con = new mysqli("localhost", "mtwcomng_root", "mtwcom*1#", "mtwcomng_oil");
$con = new mysqli("localhost", "root", "", "mtwcomng_oil");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//Your Website URL Goes Here
$url="http://oil.mtw.com.ng";


//Your Sitename Goes here
$site_name = "Our Site";

//Email Header Sender
$email_sender = "noreply@mysite.com";

?>