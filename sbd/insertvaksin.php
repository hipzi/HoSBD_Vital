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
            $vaksin = mysqli_query($conn, "SELECT id_usia FROM usiapemberian WHERE id_vaksin = '".$vak."' AND no_urut = '".$ulang."'");
            $hv=mysqli_fetch_array($vaksin);
            $idu = $hv['id_usia'];
            $stmt = $conn->prepare("INSERT into transaksi (id_usia, id_rumahsakit, username, tgl_transaksi) values ('$idu','$rs','z','$tgl_transaksi')");
            $stmt->execute();
            $msg = "Insert Vaccine Successfully";
            header('location:user.php');
            echo "Insert Vaccine Successfully";
            $stmt->close;
            $conn->close;
        }

?>