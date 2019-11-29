<?php
    include "conn.php";
    $pk = $_GET['username'];
    mysqli_query($conn, "DELETE FROM pasien WHERE username='$pk'");
    header("location:logout.php");
?>
