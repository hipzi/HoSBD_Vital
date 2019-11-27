<?php
    include "conn.php";
    $id = $_GET['id'];
    $qe = mysqli_query($conn, "SELECT * FROM Register WHERE id='$id'");
    $row = mysqli_fetch_array($qe);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <style type="text/css">
            @import url('style.css');
        </style>
        <style>
                @import url('https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap');
        </style>
        <title></title>
    </head>

    <body>
        <div class="background">

            <div class="nav">
                <a class="a" href="logout.php">LOGOUT</a>
                <a class="b" href="#">REGISTER</a>
                <a class="c" href="home.php">HOME</a>
                <a class="d" href="about.php">ABOUT AJK</a>
                <a class="e" href="user.php">USER</a>
            </div>

                <div class="update">
                    <h5>UPDATE</h5>

                    <form method="POST">
                        <b> <h1>Username</h1> </b>
                        <p> <input type="text" title="Username" name="Username" value="<?php echo $row['Username'] ?>" /> </p>
                        <b> <h1>Nama</h1> </b>
                        <p> <input type="text" title="Nama" name="Nama" value="<?php echo $row['Nama'] ?>" /> </p>
                        <b> <h1>Angkatan</h1> </b>
                        <p> <input type="text" title="Angkatan" name="Angkatan" value="<?php echo $row['Angkatan'] ?>" /> </p>
                        <b> <h1>Email</h1> </b>
                        <p> <input type="text" title="Email" name="Email" value="<?php echo $row['Email'] ?>" /> </p>
                        <b> <h1>Password</h1> </b>
                        <p> <input type="Password" title="Password" name="Password" value="<?php echo $row['Password'] ?>" /> </p>
                        <p> <button type="submit" class="btn" value="Update">Update</button> </p>
                    </form>

                    <?php
                        $Username = $_POST['Username'];
                        $Nama = $_POST['Nama'];
                        $Angkatan = $_POST['Angkatan'];
                        $Email = $_POST['Email'];
                        $Password = $_POST['Password'];

                        $host = 'localhost';
                        $dbUsername = 'root';
                        $dbPassword = 'bismillah582';
                        $dbname = 'WebAJK';

                        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

                        if($conn->connect_error){
                            die('Connection Failed : '.$conn->connect_error);
                        }
                        else{
                            $hash = md5($Password);
                            $stmt = $conn->prepare("UPDATE Register SET Username='$Username', Nama='$Nama', Angkatan='$Angkatan',
                            Email='$Email', Password='$hash' WHERE id='$id'");
                            $stmt->execute();
                            $stmt->close;
                            $conn->close;
                        }

                    ?>
                </div>

        </div>

        <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
        <script type="text/javascript">

            $(document).ready(function(){
                $('a').click(function(){
                    var selected = $(this);
                    $('a').removeClass('active');
                    $(selected).addClass('active');
                });
            });
        
        </script>

    </body>
</html>