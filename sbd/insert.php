<?php
    $username = $_POST['username'];
    $nama_pasien = $_POST['nama_pasien'];
    $password = $_POST['password'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
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
            $stmt = $conn->prepare("INSERT into pasien (username, nama_pasien, password, tgl_lahir, jenis_kelamin, alamat) values (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $username, $nama_pasien, md5($password), $tgl_lahir, $jenis_kelamin, $alamat);
            $stmt->execute();
            $msg = "Registration Successfully";
            header('location:login.php');
            echo "Registration Successfully";
            $stmt->close;
            $conn->close;
        }

?>