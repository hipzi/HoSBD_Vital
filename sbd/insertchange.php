<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
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

            if($newpassword==$confirmpassword){
                
                $stmt = $conn->prepare("UPDATE pasien SET password='$newpassword' WHERE username='$username'");
                $stmt->execute();

                echo "Congratulations You have successfully changed your password";
                $msg = "Update Successfully";
                header('location:update.php');
                echo "Update Successfully";

                $stmt->close;
            }

            $conn->close;
        }
?>