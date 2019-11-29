<?php
$servername  = "localhost";
$username = "root";
$password = "";
$dbname = "sbd_fp";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn){
    // echo "OK :)";
}
else{
    die("Failed :(".mysqli_connect_error());
}
?>