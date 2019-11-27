<?php
    include "conn.php";
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM Register WHERE id='$id'");
    header("location:logout.php");
?>
