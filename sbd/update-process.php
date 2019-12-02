<?php
    include "conn.php";
    $pk = @$_GET['username'];
    $qe = mysqli_query($conn, "SELECT * FROM pasien WHERE username='$pk'");
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
                <a class="b" href="user.php">JADWAL VAKSIN</a>
                <a class="c" href="home.php">HOME</a>
                <a class="d" href="pilihrekomendasi.php">REKOMENDASI RS</a>
                <a class="e active" href="update.php">PROFILE</a>
                <!-- <a class="f" href="editdata.php">REALISASI VAKSIN</a> -->
            </div>

                <div class="update">
                    <h5>UPDATE</h5>

                    <form action="insertupdate.php" method="POST">
                    <b> <h1>Username</h1> </b>
                        <p> <?php echo $row['username'] ?> </p>
                    <b> <h1>Alamat</h1> </b>
                        <p> <input type="text" title="alamat" name="alamat" value="<?php echo $row['alamat'] ?>" /> </p>
                         <button type="submit" class="btn" value="update">Update</button> 
                    </form>
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