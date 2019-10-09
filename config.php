<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sygma_uploads";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if(!$conn){
   die("Server Connection failed: " . mysqli_connect_error());
}
    //echo "Connected successfully";

?> 