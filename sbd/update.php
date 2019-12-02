<?php
    include "conn.php";
    $qe = mysqli_query($conn, "SELECT * FROM pasien where username='z'");
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
                    <h5>PROFILE</h5>

                        <?php
                            $qry = mysqli_query($conn, "SELECT * FROM pasien where username='z'");
                            while($row=mysqli_fetch_array($qry)){
                        ?>

                            <b> <h1>Username<h1> </b>
                            <p><?php echo $row['username']; ?></p>
                            <b> <h1>Nama<h1> </b>
                            <p><?php echo $row['nama_pasien']; ?></p>
                            <b> <h1>Tanggal Lahir<h1> </b>
                            <p><?php echo $row['tgl_lahir']; ?></p>
                            <b> <h1>Jenis Kelamin<h1> </b>
                            <p><?php echo $row['jenis_kelamin']; ?></p>
                            <b> <h1>Alamat<h1> </b>
                            <p><?php echo $row['alamat']; ?> </br> 
                            <b> <h1>Opsi<h1> </b>
                            <a href="update-process.php?username=<?php echo $row['username']; ?>">UPDATE</a> </br>
                            <a href="change-password.php?username=<?php echo $row['username']; ?>">CHANGE PASSWORD</a> </br>
                            <a onclick="return confirm('Yakin ?')" href="delete.php?username=<?php echo $row['username']; ?>">DELETE</a>
                    <?php }?>

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