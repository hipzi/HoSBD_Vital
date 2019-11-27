<?php
    include 'conn.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

            $query = "SELECT * FROM pasien WHERE username='$username' AND password='$password'";
            $apa = $conn->query($query);

            if($apa->num_rows > 0) {
                    session_start();
                    $_SESSION['username'] = $username;
                    header("Location: home.php");
                }
            else {
                echo "Failed to Login";
                header("refresh:10; url=login.php");
            }
?>