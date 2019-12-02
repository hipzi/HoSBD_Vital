<?php
    $password = md5($_POST['password']);
    $newpassword = md5($_POST['newpassword']);
    $confirmpassword = md5($_POST['confirmpassword']);

        $host = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbname = 'sbd_fp';

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }
        else{
            $ambil = mysqli_query($conn, "SELECT password FROM pasien WHERE username = 'z'");
            $pass = mysqli_fetch_array($ambil);
            if($pass['password'] == $password)
            {
                if($newpassword==$confirmpassword){
                    $stmt = $conn->prepare("UPDATE pasien SET password='$newpassword' WHERE username='z'");
                    $stmt->execute();

                    echo "Congratulations You have successfully changed your password";
                    $msg = "Update Successfully";
                    header('location:home.php');
                    echo "Update Successfully";

                    $stmt->close;
                    $conn->close;
                }
                else
                {
                    header('location:change-password.php?username=z');
                    echo "Pastikan password baru dan konfirmasi password sama.";
                } 
            }
            else
            {
                header('location:change-password.php?username=z');
                echo "Password lama tidak sesuai.";
            } 
        }
?>