<?php
    $username = $_POST['username'];
    $alamat = $_POST['alamat'];

        $host = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbname = 'sbd_fp';

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }
        else{
            $stmt = $conn->prepare("UPDATE pasien SET alamat='$alamat' WHERE username='z'");
            $stmt->execute();
            $msg = "Update Successfully";
            header('location:update.php');
            echo "Update Successfully";
            $stmt->close;
            $conn->close;
        }

?>