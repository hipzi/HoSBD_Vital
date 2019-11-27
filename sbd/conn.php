<?php
$servername  = "localhost";
$username = "root";
$password = "";
$dbname = "sbd_fp";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// mysqli_select_db('pasien');

if($conn){
    // echo "OK :)";
}
else{
    die("Failed :(".mysqli_connect_error());
}
?>