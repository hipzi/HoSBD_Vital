<?php
    $vak = $_POST['cbvaksin'];
    $ulang = $_POST['cbperulangan'];
    $tgl_transaksi = $_POST['tgl_terima'];
    $rs = $_POST['cbrs'];
        $host = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbname = 'sbd_fp';

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }
        else{
            $trans = mysqli_query($conn, "SELECT id_transaksi FROM transaksi where username = 'z' AND id_usia = (SELECT id_usia FROM usiapemberian WHERE id_vaksin = '".$vak."' AND no_urut = '".$ulang."')");
            $hv=mysqli_fetch_array($trans);
            $idt = $hv['id_transaksi'];
            echo $idt;
            $stmt = $conn->prepare("UPDATE transaksi SET id_rumahsakit = '".$rs."', tgl_transaksi = '".$tgl_transaksi."' WHERE id_transaksi = '".$idt."'");
            $stmt->execute();
            $msg = "Update Vaccine Successfully";
            header('location:user.php');
            echo "Update Vaccine Successfully";
            $stmt->close;
            $conn->close;
        }

?>