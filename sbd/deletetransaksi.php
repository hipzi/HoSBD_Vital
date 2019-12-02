<?php
    include "conn.php";
    $pk = $_GET['idt'];
    mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi='$pk'");
    header("location:user.php");
?>
