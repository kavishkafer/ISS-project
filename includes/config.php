<?php
//time zone
date_default_timezone_set('Asia/Kolkata');
//database connection
$server = "localhost";
$uname = "root";
$password = "";
$dbname = "covid";
$con=mysqli_connect($server,$uname,$password,$dbname);
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

  ?>
